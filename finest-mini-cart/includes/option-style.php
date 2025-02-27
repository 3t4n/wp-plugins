<?php
function fmc_options_scripts(){


    wp_enqueue_style('fmc-main', FMC_ASSETS_CSS . 'frontend.css',array(), FMC_VERSION );

    // product box


   $fmc_dynamic_css  = '';


    // Cart Style Css
    if ( file_exists(  FMC_INC . 'custom-css/cart-style.php' ) ) {
        require_once(  FMC_INC . 'custom-css/cart-style.php' );
    };

    if ( file_exists(  FMC_INC . 'custom-css/product-style.php' ) ) {
        require_once(  FMC_INC . 'custom-css/product-style.php' );
    };

    if ( file_exists(  FMC_INC . 'custom-css/cart-box.php' ) ) {
        require_once(  FMC_INC . 'custom-css/cart-box.php' );
    };


    $fmc_dynamic_css = fmc_css_strip_whitespace( $fmc_dynamic_css );
	wp_add_inline_style( 'fmc-main', $fmc_dynamic_css );

}
add_action( 'wp_enqueue_scripts', 'fmc_options_scripts', 5 );