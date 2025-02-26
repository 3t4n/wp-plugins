<?php
/**
 * Plugin Name:           GamiPress - BuddyPress Group Leaderboard
 * Plugin URI:            https://wordpress.org/plugins/gamipress-buddypress-group-leaderboard/
 * Description:           Add a completely configurable tab on BuddyPress groups with a GamiPress leaderboard of group members.
 * Version:               1.1.4
 * Author:                GamiPress
 * Author URI:            https://gamipress.com/
 * Text Domain:           gamipress-buddypress-group-leaderboard
 * Domain Path:           /languages/
 * Requires at least:     4.4
 * Tested up to:          6.4
 * License:               GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package               GamiPress\BuddyPress_Group_Leaderboard
 * @author                GamiPress
 * @copyright             Copyright (c) GamiPress
 */

final class GamiPress_BuddyPress_Group_Leaderboard {

    /**
     * @var         GamiPress_BuddyPress_Group_Leaderboard $instance The one true GamiPress_BuddyPress_Group_Leaderboard
     * @since       1.0.0
     */
    private static $instance;

    /**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      object self::$instance The one true GamiPress_BuddyPress_Group_Leaderboard
     */
    public static function instance() {
        if( !self::$instance ) {
            self::$instance = new GamiPress_BuddyPress_Group_Leaderboard();
            self::$instance->constants();
            self::$instance->includes();
            self::$instance->bp_includes();
            self::$instance->hooks();
            self::$instance->load_textdomain();
        }

        return self::$instance;
    }

    /**
     * Setup plugin constants
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function constants() {
        // Plugin version
        define( 'GAMIPRESS_BP_GROUP_LEADERBOARD_VER', '1.1.4' );

        // Required leaderboards version
        define( 'GAMIPRESS_BP_GROUP_LEADERBOARD_LEADERBOARDS_MIN_VER', '1.3.8' );

        // Plugin file
        define( 'GAMIPRESS_BP_GROUP_LEADERBOARD_FILE', __FILE__ );

        // Plugin path
        define( 'GAMIPRESS_BP_GROUP_LEADERBOARD_DIR', plugin_dir_path( __FILE__ ) );

        // Plugin URL
        define( 'GAMIPRESS_BP_GROUP_LEADERBOARD_URL', plugin_dir_url( __FILE__ ) );
    }

    /**
     * Include plugin files
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function includes() {

        if( $this->meets_requirements() ) {

            require_once GAMIPRESS_BP_GROUP_LEADERBOARD_DIR . 'includes/admin.php';
            require_once GAMIPRESS_BP_GROUP_LEADERBOARD_DIR . 'includes/content-filters.php';
            require_once GAMIPRESS_BP_GROUP_LEADERBOARD_DIR . 'includes/ajax-functions.php';
            require_once GAMIPRESS_BP_GROUP_LEADERBOARD_DIR . 'includes/functions.php';
            require_once GAMIPRESS_BP_GROUP_LEADERBOARD_DIR . 'includes/scripts.php';

        }

    }

    /**
     * Include integration specific files
     *
     * @since 1.0.1
     */
    private function bp_includes() {

        // Since the multisite feature we need an extra check here to meet if BuddyPress is active on current site
        if ( $this->meets_requirements() && class_exists( 'BuddyPress' ) ) {

            require_once GAMIPRESS_BP_GROUP_LEADERBOARD_DIR . 'includes/components/gamipress-leaderboard-bp-component.php';

            if ( gamipress_bp_group_leaderboard_is_active( 'groups' ) ) {
                require_once GAMIPRESS_BP_GROUP_LEADERBOARD_DIR . 'includes/bp-groups.php';
            }

        }
    }

    /**
     * Setup plugin hooks
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function hooks() {
        add_action( 'admin_notices', array( $this, 'admin_notices' ) );
    }


    /**
     * Activation hook for the plugin.
     *
     * @since  1.0.0
     */
    public static function activate() {

    }

    /**
     * Deactivation hook for the plugin.
     *
     * @since  1.0.0
     */
    public static function deactivate() {

    }

