<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('POFW_comman')) {

    class POFW_comman {

        protected static $instance;

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
             return self::$instance;
        }
         function init() {
            global $pofw_comman;
            $optionget = array(
            	'pofw_change_button_title_preorder' => 'yes',
            	'pofw_add_button_title' => 'Preorder Now!',
            	'pofw_available_date_text' => 'Available on {date_format}',
                'pofw_available_cart_note_text' => 'This item will be available for shipping in %s days',
                'pofw_in_cart_after_text' => 'We detected that your cart has pre-order products. Please remove them before being able to add this product.',
                'pofw_in_cart_preorder_after_text' => 'We detected that you are trying to add a pre-order product in your cart. Please remove the rest of the products before proceeding.',
                'pofw_available_date_text_bg_color' => '#cccccc',
                'pofw_available_date_text_color' => '#000000',
                'pofw_available_cart_note_text_color' => '#ff0000',
            );
            // print_r($optionget);
            foreach ($optionget as $key_optionget => $value_optionget) {
               $pofw_comman[$key_optionget] = get_option( $key_optionget,$value_optionget );
            }
        }
    }

    POFW_comman::instance();
}
?>