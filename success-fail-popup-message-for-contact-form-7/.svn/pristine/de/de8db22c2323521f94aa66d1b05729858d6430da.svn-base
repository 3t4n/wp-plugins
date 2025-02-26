<?php 

// Load JS and CSS files on Backend
add_action( 'admin_enqueue_scripts', 'SFPMCF7_load_admin_script_style' );
function SFPMCF7_load_admin_script_style() {
    if (isset($_GET['page']) && $_GET['page'] === 'wpcf7') {
    wp_enqueue_media();
    wp_enqueue_style( 'SFPMCF7-backend', SFPMCF7_PLUGIN_DIR . '/assets/css/backend.css', false, '1.0.0' );
    wp_enqueue_script( 'SFPMCF7-wp-media-uploader', SFPMCF7_PLUGIN_DIR . '/assets/js/wp_media_uploader.js', false, '1.0.0', true );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha',SFPMCF7_PLUGIN_DIR.'/assets/js/wp-color-picker-alpha.js',array('wp-color-picker'), '1.0.0', true );           
    $color_picker_strings = array(
        'clear'            => __( 'Clear', 'stock-status-in-product-loop-for-woocommerce' ),
        'clearAriaLabel'   => __( 'Clear color', 'stock-status-in-product-loop-for-woocommerce' ),
        'defaultString'    => __( 'Default', 'stock-status-in-product-loop-for-woocommerce' ),
        'defaultAriaLabel' => __( 'Select default color', 'stock-status-in-product-loop-for-woocommerce' ),
        'pick'             => __( 'Select Color', 'stock-status-in-product-loop-for-woocommerce' ),
        'defaultLabel'     => __( 'Color value', 'stock-status-in-product-loop-for-woocommerce' ),
    );
    wp_localize_script( 'wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
    wp_enqueue_script( 'wp-color-picker-alpha' );
    }
}

// Load JS and CSS files on Frontend
add_action( 'wp_enqueue_scripts',  'SFPMCF7_load_front_script_style' );
function SFPMCF7_load_front_script_style() {
    wp_enqueue_script( 'SFPMCF7-script-popupscript', SFPMCF7_PLUGIN_DIR . '/assets/js/success_fail_popupscript.js', false, '1.0.0', true );
    wp_enqueue_script( 'SFPMCF7-script-sweetalert2', SFPMCF7_PLUGIN_DIR . '/assets/js/sweetalert2.all.min.js', false, '1.0.0', true );
    wp_enqueue_style( 'SFPMCF7-sweetalert2-style', SFPMCF7_PLUGIN_DIR . '/assets/css/sweetalert2.min.css', false, '1.0.0' );
    wp_enqueue_style( 'SFPMCF7-style', SFPMCF7_PLUGIN_DIR . '/assets/css/front.css', false, '1.0.0' );
}