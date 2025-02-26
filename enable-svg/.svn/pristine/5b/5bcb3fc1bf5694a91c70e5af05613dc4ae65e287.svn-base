<?php
/*
Plugin Name: Enable SVG
Plugin URI: http://room34.com/
Description: No longer supported. Please deactivate and uninstall.
Version: 1.4.0
Author: Room 34 Creative Services, LLC
Author URI: http://room34.com/
License: GPL2
Text Domain: r34svg
*/

// Don't load directly
if (!defined('ABSPATH')) { exit; }


function r34svg_discontinued() {
	if (current_user_can('manage_options')) {
		?>
		<div class="notice notice-warning"><p><strong style="color: red;">IMPORTANT!</strong> The <strong>Enable SVG</strong> plugin is no longer supported. For future security, all functionality in the plugin has been removed. Please <a href="<?php echo admin_url('plugins.php?s=enable%20svg&plugin_status=all'); ?>">deactivate</a> and uninstall it.</p><p>You may wish to try <strong><a href="https://wordpress.org/plugins/safe-svg/" target="_blank">Safe SVG</a></strong> as a replacement.</p></div>
		<?php
	}
}
add_action('admin_notices', 'r34svg_discontinued');
