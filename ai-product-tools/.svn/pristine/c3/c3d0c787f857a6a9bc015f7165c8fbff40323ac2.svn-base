<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://aiforproducts.org
 * @since             1.0.0
 * @package           Ai_Product_Tools
 *
 * @wordpress-plugin
 * Plugin Name:       AI Product Description Generator (Bulk & Single) - AI Product Tools for WooCommerce
 * Plugin URI:        https://aiforproducts.org
 * Description:       Boost your WooCommerce Products with AI Product Tools: The AI-powered assistant for your products descriptions.
 * Version:           2.1.2
 * Author:            Dogu Pekgoz
 * Author URI:        https://aiforproducts.org/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ai-product-tools
 * Domain Path:       /languages
 */
if ( !defined( 'WPINC' ) ) {
    die;
}
define( 'AIPT_VERSION', '2.1.2' );
define( 'AIPT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AIPT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
if ( function_exists( 'aipt_fs' ) ) {
    aipt_fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'aipt_fs' ) ) {
        function aipt_fs() {
            global $aipt_fs;
            if ( !isset( $aipt_fs ) ) {
                require_once dirname( __FILE__ ) . '/vendor/freemius/wordpress-sdk/start.php';
                $aipt_fs = fs_dynamic_init( array(
                    'id'             => '15570',
                    'slug'           => 'ai-product-tools',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_bebac4a4b8beed031101136867398',
                    'is_premium'     => false,
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                        'slug'       => 'ai-product-tools',
                        'first-path' => 'admin.php?page=ai-product-tools-setup',
                        'support'    => false,
                    ),
                    'is_live'        => true,
                ) );
                if ( !class_exists( 'WooCommerce' ) ) {
                    $aipt_fs->add_filter( 'redirect_on_activation', '__return_false' );
                    $aipt_fs->add_filter( 'default_redirect_on_activation', '__return_false' );
                }
                if ( basename( dirname( __FILE__ ) ) === 'ai-product-tools-premium' ) {
                    deactivate_plugins( 'ai-product-tools/ai-product-tools.php', true );
                }
            }
            return $aipt_fs;
        }

        aipt_fs();
        do_action( 'aipt_fs_loaded' );
        aipt_fs()->add_action( 'after_uninstall', ['\\AIPT\\Core\\Uninstaller', 'cleanup'] );
    }
    register_activation_hook( __FILE__, function () {
        require_once AIPT_PLUGIN_DIR . 'src/Core/Activator.php';
        \AIPT\Core\Activator::activate();
    } );
    add_action( 'activated_plugin', function ( $plugin ) {
        if ( $plugin === plugin_basename( __FILE__ ) ) {
            if ( get_option( 'aipt_redirect_after_activation', false ) ) {
                delete_option( 'aipt_redirect_after_activation' );
                wp_redirect( admin_url( 'admin.php?page=ai-product-tools' ) );
                exit;
            }
        }
    } );
    register_deactivation_hook( __FILE__, function () {
        require_once AIPT_PLUGIN_DIR . 'src/Core/Deactivator.php';
        \AIPT\Core\Deactivator::deactivate();
    } );
    add_action( 'plugins_loaded', function () {
        if ( !class_exists( 'WooCommerce' ) ) {
            new \AIPT\Admin\Notices();
            return;
        }
        require_once AIPT_PLUGIN_DIR . 'src/Core/Init.php';
        \AIPT\Core\Init::get_instance();
    } );
}