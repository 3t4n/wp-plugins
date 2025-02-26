<?php
/**
Plugin Name: Show IP info
Description: The plugin fetchs the IP address of the visitor and then return information such like: languages, currency, country (and more in future versions)
Version: 2.4
Author URI: https://www.pyvold.com
 */


 function show_visitor_ip() {
	  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	   $ip = $_SERVER['HTTP_CLIENT_IP'];
	  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	  } else {
	   $ip = $_SERVER['REMOTE_ADDR'];
	  }
  return apply_filters('wpb_get_ip', $ip);
 }
 add_shortcode('show_ip', 'show_visitor_ip');
  
 function show_visitor_infoByIp($showvip){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP)){		
       $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
       $ip = $forward;
    } else {
        $ip = $remote;
    }

	$ip_info = @json_decode( wp_remote_retrieve_body( wp_remote_get( "https://www.ipdevops.com/api/whoip/remip/".$ip ) ) );
	
      $showvip_data = '';
      $showvip_ltype = $showvip['type'];
    if($ip_info && $ip_info->country != null){
		$showvip_shortcode = strtolower($showvip_ltype);
		if($showvip_shortcode == 'languages'){
			//$showvip_data = json_encode($ip_info->$showvip_shortcode);
			$showvip_array = $ip_info->$showvip_shortcode;
			foreach($showvip_array as $lang){
				$showvip_data .= $lang. " ";
			}
		}else{
			$showvip_data = $ip_info->$showvip_shortcode;
		}
    }

    return $showvip_data;
 } 
 add_shortcode('showip_info', 'show_visitor_infoByIp');       
?>