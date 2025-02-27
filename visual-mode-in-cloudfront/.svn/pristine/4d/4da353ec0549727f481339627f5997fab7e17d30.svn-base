<?php
/**
 * Plugin Name:     Enable Visual Mode in CloudFront
 * Version: 1.0.3
 * Plugin URI:      https://github.com/kawax/visual-mode-in-cloudfront
 * Description:     Enable Visual Mode in CloudFront
 * Author:          kawax
 * Author URI:      https://github.com/kawax
 * License:         GPLv2 or later
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.html
 *
 */

add_filter('user_can_richedit', function () {
	global $wp_rich_edit;

	if (get_user_option('rich_editing') == 'true' || !is_user_logged_in()) {
		if ($_SERVER['CloudFront-Is-Desktop-Viewer'] === 'true') {
			$wp_rich_edit = true;
		}

		return true;
	}

	$wp_rich_edit = false;

	return false;
}, 100);
