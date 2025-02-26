<?php

/*
Plugin Name: Best Facebook Like Button PluginURI: http://wordpress.org/plugins/order-taxonomies
Description: Add the new Facebook Like button and Facebook Recommendations widget to your wordpress blog.
Version: 5.9.7.2
Author: Henry Machari

License: GPL2

Translation and Fonts for the like button developed and added by Anty (mail@anty.at) http://anty.at

Copyright 2010  Facebook Like Button  (email : funsk292@gmail.com)

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

require_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/local.inc.php");
require_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/admin.inc.php");
require_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/filters.php");
require_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/buttons.inc.php");
require_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/fun.inc.php");
require_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/options.inc.php");
require_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/update_options.inc.php");
require_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/upgrade.inc.php");
include_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/rec_page.php");
include_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/rec_widget.php");
include_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/rec_wid_layout.php");
include_once(ABSPATH . "wp-content/plugins/order-taxonomies/inc/disable_pages.php");

function FB_Admin_Box()
{
    add_menu_page('Facebook Like', 'Facebook Like', 8, basename(__file__), '' , plugins_url('icon.png',__FILE__));
    add_submenu_page(basename(__file__), 'Like Button Settings', 'Like Button', 8, basename(__file__),
        "FB_Admin_Cont");

}

add_option("fblikes_locale", "default");

add_option("fblikes_font", "");
add_action('admin_menu', 'FB_Admin_Box');
add_action('admin_menu', 'Add_Rec_Admin');
add_filter('the_content', 'Add_Like_Button');

add_shortcode('fb_like', 'Short_Button');
add_shortcode('fb_count', 'Count_Button');
add_shortcode('fb_box_count', 'fb_box_count');

add_shortcode('fb_rec', array('Widget_Layout', 'Layout'));

add_action('wp_head', 'Add_Site_Name');
add_action('dbx_page_advanced', 'Add_Pages_meta_box' );
add_action( 'admin_init', 'fb_like_admin_init' );
?>