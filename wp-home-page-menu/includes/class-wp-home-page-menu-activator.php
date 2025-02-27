<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 *
 * @since      1.0.0
 * @package    WPHPM
 * @subpackage WPHPM/includes
 * @author     Vinod Dalvi <mozillavvd@gmail.com>
 */
class WP_Home_Page_Menu_Activator {

	/**
	 * Short Description.
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$options = get_option( 'wp_home_page_menu' );
		if ( ! isset( $options['wp_home_page_menu_enable'] ) ) {
			$options['wp_home_page_menu_enable'] = 1;
			$options['wp_home_page_menu_locations']['initial'] = 'initial';
			update_option( 'wp_home_page_menu', $options );
		}
	}
}