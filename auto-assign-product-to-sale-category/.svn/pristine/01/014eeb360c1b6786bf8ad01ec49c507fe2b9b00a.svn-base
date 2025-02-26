<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/mrakisp
 * @since      1.0.0
 *
 * @package    Aatsc
 * @subpackage Aatsc/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Aatsc
 * @subpackage Aatsc/admin
 * @author     Akis Paneras <panerasakis@gmail.com>
 */
class Aatsc_Admin {

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
	 * Adds the option in WordPress Admin menu
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	
	// REGISTER MENU PAGE
	public function auto_sale_assign_menu_page() {

		add_menu_page(
			'Auto Assign Sale Category', // page <title>Title</title>
			'Set Sale Category', // menu link text
			'manage_options', // capability to access the page
			'auto-sale-cat-slug', // page URL slug
			array(
				$this,
				'options_page_content',
			),
			'dashicons-pressthis', // menu icon
			// 5 // priority
		);
	
	}

	/**
	 * Initialize the settings page
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function settings_init() {
		register_setting(
			'autosale_cat_settings', // settings group name
			'sale_category_selected', // option name
			'sanitize_text_field' // sanitization function
		);
	
		
		add_settings_section(
			'some_settings_section_id', // section ID
			'', // title (if needed)
			'', // callback function (if needed)
			'auto-sale-cat-slug' // page slug
		);
	
		add_settings_field(
			'sale_category_selected',
			'Select Sale Category to auto assign/remove products in Sale',
			array(
				$this,
				'autosale_register_setting',
			),
			'auto-sale-cat-slug', // page slug
			'some_settings_section_id', // section ID
			array( 
				'label_for' => 'sale_category_selected',
				'class' => 'sale-category-class', // for <tr> element
			)
		);
	}


	//LOAD VIEWS
	public function options_page_content() {
		include_once( 'partials/aatsc-admin-display.php' );
	}

	public function autosale_register_setting() {
		include_once( 'partials/select-cat-view.php' );
	}

	/**
	 * Assign / Unassign product to sale category on save
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function auto_add_product_category($post_id, $post, $update) {
		global $post;
		if ( $post->post_type != 'product') return; // Only products

		// If this is an autosave, our form has not been submitted, so don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		// Check the user's permissions.
		if ( ! current_user_can( 'edit_product', $post_id ) )
			return $post_id;

		$product = wc_get_product();
		if ( $product->is_type( 'simple' ) ) {
			$product = new WC_Product( $post->ID );
		}
		else {
			$product = new WC_Product_Variable( $post->ID );
		}
		$term_id = (int) get_option( 'sale_category_selected' ); // <== targeted product category term ID
		$taxonomy = 'product_cat'; // The taxonomy for Product category

		if ( ! has_term( $term_id, 'product_cat', $post_id ) && term_exists( $term_id, $taxonomy ) && $product->is_on_sale() ){
			wp_set_post_terms( $post_id, $term_id, $taxonomy, true ); //  set this product category
		}else if( has_term( $term_id, 'product_cat', $post_id ) && term_exists( $term_id, $taxonomy ) && !$product->is_on_sale() ){
			wp_remove_object_terms( $post_id, $term_id, 'product_cat' );
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
		 * defined in Aatsc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aatsc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/aatsc-admin.css', array(), $this->version, 'all' );

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
		 * defined in Aatsc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aatsc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/aatsc-admin.js', array( 'jquery' ), $this->version, false );

	}

}
