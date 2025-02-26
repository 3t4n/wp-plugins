<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.3
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

// The slug for plugin main page.
define( __NAMESPACE__ . '\ELEMSNR_SETTINGS_SLUG', 'elemsnr_settings' );

require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-menu.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-page.php';
require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-register.php';

require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/compact-mode.php';
