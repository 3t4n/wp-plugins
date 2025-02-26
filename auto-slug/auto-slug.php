<?php

/*
Plugin Name: Auto-slug
Plugin URI: http://num8er.me/wordpress-plugins/auto-slug.zip
Description: Generate the post permalink while typing the title
Author: num8er
Author URI: https://www.linkedin.com/in/num8er
Version: 1.0
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Auto-slug is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Auto-slug is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Auto-slug. If not, see http://www.gnu.org/licenses/gpl-2.0.html
*/

function autoslug_enqueueJS($hook) {
    if( 'post.php' != $hook && 'post-new.php' != $hook )
        return;
    wp_enqueue_script('autoslug', plugin_dir_url(__FILE__) . '/auto-slug.js');
}
add_action('admin_enqueue_scripts', 'autoslug_enqueueJS');
