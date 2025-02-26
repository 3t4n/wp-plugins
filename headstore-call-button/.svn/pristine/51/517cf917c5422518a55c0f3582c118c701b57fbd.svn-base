<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://getpaycall.com/
 * @since      0.4.1
 *
 * @package    Headstore_Config
 * @subpackage Headstore_Config/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.4.1
 * @package    Headstore_Config
 * @subpackage Headstore_Config/includes
 * @author     Your Name <info@headstore.com>
 */
class Headstore_Api {
	
	public function __construct() {

	}
	
	public function get_account_token($email = '', $password = '') {
   
 		$parameters = http_build_query(
 				array(
 					'grant_type' => 'password',
 				    'username' => $email,
 				    'password' => $password,
 				 )
 		);
		
		$curl = curl_init('https://'.hs_backend::domain.'/oauth/token');
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($curl, CURLOPT_USERPWD, $email.':'.$password);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec ($curl);
		curl_close ($curl);
		$jsonarray = json_decode($json, true);
		
		return $jsonarray;
	}
	
	public function get_experts_list($email = '', $token = '') {
   		
		
		$curl = curl_init('https://'.hs_backend::domain.'/api/callme-wp/'.$email.'/');
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
   		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec ($curl);
		curl_close ($curl);
		$jsonarray = json_decode($json, true);
		
		return $jsonarray;
	}
	
}


if ('GET' == $_SERVER['REQUEST_METHOD']) {
    $request_params = $_GET;
    
    if (isset($request_params['email']) && isset($request_params['password'])) {
	include 'headstore-constant.php';
    	$headstore_api = new Headstore_Api();
	$access_token = $headstore_api->get_account_token(rawUrlDecode($request_params['email']), rawUrlDecode($request_params['password']));
	//print_r(rawUrlDecode($request_params['email'])." ".rawUrlDecode($request_params['password']));	   
	$button = $headstore_api->get_experts_list(rawUrlDecode($request_params['email']), $access_token['access_token']);  
	print_r($button['expertsAndGroups'][0]['webToken']);
    }
}

