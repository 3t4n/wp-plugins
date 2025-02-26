<?php
/**
 * ArtistPress Shortcodes.
 *
 * @package     ArtistPress/views/shortcodes
 * @version     1.0.0
 * @author      LTDI Studios
 * 
 */

	function artistpress_gallery_shortcode($atts){
		
		extract(shortcode_atts(array(
	      'id' => '',
	    ), $atts));
		
		if (!$id){

			$shortcodeContent = "<p>You need to provide an ID to the gallery shortcode to display a gallery.</p>";

		}else{

			$galleryID          		= esc_html($id);
			$post_meta_data 			= get_post_custom($galleryID);  
			$custom_repeatables 		= unserialize($post_meta_data['artistpress_images'][0]);
			$galleryTitle       		= get_the_title($galleryID);
			$galleryLink        		= get_the_permalink($galleryID);
			$gallery_options 			= get_option('artistpress_gallery_settings');
			$galleryOptionTitle 		= sanitize_text_field($gallery_options['gallery_show_title']);
			$galleryOptionBehavior 		= sanitize_text_field($gallery_options['gallery_behavior']);
			$galleryOptionCaption 		= sanitize_text_field($gallery_options['gallery_show_image_caption']);
			$galleryOptionImageTitle 	= sanitize_text_field($gallery_options['gallery_show_image_title']);
			$galleryOptionStyles		= sanitize_text_field($gallery_options['gallery_use_stylesheet']);

			$shortcodeContent 		= NULL;
			
			// Registers jquery if it is not provided by theme.
			if ( ! wp_script_is( 'jquery', 'enqueued' )) {
			    wp_enqueue_script( 'jquery' );
			}

			if( $galleryOptionBehavior == 'masonrylightbox' ) {
				wp_enqueue_style( 'masonry-style');
				wp_enqueue_script( 'masonry-js');
				wp_enqueue_script( 'masonry-start');
			}
        	wp_enqueue_style( 'gallery-lightbox' );
			wp_enqueue_script( 'gallery-lightbox-js' );
			if( $galleryOptionStyles == 'yes'){
				wp_enqueue_style( 'gallery-styles');
			}
			if( $galleryOptionTitle == 'yes'){
				$shortcodeContent .= '<h2 class="galleryTitle">' . $galleryTitle . '</h2>';
			}

			if( $galleryOptionBehavior == 'masonrylightbox' ) {
            	$shortcodeContent .= '<div class="grid">';
            	$shortcodeContent .= '<div class="grid-sizer"></div>';
        	} else {
        		$shortcodeContent .= '<ul id="galleries" class="galleries">';
        	} 
		
			foreach($custom_repeatables as $key => $value){
	       		
				$imageID 				= $value['image'];
				$image 					= get_post($imageID);
				$imageTitle 			= $image->post_title;
				if( $galleryOptionBehavior == 'masonrylightbox' ) {
					$galleryImageMasonry = wp_get_attachment_image( $imageID , 'artistpress-full' , 'false', '' );
				}else{
					$galleryImage   	 = wp_get_attachment_image( $imageID , 'artistpress-square' , 'false', '' );
				}
				$galleryLightboxURL   	 = wp_get_attachment_image_src( $imageID , 'full' , 'false');

				if( $galleryOptionBehavior == 'masonrylightbox' ) {
	        		
	        		$shortcodeContent .= '<a id="gallery-'. $galleryID. '" href="' . $galleryLightboxURL[0] . '" class="grid-item"'; 
	        		if( $galleryOptionCaption == 'yes'){
	        				$shortcodeContent .= 'data-title="' . $imageTitle . '"';
	        		}
	        		$shortcodeContent .= 'data-lightbox="artispress-lightbox">';
					$shortcodeContent .= $galleryImageMasonry;
					$shortcodeContent .= '<div class="overlay"></div>';
					$shortcodeContent .= '<div class="content">';
					if( $galleryOptionImageTitle  == 'yes'){
							$shortcodeContent .= '<span>' . $imageTitle . '</span>';
					}
					$shortcodeContent .= '</div>';
					$shortcodeContent .= '</a>';
				
				} else {
				
					$shortcodeContent .= '<a id="gallery-'. $galleryID. '" class="gallery" href="' . $galleryLightboxURL[0] . '"'; 
	        		if( $galleryOptionCaption == 'yes'){
	        				$shortcodeContent .= 'data-title="' . $imageTitle . '"';
	        		}
	        		$shortcodeContent .= 'data-lightbox="artispress-lightbox">';
					$shortcodeContent .= $galleryImage;
					$shortcodeContent .= '<div class="content">';
					if( $galleryOptionImageTitle  == 'yes'){
							$shortcodeContent .= '<span>' . $imageTitle . '</span>';
					}
					$shortcodeContent .= '</div>';
           			$shortcodeContent .= '<div class="clear"></div>';
					$shortcodeContent .= '</a>';	
				}
			}

		if( $galleryOptionBehavior == 'masonrylightbox' ) {
        	$shortcodeContent .= '</div>';
        } else {
        	$shortcodeContent .= '</ul>';
		}
		

		}
		return $shortcodeContent;
	
	}