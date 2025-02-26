<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

function BRAVOSP__uninstall(){

//we delete table
global $wpdb;
$sql="DROP TABLE `".DB_NAME."`.`".$wpdb->base_prefix."bravo_sp`";
$wpdb->query($sql);
//we delete the option
delete_option( "BRAVOSP_notice");
}

register_uninstall_hook(BRAVOSP_FILE,"BRAVOSP__uninstall");

?>