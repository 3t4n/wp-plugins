<?php

/**
	* Plugin Name: Anti-block
	* Plugin URI: http://www.bukssaayman.co.za/antiblock
	* Description: Display message to visitor that they're using ad blocking software.
	* Version: 1.0.6
	* Author: Buks Saayman
	* Author URI: http://www.bukssaayman.co.za
	* License: GPL2
	*/
/* Copyright 2014 Buks Saayman (email : buks@bukssaayman.co.za)

	 This program is free software; you can redistribute it and/or modify
	 it under the terms of the GNU General Public License, version 2, as
	 published by the Free Software Foundation.

	 This program is distributed in the hope that it will be useful,
	 but WITHOUT ANY WARRANTY; without even the implied warranty of
	 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 GNU General Public License for more details.

	 You should have received a copy of the GNU General Public License
	 along with this program; if not, write to the Free Software
	 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/

include_once	dirname(__FILE__)	.	'/functions.php';
include_once	dirname(__FILE__)	.	'/classes/detection.php';
include_once	dirname(__FILE__)	.	'/classes/setup.php';
include_once	dirname(__FILE__)	.	'/classes/settings.php';

register_activation_hook(__FILE__,	array('anti_block_setup',	'on_activation'));
register_deactivation_hook(__FILE__,	array('anti_block_setup',	'on_deactivation'));
register_uninstall_hook(__FILE__,	array('anti_block_setup',	'on_uninstall'));

add_action('plugins_loaded',	array('anti_block_setup',	'init'));
add_action('wp_footer',	'anti_block_detect',	0);
add_action('admin_notices',	'anti_block_admin_notices');
add_action('init',	'anti_block_start_session',	1);

function	anti_block_detect()	{
				$detect_ad_block	=	new	detect_ad_block();

				if	(!empty($_POST['ab_stop_nagging']))	{
								$detect_ad_block->mark_as_read();
				}	else	{
								$detect_ad_block->detect();
				}
}
