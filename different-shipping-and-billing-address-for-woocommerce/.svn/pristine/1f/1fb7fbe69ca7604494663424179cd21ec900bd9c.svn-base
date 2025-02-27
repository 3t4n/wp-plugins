<?php

use Automattic\WooCommerce\Blocks\Integrations\IntegrationInterface;


class Blocks_Integration implements IntegrationInterface {

    
	public function get_name() {
		return 'multiple-billing-address';
	}

	
	public function initialize() {
		$this->register_block_frontend_scripts();
		$this->register_block_editor_scripts();
	}

	public function get_script_handles() {
		return array( 'DSABAFW-front' );
	}

	
	public function get_editor_script_handles() {
		return array( 'DSABAFW-back' );
	}

	public function get_script_data() {
		return array();
	}

	public function register_block_editor_scripts() {
		wp_register_script(
			'DSABAFW-back',
			plugins_url( 'build/backend.js', __FILE__ ),
			array('react', 'wc-blocks-checkout', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-i18n'),
		);

	}
	
	
	public function register_block_frontend_scripts() {
		wp_register_script(
			'DSABAFW-front',
			plugins_url('build/frontend.js', __FILE__),
			array('react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n'),
			false,
			true
		);
	
		global $wpdb, $dsabafw_comman;
		$current_user_id = get_current_user_id();
		
		if(is_user_logged_in()){		
			$query = $wpdb->prepare(
				"SELECT * FROM {$wpdb->prefix}dsabafw_billingadress WHERE userid = %d",
				$current_user_id
			);
			$address_rows = $wpdb->get_results($query, ARRAY_A);
		} else {
			$address_rows = [];
			if (isset($_COOKIE['dsabafw_guest_user_data'])) {
                // Decode the existing cookie value
                $address_rows = json_decode(stripslashes($_COOKIE['dsabafw_guest_user_data']), true);
			}
		}

		$billing_user_data = [];
		$shipping_user_data = [];
	
		if (!empty($address_rows)) {
			foreach ($address_rows as $index => $address_row) {
				if (!empty($address_row['userdata'])) {
					$unserialized_data = maybe_unserialize($address_row['userdata']);
					if ($address_row['type'] === 'billing') {
						$billing_user_data["address" . ($index + 1)] = $unserialized_data;
					} elseif ($address_row['type'] === 'shipping') {
						$shipping_user_data["address" . ($index + 1)] = $unserialized_data;
					}
				}
			}
		}

		if(is_user_logged_in()){	
			// Query to count billing and shipping addresses
			$query = $wpdb->prepare(
				"SELECT type, COUNT(*) as count 
				FROM {$wpdb->prefix}dsabafw_billingadress 
				WHERE userid = %d 
				GROUP BY type",
				$current_user_id
			);
			$user = $wpdb->get_results($query);
		
			$save_address = !empty($user) ? intval($user[0]->count) : 0;
		} else {
			$save_address = 0;
			if (isset($_COOKIE['dsabafw_guest_user_data'])) {
                // Decode the existing cookie value
                $user = json_decode(stripslashes($_COOKIE['dsabafw_guest_user_data']), true);
			}
		}


		$max_shipping_count = intval($dsabafw_comman['dsabafw_max_shipping_adress']);
		$max_billing_count = intval($dsabafw_comman['dsabafw_max_adress']);
		
	
		// Localize script data
		$dsabafw_data = array(
			'dsabafw_variable' => array(
				'dsabafw_billing_user_data' => $billing_user_data,
				'dsabafw_shipping_user_data' => $shipping_user_data,
				'max_billing_count' => $max_billing_count,
				'max_shipping_count' => $max_shipping_count,
			),
			'ajax_url' => admin_url('admin-ajax.php'),
		);
	
		// Pass the data to the JavaScript file
		wp_localize_script('DSABAFW-front', 'DSABAFW_VARS', $dsabafw_data);
		wp_enqueue_script('DSABAFW-front');
	}
	
	
	
}
