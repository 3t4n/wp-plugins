<?php

	declare( strict_types = 1 );

	namespace Adwire\WordPress\Plugins\AdwirePlugin;

	use Exception;

	use Adwire\WordPress\Plugins\AdwirePlugin;

	if ( ! defined( 'ABSPATH' ) ) {
		exit( 1 );
	}

	class Settings {

		public const PLUGIN_SETTINGS_TITLE       = AdwirePlugin::PLUGIN_NAME . ' Settings';
		public const PLUGIN_SETTINGS_ID          = AdwirePlugin::PLUGIN_NAME_SLUG . '_settings';
		public const PLUGIN_SETTINGS_PAGE_ID     = AdwirePlugin::PLUGIN_NAME_SLUG . '_settings_page';
		public const PLUGIN_SETTINGS_GROUP_ID    = AdwirePlugin::PLUGIN_NAME_SLUG . '_settings_group';
		public const PLUGIN_SETTINGS_SECTION_ID  = AdwirePlugin::PLUGIN_NAME_SLUG . '_settings_section';
		public const PLUGIN_SETTINGS_MESSAGES_ID = AdwirePlugin::PLUGIN_NAME_SLUG . '_settings_messages';

		public const PLUGIN_SETTINGS_JS = array(
			'ad_tag_url',
			'cookies',
			'locale',
			'private',
			'terms',
		);

		public const PLUGIN_DEFAULT_SETTINGS = array(
			'google_ima_sdk'                         => true,
			'locale'                                 => 'en',
			'outstream_css_selector'                 => 'article p:nth-of-type(2)',
			'outstream_placeholder_background_color' => '#dcdcdc',
			'outstream_placeholder_text_color'       => '#696969',
			'outstream_placeholder_text'             => 'advertisement',
			'responsive_fix'                         => true,
		);

		public const PLUGIN_SETTINGS_SCHEMA = array(
			'sections' => array(
				array(
					'id'     => 'consent_settings',
					'title'  => 'Consent',
					'fields' => array(
						array(
							'id'     => 'terms',
							'title'  => '<strong>Adwire</strong> terms of service',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'I have read and I agree with <a rel="noopener" target="_blank" href="https://www.adwire.dev/terms" title="Adwire terms of service"><strong>' . AdwirePlugin::PLUGIN_NAME . '</strong> terms of service</a>.',
							),
						),
						array(
							'id'     => 'google_ima_sdk_terms',
							'title'  => 'Google IMA SDK terms of service',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'I have read and I agree with <a rel="noopener noreferrer nofollow" target="_blank" href="https://developers.google.com/interactive-media-ads/docs/sdks/html5/client-side/terms" title="Google IMA SDK terms of service">Google IMA SDK terms of service</a>.',
								'help_text'     => 'If your WordPress instance used Google IMA SDK before, most probably you already granted this consent.',
							),
						),
						array(
							'id'     => 'youtube_terms',
							'title'  => 'YouTube terms of service',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'I have read and I agree with <a rel="noopener noreferrer nofollow" target="_blank" href="https://www.youtube.com/t/terms" title="YouTube terms of service">YouTube terms of service</a>.',
								'help_text'     => 'If your WordPress instance  used YouTube iframe embeds before, most probably you already granted this consent.',
							),
						),
						array(
							'id'     => 'youtube_api_terms',
							'title'  => 'YouTube API terms of service',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'I have read and I agree with <a rel="noopener noreferrer nofollow" target="_blank" href="https://developers.google.com/youtube/terms" title="YouTube API terms of service">YouTube API terms of service</a>.',
								'help_text'     => 'If your WordPress instance  used YouTube iframe embeds before, most probably you already granted this consent.',
							),
						),
						array(
							'id'     => 'cookies',
							'title'  => 'Cookie consent',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Use to override user consent, which you should obtain from your users beforehand. <strong>For testing purposes only.</strong>',
								'help_text'     => 'Set cookie <code>adwire.cookies=1</code> if user consented to use of cookies. In addition, Google IMA SDK should respect user consent according to <a rel="noopener noreferrer nofollow" target="_blank" href="https://support.google.com/admanager/answer/9805023" title="IAB TCF v2.0">IAB TCF v2.0</a>.',
							),
						),
					),
				),
				array(
					'id'     => 'instream_iframe_youtube_settings',
					'title'  => 'Instream YouTube',
					'fields' => array(
						array(
							'id'     => 'instream_iframe_youtube_ad_tag_url',
							'title'  => 'AdTag URL',
							'params' => array(
								'type'      => 'url',
								'help_text' => 'AdTag URL for <abbr title="Video Ad Serving Template">VAST</abbr>, <abbr title="Video Player-Ad Interface Definition">VPAID</abbr>, <abbr title="Video Multiple Ad Playlist">VMAP</abbr> or <abbr title="Secure Interactive Media Interface Definition">SIMID</abbr> ad formats.',
							),
						),
						array(
							'id'     => 'instream_iframe_youtube_autoplay',
							'title'  => 'Enable autoplay mode',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Enable autoplay plugin for YouTube embeds.',
							),
						),
						array(
							'id'     => 'instream_iframe_youtube_private',
							'title'  => 'Enable private mode',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Enable privacy-enhanced mode for YouTube embeds.',
							),
						),
						array(
							'id'     => 'instream_iframe_youtube_active',
							'title'  => 'Active',
							'params' => array(
								'type' => 'checkbox',
							),
						),
					),
				),
				array(
					'id'     => 'outstream_settings',
					'title'  => 'Outstream',
					'fields' => array(
						array(
							'id'     => 'outstream_ad_tag_url',
							'title'  => 'AdTag URL',
							'params' => array(
								'type'      => 'url',
								'help_text' => 'AdTag URL for <abbr title="Video Ad Serving Template">VAST</abbr>, <abbr title="Video Player-Ad Interface Definition">VPAID</abbr>, <abbr title="Video Multiple Ad Playlist">VMAP</abbr> or <abbr title="Secure Interactive Media Interface Definition">SIMID</abbr> ad formats.',
							),
						),
						array(
							'id'     => 'outstream_css_selector',
							'title'  => 'CSS selector',
							'params' => array(
								'type'      => 'text',
								'help_text' => 'CSS selector of element after which will be outstream ad inserted.',
							),
						),
						array(
							'id'     => 'outstream_placeholder_text',
							'title'  => 'Placeholder text',
							'params' => array(
								'type'      => 'text',
								'help_text' => 'Text which will be shown in placeholder.',
							),
						),
						array(
							'id'     => 'outstream_placeholder_background_color',
							'title'  => 'Placeholder background color',
							'params' => array(
								'type' => 'color',
							),
						),
						array(
							'id'     => 'outstream_placeholder_text_color',
							'title'  => 'Placeholder text color',
							'params' => array(
								'type' => 'color',
							),
						),
						array(
							'id'     => 'outstream_loop',
							'title'  => 'Loop',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Play outstream ads in loop.',
							),
						),
						array(
							'id'     => 'outstream_active',
							'title'  => 'Active',
							'params' => array(
								'type' => 'checkbox',
							),
						),
					),
				),
				array(
					'id'     => 'google_ima_sdk_settings',
					'title'  => 'Google IMA SDK',
					'fields' => array(
						array(
							'id'     => 'google_ima_sdk',
							'title'  => 'Inject Google IMA SDK',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Use only if Google IMA SDK is not injected from other plugin or theme.',
							),
						),
						array(
							'id'     => 'locale',
							'title'  => 'Google IMA SDK locale',
							'params' => array(
								'type'    => 'select',
								'options' => array(
									'af'     => 'Afrikaans',
									'am'     => 'Amharic',
									'ar'     => 'Arabic',
									'ar_eg'  => 'Arabic (Egypt)',
									'ar_sa'  => 'Arabic (Saudi Arabia)',
									'eu'     => 'Basque',
									'be'     => 'Belarusian',
									'bn'     => 'Bengali',
									'bg'     => 'Bulgarian',
									'ca'     => 'Catalan',
									'zh'     => 'Chinese (Simplified)',
									'zh_cn'  => 'Chinese (Simplified, China) ',
									'zh_hk'  => 'Chinese (Traditional, Hong Kong)',
									'zh_tw'  => 'Chinese (Traditional, Taiwan)',
									'hr'     => 'Croatian',
									'cs'     => 'Czech',
									'da'     => 'Danish',
									'nl'     => 'Dutch',
									'en'     => 'English',
									'en_au'  => 'English (Australia)',
									'en_ca'  => 'English (Canada)',
									'en_gb'  => 'English (United Kingdom)',
									'en_ie'  => 'English (Ireland)',
									'en_in'  => 'English (India)',
									'en_sg'  => 'English (Singapore)',
									'en_za'  => 'English (South Africa)',
									'et'     => 'Estonian',
									'fa'     => 'Farsi',
									'fil'    => 'Filipino',
									'fi'     => 'Finnish',
									'fr'     => 'French',
									'fr_ca'  => 'French (Canada)',
									'fr_ch'  => 'French (Switzerland)',
									'gl'     => 'Galician',
									'de'     => 'German',
									'de_at'  => 'German (Austria)',
									'el'     => 'Greek',
									'gu'     => 'Gujarati',
									'he'     => 'Hebrew',
									'hi'     => 'Hindi',
									'hu'     => 'Hungarian',
									'is'     => 'Icelandic',
									'id'     => 'Indonesian',
									'it'     => 'Italian',
									'ja'     => 'Japanese',
									'kn'     => 'Kannada',
									'ko'     => 'Korean',
									'lo'     => 'Lao',
									'lv'     => 'Latvian',
									'ln'     => 'Lingala',
									'lt'     => 'Lithuanian',
									'ms'     => 'Malay',
									'ml'     => 'Malayalam',
									'mr'     => 'Marathi',
									'no'     => 'Norwegian',
									'pl'     => 'Polish',
									'pt'     => 'Portuguese',
									'pt_br'  => 'Portuguese (Brazil)',
									'pt_pt'  => 'Portuguese (Portugal)',
									'ro'     => 'Romanian',
									'ru'     => 'Russian',
									'sr'     => 'Serbian',
									'sk'     => 'Slovak',
									'sl'     => 'Slovenian',
									'es'     => 'Spanish',
									'es_419' => 'Spanish (Latin America)',
									'es_ar'  => 'Spanish (Argentina)',
									'es_cl'  => 'Spanish (Chile)',
									'es_co'  => 'Spanish (Colombia)',
									'es_cr'  => 'Spanish (Costa Rica)',
									'es_do'  => 'Spanish (Dominican Republic)',
									'es_ec'  => 'Spanish (Ecuador)',
									'es_sv'  => 'Spanish (El Salvador)',
									'es_gt'  => 'Spanish (Guatemala)',
									'es_hn'  => 'Spanish (Honduras)',
									'es_mx'  => 'Spanish (Mexico)',
									'es_ni'  => 'Spanish (Nicaragua)',
									'es_pa'  => 'Spanish (Panama)',
									'es_pe'  => 'Spanish (Peru)',
									'es_pr'  => 'Spanish (Puerto Rico)',
									'es_py'  => 'Spanish (Paraguay)',
									'es_us'  => 'Spanish (United States)',
									'es_uy'  => 'Spanish (Uruguay)',
									'es_ve'  => 'Spanish (Venezuela)',
									'sw'     => 'Swahili',
									'sv'     => 'Swedish',
									'gsw'    => 'Swiss German',
									'tl'     => 'Tagalog',
									'ta'     => 'Tamil',
									'te'     => 'Telugu',
									'th'     => 'Thai',
									'tr'     => 'Turkish',
									'uk'     => 'Ukrainian',
									'ur'     => 'Urdu',
									'vi'     => 'Vietnamese',
									'zu'     => 'Zulu',
								),
							),
						),
						array(
							'id'     => 'google_ima_sdk_debug',
							'title'  => 'Enable debug mode for Google IMA SDK',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Use only if Google IMA SDK is injected by <strong>' . AdwirePlugin::PLUGIN_NAME . '</strong> plugin.',
							),
						),
					),
				),
				array(
					'id'     => 'theme_settings',
					'title'  => 'Theme',
					'fields' => array(
						array(
							'id'     => 'theme_2021_fix',
							'title'  => 'Twenty Twenty-One theme fix',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Use if Twenty Twenty-One theme is active.',
							),
						),
						array(
							'id'     => 'responsive_fix',
							'title'  => 'Responsive fix',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Use if responsive embeds are active.',
							),
						),
					),
				),
				array(
					'id'     => 'other_settings',
					'title'  => 'Other',
					'fields' => array(
						array(
							'id'     => 'plugin.persist_data_on_uninstall',
							'title'  => 'Persist plugin data',
							'params' => array(
								'type'          => 'checkbox',
								'checkbox_text' => 'Do not remove <strong>' . AdwirePlugin::PLUGIN_NAME . '</strong> plugin data on uninstall.',
							),
						),
					),
				),
			),
		);

		public static function run(): void {

			static::registerActions();
			static::registerFilters();
			static::registerHooks();

		}

		public static function registerActions(): void {

			add_action(
				'admin_init',
				array( static::class, 'registerAdminStyles' )
			);

			add_action(
				'admin_init',
				array( static::class, 'registerAdminScripts' )
			);

			add_action(
				'admin_init',
				array( static::class, 'registerSettingsSchema' )
			);

			add_action(
				'admin_menu',
				array( static::class, 'registerMenuItem' )
			);

		}

		public static function registerFilters(): void {

			add_filter(
				'plugin_action_links_' . AdwirePlugin::$basename,
				array( static::class, 'registerLinkItem' )
			);

		}

		public static function registerHooks(): void {

			register_activation_hook(
				AdwirePlugin::$basename,
				array( static::class, 'registerActivationHook' )
			);

			register_uninstall_hook(
				AdwirePlugin::$basename,
				array( static::class, 'registerUninstallHook' )
			);

		}

		public static function getSettings( bool $js = false, ?string $mode = null ): array {

			$settings_wp = get_option( static::PLUGIN_SETTINGS_ID, array() ) + static::PLUGIN_DEFAULT_SETTINGS;

			ksort( $settings_wp );

			if ( ! $js ) {
				return $settings_wp;
			}

			$instream_iframe_youtube_mode = 'instream_iframe_youtube';
			$outstream_mode               = 'outstream';

			if ( ! in_array( $mode, array( $instream_iframe_youtube_mode, $outstream_mode ), true ) ) {
				throw new Exception( 'Supplied mode "' . $mode . '" is not supported' );
			}

			$settings_js = array();

			if ( ! empty( $mode ) ) {
				$mode_underscore = rtrim( $mode, '_' ) . '_';
			}

			foreach ( $settings_wp as $key => $value ) {

				if ( ! empty( $mode_underscore ) && 0 === strpos( $key, $mode_underscore ) ) {
					$key = substr( $key, strlen( $mode_underscore ) );
				}

				if ( ! in_array( $key, static::PLUGIN_SETTINGS_JS, true ) || ! $value ) {
					continue;
				}

				$key = ucwords( $key, '_' );
				$key = str_replace( '_', '', $key );
				$key = lcfirst( $key );

				$settings_js[ $key ] = $value;

			}

			$settings_js['clone'] = true;
			$settings_js['extra'] = array(
				'wordpress' => AdwirePlugin::$wordpress_version,
			);

			switch ( $mode ) {

				case $instream_iframe_youtube_mode: {

					if ( isset( $settings_wp['instream_iframe_youtube_active'] ) && isset( $settings_wp['instream_iframe_youtube_autoplay'] ) ) {
						$settings_js['autoplay'] = true;
						$settings_js['muted']    = true;
					}

					break;

				}

				case $outstream_mode: {

					if ( isset( $settings_wp['outstream_active'] ) ) {
						$settings_js['autoplay'] = true;
						$settings_js['muted']    = true;
						$settings_js['width']    = 640;
						$settings_js['height']   = 360;
					}

					break;

				}

			}

			ksort( $settings_js );

			return $settings_js;

		}

		public static function registerAdminStyles(): void {

			wp_enqueue_style(
				AdwirePlugin::PLUGIN_PACKAGE_NAME . '-admin',
				plugins_url( 'static/css/admin.css', AdwirePlugin::$basename ),
				false,
				AdwirePlugin::$version,
				'all'
			);

		}

		public static function registerAdminScripts(): void {

			wp_enqueue_script(
				AdwirePlugin::PLUGIN_PACKAGE_NAME . '-admin',
				plugins_url( 'static/js/admin.js', AdwirePlugin::$basename ),
				false,
				AdwirePlugin::$version,
				true
			);

		}

		public static function registerSettingsSchema(): void {

			foreach ( static::PLUGIN_SETTINGS_SCHEMA['sections'] as $section ) {

				$section_id = static::PLUGIN_SETTINGS_SECTION_ID . '_' . $section['id'];

				add_settings_section(
					$section_id,
					__( $section['title'], AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID ),
					array( static::class, 'sectionCallback' ),
					static::PLUGIN_SETTINGS_PAGE_ID
				);

				foreach ( $section['fields'] as $field ) {

					add_settings_field(
						$field['id'],
						__( $field['title'], AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID ),
						array( static::class, 'fieldCallback' ),
						static::PLUGIN_SETTINGS_PAGE_ID,
						$section_id,
						$field['params'] + array(
							'id'        => $field['id'],
							'label_for' => $field['id'], // Required by left column for labels.
						)
					);

				}

			}

			register_setting(
				static::PLUGIN_SETTINGS_GROUP_ID,
				static::PLUGIN_SETTINGS_ID,
				array( static::class, 'sanitizeCallback' )
			);

		}

		public static function sectionCallback( array $arguments = array() ): void {

			print '<p>';
				print __( $arguments['title'] . ' section for <strong>' . AdwirePlugin::PLUGIN_NAME . '</strong> plugin.', AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID );
			print '</p>';

		}

		public static function fieldCallback( array $arguments = array() ): void {

			$settings = static::getSettings();

			$value = esc_attr( $settings[ $arguments['id'] ] ?? '' );

			$is_select   = 'select' === $arguments['type'];
			$is_color    = 'color' === $arguments['type'];
			$is_checkbox = 'checkbox' === $arguments['type'];

			if ( $is_select ) {
				print '<select';
					print ' id="' . $arguments['id'] . '"';
					print ' name="' . static::PLUGIN_SETTINGS_ID . '[' . $arguments['id'] . ']"';
					print ' class="regular-text"';
				print '>';
					foreach ( $arguments['options'] as $option_value => $option_title ) {
						print '<option';
							print ' value="' . $option_value . '"';
							print ' ' . selected( $value, $option_value, false );
						print '>';
							print $option_title;
						print '</option>';
					}
				print '</select>';

				return;
			}

			print '<input';
				print ' id="' . $arguments['id'] . '"';
				print ' name="' . static::PLUGIN_SETTINGS_ID . '[' . $arguments['id'] . ']"';
				print ' type="' . $arguments['type'] . '"';
				if ( ! $is_color && ! $is_checkbox ) {
					print ' class="regular-text"';
				}
				if ( $is_checkbox ) {
					print ' ' . checked( $value, true, false );
				} else {
					print ' value="' . $value . '"';
				}
			print ' />';

			if ( $is_checkbox && ! empty( $arguments['checkbox_text'] ) ) {
				print '<label';
					print ' for="' . $arguments['id'] . '"';
				print '>';
					print __( $arguments['checkbox_text'], AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID );
				print '</label>';
			}

			if ( ! empty( $arguments['help_text'] ) ) {
				print '<p';
					print ' class="description"';
				print '>';
					print __( $arguments['help_text'], AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID );
				print '</p>';
			}

		}

		public static function sanitizeCallback( array $settings = array() ): array {

			$anchor = fn ( string $hash = '' ) => '<a rel="noopener" href="options-general.php?page=' . AdwirePlugin::PLUGIN_NAME_SLUG . '#' . ltrim( $hash, '#' ) . '" title="' . __( static::PLUGIN_SETTINGS_TITLE, AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID ) . '">here</a>';

			if ( ! isset( $settings['terms'] ) ) {

				add_settings_error(
					'terms',
					AdwirePlugin::PLUGIN_PACKAGE_NAME . '-terms',
					'Consent with Adwire terms of service is required. Please grant consent ' . $anchor( 'consent' ) . '.',
					'error'
				);

			}

			if ( isset( $settings['instream_iframe_youtube_active'] ) ) {

				if ( ! isset( $settings['youtube_terms'] ) ) {

					add_settings_error(
						'youtube_terms',
						AdwirePlugin::PLUGIN_PACKAGE_NAME . '-youtube_terms',
						'Consent with YouTube terms of service is required. Please grant consent ' . $anchor( 'consent' ) . '.',
						'error'
					);

				}

				if ( ! isset( $settings['youtube_api_terms'] ) ) {

					add_settings_error(
						'youtube_api_terms',
						AdwirePlugin::PLUGIN_PACKAGE_NAME . '-youtube_api_terms',
						'Consent with YouTube API terms of service is required. Please grant consent ' . $anchor( 'consent' ) . '.',
						'error'
					);

				}

				if ( empty( $settings['instream_iframe_youtube_ad_tag_url'] ) ) {

					add_settings_error(
						'instream_iframe_youtube_ad_tag_url',
						AdwirePlugin::PLUGIN_PACKAGE_NAME . '-instream_iframe_youtube_ad_tag_url',
						'AdTag URL for instream YouTube ads is required. Please fill it in ' . $anchor( 'instream-youtube' ) . '.',
						'error'
					);

				}

			}

			if ( isset( $settings['outstream_active'] ) ) {

				if ( empty( $settings['outstream_ad_tag_url'] ) ) {

					add_settings_error(
						'outstream_ad_tag_url',
						AdwirePlugin::PLUGIN_PACKAGE_NAME . '-outstream_ad_tag_url',
						'AdTag URL for outstream ads is required. Please fill it in ' . $anchor( 'outstream' ) . '.',
						'error'
					);

				}

				if ( empty( $settings['outstream_css_selector'] ) ) {

					add_settings_error(
						'outstream_css_selector',
						AdwirePlugin::PLUGIN_PACKAGE_NAME . '-outstream_css_selector',
						'CSS selector for outstream ads is required. Please fill it in ' . $anchor( 'outstream' ) . '.',
						'error'
					);

				}

				if ( empty( $settings['outstream_placeholder_text'] ) ) {

					add_settings_error(
						'outstream_placeholder_text',
						AdwirePlugin::PLUGIN_PACKAGE_NAME . '-outstream_placeholder_text',
						'Placeholder text for outstream ads is required. Please fill it in ' . $anchor( 'outstream' ) . '.',
						'error'
					);

				}

			}

			if ( isset( $settings['google_ima_sdk'] ) && ! isset( $settings['google_ima_sdk_terms'] ) ) {

				add_settings_error(
					'google_ima_sdk_terms',
					AdwirePlugin::PLUGIN_PACKAGE_NAME . '-google_ima_sdk_terms',
					'Consent with Google IMA SDK terms of service is required. Please grant consent ' . $anchor( 'consent' ) . '.',
					'error'
				);

			}

			foreach ( $settings as $key => $value ) {

				switch ( $value ) {

					case '': {
						$settings[ $key ] = false;
						break;
					}

					case 'on': {
						$settings[ $key ] = true;
						break;
					}

				}

			}

			$settings['plugin.version']    = AdwirePlugin::$version;
			$settings['wordpress.version'] = AdwirePlugin::$wordpress_version;

			ksort( $settings );

			return $settings;

		}

		public static function renderSettingsPage(): void {

			print '<div';
				print ' class="wrap"';
			print '>';
				print '<h1>';
					/* print __( get_admin_page_title(), AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID ); */
					print __( static::PLUGIN_SETTINGS_TITLE, AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID );
				print '</h1>';
				settings_errors(
					static::PLUGIN_SETTINGS_MESSAGES_ID,
					false,
					false
				);
				print '<form';
					print ' action="options.php"';
					print ' method="post"';
					print ' class="adwire-settings-form"';
				print '>';
					do_settings_sections( static::PLUGIN_SETTINGS_PAGE_ID );
					settings_fields( static::PLUGIN_SETTINGS_GROUP_ID );
					submit_button(
						null,
						'primary',
						'submit',
						true,
						null
					);
				print '</form>';
				print '<p>';
					print __( 'Loading...', AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID );
				print '</p>';
			print '</div>';
			print '<hr />';
			print '<p>';
				print __( 'This plugin provides only minimal implementation of <strong>' . AdwirePlugin::PLUGIN_NAME . '</strong> service.', AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID );
			print '</p>';
			print '<p>';
				print __( 'You can implement <strong>' . AdwirePlugin::PLUGIN_NAME . '</strong> service accodring your particular needs directly into your theme / child theme based on <a rel="noopener" target="_blank" href="https://www.adwire.dev/documentation" title="Adwire documentation"><strong>' . AdwirePlugin::PLUGIN_NAME . '</strong> documentation</a>.', AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID );
			print '</p>';

		}

		public static function registerMenuItem(): void {

			add_options_page(
				__( static::PLUGIN_SETTINGS_TITLE, AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID ),
				__( static::PLUGIN_SETTINGS_TITLE, AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID ),
				'manage_options',
				AdwirePlugin::PLUGIN_NAME_SLUG,
				array( static::class, 'renderSettingsPage' ),
				null
			);

		}

		public static function registerLinkItem( array $links = array() ): array {

			return $links + array( '<a rel="noopener" href="options-general.php?page=' . AdwirePlugin::PLUGIN_NAME_SLUG . '" title="' . __( static::PLUGIN_SETTINGS_TITLE, AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID ) . '">' . __( 'Settings', AdwirePlugin::PLUGIN_TEXT_DOMAIN_ID ) . '</a>' );

		}

		public static function registerActivationHook(): void {

			$settings = static::getSettings();

			$settings['plugin.version']    = AdwirePlugin::$version;
			$settings['wordpress.version'] = AdwirePlugin::$wordpress_version;

			ksort( $settings );

			add_option(
				static::PLUGIN_SETTINGS_ID,
				$settings,
				'',
				true
			);

		}

		public static function registerUninstallHook(): void {

			$settings = static::getSettings();

			if ( isset( $settings['plugin.persist_data_on_uninstall'] ) ) {
				return;
			}

			delete_option( static::PLUGIN_SETTINGS_ID );

		}

	}
