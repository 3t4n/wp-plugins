<?php
/*
Plugin Name:  360 Photo Spheres
Plugin URI:   http://360production.services/2018/03/15/new-360-sphere-wordpress-plugin/
Description:  Plugin created by 360Production.Services  Thank you to CssAnimation.Rocks for the sphere CSS tutorial which can be found here: https://cssanimation.rocks/spheres/
Version:      1.3
Author:       360Production.Services
Author URI:   http://360Production.Services
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/

function sphere_func( $atts ) {
    $a = shortcode_atts( array(
        'size' => '300',
        'url' => plugin_dir_url( __FILE__ ) . '360sample.jpg',
		'link' => '',
        'speed' => '30',
		'direction' => 'right',
		'hover' => 'none',
		'popup' => '',
		'title' => '',
    ), $atts );
	if($a['direction'] == 'right'){
		$b = $a['size'] * -2;
	} else {
		$b = $a['size'] * 2;
	};	
	static $i=0; $i++;
	$h = '<section class="ball' . $i . '">';
	if($a['popup'] != ''){
		add_thickbox();
		$h .= '<style>';
		$h .= '#TB_ajaxContent {margin:auto;}';
		$h .= '#TB_window {background-color: #6d6c72 !important;}';
		$h .= '#TB_closeWindowButton:hover .tb-close-icon,';
		$h .= '#TB_closeWindowButton:focus .tb-close-icon {color: #d6b804 !important;}';
		$h .= '#TB_closeWindowButton:focus .tb-close-icon {-webkit-box-shadow:none !important; box-shadow: none !important;}';
		$h .= '#TB_title {background-color: #4d4c50 !important;color: #d6b804;}';
		$h .= '@media all and (max-width: 640px){';
		$h .= '#TB_ajaxContent {padding:0px !important; max-width: 100%; max-height: 100%;}';
		$h .= '#TB_window {';
		$h .= 'top: 0 !important;';
		$h .= 'left: 0 !important;';
		$h .= 'margin-top: 0 !important;';
		$h .= 'margin-left: 0 !important;';
		$h .= 'height: 100%;';
		$h .= 'width: 100% !important;';
		$h .= '}';
		$h .= '#TB_iframeContent{';
		$h .= 'max-width:100%;';
		$h .= 'width:100%;';
		$h .= '}';
		$h .= '}';
		$h .= '</style>';
		$h .= '<div id="popup' . $i . '" style="display:none;">';
	};
	if($a['popup'] == 'vr'){
		$h .= do_shortcode( '[vr url=' . $a['link'] . ' view=360]' );
		$h .= '</div>';
		$h .= '<a href="#TB_inline?width=595&height=600&inlineId=popup' . $i . '" class="thickbox" title="' . $a['title'] . '">';
	};
	if($a['popup'] == 'iframe'){
		$h .= '<iframe src="' . $a['link'] . '" height="100%" width="100%"></iframe> ';
		$h .= '</div>';
		$h .= '<a href="#TB_inline?width=800&height=600&inlineId=popup' . $i . '" class="thickbox" title="' . $a['title'] . '">';
	};
	if($a['popup'] == 'youtube'){
		$h .= '<iframe src="' . $a['link'] . '" frameborder="0" height="75%" width="100%" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
		$h .= '</div>';
		$h .= '<a href="#TB_inline?width=800&height=600&inlineId=popup' . $i . '" class="thickbox" title="' . $a['title'] . '">';
	};	
	if($a['popup'] == 'maps'){
		$h .= '<iframe src="' . $a['link'] . '" frameborder="0" height="100%" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>';
		$h .= '</div>';
		$h .= '<a href="#TB_inline?width=800&height=600&inlineId=popup' . $i . '" class="thickbox" title="' . $a['title'] . '">';
	};	
	if($a['popup'] == 'roundme'){
		$h .= '<iframe width="100%" height="100%" src="' . $a['link'] . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		$h .= '</div>';
		$h .= '<a href="#TB_inline?width=800&height=600&inlineId=popup' . $i . '" class="thickbox" title="' . $a['title'] . '">';
	};	
	if($a['popup'] == 'veer'){
		$h .= '<iframe src="' . $a['link'] . '" frameborder="0" allowfullscreen="true" width="100%" height="100%"></iframe>';
		$h .= '</div>';
		$h .= '<a href="#TB_inline?width=800&height=600&inlineId=popup' . $i . '" class="thickbox" title="' . $a['title'] . '">';
	};	
	if($a['popup'] == 'embed'){
		$h .= $a['link'];
		$h .= '</div>';
		$h .= '<a href="#TB_inline?width=800&height=600&inlineId=popup' . $i . '" class="thickbox" title="' . $a['title'] . '">';
	};
	if($a['popup'] == '' && $a['link'] != ''){
		$h .= '<a href="' . $a['link'] . '">';
	};
	$h .= '<figure class="sphere' . $i . '"><span class="gradient' . $i . '"></span></figure>';
	if($a['link'] != ''){
		$h .= '</a>';
	}
	$h .= '</section>';
	$h .= '<style>';
	$h .= '.sphere' . $i . ' {';
	$h .= '  display: inline-block;';
	$h .= '  width: ' . $a['size'] . 'px;';
	$h .= '  height: ' . $a['size'] . 'px;';
	$h .= '  margin: 0;';
	$h .= '  border-radius: 50%;';
	$h .= '  position: relative;';
	$h .= '  -webkit-transform-style: preserve-3d;';
	$h .= '  background: url("' . $a['url'] . '") repeat-x;';
	$h .= '  background-size: auto 100%;';
	$h .= '  -webkit-animation: spin-sphere' . $i . ' ' . $a['speed'] . 's infinite linear;';
	$h .= '  -moz-animation: spin-sphere' . $i . ' ' . $a['speed'] . 's infinite linear;';
	$h .= '  -o-animation: spin-sphere' . $i . ' ' . $a['speed'] . 's infinite linear;';
	$h .= '  -ms-animation: spin-sphere' . $i . ' ' . $a['speed'] . 's infinite linear;';
	$h .= '  animation: spin-sphere' . $i . ' ' . $a['speed'] . 's infinite linear;';
	$h .= '}';
	$h .= '@-moz-keyframes spin-sphere' . $i . ' {';
	$h .= '  0% { background-position: ' . $b . 'px 0; }';
	$h .= '  100% { background-position: 0 0; } }';
	$h .= '@-webkit-keyframes spin-sphere' . $i . ' {';
	$h .= '  0% { background-position: 0 0; }';
	$h .= '  100% { background-position: ' . $b . 'px 0; } }';
	$h .= '  0% { background-position: ' . $b . 'px 0; }';
	$h .= '  100% { background-position: 0 0; } }';
	$h .= '@-ms-keyframes spin-sphere' . $i . ' {';
	$h .= '  0% { background-position: ' . $b . 'px 0; }';
	$h .= '  100% { background-position: 0 0; } }';
	$h .= '@keyframes spin-sphere' . $i . ' {';
	$h .= '  0% { background-position: ' . $b . 'px 0; }';
	$h .= '  100% { background-position: 0 0; } }';
	if($a['hover'] == 'pause'){
		$h .= '.sphere' . $i . ':hover {';
		$h .= '-webkit-animation-play-state: paused;';
		$h .= '-moz-animation-play-state: paused;';
		$h .= '-o-animation-play-state: paused;';
		$h .= 'animation-play-state: paused;';
		$h .= '}';
	};
	$h .= '</style>';
    return $h;
}
add_shortcode( 'sphere', 'sphere_func' );