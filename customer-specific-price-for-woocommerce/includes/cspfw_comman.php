<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('CSPFW_comman')) {

    class CSPFW_comman {

        protected static $instance;

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
             return self::$instance;
        }

        function init() {
            global $cspfw_comman;
            $optionget = array(
                'cspfw_enable_features' => 'yes',
                'cspfw_show_single_product_page' => 'yes',
                'cspfw_single_product_page_price_heading_text_align' => 'center',
                'cspfw_single_product_page_price_heading_text' => 'Specific Discount For Quantity',
                'cspfw_fixed_price_text' => 'Quantity from {min} To {max} than fix price is {price}',
                'cspfw_fixed_increase_price_text' => 'Quantity from {min} To {max} than fixed increase price is {price}',
                'cspfw_fixed_decrease_price_text' => 'Quantity from {min} To {max} than fixed decrease price is {price}',
                'cspfw_percentage_increase_price_text' => 'Quantity from {min} To {max} than percentage increase price is {percentage}',
                'cspfw_percentage_decrease_price_text' => 'Quantity from {min} To {max} than percentage decrease price is {percentage}',
                'cspfw_rule_bg_color' => '#7a7a7a',
                'cspfw_rule_border_color' => '#727272',
                'cspfw_heading_bg_color' => '#0f0f0f',
                'cspfw_heading_text_color' => '#ffffff',
                'cspfw_message_text_color' => '#ffffff',
            );

            foreach ($optionget as $key_optionget => $value_optionget) {
               $cspfw_comman[$key_optionget] = get_option( $key_optionget,$value_optionget );
            }
        }
    }
    CSPFW_comman::instance();
}