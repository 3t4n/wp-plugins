<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}
/* Remove settings option */
delete_option( 'wl_agm_settings_data' );