    /**
     * Plugin admin notices.
     *
     * @since  1.0.0
     */
    public function admin_notices() {

        if ( ! $this->meets_requirements() && ! defined( 'GAMIPRESS_ADMIN_NOTICES' ) ) : ?>

            <div id="message" class="notice notice-error is-dismissible">
                <p>
                    <?php printf(
                        __( 'GamiPress - BuddyPress Group Leaderboard requires %s, %s and %s in order to work. Please install and activate them.', 'gamipress-buddypress-group-leaderboard' ),
                        '<a href="https://wordpress.org/plugins/gamipress/" target="_blank">GamiPress</a>',
                        '<a href="https://wordpress.org/plugins/buddypress/" target="_blank">BuddyPress</a>',
                        '<a href="https://gamipress.com/add-ons/gamipress-leaderboards/" target="_blank">GamiPress - Leaderboards</a>'
                    ); ?>
                </p>
            </div>

            <?php define( 'GAMIPRESS_ADMIN_NOTICES', true ); ?>

        <?php endif; ?>

        <?php if ( class_exists( 'GamiPress_Leaderboards' ) && defined( 'GAMIPRESS_LEADERBOARDS_VER' )
            && version_compare( GAMIPRESS_LEADERBOARDS_VER, GAMIPRESS_BP_GROUP_LEADERBOARD_LEADERBOARDS_MIN_VER, '<' ) ) : ?>

            <div id="message" class="notice notice-error is-dismissible">
                <p>
                    <?php printf(
                        __( 'GamiPress - BuddyPress Group Leaderboard requires %1$s <strong>%2$s</strong> or higher in order to work. Please update %1$s.', 'gamipress-buddypress-group-leaderboard' ),
                        '<a href="https://gamipress.com/add-ons/gamipress-leaderboards/" target="_blank">GamiPress - Leaderboards</a>',
                        GAMIPRESS_BP_GROUP_LEADERBOARD_LEADERBOARDS_MIN_VER
                    ); ?>
                </p>
            </div>

        <?php endif;

    }

    /**
     * Check if there are all plugin requirements
     *
     * @since  1.0.0
     *
     * @return bool True if installation meets all requirements
     */
    private function meets_requirements() {

        if ( ! class_exists( 'GamiPress' ) ) {
            return false;
        }

        if ( ! class_exists( 'GamiPress_Leaderboards' ) ) {
            return false;
        }

        if( ! defined( 'GAMIPRESS_LEADERBOARDS_VER' ) ) {
            return false;
        }

        if( version_compare( GAMIPRESS_LEADERBOARDS_VER, GAMIPRESS_BP_GROUP_LEADERBOARD_LEADERBOARDS_MIN_VER, '<' ) ) {
            return false;
        }

        // Requirements on multisite install
        if( is_multisite() && gamipress_is_network_wide_active() && is_main_site() ) {

            // On main site, need to check if integrated plugin is installed on any sub site to load all configuration files
            if( gamipress_is_plugin_active_on_network( 'buddypress/bp-loader.php' ) ) {
                return true;
            }

        }

        if ( ! class_exists( 'BuddyPress' ) ) {
            return false;
        }

        return true;

    }

    /**
     * Internationalization
     *
     * @access      public
     * @since       1.0.0
     * @return      void
     */
    public function load_textdomain() {

        // Set filter for language directory
        $lang_dir = GAMIPRESS_BP_GROUP_LEADERBOARD_DIR . '/languages/';
        $lang_dir = apply_filters( 'gamipress_buddypress_group_leaderboard_languages_directory', $lang_dir );

        // Traditional WordPress plugin locale filter
        $locale = apply_filters( 'plugin_locale', get_locale(), 'gamipress-buddypress-group-leaderboard' );
        $mofile = sprintf( '%1$s-%2$s.mo', 'gamipress-buddypress-group-leaderboard', $locale );

        // Setup paths to current locale file
        $mofile_local   = $lang_dir . $mofile;
        $mofile_global  = WP_LANG_DIR . '/gamipress-buddypress-group-leaderboard/' . $mofile;

        if( file_exists( $mofile_global ) ) {
            // Look in global /wp-content/languages/gamipress-buddypress-group-leaderboard/ folder
            load_textdomain( 'gamipress-buddypress-group-leaderboard', $mofile_global );
        } elseif( file_exists( $mofile_local ) ) {
            // Look in local /wp-content/plugins/gamipress-buddypress-group-leaderboard/languages/ folder
            load_textdomain( 'gamipress-buddypress-group-leaderboard', $mofile_local );
        } else {
            // Load the default language files
            load_plugin_textdomain( 'gamipress-buddypress-group-leaderboard', false, $lang_dir );
        }

    }

}

/**
 * The main function responsible for returning the one true GamiPress_BuddyPress_Group_Leaderboard instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \GamiPress_BuddyPress_Group_Leaderboard The one true GamiPress_BuddyPress_Group_Leaderboard
 */
function GamiPress_BuddyPress_Group_Leaderboard() {
    return GamiPress_BuddyPress_Group_Leaderboard::instance();
}
add_action( 'plugins_loaded', 'GamiPress_BuddyPress_Group_Leaderboard', 11 );

// Setup our activation and deactivation hooks
register_activation_hook( __FILE__, array( 'GamiPress_BuddyPress_Group_Leaderboard', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'GamiPress_BuddyPress_Group_Leaderboard', 'deactivate' ) );
