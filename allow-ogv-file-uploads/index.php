<?php
	/*
	Plugin Name: Allow ogv File Uploads
	Plugin URI: https://www.slibdesign.com/allow-ogv-file-uploads-wordpress-plugin/
	description: Allow .ogv file uploads to the media library
	Version: 4.0
	Author: Slibdesign
	Author URI: https://www.slibdesign.com
	License: GPLv2 or later
	*/

	function slibdesign_ogv_types_addition($existing_mimes = array()) {   
			$existing_mimes['ogx'] = 'application/ogg';
			$existing_mimes['ogv'] = 'video/ogg';
			return $existing_mimes; 
	}
	add_filter( 'upload_mimes', 'slibdesign_ogv_types_addition' );
?>