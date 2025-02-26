<?php
/*
	Plugin Name: Fantastic Restaurant Menu
	Plugin URI: http://flyingwhalelab.com/fantastic-restaurant-menu/
	Description: Beautiful and versatile restaurant menu wordpress plugin
	Author: Flying Whale Lab
	Author URI: http://flyingwhalelab.com/
	Version: 1.0.0
	Text Domain: 
	Domain Path: /languages
  License: GPL2

  Fantastic Restaurant Menu is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.
   
  Fantastic Restaurant Menu is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
   
  You should have received a copy of the GNU General Public License
  along with Fantastic Restaurant Menu. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/ 

defined('ABSPATH') or die("Cannot access pages directly.");

if( ! defined( 'fantasticmenu_PLUGIN_PATH' ) ) {

  define('fantasticmenu_PLUGIN_VERSION', '1.0.0');

  // Define a constant to always include the absolute path
  define('fantasticmenu_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
  define('fantasticmenu_PLUGIN_URL', plugins_url(str_replace(dirname(dirname(__FILE__)), '', dirname(__FILE__))));

  if(get_option('fwl-restaurant-menu-plugin-mode') === false)
  {
      add_option('fwl-restaurant-menu-plugin-mode', 'plugin_mode');
  }


  //Frequent Function Libraries
  include_once fantasticmenu_PLUGIN_PATH . 'include/function_library.php';  

  //Admin functions
  include_once fantasticmenu_PLUGIN_PATH . 'include/admin.php';  

  // Define Pricing Table Post type
  include_once fantasticmenu_PLUGIN_PATH . 'include/add_posttype.php';

  //Add Meta boxes
  include_once fantasticmenu_PLUGIN_PATH . 'include/metabox.php';

  //Add FantasticRestaurantMenu Classes
  include_once fantasticmenu_PLUGIN_PATH . 'include/class_restaurantmenu.php';
  include_once fantasticmenu_PLUGIN_PATH . 'include/class_WP_photoupload.php';
  include_once fantasticmenu_PLUGIN_PATH . 'include/class_functions.php';


  //for Admin script and style
  function frm_add_resource()
  {
    if(get_post_type( get_the_ID()) == 'fantasticmenu_menu')
    { 

      wp_enqueue_style( 'fantasticmenu-adminstyle', fantasticmenu_PLUGIN_URL . '/resources/css/admin.css' );
      wp_enqueue_script( 'fantasticmenu-adminscript', fantasticmenu_PLUGIN_URL . '/resources/js/admin.js' );  
      
      //photo uploader
      wp_enqueue_media();
      wp_enqueue_script( 'photouploader-script', fantasticmenu_PLUGIN_URL . '/resources/js/photoupload.js' );

      //jQuery UI     
      wp_enqueue_style( 'fantasticmenu-jqueryUICSS', fantasticmenu_PLUGIN_URL . '/resources/css/jquery-ui.min.css' );

      //jQuery UI from WordPress
      wp_enqueue_script('jquery-ui-tabs');

      //Font Awesome
      wp_enqueue_style( 'fantasticmenu-fontawesomeCSS', fantasticmenu_PLUGIN_URL . '/resources/css/font-awesome.min.css' );

      //Bootstrap     
      wp_enqueue_style( 'fantasticmenu-bootstrapCSS', fantasticmenu_PLUGIN_URL . '/resources/css/bootstrap.min.css' );
      // wp_enqueue_script( 'fantasticmenu-bootstrapJS', fantasticmenu_PLUGIN_URL . '/vendors/bootstrap-3.3.6-dist/js/bootstrap.min.js' ); 

      //Color Picker
      wp_enqueue_style( 'fantasticmenu-spectrumCSS', fantasticmenu_PLUGIN_URL . '/resources/css/spectrum.css' );
      wp_enqueue_script( 'fantasticmenu-spectrumJS', fantasticmenu_PLUGIN_URL . '/resources/js/spectrum.js' ); 
    }
  }

  add_action('admin_enqueue_scripts', 'frm_add_resource');

  add_action( 'init', 'register_fantasticmenu_shortcodes');

}