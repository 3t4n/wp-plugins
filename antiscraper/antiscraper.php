<?php
/*
Plugin Name: AntiScraper
Plugin URI: http://antiscraper.com
Description: Block scraped content.
Version: 1.01
Author: Jennifer AKA Lysis
Author URI: http://antiscraper.com
License: 
*/

add_action ( 'wp_head', 'antiscraper' );

function antiscraper() {

	require_once('nusoap.php');
	$client = new nusoap_client('http://antiscraper.com/web_service/service.asmx?WSDL', true);
	$ip=getenv(REMOTE_ADDR);
	$param = array('login' => 'antiscraper', 'password' => '111', 'ip' => $ip);
	$result = $client->call('BlockIP', $param, 'AntiScraper');
	if ($result["BlockIPResult"] == "Block IP")
		{ 
		Header("Location: ../stop_scraper.html");
		}
}
?>
