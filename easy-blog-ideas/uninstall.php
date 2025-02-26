<?php

//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

defined("PIG_PLUGIN_SLUG__") || define("PIG_PLUGIN_SLUG__", "__pig_");

$opts   = wp_load_alloptions();
foreach($opts as $key=>$value){
    if(strpos($key, PIG_PLUGIN_SLUG__) === 0) delete_option($key);
}