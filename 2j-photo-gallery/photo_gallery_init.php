<?php
/*
*      2J Photo Gallery
*      Version: 1.0.9
*      By 2JTeam
*      Contact: http://2joomla.net
*      Licensed under the GPLv3 license - https://opensource.org/licenses/gpl-3.0.html
*      Copyright (c) 201, 2JTeam. All rights reserved.
*/


if ( ! defined( 'WPINC' ) )  die;
if ( ! defined( 'ABSPATH' ) ) exit;

class Class_Photo_Gallery_2J_Activator {
	
	public $version = false;

	public static function start() { 
			add_option( 'twoj_photo_gallery_BeforeActivator', 'start' ); 
	}

	public static function end() {
			delete_option('twoj_photo_gallery_BeforeActivator');
	}

}
