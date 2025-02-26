<?php
/**
 * Plugin Name: Add TinyMCE Blockquote Cite
 * Description: A plugin that adds cite attribute feature to TinyMCE
 * Version: 1.0.1
 * Author: Bartzik Webdesign
 * Author URI: https://webdesign.bartzik.net/
 * License: GPLv2
 *
 * Copyright 2018  Bartzik Webdesign
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/* Check user permission and editor before add buttons */
function add_tinymce_blockquote_cite_snippets_main() {
  global $typenow;
  global $_add_tinymce_blockquote_cite_snippets;
  // check the current user's permissions
  if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
  }
  // verify the post type that the user will work with
  if ( !in_array( $typenow, array( 'post', 'page' ) ) ) {
    return;
  }
  // check if WYSIWYG is enabled
  if ( get_user_option('rich_editing') == 'true' ) {
    add_filter( 'mce_external_plugins', 'add_tinymce_blockquote_cite_snippets_add_tinymce_plugin' );
  }
}
add_action('admin_head', 'add_tinymce_blockquote_cite_snippets_main');


/* Adding the plugin js file */
function add_tinymce_blockquote_cite_snippets_add_tinymce_plugin( $plugin_array ) {
  $plugin_array['add_tinymce_blockquote_cite_snippets_plugin'] = plugins_url( '/js/tinymce.js', __FILE__ );
  return $plugin_array;
}

?>
