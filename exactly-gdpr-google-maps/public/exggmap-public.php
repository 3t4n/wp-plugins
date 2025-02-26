<?php 

/**
 * Enqueue Scripts and Styles
 */
function exggmap_enqueue_scripts() {
  	wp_enqueue_style( 'exggmap-style', plugin_dir_url( __FILE__ ) . 'css/styles.css', array(), EXGGMAP_VERSION, 'all' );
    wp_enqueue_script( 'exggmap-script', plugin_dir_url( __FILE__ ) . 'js/script.js', array( 'jquery' ), EXGGMAP_VERSION, false );
  }
add_action( 'wp_enqueue_scripts', 'exggmap_enqueue_scripts' );