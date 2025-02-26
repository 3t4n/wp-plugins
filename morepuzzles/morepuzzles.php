<?php

/**
 * @package morepuzzles
 */

/*
Plugin Name: MorePuzzles
Plugin URI: https://morepuzzles.com/docs/wordpress
Description: This plugin is designed for several types of crosswords.
Version: 1.1.4
Author: Berries & Company
Author URI: https://www.berriesand.co/home
License: GPLv2 or later
Text Domain: morepuzzles
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2020-2021 Berries & Company
*/

if (!class_exists('MorePuzzles')) {

    class MorePuzzles
    {
        protected function create_post_type()
        {
            add_action('init', array($this, 'custom_post_type'));
        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            add_action('admin_menu', array($this, 'add_admin_pages'));
            $name = plugin_basename(__FILE__);
            add_filter("plugin_action_links_$name", array($this, 'settings_link'));
        }

        public function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=morepuzzles_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        function add_admin_pages()
        {
            add_menu_page('MorePuzzles plugin', 'MorePuzzles', 'manage_options', 'morepuzzles_plugin', array($this, 'admin_index'), plugins_url('/assets/img/logo.png', __FILE__), 110);
        }

        function admin_index()
        {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        function activate()
        {
            $this->costum_post_type();
            flush_rewrite_rules();
        }

        function deactivate()
        {
            flush_rewrite_rules();
        }

        protected function costum_post_type()
        {
            register_post_type('morepuzzles',  ['public' => true, 'label' => 'MorePuzzles']);
        }

        function enqueue()
        {
            wp_enqueue_style('bscss', plugins_url('/assets/bootstrap.min.css', __FILE__));
            wp_enqueue_script('jquery');
            wp_enqueue_script('bsjs', plugins_url('/assets/bootstrap.bundle.min.js', __FILE__));
            
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/puzzles.css', __FILE__));
            wp_enqueue_script('mypluginscript', plugins_url('/assets/puzzles.js', __FILE__));
        }
    }

    $mPuzzle = new MorePuzzles();
    $mPuzzle->register();


    register_activation_hook(__FILE__, array($mPuzzle, 'activate'));

    register_deactivation_hook(__FILE__, array($mPuzzle, 'deactivate'));
}

function morepuzzles_generateCrossword($attr)
{
    $unique_id = uniqid('puzzle_');
    $attributes = shortcode_atts(array('type' => '#', 'key' => '#', 'ratio' => '0.80'), $attr);
    $html = "<style>
    .iframe-container-$unique_id {
        max-width: 100% !important;
        overflow: hidden;
        padding-top: ". 100 * floatval($attributes['ratio']) ."%;
        position: relative;
    }
    .iframe-container-$unique_id iframe {
        position: absolute;
        border: 0;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
    }
    </style>";
    global $wp;
    $full_url = home_url(add_query_arg($_GET,$wp->request));
    $html .= '<div class="iframe-container-'.$unique_id.'"><iframe src="https://morepuzzles.com/' . $attributes['type'] . '.html?key=' . $attributes['key'] . '&domain='.urlencode($full_url).'"> <p> Your browser does not support iframes... </p></iframe></div>';
    return $html;
}

add_shortcode('morepuzzles', 'morepuzzles_generateCrossword');
