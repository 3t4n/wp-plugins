<?php
	if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit;
	if ( get_option( 'smfbvv-options' ) != false ) {
		delete_option( 'smfbvv-options' );
	}
?>
