<?php
/**
 * @package MyanmaPress Webfonts
 */
/*
Plugin Name: Ayar RSS
Plugin URI: http://webfont.myanmapress.com
Description: convert ayar font to zagyi in RSS.
Version: 1.0
Author: Sithu Thwin
Author URI: http://www.thwin.net/
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
if(defined('ARSS_VERSION')) return;
define('ARSS_VERSION', '1.0');
define('ARSS_PLUGIN_PATH', dirname(__FILE__));
define('ARSS_PLUGIN_FOLDER', basename(ARSS_PLUGIN_PATH));

if(defined('WP_ADMIN') && defined('FORCE_SSL_ADMIN') && FORCE_SSL_ADMIN){
    define('ARSS_PLUGIN_URL', rtrim(str_replace('http://','https://',get_option('siteurl')),'/') . '/'. PLUGINDIR . '/' . basename(dirname(__FILE__)) );
}else{
    define('ARSS_PLUGIN_URL', rtrim(get_option('siteurl'),'/') . '/'. PLUGINDIR . '/' . basename(dirname(__FILE__)) );
}

/*Language loader*/
if (function_exists('load_plugin_textdomain')) {
        load_plugin_textdomain( 'ARSS', false, ARSS_PLUGIN_FOLDER . '/languages');
}
include (ARSS_PLUGIN_PATH.'/includes/functions.php');
