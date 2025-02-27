<?php 

// This is Theme  CSS and Js

function wpsection_enqueue_assets() {   
  $plugin_path = WPSECTION_PLUGIN_PATH ;
  // Enqueue all CSS files in the theme/assets/css directory
  foreach ( glob( $plugin_path . 'theme/assets/css/*.css' ) as $css_file ) {
    wp_enqueue_style( basename( $css_file, '.css' ), WPSECTION_PLUGIN_URL . 'theme/assets/css/' . basename( $css_file ), array('elementor-frontend'), WPSECTION_VERSION );
  }
  // Enqueue all JavaScript files in the theme/assets/js directory
  foreach ( glob( $plugin_path . 'theme/assets/js/*.js' ) as $js_file ) {
    wp_enqueue_script( basename( $js_file, '.js' ), WPSECTION_PLUGIN_URL . 'theme/assets/js/' . basename( $js_file ), array( 'jquery' ), WPSECTION_VERSION, false );
  }
}
add_action( 'wp_enqueue_scripts', 'wpsection_enqueue_assets' );




// This is Plugin Default Front End  Style and Js
function wpsection_enqueue_plugin_assets() {
  $plugin_path = WPSECTION_PLUGIN_PATH;
  // Enqueue all CSS files in the plugin/assets/css/frontend directory
  foreach ( glob( $plugin_path . 'plugin/assets/frontend/css/*.css' ) as $css_file ) {
    wp_enqueue_style( basename( $css_file, '.css' ), WPSECTION_PLUGIN_URL . 'plugin/assets/frontend/css/' . basename( $css_file ), array(), filemtime( $css_file ) );
  }
  // Enqueue all JavaScript files in the assets/js/frontend directory
  foreach ( glob( $plugin_path . 'plugin/assets/frontend/js/*.js' ) as $js_file ) {
    wp_enqueue_script( basename( $js_file, '.js' ), WPSECTION_PLUGIN_URL . 'plugin/assets/frontend/js/' . basename( $js_file ), array( 'jquery' ), filemtime( $js_file ), false );
  }
}
add_action( 'wp_enqueue_scripts', 'wpsection_enqueue_plugin_assets' );





function enqueue_custom_footer_script() {
    wp_enqueue_script('wpsection-wps-swiper-slider', WPSECTION_PLUGIN_URL . 'plugin/assets/frontend/wps-swiper-slider.js', array('jquery'), '1.0.0', true); 
    wp_enqueue_script('hover-slider', WPSECTION_PLUGIN_URL . 'plugin/assets/frontend/hover-slider.min.js', array('jquery'), '1.0.0', true); 
    wp_enqueue_script('hover-script', WPSECTION_PLUGIN_URL . 'plugin/assets/frontend/hover_script.js', array('jquery'), '1.0.0', true); 
    wp_enqueue_style('thumbhover', WPSECTION_PLUGIN_URL . 'plugin/assets/frontend/thumbhover.css', array(), '1.0.0'); 
}
add_action('wp_enqueue_scripts', 'enqueue_custom_footer_script');



// This code is for the Elemntor Dashboard CSS and Js Do not change 
add_action(
    'elementor/editor/before_enqueue_styles',
    function () {
        wp_enqueue_style(
            'wpsection-elemntor', // Style handle
            WPSECTION_PLUGIN_URL . 'plugin/assets/frontend/elemntor.css', // Style source
            array(), // Dependencies (if any)
            '1.0.0', // Version number (change this to your actual version number)
            'all' // Media type (default is 'all')
        );

        wp_enqueue_script(
            'wpsection-script', // Script handle
            WPSECTION_PLUGIN_URL . 'plugin/assets/frontend/elemntor.js', // Script source
            array('jquery'), // Dependencies (if any)
            '1.0.0', // Version number (change this to your actual version number)
            true // Load in the footer
        );
    }
);


