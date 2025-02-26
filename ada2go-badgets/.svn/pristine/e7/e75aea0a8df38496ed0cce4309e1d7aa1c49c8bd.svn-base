<?php
/*
Plugin Name: Ada2go - Badgets
Description: Markierte Posts mit einem Badget welches frei mittels Shortcode angezeigt werden kann. Der Shortcode funktioniert so: [a2gb text="Text auf dem Badget" link="https://ada2go.de" target="_blank" bg="#ff00ff" color="#fff" border="#fff"]. Wenn du Hilfe ben&ouml;tigst, kontaktiere mich &uuml;ber https://ada2go.de/kontakt/! (EN) Marked posts with a badget which can be freely displayed using a shortcode. The shortcode works like this: [a2gb text="Text on the badget" link="https://ada2go.de" target="_ blank" bg="#ff00ff" color="#fff" border="#fff"] . If you need help, contact me at https://ada2go.de/kontakt/!
Version: 1.2
Author: Heiko von ada2go.de
Author URI: https://ada2go.de/
Text Domain: ada2go-badgets
*/

defined( 'ABSPATH' ) or die( 'Huuuuuuh?' );

/** 
 * FUNCTION a2g_b_shortcode
 * Add the Shortcode for the Badgets
*/
function a2g_b_shortcode( $atts ) {
global $content;
$a = shortcode_atts( array(
                    'link' => '#',
                    'color' => 'white',
                    'bg' => 'black',
                    'text' => 'Button',
                    'border' => 'red',
                    'target' => '_self'
                    ), $atts );
$a2g_b_add = '<p><a href="' . esc_url( $a['link'] ) . '" style="border-left: 4px solid ' . esc_attr( $a['border'] ) . '; background-color: ' . esc_attr( $a['bg'] ) . '; text-decoration: none; font-size:10px; color:' . esc_attr( $a['color'] ) . '; display:inline-block; padding-left:5px; padding-right:5px; text-align:center; border-radius:7%;" target="' . esc_attr($a['target']) . '">' . esc_attr( $a['text'] ) . '</a></p>' ;
      
return $a2g_b_add;
}  
add_shortcode( 'a2gb', 'a2g_b_shortcode', 11 ); 







































