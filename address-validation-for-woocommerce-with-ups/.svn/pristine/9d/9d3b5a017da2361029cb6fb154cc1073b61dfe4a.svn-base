<?php

/*
  Plugin Name: UPS Address Validation and Suggestion for WooCommerce
  Plugin URI: www.moreaddons.com/
  Description: Address Validation and Suggestion for WooCommerce with UPS API.
  Version: 1.0.2
  Author: Sig
  Author URI: www.moreaddons.com/
  domain : ma-ups-addr-valid
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// =========== Define Section Start =====================//

define('MA_UPS_ADDR_VALID_MAIN_DIR', plugin_dir_url(__FILE__));
define('MA_UPS_ADDR_VALID_SETTINGS_KEY', 'ma_discount_settings_key');
require_once(ABSPATH . "wp-admin/includes/plugin.php");
// =========== Define Section End =====================//
//check woocommerce is active or !
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    if (!class_exists('MA_UPS_Addr_Valid')) {

        class MA_UPS_Addr_Valid {

            public function __construct() {
                add_action('init', array($this, 'ma_load_plugin_textdomain'));
                add_action('plugins_loaded', array($this, 'ma_load_vendors'));
                add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'ma_ups_addr_valid_action_links'));
                add_action('admin_menu', array($this, 'ma_ups_addr_valid_menu_page'));
                add_action('woocommerce_before_checkout_process', array($this, 'ma_ups_address_validation_call_back'));
            }

            function ma_load_vendors() {
                require_once('vendor/autoload.php');
            }

            public function ma_load_plugin_textdomain() {

                load_plugin_textdomain('ma-ups-addr-valid', false, dirname(plugin_basename(__FILE__)) . '/lang');
            }

            public function ma_ups_address_validation_call_back() {
                $output_array = (get_option('woocommerce_' . MA_UPS_ADDR_VALID_SETTINGS_KEY) != false) ? get_option('woocommerce_' . MA_UPS_ADDR_VALID_SETTINGS_KEY) : array();
                if (!empty($output_array)) {
                    if ($output_array['ups_switch'] != 'no') {

                        if (isset($_POST['ship_to_different_address'])) {
                            $ma_state = sanitize_text_field($_POST['shipping_state']);
                            $ma_city = strtoupper(sanitize_text_field($_POST['shipping_city']));
                            $ma_country = sanitize_text_field($_POST['shipping_country']);
                            $ma_zip = sanitize_text_field($_POST['shipping_postcode']);
                        } else {
                            $ma_state = sanitize_text_field($_POST['billing_state']);
                            $ma_city = strtoupper(sanitize_text_field($_POST['billing_city']));
                            $ma_country = sanitize_text_field($_POST['billing_country']);
                            $ma_zip = sanitize_text_field($_POST['billing_postcode']);
                        }
                        //error_log($ma_state . $ma_city);
                        $address = new \Ups\Entity\Address();
                        $address->setStateProvinceCode($ma_state);
                        $address->setCity($ma_city);
                        $address->setCountryCode($ma_country);
                        $address->setPostalCode($ma_zip);
                        if ($output_array['api_mode'] != 'test') {
                            $xav = new \Ups\SimpleAddressValidation($output_array['access_key'], $output_array['user_id'], $output_array['user_pwd'], true);
                        } else {
                            $xav = new \Ups\SimpleAddressValidation($output_array['access_key'], $output_array['user_id'], $output_array['user_pwd']);
                        }

                        try {
                            $response = $xav->validate($address);
                            $sugest_data = 'Suggestions: <ul>';
                            foreach ($response as $item) {

                                if ($item->Address->City === $ma_city && $item->Address->StateProvinceCode === $ma_state && $item->PostalCodeLowEnd === $ma_zip) {
                                    $valid = 1;
                                } else {
                                    $valid = 0;
                                    $sugest_data .= '<li><b>City:</b> ' . $item->Address->City . ' <b>State:</b> ' . $item->Address->StateProvinceCode . ' <b>PostalCode:</b> ' . $item->PostalCodeLowEnd . '</li>';
                                }
                            }
                            $sugest_data .= '</ul>';
                            if ($valid != 0) {
                                if ($output_array['user_note'] != '') {
                                    wc_add_notice(__($output_array['user_note']), 'success');
                                }
                            } else {
                                wc_add_notice(__($sugest_data), 'error');
                            }
                        } catch (Exception $e) {
                            var_dump($e);
                        }
                    }
                }
            }

            public function ma_ups_addr_valid_init() {

                require_once('includes/ma-ups-addr-valid-main-class.php');
            }

            public function ma_ups_addr_valid_action_links($links) {
                $plugin_links = array(
                    '<a href="' . admin_url('admin.php?page=ma_ups_addr_valid_settings') . '">' . __('Settings', 'ma-ups-addr-valid') . '</a>',
                    //'<a href="#">' . __('Plugin Guide', 'ma-ups-addr-valid') . '</a>',
                    '<a href="https://wordpress.org/support/plugin/address-validation-for-woocommerce-with-ups">' . __('Support', 'ma-ups-addr-valid') . '</a>',
                );
                return array_merge($plugin_links, $links);
            }

            public function ma_ups_addr_valid_menu_page() {
                add_submenu_page('woocommerce', __('UPS Address Validation', 'ma-ups-addr-valid'), __('UPS Address Validation', 'ma-ups-addr-valid'), 'manage_woocommerce', 'ma_ups_addr_valid_settings', array($this, 'ma_ups_addr_valid_init'));
            }

        }

    }
    new MA_UPS_Addr_Valid();
} else {
    add_action('admin_notices','ma_ups_add_wc_admin_notices', 99);
    deactivate_plugins(plugin_basename(__FILE__));
    function ma_ups_add_wc_admin_notices()
    {
        is_admin() && add_filter('gettext', function($translated_text, $untranslated_text, $domain)
        {
            $old = array(
                "Plugin <strong>activated</strong>.",
                "Selected plugins <strong>activated</strong>."
            );
            $new = "<span style='color:red'>Address Validation and Suggestion for WooCommerce with UPS - WooCommerce is not Installed</span>";
            if (in_array($untranslated_text, $old, true)) {
                $translated_text = $new;
            }
            return $translated_text;
        }, 99, 3);
    }
    return;
}



