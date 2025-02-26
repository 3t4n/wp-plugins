<?php

namespace FlamixLocal\Exchange\Woo;

use Flamix\CommerceML\Init;
use Flamix\CommerceML\Operations\CheckAuth;
use FlamixLocal\Exchange\Settings\Setting;

class Exchange extends Init
{
    /****************** | Callbacks | *******************/
    protected static string $product_callback = '\FlamixLocal\Exchange\Woo\Products';
    protected static string $category_callback = '\FlamixLocal\Exchange\Woo\Categories';
    protected static string $attribute_callback = '\FlamixLocal\Exchange\Woo\Attributes';

    /****************** | ACTIONS | *******************/
    /**
     * Check access
     *
     * @return mixed|void
     * @throws \Exception
     */
    public static function actionCheck()
    {
        if (Setting::getOption('lead_domain') !== ($_SERVER['PHP_AUTH_USER'] ?? ''))
            throw new \Exception('Bad login!');

        if (str_contains(Setting::getOption('lead_api'), ';')) {
            // Many Integrations
            $apiKeys = explode(';', Setting::getOption('lead_api'));
            if (!isset($_SERVER['PHP_AUTH_PW']) || !in_array($_SERVER['PHP_AUTH_PW'], $apiKeys))
                throw new \Exception('Bad password!');
        } else {
            // One Integration
            if (Setting::getOption('lead_api') !== ($_SERVER['PHP_AUTH_PW'] ?? ''))
                throw new \Exception('Bad password!');
        }

        // If OK - Print our session_id
        return CheckAuth::printPhpSession();
    }

    /****************** | HANDLERS | *******************/
    /**
     * Update rests
     *
     * @param $product_id
     * @param array $rests
     * @return bool
     */
    public static function restsHandler($product_id, array $rests): bool
    {
        $woo_id = Products::getProductBy('EXTERNAL_ID', $product_id);
        commerceml_log('[restsHandler] Product ' . (($woo_id) ? 'founded with WooCommerce product ID ' . $woo_id : 'not found') . ' by EXTERNAL_ID: ' . $product_id, $rests);
        if (!$woo_id)
            return false;

        // One or Many Warehouses
        $general_quantity = $rests['quantity'] ?? array_sum(array_column($rests, 'quantity'));
        commerceml_log('[restsHandler] General quantity by all warehouses ' . $general_quantity);
        if (!$general_quantity)
            return false;

//        dd($woo_id, $general_quantity, $rests);
        return Products::set($woo_id, ['quantity' => $general_quantity]);
    }

    // TODO: Translate
    public static function pricesHandler($product_id, array $prices): bool
    {
        $woo_id = Products::getProductBy('EXTERNAL_ID', $product_id);
        commerceml_log('[pricesHandler] Product ' . (($woo_id) ? 'founded with WooCommerce product ID ' . $woo_id : 'not found') . ' by EXTERNAL_ID: ' . $product_id, $prices);
        if (!$woo_id)
            return false;

        if (isset($prices['ЦенаЗаЕдиницу']))
            $prices = [$prices];

        $data = [];
        foreach ($prices as $price) {
            if (strtoupper($price['ИдТипаЦены'] ?? '') === 'BASE')
                $data['price'] = (float)$price['ЦенаЗаЕдиницу'] ?? 0;
            else if (strtoupper($price['ИдТипаЦены'] ?? '') === 'SALE')
                $data['price_sale'] = (float)$price['ЦенаЗаЕдиницу'] ?? 0;

            $data['currency'] = (string)$price['Валюта'] ?? 'USD';
        }

        if (empty($data))
            return false;

        commerceml_log('[pricesHandler] Update prices ', $data);

        // dd($woo_id, $data, $prices);
        return Products::set($woo_id, $data);
    }
}