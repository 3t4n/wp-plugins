<?php

function WPBOX_scripts() {
global $post;

      //=========
    if( has_shortcode( $post->post_content, 'inv-cal-wppluginbox') ) {


//------------ PLAYER-----

wp_enqueue_script( 'sic-script_p1', plugins_url('/JS/a81368914c.js', __FILE__) ); 
wp_enqueue_script( 'sic-script_p3', plugins_url('/lib/js/formatters.js', __FILE__) ); 
wp_enqueue_script( 'sic-script_p4', plugins_url('/lib/js/highcharts.js', __FILE__), array('jquery'),'2.1',0 ); 
wp_enqueue_script( 'sic-script_p5', plugins_url('/lib/js/script.js', __FILE__), array('jquery'),'2.1',1 ); 
wp_enqueue_script( 'sic-script_p6', plugins_url('/lib/js/chart.js', __FILE__), array('jquery'),'2.1',1 ); 


wp_enqueue_style( 'sic-style_p1', plugins_url('/lib/css/skin.css', __FILE__) );


//--------------------        


    }

      //=========
 }


 

 function WPBOX_initiate($atts, $content = null){

    extract(shortcode_atts(array(
      "id" => '1',    
   ), $atts));
   

//============= PLAYER CONTENT ==========
ob_start();
include 'lib/index.php';
$output = ob_get_clean();
return $output;
//======================================

   
}

?>