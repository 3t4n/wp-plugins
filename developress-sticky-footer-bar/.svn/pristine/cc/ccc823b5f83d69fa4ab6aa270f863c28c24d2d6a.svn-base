<?php 

function developress_sticky_footer_bar_activate() {
    // Set default values ​​only if options don't already exist
    if (false === get_option('active_stiky_bar')) {
        add_option('active_stiky_bar', '0'); 
    }
    if (false === get_option('background_bar')) {
        add_option('background_bar', '#777'); 
    }
    if (false === get_option('font_color')) {
        add_option('font_color', '#666666'); 
    }
    if (false === get_option('font_size')) {
        add_option('font_size', '12');
    }
    if (false === get_option('icon_size')) {
        add_option('icon_size', '15');
    }
    if (false === get_option('font_size_other_label')) {
        add_option('font_size_other_label', '12'); 
    }
    if (false === get_option('translation_close_link')) {
        add_option('translation_close_link', 'Close'); 
    }
    if (false === get_option('translation_menu_link')) {
        add_option('translation_menu_link', 'Menu'); 
    }
    if (false === get_option('number_items_first_menu')) {
        add_option('number_items_first_menu', '4'); 
    }
    if (false === get_option('visibility')) {
        add_option('visibility', 'everywhere'); 
    }
    if (false === get_option('custom_css')) {
        add_option('custom_css', ''); 
    }


}
register_activation_hook(__FILE__, 'developress_sticky_footer_bar_activate');