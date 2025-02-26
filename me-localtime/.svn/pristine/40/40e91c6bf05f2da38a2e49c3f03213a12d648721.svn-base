<?php

class MEGLT_LocalTimeShortCode {

	function __construct() {

		add_shortcode( 'melt_localtime', array( $this, 'melt_local_time_display' ));

	}

	function melt_local_time_display( $atts ) {

		$atts = shortcode_atts( array(
			'text' => '',
			'color' => '',
			'size' => ''
		), $atts );

		$style_array = array();
		$style = '';

		if( !empty( $atts['color'] ) ) {
			$style_array['color'] = $atts['color'];
		}

		if( !empty( $atts['size'] ) )   {
			$style_array['font-size'] = $atts['size'];
		}


		if (!empty( $style_array ) ){

			$style = 'style="';

			foreach ($style_array as $key => $value) {

					$style .= $key.': '.$value.'; ';

			}

			$style .= '"';

		}

	  $display = '<div class="melt_localtime"><p '. $style .'>'.$atts['text'].' <span class="melt_localtimedisplay"></span></p></div>';

	  return $display;

	}

}

$displayTime = new MEGLT_LocalTimeShortCode();
