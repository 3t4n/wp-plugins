<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://theinnovs.com
 * @since             1.0.0
 * @package           Hr_Performance
 *
 * @wordpress-plugin
 * Plugin Name:       HR Performance
 * Plugin URI:        https://wordpress.org/plugins/hr-performance
 * Description:       Evaluate the performance of Human Resources easily.
 * Version:           1.0.0.2
 * Author:            TheInnovs
 * Author URI:        https://theinnovs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hr-performance
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
define( 'HR_PERFORMANCE_VERSION', '1.0.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hr-performance-activator.php
 */
function activate_hr_performance() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hr-performance-activator.php';
	Hr_Performance_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hr-performance-deactivator.php
 */

$isActive = true;
function deactivate_hr_performance() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hr-performance-deactivator.php';
	Hr_Performance_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hr_performance' );
register_deactivation_hook( __FILE__, 'deactivate_hr_performance' );



/**
 * Checks if the Innovs HRM plugin is activated
 *
 * If the Innovs HRM plugin is not active, then don't allow the
 * activation of this plugin.
 */

function hr_performance_is_not_active_innovs_hrm() {

	$plugin_url = self_admin_url( 'plugin-install.php?s=hrm+theinnovs&tab=search&type=term' );
	if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
	  include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	}
	if ( current_user_can( 'activate_plugins' ) && ! class_exists( 'Innovs_Hrm' ) ) {
	  // Deactivate the plugin.
	  deactivate_plugins( plugin_basename( __FILE__ ) );
	  // Throw an error in the WordPress admin console.
	  ?>
		<p><?php _e( 'Need to install and activate the core plugin Innovs HRM <button><a href=" '. $plugin_url .' " target="_blank" class="hr-error-smg"> Active & Install </a></button> to work properly <strong>HR Performance</strong> Plugin', 'hrm' ); ?></p>
	  <?php
	 
	  die(); 
	}
  }
  register_activation_hook( __FILE__, 'hr_performance_is_not_active_innovs_hrm' );
  
function hr_performance_depends_notices() {
	$plugin_url = self_admin_url( 'plugin-install.php?s=hrm+theinnovs&tab=search&type=term' );
	$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	if ( !in_array( 'innovs-hr-manager/innovshrm.php', $active_plugins ) ) {

		?>
			<div class="notice notice-error is-dismissible hr_performance_notice">
				<p><?php _e( 'Need to install and activate the core plugin <a href=" '. $plugin_url .' ">Innovs HRM – Easy Human Resource Management System for Your Business</a> to work properly <strong>HR Performance</strong> Plugin', 'hrm' ); ?></p>
			</div>
		<?php
		
	}
}
add_action( 'admin_notices', 'hr_performance_depends_notices' );

/**
 * Pro version deactive notice when free version is deativeated
 */

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hr-performance.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hr_performance() {

	$plugin = new Hr_Performance();
	$plugin->run();

}
run_hr_performance();
