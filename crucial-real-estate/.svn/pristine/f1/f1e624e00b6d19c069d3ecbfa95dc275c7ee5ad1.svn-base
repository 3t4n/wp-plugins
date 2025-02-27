<?php
/**
 * Plugin Name: Crucial Real Estate
 * Plugin URI: https://aarambhathemes.com/plugins/crucial-real-estate
 * Description: Crucial Real Estate is a dynamic and feature rich WordPress Plugin to integrate property & agent listings on websites of real estate agents and companies. It brings a free theme and quick demo setup feature altogether!
 * Version: 1.0.6
 * Author: Aarambha Themes
 * Author URI: http://aarambhathemes.com
 * Text Domain: crucial-real-estate
 * Domain Path: /languages
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! class_exists('Crucial_Real_Estate' ) ) :

    final class Crucial_Real_Estate {

        /**
         * Plugin's current version
         *
         * @var string
         */
        public $version;

        /**
         * Plugin Name
         *
         * @var string
         */
        public $plugin_name;

        /**
         * Plugin's singleton instance.
         *
         * @var Crucial_Real_Estate
         */
        protected static $_instance;

        /**
         * Constructor function.
         */
        public function __construct() {

            $this->plugin_name = 'crucial-real-estate';
            $this->version     = '1.0.6';

            $this->define_constants();

            $this->includes();

            $this->initialize_custom_post_types();

            $this->initialize_meta_boxes();

            $this->initialize_admin_menu();

            $this->init_hooks();

            do_action('cre_loaded');  // Crucial Real Estate plugin loaded action hook.
        }

        /**
         * Provides singleton instance.
         */
        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        /**
         * Defines constants.
         */
        protected function define_constants() {
            
            // Plugin Version
            if ( ! defined('CRE_VERSION') ) {
                define('CRE_VERSION', $this->version);
            }

            // Full path and filename.
            if ( ! defined('CRE_PLUGIN_FILE') ) {
                define('CRE_PLUGIN_FILE', __FILE__);
            }

            // Plugin directory path.
            if ( ! defined('CRE_PLUGIN_DIR') ) {
                define('CRE_PLUGIN_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin directory URL.
            if ( ! defined('CRE_PLUGIN_URL') ) {
                define('CRE_PLUGIN_URL', plugin_dir_url(__FILE__));
            }

            // Plugin file path relative to plugins directory.
            if ( ! defined('CRE_PLUGIN_BASENAME') ) {
                define('CRE_PLUGIN_BASENAME', plugin_basename(__FILE__));
            }
        }

        /**
         * Includes files required on admin and on frontend.
         */
        public function includes() {
            require_once CRE_PLUGIN_DIR . 'includes/classes/class-cre-script-loader.php';  // Javascript Loader Class
            require_once CRE_PLUGIN_DIR . 'includes/functions/basic.php';  // basic functions.
            require_once CRE_PLUGIN_DIR . 'includes/functions/price.php';   // price functions.
            require_once CRE_PLUGIN_DIR . 'includes/functions/agents.php';   // agents functions.
            require_once CRE_PLUGIN_DIR . 'includes/functions/gdpr.php';   // gdpr functions.
            require_once CRE_PLUGIN_DIR . 'includes/functions/form-handlers.php';   // form handlers.
            require_once CRE_PLUGIN_DIR . 'includes/functions/video.php'; // Video related functions.
        }

        /**
         * Admin menu.
         */
        public function initialize_admin_menu() {
            require_once CRE_PLUGIN_DIR . 'includes/admin-menu/class-cre-admin-menu.php';
        }

        /**
         * Custom Post Types
         */
        public function initialize_custom_post_types() {
            include_once CRE_PLUGIN_DIR . 'includes/custom-post-types/class-cre-property.php';   // Property post type.
            include_once CRE_PLUGIN_DIR . 'includes/custom-post-types/class-cre-agent.php';   // Agent post type.
        }

        /**
         * Meta boxes
         */
        public function initialize_meta_boxes() {
            include_once CRE_PLUGIN_DIR . 'includes/meta-boxes/class-cre-meta-boxes.php';
        }

        /**
         * Initialize hooks.
         */
        public function init_hooks() {
            add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
            add_action('template_redirect', array($this, 'template_redirect_page'), 0 ); // Covert page into paged for the custom pagination
            add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));  // plugin's admin styles.
            add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts')); // plugin's admin scrips.
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts')); // plugin's scripts.

            add_filter('body_class', array($this, 'add_body__class')); // add body class
            add_filter('template_include', array($this, 'template_loader')); // load plugin template files in theme.
        }

        public function template_redirect_page() {
            global $wp_query;
            $page = ( int ) $wp_query->get( 'page' );
            if ( $page > 1 ) {
                // convert 'page' to 'paged'
                $wp_query->set( 'page', 1 );
                $wp_query->set( 'paged', $page );
            }
            // prevent redirect
            remove_action( 'template_redirect', 'redirect_canonical' );
        }

        /**
         * Load text domain for translation.
         */
        public function load_plugin_textdomain() {
            load_plugin_textdomain('crucial-real-estate', false, dirname(CRE_PLUGIN_BASENAME) . '/languages');
        }

        /**
         * Enqueue admin styles
         */
        public function enqueue_admin_styles() {
            wp_enqueue_style('crucial-real-estate-admin', CRE_PLUGIN_URL . 'assets/css/cre-admin.css', array(), $this->version, 'all');
        }

        /**
         * Enqueue Admin JavaScript
         */
        public function enqueue_admin_scripts() {

            wp_enqueue_media();
            
            wp_enqueue_script(
                'crucial-real-estate-admin',
                CRE_PLUGIN_URL . 'assets/js/cre-admin.js',
                array(
                    'jquery'
                ),
                $this->version
            );
        }

        /**
         * Enqueue JavaScript
         */
        public function enqueue_scripts() {

            // Enqueue Slick Js
            wp_enqueue_script( 'slick', CRE_PLUGIN_URL . 'assets/js/slick.js', [ 'jquery' ], '1.8.1', true );
            wp_script_add_data( 'slick', 'strategy', 'defer' );

            // cre frontend script.
            wp_register_script('jquery-validate', CRE_PLUGIN_URL . 'assets/js/jquery.validate.js', array('jquery', 'jquery-form'), '1.19.3', true);
            wp_script_add_data( 'jquery-validate', 'strategy', 'defer' );
            wp_enqueue_script('cre-frontend', CRE_PLUGIN_URL . 'assets/js/cre-frontend.js', array('jquery-validate'), $this->version, true);
            wp_script_add_data( 'cre-frontend', 'strategy', 'defer' );

            // Font Awesome Style
            wp_enqueue_style( 'fontawesome', CRE_PLUGIN_URL .'assets/css/all.css', null, '5.15.4' );
            // Slick Style
            wp_enqueue_style( 'slick-theme', CRE_PLUGIN_URL .'assets/css/slick-theme.css', null, '1.8.0' );
            wp_enqueue_style( 'slick', CRE_PLUGIN_URL .'assets/css/slick.css', null, '1.8.1' );

            wp_enqueue_style('cre-main-style', CRE_PLUGIN_URL . 'assets/css/main.css', array(), $this->version, 'all');
            wp_enqueue_style('cre-style', CRE_PLUGIN_URL . 'assets/css/cre-frontend.css', array(), $this->version, 'all');
        }

        /**
         * Add body class
         *
         * @param $classes
         * @return array
         */
        public function add_body__class( $classes ) {

            if( is_post_type_archive( 'property' )
                || ( is_single() && 'property' == get_post_type() )
                || ( is_single() && 'agent' == get_post_type() )
                || is_tax( 'property-status' )
                || is_tax( 'property-type' )
                || is_tax( 'property-location' )
            ) {
                $classes[] = 'cre-blog-post';
            }
            return array_unique($classes);
        }

        /**
         * Load a template.
         *
         * Handles template usage so that we can use our own templates instead of the themes.
         *
         * Templates are in the 'templates' folder.
         *
         * @param mixed $template
         * @return string
         */
        public function template_loader($template) {

            $file = '';

            if ( is_single() && get_post_type() == 'agent' ) {
                $file = 'single-agent.php';
            }

            if ( is_single() && get_post_type() == 'property' ) {
                $file = 'single-property.php';
            }

            if ( ( is_archive() && get_post_type() == 'property' ) ) {
                $file = 'archive-property.php';
            }

            $file = apply_filters('cre_template_file', $file);
            if (!$file) {
                return $template;
            }

            $template = cre_get_template_part($file);

            return $template;
        }

        /**
         * Tabs
         * @return array
         */
        public function tabs() {
            $tabs = array(
                'price'              => esc_html__('Price Format', 'crucial-real-estate'),
                'map'                => esc_html__('Maps', 'crucial-real-estate'),
                'gdpr'               => esc_html__('GDPR', 'crucial-real-estate'),
                'property'           => esc_html__('Property', 'crucial-real-estate')
            );

            return $tabs;
        }

        /**
         * Generates tabs navigation
         * @param $current_tab
         */
        public function tabs_nav( $current_tab ) {

            $tabs = $this->tabs();
            ?>
<div id="cre-setting-tabs" class="cre-setting-tabs">
    <?php
                if ( ! empty( $tabs ) && is_array( $tabs ) ) {
                    foreach ( $tabs as $slug => $title ) {
                        $active_tab = ($current_tab === $slug) ? 'cre-is-active-tab' : '';
                        $admin_url  = ($current_tab === $slug) ? '#' : admin_url('admin.php?page=cre-settings&tab=' . esc_html($slug));
                        echo '<a class="cre-tab ' . esc_attr($active_tab) . '" href="' . esc_url($admin_url) . '" data-tab="' . esc_attr($slug) . '">' . esc_html($title) . '</a>';
                    }
                }
                ?>
</div>
<?php
        }

        /**
         * Settings page callback
         */
        public function settings_page() {
            require_once CRE_PLUGIN_DIR . 'includes/settings/settings.php';
        }

        /**
         * Retrieves an option value based on an option name.
         *
         * @param string $option_name
         * @param bool   $default
         * @param string $type
         *
         * @return mixed|string
         */
        public function get_option($option_name, $default = false, $type = 'text') {

            if ( isset($_POST[$option_name]) ) {

                switch ($type) {
                    case 'textarea':
                        $value = wp_kses($_POST[$option_name], array(
                            'a'      => array(
                                'class'  => array(),
                                'href'   => array(),
                                'target' => array(),
                                'title'  => array(),
                            ),
                            'br'     => array(),
                            'em'     => array(),
                            'strong' => array(),
                        ));
                        break;

                    default:
                        $value = sanitize_text_field($_POST[$option_name]);
                }

                return $value;
            }

            return get_option($option_name, $default);
        }

        /**
         * Add notice when settings are saved.
         */
        public function notice() {
            ?>
<div id="setting-error-cre_settings_updated" class="updated notice is-dismissible">
    <p><strong><?php esc_html_e('Settings saved successfully!', 'crucial-real-estate'); ?></strong></p>
</div>
<?php
        }

        /**
         * Cloning is forbidden.
         */
        public function __clone() {
            _doing_it_wrong(__FUNCTION__, esc_html__('Cloning is forbidden!', 'crucial-real-estate'), CRE_VERSION);
        }

        /**
         * Unserializing instances of this class is forbidden.
         */
        public function __wakeup() {
            _doing_it_wrong(__FUNCTION__, esc_html__('Unserializing is forbidden!', 'crucial-real-estate'), CRE_VERSION);
        }
    }

endif; // End if class_exists check.


/**
 * Main instance of Crucial_Real_Estate.
 *
 * Returns the main instance of Crucial_Real_Estate to prevent the need to use globals.
 *
 * @return Crucial_Real_Estate
 */
function CRE() {
    return Crucial_Real_Estate::instance();
}

// Get CRE Running.
CRE();