<?php
/**
 * ArtistPress Shortcodes.
 *
 * @package     ArtistPress/views/
 * @version     1.0.0
 * @author      LTDI Studios
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
}

/**
 *
 * Adds the ArtistPress Shortcodes.
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function register_shortcodes($atts){

	$artistOptions 			= get_option('artistpress_artist_settings');
	$artistOptionShortcode	= sanitize_text_field($artistOptions['artist_use_shortcode']);

	if( $artistOptionShortcode == 'yes'){
		require_once (plugin_dir_path(__FILE__) . '/shortcodes/artistpress-artist-shortcode.php');
		add_shortcode('artistpress-artist','artistpress_artist_shortcode');
	}
	
	
	require_once (plugin_dir_path(__FILE__) . '/shortcodes/artistpress-album-shortcode.php');
	add_shortcode('artistpress-gallery-album','artistpress_gallery_album_shortcode');

	require_once (plugin_dir_path(__FILE__) . '/shortcodes/artistpress-gallery-shortcode.php');
	add_shortcode('artistpress-gallery','artistpress_gallery_shortcode');


	
	$artistpress_show_list_settings = get_option('artistpress_show_list_settings');
    $showListUseShortcode = sanitize_text_field( $artistpress_show_list_settings['show_list_use_shortcode'] );
    
    if ( $showListUseShortcode == 'yes') {
    	require_once (plugin_dir_path(__FILE__) . '/shortcodes/artistpress-show-list-shortcode.php');
		add_shortcode('artistpress-show-list','artistpress_show_list_shortcode');
	}

	$artistpress_show_settings = get_option('artistpress_show_settings');
    $showUseShortcode = sanitize_text_field( $artistpress_show_settings['show_use_shortcode'] );
    
    if ( $showUseShortcode == 'yes') {
    	require_once (plugin_dir_path(__FILE__) . '/shortcodes/artistpress-show-shortcode.php');
		add_shortcode('artistpress-show','artistpress_show_shortcode');
	}

}
add_action( 'init', 'register_shortcodes');