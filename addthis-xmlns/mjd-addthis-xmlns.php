<?php
/*
Plugin Name: AddThis xmlns
Plugin URI: http://www.feestdagen-belgie.be/
Description: This is the mjd-addthis-xmlns plugin. It adds the xmlns:addthis="http://www.addthis.com/help/api-spec" entry to the HTML <head> tag. This head entry is required to make it Valid XHTML. More info at http://www.addthis.com/help/client-api#valid-xhtml
Version: 1.0.0
Author: Rolf
Author URI: http://www.feestdagen-belgie.be/
*/
/*

Changelog:
v1.0.0: Initial release

*/
/*
Credits: 
	This plugin is based on the template at http://pressography.com/plugins/wordpress-plugin-template/
*/

// Debugging
define ( 'MJDAX_DEBUGMODE', FALSE );

//
// The MAIN Class
if (! class_exists ( 'mjd_addthis_xmlns' )) {
	class mjd_addthis_xmlns {
		// Class Constants
		const MJD_SPACE  = ' ';
		const MJD_DQUOTE = '"';
		const MJD_ADDTHIS_NAMESPACE_ID   = 'xmlns:addthis';
		const MJD_ADDTHIS_NAMESPACE_URI  = 'http://www.addthis.com/help/api-spec';
		/**
		 * @var string $_localizationDomain Domain used for localization
		 */
		var $_localizationDomain = "mjd_addthis_xmlns";
		/**
		 * @var string $url The url to this plugin
		 */
		var $_url = '';
		/**
		 * @var string $_urlpath The path to this plugin
		 */
		var $_urlpath = '';
		/**
		 * @var string $metadata The array of opengraph metatags
		 */
		var $_metadata = array ();
		
		//Class Functions
		/**
		 * PHP 4 Compatible Constructor
		 */
		function mjd_addthis_xmlns() {
			$this->__construct ();
		}
		/**
		 * PHP 5 Constructor
		 */
		function __construct() {
			//Language Setup
			$locale = get_locale ();
			$mo = plugins_url ( "/languages/" . $this->_localizationDomain . "-" . $locale . ".mo", __FILE__ );
			load_textdomain ( $this->_localizationDomain, $mo );
			//"Constants" setup
			$this->_url = plugins_url ( basename ( __FILE__ ), __FILE__ );
			$this->_urlpath = plugins_url ( '', __FILE__ );
			//Std Actions
			add_action ( 'wp_print_scripts', array (&$this, 'mjd_addthis_xmlns_script' ) );
			//MY Actions
			add_filter ( 'language_attributes', array (&$this, 'add_namespaces' ) );	// Do NOT put it in mjd_addthis_xmlns_init!!
			//Std Actions
			add_action ( "init", array (&$this, "mjd_addthis_xmlns_init" ) );
		}
		function mjd_addthis_xmlns_script() {
			if ( is_admin() ) { // only run when in wp-admin, other conditional tags at http://codex.wordpress.org/Conditional_Tags 
				wp_enqueue_script ( 'jquery' ); // other scripts included with Wordpress: http://tinyurl.com/y875age
				wp_enqueue_script ( 'jquery-validate', 'http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.min.js', array ('jquery' ) );
				wp_enqueue_script ( 'mjd_addthis_xmlns_script', $this->_url . '?mjd_addthis_xmlns_javascript' ); // embed javascript, see end of this file
			}
		}
		function mjd_addthis_xmlns_init() {
				//
		}
		
		function d( $d ) {
			/*
			 * Only output if is_user_logged_in(), e.g. minimize hassles for the normal visitors whilst I'm debugging it!
			 */
			if ( defined('MJDAX_DEBUGMODE') && constant('MJDAX_DEBUGMODE')==TRUE && is_user_logged_in() ) {
				echo "<pre>";
				echo "print_r\n"; print_r ( $d );
				//echo "var_dump\n"; var_dump ( $d );
				echo "</pre>";
			}
		}
		
		// Tag <html xmlns:id=uri>
		function add_namespaces($output) {
			$output .= self::MJD_SPACE 
				. self::MJD_ADDTHIS_NAMESPACE_ID 
				. '=' . self::MJD_DQUOTE . esc_attr ( self::MJD_ADDTHIS_NAMESPACE_URI ) . self::MJD_DQUOTE 
				. self::MJD_SPACE;
			return $output;
		}
	} //End Class
} //End if class exists statement

//
// MAIN PHP CODE
//
//
if ( isset($_GET ['mjd_addthis_xmlns_javascript']) ) {
	//embed my javascript (invoked during the 2nd phase)
	Header ( "content-type: application/x-javascript" );
	echo <<<ENDJS
/**
* @desc mjd-addthis-xmlns
* @author Rolf - http://www.yahoo.com/
*/

jQuery(document).ready(function(){
	// add your jquery code here

});

ENDJS;
} else {
	if (class_exists ( 'mjd_addthis_xmlns' )) {
		$mjd_addthis_xmlns_var = new mjd_addthis_xmlns ();
	}
}
?>