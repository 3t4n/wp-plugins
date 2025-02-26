<?php
/*
* @link              https://www.simplesolutions.hr
* @since             1.0
* @package           WCML-HNB-MultiCurrency
*
* @wordpress-plugin
* Plugin Name:       HNB Multi Currency for WPML
* Plugin URI:        https://simplesolutions.hr/plugins/hnb/
* Description:       HNB (Croatian National Bank) exchange rate for WPML WooCommerce Multilingual Multi Currency shop's.
* Version:           1.1
* Author:            Mario Rendić
* Author URI:        https://www.simplesolutions.hr
* License:           GPL-3.0+
* License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
* Text Domain:       WCML-HNB-MultiCurrency
* Last Updated:      29.02.20.
*/


class HNB_Exchange_Rates
{
    /**
     * Add exchange rate services.
     */
    public function add_exchange_rate_services()
    {
        // WCML not installed & active.
        if ( !defined( 'WCML_VERSION' ) ) {
            return false;
        }
        global  $woocommerce_wpml ;
        require_once( plugin_dir_path(__DIR__) . 'woocommerce-multilingual/classes/multi-currency/class-wcml-exchange-rates.php' );
        require_once( plugin_dir_path(__DIR__) . 'woocommerce-multilingual/classes/multi-currency/exchange-rate-services/class-wcml-exchange-rate-service.php' );
        require_once 'class-hnb-exchange.php';
        $woocommerce_wpml->multi_currency->exchange_rate_services->add_service( 'hnb', new WCML_Exchange_Rates_HNB() );
    }
     /**
     * Run the plugin.
     */
     public function hnb_run()
     {
        add_action( 'init', array( $this, 'add_exchange_rate_services' ) );
    }

}


/**
 * Return instance of HNB_Exchange_Rates.
 *
 * @return HNB_Exchange_Rates
 */
function hnb_exchange_rates()
{
    static  $plugin ;

    if ( !isset( $plugin ) ) {
        require_once( plugin_dir_path(__DIR__) . 'woocommerce-multilingual/classes/multi-currency/class-wcml-exchange-rates.php' );
        require_once( plugin_dir_path(__DIR__) . 'woocommerce-multilingual/classes/multi-currency/exchange-rate-services/class-wcml-exchange-rate-service.php' );
        require_once 'class-hnb-exchange.php';
        $plugin = new HNB_Exchange_Rates();
    }

    return $plugin;
}

hnb_exchange_rates()->hnb_run();