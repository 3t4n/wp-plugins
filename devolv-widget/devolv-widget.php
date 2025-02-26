<?php
/*
Plugin Name: Devolv Widget
Plugin URI:  https://www.devolv.com/docs/articles/apps/integrate-map-to-website
Description: Add the Devolv map widget to your WordPress site.
Version:     1.0
Author:      Devolv
Author URI:  https://www.devolv.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function devolv_widget_init() {
    wp_enqueue_script( 'devolv-widget-js', 'https://www.devolv.com/widget/widget.js', array(), '1', true );
}

add_action('wp_enqueue_scripts','devolv_widget_init');