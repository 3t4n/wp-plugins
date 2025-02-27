<?php  
/* 
Plugin Name: SlideOnline for WordPress 
Plugin URI: http://slideonline.com/
Description: Easily embed your presentations in a WordPress blog. SlideOnline.com is a free service to share PowerPoint presentations online. 
Version: 1.2.1
Author: Julian Magnone 
Author URI: http://magn.com

This plugin allows WordPress users to embed SlideOnline presentations into the blog posts. The code below is organized in the following way:
First section contains procedures to embed the presentations using the shortcode [slideonline id=""]
The second section contains directives to configure the oEmbed functionality into the WordPress by using a hook. This will allow to add
SlideOnline as an oEmbed provider and then be able to use it by pasting the links. 
*/  

/* Section #2: Configure Embed options by using IFRAME and defaults */

$slideonline_options = array(
		//'id' => '', // ID for the presentation
		'footer_copyright' => '&copy; ' . date('Y') . get_bloginfo('name'),
		'intro_text' => '',
		'author_credits' => true,
		'class' => '',
		'player' => '',
		'default_width' => '580',
		'default_height' => '400',
	);

$slideonline_shortcode_parameters = array(
	'id' => '',
	'width' => '',
	'w' => '',
	'height' => '',
	'h' => '',
);

add_shortcode( 'slideonline', 'slideonline_shortcode' );
function slideonline_shortcode( $atts, $content = null ) {
	global $slideonline_options, $slideonline_shortcode_parameters;
	
	$html = "";
	$options = get_option('slideonline_options', $slideonline_options);
	extract( shortcode_atts( $slideonline_shortcode_parameters, $atts ) );

	// use alias for w and h
	if (!empty($w)) $width = $w;
	if (!empty($h)) $height = $h;
	
	// if empty, then fill with default values
	if (empty($width)) $width = $options['default_width'];
	if (empty($height)) $height = $options['default_height'];
	
	if (!empty($id))
	{
		$src = "http://slideonline.com/embed/".$id."/";
		$html .= "<iframe src=\"{$src}\" width=\"{$width}\" class=\"{$class}\" height=\"{$height}\" scrolling=\"no\" border=\"0\" style=\"border:0px;\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";
		
		if ($author_credits) {
			$html .= '<span>See more presentations on <a href="http://slideonline.com">SlideOnline.com</a></span>';
		}
		
	} else {
		$html = 'Publish your presentation on <a href="http://slideonline.com">SlideOnline.com</a>';
	}
	
	// 	<iframe style="width: 554px; height: 328px;" src="http://slideonline.com/embed/913/" height="328" width="512" scrolling="no"></iframe>
	
	
	return $html;
}

add_action('admin_init', 'slideonline_init' );
function slideonline_init(){
	register_setting( 'slideonline_options', 'slideonline_options' );
	//register_setting( 'slideonline-settings-group', 'default_height' );
	
	require_once(dirname(__FILE__) . '/slideonline-ui.php');
}


add_action('admin_menu', 'slideonline_admin_menu');
function slideonline_admin_menu() {
    $page_title = 'SlideOnline for WordPress';
    $menu_title = 'SlideOnline';
    $capability = 'manage_options';
    $menu_slug = 'slideonline-settings';
    $function = 'slideonline_settings';
    add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
}

function slideonline_settings() {
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    // Here is where you could start displaying the HTML needed for the settings
    // page, or you could include a file that handles the HTML output for you.
	slideonline_ui_settings_page();	
}

/* Section #2: Configure oEmbed functionality */

function add_oembed_slideonline(){
	//wp_oembed_add_provider( 'http://slideonline.com/presentation/*', 'http://slideonline.com/oembed');
	wp_oembed_add_provider("#http://(.+)?slideonline\.com/presentation/.*#i", "http://slideonline.com/oembed", true);
}
add_action('init','add_oembed_slideonline');

function slideonline_oembed_html($html, $url, $args) {
	global $content_width;

	preg_match('/width="([0-9]*)"/', $html, $matches);
	if (!empty($matches) AND !empty($matches[1]))
	{	
		$width = (int)$matches[1];
	}

    // Set the width of the video
    $width_pattern = "/width=\"[0-9]*\"/";
    //$html = preg_replace($width_pattern, "width='340'", $html);
	if (!empty($content_width))
	{
		$html = preg_replace($width_pattern, "width=\"{$content_width}\"", $html);
		$new_width = $content_width;
	}

	preg_match('/height="([0-9]*)"/', $html, $matches);
	if (!empty($matches) AND !empty($matches[1]))
	{
			$height = (int)$matches[1];
			if (!empty($new_width)) $new_height = $new_width * $height / $width;  
			// Set the height of the video
			$height_pattern = "/height=\"[0-9]*\"/";
			$html = preg_replace($height_pattern, "height='{$new_height}'", $html);
	}
    return $html; // return updated content
} // end slideonline_oembed_html
add_filter('embed_oembed_html', 'slideonline_oembed_html', 10, 3);

//Custom oEmbed Size
function slideonline_oembed_defaults($embed_size) {
	if(is_front_page()) {
		$embed_size['width'] = 640;
		$embed_size['height'] = 480;
	}
	else {
		$embed_size['width'] = 640;
		$embed_size['height'] = 480;
	}
    return $embed_size;
}
add_filter('embed_defaults', 'slideonline_oembed_defaults');





