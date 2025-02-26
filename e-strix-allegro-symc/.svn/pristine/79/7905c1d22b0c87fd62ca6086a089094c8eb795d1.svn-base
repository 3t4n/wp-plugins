<?php

class EStrixWooHelper {
	
	private $url = '';
	private $consumer_key = '';
	private $consumer_secret = '';
	
	const HASH_ALGORITHM = 'SHA256';
	
	public function __construct($url = null, $consumer_key = null, $consumer_secret = null) {
		if(!empty($url)){
			$this->url = $url;
		}
		if(!empty($consumer_key)){
			$this->consumer_key = $consumer_key;
		}
		if(!empty($consumer_secret)){
			$this->consumer_secret = $consumer_secret;
		}		
	}
	
	public function generate_safe_url($data) {		
		$options = array(
			'ssl_verify' => false,
			'timeout' => 30,
			'json_decode' => 'object',
			'debug' => false
		);
		
		$params = [];
		$params = array_merge( $params, array(
			'oauth_consumer_key'     => $this->consumer_key,
			'oauth_timestamp'        => time(),
			'oauth_nonce'            => sha1( microtime() ),
			'oauth_signature_method' => 'HMAC-' . self::HASH_ALGORITHM
		) );

		$params['oauth_signature'] = $this->generate_oauth_signature( $params, 'POST' );
		
		$url = $this->url.'/wc-api/v2/products?' 
				. 'oauth_consumer_key=' . $params['oauth_consumer_key'] 
				. '&oauth_timestamp=' . $params['oauth_timestamp'] 
				. '&oauth_nonce='. $params['oauth_nonce'] 
				. '&oauth_signature_method='. $params['oauth_signature_method'] 
				. '&oauth_signature=' . $params['oauth_signature'];
		
		$request = array(
			'body' => json_encode($data),
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode( $this->consumer_key . ':' . $this->consumer_secret )
			),
			'consumer_key'    => $this->consumer_key,
			'consumer_secret' => $this->consumer_secret,					
			'url'             => $this->url . '/wc-api/v2/products',
			'method' => 'POST',					
			'options' => $options
		);
		
		return array('url' => $url, 'request' => $request);
	}
	
	function generate_oauth_signature( $params, $http_method = 'POST') {
		$base_request_uri = rawurlencode( $this->url . '/wc-api/v2/products' );
		
		if ( isset( $params['filter'] ) ) {
			$filters = $params['filter'];
			unset( $params['filter'] );
			foreach ( $filters as $filter => $filter_value ) {
				$params['filter[' . $filter . ']'] = $filter_value;
			}
		}
		
		$params = $this->normalize_parameters( $params );
		uksort( $params, 'strcmp' );

		$query_params = array();
		foreach ( $params as $param_key => $param_value ) {
			$query_params[] = $param_key . '%3D' . $param_value; // join with equals sign
		}

		$query_string = implode( '%26', $query_params ); // join with ampersand

		$string_to_sign = $http_method . '&' . $base_request_uri . '&' . $query_string;
		
		return base64_encode( hash_hmac( self::HASH_ALGORITHM, $string_to_sign, $this->consumer_secret, true ) );
	}
	
	function normalize_parameters( $parameters ) {
		$normalized_parameters = array();
		foreach ( $parameters as $key => $value ) {
			// percent symbols (%) must be double-encoded
			$key   = str_replace( '%', '%25', rawurlencode( rawurldecode( $key ) ) );
			$value = str_replace( '%', '%25', rawurlencode( rawurldecode( $value ) ) );

			$normalized_parameters[ $key ] = $value;
		}
		return $normalized_parameters;
	}
}