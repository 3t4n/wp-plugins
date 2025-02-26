<?php
/**
 * This file contains plugin activation and deactivation function 
 *
 * @link 
 * @since 
 *
 * @package advance_login_style-inc
 * @subpackage none
 */
	
/** 
* @desc do work on plugin activation
* @param none
* @return none
*/
function advance_login_style_activate() {

	advance_login_style_defaults();
	
	if ( function_exists( 'w3tc_pgcache_flush' ) ) {
		w3tc_pgcache_flush();
	} else if ( function_exists( 'wp_cache_clear_cache' ) ) {
		wp_cache_clear_cache();
	}
 
}

/** 
* @desc Function to set default options
* @param none
* @return none
*/
function advance_login_style_defaults() {

	$opt = array(
			//'bckcolor'  => 'on',
			//'form_shadow'=>'5px 5px 10px',
		);
		
	update_option( 'advance_login_style', $opt );

	$opt_form = array(
			//'bckcolor'  => 'on',
			'form_shadow'=>'5px 5px 10px',
			'form_lebal_font_size'=>'14',
			'button_color'=>'#1e8cbe',
			'button_border_color'=>'##0074a2',
			'onhover_button_color'=>'#1e8cbe',
			'background_size'=>'80',
			'logo_height'=>'80',
			'logo_width'=>'80',
		//'Login_logo_Image'=>'background-image:url(' .advance_login_style_URL.''.plugins_url().'images/advance-login-style80x80.png'.')',
			
		);
	update_option( 'advance_login_style_form', $opt_form );
	
	$opt_logo = array(
			//'bckcolor'  => 'on',
			//'text_message'=>'fsdfsdf',
		//'Login_logo_Image'=>'background-image:url(' .advance_login_style_URL.'images/advance-login-style80x80.png'.')',
			
		);
	update_option( 'advance_login_style_logo', $opt_logo);
	
	
}

/** 
* @desc do work on plugin deactivation
* @param none
* @return none
*/
function advance_login_style_deactivate() {	
	
	if ( function_exists( 'w3tc_pgcache_flush' ) ) {
		w3tc_pgcache_flush();
	} else if ( function_exists( 'wp_cache_clear_cache' ) ) {
		wp_cache_clear_cache();
	}
}

