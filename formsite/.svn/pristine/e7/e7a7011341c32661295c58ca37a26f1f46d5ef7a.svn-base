<?php
/*
Plugin Name: Formsite
Description: Embed online forms and surveys from Formsite into pages, posts, and sidebars with an easy shortcode.
Version: 1.7
Requires at least: 2.6
Author: Formsite
Author URI: https://www.formsite.com/?LinkSource=wordpressorg
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function embedFormsiteForm($atts) {
	extract(shortcode_atts(array(
		'host'  => '',
		'key'  	=> '',
		'width' => '',
    ), $atts));

	$embedId = rand(10000, 9999999999) . 'shortCode';
	if (!preg_match('/^\w+$/', $host)) {
		return "Invalid host. This form could not be loaded.";
	} else {
		$host .= ".formsite.com";
		$key = urlencode($key);
		if (!preg_match('/^\d+(px|%)$/', $width)) {
			$width = "100%";
		}
		/*Make embed code with the attributes from shortcode.*/
		$embedCode  = "<a name=\"form$embedId\" id=\"formAnchor$embedId\"></a>\n";
		$embedCode .= "<script src=\"https://$host/include/form/embedManager.js?$embedId\"></script>\n";
		$embedCode .= "<script>\n";
		$embedCode .= "EmbedManager.embed({\n";
		$embedCode .= "key: \"https://$host/res/showFormEmbed?EParam=$key&$embedId\",\n";
		$embedCode .= "width: \"$width\"\n";
		$embedCode .= "});\n";
		$embedCode .= "</script>\n";
		
		return "$embedCode";
	}	
}

add_shortcode('formsite', 'embedFormsiteForm');

?>