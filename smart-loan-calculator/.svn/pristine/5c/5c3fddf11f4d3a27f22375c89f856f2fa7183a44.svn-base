<?php
function SLC_scripts() {
global $post;

      //=========
    if( has_shortcode( $post->post_content, 'smart-loan-calc') ) {


//------------ PLAYER-----
wp_enqueue_script('script_p1',plugins_url('/slc.js?v=1.3', __FILE__) , array('jquery'),'2.1',0 ); //footer
// wp_enqueue_style( 'style_p0', plugins_url('/skin/custom-skin.css', __FILE__) );




//--------------------        
    }

 }





function SLC_initiate(){
 
  ob_start();
  include 'Pages/home.php';
  $output = ob_get_clean();
  
  return $output;


}

?>