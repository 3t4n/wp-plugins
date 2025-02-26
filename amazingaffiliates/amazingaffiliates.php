<?php

/**
 * @link              https://github.com/pizza2mozzarella/amazingaffiliates
 * @since             1.0.0
 * @package           AmazingAffiliates
 *
 * @wordpress-plugin
 * Plugin Name:       AMAZING Affiliates
 * Plugin URI:        https://github.com/pizza2mozzarella/amazingaffiliates
 * Description:       AMAZING Affiliates is the WordPress plugin that will boost your Amazon Affiliates Business.
 * Version:           1.0.11
 * Author:            pizza2mozzarella
 * Author URI:        https://github.com/pizza2mozzarella
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       amazingaffiliates
 * Domain Path:       /languages
 * 
 * 
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( function_exists( 'amazingaffiliates_fs' ) ) {
    amazingaffiliates_fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'amazingaffiliates_fs' ) ) {
        function amazingaffiliates_fs() {
            global $amazingaffiliates_fs;
            if ( !isset( $amazingaffiliates_fs ) ) {
                require_once dirname( __FILE__ ) . '/vendor/freemius/start.php';
                $amazingaffiliates_fs = fs_dynamic_init( array(
                    'id'             => '16942',
                    'slug'           => 'amazingaffiliates',
                    'premium_slug'   => 'amazingaffiliates-pro',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_fb56a2b9ecc4480518aecca820dc4',
                    'is_premium'     => false,
                    'premium_suffix' => 'PRO',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                        'slug' => 'amazingaffiliates_menu',
                    ),
                    'is_live'        => true,
                ) );
            }
            return $amazingaffiliates_fs;
        }

        amazingaffiliates_fs();
        do_action( 'amazingaffiliates_fs_loaded' );
    }
    define( 'AMAZINGAFFILIATES_VERSION', '1.0.11' );
    define( 'AMAZINGAFFILIATES_SCRIPTS_VERSION', '1.0.11' );
    define( 'AMAZINGAFFILIATES_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    define( 'AMAZINGAFFILIATES_PLUGIN_URI', plugin_dir_path( __FILE__ ) );
    function amazingaffiliates_activate() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-amazingaffiliates-activator.php';
        AmazingAffiliates_Activator::activate();
    }

    register_activation_hook( __FILE__, 'amazingaffiliates_activate' );
    function amazingaffiliates_deactivate() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-amazingaffiliates-deactivator.php';
        AmazingAffiliates_Deactivator::deactivate();
    }

    register_deactivation_hook( __FILE__, 'amazingaffiliates_deactivate' );
    // The core plugin class.
    require AMAZINGAFFILIATES_PLUGIN_URI . 'includes/class-amazingaffiliates.php';
    // The PRO plugin class.
    if ( amazingaffiliates_fs()->can_use_premium_code__premium_only() and false ) {
        require AMAZINGAFFILIATES_PLUGIN_URI . 'pro/includes/class-amazingaffiliatespro.php';
        function amazingaffiliatespro_run() {
            $core_plugin = new AmazingAffiliates();
            $plugin = new AmazingAffiliatesPro();
            $plugin->run();
        }

        amazingaffiliatespro_run();
        return;
    }
    // Begins execution of the plugin.
    function amazingaffiliates_run() {
        $plugin = new AmazingAffiliates();
        $plugin->run();
    }

    amazingaffiliates_run();
}