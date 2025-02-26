<?php
/**
 * this feature is added from v1.2.7.3
 */
class pisol_cdrw_add_discount_usage_data{
    function __construct(){

        add_action( 'woocommerce_order_status_pending', [__CLASS__,'wc_update_coupon_usage_counts'] );
        add_action( 'woocommerce_order_status_completed', [__CLASS__,'wc_update_coupon_usage_counts'] );
        add_action( 'woocommerce_order_status_processing', [__CLASS__,'wc_update_coupon_usage_counts'] );
        add_action( 'woocommerce_order_status_on-hold', [__CLASS__,'wc_update_coupon_usage_counts'] );
        add_action( 'woocommerce_order_status_cancelled', [__CLASS__,'wc_update_coupon_usage_counts'] );

    }

    static function wc_update_coupon_usage_counts( $order_id ){
        $order = wc_get_order( $order_id );

        if ( ! $order ) {
            return;
        }

        $our_discounts = get_post_meta($order_id, '_pisol_cdrw_discount_ids', true);

        if(empty($our_discounts)) return;

        if ( $order->has_status( 'cancelled' ) ) {
            $action = 'reduce';
        }else{
            $action = 'increment';
        }

        $used_by = $order->get_user_id();

        if ( ! $used_by ) {
            $used_by = $order->get_billing_email();
        }

        switch ( $action ) {
            case 'reduce':
                self::removeUserFromDiscounts($our_discounts, $used_by);
                break;
            case 'increment':
                self::addUserToDiscounts($our_discounts, $used_by);
                break;
        }

    }

    static function removeUserFromDiscounts($our_discounts, $used_by){
        if(empty($our_discounts) || !is_array($our_discounts) ) return;

        global $wpdb;

        foreach($our_discounts as $discount_id){
            $meta_id = $wpdb->get_var(
                $wpdb->prepare(
                    "SELECT meta_id FROM $wpdb->postmeta WHERE meta_key = '_cdrw_used_by' AND meta_value = %s AND post_id = %d LIMIT 1;",
                    $used_by,
                    $discount_id
                )
            );
            if ( $meta_id ) {
				delete_metadata_by_mid( 'post', $meta_id );
            }
        }
    }

    static function addUserToDiscounts($our_discounts, $used_by){
        if(empty($our_discounts) || !is_array($our_discounts) ) return;

        foreach($our_discounts as $discount_id){
            add_post_meta($discount_id, '_cdrw_used_by', $used_by);
        }
    }
}

new pisol_cdrw_add_discount_usage_data();