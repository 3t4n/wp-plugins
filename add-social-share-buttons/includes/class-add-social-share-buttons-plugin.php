<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/includes
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
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/includes
 * @author     Multidots <inquiry@multidots.in>
 */
class Add_Social_Share_Buttons_Plugin {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Add_Social_Share_Buttons_Plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
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

        $this->plugin_name = 'add-social-share-buttons-plugin';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Add_Social_Share_Buttons_Plugin_Loader. Orchestrates the hooks of the plugin.
     * - Add_Social_Share_Buttons_Plugin_i18n. Defines internationalization functionality.
     * - Add_Social_Share_Buttons_Plugin_Admin. Defines all hooks for the admin area.
     * - Add_Social_Share_Buttons_Plugin_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-add-social-share-buttons-plugin-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-add-social-share-buttons-plugin-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-add-social-share-buttons-plugin-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-add-social-share-buttons-plugin-public.php';

        $this->loader = new Add_Social_Share_Buttons_Plugin_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Add_Social_Share_Buttons_Plugin_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new Add_Social_Share_Buttons_Plugin_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        $plugin_admin = new Add_Social_Share_Buttons_Plugin_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

        $this->loader->add_action('admin_menu', $plugin_admin, 'whatsapp_sharing_custom_menu');
        
        $this->loader->add_action('admin_post_submit-form', $plugin_admin, 'whatsapp_share_setting_add_update');
        $this->loader->add_action('admin_post_add-service-form', $plugin_admin, 'whatsapp_share_add_remove_services');
        $this->loader->add_action('admin_post_reorder-service-form', $plugin_admin, 'whatsapp_share_reorder_services');

        /*         * Welcome page hook* */
        $this->loader->add_action('admin_init', $plugin_admin, 'welcome_assb_screen_do_activation_redirect');
        $this->loader->add_action('admin_menu', $plugin_admin, 'welcome_pages_screen_assb');
        $this->loader->add_action('woocommerce_assb_about', $plugin_admin, 'woocommerce_assb_about');
        $this->loader->add_action('admin_menu', $plugin_admin, 'adjust_the_wp_menu_assb', 999);

        /*         * Custom pointer hook* */
        $this->loader->add_action('admin_print_footer_scripts', $plugin_admin, 'custom_assb_pointers_footer');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {
        global $wpdb, $wp, $post;

        $plugin_public = new Add_Social_Share_Buttons_Plugin_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            $this->loader->add_filter('woocommerce_paypal_args', $plugin_public, 'paypal_bn_code_filter_assb', 99, 1);
        }

        $this->loader->add_action('the_content', $plugin_public, 'insert_share_option_in_front_view', 99);

        $this->loader->add_action('wp_footer', $plugin_public, 'add_custom_whatsapp_share_styles', 100);

        $get_share_settings = get_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY);
        $get_share_settings = maybe_unserialize($get_share_settings);

        if (!empty($get_share_settings) && $get_share_settings != '') {

            if ($get_share_settings['share_posttype'] != '' && !empty($get_share_settings['share_posttype'])) {

                if (isset($get_share_settings['share_posttype']) && !empty($get_share_settings['share_posttype']) && is_array($get_share_settings['share_posttype'])) {
                    if (in_array('product', $get_share_settings['share_posttype'])) {

                        if ($get_share_settings['button_placement'] == 'bottom') {

                            $this->loader->add_action('woocommerce_after_add_to_cart_button', $plugin_public, 'add_shre_button_on_woocommerce_details_page', 8);
                        } elseif ($get_share_settings['button_placement'] == 'top') {

                            $this->loader->add_action('woocommerce_after_add_to_cart_button', $plugin_public, 'add_shre_button_on_woocommerce_details_page', 8);
                        } elseif ($get_share_settings['button_placement'] == 'topbottom') {

                            $this->loader->add_action('woocommerce_after_add_to_cart_button', $plugin_public, 'add_shre_button_on_woocommerce_details_page', 8);
                        }



                        if ($get_share_settings['include_pro_listing_page'] == '1') {

                            if ($get_share_settings['button_placement'] == 'bottom') {

                                $this->loader->add_action('woocommerce_after_shop_loop', $plugin_public, 'add_shre_button_on_woocommerce_details_page', 8);
                            } elseif ($get_share_settings['button_placement'] == 'top') {

                                $this->loader->add_action('woocommerce_before_shop_loop', $plugin_public, 'add_shre_button_on_woocommerce_details_page', 8);
                            } elseif ($get_share_settings['button_placement'] == 'topbottom') {

                                $this->loader->add_action('woocommerce_before_shop_loop', $plugin_public, 'add_shre_button_on_woocommerce_details_page', 8);
                                $this->loader->add_action('woocommerce_after_shop_loop', $plugin_public, 'add_shre_button_on_woocommerce_details_page', 8);
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
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
     * @return    Add_Social_Share_Buttons_Plugin_Loader    Orchestrates the hooks of the plugin.
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
    public function get_version() {
        return $this->version;
    }

}
