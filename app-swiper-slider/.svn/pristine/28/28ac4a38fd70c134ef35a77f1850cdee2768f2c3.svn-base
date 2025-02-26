<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/nababurbd/
 * @since             1.0.0
 * @package           App_Swiper_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       App Swiper Slider
 * Plugin URI:        https://wordpress.org/plugins/app-swiper-slider/
 * Description:       Easily create stunning, responsive, and touch-friendly sliders to showcase your mobile app screens. Perfect for modern designs, the plugin supports swipe gestures, smooth animations, and seamless integration with any WordPress theme. Use this shortcode => [appswiperslider]
 * Version:           1.0.6
 * Author:            Nababur
 * Author URI:        https://profiles.wordpress.org/nababurbd/#content-plugins
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       app-swiper-slider
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('APPSWIPERSLIDER_APP_SWIPER_SLIDER_VERSION', '1.0.6');
define('APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH', plugin_dir_path(__FILE__));
define('APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_URL', plugin_dir_url(__FILE__));
define('APPSWIPERSLIDER_APP_SWIPER_SLIDER_BASENAME', plugin_basename(__FILE__));


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-app-swiper-slider-activator.php
 */
function appswiperslider_app_swiper_slider_activate()
{
	require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'includes/class-app-swiper-slider-activator.php';
	Appswiperslider_App_Swiper_Slider_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-app-swiper-slider-deactivator.php
 */
function appswiperslider_app_swiper_slider_deactivate()
{
	require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'includes/class-app-swiper-slider-deactivator.php';
	Appswiperslider_App_Swiper_Slider_Dactivator::deactivate();
}

register_activation_hook(__FILE__, 'appswiperslider_app_swiper_slider_activate');
register_deactivation_hook(__FILE__, 'appswiperslider_app_swiper_slider_deactivate');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-app-swiper-slider.php';


/**
 * Redirect to the help page after plugin activation.
 *
 * @param string $plugin The activated plugin's basename.
 */
function appswiperslider_swiper_slider_load_redirect_callback($plugin)
{
	// Check if the activated plugin is this plugin
	if ($plugin === APPSWIPERSLIDER_APP_SWIPER_SLIDER_BASENAME) {
		// Redirect to the help page
		wp_safe_redirect(admin_url('edit.php?post_type=appswiperslider&page=swiper-slider-helper'));
		exit;
	}
}
add_action('activated_plugin', 'appswiperslider_swiper_slider_load_redirect_callback');



/**
 * Add custom action links to the plugin's row on the Plugins page.
 *
 * @param array $links Existing action links for the plugin.
 * @return array Modified action links.
 */
function appswiperslider_swiper_slider_plugin_action_links($links)
{
	// Add "Go Pro" link
	$links[] = '<a class="tc-pro-link" href="https://www.wpdecent.com/plugins" target="_blank" rel="noopener noreferrer">' . __('More Plugins!', 'app-swiper-slider') . '</a>';

	// Add "More Plugins" link
	$links[] = '<a href="https://api.whatsapp.com/send?phone=8801717090233" target="_blank" rel="noopener noreferrer">' . __('DM Me', 'app-swiper-slider') . '</a>';

	return $links;
}
add_filter('plugin_action_links_' . APPSWIPERSLIDER_APP_SWIPER_SLIDER_BASENAME, 'appswiperslider_swiper_slider_plugin_action_links');


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function appswiperslider_app_swiper_slider_run()
{

	$plugin = new Appswiperslider_App_Swiper_Slider();
	$plugin->appswiperslider_swiper_slider_run();
}
appswiperslider_app_swiper_slider_run();
