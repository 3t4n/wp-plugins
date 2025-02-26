<?php
/**
 * This file has all the main shortcode functions
 */
/*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');



/*
 * Fix Shortcodes
 * @ANT
 */
if( !function_exists('sq_fix_shortcodes') ) {
	function sq_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'sq_fix_shortcodes');
}



/*
 * Clear
 * @ANT
 */
if( !function_exists('sq_clear_shortcode') ) {
	function sq_clear_shortcode() {
	   return '<div class="clear"></div>';
	}
	add_shortcode( 'sq_clear', 'sq_clear_shortcode' );
}


/*
 * Buttons
 * @ANT
 */
if( !function_exists('sq_button_shortcode') ) {
	function sq_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'			=> 'blue',
			'url'			=> 'http://foreigncodes.com',
			'button_target' => '',
			'btnrel' => '',
			'title'			=> 'Visit Site'
		), $atts ) );
		
		$button = NULL;
		$button .= '<a href="' . $url . '" class="simplebtn ' . $color . '" target="'. $button_target .'" rel="'. $btnrel .'">';
				    $button .= $content;		
		$button .= '</a>';
		return $button;
	}
	add_shortcode('sq_button', 'sq_button_shortcode');
}




/*
 * Boxes
 * @ANT
 *
 */
if( !function_exists('sq_box_shortcode') ) { 
	function sq_box_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'style'			=> 'boxinfo'
		  ), $atts ) );
		  
		  $alert_content = '';
		  $alert_content .= '<div class="' . $style . '">';
		  $alert_content .= ''. do_shortcode($content) .'</div>';
		  return $alert_content;
	}
	add_shortcode('sq_box', 'sq_box_shortcode');
}




/*
 * Lists
 * @ANT
 *
 */
if( !function_exists('sq_ul_shortcode') ) { 
	function sq_ul_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'style'			=> 'simplelist'
		  ), $atts ) );

		  return '<ul class="' . $style . '">' . do_shortcode($content) . '</ul>';	

	}
	add_shortcode('sq_ul', 'sq_ul_shortcode');
}

/*
 * Li
 * @ANT
 */
if( !function_exists('sq_li_shortcode') ) {
	function sq_li_shortcode( $atts, $content = null ) {

	return '<li>' . do_shortcode($content) . '</li>';
	}
	add_shortcode( 'sq_li', 'sq_li_shortcode' );
}





/*
 * Columns
 * @ANT
 *
 */
if( !function_exists('sq_column_shortcode') ) {
	function sq_column_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'size'		=> 'one-third',
		  ), $atts ) );
		  return '<div class="' . $size . '">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('sq_column', 'sq_column_shortcode');
}


/*
 * Special buttons
 * @ANT
 *
 */


if( !function_exists('sq_specialbtn_shortcode') ) {
	function sq_specialbtn_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'			=> 'download',
			'url'			=> 'http://foreigncodes.com',
			'button_target' => '',
			'btnrel' => '',
			'title'			=> 'Visit Site',
			'style'			=> 'rounded',
			'type'			=> '',
			'size'			=> 'Small',
			'color'			=> 'Black'
		), $atts ) );
		
		$button = NULL;
		$button .= '<a href="' . $url . '" class="simplebtn ' . $color . ' ' . $style. ' ' . $type. ' ' . $size. '" target="'. $button_target .'" rel="'. $btnrel .'">';
				    $button .= $content;		
		$button .= '</a>';
		return $button;
	}
	add_shortcode('sq_button_special', 'sq_specialbtn_shortcode');
}




/*
 * Accordion
 * @ANT
 *
 */

// Main
if( !function_exists('sq_accordion_main_shortcode') ) {
	function sq_accordion_main_shortcode( $atts, $content = null  ) {

		extract( shortcode_atts( array(
			'title'	=> 'Title',
		), $atts ) );		
		return '<div class="accordionButton">'. $title .'</div>';
	}
	add_shortcode( 'sq_accordion', 'sq_accordion_main_shortcode' );
}

// Section
if( !function_exists('sq_accordion_section_shortcode') ) {
	function sq_accordion_section_shortcode( $atts, $content = null  ) {
		  
	   return '<div class="accordionContent">' . do_shortcode($content) . '</div>';
	}
	
	add_shortcode( 'sq_accordion_section', 'sq_accordion_section_shortcode' );
}




