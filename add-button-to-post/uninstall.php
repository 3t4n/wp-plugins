<?php
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit ();

delete_option( 'add_cbutton_facebook' );
delete_option( 'add_cbutton_twitter' );
delete_option( 'add_cbutton_hatena' );
delete_option( 'add_cbutton_googlebk' );
delete_option( 'add_cbutton_feed' );
delete_option( 'add_cbutton_header' );
delete_option( 'add_cbutton_footer' );
?>