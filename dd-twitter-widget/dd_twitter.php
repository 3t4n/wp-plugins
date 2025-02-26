<?php
/*
Plugin Name: DD_Twitter
Version: 2.1
Plugin URI: http://dijkstradesign.com
Description: A plug-in to add a twitterfeed widget
Author: Wouter Dijkstra
Author URI: http://dijkstradesign.com
*/

/*  Copyright 2013  WOUTER DIJKSTRA  (email : info@dijkstradesign.nl)

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


require_once('inc/setting_page.php');
require_once('inc/widget.php');

function dd_twitter_add()
{
    wp_register_style( 'dd_style_styles', plugins_url('/css/style.css', __FILE__) );
    wp_enqueue_style( 'dd_style_styles' );

}
add_action( 'admin_init', 'dd_twitter_add' );



function shortcode_dd_twitter( $atts ){
    // Configure defaults and extract the attributes into variables

    $args = array(
        'widget_id' => $atts['widget_id'],
        'by_shortcode' => 'shortcode_',
    );

    ob_start();
    the_widget( 'dd_twitter', '', $args);
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'dd_twitter', 'shortcode_dd_twitter' );