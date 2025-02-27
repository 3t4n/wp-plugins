<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

class HBAgency_Ajax_Api {

	static function error($code) {
		$ajax_response = new HBAgency_Ajax_Response();
		$ajax_response->set_status_code("KO");
		$ajax_response->set_payload('Something went wrong - ' . $code . ' - Contact our support');
		echo wp_json_encode($ajax_response);
	}
	
	static function register() {
		check_ajax_referer('hb_register_nonce', 'hb_nonce');
		global $wpdb;
	
		$ajax_response = new HBAgency_Ajax_Response();
		if(!isset($_POST['website_id'])) {
			$ajax_response->set_payload("Something wrong happened");    
			$ajax_response->set_status_code("KO");
			echo wp_json_encode($ajax_response);
			wp_die(); 
		}
		$website_id = sanitize_key($_POST['website_id']);
		if(empty($website_id) || !preg_match('/^[a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12}$/', $website_id)) {
			$ajax_response->set_status_code("KO");
			$ajax_response->set_payload("Invalid token");
			echo wp_json_encode($ajax_response);
			wp_die();
		}
		
		$api = new HBAgency_Rest_API();
		$result = $api->register($website_id);
		if($result) {
			$ajax_response->set_payload("Registration completed");    
			$ajax_response->set_status_code("OK");
		} else {
			$ajax_response->set_payload("Something wrong happened");    
			$ajax_response->set_status_code("KO");
		}
		
		echo wp_json_encode($ajax_response);
		wp_die(); 
	}
	
	
	static function refresh() {
		$ajax_response = new HBAgency_Ajax_Response();
		
		$api = new HBAgency_Rest_API();
		$result = $api->refresh();
		if($result) {
			$ajax_response->set_payload("Registration completed");	
			$ajax_response->set_status_code("OK");
		} else {
			$ajax_response->set_payload("Something wrong happened");	
			$ajax_response->set_status_code("KO");
		}
		
		echo wp_json_encode($ajax_response);
		wp_die(); 
	}
	
	static function reload_placements() {
		check_ajax_referer('hb_reload_placements_nonce', 'hb_reload_nonce');
		global $wpdb; 
		$ajax_response = new HBAgency_Ajax_Response();
		$website_id = get_option('hbagency_wp_website_id');
		if(empty($website_id) || !preg_match('/^[a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12}$/', $website_id)) {
			$ajax_response->set_status_code("KO");
			$ajax_response->set_payload("Invalid token");
			echo wp_json_encode($ajax_response);
			wp_die();
		}
		
		$api = new HBAgency_Rest_API();
		$result = $api->reload_placements($website_id);
		if($result) {
			$ajax_response->set_payload("Reload completed");	
			$ajax_response->set_status_code("OK");
		} else {
			$ajax_response->set_payload("Something wrong happened");	
			$ajax_response->set_status_code("KO");
		}
		
		echo wp_json_encode($ajax_response);
		wp_die(); 
	}

	private static function return_json_error() {
		$ajax_response = new HBAgency_Ajax_Response();
		$ajax_response->set_payload("Something wrong happened");	
		$ajax_response->set_status_code("KO");
		echo wp_json_encode($ajax_response);
		wp_die(); 
	} 

