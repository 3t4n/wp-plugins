<?php
/*
Plugin Name: EXIF Filter
Plugin URI: http://weblog.sinteur.com/#
Description: Add exif info to pictures.
Version: 1.0
Author: John Sinteur
Author URI: http://weblog.sinteur.com
*/ 
include('exifer/exif.php');

function rewrite_exif($picture) {

	$the_file= str_replace("<!--EXIF:", "", $picture);
	$the_file= str_replace("-->", "", $the_file);
	
	$exifInfo = "";
	$exif_array = read_exif_data_raw($the_file,0);

//echo "<PRE>"; 
//print_r($exif_array); 
//echo "</PRE>"; 


		$exifInfo = 'Camera: '.$exif_array['IFD0']['Model'].' | '.'Aperture: '.$exif_array['SubIFD']['FNumber'];
		$exifInfo .= '<BR>Shutter: '.$exif_array['SubIFD']['ExposureTime'].' | '.'Focal Length: '.$exif_array['SubIFD']['FocalLength'];
		$exifInfo .= '<BR>Date: '.$exif_array['SubIFD']['DateTimedigitized'];

	return $exifInfo;

}

function exif_filter($text) {


	if (  preg_match_all("/<!--EXIF:.*-->/", $text, $my_matches) ) {
		for ($i=0; $i< count($my_matches[0]); $i++) {

			$text = preg_replace("|".$my_matches[$i][0]."|",rewrite_exif($my_matches[$i][0]),$text);

		}


	} 
	return $text;
		
}



// Highlight text and comments:
add_filter( 'the_content','exif_filter');

?>