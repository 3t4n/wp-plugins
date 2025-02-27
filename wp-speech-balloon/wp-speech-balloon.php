<?php
/**
* @package WP-Speech-Balloon
* @version 2.4
*/
/*
Plugin Name: WP-Speech-Balloon
Plugin URI: https://tips4life.me/wp-speech-balloon_2_4
Description: Wordpressで簡単に吹き出し会話を使えるプラグインです。
Version: 2.4
Author: RA’s
Author URI: https://tips4life.me/profile
License: GPLv2
*/
wp_enqueue_style('wsb', plugins_url('css/style.css', __FILE__));

//AMP
function is_wsb_amp(){
	$is_wsb_amp = false;
	if ( empty($_GET['amp']) ) {
		return false;
	}
	if($_GET['amp'] === '1') {
		$is_wsb_amp = true;
	}
	return $is_wsb_amp;
}

function wsb_callBack($wsb_buffer) {
	if(is_wsb_amp() && strpos($wsb_buffer, '<div class="wsb"') !== false){
		$wsb_css = file_get_contents(plugin_dir_url( __FILE__ ).'css/style.php');
		$aryPtrns = array('wsb-l ', 'wsb-l1 ', 'wsb-l2 ', 'wsb-l3 ', 'wsb-l4 ', 'wsb-l5 ', 'wsb-r ', 'wsb-r1 ', 'wsb-r2 ', 'wsb-r3 ', 'wsb-r4 ', 'wsb-r5 ',
						'wsb-l1-gray ', 'wsb-l2-gray ', 'wsb-l3-gray ', 'wsb-r1-gray ', 'wsb-r2-gray ', 'wsb-r3-gray ');
		foreach ($aryPtrns as $aryPtrn) {
			if(strpos($wsb_buffer, $aryPtrn) === false){
				$wsb_css = preg_replace('/\.'.preg_quote($aryPtrn, '/').'.*?\}/i', "", $wsb_css);
			}
		}
		$wsb_buffer = str_replace('<style amp-custom>', '<style amp-custom>'.$wsb_css, $wsb_buffer);
	}
	return $wsb_buffer;
}
function wsb_bufStart() { ob_start("wsb_callBack"); }
function wsb_bufEnd() { ob_end_flush(); }
add_action('after_setup_theme', 'wsb_bufStart');
add_action('shutdown', 'wsb_bufEnd');

//L1_wsbStart - default -
function sc_L1_wsbStart(){ return '<div class="wsb"><div class="wsb-l wsb-l1 ">';}
add_shortcode('L1_wsbStart','sc_L1_wsbStart');

//L1_gray_wsbStart - default gray -
function sc_L1_gray_wsbStart(){ return '<div class="wsb"><div class="wsb-l wsb-l1-gray ">';}
add_shortcode('L1_gray_wsbStart','sc_L1_gray_wsbStart');

//L2_wsbStart - thinking -
function sc_L2_wsbStart(){ return '<div class="wsb"><div class="wsb-l wsb-l2 ">';}
add_shortcode('L2_wsbStart','sc_L2_wsbStart');

//L2_gray_wsbStart - thinking gray -
function sc_L2_gray_wsbStart(){ return '<div class="wsb"><div class="wsb-l wsb-l2-gray ">';}
add_shortcode('L2_gray_wsbStart','sc_L2_gray_wsbStart');

//L3_wsbStart - pastel -
function sc_L3_wsbStart(){ return '<div class="wsb"><div class="wsb-l wsb-l3 ">';}
add_shortcode('L3_wsbStart','sc_L3_wsbStart');

//L3_gray_wsbStart - pastel gray -
function sc_L3_gray_wsbStart(){ return '<div class="wsb"><div class="wsb-l wsb-l3-gray ">';}
add_shortcode('L3_gray_wsbStart','sc_L3_gray_wsbStart');

//L4_wsbStart - lineStyle -
function sc_L4_wsbStart(){ return '<div class="wsb"><div class="wsb-l wsb-l4 ">';}
add_shortcode('L4_wsbStart','sc_L4_wsbStart');

//L5_wsbStart - twStyle -
function sc_L5_wsbStart(){ return '<div class="wsb"><div class="wsb-l wsb-l5 ">';}
add_shortcode('L5_wsbStart','sc_L5_wsbStart');

//L_wsbAvatar
function sc_L_wsbAvatar(){ return '<div class="avaArea"><p class="avaImg"><img src="';}
add_shortcode('L_wsbAvatar','sc_L_wsbAvatar');

//L_wsbName
function sc_L_wsbName(){ return '" width="70" height="70" alt="avatar"></p><p class="avaName">';}
add_shortcode('L_wsbName','sc_L_wsbName');

