<?php
/**
 * Plugin Name:			ANON::form embedded secure form
 * Plugin URI:			https://anonform.com/en/docs/easily-embed-with-our-wordpress-plugin/
 * Description:			Embed secure web forms with shortcode. Note! This plugin requires an active <a href="https://anonform.com/en/">ANON::form</a> account. For support visit the <a href="https://anonform.com/en/docs/">Knowledgebase</a>.
 * Version:				1.7
 * Requires at least:	5.0
 * Requires PHP:		5.6
 * Author:				Anonform Ab
 * Author URI:			https://anonform.com
 * License:				GPLv3
 * License URI:			https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:			anonform-embedded-secure-form
 */

/*
	Copyright 2021  Anonform Ab

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

defined( 'ABSPATH' ) || exit;

if (!defined('ANONFORM_EMBEDDED_SECURE_FORM_VERSION')) { define('ANONFORM_EMBEDDED_SECURE_FORM_VERSION', '1.5'); }	// IMPORTANT! Update when you change version
if (!defined('ANONFORM_PLUGIN_PATH')) { define('ANONFORM_PLUGIN_PATH', __FILE__); }

// register actions and hooks
add_shortcode('anonform', 'anon_embed_anonform');
add_action('wp_enqueue_scripts', 'anon_embed_anonform_styles');

// the main embed function
function anon_embed_anonform($atts) {
	$default = array('link' => '#');
	$a = shortcode_atts($default, $atts);
	return '<div id="anonform-div"><iframe id="anonform-app" src="'.$a['link'].'" loading="lazy" title="Embedded secure form from ANON::form"></iframe></div><script>!function(){var e=document.getElementById("anonform-app");var n=window.addEventListener?"addEventListener":"attachEvent";(0,window[n])("attachEvent"==n?"onmessage":"message",function(n){var t,a=n[n.message?"message":"data"];t=a,e.style.height=t+"px"},!1),window.onresize=function(){e.contentWindow.postMessage("parentWindowResized","*")}}();</script>';
}

// add the CSS-lib
function anon_embed_anonform_styles() {
	wp_enqueue_style('embed-anonform-css', plugin_dir_url(__FILE__).'css/embed-anonform.css');
}

// load review code if in admin dashboard
if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {
	require_once plugin_dir_path( __FILE__ ) . 'embed-anonform-review.php';
}

