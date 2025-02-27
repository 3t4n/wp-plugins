<?php
/**
 * Plugin Name: LookBook for WooCommerce
 * Plugin URI: https://villatheme.com/extensions/woocommerce-lookbook/
 * Description: Easily create stunning lookbooks or sync Instagram photos. Captivate customers with beautiful displays and boost sales with in-lookbook Quick View
 * Version: 1.1.8
 * Author: VillaTheme
 * Author URI: http://villatheme.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: woo-lookbook
 * Domain Path: /languages
 * Copyright 2018-2025 VillaTheme.com. All rights reserved.
 * Requires Plugins: woocommerce
 * Requires at least: 5.0
 * Tested up to: 6.7
 * WC requires at least: 7.0
 * WC tested up to: 9.5
 * Requires PHP: 7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! defined( 'WOO_F_LOOKBOOK_VERSION' ) ) {
	define( 'WOO_F_LOOKBOOK_VERSION', '1.1.8' );
	define( 'WOO_F_LOOKBOOK_BASENAME', plugin_basename( __FILE__ ) );
	define( 'WOO_F_LOOKBOOK_DIR', plugin_dir_path( __FILE__ ) );
	define( 'WOO_F_LOOKBOOK_ADMIN', WOO_F_LOOKBOOK_DIR . "admin" . DIRECTORY_SEPARATOR );
	define( 'WOO_F_LOOKBOOK_FRONTEND', WOO_F_LOOKBOOK_DIR . "frontend" . DIRECTORY_SEPARATOR );
	define( 'WOO_F_LOOKBOOK_LANGUAGES', WOO_F_LOOKBOOK_DIR . "languages" . DIRECTORY_SEPARATOR );
	define( 'WOO_F_LOOKBOOK_INCLUDES', WOO_F_LOOKBOOK_DIR . "includes" . DIRECTORY_SEPARATOR );
	define( 'WOO_F_LOOKBOOK_TEMPLATES', WOO_F_LOOKBOOK_DIR . "templates" . DIRECTORY_SEPARATOR );
	$plugin_url = plugins_url( '', __FILE__ );
	define( 'WOO_F_LOOKBOOK_CSS', $plugin_url . "/css/" );
	define( 'WOO_F_LOOKBOOK_JS', $plugin_url . "/js/" );
}
/**
 * Class WOO_LOOKBOOK
 */
