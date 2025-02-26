<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option('deal_or_announcement_with_countdown_timer_title');
delete_option('deal_or_announcement_with_countdown_timer_timer_color');
delete_option('deal_or_announcement_with_countdown_timer_timer_align');
delete_option('deal_or_announcement_with_countdown_timer_text_color');
delete_option('deal_or_announcement_with_countdown_timer_text_align');
delete_option('deal_or_announcement_with_countdown_timer_caption');
 
// for site options in Multisite
delete_site_option('deal_or_announcement_with_countdown_timer_title');
delete_site_option('deal_or_announcement_with_countdown_timer_timer_color');
delete_site_option('deal_or_announcement_with_countdown_timer_timer_align');
delete_site_option('deal_or_announcement_with_countdown_timer_text_color');
delete_site_option('deal_or_announcement_with_countdown_timer_text_align');
delete_site_option('deal_or_announcement_with_countdown_timer_caption');

global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}gCountdown");