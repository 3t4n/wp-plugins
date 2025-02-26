<?php
/*
Plugin Name: DSGVO Vimeo
Plugin URI: https://www.ericmaechler.com/produkt/dsgvo-vimeo/
Description: Use this Plugin and add Vimeo Movies GDPRO correct into your Website / Mit diesem Plugin setzen sie alle Vimeo Videos DSGVO / GDRP korrekt ein.
Author: Eric-Oliver Mächler
Version: 0.7
Author URI: https://www.ericmaechler.com
Requires at least: 3.5
Tested up to: 5.7.2
*/

//dsgvo youtube mehrsprachig machen
function my_plugin_initdsgvovimeo() {
    load_plugin_textdomain( 'dsgvo-vimeo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
  }
  add_action('init', 'my_plugin_initdsgvovimeo');




// add menu section
include 'conf.php';



// add css JS -> includes/add-js-css.php
include ("includes/add-js-css.php");

// add Button für Text-Editor mit eigenem Bild
include ("includes/add_texteditor_vimeo_button.php");
include ("includes/add_texteditor_vimeo_button_eigenesbild.php");

$keinbild = plugins_url('../images/dsgvo-vimeo-startbild.jpg', __FILE__ );

add_action( 'wp_head', 'dsgvogdprvimeo' );

function dsgvogdprvimeo() {
	
				function vimeosecure_shortcode( $atts, $content = null ) {
    			//set default attributes and values
    			$values = shortcode_atts( array(
        			'url'   	=> '#',
        			'target'	=> '_self',
					'images'	=> '#',
					'alt'	=> '#',
    			), $atts );
					
					//https://vimeo.com/275498927
					$array = explode("/",$values['url']);
					$vimeocode = ($array[1]);
					$test = 'test2.0';
					$images = $values['images'];
					$alt = $values['alt'];
					
					
					
					if ($images =='#'){
					
						$thumbnail = '<div class="dsgvovimeo"><a data-fancybox href="'. esc_attr("$values[url]") .'" "><img src="' . plugins_url('/images/dsgvo-vimeo-startbild.jpg', __FILE__ ) . '"></a></div>';
					}
					else
					{
						//$thumbnail = "<img src='$images'>";
						//$thumbnail = '<a data-fancybox href="'. esc_attr($values['url']) .'" "><img src='$images'></a>';
						//$thumbnail = "<a data-fancybox href='esc_attr($values[url])'><img src='$images'></a>";
						//$thumbnail = <a href='http://www.example?iframe'>This goes to iframe</a>";
						//$thumbnail = "<a data-fancybox class='various iframe' href='http://www.youtube.com/embed/L9szn1QQfas?autoplay=1'>Youtube (iframe)</a>";
						
						
						//$thumbnail = "<a href='https://vimeo.com/api/oembed.json?url=$values[url]'><img src='$images'></a>";
						

						if ($alt == '#'){
						$thumbnail = '<div class="dsgvovimeo"><a data-fancybox href="'. esc_attr("$values[url]") .'" "><img src="' . $images . '"></a></div>';
						}
						else {
							$thumbnail = '<div class="dsgvovimeo"><a data-fancybox href="'. esc_attr("$values[url]") .'" "><img src="' . $images . '" alt="' . $alt . '"></a></div>';	
						}
						
					}
					
					
					return $thumbnail;
 			
}
add_shortcode( 'dsgvo-vimeo', 'vimeosecure_shortcode' );
	
}