class WOO_F_LOOKBOOK {
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'check_environment' ) );

		//Compatible with High-Performance order storage (COT)
		add_action( 'before_woocommerce_init', array( $this, 'before_woocommerce_init' ) );

	}

	public function check_environment() {
		if ( class_exists( 'WOO_LOOKBOOK' ) ) {
			return;
		}
		if ( ! class_exists( 'VillaTheme_Require_Environment' ) ) {
			require_once WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "woo-lookbook" . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "support.php";
		}

		$environment = new VillaTheme_Require_Environment( [
				'plugin_name'     => 'LookBook for WooCommerce',
				'php_version'     => '7.0',
				'wp_version'      => '5.0',
				'require_plugins' => [
					[
						'slug' => 'woocommerce',
						'name' => 'WooCommerce',
						'file' => 'woocommerce/woocommerce.php',
						'version' => '7.0',
					],
				]
			]
		);

		if ( $environment->has_error() ) {
			return;
		}
		add_image_size( 'lookbook', 400, 400, false );
		$this->includes();
		add_action( 'init', array( $this, 'init' ) );
		add_filter( 'plugin_action_links_' . WOO_F_LOOKBOOK_BASENAME, array( $this, 'settings_link' ) );

	}
	/**
	 * Link to Settings
	 *
	 * @param $links
	 *
	 * @return mixed
	 */
	public function settings_link( $links ) {
		$settings_link = '<a href="edit.php?post_type=woocommerce-lookbook&page=woocommerce-lookbook-settings" title="' . esc_html__( 'Settings', 'woo-lookbook' ) . '">' . esc_html__( 'Settings', 'woo-lookbook' ) . '</a>';
		array_unshift( $links, $settings_link );

		return $links;
	}
	public function init() {
		$this->load_plugin_textdomain();
		$this->register_post_type();
		if ( class_exists( 'VillaTheme_Support' ) ) {
			new VillaTheme_Support(
				array(
					'support'    => 'https://villatheme.com/supports/forum/plugins/woocommerce-lookbook/',
					'docs'       => 'http://docs.villatheme.com/?item=woocommerce-lookbook',
					'review'     => 'https://wordpress.org/support/plugin/woo-lookbook/reviews/?rate=5#rate-response',
					'pro_url'    => 'https://1.envato.market/mV0bM',
					'css'        => WOO_F_LOOKBOOK_CSS,
					'image'      => '',
					'slug'       => 'woo-lookbook',
					'menu_slug'  => 'edit.php?post_type=woocommerce-lookbook',
					'survey_url' => 'https://script.google.com/macros/s/AKfycbxwRAAILhwQ8-zXk8GXNmC6vP2KTIM_n4allRONk2K7B5goJ_K_R00pnZQ6sANNMkXbpg/exec',
					'version'    => WOO_F_LOOKBOOK_VERSION
				)
			);
		}
	}
	/**
	 * load Language translate
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'woo-lookbook' );
		// Global + Frontend Locale
		load_textdomain( 'woo-lookbook', WOO_F_LOOKBOOK_LANGUAGES . "woo-lookbook-$locale.mo" );
		load_plugin_textdomain( 'woo-lookbook', false, WOO_F_LOOKBOOK_LANGUAGES );
	}
	public function register_post_type() {
		$labels = array(
			'name'               => esc_html__( 'WC Lookbooks', 'woo-lookbook' ),
			'singular_name'      => esc_html__( 'WC Lookbook', 'woo-lookbook' ),
			'menu_name'          => esc_html__( 'WC Lookbooks', 'woo-lookbook' ),
			'name_admin_bar'     => esc_html__( 'WC Lookbook', 'woo-lookbook' ),
			'add_new'            => esc_html__( 'Add New', 'woo-lookbook' ),
			'add_new_item'       => esc_html__( 'Add New Lookbook', 'woo-lookbook' ),
			'new_item'           => esc_html__( 'New Lookbook', 'woo-lookbook' ),
			'edit_item'          => esc_html__( 'Edit Lookbook', 'woo-lookbook' ),
			'view_item'          => esc_html__( 'View Lookbook', 'woo-lookbook' ),
			'all_items'          => esc_html__( 'All Lookbooks', 'woo-lookbook' ),
			'search_items'       => esc_html__( 'Search Lookbooks', 'woo-lookbook' ),
			'parent_item_colon'  => esc_html__( 'Parent Lookbooks:', 'woo-lookbook' ),
			'not_found'          => esc_html__( 'No books found.', 'woo-lookbook' ),
			'not_found_in_trash' => esc_html__( 'No books found in Trash.', 'woo-lookbook' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'woo-lookbook' ),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => false,
			'rewrite'            => array( 'slug' => 'woocommerce-lookbook' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 2,
			'supports'           => array( 'title' ),
			'menu_icon'          => 'dashicons-location'
		);

		register_post_type( 'woocommerce-lookbook', $args );
	}
	protected function includes() {
		$files = array(
			WOO_F_LOOKBOOK_INCLUDES=>[
				'file_name' => [
					'support.php',
					'data.php',
					'elementor/elementor.php',
				]
			],
			WOO_F_LOOKBOOK_ADMIN=>[
				'class_prefix' => 'WOO_F_LOOKBOOK_Admin_',
				'file_name' => [
					'settings.php',
					'instagram.php',
					'system.php',
					'lookbook.php',
					'product.php',
				]
			],
			WOO_F_LOOKBOOK_FRONTEND=>[
				'class_prefix' => 'WOO_F_LOOKBOOK_Frontend_',
				'file_name' => [
					'shortcode.php',
					'product.php',
				]
			]
		);
		foreach ( $files as $path => $items ) {
			if (empty($items['file_name']) || !is_array($items['file_name'])){
				continue;
			}
			$class_prefix = $items['class_prefix']??'';
			foreach ($items['file_name'] as $file_name){
				$file = $path.'/'.$file_name;
				if ( !file_exists( $file ) ) {
					continue;
				}
				require_once $file;
				$ext_file  = pathinfo( $file);
				$class_name = $ext_file['filename'] ??'';
				if ($class_prefix){
					$class_name = preg_replace( '/\W/i', '_', $class_prefix . ucfirst( $class_name ) );
				}
				if ( $class_name && class_exists( $class_name ) ) {
					new $class_name;
				}
			}
		}
	}

	public function before_woocommerce_init() {
		if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	}
}

new WOO_F_LOOKBOOK();