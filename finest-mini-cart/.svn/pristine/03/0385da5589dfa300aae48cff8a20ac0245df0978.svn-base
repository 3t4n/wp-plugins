<?php
function finest_register_enqueue_script(){
  $checkoutshow = get_theme_mod( 'fmc_count_hide_checkout',true );
  $cartshow = get_theme_mod( 'fmc_count_hide_checkout',true );

    // All Css File Enqueue
    wp_enqueue_style('fmc-custom-fonts', FMC_ASSETS_CSS . 'custom-fonts.css', array() , '0.6.14', 'all');
    wp_enqueue_style('perfect-scrollbar', FMC_ASSETS_SCROLLBAR_CSS . 'perfect-scrollbar.min.css', array() , '0.6.14', 'all');
    wp_enqueue_style('scrollbar-theme', FMC_ASSETS_SCROLLBAR_CSS . 'custom-theme.css', array() , '0.6.14', 'all');
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style('fmc-main', FMC_ASSETS_CSS . 'frontend.css', array() , '1.0', 'all');

    // All jS File Enqueue

    wp_enqueue_script( 'perfect-scrollbar-js', FMC_ASSETS_SCROLLBAR_JS . 'perfect-scrollbar.jquery.min.js', array('jquery'), '0.6.14', true );
    wp_enqueue_script( 'fmc-ajax-add-to-cart', FMC_ASSETS_JS . 'ajax-add-to-cart.js', array('jquery'), time(), true );
    wp_enqueue_script( 'floting-js', FMC_ASSETS_JS . 'image-flotaing.js', array('jquery'), time(), true );
    wp_enqueue_script( 'fmc-main-js', FMC_ASSETS_JS . 'frontend.js', array('jquery' , 'jquery-effects-core'), time(), true );
    wp_enqueue_script( 'jquery-effects-core' );



    wp_localize_script( 'fmc-main-js', 'finest', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'finest-security' ),
        'auto_show' => 'yes',
        'finest_auto_show_normal' =>'yes',
        'woocommerce_cart_redirect_after_add' => 'yes',
        'hide_count_checkout' =>  $checkoutshow,
        'hide_count_cart' =>  $cartshow,
      ) );

};
add_action( 'wp_enqueue_scripts', 'finest_register_enqueue_script' );



