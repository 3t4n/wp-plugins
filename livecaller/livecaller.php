<?php
/**
 * Plugin Name: LiveCaller
 * Description: LiveCaller Widget
 * Version: 1.0
 * Author: LiveCaller
 * Author URI: https://livecaller.io/
 */

require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if ( is_admin() ) {
    require_once dirname( __FILE__ ) . '/plugin_files/LiveCallerAdmin.class.php';
    (new \LiveCaller\LiveCallerAdmin);
} else {
    require_once dirname( __FILE__ ) . '/plugin_files/LiveCaller.class.php';
    (new \LiveCaller\LiveCaller);
}

