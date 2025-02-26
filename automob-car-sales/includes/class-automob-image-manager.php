<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class AutomobImageManager{
	public function getThumbnail($image_url,$width,$height){
		$upload_dir = wp_upload_dir();
		$basedir = $upload_dir['basedir'];
		$baseurl = $upload_dir['baseurl'];

		$image_dir = $basedir.str_replace($baseurl,"",$image_url);
		$image_filename =  basename($image_dir);
		$ext = pathinfo($image_filename, PATHINFO_EXTENSION);
		$image_filename_no_ext = str_replace(".".$ext,"",$image_filename);

		$size_prefix = "-".$width.'x'.$height;
		$thumb_path = str_replace($image_filename,"",$image_dir).$image_filename_no_ext.$size_prefix.'.'.$ext;
		$file_path = str_replace($image_filename,"",$image_dir).$image_filename_no_ext.'.'.$ext;

		$thumb_path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $thumb_path);
		$file_path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR,$file_path);
		
		if (file_exists($thumb_path)){
			// print_r('already exists');
			return $this->pathtourl($thumb_path);
		}else{
			return $this->pathtourl($this->cropImage($file_path,$thumb_path,$width,$height)) ;	
		}
		
	}

	private function pathtourl($path){
		$upload_dir = wp_upload_dir();
		$basedir = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $upload_dir['basedir']);
		$baseurl = $upload_dir['baseurl'];
		$dir= str_replace($basedir, "", $path);
		$url = $baseurl.str_replace(array('/', '\\'), '/', $dir);
		return $url;
	}

    private function cropImage($src_path,$output_path,$thumb_width,$thumb_height){

      if(exif_imagetype($src_path) != IMAGETYPE_JPEG){
           $src_image = imagecreatefrompng($src_path);
      }else{
           $src_image = imagecreatefromjpeg($src_path);
      }

      if (file_exists($output_path)){
          if (!unlink($output_path))
            {
               // $this->log("Error deleting", 'debug');
               die();
            }
      }

      $width = imagesx($src_image);
      $height = imagesy($src_image);

      $original_aspect = $width / $height;
      $thumb_aspect = $thumb_width / $thumb_height;

      if ( $original_aspect >= $thumb_aspect )
      {
         // If image is wider than thumbnail (in aspect ratio sense)
         $new_height = $thumb_height;
         $new_width = $width / ($height / $thumb_height);
      }
      else
      {
         // If the thumbnail is wider than the image
         $new_width = $thumb_width;
         $new_height = $height / ($width / $thumb_width);
      }

      $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );


     if(exif_imagetype($src_path) != IMAGETYPE_JPEG){
         // integer representation of the color black (rgb: 0,0,0)
        $background = imagecolorallocate($thumb, 0, 0, 0);
        // removing the black from the placeholder
        imagecolortransparent($thumb, $background);

        // turning off alpha blending (to ensure alpha channel information
        // is preserved, rather than removed (blending with the rest of the
        // image in the form of black))
        imagealphablending($thumb, false);

        // turning on alpha channel information saving (to ensure the full range
        // of transparency is preserved)
        imagesavealpha($thumb, true);
     }
      // Resize and crop
      imagecopyresampled($thumb,
                         $src_image,
                         0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                         0, // Center the image vertically
                         0, 0,
                         $new_width, $new_height,
                         $width, $height);

     if(exif_imagetype($src_path) != IMAGETYPE_JPEG){
         imagepng($thumb, $output_path, 9);
     }else{
         imagejpeg($thumb, $output_path, 100);
     }
     return $output_path;
     // print_r();die();

}	
}