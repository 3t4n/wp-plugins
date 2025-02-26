<?php
/**
 * Plugin Name:           AutomatorWP - Contact Form 7 integration
 * Plugin URI:            https://wordpress.org/plugins/automatorwp-contact-form-7-integration/
 * Description:           Connect AutomatorWP with Contact Form 7.
 * Version:               1.0.6
 * Author:                AutomatorWP
 * Author URI:            https://automatorwp.com/
 * Text Domain:           automatorwp-contact-form-7-integration
 * Domain Path:           /languages/
 * Requires at least:     4.4
 * Tested up to:          5.9
 * License:               GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package               AutomatorWP\Contact_Form_7
 * @author                AutomatorWP
 * @copyright             Copyright (c) AutomatorWP
 */

final class AutomatorWP_Contact_Form_7_Integration {

    /**
     * @var         AutomatorWP_Contact_Form_7_Integration $instance The one true AutomatorWP_Contact_Form_7_Integration
     * @since       1.0.0
     */
    private static $instance;

    /**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      AutomatorWP_Contact_Form_7_Integration self::$instance The one true AutomatorWP_Contact_Form_7_Integration
     */
    public static function instance() {
        if( !self::$instance ) {
            self::$instance = new AutomatorWP_Contact_Form_7_Integration();
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
        define( 'AUTOMATORWP_CONTACT_FORM_7_VER', '1.0.6' );

        // Plugin file
        define( 'AUTOMATORWP_CONTACT_FORM_7_FILE', __FILE__ );

        // Plugin path
        define( 'AUTOMATORWP_CONTACT_FORM_7_DIR', plugin_dir_path( __FILE__ ) );

        // Plugin URL
        define( 'AUTOMATORWP_CONTACT_FORM_7_URL', plugin_dir_url( __FILE__ ) );
    }

    /**
     * Include plugin files
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function includes() {

        if( $this->meets_requirements() && ! $this->pro_installed() ) {

            // Triggers
            require_once AUTOMATORWP_CONTACT_FORM_7_DIR . 'includes/triggers/submit-form.php';
            // Anonymous Triggers
            require_once AUTOMATORWP_CONTACT_FORM_7_DIR . 'includes/triggers/anonymous-submit-form.php';

            // Includes
            require_once AUTOMATORWP_CONTACT_FORM_7_DIR . 'includes/functions.php';

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

        add_action( 'automatorwp_init', array( $this, 'register_integration' ) );

        add_action( 'admin_notices', array( $this, 'admin_notices' ) );
    }

    /**
     * Registers this integration
     *
     * @since 1.0.0
     */
    function register_integration() {

        automatorwp_register_integration( 'contact_form_7', array(
            'label' => 'Contact Form 7',
            'icon'  => plugin_dir_url( __FILE__ ) . 'assets/contact-form-7.svg',
        ) );

    }

    /**
     * Plugin admin notices.
     *
     * @since  1.0.0
     */
    public function admin_notices() {

        if ( ! $this->meets_requirements() && ! defined( 'AUTOMATORWP_ADMIN_NOTICES' ) ) : ?>

            <div id="message" class="notice notice-error is-dismissible">
                <p>
                    <?php printf(
                        __( 'AutomatorWP - Contact Form 7 requires %s and %s in order to work. Please install and activate them.', 'automatorwp-contact-form-7-integration' ),
                        '<a href="https://wordpress.org/plugins/automatorwp/" target="_blank">AutomatorWP</a>',
                        '<a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a>'
                    ); ?>
                </p>
            </div>

            <?php define( 'AUTOMATORWP_ADMIN_NOTICES', true ); ?>

        <?php elseif ( $this->pro_installed() && ! defined( 'AUTOMATORWP_ADMIN_NOTICES' ) ) : ?>

            <div id="message" class="notice notice-error is-dismissible">
                <p>
                    <?php echo __( 'You can uninstall AutomatorWP - Contact Form 7 Integration because you already have the pro version installed and includes all the features of the free version.', 'automatorwp-contact-form-7-integration' ); ?>
                </p>
            </div>

            <?php define( 'AUTOMATORWP_ADMIN_NOTICES', true ); ?>

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

        if ( ! class_exists( 'AutomatorWP' ) ) {
            return false;
        }

        if ( ! class_exists( 'WPCF7' ) ) {
            return false;
        }

        return true;

    }

    /**
     * Check if the pro version of this integration is installed
     *
     * @since  1.0.0
     *
     * @return bool True if pro version installed
     */
    private function pro_installed() {

        if ( ! class_exists( 'AutomatorWP_Contact_Form_7' ) ) {
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
        $lang_dir = AUTOMATORWP_CONTACT_FORM_7_DIR . '/languages/';
        $lang_dir = apply_filters( 'automatorwp_contact_form_7_languages_directory', $lang_dir );

        // Traditional WordPress plugin locale filter
        $locale = apply_filters( 'plugin_locale', get_locale(), 'automatorwp-contact-form-7-integration' );
        $mofile = sprintf( '%1$s-%2$s.mo', 'automatorwp-contact-form-7-integration', $locale );

        // Setup paths to current locale file
        $mofile_local   = $lang_dir . $mofile;
        $mofile_global  = WP_LANG_DIR . '/automatorwp-contact-form-7-integration/' . $mofile;

        if( file_exists( $mofile_global ) ) {
            // Look in global /wp-content/languages/automatorwp-contact-form-7-integration/ folder
            load_textdomain( 'automatorwp-contact-form-7-integration', $mofile_global );
        } elseif( file_exists( $mofile_local ) ) {
            // Look in local /wp-content/plugins/automatorwp-contact-form-7-integration/languages/ folder
            load_textdomain( 'automatorwp-contact-form-7-integration', $mofile_local );
        } else {
            // Load the default language files
            load_plugin_textdomain( 'automatorwp-contact-form-7-integration', false, $lang_dir );
        }

    }

}

/**
 * The main function responsible for returning the one true AutomatorWP_Contact_Form_7_Integration instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \AutomatorWP_Contact_Form_7_Integration The one true AutomatorWP_Contact_Form_7_Integration
 */
function AutomatorWP_Contact_Form_7_Integration() {
    return AutomatorWP_Contact_Form_7_Integration::instance();
}
add_action( 'plugins_loaded', 'AutomatorWP_Contact_Form_7_Integration' );
