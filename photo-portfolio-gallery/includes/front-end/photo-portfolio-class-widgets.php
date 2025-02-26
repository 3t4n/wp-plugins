<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Class Photo_Gallery_Widgets
 */
class Photo_Gallery_Widgets{

	/**
	 * Register web-pace Photo Portfolio Widget
	 */
	public static function init(){
		register_widget( 'Photo_Gallery_Widget' );
	}
}
