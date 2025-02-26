<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$table_name_cities = $wpdb->prefix . 'shipping_coordinadora_cities';
$table_name_vendes_facil = $wpdb->prefix . 'coordinadora_vendes_facil';
$sql = "DROP TABLE IF EXISTS $table_name_cities";
$wpdb->query($sql);
$sql = "DROP TABLE IF EXISTS $table_name_vendes_facil";
$wpdb->query($sql);
delete_option('shipping_vendesfacil_wc_svwc_version');