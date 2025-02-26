<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Alley_Business_Toolkit
 * @subpackage Alley_Business_Toolkit/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Alley_Business_Toolkit
 * @subpackage Alley_Business_Toolkit/admin
 * @author     # <a@gmail.com>
 */
class Alley_Business_Toolkit_Admin {

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
		$this->load_admin_files();

	}

	private function load_admin_files(){

		if ( abt_fs()->can_use_premium_code() ) {

			/**
			 * The function responsible for custom post type.
			 */
			require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/class-custom-posttype.php';
		}
		/**
		 * The function responsible for custom metabox.
		 */
		require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/metabox/add-metabox.php';
		require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/metabox/save-metabox.php';

		/**
		 * customizer part
		 */
		require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/customizer/customizer.php';


		/**
		 * custom menu part
		 */
		require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/register-menu.php';

		/*include admin notice*/
		require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/partials/admin-notice.php';

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
		 * defined in Alley_Business_Toolkit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Alley_Business_Toolkit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/alley-business-toolkit-admin.css', array(), $this->version, 'all' );

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
		 * defined in Alley_Business_Toolkit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Alley_Business_Toolkit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/alley-business-toolkit-admin.js', array( 'jquery' ), $this->version, false );

	}

}
