<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

add_filter( 'wp_dropdown_pages', function( $select ){
  if( false === strpos( $select,'page_on_front' ) ) return $select;
  if( !isset( $_GET['ftype'] ) ){
    $page_on_front = get_site_option( 'page_on_front' );
    $post = get_post( esc_attr( $page_on_front ) );
    if( $post && is_object( $post ) && 'page' !== $post->post_type ){
      return str_replace( '</select>','<option value="'.esc_attr( $page_on_front ).'" selected>'.esc_html( $post->post_title ).'</option></select>',$select );
    }
    return $select;
  }
  $post_type_obj = get_post_type_object( sanitize_text_field( $_GET['ftype'] ) );
  $cpt_posts = get_posts([
    'post_type' => sanitize_text_field( $_GET['ftype'] ),
    'nopaging' => true,
    'numberposts' => -1,
    'order' => 'ASC',
    'orderby' => 'title',
    'posts_per_page' => -1,
  ]);
  if( !$cpt_posts ){
    // no posts found.
    return $select;
  }
  $current = get_option( 'page_on_front',0 );
  $select = '<select name="page_on_front" id="page_on_front">';
  $select .= '<optgroup label="'.esc_attr( $post_type_obj->label ).'">';
  $select .= '<option value="0">'.__( '&mdash; Select &mdash;' ).'</option>';
  $select .= walk_page_dropdown_tree($cpt_posts, 0, [
    'depth' => 0,
    'child_of' => 0,
    'selected' => absint( $current ),
    'echo' => 0,
    'name' => 'page_on_front',
    'id' => '',
    'show_option_none' => '',
    'show_option_no_change' => '',
    'option_none_value' => '',
  ]);
  $select .= '</optgroup>';
  $select .= '</select>';
  return $select;
} );

add_action( 'admin_menu',function(){
  remove_submenu_page( 'options-general.php','options-reading.php' );
  add_options_page(
    esc_html__( 'Reading' ),
    esc_html__( 'Reading' ),
    'manage_options',
    'frontype',
    'eos_frontype_options_page',
    2
  );
},10 );
function eos_frontype_options_page(){
  require_once FRONTYPE_PLUGIN_DIR.'/admin/frontype-options.php';
}
