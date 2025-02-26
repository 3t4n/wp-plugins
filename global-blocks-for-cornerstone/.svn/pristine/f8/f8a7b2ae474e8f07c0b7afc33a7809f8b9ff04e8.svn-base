<?php
/**
 * Register CPT and set post template in X. Enable Cornerstone.
 *
 * @package   Global Blocks for Cornerstone
 * @author    Michael Bourne
 * @license   GPL3
 * @link      https://xthemetips.com
 * @since     1.1.0
 */

function global_blocks_cpt()
{
  $labels = array(
    'name' => _x('Global Blocks', 'Post Type General Name', 'global-blocks-cornerstone') ,
    'singular_name' => _x('Global Block', 'Post Type Singular Name', 'global-blocks-cornerstone') ,
    'menu_name' => __('Global Blocks', 'global-blocks-cornerstone') ,
    'name_admin_bar' => __('Global Block', 'global-blocks-cornerstone') ,
    'archives' => __('Global Block Archives', 'global-blocks-cornerstone') ,
    'attributes' => __('Global Block Attributes', 'global-blocks-cornerstone') ,
    'parent_item_colon' => __('Parent Global Block:', 'global-blocks-cornerstone') ,
    'all_items' => __('All Global Blocks', 'global-blocks-cornerstone') ,
    'add_new_item' => __('Add New Global Block', 'global-blocks-cornerstone') ,
    'add_new' => __('Add New', 'global-blocks-cornerstone') ,
    'new_item' => __('New Global Block', 'global-blocks-cornerstone') ,
    'edit_item' => __('Edit Global Block', 'global-blocks-cornerstone') ,
    'update_item' => __('Update Global Block', 'global-blocks-cornerstone') ,
    'view_item' => __('View Global Block', 'global-blocks-cornerstone') ,
    'view_items' => __('View Global Blocks', 'global-blocks-cornerstone') ,
    'search_items' => __('Search Global Block', 'global-blocks-cornerstone') ,
    'not_found' => __('Not found', 'global-blocks-cornerstone') ,
    'not_found_in_trash' => __('Not found in Trash', 'global-blocks-cornerstone') ,
    'featured_image' => __('Featured Image', 'global-blocks-cornerstone') ,
    'set_featured_image' => __('Set featured image', 'global-blocks-cornerstone') ,
    'remove_featured_image' => __('Remove featured image', 'global-blocks-cornerstone') ,
    'use_featured_image' => __('Use as featured image', 'global-blocks-cornerstone') ,
    'insert_into_item' => __('Insert into item', 'global-blocks-cornerstone') ,
    'uploaded_to_this_item' => __('Uploaded to this item', 'global-blocks-cornerstone') ,
    'items_list' => __('Global Blocks list', 'global-blocks-cornerstone') ,
    'items_list_navigation' => __('Global Blocks list navigation', 'global-blocks-cornerstone') ,
    'filter_items_list' => __('Filter items list', 'global-blocks-cornerstone') ,
    );
  $args = array(
    'label' => __('Global Block', 'global-blocks-cornerstone') ,
    'description' => __('Cornerstone enabled CPT for creating global blocks', 'global-blocks-cornerstone') ,
    'labels' => $labels,
    'supports' => array(
      'title',
      'editor'
      ) ,
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-admin-site',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => false,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'capability_type' => 'page',
    );
  register_post_type('global-blocks', $args);
}
// trigger our function that registers the custom post type
add_action('init', 'global_blocks_cpt', 0);

/**
 *  Automatically register our CPT as editable with Cornerstone
 */

add_filter('cornerstone_allowed_post_types', 'global_blocks_post_types', 9999);
function global_blocks_post_types($post_types)
{
  $post_types[] = 'global-blocks';
  return $post_types;
}


/**
 *  LEGACY:
 *  Add the "blank, no header, no footer" template in X as the default for our CPT
 *  If X isn't the theme, or no uri passed with function, no template will be returned.
 */

add_filter('template_include', 'global_blocks_template');
function global_blocks_template($template)
{
  if (is_singular('global-blocks') && !file_exists(get_stylesheet_directory() . '/single-global-blocks.php') && function_exists('x_get_stack')) {
    $stack = x_get_stack();
    $template = get_template_directory() . '/framework/views/' . $stack . '/template-blank-6.php';
  }

  if ('' != $template) {
    return $template;
  }
}

/**
 * New: remove bars setup from global blocks pages
 * @since     1.2.4
 */

function global_blocks_bars_setup_views() {
  if (is_singular('global-blocks')){
    remove_action( 'template_redirect', 'x_bars_setup_views' );
    remove_action( 'template_redirect', 'x_bars_setup_modules' );
  }
}
add_action( 'template_redirect', 'global_blocks_bars_setup_views', 1 );

/**
 * Helper metabox that displays the shortcode to use on the current block
 * @since     1.1.2
 */

add_action( 'edit_form_after_editor', function( $post ) 
{
  if ($post->post_type != 'global-blocks') { return; }
  if ($post->post_status == 'publish') {
    echo '
    <div style="padding: 2em; background: rgba(255,255,255,0.5); border: 1px solid black;">Feel free to use this Global Block outside of the builder with this shortcode:<br />
      <span style="font-weight: bold;">[global_block block="' . $post->ID . '"]</span></div>
      ';
    }
  });