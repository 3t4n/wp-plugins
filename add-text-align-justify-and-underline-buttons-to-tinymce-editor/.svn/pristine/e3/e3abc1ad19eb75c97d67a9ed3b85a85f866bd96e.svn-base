<?php
/*
Plugin Name: Add text align-justify and Underline buttons to TINYMCE EDITOR
Description: STOP using this plugin. SIMPLIFY YOUR LIFE,  install "TinyMCE ADVANCED" - free fully-featured editor.
Version: 1.2
Author: TazoTodua
Author URI: http://www.protectpages.com/profile
Plugin URI: http://www.protectpages.com/
Donate link: http://paypal.me/tazotodua
*/

								//===========  links in Plugins list ==========//
								add_filter( "plugin_action_links_".plugin_basename( __FILE__ ), function ( $links ) {   $links[] = '<a href="http://paypal.me/tazotodua">Donate</a>';  return $links; } );

return;			

define('version__ATAAUBTTE', 1.2);

class buttonsT_ATAAUBTTE {
	public function __construct() {
		// Add text justify button
		add_filter( 'mce_buttons_2', array($this, 'mce_buttonss'), 11 );
		//this is must for REFRESHING!
		add_filter( 'tiny_mce_version', function($ver){ $ver += 4;  return $ver;} ) ;
	}

	public function mce_buttonss( $mce_buttons ) {	
		$mce_buttons[] = 'alignjustify';
		$mce_buttons[] = 'underline';
		return $mce_buttons;
	}
}
//new buttonsT_ATAAUBTTE();


								

?>