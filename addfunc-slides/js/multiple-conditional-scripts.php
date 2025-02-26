<?php
/*

    E X A M P L E
    
    Multiple Conditional Scripts

*/



/*
    J S   &   C S S   in   H E A D
    ==============================
    Conditional Styles & Scripts
*/

add_filter('the_posts','aFSJSCSS_if_Sc');
function aFSJSCSS_if_Sc($posts){
  if(empty($posts))return $posts;
  $shortcode_found = 0;
  $aFHashRequested = 0;
  foreach($posts as $post){
    if(stripos($post->post_content,'[slides')=== false){
      $shortcode_found = false;
    }
    else{
      $shortcode_found = true;
      if(stripos($post->post_content,'hashtags=true')=== false){
        $aFHashRequested = 0;
      }
      else{
        $aFHashRequested = 1;
      }
      if(stripos($post->post_content,'swipe=false')=== true){
        $aFSwipeRequested = 0;
      }
      else{
        $aFSwipeRequested = 1;
      }
      break;
    }
  }
  if($shortcode_found){
    aFSJSCSS($aFHashRequested,$aFSwipeRequested);
    aFSScFn();
  }
  return $posts;
}
function aFSJSCSS($aFHashRequested = NULL,$aFSwipeRequested = NULL){
  $aFDependsOn = array();
  wp_enqueue_style('aFSStylesheet',plugins_url('css/addfunc-slides.css',__FILE__));
  if($aFSwipeRequested === 1){
    $hammer = wp_enqueue_script('hammer',plugins_url('js/hammer.js',__FILE__),'',false,false);
    $aFDependsOn[] = 'hammer';
  }else{ $hammer = ''; }
  if($aFHashRequested === 1){
    $hashchange = wp_enqueue_script('hashchange',plugins_url('js/jquery.ba-hashchange.min.js',__FILE__),array('jquery'),false,false);
    $aFDependsOn[] = 'hashchange';
  }else{ $hashchange = ''; }
  $aFslides = wp_enqueue_script('aFslides',plugins_url('js/addfunc-slides.js',__FILE__),$aFDependsOn,false,false);
  return $hammer;
  return $hashchange;
  return $aFslides;
}
