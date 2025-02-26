<?php 
/**
 * In Class Shortcodes
 * Taken From http://codex.wordpress.org/Function_Reference/add_shortcode
	class Graph_Shortcodes {
	     function graph( $atts, $content="" ) {
	            return "content = $content";
	     }
	}
	add_shortcode( 'baztag', array( 'Graph_Shortcodes', 'graph' ) );
 */

// Block direct requests
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function addFrame($params, $content = "") 
{
	global $wpdb;
	
	wp_register_style( 'mobileframe', plugins_url( 'assets/css/mobileframe.css', MOBILEFRAME_PLUGIN_FILE ), false, '1.0.0', 'all' );
	wp_enqueue_style( 'mobileframe');
	
	if(!isset($params['type'])){
		echo "ERROR: Please Choose Type";
	}else{
		switch ($params['type'])
		{
			case 'iphone': 	$deviceClass = 'iphoneFrame'; break;
			case 'iphone6': $deviceClass = 'iphoneFrame'; break;
			case 'iphone7': $deviceClass = 'iphoneFrame'; break;
			case 'ipad': 	$deviceClass = 'ipadFrame'; break;
				
			default:
// 				echo "ERROR: Type {$params['type']} not Supported"; 
				$deviceClass = 'iphoneFrame';
		}
	}
	
	
	$params = print_r($params, true);
	
	
	return <<<HTML
	 <!-- Parameters : {$params} -->
	 <div class="{$deviceClass}">
		<div class="screen">
	 		{$content}
 		</div>
	</div>
HTML;
 		
}
add_shortcode('mobileframe', 'addFrame');


?>