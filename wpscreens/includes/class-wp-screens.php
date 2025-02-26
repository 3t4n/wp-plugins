<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       whitelabelcoders.com
 * @since      1.0.0
 *
 * @package    Wp_Screens
 * @subpackage Wp_Screens/includes
 */

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
 * @package    Wp_Screens
 * @subpackage Wp_Screens/includes
 * @author     WLC <pfober@whitelabelcoders.com>
 */
class Wpscrn_Wp_Screens {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Wp_Screens_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {
        if (defined('wpscrn_Wp_Screens_VERSION')) {
            $this->version = WPSCRN_Wp_Screens_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'wp-screens';

        $this->wpscrn_load_dependencies();
        $this->wpscrn_set_locale();
        $this->wpscrn_define_admin_hooks();
        $this->wpscrn_define_public_hooks();
        $this->wpscrn_define_public_split_hooks();
        add_filter( 'woocommerce_payment_complete_order_status', array($this,'wpscrn_wc_payment_complete_increaselimit'), 10, 3);
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Wp_Screens_Loader. Orchestrates the hooks of the plugin.
     * - Wp_Screens_i18n. Defines internationalization functionality.
     * - Wp_Screens_Admin. Defines all hooks for the admin area.
     * - Wp_Screens_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    public function wpscrn_wc_payment_complete_increaselimit($status, $order_id, $order)
    {
        $order = wc_get_order( $order_id );
        $current_id = $order->get_customer_id(); 
        $order_items = $order->get_items();
        $wp_screens=0;
        foreach ($order_items as $item_id => $item) {
            $variation_id  = $item->get_variation_id();
            $pa_quantity   = get_post_meta($variation_id, 'attribute_pa_screen-limits', true);
            $item_quantity  = $item->get_quantity(); 
            $wp_screens+= ($item_quantity*$pa_quantity); 
        }
        
        $getExtrascreen=get_user_meta($current_id,'wpscreen_custom_define',true);
        $getExtrascreens=0;
        if(is_numeric($getExtrascreen))
        $getExtrascreens=$getExtrascreen;
        update_user_meta($current_id,'wpscreen_custom_define',($getExtrascreens+$wp_screens));
    }
    private function wpscrn_load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-wp-screens-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-wp-screens-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-wp-screens-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-wp-screens-public.php';
        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-wp-split-screens-public.php';

        $this->loader = new Wpscrn_Wp_Screens_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Wp_Screens_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function wpscrn_set_locale() {

        $plugin_i18n = new Wpscrn_Wp_Screens_I18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'wpscrn_load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function wpscrn_define_admin_hooks() {
        $plugin_admin = new Wpscrn_Wp_Screens_Admin($this->get_plugin_name(), $this->wpscrn_get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'wpscrn_enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'wpscrn_enqueue_scripts');

        $this->loader->add_action('add_meta_boxes', $plugin_admin, 'wpscrn_add_custom_meta_box');

        $this->loader->add_action('save_post', $plugin_admin, 'wpscrn_save_custom_meta_box');

        $this->loader->add_action('init', $plugin_admin, 'wpscrn_cpt_displays');
        $this->loader->add_action('admin_menu', $plugin_admin, 'wpscrn_wpscreens_register_options_page');
        $this->loader->add_action('admin_init', $plugin_admin, 'wpscrn_wpscreens_register_settings');
        $this->loader->add_action('admin_init', $plugin_admin, 'wpscrn_check_wpscreens_licence');
        $this->loader->add_action('admin_init', $plugin_admin, 'wpscrn_check_wpscreens_licence_addon');
        $this->loader->add_action('add_option_wpscreens_licence', $plugin_admin, 'wpscrn_verify_wpscreens_licence2',10, 2);
        $this->loader->add_action('update_option_wpscreen_addon_licence', $plugin_admin, 'wpscrn_verify_wpscreens_licence_addon',10, 2);
        $this->loader->add_action('add_option_wpscreen_addon_licence', $plugin_admin, 'wpscrn_verify_wpscreens_licence_addon_add',10, 2);
        $this->loader->add_action('update_option_wpscreens_licence', $plugin_admin, 'wpscrn_verify_wpscreens_licence', 10, 2);
        //$this->loader->add_action('load-post-new.php', $plugin_admin, 'wpscrn_limit_wpscreens',10,3);
        //$this->loader->add_action('wp_insert_post', $plugin_admin, 'wpscrn_limit_wpscreens',10,3);
        
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function wpscrn_define_public_hooks() {

        $plugin_public = new Wpscrn_Wp_Screens_Public($this->get_plugin_name(), $this->wpscrn_get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'wpscrn_enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'wpscrn_enqueue_scripts');

        $this->loader->add_action('wp_footer', $plugin_public, 'wpscrn_wp_screens_by_id');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function wpscrn_define_public_split_hooks() {

        $plugin_public = new Wpscrn_Wp_Split_Screens_Public($this->get_plugin_name(), $this->wpscrn_get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'wpscrn_split_enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'wpscrn_split_enqueue_scripts');
        $this->loader->add_action('wp_footer', $plugin_public, 'wpscrn_wp_split_screens_by_id');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->wpscrn_run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Wp_Screens_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function wpscrn_get_version() {
        return $this->version;
    }

}
