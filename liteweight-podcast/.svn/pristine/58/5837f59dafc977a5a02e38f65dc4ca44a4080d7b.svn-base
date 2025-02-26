<?php

namespace PDP\Services;
use PDP\Model\AdvanceSystem;
use PDP\Model\AnalogSystem;

class Shortcodes{
  protected static $_instance = null;

  public function __construct(){
    add_shortcode('podcast', [$this, 'podcast'], 10, 2);
  }

  public static function instance(){
    if(self::$_instance === null){
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function podcast($atts, $content){
    extract(shortcode_atts(array(
      'id' => null,
    ), $atts));

    $post_type = get_post_type($id);
    $isGutenberg = get_post_meta($id, 'isGutenberg', true);

    ob_start(); 
    
    if($post_type !== 'podcast'){
      return false;
    }

    if($isGutenberg){
      echo( AdvanceSystem::html($id));
    }else {
      echo( AnalogSystem::html($id));
    }
    
    return ob_get_clean(); 
  }
}

Shortcodes::instance();