<?php
if (defined('DB_NAME')) {
	function byrev_show_ajax_gallery() {
	  if ( have_posts() ) {
	  query_posts( 'p='._REQ_POST_ID );
	    while ( have_posts() ) {
	      the_post();
			$preg = '/(.?)\[(gallery)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\2\])?(.?)/s';       
			if ( preg_match_all($preg, get_the_content(), $gallery_match) ) {			   
			   $index_gallery = _REQ_GALLERY_INSTANCE-1;

			   if (!isset($gallery_match[0][$index_gallery])) {
				$index_gallery = 0;
			   }
			   
			   if (isset($gallery_match[0][$index_gallery])) {
			       echo do_shortcode( $gallery_match[0][$index_gallery] );			
			        #~~~~ reload jQuery Gallery Plugins 					  
					reload_jquery();			       	     	  
					#~~~~	         
			   } else {
			   	  echo '<code>Error: Requested page <b>'.$index_gallery.'</b> is outside the index</code>';
			   }
			  // echo '<pre>';print_r($_REQUEST); echo '</pre>';
			}
	    }
	  }
	  
	  die();
	}
	
	function post_ajax_activate ( ) {
	  if ( isset( $_REQUEST["ajaxgal"] ) ) {
	  	define('_AJAX_GALLERY_INSTANCE', (int)$_REQUEST["ajaxgal"] );
	    add_action( 'wp', 'byrev_show_ajax_gallery' );
	  }
	}

	add_action('init', 'post_ajax_activate');
} else {
	header("HTTP/1.0 403 Forbidden"); // 403 error!
	die('403 ERROR: Access denied'); 
}
?>