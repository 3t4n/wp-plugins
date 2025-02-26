<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.piclaunch.com/
 * @since      1.0.0
 *
 * @package    Ampnonampads
 * @subpackage Ampnonampads/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ampnonampads
 * @subpackage Ampnonampads/admin
 * @author     Piclaunch <Piclaunch@gmail.com>
 */
class Ampnonampads_Admin {

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
		 * defined in Ampnonampads_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ampnonampads_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ampnonampads-admin.css', array(), $this->version, 'all' );

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
		 * defined in Ampnonampads_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ampnonampads_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ampnonampads-admin.js', array( 'jquery' ), $this->version, false );

	}

// Piclaunch Code 
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
	    add_options_page( 'AMP/non-AMP Ads', 'AMP non-AMP Ads', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	    );
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

	//saving/update function for our options.

	public function options_update() {
    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
 	}

	//validate and sanitize those options:

	public function validate($input) {
	    // All checkboxes inputs        
	    $valid = array();

	    //AMP Ads
	    $valid['ANA_showAMP'] = (isset($input['ANA_showAMP']) && !empty($input['ANA_showAMP'])) ? 1 : 0;
	    $valid['ANA_adtype'] = (isset($input['ANA_adtype']) && !empty($input['ANA_adtype'])) ? $input['ANA_adtype']: 'adsense';
	    $valid['pinqIDFrame'] = (isset($input['pinqIDFrame']) && !empty($input['pinqIDFrame'])) ? $input['pinqIDFrame']: 0;

	    $valid['ANA_aheight'] = (isset($input['ANA_aheight']) && !empty($input['ANA_aheight'])) ? $input['ANA_aheight']: 320 ;
	    $valid['ANA_awidth'] = (isset($input['ANA_awidth']) && !empty($input['ANA_awidth'])) ? $input['ANA_awidth']: '100vw';
	    //Ad Client will same through out the site as per Google Policy 
	    $valid['ANA_aclient'] = (isset($input['ANA_aclient']) && !empty($input['ANA_aclient'])) ? $input['ANA_aclient']: 'ca-pub-1213733709341832';

	    $valid['ANA_aslots'] = (isset($input['ANA_aslots']) && !empty($input['ANA_aslots'])) ? $input['ANA_aslots']: 4540042917;
	    $valid['ANA_format'] = (isset($input['ANA_format']) && !empty($input['ANA_format'])) ? $input['ANA_format']: 'rspv';

  		//AMP Auto Ads
  		$valid['ANA_showAMPAuto'] = (isset($input['ANA_showAMPAuto']) && !empty($input['ANA_showAMPAuto'])) ? 1 : 0;

  		//Non AMP Ads
  		$valid['ANA_showNAMP'] = (isset($input['ANA_showNAMP']) && !empty($input['ANA_showNAMP'])) ? 1 : 0;

  		//Non AMP Auto Ads
  		$valid['ANA_showNAMPAuto'] = (isset($input['ANA_showNAMPAuto']) && !empty($input['ANA_showNAMPAuto'])) ? 1 : 0;




	    $valid['debug'] = (isset($input['debug']) && !empty($input['debug'])) ? 1 : 0;

	    

	    return $valid;
	 }

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_setup_page() {
	    include_once( 'partials/ampnonampads-admin-display.php' );
	}


// END of Piclaunch Code 


}
