<?php
/*
    Plugin Name: Average Head & Footer Code
    Plugin URI:
    Description: Allows admins to add code to the &lt;head&gt; and/or &lt;footer&gt; of an individual post and/or site-wide. Ideal for scripts such as Google Analytics conversion tracking code and any other general or page-specific JavaScript.
    Version: 1.1
    Author: Average
    Author URI: http://profiles.wordpress.org/averagetechnology
    License: Public Domain
    @since 3.5.2
        ___
       /   |_   _____  _________ _____ ____
      / /| | | / / _ \/ ___/ __ `/ __ `/ _ \
     / ___ | |/ /  __/ /  / /_/ / /_/ /  __/
    /_/  |_|___/\___/_/   \__,_/\__, /\___/
                               /____/     ª
                               by Joe Rhoney
*/



/*
    S E T T I N G S   P A G E
    =========================
    For site-wide head and footer code
*/

if(!class_exists('avrghdftrcd_class')) :
define('AVRGHDFTRCD_ID', 'avrghdftrcd');
define('AVRGHDFTRCD_NICK', 'Head & Footer Code');

  class avrghdftrcd_class
  {
    public static function file_path($file)
    {
      return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
    }
    public static function register()
    {
      register_setting(AVRGHDFTRCD_ID.'_options', 'site_wide_head_code');
      register_setting(AVRGHDFTRCD_ID.'_options', 'site_wide_footer_code');
    }
    public static function menu()
    {
      add_options_page(AVRGHDFTRCD_NICK.' Plugin Options', AVRGHDFTRCD_NICK, 'manage_options', AVRGHDFTRCD_ID.'_options', array('avrghdftrcd_class', 'options_page'));
    }
    public static function options_page()
    {
      if (!current_user_can('manage_options'))
      {
        wp_die(__('You do not have sufficient permissions to access this page.'));
      }
      $plugin_id = AVRGHDFTRCD_ID;
      include(self::file_path('options.php'));
    }
    public static function output_head_code($head)
    {
      $code = get_option('site_wide_head_code');
      echo $head . $code;
    }
    public static function output_footer_code($footer)
    {
      $code = get_option('site_wide_footer_code');
      echo $footer . $code;
    }
  }
  if (is_admin())
  {
    add_action('admin_init', array('avrghdftrcd_class', 'register'));
    add_action('admin_menu', array('avrghdftrcd_class', 'menu'));
  }
  add_action('wp_head', array('avrghdftrcd_class', 'output_head_code'));
  add_action('wp_footer', array('avrghdftrcd_class', 'output_footer_code'));
endif;



/*
    M E T A B O X   F O R   P O S T S
    =================================
    Metabox w/head & footer fields for all post types (including custom)
*/

add_action( 'add_meta_boxes', 'avrghdftrcd_add' );
function avrghdftrcd_add()
{
  if (current_user_can( 'manage_options' )) {
    add_meta_box( 'avrghdftrcdMetaBox', '(Average) Head & Footer Code', 'avrghdftrcd_cb', '', 'normal', 'high' );
  }
}
function avrghdftrcd_cb( $post )
{
  $values = get_post_custom( $post->ID );
  $head_text = isset( $values['avrghdftrcd_head_code'] ) ? esc_attr( $values['avrghdftrcd_head_code'][0] ) : '';
  $footer_text = isset( $values['avrghdftrcd_footer_code'] ) ? esc_attr( $values['avrghdftrcd_footer_code'][0] ) : '';
  wp_nonce_field( 'avrghdftrcd_nonce', 'meta_box_nonce' );
  ?>
  <p>
    <label for="avrghdftrcd_head_code">Head:</label>
    <textarea class="large-text" name="avrghdftrcd_head_code" id="avrghdftrcd_head_code"><?php echo $head_text; ?></textarea>
  </p>
  <p>
    <label for="avrghdftrcd_footer_code">Footer:</label>
    <textarea class="large-text" name="avrghdftrcd_footer_code" id="avrghdftrcd_footer_code"><?php echo $footer_text; ?></textarea>
  </p>
  <?php
}
add_action( 'save_post', 'avrghdftrcd_save' );
function avrghdftrcd_save( $post_id )
{
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'avrghdftrcd_nonce' ) ) return;
  if( !current_user_can( 'edit_post' ) ) return;
  if( isset( $_POST['avrghdftrcd_head_code'] ) )
    update_post_meta( $post_id, 'avrghdftrcd_head_code', $_POST['avrghdftrcd_head_code'] );
  if( isset( $_POST['avrghdftrcd_footer_code'] ) )
    update_post_meta( $post_id, 'avrghdftrcd_footer_code', $_POST['avrghdftrcd_footer_code'] );
}



/*
    F R O N T   E N D   O U T P U T
    ===============================
    Outputs the head and footer code for individual posts
*/

function avrghdftrcd_head_output( $post ) {
  $avrghdftrcd_head_code = get_post_meta( get_the_ID(), 'avrghdftrcd_head_code', true );
  echo $avrghdftrcd_head_code."\n";
}
add_action('wp_head', 'avrghdftrcd_head_output');

function avrghdftrcd_footer_output( $post ) {
  $avrghdftrcd_footer_code = get_post_meta( get_the_ID(), 'avrghdftrcd_footer_code', true );
  echo $avrghdftrcd_footer_code."\n";
}
add_action('wp_footer', 'avrghdftrcd_footer_output');