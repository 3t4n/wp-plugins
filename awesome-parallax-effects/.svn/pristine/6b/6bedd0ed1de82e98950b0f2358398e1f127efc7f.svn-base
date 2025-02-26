<?php
/*
   Plugin Name: Awesome Parallax Effects
   Plugin URI: https://www.arlencode.com
   description: This plugin use to adds parallax animations on any images/videos. The prallax effect is directly applied to image or video tags and their containers.
   Version: 1.0.0
   Author: Saiarlen
   Author URI: http://www.saiarlen.com
   License: GPL v2 or later
   License URI:       https://www.gnu.org/licenses/gpl-2.0.html
   Text Domain:       arlen-awesome-parallax
   Domain Path:       languages
   */
   /*
   Awesome Parallax Effects is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 2 of the License, or
   any later version.

   Awesome Parallax Effects is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with Awesome Parallax Effects. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
   */

defined('ABSPATH') || exit;

require_once plugin_dir_path( __FILE__ ) . 'inc/paths.php';
/**
 * Main class
 */
class AlmsAwpSetup
{
	public function __construct()
	{
		require_once plugin_dir_path( __FILE__ ) . 'inc/almsinit.php';
	}
	
}

if(class_exists('AlmsAwpSetup'))
{
	$alms_class = new AlmsAwpSetup();
}

if(class_exists('AlmsAwpBootup')){
	 new AlmsAwpBootup();
}

