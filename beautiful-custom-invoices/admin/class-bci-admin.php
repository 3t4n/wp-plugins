<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    BCI
 * @subpackage BCI/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    BCI
 * @subpackage BCI/admin
 * @author     Your Name <email@example.com>
 */
class BCI_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $bci    The ID of this plugin.
	 */
	private $bci;

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
	 * @param      string    $bci       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $bci, $version ) {

		$this->bci = $bci;
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
		 * defined in BCI_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BCI_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->bci, plugin_dir_url( __FILE__ ) . 'css/bci-admin.css', array(), $this->version, 'all' );

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
		 * defined in BCI_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BCI_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->bci, plugin_dir_url( __FILE__ ) . 'js/bci-admin.js', array( 'jquery' ), $this->version, false );

        /*wp_localize_script( $this->bci, 'wpApiSettings', array(
            'root' => esc_url_raw( rest_url() ),
            'nonce' => wp_create_nonce( 'wp_rest' )
        ) );*/
	}

    public function register_menu()
    {
        add_menu_page(
            'Invoices',
            'Invoices',
            'manage_options',
            'bci',
            function() { return $this->show_menu_page(); },
            'dashicons-media-spreadsheet'
        );
	}

    public function show_menu_page()
    {
        include plugin_dir_path(__FILE__) . 'partials/plugin-bci-display.php';
	}

}
