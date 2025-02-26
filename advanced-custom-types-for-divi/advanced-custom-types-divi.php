<?php
/**
 * @link              http://capellopablo.com
 * @since             1.0.0
 * @package           ACT_Divi
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Custom Types for Divi
 * Plugin URI:        https://www.advancedcustomtypes.io
 * Description:       Advanced custom types for Divi theme and Divi builder.
 * Version:           1.0.1
 * Author:            Pablo Capello
 * Author URI:        http://capellopablo.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       act-divi
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( is_plugin_active('advanced-custom-types-divi-pro/advanced-custom-types-divi-pro.php') ) {
    deactivate_plugins( plugin_basename( __FILE__ ) );
    add_action( 'admin_notices', function (){ ?>
        <div class="updated notice">
            <p><?php _e( "Advanced Custom Types for Divi was deactivated because <span style='font-weight: bold;'>ACT for Divi PRO</span> is active", 'actd' ); ?></p>
        </div>
        <?php
    });
    return;
}


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ACTD_VERSION', '1.0.1' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-act-divi-activator.php
 */
function activate_act_divi() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-act-divi-activator.php';
    ACT_Divi_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-act-divi-deactivator.php
 */
function deactivate_act_divi() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-act-divi-deactivator.php';
    ACT_Divi_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_act_divi' );
register_deactivation_hook( __FILE__, 'deactivate_act_divi' );



/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-act-divi.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_act_divi() {

    $plugin = new ACT_Divi();
    $plugin->run();

}

if ( version_compare(PHP_VERSION, '5.6', '<') ) {
    add_action( 'admin_notices', function (){ ?>
        <div class="notice notice-error">
            <p><?php _e( "Goodness! Your PHP version is either too old or not recommended to use Advanced Custom Types for Divi! We are not going to load anything on your WordPress unless you update your PHP. Do you know by using Advanced Custom Types for Divi, you can create even more stunning and amazing site with it? Learn more about the WordPress requirements <a href='https://wordpress.org/about/requirements/'>here</a>.<br><br>Current PHP version is: <span style='color:red; font-weight: bold;'>" . PHP_VERSION . "</span><br><span style='color:green; font-weight: bold;''>Recommended PHP version</span>: 7 and above but 5.6 is fine too but why use an older version? Unless you're not living in the future.", 'actd' ); ?></p>
        </div>
        <?php
    });
    return;
} else {
    run_act_divi();
}