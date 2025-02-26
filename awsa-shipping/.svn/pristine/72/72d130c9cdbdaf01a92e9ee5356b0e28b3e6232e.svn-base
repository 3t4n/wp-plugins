<?php

/**
 * Core Admin Class in plugin
 */
final class AWSA_Admin_Shipping {
	/**
	 * Session instance
	 *
	 * @var bool
	 */
	protected static $_instance = null;

	/**
	 * AWSA_Shipping Costructor
	 */
	public function __construct() {
		$this->define();
		$this->includes();
		$this->init_hooks();
		$this->enqueue_scripts();

		AWSA_WC_City_Input_Admin::init();
	}

	/**
	 * AWSA_Shipping Instance
	 *
	 * @return self()
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Set Constants
	 *
	 * @return void
	 */
	public function define() {
		define( 'AWSA_SHIPPING_PDA', AWSA_SHIPPING_PD );
		define( 'AWSA_SHIPPING_PDAI', AWSA_SHIPPING_PDI );
		define( 'AWSA_SHIPPING_PUA_JS', AWSA_SHIPPING_PU_JS );
		define( 'AWSA_SHIPPING_PUA_CSS', AWSA_SHIPPING_PU_CSS );
	}

	/**
	 * Include Files
	 *
	 * @return void
	 */
	public function includes() {
		require_once AWSA_SHIPPING_PDAI . 'admin-functions.php';
		// Include Files
	}

	/**
	 * Register actions enqueue scripts
	 *
	 * @return void
	 */
	public static function enqueue_scripts() {
		add_action( 'admin_enqueue_scripts', 'AWSA_Admin_Shipping_Scripts::enqueue', 99 );
	}

	/**
	 * Add Hooks - Actions and Filters
	 *
	 * @return void
	 */
	public function init_hooks() {
		add_action( 'admin_init', array( __CLASS__, 'init' ) );
		add_action( 'admin_post_awsa_shipping_settings', array( __CLASS__, 'update_shipping_settings' ) );
		add_action( 'admin_menu', array( __CLASS__, 'menu' ), 10 );
		add_action( 'add_meta_boxes', array( __CLASS__, 'meta_boxes' ), 10 );
	}

	/**
	 * Add order post actions module
	 *
	 * @param array $classes
	 * @return array
	 */
	public static function add_order_actions_modules( $classes ) {
		$classes['AWSA_Shipping_Order_Actions'] = 'AWSA_Shipping_Order_Actions';

		return $classes;
	}

	/**
	 * Init AWSA_Shipping after WordPress
	 *
	 * @return void
	 */
	public static function init() {
		// awsa-post-actions.php
		if ( function_exists( 'awsa_add_post_actions_meta_box' ) ) {
			awsa_add_post_actions_meta_box( 'shop_order' );

			add_action( 'awsa_shop_order_actions_meta_box_child_info', 'awsa_order_actions_meta_box_child_info' );

			// Shop_orders
			add_filter( 'awsa_post_actions_modules_shop_order', __CLASS__ . '::add_order_actions_modules' );

			// Parcel code
			add_filter( 'manage_edit-shop_order_columns', 'awsa_shipping_manage_posts_columns' );
			add_action( 'manage_shop_order_posts_custom_column', 'awsa_shipping_display_parcel_code_column', 10, 2 );
		}
	}

	/**
	 * Update Shipping Settings
	 *
	 * @return void
	 */
	public static function update_shipping_settings() {
		if ( isset( $_POST['awsa-save-shipping-settings'] ) && wp_verify_nonce( $_POST['_wpnonce'] ) ) {
			$a      = new AWSA_Shipping_Settings_Page_Fields();
			$values = $a->sanitize_fields( $_POST );
			$errors = $a->has_error( $values );
			if ( ! $errors ) {
				$a->update_settings( $values );
				AWSA_Shipping::register_activation();
			}
		}

		wp_redirect( $_SERVER['HTTP_REFERER'] );
	}

	/**
	 * Add Actions Menu
	 *
	 * @return void
	 */
	public static function menu() {

		if ( function_exists( 'awsa_admin_menus' ) ) {
			awsa_admin_menus()->add_node(
				array(
					'parent_slug' => 'awsa-shipping',
					'page_title'  => __( 'Shipping Settings', 'awsa-shipping' ),
					'menu_title'  => __( 'Shipping Settings', 'awsa-shipping' ),
					'capability'  => 'administrator',
					'menu_slug'   => 'awsa-shipping-settings',
					'function'    => 'awsa_admin_shipping_settings',
					'icon_url'    => '',
					'position'    => 102,
				)
			);
		} else {
			add_menu_page(
				__( 'Shipping Settings', 'awsa-shipping' ),
				__( 'Shipping Settings', 'awsa-shipping' ),
				'administrator',
				'awsa-shipping-settings',
				'awsa_admin_shipping_settings',
				'data:image/svg+xml;base64,' . base64_encode( '<svg height="512pt" viewBox="0 -104 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m365 3.015625c44.390625 10.300781 61.371094 36.257813 82.660156 71.984375h-82.660156zm-259.421875 74.984375c8.691406 0 15 4.195312 15 14 0 8.269531-6.691406 14.976562-14.957031 15h-90.621094c-8.285156 0-15 6.71875-15 15 0 8.285156 6.714844 15 15 15h135c8.363281 0 15.058594 6.710938 15.058594 15 0 8.285156-6.714844 15-15 15h-135.058594c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h33v45c0 8.285156 6.714844 15 15 15h30.152344c5.375 26.476562 28.769531 46 56.347656 46s50.972656-19.523438 56.347656-46h152.304688c5.375 26.476562 28.769531 46 56.347656 46s50.972656-19.523438 56.347656-46h26.152344c8.285156 0 15-6.714844 15-15v-90c0-44.011719-46.421875-46.933594-46.464844-47h-115.535156c-8.285156 0-15-6.714844-15-15v-90h-272c-8.285156 0-15 6.714844-15 15v33h-18c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15zm328.367187 148.054688c10.738282 10.738281 10.738282 28.15625 0 38.894531-17.273437 17.273437-46.945312 4.984375-46.945312-19.449219 0-24.429688 29.671875-36.71875 46.945312-19.445312zm-265 0c10.738282 10.738281 10.738282 28.15625 0 38.894531-17.273437 17.273437-46.945312 4.984375-46.945312-19.449219 0-24.429688 29.671875-36.71875 46.945312-19.445312zm0 0" fill="grey" fill-rule="evenodd"/></svg>' )
			);
		}
	}

	/**
	 * Add action Menu
	 *
	 * @return void
	 */
	public static function meta_boxes() {

	}
}
