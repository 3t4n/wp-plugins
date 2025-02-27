<?php

/**
 * @link              https://github.com/Jess81/password-protect-pages/
 * @since             1.3.0
 * @package           Password_Protect_Pages
 *
 * @wordpress-plugin
 * Plugin Name:       Password Protect Pages
 * Plugin URI:        https://wordpress.org/plugins/password-protect-pages/
 * Description:       Restrict access to chosen pages to only logged in users
 * Version:           1.3.0
 * Author:            Jess Nunez
 * Author URI:        https://github.com/Jess81/password-protect-pages/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       password-protect-pages
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PASSWORD_PROTECT_PAGES_VERSION', '1.3.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-password-protect-pages-activator.php
 */
function activate_password_protect_pages() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-password-protect-pages-activator.php';
	Password_Protect_Pages_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-password-protect-pages-deactivator.php
 */
function deactivate_password_protect_pages() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-password-protect-pages-deactivator.php';
	Password_Protect_Pages_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_password_protect_pages' );
register_deactivation_hook( __FILE__, 'deactivate_password_protect_pages' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-password-protect-pages.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_password_protect_pages() {

	$plugin = new Password_Protect_Pages();
	$plugin->run();

}
run_password_protect_pages();

	add_action( 'template_redirect', 'redirect_to_specific_page' );

		function redirect_to_specific_page() {

			if ( is_user_logged_in() ) { } else { 

			$ppp_array = get_option('ppp_settings');
			$options = get_option( 'ppp_settings' );
			$ppp_select = $options['ppp_select_field_4'];
			$ppp_ids = esc_attr ($ppp_array['ppp_text_field_0']);
			$ppp_pages = explode(',', $ppp_ids ); 
			$ppp_landing = $options['ppp_text_field_8'];

			global $post;

			if($ppp_select == 1) { // chosen to password protect some

				if(is_page( $ppp_pages )) { 

						global $wp_query;

			    		$queried_object = get_queried_object();

			    		if($ppp_landing ==''){

			   				$ppp_function_trigger = wp_redirect(home_url('/wp-login.php?redirect_to='.get_permalink($queried_object->ID)));

			   			} else {

			   				$ppp_function_trigger = wp_redirect($ppp_landing);

			   			}

			   			return $ppp_function_trigger;

						exit;
				} 

			} else { // chosen to password protect all

				if(is_page( $ppp_pages )) { } else { 

						global $wp_query;

			    		$queried_object = get_queried_object();

			    		if($ppp_landing ==''){

			   				$ppp_function_trigger = wp_redirect(home_url('/wp-login.php?redirect_to='.get_permalink($queried_object->ID)));

			   			} else {

			   				$ppp_function_trigger = wp_redirect($ppp_landing);

			   			}
			   			return $ppp_function_trigger;

						exit;
				} 

			} 
		}
		}
	