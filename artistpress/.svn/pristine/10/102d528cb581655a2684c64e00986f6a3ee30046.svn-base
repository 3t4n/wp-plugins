<?php
/**
 * ArtistPress Shortcodes.
 *
 * @package     ArtistPress/views/shortcodes
 * @version     1.0.0
 * @author      LTDI Studios
 * 
 */

  	function artistpress_gallery_album_shortcode($atts){
		
		wp_enqueue_style( 'gallery-styles');
		wp_enqueue_style( 'masonry-style');
		wp_enqueue_script( 'masonry-js');
		wp_enqueue_script( 'masonry-start');



		extract(shortcode_atts(array(
	      'term' => '',
	    ), $atts));

		

	    

		$gallery_style    = get_option('artistpress_gallery_settings');
		$shortcodeContent = '';
        
        

        if( $gallery_style['gallery_behavior'] == 'masonrylightbox' ) {
            $shortcodeContent .= '<div class="grid">';
            $shortcodeContent .= '<div class="grid-sizer"></div>';
        
        } else {
        	$shortcodeContent .= '<ul id="galleries" class="galleries">';
        
        } 
		
		
		$the_query = new WP_Query( 'post_type=artistpress-gallery&artistpress-album=' . $term );

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();


				// Cache the variables that are set by query
				$galleryID              = get_the_ID();
				$galleryTitle           = get_the_title();
				$galleryLink            = get_the_permalink();
				$galleryThumbnail       = wp_get_attachment_image_src( get_post_thumbnail_id( $galleryID ), 'artistpress-square' );
				$galleryImageMasonry    = wp_get_attachment_image_src( get_post_thumbnail_id( $galleryID ), 'artistpress-full' );

            	if( $gallery_style['gallery_behavior'] == 'masonrylightbox' ) {
					$shortcodeContent .= '<a id="gallery-'. $galleryID. '" href="' . $galleryLink . '" class="grid-item">';
					$shortcodeContent .= '<img src="' . $galleryImageMasonry[0] .'">';
					$shortcodeContent .= '<div class="overlay"></div>';
					$shortcodeContent .= '<div class="content">';
					if( $gallery_style['gallery_show_image_title'] == 'yes'){
                            $shortcodeContent .= '<span>' . $galleryTitle . '</span>';
                        }
					$shortcodeContent .= '</div>';
					$shortcodeContent .= '</a>';
		            
		        
		        } else {
					$shortcodeContent .= '<a id="gallery-' . $galleryID .'" class="gallery" href="' . $galleryLink . '">';
					$shortcodeContent .= '<img src="' . $galleryThumbnail[0] .'">';
					$shortcodeContent .= '<div class="content">';
					if( $gallery_style['gallery_show_image_title'] == 'yes'){
                            $shortcodeContent .= '<span>' . $galleryTitle . '</span>';
                        }
					$shortcodeContent .= '</div>';
					$shortcodeContent .= '<div class="clear"></div>';
					$shortcodeContent .= '</a>';
		        
		        }
			}
			wp_reset_postdata();
		
		} else {
			$shortcodeContent  = 'Sorry, No Galleries Have Been Created.';
		
		}

		if( $gallery_style['gallery_behavior'] == 'masonrylightbox' ) {
            $shortcodeContent .= '</div>';
        
        } else {
        	$shortcodeContent .= '</ul>';

        }
		
		return $shortcodeContent;
	
	}