<?php
	if(!get_option('awesome_ads_users_chitika')){
		update_option('awesome_ads_users_chitika', '[]');
	}
	if(!get_option('awesome_ads_chitika_json')){
		update_option('awesome_ads_chitika_json', '{"awesome_ads_chitika_positioning":"center","awesome_ads_chitika_home":"on","awesome_ads_chitika_posts":"on","awesome_ads_chitika_pages":"on","awesome_ads_chitika_number_ads_posts":"3","awesome_ads_chitika_number_ads_pages":"3","awesome_ads_chitika_notes":"","awesome_ads_chitika_donation_percent":"","awesome_ads_chitika_chitika_id":"","awesome_ads_chitika_chitika_cc":"Chitika+Default","awesome_ads_chitika_size":"468x60","awesome_ads_chitika_background_color":"FFFFFF","awesome_ads_chitika_border_color":"FFFFFF","awesome_ads_chitika_text_color":"000000","awesome_ads_chitika_url_color":"128A00","last_edit":"2011-05-20"}');
	}

	/*
	 * Salva as configurações do chitika
	 */

	add_action('wp_ajax_save-awesome_ads_chitika', 'save_awesome_ads_chitika');
	function save_awesome_ads_chitika() {
	
		global $wpdb; // this is how you get access to the database
		
		$values_s = $_POST['values'];
		
		$temp = explode('&',$values_s);foreach($temp as $v){$t = explode('=',$v);$values[$t[0]] = $t[1];}
		
		$networks = json_decode(get_option('awesome-ads-networks'));
		$temp = $networks;
		foreach($temp as $k=>$v){
			if($v->slug == 'awesome_chitika_ads'){
				$networks[$k]->active = $values['awesome_ads_chitika_status'];
				$networks[$k]->last_edit = date('Y-m-d');
			}
		}
		update_option('awesome-ads-networks',json_encode($networks));
		
		$values['last_edit'] = date('Y-m-d');
		$save = json_encode($values);
		
		$result['STATUS'] = 'error';
		
		update_option('awesome_ads_chitika_json',$save);
		
		$result['STATUS'] = 'error';
		if($save==get_option('awesome_ads_chitika_json'))
			$result['STATUS'] = 'ok';
			
		echo json_encode($result);
		
		die(); // this is required to return a proper result
	}
	define("ADSid_chitika", "ConteAqui");
	define("ADScc_chitika", "Chitika Default");
?>