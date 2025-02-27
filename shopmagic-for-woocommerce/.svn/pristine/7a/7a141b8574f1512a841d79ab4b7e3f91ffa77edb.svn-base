<?php
declare( strict_types=1 );

namespace WPDesk\ShopMagic\Workflow\Placeholder\Builtin\Customer;

use WPDesk\ShopMagic\Customer\Customer;
use WPDesk\ShopMagic\Workflow\Placeholder\Builtin\CustomerBasedPlaceholder;

final class CustomerCompany extends CustomerBasedPlaceholder {

	public function get_slug(): string {
		return 'company';
	}

	public function get_description(): string {
		return esc_html__( 'Display customer company, usually passed in checkout form.', 'shopmagic-for-woocommerce' );
	}

	public function value( array $parameters ): string {
		if ( ! $this->resources->has( Customer::class ) ) {
			return '';
		}

		$customer = $this->resources->get( Customer::class );

		if ( $customer->is_guest() ) {
			return $customer->get_meta_value( 'billing_company' );
		} else {
			return get_user_meta( $customer->get_id(), 'billing_company', true );
		}
	}
}
