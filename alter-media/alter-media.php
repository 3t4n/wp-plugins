<?php
/**
 * Plugin Name:       Alter Media
 * Plugin URI:        https://matterwp.com/plugins/alter
 * Description:       A WordPress plugin to filter media library by alternative text and caption.
 * Version:           1.0.1
 * Author:            MatterWP
 * Author URI:        https://matterwp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       alter-media
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the Init class
// This class is responsible for initializing the plugin.
use Alter\Core\Init;
use Alter\Core\Activator;
use Alter\Core\Deactivator;
use MatterWP\WPSubscriptionManager\SubscriptionManagerFactory;

// Include the Composer autoload file.
// This file is responsible for loading all the classes and dependencies.
require __DIR__ . '/vendor/autoload.php';

/**
 * Global Definitions.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ALTER_NAME', 'alter-media' );
define( 'ALTER_VERSION', '1.0.1' );
define( 'ALTER_FILE', __FILE__ );
define( 'ALTER_PLUGIN_DIR', trailingslashit( dirname( ALTER_FILE ) ) );
define( 'ALTER_PLUGIN_URL', trailingslashit( plugin_dir_url( ALTER_FILE ) ) );
define( 'ALTER_PLUGIN_BASE', plugin_basename( ALTER_FILE ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 */
register_activation_hook(
	__FILE__,
	function () {
		Activator::run();
	}
);

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 */
register_deactivation_hook(
	__FILE__,
	function () {
		Deactivator::run();
	}
);

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
add_action(
	'plugins_loaded',
	function () {
		Init::instance();

		SubscriptionManagerFactory::create(
			array(
				'plugin_slug'            => 'alter-media',
				'plugin_name'            => 'Alter',
				'after_subscription_url' => admin_url( 'upload.php' ),
				'version'                => ALTER_VERSION,
				'branding'               => array(
					'logo'                => ALTER_PLUGIN_URL . 'assets/images/icon.svg',
					'logo_width'          => '56px',
					'heading'             => 'Thank you for installing Alter!',
					'description'         => 'Join our email list for updates on security and new features! Providing a few details about your WordPress setup will help us optimize the plugin specifically for your site.',
					'button_color'        => '#056196',
					'button_hover_color'  => '#075887',
					'privacy_url'         => 'https://matterwp.com/privacy-policy/',
					'terms_url'           => 'https://matterwp.com/terms-of-service/',
					'button_text'         => 'Proceed & Go to Settings',
					'button_loading_text' => 'Processing...',
					'button_success_text' => 'Subscribed successfully',
				),
			)
		);
	}
);
