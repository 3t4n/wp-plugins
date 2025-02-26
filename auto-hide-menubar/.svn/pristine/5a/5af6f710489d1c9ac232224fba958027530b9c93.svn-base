<?php
/*
Plugin Name: Auto-Hide Menubar
Plugin URI: http://www.punkfish.com
Description: Auto-hide the WordPress admin menubar when viewing your website.
Version: 1.0.1
Author: Punkfish Studio
Author URI: http://www.punkfish.com/
License: GPL2

Copyright (C) 2011 Punkfish Studio.

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

define('PUNKFISH_AUTOHIDE_MENUBAR_PLUGINNAME','Auto-Hide Menubar');
define('PUNKFISH_AUTOHIDE_MENUBAR_FILE',__FILE__);
define('PUNKFISH_AUTOHIDE_MENUBAR_PATH',dirname(__FILE__));

include(PUNKFISH_AUTOHIDE_MENUBAR_PATH.'/punkfish.autohide_menubar.php');

$options = array(
	'default' => 'punkfish_autohide_menubar_settings_default'
);

$Punkfish_AutoHide_Menubar = new Punkfish_AutoHide_Menubar(PUNKFISH_AUTOHIDE_MENUBAR_PATH,PUNKFISH_AUTOHIDE_MENUBAR_FILE,PUNKFISH_AUTOHIDE_MENUBAR_PLUGINNAME,$options);

?>