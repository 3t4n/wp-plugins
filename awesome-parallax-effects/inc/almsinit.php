<?php 

/**
* @package AlmsPlugin
* All plugin bootup functions 
*/


defined('ABSPATH') or die;


//Initial Class
class AlmsAwpBootup 
{

//Init 
 function __construct(){
 
 
  add_action( 'wp_enqueue_scripts', array($this, 'awpFrontEnqueue') );

  add_action( 'admin_enqueue_scripts', array($this, 'awpAdminEnqueue') );

 	add_action('admin_menu', array($this, 'awpAdminPage'));

 }

  //All admin side scripts
  public function awpAdminEnqueue()
  {
     //Styles
       wp_enqueue_style( 'alms_awp_bootstrap_css', plugins_url(AWPCSS, __FILE__) );

      //scripts
      wp_enqueue_script( 'alms_awp_js', plugins_url(AWPJS, __FILE__), '', '', true);
  }

  //All front end scripts
  public function awpFrontEnqueue()
  {
      //scripts
      wp_enqueue_script( 'alms_awp_js', plugins_url(AWPJS, __FILE__), '', '', true);
  }

  //For adding admin menu at the side bar
  public function awpAdminPage()
  {
  	add_menu_page( 'Awesome Parallax Effects', 'AWP Effects', 'manage_options', 'alms_plugin', array($this, 'awpAdminPageLink'), 'dashicons-tide', null );
  }

  //Admin page function
  public function awpAdminPageLink(){
  	require_once plugin_dir_path( __FILE__ ) . 'almsadmin.php';
  }



}









  