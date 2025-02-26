<?php
//if uninstall not called from WordPress - exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

function is_gtpm_pro_installed() {
	if ( !function_exists('get_plugins') ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}
	$installed = false;

	$plugins = array_keys(get_plugins());

	foreach ($plugins as $plugin) {
		if ( $plugin == 'gt-push-menu/gt-push-menu.php' ) {
			$installed = true;
			break;
		}
	}

	return $installed;
}
// if we are in lite mode and there's no pro plugin installed and active - delete options
if ( !is_gtpm_pro_installed() ) :
delete_option('gtpm_options');
delete_option('gtpm_version');
delete_option('GTPM_DOING_UPDATE');

endif;
