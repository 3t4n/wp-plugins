<?php

function define_plugin_settings_link($links, $file) {

	$plugin = plugin_basename(get_FILE());
 	$plugin_option_page = 'admin_classic_borders_optionspage';

	// create link
	if ($file == $plugin) {
		return array_merge(
			$links,
			array(  '<span style="color:red;">'.__('This plugin requires either the MP6 plugin or WordPress 3.8 or higher. You have neither.').'</span>' )
		);
	}

	return $links;
}
add_filter( 'plugin_row_meta', 'define_plugin_settings_link', 10, 2 );