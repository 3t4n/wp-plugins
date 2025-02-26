<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

add_action( 'wp_enqueue_scripts', 'armicn_dynamic_css' );
function armicn_dynamic_css() {

    $armicn_options = get_option( 'armicn_options' ); 
    $main_menu_color = !empty($armicn_options['icon_color']) ? $armicn_options['icon_color'] : '';
    $icon_font_size = !empty($armicn_options['icon_font_size']) ? $armicn_options['icon_font_size'] : '';
    $icon_margin = !empty($armicn_options['icon_margin']) ? $armicn_options['icon_margin'] : '';


    $custom_css = "";

    if (!empty($main_menu_color)) {
        $custom_css .= "color: " . esc_attr($main_menu_color) . "; ";
    }

    if (!empty($icon_font_size)) {
        $custom_css .= "font-size: " . esc_attr($icon_font_size) . "; ";
    }

    if (!empty($icon_margin)) {
        $custom_css .= "margin: " . esc_attr($icon_margin) . "; ";
    }

    if (!empty($custom_css)) {
        // Wrap the styles in the selector
        $custom_css = ".menu-item > a .armicn.menu-icon { " . $custom_css . " }";
        wp_add_inline_style('armicn-style', $custom_css);
    }
}


