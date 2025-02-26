<?php
/*
Plugin Name: Awesome Shortcodes For Genesis
Plugin URI: https://techkle.com/awesome-shortcodes/
Description: This Plugin will add some Awesome shortcodes to wordpress editor.
Version: 1.1.8
Author: Sanjeev Mohindra
Author URI: https://techkle.com/
License: GPL2
*/

/*  Copyright 2014  Sanjeev Mohindra  (email : admin_makewebworld@makewebworld.com)

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
require_once 'ASG-button.php';
require_once 'ASG-shortcodes.php';
require_once 'ASG-admin.php';
include_once 'ASG-rss.php';

add_action( 'admin_head', 'asg_buttons' ); //Add the ASG Button to wordpress editor.
add_action('admin_enqueue_scripts', 'asg_admin_css'); // Add CSS for tinymce editor.
add_action('wp_enqueue_scripts', 'asg_shortcodes_styles'); // Add CSS for frontend.

/* Create Plugin Setting Page */
add_action( 'admin_menu', 'asg_admin_menu' );
?>