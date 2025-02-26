<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions
 * used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://refact.co
 * @since      1.0.0
 *
 * @package    ACFG
 * @subpackage ACFG/includes
 */

namespace Refact\ACFG;

use Refact\ACFG\ACFG_Loader;
use Refact\ACFG\ACFG_I18n;
use Refact\ACFG\ACFG_Admin;

if ( ! defined( 'ABSPATH' ) ) exit;

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
 * @package    ACFG
 * @subpackage ACFG/includes
 * @author     Refact <info@refact.co>
 */
class ACFG
{

    /**
     * The loader that's responsible for
     * maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Object $loader Maintains & registers all hooks
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $acfg Uniquely identify this plugin.
     */
    protected $acfg;

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
     * Set the plugin name and the plugin version
     * that can be used throughout the plugin.
     * Load the dependencies, define the locale,
     * and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        if ( defined( 'ACFG_VERSION' ) ) {
            $this->version = ACFG_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->acfg = 'acfg';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - ACFG_Loader. Orchestrates the hooks of the plugin.
     * - ACFG_I18n. Defines internationalization functionality.
     * - ACFG_Admin. Defines all hooks for the admin area.
     * - ACFGPublic. Defines all hooks for the public side
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating
         * the actions and filters of the
         * core plugin.
         */
        require_once ACFG_PATH
                    . 'includes/class-acfg-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once ACFG_PATH
                    . 'includes/class-acfg-i18n.php';

        /**
         * The class responsible for defining all actions
         * that occur in the admin area.
         */
        require_once ACFG_PATH
                    . 'admin/class-acfg-admin.php';

        /**
         * Load global functions
         */
        require_once ACFG_PATH
                    . 'includes/functions.php';

        $this->loader = new ACFG_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the ACFG_I18n class in order to
     * set the domain and to register the hook with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale()
    {

        $plugin_i18n = new ACFG_I18n();

        $this->loader->add_action(
            'plugins_loaded',
            $plugin_i18n,
            'load_plugin_textdomain'
        );
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

        $plugin_admin = new ACFG_Admin(
            $this->get_acfg(),
            $this->get_version()
        );

        $this->loader->add_action(
            'admin_enqueue_scripts',
            $plugin_admin,
            'enqueue_styles'
        );
        $this->loader->add_action(
            'admin_enqueue_scripts',
            $plugin_admin,
            'enqueue_scripts'
        );

        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_admin_menu' );
        $this->loader->add_filter( 'parent_file', $plugin_admin, 'fix_admin_menu_current' );

        $this->loader->add_action( 'rest_api_init', $plugin_admin, 'register_rest_routes' );

        /**
         * Disable/Enable blocks.
         */
        $this->loader->add_filter(
            'allowed_block_types_all',
            $plugin_admin,
            'allowed_block_types',
            999,
            2
        );
        /**
         * Disable/Enable block support.
         */
        $this->loader->add_filter(
            'block_type_metadata',
            $plugin_admin,
            'disallowed_block_support',
            999,
            2
        );

        /**
         * Block Hooks
         */
        $this->loader->add_action(
            'admin_enqueue_scripts',
            \Refact\ACFG\Blocks\Blocks::class,
            'register_all_blocks',
            999
        );
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
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_acfg()
    {
        return $this->acfg;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    ACFG_Loader    Orchestrates the hooks
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }
}
