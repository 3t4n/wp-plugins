<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ibsofts.com
 * @since             5.0.7
 * @package           Ghl_Gf_Extension
 *
 * @wordpress-plugin
 * Plugin Name:       GHL Gravity Bridge – Send Gravity Forms leads to GHL CRM
 * Plugin URI:        https://www.ibsofts.com/wordpress/extensions/go-high-level-gf-extension
 * Description:       This is a powerful extension that streamlines your lead generation process by seamlessly connecting Gravity Forms, one of the leading form builder plugins for WordPress, with Go High Level CRM. This integration allows you to send Gravity Form Data to Go High Level on form submission.
 * Version:           5.0.7
 * Author:            iB Softs
 * Author URI:        https://www.ibsofts.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ghl-gf-extension
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 5.0.7 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('GHL_GF_EXTENSION_VERSION', '5.0.7');
define('GHL_LOCATION_CONNECTED', false);
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ghl-gf-extension-activator.php
 */
function activate_ghl_gf_extension()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-ghl-gf-extension-activator.php';
    Ghl_Gf_Extension_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_ghl_gf_extension');

function ibs_ghlgf_load_plugin()
{
    /* Check If Gravity Form Is Active */

    if (!is_plugin_active('gravityforms/gravityforms.php')) {
        add_action('admin_notices', 'ibs_ghlgf_notice');

        deactivate_plugins(plugin_basename(__FILE__));

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
}
add_action('admin_init', 'ibs_ghlgf_load_plugin');

/**
 * Display an error message when parent plugin is missing
 */
function ibs_ghlgf_notice()
{
?>
<div class="ibs_ghlgf_error">
    <p>
        <strong>Error:</strong>
        <em>Go high level extension for Gravity Form</em> plugin won't execute
        because the required Gravity Forms plugin is not active .
    </p>
</div>
<?php
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ghl-gf-extension-deactivator.php
 */
function deactivate_ghl_gf_extension()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-ghl-gf-extension-deactivator.php';
    Ghl_Gf_Extension_Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_ghl_gf_extension');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-ghl-gf-extension.php';
/**
 * Inclusion of definitions.php
 */
require_once plugin_dir_path( __FILE__ ) . 'definitions.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    5.0.7
 */
function run_ghl_gf_extension()
{

    $plugin = new Ghl_Gf_Extension();
    $plugin->run();
}
run_ghl_gf_extension();