<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://consensu.io
 * @since      1.0.0
 *
 * @package    Consensu_IO
 * @subpackage Consensu_IO/admin
 */


 if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Consensu_IO
 * @subpackage Consensu_IO/admin
 * @author      Consensu.IO <contato@consensu.io>
 */
class Consensu_IO_Admin {

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

        add_action('admin_menu', array($this, 'consensu_pages'));
        add_action('admin_init', array($this, 'admin_init'));
        add_action('admin_notices', array($this, 'show_admin_notice'));
	}
	public function admin_init() {
        $this->handle_form_submission();
    }

    private function handle_form_submission() {
        if (!isset($_POST['consensu_form']) || $_POST['consensu_form'] !== 'true') {
            return;
        }

        if (!current_user_can('manage_options')) {
            wp_die(esc_html_e('You don\'t have sufficient permissions to access this page.', 'consensu-io'));
        }

        check_admin_referer('consensu_io_options_update', 'consensu_io_nonce');

        $configs = array(
			'plugin_ver' => CONSENSU_IO_VERSION,
			'client_key' => (isset($_POST['consensu_options']['client_key']) ? sanitize_text_field($_POST['consensu_options']['client_key']) : ""), 
			'debug_mode' => (isset($_POST['consensu_options']['debug_mode']) ? 1 : 0)
		);
	
		update_option(CONSENSU_IO_OPTION_NAME, $configs);
		add_action('admin_notices', array($this, 'show_admin_success'));
    }


	/**
     * Show a warning notice if debug mode is on
     */
    public function show_admin_success()
    {
        $this->load_view('success-admin-notice.php', array());
    }

	/**
     * Show a warning notice if debug mode is on
     */
    public function show_admin_notice()
    {
        // Show only for this plugin option page
        if (strpos(get_current_screen()->id,  'consensu-io') === false) return;

        $options = get_option(CONSENSU_IO_OPTION_NAME);

        // If debug mode is off return early
        if ($options['debug_mode'] == 0) return;

        $this->load_view('debug-admin-notice.php', array());

    }

	


		
	function consensu_pages(){
		add_menu_page('Configuração LGPD - Consensu.IO', 'LGPD - Consensu', 'manage_options', 'consensu-io');
		add_submenu_page('consensu', 'Plugin Consensu Config', 'Configurações', 'manage_options', 'consensu-io',array($this, 'load_options_page') );
		
	}

	/**
     * Function will print our option page form
     */
    public function load_options_page()
    {
        if (!current_user_can('manage_options')) {
            wp_die(esc_html_e('You don\'t have sufficient permissions to access this page.', 'consensu-io'));
        }

		$options = get_option(CONSENSU_IO_OPTION_NAME);
        $this->load_view('consensu-io-admin-display.php', $options);

    }

		/**
     * Load view and show it to front-end
     * @param $file string File name
     * @param $options array Array to be passed to view, not an unused variable
     * @throws \Exception
     */
    private function load_view($file, $options = array())
    {
        $file_path = plugin_dir_path(__FILE__) . 'partials/' . $file;
        if (is_readable($file_path)) {
            require $file_path;
        } else {
            throw new \Exception('Unable to load template file - ' . esc_html($file_path));
        }
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
		 * defined in Consensu_IO_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Consensu_IO_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/consensu-io-admin.css', array(), $this->version, 'all' );

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
		 * defined in Consensu_IO_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Consensu_IO_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/consensu-io-admin.js', array( 'jquery' ), $this->version, false );

	}

}
