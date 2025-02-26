<?php

namespace ProfitBlue\Models;

/**
 * @method OrderShippingModel
 */
class OrderShippingModel {

	private $wpdb = null;
	private $order = null;
	private $shipping_cost = null;
	private $shipping_cost_data = null;

	public function __construct( $order ) {

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->order = $order;
		$this->set_shipping_data();

	}

	/**
	 * Set shipping data
	 *
	 * @return void
	 */
	public function set_shipping_data() {

		global $wpdb;
		if (!isset($GLOBALS['profitblue_shipping_costs'])) {

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_shiping_costs'
					)
				)
			);
			if ( !empty( $result ) ) {
				$this->shipping_cost = $result;
			}
			$GLOBALS['profitblue_shipping_costs'] = $this->shipping_cost;
			
		} else {
			$this->shipping_cost = $GLOBALS['profitblue_shipping_costs'];
		}

		if (!isset($GLOBALS['profitblue_shipping_costs_data'])) {

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_shipping_costs_data'
					)
				)
			);
			if ( !empty( $result ) ) {
				$this->shipping_cost_data = $result;
			}
			
			$GLOBALS['profitblue_shipping_costs_data'] = $this->shipping_cost_data;
			
		} else {
			$this->shipping_cost_data = $GLOBALS['profitblue_shipping_costs_data'];
		}		
	
	}

	/**
	 * Get order shipping income
	 *
	 * @return void
	 */
	public function get_order_shipping_income() {

		$date = gmdate( 'Y-m-d', $this->order->order_date );
		$year = gmdate( 'Y', $this->order->order_date );

		$array = array();

		$shipping_cost_id = null;

		$shipping_cost_data_array 	= $this->get_shipping_cost_data( $date );
		$shipping_cost_id 			= $shipping_cost_data_array['shipping_cost_id'];
		$shipping_cost_id_data 		= $shipping_cost_data_array['shipping_cost_id_data'];

		
		$shipping_cost = 0;
		//Now we have shipping cost_id - proccess price
		if ( !empty( $this->shipping_cost_data ) ) {
			foreach( $this->shipping_cost_data as $shipping_cost_data ) {
				if ( $shipping_cost_data->shipping_costs_id == $shipping_cost_id && $shipping_cost_data->shipping_id == $this->order->order_shipping_id ) {
					$shipping_prices = $shipping_cost_data;
					break;
				}
			}
		}
		
		switch ( $shipping_cost_id_data->type ) {
			case 'variable-costs':
				if ( 'pecentage' == $shipping_cost_id_data->amount_type ) {
					if ( $shipping_cost_id_data->amount > 0 ) {
						$price = $this->order->order_subtotal;
						$shipping_cost = ( $price / 100 ) * $shipping_cost_id_data->amount;
					}
				} else {
					if ( $shipping_cost_id_data->amount > 0 ) {
						$shipping_cost = $shipping_cost_id_data->amount;
					}
				}
				break;
			case 'same-costs':
				$shipping_cost = (float)$this->order->order_shipping_subtotal;
				break;
			case 'custom-costs':
				if ( empty( $shipping_prices ) ) {
					$shipping_cost = 0;
				} else {
					$shipping_cost = (float)$shipping_prices->shipping_price;
				}
				break;
			case 'no-costs':
				$shipping_cost = 0;
				break;
			default:
				$shipping_cost = 0;
		}
	
		//Shipping cost
		$array = array(
			'shipping_cost' => $shipping_cost,
			'cost_type' => $shipping_cost_id_data->type
		);

		//COD price
		if ( !empty( $shipping_cost_data_array['shipping_cost_id_data']->cod_id ) ) {
			$array['cod_id'] = $shipping_cost_data_array['shipping_cost_id_data']->cod_id;
		}
		switch ( $shipping_cost_id_data->type ) {
			case 'variable-costs':
				//TODO - není jasné co přesně se bude počítat zde, použijeme fee z objednávky?							
				$array['cod_price'] = 0;				
				break;
			case 'same-costs':
				//Fee z objednávky?
				$array['cod_price'] = (float)$this->order->order_fees_subtotal;
				break;
			case 'custom-costs':
				if ( !empty( $shipping_prices->shipping_cod ) ) {
					$array['cod_price'] = (float)$shipping_prices->shipping_cod;
				}
				break;
			case 'no-costs':
				$array['cod_price'] = 0;
				break;
			default:
				$array['cod_price'] = 0;;
		}					

		return $array;

	}

	/**
	 * Get shipping cost id and shipping cost data for selected period
	 * 
	 * @since 1.0.0
	 */
	public function get_shipping_cost_data ( $date ) {

		$year = gmdate( 'Y', strtotime( $date ) );

		$shipping_cost_id = null;
		$shipping_cost_id_data = null;

		if ( empty( $this->shipping_cost ) ) {
			return array( 'shipping_cost_id' => $shipping_cost_id, 'shipping_cost_id_data' => $shipping_cost_id_data );
		}
		
		$use_this = get_option( 'profitblue-use-this-shipping-period' );
		if ( !empty( $use_this ) ) {
			foreach( $this->shipping_cost as $shipping_cost ) {
				if ( $shipping_cost->period_type == 'whole-period' ) {
					$shipping_cost_id = $shipping_cost->ID;
					$shipping_cost_id_data = $shipping_cost;
					break;
				}
			}
		} else {

			foreach( $this->shipping_cost as $shipping_cost ) {
				if ( $shipping_cost->period_type == 'custom-range' ) {
					if ( $date >= $shipping_cost->period_start && $date <= $shipping_cost->period_end ) {
						$shipping_cost_id = $shipping_cost->ID;
						$shipping_cost_id_data = $shipping_cost;
						break;
					}
				}			
			}
			if ( empty( $shipping_cost_id ) ) {
				foreach( $this->shipping_cost as $shipping_cost ) {
					if ( $shipping_cost->period_type == $year ) {
						$shipping_cost_id = $shipping_cost->ID;
						$shipping_cost_id_data = $shipping_cost;
						break;
					}
				}
			}
			if ( empty( $shipping_cost_id ) ) {
				foreach( $this->shipping_cost as $shipping_cost ) {
					if ( $shipping_cost->period_type == 'whole-period' ) {
						$shipping_cost_id = $shipping_cost->ID;
						$shipping_cost_id_data = $shipping_cost;
						break;
					}
				}
			}

		}

		return array( 'shipping_cost_id' => $shipping_cost_id, 'shipping_cost_id_data' => $shipping_cost_id_data );

	}

}
