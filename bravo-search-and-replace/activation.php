<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

function BRAVOSP__activation(){
//we set option
add_option( "BRAVOSP_notice",true);
//creation of table at database
global $wpdb;
if(!BRAVOSP_table_exists($wpdb->base_prefix."bravo_sp")){

$sql="CREATE TABLE `".DB_NAME."`.`".$wpdb->base_prefix."bravo_sp` ( `ID` INT NOT NULL AUTO_INCREMENT , `searchFor` TEXT NOT NULL , `replaceBy` TEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
$wpdb->query($sql);
}
}
register_activation_hook(BRAVOSP_FILE,"BRAVOSP__activation");

function BRAVOSP_table_exists($myTable)
{
    global $wpdb;
	$results = $wpdb->query("SHOW TABLES LIKE '{$myTable}'");
	if( $results->num_rows == 1 )
	{
	        return TRUE;
	}
	else
	{
	        return FALSE;
	}
}

?>