<?php

namespace WPDesk\WooCommerceCartWeight\Block;


use WCWeightVendor\WPDesk\PluginBuilder\Plugin\Hookable;

class StoreEndpointData implements Hookable {

	public function hooks() {
		add_filter( 'octolize-checkout-block-integration-woo-cart-weight-data', [ $this, 'integration_data' ] );
	}

	/**
	 * @param array $data
	 *
	 * @return array <string, string>
	 */
	public function integration_data( $data ) : array	{
		return [
			'weight' => wc_format_weight( WC()->cart ? WC()->cart->get_cart_contents_weight() : 0.0 ),
		];
	}


}
