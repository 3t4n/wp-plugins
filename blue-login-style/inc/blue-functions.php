<?php

	add_action('login_headerurl', 'blue_login_url',9999);
	function blue_login_url()
	{
		return home_url();
	}

	add_filter('login_headertitle', 'blue_login_text',9999);
	function blue_login_text()
	{
		return get_bloginfo();
	}

	add_action('login_head', 'my_login_head');
	function my_login_head() {
		$options = get_option('blue_default_theme');
		if ($options == "DarkLight"){
		remove_action('login_head', 'wp_shake_js', 12);
		}
	}

	add_filter( 'login_message', 'the_login_message' );
	function the_login_message( $message ) {
		if ( empty($message) ){
			$options = get_option('blue_login_message');
				if ( !empty($options) ){
				return "<p class='message'>" . $options ."<br></p>";
				}
		} else {
			return $message;
		}
	}
	
	function blue_login_repeat_option(){
		$repeat = get_option('blue_upload_repeat');
		if($repeat != null){
			return $repeat;
		}
		else return '';
	}

	function blue_login_position_option(){
		$position = get_option('blue_upload_position');
		if($position != null){
			return $position;
		}
		else return '';
	}


	add_filter( 'login_redirect', 'blue_login_redirect' );
	function blue_login_redirect() {
		$options = get_option('blue_login_redirect');
		if ( !empty($options) ){
		// Change this to the url to Updates page.
		return $options;
		}
		else return admin_url();
	}

	add_filter( 'registration_redirect', 'blue_registration_redirect' );
	function blue_registration_redirect() {
		$options = get_option('blue_register_redirect');
		if ( !empty($options) ){
		// Change this to the url to Updates page.
		return $options;
		}
	}
	 
	add_action( 'init', 'blue_loggedout_redirect' );
	function blue_loggedout_redirect() {
		$options = get_option('blue_logout_redirect');
		if ( !empty($options) ){
		if( isset($_GET['loggedout']) == 'true' ) {
			$redirect_link=$options;
			wp_redirect($redirect_link);
			exit;
	 
		}
		}
		else return wp_login_url();
	}