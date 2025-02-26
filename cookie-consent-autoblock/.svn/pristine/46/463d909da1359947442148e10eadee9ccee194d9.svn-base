<?php
/**
 * WP-SpruceJoy API Functions
 * 
 * This file is part of the WP-SpruceJoy plugin by SpruceJoy
 * You can find out more about this plugin at https://sprucejoy.com
 * Copyright (c) 2020-2021  SpruceJoy
 * WP-SpruceJoy(tm) is a trademark of sprucejoy.com
 *
 * @package WP-SpruceJoy
 * @subpackage WP-SpruceJoy API Functions
 * @author SpruceJoy 
 * @copyright 2020-2021
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Utility function to validate $_POST, $_GET, and $_REQUEST.
 *
 * While this function retrieves data, remember that the data should generally be
 * sanitized or escaped depending on how it is used.
 *
 *
 * @param  string $tag     The form field or query string.
 * @param  string $default The default value (optional).
 * @param  string $type    post|get|request (optional).
 * @return string 
 */
function wpsprucejoy_get( $tag, $default = '', $type = 'post' ) {
	switch ( $type ) {
		case 'get':
			return ( isset( $_GET[ $tag ] ) ) ? sanitize_text_field($_GET[ $tag ]) : $default;
			break;
		case 'request':
			return ( isset( $_REQUEST[ $tag ] ) ) ? sanitize_text_field($_REQUEST[ $tag ]) : $default;
			break;
		default: // case 'post':
			return ( isset( $_POST[ $tag ] ) ) ? sanitize_text_field($_POST[ $tag ]) : $default;
			break;
	}
}
// End of file.