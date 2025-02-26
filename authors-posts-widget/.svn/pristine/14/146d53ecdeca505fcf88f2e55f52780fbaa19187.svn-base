<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
/*
Plugin Name: Authors Posts Widget
Plugin URI: http://androidbubble.com/blog/wordpress/widgets/authors-posts-widget
Description: Authors posts widget with blogger style.
Version: 1.4.1
Author: Fahad Mahmood 
Author URI: https://www.androidbubbles.com
Text Domain: authors-posts-widget
Domain Path: /languages/
License: GPL2


This WordPress Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
This free software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this software. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/ 


        
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        

	include('inc/functions.php');
    


    function register_apw_scripts() {
            
			plugins_url('css/style.css', __FILE__);
			
			
			wp_enqueue_script(
				'apw-script',
				plugins_url('js/functions.js', __FILE__),
				array( 'jquery' )
			);

            wp_register_style('apw-style', plugins_url('css/style.css', __FILE__));
			
			wp_enqueue_style( 'apw-style' );
 
        }
	
        
	add_action( 'wp_enqueue_scripts', 'register_apw_scripts' );

	add_action( 'widgets_init', 'apw_init');

	