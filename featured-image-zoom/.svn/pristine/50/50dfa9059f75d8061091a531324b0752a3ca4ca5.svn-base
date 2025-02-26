<?php
/*
Plugin Name: Featured Image Zoom
Plugin URI: http://cubecolour.co.uk/zoom-featured-image/
Description: Shortcode [zoom] to display to display the post's zoomable featured image on the page.
Version: 2.1.0
Author: Michael Atkins
Author URI: http://cubecolour.co.uk/
License: GPL/MIT
*/

/*
Uses the MIT licensed Bootstrap Magnify Script:
https://github.com/marcaube/bootstrap-magnify

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/


/**
* Set Constants
*
*/
define( 'CC_ZOOM_VERSION', '2.1.0' );
define( 'CC_ZOOM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


/**
* Add Links to the Plugins Table
*
*/
function cc_zoom_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);
	if ( $file == $plugin ) {

		$supportlink = 'https://wordpress.org/support/plugin/featured-image-zoom';
		$donatelink = 'http://cubecolour.co.uk/wp';
		$reviewlink = 'https://wordpress.org/support/view/plugin-reviews/featured-image-zoom#new-post';
		$iconstyle = 'style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-size: 14px;margin: 4px 0 -4px;"';
		$twitterlink = 'http://twitter.com/cubecolour';

		return array_merge( $links, array(
			'<a href="' . $donatelink . '"><span class="dashicons dashicons-heart"' . $iconstyle . 'title="Donate"></span></a>',
			'<a href="' . $supportlink . '"> <span class="dashicons dashicons-lightbulb" ' . $iconstyle . 'title="Support"></span></a>',
			'<a href="' . $twitterlink . '"><span class="dashicons dashicons-twitter" ' . $iconstyle . 'title="Cubecolour on Twitter"></span></a>',
			'<a href="' . $reviewlink . '"><span class="dashicons dashicons-star-filled"' . $iconstyle . 'title="Review"></span></a>'
		) );
	}
	return $links;
}

add_filter( 'plugin_row_meta', 'cc_zoom_meta_links', 10, 2 );


/**
*	Register the plugin's js & css
*
*/
function cc_zoom_jscss() {
	wp_register_script( 'cczoom', CC_ZOOM_PLUGIN_URL . 'js/imagezoom.js', array('jquery'), CC_ZOOM_VERSION, false );
	wp_register_style( 'cczoom', CC_ZOOM_PLUGIN_URL . 'css/imagezoom.css', '', CC_ZOOM_VERSION, 'all' );
}

add_action('wp_enqueue_scripts', 'cc_zoom_jscss');


/**
* [zoom] Shortcode
* Outputs the featured image & enqueues the js & css
*
*/
function cc_zoom_featured_image( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
		'size'		=> 'large',
		'zoomsize'	=> 'full',
		'class'		=> '',
		'zoomin'	=> '6',
	), $atts, 'zoom' );

	//* check size & zoomsize parameter is a defined size OK
	$defined_sizes = get_intermediate_image_sizes();

	if ( !in_array( $atts[ 'size' ], $defined_sizes ) ) {
		$atts[ 'size' ] = 'large';
	}

	if (!in_array( $atts[ 'zoomsize' ], $defined_sizes ) ) {
		$atts[ 'size' ] = 'full';
	}

	//* Sanitize zoomin
	$atts[ 'zoomin' ] = absint( $atts[ 'zoomin' ] );

	//* check class
	if ( '' == $atts[ 'class' ] ) {
		$class = 'zoom';
	} else {
		$class = 'zoom ' . sanitize_html_class( $atts[ 'class' ] );
	}

	$scriptdata = array(
	    'zoomIn'	=> absint( $atts[ 'zoomin' ] ),
	);

	wp_localize_script( 'cczoom', 'php_vars', $scriptdata );

	if ( has_post_thumbnail() ) {

		wp_enqueue_script( 'cczoom' );
		wp_enqueue_style( 'cczoom' );

		$large_zoom_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $atts[ 'size' ] );
		$full_zoom_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $atts[ 'zoomsize' ] );
		$image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

		$zoomfeature = '<div data-zoom="' . $full_zoom_image_url[0] . '" class="' . $class . '"><img src="' . $large_zoom_image_url[0] . '"></div>';

		return $zoomfeature;
	}
}

add_shortcode('zoom', 'cc_zoom_featured_image');