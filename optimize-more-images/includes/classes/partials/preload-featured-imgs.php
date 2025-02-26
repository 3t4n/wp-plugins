<?php

if (!defined('WPINC')) {
    die;
}

/**
 * forked & modified from Jackson Lewis codes in
 * How to preload images in WordPress
 * https://dev.to/jacksonlewis/how-to-preload-images-in-wordpress-48di
 */

class PreloadFreaturedImages {
		
 	public function __construct() {
			
 		if( !is_admin() ){

			add_action('wp_head', [$this, 'preload_featured_images'], 0);
			/**/
			add_action('template_redirect', function () {
				ob_start(function ($content) {
                 	return $this->nolazy_for_featured_image($content);
                });
            });
			
		}
		
 	}
 	
 	public function preload_featured_images() {
    
	    global $post;
	    
	   /** disable on 404 page */
	    if ( is_404() ) {
	        return;
	    }
		
		 if ( in_array('woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            if ( is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() ) {
				return;
			}
        }
	    
	    /** Adjust image size based on post type or other factor. */
	    $image_size = 'full';
	
	    if ( is_singular( 'product' ) ) {
	        $image_size = 'woocommerce_single';
	
	    } else if ( is_singular( 'post' ) ) {
	        $image_size = 'full';
	    }
		
	    $image_size = apply_filters( 'preload_featured_images_image_size', $image_size, $post );
		
	    /** Get post thumbnail if an attachment ID isn't specified. */
	    $thumbnail_id = apply_filters( 'preload_featured_images_id', get_post_thumbnail_id( $post->ID ), $post );
	
	    /** Get the image */
	    $image = wp_get_attachment_image_src( $thumbnail_id, $image_size );
	    $src = '';
	
	    if ( $image ) {
	        list( $src, $width, $height ) = $image;
	
	        /**
	         * The following code which generates the srcset is plucked straight
	         * out of wp_get_attachment_image() for consistency as it's important
	         * that the output matches otherwise the preloading could become ineffective.
	         */
	        $image_meta = wp_get_attachment_metadata( $thumbnail_id );
	
	        if ( is_array( $image_meta ) ) {
	            $size_array = array( absint( $width ), absint( $height ) );
	            $srcset     = wp_calculate_image_srcset( $size_array, $src, $image_meta, $thumbnail_id );
	            $sizes      = wp_calculate_image_sizes( $size_array, $src, $image_meta, $thumbnail_id );        
	        }
			
	    } else {
	        /** Early exit if no image is found. */
	        return;
	    }
	    
	    $preload_tag = '<link rel="preload" as="image" href="%s">'. PHP_EOL;
		
	    // front-page
	    if ( opm_img_field_setting('preload_featured_img_front_page') ) {
            if ( is_front_page() ) {
    			printf( $preload_tag, esc_url( $src ) );
    		}
        }
        
        // pages except front page
        if ( opm_img_field_setting('preload_featured_img_pages') ) {
            if ( is_page() && !is_front_page() ) {
    			printf( $preload_tag, esc_url( $src ) );
    		}
        }
        
        // single post
        if ( opm_img_field_setting('preload_featured_img_single_post') ) {
            if ( is_singular( 'post' ) ) {
    			printf( $preload_tag, esc_url( $src ) );
    		}
        }
        
        /* woocommeece pages */
        
        if ( !in_array('woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            return;
        }
        
        // single product pages
        if ( opm_img_field_setting('preload_featured_img_product_pages') ) {
            if ( is_product() ) {
    			printf( $preload_tag, esc_url( $src ) );
    		}
        }
	    
	}
	
	public function nolazy_for_featured_image($content) {
		
		if ( is_user_logged_in() ) {
			return $content;
		}
		
		 if ( in_array('woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            if ( is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() ) {
				return $content;
			}
        }
		
		global $post;
		
		$image_size = 'full';
	
	    if ( is_singular( 'product' ) ) {
	        $image_size = 'woocommerce_single';
	
	    } else if ( is_singular( 'post' ) ) {
	        $image_size = 'full';
	    }
		
	    $image_size = apply_filters( 'preload_featured_images_image_size', $image_size, $post );
		
	    /** Get post thumbnail if an attachment ID isn't specified. */
	    $thumbnail_id = apply_filters( 'preload_featured_images_id', get_post_thumbnail_id( $post->ID ), $post );
	
	    /** Get the image */
	    $image = wp_get_attachment_image_src( $thumbnail_id, $image_size );
	    $src = '';

		if ( !$image ) {
			return $content;
		}
	
	    if ( $image ) {
	        list( $src, $width, $height ) = $image;
	    } else {
	        return;
	    }
		
		$src = str_replace("/", "\/", $src);
		$pattern = "/<img[^>]*src=(.*?)(.*$src)(.*?)>/i";
		
		$matches = array();
		preg_match_all( $pattern, $content, $matches );
		
		$search = array();
		$replace = array();
		
		$nolazy = 'no-lazy';

		foreach ( $matches[0] as $imgNotLazy ) {

        	if ( preg_match( '/class=["\']/is', $imgNotLazy ) ) {
				$replaceImgNoLazy = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class="'.esc_html($nolazy).' $2$1', $imgNotLazy );
			} else {
				$replaceImgNoLazy = preg_replace( '/<img/is', '<img class="'.esc_html($nolazy).'"', $imgNotLazy );
			}
			
			array_push( $search, $imgNotLazy );
			array_push( $replace, $replaceImgNoLazy );
    
		}
		
		$search = array_unique( $search );
		$replace = array_unique( $replace );
		
		// front-page
	    if ( opm_img_field_setting('preload_featured_img_front_page') ) {
            if ( is_front_page() ) {
				$content = str_replace( $search, $replace, $content );
			}
		}
		
		// pages except front page
        if ( opm_img_field_setting('preload_featured_img_pages') ) {
            if ( is_page() && !is_front_page() ) {
    			$content = str_replace( $search, $replace, $content );
    		}
        }
		
		// single post
		if ( opm_img_field_setting('preload_featured_img_single_post') ) {
			if ( is_singular( 'post' ) ) {
				$content = str_replace( $search, $replace, $content );
			}
		}
		
		 /* woocommeece pages */
        
        if ( !in_array('woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            return $content;
        }
		
		// product page
		if ( opm_img_field_setting('preload_featured_img_product_pages') ) {
			if ( is_product() ) {
				$content = str_replace( $search, $replace, $content );
			}
		}
		
		return $content;
		
	}

		
} // end Class

new PreloadFreaturedImages();