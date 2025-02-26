<?php

/**
 * Plugin Name: Arabic Woocommerce Middle east currencies
 * Plugin URI: https://t3rep.com
  * Description: اضافة اللغة العربية للاضافة ووكومرس الشهيرة لعمل متجر الكتروني على منصة ووردبريس  , هذه الترجمة بواسطة شركة تعريب لتعريب القوالب , يتم تحديث وتحسين الترجمة باستمرار واضافة العديد من المميزات الاضافية مثل ضبط اتجاهات خيارات المتجر داخل لوحة التحكم واضافة المزيد من العملات وتقديم الدعم الفني للترجمة باستمرار مع كل تحديث.
 * Version: 2.3.2
 * Author:t3rep.com
 * Author URI: http://t3rep.com
 * Text Domain: t3rep
 * Domain Path: /languages/
 * License: GPL2
 License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

  /**
   * Add GCC currencies
   */
  add_filter( 'woocommerce_currencies', 't3rep_currencies' );

  function t3rep_currencies( $currencies ) {
    $currencies['BHD'] = __( 'Bahraini Dinar', 't3rep' );
    $currencies['KWD'] = __( 'Kuwaiti Dinar', 't3rep' );
    $currencies['OMR'] = __( 'Omani Rial', 't3rep' );
    $currencies['QAR'] = __( 'Qatari Riyal', 't3rep' );
    $currencies['SAR'] = __( 'Saudi Riyal', 't3rep' );
    $currencies['EG'] = __( 'Egypt Pound', 't3rep' );
    return $currencies;
  }

  add_filter('woocommerce_currency_symbol', 't3rep_currencies_symbol', 10, 2);

  function t3rep_currencies_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
      case 'BHD': $currency_symbol = __( 'BHD', 't3rep' ); break;
      case 'KWD': $currency_symbol = __( 'KWD', 't3rep' ); break;
      case 'OMR': $currency_symbol = __( 'OMR', 't3rep' ); break;
      case 'QAR': $currency_symbol = __( 'QAR', 't3rep' ); break;
      case 'SAR': $currency_symbol = __( 'SAR', 't3rep' ); break;
      case 'EG': $currency_symbol = __( 'EG', 't3rep' ); break;
    }
    return $currency_symbol;
  }


  /**
   * Load Arabic translation from plugin directory
   */
  add_action( 'plugins_loaded', 't3rep_translation' );

  function t3rep_translation() {

    // Get current language
    $locale = apply_filters( 'plugin_locale', get_locale(), 'woocommerce' );

    // Load WooCommerce admin translation
    if ( is_admin() ) {
      load_textdomain( 'woocommerce', plugin_dir_path( __FILE__ ) . 'languages/woocommerce-admin-' . $locale . '.mo' );
    }

    // Load main WooCommerce translation
    load_textdomain( 'woocommerce', plugin_dir_path( __FILE__ ) . 'languages/woocommerce-' . $locale . '.mo' );

    // Load this plugin translation
    load_plugin_textdomain( 't3rep', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

  }


} 

wp_register_script( 'script',  plugin_dir_url( __FILE__ ) . 'js/woocommerce.js', array( 'jquery' ), '', true );

load_child_theme_textdomain( 'gdlr_translate', get_stylesheet_directory() . '/languages' );
	
 add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
      function load_admin_styles() {
        wp_enqueue_style( 'admin_css_bar',  plugin_dir_url( __FILE__ ) . '/css/admin-rtl.css', false, '1.0.0' );
        
      }