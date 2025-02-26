<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://atl-software.net/
 * @since      1.0.0
 *
 * @package    Aec
 * @subpackage Aec/includes
 */

use KiosqueComponent\Loader\KiosqueComponentLoader;

require_once plugin_dir_path(__DIR__) . 'vendor/autoload.php';

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Aec
 * @subpackage Aec/includes
 * @author     ATL Software <support@atl-software.net>
 */
class Aec
{

    /**
     * The single instance of the class.
     *
     * @var Aec
     * @since 1.0.0
     */
    protected static $_instance = null;

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Aec_Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $version The current version of the plugin.
     */
    protected $version;

    /**
     * The current version of the client instance.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string
     */
    protected $client_instance_version;

    /**
     * The current settings of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      array $settings The current settings of the plugin.
     */
    var $settings;

    /**
     * Main AEC Instance.
     *
     * Ensures only one instance of AEC is loaded or can be loaded.
     *
     * @return Aec - Main instance.
     * @see AEC()
     * @since 1.0.0
     * @static
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
            self::$_instance->run();
        }
        return self::$_instance;
    }

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {

        $this->plugin_name = 'AEC Kiosque';
        $this->version = defined('AEC_VERSION') ? AEC_VERSION : '1.8.2';
        $this->client_instance_version = defined('AEC_CLIENT_INSTANCE_VERSION') ? AEC_CLIENT_INSTANCE_VERSION : $this->get_client_instance_version();
        $this->setup_constants();
        $this->setup_settings();
        $this->load_dependencies();
        $this->define_public_hooks();
        if (is_admin()) {
            $this->set_locale();
            $this->define_admin_hooks();
        }
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Aec_Loader. Orchestrates the hooks of the plugin.
     * - Aec_i18n. Defines internationalization functionality.
     * - Aec_Admin. Defines all hooks for the admin area.
     * - Aec_Public. Defines all hooks for the public side of the site.
     * - Aec_Shortcodes. Defines the plugin shortcodes.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @return   void
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once AEC_PATH . 'includes/class-aec-loader.php';

        if (is_admin()) {
            /**
             * The class responsible for defining internationalization functionality
             * of the plugin.
             */
            require_once AEC_PATH . 'includes/class-aec-i18n.php';

