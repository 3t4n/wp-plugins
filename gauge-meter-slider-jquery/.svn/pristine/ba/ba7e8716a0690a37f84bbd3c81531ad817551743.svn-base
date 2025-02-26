<?php
/**
 * Plugin Name: Gauge Meter Slider
 * Plugin URI: http://wpsoft.com.br
 * Description: Gauge Meter Slider
 * Version: 1.0
 * Author: diegpl, pkelbert
 * Author URI: http://wpsoft.com.br
 * License: GPL2
 */
 
//[gaugemeter] shortcode
function gaugeMeterShortcode( $atts ){
	return "<div class='demo-gauge' style='position: relative; height: 380px;'>
        <div id='gauge' style='position: absolute; top: 0px; left: 0px;'>
        </div>
        <div id='slider' style='position: absolute; top: 250px; left: 93px'>
        </div>
    </div>";
}

add_shortcode( 'gaugemeter', 'gaugeMeterShortcode' );

function gaugeMeter() {
	echo "<link rel='stylesheet' id='style-css'  href='".plugins_url( 'style.css' , __FILE__ )."' type='text/css' media='all' />";
	echo "<link rel='stylesheet' id='style-css'  href='".plugins_url( 'jqwidgets/styles/jqx.base.css' , __FILE__ )."' type='text/css' media='all' />";
	//echo "<script type='text/javascript' src='".plugins_url( 'scripts/jquery-1.10.2.min.js' , __FILE__ )."'></script>";
	echo "<script type='text/javascript' src='".plugins_url( 'gauge-meter-slider.js' , __FILE__ )."'></script>";
}

add_action('wp_footer', 'gaugeMeter');

?>