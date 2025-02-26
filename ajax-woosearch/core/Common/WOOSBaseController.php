<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Common;

class WOOSBaseController {
	
	public function woos_last_code()
	{
		$option = get_option( 'woos_wp_search' );
		return isset( $option ) && $option == 'last_code_woos' ? true : false;
	}
	public function woos_wp_version_check() {
		$wp_version = get_bloginfo( 'version' );
		return ! version_compare( $wp_version, '4.9', '<' ) ? true : false;
	} 
}