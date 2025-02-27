<?php
/**
 * Plugin Name: ERE Colors - Essential Real Estate Add-On
 * Plugin URI: https://wordpress.org/plugins/ere-colors
 * Description: Customize the colors of the Essential Real Estate plugin.
 * Version: 1.5
 * Author: G5Theme
 * Author URI: http://themeforest.net/user/g5theme
 * Text Domain: ere-colors
 * Domain Path: /languages/
 * License: GPLv2 or later
 */
/*
Copyright 2017 by G5Theme

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
function ere_colors_load_textdomain()
{
    $mofile = plugin_dir_path(__FILE__) . 'languages/' . 'ere-colors-' . get_locale() .'.mo';
    if (file_exists($mofile)) {
        load_textdomain('ere-colors', $mofile );
    }
}

add_action('plugins_loaded', 'ere_colors_load_textdomain');
/**
 * @return array
 */
function ere_colors_register_option()
{
    return array(
        array(
            'id' => 'ere_colors_option',
            'title' => esc_html__('Colors', 'ere-colors'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                array(
                    'id' => 'accent_color',
                    'type' => 'color',
                    'alpha' => true,
                    'title' => esc_html__('Accent Color', 'ere-colors'),
                    'default' => '#fb6a19',
                    'validate' => 'color',
                ),
                array(
                    'id' => 'contrast_color',
                    'type' => 'color',
                    'title' => esc_html__('Heading Color', 'ere-colors'),
                    'default' => '#222',
                    'validate' => 'color',
                    'alpha' => true,
                ),
                array(
                    'id' => 'border_color',
                    'type' => 'color',
                    'title' => esc_html__('Border Color', 'ere-colors'),
                    'default' => '#eee',
                    'validate' => 'color',
                    'alpha' => true,
                ),
            )
        )
    );
}
add_filter('ere_register_options_config_bottom', 'ere_colors_register_option', 10);
require( 'custom-css.php' );
