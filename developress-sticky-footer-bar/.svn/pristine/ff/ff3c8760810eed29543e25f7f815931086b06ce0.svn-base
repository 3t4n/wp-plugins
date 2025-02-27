<?php
// If uninstall was not called by WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

$options = [
    'active_stiky_bar',
    'background_bar',
    'number_items_first_menu',
    'font_color',
    'font_size',
    'icon_size',
    'font_size_other_label',
    'translation_close_link',
    'translation_menu_link',
    'number_items_first_menu',
    'visibility',
    'custom_css',

];

// Loop through the array to remove options
foreach ($options as $option) {
    delete_option($option);
}