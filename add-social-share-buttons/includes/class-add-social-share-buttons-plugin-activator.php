<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Fired during plugin activation
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/includes
 * @author     Multidots <inquiry@multidots.in>
 */
class Add_Social_Share_Buttons_Plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		//Set Transist once pluign activated
		set_transient( '_welcome_screen_assb_activation_redirect_data', true, 30 );
		
	}

}
