<?php
/**
 * Public Class
 *
 * Handles the public side functionality of plugin
 *
 * @package Preloader for Website - WPOS
 * @since 1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Plwao_Public {

	function __construct() {

		// Action to add preloader css in head
		add_action( 'wp_head', array($this, 'plwao_process_loader') );

		// Action to add preloader in before body tag
		add_action( 'wp_body_open', array($this, 'plwao_loader_function') );

		// Action to add preloader in footer
		add_action( 'wp_footer', array($this, 'plwao_loader_function'), 99 );
	}

	/**
	 * Function to check preloader is active or not and place bit of JS code to avoid site jerking.
	 * 
	 * @since 1.2
	 */
	function plwao_process_loader() {

		global $plwao_active;

		$is_preloader = plwao_get_option( 'is_preloader' );

		if( ! $is_preloader ) {
			return false;
		}

		$plwao_active = 1;
		?>

		<script type="text/javascript">
			var plwao_tag	= document.getElementsByTagName( 'html' )[0];
			var plwao_class	= plwao_tag.getAttribute("class");
			var new_classes	= plwao_class ? plwao_class.concat(' plwao-hide') : 'plwao-hide';

			plwao_tag.setAttribute( 'class', new_classes );
		</script>

	<?php }

	/**
	 * Function to add preloader in footer
	 * 
	 * @since 1.2
	 */
	function plwao_loader_function() {

		global $plwao_active;

		static $preloader_rendered = 0;

		/* Check preloader render only one time */
		if( $preloader_rendered > 0 || $plwao_active != 1 ) {
			return false;
		}

		// Taking atts data
		$plwao_spinner		= plwao_get_option('plwao_spinner', 'spinner-1');
		$custom_content		= plwao_get_option('custom_content');
		$preloader_type		= plwao_get_option('preloader_type');
		$preloader_rendered++;

		if( empty( $custom_content ) && ( $preloader_type == 'disable' ) ) {
			$custom_content	= __('Loading...', 'preloader-for-website');
		}

		$style = $this->plwao_pro_generate_style();

		// Remove JS class
		echo '<script type="text/javascript">
				var plwao_tag	= document.getElementsByTagName( "html" )[0];
				var plwao_class	= plwao_tag.getAttribute("class");
				var new_classes	= plwao_class.replace("plwao-hide", "");

				plwao_tag.setAttribute( "class", new_classes );
			</script>';

		// Print Style
		echo "<style type='text/css'>{$style}</style>";

		$design_file_path	= PLWAO_DIR . '/templates/design.php';
		$design_file		= ( file_exists( $design_file_path ) ) ? $design_file_path : '';

		// Include Design File
		include( $design_file );

		// Enquque public script
		wp_print_scripts('plwao-public-script');
	}

	/**
	 * Function to create agent style
	 * 
	 * @since 1.1
	 */
	function plwao_pro_generate_style() {

		// Taking some variable
		$style				= '';
		$content_font_size	= plwao_get_option('content_font_size');
		$content_font_clr	= plwao_get_option('content_font_clr');
		$plwao_bgcolor		= plwao_get_option('plwao_bgcolor');

		if( $plwao_bgcolor ) {
			$style .= ".plwao-loader-wrap{background-color: {$plwao_bgcolor};}";
		}

		if( $content_font_size ) {
			$style .= ".plwao-loader-wrap .plwao-custom-cnt, .plwao-loader-wrap .plwao-custom-cnt p{font-size: {$content_font_size}px;}";
		}

		if( $content_font_clr ) {
			$style .= ".plwao-loader-wrap .plwao-custom-cnt, .plwao-loader-wrap .plwao-custom-cnt p{color: {$content_font_clr};}";
		}

		return wp_strip_all_tags( $style );
	}
}

$plwao_public = new Plwao_Public();