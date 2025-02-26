<?php
/**
Plugin Name: Mail365
Plugin URI: http://www.mail365.ru
Description: Integrate the blog with Mail365
Version: 1.0.2
Author: Vendosoft
Author URI: http://www.mail365.ru/

Copyright (c) 2015.  Vendosoft.  (email: mail@mail365.ru)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/


require_once(plugin_dir_path(__FILE__).'classes/Mail365Activation.php');
require_once(plugin_dir_path(__FILE__).'classes/Mail365Import.php');
require_once(plugin_dir_path(__FILE__).'classes/Mail365Api.php');

register_activation_hook(__FILE__, array('Mail365Activation', 'activatePlugin'));
register_deactivation_hook(__FILE__, array('Mail365Activation', 'deactivatePlugin'));

load_plugin_textdomain('mail365',  false, basename( dirname( __FILE__ ) ) . '/languages');

add_action('admin_menu', array('Mail365Activation', 'addMenuPages'));

?>