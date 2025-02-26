<?php
/*
Plugin Name: 5280 Go Fund Me Widget
Plugin URI: https://github.com/5280studios/5280-go-fund-me-widget
Description: Easily add a GO FUND ME donate button to your website using short-code.
Version: 1.0
Author: 5280Studios
Author URI: http://5280studios.com
License: GPL3 or later
License URI: https://www.gnu.org/licenses/gpl.html
*/

defined( 'ABSPATH' ) or die( 'Sorry. No unauthorized access!' );


if (!class_exists('GoFundMeWidget_Wp')) {	

// main class

	class GoFundMeWidget_Wp {


		function __construct() {

			add_shortcode( 'gfm-widget', array($this, 'fundme_func' ));

		}

// add shortcode

function fundme_func( $atts ) {
	$atts = shortcode_atts(
		array(
			'width' => '100%',
			'height' => '100%',
			'id' => 'placeholder',
			'image' => 'true',
			'info' => 'true'
		), $atts, 'gfm-widget' );

$gfm_width = sanitize_text_field($atts['width']);
$gfm_height = sanitize_text_field($atts['height']);
$gfm_campaign = sanitize_text_field($atts['id']);
$gfm_image = sanitize_text_field($atts['image']);
$gfm_coinfo = sanitize_text_field($atts['info']);

if ($gfm_image == "true") {
	$gfm_image = 1; }
else {$gfm_image = 0;}

if ($gfm_coinfo == "true") {
	$gfm_coinfo = 1; }
else {$gfm_coinfo = 0;}


if ($gfm_campaign == "placeholder") {return '<div>Error. You must add a valid campaign ID to the Go Fund Me Widget.</div>';}

else {

   return '<iframe class="gfm-media-widget" image="' . $gfm_image . '" coinfo="' . $gfm_coinfo . '" width="' . $gfm_width . '" height="' . $gfm_height . '" frameborder="0" id="' . $gfm_campaign . '"></iframe><script src="//funds.gofundme.com/js/5.0/media-widget.js"></script>';

}

}

// end class
}

new GoFundMeWidget_Wp();

// end if
}