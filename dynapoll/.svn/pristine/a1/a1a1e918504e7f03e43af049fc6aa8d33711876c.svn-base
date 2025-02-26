<?php
/*
Plugin Name: DynaPoll
Plugin URI: http://www.dynapoll.net/about/dynapoll_wordpress_plugin
Description: Grab a DynaPoll and embed it into your WP site
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=DBZ7EUWDDRS38&lc=AU&item_name=DynaPoll&item_number=DynaPoll_WP&currency_code=AUD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Version: 1.0.4
Author: Alasdair Boyd
Author URI: http://www.dynapoll.net
*/

/*  Copyright 2010  Alasdair Boyd  (email : al@alboydweb.com.au)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function dynapoll_writeCSS() {
	$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	echo ( '<link rel="stylesheet" type="text/css" href="'. $x . 'dynapoll_css.css">' . "\r\n" );
}

function dynapoll_writeJS() {
	$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$js_inc = '<script type="text/javascript" src="'. $x . 'dynapoll_js.js"></script>' . "\r\n";
	$js_inc .= '<script type="text/javascript">var base_url = "' . $x . '";</script>';
	echo $js_inc;
}

add_action( 'wp_head', 'dynapoll_writeCSS' );
add_action('wp_head', wp_enqueue_script('jquery'));
add_action('wp_head', 'dynapoll_writeJS');

require_once(dirname(__FILE__)."/dynapoll_rpc.php");
$site = $_SERVER["SERVER_NAME"];

function dynapoll_get_poll($poll_code, $theme = 'dark')
{
	$user_ip = $_SERVER["REMOTE_ADDR"];

	$f=new xmlrpcmsg('get_poll', array(new xmlrpcval($poll_code, "string"),
					new xmlrpcval($user_ip, "string"),
                                        new xmlrpcval('1.0.4', "string"),
                                        new xmlrpcval($site, "string")));


	$returned_html = send_rpc_request($f);

	switch(trim($returned_html))
					{
					case '900':
						$returned_html = "IP Address has been implicated in a previous SPAM answer suggestion.";
						return false;
					  break;
					case '901':
						$returned_html = "Spam question was not answered correctly.";
						return false;
					  break;
					case '902':
						$returned_html = "Poll not found.";
						return false;
					  break;
					case '903':
						$returned_html = "Poll code was not sent.";
						return false;
					  break;
					case '904':
						$returned_html = "IP Address has logged a vote within the last 24 hours.";
						return false;
					  break;
					default:
					  /* do nothing - therefore load content */
					}

	// replace the div.dynapoll_poll string with div.dynapoll_poll_$theme
	// check for valid theme values - set 'dark' as the default theme
	$theme = strtolower($theme);
	$theme = ($theme == 'dark' || $theme == 'light') ? $theme : 'dark';

	$returned_html = str_replace('dynapoll_poll', 'dynapoll_poll_' . $theme, $returned_html);

	return $returned_html;
}

function dynapoll_get_random_poll($user_code, $theme = 'dark')
{
	$user_ip = $_SERVER["REMOTE_ADDR"];

	$f=new xmlrpcmsg('get_poll_random', array(new xmlrpcval($user_code, "string"),
					new xmlrpcval($user_ip, "string"),
                                        new xmlrpcval('1.0.4', "string"),
                                        new xmlrpcval($site, "string")));

	$returned_html = send_rpc_request($f);

	switch(trim($returned_html))
					{
					case '900':
						$returned_html = "IP Address has been implicated in a previous SPAM answer suggestion.";
						return false;
					  break;
					case '901':
						$returned_html = "Spam question was not answered correctly.";
						return false;
					  break;
					case '902':
						$returned_html = "Poll not found.";
						return false;
					  break;
					case '903':
						$returned_html = "Poll code was not sent.";
						return false;
					  break;
					case '904':
						$returned_html = "IP Address has logged a vote within the last 24 hours.";
						return false;
					  break;
					default:
					  /* do nothing - therefore load content */
					}

	// replace the div.dynapoll_poll string with div.dynapoll_poll_$theme
	// check for valid theme values - set 'dark' as the default theme
	$theme = strtolower($theme);
	$theme = ($theme == 'dark' || $theme == 'light') ? $theme : 'dark';

	$returned_html = str_replace('dynapoll_poll', 'dynapoll_poll_' . $theme, $returned_html);

	return $returned_html;
}

function filter_dynapoll_tag($content) {

    while (($start = strpos($content, "[dynapoll:")) !== false) {

        $end = $start + strpos(substr($content, $start), "]") - 1;

        if (!$end) {
            $content = substr($content, 0, $start + 10)."]".substr($content, $start + 11);
        } else {
            $tag = substr($content, $start, $end - $start + 2);

	    $params = str_replace("[dynapoll:","",$tag);
	    $params = str_replace("]","",$params);
	    $params = rtrim(ltrim($params));
	    $params = explode(",",$params);

		foreach ($params as &$param) {
			$param = trim($param);
		}

	    $content = str_replace($tag, dynapoll_get_poll($params[0], $params[1]), $content);
        }
    }

    return $content;
}

function filter_dynapoll_random($content) {

    while (($start = strpos($content, "[dynapoll_random:")) !== false) {

        $end = $start + strpos(substr($content, $start), "]") - 1;

        if (!$end) {
            $content = substr($content, 0, $start + 17)."]".substr($content, $start + 18);
        } else {
            $tag = substr($content, $start, $end - $start + 2);

	    $params = str_replace("[dynapoll_random:","",$tag);
	    $params = str_replace("]","",$params);
	    $params = rtrim(ltrim($params));
	    $params = explode(",",$params);

		foreach ($params as &$param) {
			$param = trim($param);
		}

	    $content = str_replace($tag, dynapoll_get_random_poll($params[0], $params[1]), $content);
        }
    }

    return $content;
}

add_filter('the_content', 'filter_dynapoll_tag');
add_filter('the_content', 'filter_dynapoll_random');
?>
