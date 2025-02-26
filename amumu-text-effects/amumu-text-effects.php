<?php
/*
Plugin Name: Amumu Text Effects
Plugin URI: https://wordpress.org/plugins/amumu-text-effects/ 
Description: 텍스트에 효과를 주는 플러그인 입니다.
Author: Amumu
Version: 0.9
Author URI: http://www.amumu.kr
*/

// Add Shortcode
function amumu_text_effects( $atts , $content = null ) {
	
	$output = '<div class="foo">';
	for($i=0;$i<mb_strlen($content);$i++) { 
		$str_cut[$i] = mb_substr($content,$i,1); 
	} 
	foreach( $str_cut as $row ){
		$output .= '<span class="amumu-letter-'.$atts['class'].'" data-letter="'.$row.'">'.$row.'</span>';
	}
	$output .= '</div>'; 
	
	amumu_text_effects_css($atts['class'],$atts['color'],$atts['size'],$atts['margin']);
	
	return $output;

}
add_shortcode( 'amumu-text-effects', 'amumu_text_effects' );

// We need some CSS to position the paragraph
function amumu_text_effects_css($class,$color,$size,$margin) {
	
	$class == '' ? $class = 'default':$class = $class;
	$color == '' ? $color = '#00B4F1':$color = $color;
	$size == '' ? $size = '30px':$size = $size;
	$margin == '' ? $margin = '10px':$margin = $margin;			
	
	echo "
	<style type='text/css'>
	
		 .amumu-letter-".$class."{
		  display: inline-block;
		  font-weight: 900;
		  font-size: ".$size.";
		  margin: ".$margin.";
		  position: relative;
		  color: ".$color.";
		  transform-style: preserve-3d;
		  perspective: 400;
		  z-index: 1;
		}
		.amumu-letter-".$class.":before, .amumu-letter-".$class.":after{
		  position:absolute;
		  content: attr(data-letter);
		  transform-origin: top left;
		  top:0;
		  left:0;
		}
		.amumu-letter-".$class.", .amumu-letter-".$class.":before, .amumu-letter-".$class.":after{
		  transition: all 0.3s ease-in-out;
		}
		.amumu-letter-".$class.":before{
		  color: #fff;
		  text-shadow: 
		    -1px 0px 1px rgba(255,255,255,.8),
		    1px 0px 1px rgba(0,0,0,.8);
		  z-index: 3;
		  transform:
		    rotateX(0deg)
		    rotateY(-15deg)
		    rotateZ(0deg);
		}
		.amumu-letter-".$class.":after{
		  color: rgba(0,0,0,.11);
		  z-index:2;
		  transform:
		    scale(1.08,1)
		    rotateX(0deg)
		    rotateY(0deg)
		    rotateZ(0deg)
		    skew(0deg,1deg);
		}
		.amumu-letter-".$class.":hover:before{
		  color: #fafafa;
		  transform:
		    rotateX(0deg)
		    rotateY(-40deg)
		    rotateZ(0deg);
		}
		.amumu-letter-".$class.":hover:after{
		  transform:
		    scale(1.08,1)
		    rotateX(0deg)
		    rotateY(40deg)
		    rotateZ(0deg)
		    skew(0deg,22deg);
		}
			
	</style>";
}