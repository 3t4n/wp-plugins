<?php
/**
 * @package OkConfirm
 */
/*
Plugin Name: OkConfirm
Plugin URI: http://wordpress.org/plugins/okconfirm/
Description: This plugin allows the simple embedding of OkConfirm.com widgets via shortcodes.
Author: Andrew Kessler
Version: 1.0
Author URI: http://okconfirm.com/
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// This just returns the necessary script tag for loading widget.js
function okconfirm_embed_widget_js()
{
	return '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://okconfirm.com/widget.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","okc-wjs");</script>';
}

// Output embed code
function okconfirm_func( $attrs )
{
	$a = shortcode_atts( array(
		'widget' => 'checkout',
		'id' => null,
	), $attrs );

	return '<div data-okc-widget="' . $a['widget'] . '" data-okc-id="' . $a['id'] . '"></div>' . okconfirm_embed_widget_js();
}

// Add the shortcode
add_shortcode( 'okconfirm', 'okconfirm_func' );
