<?php
/*
Plugin Name: Amumu Typewriter
Plugin URI: https://wordpress.org/plugins/amumu-typewriter/ 
Description: 타자기 처럼 텍스트를 표현 해주는 플러그인 입니다.
Author: Amumu
Version: 0.9
Author URI: http://www.amumu.kr
*/

// Add Shortcode
function amumu_typewriter( $atts , $content = null ) {
	
	$output = '<div class="amumu-typewriter-'.$atts['class'].'">'.$content.'</div>';					
	amumu_typewriter_t_js($atts['class']);
	
	return $output;

}
add_shortcode( 'amumu-typewriter', 'amumu_typewriter' );

// We need some CSS to position the paragraph
function amumu_typewriter_css() {
	echo "
	<style type='text/css'>
	
        .typed-cursor, .t-caret{
            opacity: 1;
            font-weight: 100;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            -ms-animation: blink 0.7s infinite;
            -o-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }
        @-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-webkit-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-moz-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-ms-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-o-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        
		del,ins{text-decoration:none;}        
        			
		@media screen and (max-width: 782px) {
		}
			
	</style>";
}

function amumu_typewriter_t_js($class){
	echo '
    <script type="text/javascript">
    
    jQuery(function(){	
        jQuery(".amumu-typewriter-'.$class.'").t(jQuery(".amumu-typewriter-'.$class.'").html(),{speed:30,speed_vary:true});	    
    });
    
    </script>';
}

add_action( 'wp_head', 'amumu_typewriter_css' );

function amumu_typewriter_js(){
	wp_enqueue_script( 'amumu_typewriter_js', plugins_url('t.js', __FILE__) );	
}

add_action( 'wp_head', 'amumu_typewriter_js' );

?>
