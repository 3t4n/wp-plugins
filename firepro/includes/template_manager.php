<?php

function FirePro_Templates(){

  // ******************************************
  // -- Get Require Statements ----------------
  // ******************************************
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

  // ******************************************
  // -- Create Table In Database --------------
  // ******************************************
  function create_FirePro_Table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    //* Create the table
    $table_name = $wpdb->prefix . 'firepro';
    $sql = "CREATE TABLE $table_name (
      template_id INTEGER NOT NULL AUTO_INCREMENT,
      template_name MEDIUMTEXT NOT NULL,
      template_image MEDIUMTEXT NOT NULL,
      template_data MEDIUMTEXT NOT NULL,
      PRIMARY KEY (template_id)
    ) $charset_collate;";
    maybe_create_table( $table_name, $sql );
  }
  create_FirePro_Table();


  // ******************************************
  // -- API Action Options --------------------
  // ******************************************
  // Setup Get Variables
  $name   = sanitize_textarea_field( $_GET['name'] );
  $image  = sanitize_textarea_field( $_GET['image'] );
  $data   = sanitize_textarea_field( $_GET['data'] );
  $action = sanitize_textarea_field( $_GET['action'] );
  if(isset($_POST['name'])){ $name = sanitize_textarea_field( $_POST['name'] ); }
  if(isset($_POST['image'])){ $image = sanitize_textarea_field( $_POST['image'] ); }
  if(isset($_POST['data'])){ $data = sanitize_textarea_field( $_POST['data'] ); }
  if(isset($_POST['action'])){ $action = sanitize_textarea_field( $_POST['action'] ); }

  // Get All user Templates
  function getTemplates(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'firepro';
    $sql = "SELECT template_name FROM ".$table_name;
    $results = $wpdb->get_results($sql);
    return json_encode($results);
  }
  if($action == "getTemplates"){
    echo getTemplates();
    die();
  }

  // Get Template Data
  function getTemplateImage($name){
    global $wpdb;
    $table_name = $wpdb->prefix . 'firepro';
    $results = $wpdb->get_results("SELECT * FROM ".$table_name." WHERE template_name = '".$name."'");
    if($results[0] == null){
      return "";
    }else{
      return $results[0]->template_image;
    }
  }
  if($action == "getTemplateImage"){
    echo getTemplateImage($name);
    die();
  }

  // Get Template Data
  function getTemplateData($name){
    global $wpdb;
    $table_name = $wpdb->prefix . 'firepro';
    $results = $wpdb->get_results("SELECT * FROM ".$table_name." WHERE template_name = '".$name."'");
    if($results[0] == null){
      return "{}";
    }else{
      return stripslashes($results[0]->template_data);
    }
  }
  if($action == "getTemplateData"){
    echo getTemplateData($name);
    die();
  }

  // Get Template Data (returns -1 if none)
  function getTemplateID($name){
    global $wpdb;
    $table_name = $wpdb->prefix . 'firepro';
    $results = $wpdb->get_results("SELECT * FROM ".$table_name." WHERE template_name = '".$name."'");
    if($results[0] == null){
      return -1;
    }else{
      return $results[0]->template_id;
    }
  }
  if($action == "getTemplateID"){
    echo getTemplateID($name);
    die();
  }

  // Update Template Data
  function updateTemplate($name, $image, $data){
    $template_id = getTemplateID($name);
    global $wpdb;
    $table_name = $wpdb->prefix . 'firepro';
    if($template_id == -1){
      // This is a new template
      // $sql = "INSERT INTO ".$table_name." (template_name,template_image,template_data) VALUES ('".$name."','".$image."','".$data."')";
      // $results = $wpdb->query($sql);
      $results = $wpdb->query( $wpdb->prepare( "INSERT INTO ".$table_name." (template_name,template_image,template_data) VALUES ('%s','%s','%s')", $name, $image, $data ) );
      return $results;
    }else{
      // This template exists
      // $sql = "UPDATE ".$table_name." SET template_name = '".$name."', template_image = '".$image."', template_data = '".$data."' WHERE template_id = '".$template_id."'";
      // $results = $wpdb->query($sql);
      $results = $wpdb->query( $wpdb->prepare( "UPDATE ".$table_name." SET template_name = '%s', template_image = '%s', template_data = '%s' WHERE template_id = '%s'", $name, $image, $data, $template_id ) );
      return $results;
    }
  }
  if($action == "updateTemplate"){
    updateTemplate($name, $image, $data);
    die();
  }



}
?>
