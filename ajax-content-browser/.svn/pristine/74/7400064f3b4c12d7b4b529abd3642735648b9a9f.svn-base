<?php
/**
 * Functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Include core functions (available in both admin and frontend).
require ACB_ABSPATH . 'includes/core.php';
require ACB_ABSPATH . 'includes/formatting.php';
require ACB_ABSPATH . 'includes/template.php';
require ACB_ABSPATH . 'includes/stats.php';
require ACB_ABSPATH . 'includes/woocommerce.php';
require ACB_ABSPATH . 'includes/edd.php';

/**
 * Get the price meta key depending on installed shopping cart.
 */
function acb_get_price_metakey( $post_type ) {
	if ( in_array( 'product', $post_type ) ) {
		return '_price';
	}
	if ( in_array( 'download', $post_type ) ) {
		return 'edd_price';
	}
	return apply_filters( 'acb_get_price_metakey', 'price' );
}

/**
 * Get template part.
 */
function acb_get_template_part( $slug, $name = '' ) {
	global $the_acb;
	$template = '';

	// Look in yourtheme/slug-name.php and yourtheme/acb/slug-name.php.
	if ( $name && ! ACB_TEMPLATE_DEBUG_MODE ) {
		$template = locate_template( array( "{$slug}-{$name}.php", acb()->template_path() . "{$slug}-{$name}.php" ) );
	}

	// Get default slug-name.php.
	if ( ! $template && $name && file_exists( acb()->plugin_path() . "/templates/{$slug}-{$name}.php" ) ) {
		$template = acb()->plugin_path() . "/templates/{$slug}-{$name}.php";
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/acb/slug.php.
	if ( ! $template && ! ACB_TEMPLATE_DEBUG_MODE ) {
		$template = locate_template( array( "{$slug}.php", acb()->template_path() . "{$slug}.php" ) );
	}

	// Allow 3rd party plugins to filter template file from their plugin.
	$template = apply_filters( 'acb_get_template_part', $template, $slug, $name );

	if ( $template ) {
		load_template( $template, false );
	}
}

/**
 * Get other templates (e.g. product attributes) passing attributes and including the file.
 */
function acb_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	global $the_acb, $product;
	if ( ! empty( $args ) && is_array( $args ) ) {
		extract( $args );
	}

	$located = acb_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin.
	$located = apply_filters( 'acb_get_template', $located, $template_name, $args, $template_path, $default_path );

	do_action( 'acb_before_template_part', $template_name, $template_path, $located, $args );

	include $located;

	do_action( 'acb_after_template_part', $template_name, $template_path, $located, $args );
}

/**
 * Like acb_get_template, but returns the HTML instead of outputting.
 */
function acb_get_template_html( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	global $the_acb;
	ob_start();
	acb_get_template( $template_name, $args, $template_path, $default_path );
	return ob_get_clean();
}

/**
 * Locate a template and return the path for inclusion.
 */
function acb_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	global $the_acb;
	if ( ! $template_path ) {
		$template_path = acb()->template_path();
	}

	if ( ! $default_path ) {
		$default_path = acb()->plugin_path() . '/templates/';
	}

	// Look within passed path within the theme - this is priority.
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name,
		)
	);

	// Get default template/.
	if ( ! $template || ACB_TEMPLATE_DEBUG_MODE ) {
		$template = $default_path . $template_name;
	}

	// Return what we found.
	return apply_filters( 'acb_locate_template', $template, $template_name, $template_path );
}