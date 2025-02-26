<?php

// function to create the DB / Options / Defaults              
function sarv_plugin_options_install() {

   global $wpdb;

   $your_db_name = $wpdb->prefix . 'sarvoptions'; 
 
   // create the ECPT metabox database table
   if($wpdb->get_var("show tables like '$your_db_name'") != $your_db_name) 
   {
      $sql = "CREATE TABLE ".$your_db_name." (name varchar(255),value longtext, PRIMARY KEY (name));";
 
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
   }
 
}

?>