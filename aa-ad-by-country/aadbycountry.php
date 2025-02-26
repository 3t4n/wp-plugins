<?php 
/**
 * Plugin Name: AA Ad by country
 * Plugin URI: https://wordpress.org/plugins/aa-ad-by-country/
 * Description: Use your shortcode like [AD for="BD"]Your ads here[/AD]
 * Version: 1.0
 * Developer + Idea: A. Roy / A. Mahmud
 * Author URI: http://webdesigncr3ator.com
 * Support Email : contact2us.aa@gmail.com
 * License: GPL2
 **/
	
	
		
function aa_ad_getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}




function aa_ad_by_country($atts, $content = null){
	
    $a = shortcode_atts( array(
		'for'=> ''
    ), $atts );

	


	$json = file_get_contents('http://ip-api.com/json/'.aa_ad_getUserIP());
	$obj = json_decode($json);
		

	//get user country	
	$usr_country = $obj->countryCode;
	
	if($a['for']==$usr_country){
		return $content;
	}else{
		return "You country not support this content";
	}
}
	add_shortcode( 'AD', 'aa_ad_by_country' );
	