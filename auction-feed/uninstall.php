<?php
/**
 * Uninstall script
 *
 * @package Disable_Comments
 */

if ( ! defined( 'ABSPATH' ) && ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
  exit;
}

global $wpdb; 

$wpdb->query(
  $wpdb->prepare("DELETE FROM $wpdb->options WHERE option_name = 'auction_feed_data' OR option_name = 'auction_feed_count'")
);

delete_site_option('auction-feed');