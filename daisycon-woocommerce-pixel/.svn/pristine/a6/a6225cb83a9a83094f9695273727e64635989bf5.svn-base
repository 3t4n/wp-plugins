<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://www.daisycon.com
 * @since             1.0.0
 * @package           Daisycon_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Daisycon WooCommerce pixel
 * Plugin URI:        https://www.daisycon.com/nl/tools/woocommerce-conversie-pixel/
 * Description:       This plugin will automatically add the Daisycon Pixel to the WooCommerce success page
 * Version:           2.2.1
 * Author:            daisycon
 * Author URI:        https://www.daisycon.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       daisycon-woocommerce
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC'))
{
	die;
}

require __DIR__ . '/autoload.php';
spl_autoload_register('Daisycon_WooCommerce_Autoload::loadClass');

define('DAISYCON_PLUGIN_URL_REDIRECT', true === isset($_ENV['AT_DEV']) ? 'https://integrations.daisycon.tools.local' : 'https://integrations.daisycon.tools');
define('DAISYCON_PLUGIN_URL_SERVER_TO_SERVER', true === isset($_ENV['AT_DEV']) ? 'http://integrations.daisycon.tools' : 'https://integrations.daisycon.tools');
define('DAISYCON_DEBUG_LOG', false);

$onSettingsPage = ($_GET['page'] ?? null) === 'daisycon-woocommerce';
if ($onSettingsPage && false === headers_sent()) {
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
}

/**
 * Currently plugin version.
 */
const DAISYCON_PLUGIN_VERSION = '2.2.1';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-daisycon-woocommerce-activator.php
 */
function activate_daisycon_woocommerce()
{
	Daisycon_Woocommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-daisycon-woocommerce-deactivator.php
 */
function deactivate_daisycon_woocommerce()
{
	Daisycon_Woocommerce_Activator::deactivate();
}

function daisycon_woocommerce_loaded() {
	$onSettingsPage = ($_GET['page'] ?? null) === 'daisycon-woocommerce';
	if (!$onSettingsPage) {
		return;
	}
	activate_daisycon_woocommerce();
}

register_activation_hook(__FILE__, 'activate_daisycon_woocommerce');
register_deactivation_hook(__FILE__, 'deactivate_daisycon_woocommerce');
add_action('plugins_loaded', 'daisycon_woocommerce_loaded');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_daisycon_woocommerce()
{
	$plugin = new Daisycon_Woocommerce();
	$plugin->run();
}

run_daisycon_woocommerce();

/**
 * Get and set all languages from this website (collect and clean them)
 *
 * @since  1.6.1
 * @return array
 */
function daisycon_languages(): array
{
	$languages = [];

	// Add available languages (probably not needed, so since 1.6.1 disabled)
	#$languages = get_available_languages() ?? []; // probably not needed, so now removed

	// Add current locale
	$languages[] = get_locale();

	// Add WPML locales if set
	$wpmlLanguages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc') ?? [];
	if (false === empty($wpmlLanguages))
	{
		$languages = array_unique(array_merge($languages, array_column($wpmlLanguages, 'default_locale')));
	}

	return array_unique($languages);
}

/**
 * Get the name options of a field inside the daisycon pixel
 * Due different variable names (through updates), all names will be returned here, to provide the biggest chance on data!
 *
 * @param string $name
 * @param bool $name_contains_locale
 * @param string $locale
 *
 * @since  1.6.1
 * @return array
 */
function daisycon_name_options(string $name, bool $name_contains_locale = false, string $locale = null): array
{
	if (true === empty($name)) {
		echo 'The original value is not set';
	}

	if (false === $name_contains_locale && true === empty($locale)) {
		echo 'The name settings are not correct. name_contains_locale or locale should be updated.';
	}

	// Strip the locale from the name and collect the locale (to re-attach it later again)
	if (true === $name_contains_locale) {
		foreach (daisycon_languages() as $language) {
			if (false === empty(stripos($name, $language))) {
				$name = str_replace('_' . $language,'', $name);
				$locale = $language;
			}
		}
	}

	return [
		$name . '_' . $locale,               // >= v1.6.1
		'daisycon_' . $name . '_' . $locale, //  = v1.6
		'daisycon_' . $name,                 //  < v1.6
		$name,                               //  < v1.6
	];
}

/**
 * Get a setting value
 *
 * @param string|array $setting
 * @param array $content
 *
 * @return mixed
 */
function daisycon_get_setting_value($setting, array $content = [])
{
	if (true === empty($setting))
	{
		return null;
	}

	// First try the new method
	if (false === is_array($setting)) {
		$content = get_option('daisycon_woocommerce_options');

		// If general section exists, new settings are in effect
		if (true === isset($content['general'])) {
			$locale = get_locale();
			$matchingSettings = array_filter(
				$content['custom'] ?? [],
				function ($entry) use ($locale) {
					return in_array($locale, ($entry['languages'] ?? []));
				}
			);
			$matchingSetting = count($matchingSettings) > 0 ? reset($matchingSettings) : null;
			return $matchingSetting[$setting] ?? $content['general'][$setting] ?? null;
		}
	}

	// When no array is supplied, we'll make it an array with all name options
	if (false === is_array($setting))
	{
		$setting = daisycon_name_options($setting, false, get_locale());
	}

	// When there is already content delivered, we don't have to search it again
	if (true === empty($content))
	{
		$content = get_option('daisycon_woocommerce_options');
	}

	if (true === empty($content)) {
		return null;
	}

	foreach ($setting as $name) {
		if (true === isset($content[$name])) {
			return (true === is_array($content[$name]) ? $content[$name][0] : $content[$name]);
		}
	}
	return null;
}

// Verify HMAC hook
add_action(
	'rest_api_init',
	function () {
		register_rest_route(
			'daisycon-woocommerce/v2',
			'/verify-hmac/(?P<hmac>[^/]+)',
			[
				'methods' => 'GET',
				'callback' => 'daisycon_woocommerce_verify_hmac_callback',
				'permission_callback' => '__return_true',
				'args' => array(
					'hmac' => array(
						'validate_callback' => function($param, $request, $key) {
							return is_string( $param );
						}
					),
				),
			]
		);
	}
);

function daisycon_woocommerce_verify_hmac_callback(WP_REST_Request $request) {
	$hmacVerificationService = new Daisycon_Hmac_Verification_Service();
	$hmacVerificationService->verifyHmac($request['hmac']);
}
