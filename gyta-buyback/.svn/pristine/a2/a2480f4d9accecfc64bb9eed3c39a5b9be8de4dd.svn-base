<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Start: EasyPost/Shipping Label Button Display
 **/
 
class WCPTI_EasyPost {
	
	static function validateAddress($params=array()) {
		$easypost_api_key = get_option( 'wcpti_settings_easypost_api_key' );
		if($easypost_api_key=='') {
			return array('success'=>false, 'message'=>"EasyPost API Key not on file, cannot verify address");
		}
		$from_address = array();
		//$from_address['name'] = $orderObj->get_shipping_first_name().' '.$orderObj->get_shipping_last_name();
		$from_address['street1'] = $params['billing_address_1'];
		$street2 = $params['billing_address_2'];
		if($street2) {
			$from_address['street2'] = $street2;
		}
		$from_address['city'] = $params['billing_city'];
		$from_address['state'] = $params['billing_state'];
		$from_address['zip'] = $params['billing_postcode'];
		$from_address['country'] = $params['billing_country'];
		$from_address['phone'] = preg_replace("/[^0-9]/", "", $params['billing_phone']);
		
		// EasyPost doesn't seem to check the phone number on addresses, even though it requires it for shipments…
		if(strlen($from_address['phone'])<10) {
			return array('success'=>false, 'message'=>'Invalid phone number: must be 10 digits');
		}
		if($from_address['street1']=='') {
			return array('success'=>false, 'message'=>'Required field missing: Street');
		}
		if($from_address['city']=='') {
			return array('success'=>false, 'message'=>'Required field missing: City');
		}
		if($from_address['country']=='GB') { // UK / Great Britain, same thing according to Woo
		} else {
			if($from_address['state']=='') {
				return array('success'=>false, 'message'=>'Required field missing: State, Province');
			}
		}
		if($from_address['zip']=='') {
			return array('success'=>false, 'message'=>'Required field missing: Postal Code');
		}
		if($from_address['country']=='') {
			return array('success'=>false, 'message'=>'Required field missing: Country');
		}
		/*
		$jdata = array(	'address'=>$from_address,
						'mode'=>get_option( 'wcpti_settings_easypost_mode' ),
						);
		*/
		
		$url = 'https://api.easypost.com/v2/addresses';
		$response = wp_remote_post( $url, array(
												'method'	=> 'POST',
												'body'		=> json_encode(['address'=>$from_address, 'verify'=>'delivery']),
												'headers'	=> array(
													'Authorization' => 'Basic ' . base64_encode( $easypost_api_key ),
													'Content-Type'  => 'application/json',
												),
											) );
		$body = $response['body'];
		$order_id = $params['order_id']; // Ensure 'order_id' is passed in $params
		$order = wc_get_order( $order_id );
		
		if ( $order ) {
			$order->update_meta_data( '_wcpti_easypost_address_validation_response_body', $body );
			$order->save();
		} else {
			// Handle the case where the order is not found
			return array(
				'success' => false,
				'message' => 'Order not found.',
				'response' => $body
			);
		}
		
		$jresponse = json_decode( $body, true );
		if(is_array($jresponse) && isset($jresponse['verifications']['delivery'])) {
			$delivery = $jresponse['verifications']['delivery'];
			if($delivery['success']===true) {
				return array('success'=>true, 'message'=>$jresponse['verifications'], 'response'=>$body);
			} else if(is_array($delivery['errors'])) {
				$messages = array();
				foreach($delivery['errors'] AS $jerror) {
					$messages[] = $jerror['message'];
				}
				return array('success'=>false, 'message'=>$messages, 'response'=>$body);
			} else {
				return array('success'=>false, 'message'=>$jresponse['verifications'], 'response'=>$body);
			}
		} else {
			return array('success'=>false, 'message'=>$jresponse['verifications'], 'response'=>$body);
		}
		
	}

