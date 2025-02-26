<?php
/*
Plugin Name: Add Locale Class
Plugin URI: http://maxgalleria.com
Description: Adds the current language locale as a class to the body tag in both the front and backend pages of the site.
Version: 1.0.5
Author: Max Foundry
Author URI: http://maxfoundry.com

*/

class AddMFLocaleClass {
	
  public function __construct() {
		$this->create_hooks();       	
  }
			
	public function create_hooks() {
		add_filter( 'body_class', array($this, 'alc_body_classes'));
		add_filter( 'admin_body_class', array($this, 'alc_user_body_classes'));		
	}
		
	public function alc_body_classes( $classes ) {
		$locale = "locale-" . str_replace('_','-', strtolower(get_locale()));
		if(is_array($classes))
		  $classes[] = $locale;
		else
			$classes .= " " . $locale;
		return $classes;	
	}	
	
	public function alc_user_body_classes( $classes ) {
		$locale = "locale-" . str_replace('_','-', strtolower(get_user_locale()));
		if(is_array($classes))
		  $classes[] = $locale;
		else
			$classes .= " " . $locale;
		return $classes;	
	}	
	
}	

$add_mf_locale_class = new AddMFLocaleClass();

?>