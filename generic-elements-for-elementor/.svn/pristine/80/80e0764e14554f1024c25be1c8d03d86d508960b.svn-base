<?php

/**
 * Plugin Name:                 Generic Elements For Elementor
 * Plugin URI:                  https://generic-elements.bdevs.net/
 * Description:                 The ultimate Elementor Addons
 * Version:                     1.2.3
 * Author:                      bdevs
 * Requires at least:           5.8
 * Elementor tested up to:      3.18.0
 * Elementor Pro tested up to:  3.7.3
 * Author URI:                  https://generic-elements.bdevs.net/
 * License:                     GPL v2 or later
 * License URI:                 https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:                 generic-elements
 * Domain Path:                 /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

//Require autoload files
require_once __DIR__ . '/vendor/autoload.php';


function generic_elements_render_icon($settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = [])
{
    // Check if its already migrated
    $migrated = isset($settings['__fa4_migrated'][$new_icon_id]);
    // Check if its a new widget without previously selected icon using the old Icon control
    $is_new = empty($settings[$old_icon_id]);

    $attributes['aria-hidden'] = 'true';

    \Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
}

/**
 * Base_Plugin class
 *
 * The class that holds the entire Generic_Elements plugin
 */
final class Generic_Elements
{
    /**
     * Plugin version
     *
     * @var string
     */
    public $version = '1.2.3';

    /**
     * Plugin name
     *
     * @var string
     */
    public $plugin_name = 'Generic Elements For Elementor';

    private $_page_id = null;

    /**
     * Constructor for the Base_Plugin class
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     */
    public function __construct()
    {
        $this->define_constants();
        add_action('plugins_loaded', [$this, 'init_classes']);
        add_action('init', [$this, 'i18n']);
    }

