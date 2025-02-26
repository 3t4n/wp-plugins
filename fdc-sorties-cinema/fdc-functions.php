<?php
/*
Plugin Name: Sorties cinéma
Plugin URI: http://www.fan-de-cinema.com/
Description: Ce plugin permet d'afficher les sorties cinéma de la semaine en france sur votre blog
Version: 1.0
Author: JR Multimedia
Author URI: http://www.fan-de-cinema.com/
*/

error_reporting(0);


function fdc_register_sortiescine() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fdc_js_1', plugins_url( 'js/fdc-sorties-cinema.js', __FILE__ ));
    wp_enqueue_style( 'fdc_styles_1', plugins_url( 'css/fdc-sorties-cinema.css', __FILE__ ));
}
function fdc_register_sortiescine_galerie_light() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fdc_js_2', plugins_url( 'js/fdc-sorties-cinema-gal.js', __FILE__ ));
    wp_enqueue_style( 'fdc_styles_2', plugins_url( 'css/fdc-sorties-cinema-light.css', __FILE__ ));
}
function fdc_register_sortiescine_galerie_dark() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fdc_js_2', plugins_url( 'js/fdc-sorties-cinema-gal.js', __FILE__ ));
    wp_enqueue_style( 'fdc_styles_2', plugins_url( 'css/fdc-sorties-cinema-dark.css', __FILE__ ));
}
function fdc_sorties_cine_shortcode( $atts ) {

    $date="";
    $urlparts = parse_url(home_url('/'));
    $domain = $urlparts[host];
    $blog_charset = get_bloginfo("charset");
    $ch = curl_init('http://www.fan-de-cinema.com/flux/plugin-sorties-cinema/datas.php'); 
    $post_prm = array('d'=> $urlparts[host], 'w' => $date);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_FRESH_CONNECT, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_prm );
    $result = curl_exec($ch);
    curl_close($ch);
    fdc_register_sortiescine();
    if($blog_charset=="UTF-8") return utf8_encode($result); else return $result;
}
function fdc_sorties_cine_galerie_shortcode( $atts ) {

	extract( shortcode_atts(array('theme' => ''), $atts ));
    $date="";
    $urlparts = parse_url(home_url('/'));
    $domain = $urlparts[host];
    $blog_charset = get_bloginfo("charset");
    $ch = curl_init('http://www.fan-de-cinema.com/flux/plugin-sorties-cinema/datas.php'); 
    $post_prm = array('d'=> $urlparts[host], 'w' => $date, 'gal' => 1);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_FRESH_CONNECT, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_prm );
    $result = curl_exec($ch);
    curl_close($ch);
    if($theme=="dark") fdc_register_sortiescine_galerie_dark();
    else fdc_register_sortiescine_galerie_light();
    if($blog_charset=="UTF-8") return utf8_encode($result); else return $result;
}
add_shortcode( 'fdc_sorties_cine_galerie', 'fdc_sorties_cine_galerie_shortcode' );
add_shortcode( 'fdc_sorties_cine', 'fdc_sorties_cine_shortcode' );

?>