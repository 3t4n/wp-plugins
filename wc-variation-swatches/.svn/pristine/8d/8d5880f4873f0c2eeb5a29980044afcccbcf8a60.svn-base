<?php

namespace WooCommerceVariationSwatches;

defined( 'ABSPATH' ) || exit;

/**
 * Class Plugin.
 *
 * @since 1.0.0
 *
 * @package WooCommerceVariationSwatches
 */
final class Plugin extends \WooCommerceVariationSwatches\ByteKit\Plugin {

	/**
	 * Plugin constructor.
	 *
	 * @param array $data The plugin data.
	 *
	 * @since 1.0.0
	 */
	protected function __construct( $data ) {
		parent::__construct( $data );
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}
	/**
	 * Define constants.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function define_constants() {
		define( 'WCVS_VERSION', $this->get_version() );
		define( 'WCVS_FILE', $this->get_file() );
		define( 'WCVS_PATH', $this->get_dir_path() );
		define( 'WCVS_URL', plugins_url( '', WCVS_FILE ) );
		define( 'WCVS_ASSETS_URL', $this->get_assets_url() );
		define( 'WCVS_INCLUDES', WCVS_PATH . '/includes' );
		define( 'WCVS_TEMPLATES_DIR', WCVS_PATH . '/templates' );
		define( 'WCVS_ADMIN', WCVS_PATH . '/includes/admin' );
	}

	/**
	 * Include required files.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function includes() {
		require_once __DIR__ . '/functions.php';

		// Require the deprecated functions.
		require_once __DIR__ . '/deprecated.php';
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init_hooks() {
		register_activation_hook( $this->get_file(), array( $this, 'install' ) );
		add_action( 'before_woocommerce_init', array( $this, 'on_before_woocommerce_init' ) );
		add_action( 'admin_notices', array( $this, 'dependencies_notices' ) );
		add_action( 'woocommerce_init', array( $this, 'init' ), 0 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Run on plugin activation.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function install() {
		// Add option for installed time.
		add_option( 'wcvs_is_installed', wp_date( 'U' ) );
	}

	/**
	 * Run on before WooCommerce init.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function on_before_woocommerce_init() {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', $this->get_file(), true );
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', $this->get_file(), true );
		}
	}

	/**
	 * Missing dependencies notice.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function dependencies_notices() {
		if ( $this->is_plugin_active( 'woocommerce' ) ) {
			return;
		}
		$notice = sprintf(
		/* translators: 1: plugin name 2: WooCommerce */
			__( '%1$s requires %2$s to be installed and active.', 'wc-variation-swatches' ),
			'<strong>' . esc_html( $this->get_name() ) . '</strong>',
			'<strong>' . esc_html__( 'WooCommerce', 'wc-variation-swatches' ) . '</strong>'
		);

		echo '<div class="notice notice-error"><p>' . wp_kses_post( $notice ) . '</p></div>';
	}

	/**
	 * Init the plugin after plugins_loaded so environment variables are set.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		$this->set( Products::class );
		// Admin Class.
		if ( is_admin() ) {
			$this->set( Admin\Admin::class );
			$this->set( Admin\Settings::class );
			$this->set( Admin\SettingsAPI::class );
			$this->set( Admin\Notices::class );
		}

		// Init action.
		do_action( 'wc_variation_swatches_init' );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function enqueue_scripts() {
		WCVS()->scripts->enqueue_style( 'wcvs-frontend', 'css/frontend.css' );
		WCVS()->scripts->enqueue_script( 'wcvs-frontend', 'js/frontend.js', array( 'jquery' ) );
	}
}
