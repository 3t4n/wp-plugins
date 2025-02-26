<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


	
	
	
function access_denied_is_ip_blocked()
	{
		$access_denied_ip_list = get_option('access_denied_ip_list');
		$access_denied_ip_list = explode(",",$access_denied_ip_list);
		
		$client_ip = access_denied_get_client_ip();

		$ip_found = array_search($client_ip, $access_denied_ip_list);

		if($ip_found)
			{
				return 'yes';
			}	
		else
			{
				return 'no';
			}	
	}	
	
	
	

	
	
	
function access_denied_get_client_ip()
	{
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
			
		return $ipaddress;
	}
	
	
	












