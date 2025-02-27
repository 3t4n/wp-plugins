<?php
/**
 * Plugin Name:       Open Links In New Tab
 * Plugin URI:        https://wordpress.org/plugins/open-links-in-new-tab/
 * Description:       WordPress plugin that opens links in a new tab. Search engine optimization (SEO) friendly.
 * Version:           1.2.0
 * Author:            Reza Khan
 * Author URI:        https://www.reza-khan.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       open-links-in-new-tab
 * Domain Path:       /languages
 *
 * Open Links In New Tab is a free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.

 * Open Links In New Tab essential is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Open Links In New Tab. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package Olinewtab
 * @category Core
 * @author Reza Khan
 * @version 1.1.0
 */

defined( 'ABSPATH' ) || wp_die( 'No access directly.' );

/**
 * Main class Olinewtab
 */
class Olinewtab {

	/**
	 * Instance of Olinewtab class.
	 *
	 * @since 1.0.0
	 *
	 * @var Olinewtab $instance Holds the class singleton instance.
	 */
	public static $instance = null;

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function version() {
		return '1.2.0';
	}

	/**
	 * Returns singleton instance of current class.
	 *
	 * @since 1.0.0
	 *
	 * @return Olinewtab
	 */
	public static function init() {

		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor function for Olinewtab class.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'i18n' ) );
		add_action( 'plugins_loaded', array( $this, 'initialize_modules' ) );
	}

	/**
	 * Loads plugin textdomain directory.
	 *
	 * @since 1.0.0
	 */
	public function i18n() {
		load_plugin_textdomain( 'open-links-in-new-tab', false, self::plugin_dir() . 'languages/' );
	}

	/**
	 * Initialize plugin modules.
	 *
	 * @since 1.0.0
	 */
	public function initialize_modules() {
		do_action( 'olint_before_load' );

		require_once self::core_dir() . 'bootstrap.php';

		do_action( 'olint_after_load' );
	}

	/**
	 * Sets an option when plugin activation hook is called.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function olint_activate() {
		update_option( 'olint_open_external_link_in_new_tab', 'yes' );
	}

	/**
	 * Sets an option when plugin deactivation hook is called.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function olint_deactivate() {
		delete_option( 'olint_open_external_link_in_new_tab' );
	}

	/**
	 * Returns core folder Url.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function core_url() {
		return trailingslashit( self::plugin_url() . 'core' );
	}

	/**
	 * Returns core folder Directory Path.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function core_dir() {
		return trailingslashit( self::plugin_dir() . 'core' );
	}

	/**
	 * Plugin Url
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function plugin_url() {
		return trailingslashit( plugin_dir_url( self::plugin_file() ) );
	}

	/**
	 * Plugin Directory Path.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function plugin_dir() {
		return trailingslashit( plugin_dir_path( self::plugin_file() ) );
	}

	/**
	 * Plugins Basename.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function plugins_basename() {
		return plugin_basename( self::plugin_file() );
	}

	/**
	 * Plugin File.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function plugin_file() {
		return __FILE__;
	}
}

/**
 * Load Olinewtab plugin when all plugins are loaded.
 *
 * @since 1.0.0
 *
 * @return Olinewtab
 */
function olinewtab() {
	return Olinewtab::init();
}

// Let's go...
olinewtab();

/* Do something when the plugin is activated? */
register_activation_hook( __FILE__, array( 'Olinewtab', 'olint_activate' ) );

/* Do something when the plugin is deactivated? */
register_deactivation_hook( __FILE__, array( 'Olinewtab', 'olint_deactivate' ) );
