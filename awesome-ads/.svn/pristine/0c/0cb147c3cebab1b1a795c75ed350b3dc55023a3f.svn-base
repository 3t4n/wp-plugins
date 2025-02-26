<?php
	
	if(!get_option('awesome_ads_users_google')){
		update_option('awesome_ads_users_google', '[]');
	}
	if(!get_option('awesome_ads_google_json')){
		update_option('awesome_ads_google_json', '{"awesome_ads_google_responsive_ad_slot":"","awesome_ads_google_positioning":"center","awesome_ads_google_home":"on","awesome_ads_google_posts":"on","awesome_ads_google_pages":"on","awesome_ads_google_mobile_level":"off","awesome_ads_google_number_ads_posts":"3","awesome_ads_google_number_ads_pages":"3","awesome_ads_google_notes":"","awesome_ads_google_donation_percent":"","awesome_ads_google_google_id":"","awesome_ads_google_google_cc":"","awesome_ads_google_size":"468x60","awesome_ads_google_border":"normal","awesome_ads_google_background_color":"FFFFFF","awesome_ads_google_border_color":"FFFFFF","awesome_ads_google_title_color":"0022C9","awesome_ads_google_text_color":"000000","awesome_ads_google_url_color":"128A00","awesome_ads_google_type":"text_image","last_edit":"2011-05-20"}');
	}
	
	/*
	 * Salva as configura��es do google
	 */

	add_action('wp_ajax_save-awesome_ads_google', 'save_awesome_ads_google');
	function save_awesome_ads_google() {
	
		global $wpdb; // this is how you get access to the database
		
		$values_s = $_POST['values'];
		
		$temp = explode('&',$values_s);foreach($temp as $v){$t = explode('=',$v);$values[$t[0]] = $t[1];}
		
		$networks = json_decode(get_option('awesome-ads-networks'));
		$temp = $networks;
		foreach($temp as $k=>$v){
			if($v->slug == 'awesome_google_ads'){
				$networks[$k]->active = $values['awesome_ads_google_status'];
				$networks[$k]->last_edit = date('Y-m-d');
			}
		}
		update_option('awesome-ads-networks',json_encode($networks));
		
		$values['last_edit'] = date('Y-m-d');
		$save = json_encode($values);
		
		$result['STATUS'] = 'error';
		
		update_option('awesome_ads_google_json',$save);
		
		$result['STATUS'] = 'error';
		if($save==get_option('awesome_ads_google_json'))
			$result['STATUS'] = 'ok';
			
		echo json_encode($result);
		
		die(); // this is required to return a proper result
	}
	define("ADSid_google", "4268725654361605");
	define("ADScc_google", "2722938917");
?>