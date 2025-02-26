<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_ac_shortcode_add_question{
	
    public function __construct(){
		add_shortcode( 'awesome_changelog', array( $this, 'awesome_changelog_display' ) );
   	}	
	
	public function awesome_changelog_display($atts, $content = null ) {
			
		$atts = shortcode_atts( array(
			'id' => '',
		), $atts);
		
		$post_id = isset( $atts['id'] ) ? $atts['id'] : '';
		
		
		// echo $id;
		
		ob_start();
		include( AC_PLUGIN_DIR . 'templates/awesome-changelog.php' );
		return ob_get_clean();
	}
	
} new class_ac_shortcode_add_question();