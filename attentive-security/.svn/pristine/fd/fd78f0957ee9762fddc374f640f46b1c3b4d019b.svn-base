<?php
/**
 * @package Attentive
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
$active = get_option('attwsp_option_name');
if($active){
if( $active['homeredirect_active'] ){
	
	add_filter( 'login_url', 'attwsp_login_page', 10, 3 );	
}
}


function attwsp_login_page( $login_url, $redirect, $force_reauth ) {
	
	$active = get_option('attwsp_option_name');
	
	if( !empty( $active['otherpageredirect'] ) ){
		
    $login_page = home_url( $active['otherpageredirect'] );
    $login_url = add_query_arg( 'redirect_to', $redirect, $login_page );
	
	}else{
		
		$login_page = home_url( '/' );
		$login_url = add_query_arg( 'redirect_to', $redirect, $login_page );	
	}
	
    return $login_url;
}
