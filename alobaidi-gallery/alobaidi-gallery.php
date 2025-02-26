<?php
/*
Plugin Name: Alobaidi Gallery
Plugin URI: http://wp-plugins.in/Alobaidi_Gallery
Description: Simple WordPress plugin to create gallery, convert your website to gallery, beautiful design with responsive lightbox, fully responsive and retina ready, easy to use.
Version: 1.0.0
Author: Alobaidi
Author URI: http://wp-plugins.in
License: GPLv2 or later
*/

/*  Copyright 2016 Alobaidi (email: wp-plugins@outlook.com)

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


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// Add plugin meta links
function Alobaidi_Gallery_plugin_row_meta( $links, $file ) {

    if ( strpos( $file, 'alobaidi-gallery.php' ) !== false ) {
        
        $new_links = array(
                        '<a href="http://wp-plugins.in/Alobaidi_Gallery" target="_blank">Explanation of Use</a>',
                        '<a href="https://profiles.wordpress.org/alobaidi#content-plugins" target="_blank">More Plugins</a>',
                        '<a href="http://j.mp/ET_WPTime_ref_pl" target="_blank">Elegant Themes</a>',
                    );
        
        $links = array_merge( $links, $new_links );
        
    }
    
    return $links;
    
}
add_filter( 'plugin_row_meta', 'Alobaidi_Gallery_plugin_row_meta', 10, 2 );


// Add settings page link in before activate/deactivate links.
function Alobaidi_Gallery_plugin_action_links( $actions, $plugin_file ){
    
    static $plugin;

    if ( !isset($plugin) ){
        $plugin = plugin_basename(__FILE__);
    }
        
    if ($plugin == $plugin_file) {
        
        if ( is_ssl() ) {
            $settings_link = '<a href="'.admin_url( 'plugins.php?page=alobaidi_gallery_settings', 'https' ).'">Settings</a>';
        }else{
            $settings_link = '<a href="'.admin_url( 'plugins.php?page=alobaidi_gallery_settings', 'http' ).'">Settings</a>';
        }
        
        $settings = array($settings_link);
        
        $actions = array_merge($settings, $actions);
            
    }
    
    return $actions;
    
}
add_filter( 'plugin_action_links', 'Alobaidi_Gallery_plugin_action_links', 10, 5 );


// Include settings page
include ( plugin_dir_path(__FILE__).'/settings.php' );


// Redirect to gallery page
function Alobaidi_Gallery_redirect_to_gallery_page(){

    if( get_option('alobaidi_gallery_home') and !is_feed() ){
        $template = plugin_dir_path(__FILE__).'/template/gallery_page.php'; // gallery page url
        include($template); // redirect to gallery page
        exit(); // important!
    }

    else{

        if( get_option('alobaidi_gallery_page') and !is_feed() ){
            $url = get_option('alobaidi_gallery_page');
            $page_id = url_to_postid($url);

            if( is_page($page_id) ){
                $template = plugin_dir_path(__FILE__).'/template/gallery_page.php'; // gallery page url
                include($template); // redirect to gallery page
                exit(); // important!
            }
        }

    }
	
}
add_action( 'template_redirect', 'Alobaidi_Gallery_redirect_to_gallery_page' );


// Enqueue JS
function Alobaidi_Gallery_JS(){
    wp_enqueue_script( 'alobaidi-gallery-fancybox-js', plugins_url( '/template/fancy/js/jquery.fancybox-1.3.7.js', __FILE__ ), array('jquery'), false, false);
}


// Include JS
function Alobaidi_Gallery_Include_JS(){   
    if( get_option('alobaidi_gallery_page') ){

        $url = get_option('alobaidi_gallery_page');
        $page_id = url_to_postid($url); 

        if( is_page($page_id) ){
            Alobaidi_Gallery_JS();
        }

    }

    else{

        if( get_option('alobaidi_gallery_home') ){
            Alobaidi_Gallery_JS();
        }

    }
}
add_action('wp_footer', 'Alobaidi_Gallery_Include_JS');

?>