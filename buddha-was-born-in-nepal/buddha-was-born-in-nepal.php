<?php
/*
Plugin Name: Buddha Was Born In Nepal
Plugin URI: http://buddhawasborninnepal.com/
Description: Let's spread the truth "Buddha Was Born In Nepal" from your beautiful site.
Author: Buddhawasborninnepal
Author URI: https://profiles.wordpress.org/buddhawasborninnepal/
Version: 1.0
Text Domain: bwbin
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if(!class_exists('Buddha_Birth'))
{
  class Buddha_Birth
  {
    private $plugin_url;
    
    public function __construct()
    {
      add_action( 'widgets_init',         array($this,'register_bwbin_widget'));
      add_action( 'wp_enqueue_scripts',   array($this,'bwin_assests') );
      
      $this->plugin_url                   = plugins_url('/',__FILE__);
    }
    
    public function register_bwbin_widget()
    { 
      include 'bwbin-widget.php';
      register_widget( 'Bwbin_Widget' );
    }
    
    public function bwin_assests()
    {
      wp_enqueue_style( 'bwbin-style', $this->plugin_url . 'style.css' );
    }

    
  }
  
  new Buddha_Birth;
}