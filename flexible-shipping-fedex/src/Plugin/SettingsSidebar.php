<?php
/**
 * Settings sidebar.
 *
 * @package WPDesk\FlexibleShippingFedex
 */

namespace WPDesk\FlexibleShippingFedex;

use FedExVendor\Octolize\Brand\Assets\AdminAssets;
use FedExVendor\Octolize\Brand\UpsellingBox\ShippingMethodInstanceShouldShowStrategy;
use FedExVendor\WPDesk\FedexShippingService\FedexShippingService;
use FedExVendor\WPDesk\PluginBuilder\Plugin\Hookable;
use FedExVendor\WPDesk\PluginBuilder\Plugin\HookableCollection;
use FedExVendor\WPDesk\PluginBuilder\Plugin\HookableParent;
use FedExVendor\WPDesk\ShowDecision\OrStrategy;
use FedExVendor\WPDesk\ShowDecision\WooCommerce\ShippingMethodStrategy;

/**
 * Can display settings sidebar.
 */
class SettingsSidebar implements Hookable, HookableCollection {

	use HookableParent;

	private string $assets_url;

	public function __construct( string $assets_url ) {
		$this->assets_url = $assets_url;
	}

	/**
	 * Hooks.
	 */
	public function hooks() {
		$should_show_strategy = new OrStrategy( new ShippingMethodStrategy( FedexShippingService::UNIQUE_ID ) );
		$should_show_strategy->addCondition( new ShippingMethodInstanceShouldShowStrategy( new \WC_Shipping_Zones(), FedexShippingService::UNIQUE_ID ) );
		$this->add_hookable( new AdminAssets( $this->assets_url, 'fedex', $should_show_strategy ) );
		$settings_sidebar = new \FedExVendor\Octolize\Brand\UpsellingBox\SettingsSidebar(
			'flexible_shipping_fedex_settings_sidebar',
			$should_show_strategy,
			__( 'Get FedEx WooCommerce Live Rates PRO!', 'flexible-shipping-fedex' ),
			[
				__( 'Different ways of packing products', 'flexible-shipping-fedex' ),
				__( 'Premium Support', 'flexible-shipping-fedex' ),
				__( 'Custom Origin', 'flexible-shipping-fedex' ),
				__( 'Handling Fees', 'flexible-shipping-fedex' ),
				__( 'Multicurrency Support', 'flexible-shipping-fedex' ),
				__( 'Delivery Dates', 'flexible-shipping-fedex' ),
			],
			'pl_PL' === get_locale() ? 'https://octol.io/fedex-upgrade-box-pl' : 'https://octol.io/fedex-upgrade-box',
			__( 'Upgrade Now', 'flexible-shipping-fedex' ),
			1320,
			20,
			'#mainform h2:first,#mainform h3:first'
		);
		$this->add_hookable( $settings_sidebar );

		$this->hooks_on_hookable_objects();

	}

}
