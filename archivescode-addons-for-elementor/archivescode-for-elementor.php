<?php
/**
 * Plugin Name: Archivescode addons for elementor
 * Description: Archivescode addons for elementor.
 * Plugin URI:  https://archivescode.com/archivescode-for-elementor
 * Version:     1.0.2
 * Author:      Archivescode
 * Author URI:  https://archivescode.com/about-us
 * Text Domain: archivescode
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Plugin version
if (!defined('AFE_VERSION')) {
    define('AFE_VERSION', '1.0.2');
}

// Plugin Folder Path
if (!defined('AFE_PLUGIN_DIR')) {
    define('AFE_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// Plugin Folder Path
if (!defined('AFE_SLUG')) {
    define('AFE_SLUG', 'archivescode');
}

// Plugin Folder URL
if (!defined('AFE_PLUGIN_URL')) {
    define('AFE_PLUGIN_URL', plugin_dir_url(__FILE__));
}

// Plugin Folder Path
if (!defined('AFE_WIDGETS_DIR')) {
    define('AFE_WIDGETS_DIR', plugin_dir_path(__FILE__) . 'widgets/');
}

// Plugin Folder Path
if (!defined('AFE_WIDGETS_URL')) {
    define('AFE_WIDGETS_URL', plugin_dir_url(__FILE__) . 'widgets/');
}

// Plugin Root File
if (!defined('AFE_PLUGIN_FILE')) {
    define('AFE_PLUGIN_FILE', __FILE__);
}

// Plugin Help Page URL
if (!defined('AFE_PLUGIN_HELP_URL')) {
    define('AFE_PLUGIN_HELP_URL', admin_url() . 'admin.php?page=archivescode_for_elementor_documentation');
}

if (!class_exists('Archivescode_for_Elementor')) :

	final class Archivescode_for_Elementor {

        private static $instance;
        private $_afe_widget;
        private $_afe_notice;

        public static function instance() {

            if (!isset(self::$instance) && !(self::$instance instanceof Archivescode_for_Elementor)) {

                self::$instance = new Archivescode_for_Elementor;

                self::$instance->includes();

                self::$instance->hooks();

            }
            return self::$instance;
        }

        private function __construct() {
        	// call afe widget
        	require_once AFE_PLUGIN_DIR . 'includes/afe-widget.php';
			$this->_afe_widget = new AFE_Widget;

			// call afe widget
			require_once AFE_PLUGIN_DIR . 'includes/afe-notices.php';
			$this->_afe_notice = new AFE_Notice;

        	// Register an activation hook for the plugin
			register_activation_hook( __FILE__, array( $this, 'activation_hook' ) );

			// Register a deactivation hook for the plugin
			register_deactivation_hook( __FILE__, array( $this, 'deactivation_hook' ) );
        }

        private function includes() {        	
            //require_once AFE_PLUGIN_DIR . 'includes/helper-functions.php';
            //require_once AFE_PLUGIN_DIR . 'includes/query-functions.php';

            if (is_admin()) {
                require_once AFE_PLUGIN_DIR . 'admin/admin-init.php';
            }

        }

         private function hooks() {

         	add_action('plugins_loaded', array(self::$instance, 'check_elementor'));

            add_action('plugins_loaded', array(self::$instance, 'load_plugin_textdomain'));

            add_action('elementor/widgets/widgets_registered', array(self::$instance, 'include_widgets'));

            add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'), 10);

            add_action('elementor/frontend/after_register_styles', array($this, 'register_frontend_styles'), 10);

            add_action('elementor/frontend/after_enqueue_styles', array($this, 'enqueue_frontend_styles'), 10);

            //add_action('elementor/controls/controls_registered', array(self::$instance, 'include_controls'));

            add_action('elementor/init', array($this, 'add_elementor_category'));
        }

		public function register_frontend_scripts() {
			wp_enqueue_script('afe-owl', AFE_PLUGIN_URL . 'assets/owl/owl.carousel.min.js', array('jquery'), AFE_VERSION, true);
			wp_register_script('afe-jquery-transit', AFE_PLUGIN_URL . 'assets/js/jquery.transit.js', array('jquery'), AFE_VERSION, true);
			wp_enqueue_script('afe-js', AFE_PLUGIN_URL . 'assets/js/afe.js', array('jquery'), AFE_VERSION, true);
		}

		public function register_frontend_styles() {

			wp_register_style('afe-slider-css', AFE_PLUGIN_URL . 'assets/owl/assets/owl.carousel.min.css', array(), AFE_VERSION);
			wp_register_style('afe-animate-css', AFE_PLUGIN_URL . 'assets/css/animate.css', array(), AFE_VERSION);
			wp_register_style('afe-flipbox-css', AFE_PLUGIN_URL . 'assets/css/afe-flipbox.css', array(), AFE_VERSION);
			wp_register_style('afe-style-css', AFE_PLUGIN_URL . 'assets/css/afe-style.css', array(), AFE_VERSION);		
			
		}

		public function enqueue_frontend_styles() {
			wp_enqueue_style('afe-slider-css');
			wp_enqueue_style('afe-animate-css');
			wp_enqueue_style('afe-style-css');
		}

		public function load_plugin_textdomain() {
			// Load localization file
			load_plugin_textdomain( 'archivescode' );
		}

        public function add_elementor_category() {
            \Elementor\Plugin::instance()->elements_manager->add_category(
                'archivescode',
                array(
                    'title' => __('Archivescode Addons', AFE_SLUG),
                    'icon' => 'fa fa-plug',
                ),
                2);
        }

        public function check_elementor(){
        	// Notice if the Elementor is not active
			if ( ! did_action( 'elementor/loaded' ) ) {
				$this->_afe_notice->add_admin_notice('error', __('You must install and activate Elementor plugin before activating this plugin.', AFE_SLUG));
				$this->_afe_notice->admin_notices();
				return;
			}

			$elementor_version_required = '1.8.0';
			if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
				if ( ! current_user_can( 'update_plugins' ) ) {
					return;
				}
				$file_path = 'elementor/elementor.php';
				$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
				$message = '<p>' . __( 'Archivescode addons for elementor is not working because you are using an old version of Elementor.', 'hello-world' ) . '</p>';
				$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'hello-world' ) ) . '</p>';
				echo '<div class="error">' . $message . '</div>';
			}
        }

		public function include_widgets(){
			$active_widgets = get_option( 'afe_widgets' );
			if (!empty($active_widgets)) {
				foreach ($active_widgets as $value) {
					$ns = require_once AFE_WIDGETS_DIR .''. $value['file'];
					\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $ns );
				}
			}			
		}

		/**
		 * Runs when the plugin is activated
		 */  
		public function activation_hook() {

			if( FALSE === get_option( 'afe_first_install_time' ) ){
				$this->_afe_widget->load_widgets();
				if($this->_afe_widget->_widgets_installed){
					foreach ( $this->_afe_widget->_widgets_installed as $key => $value ) {
						$this->_afe_widget->_widgets_activated[$key] = $value;
					}
				}
				$this->_afe_widget->save_activated_widgets();
				update_option( 'afe_first_install_time', current_time('timestamp') );
			}
		}

		/**
		 * Runs when the plugin is deactivated
		 */  
		public function deactivation_hook() {
		}
	}

endif; // End if class_exists check

function AFE() {
    return Archivescode_for_Elementor::instance();
}

AFE();