<?php

/**
 * https://github.com/Wiatrogon/php-allegro-rest-api
 *
 */
class EStrixAllegroRESTApi {
    
    const TOKEN_URI = 'https://allegro.pl/auth/oauth/token';
    const API_URL = "https://api.allegro.pl";
    const AUTHORIZATION_URI = 'https://allegro.pl/auth/oauth/authorize';
    
    private $clientId;
    private $clientSecret;
    private $apiKey;
    private $redirectUri;
    private $accessToken;
    private $refreshToken;
	
	
    public function __construct($clientId, $clientSecret, $apiKey, $redirectUri,
        $accessToken = null, $refreshToken = null) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->apiKey = $apiKey;
        $this->redirectUri = $redirectUri;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
	}
	
	public function getOffers($token = ""){
	    $url = static::API_URL . "/sale/offers";
	    $method = "GET";
	    $key = $this->getApiKey();
	    
	    $headers = array(
	        "Authorization: Bearer $token",
	        "Api-Key: $key",
	        "Content-Type: application/vnd.allegro.public.v1+json",
	        "Accept: application/vnd.allegro.public.v1+json"
	    );
	    
	    return $this->sendHttpRequest($url, $method, $headers);
	}
	
	public function getListingOffers($sellerId = 0){
	    $url = static::API_URL . "/offers/listing?seller.id=".$sellerId;
	    $method = "GET";
	    $key = $this->getApiKey();	    
	    $token = $this->getAccessToken();
	    
	    $headers = array(
	        "Authorization: Bearer $token",
	        "Api-Key: $key",
	        "Content-Type: application/vnd.allegro.public.v1+json",
	        "Accept: application/vnd.allegro.public.v1+json"
	    );
	    
	    return $this->sendHttpRequest($url, $method, $headers);
	}
	
	
	public function getOfferDetails($offerId = 0){
	    $url = static::API_URL . "/sale/offers/".$offerId;
	    $method = "GET";
	    $key = $this->getApiKey();
	    $token = $this->getAccessToken();
	    
	    $headers = array(
	        "Authorization: Bearer $token",
	        "Api-Key: $key",
	        "Content-Type: application/vnd.allegro.public.v1+json",
	        "Accept: application/vnd.allegro.public.v1+json"
	    );
	    
	    return $this->sendHttpRequest($url, $method, $headers);
	}
	
	public function getAuthorizationUri() {
	    $data = array(
	        'response_type' => 'code',
	        'client_id' => $this->clientId,
	        'api-key' => $this->apiKey,
	        'redirect_uri' => $this->redirectUri
	    );
	    
	    return static::AUTHORIZATION_URI . '?' . http_build_query($data);
	}
	
	public function getNewAccessToken($code){
	    $data = array(
	        'grant_type' => 'authorization_code',
	        'code' => $code,
	        'api-key' => $this->apiKey,
	        'redirect_uri' => $this->redirectUri
	    );
	    
	    return $this->requestAccessToken($data);
	}
	
	public function refreshAccessToken(){
	    $data = array(
	        'grant_type' => 'refresh_token',
	        'api-key' => $this->apiKey,
	        'refresh_token' => $this->refreshToken,
	        'redirect_uri' => $this->redirectUri
	    );
	    
	    return $this->requestAccessToken($data);
	}
	
	private function requestAccessToken($data){
	    $authorization = base64_encode($this->clientId . ':' . $this->clientSecret);
	    
	    $headers = array(
	        "Authorization: Basic $authorization",
	        "Content-Type: application/x-www-form-urlencoded"
	    );
	    
	    $data = http_build_query($data);
	    
	    $response = $this->sendHttpRequest(static::TOKEN_URI, 'POST', $headers, $data);
	    
	    $data = json_decode($response);
	    
	    if (isset($data->access_token) && isset($data->refresh_token))
	    {
	        $this->accessToken = $data->access_token;
	        $this->refreshToken = $data->refresh_token;
	    }
	    
	    return $response;
	}
	
	
	private function sendApiRequest($url, $method, $data = array()){
	    $token = $this->getAccessToken();
	    $key = $this->getApiKey();
	    
	    $headers = array(
	        "Authorization: Bearer $token",
	        "Api-Key: $key",
	        "Content-Type: application/vnd.allegro.public.v1+json",  // this line should be changed if using
	        "Accept: application/vnd.allegro.public.v1+json"
	    );
	    
	    $data = json_encode($data);
	    
	    return $this->sendHttpRequest($url, $method, $headers, $data);
	}
	
	private function sendHttpRequest($url, $method, $headers = array(), $data = ''){
	    $options = array(
	        'http' => array(
	            'method' => $method,
	            'header' => implode("\r\n", $headers),
	            'content' => $data,
	            'ignore_errors' => true
	        )
	    );
	    
	    $context = stream_context_create($options);
	    	    
	    return file_get_contents($url, false, $context);
	}
	
	public function get($data = null){
	    $uri = $this->getUri();
	    
	    if ($data !== null) {
	        if(strcmp(substr($uri,-1),'/')==0){
	            $uri=substr($uri,0,strlen($uri)-1);
	        }
	        $uri .= '?';
	        $uri .= http_build_query($data);
	    }
	    
	    return $this->sendApiRequest($uri, 'GET');
	}
	
	public function put($data){
	    return $this->sendApiRequest($this->getUri(), 'PUT', $data);
	}
	
	public function post($data){
	    return $this->sendApiRequest($this->getUri(), 'POST', $data);
	}
	
	public function delete($data = null){
	    $uri = $this->getUri();
	    
	    if ($data !== null) {
	        $uri .= '?';
	        $uri .= http_build_query($data);
	    }
	    
	    return $this->sendApiRequest($uri, 'DELETE');
	}
		
	public function getAccessToken(){
	    return $this->accessToken;
	}
	
	public function getRefreshToken(){
	    return $this->refreshToken;
	}
	
	public function getApiKey(){
	    return $this->apiKey;
	}
	
}

?>