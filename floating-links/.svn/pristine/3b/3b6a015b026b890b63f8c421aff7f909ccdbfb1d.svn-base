<?php

/**
Plugin Name: Floating Links
Plugin URI: https://wordpress.org/plugins/floating-links/
Description: Displays fancy floating top, bottom, next post, previous post, random post links and Pagination with custom post types support.
Author: Danish Ali Malik
Version: 3.6.4
Author URI: https://danishalimalik.com/
Text Domain: floating-links
*/
if ( function_exists( 'fl_fs' ) ) {
    fl_fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'fl_fs' ) ) {
        // Create a helper function for easy SDK access.
        function fl_fs() {
            global $fl_fs;
            if ( !isset( $fl_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $fl_fs = fs_dynamic_init( array(
                    'id'              => '3479',
                    'slug'            => 'floating-links',
                    'type'            => 'plugin',
                    'public_key'      => 'pk_c912abe4e683b224482915ad39d6c',
                    'is_premium'      => false,
                    'premium_suffix'  => 'Premium',
                    'has_addons'      => false,
                    'has_paid_plans'  => true,
                    'trial'           => array(
                        'days'               => 7,
                        'is_require_payment' => true,
                    ),
                    'has_affiliation' => 'selected',
                    'menu'            => array(
                        'slug'    => 'floating_links',
                        'contact' => false,
                    ),
                    'is_live'         => true,
                ) );
            }
            return $fl_fs;
        }

        // Init Freemius.
        fl_fs();
        // Signal that SDK was initiated.
        do_action( 'fl_fs_loaded' );
    }
    if ( !class_exists( 'Floating_Links' ) ) {
        class Floating_Links {
            /**
             * Load all the required plugin files
             *
             * @since 1.0.0
             */
            public function __construct() {
                add_action( 'init', array($this, 'constants') );
                add_action( 'init', array($this, 'includes') );
                register_activation_hook( __FILE__, array($this, 'activate') );
                add_action( 'plugins_loaded', array($this, 'load_textdomain'), 10 );
                register_uninstall_hook( __FILE__, array($this, 'uninstall') );
            }

            /**
             * Define all the required plugin constants
             *
             * @since 1.0.0
             */
            public function constants() {
                if ( !defined( 'FLOATING_LINKS_VERSION' ) ) {
                    define( 'FLOATING_LINKS_VERSION', '3.6.3' );
                }
                if ( !defined( 'FLOATING_LINKS_DIR' ) ) {
                    define( 'FLOATING_LINKS_DIR', plugin_dir_path( __FILE__ ) );
                }
                if ( !defined( 'FLOATING_LINKS_URL' ) ) {
                    define( 'FLOATING_LINKS_URL', plugin_dir_url( __FILE__ ) );
                }
                if ( !defined( 'FLOATING_LINKS_FILE' ) ) {
                    define( 'FLOATING_LINKS_FILE', __FILE__ );
                }
            }

            /**
             * Load all the required plugin files
             */
            public function includes() {
                include FLOATING_LINKS_DIR . 'includes/floating-links-global-functions.php';
                if ( !class_exists( 'Floating_Links_Admin' ) ) {
                    include FLOATING_LINKS_DIR . 'admin/class-floating-links-admin.php';
                }
                if ( !class_exists( 'Floating_Links_Frontend' ) ) {
                    include FLOATING_LINKS_DIR . 'frontend/class-floating-links-frontend.php';
                }
                if ( !class_exists( 'Fl_Icons_Control' ) ) {
                    include FLOATING_LINKS_DIR . 'admin/class-floating-links-customizer-extended.php';
                }
                if ( !class_exists( 'FLOATING_LINKS_CUSTOMIZER' ) ) {
                    include FLOATING_LINKS_DIR . 'admin/class-floating-links-customizer.php';
                }
            }

            /**
             * Add required data on activation
             *
             * @since 1.0.0
             */
            public function activate() {
                $settings = get_option( 'fl_settings', false );
                if ( !isset( $settings['fl_installDate'] ) ) {
                    $settings['fl_next'] = 'true';
                    $settings['fl_prev'] = 'true';
                    $settings['fl_random'] = 'true';
                    $settings['fl_top'] = 'true';
                    $settings['fl_minimizer'] = 'true';
                    $settings['fl_post_data'] = 'false';
                    $settings['fl_bottom'] = 'true';
                    $settings['fl_float'] = 'true';
                    $settings['fl_home'] = 'true';
                    $settings['fl_shadow'] = 1;
                    $settings['fl_installDate'] = date( 'Y-m-d h:i:s' );
                    $settings['fl_default_minimized'] = 'false';
                    $settings['fl_sort'] = 'fl_next,fl_prev,fl_random,fl_top,fl_bottom,fl_home,fl_copy_url,fl_minimizer';
                    update_option( 'fl_settings', $settings );
                }
            }

            /**
             * Load text domain.
             *
             * @since 3.5.9
             *
             * @return void
             * @access public
             */
            public function load_textdomain() {
                load_plugin_textdomain( 'floating-links', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
            }

            /**
             * Delete all the plugin data on uninstall
             *
             * @since 1.0.0
             */
            public function uninstall() {
                delete_option( 'fl_settings' );
            }

        }

        new Floating_Links();
    }
}