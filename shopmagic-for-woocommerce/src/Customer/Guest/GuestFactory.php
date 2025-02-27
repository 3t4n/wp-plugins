<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagic\Customer\Guest;

use WPDesk\ShopMagic\Components\Collections\ArrayCollection;
use WPDesk\ShopMagic\Customer\Customer;

/**
 * @final
 */
class GuestFactory {

	public function from_email( string $email ): Guest {
		$guest = new Guest();
		$guest->set_email( $email );
		$guest->set_tracking_key( GuestHydrator::generate_tracking_key() );

		return $guest;
	}

	public function from_order( \WC_Order $order, ?Guest $current_guest = null ): Guest {
		$guest         = $current_guest ?: new Guest();
		$fallback_date = new \DateTimeImmutable();
		$guest->set_updated( $order->get_date_created() ?? $fallback_date );
		if ( ! $current_guest ) {
			$guest->set_email( $order->get_billing_email() );
			$guest->set_created( $order->get_date_created() ?? $fallback_date );
			$guest->set_tracking_key( GuestHydrator::generate_tracking_key() );
		}

		$metadata                      = [];
		$metadata['first_name']        = $order->get_billing_first_name();
		$metadata['last_name']         = $order->get_billing_last_name();
		$metadata['billing_company']   = $order->get_billing_company();
		$metadata['billing_phone']     = $order->get_billing_phone();
		$metadata['billing_address_1'] = $order->get_billing_address_1();
		$metadata['billing_address_2'] = $order->get_billing_address_2();
		$metadata['billing_country']   = $order->get_billing_country();
		$metadata['billing_city']      = $order->get_billing_city();
		$metadata['billing_state']     = $order->get_billing_state();
		$metadata['billing_postcode']  = $order->get_billing_postcode();

		$metadata['shipping_company']   = $order->get_shipping_company();
		$metadata['shipping_address_1'] = $order->get_shipping_address_1();
		$metadata['shipping_address_2'] = $order->get_shipping_address_2();
		$metadata['shipping_country']   = $order->get_shipping_country();
		$metadata['shipping_city']      = $order->get_shipping_city();
		$metadata['shipping_state']     = $order->get_shipping_state();
		$metadata['shipping_postcode']  = $order->get_shipping_postcode();

		foreach ( $metadata as $key => $value ) {
			if ( empty( $value ) ) {
				continue;
			}

			$m = new GuestMeta();
			$m->set_meta_key( $key );
			$m->set_meta_value( $value );
			$guest->add_meta( $m );
		}

		$guest->set_meta( new ArrayCollection( array_unique( $guest->get_meta()->to_array() ) ) );

		return $guest;
	}

	/**
	 * Create a fresh guest entity from customer object.
	 */
	public function from_customer( Customer $customer ): Guest {
		$guest = new Guest();
		$guest->set_email( $customer->get_email() );
		$guest->set_tracking_key( GuestHydrator::generate_tracking_key() );

		$guest->add_meta( 'username', $customer->get_username() );
		$guest->add_meta( 'first_name', $customer->get_first_name() );
		$guest->add_meta( 'last_name', $customer->get_last_name() );
		$guest->add_meta( 'billing_phone', $customer->get_phone() );
		$guest->add_meta( 'shopmagic_user_language', $customer->get_language() );

		return $guest;
	}
}
