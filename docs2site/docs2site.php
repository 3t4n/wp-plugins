<?php
/**
 * Plugin Name:     Docs2Site
 * Description:     Docs2Site is the perfect tool for web content writers and editors. Using Docs2Site, you can avoid the hassle of reformatting every Google Docs’ article on WordPress. A single click of a button can export your entire Google Docs article to your WordPress website with the formatting intact. 
 * Author:          Docs2Site
 * Author URI:      https://www.docs2site.com/
 * Text Domain:     docs2site
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Docs2Site
 */

use Docs2Site_Importer\ImporterCore;

defined( 'ABSPATH' ) || exit;

// Include the autoloader.
require_once __DIR__ . '/vendor/autoload.php';

if ( ! defined( 'DOCS2SITE_IMPORTER_PLUGIN_FILE' ) ) {
	define( 'DOCS2SITE_IMPORTER_PLUGIN_FILE', __FILE__ );
}

/**
 * Return the main instance of ImporterCore.
 *
 * @since 1.0.0
 * @return ImporterCore
 */
function RUN_DOCS2SITE_IMPORTER() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
	return ImporterCore::instance();
}

// Global for backwards compatibility.
$GLOBALS['DOCS2SITE_IMPORTER'] = RUN_DOCS2SITE_IMPORTER();
