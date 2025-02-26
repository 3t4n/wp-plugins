<?php
/**
Plugin Name: Aramba
Plugin URI: http://www.aramba.ru
Description: Integrate the blog with Aramba
Version: 1.0.2
Author: Vendosoft
Author URI: http://www.aramba.ru/

Copyright (c) 2015.  Vendosoft.  (email: mail@aramba.ru)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/


require_once(plugin_dir_path(__FILE__).'classes/ArambaActivation.php');
require_once(plugin_dir_path(__FILE__).'classes/ArambaImport.php');
require_once(plugin_dir_path(__FILE__).'classes/ArambaApi.php');

register_activation_hook(__FILE__, array('ArambaActivation', 'activatePlugin'));
register_deactivation_hook(__FILE__, array('ArambaActivation', 'deactivatePlugin'));

load_plugin_textdomain('aramba',  false, basename( dirname( __FILE__ ) ) . '/languages');

add_action('admin_menu', array('ArambaActivation', 'addMenuPages'));

?>