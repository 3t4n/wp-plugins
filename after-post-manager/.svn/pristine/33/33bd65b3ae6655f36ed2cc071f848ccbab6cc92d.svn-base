<?php
/**
 * Plugin Name: After Post Manager
 * Plugin URI:  http://wordpress.org/plugins/after-post-manager/
 * Description: A powerful plugin to add text, signature or a form at the end of each post. Now use shortcodes to live your imagination.
 * Author: inverqz team
 * Author URI: http://profiles.wordpress.org/astrize626
 * Tags: after, add, content, form, post, signature.
 * Version: 3.3
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author     inverqz team
 * @version    1.0
 * @package    After Post Manager
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
 
/****  Registers the activation hook. It will be used when the plugin activates. ****/
register_activation_hook( __FILE__, 'apm_afterpost_manager_activate' );

/**** Registers the deactivation hook. It will be used when the plugin deactivates. ****/
register_deactivation_hook( __FILE__, 'apm_afterpost_manager_deactivate' );
 
/**** Function called when the plugin activates. ****/ 
function apm_afterpost_manager_activate() {
  // Checks for the options of after post manager. If found do nothing else create one.
  if( false == get_option( 'apm_afterpost_manager_options' ) ) {
    add_option( 'apm_afterpost_manager_options' );
  }
}

/**** Function called when the plugin deactivates. ****/
function apm_afterpost_manager_deactivate() {
  // Deletes the values saved in the database. 
  if( true == get_option( 'apm_afterpost_manager_options' ) ) {
    delete_option( 'apm_afterpost_manager_options' );
  }
}

/**** Checking for astrize textarea database value. ****/
add_action( 'init', 'check_astrize_database_value' );

function check_astrize_database_value() {
  if( !isset( get_option( 'apm_afterpost_manager_options' )[ 'apm_afterpost_manager_editor' ] ) ) {
    if( isset( get_option( 'astrize_afterpost_manager_options' )[ 'astrize_afterpost_manager_textarea' ] ) ) {
	  $old_value = get_option( 'astrize_afterpost_manager_options' )[ 'astrize_afterpost_manager_textarea' ];
	  $save_value = array(
	  'apm_afterpost_manager_editor' => $old_value
	  );
	  update_option( 'apm_afterpost_manager_options', $save_value );
	  delete_option( 'astrize_afterpost_manager_options' );
	}
  }
}

/**** This action is hooked to admin_menu. ****/
add_action( 'admin_menu', 'apm_afterpost_manager_options_page' );

function apm_afterpost_manager_options_page() {
  // Adds the plugin page in the Settings menu of the WordPress.
  add_menu_page( __( 'After Post Manager', 'apm' ), __( 'A-P Manager', 'apm' ), 'manage_options', 'after-post-manager', 'apm_afterpost_manager_page_callback', 'dashicons-index-card' );
  // Adds the plugins shortcodes sub-page.
  add_submenu_page( 'after-post-manager', __( 'After Post Manager Shortcodes', 'apm' ), __( 'Shortcodes', 'apm' ), 'manage_options', 'after-post-manager-shortcodes', 'apm_after_post_manager_shortcodes_callback' );
  // Adds the plugins explore sub-page.
  add_submenu_page( 'after-post-manager', __( 'After Post Manager Explore', 'apm' ), __( 'Explore', 'apm' ), 'manage_options', 'after-post-manager-explore', 'apm_after_post_manager_explore_callback' );
}

/**** This filter is hooked to the_content. ****/
add_filter( 'the_content', 'apm_afterpost_manager_front_display' );

function apm_afterpost_manager_front_display( $content ) {
  // Globalize the $post for usage.
  global $post; 
  
  // Checks for the posts post type if available.
  if( $post->post_type == 'post' ) {
	  // Checks for the editors value.
	  if( is_single() && isset( get_option( 'apm_afterpost_manager_options' )[ 'apm_afterpost_manager_editor' ] ) ) {
	    $content .= get_option( 'apm_afterpost_manager_options' )[ 'apm_afterpost_manager_editor' ];
		return $content;
      }
	  else {
	    return $content;
	  }
  }
  else {
    return $content;
  }
} 

/**** Calls the section for the plugin which stores all the fields to display in the form. ****/
require_once( plugin_dir_path( __FILE__ ).'inc/header.php' );

/**** Calls the section for the plugin which stores all the fields to display in the form. ****/
require_once( plugin_dir_path( __FILE__ ).'inc/footer.php' );

/**** Calls the section for the plugin which stores all the fields to display in the form. ****/
require_once( plugin_dir_path( __FILE__ ).'inc/settings/section.php' );

/**** Calls the form for the plugin to display on the plugins page. ****/
require_once( plugin_dir_path( __FILE__ ).'inc/settings/form.php' );

/**** Calls the registered shortcodes for the plugin to use by the users. ****/
require_once( plugin_dir_path( __FILE__ ).'inc/registered-shortcodes.php' );

/**** Calls the shortcode sub-page to display. ****/
require_once( plugin_dir_path( __FILE__ ).'inc/sub-pages/shortcodes.php' );

/**** Calls the explore sub-page. ****/
require_once( plugin_dir_path( __FILE__ ).'inc/sub-pages/explore.php' );
 
/**** Registers stylesheet for the plugin page. ****/
add_action( 'admin_enqueue_scripts', 'apm_after_post_manager_stylesheet' ); 

function apm_after_post_manager_stylesheet() {
  // Enqueue the mainpage-stylesheet.
  wp_enqueue_style( 'apm-after-post-manager-mainpage-stylesheet', plugins_url( 'inc/css/mainpage-stylesheet.css', __FILE__ ), false, '3.0' );
  
  // Enqueue the subpages-stylesheet.
  wp_enqueue_style( 'apm-after-post-manager-subpages-stylesheet', plugins_url( 'subpages-stylesheet.css', __FILE__ ), false, '3.0' );
  
  // Adds the stylesheet for the editor.
  add_editor_style( plugins_url( 'inc/css/editor-stylesheet.css', __FILE__ ) );
}
