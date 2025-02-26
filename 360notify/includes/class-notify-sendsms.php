<?php
/* This file is forked from the original author Micro Ocean Technologies's MoceanAPI Order SMS Notification plugin on 7/1/2024 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Notify_SendSMS_Sms {

	public static function send_sms($sms_from, $phone_no, $message, $medium='wordpress_order_notification') {
        if(empty($phone_no)) {
            return;
        }

        $medium='wordpress_order_notification';
	    $log = new Notify_WooCoommerce_Logger();

	    $api_key = notifysms_get_options('notifysms_woocommerce_api_key', 'notifysms_setting');
	    $api_secret = notifysms_get_options('notifysms_woocommerce_api_secret', 'notifysms_setting');
	    $sms_sender = notifysms_get_options('notifysms_woocommerce_sms_from', 'notifysms_setting');

	    if($api_key == '' || $api_key == '') return;
        $sms_from = !empty($sms_from) ? $sms_from : (!empty($sms_sender) ? $sms_sender : "360Messenger");

	    $log->add('360MessengerWhatsApp', 'Sending WhatsApp to '.$phone_no.', message: '.$message);

	    try {
	        $notifysms_rest = new NotifySMS($api_key, $api_secret);
	        $rest_response = $notifysms_rest->sendSMS($sms_from, $phone_no, $message, $medium);

	        self::insertToOutbox($sms_from, $phone_no, $message, "Message sent");

	        $log->add('360MessengerWhatsApp', 'response from WhatsApp gateway: ' .$rest_response);

	  		return 'true';

	    } catch (Exception $e) {
	        $log->add('360MessengerWhatsApp', 'Failed sent WhatsApp: ' . $e->getMessage());
	    }

	}

	public static function notify_get_account_balance($api_key, $api_secret){

	    $notifysms_rest = new NotifySMS($api_key, $api_secret);
	    $rest_response = $notifysms_rest->accountBalance();

	    $rest_response = json_decode($rest_response);

	    if($rest_response->{'status'} == 0){
			return $rest_response->{'value'};
	    }
	}

	public static function getPhoneNumber($message_to, $customer, $phone, $country, $filters='', $criteria=''){
        // Validate phone numbers here

		switch($message_to) {
		    case "customer_all":
                $numbers = self::getValidatedPhoneNumbers(get_users());
		    	#$numbers = self::getAllUsersPhones();
		    	break;
		    case "customer":
		    	$numbers = self::getValidatedPhoneNumbers($customer);
		    	// $numbers = self::getSpecificCustomerPhones($customer);
		    	break;
		    case "spec_group_ppl":
		    	$numbers = self::getFilteredUsers($filters, $criteria);
		    	// $numbers = self::getSpecificCustomerPhones($customer);
		    	break;
		    case "phones":
		    	$numbers = self::getUsersPhones($phone);
		    	break;
		    default: break;
		}

		return $numbers;
	}

    public static function getFilteredUsers($filters, $criteria) {

        $filtered_users = array();

        // get all users
        // filter them using filters and criteria
        if($filters == 'roles') {

            $args = array(
                'role__in' => $criteria,
            );

            $filtered_users = get_users($args);

        }

        if($filters == 'country') {

			$filtered_users = self::get_users_by_meta('country', $criteria);

        }

        if ($filters == 'status') {

			$filtered_users = self::get_users_by_meta('account_status', $criteria);
			
        }

        if ($filters == 'membership_level') {
            global $wpdb;
			$cache_key = 's_membership_level';
			$cache_group = 'custom_group';

			$results = wp_cache_get($cache_key, $cache_group);

			if ($results === false) {
				#$wpdb->prepare($sql_query, implode(', ', $criteria));
				$sql_query = ' SELECT user_id FROM wp_pmpro_memberships_users WHERE membership_id IN (%s) ';
				// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery , WordPress.DB.PreparedSQL.NotPrepared
				$results = $wpdb->get_results($wpdb->prepare($sql_query, implode(', ', $criteria)));
				wp_cache_set($cache_key, $results, $cache_group);
			}
            foreach($results as $result) {
                $filtered_users[] = get_user_by("ID", $result->user_id);
            }

        }

        return self::getValidatedPhoneNumbers($filtered_users);
    }

    public static function getValidatedPhoneNumbers($users) {
        $validatedUsers = array();
        if($users) {
            if(is_array($users)) {
                foreach ($users as $user) {
                    if(!($user instanceof WP_User)) {
                        $user = get_user_by('ID', $user);
                    }

                    $phone = self::get_formatted_number($user->phone, $user->country);
                    //$phone = true;
                    if ($phone) {
                        $user->phone = $phone;
                        array_push($validatedUsers, $user);
                    }
                }
            }
            else {
                $phone = self::get_formatted_number($users->phone, $users->country);
                //$phone = true;

                if($phone) {
                    $users->phone = $phone;
                    return $users;
                }
            }
        }

        return $validatedUsers;
    }

    public static function get_formatted_number($phone, $country = '') {
        $log = new Notify_WooCoommerce_Logger();

		$zero= substr($phone, 0, 1);

        if ($zero=='0'){
            $settings_country = !empty(notifysms_get_options('notifysms_woocommerce_country_code', 'notifysms_setting', '' )) ? notifysms_get_options('notifysms_woocommerce_country_code', 'notifysms_setting', '' ) : "US";
            $country = !empty($country) ? strtoupper($country) : strtoupper($settings_country);
            //$WC_Countries = new WC_Countries();
    		//$bcountry_code = $WC_Countries->get_country_calling_code( $country );
    		$countryInfo = new Notify_SendSMS_View();
    		$bcountry_code = $countryInfo->getPhonePrefixByCode($country);
    		$country_code = preg_replace( '/\D/is', '', $bcountry_code );
			$customer_phone_no = $country_code . ltrim($phone, '0');
		}else{
			$customer_phone_no = $phone;
		}
		$customer_phone_no = preg_replace('/[^0-9]/', '', $customer_phone_no);
		if ( ctype_digit( $customer_phone_no ) ) {
			return $customer_phone_no;
		}

		$log->add( '360MessengerWhatsApp', 'check number api failed' );

		return false;
    }

	private static function insertToOutbox($sender,$recipient,$message,$status){
		global $wpdb;

		$db = $wpdb;

		return $db->insert(
			NOTIFY_DB_TABLE_NAME,
			array(
				'sender'    => $sender,
				'message'   => $message,
				'recipient' => $recipient,
                'status'    => $status,
			)
		);
	}

	private static function getUsersPhones($phone_number)
	{
		$phone_number = explode(",", $phone_number);
		$phones = array();
		foreach ($phone_number as $phone) {
		 	$phones[] = self::get_formatted_number($phone);
		}
		return $phones;
	}
	
	private static function get_users_by_meta($meta_key, $meta_value) {
		global $wpdb;
		$cache_key = 's_get_users_by_meta';
		$cache_group = 'custom_group';

		$user_ids = wp_cache_get($cache_key, $cache_group);

		if ($user_ids === false) {
			$query = $wpdb->prepare("
				SELECT user_id
				FROM $wpdb->usermeta
				WHERE meta_key = %s
				AND meta_value = %s
			", $meta_key, $meta_value);
			// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery , WordPress.DB.PreparedSQL.NotPrepared
			$user_ids = $wpdb->get_col($query);
			wp_cache_set($cache_key, $user_ids, $cache_group);
		}
		
		if (!empty($user_ids)) {
			return get_users(array('include' => $user_ids));
		}

		return array();
	}
}