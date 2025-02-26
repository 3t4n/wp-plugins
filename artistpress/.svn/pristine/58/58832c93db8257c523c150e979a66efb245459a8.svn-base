<?php
/**
 * Loads the Style and Scipts for the single eventss and event archives.
 *
 * @author      LTDI Studios
 * @package     ArtistPress/public/includes
 * @version     1.0.0
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
} 



/**
 * Registers the scripts and styles for te ArtistPress shows.
 */

$artistpress_map_settings = get_option('artistpress_show_settings');
$apikey = esc_html($artistpress_map_settings['artistpress_maps_api']);
$mapsapi = '//maps.googleapis.com/maps/api/js?key=' . $apikey;

wp_register_style( 'show-styles', plugins_url( '/css/showStyles.css', __FILE__ ), array(), '1.0.0', 'all' );
wp_register_script( 'googlemaps', $mapsapi ,'','', true);
wp_register_script( 'artistpress_direction_js', plugins_url( '/js/artistpress_maps.js', __FILE__ ) ,'','', true );

/**
 * Enqueues the scripts and styles for te ArtistPress shows.
 */
if (is_singular('show')){
    
    if ( ! empty( $apikey ) ) {
        wp_enqueue_script( 'googlemaps' );
        wp_enqueue_script( 'artistpress_direction_js' );
    }
    $artistpress_show_settings = get_option('artistpress_show_settings');
    $showUseStyles = sanitize_text_field( $artistpress_show_settings['show_use_stylesheet'] );
    
    if ( $showUseStyles == 'yes') {
    	wp_enqueue_style( 'show-styles' );
	}


}elseif (is_archive('show')){
    
    $artistpress_show_list_settings = get_option('artistpress_show_list_settings');
    $showListUseStyles = sanitize_text_field( $artistpress_show_list_settings['show_list_use_stylesheet'] );
    
    if ( $showListUseStyles == 'yes') {
    	wp_enqueue_style( 'show-styles' );
	}
}

?>