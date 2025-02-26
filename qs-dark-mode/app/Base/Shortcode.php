<?php

namespace QSDarkMode\Base;

class Shortcode
{
	public function register() {
		add_shortcode( 'qs-dark-mode', [$this,'preset_content_button'] );
	}

    function preset_content_button($atts, $content = "" ){

        $atts = shortcode_atts( array(
            'preset' => 'style1',
          
        ), $atts, 'qs_dark_mode' );
        
       $file = 'views/presets/style1.php';
       include_once( $file );
       
      
    }
}