<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

define( __NAMESPACE__ . '\ACFC_SETTINGS_SLUG', 'acfc_settings' );

require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-menu.php';
require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-page.php';
require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-actions.php';
require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-register.php';

require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/compact-mode.php';
require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/disable-field-group-addons.php';
require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/disable-livepreview.php';
require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/livepreview-mode.php';
require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/types-supported.php';
require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/user-access.php';
