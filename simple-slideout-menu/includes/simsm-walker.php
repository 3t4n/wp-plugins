<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Simsm_Menu_Walker extends Walker_Nav_Menu {
    // Add classes to the li element
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"child-menu level-$depth\">\n";
    }

    // Add main menu items and links
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_classes = empty($item->classes) ? array() : (array) $item->classes;
        $li_classes[] = 'parent';

        if ($args->walker->has_children) {
            $li_classes[] = 'dropdown';
        }

        if (in_array('current-menu-item', $li_classes) || in_array('current-menu-ancestor', $li_classes)) {
            $li_classes[] = 'active';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args));

        $output .= $indent . '<li class="' . esc_attr($class_names) . '">';

        $attributes = '';
        !empty($item->attr_title) and $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
        !empty($item->target) and $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn) and $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
        !empty($item->url) and $attributes .= ' href="' . esc_attr($item->url) . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<span class="menu-label">' . esc_html($item->title) . '</span>';
        $item_output .= '</a>';
        if ($args->walker->has_children) {
            $item_output .= '<span class="child-menu-toggler icon-plus"></span>';
        }
        $item_output .= $args->after;
        
        $output .= $item_output;

        //$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }


    // Close the li and ul elements
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= "</ul>\n";
    }
}
