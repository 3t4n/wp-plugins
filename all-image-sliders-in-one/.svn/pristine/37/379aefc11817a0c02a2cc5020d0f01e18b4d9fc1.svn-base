<?php 
/*
 * Plugin Name: all-image-sliders-in-one
 * Author: Saeed Hanafi
 * Author URI: https://github.com/saeid-hanafi
 * Version: 2.0.1
 * Description: This is a plugin for make woocommerce slider,widget slider,advertising slider for all pages,slider with shortcode and without shortcode.
 * License: GPLv2
 * Text Domain: shisp-images-slider
 * Domain Path: /languages
 */
/*
This is a plugin for make several special image slider and put they on per the loop products pages.
Copyright (C) 2020  Saeed Hanafi

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
*/

defined('ABSPATH') || exit;

add_action('plugins_loaded','shisp_textdomain_load_callback');

function shisp_textdomain_load_callback(){
    load_plugin_textdomain( 'shisp-images-slider', false, basename(plugin_dir_path(__FILE__)) . "/languages/" );
}

define('SHISP_INC',plugin_dir_path( __FILE__ ).'admin/includes/');
define('SHISP_IMG',plugins_url( 'admin/images/', __FILE__ ));
define('SHISP_CSS',plugins_url( 'admin/css/', __FILE__ ));
define('SHISP_JS',plugins_url( 'admin/js/', __FILE__ ));
define('SHISP_VIEW',plugin_dir_path( __FILE__ ).'admin/view/');
define('SHISP_NO_IMG',plugins_url( 'admin/images/no-image.png', __FILE__ ));


add_action('admin_enqueue_scripts','shisp_admin_styles');

add_action('save_post','shisp_save_sliders');

add_action('edit_post','shisp_save_sliders');

add_filter('manage_shisp-image-slider_posts_columns','shisp_add_shortcode_column');

add_action('manage_shisp-image-slider_posts_custom_column','shisp_custom_shortcode_column',10,2);

add_action('wp_enqueue_scripts',function(){

    wp_register_style( 'shisp-billboard-style', SHISP_CSS.'jquery.billboard.css', false, '1.0.0' );

    wp_register_script( 'shisp-easing-script', SHISP_JS.'jquery.easing.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'shisp-swipe-script', SHISP_JS.'jquery.event.swipe.js', array('jquery'), '1.0.0', true );
    wp_register_script( 'shisp-billboard-script', SHISP_JS.'jquery.billboard.js', array('jquery','shisp-easing-script','shisp-swipe-script'), '1.0.0', true );

});

add_action('init',function(){
    add_shortcode( 'shispspecialslider', 'shisp_add_slider_shortcode' );
});

add_action('init',function(){
    add_shortcode( 'shispadvertising','shisp_add_advertising_callback' );
});

add_action( 'init',function() {
    add_shortcode( 'shispglobal', 'shisp_add_global_sliders_shortcode' ); 
});

add_action('woocommerce_before_main_content','shisp_show_slider_in_cat');
add_action('wp_head','shisp_add_advertising_box');

require (SHISP_INC.'functions.php');
require (SHISP_INC.'shisp-register-post-type.php');
require (SHISP_VIEW.'shisp-image-slider-widget.php');
