<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Controller_Main extends AnimatedAl_Controller{
private $model_main;

public function __construct($model_main)
  {
  parent::__construct();
    $this->model_main = $model_main;
  }
public function execute($proj_id)
  {
    return $this->model_main->get_main_results($proj_id);
  }
public static function register_scripts_fronend()
  {
  $helper = new AnimatedAl_Helper();
  
    $helper->registerStylefront("animated_al_list_main", "css/animated_al_list_main.css");

    $helper->registerScryptfront("animated_al_list_modernizr", "js/animated_al_list_modernizr.js");  
    $helper->registerScryptfront("animated_al_list_common", "js/animated_al_list_common.js");  


  }
public static function print_scripts_fronend()
  {
  global $animated_al_list_run_flag;
  if ($animated_al_list_run_flag != true)return;
  
  $helper = new AnimatedAl_Helper();
  
    $helper->printStylefront("animated_al_list_main", "css/animated_al_list_main.css");

    $helper->printScryptfront("animated_al_list_modernizr", "js/animated_al_list_modernizr.js");  
    $helper->printScryptfront("animated_al_list_common", "js/animated_al_list_common.js");  

  }

}