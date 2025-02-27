<?php

/**
 * Fired during plugin activation
 *
 * @link       http://harryrobinsondev.com
 * @since      1.0.0
 *
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/includes
 * @author     Harry Robinson <harry.robo14@yahoo.co.uk>
 */
class Wp_Smoother_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
            
            


               //Get entire array
$my_options = get_option('wp-smoother');

//Alter the options array appropriately
$my_options['wpsmoother_activate_fade'] = '1';
$my_options['wpsmoother_activate_mouse_scroll'] = '1';
$my_options['wpsmoother_activate_click_scroll'] = '1';
$my_options['wpsmoother_home_click_scroll'] = '0';

$my_options['wpsmoother_fade_duration'] = '1200';
$my_options['wpsmoother_mouse_distance'] = '100';
$my_options['wpsmoother_mouse_speed'] = '800';
$my_options['wpsmoother_anchor_speed'] = '800';

//Update entire array
update_option('wp-smoother', $my_options);  
            
        }


}
            
