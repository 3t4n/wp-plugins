<?php
/**
Plugin Name: MyLastminutes API
description: Voeg een vakantie last minute top 10 toe aan je Wordpress website
Version: 1.0.0
Author: MarcoDuindam
License: GPLv2 or later
Text Domain: mylastminutes-api
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//register css to use
wp_register_style ( 'MyLastminutes-css', plugins_url ( 'css/default.css', __FILE__ ) );
wp_enqueue_style('MyLastminutes-css');

wp_register_script( 'MyLastminutes-js', plugins_url( 'js/default.js', __FILE__ ), array('jquery'), null, true);
wp_enqueue_script( 'MyLastminutes-js');


function mylastminutes_data_widget( $atts ) {
  $code = $atts['code'];
  $site = $atts['site'];
  $api_request    = 'http://api.mylastminutes.nl/api/trips/widget?code=' . $code . '&site=' . $site;
  $api_response = wp_remote_get( $api_request );
  $api_data = wp_remote_retrieve_body( $api_response );

  $return = $api_data;

  return $return;  
}
add_shortcode( "mylastminutes_widget", "mylastminutes_data_widget" );

