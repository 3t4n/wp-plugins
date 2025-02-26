<?php

/**
 * Store check conditions each offer before display payment method.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

namespace InstaCash\BNPL;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Conditions filter class.
 */
class Conditions
{
    /**
     * Check condition overlaps.
     *
     * @return array<array<string>>
     */
    public static function overlapCheck()
    {
        $options = (array) get_option(Config::OPTIONS_NAME, []);
        $offers  = (array) get_option(Config::OFFERS_OPTION_NAME, []);
        $filters = [];
        $overlap = [];

        foreach ($offers as $offer) {
            foreach (Config::dinamycOptionFields() as $fieldName => $field) {
                if (isset($options[$fieldName . '_' . $offer->offerId])) {
                    $filters[$offer->offerId]['name']     = $offer->offerName;
                    $filters[$offer->offerId][$fieldName] = $options[$fieldName . '_' . $offer->offerId];
                }
            }
        }

        foreach ($filters as $offer => $selected) {
            foreach ($filters as $id => $filter) {
                // Check amount overlapping.
                // If one of the 'cart_min' is greater than the 'cart_max' of the other, there is no overlap
                if (
                    isset($overlap[$id])
                    || $offer === $id
                    || intval($selected['cart_min']) > intval($filter['cart_max'])
                    || intval($selected['cart_max']) < intval($filter['cart_min'])
                ) {
                    continue;
                }
                $overlap[$offer][] = $selected['name'] . ' - ' . $filter['name'];
                $overlap[$offer][] = __('Cart total', 'instacash-bnpl');

                // If the cart amounts overlap, we check whether they are available in the same country
                if (
                    !in_array('all', (array) $selected['countries'])
                    && !in_array('all', (array) $filter['countries'])
                    && [] === array_intersect((array) $selected['countries'], (array) $filter['countries'])
                ) {
                    continue;
                }
                $overlap[$offer][] = __('Allowed Countries', 'instacash-bnpl');

                // Note overlaps with other settings, regardless of whether they are no longer exclusive conditions.
                if (in_array('none', (array) $selected['categories']) || in_array('none', (array) $filter['categories'])) {
                    $overlap[$offer][] = __('Disallowed categories', 'instacash-bnpl');
                }
                if ('yes' === $selected['on_sales'] && 'yes' === $selected['on_sales']) {
                    $overlap[$offer][] = __('Disallow discounts', 'instacash-bnpl');
                }
                if ('yes' === $selected['not_stock'] && 'yes' === $selected['not_stock']) {
                    $overlap[$offer][] = __('Disallow backorder', 'instacash-bnpl');
                }
                if ('yes' === $selected['companies'] && 'yes' === $selected['companies']) {
                    $overlap[$offer][] = __('Disallow companies', 'instacash-bnpl');
                }
                if ('yes' === $selected['account'] && 'yes' === $selected['account']) {
                    $overlap[$offer][] = __('Disallow accountless', 'instacash-bnpl');
                }
            }
        }

        return $overlap;
    }

    /**
     * Filter offer with admin page options
     *
     * @return non-empty-array<string, mixed>|int|false
     */
    public static function offersFilter()
    {
        $filters  = [];
        $options  = (array) get_option(Config::OPTIONS_NAME, []);
        $offers   = (array) get_option(Config::OFFERS_OPTION_NAME, []);
        $possibly = false;

        foreach ($offers as $row) {
            foreach (Config::dinamycOptionFields() as $fieldName => $field) {
                $filters[$row->offerId][$fieldName] = $options[$fieldName . '_' . $row->offerId];
            }
            $filters[$row->offerId]['currency'] = isset($row->currencyIso) ? $row->currencyIso : false;
        }

        foreach ($filters as $offer => $filter) {

            $currency = get_woocommerce_currency();
            $blocked  = false;

            if (($filter['currency'] && $currency !== $filter['currency'])
                || (
                    !in_array('all', (array) $filter['countries'])
                    && !in_array(WC()->cart->get_customer()->get_billing_country(), (array) $filter['countries'])
                )
                || (WC()->cart->total > intval($filter['cart_max']) && intval($filter['cart_max']) > intval($filter['cart_min']))
                || ('' !== WC()->cart->get_customer()->get_billing_company() && 'yes' === $filter['companies'])
                || ('yes' === $filter['account'] && !is_user_logged_in())
            ) {
                continue;
            }

            if (WC()->cart->total < intval($filter['cart_min'])) {
                if (!$possibly || intval($possibly['cart_min']) > intval($filter['cart_min'])) {
                    $possibly = $filter;
                }
                continue;
            }

            foreach (WC()->cart->get_cart() as $item) {

                $categories = wc_get_product($item['product_id'])->get_category_ids();
                if (
                    (
                        !in_array('none', (array) $filter['categories'])
                        && array_intersect((array) $categories, (array) $filter['categories'])
                    )
                    || ($item['data']->is_on_sale() && 'yes' === $filter['on_sales'])
                    || ('yes' === $filter['not_stock'] && 'onbackorder' === $item['data']->get_stock_status())
                ) {
                    $blocked = true;
                    continue;
                }
            }

            if (!$blocked) {
                return intval($offer);
            }
        }

        return $possibly;
    }

    /**
     * Filter offer for product page.
     *
     * @param \WC_Product $product
     * @param int         $subtotal
     *
     * @return int|false
     */
    public static function productOfferFilter($product, $subtotal = null)
    {
        $filters  = [];
        $options  = (array) get_option(Config::OPTIONS_NAME, []);
        $offers   = (array) get_option(Config::OFFERS_OPTION_NAME, []);
        $subtotal = $subtotal ? $subtotal : $product->get_price();
        $currency = get_woocommerce_currency();

        foreach ($offers as $row) {
            foreach (Config::dinamycOptionFields() as $fieldName => $field) {
                $filters[$row->offerId][$fieldName] = $options[$fieldName . '_' . $row->offerId];
            }
            $filters[$row->offerId]['currency'] = isset($row->currencyIso) ? $row->currencyIso : false;
        }


        foreach ($filters as $offer => $filter) {
            if (($filter['currency'] && $currency !== $filter['currency'])
                || (intval($subtotal) < intval($filter['cart_min'])
                || (intval($subtotal) > intval($filter['cart_max']) && intval($filter['cart_max']) > intval($filter['cart_min'])))
            ) {
                continue;
            }

            if (
                (!in_array('none', (array) $filter['categories'])
                && array_intersect((array) $product->get_category_ids(), (array) $filter['categories']))
                || ($product->is_on_sale() && 'yes' === $filter['on_sales'])
                || ('yes' === $filter['not_stock'] && 'onbackorder' === $product->get_stock_status())
            ) {
                continue;
            }

            return intval($offer);
        }

        return false;
    }

    /**
     * Get used filters of an offer
     *
     * @param int $offerId
     *
     * @return array
     */
    public static function cartSizes($offerId)
    {
        $filters = [];
        $options = (array) get_option(Config::OPTIONS_NAME, []);
        $offers  = (array) get_option(Config::OFFERS_OPTION_NAME, []);

        foreach ($offers as $row) {
            if($row->offerId !== $offerId) {
                continue;
            }
            $filters = [
                'min' => $options['cart_min_' . $row->offerId],
                'max' => $options['cart_max_' . $row->offerId]
            ];
        }

        return $filters;
    }
}
