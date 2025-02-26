<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action('rest_api_init', 'afflc_rest_route');

function afflc_rest_route(){
  register_rest_route(
    'afflc/v1',
    '/do',
      array(
        'methods' => 'POST',
        'callback' => 'afflc_redirect',
      )
  );
}

function afflc_redirect() {
	
  if(isset($_POST['id']) ) {
    $link = get_post_meta(intval($_POST['id']), 'button_link', 1 );  

    if($link != false && strlen($link) > 7)
    {
      header("Location: {$link}");
    }
    else
    {
      header("Location: /");
    }
  }
  die();
}
