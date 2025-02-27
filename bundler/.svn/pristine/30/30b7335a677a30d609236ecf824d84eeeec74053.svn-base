<?php

namespace Bundler\Models;

if (!defined('ABSPATH')) exit;

class Bundle
{

    /**
     * Add a bundle to an existing offer
     * 
     * @param mixed $offer_id
     * @param mixed $discount_type
     * @param mixed $discount_method
     * @param mixed $discount_value
     * @param mixed $free_gift_id
     * 
     * @return array
     */
    public static function add_bundle_to_offer(
        $offer_id,
        $discount_type,
        $discount_method,
        $discount_value,
        $free_gift_id
    ) {
        global $wpdb;

        $bundle_table = $wpdb->prefix . DB::$bundle_table_name;

        $wpdb->insert(
            $bundle_table,
            array(
                'offer_id'        => $offer_id,
                'discount_type'   => $discount_type,
                'discount_method' => $discount_method,
                'discount_value'  => $discount_value,
                'free_gift_id'    => $free_gift_id
            )
        );
    }

    /**
     * Get bundles for a given product id
     * 
     * @param mixed $product_id
     * 
     * @return array
     */
    public static function get_bundles_by_product_id($product_id)
    {
        global $wpdb;
        $bundle_table = $wpdb->prefix . DB::$bundle_table_name;
        $offer_table = $wpdb->prefix . DB::$offer_table_name;
        $query = $wpdb->prepare("SELECT * FROM $bundle_table INNER JOIN $offer_table 
            ON $bundle_table.offer_id = $offer_table.id
            WHERE product_id = %s", $product_id);

        return $wpdb->get_results($query);
    }

    /**
     * Get the bundles associated with an offer
     * 
     * @param mixed $offer_id
     * 
     * @return Bundler\Models\Bundle
     */
    public static function get_bundle_by_offer_id($offer_id)
    {
        global $wpdb;
        $bundle_table = $wpdb->prefix . DB::$bundle_table_name;

        $query = $wpdb->prepare("SELECT * FROM $bundle_table WHERE offer_id = %s", $offer_id);
        $result = $wpdb->get_results($query);

        return !empty($result) ? $result[0] : null;
    }

    /**
     * @param mixed $offer_id
     * 
     * @return void
     */
    public static function remove_bundles($offer_id)
    {
        global $wpdb;

        $bundle_table = $wpdb->prefix . DB::$bundle_table_name;

        $wpdb->delete($bundle_table, array('offer_id' => $offer_id));
    }
}