    /**
     * Define the constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('GENERIC_ELEMENTS_VERSION', $this->version);
        define('GENERIC_ELEMENTS_FILE', __FILE__);
        define('GENERIC_ELEMENTS_PATH', __DIR__);
        define('GENERIC_ELEMENTS_INCLUDES', GENERIC_ELEMENTS_PATH . '/includes');
        define('GENERIC_ELEMENTS_TEMPLATES', GENERIC_ELEMENTS_PATH . '/admin/templates');
        define('GENERIC_ELEMENTS_URL', plugins_url('', GENERIC_ELEMENTS_FILE));
        define('GENERIC_ELEMENTS_ASSETS', GENERIC_ELEMENTS_URL . '/assets');
        define('GENERIC_ELEMENTS_ADMIN_ASSETS', GENERIC_ELEMENTS_URL . '/admin/assets');
        define('GENERIC_ELEMENTS_MINIMUM_ELEMENTOR_VERSION', '2.0.0');
        define('GENERIC_ELEMENTS_MINIMUM_PHP_VERSION', '5.5');
    }

    /**
     * Instantiate the required classes
     *
     * @return void
     */
    public function init_classes()
    {
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'generic_elements_installation_notice']);
            return;
        }

        require_once GENERIC_ELEMENTS_PATH . '/includes/HelperFunction.php';
        require_once GENERIC_ELEMENTS_PATH . '/admin/classes/Admin.php';
        require_once GENERIC_ELEMENTS_PATH . '/admin/classes/AdminMetabox.php';
        require_once GENERIC_ELEMENTS_PATH . '/admin/classes/Helper.php';
        require_once GENERIC_ELEMENTS_PATH . '/admin/classes/PostType.php';
        require_once GENERIC_ELEMENTS_PATH . '/admin/classes/MetaFields.php';
        require_once GENERIC_ELEMENTS_PATH . '/admin/classes/TemplateGenerator.php';
        require_once GENERIC_ELEMENTS_PATH . '/themes/templates/generic-el-template.php';

        $plugin_admin = new Generic\Elements\Admin($this->get_plugin_name(), $this->get_version());
        $plugin_admin->meta = new Generic\Elements\AdminMetabox();

        Generic\Elements\PostType::instance();

        $notice = new Generic\Elements\Notices();
        $notice->run();

        $reg_cat = new Generic\Elements\RegisterCategory();
        $reg_cat->run();

        $assets = new Generic\Elements\Assets;
        $assets->run();

        new Generic\Elements\TemplateGenerator();

        add_action('admin_init', array($plugin_admin, 'generic_el_options'));
        add_action('admin_menu', array($plugin_admin, 'generic_el_menu_page'));


        add_action('save_post_generic_el_template', array($plugin_admin->meta, 'save_metabox'));

        add_filter('generec_el_custom_post_types', array($this, 'generic_el_post_types'));

        add_action('add_meta_boxes', array($plugin_admin->meta, 'add_meta_boxes'), 10, 2);

        add_action('admin_enqueue_scripts', array($plugin_admin, 'enqueue_styles'));
        add_action('admin_enqueue_scripts', array($plugin_admin, 'enqueue_scripts'));

        //checked generic elements template in elementor setting
        update_option('elementor_disable_color_schemes', 'yes');
        update_option('elementor_disable_typography_schemes', 'yes');
        $bdevs_cpt = get_option('elementor_cpt_support') ? get_option('elementor_cpt_support') : array();
        $bdevs_cpt = array_merge($bdevs_cpt, array('post', 'page', 'generic_el_template'));
        update_option('elementor_cpt_support', $bdevs_cpt);

        // plugin default active setting
        $bootstrap_option = get_option('generic_bootstrap_option');
        if (!$bootstrap_option) {
            update_option('generic_bootstrap_option', 'inactive');
        }
        $fontawesome_option = get_option('generic_fontawesome_option');
        if (!$fontawesome_option) {
            update_option('generic_fontawesome_option', 'inactive');
        }
        $magnific_option = get_option('generic_magnific_popup_option');
        if (!$magnific_option) {
            update_option('generic_magnific_popup_option', 'inactive');
        }
        $odometer_option = get_option('generic_odometer_option');
        if (!$odometer_option) {
            update_option('generic_odometer_option', 'inactive');
        }
        $appear_option = get_option('generic_appear_option');
        if (!$appear_option) {
            update_option('generic_appear_option', 'inactive');
        }
        $waypoints_option = get_option('generic_waypoints_option');
        if (!$waypoints_option) {
            update_option('generic_waypoints_option', 'inactive');
        }
        $animate_option = get_option('generic_animate_option');
        if (!$animate_option) {
            update_option('generic_animate_option', 'inactive');
        }
        $wow_option = get_option('generic_wow_option');
        if (!$wow_option) {
            update_option('generic_wow_option', 'inactive');
        }
        $swiper_option = get_option('generic_swiper_option');
        if (!$swiper_option) {
            update_option('generic_swiper_option', 'inactive');
        }
        $meanmenu_option = get_option('generic_meanmenu_option');
        if (!$meanmenu_option) {
            update_option('generic_meanmenu_option', 'active');
        }
    }


    /**
     * Show Admin Notice If Generic Elements plugin Not installed.
     *
     * @since 1.0.0
     *
     * @param null
     *
     * @return void
     */

    public function generic_elements_installation_notice()
    {
        $screen = get_current_screen();
        if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
            return;
        }

        $plugin = 'elementor/elementor.php';

        if (Generic\Elements\Helper::is_elementor_installed()) {
            if (!current_user_can('activate_plugins')) {
                return;
            }

            $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);

            $message = '<p>' . __('Generic Elements Plugin is not working because you need to activate the Elementor plugin.', 'generic-elements') . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Elementor Now', 'generic-elements')) . '</p>';
        } else {
            if (!current_user_can('install_plugins')) {
                return;
            }

            $install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');

            $message = '<p>' . __('Generic Elements Plugin is not working because you need to install the Elementor plugin', 'generic-elements') . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Elementor Now', 'generic-elements')) . '</p>';
        }

        echo '<div class="error"><p>' . $message . '</p></div>';
    }


    /**
     * Load The Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function i18n()
    {
        // Load textdomain
        load_plugin_textdomain('generic-elements', false, basename(dirname(__FILE__)) . '/languages/');
    }

    public function generic_el_post_types()
    {
        return array(
            'generic_el_template' => array('title' => 'Generic Elements', 'plural_title' => 'Generic Elements', 'rewrite' => 'elementor-template', 'menu_icon' => 'dashicons-awards')
        );
    }

    public function get_version()
    {
        return $this->version;
    }

    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    public function get_generic_element_page_id2()
    {
        return get_the_ID();
    }

    /**
     * Initializes the Generic_Elements class
     *
     * Checks for an existing Generic_Elements() instance
     * and if it doesn't find one, creates it.
     */

    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new Generic_Elements();
        }

        return $instance;
    }
}

$generic = Generic_Elements::init();
