<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HBAgency_Rest_API {
	
	private static $API_URL = 'https://wpapi.hbagency.ai/wpApi/';

	public static function register($website_id) {
		$apiResponse = wp_remote_post(self::$API_URL . 'register', array(
				'body'        => array(
					'website_id' => $website_id
        			)
        		)
		);
		
		if( is_wp_error( $apiResponse ) ) {
	    	echo esc_html($apiResponse->get_error_message());
			return false;
		}	
		
		$resultBody = json_decode( wp_remote_retrieve_body( $apiResponse ));
		if($resultBody->statusCode != 'SC_OK') {
			return false;
		}
		
		return HBAgency_Service::save_website($website_id, $resultBody->payload);
	}
	
	public static function refresh() {
		$website_id = get_option('hbagency_wp_website_id');
		$apiResponse = wp_remote_get(self::$API_URL . 'website', array(
				'headers'        => array(
					'HBToken' => base64_encode($website_id)
        			)
        		)
		);
		
		if( is_wp_error( $apiResponse ) ) {
	    		return false;
		}	
		
		$resultBody = json_decode( wp_remote_retrieve_body( $apiResponse ));
		if($resultBody->statusCode != 'SC_OK') {
			return false;
		}
		
		return HBAgency_Service::update_website($resultBody->payload);
	}
	
	public static function reload_placements($website_id) {
		$apiResponse = wp_remote_get(self::$API_URL . 'website/zone', array(
				'headers'        => array(
					'HBToken' => base64_encode($website_id)
        			)
        		)
		);
		
		if( is_wp_error( $apiResponse ) ) {
	    		return false;
		}	
		
		$resultBody = json_decode( wp_remote_retrieve_body( $apiResponse ));
		if($resultBody->statusCode != 'SC_OK') {
			return false;
		}
		
		HBAgency_Service::save_placements($resultBody->payload);
		
		return true;
	}
	
	public static function check_ads_txt() {
	
	}
	
}
