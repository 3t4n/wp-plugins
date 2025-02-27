<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option('rssnews_rss1');
delete_option('rssnews_direction1');
delete_option('rssnews_rss2');
delete_option('rssnews_direction2');
delete_option('rssnews_rss3');
delete_option('rssnews_direction3');
delete_option('rssnews_rss4');
delete_option('rssnews_direction4');
delete_option('rssnews_rss5');
delete_option('rssnews_direction5');
 
// for site options in Multisite
delete_site_option('rssnews_rss1');
delete_site_option('rssnews_direction1');
delete_site_option('rssnews_rss2');
delete_site_option('rssnews_direction2');
delete_site_option('rssnews_rss3');
delete_site_option('rssnews_direction3');
delete_site_option('rssnews_rss4');
delete_site_option('rssnews_direction4');
delete_site_option('rssnews_rss5');
delete_site_option('rssnews_direction5');