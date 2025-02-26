<?php
defined('ABSPATH') or die("No script kiddies please!");

/**
 * Plugin Name: MCE Accessible Language Change
 * Plugin URI: http://sprungmarker.de
 * Description: Add <strong>accessible language change</strong> to the WordPress WYSIWYG editor.
 * Version: 2.1
 * Author: Sylvia Egger (developer@sprungmarker.de)
 * Author URI: http://sprungmarker.de
 * License: GNU General Public License v2.0
    License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

    Copyright 2014  Sylvia Egger  (email : developer@sprungmarker.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Custom CSS
if ( ! function_exists('plugin_mce_css') ) {
    function plugin_mce_css( $mce_css ) {
        if ( ! empty( $mce_css ) )
            $mce_css .= ',';

        $mce_css .= plugins_url( '/css/changelang.css', __FILE__ );

        return $mce_css;
    }
}

add_filter( 'mce_css', 'plugin_mce_css' );

// Initialize Plugin
add_action("init","mce_accessible_lang_setup");

if ( ! function_exists('mce_accessible_lang_setup') ) {
    function mce_accessible_lang_setup() {
        //only if editing permissions do we bother

        if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {

            add_filter('mce_buttons', 'register_accessible_lang_button');
            add_filter("mce_external_plugins", "add_accessible_lang_tinymce_plugin");

        }
    }
}

if ( ! function_exists('register_accessible_lang_button') ) {
    function register_accessible_lang_button( $buttons ) {
        array_push($buttons, "separator", "clang,langattribs");
        return $buttons;
    }
}

if ( ! function_exists('add_accessible_lang_tinymce_plugin') ) {
    function add_accessible_lang_tinymce_plugin( $plugin_array ) {
        $plugin_array['changelang'] = plugin_dir_url(__FILE__) . 'editor_plugin.js';
        return $plugin_array;
    }
}