	static function createLabel($params=array()) {
		$orderObj = $params['orderObj'];
		$order_id = $params['order_id'];
		$order = wc_get_order($order_id);
		$order->update_meta_data('_wcpti_easypost_error', null );
		$order->update_meta_data('_wcpti_easypost_error_debug', null);
		$order->save();
		// do stuff
		$easypost_api_key = get_option( 'wcpti_settings_easypost_api_key' );
		if($easypost_api_key=='') {
			$order->update_meta_data('_wcpti_easypost_error', "Configuration Error Code 212" );
			$order->save();
			return;
		}
		
		$jdata = array();
		$to_address = array();
		$to_address['name'] = sanitize_text_field(get_option( 'wcpti_settings_shipping_name' ));
		$to_address['street1'] = sanitize_text_field(get_option( 'wcpti_settings_address_1' ));
		$street2 = sanitize_text_field(get_option( 'wcpti_settings_address_2' ));
		if($street2) {
			$to_address['street2'] = $street2;
		}
		$to_address['city'] = sanitize_text_field(get_option( 'wcpti_settings_city' ));
		$to_address['state'] = sanitize_text_field(get_option( 'wcpti_settings_state' ));
		$to_address['zip'] = sanitize_text_field(get_option( 'wcpti_settings_postal_code' ));
		$to_address['country'] = sanitize_text_field(get_option( 'wcpti_settings_country' ));
		$to_address['company'] = sanitize_text_field(get_option( 'wcpti_settings_company_name' ));
		$to_address['phone'] = sanitize_text_field(get_option( 'wcpti_settings_shipping_phone_number' ));
		
		$from_address = array();
		$from_address['name'] = sanitize_text_field($orderObj->get_shipping_first_name().' '.$orderObj->get_shipping_last_name());
		$from_address['street1'] = sanitize_text_field($orderObj->get_shipping_address_1());
		$street2 = sanitize_text_field($orderObj->get_shipping_address_2());
		if($street2) {
			$from_address['street2'] = $street2;
		}
		$from_address['city'] = sanitize_text_field($orderObj->get_shipping_city());
		if($orderObj->get_shipping_state()) {
			$from_address['state'] = sanitize_text_field($orderObj->get_shipping_state());
		}
		$from_address['zip'] = sanitize_text_field($orderObj->get_shipping_postcode());
		$from_address['country'] = sanitize_text_field($orderObj->get_shipping_country());
		$shipping_from_array = $orderObj->get_address();
		$from_address['phone'] = sanitize_text_field($shipping_from_array['phone']);
		
		$order = wc_get_order($order_id);
		$weight = $order->get_meta('_cart_weight');
		$weight_ounces = false;
		if($weight=='' || $weight=='0') {
			$item_count = $orderObj->get_item_count();
			if($item_count=='') {
				$item_count = 1;
			}
			$weight_ounces = ($item_count*16); // assume 2 lbs;
		} else {
			$weight_units = get_option( 'woocommerce_weight_unit' );
			if($weight_units=='lbs') {
				$weight_ounces = round($weight * 16.0,1);
			} else if($weight_units=='kg') {
				$weight_ounces = round($weight * 35.274,1);
			} else if($weight_units=='g') {
				$weight_ounces = round($weight / 28.35,1);
			} else if($weight_units=='oz') {
				$weight_ounces = round($weight,1);
			}
		}
		
		$parcel = array();
		$parcel['weight'] = $weight_ounces;
		$carrier_service = get_option('wcpti_settings_easypost_compound_carrier_service');
		$carrier = false;
		$service = false;
		$rate_id = false;
		if($carrier_service!='') {
			list($carrier,$service) = explode('.',$carrier_service);
		}
		if(strtolower($carrier)=='royalmail' && get_option('wcpti_settings_easypost_royal_mail_predefined_package_size')!='') {
			$parcel['predefined_package'] = get_option('wcpti_settings_easypost_royal_mail_predefined_package_size');
		}
		// https://www.easypost.com/service-levels-and-parcels
		//$parcel['predefined_package'] = 'MEDIUMPARCEL';
		/*
			for Royal Mail, the options are:
			LARGELETTER
			SMALLPARCEL
			MEDIUMPARCEL
			LETTER
			PRINTEDPAPER
		*/
		$options = array('print_custom_1'=>'Order # '.$orderObj->get_id());
		
		$jdata = array(	'to_address'=>$to_address,
						'from_address'=>$from_address,
						'return_address' => $from_address,
						'parcel'=>$parcel,
						//'is_return' => true,
						'options'=>$options,
						//'mode'=>get_option( 'wcpti_settings_easypost_mode' ), //! I don't think mode is required…
						);

		if(str_starts_with(strtolower($carrier),'interlink')) {
			//$postage_label = ['label_size'=>'8.5x11'];
			//$jdata['postage_label'] = $postage_label;
			$jdata['options']['label_format'] = 'PDF';
			$jdata['options']['label_size'] = '8.5x11';
		}
		

		/*
		echo "<pre>";
			var_dump($jdata);
		echo "</pre>";
		*/
		$url = 'https://api.easypost.com/v2/shipments';
		$body_array = ['shipment'=>$jdata];
		$order->update_meta_data('_wcpti_easypost_submit_body', json_encode($body_array));
		$order->save();
		$response = wp_remote_post( $url, array(
												'method'	=> 'POST',
												'body'		=> json_encode($body_array),
												'headers'	=> array(
													'Authorization' => 'Basic ' . base64_encode( $easypost_api_key ),
													'Content-Type'  => 'application/json',
												),
												//'timeout'    => 60,
												//'redirection'=> 5,
												//'blocking'   => true,
												// 'sslverify'   => false,
												//'data_format' => 'body',
												
											) );
		
		if(false) {
			echo "<pre>";
				var_dump($response);
			echo "</pre>";
		}
		$body = $response['body'];
		$jresponse = json_decode($body,true);
		$order->update_meta_data('_wcpti_easypost_response_body', $body);
		$order->save();
		if(false) {
			echo "<pre>";
				var_dump($jresponse);
			echo "</pre>";
			exit;
		}
		if(isset($jresponse['error'])) {
			$error_display = $jresponse['error']['code'].': '.$jresponse['error']['message'];
			//echo 'error to display: '.$error_display.'<br>';
			$order->update_meta_data('_wcpti_easypost_error', $error_display );
			$order->update_meta_data('_wcpti_easypost_error_debug', $jresponse['error'] );
			$order->save();
		}
		if(isset($jresponse['rates']) && is_array($jresponse['rates']) && count($jresponse['rates'])>0) {
			$shipment_id = $jresponse['id'];
			$carrier_service = get_option('wcpti_settings_easypost_compound_carrier_service');
			$carrier = false;
			$service = false;
			$rate_id = false;
			$cheapest_amount = false;
			$chosen_rate_object = false;
			if($carrier_service!='') {
				list($carrier,$service) = explode('.',$carrier_service);
			}
			/*
			echo "<pre>";
				var_dump($jresponse['rates']);
			echo "</pre>";
			exit;
			*/
			/*
					// UPS Digital Access uses "UPSDAP" instead of "UPS".  Nobody's complained yet, but it's an issue.
					(
						strtolower($rate['carrier'])==strtolower($carrier) 
						||
						(strtolower($rate['carrier'])=='upsdap' && strtolower($carrier)=='ups')
					)
					&& strtolower($rate['service'])==strtolower($service)
					
			*/
			foreach($jresponse['rates'] AS $rate) {
				if(strtolower($rate['carrier'])==strtolower($carrier) && strtolower($rate['service'])==strtolower($service)) {
					$rate_id = $rate['id'];
					$chosen_rate_object = $rate;
					break;
				}
				if($cheapest_amount===false || $rate['rate'] < $cheapest_amount) {
					$cheapest_amount = $rate['rate'];
					$rate_id = $rate['id'];
					$chosen_rate_object = $rate;
				}
			}
			
			// buy the shipment @ rate
			if($rate_id!='') {
				$jdata = array();
				$jdata['rate']['id'] = $rate_id;
				//$jdata['insurance'] = "500.23";
				$order->update_meta_data('_wcpti_easypost_shipment_id', $shipment_id);
				$order->save();
				$url = 'https://api.easypost.com/v2/shipments/'.$shipment_id.'/buy';
				$response = wp_remote_post( $url, array(
														'method'	=> 'POST',
														'body'		=> json_encode($jdata),
														'headers'	=> array(
															'Authorization' => 'Basic ' . base64_encode( $easypost_api_key ),
															'Content-Type'  => 'application/json',
														),
													) );
				$body = $response['body'];
				$jresponse = json_decode($body,true);
				/*
				echo "<pre>";
					var_dump($jresponse);
				echo "</pre>";
				*/
				if(isset($jresponse['error'])) {
					$error_display = $jresponse['error']['code'].': '.$jresponse['error']['message'];
					//echo 'error to display: '.$error_display.'<br>';
					$order->update_meta_data('_wcpti_easypost_error', $error_display );
					$order->update_meta_data('_wcpti_easypost_error_debug', $jresponse['error'] );
					$order->save();
				}
				else {
					$order->update_meta_data('wcpti_easypost_selected_rate', $jresponse['selected_rate']);
					$order->update_meta_data('wcpti_easypost_postage_label', $jresponse['postage_label']);
					
					$order->update_meta_data('_wcpti_easypost_postage_label_png_url', $jresponse['postage_label']['label_url']);
					
					if(isset($jresponse['tracker']) && is_array($jresponse['tracker']) && count($jresponse['tracker'])>0) {
						$tracking_code = $jresponse['tracker']['tracking_code'];
						$public_tracking_url = $jresponse['tracker']['public_url'];
						$order->update_meta_data('_wcpti_easypost_tracking', $jresponse['tracker']);
						$order->update_meta_data('_wcpti_easypost_tracking_code', $tracking_code);
					}
					$order->save();
					return true;
				}
				
			} else {
				$order->update_meta_data('_wcpti_easypost_error', "Error selecting rate. Error Code 214." );
				$order->update_meta_data('_wcpti_easypost_error_debug', $jresponse );
				$order->save();
			}
			
		} else if(isset($jresponse['messages'])) {
			$messages = array();
			foreach($jresponse['messages'] AS $tmsg) {
				if(isset($tmsg['message'])) {
					$messages[] = $tmsg['message'];
				}
			}
			if(count($messages)>0) {
				$order->update_meta_data('_wcpti_easypost_error', implode('. ',$messages));
				$order->update_meta_data('_wcpti_easypost_error_debug', $jresponse );
			} else {
				$order->update_meta_data('_wcpti_easypost_error', "No rates available & no messages presented. Error Code 215." );
				$order->update_meta_data('_wcpti_easypost_error_debug', $jresponse );
			}
			$order->save();
		} else {
			$order->update_meta_data('_wcpti_easypost_error', "No rates available. Error Code 213." );
			$order->update_meta_data('_wcpti_easypost_error_debug', $jresponse );
			$order->save();
		}
		
	}
 }

/**
 * End: EasyPost/Shipping Label Button Display
 **/