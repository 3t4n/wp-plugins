<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option('FIFOXMLRSSFEED_Title');
delete_option('FIFOXMLRSSFEED_FadeWait');
delete_option('FIFOXMLRSSFEED_rss_0');
delete_option('FIFOXMLRSSFEED_rss_1');
delete_option('FIFOXMLRSSFEED_rss_2');
delete_option('FIFOXMLRSSFEED_rss_3');
 
// for site options in Multisite
delete_site_option('FIFOXMLRSSFEED_Title');
delete_site_option('FIFOXMLRSSFEED_FadeWait');
delete_site_option('FIFOXMLRSSFEED_rss_0');
delete_site_option('FIFOXMLRSSFEED_rss_1');
delete_site_option('FIFOXMLRSSFEED_rss_2');
delete_site_option('FIFOXMLRSSFEED_rss_3');