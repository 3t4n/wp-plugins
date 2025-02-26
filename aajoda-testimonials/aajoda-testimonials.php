<?php

/*

Plugin Name: Aajoda Testimonials

Plugin URI: https://www.aajoda.com

Description: Integrate Aajoda Testimonials on your website.

Version: 2.2.3

Author: Aajoda

Author URI: https://www.aajoda.com

License: GPL2

Usage: [aajoda id="xxxxxxx"]

*/

/* Enable internationalisation */

global $ata;

global $scriptAdded;
$scriptAdded=false;

load_plugin_textdomain( 'aajodatestimonials', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/');
add_action('admin_menu', 'aajodatestimonials_admin_actions');
	
function aajodatestimonials_admin_actions() {
	add_menu_page('Aajoda', 'Aajoda', 'manage_options', 'aajoda-testimonials', 'aajodatestimonials_admin', WP_PLUGIN_URL . "/". plugin_basename( dirname( __FILE__ ) ).'/img/aajodatestimonials-icon.png');
}

function aajodatestimonials_admin() {
    if ( !current_user_can('manage_options') )
    	wp_die( __('You do not have sufficient permissions to access this page.','aajodatestimonials') );
	
	include('aajoda-testimonials-admin.php');
}

// styles
 // add_action('wp_head', 'aajodatestimonials_load_script' );
// function aajodatestimonials_load_script () {	
 // $code = get_option( 'aajodatestimonials_code');

 // if( !empty( $code ) ) {
 // echo "\nhere i am" . html_entity_decode( $code );
 // }
 // }

function add_aajoda_scripts() {
	
	$version = get_option( 'aajoda_version' );
	
	if($version==="2.0"){
		//wp_register_script('ajje-script', 'http://29012e4c.ngrok.io/Scripts/Public/AajodaDEV_refsv1_0.js?ver=1.0', null, null);
		//wp_enqueue_script( 'ajje-script' );

		//STAGING 2.0 only
		// wp_register_script('aajoda_refsv10','https://aajoda-staging.azurewebsites.net/Scripts/Public/AajodaSTAGING_refsv1_0.js',null,null,false);
		//wp_register_script('aajoda_refs','https://aajoda-staging.azurewebsites.net/Scripts/Public/AajodaSTAGING_refsv2_0.js',null,null,false);
		// wp_register_script('iframe_resize',"https://aajoda-staging.azurewebsites.net/Scripts/iframeResizer.min.js",null,null,false);

		//PROD 2.0 only
		// wp_register_script('aajoda_refsv10','https://az666548.vo.msecnd.net/misc/Aajoda_refsv1_0.min.js',null,null,false);
		wp_register_script('aajoda_refsv20','https://aajoda.com/public/Aajoda_refsv2_0.min.js',null,null,false);
	} else if($version==="2.1"){
		//PROD 2.1 only
		// wp_register_script('aajoda_refsv10','https://az666548.vo.msecnd.net/misc/Aajoda_refsv1_0.min.js',null,null,false);
		//wp_register_script('aajoda_refsv20','https://az666548.vo.msecnd.net/misc/Aajoda_refsv2_1_beta1.es5.min.js',null,null,false);
		//wp_register_script('aajoda_refs','https://aajoda-staging.azurewebsites.net/Scripts/Public/AajodaSTAGING_refsv2_1.js',null,null,false);

		wp_register_script('aajoda_refsv20','https://aajoda.com/public/Aajoda_refsv2_1.min.js',null,null,false);
	} else {
		//PROD 2.2 only
		// wp_register_script('aajoda_refsv10','https://az666548.vo.msecnd.net/misc/Aajoda_refsv1_0.min.js',null,null,false);
		//wp_register_script('aajoda_refsv20','https://az666548.vo.msecnd.net/misc/Aajoda_refsv2_1_beta1.es5.min.js',null,null,false);
		//wp_register_script('aajoda_refs','https://aajoda-staging.azurewebsites.net/Scripts/Public/AajodaSTAGING_refsv2_1.js',null,null,false);

		wp_register_script('aajoda_refsv20','https://aajoda.com/public/Aajoda_refsv2_2.min.js',null,null,false);
	}

	wp_enqueue_script( 'aajoda_refsv20' );
}	
add_action('wp_enqueue_scripts', 'add_aajoda_scripts');

/* aajoda con shortcode */
function aajoda_shortcode( $atts ) {

	$output="";
	$con_atts = shortcode_atts(array('id' => '' ), $atts );
	
	if($con_atts['id']==""){
		return "Parameter id is required!";
	}

	$output .= '<div id="aajoda_div'.$con_atts['id'].'" class="aajoda_con"></div>';
	$output.="<script>aajodaInit()</script>";
	
	 /*print_r(htmlspecialchars("fetching "));*/ 	
		
    return $output;
}

function add_query_vars_filter( $vars ){
  $vars[] = "testimonial";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

add_shortcode('aajoda', 'aajoda_shortcode');

?>