<?php
if (!defined('ABSPATH')) die; //no direct access

class Affiliate_Power_Api_Webgains {    
    
    static public function addSubId($link, $subid) {        
        if (strpos($link, "clickref=") !== false) $link = preg_replace('@clickref=[#0-9a-z\-_]*@i', 'clickref='.$subid, $link);
        else {
            if (strpos($link, '&wgtarget=') !== false) $link = str_replace('&wgtarget=', '&clickref='.$subid.'&wgtarget=', $link);
            else $link .= '&clickref='.$subid;
        }
		
		return $link;
    }


	static public function checkLogin($publisher_id, $token) {
		
		$query = http_build_query([
			'filters[start_date]' => time()-86400,
			'filters[end_date]' => time(),
			'size' => 1
		]);
		$url = 'https://platform-api.webgains.com/publishers/'.$publisher_id.'/reports/transactions?'.$query;

		$http_answer = wp_remote_get($url, ['headers' => ['Authorization' => 'Bearer '.$token, 'Content-Type' => 'application/json']]);
		
		if (is_wp_error($http_answer) || $http_answer['response']['code'] != 200) return false;
		else return true;
		
	}
	
	
	static public function downloadTransactions($fromTS, $tillTS) {
	
	    $options = get_option('affiliate-power-options');
	    if (empty($options['webgains-publisher_id']) || empty($options['webgains-token'])) return array();
		$publisher_id = $options['webgains-publisher_id'];
	    $token = $options['webgains-token'];
	
		$output_transactions = array();
		
		$query = http_build_query([
			'filters[start_date]' => $fromTS,
			'filters[end_date]' => $tillTS,
			'size' => 1000
		]);
		$url = 'https://platform-api.webgains.com/publishers/'.$publisher_id.'/reports/transactions?'.$query;

		$http_answer = wp_remote_get($url, ['headers' => ['Authorization' => 'Bearer '.$token, 'Content-Type' => 'application/json']]);
		
		if (is_wp_error($http_answer) || $http_answer['response']['code'] != 200) {
            return array();
        }
		$obj_response = json_decode($http_answer['body']);
		
		foreach ($obj_response->data as $transaction) {
			
			$subid = $transaction->click_reference;
			$datetime_db = date('Y-m-d H:i:s', $transaction->date);
			$checkdatetime_db = date('Y-m-d H:i:s', $transaction->status_changed_date);
			
			if (in_array($transaction->status, [10, 20, 30, 40])) $status = 'Confirmed';
			elseif ($transaction->status == 70) $status = 'Cancelled';
			else $status = 'Open';
			
			$price = !empty($transaction->value->amount) ? round($transaction->value->amount / 10000, 2) : 0;
			$transaction_type = $price > 0 ? 'S' : 'L';
			$commission = round($transaction->commission->amount / 10000, 2);
			$confirmed = $status == 'Confirmed' ? $commission : 0;
			
			$output_transactions[] = array(
				'network' => 'webgains', 
				'number' => $transaction->id,
				'datetime_db' => $datetime_db,
				'sub_id' => $subid,
				'shop_id' => $transaction->program->id,
				'shop_name' => $transaction->program->name,
				'transaction_type' => $transaction_type,
				'price' => $price,
				'commission' => $commission,
				'confirmed' => $confirmed,
				'checkdatetime_db' => $checkdatetime_db,
				'status' => $status,
			);
		}

		return $output_transactions;
	}

}