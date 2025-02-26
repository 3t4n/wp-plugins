<?php
/*
Plugin Name: Freecaster
Plugin URI:  http://freecaster.tv/
Description: This plugin allows you to embed videos from the Freecaster Platform.
Version:     1.1.2
Author:      ALC, Freecaster Dev Team
Author URI:  http://freecaster.tv/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Freecaster is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Freecaster is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Freecaster. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

/////////////////////////////
//  DEFINE MASTER CLASS
/////////////////////////////

class FreecasterPlugin
{

    // When instance load ...
    function __construct() {}

    // Adding new functions to wordpress core
    function fc_init()
    {
        add_action('admin_print_scripts', array(&$this, 'fc_js_libs'));
        add_action('admin_print_styles', array(&$this, 'fc_css_libs'));
        add_action('admin_menu', array(&$this, 'fc_admin_add'));
        add_action('media_buttons', array(&$this, 'fc_player_button'), 0);
        add_action('plugins_loaded', array(&$this, 'fc_load_textdomain'));
        add_shortcode('fcplayer', array(&$this, 'fc_player_gen'));
        // Ajax
        add_action('wp_ajax_choice', array(&$this, 'fc_choice'));
        add_action('template_redirect', array(&$this, 'fc_trigger_check'));
        add_filter('query_vars', array(&$this, 'fc_add_trigger'));
    }

    // Add trigger for ajax call
    function fc_add_trigger($vars) {
        $vars[] = 'fc_ajax';
        return $vars;
    }

    // Get response code
    function fc_trigger_check() {
        switch (get_query_var('fc_ajax')) {
            case 'async':
                include(plugin_dir_path(__FILE__) . 'fc_ajax.php');
                exit();
                break;
            case 'search':
                include(plugin_dir_path(__FILE__) . 'fc_search.php');
                exit();
                break;
            case 'upload':
                include(plugin_dir_path(__FILE__) . 'fc_upload.php');
                exit();
                break;
        }
    }

    // Load translation
    function fc_load_textdomain()
    {
        load_plugin_textdomain('freecaster', false, plugin_basename( dirname( __FILE__ ) ) . '/lang/');
    }

    // New code needed
    function fc_js_libs()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('thickbox');
    }

    // New style needed
    function fc_css_libs()
    {
        wp_enqueue_style('thickbox');
    }

    // Adding new options panel
    function fc_admin_add()
    {
        add_options_page('Freecaster', 'Freecaster', 'manage_options', 'freecaster', array(&$this, 'fc_admin_options'));
    }

    // Construct the option page
    function fc_admin_options()
    {
        include(plugin_dir_path(__FILE__) . 'fc_options.php');
    }

    // Construct the popup box (video ID chooser)
    function fc_choice()
    {
        include(plugin_dir_path(__FILE__) . 'fc_choice.php');
        exit(0);
    }

    // Add a new media button in the editor
    function fc_player_button()
    {
        echo '<a class="thickbox button" href="' . admin_url() . 'admin-ajax.php?action=choice&amp;width=650&amp;height=512" title="' . __('Add a Freecaster video', 'freecaster') . '"><span class="wp-media-buttons-icon"><img src="' . plugins_url( 'img/camera.png', __FILE__ ) . '" style="width: 18px; margin: -9px 0 0 -8px;" /></span>' . __("Add a Freecaster video", "freecaster") . '</a>';
    }

    // Convert the shortcode
    function fc_player_gen($atts)
    {
        $id    = $atts['id'];
        $width = (isset($atts['width']) ? $atts['width'] : '');
        $fc_playerurl  = get_option('fc_playerurl');
        $fc_playertype = get_option('fc_playertype');
        $player = '<div id="' . $id . '_container"></div><script type="text/javascript" src="' . $fc_playertype . ':' . $fc_playerurl . $id . '.js?id=' . $id . '&amp;width=' . $width . '&amp;autostart=' . $atts['autoplay'] . '"></script>';
        return $player;
    }

}

/////////////////////////////
//  LOAD & INIT COMPONENTS
/////////////////////////////

// Freecaster API functions
include_once(plugin_dir_path(__FILE__) . 'FCAPItools.php');

// Load the Freecaster plugin
$FreecasterPlugin = new FreecasterPlugin();
$FreecasterAPI    = new FCAPItools();

// Init wordpress functions
$FreecasterPlugin->fc_init();

?>