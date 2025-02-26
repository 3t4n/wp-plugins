<?php
/*
Plugin Name: 3D Effect Text
Plugin URI: http://www.crawlermotori.com/3d-effect-text-content/
Description: Shortcode to make 3D effect on text on content; just add [3Dshcdtx color="#000000"]Some Text[/3Dshcdtx].
Author: Danilo Franceschini      
Version: 1.1
Author URI: http://www.crawlermotori.com/
*/

add_shortcode('3Dshcdtx', 'the_3D_shcd_effect_text');
add_action('wp_head', 'css_the_3D_shcd_effect_text');

function css_the_3D_shcd_effect_text(){
	$pluginurl = plugin_dir_url(__FILE__);
	$CSS = $pluginurl."style.css";
	echo '<link rel="stylesheet" href="'.$CSS.'">';
}

function the_3D_shcd_effect_text($atts, $content = null) { 
   extract(shortcode_atts(array(
      "color" => "#ccc"
   ), $atts)); 
   ?>
   <style>
   #shcd_3dtext h2 {
     color: <?php echo $color; ?>;
    }
   </style> <?php
    $testo = '<div id="shcd_3dtext_cont">
  			  	<div id="shcd_3dtext">
  					<h2>';
    $testo .= $content;
    $testo .= '		</h2>
    			</div>
    		  </div>';
    return $testo;
}
