<?php
/**
 * Plugin Name: AA pdf reader
 * Plugin URI: http://wordpress.org/aaplayer
 * Description: A free pdf reader ... [pdf link="http://example.../pdffile.pdf"]
 * Version: 1.0
 * Developer + Idea: A. Roy / A. Mahmud
 * Author URI: http://webdesigncr3ator.com
 * Support Email : contactus.aa@gmail.com
 * License: GPL2
 **/
	
	
		function aa_pdf($atts){
				$a = shortcode_atts( array(
					'link' =>''
				), $atts );
			
			return '<iframe src="'.$a['link'].'" width="600" height="780" style="border: none;"></iframe>';
		}
		
		
		
		add_shortcode( 'pdf', 'aa_pdf' );