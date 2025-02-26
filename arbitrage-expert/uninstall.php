<?php

if( !defined('WP_UNINSTALL_PLUGIN') ) exit;

global $wpdb;
$query = "DROP TABLE IF EXISTS `arb_exp_iframe`";
$wpdb->query($query);

global $wpdb;
$query = "DROP TABLE IF EXISTS `arb_exp_default`";
$wpdb->query($query);