<?php
/*
Plugin Name: Sharpen Resized Images
Plugin URI: https://wordpress.org/plugins/sharpen-resized-images/
Description: This plugin sharpening resized jpg image uploads in your WordPress. No settings required.
Author: Ünsal Korkmaz
Author URI: https://firmasite.com
Version: 2.1.3
License: GPL v3

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/ 

/*
filter usage for GD:
	add_filter('sharpen_resized_corner',function(){ return -1.2; });
	add_filter('sharpen_resized_side',function(){ return -1; });
	add_filter('sharpen_resized_center',function(){ return 20; });
*/

/*
filter usage for progressive jpg:
	add_filter('sharpen_resized_progressive_jpg',function(){ return false; });
*/	

add_filter('image_make_intermediate_size', 'ajx_sharpen_resized_files',900);
function ajx_sharpen_resized_files( $resized_file ) {
	
	$progressive_jpg = apply_filters('sharpen_resized_progressive_jpg', true);

	$size = @getimagesize( $resized_file );
	if ( !$size )
		return new WP_Error('invalid_image', __('Could not read image size'), $file);
	list($orig_w, $orig_h, $orig_type) = $size;

	switch ( $orig_type ) {
		case IMAGETYPE_JPEG:
			switch ( _wp_image_editor_choose() ) {

				case "WP_Image_Editor_Imagick":
				
					$image = new Imagick( $resized_file );
					
					$image->unsharpMaskImage(0, 0.5 , 1, 0.05);

					$image->setImageCompression(Imagick::COMPRESSION_JPEG); 
					$image->setImageCompressionQuality(apply_filters( 'jpeg_quality', 90, 'edit_image' )); 

					//$image->stripImage(); 
					
					if($progressive_jpg) $image->setInterlaceScheme(Imagick::INTERLACE_PLANE); // Progressive JPEG on
					
					$image->writeImage( $resized_file ); // Create Image
					
					$image->clear();
					$image->destroy();					
					
					break;
				
				case "WP_Image_Editor_GD":
				default:
					$image = imagecreatefromstring( file_get_contents( $resized_file ) );

					$matrix = array(
						array(apply_filters('sharpen_resized_corner',-1.2), apply_filters('sharpen_resized_side',-1), apply_filters('sharpen_resized_corner',-1.2)),
						array(apply_filters('sharpen_resized_side',-1), apply_filters('sharpen_resized_center',20), apply_filters('sharpen_resized_side',-1)),
						array(apply_filters('sharpen_resized_corner',-1.2), apply_filters('sharpen_resized_side',-1), apply_filters('sharpen_resized_corner',-1.2)),
					);

					$divisor = array_sum(array_map('array_sum', $matrix));
					$offset = 0;
					// Sharpen Image
					imageconvolution($image, $matrix, $divisor, $offset);
					// Progressive JPEG on
					if($progressive_jpg) imageinterlace($image, true); 
					// Create Image
					imagejpeg($image, $resized_file,apply_filters( 'jpeg_quality', 90, 'edit_image' ));

					// we don't need images in memory anymore
					imagedestroy( $image );
					
			}
			break;
		case IMAGETYPE_PNG:
			break;
		case IMAGETYPE_GIF:
			break;
	}	

	return $resized_file;
}	

