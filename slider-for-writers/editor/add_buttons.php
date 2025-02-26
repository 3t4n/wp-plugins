<?php

add_action( 'init', 'writer_buttons' );
function writer_buttons() {
    add_filter( "mce_external_plugins", "writer_add_buttons" );
    add_filter( 'mce_buttons', 'writer_register_buttons' );

    global $wp_version;
    $wpversion = wp_version_to_int($wp_version);

    if($wpversion >= 38) {
      add_filter( 'mce_css', 'writer_plugin_mce_css' );
      add_action( 'admin_enqueue_scripts', 'writer_plugin_css' );
    }

}

function writer_add_buttons( $plugin_array ) {
  global $wp_version;
  $wpversion = wp_version_to_int($wp_version);

  if($wpversion <= 38) {
    $plugin_array['writer_slider'] = plugins_url('add_buttons.js', __FILE__ );
  } else {
    $plugin_array['writer_slider'] = plugins_url('add_buttons_wp39.js', __FILE__ );
  }
  return $plugin_array;
}
function writer_register_buttons( $buttons ) {
  array_push( $buttons, 'writer_slider' );
  return $buttons;
}
function writer_plugin_css( $mce_css ) {
  wp_enqueue_style( 'custom-mce-style', plugins_url( 'css/editor_styles.css', __FILE__ ) );
}
function writer_plugin_mce_css( $mce_css ) {
  if ( ! empty( $mce_css ) )
    $mce_css .= ',';

  $mce_css .= plugins_url( 'css/editor_styles.css', __FILE__ );

  return $mce_css;
}

function wp_version_to_int($v) {
  $nw_v = substr($v,0,1).substr($v,2,1);
  return (int)str_ireplace('.', '', $nw_v);
}
