<?php

function vkrwps_ct() {

   global $wpdb;

   $table_name = $wpdb->prefix . "vkrwps_categories";

   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

      $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      cat_name VARCHAR(55) NOT NULL,
      PRIMARY KEY id (id)
        );";

       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       dbDelta( $sql );  
   }
      
}

function vkrwps_pt() {

   global $wpdb;

   $table_name = $wpdb->prefix . "vkrwps_products";

      $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      cat_id INT(3) NOT NULL,
      name VARCHAR(40) NOT NULL,
      sku VARCHAR(6) NOT NULL,
      description TEXT,
      long_description TEXT,
      price VARCHAR(100) NOT NULL,
      shipping FLOAT,
      weight FLOAT,
      in_stock VARCHAR(3) NOT NULL,
      PRIMARY KEY id (id)
        );";

       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       dbDelta( $sql );
      
}

function vkrwps_oidt() {
   // $cv = get_option('vkrwps_pt_tbl');
   // if ($cv == 'set') return;

   global $wpdb;

   $table_name = $wpdb->prefix . "vkrwps_orderid";

   // if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

      $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      flag mediumint(9) NOT NULL,
      PRIMARY KEY id (id)
        );";

       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       dbDelta( $sql );
   // } 
      
}

function vkrwps_oidt_i_d() {
   global $wpdb;

   $table_name = $wpdb->prefix . "vkrwps_orderid";

   $wpdb->insert( 
      $table_name, 
      array( 
          'flag' => 1
      ), 
      array( 
          '%d'
      ) 
    ); // end insert
      
}

function vkrwps_oit() {
   // $cv = get_option('vkrwps_cit_tbl');
   // if ($cv == 'set') return;

   global $wpdb;

   $table_name = $wpdb->prefix . "vkrwps_order_info";

   // if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

      $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      orderid mediumint(9) NOT NULL,
      order_status VARCHAR(10) NOT NULL,
      name VARCHAR(40) NOT NULL,
      middle_name VARCHAR(40) NULL,
      lastname VARCHAR(40) NOT NULL,
      email VARCHAR(100) NOT NULL,
      address1 VARCHAR(100) NOT NULL,
      address2 VARCHAR(100) NULL,
      city VARCHAR(100) NOT NULL,
      zip VARCHAR(9) NOT NULL,
      country VARCHAR(100) NOT NULL,
      state VARCHAR(100) NULL,
      phone VARCHAR(100) NULL,
      mobile VARCHAR(100) NULL,
      fax VARCHAR(100) NULL,
      rpt VARCHAR(255) NOT NULL,
      ordernotes TEXT NULL,
      total VARCHAR(11) NOT NULL,
      ordercontent TEXT NOT NULL,
      orderdate VARCHAR(100) NOT NULL,
      payment_option VARCHAR(100) NOT NULL,
      PRIMARY KEY id (id)
        );";

       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       dbDelta( $sql );
   // } 
      
}

function vkrwps_pot() {
   global $wpdb;

   $table_name = $wpdb->prefix . "vkrwps_payment_options";

   // if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

      $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      title VARCHAR(40) NOT NULL,
      description VARCHAR(40),
      id_name VARCHAR(40) NOT NULL,
      active INT(1) NOT NULL,
      PRIMARY KEY id (id)
        );";

       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       dbDelta( $sql );
   // } 
      
}

function vkrwps_pot_i_d() {
    global $wpdb;

    $table_name = $wpdb->prefix . "vkrwps_payment_options";

    // check paypal option
    $get_po_pp = $wpdb->get_results( 
      "
      SELECT id_name
      FROM wp_vkrwps_payment_options
      WHERE id_name='paypal'
      "
    );

    if ( ! $get_po_pp ) {

      $wpdb->insert( 
        $table_name, 
        array( 
            'title' => 'paypal', 
            'description' => '',
            'id_name' => 'paypal',
            'active' => 0
        ), 
        array( 
            '%s', 
            '%s',
            '%s',
            '%d'
        ) 
      ); // end insert
    }

}

function vkrwps_pet() {
   global $wpdb;

   $table_name = $wpdb->prefix . "vkrwps_paypal";

   // if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

      $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      email VARCHAR(100) NOT NULL,
      ppid VARCHAR(7),
      PRIMARY KEY id (id)
        );";

       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       dbDelta( $sql );
   // } 
      
}

function vkrwps_pet_i_d() {
   global $wpdb;

   $table_name = $wpdb->prefix . "vkrwps_paypal";

    // check paypal option
    $get_ppid = $wpdb->get_results( 
      "
      SELECT ppid
      FROM wp_vkrwps_paypal
      WHERE ppid='iexist'
      "
    );

    if ( ! $get_ppid ) {

       $wpdb->insert( 
          $table_name, 
          array( 
              'email' => 'someone@somewhere.com',
              'ppid' => 'iexist'
          ), 
          array( 
              '%s'
          ) 
        ); 

    }
      
} 



?>