<?php
/*****************************************************
       "All Post Contact Form"'s Sub File
		  - Security  -
          Created by RainbowLink Inc.
*****************************************************/
if($_SERVER['REQUEST_METHOD'] !== 'POST'){ 
 exit; 
} 

$rl_apcf_checkurl = parse_url(get_site_url(), PHP_URL_HOST); 
$rl_apcf_checkcururl = home_url($_SERVER['REQUEST_URI']); 
if(stristr($rl_apcf_checkcururl,"https") !== FALSE){
 //Access HTTPS ONLY
}else{ 
 exit; 
} 

//Domain Limitation
if(stristr($rl_apcf_checkcururl,$rl_apcf_checkurl) !== FALSE){
 //Clear Session	
 session_id('trash');
 $_SESSION = array(); 
}else{ 
 exit; 
} 


