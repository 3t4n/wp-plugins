<?php
/**
 * @wordpress-plugin
 * Plugin Name: Attachment URL Version
 * Plugin URI: https://wordpress.org/plugins/attachment-url-version
 * Description: Adds the version number of attachments to their URL.
 * Version: 1.0.4
 * Author: Matthias-Christian Ott
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

/* Attachment URL Version WordPress Plugin
 * Copyright (C) 2021  Matthias-Christian Ott
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

function get_attachment_url_version( $url, $attachment_id ) {
	$time = get_the_time( 'U', $attachment_id );
	if ( $time !== null ) {
		return add_query_arg( 'ver', $time, $url );
	} else {
		return $url;
	}
}

function get_attachment_image_src_version( $image, $attachment_id, $size, $icon ) {
	if ( $image !== false ) {
		$time = get_the_time( 'U', $attachment_id );
		if ( $time !== null ) {
			$image[0] = add_query_arg( 'ver', $time, $image[0] );
		}
	}
	return $image;
}

function get_attachment_image_srcset_version( $sources, $size_array, $image_src, $image_meta, $attachment_id ) {
	$time = get_the_time( 'U', $attachment_id );
	if ( $time !== null ) {
		foreach ( $sources as &$source ) {
			$source['url'] = add_query_arg( 'ver', $time, $source['url'] );
		}
	}
	return $sources;
}

add_filter( 'wp_get_attachment_url', 'get_attachment_url_version', 10, 2 );
add_filter( 'wp_get_attachment_image_src', 'get_attachment_image_src_version', 10, 4 );
add_filter( 'wp_get_attachment_image_srcset', 'get_attachment_image_srcset_version', 10, 5 );
add_filter( 'wp_calculate_image_srcset', 'get_attachment_image_srcset_version', 10, 5);
