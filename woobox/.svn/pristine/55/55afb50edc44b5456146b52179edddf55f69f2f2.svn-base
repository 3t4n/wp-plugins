<?php

/**
 * Plugin Name: Woobox
 * Plugin URI: https://woobox.com/
 * Description: Embed Woobox promotions using a shortcode. Usage: [woobox offer='abcdef']
 * Version: 1.6
 * Author: Woobox
 * Author URI: http://woobox.com
 * License: GPL
 */

function createWooboxEmbed($atts, $content = null) {
	
	$args = shortcode_atts(array(
		'offer' => '',
		'params' => '',
		'style' => '',
		'trigger' => '',
		'expire' => 0
	), $atts);
	
	if (!empty($args['offer'])) {
		wp_enqueue_script('woobox-sdk',plugins_url('/woobox_requiresdk.js', __FILE__), array('jquery'), false, false);
		$data_str = array();
		foreach($args as $k=>$v) {
			if($v!=='' && $v!=='embed' && $v!==0) {
				if($k === 'params') {
					$v = str_replace("'", '"', $v);
				}
				$data_attrs[] = "data-".$k."='".$v."'";
			}
		} $embed_code = "<div class='woobox-offer' ".implode(" ", $data_attrs)."></div>";
	} else {
		$embed_code = "<div><b>Woobox Plugin Error:</b> You did not specify a campaign.</div>";
	}
	
	return $embed_code;
	
} add_shortcode('woobox', 'createWooboxEmbed');
