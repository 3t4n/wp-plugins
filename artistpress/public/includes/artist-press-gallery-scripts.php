<?php
/**
 * Loads the Style and Scipts for the single galleries and gallery archives.
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
     * Registers the scripts and styles for te ArtistPress galleries.
     */
    wp_register_script( 'masonry-js-imagesloaded', plugins_url( '/js/imagesloaded.pkgd.min.js', __FILE__ ), '', '', true );
    wp_register_script( 'masonry-js', plugins_url( '/js/masonry.pkgd.min.js', __FILE__ ), '', '', true );
    wp_register_script( 'masonry-start', plugins_url( '/js/masonryStart.js', __FILE__ ), array('masonry-js'), '', true );
    wp_register_style( 'masonry-style', plugins_url( '/css/masonry.css', __FILE__ ), array(), '1.0.0', 'all' );

    wp_register_script( 'gallery-lightbox-js', plugins_url( '/js/lightbox.min.js', __FILE__ ), 'jquery' , '', true );
    wp_register_style( 'gallery-lightbox', plugins_url( '/css/lightbox.min.css', __FILE__ ), array(), '1.0.0', 'all' );
    wp_register_style( 'gallery-styles', plugins_url( '/css/galleryAlbumStyle.css', __FILE__ ), array(), '1.0.0', 'all' );

    $galleryOptions             = get_option('artistpress_gallery_settings');
    $artistOptionStyles         = sanitize_text_field($galleryOptions ['gallery_use_stylesheet']);
    $galleryOptionBehavior      = sanitize_text_field($galleryOptions['gallery_behavior']);

    /**
     * Enqueues the scripts and styles for te ArtistPress galleries.
     */

    if (is_singular('artistpress-gallery')){
        
        // Registers jquery if it is not provided by theme.
        if ( ! wp_script_is( 'jquery', 'enqueued' )) {
            wp_enqueue_script( 'jquery' );
        }

        if( $artistOptionStyles == 'yes'){
                wp_enqueue_style( 'gallery-styles' );
        }
        wp_enqueue_style( 'gallery-lightbox' );
        wp_enqueue_script( 'gallery-lightbox-js' );
        
       if( $galleryOptionBehavior == 'masonrylightbox' ) {

            if( $artistOptionStyles == 'yes'){
                wp_enqueue_style( 'masonry-style' );
            }
            wp_enqueue_script( 'masonry-js-imagesloaded' );
            wp_enqueue_script( 'masonry-js' );
            wp_enqueue_script( 'masonry-start' );
        }

    }elseif (is_archive('artistpress-gallery')){
        // Registers jquery if it is not provided by theme.
        if ( ! wp_script_is( 'jquery', 'enqueued' )) {
            wp_enqueue_script( 'jquery' );
        }
        
        if( $artistOptionStyles == 'yes'){
                wp_enqueue_style( 'gallery-styles' );
        }
        if( $artistOptionStyles == 'masonrylightbox' ) {
            
            if( $artistOptionStyles == 'yes'){
                wp_enqueue_style( 'masonry-style' );
            }
            wp_enqueue_script( 'masonry-js-imagesloaded' );
            wp_enqueue_script( 'masonry-js' );
            wp_enqueue_script( 'masonry-start' );
        }
    
    }
?>