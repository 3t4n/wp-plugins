<?php

/*
Plugin Name:	Echelon Widgets for SiteOrigin
Plugin URI:		https://echelonwidgets.com
Description: 	UIkit powered widgets, features and presets for SiteOrigin Page Builder.
Version: 		2.0.8
Author: 		Echelon
Author URI:  	https://echelonwidgets.com
License: 		GPL3
License URI: 	https://www.gnu.org/licenses/gpl-3.0.txt
*/

if (!class_exists('EsoApp')) {

	final class EsoApp {

		private static $run_app = false;

		public static function run_app() {
			if (!self::$run_app && self::php_version_check()) {

				self::$run_app = true;

				define('ECHELONSO', true);
				define('ECHELONSO_VERSION', '2.0.7');
				define('ECHELONSO_OPTIONS', get_option('echelonso_options'));

				require 'app/EsoWidgetFormPartOptions.php';
				require 'app/EsoWidgetFormPart.php';
				require 'app/EsoWidgetFormCorePart.php';

				require 'app/EsoHelpers.php';
				require 'app/EsoCustomiser.php';

				require 'features/EsoFeatureAttribute.php';
				require 'features/EsoFeatureAnimate.php';
				require 'features/EsoFeatureAnimatedGradients.php';
				require 'features/EsoFeatureBackground.php';
				require 'features/EsoFeatureCellFlex.php';
				require 'features/EsoFeatureCustomPalette.php';
				require 'features/EsoFeatureDesign.php';
				require 'features/EsoFeatureHoverTransition.php';
				require 'features/EsoFeatureLinkedWidgets.php';
				require 'features/EsoFeaturePosition.php';
				require 'features/EsoFeatureParallax.php';
				require 'features/EsoFeatureScrollspy.php';
				require 'features/EsoFeatureSticky.php';
				require 'features/EsoFeatureVisibility.php';

				add_action( 'init', array('EsoHelpers', 'reusable_layouts_cpt_tax'));
				add_action( 'customize_register', array('EsoCustomiser','customize_register') );
				add_filter( 'plugin_row_meta', array('EsoHelpers', 'custom_plugin_row_meta'), 10, 2 );

				/*
				* Add image sizes
				*/

				if ( EsoHelpers::is_option_enabled('image_sizes') ) {
					add_image_size('ESO-555x450-Crop', 555, 450, true);
					add_image_size('ESO-1280x720-Crop', 1280, 720, true);
					add_image_size('ESO-1920x1080-Crop', 1920, 1080, true);
					add_image_size('ESO-360x450-Crop', 360, 450, true);
					add_image_size('ESO-720x900-Crop', 720, 900, true);
					add_image_size('ESO-360x450-Top', 360, 450, array('center', 'top'));
					add_image_size('ESO-720x900-Top', 720, 900, array('center', 'top'));
				}

				// other actions
				add_action( 'plugins_loaded', array('EsoApp', 'after_plugins_loaded'));
				add_action( 'wp_enqueue_scripts', array('EsoApp', 'scripts'));
				add_action( 'admin_enqueue_scripts', array('EsoApp', 'admin_scripts'), 100);
				add_action( 'customize_controls_print_footer_scripts', array('EsoApp', 'admin_scripts'), 100);
				add_action( 'wp_head', array('EsoHelpers', 'wp_head'));
				if ( EsoHelpers::is_option_enabled('feature_custom_palette') ) {
					add_action( 'admin_footer', array('EsoFeatureCustomPalette', 'add_script') );
				}

			}
		} // end run_app

		/*
		* Plugins loaded
		* Code that needs need to run after other plugins loaded
		*/

		public static function after_plugins_loaded() {

			EsoFeatureAttribute::add_filters();

			if ( EsoHelpers::is_option_enabled('feature_animate') ) {
				EsoFeatureAnimate::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_animated_gradients') ) {
				EsoFeatureAnimatedGradients::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_background') ) {
				EsoFeatureBackground::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_cell_flex') ) {
				EsoFeatureCellFlex::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_design') ) {
				EsoFeatureDesign::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_hover_transition') ) {
				EsoFeatureHoverTransition::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_linked_widgets') ) {
				EsoFeatureLinkedWidgets::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_parallax') ) {
				EsoFeatureParallax::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_position') ) {
				EsoFeaturePosition::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_scrollspy') ) {
				EsoFeatureScrollspy::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_sticky') ) {
				EsoFeatureSticky::add_filters();
			}

			if ( EsoHelpers::is_option_enabled('feature_visibility') ) {
				EsoFeatureVisibility::add_filters();
			}

			add_filter( 'siteorigin_widgets_widget_folders', array('EsoHelpers', 'widget_folders') );
			add_filter( 'siteorigin_widgets_widget_banner', array('EsoHelpers', 'widget_banner'), 10, 2 );
			add_filter( 'siteorigin_widgets_field_class_prefixes', array('EsoHelpers', 'widget_fields_class_prefixes') );
			add_filter( 'siteorigin_widgets_field_class_paths', array('EsoHelpers', 'widget_fields_class_paths') );
			add_filter('siteorigin_panels_widget_dialog_tabs', array('EsoHelpers', 'widget_groups'), 20);
		}

		/*
		* Scripts
		*/

		public static function scripts() {
			wp_enqueue_style( 'echelonso_css', plugin_dir_url(__FILE__) . "inc/echelon.css", array(), ECHELONSO_VERSION);
			wp_enqueue_script('echelonso_js', plugin_dir_url(__FILE__) . 'inc/echelon.js', array('jquery'), ECHELONSO_VERSION);
			wp_enqueue_script('echelonso_uikit', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js', array('jquery'), '3.1.6', false);
			wp_enqueue_script('echelonso_uikit_icons', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js', array('jquery'), '3.1.6', false);
		}

		public static function admin_scripts() {
			wp_enqueue_script('echelonso_alpha_picker_js', plugin_dir_url(__FILE__) . 'custom-fields/alpha-color-picker/alpha-color-picker.js', array('jquery', 'wp-color-picker'), ECHELONSO_VERSION, true);
			wp_enqueue_style( 'echelonso_alpha_picker_css', plugin_dir_url(__FILE__) . 'custom-fields/alpha-color-picker/alpha-color-picker.css', array('wp-color-picker'), ECHELONSO_VERSION);
		}

		/*
		* Version check
		*/

		private static function php_version_check() {
			if (version_compare(PHP_VERSION, '7.0.0', '>=')) {
				return true;
			} else {
				add_action( 'admin_notices', array('EsoApp', 'php_version_notice') );
				return false;
			}
		}

		public static function php_version_notice() {
			echo '<div class="notice notice-error"><p>Echelon UIkit for SiteOrigin requires PHP 7.0.0 or higher.</p></div>';
		}

	} // end class

	EsoApp::run_app();

} // end class exists
