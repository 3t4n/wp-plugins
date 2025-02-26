<?php

/*

Plugin Name: Fueto

Plugin URI: http://fueto.com

Description: Search Gone Social 

Version: 0.0.5

Author: Fueto.com

Author URI: http://fueto.com/

Copyright 2011-Present fueto.com (info@fueto.com)

This program is free software; you can redistribute it and/or modify

it under the terms of the GNU General Public License as published by

the Free Software Foundation; either version 2 of the License, or

(at your option) any later version.

This program is distributed in the hope that it will be usefulr

but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

GNU General Public License for more details.

You should have received a copy of the GNU General Public License

along with this program; if not, write to the Free Software

Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/



/*

 * Define Some Paths

*/
define( 'FUETO_HTTP_PATH' , WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__) , "" , plugin_basename(__FILE__) ) );
define( 'FUETO_ABSPATH' , WP_PLUGIN_DIR . '/' . str_replace(basename( __FILE__) , "" , plugin_basename(__FILE__) ) );

define( 'API_URL' , "http://204.236.235.197/v1" );
define( 'FUETO_MAX_URL_BULK' , 1000 );


/*



* Includes



*/
include 'includes/class-fueto_Admin_Options.php';
include 'includes/fueto_output.php';

/*



 * Global Variables



*/
$fueto_options = get_option( 'fueto_options' );

/*



 * General Init Function



 */
function fueto_init()
{
    global $fueto_post_types, $fueto_taxonomies, $fueto_options;

    if (!empty($fueto_options['chk_terms']))
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core', false, array('jquery')); 
        wp_enqueue_style('fueto-box-css', FUETO_HTTP_PATH . 'css/fueto_box.css' );
        wp_enqueue_script('fueto-box-js', FUETO_HTTP_PATH . 'js/fueto_box.js' );
        wp_enqueue_script('jquery-ui-autocomplete');
        wp_enqueue_style('jquery-ui-css', FUETO_HTTP_PATH . 'css/jquery-ui.css' );
    }
    else
    {
        if (is_admin())
        {
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-core',false,array('jquery'));
            wp_enqueue_style( 'fueto-box-css', FUETO_HTTP_PATH . 'css/fueto_box.css' );
            wp_enqueue_script( 'fueto-box-js', FUETO_HTTP_PATH . 'js/fueto_box.js' );
        }
    }
}

/*
 * Hooks And Filters
 */
add_action('admin_init' , array( 'fueto_Admin_Options' , 'init' ) );
add_action('admin_menu' , array( 'fueto_Admin_Options' , 'add_menu_pages' ) );
add_action('init' , 'fueto_init' );
add_action("pre_get_posts", "fueto_search_api");
add_action("save_post", "fueto_add_url");
add_action("the_posts","fueto_get_post");

//register_activation_hook( __FILE__, 'fueto_add_url' );

if (!empty($fueto_options['chk_terms']))
{
    add_filter( 'get_search_form', 'auto_fueto');
}

register_activation_hook(__FILE__, 'fueto_activate' );
register_deactivation_hook( __FILE__, 'fueto_deactivate' );

/*

 * Activation Function

 */
function fueto_activate()
{
    if( ! get_option( 'fueto_options' ) )
    {
        return fueto_reset();
    }
}

/*



* Reset Function



*/
function fueto_reset()
{
  global $wpdb;
  $wpdb->query("DELETE FROM $wpdb->postmeta WHERE meta_key = '_fuetooff'");

  $fueto_options = array(
        'chk_terms' => '',
        'progress_bar_fill' => '0',
        'posts_indexed' => 0,
        'close_postit' => 0,
  		'glass'	=> '1', 	
  		'sites_search' => array(
		  					'input' => array( 'text' => 'blog name' ),
		  					'default'=> '1',
							'google' => '1',
							'powered_by' => 1,
							'link_to'	=> 1  	
		),	
		'search_box' => 'search with fueto',
		'button' => 'Search',
		'new_window' => '',
		'show_images' => 1,
		'results' => 15,
		'style'	=> array(
						'border_color'  => '#AFAFAF',
						'font_color'	=> '#6C6C6C',
						'font_size'	=> '13',
						'search_width' 	=> '170',
						'search_height'	=> '23',
                        'bee_width'	=> '62',
                        'glass_width'	=> '28'
		),
        'version' =>'0.0.5',
        'automatic_mode'         => 'on',
        'custom_image_directory' => '',
        'use_stylesheet'         => 'on',
        'use_images'             => 'on',
        'use_alphamask'          => 'on',
        'new_window'             => 'on',
        'help_grow'              => '', 
        'autocomplete'           => '1',
        'fueto_helpus'           => 1,
        'width_warning'           => '',
        'send_posts'           => ''
    );

    //Update will create if it doesn't exist.
    update_option( 'fueto_options' , $fueto_options );
}

/*

 * De-Activate Function

 */
function fueto_deactivate()
{
    global $wpdb;
    //Delete The Metadata
    $wpdb->query("DELETE FROM $wpdb->postmeta WHERE meta_key = '_fuetooff'");
    return delete_option( 'fueto_options' );
}

/*

 * Function To Completely Remove The Options

 */
function fueto_2_remove()
{
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
    global $wpdb;

    //Delete The Metadata
    $wpdb->query("DELETE FROM $wpdb->postmeta WHERE meta_key = '_fuetooff'");
    delete_option( 'fueto_options' );
    deactivate_plugins( array( 'fueto/fueto.php' ) );
    wp_redirect( '/wp-admin/plugins.php?deactivate=true' );
}

?>