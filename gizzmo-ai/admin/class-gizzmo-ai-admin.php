<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gizzmo_Ai
 * @subpackage Gizzmo_Ai/admin
 * @author     Gizzmo <info@gizzmo.ai>
 */
class Gizzmo_Ai_Admin {

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

		$screen = get_current_screen();
		
		if ( 'toplevel_page_gizzmo-ai' == $screen->id ) {

			wp_enqueue_style( $this->plugin_name . '-style', plugin_dir_url( __FILE__ ) . 'pages/css/app.css', [], $this->version, 'all' );
		}
		

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		$screen = get_current_screen();
		
		if ( 'toplevel_page_gizzmo-ai' == $screen->id ) {

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( $this->plugin_name . '-app', plugin_dir_url( __FILE__ ) . 'pages/js/app.js', [], $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-gizzmo', plugin_dir_url( __FILE__ ) . 'pages/js/gizzmo.js', [], $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-gridjs_development', plugin_dir_url( __FILE__ ) . 'pages/js/gridjs_development.js', [], $this->version, true );
			 
		}

	}







	/**
	 * Add a settings page for this plugin to the admin sidebar menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		// Add the main menu item, linking directly to the Product Review page
		add_menu_page(
			esc_html__('Gizzmo AI', 'gizzmo-ai'),  // Page title
			esc_html__('Gizzmo AI', 'gizzmo-ai'),  // Menu title
			'manage_options',
			$this->plugin_name . '-product-review',  // The slug now points to the Product Review page
			[$this, 'display_product_review'],       // The callback function for Product Review
			plugin_dir_url(__FILE__) . 'icon.png',
			5
		);
	
		// Remove the first automatically added submenu (which is the same as the main menu item)
		remove_submenu_page($this->plugin_name . '-product-review', $this->plugin_name . '-product-review');
	
		
	
		add_submenu_page(
			$this->plugin_name . '-product-review',  // The parent slug now matches the main menu slug
			esc_html__('Product Review', 'gizzmo-ai'),
			esc_html__('Product Review', 'gizzmo-ai'),
			'manage_options',
			$this->plugin_name . '-product-review',
			[$this, 'display_product_review']
		);
	
		add_submenu_page(
			$this->plugin_name . '-product-review',  // The parent slug now matches the main menu slug
			esc_html__('Products Roundup', 'gizzmo-ai'),
			esc_html__('Products Roundup', 'gizzmo-ai'),
			'manage_options',
			$this->plugin_name . '-products-roundup',
			[$this, 'display_products_roundup']
		);
	
		add_submenu_page(
			$this->plugin_name . '-product-review',  // The parent slug now matches the main menu slug
			esc_html__('Products Comparison', 'gizzmo-ai'),
			esc_html__('Products Comparison', 'gizzmo-ai'),
			'manage_options',
			$this->plugin_name . '-products-comparison',
			[$this, 'display_products_comparison']
		);
	
		add_submenu_page(
			$this->plugin_name . '-product-review',  // The parent slug now matches the main menu slug
			esc_html__('Listicle', 'gizzmo-ai'),
			esc_html__('Listicle', 'gizzmo-ai'),
			'manage_options',
			$this->plugin_name . '-listicle',
			[$this, 'display_listicle']
		);
	
		add_submenu_page(
			$this->plugin_name . '-product-review',  // The parent slug now matches the main menu slug
			esc_html__('Deals', 'gizzmo-ai'),
			esc_html__('Deals', 'gizzmo-ai'),
			'manage_options',
			$this->plugin_name . '-deals',
			[$this, 'display_deals']
		);
		
		// Add the rest of the submenus
		add_submenu_page(
			$this->plugin_name . '-product-review',  // The parent slug now matches the main menu slug
			esc_html__('Gizzmo Posts', 'gizzmo-ai'),
			esc_html__('Gizzmo Posts', 'gizzmo-ai'),
			'manage_options',
			$this->plugin_name . '-gizzmo-posts',
			[$this, 'display_gizzmo_posts']
		);
	}
	
	
	public function display_product_review() {
		require_once('pages/product-review.php');
	}
	
	public function display_gizzmo_posts() {
		require_once('pages/gizzmo-posts.php');
	}
	

	public function display_products_roundup() {
		require_once('pages/products-roundup.php');
	}
	
	public function display_products_comparison() {
		require_once('pages/products-comparison.php');
	}
	
	public function display_listicle() {
		require_once('pages/listicle.php');
	}
	
	public function display_deals() {
		require_once('pages/deals.php');
	}
	
	

	/**
	 * Link to the settings page from plugins screen.
	 *
	 * @since    1.0.0
	 * @param      string[]    $actions       An array of plugin action links.
	 */
	public function add_action_links( $actions ) {

		$settings_link = sprintf(
			'<a href="%1$s">%2$s</a>',
			admin_url( 'admin.php?page=' . $this->plugin_name ),
			esc_html__( 'Settings', 'gizzmo-ai' )
		);

		array_unshift( $actions, $settings_link );

		return $actions;

	}

	public function display_plugin_dashboard() {
		require_once( 'pages/index.php' );
		require_once( 'pages/code.php' );
	}

}
