<?php
/*
Plugin Name: QuickStyle Background 
Plugin URI: http://www.zouak.com/?p=1360
Description: Shortcode which allows the content author to specify a background style for an existing or new element (i.e.a post) or page.  This will override the theme setting. ex 1) Set the page background [quickstyle_background style='#f00'] ex 2) Find an existing block element with ID "content"  [quickstyle_background div='content' style='url("..\bk3.png") #ff0'] ex 3) Create a new block element with id "myId" [quickstyle_background id='myId' style='url("..\bk3.png") #ff0'] Some content here [/quickstyle_background] 
Author: Jennifer Zouak, Zouak Consulting
Version: 1.0.2
 */

/**
 *	Usage 
 *	[quickstyle_background 
 *		div='content' 				// optional (case 2) -- div of which to change background. If omitted, then the page background is changed.
 *		id='myId'					// optional (case 3) -- id for this element. Use together with content instead of the 'div' option.
 *		style='url("..\bk3.png")'		// required -- new background style
 *	] content [/quickstyle_background]		// optional (case 3) -- if content is included, then it is given the background style. Use this instead of 'div' option, but not both.
 *	
 */ 

function quickstyle_backgroundShortcode( $atts, $content=null) {	
	// extract attributes into local variables with default values, add prefix qs_
	extract( 
		shortcode_atts ( array(
			'id' => null, 		// attribute id, default is null
			'div' => null, 		// attribute div, default is null
			'style' => ''		// attribute style, default is empty
		), $atts ) ,
		EXTR_PREFIX_ALL, 'qs'
	);

	if ( empty($qs_style) ) {	    
		// check for empty attribute, if so do nothing
		return '';
	}

	global $qs_counter;
	$qs_counter = $qs_counter +1;

	// change quotes to single
	$qs_style = str_replace("\"", "'", $qs_style);



	if ( !empty($content)) { 
		if (!empty($qs_id)) {
			return '<div id="'.$qs_id.'" class="quickstyle-background quickstyle-background-'.$qs_counter.'" style="background: '.$qs_style.'">'.$content.'</div>';
		}
		else {
			return '<div class="quickstyle-background quickstyle-background-'.$qs_counter.'" style="background: '.$qs_style.'">'.$content.'</div>';
		}
	}
	if ( !empty($qs_div)) { 
		return '<script type="text/javascript">var theDiv = document.getElementById("'.$qs_div.'"); if (theDiv != null) { theDiv.style.background ="'.$qs_style.'"; } </script>';
	} 
	return '<script type="text/javascript">document.body.style.background="'.$qs_style.'"</script>';
}

add_shortcode('quickstyle_background', 'quickstyle_backgroundShortcode');
