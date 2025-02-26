<?php
/* 
Plugin Name: Answering Contact Form
Plugin URI: http://www.answeringcontactform.com
Description: Answering Contact Form answers your users emails directly on the page. You will never have to answer the same questions over and over again. It's a contact form and assistant in one. 
Version: 1.0
Author: Mattias Jönsson
Author URI: http://www.answeringcontactform.com
License: GPL2

Answering Contact Form is a free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Answering Contact Form is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Contact Us Page. If not, see www.gnu.org/licenses/old-licenses/gpl-2.0.html.
*/

/*
 Add CSS and Javascript.
*/

add_action( 'wp_enqueue_scripts', 'acfl_add_scripts' );

function acfl_add_scripts() {
        wp_register_style( 'acflStyle', plugins_url('css/acflStyle.css', __FILE__) );
		wp_enqueue_style( 'acflStyle' );
		
		wp_register_script( 'acfljquery', plugins_url('js/acfljquery.js',__FILE__ ), array( 'jquery' ));
        wp_enqueue_script('acfljquery');
       
	    wp_register_style( 'acflHide', plugins_url('css/acflHide.css', __FILE__) );
}

/*
 Include PHP.
*/

include( plugin_dir_path( __FILE__ ) . 'settings/acf_settings.php');
include( plugin_dir_path( __FILE__ ) . 'includes/acf_answers.php');
include( plugin_dir_path( __FILE__ ) . 'includes/acf_contact_form.php');
include( plugin_dir_path( __FILE__ ) . 'includes/acf_help_text.php');
include( plugin_dir_path( __FILE__ ) . 'includes/acf_shortcode.php');
?>
