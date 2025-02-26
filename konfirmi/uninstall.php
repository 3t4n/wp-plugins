<?php
/**
 * Delete Plugin
 * 
 * @package KonfirmiPlugin
 */

if ( ! defined('WP_UNINSTALL_PLUGIN') ) {
    die;
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Clear Database stored data
Konfirmi\Base\Uninstall::uninstall();
/**
 * global $wpdb
 * $wpdb->query("DELETE FROM ...");
 */