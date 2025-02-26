<?php

namespace ProfitBlue\Models;

/**
 * ShippingCostsModel
 */
class ShippingCostsModel {
	
	/**
	 * wpdb
	 *
	 * @var object
	 * @since 1.0.0
	 */
	private $wpdb;
	
	/**
	 * __construct
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;

	}
	
	/**
	 * Saves or updates "no-cost" shipping data in the database.
	 *
	 * This method checks if shipping cost data for a given period exists in the database. 
	 * If it does not exist, it inserts new data. If it does exist, it updates the existing data.
	 * The method handles both fixed period types and custom date ranges for shipping data.
	 * If a payment code is provided, it is included in the data saved or updated.
	 *
	 * @param string $type The type of operation or data, not directly used within the method.
	 * @param string $period The period type for the shipping data (e.g., monthly, yearly, custom-range).
	 * @param int|null $cod_payment Optional. The payment code identifier to be included in the data.
	 * @param string|null $period_start Optional. The start date of the period, required if $period is 'custom-range'.
	 * @param string|null $period_end Optional. The end date of the period, required if $period is 'custom-range'.
	 * @return void
	 * 
	 * @since 1.0.0
	 */
	public function save_no_cost( $type, $period, $cod_payment = null, $period_start = null, $period_end = null ) {

		$data = array();
		$data['type'] = 'no-costs';
		$data['period_type'] = $period;
		$data['year'] = $period;
		if ( 'custom-range' == $period ) {
			$data['period_start'] = $period_start;
			$data['period_end'] = $period_end;
		}
		if ( null != $cod_payment ) {
			$data['cod_id'] = $cod_payment;
		}

		/**
		 * If whole period is selected, we must save same data for each period with no-cost setting
		 * 
		 */
		if ( 'whole-period' == $period ) {
			$shipping_costs_data = $this->get_all_shippings();
			if ( false ===  $shipping_costs_data ) {
				$this->insert_shipping_cost( $data );
			} else {
				unset( $data['period_type'] );
				unset( $data['year'] );
				unset( $data['period_start'] );
				unset( $data['period_end'] );
				foreach( $shipping_costs_data as $item ) {				
					$this->update_shipping_cost( $item->ID, $data );			
				}

			}	
		} else {
			$shipping_cost_data = $this->get_shipping_cost( $period, $period_start, $period_end );
			if ( false ===  $shipping_cost_data ) {
				$this->insert_shipping_cost( $data );
			} else {
				$this->update_shipping_cost( $shipping_cost_data[0]->ID, $data );			
			}
		}

			
					

	}
		
	/**
	 * save_same_cost
	 *
	 * @param  mixed $type
	 * @param  mixed $period
	 * @param  mixed $cod_payment
	 * @param  mixed $period_start
	 * @param  mixed $period_end
	 * @return void
	 */
	public function save_same_cost( $type, $period, $cod_payment = null, $period_start = null, $period_end = null ) {

		$data = array();
		$data['type'] = 'same-costs';
		$data['period_type'] = $period;
		if ( 'custom-range' == $period ) {
			$data['period_start'] = $period_start;
			$data['period_end'] = $period_end;
			$data['year'] = gmdate( 'Y', strtotime( $period_start ) );
		} else {
			$data['year'] = $period;
		}
		if ( null != $cod_payment ) {
			$data['cod_id'] = $cod_payment;
		}
		/**
		 * If whole period is selected, we must save same data for each period with no-cost setting
		 * 
		 */
		if ( 'whole-period' == $period ) {
			$shipping_costs_data = $this->get_all_shippings();
			if ( false ===  $shipping_costs_data ) {
				$this->insert_shipping_cost( $data );
			} else {
				unset( $data['period_type'] );
				unset( $data['year'] );
				unset( $data['period_start'] );
				unset( $data['period_end'] );
				foreach( $shipping_costs_data as $item ) {
					$this->update_shipping_cost( $item->ID, $data );			
				}

			}	
		} else {
			$shipping_cost_data = $this->get_shipping_cost( $period, $period_start, $period_end  );
			if ( false ===  $shipping_cost_data ) {
				$this->insert_shipping_cost( $data );
			} else {
				$this->update_shipping_cost( $shipping_cost_data[0]->ID, $data );
			}
		}

	}
	
