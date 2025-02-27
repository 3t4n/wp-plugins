<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name:       DNI WooCommerce
 * Description:       Add the DNI field in the WooCommerce checkout
 * Version:           1.0.9
 * Author:            Camilo
 * License: GPLv3 or later
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Author URI:        https://camilowp.com/
 * Text Domain:       dni-woocommerce
 * Domain Path:       /languages
 * WC tested up to: 4.1.0
 */
if (! defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}
//Check woocommerce
require_once ABSPATH . 'wp-admin/includes/plugin.php';
if (is_plugin_active('woocommerce/woocommerce.php') || is_network_only_plugin('woocommerce/woocommerce.php') ) {
    if (!class_exists('DNI_woocommerce') ) {

        final class DNI_woocommerce
        {
            public $version = '1.0.7';

            protected static $_instance = null;

            public static function instance()
            {
                if (is_null(self::$_instance) ) {
                    self::$_instance = new self();
                }
                return self::$_instance;
            }

            public function __construct()
            {
                add_action('init', array( $this, 'load_translation' ));
                add_filter('woocommerce_billing_fields', array( $this, 'woocommerce_billing_fields' ), 10, 2);
                add_filter('woocommerce_my_account_my_address_formatted_address', array( $this, 'woocommerce_my_account_my_address_formatted_address' ), 10, 3);
                add_filter('woocommerce_localisation_address_formats', array( $this, 'woocommerce_localisation_address_formats' ));
                add_filter('woocommerce_formatted_address_replacements', array( $this, 'woocommerce_formatted_address_replacements' ), 10, 2);
                add_filter('woocommerce_order_formatted_billing_address', array( $this, 'woocommerce_order_formatted_billing_address' ), 10, 2);
                add_filter('woocommerce_customer_meta_fields', array( $this, 'woocommerce_customer_meta_fields' ));
                add_filter('woocommerce_admin_billing_fields', array( $this, 'woocommerce_admin_billing_fields' ));
                add_action('woocommerce_checkout_process', array( $this, 'woocommerce_checkout_process' ));
                add_action('woocommerce_process_shop_order_meta', array( $this, 'woocommerce_process_shop_order_meta' ));

            }


             //Load Translations

            public function load_translation()
            {
                load_plugin_textdomain('dni-woocommerce', false, dirname(plugin_basename(__FILE__)) . '/languages');
            }


            public function woocommerce_localisation_address_formats($address_formats)
            {
                $address_formats['ES'] = "\n{name}\n{vat_number}\n{company}\n{address_1}\n{address_2}\n{postcode} {city} - {state}\n{country}";
                return $address_formats;
            }

            public function woocommerce_billing_fields( $fields, $country )
            {
                $new_field = array(
                 'billing_vat_number' => array(
                 'label'     => __('DNI', 'dni-woocommerce'),
                 'placeholder'   => __('Enter the number of your ID', 'dni-woocommerce'),
                 'required'  => true,
                 'class'     => array('form-row-wide'),
                 'clear'     => true,
                 'sanitize_callback' => 'sanitize_text_field',
                 'maxlength' => 9
                )
                );

                return array_merge(array_slice($fields, 0, 2), $new_field, array_slice($fields, 2));


            }


            public function woocommerce_my_account_my_address_formatted_address( $fields, $customer_id, $name )
            {
                return $fields += array(
                'vat_number' => get_user_meta($customer_id, $name . '_vat_number', true),
                );
            }

            public function woocommerce_formatted_address_replacements( $replace, $args)
            {
                return $replace += array(
                '{vat_number}' => (isset($args['vat_number']) && $args['vat_number'] != '') ? $args['vat_number'] : '',
                '{vat_number_upper}' => strtoupper((isset($args['vat_number']) && $args['vat_number'] != '') ? __('DNI: ', 'dni-woocommerce') . $args['vat_number'] : ''),
                );
            }

            public function woocommerce_order_formatted_billing_address($address, $order)
            {
                return $address += array(
                'vat_number'    => $order->get_meta('_billing_vat_number'),
                );
            }

            public function plugin_url()
            {
                return untrailingslashit(plugins_url('/', __FILE__));
            }

            public function woocommerce_customer_meta_fields($fields)
            {
                 $fields['billing']['fields'] += array(
                 'billing_vat_number' => array(
                 'label' => __('DNI', 'dni-woocommerce'),
                 'description' => ''

                   ),
                 );
                 return $fields;
            }

            public function woocommerce_admin_billing_fields($fields)
            {
                return $fields += array(
                 'vat_number' => array(
                 'label'     => __('DNI', 'dni-woocommerce'),
                 'show'   => true
                ),
                );
            }


            //Validation
            public function woocommerce_checkout_process()
            {
                if (is_checkout() ) {
                      global $woocommerce;
                    if (! (preg_match('/^[0-9]{8}[a-zA-Z]{1}$/D', $_POST['billing_vat_number']))) {
                        wc_add_notice(__('Please enter a valid DNI', 'dni-woocommerce'), 'error');
                    }
                }
            }


            public function woocommerce_process_shop_order_meta()
            {
                if (is_admin() ) {
                      global $woocommerce;
                    if (! (preg_match('/^[0-9]{8}[a-zA-Z]{1}$/D', $_POST['_billing_vat_number']))) {
                        wp_die(__('This is a security measure. Please enter a valid DNI, with 8 digits and a letter. (Go back to enter a valid DNI)', 'dni-woocommerce'), 'error');
                    }
                }
            }


        }
    }

    DNI_woocommerce::instance();
}  else {
    add_action('admin_notices', 'dniwc_requiere_wc');
}

//Checks
function dniwc_requiere_wc()
{
    echo '<div class="error fade" id="message"><h3>' . '</h3><h4>' . __('This plugin requires WooCommerce active to run!', 'dni-woocommerce') . '</h4></div>';
}
