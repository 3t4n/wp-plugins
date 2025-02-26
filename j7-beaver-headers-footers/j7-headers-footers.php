<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: J7 Beaver Header Footer Templates
Plugin URI: https://j7digital.com/plugins-downloads/
Description: Adds a panel to the Beaver Builder Theme Customizer to insert a Beaver Builder layout as a header/footer globally on each page.
Author: J7Digital
Author URI: https://profiles.wordpress.org/jatacid/
Text Domain: j7digital
Version: 3.05
Network: True
License: GPLv2 or later

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/


##########################################################################################
//Load Plugin
##########################################################################################
add_action ( 'init' , 'j7hft_load_init');


function j7hft_load_init() {


	if(j7hft_plugin_is_active('bbmplugin-header-footer-templates', 'bbmplugin-header-footer-templates')){
		add_action( 'admin_head', 'j7hft_no_bb_theme');
		return;
	}


	//checks for BB-plugin
	if ( class_exists( 'FLBuilder' ) && class_exists('FLCustomizer') )
	{
			//checks for BB-theme
		$theme = wp_get_theme();
		if ('Beaver Builder Theme' == $theme->name || 'Beaver Builder Theme' == $theme->parent_theme)
		{
			require_once 'plugin/j7-headers-footers-functions.php';
		}
		else
		{
			add_action( 'admin_head', 'j7hft_no_bb_theme');
		}
	}
	else
	{
		add_action( 'admin_head', 'j7hft_no_bb_theme');
	}


	add_filter( 'plugin_row_meta', 'j7hft_custom_plugin_row_meta', 10, 2 );

}



// Adds a link to support the Author
function j7hft_custom_plugin_row_meta( $links, $file ) {

	if ( strpos( $file, 'j7-headers-footers.php' ) !== false ) {
		$new_links = array(
			'donate' => '<a href="https://j7digital.com/clients/donations/" target="_blank">Support This Plugin!</a>'
		);

		$links = array_merge( $links, $new_links );
	}

	return $links;
}

// Deletes old updater settings from db
function j7hft_delete_legacy_settings()
{
		if ( ! current_user_can( 'activate_plugins' ) )
		{
			return;
		}
		delete_site_option('bbp_hft_license_key');
		delete_site_option('bbp_hft_license_status');
		delete_site_option('bbp_hft_license_status_info');
		delete_site_option('bbp_hft_license_authsite');
}


// Adds an alert to plugin page if Theme or Plugin is missing.
function j7hft_no_bb_theme()
{
	?>
	<script type="text/javascript">
		(function($) {
			jQuery(document).ready(function() {
				jQuery('.active[data-slug=j7-beaver-headers-footers] td.column-description.desc').append('<div style="background-color: #AB6868; color: #ffffff; padding: 5px 20px; font-weight: 900;">This Plugin Requires the Premium Beaver Builder Theme and Plugin to be the only enabled page builder.</div>');

				jQuery('.active[data-slug=bbplugin-header-footer-templates] td.column-description.desc').append('<div style="background-color: #AB6868; color: #ffffff; padding: 5px 20px; font-weight: 900;">This Plugin Is No Longer Needed. Please Deactivate and Uninstall.</div>');

			});
		})(jQuery);
	</script>
	<?php
}



// No class so just check if plugin is active.
function j7hft_plugin_is_active($plugin_var, $plugin_file) {
	return in_array( $plugin_var. '/' .$plugin_file. '.php', apply_filters( 'active_plugins', get_site_option( 'active_plugins',array() ) ) );
}