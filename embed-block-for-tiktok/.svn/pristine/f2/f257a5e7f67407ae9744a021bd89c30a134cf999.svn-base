<?php
/**
 * @link              https://jeanbaptisteaudras.com
 * @since             0.1
 * @package           Embed Block for TikTok
 *
 * Plugin Name:       Embed Block for TikTok
 * Plugin URI:        https://jeanbaptisteaudras.com/embed-block-for-tiktok-gutenberg-wordpress/
 * Description:       Easily embed TikTok videos in both Gutenberg and Classic Editor.
 * Version:           0.1
 * Author:            audrasjb
 * Author URI:        https://jeanbaptisteaudras.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       embed-block-for-tiktok
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * Add TikTok oEmbed provider
 */
wp_oembed_add_provider( '#https?://(www\.)?tiktok\.com/.*/video/.*#i', 'https://www.tiktok.com/oembed', true );

/*
 * Handle TikTok oEmbed Gutenberg Block
 */
function ebtiktok_embed_video( $attributes ) {
	$tiktok_url = trim( $attributes['tiktok_url'] );
	$content = '';
	if ( '' === trim( $tiktok_url ) ) {
		$content = '<p>' . esc_html__( 'Use the Sidebar to add the URL of your TikTok Video.', 'embed-block-for-tiktok' ) . '</p>';
	} else {
		if ( filter_var( $tiktok_url, FILTER_VALIDATE_URL ) ) {
			$content = $tiktok_url;
		} else {
			$content = '<p>' . esc_html__( 'No information available. Please check the provided URL.', 'embed-block-for-tiktok' ) . '</p>';
		}
	}
	return apply_filters( 'the_content', $content );
}

/*
 * Declare TikTok oEmbed Gutenberg Block and add assets
 */
function ebtiktok_enqueue_scripts() {
	wp_register_script(
		'ebtiktok-video-editor',
		plugins_url( 'tiktok-block.js', __FILE__ ),
		array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'tiktok-block.js' )
	);
	register_block_type( 'embed-block-for-tiktok/video', array(
		'editor_script'   => 'ebtiktok-video-editor',
		'render_callback' => 'ebtiktok_embed_video',
		'attributes'      => array(
			'tiktok_url' => array( 'type' => 'string' ),
		),
	) );
}
add_action( 'init', 'ebtiktok_enqueue_scripts' );
