<?php
namespace WP360view\Helper;

/**
 * Log the messages and errors
 * 
 * @since      1.0.0
 *
 * @package    WP360view
 * @subpackage WP360view\Helper
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wp360view_Log {
 	 
	/**
	 * Create log file  
	 */
	public static function logmessage( $desc ) {   

		$time = date( "F jS Y, H:i", time()+25200 );
		$ban = "#$time\r\n$desc\r\n"; 
		$file = WP360VIEW_PLUGIN_DIR . '/errorsfile.txt'; 
		if(!is_writable($file)) {
			return;
		} 
		$open = fopen( $file, "a" ); 
		$write = fputs( $open, $ban );  
		fclose( $open );
	}

}
