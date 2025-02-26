<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://atl-software.net/
 * @since      1.0.0
 *
 * @package    Aec
 * @subpackage Aec/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Aec
 * @subpackage Aec/public
 * @author     ATL Software <support@atl-software.net>
 */
class Aec_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Aec_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Aec_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/aec-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Aec_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Aec_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/aec-public.js', ['jquery'], $this->version, false);
        $data = [
            'aec_load_kiosque_aec_build' => get_option('aec_load_kiosque_aec_build'),
        ];

        wp_localize_script($this->plugin_name, 'aec_options', $data);
    }

    public function enqueue_extranet_footer()
    {
        if (get_option('aec_load_kiosque_aec_build') !== 'on' || is_admin()) {
            $this->load_webapp_aec();
        } else {
            $this->load_kiosque_aec();
        }
    }

    private function load_webapp_aec()
    {
        if (wp_get_environment_type() !== AEC_ENVIRONMENT_DEV) {
            wp_enqueue_script('aec-webapp', esc_url(AEC()->get_setting('extranet_url') . '/js/aec-webapp.js'), ['jquery'], false, ['in_footer' => true]);
        } else {
            wp_enqueue_script('aec-webapp-polyfills', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque/dist/polyfills.js'), [], false, ['in_footer' => true]);
            wp_enqueue_script('aec-webapp-runtime', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque/dist/runtime.js'), [], false, ['in_footer' => true]);
            wp_enqueue_script('aec-webapp-vendor', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque/dist/vendor.js'), [], false, ['in_footer' => true]);
            wp_enqueue_script('aec-webapp-main', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque/dist/main.js'), [], false, ['in_footer' => true]);
        }
    }

    private function load_kiosque_aec()
    {
        if (wp_get_environment_type() !== AEC_ENVIRONMENT_DEV) {
            wp_enqueue_script('kiosque-aec', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque-aec.js'), [], false, ['in_footer' => true]);
        } else {
            wp_enqueue_script('kiosque-aec-runtime', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque/kiosque-dist/runtime.js'), [], false, ['in_footer' => true]);
            wp_enqueue_script('kiosque-aec-polyfills', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque/kiosque-dist/kiosque-polyfills.js'), [], false, ['in_footer' => true]);
            wp_enqueue_script('kiosque-aec-vendor', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque/kiosque-dist/kiosque-vendor.js'), [], false, ['in_footer' => true]);
            wp_enqueue_script('kiosque-aec-main', esc_url(AEC()->get_setting('extranet_url') . '/js/kiosque/kiosque-dist/kiosque-main.js'), [], false, ['in_footer' => true]);
        }

    }

    public function add_defer_attribute(string $tag, string $handle): string
    {
        $scripts_to_defer = [
            'kiosque-aec',
            'aec-webapp'
        ];

        if (in_array($handle, $scripts_to_defer) && !strpos($tag, 'async') && !strpos($tag, 'defer')) {
            return str_replace(' src', ' defer src', $tag);
        }

        return $tag;
    }

    public function defer_style(string $tag, string $handle, string $href): string
    {
        $defer_style = [
            'webapp-if',
            'webapp-af',
            'webapp-aec',
            'jqueryui'
        ];

        if (in_array($handle, $defer_style)) {
            return '<link rel="preload" href="' . $href . '" as="style" id="' . $handle . '" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
        }

        return $tag;
    }

    /**
     * Adds scripts and styles into site header
     *
     * @since     1.0.0
     */
    public function enqueue_extranet_head()
    {
        echo "\n";
        wp_register_style('nodepcss-handle', false);
        wp_enqueue_style('nodepcss-handle');
        wp_add_inline_style('nodepcss-handle', $this->load_fonts());

        // Prefetch and Preload Critical CSS
        echo '<link rel="preload" href="' . esc_url(AEC()->get_setting('app_url') . '/arc-en-ciel/dist/extranet_custom_css.php') . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        echo '<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        echo '<link rel="preload" href="' . esc_url(AEC_URL . '/public/css/aec-public.css') . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';

        // Inline Scripts
        $inline_scripts = [
            'var root_directory = "' . esc_js(AEC()->get_setting('extranet_url')) . '/";',
            'var aecWordpressURL = "' . esc_js(AEC()->get_setting('wordpress_url')) . '";',
            'var aecExtranetURL = "' . esc_js(AEC::instance()->get_extranet_url()) . '/";',
            'var aec_app_url = "' . esc_js(AEC()->get_setting('app_url')) . '";',
            'var aecExtranetWebAppsAPIKey = "' . esc_js(get_option('aec_extranet_api_token')) . '";',
            'var templateInUse = "' . esc_js(get_option('aec_template_in_use')) . '";',
            'var currentLanguage = "' . esc_js(AEC::instance()->get_locale()) . '";',
            'var clientInstance = "' . esc_js(AEC::instance()->get_client_instance()) . '";',
            'var aecAppWPURL = "' . esc_js(AEC()->get_aec_api_url()) . '";',
            $this->set_session_language()
        ];

        foreach ($inline_scripts as $script) {
            wp_print_inline_script_tag($script);
        }

        $prefix = AEC()->get_styles_prefix();

        // Enqueue Conditional Styles
        wp_enqueue_style('webapp-' . get_option('aec_etablishment_type'), AEC()->get_setting('extranet_url') . '/css/webapp-' . AEC()->get_setting('establishment_type') . $prefix, [], null);

        if (is_rtl()) {
            wp_enqueue_style('webapp-rtl-' . get_option('aec_etablishment_type'), AEC()->get_setting('extranet_url') . '/css/rtl/aec' . $prefix, [], null);
        }

        wp_enqueue_style('jqueryui', AEC()->get_setting('extranet_url') . '/css/jqueryui' . $prefix, [], null);
    }


    /**
     * Set session language
     *
     * This key is used both in Extranet and WordPress for setting the webapp language
     *
     * @since     1.1.3
     */
    public function set_session_language(): string
    {
        $lang_to_set = AEC::instance()->get_locale();

        if (!$lang_to_set) {
            return '';
        }

        $escapedLang = esc_js($lang_to_set);
        return 'window.sessionStorage.setItem("langToSetFromWP", "' . $escapedLang . '");';
    }

    /**
     * Adds scripts and styles into site header
     *
     * @since     1.0.2
     */
    public function load_fonts(): string
    {
        if (!is_admin()) {
            return '';
        }
        return '
                @font-face {
                  font-family: FoundersGrotesk;
                  src: url(' . AEC_URL . '/admin/fonts/FoundersGroteskX-CondensedWeb-Semibold.eot' . ')
                      format("embedded-opentype"),
                    url(' . AEC_URL . '/admin/fonts/FoundersGroteskX-CondensedWeb-Semibold.woff' . ') format("woff"),
                    url(' . AEC_URL . '/admin/fonts/FoundersGroteskX-CondensedWeb-Semibold.woff2' . ') format("woff2");
                  font-weight: 500;
                }
            ';
    }
}
