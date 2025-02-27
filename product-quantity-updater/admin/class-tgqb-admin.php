<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgqb
 * @subpackage Tgqb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tgqb
 * @subpackage Tgqb/admin
 * @author     Technify Guru <contact@technifyguru.com>
 */
class Tgqb_Admin {

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
		 * defined in Tgqb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tgqb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tgqb-admin.css', array(), $this->version, 'all' );

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
		 * defined in Tgqb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tgqb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tgqb-admin.js', array( 'jquery' ), $this->version, false );

	}


		/**
	 * Register admin menu for the plugin
	 * 
	 *  @since 1.0.0
	 */
	public function tgqb_plugin_admin_menu () {

		// Add main menu
		if ( empty ( $GLOBALS['admin_page_hooks']['tgwootools'] ) ) {
			add_menu_page(
				'General',
				'TG WooTools',
				'manage_options',
				'tgwootools',
				array($this, 'tgqb_plugin_general_page')
			);
    
    		// Add settings sub menu
    		add_submenu_page(
    			'tgwootools',
    			__('General', 'tgwootools'),
    			__('General', 'tgwootools'),
    			'manage_options',
    			'tgwootools',
    			array($this, 'tgqb_plugin_general_page')
    		);
		}
        

		// Add sub menu for product quantity buttons
		add_submenu_page(
			'tgwootools',
			__('Product Quantity Plus Minus Buttons', $this->plugin_name),
			__('Product Quantity Buttons', $this->plugin_name),
			'manage_options',
			$this->plugin_name . '-pqub',
			array($this, 'tgqb_plugin_settings_page')
		);


	}

	/**
	* Render the general page for this plugin.
	*
	* @since    1.0.0
	*/
	public function tgqb_plugin_general_page () {
		include_once( ( __DIR__ ) . '/partials/tgqb-admin-general.php' );
	}

	/**
	* Render the settings page for this plugin.
	*
	* @since    1.0.0
	*/
	public function tgqb_plugin_settings_page () {
		include_once( ( __DIR__ ) . '/partials/tgqb-admin-display.php' );
	}

	// Register and define setting fields
	public function tgqb_register_setting_fields () {

		register_setting('tgqb_settings', 'tgqb_settings');

		/** Settings fields for product quantity page */
		add_settings_section('tgqb_section', 'Show/Hide On Pages', '', 'tgqb_settings');

		add_settings_field('tgqb_field_cart_page', 'Show buttons on cart page', [$this, 'tgqb_field_cart_page_render'], 'tgqb_settings', 'tgqb_section');

		add_settings_field('tgqb_field_product_page', 'Show buttons on product page', [$this, 'tgqb_field_product_page_render'], 'tgqb_settings', 'tgqb_section');

		add_settings_field('tgqb_field_update_cart', 'Hide "Update Cart" button on cart page', [$this, 'tgqb_field_update_cart_render'], 'tgqb_settings', 'tgqb_section');


	}

	// Render the product quantity buttons on cart page switches
	public function tgqb_field_cart_page_render () {
		// First, we read the options collection
		$options = get_option('tgqb_settings');
		?>
		<label class="switch">
			<input type="checkbox" value="1" name="tgqb_settings[tgqb_field_cart_page]" <?php echo checked( 1, isset( $options['tgqb_field_cart_page'] ) ? esc_html($options['tgqb_field_cart_page']) : 0, false ); ?>>
			<span class="slider"></span>
		</label>
		<?php
	}

	// Render the product quantity buttons on product page switches
	public function tgqb_field_product_page_render () {
		// First, we read the options collection
		$options = get_option('tgqb_settings');
		?>
		<label class="switch">
			<input type="checkbox" value="1" name="tgqb_settings[tgqb_field_product_page]" <?php echo checked( 1, isset( $options['tgqb_field_product_page'] ) ? esc_html($options['tgqb_field_product_page']) : 0, false ); ?>>
			<span class="slider"></span>
		</label>
		<?php
	}

	// Render the product quantity buttons on product page switches
	public function tgqb_field_update_cart_render () {
		// First, we read the options collection
		$options = get_option('tgqb_settings');
		?>
		<label class="switch">
			<input type="checkbox" value="1" name="tgqb_settings[tgqb_field_update_cart]" <?php echo checked( 1, isset( $options['tgqb_field_update_cart'] ) ? esc_html($options['tgqb_field_update_cart']) : 0, false ); ?>>
			<span class="slider"></span>
		</label>
		<?php
	}
}
