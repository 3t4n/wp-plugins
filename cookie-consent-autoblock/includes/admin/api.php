<?php
/**
 * WP-SpruceJoy Admin API Functions
 * 
 * This file is part of the WP-SpruceJoy plugin by SpruceJoy
 * You can find out more about this plugin at https://sprucejoy.com
 * Copyright (c) 2020-2021  SpruceJoy
 * WP-SpruceJoy(tm) is a trademark of sprucejoy.com
 *
 * @package WP-SpruceJoy
 * @author SpruceJoy
 * @copyright 2020-2021
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}


/**
 * Wrapper for form_post_url().
 *
 * @global object $wpsj The WP_Sprucejoy Object.
 * @param  string $tab   The plugin tab being displayed.
 * @param  mixed  $args  Array of additional arguments|boolean. Default: false.
 * @return string $url
 */
function wpsprucejoy_admin_form_post_url( $args = false ) {
	global $wpsj;
	return $wpsj->admin->form_post_url( $args );
}
