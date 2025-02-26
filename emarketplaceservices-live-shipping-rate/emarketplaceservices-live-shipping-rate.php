<?php

/**
 * Plugin Name: Emarketplaceservices Live Shipping Rate
 * Description: Integrates with Emarketplaceservices.com allowing merchants to provide accurate shipping quotes for their customers.
 * Version: 1.0.3
 * Author: Tristone Cloud Inc.
 * Author URI: http://www.emarketplaceservices.com
 * WC requires at least: 3.0.0
 * WC tested up to: 4.2.0
 */

/** 
 * Add a new shiping method class to woocommerce
 */

/**
 * Exit if accessed directly
 **/
if (!defined('ABSPATH')) {
    exit;
}

add_action('plugins_loaded', 'emarketplaceservices_live_shipping_rate_init', 0);
function emarketplaceservices_live_shipping_rate_init()
{
    if (!class_exists('WC_Shipping_Method')) return; // if the Woocommerce shiping method class is not available, do nothing
    class WC_Shipping_EMS extends WC_Shipping_Method
    {
        public function __construct()
        {
            $this->log               = true;
            $this->id                = 'ems';
            $this->method_title      = __('EMS Live Shipping Rate Module', 'woocommerce');

            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();

            // Define user set variables
            $this->title             = $this->get_option('title');
            $this->api_url           = $this->get_option('api_url');
            $this->api_username      = $this->get_option('api_username');
            $this->api_channel       = $this->get_option('api_channel');
            $this->api_token         = $this->get_option('api_token');
            $this->channel           = $this->get_option('channel');

            add_action('woocommerce_update_options_shipping_' . $this->id, array(&$this, 'process_admin_options'));
        }

        function init_form_fields()
        {
            $this->form_fields = array(
                'enabled' => array(
                    'title' => __('Enable/Disable', 'woocommerce'),
                    'type' => 'checkbox',
                    'label' => __('Enable EMS Live Shipping Rate Module', 'woocommerce'),
                    'default' => 'yes'
                ),
                'title' => array(
                    'title' => __('Title', 'woocommerce'),
                    'type' => 'text',
                    'description' => __('This controls the title which the user sees during checkout.', 'woocommerce'),
                    'default' => __('EMS shipping', 'woocommerce'),
                    'desc_tip'      => true,
                ),
                'api_url' => array(
                    'title' => __('API URL', 'woocommerce'),
                    'type' => 'text',
                    'description' => 'The live rate API URL',
                    'default' => 'https://api.emarketplaceservices.com/client/api/v1/carriers/query'
                ),
                'api_username' => array(
                    'title' => __('API Username', 'woocommerce'),
                    'type' => 'text',
                    'description' => 'Your EMS login Email address',
                    'default' => ''
                ),
                'api_token' => array(
                    'title' => __('API Token', 'woocommerce'),
                    'type' => 'text',
                    'description' => 'EMS API Token.  You can generate it from your EMS profile page',
                    'default' => ''
                ),
                'api_channel' => array(
                    'title' => __('Channel', 'woocommerce'),
                    'type' => 'text',
                    'description' => 'Your WooCommerce channel ID in EMS.  You can view your channl ID on your WooCommerce settings dialog in EMS',
                    'default' => ''
                ),
            );
        }

        /**
         * calculate_shipping function.
         *
         * @access public
         * @param array $package (default: array())
         * @return void
         */
        function calculate_shipping($package = array())
        {
            global $woocommerce;

            $weight_unit = get_option('woocommerce_weight_unit');
            $dimension_unit = get_option('woocommerce_dimension_unit');
            $location = wc_get_base_location();
            $currency = get_woocommerce_currency();

            $from = array(
                'address1' => get_option('woocommerce_store_address'),
                'city' => get_option('woocommerce_store_city'),
                'state' => $location['state'],
                'zip' => get_option('woocommerce_store_postcode'),
                'country' => $location['country'],
            );
            $to = array(
                'address1' => $package['destination']['address'],
                'city' => $package['destination']['city'],
                'province' => $package['destination']['state'],
                'zip' => $package['destination']['postcode'],
                'country' => $package['destination']['country']
            );
            $items = array();
            foreach ($package['contents'] as $item_id => $value) {
                $_product = $value['data'];;
                $dimensions = $_product->get_dimensions(false);
                $height = $_product->get_height();
                $width = $_product->get_width();
                $length = $_product->get_length();
                $weight = $_product->get_weight();
                $sku = $_product->get_sku();

                $weight = wc_get_weight($weight, 'kg', $weight_unit);
                $length = wc_get_dimension($length, 'cm', $dimension_unit);
                $width = wc_get_dimension($width, 'cm', $dimension_unit);
                $height = wc_get_dimension($height, 'cm', $dimension_unit);

                $items[] = array('sku' => $sku, 'lengthInCM' => $length, 'widthInCM' => $width, 'heightInCM' => $height, 'weightInKG' => $weight, 'quantity' => $value['quantity']);
            }

            $data = array("from" => $from, "to" => $to, "items" => $items, "currency" => $currency);

            //debug data
            $this->ems_write_log(print_r($data, true) . print_r($location, true) . print_r($package['destination'], true));
            $headers = array(
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($this->api_username . ':' . $this->api_token),
                'channel' => '' . $this->api_channel,
                'Content-Length' => '' . strlen(json_encode($data))
            );

            $response_data = $this->sendRemote($this->api_url, json_encode($data), $headers);
            $this->ems_write_log(print_r($response_data, true));
            if (is_array($response_data->rates) && count($response_data->rates)) {
                foreach ($response_data->rates as $rate_item) {
                    if (isset($rate_item->amount) && $rate_item->amount > 0) {
                        $amount = $rate_item->amount / 100;
                        $rate = array(
                            'id'    => $rate_item->service,
                            'label' => $rate_item->carrier . '(' . $rate_item->service . ')' . '(' . $rate_item->transitTime . ')',
                            'cost'  => $amount
                        );

                        $this->add_rate($rate);
                    }
                }
            } else {
                return true;
            }
        }

        function sendRemote($url, $data_string, $headers)
        {
            $request = wp_remote_post($url, array(
                'headers'     => $headers,
                'body'        => $data_string,
                'httpversion' => '1.0',
                'sslverify'   => false,
                'method'      => 'POST',
                'data_format' => 'body',
                'timeout'     => 45,

            ));

            if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
                $this->ems_write_log(print_r($request, true));
                return array();
            } else {
                $response = wp_remote_retrieve_body($request);
                $this->ems_write_log(print_r($response, true));
                return json_decode($response);
            }
        }

        function ems_write_log($message)
        {
            if ($this->log) {
                $ppath = plugin_dir_path(__FILE__);
                $fp = fopen($ppath . 'log.txt', 'a');
                fwrite($fp, $message);
                fclose($fp);
            }
        }
    }

    /* Add our new shipping method to the woocommerce shipping methods 
	------------------------------------------------------------ */

    add_filter('woocommerce_shipping_methods', 'add_woocommerce_ems_shipping_method');
    function add_woocommerce_ems_shipping_method($methods)
    {
        $methods[] = 'WC_Shipping_EMS';
        return $methods;
    }
}
