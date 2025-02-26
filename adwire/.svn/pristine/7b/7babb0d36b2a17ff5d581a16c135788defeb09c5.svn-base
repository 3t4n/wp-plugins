<?php

	/**
	 * Adwire Plugin
	 *
	 * @package           adwire/adwire-wp
	 * @author            adwire.dev
	 * @copyright         2021 adwire.dev
	 * @license           GPL-2.0-or-later
	 *
	 * Plugin Name:       Adwire
	 * Plugin URI:        https://www.adwire.dev/wordpress-plugin
	 * Description:       An easy way to monetize embedded YouTube videos on your website.
	 * Version:           0.3.0
	 * Requires at least: 5.0
	 * Requires PHP:      7.4
	 * Text Domain:       adwire
	 * Author:            adwire.dev
	 * Author URI:        https://www.adwire.dev
	 * License:           GPL v2 or later
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 */

	declare( strict_types = 1 );

	if ( ! defined( 'ABSPATH' ) ) {
		exit( 1 );
	}

	require_once __DIR__ . '/includes/AdwirePlugin.class.inc';

	use Adwire\WordPress\Plugins\AdwirePlugin;

	AdwirePlugin::$directory_path    = plugin_dir_path( __FILE__ );
	AdwirePlugin::$basename          = plugin_basename( __FILE__ );
	AdwirePlugin::$version           = get_file_data( AdwirePlugin::$directory_path . basename( AdwirePlugin::$basename ), array( 'version' => 'Version' ) )['version'];
	AdwirePlugin::$wordpress_version = get_bloginfo( 'version' );
	AdwirePlugin::run();
