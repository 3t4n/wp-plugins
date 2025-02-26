<?php
/**
 * @link       http://www.alivestats.com
 * @since      1.0.0
 * @author	   Nimish Gupta
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option('live-nimlinks');
delete_option( 'live_BorderRadius');
delete_option( 'live_Width');
delete_option( 'live_BackgroundColor');
delete_option( 'live_BorderColor');
delete_option( 'live_TextColor');
delete_option( 'live_OnlineSize');
delete_option( 'live_CounterValuesSize');
delete_option( 'live_CounterHeadingSize');
delete_option( 'live_Line');
delete_option( 'live_Recent');

function remove_LiveTracker_widget() {
	unregister_widget('LiveTracker');
}

add_action( 'widgets_init', 'remove_LiveTracker_widget' );

/******* The end.  ********/