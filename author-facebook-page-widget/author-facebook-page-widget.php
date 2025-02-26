<?php
/*
  Plugin Name: Author Facebook Page Widget
  Plugin URI: http://www.psdtohtmlcloud.com/author-facebook-page-widget
  Description: Author Facebook Page Widget is simple and easy to use wordpress plugin to show facebook page feed in your website sidebar. Flexible with lot's of option to enable or disable fb cover photo, call to action button, show friends facepile and most interesting, you can allow your authors to show their page feed on their posts. It will boost their performance and interest in your blog.
  Version: 1.0
  Author: <a href="http://www.psdtohtmlcloud.com/psd-to-wordpress">PSD TO HTML CLOUD</a>
  Author URI: http://www.psdtohtmlcloud.com/psd-to-wordpress
  Text Domain: simple-category-posts-widget
  License: GPLv3

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 3 of the License, or
  any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., PSDtoHTMLCloud, 342 Pocket B, Sector 1,Rohini, New Delhi,Delhi 110085

  Copyright 2016-2017  Vaibhav Arora  (email : vaibhav@psdtohtmlcloud.com)
*/

define("AFPW_PLUGIN_SLUG",'author-facebook-page-widget');
define("AFPW_PLUGIN_VERSION", 1.0);
define("AFPW_PLUGIN_URL",plugins_url("",__FILE__)); #without trailing slash (/)
define("AFPW_PLUGIN_PATH",plugin_dir_path(__FILE__)); #with trailing slash (/)
define("AFPW_REVIEW_URL",'https://wordpress.org/support/plugin/author-facebook-page-widget/reviews/#new-post');
define("AFPW_FACEBOOK_PAGE_FEED_I18N", 'value');

register_activation_hook(__FILE__, 'afpw_activation');
function afpw_activation() {
	update_option('afpw_version', AFPW_PLUGIN_VERSION);
  update_option('afpw_fb_app_id', '124661207633391');
  update_option('afpw_enable_authors_fb_page', 'on');
	set_transient('afpw_hide_review_msg','1',(60 * 60 * 24 * 20));
	// update_option('afpw_display_review_msg','1');
}

register_deactivation_hook(__FILE__, 'afpw_deactivation');
function afpw_deactivation() {
	delete_option('afpw_version');
  delete_option( 'afpw_fb_app_id' );
  delete_option( 'afpw_enable_authors_fb_page' );
	delete_transient( 'afpw_hide_review_msg' );
	$users = get_users(array(
    	'meta_key'     => 'afpw_already_reviewed',
	));
	foreach($users as $user){
		delete_user_meta( $user->ID, 'afpw_already_reviewed');
	}
	// delete_option('afpw_display_review_msg');
}

require_once(AFPW_PLUGIN_PATH.'inc/admin-notice.php');
require_once(AFPW_PLUGIN_PATH.'inc/plugin-settings.php');
require_once(AFPW_PLUGIN_PATH.'inc/plugin-review.php');
require_once(AFPW_PLUGIN_PATH.'inc/author-options.php');
require_once(AFPW_PLUGIN_PATH.'inc/register-scripts.php');
require_once(AFPW_PLUGIN_PATH.'inc/widget.php');
require_once(AFPW_PLUGIN_PATH.'inc/shortcode.php');

//=================================== Settings Link ====================================
add_filter('plugin_action_links', 'afpw_plugin_action_links', 10, 2);

function afpw_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=afpw-settings">Settings</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}

//=================================== Finally display all notices or errors.===============
add_action('admin_notices', [AFPWAdminNotice::getInstance(), 'displayAdminNotice']);