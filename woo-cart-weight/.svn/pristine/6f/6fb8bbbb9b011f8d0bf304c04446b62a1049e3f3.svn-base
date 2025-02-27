<?php
/**
 * Plugin main class.
 *
 * @package WPDesk\WooCommerceCartWeight
 */

namespace WPDesk\WooCommerceCartWeight;

use WCWeightVendor\Octolize\Blocks\IntegrationData;
use WCWeightVendor\Octolize\Blocks\Registrator;
use WCWeightVendor\Octolize\Blocks\StoreEndpoint;
use WCWeightVendor\Octolize\ShippingExtensions\ShippingExtensions;
use WCWeightVendor\Octolize\Tracker\OptInNotice\ShouldDisplayNever;
use WCWeightVendor\Octolize\Tracker\TrackerInitializer;
use WCWeightVendor\WPDesk\PluginBuilder\Plugin\AbstractPlugin;
use WCWeightVendor\WPDesk\PluginBuilder\Plugin\HookableCollection;
use WCWeightVendor\WPDesk\PluginBuilder\Plugin\HookableParent;
use WCWeightVendor\WPDesk\View\Renderer\Renderer;
use WCWeightVendor\WPDesk\View\Renderer\SimplePhpRenderer;
use WCWeightVendor\WPDesk\View\Resolver\ChainResolver;
use WCWeightVendor\WPDesk\View\Resolver\DirResolver;
use WCWeightVendor\WPDesk\View\Resolver\WPThemeResolver;
use WPDesk\WooCommerceCartWeight\Block\StoreEndpointData;
use WPDesk\WooCommerceCartWeight\Renderer\CartWeightRenderer;
use WPDesk\WooCommerceCartWeight\Renderer\CheckoutWeightRenderer;
use WPDesk\WooCommerceCartWeight\Renderer\WidgetWeightRenderer;

/**
 * Main plugin class. The most important flow decisions are made here.
 *
 * @package WPDesk\WooCommerceCartWeight
 */
class Plugin extends AbstractPlugin implements HookableCollection {

	use HookableParent;

	/**
	 * Define plugin namespace for backward compatibility.
	 */
	const PLUGIN_NAMESPACE = 'woo-cart-weight';

	/**
	 * Plugin path
	 *
	 * @var string
	 */
	private $plugin_path;

	/**
	 * Template path
	 *
	 * @var string
	 */
	private $template_path;

	/**
	 * Renderer.
	 *
	 * @var Renderer
	 */
	private $renderer;

	/**
	 * Plugin constructor.
	 *
	 * @param \WCWeightVendor\WPDesk_Plugin_Info $plugin_info Plugin info.
	 */
	public function __construct( \WCWeightVendor\WPDesk_Plugin_Info $plugin_info ) {
		$this->plugin_info = $plugin_info;
		parent::__construct( $plugin_info );
	}

	/**
	 * Init base variables for plugin
	 */
	public function init_base_variables() {
		$this->plugin_url         = $this->plugin_info->get_plugin_url();
		$this->plugin_namespace   = self::PLUGIN_NAMESPACE;
		$this->plugin_path        = $this->plugin_info->get_plugin_dir();
		$this->template_path      = $this->plugin_info->get_text_domain();
	}

	/**
	 * Init plugin
	 */
	public function init() {
		$this->init_base_variables();
		$this->init_renderer();
		$this->init_tracker();
		$this->init_checkout_blocks();
		$this->load_dependencies();
		parent::init();
	}

	/**
	 * Init tracker.
	 *
	 * @return void
	 */
	private function init_tracker() {
		$this->add_hookable( TrackerInitializer::create_from_plugin_info( $this->plugin_info, new ShouldDisplayNever() ) );
	}

	/**
	 * Init renderer.
	 *
	 * @return void
	 */
	private function init_renderer() {
		$resolver = new ChainResolver();
		$resolver->appendResolver( new WPThemeResolver( $this->template_path ) );
		$resolver->appendResolver( new DirResolver( trailingslashit( $this->plugin_path ) . 'templates' ) );
		$this->renderer = new SimplePhpRenderer( $resolver );
	}

	private function init_checkout_blocks() {
		$integration_data = ( new IntegrationData() )
			->set_integration_name( $this->plugin_namespace )
			->set_script_name( '' );
		( new StoreEndpoint( $integration_data->get_integration_name(), 'weight', false ) )->hooks();
		( new StoreEndpointData() )->hooks();
		( new Registrator(
			$integration_data,
			$this->plugin_path,
			$this->get_plugin_file_path()
		) )->hooks();
	}


	/**
	 * Load dependencies.
	 *
	 * @return void
	 */
	public function load_dependencies() {
		$this->add_hookable( new ShippingExtensions( $this->plugin_info ) );
	}

	/**
	 * Fires hooks
	 *
	 * @return void
	 */
	public function hooks() {
		parent::hooks();
		add_action( 'woocommerce_init', [ $this, 'init_renderers' ] );
		$this->hooks_on_hookable_objects();
	}

	/**
	 * Init renderers.
	 *
	 * @return void
	 */
	public function init_renderers() {
		$cart = WC()->cart;
		if ( null !== $cart ) {
			( new CartWeightRenderer( $this->renderer, $cart ) )->hooks();
			( new CheckoutWeightRenderer( $this->renderer, $cart ) )->hooks();
			( new WidgetWeightRenderer( $this->renderer, $cart ) )->hooks();
		}
	}

	/**
	 * Initialize plugin admin links. This is a hook function. Do not execute directly.
	 *
	 * @param string[] $links
	 *
	 * @return string[]
	 */
	public function links_filter( $links ) {
		$support_link = get_locale() === 'pl_PL' ? 'https://www.wpdesk.pl/support/' : 'https://octol.io/cart-weight-support';

		$plugin_links = [ '<a target="_blank" href="' . esc_url( $support_link ) . '">' . __( 'Support', 'woo-cart-weight' ) . '</a>' ];

		return array_merge( $plugin_links, $links );
	}
}
