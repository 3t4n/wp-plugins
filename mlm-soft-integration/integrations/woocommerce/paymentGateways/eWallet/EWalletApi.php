<?php

namespace MLMSoft\integrations\woocommerce\paymentGateways\eWallet;

use Exception;
use MLMSoft\core\MLMSoftDebug;
use MLMSoft\core\MLMSoftPlugin;
use MLMSoft\core\models\user\MLMSoftLocalUser;
use MLMSoft\integrations\woocommerce\paymentGateways\eWallet\models\EWalletCartHelper;
use MLMSoft\integrations\woocommerce\paymentGateways\eWallet\models\EWalletCoupon;
use MLMSoft\integrations\woocommerce\paymentGateways\eWallet\modules\EWalletCouponModule;
use MLMSoft\integrations\woocommerce\WCIntegrationOptions;
use MLMSoft\lib\helpers\ArrayHelper;
use MLMSoft\traits\SignedAjaxApiTrait;
use MLMSoft\traits\SingletonTrait;

class EWalletApi
{
    use SignedAjaxApiTrait;
    use SingletonTrait;

    public const API_ENDPOINT = 'e-wallet-api';
    public const GATEWAY_E_WALLETS_FILTER = MLMSoftPlugin::PLUGIN_PREFIX . 'gateway_e_wallets';

    public function __construct()
    {
        $this->addHandler('get-payment-info', [$this, 'getPaymentInfo']);
        $this->addHandler('pay-with-bonuses', [$this, 'endpointPayWithBonuses']);
        $this->initAdmin(self::API_ENDPOINT, true);
    }

    public function getPaymentInfo()
    {
        $accountId = $this->getAccountId();
        $mlmSoftPlugin = MLMSoftPlugin::getInstance();
        $wallets = $mlmSoftPlugin->api3->get("account/$accountId/wallet");
        $currencyWalletMatches = WCIntegrationOptions::getInstance()->currencyWalletMatch;
        $currency = get_woocommerce_currency();
        $currentMatches = [];
        if (!empty($currencyWalletMatches)) {
            foreach ($currencyWalletMatches as $match) {
                if ($match['currency'] == $currency) {
                    $currentMatches[] = $match;
                }
            }
        }

        $walletMap = ArrayHelper::map($wallets, 'id', function ($array) {
            return $array;
        });

        $couponModule = EWalletCouponModule::getInstance();
        $maxAmount = $couponModule->getMaxAmount();
        $orderTotal = $couponModule->getOrderTotal();

        foreach ($currentMatches as $match) {
            $walletId = $match['walletId'];
            if (!empty($walletMap[$walletId])) {
                $maxPercent = $match['maxPercent'] / 100;
                if ($maxPercent > 0) {
                    $walletMap[$walletId]['maxAmount'] = round($orderTotal * $maxPercent, 2);
                }
                $result[] = $walletMap[$walletId];
            }
        }
        $wallets = apply_filters(self::GATEWAY_E_WALLETS_FILTER, $result);

        $currency = $couponModule->getExternalCurrency();
        return [
            'wallets' => $wallets,
            'currency' => $currency,
            'maxAmount' => $maxAmount
        ];
    }

    public function endpointPayWithBonuses($body)
    {
        if (!isset($body, $body['amount'], $body['walletId'])) {
            $this->sendError(MLMSoftPlugin::translate('Request validation error (required fields)'));
        }
        $amount = floatval($body['amount']);
        $walletId = $body['walletId'];
        $maxAmount = $this->getMAxAmountForWallet($walletId);
        if ($amount > $maxAmount) {
            $this->sendError(MLMSoftPlugin::translate('Amount must be less than {{maxAmount}}', ['maxAmount' => $maxAmount]));
        }
        $accountId = $this->getAccountId();
        
        /**
         * Added filter before creating a coupon.
         *
         * @since 3.7.1
         */
        $origin = 'checkout';
        $orderPayOption = get_option('woocommerce_checkout_pay_endpoint', 'order-pay');
        $referer = isset($_SERVER['HTTP_REFERER']) ? sanitize_text_field($_SERVER['HTTP_REFERER']) : '';    
        if (false !== strpos($referer, $orderPayOption)) {
            parse_str($referer, $parsed);
            if ( ! empty($parsed['key']) ) {
                $orderKey = $parsed['key'];
                $order_id = wc_get_order_id_by_order_key($orderKey);
                $order = wc_get_order($order_id);
                if ($order) {
                    $origin = 'checkout/order-pay';
                } else {
                    $origin = false;
                }
            }
        }
        
        $total = 0;
        $subtotal = 0;
        $shipping_total = 0;
        if ( $origin ) {
            if ( 'checkout' == $origin ) {
                $total = WC()->cart->total;
                $subtotal = WC()->cart->subtotal;
                $shipping_total = WC()->cart->get_shipping_total();        
            } else {
                $total = $order->get_total();
                $subtotal = $order->get_subtotal();
                $shipping_total = $order->get_shipping_total();
            }                
        }
        
        $attrs = [
            'handler'   => 'pay-with-bonuses',
            'accountId' => $accountId,
            'amount'    => $amount,
            'maxAmount' => $maxAmount,
            'total'     => $total,
            'subtotal'  => $subtotal,
            'shipping_total' => $shipping_total,
            'walletId'       => $walletId,
            'origin'         => $origin,
            'orderId'        => $origin == 'checkout/order-pay' ? $order->get_id() : false
        ];
        
        /**
         * Allow 3rd parties to short circuit the logic and return their own value.
         */
        $response = apply_filters('mlmsoft_integration_coupon_create', null, $attrs);
        
        if ( ! is_null($response) ) {
            if ( is_wp_error($response) ) {
                $this->sendError($response->get_error_message());
            } elseif ( is_array($response) || is_string($response) ) {
                return $response;
            }
            return true;
        }
        
        $coupon = EWalletCoupon::create($accountId, $walletId, $amount, EWalletCouponModule::E_WALLET_EXPIRATION_TIME);
        try {
            EWalletCartHelper::getInstance()->applyEWalletCoupon($coupon);
        } catch (Exception $exception) {
            $this->sendError($exception->getMessage());
        }
        return true;
    }

    private function getAccountId()
    {
        $mlmsoftUser = MLMSoftLocalUser::loadFromCurrent();
        $accountId = $mlmsoftUser->getAccountId();
        if (!$accountId) {
            $accountId = MLMSoftDebug::debugAccountId();
        }
        if (!$accountId) {
            $this->sendError(MLMSoftPlugin::translate('Account ID not found'));
        }
        return $accountId;
    }

    private function getMAxAmountForWallet($walletId)
    {
        $currencyWalletMatches = WCIntegrationOptions::getInstance()->currencyWalletMatch;

        $couponModule = EWalletCouponModule::getInstance();
        $maxAmount = $couponModule->getMaxAmount();
        $orderTotal = $couponModule->getOrderTotal();

        $currency = get_woocommerce_currency();
        if (!empty($currencyWalletMatches)) {
            foreach ($currencyWalletMatches as $match) {
                if ($match['currency'] == $currency) {
                    if ($walletId == $match['walletId'] && !empty($match['maxPercent'])) {
                        $maxPercent = $match['maxPercent'] / 100;
                        if ($maxPercent > 0) {
                            $walletMaxAmount = round($orderTotal * $maxPercent, 2);
                            return min($walletMaxAmount, $maxAmount);
                        }
                    }
                }
            }
        }

        return $maxAmount;
    }
}