	/**
	 * save_custom_cost
	 *
	 * @param  mixed $type
	 * @param  mixed $period
	 * @param  mixed $cod_payment
	 * @param  mixed $period_start
	 * @param  mixed $period_end
	 * @return void
	 */
	public function save_custom_cost( $type, $period, $cod_payment = null, $period_start = null, $period_end = null ) {

		$data = array();
		$data['type'] = $type;
		$data['period_type'] = $period;
		$data['year'] = $period;
		if ( 'custom-range' == $period ) {
			$data['period_start'] = $period_start;
			$data['period_end'] = $period_end;
			$data['year'] = gmdate( 'Y', strtotime( $period_start ) );
		} else {
			$data['year'] = $period;
		}
		if ( null != $cod_payment ) {
			$data['cod_id'] = $cod_payment;
		}

		/**
		 * If whole period is selected, we must save same data for each period with no-cost setting
		 * 
		 */
		if ( 'whole-period' == $period ) {
			$shipping_costs_data = $this->get_all_shippings();
			if ( false ===  $shipping_costs_data ) {
				$this->insert_shipping_cost( $data );
			} else {
				unset( $data['period_type'] );
				unset( $data['year'] );
				unset( $data['period_start'] );
				unset( $data['period_end'] );
				foreach( $shipping_costs_data as $item ) {
					$this->update_shipping_cost( $item->ID, $data );			
				}

			}	
		} else {
			$shipping_cost_data = $this->get_shipping_cost( $period, $period_start, $period_end  );
			if ( false ===  $shipping_cost_data ) {
				$id = $this->insert_shipping_cost( $data );
				return $id;
			} else {
				$this->update_shipping_cost( $shipping_cost_data[0]->ID, $data );
				return $shipping_cost_data[0]->ID;
			}
		}

	}
	
	/**
	 * save_variable_cost
	 *
	 * @param  mixed $type
	 * @param  mixed $period
	 * @param  mixed $label
	 * @param  mixed $amount_type
	 * @param  mixed $amount
	 * @param  mixed $cod_payment
	 * @param  mixed $period_start
	 * @param  mixed $period_end
	 * @return void
	 */
	public function save_variable_cost( $type, $period, $label, $amount_type, $amount, $cod_payment = null, $period_start = null, $period_end = null ) {

		$data = array();
		$data['type'] = 'variable-costs';
		$data['label'] = $label;
		$data['amount_type'] = $amount_type;
		$data['amount'] = $amount;
		$data['period_type'] = $period;
		if ( 'custom-range' == $period ) {
			$data['period_start'] = $period_start;
			$data['period_end'] = $period_end;
			$data['year'] = gmdate( 'Y', strtotime( $period_start ) );
		} else {
			$data['year'] = $period;
		}
		if ( null != $cod_payment ) {
			$data['cod_id'] = $cod_payment;
		}
		
		/**
		 * If whole period is selected, we must save same data for each period with no-cost setting
		 * 
		 */
		if ( 'whole-period' == $period ) {
			$shipping_costs_data = $this->get_all_shippings();
			if ( false ===  $shipping_costs_data ) {
				$this->insert_shipping_cost( $data );
			} else {
				unset( $data['period_type'] );
				unset( $data['year'] );
				unset( $data['period_start'] );
				unset( $data['period_end'] );
				foreach( $shipping_costs_data as $item ) {
					$this->update_shipping_cost( $item->ID, $data );			
				}

			}	
		} else {
			$shipping_cost_data = $this->get_shipping_cost( $period, $period_start, $period_end );

			if ( false ===  $shipping_cost_data ) {
				$id = $this->insert_shipping_cost( $data );
				return $id; 
			} else {
				$this->update_shipping_cost( $shipping_cost_data[0]->ID, $data );
				return $shipping_cost_data[0]->ID;
			}

		}

	}
		
