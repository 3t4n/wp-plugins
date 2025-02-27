<?php

/**
 *
 * @package           Move_To_Trash_From_Admin_Bar
 *
 * @wordpress-plugin
 * Plugin Name:       Move to Trash from Admin Bar
 * Plugin URI:        https://wordpress.org/plugins/move-to-trash-from-admin-bar/
 * Description:       Add a Move to Trash Button to delete posts or pages from the WordPress Admin Bar.
 * Version:           1.0.1
 * Author:            Arroba Digital
 * Author URI:        https://www.arroba.digital
 * License:           GPLv2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       move-to-trash-from-admin-bar
 */

// This plugin is inspired in http://wpengineer.com/2185/add-trash-button-to-wordpress-admin-bar/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

// Plugin main code

function fb_add_admin_bar_trash_menu() {
  global $wp_admin_bar;
  if ( !is_super_admin() || !is_admin_bar_showing() )
      return;
  $current_object = get_queried_object();
  if ( empty($current_object) )
      return;
  if ( !empty( $current_object->post_type ) &&
     ( $post_type_object = get_post_type_object( $current_object->post_type ) ) &&
     current_user_can( $post_type_object->cap->edit_post, $current_object->ID )
  ) {
    $wp_admin_bar->add_menu(
        array( 'id' => 'delete',
            'title' => __('Move to Trash'),
            'href' => get_delete_post_link($current_object->term_id)
        )
    );
  }
}
add_action( 'admin_bar_menu', 'fb_add_admin_bar_trash_menu', 35 );



