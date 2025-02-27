<?php defined( 'ABSPATH' ) || exit;
/*
Version: 2.3.0
Date: 04-04-2024
Author: Maxim Glazunov
Author URI: https://icopydoc.ru 
License: GPLv2
Description: This code helps ensure backward compatibility with older versions of the plugin.
*/

/**
 * Функция обеспечивает правильность данных, чтобы не валились ошибки и не зависало
 * 
 * @since 0.1.0
 * 
 * @return bool
 */
function validation_variable( $args, $p = 'xfavip' ) {
	$is_string = common_option_get( 'woo_' . 'hook_isc' . $p );
	if ( $is_string == '202' && $is_string !== $args ) {
		return true;
	} else {
		return false;
	}
}
