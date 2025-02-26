<?php
/**
* Plugin Name: Lab Featured Image 
* Description: Go to Settings>Lab Featured Image - In the settings page check or uncheck the options: Require Featured Image in Posts - Add Featured Image to Admin Post Columns. Hit "Save Changes".  
* Version:     1.4
* Author:      Labarta
* Author URI:  https://labarta.es/
* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: lab-fimage
* Domain Path: /languages
**/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require plugin_dir_path( __FILE__ ) . 'includes/featured-image.php';
require plugin_dir_path( __FILE__ ) . 'includes/featured-imagegt.php';
require plugin_dir_path( __FILE__ ) . 'includes/settings.php';

/* Enqueue admin styles */

function labfi_custom_admin_styles() {
    wp_enqueue_style('labfiPluginStylesheet', plugins_url('/css/styles.css', __FILE__ ));
	}
 add_action('admin_enqueue_scripts', 'labfi_custom_admin_styles');  


/* Languages */

load_plugin_textdomain( 'lab-fimage', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );


