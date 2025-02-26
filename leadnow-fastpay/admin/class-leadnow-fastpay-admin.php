<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.leadnow.pl
 * @since      1.0.0
 *
 * @package    Leadnow_Fastpay
 * @subpackage Leadnow_Fastpay/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Leadnow_Fastpay
 * @subpackage Leadnow_Fastpay/admin
 * @author     Leadnow.pl <tech@leadnow.pl>
 */
class Leadnow_Fastpay_Admin
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
     * @since    1.0.0
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/leadnow-fastpay-admin.css', array(),
            $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/leadnow-fastpay-admin.js', array('jquery'),
            $this->version, false);

    }

    public function register_hooks()
    {
        add_filter('mce_buttons', array($this, 'shortcode_button'));
        add_filter('mce_external_plugins', array($this, 'tinymce_plugin'));

    }

    public function tinymce_plugin($plugins)
    {
        $plugins['widget_shortcode'] = plugin_dir_url(__FILE__) . 'js/leadnow-fastpay-admin.js';
        return $plugins;
    }

    public function shortcode_button($buttons)
    {
        array_push($buttons, 'widget_shortcode');
        return $buttons;
    }

}
