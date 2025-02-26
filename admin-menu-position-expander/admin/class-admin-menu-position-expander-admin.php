<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.aod-tech.com/wordpress/plugins/admin-menu-position-expander/
 * @since      1.0.0
 *
 * @package    Admin_Menu_Position_Expander
 * @subpackage Admin_Menu_Position_Expander/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name and version.
 *
 * @package    Admin_Menu_Position_Expander
 * @subpackage Admin_Menu_Position_Expander/admin
 * @author     Jonathan Horowitz <jhorowitz@aod-tech.com>
 */
class Admin_Menu_Position_Expander_Admin {

	const MINIMUM_MULTIPLIER = 1000;
	private static $ALMOST_PHP_INT_MAX;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Initialize the static aspects of the class.
	 */
	public static function init() {
		self::$ALMOST_PHP_INT_MAX = PHP_INT_MAX - 1;
	}

	/**
	 * Expand the network admin menu item positions.
	 *
	 * @since    1.0.0
	 */
	public function expand_network_admin_menu() {

		$this->expand_menu( 'network_' );

	}

	/**
	 * Expand the user admin menu item positions.
	 *
	 * @since    1.0.0
	 */
	public function expand_user_admin_menu() {

		$this->expand_menu( 'user_' );

	}

	/**
	 * Expand the admin menu item positions.
	 *
	 * @since    1.0.0
	 */
	public function expand_admin_menu() {

		$this->expand_menu();

	}

	/**
	 * Expand the specified menu's item positions.
	 *
	 * @since    1.0.0
	 */
	private function expand_menu( $menu_type = '' ) {

		global $menu;

		$multiplier = 1;

		$positions = array_keys( $menu );
		$lowest_ignored_position = PHP_INT_MAX;
		$highest_position = array_pop( $positions );
		if ( $highest_position != null && $highest_position > 0 ) {
			$multiplier = intval( floor( self::$ALMOST_PHP_INT_MAX / $highest_position ) );

			while ( $multiplier < self::MINIMUM_MULTIPLIER || ( ( $highest_position * $multiplier ) >= $lowest_ignored_position ) ) {
				$lowest_ignored_position = $highest_position;
				$highest_position = array_pop( $positions );
				if ( $highest_position != null && $highest_position > 0 ) {
					$multiplier = intval( floor( self::$ALMOST_PHP_INT_MAX / $highest_position ) );
				} else {
					break;
				}
			}
		}

		$expanded_menu = array();
		foreach( $positions as $position ) {
			$expanded_menu[$position * $multiplier] = $menu[$position];
		}
		$expanded_menu[$highest_position * $multiplier] = $menu[$highest_position];

		$menu = $expanded_menu;

		do_action( $menu_type . str_replace( '-', '_', $this->plugin_name ), $multiplier );

	}

}

Admin_Menu_Position_Expander_Admin::init();
