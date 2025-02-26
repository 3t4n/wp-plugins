<?php

/**
 * Array helper functions.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

namespace InstaCash\BNPL;

use InstaCash\Symfony\Component\HttpFoundation\Request;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Helper
{
    /**
     * Number of generated random bytes.
     *
     * @var int
     */
    private const BYTES = 5;

    /**
     * Hash slice start character number.
     *
     * @var int
     */
    private const HASH_START = 10;

    /**
     * Hash slice end character number.
     *
     * @var int
     */
    private const HASH_END = -12;

    /**
     * Fill and returns offer based option fields.
     *
     * @return array
     */
    public function getDynamicFields()
    {
        $dynamicFields = [];
        $offers        = get_option(Config::OFFERS_OPTION_NAME, []);

        foreach ($offers as $offer) {
            $currencyRow = sprintf(
                '<tr>
                    <td style="font-weight:bold;min-width:150px;line-height:30px;">%s</td>
                    <td style="line-height:30px;">%s - %s</td>
                </tr>',
                __('Currency', 'instacash-bnpl'),
                isset($offer->currencyIso) ? $offer->currencyIso : '',
                isset($offer->currencySymbol) ? $offer->currencySymbol : ''
            );

            $dynamicFields['offer_' . $offer->offerId] = [
                'title'       => $offer->offerName,
                'type'        => 'title',
                'description' => '
                    <hr/>
                    <table style="">
                        <tr>
                            <td style="font-weight:bold;min-width:150px;line-height:30px;">' . __('Down payment', 'instacash-bnpl') . '</td>
                            <td style="line-height:30px;">' . $offer->downPayment . '%</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;min-width:150px;line-height:30px;">' . __('Rate', 'instacash-bnpl') . '</td>
                            <td style="line-height:30px;">' . $offer->rate . '%</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;min-width:150px;line-height:30px;">' . __('Installments', 'instacash-bnpl') . '</td>
                            <td style="line-height:30px;">' . $offer->installments . '</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;min-width:150px;line-height:30px;">' . __('Lateness fee', 'instacash-bnpl') . '</td>
                            <td style="line-height:30px;">' . $offer->latenessFee . '</td>
                        </tr>
                        ' . $currencyRow . '
                    </table>
                '
            ];

            foreach (Config::dinamycOptionFields() as $name => $field) {

                if ($name === 'cart_min' && isset($offer->minAmount)) {
                    $field['default']     = $offer->minAmount;
                    $field['placeholder'] = $offer->minAmount;
                }
                if ($name === 'cart_max' && isset($offer->maxAmount)) {
                    $field['default']     = $offer->maxAmount;
                    $field['placeholder'] = $offer->maxAmount;
                }

                $dynamicFields[$name . '_' . $offer->offerId] = $field;
            }
        }

        return $dynamicFields;
    }

    /**
     * Get Request data array.
     *
     * @param string $orderId
     * @param string $returnUrl
     *
     * @return array
     */
    public function getRequestArray($orderId, $returnUrl)
    {
        $items    = [];
        $request  = Request::createFromGlobals();
        $billing  = [
            'region'  => $request->request->get('billing_state', null) ? $request->request->get('billing_state', null) : null,
            'country' => $request->request->get('billing_country', null),
            'city'    => $request->request->get('billing_city', null),
            'zip'     => $request->request->get('billing_postcode', null),
            'street'  => $request->request->get('billing_address_1', null),
            'street2' => $request->request->get('billing_address_2', null),
            'street3' => $request->request->get('billing_address_2', null)
        ];
        $shipping = !$request->request->get('shipping_postcode', false) ? $billing : [
            'region'  => $request->request->get('shipping_state', null) ? $request->request->get('shipping_state', null) : null,
            'country' => $request->request->get('shipping_country', $request->request->get('billing_country', null)),
            'city'    => $request->request->get('shipping_city', null),
            'zip'     => $request->request->get('shipping_postcode', null),
            'street'  => $request->request->get('shipping_address_1', null),
            'street2' => $request->request->get('shipping_address_2', null),
            'street3' => $request->request->get('shipping_address_2', null)
        ];
        $customer = [
            'customerId'         => get_current_user_id(),
            'customerEmail'      => $request->request->get('billing_email', ''),
            'customerPhone'      => $request->request->get('billing_phone', ''),
            'customerFirstName'  => $request->request->get('billing_first_name', ''),
            'customerLastName'   => $request->request->get('billing_last_name', ''),
            'billingAddress'     => $billing,
            'shippingAddress'    => $shipping
        ];
        $payment  = [
            'orderId'             => $orderId,
            'redirectUrl'         => $returnUrl,
            'checkoutId'          => $this->createCheckoutId($orderId),
            'offerId'             => $request->request->getInt('offerId'),
            'totalAmount'         => $request->request->getInt('totalAmount'),
            'prepaymentInvoiceId' => '',
            'finalInvoiceId'      => ''
        ];

        foreach (WC()->cart->get_cart() as $item) {
            $items[] = [
                "externalId"  => $item['data']->get_sku() ? $item['data']->get_sku() : $orderId,
                "identifier"  => $item['data']->get_id(),
                "name"        => $item['data']->get_name(),
                "description" => $item['data']->get_name(),
                "thumbnail"   => wp_get_attachment_url($item['data']->get_image_id()),
                "quantity"    => intval($item['quantity']),
                "price"       => intval($item['data']->get_price())
            ];
        }

        return [
            'customer' => $customer,
            'payment'  => $payment,
            'items'    => $items
        ];
    }

    /**
     * Apply printable format on calculation elements
     *
     * @param \stdClass $calculation
     *
     * @return \stdClass
     */
    public function calculationPriceFormat($calculation)
    {
        foreach($calculation->payments as $index => $payment) {
            $calculation->payments[$index]->sum = wc_price($payment->sum);
        }

        $calculation->prescoreTotal    = $calculation->total;
        $calculation->fee              = wc_price($calculation->fee);
        $calculation->total            = wc_price($calculation->total);
        $calculation->downPaymentTotal = wc_price($calculation->downPaymentTotal);

        return $calculation;
    }

    /**
     * Apply printable format on calculation elements
     *
     * @param \stdClass $calculation
     *
     * @return string
     */
    public function getOneLine($calculation)
    {
        $payment        = end($calculation->payments)->sum;
        $payments       = count($calculation->payments);
        $hasDownPayment = false;
        if ($calculation->downPayment) {
            $hasDownPayment = true;
            $payments--;
        }

        return sprintf(
            // Translators: 1$ down payment amount 2$ is count of payments %3$s is installment amount.
            __(
                'The down payment %1$s, then pay <strong>%2$d</strong> times <strong>%3$s</strong>.',
                'instacash-bnpl'
            ),
            $calculation->downPayment
            ? $calculation->downPaymentTotal
            : $calculation->payments[0]->sum,
            $payments,
            $payment
        );
    }


    /**
     * Get payment url.
     *
     * @param string  $bnplId
     * @param string  $publicId
     * @param boolean $testMode
     *
     * @return string
     */
    public function getRedirectUrl($bnplId, $publicId, $testMode = false)
    {
        return sprintf('%s/%s/%s', Config::getServer($testMode), $bnplId, $publicId);
    }

    /**
     * Create a secret hash slice with optional $id;
     *
     * @param int|string|null $id
     *
     * @return string
     */
    public function createCheckoutId($id = null)
    {
        return substr(wp_hash(sprintf('%s-%s', $id, bin2hex(random_bytes(self::BYTES)))), self::HASH_END, self::HASH_START);
    }
}
