<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.6.0
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.6.0
 * @package    Exit_Bee
 * @subpackage Exit_Bee/includes
 * @author     Foteini Giannaropoulou <foteini.giannaropoulou@exitbee.com>
 */
class Exit_Bee {

	const EXIT_BEE__HOST = 'app.exitbee.com';
	const EXIT_BEE__SUPPORT_URL = 'http://support.exitbee.com';

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.6.0
	 * @access   protected
	 * @var      Exit_Bee_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.6.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.6.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies and set the hooks for the admin area.
	 *
	 * @since    1.6.0
	 */
	public function __construct() {
		if ( defined( 'EXIT_BEE__VERSION' ) ) {
			$this->version = EXIT_BEE__VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'exit-bee';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Exit_Bee_Loader. Orchestrates the hooks of the plugin.
	 * - Exit_Bee_Admin. Defines all hooks for the admin area.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.6.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once EXIT_BEE__PLUGIN_DIR . 'includes/class-exit-bee-loader.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once EXIT_BEE__PLUGIN_DIR . 'admin/class-exit-bee-admin.php';

		$this->loader = new Exit_Bee_Loader();

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.6.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Exit_Bee_Admin( $this->get_plugin_name(), $this->get_version() );
		$plugin_settings = new Exit_Bee_Settings( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_menu', $plugin_settings, 'add_to_menu' );
		$this->loader->add_action( 'admin_init', $plugin_settings, 'init' );
		$this->loader->add_action( 'deactivated_plugin', 'Exit_Bee', 'detect_plugin_deactivation', 10, 2 );

		$plugin_file = plugin_basename( EXIT_BEE__PLUGIN_DIR . 'exit-bee.php' );
		$this->loader->add_filter( 'plugin_action_links_' . $plugin_file, $plugin_settings, 'add_settings_link' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.6.0
	 * @access   private
	 */
	private function define_public_hooks() {
		// Add the Exit Bee main tracking code to the site, before the closing </body tag.
		if ( self::can_track_analytics() ) {
			$this->loader->add_action( 'wp_footer', 'Exit_Bee', 'add_main_tracking_code' );
		}

		// Add the Exit Bee eCommerce tracking code to the Wocommerce order thank you page.
		if ( self::can_track_orders() ) {
			$this->loader->add_action( 'woocommerce_thankyou', 'Exit_Bee', 'add_ecommerce_tracking_code' );
		}
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.6.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Exit_Bee_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Check if the plugin can track analytics, aka if the main Exit Bee tracing code
	 * can be added to the website.
	 *
	 * @since     1.0.0
	 * @return bool
	 */
	public static function can_track_analytics() {
		// Website key is not set.
		$exit_bee_settings = get_option( 'exitbee_settings' );
		$site_key = $exit_bee_settings['basic']['site_key'];

		if ( ! $site_key ) {
			return false;
		}

		return true;
	}

	/**
	 * Track analytics and serve campaigns by adding the main Exit Bee tracking code.
	 *
	 * @since     1.0.0
	 */
	public static function add_main_tracking_code() {
		$exit_bee_settings = get_option( 'exitbee_settings' );
		$site_key = $exit_bee_settings['basic']['site_key'];
		$exit_bee_url = 'https://' . self::EXIT_BEE__HOST . '/c/' . $site_key . '/exitbee.js';
		?>
<script>
(function(doc) {
	var xtb = document.createElement("script");
	xtb.type = "text/javascript";
	xtb.async = true;
	xtb.src = "<?php echo esc_url( $exit_bee_url ); ?>";
	document.getElementsByTagName("head")[0].appendChild(xtb);
}())
</script>
		<?php
	}

	/**
	 * Check if the WooCommerce plugin is installed and activated.
	 *
	 * @since     1.0.0
	 * @return bool
	 */
	public static function woocommerce_plugin_is_active() {
		return class_exists( 'woocommerce' );
	}

	/**
	 * Disable ecommerce tracking setting if WooCommerce is deactivated.
	 *
	 * @since     1.0.0
	 *
	 * @param  string $plugin Path to the plugin file relative to
	 * the plugins directory.
	 * @param  bool   $network_wide Whether the plugin is deactivated for all sites in the network.
	 */
	public static function detect_plugin_deactivation( $plugin, $network_wide ) {
		if ( 'woocommerce/woocommerce.php' == $plugin ) {
			$exit_bee_settings = get_option( 'exitbee_settings' );
			if ( array_key_exists( 'woocommerce', $exit_bee_settings ) ) {
				unset( $exit_bee_settings['woocommerce'] );
				update_option( 'exitbee_settings', $exit_bee_settings );
			}
		}
	}

	/**
	 * Check if the plugin can track orders, aka if the eCommerce Exit Bee tracing code
	 * can be added to the website.
	 *
	 * @since     1.0.0
	 * @return bool
	 */
	public static function can_track_orders() {
		// Website key is not set.
		$exit_bee_settings = get_option( 'exitbee_settings' );
		$site_key = $exit_bee_settings['basic']['site_key'];

		if ( ! $site_key ) {
			return false;
		}

		// Ecommerce tracking is not enabled.
		if ( ! isset( $exit_bee_settings['woocommerce'] ) ) {
			return false;
		}

		return 1 == $exit_bee_settings['woocommerce']['orders_push_enable'];
	}

	/**
	 * Track WooCommerce orders by adding the Exit Bee eCommerce code.
	 *
	 * @param string $order_id The ID of the order.
	 *
	 * @since     1.0.0
	 */
	public static function add_ecommerce_tracking_code( $order_id ) {
		$order       = wc_get_order( $order_id );
		$order_items = $order->get_items();

		$order_data                        = array();
		$order_data['total']               = (float) $order->get_total();
		$order_data['currency']            = $order->get_currency();
		$order_data['platform']            = 'woo';
		$order_data['oid']                 = (string) $order_id;
		$order_data['suid']                = $order->get_user_id();

		$products = array();
		foreach ( $order_items as $item ) {
			$product       = $order->get_product_from_item( $item );
			$product_id    = $product->get_id();
			$product_cats  = get_the_terms( $product_id, 'product_cat' );
			$category      = isset( $product_cats[0] ) ? $product_cats[0] : null;
			$category_slug = isset( $category ) ? $category->slug : '';
			$url           = get_permalink( $product_id );

			$products[] = array(
				'name'     => $item['name'],
				'quantity' => (int) $item['qty'],
				'price'    => (float) $item['line_total'],
				'sku'      => $product->get_sku(),
				'category' => $category_slug,
				'url'      => $url,
			);
		}
		$order_data['products'] = $products;
		?>
<!--Exit Bee order tracking-->
<script type='text/javascript'>
	window.eb=window.eb||function(){(eb.q=eb.q||[]).push(arguments)};
	var orderData = <?php echo wp_json_encode( $order_data ); ?>;
	eb('pushOrder', orderData);
</script>
<!--End Exit Bee order tracking-->
		<?php
	}

	/**
	 * Output a view.
	 *
	 * @param  string $name The admin view file to include.
	 * @param  array  $args The arguments to pass to view.
	 *
	 * @since     1.0.0
	 */
	public static function admin_view( $name, array $args = array() ) {
		$args = apply_filters( 'exitbee_view_arguments', $args, $name );

		foreach ( $args as $key => $val ) {
			$$key = $val;
		}

		$file = EXIT_BEE__PLUGIN_DIR . 'admin/partials/' . $name . '.php';

		include( $file );
	}

}
