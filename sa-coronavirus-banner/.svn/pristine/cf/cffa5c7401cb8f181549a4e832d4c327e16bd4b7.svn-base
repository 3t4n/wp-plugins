<?php
/**
 * Plugin admin script
 *
 */

namespace SA\Covid19\Script;

function add_color_picker( $hook ) {

  if( is_admin() ) {

    // Add the color picker css file
    wp_enqueue_style( 'wp-color-picker' );
    // Include our custom jQuery file with WordPress Color Picker dependency
    wp_enqueue_script( 'custom-script-handle', plugins_url( '../../assets/js/admin-color-picker-script.min.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
  }

}

function banner_height(){
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'custom-bbanner-height', plugins_url( '../../assets/js/banner-height.min.js', __FILE__ ), array(), false, true );
}