//L_wsbText
function sc_L_wsbText(){ return '</p></div><div class="txtArea"><p class="wsbTxt">';}
add_shortcode('L_wsbText','sc_L_wsbText');

//L_wsbEnd
function sc_L_wsbEnd(){ return '</p></div></div></div>';}
add_shortcode('L_wsbEnd','sc_L_wsbEnd');

//R1_wsbStart - default -
function sc_R1_wsbStart(){ return '<div class="wsb"><div class="wsb-r wsb-r1 ">';}
add_shortcode('R1_wsbStart','sc_R1_wsbStart');

//R1_gray_wsbStart - default gray -
function sc_R1_gray_wsbStart(){ return '<div class="wsb"><div class="wsb-r wsb-r1-gray ">';}
add_shortcode('R1_gray_wsbStart','sc_R1_gray_wsbStart');

//R2_wsbStart - powapowa -
function sc_R2_wsbStart(){ return '<div class="wsb"><div class="wsb-r wsb-r2 ">';}
add_shortcode('R2_wsbStart','sc_R2_wsbStart');

//R2_gray_wsbStart - powapowa gray -
function sc_R2_gray_wsbStart(){ return '<div class="wsb"><div class="wsb-r wsb-r2-gray ">';}
add_shortcode('R2_gray_wsbStart','sc_R2_gray_wsbStart');

//R3_wsbStart - pastel -
function sc_R3_wsbStart(){ return '<div class="wsb"><div class="wsb-r wsb-r3 ">';}
add_shortcode('R3_wsbStart','sc_R3_wsbStart');

//R3_gray_wsbStart - pastel gray -
function sc_R3_gray_wsbStart(){ return '<div class="wsb"><div class="wsb-r wsb-r3-gray ">';}
add_shortcode('R3_gray_wsbStart','sc_R3_gray_wsbStart');

//R4_wsbStart - lineStyle -
function sc_R4_wsbStart(){ return '<div class="wsb"><div class="wsb-r wsb-r4 ">';}
add_shortcode('R4_wsbStart','sc_R4_wsbStart');

//R5_wsbStart - twStyle -
function sc_R5_wsbStart(){ return '<div class="wsb"><div class="wsb-r wsb-r5 ">';}
add_shortcode('R5_wsbStart','sc_R5_wsbStart');

//R_wsbText
function sc_R_wsbText(){ return '<div class="txtArea"><p class="wsbTxt">';}
add_shortcode('R_wsbText','sc_R_wsbText');

//R_wsbAvatar
function sc_R_wsbAvatar(){ return '</p></div><div class="avaArea"><p class="avaImg"><img src="';}
add_shortcode('R_wsbAvatar','sc_R_wsbAvatar');

//R_wsbName
function sc_R_wsbName(){ return '" width="70" height="70" alt="avatar"></p><p class="avaName">';}
add_shortcode('R_wsbName','sc_R_wsbName');

//R_wsbEnd
function sc_R_wsbEnd(){ return '</p></div></div></div>';}
add_shortcode('R_wsbEnd','sc_R_wsbEnd');

//wsb_auto_formatting_fix
function wsb_auto_formatting_fix($content) {
	$array = array (
		'<p>[L1_wsbStart]' => '[L1_wsbStart]',
		'<p>[L2_wsbStart]' => '[L2_wsbStart]',
		'<p>[L3_wsbStart]' => '[L3_wsbStart]',
		'<p>[L4_wsbStart]' => '[L4_wsbStart]',
		'<p>[L5_wsbStart]' => '[L5_wsbStart]',
		'<p>[R1_wsbStart]' => '[R1_wsbStart]',
		'<p>[R2_wsbStart]' => '[R2_wsbStart]',
		'<p>[R3_wsbStart]' => '[R3_wsbStart]',
		'<p>[R4_wsbStart]' => '[R4_wsbStart]',
		'<p>[R5_wsbStart]' => '[R5_wsbStart]',
		'[L_wsbText]</p>'."\n".'<p>' => '[L_wsbText]',
		'[R_wsbText]</p>'."\n".'<p>' => '[R_wsbText]',
		'[L_wsbEnd]</p>'   => '[L_wsbEnd]',
		'[R_wsbEnd]</p>'   => '[L_wsbEnd]',
		'[L_wsbEnd]<br />' => '[L_wsbEnd]',
		'[R_wsbEnd]<br />' => '[L_wsbEnd]'
	);
	$content = strtr($content, $array);
	return $content;
}
add_filter('the_content', 'wsb_auto_formatting_fix');
