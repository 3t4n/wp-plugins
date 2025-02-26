<?php
/**
 * Init
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load files.
require_once AIOC_DIR . '/inc/admin/admin.php';
require_once AIOC_DIR . '/inc/admin/option.php';
require_once AIOC_DIR . '/inc/admin/fields/helper.php';
require_once AIOC_DIR . '/inc/admin/fields/captcha-general-fields.php';
require_once AIOC_DIR . '/inc/admin/fields/captcha-integration-fields.php';
require_once AIOC_DIR . '/inc/admin/fields/login-setting-fields.php';
require_once AIOC_DIR . '/inc/admin/admin-ajax.php';
require_once AIOC_DIR . '/inc/setup.php';
require_once AIOC_DIR . '/inc/core.php';
require_once AIOC_DIR . '/inc/utils.php';
require_once AIOC_DIR . '/inc/validation/validation-hooks.php';
require_once AIOC_DIR . '/inc/validation/helper.php';
require_once AIOC_DIR . '/inc/validation/validation.php';
