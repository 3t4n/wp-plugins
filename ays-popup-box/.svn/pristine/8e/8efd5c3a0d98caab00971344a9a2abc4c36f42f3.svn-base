<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Ays_Pb
 * @subpackage Ays_Pb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ays_Pb
 * @subpackage Ays_Pb/admin
 * @author     AYS Pro LLC <info@ays-pro.com>
 */
class Ays_Pb_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in Ays_Pb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ays_Pb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ays-pb-admin.css', array(), $this->version, 'all' );

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
		 * defined in Ays_Pb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ays_Pb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ays-pb-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */

    public function add_plugin_admin_menu() {
        add_options_page('PopupBox', 'PopupBox', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
        add_menu_page( 'PopupBox', 'PopupBox', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'), plugin_dir_url(__FILE__) . '/assets/icons/icon.png', 6);
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
            '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge(  $settings_link, $links );

    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    public function display_plugin_setup_page() {
        include_once( 'partials/ays-pb-admin-display.php' );
    }

    /**
     * Validating plugin attributes.
     *
     * @since    1.0.0
     */
    public function validate($input) {
        // All inputs
        $valid = array();

        //Shortcode
        $valid['shortcode'] = (isset($input['shortcode']) && !empty($input['shortcode'])) ? $input['shortcode'] : '';
        $valid['width'] = (isset($input['width']) && !empty($input['width'])) ? $input['width'] : '';
        $valid['height'] = (isset($input['height']) && !empty($input['height'])) ? $input['height'] : '';
        $valid['popup_title'] = (isset($input['popup_title']) && !empty($input['popup_title'])) ? $input['popup_title'] : '';
        $valid['popup_description'] = (isset($input['popup_description']) && !empty($input['popup_description'])) ? $input['popup_description'] : '';

        return $valid;
    }

    /**
     * Updating plugin attributes.
     *
     * @since    1.0.0
     */
    public function update_options() {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
    }

}
