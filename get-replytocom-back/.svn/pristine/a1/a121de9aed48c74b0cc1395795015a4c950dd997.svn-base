<?php
/*
Plugin Name:	Get replytocom Back
Plugin URI:		https://www.likeflamingo.com/services/web-and-social/get-replytocom-back-wordpress-plugin/
Description:	Fix 'reply to' issues caused by the Yoast SEO plugin (v7.0.2+) automatically disabling replytocom
Version:		1.0.0
Author:			Like Flamingo
Author URI:		https://www.likeflamingo.com
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

   add_filter( 'wpseo_remove_reply_to_com', '__return_false' );
?>