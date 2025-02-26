<?php
/**
 * @package SocialLikeboxSliderPlugin
 */ 

/* 
Plugin Name: Social Like Box Slider
Plugin URI: http://demo.kamilnowak.com/social-likebox-slider/
Description: Display like box slider for facebook, twitter
Version: 1.0.1
Author: Kamil Nowak
Author URI: http://kamilnowak.com/
License: GPLv2 or later
Text Domain: slboxs
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

Copyright 2005-2015 Automattic, Inc.
*/

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}


// Current version number
if (!defined('SLBOXS_VERSION')){
    define('SLBOXS_VERSION', '1.0.1');
}

define( 'SLBOXS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( SLBOXS__PLUGIN_DIR . 'class.sociallikeboxslider.php' );

if(class_exists('SocialLikeboxSlider')){
    $sociallikeboxslider = new SocialLikeboxSlider();
}

if ( is_admin() ) {
    require_once( SLBOXS__PLUGIN_DIR . 'class.sociallikeboxslider-admin.php' );
    $sociallikeboxslider_admin = new SocialLikeboxSliderAdmin();
    
}

add_action('plugins_loaded', array( $sociallikeboxslider, 'check_version' ) );

// activation
register_activation_hook(__FILE__, array( $sociallikeboxslider, 'activation' ) );

// deactivation
register_deactivation_hook(__FILE__, array( $sociallikeboxslider, 'deactivation' ) );

// link settings
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'slboxs_settings_link');
function slboxs_settings_link($links){
    $settings_link = array(
        '<a href="'.admin_url( 'options-general.php?page=slboxs' ) . '">' . __('Settings') . '</a>'
    );
    return array_merge( $links, $settings_link );
}

// unintall