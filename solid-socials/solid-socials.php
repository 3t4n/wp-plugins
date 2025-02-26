<?php
/*
Plugin Name: Solid Socials
Plugin URI: http://codeanthology.com/solid-socials
Description: solid_socials is an easy to use, responsive social sharing plugin. 
Version: 0.5
Author: Rory Kermack 
Author URI: http://codeanthology.com
License: GPLv2 or later
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
*/



// add stylesheet
add_action( 'wp_enqueue_scripts', 'solid_my_stylesheet' );

function solid_my_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'solid-style', plugins_url('style.css', __FILE__) );
    wp_enqueue_style( 'solid-style' );
}


// add js to footer
function init_js_scripts() {
if (!is_admin()) {
    

    
    
    //Use Google to get JQuery libary...
  //  wp_register_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'), false, '');
   // wp_enqueue_script('jquery');
    
    // Linkedin
   // wp_register_script('linkedin',('http://platform.linkedin.com/in.js'));
   // wp_enqueue_script('linkedin');

    // load a JS file to your theme: js/theme.js
    //wp_enqueue_script('solid-socials', plugins_url('js/solid-socials.js', __FILE__) , array('jquery'), '1.0', true);

    }
}
// add_action('init', 'init_js_scripts');




// Admin Section 

// Step 1
add_action('admin_menu','my_sharing_menu');


// if you need to delete options uncomment to clear memory
//delete_option('solid_socials' );

// Step 2
function my_sharing_menu() {
    add_options_page('solid_socials','solid_socials','administrator','solid_socials_settings','solid_socials_display_settings');
}

// Step 3
function solid_socials_display_settings() {
    
    include_once 'admin_options.php';
}

add_action( 'admin_post_solid_socials_save', 'process_solid_socials_options' );

// End Admin

// Set Default Options
$option_name = "solid_socials";
$networks = array('facebook','twitter','stumbleupon','linkedIn','googleplus');
    $new_value = array(
                       'position'=>'1',
                       'fb_option'=>'like',
                       'twitter_handle'=>'',
                       'display_options'=>$networks,
                       'header_height'=>'0',
                       'link_love'=>'2'
                       );
    
    
add_option($option_name,$new_value);


add_filter('the_content','solid_socials_add_social');




function solid_socials_add_social($content) {
   
   if(! is_admin()){
        if(is_single()) {
        $file = include_once 'wgt.php';
         return $content;
    }
    
    else if(is_page()){
      $file = include_once 'wgt.php';
      return $content;
    }
    
        else {
      return $content;
    }
}
    
   }




?>