	/**
	 * get_shipping_cost
	 *
	 * @param  mixed $period
	 * @param  mixed $date_start
	 * @param  mixed $date_end
	 * @return void
	 */
	public function get_shipping_cost( $period, $date_start = null, $date_end = null  ) {

		global $wpdb;

		if ( 'custom-range' == $period ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE period_type = %s AND period_start = %s AND period_end = %s",
					array(
						$wpdb->prefix . 'profitblue_shiping_costs',
						$period,
						$date_start,
						$date_end			
					)
				)
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE period_type = %s",
					array(
						$wpdb->prefix . 'profitblue_shiping_costs',
						$period
					)
				)
			);
		}
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}
	
	/**
	 * Get all shippings
	 *
	 * @param  mixed $period
	 * @param  mixed $date_start
	 * @param  mixed $date_end
	 * @return void
	 */
	public function get_all_shippings() {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_shiping_costs'
				)
			)
		);
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}
	
	/**
	 * insert_shipping_cost
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function insert_shipping_cost( $data ) {

		$this->wpdb->insert( $this->wpdb->prefix . 'profitblue_shiping_costs', $data );

		return $this->wpdb->insert_id;

	}
	
	/**
	 * update_shipping_cost
	 *
	 * @param  mixed $shipping_cost_id
	 * @param  mixed $data
	 * @return void
	 */
	public function update_shipping_cost( $shipping_cost_id, $data ) {

		$this->wpdb->update( $this->wpdb->prefix . 'profitblue_shiping_costs', $data, array( 'ID' => $shipping_cost_id ) );

	}
	
	/**
	 * save_shipping_cost
	 *
	 * @param  mixed $shipping_cost_id
	 * @param  mixed $shipping_id
	 * @param  mixed $amount
	 * @param  mixed $cod
	 * @return void
	 */
	public function save_shipping_cost( $shipping_cost_id, $shipping_id, $amount, $cod = null,  ) {

		$data = array();
		$data['shipping_costs_id'] = $shipping_cost_id;
		$data['shipping_id'] = $shipping_id;
		if ( !empty( $cod ) ) {
			$data['shipping_cod'] = $cod;
		} else {
			$data['shipping_cod'] = 0;
		}
		if ( !empty( $amount ) ) {
			$data['shipping_price'] = $amount;
		} else {
			$data['shipping_price'] = 0;
		}

		$shipping_id_item = $this->get_shipping_item( $shipping_id, $shipping_cost_id );
		
		if ( false ===  $shipping_id_item ) {
			$this->insert_shipping_item( $data );
		} else {
			$this->update_shipping_item( $shipping_id_item[0]->ID, $data );
		}

	}

	/**
	 * save_shipping_costs
	 *
	 * @param  mixed $shipping_cost_id
	 * @param  mixed $shipping_id
	 * @param  mixed $amount
	 * @param  mixed $cod
	 * @return void
	 */
	public function save_shipping_costs( $shipping_id, $amount, $cod = null,  ) {

		$data = array();
		//$data['shipping_costs_id'] = $shipping_cost_id;
		$data['shipping_id'] = $shipping_id;
		if ( !empty( $cod ) ) {
			$data['shipping_cod'] = $cod;
		} else {
			$data['shipping_cod'] = 0;
		}
		if ( !empty( $amount ) ) {
			$data['shipping_price'] = $amount;
		} else {
			$data['shipping_price'] = 0;
		}

		$shipping_costs_data = $this->get_all_shippings();
		if ( false !==  $shipping_costs_data ) {
			foreach( $shipping_costs_data as $item ) {
				$shipping_id_item = $this->get_shipping_item( $shipping_id, $item->ID );	
				if ( false ===  $shipping_id_item ) {
					$data['shipping_costs_id'] = $item->ID;
					$this->insert_shipping_item( $data );
				} else {
					$this->update_shipping_item( $shipping_id_item[0]->ID, $data );
				}
			}

		}	

		

	}
	
	/**
	 * get_shipping_item
	 *
	 * @param  mixed $shipping_id
	 * @param  mixed $shipping_cost_id
	 * @return void
	 */
	public function get_shipping_item( $shipping_id, $shipping_cost_id ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE shipping_id = %s AND shipping_costs_id = %s",
				array(
					$wpdb->prefix . 'profitblue_shipping_costs_data',
					$shipping_id,
					$shipping_cost_id				
				)
			)
		);
		
		if ( empty( $result ) ) {
			return false;
		} else {
			return $result;
		}

	}
	
	/**
	 * insert_shipping_item
	 *
	 * @param  array $data
	 * @return int|false
	 * @since 1.0.0
	 */
	public function insert_shipping_item( $data ) {

		$this->wpdb->insert( $this->wpdb->prefix . 'profitblue_shipping_costs_data', $data );

		return $this->wpdb->insert_id;

	}
	
	/**
	 * update_shipping_item
	 *
	 * @param  int $shipping_id_item
	 * @param  array $data
	 * @return void
	 * @since 1.0.0
	 */
	public function update_shipping_item( $shipping_id_item, $data ) {

		$this->wpdb->update( $this->wpdb->prefix . 'profitblue_shipping_costs_data', $data, array( 'ID' => $shipping_id_item ) );

	}

}
