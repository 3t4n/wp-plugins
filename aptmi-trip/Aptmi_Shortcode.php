<?php

/**
* 
*/
class Aptmi_Shortcode 
{
  
  function __construct()
  {
    # code...
  }
  public static function aptmi_sc($args,$content){

      if(!isset($args['b2c_url']) || strlen($args['b2c_url'])==0){
        return is_user_logged_in()?'<p>Silakan tambahkan opsi b2c_url di shortcode Anda, seperti [aptmi_search b2c_url="http://url_anda.com"]</p>':'';
      }
      $extra=isset($args['promocode'])&& strlen($args['promocode'])?'&promocode='.$args['promocode']:'';
      $render= '<iframe data-url="'.$args['b2c_url'].'" height="'.$args['height'].'px" width="'.$args['width'].'" id="aptmIframe" src="'.$args['b2c_url'].'/widgetWP/?'.$extra.'"></iframe>';
      return $render;
  }
}

add_shortcode('aptmi_search',['Aptmi_Shortcode','aptmi_sc']);