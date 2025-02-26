<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

//Check if outdooractive.com supports the configured language
function oaembed_get_prouser($code,$type) {
	if ($type == 'pro') {
        $pro = '';
        if(isset($code)) {
            $proString = stristr($code, '&key=');
            $proKey = stristr($proString, '">',true);
            $pro = str_replace('&key=','',$proKey);
        }
        return $pro;
    }

    if ($type == 'usr') {
        $usr = '';
        if(isset($code)) {
            $usrString = stristr($code, 'usr=');
            $usrKey = stristr($usrString, '&key=',true);
            $usr = str_replace('usr=','',$usrKey);
        }
        return $usr;
    }
    
}

?>