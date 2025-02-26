<?php
/**
 * Plugin Name:             GamiPress - Conditional Emails Recipients
 * Plugin URI:              https://wordpress.org/plugins/gamipress-conditional-emails-recipients
 * Description:             Add custom recipients on conditional emails.
 * Version:                 1.0.1
 * Author:                  GamiPress
 * Author URI:              https://gamipress.com/
 * Text Domain:             gamipress-conditional-emails-recipients
 * Domain Path:             /languages/
 * Requires at least:       4.4
 * Tested up to:            5.8
 * License:                 GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package                 GamiPress\Conditional_Emails\Recipients
 * @author                  GamiPress
 * @copyright               Copyright (c) GamiPress
 */

final class GamiPress_Conditional_Emails_Recipients {

    /**
     * @var         GamiPress_Conditional_Emails_Recipients $instance The one true GamiPress_Conditional_Emails_Recipients
     * @since       1.0.0
     */
    private static $instance;

    /**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      GamiPress_Conditional_Emails_Recipients self::$instance The one true GamiPress_Conditional_Emails_Recipients
     */
    public static function instance() {

        if( !self::$instance ) {

            self::$instance = new GamiPress_Conditional_Emails_Recipients();
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
        define( 'GAMIPRESS_CONDITIONAL_EMAILS_RECIPIENTS_VER', '1.0.1' );

        // Plugin file
        define( 'GAMIPRESS_CONDITIONAL_EMAILS_RECIPIENTS_FILE', __FILE__ );

        // Plugin path
        define( 'GAMIPRESS_CONDITIONAL_EMAILS_RECIPIENTS_DIR', plugin_dir_path( __FILE__ ) );

        // Plugin URL
        define( 'GAMIPRESS_CONDITIONAL_EMAILS_RECIPIENTS_URL', plugin_dir_url( __FILE__ ) );
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

            require_once GAMIPRESS_CONDITIONAL_EMAILS_RECIPIENTS_DIR . 'includes/admin.php';
            require_once GAMIPRESS_CONDITIONAL_EMAILS_RECIPIENTS_DIR . 'includes/filters.php';

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

        if ( ! $this->meets_requirements() && ! defined( 'GAMIPRESS_ADMIN_NOTICES' ) ) : ?>

            <div id="message" class="notice notice-error is-dismissible">
                <p>
                    <?php printf(
                        __( 'GamiPress - Conditional Emails Recipients requires %s and %s in order to work. Please install and activate them.', 'gamipress-conditional-emails-recipients' ),
                        '<a href="https://wordpress.org/plugins/gamipress/" target="_blank">GamiPress</a>',
                        '<a href="https://gamipress.com/add-ons/gamipress-conditional-emails/" target="_blank">GamiPress - Conditional Emails</a>'
                    ); ?>
                </p>
            </div>

            <?php define( 'GAMIPRESS_ADMIN_NOTICES', true ); ?>

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

        if ( ! class_exists( 'GamiPress_Conditional_Emails' ) ) {
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
        $lang_dir = GAMIPRESS_CONDITIONAL_EMAILS_RECIPIENTS_DIR . '/languages/';
        $lang_dir = apply_filters( 'gamipress_conditional_emails_recipients_languages_directory', $lang_dir );

        // Traditional WordPress plugin locale filter
        $locale = apply_filters( 'plugin_locale', get_locale(), 'gamipress-conditional-emails-recipients' );
        $mofile = sprintf( '%1$s-%2$s.mo', 'gamipress-conditional-emails-recipients', $locale );

        // Setup paths to current locale file
        $mofile_local   = $lang_dir . $mofile;
        $mofile_global  = WP_LANG_DIR . '/gamipress-conditional-emails-recipients/' . $mofile;

        if( file_exists( $mofile_global ) ) {
            // Look in global /wp-content/languages/gamipress/ folder
            load_textdomain( 'gamipress-conditional-emails-recipients', $mofile_global );
        } elseif( file_exists( $mofile_local ) ) {
            // Look in local /wp-content/plugins/gamipress/languages/ folder
            load_textdomain( 'gamipress-conditional-emails-recipients', $mofile_local );
        } else {
            // Load the default language files
            load_plugin_textdomain( 'gamipress-conditional-emails-recipients', false, $lang_dir );
        }

    }

}

/**
 * The main function responsible for returning the one true GamiPress_Conditional_Emails_Recipients instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \GamiPress_Conditional_Emails_Recipients The one true GamiPress_Conditional_Emails_Recipients
 */
function GamiPress_Conditional_Emails_Recipients() {
    return GamiPress_Conditional_Emails_Recipients::instance();
}
add_action( 'plugins_loaded', 'GamiPress_Conditional_Emails_Recipients' );
