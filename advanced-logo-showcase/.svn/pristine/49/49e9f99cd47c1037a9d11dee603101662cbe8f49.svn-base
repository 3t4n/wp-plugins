<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	///////////////////METABOXES//////////////////////////////////

	// change thumbnail box from side on top
	add_action( 'do_meta_boxes', 'itls_logo_image_box' );
	function itls_logo_image_box() {
		remove_meta_box( 'postimagediv', ITLS_Custom_Post, 'side' );
		add_meta_box( 'postimagediv',
			__( 'Logo Image' ,ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
			'post_thumbnail_meta_box',
			ITLS_Custom_Post,
			'normal',
			'high' );
	}

	// Custom fields
	if(!function_exists('itls_logo_showcase_add_metabox')){
		function itls_logo_showcase_add_metabox() {
			add_meta_box(  
				'itls_logo_showcase_metaboxname', // $id
				__('Logo Details',ITLS_LOGO_SHOWCASE_TEXTDOMAIN), // $title
				'itls_logo_showcase_metaboxname', // $callback
				ITLS_Custom_Post, // $page
				'normal', // $context  
				'default');
				
		}  
		add_action('add_meta_boxes', 'itls_logo_showcase_add_metabox');
	}
	///////////////////END METABOXES//////////////////////////////////
	
	
	///////////////////LIST OF FILDS VARIABLES//////////////////////////////////
		
	include  'customfields-fields-variables.php';
	
	///////////////////END LIST OF FIELDS VARIABLES/////////////////////////////

	
	/////////////////SHOW CUSTOM FIELD////////////////////////
	
	include  'customfields-fields-functions.php';	
	
	/////////////////END SHOW CUSTOM FIELD////////////////////
	
	
?>