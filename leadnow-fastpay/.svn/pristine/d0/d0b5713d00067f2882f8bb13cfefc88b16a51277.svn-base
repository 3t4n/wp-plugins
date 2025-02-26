<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.leadnow.pl
 * @since      1.0.0
 *
 * @package    Leadnow_Fastpay
 * @subpackage Leadnow_Fastpay/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Leadnow_Fastpay
 * @subpackage Leadnow_Fastpay/public
 * @author     Leadnow.pl <tech@leadnow.pl>
 */
class Leadnow_Fastpay_Public
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
     * @var int
     */
    private $instances = 1;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
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
         * defined in Leadnow_Fastpay_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Leadnow_Fastpay_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/leadnow-fastpay-public.css', array(),
            $this->version, 'all');

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
         * defined in Leadnow_Fastpay_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Leadnow_Fastpay_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/leadnow-fastpay-public.js',
            array('jquery'), $this->version, false);

    }

    public function register_hooks()
    {
        add_shortcode('widget', array($this, 'shortcode'));
        add_shortcode('leadnow_url', array($this, 'leadnow_register_url_shortcode'));
        add_shortcode('leadnow_video', array($this, 'leadnow_register_video_shortcode'));
    }

    /**
     * Funkcja pobiera aktualny skracacz pozwalający promować materiały w leadnow.pl
     *
     * @param $atts
     * @return string|void
     * @since 1.1
     */
    function leadnow_register_url_shortcode($atts)
    {
        if (empty($atts['href'])) {
            return;
        }

        $request = 'http://leadnow.pl/url/' . $atts['href'];

        return file_get_contents($request);
    }


    /**
     * Funkcja wstawia ramkę video dla programu pobierz123 video
     *
     * @param $attributes
     * @return string|void
     * @since 1.1
     */
    function leadnow_register_video_shortcode($attributes)
    {
        if (empty($attributes['id'])) {
            return;
        }

        $request = 'http://o5h.pl/embed/' . $attributes['id'];

        if (!empty($attributes['title'])) {
            $request .= '/' . $attributes['title'];
        }

        return $this->display('/partials/leadnow-fastpay-public-display.php', array(
            'iframeSrc' => $request,
        ));
    }


    /**
     * @param $attributes
     * @return string|void
     */
    public function shortcode($attributes)
    {
        if (empty($attributes['id'])) {
            return;
        }

        $url = sprintf('%s/%s', $this->getDomain(), $attributes['id']);

        $httpCode = $this->getHttpCode($url);

        if ($httpCode != 200) {
            return;
        }

        $systemParameters = array(
            'id' => null,
        );

        $query = http_build_query(array_diff_key($attributes, $systemParameters));

        return $this->display('/partials/leadnow-fastpay-public-display.php', array(
            'iframeSrc' => sprintf('%s/%s?%s', $this->getDomain(), $attributes['id'], $query),
            'termsSrc' => sprintf('%s/terms', $this->getDomain()),
            'id' => sprintf('wp_fastpay_%s', $this->instances++),
        ));
    }

    /**
     * @param $template
     * @param $attributes
     * @return string
     */
    private function display($template, $attributes)
    {
        extract($attributes);
        ob_start();
        include(dirname(__FILE__) . $template);

        return ob_get_clean();
    }

    /**
     * @param $url
     * @return mixed
     */
    private function getHttpCode($url)
    {
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_NOBODY, true);
        curl_exec($handle);

        return curl_getinfo($handle, CURLINFO_HTTP_CODE);
    }

    /**
     * @return string
     */
    private function getDomain()
    {
        return 'http://fastpay.pl';
    }
}
