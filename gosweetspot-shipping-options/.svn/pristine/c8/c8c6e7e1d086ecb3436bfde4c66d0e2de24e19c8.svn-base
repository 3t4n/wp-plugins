<?php
/**
 * Plugin Name:     GoSweetSpot Shipping Options
 * Plugin URI:      https://gosweetspot.com/integrations
 * Description:     A plugin to calculate shipping rates from gosweetspot
 * Author:          GoSweetSpot
 * Author URI:      https://gosweetspot.com
 * Text Domain:     GoSweetSpot
 * Domain Path:     /languages
 * Version:         0.1.6
 * Requires at least: 5.5
 * Tested up to: 6.5
 * WC requires at least: 4.5.0
 * WC tested up to: 8.9
 * Requires PHP: 7.0
 *
 */

defined( 'ABSPATH' ) || exit;

use GSS\Shipping_Options\Utils;

// inlcude config constants
require_once 'constants.php';

// check required wp versions.
require_once GSS_PLUGIN_PATH . 'utils/class-version-check.php';

// $gss_shipping_options_requirements is a global value
if ( ! empty( $gss_shipping_options_requirements ) ):
    Utils\VersionCheck::instance( $gss_shipping_options_requirements );
endif;

// included all the plugin modules.
require_once GSS_PLUGIN_PATH . 'includes/shipping/index.php';
require_once GSS_PLUGIN_PATH . 'services/index.php';

// init the plugin
require_once GSS_PLUGIN_PATH . 'includes/init.php';
