<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://atl-software.net/
 * @since      1.0.0
 *
 * @package    Aec
 * @subpackage Aec/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Aec
 * @subpackage Aec/admin
 * @author     ATL Software <support@atl-software.net>
 */
class Aec_Admin
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
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        $this->load_dependencies();

    }

    /**
     * Load the required dependencies for the Admin facing functionality.
     *
     * Include the following files that make up the plugin:
     *
     * - Aec_Admin_Settings. Registers the admin settings and page.
     *
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once AEC_PATH . 'admin/class-aec-admin-settings.php';

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
         * defined in Aec_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Aec_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/aec-admin.css', array(), $this->version, 'all');

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
         * defined in Aec_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Aec_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/aec-admin.js', array('jquery'), $this->version, false);

        if (is_plugin_active('elementor/elementor.php')
            && (isset($_GET['action']) && $_GET['action'] === 'elementor')) {
            wp_enqueue_script('aec-webapp', esc_url(AEC()->get_setting('extranet_url') . '/js/aec-webapp.js'), ['jquery'], false, true);
        }

        $data = array(
            'aec_course_detail_page_url' => get_option('aec_course_detail_page_url'),
            'aec_load_kiosque_aec_build' => get_option('aec_load_kiosque_aec_build')
        );

        wp_localize_script($this->plugin_name, 'aec_options', $data);

    }

    /**
     * Add custom styles in editor.
     *
     * @since     1.0.0
     */
    public function add_styles_in_editor()
    {
        $extranet_url = AEC()->get_setting('extranet_url');
        $aec_folder_name = get_option('aec_css_folder_name', AEC()->get_setting('client_instance'));
        $prefix = AEC()->get_styles_prefix();
        add_editor_style($extranet_url . '/css/aec.generic' . $prefix);
        add_editor_style($extranet_url . '/css/webapp-' . get_option('aec_etablishment_type') . $prefix);
        if (!empty($aec_folder_name)) {
            add_editor_style($extranet_url . '/css/' . $aec_folder_name . '/' . $aec_folder_name . $prefix);
        }
    }

}
