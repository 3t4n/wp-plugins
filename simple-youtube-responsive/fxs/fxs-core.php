<?php
/************************
 * Simple Youtube Responsive - Core funtions
 ************************/

// Prevent accessed directly
if ( !defined('ABSPATH') ){
	die;
}


// Strong to Boolean 
if( ! function_exists( 'eirudo_ytrp_stringtobool' ) ){
	function eirudo_ytrp_stringtobool( $string ){
		if( is_bool( $string ) ){
			return $string; //skip the convert, return the value instead
		} else {
			$string = strtolower( $string );
			switch( $string ){
				case 'yes':
					return true;
					break;
				case 'no':
					return false;
					break;
				case 'true':
					return true;
					break;
				case 'false':
					return false;
					break;
				case '1':
					return true;
					break;
				case '0':
					return false;
					break;
				case 1:
					return true;
					break;
				case 0:
					return false;
					break;
				case 'null':
					return false;
					break;
				case 'undefined':
					return false;
					break;
				default:
					return false;
					break;
			}
		}
	}
}

// Bool to int 
if( ! function_exists( 'eirudo_ytrp_booltoint' ) ){
	function eirudo_ytrp_booltoint( $bool ){
		if( is_bool($bool) ){
			if( $bool ){
				return 1;
			}else{
				return 0;
			}
		}else{
			return $bool;
		}
	}
}


// Check update first 
require_once( EIRUDO_YTRESPONSIVE_DIR . 'fxs/fxs-updater.php' );

// Load admin area
require_once( EIRUDO_YTRESPONSIVE_DIR . 'admin/admin-options.php' );
require_once( EIRUDO_YTRESPONSIVE_DIR . 'admin/admin-shortcode.php' );
require_once( EIRUDO_YTRESPONSIVE_DIR . 'admin/admin-about.php' );

// Prepare settings as global vars so we don't need call from database everytime
$GLOBALS['erdyt_options'] = get_option( '_erdyt_options', eirudo_ytrp_default_settings() );

// Shortcode
require_once( EIRUDO_YTRESPONSIVE_DIR . 'fxs/fxs-shortcode.php' );

// Backend
require_once( EIRUDO_YTRESPONSIVE_DIR . 'fxs/fxs-backend.php' );

// Frontend
require_once( EIRUDO_YTRESPONSIVE_DIR . 'fxs/fxs-frontend.php' );