            /**
             * The class responsible for defining all actions that occur in the admin area.
             */
            require_once AEC_PATH . 'admin/class-aec-admin.php';
            /**
             * The class responsible for setup meta boxes
             */
            require_once AEC_PATH . 'admin/class-aec-admin-page-settings.php';
        }


        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once AEC_PATH . 'public/class-aec-public.php';

        /**
         * The class responsible for defining all shortcodes.
         */
        require_once AEC_PATH . 'public/class-aec-shortcodes.php';

        /**
         * The enums for languages
         */
        require_once AEC_PATH . 'includes/model/language-list-aec.php';

        $this->loader = new Aec_Loader();

    }

    /**
     * Returns the version of the client instance.
     *
     * @return    string
     * @since    1.0.0
     */
    private function get_client_instance_version(): string
    {
        $build_url = $this->get_client_instance_build_url();
        $file_content = @file_get_contents($build_url);
        $file_contents = $file_content ? explode(':', $file_content) : [];
        $version = $file_contents[2] ?? '';

        return trim($version);
    }

    /**
     * Setup constants
     *
     * @return   void
     * @since    1.0.0
     * @access   private
     */
    private function setup_constants()
    {

        if (!defined('AEC')) {
            define('AEC', true);
        }

        if (!defined('AEC_VERSION')) {
            define('AEC_VERSION', $this->version);
        }

        if (!defined('AEC_MAJOR_VERSION')) {
            define('AEC_MAJOR_VERSION', 1);
        }

        if (!defined('AEC_CLIENT_INSTANCE_VERSION')) {
            define('AEC_CLIENT_INSTANCE_VERSION', $this->client_instance_version);
        }

        if (!defined('AEC_PATH')) {
            define('AEC_PATH', plugin_dir_path(__DIR__));
        }

        if (!defined('AEC_BASENAME')) {
            define('AEC_BASENAME', plugin_basename(__DIR__));
        }

        if (!defined('AEC_URL')) {
            define('AEC_URL', plugins_url('/aec-kiosque', AEC_PATH));
        }

        if (!defined('AEC_ENVIRONMENT_DEV')) {
            define('AEC_ENVIRONMENT_DEV', 'development');
        }

        if (!defined('AEC_LOCAL_APP_URL')) {
            define('AEC_LOCAL_APP_URL', 'https://local.aec.app');
        }

        if (!defined('AEC_LOCAL_EXTRANET_URL')) {
            define('AEC_LOCAL_EXTRANET_URL', 'http://local.extranet-aec.com');
        }

        if (!defined('AEC_LOAD_LOCAL_FILES')) {
            define('AEC_LOAD_LOCAL_FILES', false);
        }

    }

    /**
     * Setup settings of the plugin.
     *
     * @return   void
     * @since    1.0.0
     * @access   private
     */
    private function setup_settings()
    {
        $this->settings = array(
            'name' => $this->plugin_name,
            'version' => $this->version,
            'client_instance' => $this->get_client_instance(),
            'establishment_type' => get_option('aec_etablishment_type'),
            'extranet_url' => $this->get_client_extranet_url(),
            'app_url' => $this->get_client_instance_url(),
            'wordpress_url' => $this->get_wordpress_url(),
            'api_key' => get_option('aec_extranet_api_token')
        );
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Aec_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale()
    {
        $plugin_i18n = new Aec_i18n();
        $this->loader->add_action('admin_init', $plugin_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks()
    {
        $plugin_name = $this->get_plugin_name();
        $plugin_version = $this->get_version();
        $plugin_public = new Aec_Public($plugin_name, $plugin_version);
        $plugin_admin = new Aec_Admin($plugin_name, $plugin_version);
        $plugin_settings = new Aec_Admin_Settings($plugin_name, $plugin_version);
        $page_settings = new Aec_Admin_Page_Settings($plugin_name, $plugin_version, $this->settings);

        $this->loader->add_action('current_screen', $plugin_settings, 'setup_guard');

        $this->loader->add_action('admin_head', $plugin_public, 'enqueue_extranet_head', 5);
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_public, 'enqueue_extranet_footer', 5);
        $this->loader->add_action('admin_menu', $plugin_settings, 'setup_plugin_options_menu');
        $this->loader->add_action('admin_init', $plugin_settings, 'setup_plugin_admin_settings');

        $this->loader->add_action('admin_init', $plugin_admin, 'add_styles_in_editor');

        $this->loader->add_action('add_meta_boxes', $page_settings, 'add_extranet_metabox');
        $this->loader->add_action('save_post', $page_settings, 'extranet_domain_on_save');
        $this->loader->add_action('delete_post', $page_settings, 'extranet_domain_on_delete');

        $this->loader->add_action('after_plugin_row_aec-kiosque/aec.php', $this, 'plugin_error_message');

    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks()
    {
        $plugin_public = new Aec_Public($this->get_plugin_name(), $this->get_version());
        $plugin_shortcodes = new Aec_Shortcodes($this->get_client_instance());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_extranet_head', 5);
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_extranet_footer', 5);
        $this->loader->add_action('script_loader_tag', $plugin_public, 'add_defer_attribute', 10, 2);
        $this->loader->add_action('style_loader_tag', $plugin_public, 'defer_style', 10, 3);

        $this->loader->add_shortcode('aec_classes', $plugin_shortcodes, 'webapp_classes_list');
        $this->loader->add_shortcode('aec_class_detail', $plugin_shortcodes, 'webapp_class_detail');
        $this->loader->add_shortcode('aec_events', $plugin_shortcodes, 'webapp_events');
        $this->loader->add_shortcode('aec_events_list', $plugin_shortcodes, 'webapp_events_list');
        $this->loader->add_shortcode('aec_event_detail', $plugin_shortcodes, 'webapp_event_detail');
        $this->loader->add_shortcode('aec_next_events', $plugin_shortcodes, 'webapp_next_events');
        $this->loader->add_shortcode('aec_events_grid', $plugin_shortcodes, 'webapp_events_list_grid');
        $this->loader->add_shortcode('aec_events_wide', $plugin_shortcodes, 'webapp_events_list_wide');
        $this->loader->add_shortcode('aec_contact_map', $plugin_shortcodes, 'webapp_contact_map');
        $this->loader->add_shortcode('aec_private_tuition', $plugin_shortcodes, 'webapp_private_tuition');
        $this->loader->add_shortcode('aec_classe_selection', $plugin_shortcodes, 'webapp_class_selection');
        $this->loader->add_shortcode('aec_student_login', $plugin_shortcodes, 'webapp_student_login');
        $this->loader->add_shortcode('aec_student_register', $plugin_shortcodes, 'webapp_student_register');
        $this->loader->add_shortcode('aec_identify_panel', $plugin_shortcodes, 'webapp_identify_panel');
        $this->loader->add_shortcode('aec_student_account', $plugin_shortcodes, 'webapp_student_account');
        $this->loader->add_shortcode('aec_student_account_dashboard', $plugin_shortcodes, 'webapp_student_account_dashboard');
        $this->loader->add_shortcode('aec_student_controls', $plugin_shortcodes, 'webapp_student_controls');
        $this->loader->add_shortcode('aec_student_password_recover', $plugin_shortcodes, 'webapp_student_password_recover');
        $this->loader->add_shortcode('aec_student_password_reset', $plugin_shortcodes, 'webapp_student_password_reset');
        $this->loader->add_shortcode('aec_student_password_update', $plugin_shortcodes, 'webapp_student_password_update');
        $this->loader->add_shortcode('aec_products_view', $plugin_shortcodes, 'webapp_products_list');
        $this->loader->add_shortcode('aec_donation_form', $plugin_shortcodes, 'webapp_donation_form');
        $this->loader->add_shortcode('aec_classes_list', $plugin_shortcodes, 'webapp_classes_list');
        $this->loader->add_shortcode('aec_classes_list_with_filters', $plugin_shortcodes, 'webapp_courses_selection_tiles');
        $this->loader->add_shortcode('aec_classes_catalog', $plugin_shortcodes, 'webapp_classes_catalog');
        $this->loader->add_shortcode('aec_classes_catalog_with_filter', $plugin_shortcodes, 'webapp_classes_catalog_with_filter');
        $this->loader->add_shortcode('aec_classes_search_box', $plugin_shortcodes, 'webapp_classes_search_box');
        $this->loader->add_shortcode('aec_shopping_cart', $plugin_shortcodes, 'webapp_shopping_cart');
        $this->loader->add_shortcode('aec_examination_list', $plugin_shortcodes, 'webapp_examination_list');
        $this->loader->add_shortcode('aec_examination_type_list', $plugin_shortcodes, 'webapp_examination_type_list');
        $this->loader->add_shortcode('aec_examination_type_detail', $plugin_shortcodes, 'webapp_examination_type_detail');
        $this->loader->add_shortcode('aec_examination_detail', $plugin_shortcodes, 'webapp_examination_detail');
        $this->loader->add_shortcode('aec_donation_list', $plugin_shortcodes, 'webapp_donation_list');
        $this->loader->add_shortcode('aec_donation_form_free', $plugin_shortcodes, 'webapp_donation_form_free');
        $this->loader->add_shortcode('aec_courses_catalog', $plugin_shortcodes, 'webapp_courses_catalog');
        $this->loader->add_shortcode('aec_courses_selection_tiles', $plugin_shortcodes, 'webapp_courses_selection_tiles');
        $this->loader->add_shortcode('aec_courses_wizard', $plugin_shortcodes, 'webapp_courses_wizard');
        $this->loader->add_shortcode('aec_newsletter', $plugin_shortcodes, 'webapp_newsletter');
        $this->loader->add_shortcode('aec_unsubscribe_newsletter', $plugin_shortcodes, 'webapp_unsubscribe_newsletter');
		$this->loader->add_shortcode('aec_private_tuition_form', $plugin_shortcodes, 'webapp_private_tuition_form');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * Returns a setting or null if doesn't exist.
     *
     * @param string $name The setting name.
     * @return    mixed
     * @since    1.0.0
     *
     */
    public function get_setting($name)
    {
        return isset($this->settings[$name]) ? $this->settings[$name] : null;
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     * @since     1.0.0
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     * @since     1.0.0
     */
    public function get_version()
    {
        return $this->version;
    }

    /**
     * Retrieve the current locale.
     *
     * @return    string    The current locale.
     * @since     1.0.0
     */
    public function get_locale()
    {
        if (function_exists('pll_current_language')) {
            $current_lang = pll_current_language('locale');
        } else if (has_filter('wpml_permalink')) {
			$lang_details = apply_filters( 'wpml_post_language_details', [] );
			$has_valid_locale = !is_wp_error( $lang_details ) && isset( $lang_details['locale'] );
			$current_lang = $has_valid_locale ? $lang_details['locale'] : apply_filters( 'wpml_current_language', get_locale() );
        } else {
            $current_lang = get_locale();
        }

        return Language_List_Aec::get_equivalent_language_code($current_lang);
    }

    /**
     * Retrieve the client instance name.
     *
     * @return    string    The client instance name.
     * @since     1.0.0
     */
    public function get_client_instance()
    {
        return trim(get_option('aec_instance_name'));
    }

    public function is_local_client_instance(): bool
    {
        return $this->get_client_instance() === 'local';
    }

    public function is_client_instance_version_allowed(string $required_version): bool
    {
        return $this->is_local_client_instance()
            || in_array(AEC_CLIENT_INSTANCE_VERSION, ['review', 'master', 'evolution'])
            || version_compare(AEC_CLIENT_INSTANCE_VERSION, $required_version, '>=');
    }

    /**
     * Retrieve the client extranet instance name.
     *
     * @return    string    The client instance name.
     * @since     1.2.1
     */
    public function get_client_extranet_instance()
    {
        return trim(get_option('aec_extranet_instance_name'));
    }


    /**
     * Retrieve the client instance name.
     *
     * @return    string    The client instance name.
     * @since     1.0.0
     */
    public function get_client_extranet_url()
    {
        $extranet_instance = $this->get_client_extranet_instance();
        $client_instance = strlen($extranet_instance) ? $extranet_instance : $this->get_client_instance();
        $client_domain = get_option('web_instance_domain');
        $client_domain = $client_domain ?: "extranet-aec.com";
        return $client_instance === 'local' ? AEC_LOCAL_EXTRANET_URL : "https://{$client_instance}.{$client_domain}";
    }


    /**
     * Retrieve the client instance url.
     *
     * @return    string    The client instance url.
     * @since     1.0.0
     */
    public function get_client_instance_url(): string
    {
        return $this->is_local_client_instance() ? AEC_LOCAL_APP_URL : "https://{$this->get_client_instance()}.aec-app.com";
    }

    public function get_client_instance_build_url(): string
    {
        return $this->is_local_client_instance() ? '' : "https://{$this->get_client_instance()}.aec.app/gui/build.txt";
    }

    /**
     * Retrieve the wordpress url.
     *
     * @return    string    The wordpress url.
     * @since     1.0.0
     */
    public function get_wordpress_url()
    {
        return AEC_LOAD_LOCAL_FILES ? '/' : '';
    }

    /**
     * @return string
     */
    public function get_aec_api_url()
    {
        $client_instance = $this->get_client_instance();
        return $client_instance === 'local' ? AEC_LOCAL_APP_URL . "/api/" : "https://{$client_instance}.aec-app.com/arc-en-ciel/api/";
    }

    /**
     * Translate string.
     *
     * @param string $string The string to translate.
     * @return    string    Translate string.
     * @since     1.0.3
     */
    public function t(string $string): ?string
    {
        $translated = __($string, 'aec');

        if ($translated === $string) {
            $default_translated = $this->default_translation($string);
            if ($default_translated !== $string) {
                $translated = $default_translated;
            }
        }

        return $translated;
    }

    private function default_translation($string): ?string
    {
        $currentLocale = get_locale();
        $originalLocale = $currentLocale;
        $targetLocale = 'en_US';

        if (strpos($currentLocale, 'fr') === 0) {
            $targetLocale = 'fr_FR';
        } elseif (strpos($currentLocale, 'es') === 0) {
            $targetLocale = 'es_ES';
        }

        switch_to_locale($targetLocale);
        $translated = __($string, 'aec');
        switch_to_locale($originalLocale);

        return $translated;
    }

    public function get_extranet_url()
    {
        if (is_page()) {
            global $wp_query;
            $extranet_url = 'https://' . get_post_meta($wp_query->post->ID, 'arc_extranet_domain', true);
            if ($extranet_url === 'https://') {
                $extranet_url = AEC()->get_setting('extranet_url');
            }
        } else {
            $extranet_url = AEC()->get_setting('extranet_url');
        }

        return $extranet_url;
    }

    public function plugin_error_message()
    {
        $screen = get_current_screen();
        if ($screen->id !== 'plugins') {
            return;
        }

        if (version_compare(get_bloginfo('version'), '6.3', '>=') && version_compare(AEC_VERSION, '1.6.6', '<')) {
            $message = __('Your current version of the plugin may have some issues with WordPress 6.3 or higher. Please update the plugin to the latest version to fix these issues.', 'aec');

            echo '<tr class="plugin-update-tr active" data-slug="aec-kiosque" data-plugin="aec-kiosque/aec.php"><td colspan="3" class="plugin-update colspanchange"><div class="update-message notice inline notice-error notice-alt"><p>' . $message . '</p></div></td></tr>';
        }
    }

    public function get_kiosque_component_loader(): \KiosqueComponent\KiosqueComponent
    {
        $kiosqueElementType = get_option('kiosque_builder_load_kiosque_aec_build') === 'on' ? 'ngx' : 'div';
        return KiosqueComponentLoader::getComponentLoader($kiosqueElementType);
    }

    public function get_styles_prefix(): string
    {
        if (get_option('aec_load_kiosque_aec_build') !== 'on') {
            return '.css';
        } else {
            return '.min.css';
        }
    }
}
