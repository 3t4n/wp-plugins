<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
$table_name = $wpdb->prefix . 'my_servers';
$wpdb->query("DROP TABLE IF EXISTS $table_name");	
?>