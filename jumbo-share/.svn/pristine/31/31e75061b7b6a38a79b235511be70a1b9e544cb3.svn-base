<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.wpmaniax.com
 * @since      1.0.0
 *
 * @package    Jumbo_Share
 * @subpackage Jumbo_Share/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jumbo_Share
 * @subpackage Jumbo_Share/admin
 * @author     WP Maniax <plugins@wpmaniax.com>
 */
class Jumbo_Share_Admin
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
         * defined in Jumbo_Share_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Jumbo_Share_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/jumbo-share-admin.css', array(), $this->version, 'all');

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
         * defined in Jumbo_Share_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Jumbo_Share_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/jumbo-share-admin.js', array('jquery'), $this->version, false);
        wp_localize_script($this->plugin_name, 'jumbo_share', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
        //wp_enqueue_script( array("jquery", "jquery-ui-core", "interface", "jquery-ui-sortable", "wp-lists", "jquery-ui-sortable") );
    }

    public function init_settings()
    {

        $this->wpsf->add_settings_page(array(
            'parent_slug' => 'options-general.php',
            'page_title' => __('Jumbo Share'),
            'menu_title' => __('Jumbo Share')
        ));

    }

    public function jumbo_share_purge_cache()
    {
        global $wpdb;
        $sql = 'DELETE FROM '.$wpdb->options.' WHERE `option_name` LIKE ("_transient_jumbo_share_%")';
        $wpdb->query($sql);
        $sql = 'DELETE FROM '.$wpdb->options.' WHERE `option_name` LIKE ("_transient_timeout_jumbo_share_%")';
        $wpdb->query($sql);
        echo "OK";
        wp_die();
    }
}
