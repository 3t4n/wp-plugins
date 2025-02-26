<?php 
/**
  * Plugin Name: Alpha Testimonials
  * Plugin URI: http://themeflection.com/plug/responsive-testimonials-showcase/
  * Version: 1.0
  * Author: Aleksej Vukomanovic
  * Author URI: http://themeflection.com
  * Description: Responsive Testimonials Showcase
  * Text Domain: alpha
  * Domain Path: /languages
  * License: GPL
  */
  /*==============================================
    Prevent Direct Access of this file
  ==============================================*/
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if this file is accessed directly

  //Load Textdomain
  load_plugin_textdomain( 'alpha', false, 'inc/languages' );

  //add customer thumb size
  add_image_size( 'customer-thumb', 75, 75, array('center', 'top') );


  //include core files
  require_once 'inc/setup.php';
  require_once 'inc/options.php';
  require_once 'inc/interface.php';
  require_once 'inc/shortcode.php';
  require_once 'inc/widget.php';

  //iniitalize Alpha Testimonials
  Alpha_Testimonials::init();
  Alpha_Interface::init();
  Alpha_Shortcode::initialize();      
?>