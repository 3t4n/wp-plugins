<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       sina-abadi-uri
 * @since      1.0.0
 *
 * @package    Cedar_Map
 * @subpackage Cedar_Map/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cedar_Map
 * @subpackage Cedar_Map/public
 * @author     Sina <sina_abadi@hotmail.com>
 */
class Cedar_Map_Public
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

    private $options;

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
        $this->options = get_option($this->plugin_name);


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
         * defined in Cedar_Map_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Cedar_Map_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name . '-api', 'https://api.cedarmaps.com/cedarmaps.js/v1.8.1/cedarmaps.css', array(), $this->version, 'all');
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/cedar-map-public.css', array(), $this->version, 'all');

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
         * defined in Cedar_Map_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Cedar_Map_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/cedar-map-public.js', array('jquery'), $this->version, false);
        wp_localize_script($this->plugin_name, 'cedarmaps_options', $this->options);
    }

    public function check_post_to_include_map($content)
    {
        if (preg_match('/[include_cedar_map]/', $content)) {
            $content = str_replace('[include_cedar_map]', '<div id="cedar_map_plugin"></div>', $content);
        }
        return $content;
    }

}
