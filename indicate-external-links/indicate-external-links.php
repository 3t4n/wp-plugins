<?php
/*
Plugin Name: Indicate External Links
Plugin URI: http://cubecolour.co.uk/indicate-external-links
Description: A simple plugin to indicate outbound links in Posts, Pages and CPTs
Author: cubecolour
Version: 1.1.0
Author URI: http://cubecolour.co.uk/wp
License: GPLv3

  Copyright 2014-2022 Michael Atkins

  Licenced under the GNU GPL:

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit;


// ==============================================
//	Add Links in Plugins Table
// ==============================================
/**
*
*
*/
add_filter( 'plugin_row_meta', 'cc_extlink_meta_links', 10, 2 );
function cc_extlink_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);

	/**
	* Create the links
	*
	*/
	if ( $file == $plugin ) {

		$supportlink = 'https://wordpress.org/support/plugin/indicate-external-links';
		$donatelink = 'http://cubecolour.co.uk/wp';
		$reviewlink = 'https://wordpress.org/support/view/plugin-reviews/indicate-external-links#postform';
		$twitterlink = 'http://twitter.com/cubecolour';
		$iconstyle = 'style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;"';

		return array_merge( $links, array(
			'<a href="' . $twitterlink . '"><span class="dashicons dashicons-twitter" ' . $iconstyle . 'title="Cubecolour on Twitter"></span></a>',
			'<a href="' . $reviewlink . '"><span class="dashicons dashicons-star-filled"' . $iconstyle . 'title="Review this Plugin"></span></a>',
			'<a href="' . $supportlink . '"> <span class="dashicons dashicons-lightbulb" ' . $iconstyle . 'title="Plugin Support"></span></a>',
			'<a href="' . $donatelink . '"><span class="dashicons dashicons-heart"' . $iconstyle . 'title="Donate"></span></a>'
		) );
	}

	return $links;
}


/**
* Enqueue jQuery
*
*/
function cc_extlink_init() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'cc_extlink_init');


/**
* Add the inline script
*
*/
add_action( 'wp_head', 'cc_extlink_class' );

function cc_extlink_class() {
	echo "\n\n<!-- https://wordpress.org/plugins/indicate-external-links/ -->\n"
	. '<script type="text/javascript">'	. "\n"
	. 'jQuery(document).ready(function(){' . "\n"
	. 'jQuery("a[href*=\'http://\']:not([href*=\'"+window.location.hostname+"\'])").not(\'a:has(img)\').addClass("extlink").append(\'<sup></sup>\');' . "\n"
	. 'jQuery("a[href*=\'https://\']:not([href*=\'"+window.location.hostname+"\'])").not(\'a:has(img)\').addClass("extlink https").append(\'<sup></sup>\');'	. "\n"
	. '});'	. "\n"
	. '</script>'
	. "\n\n";
}


/**
* Add CSS
*
*/
add_action( 'wp_head', 'cc_extlink_style' );

function cc_extlink_style() {
	echo '' .
'<style type="text/css" media=screen>

	.extlink sup:after {
		content: "\2197";
		font-size: 1em;
		line-height: 0;
		position: relative;
		vertical-align: baseline;
	}

	.nav-menu .extlink sup:after,
	.wp-caption-text .extlink sup:after {
		content:"";
	}

</style>' . "\n\n";
}