<?php

/**

 * Plugin Name: ACF Flexible Content Toggler

 * Plugin URI: https://github.com/benjaminluoma/ACF-Flexible-Content-Toggler

 * Description: Enables toggling of ACF Flexible Content Fields for easier sorting and management.  Inspired by "Advanced Custom Fields Repeater Collapser" by Mark Root-Wiley (https://github.com/mrwweb/ACF-Repeater-Collapser). Requires the "Advanced Custom Fields" plugin and the premium add-on "Advanced Custom Fields: Flexible Content Field" by Elliot Condon (http://www.advancedcustomfields.com/).

 * Version: 1.0

 * Author: Ben Luoma

 * Author URI: https://github.com/benjaminluoma/
 
 */



/* Load the javascript and CSS files on the ACF admin pages */

add_action( 'acf/input/admin_enqueue_scripts', 'acf_flexible_content_toggler_assets' );

function acf_flexible_content_toggler_assets() {

	wp_enqueue_script(

		'acf_repeater_collapser_admin_js',

		esc_url( plugins_url( 'js/acf_flexible_content_toggler_admin.js', __FILE__ ) ),

		array( 'jquery' )

	);

	wp_enqueue_style(

		'acf_repeater_collapser_admin_css',

		esc_url( plugins_url( 'css/acf_flexible_content_toggler_admin.css', __FILE__ ) )

	);

}