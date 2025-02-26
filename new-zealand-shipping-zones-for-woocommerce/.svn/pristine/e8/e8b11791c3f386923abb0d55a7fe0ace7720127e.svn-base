<?php
/**
 * Creates the New Zealand shipping zones
 *
 * @since      1.0.0
 * @package    Woocommerce_NZ_Shipping_Zones
 * @subpackage Woocommerce_NZ_Shipping_Zones/Api
 */

/**
 * The api-specific functionality of the plugin.
 *
 * @package    Woocommerce_NZ_Shipping_Zones
 * @subpackage Woocommerce_NZ_Shipping_Zones/Api
 */
class Woocommerce_NZ_Shipping_Zones_Api {

	/**
	 * The ID of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string $woocommerce_nz_shipping_zones The ID of this plugin.
	 */
	private $woocommerce_nz_shipping_zones;

	/**
	 * The version of this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $woocommerce_nz_shipping_zones The name of this plugin.
	 * @param string $version                       The version of this plugin.
	 */
	public function __construct( $woocommerce_nz_shipping_zones, $version ) {
		$this->woocommerce_nz_shipping_zones = $woocommerce_nz_shipping_zones;
		$this->version                       = $version;
	}

	/**
	 * Creates the New Zealand shipping zones.
	 *
	 * @since 1.0.0
	 */
	public function create_shipping_zones() {
		if ( class_exists( 'woocommerce' ) ) {
			$this->new_rural_zone( 'North Island (Rural)', 0 );
			$this->new_rural_zone( 'South Island (Rural)', 1 );
			$this->new_standard_zone( 'North Island', 2 );
			$this->new_standard_zone( 'South Island', 3 );
		}
	}

	/**
	 * Creates a new rural NZ shipping zone.
	 *
	 * @since 1.0.0
	 * @param string $zone_name The label for the shipping zone.
	 * @param int    $zone_id   The ID for the shipping zone.
	 */
	private function new_rural_zone( $zone_name, $zone_id ) {
		$all_zone_names = $this->get_all_zone_names();

		if ( ! in_array( $zone_name, $all_zone_names, true ) ) {
			$postcodes = $this->get_zone_data( 'nz-postcodes-rural.json' );

			$rural_zone = new WC_Shipping_Zone();
			$rural_zone->set_zone_name( $zone_name );
			$rural_zone->add_location( 'NZ', 'country' );

			foreach ( $postcodes as $postcode => $zone ) {
				if ( (int) $zone !== $zone_id ) {
					continue;
				}

				$rural_zone->add_location( $postcode, 'postcode' );
			}

			$rural_zone->save();
		}
	}

	/**
	 * Creates a new standard NZ shipping zone.
	 *
	 * @since 1.0.0
	 * @param string $zone_name The label for the shipping zone.
	 * @param int    $zone_id   The ID for the shipping zone.
	 */
	private function new_standard_zone( $zone_name, $zone_id ) {
		$all_zone_names = $this->get_all_zone_names();

		if ( ! in_array( $zone_name, $all_zone_names, true ) ) {
			if ( version_compare( WC_VERSION, '7.1.0', '<' ) ) {
				$regions = $this->get_zone_data( 'nz-regions-legacy.json' );
			} else {
				$regions = $this->get_zone_data( 'nz-regions.json' );
			}

			$standard_zone = new WC_Shipping_Zone();
			$standard_zone->set_zone_name( $zone_name );

			foreach ( $regions as $region => $zone ) {
				if ( (int) $zone !== $zone_id ) {
					continue;
				}

				$standard_zone->add_location( 'NZ:' . $region, 'state' );
			}

			$standard_zone->save();
		}
	}

	/**
	 * Gets the zone data.
	 *
	 * @since 1.0.0
	 * @param string $filename The name of the file with region or postcode data.
	 */
	private function get_zone_data( $filename ) {
		$json = file_get_contents( plugins_url( '/data/' . $filename, __FILE__ ) ); // phpcs:ignore

		try {
			$data = json_decode( $json );
		} catch ( Exception $e ) {
			$data = null;
		}

		return $data;
	}

	/**
	 * Returns an array of all shipping zone names.
	 *
	 * @since 1.0.0
	 */
	private function get_all_zone_names() {
		$zones          = WC_Shipping_Zones::get_zones();
		$all_zone_names = array();

		foreach ( $zones as $zone ) {
			if ( ! in_array( $zone['zone_name'], $all_zone_names, true ) ) {
				$all_zone_names[] = $zone['zone_name'];
			}
		}

		return $all_zone_names;
	}

}
