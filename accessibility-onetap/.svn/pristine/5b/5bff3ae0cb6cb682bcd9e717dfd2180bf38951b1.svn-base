<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wponetap.com
 * @since      1.0.0
 *
 * @package    Accessibility_Onetap
 * @subpackage Accessibility_Onetap/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Accessibility_Onetap
 * @subpackage Accessibility_Onetap/public
 * @author     OneTap <support@wponetap.com>
 */
class Accessibility_Onetap_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// Enqueue the main plugin stylesheet for the front-end.
		wp_enqueue_style( $this->plugin_name, plugins_url( $this->plugin_name ) . '/assets/css/accessibility-onetap-front-end.min.css', array(), $this->version, 'all' );

		// Enqueue the Elementor icons stylesheet.
		wp_enqueue_style( $this->plugin_name . '-eicons', plugins_url( $this->plugin_name ) . '/assets/fonts/eicons/css/elementor-icons.min.css', array(), $this->version, 'all' );

		// Get the plugin settings, specifically the color option.
		$settings = get_option( 'onetap_settings' );

		// Use the user-defined color setting, or fall back to the default if not set.
		$setting_color                  = isset( $settings['color'] ) ? esc_html( $settings['color'] ) : Accessibility_Onetap_Config::get_setting( 'color' );
		$setting_position_top_bottom    = isset( $settings['position-top-bottom'] ) ? absint( $settings['position-top-bottom'] ) : Accessibility_Onetap_Config::get_setting( 'position_top_bottom' );
		$setting_position_left_right    = isset( $settings['position-left-right'] ) ? absint( $settings['position-left-right'] ) : Accessibility_Onetap_Config::get_setting( 'position_left_right' );
		$setting_widget_position        = isset( $settings['widge-position'] ) ? esc_html( $settings['widge-position'] ) : Accessibility_Onetap_Config::get_setting( 'widget_position' );
		$setting_hide_powered_by_onetap = isset( $settings['hide-powered-by-onetap'] ) ? esc_html( $settings['hide-powered-by-onetap'] ) : Accessibility_Onetap_Config::get_setting( 'hide_powered_by_onetap' );

		// Define custom CSS to apply the color setting to specific elements.
		$style = "
		.onetap-container-toggle .onetap-toggle svg,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top .onetap-site-container .onetap-site-info .onetap-image svg,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-active .onetap-icon .onetap-icon-animation svg,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv1 .onetap-icon .onetap-icon-animation svg, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv2 .onetap-icon .onetap-icon-animation svg, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv3 .onetap-icon .onetap-icon-animation svg {
			fill: {$setting_color} !important;
		}
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top::before,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-reset-settings span,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv1 .onetap-title p.onetap-option-levels span.onetap-level.onetap-level1,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top::before, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-reset-settings span, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv2 .onetap-title p.onetap-option-levels span.onetap-level.onetap-level1, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv2 .onetap-title p.onetap-option-levels span.onetap-level.onetap-level2,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv3 .onetap-title p.onetap-option-levels span.onetap-level.onetap-level1, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv3 .onetap-title p.onetap-option-levels span.onetap-level.onetap-level2, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv3 .onetap-title p.onetap-option-levels span.onetap-level.onetap-level3 {
			background: {$setting_color} !important;
		}
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature:hover {
			border-color: {$setting_color} !important;
			box-shadow: 0 0 0 1px {$setting_color} !important;
		}
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature:hover .onetap-title h3,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-active .onetap-title h3,
		nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv1 .onetap-title h3, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv2 .onetap-title h3, nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings .onetap-features-container .onetap-features .onetap-box-feature.onetap-lv3 .onetap-title h3 {
			color: {$setting_color} !important;
		}
		";

		if ( 'middle-right' === $setting_widget_position ) {
			$style .= "
			.onetap-container-toggle .onetap-toggle {
				right: 0 !important;
				margin-right: {$setting_position_left_right}px !important;
				bottom: 50% !important;
				margin-bottom: {$setting_position_top_bottom}px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap {
				right: -580px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap.onetap-toggle-open {
				right: 0 !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top .onetap-close {
				right: 20px !important;
			}			
			";
		} elseif ( 'middle-left' === $setting_widget_position ) {
			$style .= "
			.onetap-container-toggle .onetap-toggle {
				left: 0 !important;
				margin-left: {$setting_position_left_right}px !important;				
				bottom: 50% !important;
				margin-bottom: {$setting_position_top_bottom}px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap {
				left: -580px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap.onetap-toggle-open {
				left: 0 !important;
			}			
			nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top .onetap-close {
				left: calc(530px - 20px) !important;
			}
			";
		} elseif ( 'bottom-right' === $setting_widget_position ) {
			$style .= "
			.onetap-container-toggle .onetap-toggle {
				right: 0 !important;
				margin-right: {$setting_position_left_right}px !important;					
				bottom: 0 !important;
				margin-bottom: {$setting_position_top_bottom}px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap {
				right: -580px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap.onetap-toggle-open {
				right: 0 !important;
			}			
			nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top .onetap-close {
				right: 20px !important;
			}			
			";
		} elseif ( 'bottom-left' === $setting_widget_position ) {
			$style .= "
			.onetap-container-toggle .onetap-toggle {
				left: 0 !important;
				margin-left: {$setting_position_left_right}px !important;					
				bottom: 0 !important;
				margin-bottom: {$setting_position_top_bottom}px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap {
				left: -580px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap.onetap-toggle-open {
				left: 0 !important;
			}			
			nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top .onetap-close {
				left: calc(530px - 20px) !important;
			}			
			";
		} elseif ( 'top-right' === $setting_widget_position ) {
			$style .= "
			.onetap-container-toggle .onetap-toggle {
				top: 0 !important;
				margin-top: {$setting_position_top_bottom}px !important;
				right: 0 !important;
				margin-right: {$setting_position_left_right}px !important;				
			}
			nav.onetap-accessibility.onetap-plugin-onetap {
				right: -580px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap.onetap-toggle-open {
				right: 0 !important;
			}			
			nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top .onetap-close {
				right: 20px !important;
			}			
			";
		} elseif ( 'top-left' === $setting_widget_position ) {
			$style .= "
			.onetap-container-toggle .onetap-toggle {
				top: 0 !important;
				margin-top: {$setting_position_top_bottom}px !important;
				left: 0 !important;
				margin-left: {$setting_position_left_right}px !important;					
			}
			nav.onetap-accessibility.onetap-plugin-onetap {
				left: -580px !important;
			}
			nav.onetap-accessibility.onetap-plugin-onetap.onetap-toggle-open {
				left: 0 !important;
			}			
			nav.onetap-accessibility.onetap-plugin-onetap .onetap-container .onetap-accessibility-settings header.onetap-header-top .onetap-close {
				left: calc(530px - 20px) !important;
			}			
			";
		}

		if ( 'on' === $setting_hide_powered_by_onetap ) {
			$style .= '
			header.onetap-header-top .onetap-site-container .onetap-site-info .onetap-desc {
				display: none !important;
			}
			';
		}

		// Add the custom inline CSS to the previously enqueued plugin stylesheet.
		wp_add_inline_style( $this->plugin_name, $style );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// Construct the file path of the plugin.
		$plugin_file = WP_PLUGIN_DIR . '/accessibility-onetap/accessibility-onetap.php';

		// Check if the plugin file exists.
		$plugin_version = '1.0.0';
		if ( file_exists( $plugin_file ) ) {
			// Include the necessary WordPress file for plugin data retrieval.
			require_once ABSPATH . 'wp-admin/includes/plugin.php';

			// Retrieve the plugin data.
			$plugin_info = get_plugin_data( $plugin_file );

			// Extract relevant plugin information.
			$plugin_version = $plugin_info['Version'];
		}

		// Register the script but do not enqueue it yet.
		wp_register_script(
			$this->plugin_name, // Handle for the script.
			plugins_url( $this->plugin_name ) . '/assets/js/script.min.js', // URL to the script file.
			array( 'jquery' ), // Dependencies, in this case, jQuery.
			$this->version, // Script version for cache-busting.
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			) // An array of additional script loading strategies.
		);

		// Enqueue the script after it has been registered.
		wp_enqueue_script( $this->plugin_name );

		// Get the 'onetap_settings' option from the database.
		$settings                       = get_option( 'onetap_settings' );
		$setting_language               = isset( $settings['language'] ) ? esc_html( $settings['language'] ) : Accessibility_Onetap_Config::get_setting( 'language' );
		$setting_color                  = isset( $settings['color'] ) ? esc_html( $settings['color'] ) : Accessibility_Onetap_Config::get_setting( 'color' );
		$setting_position_top_bottom    = isset( $settings['position-top-bottom'] ) ? absint( $settings['position-top-bottom'] ) : Accessibility_Onetap_Config::get_setting( 'position_top_bottom' );
		$setting_position_left_right    = isset( $settings['position-left-right'] ) ? absint( $settings['position-left-right'] ) : Accessibility_Onetap_Config::get_setting( 'position_left_right' );
		$setting_widget_position        = isset( $settings['widge-position'] ) ? esc_html( $settings['widge-position'] ) : Accessibility_Onetap_Config::get_setting( 'widget_position' );
		$setting_hide_powered_by_onetap = isset( $settings['hide-powered-by-onetap'] ) ? esc_html( $settings['hide-powered-by-onetap'] ) : Accessibility_Onetap_Config::get_setting( 'hide_powered_by_onetap' );

		// Get the 'onetap_modules' option from the database.
		$modules                     = get_option( 'onetap_modules' );
		$modules_bigger_text         = isset( $modules['bigger-text'] ) ? esc_html( $modules['bigger-text'] ) : Accessibility_Onetap_Config::get_module( 'bigger_text' );
		$modules_cursor              = isset( $modules['cursor'] ) ? esc_html( $modules['cursor'] ) : Accessibility_Onetap_Config::get_module( 'cursor' );
		$modules_readable_font       = isset( $modules['font'] ) ? esc_html( $modules['font'] ) : Accessibility_Onetap_Config::get_module( 'grayscale' );
		$modules_grayscale           = isset( $modules['grayscale'] ) ? esc_html( $modules['grayscale'] ) : Accessibility_Onetap_Config::get_module( 'grayscale' );
		$modules_reading_line        = isset( $modules['reading-line'] ) ? esc_html( $modules['reading-line'] ) : Accessibility_Onetap_Config::get_module( 'reading_line' );
		$modules_highlight_links     = isset( $modules['highlight-links'] ) ? esc_html( $modules['highlight-links'] ) : Accessibility_Onetap_Config::get_module( 'highlight_links' );
		$modules_letter_spacing      = isset( $modules['letter-spacing'] ) ? esc_html( $modules['letter-spacing'] ) : Accessibility_Onetap_Config::get_module( 'letter_spacing' );
		$modules_highlight_all       = isset( $modules['highlight-all'] ) ? esc_html( $modules['highlight-all'] ) : Accessibility_Onetap_Config::get_module( 'highlight_all' );
		$modules_stop_animations     = isset( $modules['stop-animations'] ) ? esc_html( $modules['stop-animations'] ) : Accessibility_Onetap_Config::get_module( 'stop_animations' );
		$modules_keyboard_navigation = isset( $modules['keyboard-navigation'] ) ? esc_html( $modules['keyboard-navigation'] ) : Accessibility_Onetap_Config::get_module( 'keyboard_navigation' );
		$modules_highlight_titles    = isset( $modules['highlight-titles'] ) ? esc_html( $modules['highlight-titles'] ) : Accessibility_Onetap_Config::get_module( 'highlight_titles' );

		wp_localize_script(
			$this->plugin_name,
			'accessibilityOnetapAjaxObject',
			array(
				'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
				'nonce'       => wp_create_nonce( 'ajax-nonce' ),
				'languages'   => array(
					'en' => array(
						'header'        => array(
							'language'      => 'English',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Accessibility Adjustments',
							'desc'          => 'Powered by',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Bigger Text',
							'cursor'          => 'Cursor',
							'lineHeight'      => 'Line Height',
							'hideImages'      => 'Hide Images',
							'readableFont'    => 'Readable Font',
							'dyslexicFont'    => 'Dyslexic Font',
							'highlightTitles' => 'Highlight Titles',
							'letterSpacing'   => 'Letter Spacing',
							'highlightAll'    => 'Highlight All',
							'stopAnimations'  => 'Stop Animations',
						),
						'colors'        => array(
							'invertColors' => 'Invert Colors',
							'brightness'   => 'Brightness',
							'contrast'     => 'Contrast',
							'grayscale'    => 'Grayscale',
							'saturation'   => 'Saturation',
						),
						'navigation'    => array(
							'readingLine'        => 'Reading Line',
							'highlightLinks'     => 'Highlight Links',
							'readPage'           => 'Read Page',
							'readingMask'        => 'Reading Mask',
							'keyboardNavigation' => 'Keyboard Navigation',
						),
						'divider'       => array(
							'colors'     => 'colors',
							'navigation' => 'navigation',
						),
						'resetSettings' => 'Reset Settings',
						'footer'        => array(
							'accessibilityStatement' => 'Accessibility statement',
							'version'                => 'Version ' . $plugin_version,
						),
					),
					'de' => array(
						'header'        => array(
							'language'      => 'Deutsch',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Barrierefreie Anpassungen',
							'desc'          => 'Angetrieben von',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Größerer Text',
							'cursor'          => 'Cursor',
							'lineHeight'      => 'Zeilenhöhe',
							'hideImages'      => 'Bilder ausblenden',
							'readableFont'    => 'Lesbare Schriftart',
							'dyslexicFont'    => 'Dyslexische Schriftart',
							'highlightTitles' => 'Titel hervorheben',
							'letterSpacing'   => 'Buchstabenabstand',
							'highlightAll'    => 'Alles hervorheben',
							'stopAnimations'  => 'Animationen stoppen',
						),
						'colors'        => array(
							'invertColors' => 'Farben umkehren',
							'brightness'   => 'Helligkeit',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Graustufen',
							'saturation'   => 'Sättigung',
						),
						'navigation'    => array(
							'readingLine'        => 'Leselinie',
							'highlightLinks'     => 'Links hervorheben',
							'readPage'           => 'Seite lesen',
							'readingMask'        => 'Lesemaske',
							'keyboardNavigation' => 'Tastaturnavigation',
						),
						'divider'       => array(
							'colors'     => 'Farben',
							'navigation' => 'Navigation',
						),
						'resetSettings' => 'Einstellungen zurücksetzen',
						'footer'        => array(
							'accessibilityStatement' => 'Erklärung zur Barrierefreiheit',
							'version'                => 'Version ' . $plugin_version,
						),
					),
					'es' => array(
						'header'        => array(
							'language'      => 'Español',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Ajustes de Accesibilidad',
							'desc'          => 'Desarrollado por',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Texto Más Grande',
							'cursor'          => 'Cursor',
							'lineHeight'      => 'Altura de Línea',
							'hideImages'      => 'Ocultar Imágenes',
							'readableFont'    => 'Fuente Legible',
							'dyslexicFont'    => 'Fuente Disléxica',
							'highlightTitles' => 'Resaltar títulos',
							'letterSpacing'   => 'Espaciado entre letras',
							'highlightAll'    => 'Resaltar todo',
							'stopAnimations'  => 'Detener animaciones',
						),
						'colors'        => array(
							'invertColors' => 'Invertir Colores',
							'brightness'   => 'Brillo',
							'contrast'     => 'Contraste',
							'grayscale'    => 'Escala de Grises',
							'saturation'   => 'Saturación',
						),
						'navigation'    => array(
							'readingLine'        => 'Línea de Lectura',
							'highlightLinks'     => 'Resaltar Enlaces',
							'readPage'           => 'Leer Página',
							'readingMask'        => 'Máscara de Lectura',
							'keyboardNavigation' => 'Navegación por teclado',
						),
						'divider'       => array(
							'colors'     => 'colores',
							'navigation' => 'navegación',
						),
						'resetSettings' => 'Restablecer Ajustes',
						'footer'        => array(
							'accessibilityStatement' => 'Declaración de Accesibilidad',
							'version'                => 'Versión ' . $plugin_version,
						),
					),
					'fr' => array(
						'header'        => array(
							'language'      => 'Français',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Ajustements d\'Accessibilité',
							'desc'          => 'Propulsé par',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Texte Plus Grand',
							'cursor'          => 'Curseur',
							'lineHeight'      => 'Hauteur de Ligne',
							'hideImages'      => 'Cacher les Images',
							'readableFont'    => 'Police Lisible',
							'dyslexicFont'    => 'Police Dyslexique',
							'highlightTitles' => 'Mettre en évidence les titres',
							'letterSpacing'   => 'Espacement des lettres',
							'highlightAll'    => 'Tout mettre en évidence',
							'stopAnimations'  => 'Arrêter les animations',
						),
						'colors'        => array(
							'invertColors' => 'Inverser les Couleurs',
							'brightness'   => 'Luminosité',
							'contrast'     => 'Contraste',
							'grayscale'    => 'Niveau de Gris',
							'saturation'   => 'Saturation',
						),
						'navigation'    => array(
							'readingLine'        => 'Ligne de Lecture',
							'highlightLinks'     => 'Surligner les Liens',
							'readPage'           => 'Lire la Page',
							'readingMask'        => 'Masque de Lecture',
							'keyboardNavigation' => 'Navigation au clavier',
						),
						'divider'       => array(
							'colors'     => 'couleurs',
							'navigation' => 'navigation',
						),
						'resetSettings' => 'Réinitialiser les Paramètres',
						'footer'        => array(
							'accessibilityStatement' => 'Déclaration d\'Accessibilité',
							'version'                => 'Version ' . $plugin_version,
						),
					),
					'it' => array(
						'header'        => array(
							'language'      => 'Italiano',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Regolazioni di Accessibilità',
							'desc'          => 'Powered by',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Testo Più Grande',
							'cursor'          => 'Cursore',
							'lineHeight'      => 'Altezza della Riga',
							'hideImages'      => 'Nascondi Immagini',
							'readableFont'    => 'Font Leggibile',
							'dyslexicFont'    => 'Font Dislessico',
							'highlightTitles' => 'Evidenzia titoli',
							'letterSpacing'   => 'Spaziatura tra lettere',
							'highlightAll'    => 'Evidenzia tutto',
							'stopAnimations'  => 'Ferma animazioni',
						),
						'colors'        => array(
							'invertColors' => 'Inverti Colori',
							'brightness'   => 'Luminosità',
							'contrast'     => 'Contrasto',
							'grayscale'    => 'Scala di Grigi',
							'saturation'   => 'Saturazione',
						),
						'navigation'    => array(
							'readingLine'        => 'Linea di Lettura',
							'highlightLinks'     => 'Evidenzia Link',
							'readPage'           => 'Leggi Pagina',
							'readingMask'        => 'Maschera di Lettura',
							'keyboardNavigation' => 'Navigazione da tastiera',
						),
						'divider'       => array(
							'colors'     => 'colori',
							'navigation' => 'navigazione',
						),
						'resetSettings' => 'Reimposta Impostazioni',
						'footer'        => array(
							'accessibilityStatement' => 'Dichiarazione di Accessibilità',
							'version'                => 'Versione ' . $plugin_version,
						),
					),
					'pl' => array(
						'header'        => array(
							'language'      => 'Polski',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Dostosowania Dostępności',
							'desc'          => 'Oparte na',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Większy Tekst',
							'cursor'          => 'Kursor',
							'lineHeight'      => 'Wysokość Linii',
							'hideImages'      => 'Ukryj Obrazy',
							'readableFont'    => 'Czytelna Cząstka',
							'dyslexicFont'    => 'Cząstka Dyslektyczna',
							'highlightTitles' => 'Wyróżnij tytuły',
							'letterSpacing'   => 'Odstępy między literami',
							'highlightAll'    => 'Wyróżnij wszystko',
							'stopAnimations'  => 'Zatrzymaj animacje',
						),
						'colors'        => array(
							'invertColors' => 'Odwróć Kolory',
							'brightness'   => 'Jasność',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Skala Szarości',
							'saturation'   => 'Nasycenie',
						),
						'navigation'    => array(
							'readingLine'        => 'Linia Czytania',
							'highlightLinks'     => 'Podświetl Linki',
							'readPage'           => 'Czytaj Stronę',
							'readingMask'        => 'Maska Czytania',
							'keyboardNavigation' => 'Nawigacja klawiaturą',
						),
						'divider'       => array(
							'colors'     => 'kolory',
							'navigation' => 'nawigacja',
						),
						'resetSettings' => 'Resetuj Ustawienia',
						'footer'        => array(
							'accessibilityStatement' => 'Oświadczenie o dostępności',
							'version'                => 'Wersja ' . $plugin_version,
						),
					),
					'se' => array(
						'header'        => array(
							'language'      => 'Svenska',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Tillgänglighetsjusteringar',
							'desc'          => 'Drivs av',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Större Text',
							'cursor'          => 'Muspekare',
							'lineHeight'      => 'Radavstånd',
							'hideImages'      => 'Dölj Bilder',
							'readableFont'    => 'Läslig Teckensnitt',
							'dyslexicFont'    => 'Dyslektisk Teckensnitt',
							'highlightTitles' => 'Markera titlar',
							'letterSpacing'   => 'Bokstavsavstånd',
							'highlightAll'    => 'Markera allt',
							'stopAnimations'  => 'Stoppa animationer',
						),
						'colors'        => array(
							'invertColors' => 'Invertera Färger',
							'brightness'   => 'Ljusstyrka',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Gråskala',
							'saturation'   => 'Mättnad',
						),
						'navigation'    => array(
							'readingLine'        => 'Läslinje',
							'highlightLinks'     => 'Markera Länkar',
							'readPage'           => 'Läs Sida',
							'readingMask'        => 'Läsmask',
							'keyboardNavigation' => 'Tangentbordsnavigering',
						),
						'divider'       => array(
							'colors'     => 'färger',
							'navigation' => 'navigering',
						),
						'resetSettings' => 'Återställ Inställningar',
						'footer'        => array(
							'accessibilityStatement' => 'Tillgänglighetsdeklaration',
							'version'                => 'Version ' . $plugin_version,
						),
					),
					'fi' => array(
						'header'        => array(
							'language'      => 'Suomi',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Saavutettavuuden Asetukset',
							'desc'          => 'Voimanlähde',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Suurempi Teksti',
							'cursor'          => 'Kohdistin',
							'lineHeight'      => 'Riviväli',
							'hideImages'      => 'Piilota Kuvia',
							'readableFont'    => 'Luettavissa oleva Fontti',
							'dyslexicFont'    => 'Dyslektinen Fontti',
							'highlightTitles' => 'Korosta otsikot',
							'letterSpacing'   => 'Kirjainväli',
							'highlightAll'    => 'Korosta kaikki',
							'stopAnimations'  => 'Pysäytä animaatiot',
						),
						'colors'        => array(
							'invertColors' => 'Käännä Värit',
							'brightness'   => 'Kirkkaus',
							'contrast'     => 'Kontrasti',
							'grayscale'    => 'Harmaasävy',
							'saturation'   => 'Väri-intensiivisyys',
						),
						'navigation'    => array(
							'readingLine'        => 'Lukuviiva',
							'highlightLinks'     => 'Korosta Linkkejä',
							'readPage'           => 'Lue Sivua',
							'readingMask'        => 'Lukupeite',
							'keyboardNavigation' => 'Näppäimistönavigointi',
						),
						'divider'       => array(
							'colors'     => 'värit',
							'navigation' => 'navigointi',
						),
						'resetSettings' => 'Nollaa Asetukset',
						'footer'        => array(
							'accessibilityStatement' => 'Saavutettavuuslausunto',
							'version'                => 'Versio ' . $plugin_version,
						),
					),
					'pt' => array(
						'header'        => array(
							'language'      => 'Português',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Ajustes de Acessibilidade',
							'desc'          => 'Desenvolvido por',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Texto Maior',
							'cursor'          => 'Cursor',
							'lineHeight'      => 'Altura da Linha',
							'hideImages'      => 'Ocultar Imagens',
							'readableFont'    => 'Fonte Legível',
							'dyslexicFont'    => 'Fonte para Disléxicos',
							'highlightTitles' => 'Destacar títulos',
							'letterSpacing'   => 'Espaçamento entre letras',
							'highlightAll'    => 'Destacar tudo',
							'stopAnimations'  => 'Parar animações',
						),
						'colors'        => array(
							'invertColors' => 'Inverter Cores',
							'brightness'   => 'Brilho',
							'contrast'     => 'Contraste',
							'grayscale'    => 'Escala de Cinza',
							'saturation'   => 'Saturação',
						),
						'navigation'    => array(
							'readingLine'        => 'Linha de Leitura',
							'highlightLinks'     => 'Destacar Links',
							'readPage'           => 'Ler Página',
							'readingMask'        => 'Máscara de Leitura',
							'keyboardNavigation' => 'Navegação por teclado',
						),
						'divider'       => array(
							'colors'     => 'Cores',
							'navigation' => 'Navegação',
						),
						'resetSettings' => 'Redefinir Ajustes',
						'footer'        => array(
							'accessibilityStatement' => 'Declaração de Acessibilidade',
							'version'                => 'Versão ' . $plugin_version,
						),
					),
					'ro' => array(
						'header'        => array(
							'language'      => 'Română',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Ajustări de Accesibilitate',
							'desc'          => 'Dezvoltat de',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Text Mai Mare',
							'cursor'          => 'Cursor',
							'lineHeight'      => 'Înălțimea Linie',
							'hideImages'      => 'Ascunde Imagini',
							'readableFont'    => 'Font Ușor de Citit',
							'dyslexicFont'    => 'Font pentru Dislexie',
							'highlightTitles' => 'Evidențiază titlurile',
							'letterSpacing'   => 'Distanța dintre litere',
							'highlightAll'    => 'Evidențiază tot',
							'stopAnimations'  => 'Oprește animațiile',
						),
						'colors'        => array(
							'invertColors' => 'Inversează Culorile',
							'brightness'   => 'Luminozitate',
							'contrast'     => 'Contrast',
							'grayscale'    => 'Scară de Gri',
							'saturation'   => 'Saturație',
						),
						'navigation'    => array(
							'readingLine'        => 'Linie de Citire',
							'highlightLinks'     => 'Evidențiază Linkuri',
							'readPage'           => 'Citește Pagina',
							'readingMask'        => 'Mască de Citire',
							'keyboardNavigation' => 'Navigare cu tastatura',
						),
						'divider'       => array(
							'colors'     => 'Culori',
							'navigation' => 'Navigare',
						),
						'resetSettings' => 'Resetează Setările',
						'footer'        => array(
							'accessibilityStatement' => 'Declarație de Accesibilitate',
							'version'                => 'Versiunea ' . $plugin_version,
						),
					),
					'si' => array(
						'header'        => array(
							'language'      => 'Slovenščina',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Prilagoditve Dostopnosti',
							'desc'          => 'Omogoča',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Večje Besedilo',
							'cursor'          => 'Kazalec',
							'lineHeight'      => 'Višina Vrstice',
							'hideImages'      => 'Skrij Slike',
							'readableFont'    => 'Beri Prijazna Pisava',
							'dyslexicFont'    => 'Pisava za Dislektike',
							'highlightTitles' => 'Istaknite naslove',
							'letterSpacing'   => 'Razmak između slova',
							'highlightAll'    => 'Istaknite sve',
							'stopAnimations'  => 'Zaustavite animacije',
						),
						'colors'        => array(
							'invertColors' => 'Obrni Barve',
							'brightness'   => 'Svetlost',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Sivinska',
							'saturation'   => 'Nasičenost',
						),
						'navigation'    => array(
							'readingLine'        => 'Črta za Branje',
							'highlightLinks'     => 'Poudari Povezave',
							'readPage'           => 'Preberi Stran',
							'readingMask'        => 'Maska za Branje',
							'keyboardNavigation' => 'Navigacija tastaturom',
						),
						'divider'       => array(
							'colors'     => 'Barve',
							'navigation' => 'Navigacija',
						),
						'resetSettings' => 'Ponastavi Nastavitve',
						'footer'        => array(
							'accessibilityStatement' => 'Izjava o Dostopnosti',
							'version'                => 'Različica ' . $plugin_version,
						),
					),
					'sk' => array(
						'header'        => array(
							'language'      => 'Slovenčina',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Prispôsobenia Prístupnosti',
							'desc'          => 'Podporované',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Väčší Text',
							'cursor'          => 'Kurzor',
							'lineHeight'      => 'Výška Riadku',
							'hideImages'      => 'Skryť Obrázky',
							'readableFont'    => 'Čitateľné Písmo',
							'dyslexicFont'    => 'Písmo pre Dyslektikov',
							'highlightTitles' => 'Zvýrazniť nadpisy',
							'letterSpacing'   => 'Medzery medzi písmenami',
							'highlightAll'    => 'Zvýrazniť všetko',
							'stopAnimations'  => 'Zastaviť animácie',
						),
						'colors'        => array(
							'invertColors' => 'Invertovať Farby',
							'brightness'   => 'Jas',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Odtiene Šedej',
							'saturation'   => 'Saturácia',
						),
						'navigation'    => array(
							'readingLine'        => 'Čítacia Čiara',
							'highlightLinks'     => 'Zvýrazniť Odkazy',
							'readPage'           => 'Čítať Stránku',
							'readingMask'        => 'Čítacia Maska',
							'keyboardNavigation' => 'Navigácia pomocou klávesnice',
						),
						'divider'       => array(
							'colors'     => 'Farby',
							'navigation' => 'Navigácia',
						),
						'resetSettings' => 'Obnoviť Nastavenia',
						'footer'        => array(
							'accessibilityStatement' => 'Vyhlásenie o Prístupnosti',
							'version'                => 'Verzia ' . $plugin_version,
						),
					),
					'nl' => array(
						'header'        => array(
							'language'      => 'Nederlands',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Toegankelijkheidsinstellingen',
							'desc'          => 'Aangedreven door',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Grotere tekst',
							'cursor'          => 'Cursor',
							'lineHeight'      => 'Lijnhoogte',
							'hideImages'      => 'Afbeeldingen verbergen',
							'readableFont'    => 'Leesbaar lettertype',
							'dyslexicFont'    => 'Dyslectisch lettertype',
							'highlightTitles' => 'Titel markeren',
							'letterSpacing'   => 'Letterafstand',
							'highlightAll'    => 'Alles markeren',
							'stopAnimations'  => 'Stop animaties',
						),
						'colors'        => array(
							'invertColors' => 'Kleuren omkeren',
							'brightness'   => 'Helderheid',
							'contrast'     => 'Contrast',
							'grayscale'    => 'Grijswaarden',
							'saturation'   => 'Verzadiging',
						),
						'navigation'    => array(
							'readingLine'        => 'Leeslijn',
							'highlightLinks'     => 'Links markeren',
							'readPage'           => 'Pagina lezen',
							'readingMask'        => 'Leesmassa',
							'keyboardNavigation' => 'Toetsenbordnavigatie',
						),
						'divider'       => array(
							'colors'     => 'kleuren',
							'navigation' => 'navigatie',
						),
						'resetSettings' => 'Instellingen opnieuw instellen',
						'footer'        => array(
							'accessibilityStatement' => 'Toegankelijkheidsverklaring',
							'version'                => 'Versie ' . $plugin_version,
						),
					),
					'dk' => array(
						'header'        => array(
							'language'      => 'Dansk',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Tilgængelighedsindstillinger',
							'desc'          => 'Drevet af',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Større tekst',
							'cursor'          => 'Cursor',
							'lineHeight'      => 'Linjehøjde',
							'hideImages'      => 'Skjul billeder',
							'readableFont'    => 'Læsbar skrifttype',
							'dyslexicFont'    => 'Dyslektisk skrifttype',
							'highlightTitles' => 'Fremhæv titler',
							'letterSpacing'   => 'Bokstavafstand',
							'highlightAll'    => 'Fremhæv alt',
							'stopAnimations'  => 'Stop animationer',
						),
						'colors'        => array(
							'invertColors' => 'Inverter farver',
							'brightness'   => 'Lysstyrke',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Gråtoner',
							'saturation'   => 'Mætning',
						),
						'navigation'    => array(
							'readingLine'        => 'Læselinje',
							'highlightLinks'     => 'Fremhæv links',
							'readPage'           => 'Læs side',
							'readingMask'        => 'Læsning Mask',
							'keyboardNavigation' => 'Tastaturnavigation',
						),
						'divider'       => array(
							'colors'     => 'farver',
							'navigation' => 'navigation',
						),
						'resetSettings' => 'Nulstil indstillinger',
						'footer'        => array(
							'accessibilityStatement' => 'Tilgængeligheds erklæring',
							'version'                => 'Version ' . $plugin_version,
						),
					),
					'gr' => array(
						'header'        => array(
							'language'      => 'Ελληνικά',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Ρυθμίσεις προσβασιμότητας',
							'desc'          => 'Powered by',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Μεγαλύτερο κείμενο',
							'cursor'          => 'Δείκτης',
							'lineHeight'      => 'Ύψος γραμμής',
							'hideImages'      => 'Απόκρυψη εικόνων',
							'readableFont'    => 'Ευανάγνωστη γραμματοσειρά',
							'dyslexicFont'    => 'Γραμματοσειρά δυσλεξίας',
							'highlightTitles' => 'Επισήμανση τίτλων',
							'letterSpacing'   => 'Απόσταση χαρακτήρων',
							'highlightAll'    => 'Επισήμανση όλων',
							'stopAnimations'  => 'Διακοπή κινήσεων',
						),
						'colors'        => array(
							'invertColors' => 'Αντίστροφη χρωμάτων',
							'brightness'   => 'Φωτεινότητα',
							'contrast'     => 'Αντίθεση',
							'grayscale'    => 'Ασπρόμαυρη',
							'saturation'   => 'Κορεσμός',
						),
						'navigation'    => array(
							'readingLine'        => 'Γραμμή ανάγνωσης',
							'highlightLinks'     => 'Επισήμανση συνδέσμων',
							'readPage'           => 'Ανάγνωση σελίδας',
							'readingMask'        => 'Μάσκα ανάγνωσης',
							'keyboardNavigation' => 'Πλοήγηση μέσω πληκτρολογίου',
						),
						'divider'       => array(
							'colors'     => 'χρώματα',
							'navigation' => 'πλοήγηση',
						),
						'resetSettings' => 'Επαναφορά ρυθμίσεων',
						'footer'        => array(
							'accessibilityStatement' => 'Δήλωση προσβασιμότητας',
							'version'                => 'Έκδοση ' . $plugin_version,
						),
					),
					'cz' => array(
						'header'        => array(
							'language'      => 'Čeština',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Nastavení přístupnosti',
							'desc'          => 'Napájeno',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Větší text',
							'cursor'          => 'Kurzór',
							'lineHeight'      => 'Výška řádku',
							'hideImages'      => 'Skrýt obrázky',
							'readableFont'    => 'Čitelný font',
							'dyslexicFont'    => 'Dyslektický font',
							'highlightTitles' => 'Zvýraznit nadpisy',
							'letterSpacing'   => 'Prostor mezi písmeny',
							'highlightAll'    => 'Zvýraznit vše',
							'stopAnimations'  => 'Zastavit animace',
						),
						'colors'        => array(
							'invertColors' => 'Obrácení barev',
							'brightness'   => 'Jas',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Šedá škála',
							'saturation'   => 'Sytost',
						),
						'navigation'    => array(
							'readingLine'        => 'Čtecí linka',
							'highlightLinks'     => 'Zvýraznit odkazy',
							'readPage'           => 'Číst stránku',
							'readingMask'        => 'Čtecí maska',
							'keyboardNavigation' => 'Navigace pomocí klávesnice',
						),
						'divider'       => array(
							'colors'     => 'barvy',
							'navigation' => 'navigace',
						),
						'resetSettings' => 'Obnovit nastavení',
						'footer'        => array(
							'accessibilityStatement' => 'Prohlášení o přístupnosti',
							'version'                => 'Verze ' . $plugin_version,
						),
					),
					'hu' => array(
						'header'        => array(
							'language'      => 'Magyar',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Hozzáférhetőségi beállítások',
							'desc'          => 'Powered by',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Nagyobb szöveg',
							'cursor'          => 'Kurzor',
							'lineHeight'      => 'Sorköz',
							'hideImages'      => 'Képek elrejtése',
							'readableFont'    => 'Olvasható betűtípus',
							'dyslexicFont'    => 'Diszlexiás betűtípus',
							'highlightTitles' => 'Címek kiemelése',
							'letterSpacing'   => 'Betűköz',
							'highlightAll'    => 'Minden kiemelése',
							'stopAnimations'  => 'Animációk leállítása',
						),
						'colors'        => array(
							'invertColors' => 'Színek invertálása',
							'brightness'   => 'Fényerő',
							'contrast'     => 'Kontraszt',
							'grayscale'    => 'Szürkeárnyalat',
							'saturation'   => 'Telítettség',
						),
						'navigation'    => array(
							'readingLine'        => 'Olvasóvonal',
							'highlightLinks'     => 'Hivatkozások kiemelése',
							'readPage'           => 'Oldal olvasása',
							'readingMask'        => 'Olvasómaszk',
							'keyboardNavigation' => 'Billentyűzettel való navigáció',
						),
						'divider'       => array(
							'colors'     => 'Színek',
							'navigation' => 'Navigáció',
						),
						'resetSettings' => 'Beállítások visszaállítása',
						'footer'        => array(
							'accessibilityStatement' => 'Hozzáférhetőségi nyilatkozat',
							'version'                => 'Verzió ' . $plugin_version,
						),
					),
					'lt' => array(
						'header'        => array(
							'language'      => 'Lietuvių',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Prieigos nustatymai',
							'desc'          => 'Palaiko',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Didesnis tekstas',
							'cursor'          => 'Kursorius',
							'lineHeight'      => 'Eilučių aukštis',
							'hideImages'      => 'Paslėpti nuotraukas',
							'readableFont'    => 'Skaityti raštą',
							'dyslexicFont'    => 'Diskleksinis šriftas',
							'highlightTitles' => 'Pažymėti antraštes',
							'letterSpacing'   => 'Rašto tarpai',
							'highlightAll'    => 'Pažymėti viską',
							'stopAnimations'  => 'Sustabdyti animacijas',
						),
						'colors'        => array(
							'invertColors' => 'Apversti spalvas',
							'brightness'   => 'Ryškumas',
							'contrast'     => 'Kontrastas',
							'grayscale'    => 'Pilkas',
							'saturation'   => 'Sotumas',
						),
						'navigation'    => array(
							'readingLine'        => 'Skaitymo linija',
							'highlightLinks'     => 'Pažymėti nuorodas',
							'readPage'           => 'Skaityti puslapį',
							'readingMask'        => 'Skaitymo masė',
							'keyboardNavigation' => 'Klaviatūros navigacija',
						),
						'divider'       => array(
							'colors'     => 'spalvos',
							'navigation' => 'navigacija',
						),
						'resetSettings' => 'Atstatyti nustatymus',
						'footer'        => array(
							'accessibilityStatement' => 'Prieigos pareiškimas',
							'version'                => 'Versija ' . $plugin_version,
						),
					),
					'lv' => array(
						'header'        => array(
							'language'      => 'Latviešu',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Piekļuves iestatījumi',
							'desc'          => 'Iespējojis',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Lielāks teksts',
							'cursor'          => 'Kursors',
							'lineHeight'      => 'Rindkopu augstums',
							'hideImages'      => 'Paslēpt attēlus',
							'readableFont'    => 'Lasāms fonts',
							'dyslexicFont'    => 'Dizleksijas fonts',
							'highlightTitles' => 'Izcelt virsrakstus',
							'letterSpacing'   => 'Burtu atstarpes',
							'highlightAll'    => 'Izcelt visu',
							'stopAnimations'  => 'Pārtraukt animācijas',
						),
						'colors'        => array(
							'invertColors' => 'Apgriezt krāsas',
							'brightness'   => 'Gaismas intensitāte',
							'contrast'     => 'Kontrasts',
							'grayscale'    => 'Pelēktoņu režīms',
							'saturation'   => 'Sotība',
						),
						'navigation'    => array(
							'readingLine'        => 'Lasīšanas līnija',
							'highlightLinks'     => 'Izcelt saites',
							'readPage'           => 'Lasīt lapu',
							'readingMask'        => 'Lasīšanas maska',
							'keyboardNavigation' => 'Navigācija ar tastatūru',
						),
						'divider'       => array(
							'colors'     => 'krāsas',
							'navigation' => 'navigācija',
						),
						'resetSettings' => 'Atiestatīt iestatījumus',
						'footer'        => array(
							'accessibilityStatement' => 'Piekļuves deklarācija',
							'version'                => 'Versija ' . $plugin_version,
						),
					),
					'ee' => array(
						'header'        => array(
							'language'      => 'Eesti',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Juurdepääsuvõimalused',
							'desc'          => 'Luba',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Suurem tekst',
							'cursor'          => 'Kursori suurus',
							'lineHeight'      => 'Ridade kõrgus',
							'hideImages'      => 'Peida pildid',
							'readableFont'    => 'Lugemiseks sobiv font',
							'dyslexicFont'    => 'Düsleksia font',
							'highlightTitles' => 'Tühista pealkirjad',
							'letterSpacing'   => 'Tähtede vahe',
							'highlightAll'    => 'Tühista kõik',
							'stopAnimations'  => 'Peata animatsioonid',
						),
						'colors'        => array(
							'invertColors' => 'Värvide pööramine',
							'brightness'   => 'Heledus',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Halltoon',
							'saturation'   => 'Satusatsioon',
						),
						'navigation'    => array(
							'readingLine'        => 'Lugemisliin',
							'highlightLinks'     => 'Rõhuta lingid',
							'readPage'           => 'Loe lehte',
							'readingMask'        => 'Lugemise mask',
							'keyboardNavigation' => 'Klaviatuuri navigeerimine',
						),
						'divider'       => array(
							'colors'     => 'värvid',
							'navigation' => 'navigeerimine',
						),
						'resetSettings' => 'Lähtesta seaded',
						'footer'        => array(
							'accessibilityStatement' => 'Ligipääsetavuse avaldus',
							'version'                => 'Versioon ' . $plugin_version,
						),
					),
					'hr' => array(
						'header'        => array(
							'language'      => 'Hrvatski',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Postavke pristupačnosti',
							'desc'          => 'Omogućeno',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Veći tekst',
							'cursor'          => 'Veličina kursora',
							'lineHeight'      => 'Visina linije',
							'hideImages'      => 'Sakrij slike',
							'readableFont'    => 'Font za čitanje',
							'dyslexicFont'    => 'Font za disleksiju',
							'highlightTitles' => 'Istakni naslove',
							'letterSpacing'   => 'Razmak između slova',
							'highlightAll'    => 'Istakni sve',
							'stopAnimations'  => 'Zaustavi animacije',
						),
						'colors'        => array(
							'invertColors' => 'Inverzija boja',
							'brightness'   => 'Svjetlina',
							'contrast'     => 'Kontrast',
							'grayscale'    => 'Sivi tonovi',
							'saturation'   => 'Zasićenost',
						),
						'navigation'    => array(
							'readingLine'        => 'Linija za čitanje',
							'highlightLinks'     => 'Istakni poveznice',
							'readPage'           => 'Čitaj stranicu',
							'readingMask'        => 'Maska za čitanje',
							'keyboardNavigation' => 'Navigacija pomoću tipkovnice',
						),
						'divider'       => array(
							'colors'     => 'boje',
							'navigation' => 'navigacija',
						),
						'resetSettings' => 'Poništi postavke',
						'footer'        => array(
							'accessibilityStatement' => 'Izjava o pristupačnosti',
							'version'                => 'Verzija ' . $plugin_version,
						),
					),
					'ie' => array(
						'header'        => array(
							'language'      => 'Gaeilge',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Socrucháin Inrochtana',
							'desc'          => 'Ár Power by',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'Téacs Níos Mó',
							'cursor'          => 'Méid Cúrsóra',
							'lineHeight'      => 'Airde Líne',
							'hideImages'      => 'Folaigh Íomhánna',
							'readableFont'    => 'Cló Léitheoireachta',
							'dyslexicFont'    => 'Cló Do Dhioplómaíocht',
							'highlightTitles' => 'Buaileadh Teidil',
							'letterSpacing'   => 'Spásáil Litreach',
							'highlightAll'    => 'Buaileadh Gach Rud',
							'stopAnimations'  => 'Stop Animations',
						),
						'colors'        => array(
							'invertColors' => 'Invers na gCiorcal',
							'brightness'   => 'Soilsiú',
							'contrast'     => 'Difriúlacht',
							'grayscale'    => 'Tón Griansceall',
							'saturation'   => 'Ábhar',
						),
						'navigation'    => array(
							'readingLine'        => 'Líne Léitheoireachta',
							'highlightLinks'     => 'Buaileadh na Ceangail',
							'readPage'           => 'Léigh Leathanach',
							'readingMask'        => 'Masca Léitheoireachta',
							'keyboardNavigation' => 'Rialúchán ar an gCláir',
						),
						'divider'       => array(
							'colors'     => 'Dathanna',
							'navigation' => 'Trealamh',
						),
						'resetSettings' => 'Athshocraigh Socruithe',
						'footer'        => array(
							'accessibilityStatement' => 'Tuarascáil ar Inrochtana',
							'version'                => 'Leagan ' . $plugin_version,
						),
					),
					'bg' => array(
						'header'        => array(
							'language'      => 'Български',
							'listLanguages' => array(
								'en' => 'English',
								'de' => 'Deutsch',
								'es' => 'Español',
								'fr' => 'Français',
								'it' => 'Italiano',
								'pl' => 'Polski',
								'se' => 'Svenska',
								'fi' => 'Suomi',
								'pt' => 'Português',
								'ro' => 'Română',
								'si' => 'Slovenščina',
								'sk' => 'Slovenčina',
								'nl' => 'Nederlands',
								'dk' => 'Dansk',
								'gr' => 'Ελληνικά',
								'cz' => 'Čeština',
								'hu' => 'Magyar',
								'lt' => 'Lietuvių',
								'lv' => 'Latviešu',
								'ee' => 'Eesti',
								'hr' => 'Hrvatski',
								'ie' => 'Gaeilge',
								'bg' => 'Български',
							),
							'title'         => 'Настройки за достъпност',
							'desc'          => 'Powered by',
							'anchor'        => 'OneTap',
						),
						'general'       => array(
							'biggerText'      => 'По-голям текст',
							'cursor'          => 'Размер на курсора',
							'lineHeight'      => 'Височина на реда',
							'hideImages'      => 'Скриване на изображения',
							'readableFont'    => 'Четлив шрифт',
							'dyslexicFont'    => 'Шрифт за дислексия',
							'highlightTitles' => 'Подчертаване на заглавия',
							'letterSpacing'   => 'Разстояние между букви',
							'highlightAll'    => 'Подчертаване на всичко',
							'stopAnimations'  => 'Спиране на анимациите',
						),
						'colors'        => array(
							'invertColors' => 'Обърнете цветовете',
							'brightness'   => 'Яркост',
							'contrast'     => 'Контраст',
							'grayscale'    => 'Черно-бяло',
							'saturation'   => 'Наситеност',
						),
						'navigation'    => array(
							'readingLine'        => 'Линия за четене',
							'highlightLinks'     => 'Подчертаване на връзки',
							'readPage'           => 'Четене на страницата',
							'readingMask'        => 'Маска за четене',
							'keyboardNavigation' => 'Навигация с клавиатура',
						),
						'divider'       => array(
							'colors'     => 'цветове',
							'navigation' => 'навигация',
						),
						'resetSettings' => 'Нулиране на настройките',
						'footer'        => array(
							'accessibilityStatement' => 'Декларация за достъпност',
							'version'                => 'Версия ' . $plugin_version,
						),
					),
				),
				'getSettings' => array(
					'language'               => $setting_language,
					'color'                  => $setting_color,
					'position-top-bottom'    => $setting_position_top_bottom,
					'position-left-right'    => $setting_position_left_right,
					'widge-position'         => $setting_widget_position,
					'hide-powered-by-onetap' => $setting_hide_powered_by_onetap,
				),
				'showModules' => array(
					'bigger-text'         => $modules_bigger_text,
					'cursor'              => $modules_cursor,
					'readable-font'       => $modules_readable_font,
					'grayscale'           => $modules_grayscale,
					'reading-line'        => $modules_reading_line,
					'highlight-links'     => $modules_highlight_links,
					'letter-spacing'      => $modules_letter_spacing,
					'highlight-all'       => $modules_highlight_all,
					'stop-animations'     => $modules_stop_animations,
					'keyboard-navigation' => $modules_keyboard_navigation,
					'highlight-titles'    => $modules_highlight_titles,
				),
			)
		);
	}

	/**
	 * Adds custom class to the body element.
	 *
	 * This function appends a custom class to the body tag, which can be used
	 * for additional styling or JavaScript targeting.
	 *
	 * @param array $classes An array of existing classes for the body tag.
	 * @return array Modified array of classes with the custom class added.
	 */
	public function add_custom_body_class( $classes ) {

		// Get the 'onetap_modules' option from the database.
		$modules                     = get_option( 'onetap_modules' );
		$modules_bigger_text         = isset( $modules['bigger-text'] ) ? esc_html( $modules['bigger-text'] ) : Accessibility_Onetap_Config::get_module( 'bigger_text' );
		$modules_cursor              = isset( $modules['cursor'] ) ? esc_html( $modules['cursor'] ) : Accessibility_Onetap_Config::get_module( 'cursor' );
		$modules_readable_font       = isset( $modules['readable-font'] ) ? esc_html( $modules['readable-font'] ) : Accessibility_Onetap_Config::get_module( 'readable_font' );
		$modules_grayscale           = isset( $modules['grayscale'] ) ? esc_html( $modules['grayscale'] ) : Accessibility_Onetap_Config::get_module( 'grayscale' );
		$modules_reading_line        = isset( $modules['reading-line'] ) ? esc_html( $modules['reading-line'] ) : Accessibility_Onetap_Config::get_module( 'reading_line' );
		$modules_highlight_links     = isset( $modules['highlight-links'] ) ? esc_html( $modules['highlight-links'] ) : Accessibility_Onetap_Config::get_module( 'highlight_links' );
		$modules_letter_spacing      = isset( $modules['letter-spacing'] ) ? esc_html( $modules['letter-spacing'] ) : Accessibility_Onetap_Config::get_module( 'letter_spacing' );
		$modules_highlight_all       = isset( $modules['highlight-all'] ) ? esc_html( $modules['highlight-all'] ) : Accessibility_Onetap_Config::get_module( 'highlight_all' );
		$modules_stop_animations     = isset( $modules['stop-animations'] ) ? esc_html( $modules['stop-animations'] ) : Accessibility_Onetap_Config::get_module( 'stop_animations' );
		$modules_keyboard_navigation = isset( $modules['keyboard-navigation'] ) ? esc_html( $modules['keyboard-navigation'] ) : Accessibility_Onetap_Config::get_module( 'keyboard_navigation' );
		$modules_highlight_titles    = isset( $modules['highlight-titles'] ) ? esc_html( $modules['highlight-titles'] ) : Accessibility_Onetap_Config::get_module( 'highlight_titles' );

		// Add default classes to the $classes array.
		$classes[] = 'onetap-root onetap-accessibility-plugin onetap-body-class onetap-custom-class onetap-classes';

		// Check if specific accessibility modules are turned off.
		// If a module is 'off', add its corresponding class to the $classes array.

		if ( 'off' === $modules_bigger_text ) {
			// Add class for the "bigger text" module.
			$classes[] = 'onetap_hide_bigger_text';
		}

		if ( 'off' === $modules_cursor ) {
			// Add class for the "big cursor" module.
			$classes[] = 'onetap_hide_cursor';
		}

		if ( 'off' === $modules_readable_font ) {
			// Add class for the "readable font" module.
			$classes[] = 'onetap_hide_readable_font';
		}

		if ( 'off' === $modules_grayscale ) {
			// Add class for the "grayscale" module.
			$classes[] = 'onetap_hide_grayscale';
		}

		if ( 'off' === $modules_reading_line ) {
			// Add class for the "reading line" module.
			$classes[] = 'onetap_hide_reading_line';
		}

		if ( 'off' === $modules_highlight_links ) {
			// Add class for the "highlight links" module.
			$classes[] = 'onetap_hide_highlight_links';
		}

		if ( 'off' === $modules_letter_spacing ) {
			// Add class for the "letter spacing" module.
			$classes[] = 'onetap_hide_letter_spacing';
		}

		if ( 'off' === $modules_highlight_all ) {
			// Add class for the "highlight on hover" module.
			$classes[] = 'onetap_hide_highlight_all';
		}

		if ( 'off' === $modules_stop_animations ) {
			// Add class for the "stop animations" module.
			$classes[] = 'onetap_hide_stop_animations';
		}

		if ( 'off' === $modules_bigger_text &&
			'off' === $modules_cursor &&
			'off' === $modules_highlight_all &&
			'off' === $modules_grayscale &&
			'off' === $modules_reading_line &&
			'off' === $modules_letter_spacing
		) {
			// Add class for the "bigger text" module.
			$classes[] = 'onetap_hide_feature_all_content';
		}

		if ( 'off' === $modules_highlight_links &&
			'off' === $modules_stop_animations &&
			'off' === $modules_readable_font
		) {
			// Add class for the "bigger text" module.
			$classes[] = 'onetap_hide_feature_bottom_content';
		}

		// Return the updated array of classes.
		return $classes;
	}

	/**
	 * Renders an accessibility HTML template.
	 *
	 * This function generates an HTML template that includes accessibility features
	 * It ensures the template adheres to WCAG guidelines for better user experience
	 * for people with disabilities.
	 */
	public function render_accessibility_template() {
		?>
		<section class="onetap-container-toggle">
			<div class="onetap-toggle">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
					<defs></defs>
					<g>
						<g id="Ebene_1">
							<circle cx="256" cy="256" r="256" />
							<g>
								<path style="fill: #fff;" d="M373.4,160.8l-65.4,10.2c-34.4,5.4-69.4,5.4-103.9,0l-65.4-10.2c-9.7-1.8-19.1,4.5-20.7,14.1-1.5,9.1,5.1,17.7,14.5,19.4l78.7,17.8c3.5.7,6.1,3.6,6.1,7.1h0c0,52-8.7,92.3-25.9,141.6l-9.1,26.2c-3.4,9.6,1.5,20.4,11.4,24,10.3,3.7,21.7-1.5,25.2-11.6l37.2-98.8,37.2,98.8c2.7,7.8,10.3,12.8,18.3,12.8s4.1-.3,6.2-1c10.1-3.3,15.6-13.9,12.2-23.7l-9.3-26.7c-17.2-49.3-25.9-89.6-25.9-141.6h0c0-3.5,2.5-6.5,6.1-7.1l78.7-17.8c9.4-1.7,16-10.3,14.5-19.4-1.5-9.6-10.9-15.9-20.7-14.1Z" />
								<circle style="fill: #fff;" cx="256" cy="133.4" r="33.6" transform="translate(-30.4 97.1) rotate(-20.3)" />
							</g>
							<path style="fill: #fff;" d="M-115.7,65c1.9,0,1.9-3,0-3s-1.9,3,0,3h0Z" />
						</g>
					</g>
				</svg>
			</div>
		</section>
		<nav class="onetap-accessibility onetap-plugin-onetap">
			<section class="onetap-container">
				<div class="onetap-accessibility-settings">
					<header class="onetap-header-top">
						<!-- Languages -->
						<div class="onetap-languages">
							<div class="onetap-icon">
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/english.png' ); ?>" class="onetap-active" alt="en">							
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/german.png' ); ?>" alt="de">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/spanish.png' ); ?>" alt="es">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/french.png' ); ?>" alt="fr">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/italia.png' ); ?>" alt="it">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/poland.png' ); ?>" alt="pl">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/swedish.png' ); ?>" alt="se">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/finnland.png' ); ?>" alt="fi">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/portugal.png' ); ?>" alt="pt">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/rumania.png' ); ?>" alt="ro">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/slowenien.png' ); ?>" alt="sk">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/slowakia.png' ); ?>" alt="si">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/netherland.png' ); ?>" alt="nl">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/danish.png' ); ?>" alt="dk">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/greece.png' ); ?>" alt="gr">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/czech.png' ); ?>" alt="cz">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/hungarian.png' ); ?>" alt="hu">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/lithuanian.png' ); ?>" alt="lt">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/latvian.png' ); ?>" alt="lv">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/estonian.png' ); ?>" alt="ee">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/croatia.png' ); ?>" alt="hr">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/ireland.png' ); ?>" alt="ie">								
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . 'assets/images/bulgarian.png' ); ?>" alt="bg">								
							</div>
							<p class="onetap-text">
								<span>
									<?php esc_html_e( 'English', 'accessibility-onetap' ); ?>
								</span>
								<img src="<?php echo esc_url( ACCESSIBILITY_ONETAP_PLUGINS_URL . '/assets/images/icon-drop-down-menu.png' ); ?>" width="10" height="10" alt="<?php echo esc_attr__( 'icon drop down menu', 'accessibility-onetap' ); ?>">
							</p>
						</div>

						<!-- List of languages -->
						<div class="onetap-list-of-languages" style="display: none;">
							<ul>
								<li data-language="en">
									<?php esc_html_e( 'English', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="de">
									<?php esc_html_e( 'Deutsch', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="es">
									<?php esc_html_e( 'Español', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="fr">
									<?php esc_html_e( 'Français', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="it">
									<?php esc_html_e( 'Italiano', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="pl">
									<?php esc_html_e( 'Polski', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="se">
									<?php esc_html_e( 'Svenska', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="fi">
									<?php esc_html_e( 'Suomi', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="pt">
									<?php esc_html_e( 'Português', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="ro">
									<?php esc_html_e( 'Română', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="si">
									<?php esc_html_e( 'Slovenščina', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="sk">
									<?php esc_html_e( 'Slovenčina', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="nl">
									<?php esc_html_e( 'Nederlands', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="dk">
									<?php esc_html_e( 'Dansk', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="gr">
									<?php esc_html_e( 'Ελληνικά', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="cz">
									<?php esc_html_e( 'Čeština', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="hu">
									<?php esc_html_e( 'Magyar', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="lt">
									<?php esc_html_e( 'Lietuvių', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="lv">
									<?php esc_html_e( 'Latviešu', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="ee">
									<?php esc_html_e( 'Eesti', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="hr">
									<?php esc_html_e( 'Hrvatski', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="ie">
									<?php esc_html_e( 'Gaeilge', 'accessibility-onetap' ); ?>
								</li>
								<li data-language="bg">
									<?php esc_html_e( 'Български', 'accessibility-onetap' ); ?>
								</li>
							</ul>
						</div>

						<!-- Close -->
						<div class="onetap-close" style="display: none;">
							<i class="eicon-close"></i>
						</div>

						<!-- Info -->
						<div class="onetap-site-container">
							<div class="onetap-site-info">
								<div class="onetap-image">
									<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="0 0 659.1 659.1" style="enable-background:new 0 0 659.1 659.1;" xml:space="preserve">
									<path class="st0" fill="none" d="M168.6,7.5h322c89,0,161.1,72.1,161.1,161.1v322c0,89-72.1,161.1-161.1,161.1h-322
										c-89,0-161.1-72.1-161.1-161.1v-322C7.5,79.6,79.6,7.5,168.6,7.5z"/>
									<path class="st1" fill="#FFFFFF" d="M490.6,7.5h-322C79.6,7.5,7.5,79.6,7.5,168.6v322c0,89,72.1,161.1,161.1,161.1h322c89,0,161.1-72.1,161.1-161.1
										v-322C651.7,79.6,579.6,7.5,490.6,7.5z M329.6,136.2c23,0,41.6,18.6,41.6,41.6s-18.6,41.6-41.6,41.6S288,200.8,288,177.8
										S306.6,136.2,329.6,136.2z M482.4,253.4l-97.4,22c-4.3,0.8-7.5,4.5-7.5,8.8c0,64.4,10.9,114.3,32.1,175.3l11.5,33.1
										c4.2,12.2-2.6,25.3-15.1,29.4c-2.6,0.8,2.3,1.2-7.7,1.2s-19.3-6.1-22.7-15.8L329.5,385l-46.1,122.4c-4.3,12.4-18.3,18.9-31.1,14.3
										c-12.2-4.4-18.3-17.8-14.1-29.7l11.3-32.5c21.3-61,32.1-110.9,32.1-175.3c0-4.3-3.1-8-7.5-8.8l-97.4-22c-11.6-2.2-19.8-12.8-18-24.1
										c1.9-11.9,13.5-19.7,25.6-17.5l81,12.6c42.6,6.6,86,6.6,128.6,0l81-12.6v0.1c12-2.1,23.6,5.7,25.5,17.5
										C502.2,240.7,494,251.3,482.4,253.4z"/>
									</svg>
								</div>
								<div class="onetap-title">
									<h2>
										<?php esc_html_e( 'Accessibility  Adjustments', 'accessibility-onetap' ); ?>
									</h2>
								</div>
								<div class="onetap-desc">
									<p>
										<span>
											<?php esc_html_e( 'Powered by', 'accessibility-onetap' ); ?>
										</span>
										<a href="<?php echo esc_url( 'https://wponetap.com/' ); ?>" target="_blank">
											<?php esc_html_e( 'OneTap', 'accessibility-onetap' ); ?>
										</a>
									</p>
								</div>
							</div>
						</div>
					</header>

					<!-- Features content -->
					<div class="onetap-features-container onetap-feature-content">
						<div class="onetap-features">
							<!-- Feature Bigger Text -->
							<div class="onetap-box-feature onetap-bigger-text">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 3" viewBox="0 0 24 24">
											<path d="M3.815 3.278c-.484.115-.717.726-.432 1.13a.951.951 0 0 0 .277.248l.16.084 8.06.011c5.766.007 8.121-.002 8.274-.034.748-.155.775-1.244.035-1.431-.211-.053-16.153-.061-16.374-.008m7.97 4.01c-.325.088-.312.064-2.35 4.412-1.772 3.781-1.912 4.096-1.913 4.296a.706.706 0 0 0 .739.737.674.674 0 0 0 .544-.243c.052-.062.221-.386.375-.72l.28-.607 2.532-.002 2.533-.001.3.63c.165.347.34.672.388.724a.677.677 0 0 0 .526.217c.431 0 .741-.304.741-.727 0-.192-.154-.538-1.906-4.276-1.048-2.238-1.939-4.116-1.98-4.175-.164-.233-.508-.346-.809-.265m1.115 4.393c.484 1.034.886 1.898.893 1.92.009.025-.631.039-1.794.039-1.477 0-1.804-.01-1.787-.053C10.283 13.402 11.984 9.8 12 9.8c.011 0 .416.847.9 1.881m-9.085 7.597c-.484.115-.717.726-.432 1.13a.951.951 0 0 0 .277.248l.16.084 8.06.011c5.766.007 8.121-.002 8.274-.034.748-.155.775-1.244.035-1.431-.211-.053-16.153-.061-16.374-.008" fill-rule="evenodd"></path>
										</svg>
									</span>
								</div>
								<div class="onetap-title">
									<h3><?php esc_html_e( 'Bigger Text', 'accessibility-onetap' ); ?></h3>
									<p class="onetap-option-levels">
										<span class="onetap-level onetap-level1"></span>
										<span class="onetap-level onetap-level2"></span>
										<span class="onetap-level onetap-level3"></span>
									</p>
								</div>
							</div>

							<!-- Feature Cursor -->
							<div class="onetap-box-feature onetap-cursor">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path d="M4.72 3.286a1.931 1.931 0 0 0-.92.458c-.383.358-.599.985-.516 1.499.066.412 3.864 13.271 4.004 13.557a1.7 1.7 0 0 0 1.76.92c.37-.052.752-.236.991-.477.099-.101.592-.773 1.095-1.493.502-.721.924-1.31.938-1.31.013 0 .925.897 2.026 1.994 1.793 1.786 2.029 2.007 2.262 2.119a1.805 1.805 0 0 0 1.548.009c.245-.114.384-.239 1.4-1.254 1.015-1.016 1.14-1.155 1.254-1.4a1.805 1.805 0 0 0-.009-1.548c-.112-.233-.333-.469-2.119-2.262-1.097-1.101-1.994-2.013-1.994-2.026 0-.014.589-.436 1.31-.938.72-.503 1.392-.996 1.493-1.095.812-.803.579-2.252-.443-2.751-.464-.227-13.662-4.082-13.84-4.043l-.24.041m6.884 3.394c3.59 1.056 6.553 1.941 6.584 1.967.034.028.051.102.044.189-.012.139-.05.169-1.712 1.332-.935.654-1.742 1.229-1.792 1.277a.948.948 0 0 0-.156.21c-.076.147-.083.49-.013.627.027.054 1.092 1.142 2.365 2.419 2.021 2.025 2.316 2.336 2.316 2.44 0 .101-.141.259-.99 1.109-.85.85-1.006.99-1.109.99-.104 0-.414-.294-2.46-2.337-1.67-1.668-2.375-2.347-2.461-2.369a.85.85 0 0 0-.605.062c-.17.096-.127.038-1.727 2.324-.884 1.263-.914 1.3-1.052 1.312-.089.008-.161-.01-.191-.046C8.588 18.117 4.76 5.114 4.76 4.99c0-.114.113-.23.224-.23.051 0 3.03.864 6.62 1.92" fill-rule="evenodd"></path>
										</svg>
									</span>
								</div>
								<div class="onetap-title">
									<h3><?php esc_html_e( 'Cursor', 'accessibility-onetap' ); ?></h3>
									<p class="onetap-option-levels">
										<span class="onetap-level onetap-level1"></span>
										<span class="onetap-level onetap-level2"></span>
										<span class="onetap-level onetap-level3"></span>
									</p>
								</div>
							</div>

							<!-- Highlight All -->
							<div class="onetap-box-feature onetap-highlight-all">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.533 2.282c-2.527.207-4.649 2.073-5.15 4.529-.124.602-.142 1.271-.142 5.189s.018 4.587.142 5.189c.445 2.183 2.245 3.983 4.428 4.428.602.124 1.271.142 5.189.142s4.587-.018 5.189-.141c2.179-.445 3.984-2.25 4.429-4.429.123-.602.141-1.271.141-5.189s-.018-4.587-.141-5.189c-.292-1.427-1.211-2.78-2.438-3.589-.858-.566-1.705-.854-2.771-.942-.546-.045-8.323-.044-8.876.002m9.487 1.583c1.616.474 2.683 1.556 3.128 3.175.067.243.072.568.072 4.96s-.005 4.717-.072 4.96c-.229.832-.597 1.484-1.15 2.038-.554.553-1.206.921-2.038 1.15-.243.067-.568.072-4.96.072s-4.717-.005-4.96-.072c-.832-.229-1.484-.597-2.038-1.15a4.422 4.422 0 0 1-1.146-2.038c-.073-.286-.076-.511-.076-4.98V7.3l.09-.326a4.39 4.39 0 0 1 1.132-1.972A4.397 4.397 0 0 1 7.4 3.786c.055-.009 2.179-.013 4.72-.01 4.531.007 4.625.009 4.9.089m-9.84 3.97a.61.61 0 0 0-.358.375c-.114.273-.039.659.164.838.224.199.036.192 5.023.191 4.427-.001 4.659-.004 4.811-.074a.61.61 0 0 0 .358-.375.74.74 0 0 0 0-.58.61.61 0 0 0-.358-.375c-.152-.07-.383-.073-4.82-.073s-4.668.003-4.82.073m.24 3.424a1.675 1.675 0 0 1-.149.038c-.147.032-.39.251-.457.411a.736.736 0 0 0 .201.842c.08.071.196.143.256.159.143.04 9.315.04 9.458 0 .152-.042.392-.262.457-.417a.742.742 0 0 0-.139-.786c-.25-.265.129-.245-4.967-.253a424.68 424.68 0 0 0-4.66.006m-.24 3.576a.61.61 0 0 0-.358.375c-.114.273-.039.659.164.838.224.199.036.192 5.023.191 4.427-.001 4.659-.004 4.811-.074a.61.61 0 0 0 .358-.375.74.74 0 0 0 0-.58.61.61 0 0 0-.358-.375c-.152-.07-.383-.073-4.82-.073s-4.668.003-4.82.073" fill-rule="evenodd"></path></svg>
									</span>
								</div>
								<div class="onetap-title">
									<h3><?php esc_html_e( 'Highlight All', 'accessibility-onetap' ); ?></h3>
								</div>
							</div>							

							<!-- Feature Grayscale -->
							<div class="onetap-box-feature onetap-grayscale">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path d="M11.32 2.281a9.812 9.812 0 0 0-5.418 2.111c-.363.287-1.223 1.147-1.51 1.51-1.12 1.417-1.801 3.021-2.055 4.838-.09.647-.09 1.874.001 2.52.254 1.817.936 3.423 2.054 4.838.287.363 1.147 1.223 1.51 1.51A10.013 10.013 0 0 0 9.9 21.516c1.326.29 2.874.29 4.2 0a10.013 10.013 0 0 0 3.998-1.908c.363-.287 1.223-1.147 1.51-1.51a10.013 10.013 0 0 0 1.908-3.998c.29-1.326.29-2.874 0-4.2a10.013 10.013 0 0 0-1.908-3.998c-.287-.363-1.147-1.223-1.51-1.51a9.843 9.843 0 0 0-6.778-2.111m-.08 9.725v8.206l-.251-.024c-.761-.071-1.789-.38-2.615-.786a7.592 7.592 0 0 1-2.128-1.498 8.305 8.305 0 0 1-2.444-4.943c-.054-.436-.054-1.486 0-1.922.185-1.499.807-3.005 1.71-4.139a8.38 8.38 0 0 1 5.089-3.037c.165-.03.376-.056.469-.059l.17-.004v8.206m2.441-8.084c1.228.253 2.593.9 3.503 1.659.986.823 1.68 1.695 2.218 2.793A7.864 7.864 0 0 1 20.24 12a7.864 7.864 0 0 1-.838 3.626c-.538 1.098-1.232 1.97-2.218 2.793-1.083.904-2.829 1.644-4.173 1.769l-.251.024V3.788l.251.024c.138.013.44.062.67.11" fill-rule="evenodd"></path>
										</svg>
									</span>
								</div>
								<div class="onetap-title">
									<h3><?php esc_html_e( 'Grayscale', 'accessibility-onetap' ); ?></h3>
									<p class="onetap-option-levels">
										<span class="onetap-level onetap-level1"></span>
										<span class="onetap-level onetap-level2"></span>
										<span class="onetap-level onetap-level3"></span>
									</p>
								</div>
							</div>							

							<!-- Feature  Reading Line-->
							<div class="onetap-box-feature onetap-reading-line">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path d="M5.74 3.266a3.841 3.841 0 0 0-2.334 1.031c-.526.494-.95 1.287-1.093 2.045-.037.194-.053.671-.053 1.578 0 1.29.001 1.301.093 1.449.357.574 1.223.443 1.363-.207.026-.123.044-.667.044-1.356 0-1.271.021-1.425.25-1.863.165-.314.619-.768.933-.933.507-.266.065-.25 7.057-.25 6.994 0 6.554-.016 7.054.25.466.249.868.708 1.073 1.224.085.214.091.298.111 1.606.022 1.356.024 1.383.115 1.529a.74.74 0 0 0 1.368-.235c.071-.342.029-2.536-.056-2.909-.334-1.469-1.393-2.529-2.89-2.894-.251-.061-.828-.068-6.575-.073a830.09 830.09 0 0 0-6.46.008m-3.925 8.01c-.486.123-.717.728-.432 1.132.219.31.309.332 1.337.332.495 0 .949-.014 1.009-.031.152-.042.392-.262.457-.417a.742.742 0 0 0-.139-.786c-.223-.235-.269-.245-1.227-.253-.484-.005-.936.006-1.005.023m4.636.001c-.177.045-.305.135-.438.309-.098.128-.113.183-.113.417 0 .242.013.285.124.423.249.308.275.314 1.363.314h.966l.172-.121c.236-.166.334-.346.334-.619s-.097-.453-.334-.619l-.172-.121-.886-.008c-.488-.004-.945.007-1.016.025m4.643-.001c-.659.166-.791 1.031-.208 1.364.172.099.186.1 1.114.1.928 0 .942-.001 1.114-.1a.737.737 0 0 0 .006-1.274c-.178-.105-.188-.106-1.04-.114-.473-.004-.917.007-.986.024m4.597.001a.88.88 0 0 0-.479.375.88.88 0 0 0-.069.348c-.002.273.094.452.332.619l.172.121h.966c1.088 0 1.114-.006 1.363-.314.112-.138.124-.181.124-.426s-.012-.288-.124-.426c-.244-.302-.287-.313-1.276-.322-.484-.004-.938.007-1.009.025m4.729-.017a2.274 2.274 0 0 1-.149.037c-.147.032-.39.251-.457.411a.742.742 0 0 0 .139.786c.218.23.278.244 1.154.259.992.017 1.196-.016 1.412-.232.399-.399.212-1.098-.33-1.235-.164-.041-1.658-.063-1.769-.026M2.815 14.277a.8.8 0 0 0-.462.354c-.089.143-.093.181-.092.949.002 1.092.093 1.531.458 2.208a3.736 3.736 0 0 0 2.623 1.899c.409.078 12.907.078 13.316 0a3.768 3.768 0 0 0 3.004-2.912c.084-.388.122-1.61.06-1.909a.74.74 0 0 0-1.369-.235c-.087.14-.094.201-.116 1.029-.021.777-.034.906-.112 1.106a2.426 2.426 0 0 1-1.071 1.224c-.5.266-.06.25-7.054.25-6.992 0-6.55.016-7.057-.25-.314-.165-.768-.619-.933-.933-.206-.394-.25-.633-.251-1.375-.001-.731-.037-.959-.179-1.146-.159-.209-.502-.325-.765-.259" fill-rule="evenodd"></path>
										</svg>
									</span>
								</div>
								<div class="onetap-title">
									<h3><?php esc_html_e( 'Reading Line', 'accessibility-onetap' ); ?></h3>
								</div>
							</div>

							<!-- Letter Spacing -->
							<div class="onetap-box-feature onetap-letter-spacing">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24" xml:space="preserve"><path d="M6.18 2.837c-.222.104-2.794 2.688-2.879 2.892a.661.661 0 0 0 .016.571c.104.222 2.688 2.794 2.892 2.879a.802.802 0 0 0 .805-.131c.113-.1.224-.366.225-.539.002-.282-.101-.427-.77-1.099l-.648-.65h12.358l-.648.65c-.669.672-.772.817-.77 1.099.001.173.112.439.225.539a.802.802 0 0 0 .805.131c.204-.085 2.788-2.657 2.892-2.879a.864.864 0 0 0 .075-.3.864.864 0 0 0-.075-.3c-.104-.222-2.688-2.794-2.892-2.879a.802.802 0 0 0-.805.131c-.113.1-.224.366-.225.539-.002.282.101.427.77 1.099l.648.65H5.821l.648-.65c.669-.672.772-.817.77-1.099-.001-.173-.112-.439-.225-.539a.792.792 0 0 0-.834-.115m-2.365 9.44a.8.8 0 0 0-.462.354l-.093.149v8.44l.093.149c.357.574 1.223.443 1.363-.207.059-.277.06-8.064.001-8.321a.747.747 0 0 0-.902-.564m8 0a.8.8 0 0 0-.462.354l-.093.149v8.44l.093.149c.357.574 1.223.443 1.363-.207.059-.277.06-8.064.001-8.321a.747.747 0 0 0-.902-.564m8 0a.8.8 0 0 0-.462.354l-.093.149v8.44l.093.149c.357.574 1.223.443 1.363-.207.059-.277.06-8.064.001-8.321a.747.747 0 0 0-.902-.564m-12 2a.8.8 0 0 0-.462.354l-.093.149v6.44l.093.149c.357.574 1.223.443 1.363-.207.059-.275.06-6.065.001-6.321a.747.747 0 0 0-.902-.564m8 0a.8.8 0 0 0-.462.354l-.093.149v6.44l.093.149c.357.574 1.223.443 1.363-.207.059-.275.06-6.065.001-6.321a.747.747 0 0 0-.902-.564" fill-rule="evenodd"></path></svg>
									</span>
								</div>
								<div class="onetap-title">
									<h3><?php esc_html_e( 'Letter Spacing', 'accessibility-onetap' ); ?></h3>
									<p class="onetap-option-levels">
										<span class="onetap-level onetap-level1"></span>
										<span class="onetap-level onetap-level2"></span>
										<span class="onetap-level onetap-level3"></span>
									</p>
								</div>
							</div>							

						</div>
					</div>

					<!-- Features content bottom -->
					<div class="onetap-features-container onetap-feature-content-bottom">
						<div class="onetap-features">
							<!-- Feature Highlight Links -->
							<div class="onetap-box-feature onetap-highlight-links">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 3" viewBox="0 0 24 24">
											<path d="M16.28 2.227a6.03 6.03 0 0 0-1.768.517c-.656.332-.812.47-3.136 2.793C9.372 7.54 9.104 7.823 8.871 8.18a4.967 4.967 0 0 0-.648 1.394c-.149.516-.191.822-.189 1.406.003 1.29.418 2.363 1.317 3.407.462.536 1.45 1.173 1.82 1.173a.904.904 0 0 0 .522-.192c.229-.207.288-.59.137-.89-.092-.182-.201-.267-.717-.558-.478-.269-1.043-.937-1.305-1.54-.229-.528-.268-.738-.265-1.44.003-.589.012-.667.115-.98.125-.382.246-.637.454-.96.165-.256 4.036-4.163 4.482-4.525.929-.752 2.207-.965 3.368-.562a3.561 3.561 0 0 1 2.125 2.125c.381 1.098.208 2.325-.458 3.24-.089.122-.626.69-1.193 1.262-1.056 1.064-1.156 1.192-1.156 1.48 0 .16.089.398.192.514.102.116.368.224.548.224.306 0 .436-.103 1.581-1.263 1.306-1.322 1.556-1.66 1.877-2.53.798-2.165.001-4.63-1.91-5.902-.961-.64-2.182-.95-3.288-.836m-3.693 6.252a.755.755 0 0 0-.413 1.094c.079.133.177.211.49.387.463.26.969.718 1.232 1.114.229.346.44.86.526 1.285.1.491.064 1.219-.082 1.681a3.79 3.79 0 0 1-.619 1.177c-.283.353-4.186 4.227-4.412 4.38a4.124 4.124 0 0 1-1.057.492c-.417.12-1.406.129-1.812.016-1.047-.29-1.955-1.067-2.359-2.016-.217-.511-.258-.736-.259-1.409-.001-.702.064-1.011.319-1.527.224-.454.378-.636 1.444-1.713 1.034-1.044 1.135-1.173 1.135-1.46a.918.918 0 0 0-.192-.514c-.187-.211-.586-.28-.868-.15-.225.103-2.172 2.084-2.454 2.496a4.897 4.897 0 0 0-.886 2.868c0 1.185.334 2.161 1.062 3.1.944 1.218 2.357 1.9 3.938 1.9 1.062 0 1.924-.264 2.839-.87.27-.18.745-.628 2.296-2.168 1.075-1.068 2.088-2.094 2.252-2.279a5.18 5.18 0 0 0 1.216-2.557c.064-.391.052-1.249-.022-1.666-.269-1.507-1.266-2.856-2.612-3.536-.271-.136-.524-.182-.702-.125" fill-rule="evenodd"></path>
										</svg>
									</span>
								</div>
								<div class="onetap-title">
									<h3><?php esc_html_e( 'Highlight Links', 'accessibility-onetap' ); ?></h3>
								</div>
							</div>
				 
							<!-- Stop Animations -->
							<div class="onetap-box-feature onetap-stop-animations">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 3" viewBox="0 0 24 24"><path d="M11.815 2.277a.8.8 0 0 0-.462.354l-.093.149v3.44l.093.149c.357.574 1.223.443 1.363-.207.057-.268.058-3.072.001-3.321a.747.747 0 0 0-.902-.564M5.38 4.938a.75.75 0 0 0-.379 1.082c.041.066.593.635 1.227 1.265 1.087 1.082 1.163 1.148 1.343 1.186.572.119 1.019-.328.9-.9-.038-.18-.104-.256-1.186-1.343-.63-.634-1.201-1.188-1.27-1.23a.785.785 0 0 0-.635-.06m12.74-.011c-.106.03-.423.322-1.309 1.204-.643.64-1.199 1.226-1.235 1.302a.805.805 0 0 0 .029.692c.157.284.478.418.824.346.18-.038.256-.104 1.343-1.186.634-.63 1.185-1.199 1.225-1.265a.73.73 0 0 0-.112-.904c-.21-.21-.467-.274-.765-.189M2.815 11.278c-.484.115-.717.726-.432 1.13a.951.951 0 0 0 .277.248c.153.08.228.085 1.713.096 1.793.014 1.914.001 2.146-.231.399-.399.212-1.098-.33-1.235-.208-.052-3.16-.059-3.374-.008m15 0c-.484.115-.717.726-.432 1.13a.951.951 0 0 0 .277.248c.153.08.228.085 1.713.096 1.793.014 1.914.001 2.146-.231.399-.399.212-1.098-.33-1.235-.208-.052-3.16-.059-3.374-.008M7.56 15.53c-.166.035-.272.129-1.332 1.184-.634.63-1.186 1.2-1.227 1.266a.73.73 0 0 0 .114.905c.244.244.613.29.905.112.066-.04.635-.591 1.265-1.225 1.082-1.087 1.148-1.163 1.186-1.343.071-.341-.063-.669-.333-.814a.75.75 0 0 0-.578-.085m8.534-.011c-.423.099-.656.475-.565.91.038.18.104.256 1.186 1.343.63.634 1.199 1.185 1.265 1.225.654.397 1.414-.363 1.017-1.017-.04-.066-.591-.635-1.225-1.265-.947-.943-1.177-1.151-1.292-1.173a11.46 11.46 0 0 0-.2-.04.555.555 0 0 0-.186.017m-4.279 1.758a.8.8 0 0 0-.462.354l-.093.149v3.44l.093.149c.357.574 1.223.443 1.363-.207.057-.268.058-3.072.001-3.321a.747.747 0 0 0-.902-.564" fill-rule="evenodd"></path></svg>
									</span>
								</div>
								<div class="onetap-title">
									<h3><?php esc_html_e( 'Stop Animations', 'accessibility-onetap' ); ?></h3>
								</div>
							</div>					

							<!-- Feature Readable Font -->
							<div class="onetap-box-feature onetap-readable-font">
								<div class="onetap-icon">
									<span class="onetap-icon-animation">
										<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 3" viewBox="0 0 24 24">
											<path d="M11.34 2.281C7.073 2.553 3.439 5.66 2.499 9.84a10.086 10.086 0 0 0 0 4.32 9.76 9.76 0 0 0 7.341 7.341c1.393.313 2.93.312 4.336-.003 3.289-.739 5.985-3.188 7.068-6.422a9.928 9.928 0 0 0 .257-5.236 9.76 9.76 0 0 0-7.341-7.341 10.445 10.445 0 0 0-2.82-.218m1.621 1.521a8.318 8.318 0 0 1 5.894 3.608c.543.802 1.034 1.968 1.222 2.899.124.611.163 1.019.163 1.691 0 1.332-.263 2.465-.845 3.642a8.146 8.146 0 0 1-3.753 3.753c-1.177.582-2.31.845-3.642.845a7.867 7.867 0 0 1-3.626-.836 8.266 8.266 0 0 1-4.572-6.443c-.054-.436-.054-1.486 0-1.922.195-1.582.857-3.123 1.846-4.299.337-.4.751-.811 1.168-1.159 1.084-.904 2.682-1.585 4.168-1.775.395-.051 1.579-.053 1.977-.004M11.614 7.62c-.134.08-.2.167-.345.45-.386.755-3.301 6.957-3.319 7.063a.892.892 0 0 0 .017.279c.101.448.57.699.984.526.244-.102.348-.238.612-.802l.251-.536h4.37l.237.508c.131.279.282.561.336.625a.84.84 0 0 0 .563.265c.29 0 .616-.238.699-.51.092-.305.097-.293-1.56-3.794-2.017-4.258-1.858-3.947-2.072-4.072a.771.771 0 0 0-.773-.002m1.117 3.92c.39.826.709 1.519.709 1.54 0 .026-.516.04-1.44.04-.991 0-1.44-.013-1.44-.043 0-.057 1.413-3.037 1.44-3.037.012 0 .341.675.731 1.5" fill-rule="evenodd"></path>
										</svg>
									</span>
								</div>

								<div class="onetap-title">
									<h3><?php esc_html_e( 'Readable Font', 'accessibility-onetap' ); ?></h3>
								</div>
							</div>							

						</div>
					</div>					

					<!-- Reset settings -->
					<div class="onetap-reset-settings">
						<span>
							<?php esc_html_e( 'Reset Settings', 'accessibility-onetap' ); ?>
						</span>
					</div>

					<!-- Footer bottom -->
					<footer class="onetap-footer-bottom">
						<!-- Accessibility -->
						<div class="onetap-accessibility-container">
							<ul class="onetap-icon-list-items">
								<li class="onetap-icon-list-item">
									<span class="onetap-icon-list-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128" fill="none">
											<path d="M116.627 101.688L99.2097 70.0115C104.87 61.406 107.22 51.0416 105.827 40.837C104.434 30.6312 99.3894 21.2763 91.6299 14.5043C83.869 7.73115 73.9186 4 63.6174 4C53.317 4 43.3665 7.73115 35.6049 14.5043C27.8451 21.2763 22.8004 30.631 21.4074 40.837C20.013 51.0419 22.3646 61.4063 28.025 70.0115L10.5892 101.688C10.1888 102.411 9.98603 103.226 10.0007 104.053C10.0155 104.879 10.2477 105.687 10.6732 106.395C11.0704 107.121 11.662 107.721 12.3828 108.125C13.1036 108.531 13.9242 108.725 14.7501 108.688L30.3124 108.57L38.5408 121.783C39.4003 123.162 40.9081 123.999 42.5326 124H42.664C44.3325 123.954 45.8509 123.028 46.6568 121.566L63.6074 90.7484L80.5537 121.548C81.3586 123.009 82.878 123.935 84.5455 123.981H84.6769C86.3013 123.98 87.81 123.143 88.6697 121.764L96.8981 108.551L112.46 108.669H112.459C114.113 108.636 115.643 107.784 116.542 106.395C116.967 105.687 117.199 104.879 117.214 104.053C117.229 103.226 117.026 102.411 116.626 101.688L116.627 101.688ZM63.609 13.4862C72.4111 13.4862 80.8517 16.983 87.0751 23.2066C93.2984 29.4302 96.7955 37.8719 96.7955 46.6727C96.7955 55.4748 93.2987 63.9154 87.0751 70.1398C80.8515 76.3634 72.4109 79.8592 63.609 79.8592C54.8072 79.8592 46.3663 76.3634 40.143 70.1398C33.9194 63.9151 30.4225 55.4745 30.4225 46.6727C30.432 37.8748 33.932 29.4396 40.1535 23.2171C46.3749 16.9957 54.8101 13.4967 63.609 13.4862V13.4862ZM42.2855 109.986L36.91 101.357H36.9089C36.0347 99.9766 34.5143 99.1402 32.8803 99.1402L22.7122 99.2159L34.5279 77.7366C40.0515 82.9313 46.8645 86.5532 54.2606 88.2293L42.2855 109.986ZM94.3402 99.1591H94.3391C92.7084 99.1717 91.1933 100.005 90.3105 101.376L84.9339 109.967L72.9586 88.2094V88.2105C80.3547 86.5346 87.1676 82.9128 92.6913 77.7178L104.507 99.1971L94.3402 99.1591ZM46.4656 64.707C46.3111 66.3619 47.0413 67.9758 48.3863 68.953C49.7312 69.9302 51.4912 70.1246 53.018 69.4658L63.6094 64.8991L74.2009 69.4658C75.7276 70.1246 77.4877 69.9302 78.8326 68.953C80.1776 67.9758 80.9078 66.3619 80.7534 64.707L79.6805 53.2024L87.2878 44.5452H87.2868C88.3848 43.298 88.7431 41.5643 88.2303 39.9829C87.7176 38.4026 86.4084 37.2099 84.7881 36.8443L73.5379 34.3163L67.6581 24.3836C66.746 23.0439 65.2309 22.2412 63.6095 22.2412C61.9881 22.2412 60.4731 23.0439 59.561 24.3836L53.6822 34.3026L42.432 36.8306H42.431C40.8107 37.1952 39.5014 38.3889 38.9887 39.9692C38.476 41.5495 38.8343 43.2831 39.9323 44.5315L47.5385 53.2021L46.4656 64.707ZM57.7252 43.0766V43.0776C58.9892 42.7939 60.0809 42.0016 60.7429 40.8879L63.6093 36.0114L66.4756 40.8499C67.1376 41.9637 68.2293 42.756 69.4934 43.0397L74.9824 44.2732L71.2679 48.5098V48.5088C70.4126 49.4817 69.9944 50.7636 70.1142 52.054L70.6364 57.6514L65.4584 55.4249H65.4595C64.269 54.9111 62.9209 54.9111 61.7305 55.4249L56.5524 57.6514L57.0746 52.054H57.0757C57.1955 50.7637 56.7783 49.4818 55.922 48.5088L52.2075 44.2722L57.7252 43.0766Z" fill="currentColor"></path>
										</svg>
									</span>
									<span class="onetap-icon-list-text"></span>
								</li>
							</ul>
						</div>

						<!-- Divider version -->
						<div class="onetap-divider-container">
							<div class="onetap-divider">
								<span class="onetap-divider-separator">
									<span class="onetap-divider__text">
										<?php
										// Construct the file path of the plugin.
										$plugin_file = ACCESSIBILITY_ONETAP_DIR_PATH . 'accessibility-onetap.php';

										// Check if the plugin file exists.
										if ( file_exists( $plugin_file ) ) {
											// Include the necessary WordPress file for plugin data retrieval.
											require_once ABSPATH . 'wp-admin/includes/plugin.php';

											// Retrieve the plugin data.
											$plugin_info = get_plugin_data( $plugin_file );

											// Extract relevant plugin information.
											$plugin_version = $plugin_info['Version'];
											esc_html_e( 'Version ', 'accessibility-onetap' );
											echo esc_html( $plugin_version );
										}
										?>
									</span>
								</span>
							</div>
						</div>
					</footer>
				</div>
			</section>
		</nav>
		<div class="onetap-markup-reading-line"></div>
		<div class="onetap-markup-reading-mask onetap-top"></div>
		<div class="onetap-markup-reading-mask onetap-bottom"></div>
		<?php
	}
}
