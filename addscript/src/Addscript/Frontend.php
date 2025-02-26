<?php

/*
 * Frontend class.
 * 
 * Method and property for frontend section.
 * 
 * @since 1.0
 * 
 */

namespace Addscript;

class Frontend extends \Addscript\Base {
	
	/**
     * Our constructor.
	 * 
	 * 
	 * @since 1.0
     */
	
	public function __construct() {
		
		parent::__construct();
		$this->get_script_for_footer();
		
	}
	
	/**
     * Get the script and append to the footer
	 * 
	 * 
	 * @since 1.0
	 * 
	 * 
     */
	
	private function get_script_for_footer() {
		
		$form_array = $this->get_array_admin_key_form();
		
		$script = $form_array['script'];
		
		$value = get_option ( $script );
		
		if ( $value!='' ) {
			
			add_action ( 'wp_footer' , array ( $this , 'callback_from_get_script_for_footer' ));
			
		}
		
	}
	
	/**
     * Final display the script on the footer!
	 * 
	 * $_COOKIE['displayCookieConsent'] came from WP Italy Cookie Choices.
	 * 
	 * 
	 * @since 1.0
	 * 
	 * 
     */
	
	public function callback_from_get_script_for_footer() {
		
		if ( isset ( $_COOKIE['displayCookieConsent'] ) ) {
		
			$form_array = $this->get_array_admin_key_form();
			
			$script = $form_array['script'];
			
			$value = get_option ( $script );
			
			$value = str_replace ( 'newDate()' , 'new Date()' , $value );
			
			$value = str_replace ( 'scriptasyncsrc' , 'script async src' , $value );
			
			$value = str_replace ( 'functiongtag' , 'function gtag' , $value );
			
			echo $value;
			
		}
		
	}
	
}
