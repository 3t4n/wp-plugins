<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Dynamic Donations
 * Plugin URI:        https://pluginswithpurpose.com/dynamic-donations
 * Description:		  Easy and powerful WordPress plugin for donations or fundraising management.
 * Version:           1.2.3
 * Author:            Plugins with Purpose
 * Author URI:        https://pluginswithpurpose.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dynamic-donations
 * Domain Path:       /languages
 *
 * 
 * Copyright (C) 2022, pluginswithpurpose.com - info@pluginswithpurpose.com
*/


defined( 'ABSPATH' ) || exit;

/**
 * Currently plugin name.
 */
if ( ! defined( 'DYDO_NAME' ) ) {
	define( 'DYDO_NAME', 'dydo' );
}

/**
 * Currently plugin version.
 */
if ( ! defined( 'DYDO_VERSION' ) ) {
	define( 'DYDO_VERSION', '1.2.3' );
}

/**
 * Currently plugin textdomain.
 */
if ( ! defined( 'DYDO_TEXTDOMAIN' ) ) {
	define( 'DYDO_TEXTDOMAIN', 'dynamic-donations' );
}

/**
 * Includes Path.
 */
if ( ! defined( 'DYDO_INCLUDES_PATH' ) ) {
	define( 'DYDO_INCLUDES_PATH', dirname( __FILE__ ) . '/includes' );
}

/**
 * Includes Path.
 */
if ( ! defined( 'DYDO_INCLUDES_URI' ) ) {
	define( 'DYDO_INCLUDES_URI', plugin_dir_url( __FILE__ ) . '/includes' );
}

/**
 * Assets Path.
 */
if ( ! defined( 'DYDO_ASSETS_PATH' ) ) {
	define( 'DYDO_ASSETS_PATH', dirname( __FILE__ ) . '/assets' );
}

/**
 * Assets URI.
 */
if ( ! defined( 'DYDO_ASSETS_URI' ) ) {
	define( 'DYDO_ASSETS_URI', plugin_dir_url( __FILE__ ) . 'assets' );
}

/**
 * Texts.
 */
if ( ! defined( 'DYDO_TEXTS' ) ) {
	define( 'DYDO_TEXTS', require_once DYDO_INCLUDES_PATH . '/translation-frontend.php' );
}

/**
 * Mail templates.
 */
if ( ! defined( 'DYDO_MAIL_TEMPLATES_PATH' ) ) {
	define( 'DYDO_MAIL_TEMPLATES_PATH', DYDO_INCLUDES_PATH . '/mail-templates/' );
}

/**
 * i18n Path.
 */
if ( ! defined( 'DYDO_I18N_PATH' ) ) {
	define( 'DYDO_I18N_PATH', dirname( __FILE__ ) . '/i18n' );
}

const PWP_SITE_BASE_URL          = 'https://pluginswithpurpose.com';
const PWP_SITE_LICENSES_ENDPOINT = '/pwp/v1/licenses';
const PWP_LICENSE_DEFAULT        = array(
	'key'         => '',
	'product_id'  => '',
	'installable' => true,
	'status'      => 'uncompleted',
);

const PWP_SITE_API_VERSION = 'v1/';
const PWP_SITE_API_PREFIX  = 'dydo/' . PWP_SITE_API_VERSION;

/**
 * Require
 */
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

require_once DYDO_INCLUDES_PATH . '/class-dydo-activator.php';
require_once DYDO_INCLUDES_PATH . '/class-dydo-deactivator.php';
require_once DYDO_INCLUDES_PATH . '/class-dydo.php';

/**
 * Run Activate and Deactivate
 */
register_activation_hook( __FILE__, array( DyDo_Activator::class, 'activate' ) );
register_deactivation_hook( __FILE__, array( DyDo_Deactivator::class, 'deactivate' ) );

/**
 * Run Plugin
 */
DyDo::getInstance()->init();
