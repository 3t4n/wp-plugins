<?php

class ArambaApi {

	static protected $instance;

	private $apiKey;

	public function __construct ($apiKey) 
	{
		$this->apiKey = $apiKey;
	}
	
	public static function getInstance ($apiKey = null) 
	{
		if (self::$instance === null) {
			$apiKey = get_option('aramba_api_key');
		}
		
		if ($apiKey === null) {
			return null;
		}
		
		self::$instance = new self($apiKey);
		
		return self::$instance;
	}

  private function makeGetRequest ($url) 
  {
    $args = [
      'headers' => [
        'Authorization ' => 'ApiKey ' . $this->apiKey,
        'Accept' => 'application/json',  
			  'Content-Type' => 'application/json'
      ],
      'timeout' => 120
    ];
    
    $get_result = wp_remote_get($url, $args);
    
    $result = ['http_code' => $get_result['response']['code']];
  
    $body = json_decode($get_result['body'], TRUE);  
    
    if (!empty($get_result['body']) && is_array($body)) $result += $body;
    else $result += ['response' => $body];
    
    return $result;
  }
  
  private function makePostRequest ($url, $post_data)
  {
    $args = [
      'headers' => [
        'Authorization ' => 'ApiKey ' . $this->apiKey,
        'Accept' => 'application/json',  
			  'Content-Type' => 'application/json'
      ],
      'body' => json_encode($post_data, JSON_UNESCAPED_UNICODE),
      'timeout' => 120
    ];
    
    $post_result = wp_remote_post($url, $args);
    
    $result = ['http_code' => $post_result['response']['code']];
  
    $body = json_decode($post_result['body'], TRUE);  
    
    if (!empty($post_result['body']) && is_array($body)) $result += $body;
    else $result += ['response' => $body];
    
    return $result;
  }
		
	public function postContactGroupsIdContacts ($Id, $Data)
	{
	
		$postdata = array(
			'Data' => json_decode($Data)
		);
		
		$url = 'https://api.aramba.ru/contactGroups/'.$Id.'/contacts';

    $response = $this->makePostRequest($url, $postdata);
		
		return $response;
	
	}
	
	public function getContactGroups ($SearchQuery, $Offset, $Limit, $IncludeStatistics, $IncludeFilters, $IncludeColumns)
	{
	
		$url = 'https://api.aramba.ru/contactGroups?searchquery='.$SearchQuery.'&Offset='.$Offset.'&Limit='.$Limit.
			   '&includestatistics='.$IncludeStatistics.'&includefilters='.$IncludeFilters.'&IncludeColumns='.$IncludeColumns;
		
    $response = $this->makeGetRequest($url);
    
		return $response;
	}
	
}


?>