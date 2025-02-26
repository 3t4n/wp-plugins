<?php

namespace AWSA_Shipping;

use AWSA_Core\APIs\Settings\Settings_Page;
use AWSA_Core\Post_Actions\Post_Actions;
use AWSA_WC_City_Input_Admin;

/**
 * Core Admin Class in plugin
 */
final class Admin {

	/**
	 * Session instance
	 *
	 * @var bool
	 */
	protected static $instance;

	/**
	 * AWSA_Shipping Constructor
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

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Set Constants
	 *
	 * @return void
	 */
	public function define(): void {

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
	public function includes(): void {

		require_once AWSA_SHIPPING_PDAI . 'admin-functions.php';
		// Include Files
	}

	/**
	 * Register actions enqueue scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts(): void {

		add_action( 'admin_enqueue_scripts', '\AWSA_Shipping\Admin_Scripts::enqueue', 99 );
	}

	/**
	 * Add Hooks - Actions and Filters
	 *
	 * @return void
	 */
	public function init_hooks(): void {

		add_action( 'admin_init', [ __CLASS__, 'init' ] );
		add_action( 'awsa_update_settings_page-awsa-shipping', [ __CLASS__, 'update_shipping_settings' ] );
		add_action( 'admin_menu', [ __CLASS__, 'menu' ], 10 );
		add_action( 'add_meta_boxes', [ __CLASS__, 'meta_boxes' ], 10 );

		Order_Bulk_Actions::init();
	}

	/**
	 * Add order post actions module
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	public static function add_order_actions_modules( array $classes ): array {

		$classes['AWSA_Shipping_Order_Actions'] = Order_Actions::class;

		return $classes;
	}

	/**
	 * Init AWSA_Shipping after WordPress
	 *
	 * @return void
	 */
	public static function init(): void {

		// awsa-post-actions.php
		if ( class_exists( Post_Actions::class ) ) {
			Post_Actions::add_for_post_type( 'shop_order' );

			add_action( 'awsa_shop_order_actions_meta_box_child_info', 'awsa_order_actions_meta_box_child_info' );

			// Shop_orders
			add_filter( 'awsa_post_actions_modules_shop_order', [ __CLASS__, 'add_order_actions_modules' ] );

			// Parcel code
			add_filter( 'manage_edit-shop_order_columns', 'awsa_shipping_manage_posts_columns' );
			add_action( 'manage_shop_order_posts_custom_column', 'awsa_shipping_display_parcel_code_column', 10, 2 );

		}

		//Settings page
		if ( class_exists( Settings_Page::class ) ) {
			//Settings Page

			Settings_Page::instance()->init();
			add_filter( 'awsa_settings_page_awsa-shipping_addons', [ __CLASS__, 'add_settings_page_addon' ] );
		}
	}

	/**
	 * @param array $addons
	 *
	 * @since 1.2.0
	 * @return array
	 */
	public static function add_settings_page_addon( array $addons ): array {

		$addons['settings-page-fields'] = Settings_Page_Fields::class;

		return $addons;
	}

	/**
	 * Update Shipping Settings
	 *
	 * @return void
	 */
	public static function update_shipping_settings(): void {

		AWSA_Shipping::register_activation();
	}

	/**
	 * Add Actions Menu
	 *
	 * @return void
	 */
	public static function menu(): void {

		$icon_url = 'data:image/svg+xml;base64,' . base64_encode(
				'<svg height="512pt" viewBox="0 -104 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m365 3.015625c44.390625 10.300781 61.371094 36.257813 82.660156 71.984375h-82.660156zm-259.421875 74.984375c8.691406 0 15 4.195312 15 14 0 8.269531-6.691406 14.976562-14.957031 15h-90.621094c-8.285156 0-15 6.71875-15 15 0 8.285156 6.714844 15 15 15h135c8.363281 0 15.058594 6.710938 15.058594 15 0 8.285156-6.714844 15-15 15h-135.058594c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h33v45c0 8.285156 6.714844 15 15 15h30.152344c5.375 26.476562 28.769531 46 56.347656 46s50.972656-19.523438 56.347656-46h152.304688c5.375 26.476562 28.769531 46 56.347656 46s50.972656-19.523438 56.347656-46h26.152344c8.285156 0 15-6.714844 15-15v-90c0-44.011719-46.421875-46.933594-46.464844-47h-115.535156c-8.285156 0-15-6.714844-15-15v-90h-272c-8.285156 0-15 6.714844-15 15v33h-18c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15zm328.367187 148.054688c10.738282 10.738281 10.738282 28.15625 0 38.894531-17.273437 17.273437-46.945312 4.984375-46.945312-19.449219 0-24.429688 29.671875-36.71875 46.945312-19.445312zm-265 0c10.738282 10.738281 10.738282 28.15625 0 38.894531-17.273437 17.273437-46.945312 4.984375-46.945312-19.449219 0-24.429688 29.671875-36.71875 46.945312-19.445312zm0 0" fill="grey" fill-rule="evenodd"/></svg>'
			);

		if ( function_exists( 'awsa_admin_menus' ) ) {

			awsa_admin_menus()->add_node(
				[
					'parent_slug' => '',
					'page_title'  => __( 'Shipping Settings', 'awsa-shipping' ),
					'menu_title'  => __( 'Shipping Settings', 'awsa-shipping' ),
					'capability'  => 'administrator',
					'menu_slug'   => 'awsa-shipping-settings',
					'function'    => 'awsa_admin_shipping_settings',
					'icon_url'    => $icon_url,
					'position'    => null,
				]
			);

			awsa_admin_menus()->add_node(
				[
					'parent_slug' => 'awsa-shipping-settings',
					'page_title'  => __( 'Tools', 'awsa-shipping' ),
					'menu_title'  => __( 'Tools', 'awsa-shipping' ),
					'capability'  => 'manage_options',
					'menu_slug'   => 'awsa-shipping-tools',
					'function'    => 'awsa_admin_shipping_tools',
				]
			);

			awsa_admin_menus()->add_node(
				[
					'parent_slug' => 'awsa-shipping-settings',
					'page_title'  => __( 'Fast Delivery', 'awsa-shipping' ),
					'menu_title'  => __( 'Fast Delivery', 'awsa-shipping' ),
					'capability'  => 'manage_options',
					'menu_slug'   => 'admin.php?page=wc-settings&tab=shipping&section=awsa-pishtaz',
				]
			);

			awsa_admin_menus()->add_node(
				[
					'parent_slug' => 'awsa-shipping-settings',
					'page_title'  => __( 'Sefareshi Post', 'awsa-shipping' ),
					'menu_title'  => __( 'Sefareshi Post', 'awsa-shipping' ),
					'capability'  => 'manage_options',
					'menu_slug'   => 'admin.php?page=wc-settings&tab=shipping&section=awsa-sefareshi',
				]
			);

			awsa_admin_menus()->add_node(
				[
					'parent_slug' => 'awsa-shipping-settings',
					'page_title'  => __( 'Express delivery', 'awsa-shipping' ),
					'menu_title'  => __( 'Express delivery', 'awsa-shipping' ),
					'capability'  => 'manage_options',
					'menu_slug'   => 'admin.php?page=wc-settings&tab=shipping&section=awsa-express',
				]
			);

			awsa_admin_menus()->add_node(
				[
					'parent_slug' => 'awsa-shipping-settings',
					'page_title'  => __( 'Air Delivery', 'awsa-shipping' ),
					'menu_title'  => __( 'Air Delivery', 'awsa-shipping' ),
					'capability'  => 'manage_options',
					'menu_slug'   => 'admin.php?page=wc-settings&tab=shipping&section=awsa-air-delivery',
				]
			);

		} else {
			add_menu_page(
				__( 'Shipping Settings', 'awsa-shipping' ),
				__( 'Shipping Settings', 'awsa-shipping' ),
				'manage_options',
				'awsa-shipping-settings',
				'awsa_admin_shipping_settings',
				$icon_url
			);

			add_submenu_page(
				'awsa-shipping-settings',
				__( 'Tools', 'awsa-shipping' ),
				__( 'Tools', 'awsa-shipping' ),
				'manage_options',
				'awsa-shipping-tools',
				'awsa_admin_shipping_tools'
			);

			add_submenu_page(
				'awsa-shipping-settings',
				__( 'Fast Delivery', 'awsa-shipping' ),
				__( 'Fast Delivery', 'awsa-shipping' ),
				'manage_options',
				'admin.php?page=wc-settings&tab=shipping&section=awsa-pishtaz'
			);

			add_submenu_page(
				'awsa-shipping-settings',
				__( 'Sefareshi Post', 'awsa-shipping' ),
				__( 'Sefareshi Post', 'awsa-shipping' ),
				'manage_options',
				'admin.php?page=wc-settings&tab=shipping&section=awsa-sefareshi'
			);

			add_submenu_page(
				'awsa-shipping-settings',
				__( 'Express delivery', 'awsa-shipping' ),
				__( 'Express delivery', 'awsa-shipping' ),
				'manage_options',
				'admin.php?page=wc-settings&tab=shipping&section=awsa-express'
			);

			add_submenu_page(
				'awsa-shipping-settings',
				__( 'Air Delivery', 'awsa-shipping' ),
				__( 'Air Delivery', 'awsa-shipping' ),
				'manage_options',
				'admin.php?page=wc-settings&tab=shipping&section=awsa-air-delivery'
			);

		}

	}

	/**
	 * Add action Menu
	 *
	 * @return void
	 */
	public static function meta_boxes(): void {

	}

}
