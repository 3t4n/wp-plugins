<?php
/*
Plugin Name: Pages before Posts
Description: Puts Pages before Posts in the admin menu
Plugin URI: http://www.greenvilleweb.us
Author: Rew Rixom @ Greenville Web
Author URI: http://greenvilleweb.us
Version: 2.0
License: GPL2
Text Domain: pbp
Domain Path:
*/

/*
  Copyright (C) 2014  Rew Rixom  (email : rew@rixom.org)

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

add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'pbp_custom_menu_order' );

/*
  learn more about this here:
    http://codex.wordpress.org/Plugin_API/Filter_Reference/custom_menu_order
    https://developer.wordpress.org/reference/hooks/menu_order/
*/

function pbp_custom_menu_order($menu_ord) {
    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
    );

}
