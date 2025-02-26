<?php

function db_redirect(){

	$browsers = array("AvantGo", "BOLT", "DoCoMo", "KDDI", "Vodafone", "J-PHONE", "DDIPOCKET", "Android", "PalmOS", "PDA", "Mobile", "mobile", "MOBILE", "PIE", "iPhone", "BlackBerry", "Cricket", "IEMobile", "PPC", "Windows Phone", "MSIEMobile", "UP.Browser", "Nintendo 3DS", "Nokia", "SymbianOS", "Symbian OS", "SymbOS", "Opera Mini","O2 Xda 2mini", "webOS", "PalmSource", "Pantech", "SAGEM", "NetFront", "TelecaBrowser", "UC Browser", "SEMC-Browser", "PlayStation Portable", "ZuneWP7");
	
	$acc_browser = $_SERVER['HTTP_USER_AGENT'];
	function match_browser($arrays,$string){
		foreach ($arrays as $array){
			if(strpos($string, $array) !== false){
				return true;	
			}
		}
	}
	
	if(match_browser($browsers,$acc_browser)){
		echo '<script type="text/javascript">window.location.href = "'.get_option('va_db_redirect_url').'"</script>';	
	}
}

add_action('wp_head','db_redirect');

?>