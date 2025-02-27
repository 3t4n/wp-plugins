<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://callpage.io
 * @since      1.0.0
 *
 * @package    Callpage_Widget
 * @subpackage Callpage_Widget/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Callpage_Widget
 * @subpackage Callpage_Widget/public
 * @author     Callpage <contact@callpage.io>
 */
class Callpage_Widget_Public
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
     * Anchor for plugin version of widget.
     *
     * @since    1.0.1.5
     * @access   private
     * @var      string $wordpress_anchor Anchor for plugin version of widget.
     */
    private $wordpress_anchor = '<!-- WPPLUGIN -->';

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
        $this->callpage_options = get_option($this->plugin_name);
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
         * defined in Callpage_Widget_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Callpage_Widget_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/callpage-widget-public.css', array(), $this->version, 'all');

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
         * defined in Callpage_Widget_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Callpage_Widget_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/callpage-widget-public.js', array('jquery'), $this->version, false);

    }

    public function init_callpage_injection()
    {
        if ($this->callpage_options) {
            // If CallPage widget is enabled
            if ($this->callpage_options['active_callpage']) {
                // If user sets CallPage code
                if ($this->callpage_options['code_callpage']) {
                    // If show_callpage_logged_users is true, show widget to everybody
                    if ($this->callpage_options['show_callpage_logged_users']) {
                        add_action('wp_footer', array($this, 'inject_callpage'), 10);
                    } else {
                        // If show_callpage_logged_users is false, don't show widget to logged in users
                        if (!is_user_logged_in()) {
                            add_action('wp_footer', array($this, 'inject_callpage'), 10);
                        }
                    }
                }
            }
        }
    }

    public function inject_callpage()
    {
        echo $this->callpage_options['code_callpage'] . $this->wordpress_anchor;
    }

}
