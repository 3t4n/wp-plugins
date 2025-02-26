<?php
defined('ABSPATH') or die('No script kiddies please!!');

/**
 * fstp custom tab height customize
 */
if (!empty($home_menu_detail['tab_height'])) {
    $custom_height = $home_menu_detail['tab_height'];

    $tab_height = "#$icon_id .fsdt-html-wrap .fsdt-inner-scroll{max-height:" . $custom_height . '}';

    wp_add_inline_style('fst-frontend-custom', $tab_height);
}
if ($each_customize_status == 1) {
/**
 * tab text or icon color customize
 */
if (!empty($home_menu_detail['tab_text_color'])) {

    $custom_icon_color = $home_menu_detail['tab_text_color'];
    if ($home_menu_template == 'template-6' || $home_menu_template == 'template-7' || $home_menu_template == 'template-8') {
        $tab_active_color = "#$icon_id.fsdt-tab.fsdt-menu-wrap.active .fsdt-menu-text{background:" . $custom_icon_color . ' ; box-shadow: 1px 1px 3px rgb(0 0 0 / 25%);}';
    } else {
        $tab_active_color = "#$icon_id.fsdt-tab.fsdt-menu-wrap.active {background:" . $custom_icon_color . '}';
    }
    $tab_icon_color = "#$icon_id a.fsdt-tab-link{color:" . $custom_icon_color . '}';
    if ($home_menu_template == 'template-6' || $home_menu_template == 'template-7' || $home_menu_template == 'template-8') {

        $tab_text_hover_color = "#$icon_id.fsdt-tab.fsdt-menu-wrap .fsdt-menu-text:hover{background:" . $custom_icon_color . '}';
    } else {
        $tab_text_hover_color = "#$icon_id a.fsdt-tab-link:hover{background:" . $custom_icon_color . '}';
    }
    $tool_tip_color = "#$icon_id .fsdt-tool-tip{color:" . $custom_icon_color . '}';

    wp_add_inline_style('fst-frontend-custom', $tab_icon_color);
    wp_add_inline_style('fst-frontend-custom', $tab_text_hover_color);
    wp_add_inline_style('fst-frontend-custom', $tool_tip_color);
    wp_add_inline_style('fst-frontend-custom', $tab_active_color);
}
/**
 * tab bg color customize
 */

    if (!empty($home_menu_detail['tab_bg_color'])) {
        $custom_icon_bgcolor = $home_menu_detail['tab_bg_color'];
        if ($home_menu_template == 'template-6' || $home_menu_template == 'template-7' || $home_menu_template == 'template-8') {
            $text_active_color = "#$icon_id.fsdt-tab.fsdt-menu-wrap.active .fsdt-menu-text a.fsdt-tab-link{color:" . $custom_icon_bgcolor . '}';
        } else {
            $text_active_color = "#$icon_id.fsdt-tab.fsdt-menu-wrap.active .fsdt-menu-text a.fsdt-tab-link{color:" . $custom_icon_bgcolor . '}';
        }
        $tool_tip_arrow_left = ".fsdt-left #$icon_id a span.fsdt-tool-tip::after {
        border-color: transparent " . $custom_icon_bgcolor . " transparent transparent; }";

        $tool_tip_arrow_right = ".fsdt-right #$icon_id a span.fsdt-tool-tip::after {
            border-color: transparent transparent transparent " . $custom_icon_bgcolor .
            '}';
        if ($home_menu_template == 'template-6' || $home_menu_template == 'template-7' || $home_menu_template == 'template-8') {
            $tab_icon_bgcolor = "#$icon_id.fsdt-tab.fsdt-menu-wrap .fsdt-menu-text{background-color:" . $custom_icon_bgcolor . '}';
        }
        if ($home_menu_template == 'template-1' || $home_menu_template == 'template-2' || $home_menu_template == 'template-3' || $home_menu_template == 'template-4' || $home_menu_template == 'template-5') {
            $tab_icon_bgcolor = "#$icon_id.fsdt-tab.fsdt-menu-wrap{background-color:" . $custom_icon_bgcolor . '}';
        }
        $tab_hover_color = "#$icon_id a.fsdt-tab-link:hover{color:" . $custom_icon_bgcolor . '}';
        $tool_tip_bg_color = "#$icon_id .fsdt-tool-tip{background-color:" . $custom_icon_bgcolor . '}';


        wp_add_inline_style('fst-frontend-custom', $text_active_color);


        wp_add_inline_style('fst-frontend-custom', $tab_icon_bgcolor);

        wp_add_inline_style('fst-frontend-custom', $tab_hover_color);

        wp_add_inline_style('fst-frontend-custom', $tool_tip_bg_color);
        wp_add_inline_style('fst-frontend-custom', $tool_tip_arrow_left);
        wp_add_inline_style('fst-frontend-custom', $tool_tip_arrow_right);
    }
}