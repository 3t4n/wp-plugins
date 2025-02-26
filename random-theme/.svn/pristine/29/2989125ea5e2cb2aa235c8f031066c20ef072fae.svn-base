<?php
/*
Plugin Name: Random Theme
Plugin URI: http://wpamanuke.com/random-theme-wordpress-plugin
Description: Auto Random WordPress Theme located in wp-content/themes . This random theme plugin will load different theme every time your visitor come to your website / refresh your website. Just make sure , you have installed some perfect themes.
Version: 1.0.2
Author: WPAmanuke
Author URI: http://wpamanuke.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

$rwtp_random_preview_theme = rwtp_get_theme();

function rwtp_get_theme() {
	$random_theme = '';
	$themes = wp_get_themes();
	if ( 1 < count($themes) ) {
		$theme_names = array_keys($themes);
		natcasesort($theme_names);
		$length = count($theme_names);
		$selected = rand(0,$length-1);
		$random_theme = $theme_names[$selected];
	}
	return $random_theme;
}

function rwtp_theme_template($template) {
    global $rwtp_random_preview_theme;

   	$theme = $rwtp_random_preview_theme;
		
    if (empty($theme)) {
        return $template;
    }

    $theme = wp_get_theme($theme);

    if (empty($theme)) {
		
        return $template;
    }
	
    return $theme['Template'];
}

function rwtp_theme_stylesheet($stylesheet) {
    global $rwtp_random_preview_theme;

	$theme = $rwtp_random_preview_theme;

    if (empty($theme)) {
        return $stylesheet;
    }

    $theme = wp_get_theme($theme);

    if (empty($theme)) {
        return $stylesheet;
    }

    return $theme['Stylesheet'];
}

if ( !is_admin() ) {
	add_filter('stylesheet', 'rwtp_theme_stylesheet');
	add_filter('template', 'rwtp_theme_template');
}

?>