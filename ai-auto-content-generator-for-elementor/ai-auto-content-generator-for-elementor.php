<?php
/*
 * Plugin Name: AI Content Generator For Elementor
 * Description: Improve the quality of your Elementor website pages content with Chrome's built-in AI
 * Plugin URI:  https://coolplugins.net
 * Version:     1.1.0
 * Author:      Cool Plugins
 * Author URI:  https://coolplugins.net
 * Text Domain: aacgfe
 * Elementor tested up to:  3.27.0
 * Elementor Pro tested up to: 3.27.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define constants
if ( ! defined( 'AACGFE_VERSION' ) ) {
    define( 'AACGFE_VERSION', '1.1.0' );
    define( 'AACGFE_FILE', __FILE__ );
    define( 'AACGFE_PATH', plugin_dir_path( AACGFE_FILE ) );
    define( 'AACGFE_URL', plugin_dir_url( AACGFE_FILE ) );
}

// Activation and Deactivation Hooks
register_activation_hook( AACGFE_FILE, array( 'AACGFE_Widget_Addon', 'activate' ) );
register_deactivation_hook( AACGFE_FILE, array( 'AACGFE_Widget_Addon', 'deactivate' ) );

// Prevent class redefinition if the plugin is already loaded.
if ( ! class_exists( 'AACGFE_Widget_Addon' ) ) {

    final class AACGFE_Widget_Addon {

        private static $instance = null;

        // Singleton pattern
        public static function get_instance() {
            if ( ! isset( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function __construct() {
            add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
        }

        // Load the plugin after all plugins have been loaded
        public function plugins_loaded() {
            load_plugin_textdomain( 'aacgfe', false, basename( dirname( __FILE__ ) ) . '/languages/' );

            // Notice if Elementor is not active
            if ( ! did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', array( $this, 'fail_to_load' ) );
                return;
            }

            // Admin-related functionalities
            if ( is_admin() ) {
                require_once AACGFE_PATH . 'admin/class-admin-notice.php';
                add_action( 'admin_init', array( $this, 'show_upgrade_notice' ) );
            }

            // Include custom controls and functionalities
            require_once AACGFE_PATH . 'controls/ai_controller.php';
        }

        // Display the upgrade notice
        public function show_upgrade_notice() {
            aacgfe_create_admin_notice(
                array(
                    'id'              => 'aacgfe-review-box',
                    'slug'            => 'aacgfe',
                    'review'          => true,
                    'review_url'      => esc_url( 'https://wordpress.org/support/plugin/ai-auto-content-generator-for-elementor/reviews/?filter=5#new-post' ),
                    'plugin_name'     => 'AI Auto Content Generator For Elementor',
                    'logo'            => AACGFE_URL . 'assets/images/acgfe-logo.png',
                    'review_interval' => 3,
                )
            );
        }

        // Elementor is not loaded
        public function fail_to_load() {
            if ( ! is_plugin_active( 'elementor/elementor.php' ) ) : ?>
                <div class="notice notice-warning is-dismissible">
                    <p><?php echo '<a href="https://wordpress.org/plugins/elementor/" target="_blank">' . esc_html__( 'Elementor Page Builder', 'aacgfe' ) . '</a>' . wp_kses_post( __( ' must be installed and activated to use "<strong>AI Auto Content Generator For Elementor</strong>" ', 'aacgfe' ) ); ?></p>
                </div>
            <?php endif;
        }

        // Plugin activation: Set initial options
        public static function activate() {
            update_option( 'aacgfe-installDate', gmdate( 'Y-m-d h:i:s' ) );
            update_option( 'aacgfe-version', AACGFE_VERSION );
            update_option( 'aacgfe-plugin-type', 'free' );
            update_option( 'aacgfe-ratingDiv', 'no' );
            update_option( 'aacgfe_plugin_redirect', true );
        }

        // Plugin deactivation: Clean up options
        public static function deactivate() {
            delete_option( 'AACGFE_prompt_data' );
        }

    }
}

// Get instance of the plugin class
function AACGFE_Widget_Addon() {
    return AACGFE_Widget_Addon::get_instance();
}

// Initialize the plugin
AACGFE_Widget_Addon();

