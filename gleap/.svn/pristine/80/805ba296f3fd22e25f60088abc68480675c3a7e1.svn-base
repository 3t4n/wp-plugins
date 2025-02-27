<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://gleap.io
 * @since      1.0.0
 *
 * @package    Gleap
 * @subpackage Gleap/admin
 */
class Gleap_Admin
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
     * - Carbon
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
        //require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/class-gleap-settings.php';

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
         * defined in Gleap_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Gleap_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/gleap-admin.css', array(), $this->version, 'all');
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
         * defined in Gleap_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Gleap_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/gleap-admin.js', array('jquery'), $this->version, false);
    }

    public function setup_settings_ui()
    {
        // Get WordPress roles
        $wp_roles = wp_roles();
        $roles = array();
        foreach ($wp_roles->roles as $role => $details) {
            $roles[$role] = translate_user_role($details['name']);
        }


        $gleap_fields = array(
            Field::make('text', 'gleap_token', 'API key')->set_required(true)->set_help_text("Get your free API key within the <a href=\"https://app.gleap.io/\">Gleap Dashboard.</a>"),
            Field::make('text', 'gleap_identity_token', 'Identity verification secret')->set_attribute('type', 'password')->set_help_text("If you'd like to verify the identity of your users, copy the code from Project -> Settings -> Security to the field above."),
            Field::make('text', 'gleap_secret_api_token', 'Secret API token')->set_attribute('type', 'password')->set_help_text("If you'd like to use the Gleap Rest API to send events, copy the code from Project -> Settings -> Security to the field above."),
            Field::make('checkbox', 'gleap_selected_roles_only', 'Enable Gleap only for the selected WP roles')
                ->set_default_value(false)
                ->set_help_text('Gleap widget will only be visible for users with the selected roles. If no roles are selected, it will be visible to all users.'),
            Field::make('multiselect', 'gleap_selected_roles', 'Select roles')
                ->add_options($roles)
                ->set_conditional_logic(array(
                    array(
                        'field' => 'gleap_selected_roles_only',
                        'value' => true,
                        'compare' => '='
                    )
                ))
        );

        if (class_exists('SitePress')) {
            $gleap_fields[] = Field::make('checkbox', 'gleap_detect_wpml_lang', 'Detect language from wpml')
                ->set_default_value(false)
                ->set_help_text('Gleap widget will automatically detect the language from WPML. If this is not enabled, the language will be set to the user\'s browser language.');
        }

        Container::make('theme_options', __('Gleap'))
            ->set_page_parent('options-general.php')
            ->add_fields($gleap_fields);
    }

    public function crb_load()
    {
        \Carbon_Fields\Carbon_Fields::boot();
    }
}
