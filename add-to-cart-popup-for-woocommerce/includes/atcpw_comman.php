<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('ATCPW_comman')) {

    class ATCPW_comman {

        protected static $instance;

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
             return self::$instance;
        }

        function init() {
            global $atcpw_comman;
            $optionget = array(
                'atcpw_ajax_cart' => 'yes',
                'atcpw_auto_open' => 'yes',
                'atcpw_trigger_class' => 'yes',
                'atcpw_header_cart_icon' => 'yes',
                'atcpw_header_close_icon' => 'yes',
                'atcpw_freeshiping_herder' => 'yes',
                'atcpw_freeshiping_herder_txt' => 'You are {shipping_total} away from free shipping.',
                'atcpw_freeshiping_then_herder_txt' => 'Congrats! You get free shipping.',
                'atcpw_loop_img' => 'yes',
                'atcpw_loop_product_name' => 'yes',
                'atcpw_loop_product_price' => 'yes',
                'atcpw_loop_total' => 'yes',
                'atcpw_loop_link' => 'yes',
                'atcpw_loop_delete' => 'yes',
                'atcpw_qty_box' => 'yes',
                'atcpw_total_shipping_option' => 'yes',
                'atcpw_discount_show_cart' => 'yes',
                'atcpw_total_tax_option' => 'yes',
                'atcpw_total_all_option' => 'yes',
                'atcpw_cart_option' => 'yes',
                'atcpw_checkout_option' => 'yes',
                'atcpw_conshopping_option' => 'yes',
                'atcpw_prodslider_desktop' => 'yes',
                'atcpw_prodslider_mobile' => 'yes',
                'atcpw_cart_show_hide' => 'atcpw_cart_show',
                'atcpw_show_cart_icn' => 'yes',
                'atcpw_cart_check_page' => 'yes',
                'atcpw_mobile' => 'yes',
                'atcpw_product_cnt' => 'yes',
                'atcpw_product_cnt_type' => 'sum_qty',
                'atcpw_cart_ordering' => 'desc',
                'atcpw_on_pages' => '',
                'atcpw_conshipping_link' => '',
                'atcpw_orgcart_link' => '',
                'atcpw_orgcheckout_link' => '',
                'atcpw_head_ft_size' => '20',
                'atcpw_head_ft_clr' => '#000000',
                'oatcpw_shop_icon' => 'shop_icon_1',
                'atcpw_header_cart_icon_clr' => '#000000',
                'oatcpw_close_icon' => 'close_icon',
                'atcpw_header_close_icon_clr' => '#000000',
                'atcpw_header_shipping_text_color' => '#000000',
                'atcpw_product_ft_size' => '16',
                'atcpw_product_ft_clr' => '#000000',
                'atcpw_cart_empty_hide_show' => 'show',
                'oatcpw_delete_icon' => 'ocpc_trash',
                'atcpw_delect_icon_clr' => '#000000',
                'atcpw_sld_product_ft_size' => '',
                'atcpw_sld_product_ft_clr' => '',
                'atcpw_ship_txt' => 'To find out your shipping cost , Please proceed to checkout.',
                'atcpw_ship_ft_size' => '18',
                'atcpw_ship_ft_clr' => '#000000',
                'atcpw_ft_btn_clr' => '#9e654f',
                'atcpw_ft_btn_txt_clr' => '#ffffff',
                'atcpw_ft_btn_mrgin' => '5',
                'ocpc_atcpw_icon' => 'atcpw_qatcpw_icon',
                'atcpw_basket_shape' => 'square',
                'atcpw_basket_position' => 'bottom-right',
                'atcpw_basket_count_position' => 'top-left',
                'atcpw_basket_icn_size' => '60',
                'atcpw_basket_off_vertical' => '0',
                'atcpw_basket_off_horizontal' => '0',
                'atcpw_basket_bg_clr' => '#727272',
                'atcpw_basket_clr' => '#ffffff',
                'atcpw_cnt_bg_clr' => '#000000',
                'atcpw_cnt_txt_clr' => '#ffffff',
                'atcpw_cnt_txt_size' => '15',
                'atcpw_head_title' => 'Your Cart',
                'atcpw_qty_text' => 'QTY',
                'atcpw_cart_is_empty' => 'Your Cart Is Empty',
                'atcpw_slider_atcbtn_txt' => 'Add to cart',
                'atcpw_slider_vwoptbtn_txt' => 'View Options',
                'atcpw_slider_heading_text' => 'Feature Products',
                'atcpw_subtotal_txt' => 'Subtotal',
                'atcpw_empty_cart_button_text' => 'Empty Your Cart',
                'atcpw_cart_txt' => 'View Cart',
                'atcpw_checkout_txt' => 'Checkout',
                'atcpw_conshipping_txt' => 'Continue Shopping',
                'atcpw_shipping_text_trans' => 'Shipping',
                'atcpw_apply_taxt_testx' => 'Tax',
                'atcpw_discount_text_trans' => 'Discount',
                'atcpw_apply_total_text' => 'Total',
            );

            foreach ($optionget as $key_optionget => $value_optionget) {
               $atcpw_comman[$key_optionget] = get_option( $key_optionget,$value_optionget );
            }
        }
    }
    ATCPW_comman::instance();
}