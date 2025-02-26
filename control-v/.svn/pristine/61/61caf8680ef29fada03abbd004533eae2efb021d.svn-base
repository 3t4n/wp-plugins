<?php
/**
Plugin Name: Control V
Plugin URI: http://liren.se/plugins/control-v/
Description: Simplified Page Templating and Shortcode Builder.
Version: 1.0.8
Author: Linus Rendahl
Author URI: http://liren.se
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ctrlv
Domain Path: /lang
*/


/*  Copyright 2014  Linus Rendahl  (email : linus.r@liren.se)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * Includes.
 */
require_once( dirname(__FILE__) . '/inc/cpt.php' ); 			//Custom Post Type, Taxonomy, Filters.
require_once( dirname(__FILE__) . '/inc/shortcodes.php' );		//Shortcodes
require_once( dirname(__FILE__) . '/inc/documentation.php' );	//Documentation Page.


/**
 * Localization.
 */
add_action( 'plugins_loaded', 'ctrlv_load_textdomain' );

function ctrlv_load_textdomain() {
  load_plugin_textdomain( 'ctrlv', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
}


/**
 * TinyMce Button
 *
 * Adds a button above TinyMce to pages and posts that triggers the helper window.
 */
add_action('media_buttons', 'ctrlv_button', 11);

function ctrlv_button() {

	global $typenow;

    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
		return;
    }
	
	if( ! in_array( $typenow, array( 'post', 'page', 'ctrlv_templates' ) ) ) {
        return;
	}

  $button = '<a title="Liren Helper Window Button" class="button add_media ctrlv-help-button" href="#">';
  $button .= '<img src="'. plugins_url() . '/control-v/imgs/custom-post-icon.png">';
  $button .= __( 'Templates', 'ctrlv' );
  $button .= '</a>';
  
  echo  $button;
  
}


/**
 * TinyMCE Settings
 *
 * Change TinyMCE default settings: don't remove empty divs.
 */
 
add_filter('tiny_mce_before_init', 'ctrlv_change_mce_options');

function ctrlv_change_mce_options( $init ) {

    $ext = 'div[*]';
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    return $init;
}


/**
 * Helper Window
 *
 * This is the content for the helper window.
 */

add_action( 'admin_footer', 'ctrlv_help' );
 
function ctrlv_help() {
	
	global $typenow;
	
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
		return;
    }

    if( ! in_array( $typenow, array( 'post', 'page', 'ctrlv_templates' ) ) ) {
        return;
	}

	if ( get_user_option('rich_editing') == 'true') {
		require_once( dirname(__FILE__) . '/inc/helper-window.php' );
	}

	wp_enqueue_style( 'ctrlv-helper-css', plugins_url() . '/control-v/css/ctrlv.css' );
	wp_enqueue_script( 'ctrlv-helper-js', plugins_url() . '/control-v/js/ctrlv.js' );
	
}


/**
 * Flush WP rewrite rules.
 *
 * Flushes the permalinks to accounts for the URL rewrites of the CPT.
 */
 
register_activation_hook( __FILE__, 'ctrlv_flush' );
register_deactivation_hook( __FILE__, 'ctrlv_flush' );

function ctrlv_flush() {

	flush_rewrite_rules();
	
}


/**
 * Exemple Template
 *
 * Create an example template if it doesn't exist on plugin activation.
 */
 
register_activation_hook( __FILE__, 'ctrlv_example_template' );

function ctrlv_example_template() {
	global $wpdb;
	if( null == get_page_by_title( 'Example Template', 'OBJECT', 'ctrlv_templates' ) ) {

		$example_template = array(
			'post_title' => 'Example Template',
			'post_name' => 'ctrl-example',
			'post_content' => '<h2>Example Template</h2> 		<div style="width: 100%; box-sizing: border-box; display: inline-block; padding: 20px; border: 1px dashed #ccc;"><img style="max-width: 100%;" src="http://placehold.it/1200x400" alt="" /></div> 		<div style="clear: both;"> 		<div style="width: 50%; box-sizing: border-box; display: inline-block; padding: 20px; border: 1px dashed #ccc; float: left;"> 		<h3>Templating</h3> 		This could be a template you create by using the Bootstrap grid system (or whatever else). This blank template can then easily be pasted into a blank page by clicking the Templates button above the editor. Create a new page and try it out!  		</div> 		<div style="width: 50%; box-sizing: border-box; display: inline-block; padding: 20px; border: 1px dashed #ccc; float: left;"> 		<h3>Dynamic Content</h3> 		This could hold some dynamic content like the latest Post with a shortcode like [my_latest_posts_shortcode]. Note that there are no shortcodes added by default in this plugin though (except the display template shortcode).  		</div> 		</div> 		<div style="clear: both;"> 		<div style="width: 50%; box-sizing: border-box; display: inline-block; padding: 20px; border: 1px dashed #ccc; float: left;"> 		<h3>Widgets</h3> 		Perhaps you create a small Template that is to be used over and over in many posts. Insert it with a shortcode and it essentially becomes a easy to use widget (without having to register widget areas and such).  		</div> 		<div style="width: 50%; box-sizing: border-box; display: inline-block; padding: 20px; border: 1px dashed #ccc; float: left;"><img style="max-width: 100%;" src="http://placehold.it/600x200" alt="" /></div> 		</div>',
			'post_status' => 'publish',
			'post_type' => 'ctrlv_templates'
		);

		$ctrl_post_id = wp_insert_post($example_template);

	}
}

/**
 * Shortcode to retrieve a specific, centralized/linked template.
 */

add_shortcode( 'ctrlv_template', 'ctrlv_template' );

function ctrlv_template( $atts ) {

	$a = shortcode_atts( array(
        'id' => '',
    ), $atts );
	
	$lirtin_template = get_post( $a['id'] );
	
	return do_shortcode( $lirtin_template->post_content );
}