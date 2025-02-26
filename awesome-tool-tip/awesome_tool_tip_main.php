<?php
/*
Plugin Name: Awesome Tool Tip
Plugin URI: http://webeeoo.com/wp_plugin/tool-tip/
Description: This is an awesome free Tool Tip Wordpress Plugin.
Author: Md. Shiddikur Rahman
Author URI: http://phpdev.us/siddik
Version: 1.0
*/
/* Adding Latest jQuery from Wordpress */

/*Some Set-up*/
define('AWESOME_TOOL_TIP', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );



/* Including all files */
function awesome_tool_tip_file() {		

wp_enqueue_style('awesome-tool-tip-css', AWESOME_TOOL_TIP.'css/tooltip-sharp.css');	

}
add_action( 'wp_enqueue_scripts', 'awesome_tool_tip_file' );





function awesome_tool_tip_shortocdoe($atts){
	extract( shortcode_atts( array(
		'tooltip_style' => '',
		'link_text' => '',
		'tooltip_content' => 'turnleft',
	), $atts, 'tool_tip' ) );
	
  return '<span class="tool_tip tooltip-'.$tooltip_style.'"><span class="tooltip-item">'.$link_text.'</span><span class="tooltip-content"><strong></strong>'.$tooltip_content.'</span></span>
  
';
}
add_shortcode('tool_tip', 'awesome_tool_tip_shortocdoe');







?>