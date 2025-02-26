<?php
/**
 * This file control dependency functions
 *
 * @author   	AyoThemes
 * @package   	Ayo Shortcodes
 * @since 		0.2
 * @copyright 	Copyright (c) 2013, AyoThemes
 * @license  	http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/** Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * String
 * 
 * @since  	0.2
 * @return 	string
 */
function ayo_require_plugin( $slug, $name ){
	return sprintf( __( 'This shortcode require %s%s%s plugin.', 'ayoshortcodes' ), 
		'<a href="//wordpress.org/extend/plugins/'. $slug.'">', 
		esc_attr( $name ),
		'</a>' );
}