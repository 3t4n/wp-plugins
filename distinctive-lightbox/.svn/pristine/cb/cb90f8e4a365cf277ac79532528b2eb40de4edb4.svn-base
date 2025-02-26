<?php
/**
 * Core plugin functionality.
 *
 * @package DistinctiveLightbox
 */

namespace DistinctiveLightbox\Core;

use \WP_Error as WP_Error;

/**
 * Default setup routine
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'i18n' ) );
	add_action( 'init', $n( 'init' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
	add_action( 'admin_enqueue_scripts', $n( 'admin_scripts' ) );
	add_action( 'admin_enqueue_scripts', $n( 'admin_styles' ) );

	// Hook to allow async or defer on asset loading.
	add_filter( 'script_loader_tag', $n( 'script_loader_tag' ), 10, 2 );

	do_action( 'distinctive_lightbox_loaded' );
}

/**
 * Registers the default textdomain.
 *
 * @return void
 */
function i18n() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'distinctive-lightbox' );
	load_textdomain( 'distinctive-lightbox', WP_LANG_DIR . '/distinctive-lightbox/distinctive-lightbox-' . $locale . '.mo' );
	load_plugin_textdomain( 'distinctive-lightbox', false, plugin_basename( DISTINCTIVE_LIGHTBOX_PATH ) . '/languages/' );
}

/**
 * Initializes the plugin and fires an action other plugins can hook into.
 *
 * @return void
 */
function init() {
	do_action( 'distinctive_lightbox_init' );
}

/**
 * Activate the plugin
 *
 * @return void
 */
function activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	init();
	flush_rewrite_rules();
}

/**
 * Deactivate the plugin
 *
 * Uninstall routines should be in uninstall.php
 *
 * @return void
 */
function deactivate() {

}


/**
 * The list of knows contexts for enqueuing scripts/styles.
 *
 * @return array
 */
function get_enqueue_contexts() {
	return [ 'admin', 'frontend' ];
}

/**
 * Generate an URL to a script, taking into account whether SCRIPT_DEBUG is enabled.
 *
 * @param string $script Script file name (no .js extension)
 * @param string $context Context for the script ('admin', 'frontend', or 'shared')
 *
 * @return string|WP_Error URL
 */
function script_url( $script, $context ) {

	if ( ! in_array( $context, get_enqueue_contexts(), true ) ) {
		return new WP_Error( 'invalid_enqueue_context', 'Invalid $context specified in DistinctiveLightbox script loader.' );
	}

	return DISTINCTIVE_LIGHTBOX_URL . "dist/js/${script}.js";

}

/**
 * Generate an URL to a stylesheet, taking into account whether SCRIPT_DEBUG is enabled.
 *
 * @param string $stylesheet Stylesheet file name (no .css extension)
 * @param string $context Context for the script ('admin', 'frontend', or 'shared')
 *
 * @return string URL
 */
function style_url( $stylesheet, $context ) {

	if ( ! in_array( $context, get_enqueue_contexts(), true ) ) {
		return new WP_Error( 'invalid_enqueue_context', 'Invalid $context specified in DistinctiveLightbox stylesheet loader.' );
	}

	return DISTINCTIVE_LIGHTBOX_URL . "dist/css/${stylesheet}.css";

}

/**
 * Enqueue scripts for front-end.
 *
 * @return void
 */
function scripts() {

	wp_enqueue_script(
		'distinctive_lightbox_frontend',
		script_url( 'frontend', 'frontend' ),
		array(),
		DISTINCTIVE_LIGHTBOX_VERSION,
		true
	);

	if ( 'hide-nav' === \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'gallery-setting' ) ) {
		$touch_nav = false;
	} else {
		$touch_nav = true;
	}

	// Data array.
	$data_array = array(
		'ajaxURL'             => admin_url( 'admin-ajax.php' ),
		'imageSetting'        => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'image-setting' ),
		'videoSetting'        => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'video-setting' ),
		'imageAnchorClass'    => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'specific-image-class' ),
		'videoAnchorClass'    => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'exclusive-video-class' ),
		'openAnimation'       => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'opening-animation' ),
		'slideAnimation'      => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'slide-animation' ),
		'closeAnimation'      => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'closing-animation' ),
		'maxHeight'           => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'max-height' ),
		'maxWidth'            => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'max-width' ),
		'descPosition'        => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'desc-position' ),
		'descSetting'         => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'description-setting' ),
		'exclusiveImageClass' => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'exclusive-image-class' ),
		'includedImageClass'  => \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'included-image-class' ),
		'touchNavigation'     => $touch_nav,
	);
	wp_localize_script( 'distinctive_lightbox_frontend', 'LightBoxData', $data_array );

}

/**
 * Enqueue scripts for admin.
 *
 * @return void
 */
function admin_scripts() {

	wp_enqueue_script(
		'distinctive_lightbox_admin',
		script_url( 'admin', 'admin' ),
		[],
		DISTINCTIVE_LIGHTBOX_VERSION,
		true
	);

}

/**
 * Enqueue styles for front-end.
 *
 * @return void
 */
function styles() {

	wp_enqueue_style(
		'distinctive_lightbox_frontend',
		style_url( 'style', 'frontend' ),
		[],
		DISTINCTIVE_LIGHTBOX_VERSION
	);

	$custom_css = '
		@media all and (min-width: 1024px) {
			.glightbox-container .gslide-inner-content {
				max-width: '. \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'max-width' ) .';
			}
		}
	';

	if ( 'hide-nav' === \DistinctiveLightbox\DistinctiveLightbox::get_distinctive_lightbox_setting( 'gallery-setting' ) ) {
		$custom_css .= '
			.gnext, .gprev  {
				display: none !important;
			}
		';
	}

	wp_add_inline_style( 'distinctive_lightbox_frontend', $custom_css );

}

/**
 * Enqueue styles for admin.
 *
 * @return void
 */
function admin_styles() {

	wp_enqueue_style(
		'distinctive_lightbox_admin',
		style_url( 'admin-style', 'admin' ),
		[],
		DISTINCTIVE_LIGHTBOX_VERSION
	);

}

/**
 * Add async/defer attributes to enqueued scripts that have the specified script_execution flag.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string
 */
function script_loader_tag( $tag, $handle ) {
	$script_execution = wp_scripts()->get_data( $handle, 'script_execution' );

	if ( ! $script_execution ) {
		return $tag;
	}

	if ( 'async' !== $script_execution && 'defer' !== $script_execution ) {
		return $tag; // _doing_it_wrong()?
	}

	// Abort adding async/defer for scripts that have this script as a dependency. _doing_it_wrong()?
	foreach ( wp_scripts()->registered as $script ) {
		if ( in_array( $handle, $script->deps, true ) ) {
			return $tag;
		}
	}

	// Add the attribute if it hasn't already been added.
	if ( ! preg_match( ":\s$script_execution(=|>|\s):", $tag ) ) {
		$tag = preg_replace( ':(?=></script>):', " $script_execution", $tag, 1 );
	}

	return $tag;
}
