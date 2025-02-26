<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCGW_comman')) {

    class OCGW_comman {

        protected static $instance;

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
             return self::$instance;
        }
         function init() {
            global $ocgw_comman;
            $optionget = array(

                'gw_gift_wrapper_enable' => 'enable',
                'gw_gift_wrapper_msg_enable'=>'enable',
                'gw_gift_wrapper_display' => 'slider',
                'gw_ckout_enable' => 'enable',
                'gw_gift_wrapper_display_ckout' => 'slider',
                'gw_gift_wrapper_title' => 'Select Your Gift Wrapper',
                'gw_gift_wrapper_title_font_size' => '24',
                'gw_gift_wrapper_txt_in_cart' => 'Gift Wrapper',
                'gw_gift_wrapper_remove_gift_items' => 'enable',
                'gw_gift_wrapper_rule' => 'price',
                'gw_gift_wrapper_single_product_page'=>'enable',
                'gw_price_product' => '',
                'gw_price_cat' => '',
                'gw_price' => '100',
                'gw_gift_rule'=>'productbase',
                'gw_gift_show_wrapping'=>'beforecart',
                'gw_min_cart_qty' => '1',
                'gw_min_qty_cart_qty' => '1',
                'gw_allow_only_logged_in' => 'enable',               
                'gw_add_to_cart_text' => 'Add To Cart Gift Wrapper',
                'ocgw_product_add_to_cart_clr' => '#000000',
                'ocgw_product_add_to_cart_text_clr'=>'#ffffff',
                'gw_gift_wrapper_title_color'=>'#000000',
                'gw_gift_wrapper_open_single_product_page'=>'',
                'gw_gift_wrapper_msg_text'=>'Gift Wrapper Message'
               
            );
           
            foreach ($optionget as $key_optionget => $value_optionget) {

               $ocgw_comman[$key_optionget] = get_option( $key_optionget,$value_optionget );
               
            }
        }
    }

    OCGW_comman::instance();
}
?>