<?php
/*
 Plugin Name: AccessibleYouTube
Plugin URI: http://www.jannickbolten.nl
Description: This plugin was custom made for a company for use with screen readers. It allows the user to embed YouTube videos in a post or page, which is controllable with the tab- and enter key, or via Screen readers for sighted or blind people.
Version: 0.5
Author: Jannick Bolten
Author URI: http://www.jannickbolten.nl
License: GPL2
*/
/*
 Copyright 2010-2012  Jannick Bolten (email : Jannick@Jannickbolten.nl)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//Shortcode [accessibleyoutube id=##### width=### height=###]
function AccessibleYouTube_shortcode($atts){
	extract(shortcode_atts(array(
		'id' => '',
		'width' => '400',
		'height' => '240'
	), $atts));
	$returnwaarde = null;

	$returnwaarde .= '<div id="yt_div_' . $id . '"></div>
    <script type="text/javascript">
    	printHTML("'.htmlentities($id).'");
    	var parameters = { allowScriptAccess: "always" };
    	var attributen = { id: "'.htmlentities($id).'" };
    	swfobject.embedSWF("http://www.youtube.com/apiplayer?&enablejsapi=1&version=3&playerapiid='.htmlentities($id).'","div_'.htmlentities($id).'", "'.$width.'", "'.$height.'", "8", null, null, parameters, attributen);
    </script>';
	return $returnwaarde;
}
function accessibleyoutube_addbuttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
	return;
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_accessibleyoutube_tinymce_plugin");
		add_filter('mce_buttons', 'register_accessibleyoutube_button');
	}
}

function register_accessibleyoutube_button($buttons) {
	array_push($buttons, 'separator', "accessibleyoutube");
	return $buttons;
}

function add_accessibleyoutube_tinymce_plugin($plugin_array) {
	$plugin_array['accessibleyoutube'] = WP_PLUGIN_URL. '/accessibleyoutube/editor_plugin.js';
	return $plugin_array;
}

add_action('init', 'accessibleyoutube_addbuttons');

add_shortcode('accessibleyoutube', 'AccessibleYouTube_shortcode');
wp_register_script('AccessibleYouTube', WP_PLUGIN_URL .'/accessibleyoutube/AccessibleYouTube.js    ', array('swfobject'), "0.11");
wp_enqueue_script('AccessibleYouTube');
?>