<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HBAgency_Service {

	public static function save_website($website_id, $website) {
		HBAgency_Service::save_website_data($website);
		
		update_option('hbagency_wp_website_id', $website_id);
		
		if ( ! wp_next_scheduled('hbagency_wp_cron_check_for_updates')) {
			wp_schedule_event(time() + 60, 'twicedaily', 'hbagency_wp_cron_check_for_updates'); 
		}
		
		return true;
	}
	
	public static function save_website_data($website) {
		update_option('hbagency_wp_website_status', $website->status);
		update_option('hbagency_wp_website_status_detail', $website->statusDetail);
		update_option('hbagency_wp_website_url', $website->url);
		update_option('hbagency_wp_has_cmp', $website->flCmp);
		if(!$website->flCmp) {
			update_option('hbagency_wp_cmp', true);
		}
		if(str_starts_with($website->adsTxtUrl, "https://www.hbagency.it/")) {
			update_option('hbagency_wp_website_ads_txt', $website->adsTxtUrl);
		} else {
			return false;
		}
		
		update_option('hbagency_wp_website_script', $website->scriptUrl);
		update_option('hbagency_wp_website_ext_id', $website->id);
		
		self::save_placements($website->placements);
	}
	
	public static function update_website($website) {
		HBAgency_Service::save_website_data($website);

		if(get_option("hbagency_wp_enable_ads_txt") && $website->statusDetail == 'UPDATE_ADS_TXT') {
			HBAgency_Service::update_ads_txt(get_option('hbagency_wp_website_ads_txt_additional_lines'));
		}

		return true;
	}
	
	public static function adstxt_validation() {
		if(!preg_match( HBAGENCY_ADSTXT_REGEXP, get_option("hbagency_wp_enable_ads_txt") )) {
			return true;
		}
	}

	public static function update_ads_txt($additionalAdsTxtLines) {
		WP_Filesystem();

		$adsTxtResponse = wp_remote_get(get_option('hbagency_wp_website_ads_txt'));
		if( is_wp_error( $adsTxtResponse ) ) {
			self::error('X503');
			wp_die();
		}

		$newContent = wp_remote_retrieve_body($adsTxtResponse) . PHP_EOL . $additionalAdsTxtLines . PHP_EOL;
		$sanitized_new_content = sanitize_textarea_field( $newContent );
		
		global $wp_filesystem;
		$wp_filesystem->put_contents(ABSPATH . 'ads.txt', $sanitized_new_content, FS_CHMOD_FILE);

		update_option('hbagency_wp_website_ads_txt_additional_lines', $additionalAdsTxtLines);
	}
	
	public static function save_placements($placements) {
		update_option('hbagency_wp_website_placements',  $placements);
		foreach($placements as $p) {
			update_option('hbagency_wp_website_placement_' . $p->id . '_type', $p->type->id);
		}	
	}
	
	public static function hbagency_check_for_updates() {
		$ajax_response = new HBAgency_Ajax_Response();
		$website_id = get_option('hbagency_wp_website_id');
		
		if(empty($website_id) || !preg_match('/^[a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12}$/', $website_id)) {
			return;
		}
		$api = new HBAgency_Rest_API();
		$api->refresh();
	}
}

