<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class AnimatedAl_Users extends AnimatedAl_Base{

public static function animated_al_list($atts)
  {
  global $animated_al_list_run_flag;
  $animated_al_list_run_flag = true;
  
  $front = new AnimatedAl_Users_Common();
    return $front->execute($atts['id']);
  }

}
?>