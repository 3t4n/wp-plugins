<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://puredevs.com
 * @since             1.0.0
 * @package           Secure_User_Registration_by_PureDevs
 *
 * @wordpress-plugin
 * Plugin Name:       Secure User Registration by PureDevs
 * Description:       The plugin enhances a site's security by implementing layers of security to the user registration forms, safeguarding the site from attacks like CSRF.
 * Version:           1.0.0
 * Author:            puredevs
 * Author URI:        https://puredevs.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       secure-user-registration-by-puredevs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PDSRW_VERSION', '1.0.0' );
define( 'PDSRW_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-secure-user-registration-by-puredevs-activator.php
 */
function pdsrw_activate_Secure_User_Registration_by_PureDevs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-secure-user-registration-by-puredevs-activator.php';
	Pdsrw_Secure_User_Registration_by_PureDevs_Activator::pdsrw_activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-secure-user-registration-by-puredevs-deactivator.php
 */
function pdsrw_deactivate_Secure_User_Registration_by_PureDevs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-secure-user-registration-by-puredevs-deactivator.php';
	Pdsrw_Secure_User_Registration_by_PureDevs_Deactivator::pdsrw_deactivate();
}

register_activation_hook( __FILE__, 'pdsrw_activate_Secure_User_Registration_by_PureDevs' );
register_deactivation_hook( __FILE__, 'pdsrw_deactivate_Secure_User_Registration_by_PureDevs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-secure-user-registration-by-puredevs.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

add_action( 'plugins_loaded', 'pdsrw_safe_registration_install', 12 );

if ( !function_exists( 'pdsrw_safe_registration_admin_notice' ) ) {
    /**
     *  Show an admin notice if Registration is Deactivated
     *
     */
    function pdsrw_safe_registration_admin_notice(){
        ?>
		<div class="error">
			<p>
				<?php 
					echo wp_kses_post( 'Secure User Registration by PureDevs is enabled but not effective. In order to work it requires <a href="'.get_admin_url().'options-general.php#users_can_register">enable</a> user registration.', 'secure-user-registration-by-puredevs' ); 
					if ( function_exists( 'WC' ) ) {
						echo wp_kses_post( 'Also you can allow customers to create an account on the "My account" page from <a href="'.get_admin_url().'admin.php?page=wc-settings&tab=account">here</a>.', 'secure-user-registration-by-puredevs' );
					}
				?>
			</p>
		</div>
		<?php 
    }

}

function pdsrw_run_Secure_User_Registration_by_PureDevs() {
	$plugin = new Pdsrw_Secure_User_Registration_by_PureDevs();
	$plugin->pdsrw_run();
}

function pdsrw_safe_registration_install() {
	if ( get_option( 'users_can_register' ) || ( get_option( 'woocommerce_enable_myaccount_registration' ) == 'yes' || get_option( 'woocommerce_enable_myaccount_registration' ) == 1 ) ) {
		pdsrw_run_Secure_User_Registration_by_PureDevs();
	}else{
		add_action( 'admin_notices', 'pdsrw_safe_registration_admin_notice' );
	}
}
