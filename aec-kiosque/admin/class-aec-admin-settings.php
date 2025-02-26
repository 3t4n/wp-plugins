<?php

/**
 * The settings of the plugin.
 *
 * @link       https://atl-software.net/
 * @since      1.0.0
 *
 * @package    Aec
 * @subpackage Aec/admin
 */

/**
 * Class Aec_Admin_Settings
 */
class Aec_Admin_Settings
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
	public function __construct( $plugin_name, $version )
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add plugin menu and pages.
	 *
	 * @since     1.0.0
	 */
    public function setup_plugin_options_menu()
    {
        $this->add_plugin_menu_items();
        add_action('admin_init', [$this, 'update_menu_item_titles']);
    }
    public function add_plugin_menu_items()
    {
        add_menu_page( 'AEC', 'AEC', false, 'aec-admin', false, AEC_URL . '/admin/img/icon-aec.svg', 70 );
        add_submenu_page( 'aec-admin', 'aec_section_name_settings' , 'aec_section_name_settings' , 'manage_options', 'aec-settings', array( $this, 'render_settings_page_content' ) );
        add_submenu_page( 'aec-admin','aec_section_name_shortcode-generator' , 'aec_section_name_shortcode-generator' , 'manage_options', 'aec-shortcode-generator', array( $this, 'render_shortcode_generator_page_content' ) );
        add_submenu_page( 'aec-admin', 'aec_section_name_help_center' , 'aec_section_name_help_center' , 'manage_options', 'aec-help', array( $this, 'render_help_page_content' ) );
        add_submenu_page( false, 'AEC', false, 'manage_options', 'aec-setup', array( $this, 'render_setup_page_content' ) );
    }
    public function update_menu_item_titles()
    {
        global $submenu;

        $menuSlug = 'aec-admin';
        $menuItems = $submenu[$menuSlug];

        foreach ($menuItems as $index => $item) {
            $submenu[$menuSlug][$index][0] = AEC()->t($item[0]);
        }
    }

	/**
	 * Register plugin options.
	 *
	 * @since     1.0.0
	 */
	public function setup_plugin_admin_settings()
	{
        register_setting( 'aec-options', 'aec_load_kiosque_aec_build');
		register_setting( 'aec-options', 'aec_instance_name' );
		register_setting( 'aec-options', 'aec_extranet_instance_name' );
		register_setting( 'aec-options', 'aec_extranet_api_token' );
		register_setting( 'aec-options', 'aec_etablishment_type' );
		register_setting( 'aec-options', 'aec_css_folder_name' );
		register_setting( 'aec-options', 'siteurl' );
		register_setting( 'aec-options', 'home' );
	}

	/**
	 * Render settings page header.
	 *
	 * @param string $title
	 * @since     1.0.1
	 */
	public static function render_settings_page_header( $title )
	{
		require AEC_PATH . 'admin/partials/aec-admin-settings-header.php';
	}

	/**
	 * Add custom logo on admin main menu.
	 *
	 * @since     1.0.0
	 */

	public function render_settings_page_content()
	{
		require AEC_PATH . 'admin/partials/aec-admin-settings.php';
	}

	/**
	 * Render help page.
	 *
	 * @since     1.0.0
	 */
	public function render_help_page_content()
	{
		require AEC_PATH . 'admin/partials/aec-admin-help.php';
	}

	/**
	 * Render setup page.
	 *
	 * @since     1.0.2
	 */
	public function render_setup_page_content()
	{
		require AEC_PATH . 'admin/partials/aec-admin-setup.php';
	}

	/**
	 * Render shortcode generator page.
	 *
	 * @since     1.0.2
	 */
	public function render_shortcode_generator_page_content()
	{
		require AEC_PATH . 'admin/partials/aec-admin-shortcode-generator.php';
	}

	/**
	 * Prevent user access to plugin pages if setup is not completed.
	 *
	 * @since     1.0.2
	 */
	public function setup_guard()
	{
		$current_view = get_current_screen();
		$protected_bases = [ 'aec_page_aec-settings', 'aec_page_aec-help' ];
		$protected_view = in_array( $current_view->base ? $current_view->base : '', $protected_bases );

		if( $protected_view && !$this->is_setup_completed() )
		{
			wp_redirect( admin_url( 'admin.php?page=aec-setup' ) );
			exit;
		}
		else if( $this->is_setup_completed() && ( $current_view->base ? $current_view->base : '' ) === 'aec_page_aec-setup' )
		{
			wp_redirect( admin_url( 'admin.php?page=aec-settings' ) );
			exit;
		}
	}

	/**
	 * Check if plugin setup has already been completed.
	 *
	 * @since     1.0.2
	 */
	private function is_setup_completed()
	{
		$setup_completed = get_option( 'aec_extranet_api_token' );
		return $setup_completed !== "";
	}

}
