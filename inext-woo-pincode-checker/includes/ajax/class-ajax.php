<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class INEXT_WPC_AJAX {
	public static function inext_wpc_check_pin_code(){
		global $wpdb, $table_prefix;
		$pin_codes = array();
		$entered_pincode = $_POST['pin_code_value'];

		$shipping_zones = $wpdb->get_results("SELECT DISTINCT location_code FROM ". $table_prefix. "woocommerce_shipping_zone_locations WHERE location_type = 'postcode'");
		foreach($shipping_zones as $shipping_zone){
			foreach($shipping_zone as $k => $v){
				array_push($pin_codes, $v);
			}
		}

		if($entered_pincode == ''){
			$msg['status'] = 0;
			$msg['msg'] = get_option( INEXT_WPC_PLUGIN_PINCODE_FIELD_BLANK );
		}
		else{
			// Check for exact match
			if(in_array($entered_pincode, $pin_codes)){
				$msg['status'] = 1;
				$msg['msg'] = get_option( INEXT_WPC_PLUGIN_PINCODE_FIELD_SUCCESS );
			}
			else{
				foreach($pin_codes as $pin_code){
					if (strpos($pin_code, '...') !== false || strpos($pin_code, '*') || strpos($pin_code, ',') !== false) {
						// Check for multiple
						if (strpos($pin_code, ',') !== false) {
							$msg['status3'] = '3';
							$pin_codes = explode(',', $pin_code);

							if(in_array($entered_pincode, $pin_codes)){
								$msg['status'] = 1;
								$msg['msg'] = get_option( INEXT_WPC_PLUGIN_PINCODE_FIELD_SUCCESS );
								break;
							}

							foreach($pin_codes as $pin_code){
								$pin_code = trim($pin_code);
								if (strpos($pin_code, '...') !== false) {
									list($start, $end) = explode('...', $pin_code);
									if ($entered_pincode >= $start && $entered_pincode <= $end) {
										$msg['status'] = 1;
										$msg['msg'] = get_option( INEXT_WPC_PLUGIN_PINCODE_FIELD_SUCCESS );
										break;
									}
								}
								if (strpos($pin_code, '*') !== false) {
									$pattern = str_replace('*', '.*', $pin_code);
									if (preg_match('/^' . $pattern . '$/', $entered_pincode)) {
										$msg['status'] = 1;
										$msg['msg'] = get_option( INEXT_WPC_PLUGIN_PINCODE_FIELD_SUCCESS );
										break;
									}
								}
							}
						}
						// Check for range match
						if (strpos($pin_code, '...') !== false) {
							$msg['status1'] = '1';
							list($start, $end) = explode('...', $pin_code);
							if ($entered_pincode >= $start && $entered_pincode <= $end) {
								$msg['status'] = 1;
								$msg['msg'] = get_option( INEXT_WPC_PLUGIN_PINCODE_FIELD_SUCCESS );
								break;
							}
						}
						// Check for wildcard match
						if (strpos($pin_code, '*') !== false) {
							$msg['status2'] = '2';
							$pattern = str_replace('*', '.*', $pin_code);
							if (preg_match('/^' . $pattern . '$/', $entered_pincode)) {
								$msg['status'] = 1;
								$msg['msg'] = get_option( INEXT_WPC_PLUGIN_PINCODE_FIELD_SUCCESS );
								break;
							}
						}
					}
					else{
						$msg['status'] = 0;
						$msg['msg'] = get_option( INEXT_WPC_PLUGIN_PINCODE_FIELD_ERROR );
					}
				}
			}
		}
		_e(json_encode($msg));
		wp_die();
	}
}
?>
