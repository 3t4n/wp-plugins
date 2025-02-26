<?php
defined('ABSPATH') or die('No script kiddies please!!');
/**
 * progress bar position 
 */
if (!empty($position)) {

    if ($position == 'bottom') {
        $placement = ".$alias_class_1{bottom:0 ;}";
        wp_add_inline_style('artl-frontend-progressbar', $placement);
    } elseif ($position == 'top') {
        $placement = ".$alias_class_1{top:0 ;}";
        wp_add_inline_style('artl-frontend-progressbar', $placement);
    } else {
        $placement = ".$alias_class_1{}";
        wp_add_inline_style('artl-frontend-progressbar', $placement);
    }
}
/**
 * progress bar thickness and main-color 
 */

    if (!empty($bar_thickness) || !empty($primary_color) && empty($secondary_color)) {

        $bar_main_color = '.' . $alias_class_3 . '{height:' . $bar_thickness . 'px;
            background:' . $primary_color . ' ;}';

        wp_add_inline_style('artl-frontend-progressbar', $bar_main_color);
    }

/**
 * progress bar thickness and bgcolor 
 */
if (!empty($bar_thickness) || !empty($background)) {

    $bar_color = '.' . $alias_class_2 . '{height:' . $bar_thickness . 'px;
        background-color:' . $background . ' ;}';
    wp_add_inline_style('artl-frontend-progressbar', $bar_color);
}

