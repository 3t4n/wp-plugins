<?php
/**
 * Plugin Name: Radio Buttons and Swatches for WooCommerce
 * Plugin URI:  https://wordpress.org/plugins/variations-radio-buttons-for-woocommerce/
 * Description: Increase conversions by displaying beautiful radio buttons and swatches.
 * Author:      OneTeamSoftware
 * Author URI:  https://1teamsoftware.com
 * Text Domain: variations-radio-buttons-for-woocommerce
 * Version:     1.1.21
 * Tested up to: 6.7
 * Requires PHP: 7.3
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Copyright: © 2024 FlexRC, 604-1097 View St, V8V 0G9, Canada. Voice 604 800-7879
 */

namespace OneTeamSoftware\WooCommerce\VariationsRadioButtons;

defined('ABSPATH') || exit;

require_once(__DIR__ . '/includes/autoloader.php');

if (class_exists(__NAMESPACE__ . '\\Plugin')) {
	(new Plugin(__FILE__, '1.1.21', __('Radio Buttons and Swatches for WooCommerce', 'variations-radio-buttons-for-woocommerce')))->register();
}
