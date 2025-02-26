<?php
/**
 * Class Package Info
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

/**
 * Class Get Package Info
 */
class AWSA_Package_Info {

	/**
	 * Get package Info
	 *
	 * @param array $package
	 *
	 * @return array
	 */
	public static function get_info( &$package = array() ) {

		if ( empty( $package ) ) {
			return;
		}

		unset( $package['rates'] );

		global $awsa_package;
		global $awsa_package_info;

		if ( $package !== $awsa_package ) {
			$awsa_package = $package;
		} else {
			/**
			 *  Refresh Payment Info
			 */
			self::get_payment_info( $awsa_package_info );

			return $awsa_package_info;
		}

		/**
		 * Seller id
		 */
		$seller_id         = !empty( $package['seller_id'] ) ? $package['seller_id'] : 0;
		$data['seller_id'] = $seller_id;
		/**
		 * Store Adress is Woocommerce Address or Vendor Address
		 * if seller_id is 0 not Enabled Multi Vendor
		 */
		$store_address                               = awsa_get_store_address( $seller_id );
		$data['store_address']                       = self::get_address( $store_address );
		$data['store_address']['is_center_of_state'] = awsa_is_center_of_state(
			$data['store_address']['city_id'],
			$data['store_address']['state'],
			$data['store_address']['country']
		);

		/**
		 * Customer Destination
		 * Add State_id and city_id to destination
		 */
		$data['destination'] = self::get_address( $package['destination'] );

		/**
		 * Items Info of Package Contents
		 */
		self::contents_info( $package['contents'], $data );
		/**
		 * Get Destination Type
		 */
		self::get_destination_type( $data );

		/**
		 *  Payment Info
		 */
		self::get_payment_info( $data );

		/**
		 * Postal Code Validation
		 */
		$data['is_valid_postal_code'] = self::is_validate_postal_code(
			$data['destination']['postcode'],
			$data['destination']['country']
		);

		$awsa_package_info = $data;

		return $data;
	}

	/**
	 * Get Destination Type
	 *
	 * @param array $data
	 *
	 * @return string current_city | in_state | beside_state | out_state | out_country
	 */
	public static function get_destination_type( &$data ) {

		if ( $data['destination']['country'] === $data['store_address']['country'] ) {
			if ( $data['destination']['state'] === $data['store_address']['state'] ) {
				if ( ( $data['destination']['city'] === $data['store_address']['city'] ) || ( $data['destination']['city_id'] === $data['store_address']['city_id'] ) ) {
					$data['destination_type'] = 'current_city';
				} else {
					$data['destination_type'] = 'in_state';
				}
			} else {
				if ( awsa_is_beside( $data['store_address']['state'], $data['destination']['state'] ) ) {

					$data['destination_type'] = 'beside_state';
				} else {
					$data['destination_type'] = 'out_state';
				}
			}
		} else {
			$data['destination_type'] = 'out_country';
		}

		return $data['destination_type'];
	}

	/**
	 * Items Info of Package Contents
	 *
	 * @param array $contents
	 * @param array $data
	 *
	 * @return array
	 */
	public static function contents_info( $contents, &$data ) {

		$w = 0;
		$p = 0;

		foreach ( (array) $contents as $item ) {
			$product = $item['data'];
			$qty     = $item['quantity'];
			$price   = (float) $product->get_price();

			$is_virtual      = $product->is_virtual();
			$is_downloadable = $product->is_downloadable();
			if ( !( $is_virtual || $is_downloadable ) ) {
				$weight = awsa_get_weight( $product->get_weight() );
				$weight = apply_filters( 'awsa_package_info_get_weight', $weight, $item );
			} else {
				$data['has_virtual_product'] = true;
				$weight                      = 0;
			}

			$w += $weight * $qty;
			$p += $price * $qty;
		}

		$data['weight'] = (float) $w;
		$data['price']  = (float) $p;

		return $data;
	}

	/**
	 * Get Payment Info
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	public static function get_payment_info( &$data ) {

		$data['payment_method_id'] = self::get_payment_method_id();
		$data['is_online_payment'] = awsa_is_online_payment( $data['payment_method_id'] );

		return $data;
	}

	/**
	 * Get Current Payment Method Id
	 *
	 * @return string
	 */
	public static function get_payment_method_id() {

		return WC()->session->get( 'chosen_payment_method' );
	}

	/**
	 * Check Validate postcode
	 *
	 * @param int    $postal_code
	 * @param string $country_id
	 *
	 * @return boolean
	 */
	public static function is_validate_postal_code( $postal_code, string $country_id ) {

		return awsa_check_postal_code( $postal_code, $country_id );
	}

	/**
	 * Get city_id and state_id from ir-post-ids
	 *
	 * @param array $address
	 *
	 * @return array destination
	 */
	public static function get_address( $address, $language = null ) {

		return awsa_shipping_get_address( $address, $language );
	}

}
