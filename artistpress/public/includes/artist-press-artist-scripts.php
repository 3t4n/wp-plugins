<?php
/**
 * Loads the Style and Scipts for the single artists and artist archives.
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
 	 * Enqueues the styles for the artist page.
 	 */
    wp_register_style( 'artist-styles', plugins_url( '/css/artistStyles.css', __FILE__ ), array(), '1.0.0', 'all' );

    $artistOptions          = get_option('artistpress_artist_settings');
    $artistOptionStyles     = esc_html($artistOptions['artist_use_stylesheet']);

    if (is_singular('artist')){
        
        if( $artistOptionStyles == 'yes'){
            wp_enqueue_style( 'artist-styles' );
        }
        
    }
?>