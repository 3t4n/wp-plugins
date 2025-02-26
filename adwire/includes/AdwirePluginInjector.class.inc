<?php

	declare( strict_types = 1 );

	namespace Adwire\WordPress\Plugins\AdwirePlugin;

	use Adwire\WordPress\Plugins\AdwirePlugin;

	if ( ! defined( 'ABSPATH' ) ) {
		exit( 1 );
	}

	class Injector {

		public static function run(): void {

			$settings = AdwirePlugin\Settings::getSettings();

			if ( ! isset( $settings['terms'] ) || ! isset( $settings['youtube_terms'] ) || ! isset( $settings['youtube_api_terms'] ) ) {
				return;
			}

			// TODO: Determine if current page is post (frontend or admin) and return if not.

			static::registerActions();

		}

		public static function registerActions(): void {

			add_action(
				'init',
				array( static::class, 'registerStyles' )
			);

			add_action(
				'init',
				array( static::class, 'registerScripts' )
			);

		}

		public static function registerStyles(): void {

			$settings = AdwirePlugin\Settings::getSettings();

			wp_enqueue_style(
				AdwirePlugin::PLUGIN_PACKAGE_NAME,
				AdwirePlugin::PLUGIN_CDN_ENDPOINT . '/latest/adwire.min.css',
				false,
				AdwirePlugin::$version,
				'all'
			);

			if ( isset( $settings['outstream_active'] ) ) {

				wp_enqueue_style(
					AdwirePlugin::PLUGIN_PACKAGE_NAME . '-outstream',
					plugins_url( 'static/css/outstream.css', AdwirePlugin::$basename ),
					false,
					AdwirePlugin::$version,
					'all'
				);

			}

			if ( isset( $settings['responsive_fix'] ) ) {

				wp_enqueue_style(
					AdwirePlugin::PLUGIN_PACKAGE_NAME . '-responsive-fix',
					plugins_url( 'static/css/responsive-fix.css', AdwirePlugin::$basename ),
					false,
					AdwirePlugin::$version,
					'all'
				);

			}

			if ( isset( $settings['theme_2021_fix'] ) && 'Twenty Twenty-One' === (string) wp_get_theme() ) {

				wp_enqueue_style(
					AdwirePlugin::PLUGIN_PACKAGE_NAME . '-theme-2021-fix',
					plugins_url( 'static/css/theme-2021-fix.css', AdwirePlugin::$basename ),
					false,
					AdwirePlugin::$version,
					'all'
				);

			}

		}

		public static function registerScripts(): void {

			$settings = AdwirePlugin\Settings::getSettings();

			if ( isset( $settings['google_ima_sdk_terms'] ) && isset( $settings['google_ima_sdk'] ) ) {

				wp_enqueue_script(
					'google-ima-sdk',
					'https://imasdk.googleapis.com/js/sdkloader/ima3' . ( isset( $settings['google_ima_sdk_debug'] ) ? '_debug' : '' ) . '.js',
					false,
					AdwirePlugin::$version,
					true
				);

			}

			wp_enqueue_script(
				AdwirePlugin::PLUGIN_PACKAGE_NAME,
				AdwirePlugin::PLUGIN_CDN_ENDPOINT . '/latest/adwire.min.js',
				false,
				AdwirePlugin::$version,
				true
			);

			$empty_line_regexp = '((\n)\s*\n)';

			if ( isset( $settings['instream_iframe_youtube_active'] ) ) {

				wp_add_inline_script(
					AdwirePlugin::PLUGIN_PACKAGE_NAME,
					trim(
						preg_replace(
							$empty_line_regexp,
							'$1',
							'
(() => {
	"use strict";
	if(!("google" in window)) return console.error("' . AdwirePlugin::PLUGIN_NAME . ':", "Google IMA SDK library not detected!");
	const options = ' . wp_json_encode( AdwirePlugin\Settings::getSettings( true, 'instream_iframe_youtube' ) ) . ';
	Object.assign(options, {
		cookies: options.cookies || document.cookie.includes("adwire.cookies=1"),
		mode: Adwire.Mode.INSTREAM_IFRAME_YOUTUBE
	});
	const adwire = new Adwire(options);
	' . ( ( isset( $settings['instream_iframe_youtube_autoplay'] ) ) ? 'adwire.use(Adwire.Plugin.Autoplay, { autopause: true });' : '' ) . '
	const run = iframe => adwire.run(iframe);
	Array.from(document.querySelectorAll("iframe[src*=\"youtube\"]")).forEach(run);
})();
							'
						)
					),
					'after'
				);

			}

			if ( isset( $settings['outstream_active'] ) ) {

				wp_add_inline_script(
					AdwirePlugin::PLUGIN_PACKAGE_NAME,
					trim(
						preg_replace(
							$empty_line_regexp,
							'$1',
							'
(() => {
	"use strict";
	if(!("google" in window)) return console.error("' . AdwirePlugin::PLUGIN_NAME . ':", "Google IMA SDK library not detected!");
	const element = document.querySelector("' . esc_attr( $settings['outstream_css_selector'] ?? '' ) . '");
	if(!element) return;
	element.insertAdjacentHTML("afterEnd", `<div class="adwire-responsive"><style>.adwire-placeholder { background-color: ' . esc_attr( $settings['outstream_placeholder_background_color'] ?? 'inherit' ) . '; color: ' . esc_attr( $settings['outstream_placeholder_text_color'] ?? 'inherit' ) . '; }</style><div class="adwire-placeholder" data-content="' . esc_attr( $settings['outstream_placeholder_text'] ?? '' ) . '"></div></div>`);
	const options = ' . wp_json_encode( AdwirePlugin\Settings::getSettings( true, 'outstream' ) ) . ';
	Object.assign(options, {
		cookies: options.cookies || document.cookie.includes("adwire.cookies=1"),
		mode: Adwire.Mode.OUTSTREAM
	});
	let errors = 0;
	const run = () => {
		if(errors > 2) return;
		const adwire = new Adwire(options);
		adwire.use(Adwire.Plugin.Autoplay, { autopause: true });
		adwire.use(api => api.on(Adwire.Event.Type.FAILED, () => errors++));
		' . ( ( isset( $settings['outstream_loop'] ) ) ? 'adwire.use(api => !!api && api.on(Adwire.Event.Type.ENDED, () => run()));' : '' ) . '
		adwire.run(document.querySelector(".adwire-placeholder"));
	};
	run();
})();
							'
						)
					),
					'after'
				);

			}

		}

	}
