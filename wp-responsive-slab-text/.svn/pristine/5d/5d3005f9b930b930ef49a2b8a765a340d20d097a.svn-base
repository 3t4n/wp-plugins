<?php
/*
Plugin Name: WP Responsive Auto Fit Text
Plugin URI: http://www.vibesdesign.com.au/wp-responsive-auto-fit-text-wordpress-plugin/
Description: WP Responsive Fit Text allows you to create great, big, bold & responsive headlines that resize to the viewport width, using a simple shortcode.
Version: 0.3
Author: Gal Opatovsky
Author URI: http://www.vibesdesign.com.au
License: GPLv2 or later
*/

// Main shortcode for slabtext
function slabtext_shortcode( $atts, $content = null ) {

	wp_enqueue_script('jquery-slabtext', plugins_url( '/js/jquery.slabtext.min.js' , __FILE__ ), array('jquery'));	
	wp_register_style( 'jquery-slabtext-css', plugins_url('/css/wp-responsive-auto-fit-text.css', __FILE__) );
	wp_enqueue_style( 'jquery-slabtext-css');
	
	$rand_id = rand(1000,2000000);
	
	// Make sure previous script data is reset
	$GLOBALS["SLAB_TEXT_LINE"] = "";
	
	// Process inner shortcodes
	$content = do_shortcode($content);
	
	$GLOBALS["SC_SCRIPTS"] .= 'var stS = "<span class=\'slabtext\'>",';
	$GLOBALS["SC_SCRIPTS"] .= 'stE = "</span>",';
	$GLOBALS["SC_SCRIPTS"] .= 'txt = [';
	if (strlen($GLOBALS["SLAB_TEXT_LINE"]) > 1) {
		$GLOBALS["SC_SCRIPTS"] .= substr($GLOBALS["SLAB_TEXT_LINE"], 0, (strlen($GLOBALS["SLAB_TEXT_LINE"]) - 1));
	}
	$GLOBALS["SC_SCRIPTS"] .= '];';
	$GLOBALS["SC_SCRIPTS"] .= 'jQuery("#slabText'.$rand_id.'").html(stS + txt.join(stE + stS) + stE).slabText( {"viewportBreakpoint":290} );';
	
	// Clear the global variable for safety
	$GLOBALS["SLAB_TEXT_LINE"] = ""; 

    return '<div id="slabText'.$rand_id.'" class="slabtext-wrapper"></div>';
}
add_shortcode( 'slabtext', 'slabtext_shortcode' );

// Inner shortcode for slab lines
function slabtextline_shortcode( $atts, $content = null ) {

	// Sanitize and escape attributes
	$array = shortcode_atts( array (
		'font' => '',
		'transform' => '',
		'color' => ''
	), $atts );

	$color = esc_attr($array['color']);
	$transform = esc_attr($array['transform']);
	$font = esc_attr($array['font']);

	// Allow safe HTML inside the shortcode
	$content = wp_kses_post($content);

	// Store formatted content in the global variable
	$GLOBALS["SLAB_TEXT_LINE"] .= '"<span style=\'color:' . $color . '; text-transform:' . $transform . '; font-family:' . $font . ';\'>'
									. $content . '</span>",';

	return ''; // No direct output, since it's used in the parent shortcode
}
add_shortcode( 'slab', 'slabtextline_shortcode' );

// Secure JavaScript execution
add_action('wp_footer', function() {
    if (!empty($GLOBALS["SC_SCRIPTS"])) {
        echo '<script type="text/javascript">';
        echo 'let slabTextData = ' . wp_json_encode($GLOBALS["SC_SCRIPTS"]) . ';';
        echo 'if (slabTextData) { try { (new Function(slabTextData))(); } catch (e) { console.error("Error executing slabTextData:", e); } }';
        echo '</script>';
    }
}, 100);

?>