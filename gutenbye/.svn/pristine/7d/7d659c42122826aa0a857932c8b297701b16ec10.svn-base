<?php
/**
 * @package Gutenbye
 * @version 1.0.0
 */
/*
Plugin Name: Gutenbye
Plugin URI: https://wordpress.org/plugins/gutenbye/
Description: A very simple plugin to disable the Block Editor (formerly known as Gutenberg) and restore the classic WordPress experience.
Author: Chris Lanphear
Version: 1.0.0
Author URI: https://lanphear.io/
*/

function gutenbye_post_type_filter( $use_block_editor, $post_type ) {
	return false;
}

add_filter( 'use_block_editor_for_post_type', 'gutenbye_post_type_filter', 10, 2 );
?>