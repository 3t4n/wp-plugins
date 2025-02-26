<?php
/**
 * Plugin Name:     EDD View More
 * Plugin URI:      https://wordpress.org/plugins/edd-view-more
 * Description:     Add a view more link on products lists.
 * Version:         1.0.0
 * Author:          Tsunoa
 * Author URI:      https://tsunoa.com
 * Text Domain:     edd-view-more
 *
 * @package         EDD\View_More
 * @author          Tsunoa
 * @copyright       Copyright (c) Tsunoa
 */


// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'EDD_View_More' ) ) {

    /**
     * Main EDD_View_More class
     *
     * @since       1.0.0
     */
    class EDD_View_More {

        /**
         * @var         EDD_View_More $instance The one true EDD_View_More
         * @since       1.0.0
         */
        private static $instance;


        /**
         * Get active instance
         *
         * @access      public
         * @since       1.0.0
         * @return      object self::$instance The one true EDD_View_More
         */
        public static function instance() {
            if( !self::$instance ) {
                self::$instance = new EDD_View_More();
                self::$instance->setup_constants();
                self::$instance->includes();
                self::$instance->load_textdomain();
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
        private function setup_constants() {
            // Plugin version
            define( 'EDD_VIEW_MORE_VER', '1.0.2' );

            // Plugin path
            define( 'EDD_VIEW_MORE_DIR', plugin_dir_path( __FILE__ ) );

            // Plugin URL
            define( 'EDD_VIEW_MORE_URL', plugin_dir_url( __FILE__ ) );
        }

        /**
         * Include necessary files
         *
         * @access      private
         * @since       1.0.0
         * @return      void
         */
        private function includes() {

        }

        /**
         * Run action and filter hooks
         *
         * @access      private
         * @since       1.0.0
         * @return      void
         */
        private function hooks() {
            // Register settings
            add_filter( 'edd_settings_extensions', array( $this, 'settings' ), 1 );

            // Easy Digital Downloads [downloads] shortcode hooks
            add_filter( 'shortcode_atts_downloads', array( $this, 'shortcode_atts_downloads' ), 10, 4 );
            add_action( 'edd_download_after', array( $this, 'edd_download_after' ) );
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
            $lang_dir = EDD_VIEW_MORE_DIR . '/languages/';
            $lang_dir = apply_filters( 'edd_view_more_languages_directory', $lang_dir );

            // Traditional WordPress plugin locale filter
            $locale = apply_filters( 'plugin_locale', get_locale(), 'edd-view-more' );
            $mofile = sprintf( '%1$s-%2$s.mo', 'edd-view-more', $locale );

            // Setup paths to current locale file
            $mofile_local   = $lang_dir . $mofile;
            $mofile_global  = WP_LANG_DIR . '/edd-view-more/' . $mofile;

            if( file_exists( $mofile_global ) ) {
                // Look in global /wp-content/languages/edd-view-more/ folder
                load_textdomain( 'edd-view-more', $mofile_global );
            } elseif( file_exists( $mofile_local ) ) {
                // Look in local /wp-content/plugins/edd-view-more/languages/ folder
                load_textdomain( 'edd-view-more', $mofile_local );
            } else {
                // Load the default language files
                load_plugin_textdomain( 'edd-view-more', false, $lang_dir );
            }
        }

        /**
         * Add settings
         *
         * @access      public
         * @since       1.0.0
         * @param       array $settings The existing EDD settings array
         * @return      array The modified EDD settings array
         */
        public function settings( $settings ) {
            $new_settings = array(
                array(
                    'id'    => 'edd_view_more_settings',
                    'name'  => '<strong>' . __( 'EDD View More Settings', 'edd-view-more' ) . '</strong>',
                    'desc'  => __( 'Configure EDD View More Settings', 'edd-view-more' ),
                    'type'  => 'header',
                ),
                array(
                    'id'    => 'edd_view_more_text',
                    'name'  => '<strong>' . __( 'View More Button Label', 'edd-view-more' ) . '</strong>',
                    'type'  => 'text',
                    'std'   => __( 'View More', 'edd-view-more' )
                )
            );

            return array_merge( $settings, $new_settings );
        }

        /**
         * [downloads] custom attributes
         *
         * @access      public
         * @since       1.0.0
         */
        public function shortcode_atts_downloads( $out, $pairs, $atts, $shortcode ) {
            // Default custom attributes
            $custom_pairs = array(
                'view_more' => 'no',
            );

            foreach ($custom_pairs as $name => $default) {
                if ( array_key_exists( $name, $atts ) )
                    $out[$name] = $atts[$name];
                else
                    $out[$name] = $default;
            }

            return $out;
        }

        /**
         * Download item after hook
         */
        public function edd_download_after() {
            global $edd_download_shortcode_item_atts, $edd_download_shortcode_item_i;

            if ( 'yes' === $edd_download_shortcode_item_atts['view_more'] ) :
                $defaults = apply_filters( 'edd_view_more_link_defaults', array(
                    'text'        => edd_get_option( 'edd_view_more_text', __( 'View More', 'edd-view-more' ) ),
                    'style'       => edd_get_option( 'button_style', 'button' ),
                    'color'       => edd_get_option( 'button_color', 'blue' ),
                    'class'       => 'edd-submit edd-view-more'
                ) );

                $class = implode( ' ', array( $defaults['style'], $defaults['color'], trim( $defaults['class'] ) ) ); ?>

                <div class="edd_view_more_button">

                    <a href="<?php echo get_the_permalink(); ?>" class="<?php echo esc_attr( $class ); ?>"><span class="edd-view-more-label"><?php echo $defaults['text']; ?></span></a>

                </div>

            <?php endif;
        }
    }
}


/**
 * The main function responsible for returning the one true EDD_View_More
 * instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \EDD_View_More The one true EDD_View_More
 */
function edd_view_more() {
    return EDD_View_More::instance();
}
add_action( 'plugins_loaded', 'edd_view_more' );


/**
 * EDD_View_More activation
 *
 * @since       1.0.0
 * @return      void
 */
function edd_view_more_activation() {

}
register_activation_hook( __FILE__, 'edd_view_more_activation' );