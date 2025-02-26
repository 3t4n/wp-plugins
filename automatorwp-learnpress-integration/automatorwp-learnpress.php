<?php
/**
 * Plugin Name:           AutomatorWP - LearnPress integration
 * Plugin URI:            https://wordpress.org/plugins/automatorwp-learnpress-integration/
 * Description:           Connect AutomatorWP with LearnPress.
 * Version:               1.0.5
 * Author:                AutomatorWP
 * Author URI:            https://automatorwp.com/
 * Text Domain:           automatorwp-learnpress-integration
 * Domain Path:           /languages/
 * Requires at least:     4.4
 * Tested up to:          5.9
 * License:               GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package               AutomatorWP\LearnPress
 * @author                AutomatorWP
 * @copyright             Copyright (c) AutomatorWP
 */

final class AutomatorWP_LearnPress_Integration {

    /**
     * @var         AutomatorWP_LearnPress_Integration $instance The one true AutomatorWP_LearnPress_Integration
     * @since       1.0.0
     */
    private static $instance;

    /**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      AutomatorWP_LearnPress_Integration self::$instance The one true AutomatorWP_LearnPress_Integration
     */
    public static function instance() {
        if( !self::$instance ) {
            self::$instance = new AutomatorWP_LearnPress_Integration();
            
            if( ! self::$instance->pro_installed() ) {

                self::$instance->constants();
                self::$instance->includes();
                self::$instance->load_textdomain();

            }

            self::$instance->hooks();
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
        define( 'AUTOMATORWP_LEARNPRESS_VER', '1.0.5' );

        // Plugin file
        define( 'AUTOMATORWP_LEARNPRESS_FILE', __FILE__ );

        // Plugin path
        define( 'AUTOMATORWP_LEARNPRESS_DIR', plugin_dir_path( __FILE__ ) );

        // Plugin URL
        define( 'AUTOMATORWP_LEARNPRESS_URL', plugin_dir_url( __FILE__ ) );
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

            // Triggers
            require_once AUTOMATORWP_LEARNPRESS_DIR . 'includes/triggers/complete-quiz.php';
            require_once AUTOMATORWP_LEARNPRESS_DIR . 'includes/triggers/complete-lesson.php';
            require_once AUTOMATORWP_LEARNPRESS_DIR . 'includes/triggers/complete-course.php';

            // Actions
            require_once AUTOMATORWP_LEARNPRESS_DIR . 'includes/actions/user-course.php';

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

        automatorwp_register_integration( 'learnpress', array(
            'label' => 'LearnPress',
            'icon'  => plugin_dir_url( __FILE__ ) . 'assets/learnpress.svg',
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
                        __( 'AutomatorWP - LearnPress requires %s and %s in order to work. Please install and activate them.', 'automatorwp-learnpress-integration' ),
                        '<a href="https://wordpress.org/plugins/automatorwp/" target="_blank">AutomatorWP</a>',
                        '<a href="https://wordpress.org/plugins/learnpress/" target="_blank">LearnPress</a>'
                    ); ?>
                </p>
            </div>

            <?php define( 'AUTOMATORWP_ADMIN_NOTICES', true ); ?>

        <?php elseif ( $this->pro_installed() && ! defined( 'AUTOMATORWP_ADMIN_NOTICES' ) ) : ?>

            <div id="message" class="notice notice-error is-dismissible">
                <p>
                    <?php echo __( 'You can uninstall AutomatorWP - LearnPress Integration because you already have the pro version installed and includes all the features of the free version.', 'automatorwp-learnpress-integration' ); ?>
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

        if ( ! class_exists( 'LearnPress' ) ) {
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

        if ( ! class_exists( 'AutomatorWP_LearnPress' ) ) {
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
        $lang_dir = AUTOMATORWP_LEARNPRESS_DIR . '/languages/';
        $lang_dir = apply_filters( 'automatorwp_learnpress_languages_directory', $lang_dir );

        // Traditional WordPress plugin locale filter
        $locale = apply_filters( 'plugin_locale', get_locale(), 'automatorwp-learnpress-integration' );
        $mofile = sprintf( '%1$s-%2$s.mo', 'automatorwp-learnpress-integration', $locale );

        // Setup paths to current locale file
        $mofile_local   = $lang_dir . $mofile;
        $mofile_global  = WP_LANG_DIR . '/automatorwp-learnpress-integration/' . $mofile;

        if( file_exists( $mofile_global ) ) {
            // Look in global /wp-content/languages/automatorwp-learnpress-integration/ folder
            load_textdomain( 'automatorwp-learnpress-integration', $mofile_global );
        } elseif( file_exists( $mofile_local ) ) {
            // Look in local /wp-content/plugins/automatorwp-learnpress-integration/languages/ folder
            load_textdomain( 'automatorwp-learnpress-integration', $mofile_local );
        } else {
            // Load the default language files
            load_plugin_textdomain( 'automatorwp-learnpress-integration', false, $lang_dir );
        }

    }

}

/**
 * The main function responsible for returning the one true AutomatorWP_LearnPress_Integration instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \AutomatorWP_LearnPress_Integration The one true AutomatorWP_LearnPress_Integration
 */
function AutomatorWP_LearnPress_Integration() {
    return AutomatorWP_LearnPress_Integration::instance();
}
add_action( 'plugins_loaded', 'AutomatorWP_LearnPress_Integration' );
