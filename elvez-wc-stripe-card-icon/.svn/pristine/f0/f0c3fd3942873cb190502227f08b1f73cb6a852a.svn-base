<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://elvez.co.jp
 * @since      1.0.0
 *
 * @package    Elvez_WC_Stripe_Card_Icon
 * @subpackage Elvez_WC_Stripe_Card_Icon/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Elvez_WC_Stripe_Card_Icon
 * @subpackage Elvez_WC_Stripe_Card_Icon/public
 * @author     Elvez, Inc. <info@elvez.co.jp>
 */
class Elvez_WC_Stripe_Card_Icon_Public {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->payment_icons = array();

		add_action( 'init', [$this, 'register_dependencies'] );

		add_filter( 'wc_stripe_payment_icons', [$this, 'store_payment_icons'] );
		add_filter( 'woocommerce_gateway_icon', [$this, 'manage_gateway_icon'], 10, 2 );

	}

	/**
	 * Register the stylesheets and scripts for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function register_dependencies() {

		$elvez_style_version = '1.1.8';
		$style_registered_ver = Elvez_WC_Stripe_Card_Icon::get_registered_version( 'elvez-style', 'styles' );
		if ( version_compare( $elvez_style_version, $style_registered_ver, '>' ) ) {
			wp_styles()->remove( 'elvez-style' );
			wp_register_style( 'elvez-style', plugin_dir_url( __FILE__ ) . 'css/elvez-style.css', array(), $elvez_style_version, 'all' );

		}

		/*
		$elvez_modal_version = '1.0.5';
		$modal_registered_ver = Elvez_WC_Stripe_Card_Icon::get_registered_version( 'elvez-modal', 'scripts' );
		if ( version_compare( $elvez_modal_version, $modal_registered_ver, '>' ) ) {
			wp_scripts()->remove( 'elvez-modal' );
			wp_register_script( 'elvez-modal', plugin_dir_url( __FILE__ ) . 'js/elvez-modal.js', array( 'jquery' ), $elvez_modal_version, false );
		}
		*/

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'elvez-style' );

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/elvez-wc-stripe-card-icon-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/elvez-wc-stripe-card-icon-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Store icon list from stripe payment_icons
	 *
	 * @since    1.0.0
	 */
	public function store_payment_icons( $payment_icons ) {
		$this->payment_icons = $payment_icons;
		return $payment_icons;
	}
	/**
	 * Customize icon list on woocommerce gateway icon.
	 *
	 * @since    1.0.0
	 */
	public function manage_gateway_icon( $icon_html, $payment_id ) {
		if ( $payment_id === 'stripe' ) {
			$icons = $this->payment_icons;
			$opts = Elvez_WC_Stripe_Card_Icon_Admin::get_option_display_icons();

			$icons_str = '';
			foreach( $opts as $key => $value ) {
				$icons_str .= isset( $icons[$key] ) && 1 === intval($value) ? $icons[$key] : '';
			}
			$icon_html = $icons_str;
		}
		return $icon_html;
	}
}
