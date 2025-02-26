<?php

if ( !defined('ABSPATH') ) exit;

/**
 * forked & modified from Specify Image Dimensions by Fact Maven
 * https://wordpress.org/plugins/specify-image-dimensions/
 */

class Image_Attr {
    
    public function __construct() {
        
        add_action('template_redirect', function () {
			ob_start(function ($content) {
				return $this->add_image_attr($content);
			});       
		});
		
    }
    
    public function add_image_attr($content) {
        
        if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
		    return $content;
		}
		$disable_img_dimension = apply_filters('disable_img_dimension', false);
		// Return early if preloading is disabled
		if ($disable_img_dimension) {
			return $content;
		}
		
		# Find all image tags
		preg_match_all( '/<img[^>]+>/i', $content, $images );
		# If there are no images, return
		if ( count( $images ) < 1 ) {
		    return $content;
		}

		foreach ( $images[0] as $image ) {
		    # Match all image attributes
		    $attributes = 'src|srcset|longdesc|alt|class|id|usemap|align|border|hspace|vspace|crossorigin|ismap|sizes|width|height';
		    preg_match_all( '/(' . $attributes . ')=("[^"]*")/i', $image, $img );
		    # If image has a 'src', continue
		    if ( ! in_array( 'src', $img[1] ) ) {
		        continue;
		    }
		    # If no 'width' or 'height' is available or blank, calculate dimensions
		    if ( ! in_array( 'width', $img[1] ) || ! in_array( 'height', $img[1] ) || ( in_array( 'width', $img[1] ) && in_array( '""', $img[2] ) ) || ( in_array( 'height', $img[1] ) && in_array( '""', $img[2] ) ) ) {
		        # Split up string of attributes into variables
		        $attributes = explode( '|', $attributes );
		        foreach ( $attributes as $variable ) {
					${$variable} = in_array( $variable, $img[1] ) ? ' ' . $variable . '=' . $img[2][array_search( $variable, $img[1] )] : '';
		        }
		        $src = $img[2][array_search( 'src', $img[1] )];
		        # If image is an SVG/WebP with no dimensions, set specific dimensions
		        if ( preg_match( '/(.*).svg|.webp/i', $src ) ) {
					if ( ! in_array( 'width', $img[1] ) || ! in_array( 'height', $img[1] ) || ( in_array( 'width', $img[1] ) && in_array( '""', $img[2] ) ) || ( in_array( 'height', $img[1] ) && in_array( '""', $img[2] ) ) ) {
					    $width = '100%';
					    $height = 'auto';
					}
		        }
		        # Else, get accurate width and height attributes
		        else {
					list( $width, $height ) = getimagesize( str_replace( "\"", "" , $src ) );
					
					if ( !$width && !$height ) {
						// get the fallback values from settings
						$optionWidth = !empty(get_option('opm_img_options')['img_attr_width']) ? get_option('opm_img_options')['img_attr_width'] : '';
						$optionHeight = !empty(get_option('opm_img_options')['img_attr_height']) ? get_option('opm_img_options')['img_attr_height'] : '';

						// Set the fallback values if the options are available
						if (!empty($optionWidth) && !empty($optionHeight)) {
							$width = $optionWidth;
							$height = $optionHeight;
						}
					}
		        }
		        # Recreate the image tag with dimensions set
		        $tag = sprintf( '<img src=%s%s%s%s%s%s%s%s%s%s%s%s%s%s width="%s" height="%s">', $src, $srcset, $longdesc, $alt, $class, $id, $usemap, $align, $border, $hspace, $vspace, $crossorigin, $ismap, $sizes, $width, $height );
		        $content = str_replace( $image, $tag, $content );
		    }
		}
		# Return all image with dimensions
		return $content;
		
    }
    
}

new Image_Attr();