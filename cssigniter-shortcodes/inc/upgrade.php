<?php
//
// Handle upgrades
//
add_action( 'init', 'ci_shortcodes_maybe_upgrade' );
function ci_shortcodes_maybe_upgrade() {
	$ci_shortcodes_installed_version = get_option( CI_SHORTCODES_PLUGIN_INSTALLED );

	if ( empty( $ci_shortcodes_installed_version ) ) {
		$defaults = ci_shortcodes_get_default_settings();
		update_option( CI_SHORTCODES_PLUGIN_OPTIONS, $defaults );
		update_option( CI_SHORTCODES_PLUGIN_INSTALLED, CI_SHORTCODES_VERSION );
	} elseif ( CI_SHORTCODES_VERSION !== $ci_shortcodes_installed_version ) {
		_ci_shortcodes_do_upgrade( $ci_shortcodes_installed_version );
	}
}

function _ci_shortcodes_do_upgrade( $version ) {
	$version = _ci_shortcodes_upgrade_to_2_0( $version );

	// Always run this step last, so that we store the latest plugin's version.
	update_option( CI_SHORTCODES_PLUGIN_INSTALLED, CI_SHORTCODES_VERSION );
}

function _ci_shortcodes_upgrade_to_2_0( $version ) {
	if ( version_compare( $version, '1.2', '<=' ) ) {
		$opts = get_option( CI_SHORTCODES_PLUGIN_OPTIONS );
		if ( isset( $opts['theme'] ) ) {
			unset( $opts['theme'] );
		}
		if ( isset( $opts['only_single_css'] ) ) {
			unset( $opts['only_single_css'] );
		}
		$opts['headings_default_level'] = '2';
		$opts['google_maps_api_enable'] = 'enabled';
		$opts['google_maps_api_key']    = '';

		update_option( CI_SHORTCODES_PLUGIN_OPTIONS, $opts );

		return '2.0';
	} else {
		return $version;
	}
}
