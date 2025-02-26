<?php

/*
Plugin Name: GroupDocs Comparison
Plugin URI: http://www.groupdocs.com/
Description: Whether you need to compare two word documents, excel spreadsheets or PDF files – GroupDocs Comparison is here to help you. Use it to compare documents online, from within your web browser.
Author: GroupDocs Team <support@groupdocs.com>
Author URI: http://www.groupdocs.com/
Version: 1.0.5
License: GPLv2
*/

include_once('grpdocs-functions.php');

function grpdocs_comparison_getdocument($atts) {

	extract(shortcode_atts(array(
		'guid_embed' => '',
		'guid_redline' => '',
		'width' => '',
		'height' => '',
	), $atts));

    $guid_embed = htmlspecialchars(trim($guid_embed));
    $guid_redline = htmlspecialchars(trim($guid_redline));
    $width = (int) $width;
    $height = (int) $height;

	$if_no_iframe = 'If you can see this text, your browser does not support iframes. Please enable iframe support in your browser or use the latest version of any popular web browsers such as Mozilla Firefox or Google Chrome.<br />Check out how to easily <a href="http://groupdocs.com/apps/comparison">compare Word documents</a> with GroupDocs!';	
	$code = '<iframe src="http://apps.groupdocs.com/document-comparison2/embed/' . $guid_embed . '/' . $guid_redline . '?referer=wordpress-comparison/1.0.5" frameborder="0" width="'. $width .'" height="'. $height .'">' . $if_no_iframe . '</iframe>';

	return $code;
}

//activate shortcode
add_shortcode('grpdocscomparison', 'grpdocs_comparison_getdocument');


// editor integration

// add quicktag
add_action( 'admin_print_scripts', 'grpdocs_comparison_admin_print_scripts' );

// add tinymce button
add_action('admin_init','grpdocs_comparison_mce_addbuttons');