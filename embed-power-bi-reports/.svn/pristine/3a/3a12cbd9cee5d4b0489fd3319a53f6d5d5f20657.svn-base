<?php

/**
 * Plugin Name: PowerBI Embed Reports
 * Plugin URI: https://plugins.miniorange.com/
 * Description: This plugin will allow you to embed Microsoft Power BI reports, dashboards, tiles, Q & A, etc in the WordPress site.
 * Version: 1.1.9
 * Author: miniOrange
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package embed-microsoft-power-bi-reports
 */

namespace MoEmbedPowerBI;

require_once __DIR__ . '/vendor/autoload.php';

use MoEmbedPowerBI\Controller\powerBIConfig;
use MoEmbedPowerBI\View\adminView;
use MoEmbedPowerBI\Controller\adminController;
use MoEmbedPowerBI\Observer\adminObserver;
use MoEmbedPowerBI\View\feedbackForm;
use MoEmbedPowerBI\LoginFlow\LoginButton;
use MoEmbedPowerBI\LoginFlow\OAuthSSO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MO_EPBR_PLUGIN_FILE', __FILE__ );
define( 'MO_EPBR_PLUGIN_URL', plugins_url( '', __FILE__ ) );
define( 'MO_EPBR_PLUGIN_VERSION', '1.1.9' );

/**
 * Class to handle the plugin main functions, enqueue scripts, action triggers and load hooks.
 */
class MOEPBR {

	/**
	 * Holds the instance of MOEPBR class.
	 *
	 * @var MOEPBR
	 */
	private static $instance;

	/**
	 * Object instance(MOEPBR) getter method.
	 *
	 * @return MOEPBR
	 */
	public static function mo_epbr_load_instance() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
			self::$instance->mo_epbr_load_hooks();
		}
		return self::$instance;
	}

	/**
	 * Function to load all hooks throughout the file.
	 *
	 * @return void
	 */
	public function mo_epbr_load_hooks() {
		add_action( 'login_form', array( LoginButton::get_controller(), 'mo_epbr_login_button' ) );
		add_action( 'init', array( OAuthSSO::get_controller(), 'mo_epbr_perform_sso' ) );
		add_action( 'wp_login', array( $this, 'mo_epbr_redirect_user' ), 10, 2 );
		add_action( 'admin_menu', array( $this, 'mo_epbr_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'mo_epbr_settings_style' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'mo_epbr_settings_script' ) );
		add_action( 'admin_footer', array( feedbackForm::get_view(), 'mo_epbr_display_feedback_form' ) );
		add_action( 'admin_init', array( adminController::get_controller(), 'mo_epbr_admin_controller' ) );
		add_action( 'init', array( adminObserver::get_observer(), 'mo_epbr_admin_observer' ) );
		add_shortcode( 'MO_API_POWER_BI', array( powerBIConfig::get_controller(), 'mo_embed_shortcode_power_bi' ) );
	}

	/**
	 * Function to show the plugin in the admin menu.
	 *
	 * @return void
	 */
	public function mo_epbr_admin_menu() {
		$page = add_menu_page(
			'WP Embed Power BI reports Settings ' . __( 'API Configuration', 'embed-power-bi-reports' ),
			'Embed Power BI Reports',
			'manage_options',
			'mo_epbr',
			array( adminView::get_view(), 'mo_epbr_menu_display' ),
			plugin_dir_url( __FILE__ ) . 'images/miniorange.png'
		);
	}

	/**
	 * Function to redirect user after login via azure ad to the page where report is embedded.
	 *
	 * @return void
	 */
	public function mo_epbr_redirect_user() {
			$current_wordpress_home_url = home_url();
		if ( isset( $_COOKIE['rurlcookie'] ) && ! empty( $_COOKIE['rurlcookie'] ) ) {
			$rurl = sanitize_text_field( wp_unslash( $_COOKIE['rurlcookie'] ) );
		} else {
			$rurl = '';
		}
		if ( isset( $_COOKIE['rurlcookie'] ) ) {
			$rurl = esc_url( $rurl );
			echo ( " <script>window.location.href = '" . esc_js( $rurl ) . "'</script>" );
		} else {
			$current_wordpress_home_url = esc_url( $current_wordpress_home_url );
			echo ( "<script>window.location.href = '" . esc_js( $current_wordpress_home_url ) . "'</script>" );}
			exit;
	}

	/**
	 * Function to load all required styles.
	 *
	 * @param string $page holds current page value.
	 * @return void
	 */
	public function mo_epbr_settings_style( $page ) {
		if ( 'toplevel_page_mo_epbr' !== $page ) {
			return;
		}
		$css_url = esc_url( plugins_url( 'includes/css/mo_epbr_settings.css', __FILE__ ) );
		wp_enqueue_style( 'mo_epbr_css', $css_url, array(), MO_EPBR_PLUGIN_VERSION, 'all' );
		$css_license_view_url = plugins_url( 'includes/css/license.css', __FILE__ );
		wp_enqueue_style( 'mo_epbr_license_view_css', $css_license_view_url, array(), MO_EPBR_PLUGIN_VERSION, 'all' );
		//phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( ( isset( $_REQUEST['page'] ) && 'mo_epbr' === $_REQUEST['page'] ) ) {
			wp_enqueue_style( 'mo_power_bi_phone_css', esc_url( plugins_url( 'includes/css/phone.css', __FILE__ ) ), array(), MO_EPBR_PLUGIN_VERSION, 'all' );
			wp_enqueue_style( 'mo_power_bi_date_time_css', esc_url( plugins_url( 'includes/css/datetime_style_settings.css', __FILE__ ) ), array(), MO_EPBR_PLUGIN_VERSION, 'all' );
			wp_enqueue_style( 'mo_epbr_css_powerbi_demo', plugins_url( '/includes/css/mo_epbr_demorequest.css', __FILE__ ), array(), MO_EPBR_PLUGIN_VERSION, 'all' );
			wp_enqueue_style( 'mo_epbr_supportform_css', plugins_url( 'includes/css/mo_epbr_supportform.css', __FILE__ ), array(), MO_EPBR_PLUGIN_VERSION );
		}
	}

	/**
	 * Function to load all required scripts.
	 *
	 * @param string $page holds current page value.
	 * @return void
	 */
	public function mo_epbr_settings_script( $page ) {
		if ( 'toplevel_page_mo_epbr' !== $page ) {
			return;
		}
		$phone_js_url      = plugins_url( 'includes/js/phone.js', __FILE__ );
		$timepicker_js_url = plugins_url( 'includes/js/timepicker.min.js', __FILE__ );
		$select2_js_url    = plugins_url( 'includes/js/select2.min.js', __FILE__ );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'mo_epbr_phone_js', $phone_js_url, array(), MO_EPBR_PLUGIN_VERSION, 'all' );
		wp_enqueue_script( 'mo_epbr_timepicker_js', $timepicker_js_url, array(), MO_EPBR_PLUGIN_VERSION, 'all' );
		wp_enqueue_script( 'mo_epbr_select2_js', $select2_js_url, array(), MO_EPBR_PLUGIN_VERSION, 'all' );
		wp_enqueue_script( 'mo_epbr_js_powerbi_display', plugins_url( 'includes/js/mo_epbr_powerBI_display.js', __FILE__ ), array(), MO_EPBR_PLUGIN_VERSION, 'all' );
		wp_enqueue_script( 'mo_epbr_js_supportform_js', plugins_url( 'includes/js/mo_epbr_supportform.js', __FILE__ ), array(), MO_EPBR_PLUGIN_VERSION, true );
	}
}
MOEPBR::mo_epbr_load_instance();
