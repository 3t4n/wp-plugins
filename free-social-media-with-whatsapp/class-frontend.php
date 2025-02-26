<?php

function dh_free_whatsapp_share_button_style() {
	$plugins_url = plugins_url();
	$options = get_option('dh_free_whatsapp_share_button');
	if (!isset($options['style'])) {$options['style'] = "style3";}
	
	wp_enqueue_style( 'Free-WhatsApp-Share-Button', plugins_url('/style/'.$options['style'].'.css', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'dh_free_whatsapp_share_button_style' );



function dh_free_whatsapp_share_button_font_cdn_style() {
	$plugins_url = plugins_url();
	
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
}

add_action( 'wp_enqueue_scripts', 'dh_free_whatsapp_share_button_font_cdn_style' );

//AUTO BUTTON INSERTION
function dh_free_whatsapp_share_button($content) {
	$options = get_option('dh_free_whatsapp_share_button');
	if (!isset($options['top'])) {$options['top'] = "off";}
	if (!isset($options['btm'])) {$options['btm'] = "off";}
	if (!isset($options['posts'])) {$options['posts'] = "off";}
	if (!isset($options['pages'])) {$options['pages'] = "off";}
	if (!isset($options['homepage'])) {$options['homepage'] = "off";}
	if (!isset($options['tracking'])) {$tracking = "";} else {$tracking='?utm_source=WhatsApp%26utm_medium=IM%26amp;utm_campaign=share%20button';}
	$btn='';
	if (
	   (is_single() && $options['posts'] == 'on') ||
       (is_page() && $options['pages'] == 'on') ||
       ((is_home() || is_front_page()) && $options['homepage'] == 'on')) {
		$btn = '<!-- Free WhatsApp Share Button for WordPress: http://dhirajsharma.com/wp/plugins/whatsapp-share-button -->
		
		<div class="dh_free_whatsapp_share_button_container">
	<ul>
<li><a target="_blank" href="whatsapp://send?text='.get_the_title().' - '.get_permalink().$tracking.'" class="fwabtn"><i class="fa fa-whatsapp fa-2x"></i></a></li>
<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().$tracking.'"><i class="fa fa-facebook  fa-2x"></i></a></li>
<li><a target="_blank" href="https://twitter.com/intent/tweet?text='.get_the_title().'&url='.get_permalink().$tracking.'"><i class="fa fa-twitter fa-2x"></i></a></li>
<li><a target="_blank" href="https://plus.google.com/share?url='.get_permalink().$tracking.'"><i class="fa fa-google-plus fa-2x google"></i></a></li>
</ul>
		
		</div>';
      	if ($options['top'] == 'on' && $options['btm'] == 'on') {$output = $btn.$content.$btn;}
      	elseif ($options['top'] == 'on' && $options['btm'] != 'on') {$btn .= $content; $output = $btn;}
      	elseif ($options['top'] != 'on' && $options['btm'] == 'on') {$output = $content.$btn;}
      	else {$output = $content;}
	} else {$output = $content;}
	return $output;
}
add_filter ('the_content', 'dh_free_whatsapp_share_button', 100);


function dh_free_whatsapp_share_button_shortcode($waatts) {
    extract(shortcode_atts(array(
    	"waatts" => get_option('dh_free_whatsapp_share_button'),
		"title" => get_the_title(),
		"url" => get_permalink(),
    ), $waatts));
    if (!empty($waatts)) {
        foreach ($waatts as $key => $option)
            $waatts[$key] = $option;
	}
	if (!isset($waatts['tracking'])) {$tracking = "";} else {$tracking='?utm_source=WhatsApp%26utm_medium=IM%26amp;utm_campaign=share%20button';}
	$btn = '<!-- Free WhatsApp Share Button for WordPress: http://dhirajsharma.com/wp/plugins/whatsapp-share-button --><div class="wabtn_container"><a href="whatsapp://send?text='.$title.' - '.$url.$tracking.'" class="wabtn">Share this on WhatsApp</a></div>';
	return $btn;
}
add_filter('widget_text', 'do_shortcode');
add_shortcode('whatsapp', 'dh_free_whatsapp_share_button_shortcode');


?>