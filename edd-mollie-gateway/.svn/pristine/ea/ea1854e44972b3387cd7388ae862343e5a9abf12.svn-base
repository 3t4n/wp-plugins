<?php
/**
 * Backwards compatibility for main plugin filename (maintaining activation after update)
 *
 *
 * @since 3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$active_plugins = get_option( 'active_plugins', array() );
foreach ( $active_plugins as $key => $active_plugin ) {
	if ( strpos($active_plugin, basename( plugin_dir_path( __FILE__ ) ) ) === 0 ) {
		$active_plugins[ $key ] = str_replace( basename( __FILE__ ), 'edd-mollie-gateway.php', $active_plugin );
		update_option( 'active_plugins', $active_plugins );
	}
}
if ( is_multisite() ) {
	$edd_mollie_plugin_slug = trailingslashit( basename( plugin_dir_path( __FILE__ ) ) ) . basename( __FILE__ );
	$active_sitewide_plugins = get_site_option( 'active_sitewide_plugins' );
	if ( isset( $active_sitewide_plugins[ $edd_mollie_plugin_slug ] ) ) {
		$new_mollie_plugin_slug =str_replace( basename( __FILE__ ), 'edd-mollie-gateway.php', $edd_mollie_plugin_slug );
		$active_sitewide_plugins[ $new_mollie_plugin_slug ] = $active_sitewide_plugins[ $edd_mollie_plugin_slug ];
		unset( $active_sitewide_plugins[ $edd_mollie_plugin_slug ] );
		update_site_option( 'active_sitewide_plugins', $active_sitewide_plugins );
	}
}
