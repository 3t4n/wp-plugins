<?php
function fetchData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
} 

/**
* Set the user credentials 
*/ 
$user_id = trim(get_option('netgo_ins_user_id'));
$access_token = trim(get_option('netgo_ins_access_token'));
$result = fetchData("https://api.instagram.com/v1/users/".$user_id."/media/recent/?access_token=".$access_token); 