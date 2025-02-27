<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Manages Discounts gateaway includes folder
 *
 * Here includes files are defined and managed.
 *
 * @version        1.0.0
 * @package        woocommerce-catalog-mode/includes
 * @author        Norbert Dreszer
 */

if ( ! function_exists( 'ic_filemtime' ) ) {

	function ic_filemtime( $path ) {
		if ( file_exists( $path ) ) {
			return '?timestamp=' . filemtime( $path );
		}
	}

}

require_once( IC_WOOCAT_BASE_PATH . '/includes/pluggable/class-ic-activation-wizard.php' );
require_once( IC_WOOCAT_BASE_PATH . '/includes/pluggable/settings-functions.php' );
