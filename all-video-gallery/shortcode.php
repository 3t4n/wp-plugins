<?php

require_once('site/player.php');
require_once('site/gallery.php');

/******************************************************************
/* User Function
******************************************************************/
function allvideogallery_plugin_shortcode( $atts ) {
	 $profileid  = $atts['profile'];
	 $videoid    = isset( $atts['video'] )      ? $atts['video']      : '';
	 $catid      = isset( $atts['category'] )   ? $atts['category']   : '';
	 $sort       = isset( $atts['sort'] )       ? $atts['sort']       : '';
	 $count      = isset( $atts['count'] )      ? $atts['count']      : '';
	 $autodetect = isset( $atts['autodetect'] ) ? $atts['autodetect'] : 1;
	 $output     = '';
	 
	 if($videoid) {
	 	$player = new Player();
	 	$output = $player->buildPlayer( $profileid, $videoid, $autodetect );
	 } else {
	 	if(isset($_GET['slg'])) {
	 		$player  = new Player();	
	 		$output .= $player->buildPlayer( $profileid, $videoid, $autodetect );
	 	}	 
	 	$gallery = new Gallery();
		$output .= $gallery->buildGallery( $profileid, $catid, $sort, $count);
	 }
	
	 return $output;
}

add_shortcode('allvideogallery', 'allvideogallery_plugin_shortcode');

?>