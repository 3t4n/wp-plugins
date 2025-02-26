<?php

/*
Plugin Name: Animated Preloader
Plugin URI: http://arthi.im/
Description: This is a simple WordPress plugin, to show animated preloader before loading full content of your website.
Author: Arthi
Version: 1.0
Author URI: http://arthi.im/
License: GPL
Tags: preloader, pre loader, pre-loader, preloader plugin, simple preloader, animated preloader.
 */



function ap_append_pre_loader_content(){
        echo    '<div id="pre-loader">'.
                '<div class ="loader-inner ball-scale-multiple">'.
                '<div></div>'.
                '<div></div>'.
                '<div></div>'.
                
                '</div>'.
                '<p id = "pre-loader-text"> Loading........ </p>'.
            '</div>';
}

add_action( 'wp_footer', 'ap_append_pre_loader_content' );

function ap_enqueue_css_js(){

    $css_url = plugins_url('/css/style.css', __FILE__); 
    $js_url = plugins_url('/js/script.js', __FILE__);
    
    // Google font css
    wp_enqueue_style( 'preloader-font-exo','https://fonts.googleapis.com/css?family=Exo:200>' );

    wp_enqueue_style( 'preloader-css', $css_url );

    wp_enqueue_script( 'pre-loader-js', $js_url , array('jquery') ); 

}
add_action('wp_enqueue_scripts','ap_enqueue_css_js');
?>