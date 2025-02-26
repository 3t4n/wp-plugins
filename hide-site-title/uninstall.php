<?php
/**
 * @author Bill Minozzi
 * @copyright 2024 01 31
 */
// If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}
$hide_site_title_options = array(
    'hide_site_title_id',
    'hide_site_title_class',
    'hide_site_title_hide_title'
);
foreach ($hide_site_title_options as $option_name => $option_value) {
    if (is_multisite()) {
        delete_site_option($option_name);
    } else {
        delete_option($option_name);
    }
}

$plugin_name = 'bill-catch-errors.php'; // Name of the plugin file to be removed

// Retrieve all must-use plugins
$wp_mu_plugins = get_mu_plugins();


// MU-Plugins directory
$mu_plugins_dir = WPMU_PLUGIN_DIR;

if (isset($wp_mu_plugins[$plugin_name])) {
    // Get the plugin's destination path
    $destination = $mu_plugins_dir . '/' . $plugin_name;

    // Attempt to remove the plugin
    if (!unlink($destination)) {
        // Log the error if the file could not be deleted
        error_log("Error removing the plugin file from the MU-Plugins directory: $destination");
    } else {
        // Optionally, log success if the plugin is removed successfully
        // error_log("Successfully removed the plugin file: $destination");
    }
}
?>