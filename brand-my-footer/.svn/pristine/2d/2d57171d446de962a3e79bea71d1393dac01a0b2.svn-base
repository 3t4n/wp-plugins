<?php

/**
 * Plugin Name: Brand my Footer
 * Plugin URI: https://www.thriveability.co.uk/
 * Description: This is a plugin that adds branding to footers via shortcode.
 * Version: 1.1
 * Author: Jake Brown
 * Author URI: http://www.thriveability.co.uk/
 **/
function bmf_handle_footer( $attributes ) {

    $attributeArray = shortcode_atts( array(
        "brand-name" => "Thrive",
        "brand-link" => "https://thriveability.co.uk/",
        "designed-by-text" => "Website Development by",
        "font-colour" => "#ffffff",
        "logo-colour" => "#62165D",
        "font-size" => "20px",
    ), $attributes );

    $html = '<div class="branding">';
    $html .= '<p><a href="' . $attributeArray["brand-link"] . '" target="_blank" style="font-size: ' . $attributeArray["font-size"] . '; color: ' . $attributeArray['font-colour'] . ';"> ' . $attributeArray['designed-by-text'] . ' <strong style="color: ' . $attributeArray['logo-colour'] . '">' . $attributeArray['brand-name'] . '</strong></a></p>';
    $html .= '</div>';

    return $html;
}

function bmf_register_css() {
    wp_enqueue_style( 'plugin-style', plugins_url( 'css/plugin-style.css' , __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'bmf_register_css' );
add_shortcode( 'brand-my-footer', 'bmf_handle_footer' );
