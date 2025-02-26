<?php
/**
 * Defines all functions for the gallery templates
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
 * Creates the Title for the ArtistPress Gallery template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressGalleryTitle() {
	$galleryOptions 	= get_option('artistpress_gallery_settings');
	$galleryOptionTitle = sanitize_text_field($galleryOptions['gallery_show_title']);

	if ($galleryOptionTitle  == 'yes'){
		return '<h2 class="title">' . get_the_title() . '</h2>';
	}
}


/**
 * Creates the Loop for the ArtistPress Gallery template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressGalleryBody($post) {
	$post_meta_data = get_post_custom($post->ID);   
	$custom_repeatables 		= unserialize($post_meta_data['artistpress_images'][0]);
	$galleryID          		= esc_html(get_the_ID());
	$galleryOptions 			= get_option('artistpress_gallery_settings');
	$galleryOptionBehavior 		= sanitize_text_field($galleryOptions['gallery_behavior']);
	$galleryOptionCaption		= sanitize_text_field($galleryOptions['gallery_show_image_caption']);
	$galleryOptionImageTitle 	= sanitize_text_field($galleryOptions['gallery_show_image_title']);

	if( $galleryOptionBehavior == 'masonrylightbox' ) {
		echo '<div class="grid">';
		echo '<div class="grid-sizer"></div>';
	} else {
		echo '<ul id="galleries" class="galleries">';
	}

	foreach($custom_repeatables as $key => $value){

		$imageID 				= esc_html($value['image']);
		$image 					= get_post($imageID);
		$imageTitle 			= $image->post_title;
		$galleryImageMasonry   	= wp_get_attachment_image( $imageID , 'artistpress-full' , 'false', '' );
		$galleryImage   		= wp_get_attachment_image( $imageID , 'artistpress-square' , 'false', '' );
		$galleryLightboxURL   	= wp_get_attachment_image_src( $imageID , 'full' , 'false');

		if( $galleryOptionBehavior == 'masonrylightbox' ) {
			
			echo '<a id="gallery-'. $galleryID . '" href="' . esc_url($galleryLightboxURL[0]) . '" class="grid-item"';
			if( $galleryOptionCaption == 'yes'){
				echo ' data-title="' . $imageTitle . '"';
			}
			echo ' data-lightbox="artispress-lightbox">';
			echo $galleryImageMasonry;
			echo '<div class="overlay"></div>';
			echo '<div class="content">';
			if( $galleryOptionImageTitle == 'yes'){
				echo '<span>' . $imageTitle . '</span>';
			}
			echo '</div>';
			echo '</a>';
		
		} else {
			
			echo '<a id="gallery-'. $galleryID . '" class="gallery" href="' . esc_url($galleryLightboxURL[0]) . '"';
			if( $galleryOptionCaption == 'yes'){
				echo ' data-title="' . $imageTitle . '"';
			}
			echo ' data-lightbox="artispress-lightbox">';
			echo $galleryImage;
			echo '<div class="content">';
			if( $galleryOptionImageTitle == 'yes'){
				echo '<span>' . $imageTitle . '</span>';
			}
			echo '</div>';
			echo '<div class="clear"></div>';
			echo '</a>';	
		}
	}

	if( $galleryOptionBehavior == 'masonrylightbox' ) {
		echo '</div>';
	} else {
		echo '</ul>';
	}
}


/**
 * Creates the No Images error for the ArtistPress Gallery template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressGalleryNoImages() {
	echo '<h2>ArtistPress Error!</h2>';
    echo '<p>No images have been added to this gallery.</p>';
}

/**
 * Creates the No Galleries error for the ArtistPress Gallery template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressNoGallery(){
	echo '<h2>ArtistPress Error!</h2>';
    echo '<p>No galleries have been added to this site.</p>';
}


/**
 * Creates the link to return to the album
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressReturnToAlbumLink(){
	echo '<a href="' . get_bloginfo('url') . '/artistpress-gallery">Back To Album</a>';
}


?>