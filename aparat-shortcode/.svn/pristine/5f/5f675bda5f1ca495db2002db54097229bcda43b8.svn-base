<?php
/*
Plugin Name: Aparat Video Shortcode
Plugin URI: http://wordpress.org/plugins/aparat-shortcode/
Description: Aparat video shortcode generator
Version: 0.2.4
Author: <a href="http://grodea.co/">Ali Aghdam</a>
Author URI: http://grodea.co/
*/


// Create aparat shortcode
function aparat_embed_video_player($atts, $content = '') {
	extract(shortcode_atts(array(
		"height" =>'400',
		"width" =>'600',
		"fullscreen" =>'true'
	), $atts));


    // Aparat old video url http://www.aparat.com/v/f64a4690ab2d72f3d81b0c7423cc4a38140016 -> len -> 62
    // 'http://www.aparat.com/v/'               -> len -> 24
    // 'f64a4690ab2d72f3d81b0c7423cc4a38140016' -> len -> 38

    // Aparat new video url http://www.aparat.com/v/tPp6M -> len -> 29
    // 'http://www.aparat.com/v/'               -> len -> 24
    // 'tPp6M' -> len -> 5

    if(strlen($content) == 62){
        $content = substr($content, 24,38);
    }elseif(strlen($content) == 29){
        $content = substr($content, 24,29);
    }

    $output = '<iframe src="http://www.aparat.com/video/video/embed/videohash/'. $content . '/vt/frame"
                allowFullScreen="'. $fullscreen . '"
                webkitallowfullscreen="'. $fullscreen . '"
                mozallowfullscreen="'. $fullscreen . '"
                height="'. $height .'"
                width="'. $width .'" >
                </iframe>';

    return $output;

	return $output;
}

add_shortcode("aparat", "aparat_embed_video_player");
add_shortcode("APARAT", "aparat_embed_video_player");


add_filter('mce_external_plugins', "aparatplugin_register");
add_filter('mce_buttons', 'aparatplugin_add_button', 0);

function aparatplugin_add_button($buttons)
{
    array_push($buttons, "separator", "aparatplugin");
    return $buttons;
}

function aparatplugin_register($plugin_array)
{
    $plugin_array['aparatplugin'] = WP_PLUGIN_URL . "/aparat-shortcode/tinyMCE/editor_plugin.js";
    return $plugin_array;
}

