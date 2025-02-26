<?php

/**
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Alley_Business_Toolkit
 *
 * @wordpress-plugin
 * Plugin Name: Alley Business Toolkit
 * Description:       Alley Business Tootkit help you to create post types that needed for any business.
 * Version:           2.0.7
 * Requires at least: 5.6
 * Tested up to:      6.6.2
 * Author:            alleythemes
 * Author URI:        https://alleythemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       alley-business-toolkit
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'ALLEYTHEMES_FREE' ) ) :

    class ALLEYTHEMES_FREE {

        public function __construct()
        {
            add_action( 'activated_plugin', array( $this, 'alley_business_deactivate_other_instances' ) );
            add_action( 'pre_current_active_plugins', array( $this, 'alley_business_plugin_deactivated_notice' ) );
        }

        public function alley_business_deactivate_other_instances( $plugin ) {
            if ( ! in_array( $plugin, array( 'alley-business-toolkit/alley-business-toolkit.php', 'alley-business-toolkit-pro/alley-business-toolkit.php' ) ) ) {
                return;
            }

            $plugin_to_deactivate  = 'alley-business-toolkit/alley-business-toolkit.php';
            $deactivated_notice_id = '1';

            // If we just activated the free version, deactivate the pro version.
            if ( $plugin === $plugin_to_deactivate ) {
                $plugin_to_deactivate  = 'alley-business-toolkit-pro/alley-business-toolkit.php';
                $deactivated_notice_id = '2';
            }

            if ( is_multisite() && is_network_admin() ) {
                $active_plugins = (array) get_site_option( 'active_sitewide_plugins', array() );
                $active_plugins = array_keys( $active_plugins );
            } else {
                $active_plugins = (array) get_option( 'active_plugins', array() );
            }

            foreach ( $active_plugins as $plugin_basename ) {
                if ( $plugin_to_deactivate === $plugin_basename ) {
                    set_transient( 'alley_business_toolkit_deactivated_notice_id', $deactivated_notice_id, 1 * HOUR_IN_SECONDS );
                    deactivate_plugins( $plugin_basename );
                    return;
                }
            }
        }


        public function alley_business_plugin_deactivated_notice() {
            $deactivated_notice_id = get_transient( 'alley_business_toolkit_deactivated_notice_id' );
            if ( ! in_array( $deactivated_notice_id, array( '1', '2' ) ) ) {
                return;
            }

            $message = __( "Alley Business Toolkit and Alley Business Toolkit Pro should not be active at the same time. We've automatically deactivated Alley Business Toolkit.", 'alley-business-toolkit' );
            if ( '2' === $deactivated_notice_id ) {
                $message = __( "Alley Business Toolkit and Alley Business Toolkit Pro should not be active at the same time. We've automatically deactivated Alley Business Toolkit pro.", 'alley-business-toolkit' );
            }

            ?>
            <div class="updated" style="border-left: 4px solid #ffba00;">
                <p><?php echo esc_html( $message ); ?></p>
            </div>
            <?php

            delete_transient( 'alley_business_toolkit_deactivated_notice_id' );
        }
    }

    function alley_business_free() {
        $alleythemes_free = new ALLEYTHEMES_FREE();
        return $alleythemes_free;
    }

    // Instantiate.
    alley_business_free();


    if ( !function_exists( 'abt_fs' ) ) {
        // Create a helper function for easy SDK access.
        function abt_fs()
        {
            global  $abt_fs ;

            if ( !isset( $abt_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $abt_fs = fs_dynamic_init( array(
                    'id'             => '7474',
                    'slug'           => 'alley-business-toolkit',
                    'premium_slug'   => 'alley-business-toolkit-pro',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_e3541db2bd1ab9cd6037e250a9f1a',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                        'slug' => 'alley-toolkit',
                    ),
                    'is_live'        => true,
                ) );
            }

            return $abt_fs;
        }

        // Init Freemius.
        abt_fs();
        // Signal that SDK was initiated.
        do_action( 'abt_fs_loaded' );
    }

    /**
     * Currently plugin version.
     * Start at version 1.0.0 and use SemVer - https://semver.org
     * Rename this for your plugin and update it as you release new versions.
     */
    define( 'ALLEY_BUSINESS_TOOLKIT_VERSION', '2.0.7' );
    define( 'ALLEY_BUSINESS_TOOLKIT_PATH', plugin_dir_path( __FILE__ ) );
    define( 'ALLEY_BUSINESS_TOOLKIT_URL', plugin_dir_url( __FILE__ ) );
    define( 'ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL', ALLEY_BUSINESS_TOOLKIT_URL . 'includes/demo-data/' );
    define( 'ALLEY_BUSINESS_TOOLKIT_SCRIPT_PREFIX', ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '' ) );
    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-alley-business-toolkit-activator.php
     */
    function activate_alley_business_toolkit()
    {
        require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'includes/class-alley-business-toolkit-activator.php';
        Alley_Business_Toolkit_Activator::activate();
    }

    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-alley-business-toolkit-deactivator.php
     */
    function deactivate_alley_business_toolkit()
    {
        require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'includes/class-alley-business-toolkit-deactivator.php';
        Alley_Business_Toolkit_Deactivator::deactivate();
    }

    register_activation_hook( __FILE__, 'activate_alley_business_toolkit' );
    register_deactivation_hook( __FILE__, 'deactivate_alley_business_toolkit' );
    abt_fs()->add_action( 'after_uninstall', 'abt_fs_uninstall_cleanup' );
    /**
     * The core plugin class that is used to define internationalization,
     * admin-specific hooks, and public-facing site hooks.
     */
    require ALLEY_BUSINESS_TOOLKIT_PATH . 'includes/class-alley-business-toolkit.php';
    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function run_alley_business_toolkit()
    {
        $plugin = new Alley_Business_Toolkit();
        $plugin->run();
    }

    run_alley_business_toolkit();
endif;