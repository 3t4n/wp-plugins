<?php

class EPXProcessor 
{
	/* -- Properties -- */
	public $id;
	public $key;
	public $url;

	public function __construct($id, $key, $test) {

		$this->id = $id;
		$this->key = $key;

		if ($test) {
			$this->url = 'https://epi.epxuap.com';
		} else {
			$this->url = 'https://epi.epx.com';
		}
	}

	
	public function sale($data = array()) {
		try { 
			return $this->send($data, '/sale');		
		} catch (Exception $e) {
			throw new Exception( $e->getMessage() );
		}
	}

	public function refund($data = array(), $bric) {
		try { 
			return $this->send($data, '/refund/' . $bric);		
		} catch (Exception $e) {
			throw new Exception( $e->getMessage() );
		}
	}

	private function send($data, $path) {
		// Create a new cURL resource
		$ch = curl_init($this->url . $path);
		$payload = json_encode($data);		
		$toHMAC = $path . $payload;	
		$sig = hash_hmac('sha256', $toHMAC, $this->key);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		
		$headers = [
			'Content-Type: application/json; charset=utf-8',
			'EPI-Id: ' . $this->id,
			'EPI-Signature: ' . $sig 
		];
		
		//curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		// Return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Execute the POST request
		$result = curl_exec($ch);
		$errors = curl_error($ch);
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		// Close cURL resource
		curl_close($ch);

		$arr = array();

		if ($code != 200){
			$arr['code'] = $code;
		}

		if ($errors != ''){
			$arr['errors'] = array($errors);
			return $arr;
		}

		$js = json_decode($result, true);

		return $js;
	}

}