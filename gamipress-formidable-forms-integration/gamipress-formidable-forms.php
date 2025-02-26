<?php
/**
 * Plugin Name:           GamiPress - Formidable Forms integration
 * Plugin URI:            https://wordpress.org/plugins/gamipress-formidable-forms-integration/
 * Description:           Connect GamiPress with Formidable Forms.
 * Version:               1.0.8
 * Author:                GamiPress
 * Author URI:            https://gamipress.com/
 * Text Domain:           gamipress-formidable-forms-integration
 * Domain Path:           /languages/
 * Requires at least:     4.4
 * Tested up to:          6.2
 * License:               GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package               GamiPress\Formidable_Forms
 * @author                GamiPress
 * @copyright             Copyright (c) GamiPress
 */

final class GamiPress_Formidable_Forms {

    /**
     * @var         GamiPress_Formidable_Forms $instance The one true GamiPress_Formidable_Forms
     * @since       1.0.0
     */
    private static $instance;

    /**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      GamiPress_Formidable_Forms self::$instance The one true GamiPress_Formidable_Forms
     */
    public static function instance() {

        if( !self::$instance ) {

            self::$instance = new GamiPress_Formidable_Forms();
            self::$instance->constants();
            self::$instance->includes();
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
        define( 'GAMIPRESS_FRM_VER', '1.0.6' );

        // Plugin path
        define( 'GAMIPRESS_FRM_DIR', plugin_dir_path( __FILE__ ) );

        // Plugin URL
        define( 'GAMIPRESS_FRM_URL', plugin_dir_url( __FILE__ ) );

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

            require_once GAMIPRESS_FRM_DIR . 'includes/admin.php';
            require_once GAMIPRESS_FRM_DIR . 'includes/functions.php';
            require_once GAMIPRESS_FRM_DIR . 'includes/listeners.php';
            require_once GAMIPRESS_FRM_DIR . 'includes/requirements.php';
            require_once GAMIPRESS_FRM_DIR . 'includes/rules-engine.php';
            require_once GAMIPRESS_FRM_DIR . 'includes/scripts.php';
            require_once GAMIPRESS_FRM_DIR . 'includes/triggers.php';

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

        // Setup our activation and deactivation hooks
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        add_action( 'admin_notices', array( $this, 'admin_notices' ) );

    }

    /**
     * Activation hook for the plugin.
     *
     * @since  1.0.0
     */
    function activate() {

        if( $this->meets_requirements() ) {

        }

    }

    /**
     * Deactivation hook for the plugin.
     *
     * @since  1.0.0
     */
    function deactivate() {

    }

    /**
     * Plugin admin notices.
     *
     * @since  1.0.0
     */
    public function admin_notices() {
        ?>
        <div id="message" class="notice notice-error is-dismissible gamipress-integration-deprecated">
            <p><?php print( __( 'GamiPress - Formidable Forms integration is not required anymore since now all integrations are included in GamiPress core.', 'gamipress-gamipress-formidable-forms-integration' ) ); ?></p>
        </div>
        <?php
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

        // Requirements on multisite install
        if( is_multisite() && gamipress_is_network_wide_active() && is_main_site() ) {

            // On main site, need to check if integrated plugin is installed on any sub site to load all configuration files
            if( gamipress_is_plugin_active_on_network( 'formidable/formidable.php' ) ) {
                return true;
            }

        }

        if ( ! function_exists( 'load_formidable_forms' ) ) {
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
        $lang_dir = GAMIPRESS_FRM_DIR . '/languages/';
        $lang_dir = apply_filters( 'gamipress_formidable_forms_languages_directory', $lang_dir );

        // Traditional WordPress plugin locale filter
        $locale = apply_filters( 'plugin_locale', get_locale(), 'gamipress-formidable-forms-integration' );
        $mofile = sprintf( '%1$s-%2$s.mo', 'gamipress-formidable-forms-integration', $locale );

        // Setup paths to current locale file
        $mofile_local   = $lang_dir . $mofile;
        $mofile_global  = WP_LANG_DIR . '/gamipress-formidable-forms-integration/' . $mofile;

        if( file_exists( $mofile_global ) ) {
            // Look in global /wp-content/languages/gamipress-formidable-forms-integration/ folder
            load_textdomain( 'gamipress-formidable-forms-integration', $mofile_global );
        } elseif( file_exists( $mofile_local ) ) {
            // Look in local /wp-content/plugins/gamipress-formidable-forms-integration/languages/ folder
            load_textdomain( 'gamipress-formidable-forms-integration', $mofile_local );
        } else {
            // Load the default language files
            load_plugin_textdomain( 'gamipress-formidable-forms-integration', false, $lang_dir );
        }

    }

}

/**
 * The main function responsible for returning the one true GamiPress_Formidable_Forms instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \GamiPress_Formidable_Forms The one true GamiPress_Formidable_Forms
 */
function GamiPress_FRM() {
    return GamiPress_Formidable_Forms::instance();
}
add_action( 'plugins_loaded', 'GamiPress_FRM' );
