<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.6.0
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/admin
 * @author     Foteini Giannaropoulou <giannaropoulou.foteini@exitbee.com>
 */
class Exit_Bee_Settings {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The capability for editing this plugin settings.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      string    $capability    The capability for editing this plugin settings.
	 */
	private static $capability = 'manage_options';

	/**
	 * The plugin's page slug.
	 *
	 * @since    1.6.1
	 * @access   private
	 * @var      string    $slug    The plugin's page slug.
	 */
	private static $slug = 'exitbee_settings';

	/**
	 * The plugin's page parent page slug.
	 *
	 * @since    1.6.1
	 * @access   private
	 * @var      string    $parent_slug    The plugin's page parent page slug.
	 */
	private static $parent_slug = 'options-general.php';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.6.0
	 * @param    string $plugin_name   The name of this plugin.
	 * @param    string $version       The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add settings link on the Plugin admin screen.
	 *
	 * @since    1.6.1
	 *
	 * @param  array $links An array of plugin action links.
	 * @return array An array of plugin action links.
	 */
	public function add_settings_link( $links ) {
		$url = esc_url(
			add_query_arg(
				'page',
				self::$slug,
				get_admin_url() . self::$parent_slug
			)
		);
		// Create the link.
		$settings_link = "<a href='$url'>" . __( 'Settings' ) . '</a>';
		// Adds the link to the end of the array.
		array_push(
			$links,
			$settings_link
		);

		return $links;
	}

	/**
	 * Add pages to the Admin Panel menu
	 *
	 * @since    1.6.0
	 */
	public function add_to_menu() {
		add_submenu_page(
			self::$parent_slug, // Parent slug.
			'Exit Bee Settings', // Page title.
			'Exit Bee', // Menu title.
			self::$capability, // Capability, which type of users can see this menu item.
			self::$slug, // Menu slug.
			array( $this, 'render_settings_page_content' ) // Callable function.
		);
	}

	/**
	 * Renders a simple page to display for the theme menu defined above.
	 *
	 * @since    1.6.0
	 */
	public function render_settings_page_content() {
		if ( ! current_user_can( self::$capability ) ) {
			return;
		}

		Exit_Bee::admin_view( 'exit-bee-settings' );
	}

	/**
	 * Initializes the theme's options page by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function init() {
		if ( false == get_option( 'exitbee_settings' ) ) {
			$default_array = $this->default_exitbee_settings();
			update_option( 'default_exitbee_settings', $default_array );
		}

		/*
		 * Basic Section
		 */
		add_settings_section(
			'basic_settings_section', // ID used to identify this section and with which to register options.
			__( 'Basic Settings', 'exit-bee' ), // Title to be displayed on the administration page.
			array( 'Exit_Bee_Settings', 'basic_section_callback' ), // Callback used to render the description of the section.
			'exitbee_settings'
		);

		add_settings_field(
			'exit_bee_site_key',
			__( 'Website Key', 'exit-bee' ),
			array( 'Exit_Bee_Settings', 'render_site_key_callback' ),
			'exitbee_settings',
			'basic_settings_section',
			array( 'label_for' => 'exit_bee_site_key' )
		);

		/*
		 * Commerce Section.
		 */
		add_settings_section(
			'woo_commerce_settings_section',
			'WooCommerce Settings',
			array( 'Exit_Bee_Settings', 'woo_commerce_section_callback' ),
			'exitbee_settings'
		);

		add_settings_field(
			'exitbee_orders_push_enable',
			'Enable eCommerce tracking',
			array( 'Exit_Bee_Settings', 'render_orders_push_enable_callback' ),
			'exitbee_settings',
			'woo_commerce_settings_section',
			array( 'label_for' => 'exitbee_orders_push_enable' )
		);

