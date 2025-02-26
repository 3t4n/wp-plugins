<?php
/*
Plugin Name: admin-css
Plugin URI: http://wordpress.org/extend/plugins/admin-css/
Description: Manage back-end admin panel design style by a single css file and overwrite existing css.
Author: Md. Jamal Hossain Khan
Version: 1.0
Author URI: http://www.krishe.com/

	Copyright 2010 Md. Jamal Hossain Khan (email : jamal_khanbd@yahoo.com)
 
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

function print_admin_css()
{?>

<link rel="stylesheet" href="<?php echo (bloginfo("wpurl").'/'.PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/css/admin.css" type="text/css" media="screen" />'."\n"); 
}


add_action('admin_head','print_admin_css');
?>