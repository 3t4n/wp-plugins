<?php

function arb_exp_shortcode_iframe($atts){
    $manage = new ARB_EXP_Helpers();
    $iframe = $manage->arb_exp_getIframeById($atts['id']);
    $template = $iframe[0]['text'];
    return $template;
}

add_shortcode('shortcode_arbitrage', 'arb_exp_shortcode_iframe');

function arb_exp_style_frontend() {
    wp_enqueue_style( 'abr_exp_iframe_style', plugins_url('/css/style_iframe_arb.css', __FILE__) );
}

add_action( 'wp_enqueue_scripts', 'arb_exp_style_frontend' );

?>