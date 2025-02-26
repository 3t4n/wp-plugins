<?php
/**
 * this feature is added from v1.2.7.3
 */
class pisol_cdrw_add_discount_id_order{
    function __construct(){
        /**
         * this saves the plugin applied discounts in variable
         * _pisol_cdrw_discount_ids
         */
        add_action('woocommerce_checkout_create_order', [__CLASS__,'savingDiscountCodeInOrder'], 20, 2);
    }

    static function savingDiscountCodeInOrder($order , $data){  
        $our_plugin_discount_id = self::getPluginDiscountsIds();
        $order->update_meta_data('_pisol_cdrw_discount_ids', $our_plugin_discount_id);
    }

    static function getPluginDiscountsIds(){
        $our_plugin_discount_id = [];
        if(get_option('pi_cdrw_old_way_of_discount','coupon') == 'additional-cost'){
            $discounts = WC()->cart->get_fees(); 
        }else{
            $discounts = WC()->cart->get_coupons(); 
        }
        return self::getDiscountList($discounts);
    }

    static function getDiscountList($fees){
        $ids = [];
        if(empty($fees) || !is_array($fees)) return $ids;

        foreach($fees as $fee => $detail){
            if(strpos($fee, 'pisol-cdrw-discount') !== false){
                $ids[] = self::getId($fee);
            }
        }
        return $ids;
    }

    static function getId($key){
        $parts = explode(':', $key);
        return isset($parts[1]) ? $parts[1] : '';
    }

   
}

new pisol_cdrw_add_discount_id_order();