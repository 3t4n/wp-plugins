<?php
/*
Plugin Name: Generic Parent Child Custom Post Type
Version: 1.0
Plugin URI: http://ourvalley.ca/web-design/generic-parent-child-custom-post-type-wordpress-plugin/
Author: Sandy McFadden
Author URI: http://sandymcfadden.com/
Description: This plugin gives a quick example of a generic parent child relationship custom post type. 
*/

/*
Copyright (c) 2012 Sandy Mcfadden
Released under the GPL license
http://www.gnu.org/licenses/gpl.txt

Disclaimer: 
	Use at your own risk. No warranty expressed or implied is provided.
	This program is free software; you can redistribute it and/or modify 
	it under the terms of the GNU General Public License as published by 
	the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
 	See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


Requires : Wordpress 3.x or newer ,PHP 5 +

*/
// Setup the parent custom post type
function post_type_gpc_parents() {
  $labels   = array('name' => __('Parents'), 'singular_name' => __('Parent'), 'add_new_item' => __('Add New Parent'), 'edit_item' => __('Edit Parent'));
  $supports = array('title', 'editor', 'author', 'thumbnail');
  $args     = array('labels' => $labels, 'public' => true, 'show_ui' => true, 'has_archive' => true, 'hierarchical' => true, 'supports' => $supports, 'rewrite' => array( 'slug' => 'parents' ));

	register_post_type('gpc_parents', $args);
}
  
add_action('init', 'post_type_gpc_parents');


// Thanks to http://janina.tumblr.com/post/3588081423/post-parent-different-type for this 

add_action('admin_menu', function() { remove_meta_box('pageparentdiv', 'gpc_children', 'normal');});
add_action('add_meta_boxes', function() { add_meta_box('gpc_children-parent', 'Parent', 'gpc_children_attributes_meta_box', 'gpc_children', 'side', 'high');});

function gpc_children_attributes_meta_box($post) {
    $post_type_object = get_post_type_object($post->post_type);
    if ( $post_type_object->hierarchical ) {
      if ($post->post_parent == 0)
        $parent = $_GET['gpc_parent'];
      else
        $parent = $post->post_parent;
      $pages = wp_dropdown_pages(array('post_type' => 'gpc_parents', 'selected' => $parent, 'name' => 'parent_id', 'show_option_none' => __('(Select One)'), 'sort_column'=> 'menu_order, post_title', 'echo' => 0));
      if ( ! empty($pages) ) {
        echo $pages;
      }
    }
 }

 
// Setup the children custom post type
function post_type_gpc_children() {
  $labels   = array('name' => __('Children'), 'singular_name' => __('Child'), 'add_new_item' => __('Add New Child'), 'edit_item' => __('Edit Child'), 'parent_item_colon' => __('Parent'));
  $supports = array('title', 'editor');
  $args     = array('labels' => $labels, 'public' => true, 'hierarchical' => true, 'show_ui' => true, 'supports' => $supports, 'rewrite' => array( 'slug' => 'children' ));

	register_post_type('gpc_children', $args);
}
  
add_action('init', 'post_type_gpc_children');


// Remove the children menu item as it will be managed under the parent item.
function remove_gpc_children_menu() {
  remove_menu_page('edit.php?post_type=gpc_children');
}
add_action('admin_menu', 'remove_gpc_children_menu');



// Add meta box to display children items in parent
add_action("admin_init", "add_gpc_parents_meta_boxes");
 
function add_gpc_parents_meta_boxes(){
  add_meta_box("gpc_children-meta", "Children", "gpc_children_meta", "gpc_parents", "normal", "high");
}


function gpc_children_meta() {
  global $post;
  if (get_post_status($post->ID) == 'publish')
    echo '<p><a href="post-new.php?post_type=gpc_children&gpc_parent='. $post->ID .'">Add New Child</a>'."\n";
  $my_wp_query = new WP_Query();
  $all_wp_children = $my_wp_query->query(array('post_type' => 'gpc_children'));
  $children = get_page_children($post->ID, $all_wp_children);
  echo '<ul>'."\n";
  foreach ($children as $child)
    echo '<li><a href="post.php?post='. $child->ID .'&action=edit">'. $child->post_title .'</a></li>'."\n";
  echo '</ul>'."\n";
}

// Delete all children when the parent is deleted
add_action('delete_post', 'delete_gpc_children_when_parent_deleted');
function delete_gpc_children_when_parent_deleted($post_id) {
  $post = get_post($post_id);
  if ($post->post_type == 'gpc_parents') {
    $my_wp_query = new WP_Query();
    $all_wp_children = $my_wp_query->query(array('post_type' => 'gpc_children'));
    $children = get_page_children($post->ID, $all_wp_children);
    foreach($children as $child) {
      wp_delete_post($child->ID);
    }
  }
}


// Include custom single template file for parent post type
// Thanks to http://www.unfocus.com/2010/08/10/including-page-templates-from-a-wordpress-plugin/

function locate_plugin_template($template_names, $load = false, $require_once = true )
{
    if ( !is_array($template_names) )
        return '';
    
    $located = '';
    
    $this_plugin_dir = WP_PLUGIN_DIR.'/'.str_replace( basename( __FILE__), "", plugin_basename(__FILE__) );
    
    foreach ( $template_names as $template_name ) {
        if ( !$template_name )
            continue;
        if ( file_exists(STYLESHEETPATH . '/' . $template_name)) {
            $located = STYLESHEETPATH . '/' . $template_name;
            break;
        } else if ( file_exists(TEMPLATEPATH . '/' . $template_name) ) {
            $located = TEMPLATEPATH . '/' . $template_name;
            break;
        } else if ( file_exists( $this_plugin_dir .  $template_name) ) {
            $located =  $this_plugin_dir . $template_name;
            break;
        }
    }
    
    if ( $load && '' != $located )
        load_template( $located, $require_once );
    
    return $located;
}

add_filter( 'single_template', 'get_custom_single_template' );
function get_custom_single_template($template)
{
    global $wp_query;
    $object = $wp_query->get_queried_object();
    
    if ( 'gpc_parents' == $object->post_type ) {
        $templates = array('single-' . $object->post_type . '.php', 'single.php');
        $template = locate_plugin_template($templates);
    }
    // return apply_filters('single_template', $template);
    return $template;
}

function gpc_activation() {
  flush_rewrite_rules( false );
}

register_activation_hook(__FILE__, 'gpc_activation');

?>