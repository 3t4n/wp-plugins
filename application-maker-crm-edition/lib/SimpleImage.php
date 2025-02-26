<?php
/*
* File: SimpleImage.php
* Author: Simon Jarvis
* Copyright: 2006 Simon Jarvis
* Date: 08/11/06
* Link: http://www.white-hat-web-design.co.uk/articles/php-image-resizing.php
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details:
* http://www.gnu.org/licenses/gpl.html
*
*/

class SimpleImage {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getHeight() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToSquareLimit($width,$height) {
	     if( $this->getWidth() > $this->getHeight() ){
	      		$ratio = $width / $this->getWidth();
	     		 $height_test = $this->getHeight() * $ratio;
			 if($height_test>$height){
			    	  $ratio = $height / $this->getHeight();
			      	$width_test = $this->getWidth() * $ratio;
				$this->resizeToWidth($width_test) ;
			 } else{
			 	 $this->resizeToHeight($height_test) ;
			 }
	     } else  {
		    	  $ratio = $height / $this->getHeight();
		      	$width_test = $this->getWidth() * $ratio;
			 if($width_test>$width){
			    	$ratio = $width / $this->getWidth();
	     			 $height_test = $this->getHeight() * $ratio;
			 	 $this->resizeToHeight($height_test) ;
			 } else{
				$this->resizeToWidth($width_test) ;
			 }
	     }
   }
   
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getHeight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
  function resize_crop($exact_width,$exact_height,$position) {

	   $width = $this->getWidth();
	   $height = $this->getHeight();
	
	   $x_ratio = $exact_width / $width;
	   $y_ratio = $exact_height / $height;
	
	 
	     if( $width> $height){ //horizontal
	     	$src_height=$height;
	     	$src_width=$exact_width/$y_ratio;
	     } else {
	     	$src_height=$exact_height/$x_ratio;
	     	$src_width=$width;
	     }
	 
	      $new_image = imagecreatetruecolor($exact_width, $exact_height);
	      if($position=='crop:center'){
	      		$y_src=($height-$src_height)/2;
	      		$x_src=($width-$src_width)/2;
			$y_dst=0;
			$x_dst=0;
	      		imagecopyresampled($new_image, $this->image, $x_dst, $y_dst, $x_src, $y_src, $exact_width, $exact_height, $src_width, $src_height);
	      } else {
	      		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $exact_width, $exact_height, $src_width, $src_height);
	      }
	      $this->image = $new_image;
	
	
   }
}

?>