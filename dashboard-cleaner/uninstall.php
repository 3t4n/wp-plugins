<?php
/*
 +=====================================================================+
 |     ____            _     _                         _               |
 |    |  _ \  __ _ ___| |__ | |__   ___   __ _ _ __ __| |              |
 |    | | | |/ _` / __| '_ \| '_ \ / _ \ / _` | '__/ _` |              |
 |    | |_| | (_| \__ \ | | | |_) | (_) | (_| | | | (_| |              |
 |    |____/ \__,_|___/_| |_|_.__/ \___/ \__,_|_|  \__,_|              |
 |      ____ _                                                         |
 |     / ___| | ___  __ _ _ __   ___ _ __                              |
 |    | |   | |/ _ \/ _` | '_ \ / _ \ '__|                             |
 |    | |___| |  __/ (_| | | | |  __/ |                                |
 |     \____|_|\___|\__,_|_| |_|\___|_|                                |
 |                                                                     |
 | (c) Jerome Bruandet ~ https://nintechnet.com/bruandet/              |
 +=====================================================================+
*/

if (! defined('WP_UNINSTALL_PLUGIN') ) {
	exit( "Not allowed" );
}

/* ================================================================== */

// Uninstall DHCL

$ud = wp_get_upload_dir();
$path = "{$ud['basedir']}/dashboard-cleaner";
$dhcl_options = get_option( 'dhcl_options' );

// Unlink all file from the configuration folder:
if (! empty( $dhcl_options['user_filters'] ) && is_dir( $path ) ) {
	$glob = glob( $path . "/dhcl_*");
	if ( is_array( $glob ) ) {
		foreach( $glob as $file ) {
			unlink( $file );
		}
	}
	unlink( "{$path}/index.html" );
	unlink( "{$path}/.htaccess" );
	rmdir( $path );
}
// Delete options from the database:
if ( is_multisite() ) {
	delete_site_option( 'dhcl_options' );
}
delete_option( 'dhcl_options' );

/* ================================================================== */
// EOF
