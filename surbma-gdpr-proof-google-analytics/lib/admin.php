<?php

include_once( SURBMA_GPGA_PLUGIN_DIR . '/admin/surbma-admin.php');
include_once( SURBMA_GPGA_PLUGIN_DIR . '/pages/settings.php');
include_once( SURBMA_GPGA_PLUGIN_DIR . '/pages/social.php');
include_once( SURBMA_GPGA_PLUGIN_DIR . '/pages/cookies.php');
include_once( SURBMA_GPGA_PLUGIN_DIR . '/pages/documentation.php');

/* Admin options menu */
function surbma_gpga_add_menus() {
	global $surbma_gpga_settings_page;
	$surbma_gpga_settings_page = add_menu_page(
		__( 'Surbma | GDPR', 'surbma-gdpr-proof-google-analytics' ),
		__( 'Surbma | GDPR', 'surbma-gdpr-proof-google-analytics' ),
		'manage_options',
		'surbma-gpga-menu',
		'surbma_gpga_settings_page',
		'dashicons-shield'
	);
	$surbma_gpga_settings_page = add_submenu_page(
		'surbma-gpga-menu',
		__( 'Settings', 'surbma-gdpr-proof-google-analytics' ),
		__( 'Settings', 'surbma-gdpr-proof-google-analytics' ),
		'manage_options',
		'surbma-gpga-menu',
		'surbma_gpga_settings_page'
	);
	global $surbma_gpga_social_page;
	$surbma_gpga_social_page = add_submenu_page(
		'surbma-gpga-menu',
		__( 'Social Integration', 'surbma-gdpr-proof-google-analytics' ),
		__( 'Social Integration', 'surbma-gdpr-proof-google-analytics' ),
		'manage_options',
		'surbma-gpga-social-menu',
		'surbma_gpga_social_page'
	);
	global $surbma_gpga_cookies_page;
	$surbma_gpga_cookies_page = add_submenu_page(
		'surbma-gpga-menu',
		__( 'Cookie Scan', 'surbma-gdpr-proof-google-analytics' ),
		__( 'Cookie Scan', 'surbma-gdpr-proof-google-analytics' ),
		'read',
		'surbma-gpga-cookies-menu',
		'surbma_gpga_cookies_page'
	);
	global $surbma_gpga_documentation_page;
	$surbma_gpga_documentation_page = add_submenu_page(
		'surbma-gpga-menu',
		__( 'Documentation', 'surbma-gdpr-proof-google-analytics' ),
		__( 'Documentation', 'surbma-gdpr-proof-google-analytics' ),
		'read',
		'surbma-gpga-documentation-menu',
		'surbma_gpga_documentation_page'
	);
}
add_action( 'admin_menu', 'surbma_gpga_add_menus' );

function surbma_gpga_admin_notices() {
	// Notification if user is activated the license, but still use the free version
	global $surbma_gpga_fs;
	if( SURBMA_GPGA_PLUGIN_VERSION == 'free' && SURBMA_GPGA_PLUGIN_LICENSE == 'valid' ) {
		echo '<div class="notice notice-error">' . __('<p><strong>IMPORTANT!</strong> You have a valid license for Surbma | GDPR Proof Cookie Consent & Notice Bar plugin, but still using the FREE version.</p><p>You have to download the PREMIUM version from the <a href="' . $surbma_gpga_fs->get_account_url() . '">GDPR Proof Cookies -> Account</a> menu and activate it. Please also delete the FREE version of the plugin!</p>') . '</div>';
	}

	// Notification if user is using the premium version, but didn't delete the free version
	$freePluginFile = ABSPATH . 'wp-content/plugins/surbma-gdpr-proof-google-analytics/surbma-gdpr-proof-google-analytics.php';
	if( SURBMA_GPGA_PLUGIN_VERSION == 'premium' && file_exists( $freePluginFile ) ) {
		echo '<div class="notice notice-error">' . __('<p><strong>IMPORTANT!</strong> Please delete the FREE version of the Surbma | GDPR Proof Cookie Consent & Notice Bar plugin!</p><p>Go to <a href="' . admin_url() . 'plugins.php">Plugins</a> menu and search for the Surbma | GDPR Proof Cookie Consent & Notice Bar plugin. Delete the FREE version and you are done.</p>') . '</div>';
	}
}
add_action( 'admin_notices', 'surbma_gpga_admin_notices' );
