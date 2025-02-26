<?php
/*
Plugin Name: Aspose Cloud Email to Post
Plugin URI: http://cloud.aspose.com
Description: Aspose Cloud Email to Post extracts contents from the Email Body and insert it into the editor.
Version: 1.0
Author: aspose.cloud Marketplace
Author URI: https://www.aspose.cloud/

*/

#### INSTALLATION PROCESS ####
/*
1. Download the plugin and extract it
2. Upload the directory '/Aspose-Cloud-Email-To-Post/' to the '/wp-content/plugins/' directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Click on 'Aspose Cloud Email to Post' link under Settings menu to access the admin section
*/

add_filter('plugin_action_links', 'APCEmailToPostPluginLinks', 10, 2);

/**
 * Create the settings link for this plugin
 * @param $links array
 * @param $file string
 * @return $links array
 */
function APCEmailToPostPluginLinks($links, $file) {
     static $this_plugin;

     if (!$this_plugin) {
		$this_plugin = plugin_basename(__FILE__);
     }

     if ($file == $this_plugin) {
		$settings_link = '<a href="' . admin_url('options-general.php?page=AsposeCloudEmailToPostAdminMenu') . '">' . __('Settings', 'Aspose-Cloud-Email-To-Postr') . '</a>';
		array_unshift($links, $settings_link);
     }

     return $links;
}

register_activation_hook(__FILE__, 'SetOptionsAPCEmailToPost');

/**
 * Basic options function for the plugin settings
 * @param no-param
 * @return void
 */
function SetOptionsAPCEmailToPost() {

     // Adding options for the like post plugin
//     add_option('wti_like_post_drop_settings_table', '0', '', 'yes');

}

/**
 * For dropping the table and removing options
 * @param no-param
 * @return no-return
 */
function UnsetOptionsAPCEmailToPost() {
    // Deleting the added options on plugin uninstall
    delete_option('wti_like_post_drop_settings_table');
}

register_uninstall_hook(__FILE__, 'UnsetOptionsAPCEmailToPost');

function APCEmailToPostAdminRegisterSettings() {
     // Registering the settings

     register_setting('aspose_cloud_email_to_post_options', 'aspose_email_to_post_app_sid');
     register_setting('aspose_cloud_email_to_post_options', 'aspose_email_to_post_app_key');

}

add_action('admin_init', 'APCEmailToPostAdminRegisterSettings');


if (is_admin()) {
	// Include the file for loading plugin settings
	require_once('aspose-cloud-email-to-post-admin.php');
}

