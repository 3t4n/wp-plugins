<?php
 if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');


// FUnction to Create Table When Plugin Activated 

    //Create Table  
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    $query = $wpdb->prepare( 'SHOW TABLES LIKE %s',Lucky_Draw_Database);

if ( ! $wpdb->get_var( $query ) == Lucky_Draw_Database ) {
    // go go
     $sql_query_to_create_table = "CREATE TABLE ".Lucky_Draw_Database." (
               CREATE TABLE `wp_lucky_draw` (
                    `id` int NOT NULL AUTO_INCREMENT,
                    `draw_type` text NOT NULL,
                    `img_url` text NOT NULL,
                    `draw_name` text NOT NULL,
                    `draw_desc` text NOT NULL,
                    `status` tinyint(1) NOT NULL,
                    `draw_create_date` timestamp NULL DEFAULT current_timestamp(),
                    `draw_date` date DEFAULT NULL,
                    `placement` text NOT NULL,
                    `sendmail` text NOT NULL,
                    `no_of_winners` int NOT NULL,
                    `prizes` text NOT NULL,
                    `box_style` text NOT NULL,
                    `winner_name` text NOT NULL,
                    `winner_email` text NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"; 
    
                dbDelta($sql_query_to_create_table);     

}

  //Create Table Lucky_Draw_Contestants 
    
  $query = $wpdb->prepare( 'SHOW TABLES LIKE %s',Lucky_Draw_Database2);

  if ( ! $wpdb->get_var( $query ) == Lucky_Draw_Database2) {
        $sql_query_to_create_table = "CREATE TABLE ".Lucky_Draw_Database2." ( 
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `contest_id` int(11) NOT NULL,
                    `contestants` text NOT NULL,
                    `contestant_name` text NOT NULL,
                    PRIMARY KEY (`id`)
                   
                   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"; 
       
                   dbDelta($sql_query_to_create_table);
  }





