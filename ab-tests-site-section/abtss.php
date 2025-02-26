<?php
/*
Plugin Name: A/B Tests Site Section
Description: You want one specific section of your site redirected? Thats your plugin.
Author: WP-Plugin-Dev.com
Version: 0.1
Author URI: http://www.wp-plugin-dev.com
*/

include('abtss_admin_page.php');
function init_sessions_abtss() {
    if (!session_id()) {
        session_start();
    }




}
add_action('init', 'init_sessions_abtss');

add_action( 'init', 'redirect_requests_abtss');


function redirect_requests_abtss() {

$redirect_requests_abtss=get_option("redirect_requests");

if($redirect_requests_abtss==NULL){
$redirect_requests_abtss=0;
}else{
$redirect_requests_abtss++;
}

update_option("redirect_requests",$redirect_requests_abtss);

$predefined_redirect_requests_abtss=get_option('test_customer_interval',true);


if(($redirect_requests_abtss % $predefined_redirect_requests_abtss) == 0){
	if ( !isset($_SESSION['test_redirect_customer']) && !is_admin()) {
	
			$_SESSION['test_redirect_customer']="true";
					
			}
			else{
			$_SESSION['test_redirect_customer']="false";
			}
	}else{}
}

//-------------------------------------------------------------------------------


function abtss_url_content_outgoing_filter($content) {
	
	$stc=$_SESSION['test_redirect_customer'];
	
	
	if($stc=="true"){
			$net_array_abtss=get_array_of_urls_abtss($content);
    		$net_array_abtss=array_unique($net_array_abtss);
    		$redirect_section_url=get_option("test_customer_redirect_section_url");
    		$redirect_section_url_path=get_option("test_customer_redirect_section_url_path");  
	
			foreach ($net_array_abtss as $na){
		
				$test = strpos($na,"http://");
				$admintest =strpos($na,"wp-admin");//if yes than true
				//$samesite =strpos($na,get_bloginfo('url'));//if yes than true
		
				if($redirect_section_url==$na){
						$no=$redirect_section_url_path;
						$content=str_replace("href=\"".$na."\"", "href=\"".$no."\"", $content);
				}else{
				
				}


			}
	}else{}


		

		return $content ;
	}
 

ob_start('abtss_url_content_outgoing_filter');

ob_clean();
//-----------------------------------------------------------------------------



function get_array_of_urls_abtss($content){
	$html = $content;
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
     
    $xpath = new DOMXPath($dom);
    $hrefs = $xpath->evaluate("/html/body//a");
     
    $net_array=array();
    
    for ($i = 0; $i < $hrefs->length; $i++) {
    	$href = $hrefs->item($i);
    	$url = $href->getAttribute('href');
	
		$net_array[$i] = $url;
	
    }

	return $net_array;
}
	
//-------------------------------------------------------------------------------


?>