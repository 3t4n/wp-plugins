<?php

namespace WPCSN;

defined( 'ABSPATH' ) || exit;

use WC_AJAX;

class initialization {
	function __construct() {
		add_action( 'init', [ $this, 'init' ] );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_script' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_style' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_script' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_style' ] );

		// backend ajax
		add_action( 'wp_ajax_wpcsn', [ $this, 'ajax' ] );
		// frontend ajax
		add_action( 'wc_ajax_wpcsn', [ $this, 'ajax' ] );

		add_action( 'wp_footer', [ $this, 'get_footer' ] );
		add_filter( 'woocommerce_add_to_cart_fragments', [ $this, 'cart_fragments' ] );
		add_filter( 'plugin_action_links', [ $this, 'action_links' ], 10, 2 );
		add_filter( 'plugin_row_meta', [ $this, 'row_meta' ], 10, 2 );
	}

	function init() {
		load_plugin_textdomain( 'wpc-smart-notification', false, basename( WPCSN_DIR ) . '/languages/' );

		// add image sizes
		add_image_size( 'wpcsn-small', 80, 80, true );
	}

	function register_settings() {
		// settings
		register_setting( 'wpcsn_settings', 'wpcsn_settings' );
		// localization
		register_setting( 'wpcsn_localization', 'wpcsn_localization' );
	}

	function ajax() {
		include WPCSN_DIR . '/core/ajax-definition.php';
		new ajax;
		die;
	}

	function enqueue_style( $hook ) {
		wp_enqueue_style( 'wpcsn', WPCSN_URI . 'assets/css/frontend.css', false, WPCSN_VERSION );
	}

	function enqueue_script( $hook ) {
		global $post;

		$data = [
			'ID'          => isset( $post->ID ) && is_product() ? $post->ID : 0,
			'wc_ajax_url' => WC_AJAX::get_endpoint( '%%endpoint%%' ),
			'nonce'       => wp_create_nonce( 'wpcsn' ),
		];

		wp_enqueue_script( 'wpcsn', WPCSN_URI . 'assets/js/frontend.js', [ 'jquery' ], WPCSN_VERSION, true );
		wp_localize_script( 'wpcsn', 'wpcsn_vars', $data );
	}

	function admin_enqueue_style( $hook ) {
		if ( str_contains( $hook, 'wpcsn' ) ) {
			wp_enqueue_style( 'noty', WPCSN_URI . 'assets/css/noty.css', false, WPCSN_VERSION );
			wp_enqueue_style( 'tipsy', WPCSN_URI . 'assets/css/tipsy.css', false, WPCSN_VERSION );
			wp_enqueue_style( 'select2', WPCSN_URI . 'assets/css/select2.min.css', false, WPCSN_VERSION );
			wp_enqueue_style( 'wpcsn', WPCSN_URI . 'assets/css/backend.css', false, WPCSN_VERSION );
		}
	}

	function admin_enqueue_script( $hook ) {
		if ( str_contains( $hook, 'wpcsn' ) ) {
			wp_enqueue_media();
			wp_enqueue_script( 'noty', WPCSN_URI . 'assets/js/noty.min.js', [ 'jquery' ], WPCSN_VERSION, true );
			wp_enqueue_script( 'tipsy', WPCSN_URI . 'assets/js/tipsy.min.js', [ 'jquery' ], WPCSN_VERSION, true );
			wp_enqueue_script( 'select2', WPCSN_URI . 'assets/js/select2.min.js', [ 'jquery' ], WPCSN_VERSION, true );
			wp_enqueue_script( 'wpcsn', WPCSN_URI . 'assets/js/backend.js', [
				'jquery',
				'jquery-ui-sortable',
				'select2',
				'tipsy',
				'noty'
			], WPCSN_VERSION, true );
			$data = [
				'nonce'     => wp_create_nonce( 'wpcsn' ),
				'save_fail' => esc_html__( 'Can\'t save data', 'wpc-smart-notification' )
			];
			wp_localize_script( 'wpcsn', 'wpcsn_vars', $data );
		}
	}

	function admin_menu() {
		add_submenu_page( 'wpclever', 'WPC Smart Notifications', 'Smart Notifications', 'manage_options', 'wpclever-wpcsn', [
			$this,
			'admin_menu_content'
		] );
	}

	function admin_menu_content() {
		include WPCSN_DIR . '/core/options.php';
		$options = options::get_instance();
		$options->get_html();
	}

	function get_footer() {
		if ( is_admin() ) {
			return;
		}

		$opts    = get_option( 'wpcsn_opts' );
		$disable = $opts['options']['disable'] ?? [];

		if ( ( in_array( 'cart', $disable ) && is_cart() ) || ( in_array( 'checkout', $disable ) && is_checkout() ) || ( in_array( 'mobile', $disable ) && wp_is_mobile() ) ) {
			return;
		}

		echo '<div class="wpcsn-notification"></div>';
	}

	function cart_fragments( $fragments ) {
		$fragments['.wpcsn-cart-data'] = self::get_cart();

		return $fragments;
	}

	public static function get_cart() {
		$cart_count    = WC()->cart->get_cart_contents_count();
		$cart_subtotal = WC()->cart->get_cart_subtotal();

		return '<span class="wpcsn-cart-data" data-count="' . esc_attr( $cart_count ) . '" data-subtotal="' . esc_attr( $cart_subtotal ) . '"> <span class="wpcsn-cart-subtotal">' . $cart_subtotal . '</span> <span class="wpcsn-cart-count">' . sprintf( ( 1 === (int) $cart_count ? Wpcsn_Helper()->localization( 'item',/* translators: cart count */ esc_html__( '(%s item)', 'wpc-smart-notification' ) ) : Wpcsn_Helper()->localization( 'items',/* translators: cart count */ esc_html__( '(%s items)', 'wpc-smart-notification' ) ) ), number_format_i18n( $cart_count ) ) . '</span></span>';
	}

	public static function get_instance() {
		global $wpcsn;

		if ( empty( $wpcsn ) ) {
			$wpcsn = new self();
		}

		return $wpcsn;
	}

	function action_links( $links, $file ) {
		static $plugin;

		if ( ! isset( $plugin ) ) {
			$plugin = plugin_basename( WPCSN_DIR . '/' . basename( WPCSN_FILE ) );
		}

		if ( $plugin === $file ) {
			$settings             = '<a href="' . esc_url( admin_url( 'admin.php?page=wpclever-wpcsn&tab=settings' ) ) . '">' . esc_html__( 'Settings', 'wpc-smart-notification' ) . '</a>';
			$links['wpc-premium'] = '<a href="' . esc_url( admin_url( 'admin.php?page=wpclever-wpcsn&tab=premium' ) ) . '" style="color: #c9356e">' . esc_html__( 'Premium Version', 'wpc-smart-notification' ) . '</a>';
			array_unshift( $links, $settings );
		}

		return (array) $links;
	}

	function row_meta( $links, $file ) {
		static $plugin;

		if ( ! isset( $plugin ) ) {
			$plugin = plugin_basename( WPCSN_DIR . '/' . basename( WPCSN_FILE ) );
		}

		if ( $plugin === $file ) {
			$row_meta = [
				'support' => '<a href="' . esc_url( WPCSN_DISCUSSION ) . '" target="_blank">' . esc_html__( 'Community support', 'wpc-smart-notification' ) . '</a>',
			];

			return array_merge( $links, $row_meta );
		}

		return (array) $links;
	}
}