<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Allowed HTML for code editor options.
 *
 * @since 1.0.0
 * @return array
 */
function insertcodes_get_allowed_html() {
	return array(
		'script'   => array(
			'type'         => array(),
			'src'          => array(),
			'async'        => array(),
			'defer'        => array(),
			'data-account' => array(),
			'data-user'    => array(),
			'id'           => array(),
		),
		'noscript' => array(
			'type'  => array(),
			'src'   => array(),
			'async' => array(),
			'defer' => array(),
		),
		'iframe'   => array(
			'src'         => array(),
			'width'       => array(),
			'height'      => array(),
			'frameborder' => array(),
			'scrolling'   => array(),
			'style'       => array(),
			'class'       => array(),
			'id'          => array(),
		),
		'meta'     => array(
			'name'       => array(),
			'content'    => array(),
			'charset'    => array(),
			'http-equiv' => array(),
			'property'   => array(),
		),
		'a'        => array(
			'href'   => array(),
			'title'  => array(),
			'rel'    => array(),
			'target' => array(),
			'class'  => array(),
			'id'     => array(),
			'style'  => array(),
		),
		'br'       => array(),
		'em'       => array(),
		'strong'   => array(),
		'p'        => array(),
		'div'      => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'span'     => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'img'      => array(
			'src'    => array(),
			'alt'    => array(),
			'title'  => array(),
			'width'  => array(),
			'height' => array(),
			'class'  => array(),
			'id'     => array(),
			'style'  => array(),
		),
		'link'     => array(
			'rel'            => array(),
			'type'           => array(),
			'href'           => array(),
			'media'          => array(),
			'hreflang'       => array(),
			'sizes'          => array(),
			'as'             => array(),
			'crossorigin'    => array(),
			'referrerpolicy' => array(),
			'title'          => array(),
			'integrity'      => array(),
		),
	);
}