	static function save_placements() {
		check_ajax_referer('hb_save_placements', 'hb_placement_nonce');
		global $wpdb;

		$result = '';
		$ajax_response = new HBAgency_Ajax_Response();
		if(!isset($_POST['data'])) {
			$ajax_response->set_payload("Something wrong happened");    
			$ajax_response->set_status_code("KO");
			echo wp_json_encode($ajax_response);
			wp_die(); 
		}
		$params = json_decode(sanitize_text_field(wp_unslash($_POST['data'])), true);	
		$placements = get_option('hbagency_wp_website_placements');
		foreach($placements as $p) {
			update_option("hbagency_wp_placement_" . $p->id, 0);
		}

		foreach($params as $p) {
			$key = sanitize_text_field($p['name']);
			$value = sanitize_text_field($p['value']);
			if(!str_starts_with($key, "C-")) {
				continue;
			}
			
			if(!preg_match(HBAGENCY_PLACEMENTS_REGEXP, $key)) {
				HBAgency_Ajax_Api::return_json_error();
			}
	
			if(str_ends_with($key, "-COUNT")) {
				if(!is_numeric($value)) {
					HBAgency_Ajax_Api::return_json_error();
				}
				self::update_placement_option($key, "COUNT", $value);
			} else if(str_ends_with($key, "-PAR")) {
				if(!is_numeric($value)) {
					HBAgency_Ajax_Api::return_json_error();
				}
				self::update_placement_option($key, "PAR", $value);
			} else if(str_ends_with($key, "-POS")) {
				if(!is_numeric($value)) {
					HBAgency_Ajax_Api::return_json_error();
				}
				self::update_placement_option($key, "POS", $value);
			} else {
				$id = substr($key, 2);
				if(is_numeric($id)) {
					update_option("hbagency_wp_placement_" . $id, $value == 'on');
				}
			}
		}

		delete_option('hbagency_wp_website_placements_cache_inarticle');
		$ajax_response->set_payload("Operation completed" . $result);	
		$ajax_response->set_status_code("OK");
		
		echo wp_json_encode($ajax_response);
		wp_die(); 
	}

	static function update_placement_option($key, $param, $value) {
		$id = substr($key, 2, strlen($key) - strlen('-'.$param) - 2);
		if(!is_numeric($id) || !is_numeric($value)) {
			return;	
		}	
		
		update_option("hbagency_wp_placement_" . $id . '_' . strtolower($param), intval($value));
	}
	
	static function save_settings() {
		check_ajax_referer('hb_save_settings', 'hb_nonce');
		global $wpdb;
		
		$ajax_response = new HBAgency_Ajax_Response();
		if(!isset($_POST['hb_enable_ads_txt']) || !isset($_POST['additionalAdsTxtLines']) ||
				!isset($_POST['hb_enable_cmp']) || !isset($_POST['hb_enable_cls'])) {
			$ajax_response->set_payload("Something wrong happened");    
			$ajax_response->set_status_code("KO");
			echo wp_json_encode($ajax_response);
			wp_die(); 
		}
		$hb_ads_txt = $_POST['hb_enable_ads_txt'] == "true";
		$additionalAdsTxtLines =  sanitize_textarea_field(wp_unslash($_POST['additionalAdsTxtLines']));
		if(!empty($additionalAdsTxtLines)) {
			$adsTxtLines = explode("\n", str_replace("\r", "", $additionalAdsTxtLines));
			foreach($adsTxtLines as $key => $adsTxtLine) {
				if(!preg_match(HBAGENCY_ADSTXT_REGEXP, $adsTxtLine)) {
					$ajax_response = new HBAgency_Ajax_Response();
					$ajax_response->set_payload("ADS_TXT_VALIDATION_ERROR-" . ($key+1));	
					$ajax_response->set_status_code("KO");
					echo wp_json_encode($ajax_response);
					wp_die(); 
				}
			}
		}

		update_option('hbagency_wp_enable_ads_txt', $hb_ads_txt);
		if($hb_ads_txt) {
		    	HBAgency_Service::update_ads_txt($additionalAdsTxtLines);
		}
		
		$hb_enable_cmp = $_POST['hb_enable_cmp'] == "true";
		update_option('hbagency_wp_cmp', $hb_enable_cmp);
		
		$hb_enable_cls = $_POST['hb_enable_cls'] == "true";
		update_option('hbagency_wp_cls', $hb_enable_cls);
	
		$ajax_response->set_payload("Operation completed");	
		$ajax_response->set_status_code("OK");
		
		echo wp_json_encode($ajax_response);
		wp_die(); 
	}
	
	static function adsTxt() {
		$response = wp_remote_get(HBAGENCY__PLUGIN_DIR . 'hb_ads.txt');
	
		if ( is_wp_error( $response ) ) {
			status_header( 500 );
			exit;
		}
	
		$adsTxtContent = wp_remote_retrieve_body( $response );
		header( 'Content-Type: text/plain' );
		echo esc_html( $adsTxtContent );
	
		wp_die();
	}
        
}
