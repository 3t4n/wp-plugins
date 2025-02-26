<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://hikeorders.com/accessibility_enabler/home/
 * @since      1.0.0
 *
 * @package    A11y_Enabler
 * @subpackage A11y_Enabler/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    A11y_Enabler
 * @subpackage A11y_Enabler/admin
 * @author     Your Name <email@example.com>
 */
class A11y_Enabler_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $A11y_Enabler    The ID of this plugin.
	 */
	private $A11y_Enabler;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $A11y_Enabler       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $A11y_Enabler, $version ) {

		$this->A11y_Enabler = $A11y_Enabler;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in A11y_Enabler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The A11y_Enabler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->A11y_Enabler, plugin_dir_url( __FILE__ ) . 'css/a11y-enabler-admin.css', array(), $this->version, 'all' );

	}





	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in A11y_Enabler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The A11y_Enabler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->A11y_Enabler, plugin_dir_url( __FILE__ ) . 'js/a11y-enabler-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */

    public function add_action_links( $links ) {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
        $settings_link = array(
            '<a href="' . admin_url( 'options-general.php?page=' . $this->A11y_Enabler ) . '">' . __('Setup', $this->A11y_Enabler) . '</a>',
            '<a target="_blank" href="https://a11yenabler.hikeorders.com/user/login">Admin</a>',
        );
        return array_merge(  $settings_link, $links );

    }

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */

    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_options_page( 'Accessibility Enabler', 'Accessibility Enabler', 'manage_options', $this->A11y_Enabler, array($this, 'display_plugin_setup_page')
        );
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    public function display_plugin_setup_page() {
        include_once( 'partials/plugin-a11y-enabler-display.php' );
    }

    public function options_update() {
        register_setting($this->A11y_Enabler, $this->A11y_Enabler, array($this, 'processForm'));
    }

    public function processForm() {

        $valid = array();
        $valid['a11y_enabler_orgId'] =  $_POST['a11y_enabler_orgId']  ;
        return $valid;
    }

}