		// The settings container.
		register_setting(
			'exitbee_settings',
			'exitbee_settings',
			array( $this, 'validate_settings' )
		);
	}

	/**
	 * Provides default values for the Exit Bee Settings.
	 *
	 * @return array
	 */
	private static function default_exitbee_settings() {
		$basic = array(
			'site_key' => '',
		);

		$woocommerce = array(
			'orders_push_enable' => 0,
		);

		return array(
			'db-version' => '0',
			'basic'      => $basic,
			'woocommerce'   => $woocommerce,
		);
	}

	/**
	 * This function provides a simple description for the Basic Settings section.
	 *
	 * It's called from the 'exit-bee_initialize_theme_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public static function basic_section_callback() {
		Exit_Bee::admin_view( 'exit-bee-settings-basic-section' );
	}

	/**
	 * This function provides a simple description for the WooCommerce Settings section.
	 *
	 * It's called from the 'exit-bee_initialize_theme_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public static function woo_commerce_section_callback() {
		Exit_Bee::admin_view( 'exit-bee-settings-commerce-section' );
	}

	/**
	 * This function provides the rendered output for the site_key input.
	 *
	 * It's called from the 'exit-bee_initialize_theme_options' function by being passed as a parameter
	 * in the add_settings_field function.
	 */
	public static function render_site_key_callback() {
		$options = get_option( 'exitbee_settings' );
		// Render the output.
		echo '<input type="text" id="exit_bee_site_key" name="exitbee_settings[basic][site_key]" value="' . esc_attr( $options['basic']['site_key'] ) . '" class="regular-text"  />';
	}

	/**
	 * This function provides the rendered output for the exitbee_orders_push_enable input.
	 *
	 * It's called from the 'exit-bee_initialize_theme_options' function by being passed as a parameter
	 * in the add_settings_field function.
	 */
	public static function render_orders_push_enable_callback() {
		$options = get_option( 'exitbee_settings' );
		$checked = $options['woocommerce']['orders_push_enable'] ? ' checked' : '';
		// Only enabled if WooCommerce plugin is active.
		$disabled = Exit_Bee::woocommerce_plugin_is_active() ? '' : ' disabled';
		// Render the output.
		echo '<input type="checkbox" id="exitbee_orders_push_enable" name="exitbee_settings[woocommerce][orders_push_enable]"' . esc_attr( $checked ) . esc_attr( $disabled ) . '/>';
	}


	/**
	 * Validates submitted setting values before they get saved to the database.
	 * Invalid data will be overwritten with defaults.
	 *
	 * @param array $input The unsanitized collection of options.
	 * @return array The collection of sanitized values.
	 */
	public function validate_settings( $input ) {
		$output = self::default_exitbee_settings();
		$errors = array();

		$site_key = $input['basic']['site_key'];
		if ( ! $site_key ) {
			$errors['site_key'] = 'You need to provide your Exit Bee website key';
		} else {
			$uuidpattern = '/^[\da-f]{8}-([\da-f]{4}-){3}[\da-f]{12}$/';
			preg_match( $uuidpattern, $site_key, $matches );
			if ( ! $matches ) {
				$errors['site_key'] = 'Your site key is not valid';
			}
		}
		if ( array_key_exists( 'site_key', $errors ) ) {
			add_settings_error( 'exitbee_settings', esc_attr( 'settings_updated' ), $errors['site_key'], 'error' );
		} else {
			$output['basic']['site_key'] = $site_key;
		}

		if ( Exit_Bee::woocommerce_plugin_is_active() ) {
			if ( array_key_exists( 'woocommerce', $input ) ) {
				$woocommerce_input = $input['woocommerce'];
				$orders_push_enable = array_key_exists( 'orders_push_enable', $woocommerce_input );
				if ( $orders_push_enable ) {
					$output['woocommerce']['orders_push_enable'] = 1;
				}
			}
		}

		// Return the output array processing any additional functions filtered by this action.
		return apply_filters( 'validate_settings', $output, $input );
	}
}
