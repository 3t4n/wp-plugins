<?php
/**
 * [Short description]
 *
 * @package    DEVRY\MLR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.5
 */

namespace DEVRY\MLR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

function mlr_register_setting_fields() {
	register_setting( MLR_SETTINGS_SLUG, 'mlr_compact_mode', __NAMESPACE__ . '\mlr_sanitize_compact_mode' );
}

add_action( 'admin_init', __NAMESPACE__ . '\mlr_register_setting_fields' );
