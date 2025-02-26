<?php
/**
* Version:     1.0.0
* Author:      Keivan Kamali
* copyright :  © 2024 Keivan Kamali all rights reserved
*/
if(!defined('ABSPATH')) exit();

function wb3d_get_media_vscrollslider($F,$t,$url){

	$x[0]=explode($url,$F["img_".$t])[1];
	$x[1]=explode($url,$F["img2_".$t])[1];
	return $x;
}

?>