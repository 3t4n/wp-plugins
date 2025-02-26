<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name:       ASIN Smart Links
 * Description:       Generate Amazon universal links to redirect users to the Amazon site of their country.
 * Version:           1.1.0
 * Author:            Sirvelia
 * Author URI:        https://sirvelia.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       asin-smart-links
 * Domain Path:       /languages
 */

// Direct access, abort.
if (!defined('WPINC')) {
	die('YOU SHALL NOT PASS!');
}

define('ASINSMARTINTERNATIONALLINKS_VERSION', '1.1.0');
define('ASINSMARTINTERNATIONALLINKS_PATH', plugin_dir_path(__FILE__));
define('ASINSMARTINTERNATIONALLINKS_BASENAME', plugin_basename(__FILE__));
define('ASINSMARTINTERNATIONALLINKS_URL', plugin_dir_url(__FILE__));

require_once ASINSMARTINTERNATIONALLINKS_PATH . 'vendor/autoload.php';

register_activation_hook(__FILE__, function () {
	AsinSmartInternationalLinks\Includes\Activator::activate();
});

register_deactivation_hook(__FILE__, function () {
	AsinSmartInternationalLinks\Includes\Deactivator::deactivate();
});

//LOAD ALL PLUGIN FILES
$loader = new AsinSmartInternationalLinks\Includes\Loader();
