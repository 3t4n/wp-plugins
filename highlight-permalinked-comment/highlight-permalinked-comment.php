<?php

/*
Plugin Name: Highlight Permalinked Comment
Description: Briefly fade a highlighted background on comments when their permalink is visited.
Version: 1.01
Author: Evan Solomon
Author URI: http://evansolomon.me
*/

/**
 * Copyright (c) 2013 Evan Solomon. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

function es_highlight_permalinked_comment() {
	if ( apply_filters( 'disable_highlight_permalinked_comment', ! is_single() ) )
		return;

	$ext = ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : 'min.' ) . 'js';
	wp_enqueue_script( 'highlight-permalinked-comment', plugins_url( "/highlight-permalinked-comment.{$ext}", __FILE__ ), array( 'jquery', 'jquery-color' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'es_highlight_permalinked_comment' );
