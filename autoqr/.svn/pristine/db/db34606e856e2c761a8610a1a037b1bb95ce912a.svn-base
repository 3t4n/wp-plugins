<?php
/*
Plugin Name: autoQR
Version:     1.0.3
Plugin URI:  http://www.baezone.com/computer/276.html
Description: Automatically add QR Code.
Author:      xiaomingtt
Author URI:  http://www.baezone.com
*/

//wp_enqueue_style('autoQR', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/autoQR.css');
// for add to content ...
function autoQR($outer){
	if(!is_singular()){ return $outer; }

	global $post;
	$share = array();
	$pName = single_post_title("", FALSE);
	$pHref = rawurlencode(get_permalink($post->ID));

    

	$outer .= "\n<!-- Begin autoQR -->\n";
	$outer .= '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/autoQR.css?v=5">';
	$outer .= '<table id="autoQR"><tr><td id="AS-TXT"><b>移动设备快速阅读本文：</b></td><td id="AS-IMG" rowspan="2">';
	$outer .= '<a href = "http://www.baezone.com" target="_balnk"><img src="http://chart.apis.google.com/chart?cht=qr&chld=|0&choe=UTF-8&chs=100x100&chl='.$pHref.'" alt="'.$pName.'" title="'.$pName.'"></a>';
	$outer .= '</td></tr><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请扫描二维码&nbsp;&nbsp;--></td></tr></table>';
	$outer .= "\n<!-- autoQR Endof -->\n";
	return $outer;
}

add_filter('the_content', 'autoQR');

?>