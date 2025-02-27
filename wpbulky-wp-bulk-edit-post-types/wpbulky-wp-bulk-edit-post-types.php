<?php
/**
 * Plugin Name: WPBulky - WordPress Bulk Edit Post Types
 * Plugin URI: https://villatheme.com/extensions/wpbulky-wordpress-bulk-edit-post-types/
 * Description: A helpful tool that allows you to bulk edit post types (posts, pages, media, comments….)
 * Version: 1.1.10
 * Author: VillaTheme
 * Author URI: https://villatheme.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wpbulky-wp-bulk-edit-post-types
 * Domain Path: /languages
 * Copyright 2021-2025 VillaTheme.com. All rights reserved.
 * Requires at least: 5.0
 * Tested up to: 6.7
 * Requires PHP: 7.0
 **/

use BULKYWP\Admin\Admin;
use BULKYWP\Admin\Ajax;
use BULKYWP\Admin\Editor;
use BULKYWP\Admin\History;
use BULKYWP\Includes\Data;
use BULKYWP\Includes\Enqueue;
use BULKYWP\Includes\Support;

defined( 'ABSPATH' ) || exit;

if ( is_file( plugin_dir_path( __FILE__ ) . 'autoload.php' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'autoload.php';
}


class BulkyWP_Edit_Post_Types_F {
	public $plugin_name = 'WPBulky';

	public $version = '1.1.10';

	public $conditional = '';

	protected static $instance = null;

	public function __construct() {
		$this->define();

		add_action( 'plugins_loaded', [ $this, 'init' ] );

		register_activation_hook( __FILE__, [ $this, 'active' ] );
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function define() {
		if ( ! defined( 'BULKYWP_CONST_F' ) ) {
			define( 'BULKYWP_CONST_F', [
				'version'      => $this->version,
				'slug'         => 'wpbulky',
				'full_slug'    => 'wpbulky-wp-bulk-edit-post-types',
				'assets_slug'  => 'wpbulky-wp-bulk-edit-post-types-',
				'file'         => __FILE__,
				'basename'     => plugin_basename( __FILE__ ),
				'plugin_dir'   => plugin_dir_path( __FILE__ ),
				'includes_dir' => plugin_dir_path( __FILE__ ) . 'includes' . DIRECTORY_SEPARATOR,
				'admin_dir'    => plugin_dir_path( __FILE__ ) . 'admin' . DIRECTORY_SEPARATOR,
				'dist_dir'     => plugin_dir_path( __FILE__ ) . 'assets' . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR,
				'dist_url'     => plugins_url( 'assets/dist/', __FILE__ ),
				'libs_url'     => plugins_url( 'assets/libs/', __FILE__ ),
				'img_url'      => plugins_url( 'assets/img/', __FILE__ ),
				'capability'   => 'edit_posts',
				'pro_url'      => 'https://1.envato.market/MXBDjK',
			] );
		}
	}

	public function init() {

		if ( class_exists( 'BulkyWP_Edit_Post_Types' ) ) {
			return;
		}

		if ( ! class_exists( 'VillaTheme_Require_Environment' ) ) {
			include_once BULKYWP_CONST_F['plugin_dir'] . 'support/support.php';
		}

		$environment = new \VillaTheme_Require_Environment( [
				'plugin_name' => 'WPBulky - WordPress Bulk Edit Post Types',
				'php_version' => '7.0',
				'wp_version'  => '5.0',
			]
		);

		if ( $environment->has_error() ) {
			return;
		}

		$this->load_class();
		add_filter( 'plugin_action_links_' . BULKYWP_CONST_F['basename'], [ $this, 'setting_link' ] );
		add_action( 'init', [ $this, 'load_text_domain' ] );
	}

	public function setting_link( $links ) {
		$settings_link = [ sprintf( "<a href='%1s' >%2s</a>", esc_url( admin_url( 'admin.php?page=vi_wpbulky_settings' ) ), esc_html__( 'Settings', 'wpbulky-wp-bulk-edit-post-types' ) ) ];

		return array_merge( $settings_link, $links );
	}

	public function load_class() {

		if ( ! function_exists( 'BulkyWP_Data' ) ) {
			function BulkyWP_Data() {
				return Data::instance();
			}
		}

		if ( is_admin() ) {
			Enqueue::instance();
			Admin::instance();
			Editor::instance();
			Support::instance();
			Ajax::instance();
		}
	}

	public function load_text_domain() {
		$locale   = determine_locale();
		$locale   = apply_filters( 'plugin_locale', $locale, 'wpbulky-wp-bulk-edit-post-types' );
		$basename = plugin_basename( dirname( __FILE__ ) );

		unload_textdomain( 'wpbulky-wp-bulk-edit-post-types' );
		load_textdomain( 'wpbulky-wp-bulk-edit-post-types', WP_LANG_DIR . "/{$basename}/{$basename}-{$locale}.mo" );
		load_plugin_textdomain( 'wpbulky-wp-bulk-edit-post-types', false, $basename . '/languages' );
	}

	public function active( $network_wide ) {
		global $wpdb;
		$history = History::instance();
		if ( function_exists( 'is_multisite' ) && is_multisite() && $network_wide ) {
			$current_blog = $wpdb->blogid;
			$blogs        = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" ); //phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching
			foreach ( $blogs as $blog ) {
				switch_to_blog( $blog );
				$history->create_database_table();
			}
			switch_to_blog( $current_blog );
		} else {
			$history->create_database_table();
		}

		if ( ! get_option( 'wpbulky_params_setting' ) ) {
			$default_data = [ 'post_types' => [ 'post', 'page', 'attachment' ] ];
			update_option( 'wpbulky_params_setting', $default_data );
		}
	}

}

BulkyWP_Edit_Post_Types_F::instance();

