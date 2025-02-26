<?php

/*
Plugin Name: Another Wordpress Tracker Plugin
Plugin URI: http://wp.uberdose.com/2007/01/27/another-wordpress-tracker-plugin/
Description: Lets you easily insert your own visitor tracking code. Supports Google Analytics.
Version: 1.1
Author: uberdose
Author URI: http://wp.uberdose.com/
*/

/* Copyright (C) 2007 Dirk Zimmermann (wordpress AT uberdose DOT com)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA */
 
 class Another_WordPress_Tracker_Plugin {
 	
 	var $version = "1.1";

	function admin_menu() {
		add_submenu_page('options-general.php', __('Another Wordpress Tracker Plugin'), __('AWTP'), 5, __FILE__, array($this, 'plugin_menu'));
	}
	
	function wp_footer() {
		echo "\n<!-- awtp $this->version start -->\n";
		echo stripcslashes(get_option('awtp_tracking_code'));
		echo "\n<!-- awtp $this->version end -->\n";
	}
	
	function plugin_menu() {
		$message = null;
		$message_updated = __("Tracking-Code updated.");
		
		// update options
		if ($_POST['awtp_tracking_code']) {
			$message = $message_updated;
			update_option('awtp_tracking_code', $_POST['awtp_tracking_code']);
			wp_cache_flush();
		}

?>
<?php if ($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<div id="dropmessage" class="updated" style="display:none;"></div>
<div class="wrap">
<h2><?php _e('Another Wordpress Tracker Plugin Options'); ?></h2>
<p><?php _e('For feedback, help etc. please click <a title="Homepage for AWTP" href="http://wordpress.uberdose.com/wordpress/another_wordpress_tracker_plugin.php.html">here.</a>') ?></p>
<p><?php _e('Tracking code to appear in your footer (just before the end of your body):') ?></p>
<form name="dofollow" action="" method="post">
<table>
<tr><th scope="row" style="text-align:right; vertical-align:top;"><?php _e('Tracking-Code:')?></td>
<td>
<textarea cols="80" rows="10" name="awtp_tracking_code"><?php echo stripcslashes(get_option('awtp_tracking_code')); ?></textarea></td></tr>
</table>
<p class="submit">
<input type="hidden" name="action" value="update" /> 
<input type="submit" name="Submit" value="<?php _e('Update Options')?> &raquo;" /> 
</p>
</form>
</div>
<?php
	
	} // plugin_menu

} // Another_WordPress_Tracker_Plugin

$_awtp_plugin = new Another_WordPress_Tracker_Plugin();

add_option("awtp_tracking_code", null, __('Another Wordpress Tracker Plugin Tracker Code'), 'yes');
add_action('admin_menu', array($_awtp_plugin, 'admin_menu'));
add_action('wp_footer', array($_awtp_plugin, 'wp_footer'));

?>
