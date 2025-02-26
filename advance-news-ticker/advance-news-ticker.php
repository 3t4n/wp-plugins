<?php
/*
Plugin Name: Advance News Ticker
Plugin URI: http://plugins.dhakaambulance.com/advance-news-ticker/
Description: Advance News Ticker is a multi-functional data display plugin
Text Domain: advance-news-ticker
Version: 1.0
Author: MD. Abunaser Khan
Author URI: http://abunaserkhan.tk/
License: GPL2
*/

/*
Copyright 2018 Metaphor Creations  (email : mdabunaserkhanbd@gmail.com)

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

//Add Plugin File Here

include('inc/advance-news-ticker-shortcode.php');
include('inc/advance-news-ticker-option-page.php');


//Add Here Plugin FrontEnd Css And Js File

function advance_news_ticker_scripts() {
	wp_register_style('advance-news-ticker', plugins_url('/assets/css/advance-news-ticker.css', __FILE__));
	wp_enqueue_style('advance-news-ticker');   
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'advance-news-ticker',  plugins_url('/assets/js/advance-news-ticker.js', __FILE__), array( 'jquery' ), '1.0', true );
}
add_action('wp_enqueue_scripts', 'advance_news_ticker_scripts');


//Add Here Plugin Admin Panel Css And Js File
function advance_news_ticker_color_script() {
	wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-script',plugins_url('/assets/js/color-script.js',__FILE__));
}
add_action('admin_enqueue_scripts', 'advance_news_ticker_color_script');
