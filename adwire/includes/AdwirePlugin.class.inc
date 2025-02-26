<?php

	declare( strict_types = 1 );

	namespace Adwire\WordPress\Plugins;

	require_once __DIR__ . '/AdwirePluginInjector.class.inc';
	require_once __DIR__ . '/AdwirePluginSettings.class.inc';

	if ( ! defined( 'ABSPATH' ) ) {
		exit( 1 );
	}

	class AdwirePlugin {

		public const PLUGIN_PACKAGE_NAME   = 'adwire-wp';
		public const PLUGIN_NAME           = 'Adwire';
		public const PLUGIN_NAME_SLUG      = 'adwire';
		public const PLUGIN_TEXT_DOMAIN_ID = 'adwire';
		public const PLUGIN_CDN_ENDPOINT   = 'https://cdn.adwire.dev';

		public static string $directory_path;
		public static string $basename;
		public static string $version;
		public static string $wordpress_version;

		public static function run(): void {

			if ( empty( static::$directory_path ) ) {
				throw new Exception( 'AdwirePlugin::$directory_path variable is not set' );
			}

			if ( empty( static::$basename ) ) {
				throw new Exception( 'AdwirePlugin::$basename variable is not set' );
			}

			if ( empty( static::$version ) ) {
				throw new Exception( 'AdwirePlugin::$version variable is not set' );
			}

			if ( empty( static::$wordpress_version ) ) {
				throw new Exception( 'AdwirePlugin::$wordpress_version variable is not set' );
			}

			static::registerActions();

			AdwirePlugin\Injector::run();
			AdwirePlugin\Settings::run();

		}

		public static function registerActions(): void {

			add_action(
				'init',
				array( static::class, 'registerTextDomain' )
			);

		}

		public static function registerTextDomain(): void {

			load_plugin_textdomain(
				static::PLUGIN_TEXT_DOMAIN_ID,
				false,
				'locales'
			);

		}

	}
