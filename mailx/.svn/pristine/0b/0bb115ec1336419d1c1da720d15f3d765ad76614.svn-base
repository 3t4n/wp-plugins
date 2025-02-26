<?php
/**
 * Plugin Name: MailX
 * Description: Change Sender Name, Sender Address & Content Type of Your Emails
 * Plugin URI: https://codexpert.io/products
 * Author: Codexpert
 * Author URI: https://codexpert.io
 * Version: 0.1
 * Text Domain: mailx
 * Domain Path: /languages
 *
 * Mailx is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Mailx is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

namespace codexpert\Mailx;
use codexpert\plugin\Widget;
use codexpert\plugin\Survey;
use codexpert\plugin\Notice;
use codexpert\plugin\Deactivator;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main class for the plugin
 * @package Plugin
 * @author Codexpert <hi@codexpert.io>
 */
final class Plugin {
	
	public static $_instance;

	public function __construct() {
		$this->include();
		$this->define();
		$this->hook();
	}

	/**
	 * Includes files
	 */
	public function include() {
		require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );
	}

	/**
	 * Define variables and constants
	 */
	public function define() {
		// constants
		define( 'MAILX', __FILE__ );
		define( 'MAILX_DIR', dirname( MAILX ) );
		define( 'MAILX_DEBUG', apply_filters( 'mailx_debug', true ) );

		// plugin data
		$this->plugin				= get_plugin_data( MAILX );
		$this->plugin['basename']	= plugin_basename( MAILX );
		$this->plugin['file']		= MAILX;
		$this->plugin['server']		= apply_filters( 'mailx_server', 'https://codexpert.io/dashboard' );
		$this->plugin['min_php']	= '5.6';
		$this->plugin['min_wp']		= '4.0';
		$this->plugin['depends']	= [];
		
		global $mailx;
		$mailx = $this->plugin;
	}

	/**
	 * Hooks
	 */
	public function hook() {

		if( is_admin() ) :

			/**
			 * Admin facing hooks
			 *
			 * To add an action, use $admin->action()
			 * To apply a filter, use $admin->filter()
			 */
			$admin = new Admin( $this->plugin );
			$admin->activate( 'install' );
			$admin->deactivate( 'uninstall' );
			$admin->action( 'plugins_loaded', 'i18n' );
			$admin->filter( "plugin_action_links_{$this->plugin['basename']}", 'action_links' );
			$admin->filter( 'plugin_row_meta', 'plugin_row_meta', 10, 2 );
			$admin->action( 'admin_footer_text', 'footer_text' );

			/**
			 * Settings related hooks
			 *
			 * To add an action, use $settings->action()
			 * To apply a filter, use $settings->filter()
			 */
			$settings = new Settings( $this->plugin );
			$settings->action( 'plugins_loaded', 'init_menu' );

			// Product related classes
			$widget			= new Widget( $this->plugin );
			$survey			= new Survey( $this->plugin );
			$notice			= new Notice( $this->plugin );
			$deactivator	= new Deactivator( $this->plugin );

		else : // !is_admin() ?

		endif;

		/**
		 * Common hooks
		 *
		 * Executes on both the admin area and front area
		 */
		$common = new Common( $this->plugin );
		$common->filter( 'wp_mail_from_name', 'change_sender_name', 99 );
		$common->filter( 'wp_mail_from', 'change_sender_email', 99 );
		$common->filter( 'wp_mail_content_type', 'set_content_type', 99 );
	}

	/**
	 * Cloning is forbidden.
	 */
	public function __clone() { }

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	public function __wakeup() { }

	/**
	 * Instantiate the plugin
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}

Plugin::instance();