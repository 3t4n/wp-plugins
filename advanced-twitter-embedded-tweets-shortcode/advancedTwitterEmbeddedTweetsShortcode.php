<?php
/**
 * @package advanced-twitter-embedded-tweets-shortcode
*/
/*
Plugin Name: Advanced Twitter Embedded Tweets Shortcode
Plugin URI: http://www.sparxseo.com
Description: Thanks for installing Advanced Twitter Embedded Tweets Shortcode
Version: 1.0
Author: Alan Ferdinand
Author URI: http://www.sparxseo.com
*/
// Register style sheet.
add_shortcode('embedTweet', 'advancedTwitterEmbeddedTweetsShortcode');
 function advancedTwitterEmbeddedTweetsShortcode($atts){
 	$atts = shortcode_atts(array(
 		'suffix' => '',
 		'url' => '445954975823183872',
 		'maxwidth' => '400',
        'hide_media' => 'false',
        'hide_thread' => 'false',
		'align' => 'center',
		'related' => '',
        'lang' => 'en',
		'author' => 'true'
 	), $atts);
 	extract($atts);
        $url = "https://api.twitter.com/1/statuses/oembed.json?id=$url&align=$align&maxwidth=$maxwidth&hide_media=$hide_media&hide_thread=$hide_thread&related=$related&lang=$lang";
        $dataTweet = json_decode(file_get_contents($url),true);
        extract($dataTweet);
		$data = "";
        $data .= $html;
		if($author == "true"){
			$data .= "<div style='font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;'><a href='http://www.advantagebusinessvaluations.com/' target='_blank' style='color: #808080;' title='click here'>how much is my business worth</a></div>";}
    return $data;
 }