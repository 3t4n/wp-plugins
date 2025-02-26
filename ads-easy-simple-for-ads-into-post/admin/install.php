<?php
/*Functions to Install Ads Plugin on WordPress*/
function meta_install () {
   global $wpdb;
/*Creating a Database and Table with the Prefix "METAAPP_ADS" for this Plugin Ads while installing Ads*/
   $table_name = $wpdb->prefix . "METAAPP_ADS"; 
  global $wpdb;
$sql = "CREATE TABLE $table_name (
  METAAPP_AD_ID mediumint(9) NOT NULL AUTO_INCREMENT,
 METAAPP_AD_NAME VARCHAR(500) NOT NULL UNIQUE,
 METAAPP_AD_CODE VARCHAR(10000) NOT NULL,
 METAAPP_AD_STYLE VARCHAR(20) NOT NULL,
  UNIQUE KEY id (METAAPP_AD_ID)
);";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
}

function METAAPP_install(){
    meta_install ();
}
?>