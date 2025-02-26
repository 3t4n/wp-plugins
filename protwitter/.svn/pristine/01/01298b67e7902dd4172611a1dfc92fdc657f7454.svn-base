<?php
/*
Plugin Name: Pro Twitter
Plugin URI: http://www.myfastblog.com/
Description: Profesional plugin for your twitter
Author: Haotik
Version: 1.4
Author URI: http://www.haotik.ro
*/

// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
      define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
      define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
      define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
#---------------------------------------------------------------------

//	error_reporting(E_ALL);

load_plugin_textdomain( 'protwitter', false, dirname( plugin_basename( __FILE__ ) ) );

function protwitter_admin() {  

	add_menu_page('Pro Twitter', 'Pro Twitter', 1, 'protwitter_options', 'protwitter_options');
	add_submenu_page('protwitter_options', 'Options', 'Options', 1, 'protwitter_options', 'protwitter_options');
  add_submenu_page('protwitter_options', 'Twitter Counter', 'Twitter Counter', 1, 'protwitter_twitter_counter', 'protwitter_twitter_counter');
  add_submenu_page('protwitter_options', 'Tweet this', 'Tweet this', 1, 'protwitter_tweet_this', 'protwitter_tweet_this');

}

function protwitter_options() {
		include('admin/protwitter_options.php');
}

function protwitter_twitter_counter() {
		include('admin/protwitter_twitter_counter.php');
}

function protwitter_tweet_this() {
		include('admin/protwitter_tweet_this.php');
}

add_action('admin_menu', 'protwitter_admin');  

//
// display counter function
//
function protwitter_counter_display() {
		
	$twitter_id = get_option('protwitter_twitter_id');
	$template_id = get_option('protwitter_template_id');
	if ($twitter_id=='') $twitter_id = 'haotikus';
		
	$url = "http://twitter.com/statuses/user_timeline/".$twitter_id.".xml";
	$xml= file_get_contents($url);

	$tag = "<followers_count>";
	$p = strpos($xml, $tag);
	$r = strpos($xml, "</followers_count>");
	$count = '';
	$count = substr($xml, $p+strlen($tag), $r-$p-strlen($tag));
	$url_twitter = "http://twitter.com/".$twitter_id;

	if($template_id=='') $template_id = 1;



	switch ($template_id) {
    case 1:
		echo '<span style="background: #fff; padding: 1px; font-family: Geneva, Vera, Arial, Helvetica, sans-serif; font-size: x-small; font-variant: small-caps; border: 1px solid #999999;"><span style="color: #FFFFFF; background: #3333FF; padding: 0px 3px 0px 3px;">'.$count.'</span><span style="color: #0000CC; background: #AAAAAA; padding: 0px 6px 0px 3px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #000;">followers</a></span></span>';
        break;
        
    case 2:
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 0.8em; font-variant: small-caps; border: 1px solid #aaa;"><span style="color: #fff; background: #c00; padding: 0px 2px 0px 2.4000000000000004px;">'.$count.'</span><span style="color: #000; background: #fff; padding: 0px 0px 4.5px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #000;">followers</a></span></span>';
        break;
    case 3:
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 10px; font-variant: small-caps; border: 1px solid #aaa;"><span style="color: #00c; background: #fff; padding: 0px 2px 0px 4.5px;">'.$count.'</span><span style="color: #000; background: #f93; padding: 0px 4.5px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #000;">followers</a></span></span>';
        break;
    case 4:
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: x-small; font-variant: small-caps; border: 1px solid #080;"><span style="color: #fff; background: #080; padding: 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #fff;">followers</a></span><span style="color: #080; background: #fff; padding: 0px 8px 0px 2px;">'.$count.'</span></span>';
        break;
    case 5:
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 10px; font-variant: small-caps; border: 1px solid #000;"><span style="color: #000; background: #fc0; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="color: #fc0; background: #000; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #fc0;">followers</a></span></span>';
        break;
    case 6:
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background:#ccf; color:#006; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background:#006; color:white; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
        break;
    case 7:
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background: white; color: #c60; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background: orange; color: black; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
        break;
    case 8:
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background: white; color: #06c; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background: #06c; color: white; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
        break;
    case 9:
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background: white; color: green; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background: green; color: white; color: white; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
        break;
    case 10:
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background:#003; color:#ffc; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background:#dd9; color:black; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
        break;
    case 11:
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: #ccf;">
	<span style="color: #006; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: #006;">
		<span style="color: white; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: #006;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 12:
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: white;">
	<span style="color: #c60; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: orange;">
		<span style="color: black; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: orange;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:black;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 13:
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: white;">
	<span style="color: #06c; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: #06c;">
		<span style="color: white; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: #06c;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 14:
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: white;">
	<span style="color: green; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: green;">
		<span style="color: white; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: green;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 15:
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: #003;">
	<span style="color: #dd9; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: #dd9;">
		<span style="color: black; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: #dd9;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:black;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 16:
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #006;">
<tr><td align="right" style="background: #ccf;">
	<span style="
				text-align: right;
				background-color: #ccf;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: #006;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: #006;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: #006;text-align:center;"><span style="color: white; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 17:
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid orange;">
<tr><td align="right" style="background: white;">
	<span style="
				text-align: right;
				background-color: white;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: black;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: orange;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: orange;text-align:center;"><span style="color: black; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:black;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 18:
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #06c;">
<tr><td align="right" style="background: white;">
	<span style="
				text-align: right;
				background-color: white;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: #06c;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: #06c;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: #06c;text-align:center;"><span style="color: white; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 19:
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid green;">
<tr><td align="right" style="background: white;">
	<span style="
				text-align: right;
				background-color: white;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: green;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: green;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: green;text-align:center;"><span style="color: white; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 20:
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid black;">
<tr><td align="right" style="background: black;">
	<span style="
				text-align: right;
				background-color: black;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: white;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: #dd9;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: #dd9;text-align:center;"><span style="color: black; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="http://www.myfastblog.com" target="_BLANK" style="text-decoration: none; color:black;">Pro Twitter Counter</a></span>
</td></tr></table>';
        break;
    case 21;
		echo '<div style="border : 1px solid #104ed9; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: #0A328C; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: white;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: #66bbff;">FollowMe</a>
			</div>
	</div>';
        break;
    case 22:
		echo '<div style="border : 1px solid #104ed9; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: orange; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: white;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: black;">FollowMe</a>
			</div>
	</div>';
        break;
    case 23:
		echo '<div style="border : 1px solid black; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: #06c; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: white;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: white;">FollowMe</a>
			</div>
	</div>';
        break;
    case 24:
		echo '<div style="border : 1px solid black; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: green; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: white;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: white;">FollowMe</a>
			</div>
	</div>';
        break;
    case 25:
		echo '<div style="border : 1px solid black; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: #dd9; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: black;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: black;">FollowMe</a>
			</div>
	</div>';
        break;
	}
}
//
// widget for twitter counter
//
add_action("widgets_init", array('ProTwitter_Counter', 'register'));
register_activation_hook( __FILE__, array('ProTwitter_Counter', 'activate'));
register_deactivation_hook( __FILE__, array('ProTwitter_Counter', 'deactivate'));

class ProTwitter_Counter {
	function activate(){
    $data = array( 'title' => 'Twitter Counter');
    if ( ! get_option('ProTwitter_Counter')){
      add_option('ProTwitter_Counter' , $data);
    } else {
      update_option('ProTwitter_Counter' , $data);
    }
  }
  function deactivate(){
    delete_option('ProTwitter_Counter');
	}
  function control(){
		 $data = get_option('ProTwitter_Counter');
  ?>
  <p><label>Title: <input name="ProTwitter_Counter_title" type="text" value="<?php echo $data['title']; ?>" /></label></p>
  <?php
   	if (isset($_POST['ProTwitter_Counter_title'])){
		  $data['title'] = attribute_escape($_POST['ProTwitter_Counter_title']);
		  update_option('ProTwitter_Counter', $data);
  	}
		protwitter_counter_display();
  }
  function widget($args){
		$data = get_option('ProTwitter_Counter');
		$title = ($data['title']=='')?'Twitter Counter':$data['title'];
    echo $args['before_widget'];
    echo $args['before_title'] . $title . $args['after_title'];
    protwitter_counter_display();
    echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('Twitter Counter', array('ProTwitter_Counter', 'widget'));
    register_widget_control('Twitter Counter', array('ProTwitter_Counter', 'control'));
  }
}

//
// display tweet-this function
//
function protwitter_tweet_this_display($content) {

	// daca functia este activa sau are un parametru display none activ sa nu afiseze chiar daca pluginul este activat (poate vrea doar counter)

	global $wp_query;
	$PLUGIN_PATH = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

  $post = $wp_query->post;
	$protwitter_post_url = get_permalink($post->ID);
	$protwitter_post_title = get_the_title($post->ID);
	

	$protwitter_tweet_this_id = get_option('protwitter_tweet_this_id');
	$protwitter_tweet_this_tweet_text = get_option('protwitter_tweet_this_tweet_text');
	$protwitter_tweet_this_link_text = get_option('protwitter_tweet_this_link_text');
	$protwitter_tweet_this_link_title = get_option('protwitter_tweet_this_link_title');
	$protwitter_tweet_this_option1 = get_option('protwitter_tweet_this_option1');
	$protwitter_tweet_this_option2 = get_option('protwitter_tweet_this_option2');
	$protwitter_tweet_this_option3 = get_option('protwitter_tweet_this_option3');
	$protwitter_tweet_this_option4 = get_option('protwitter_tweet_this_option4');
	$protwitter_tweet_this_option5 = get_option('protwitter_tweet_this_option5');
	$protwitter_tweet_this_option6 = get_option('protwitter_tweet_this_option6');
	


	if($protwitter_tweet_this_id=='') $protwitter_tweet_this_id = 1;

	$protwitter_tweet_this = '<div id="tweetthis_box">';

	switch ($protwitter_tweet_this_id) {
    case 1:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/t_mini-a.png'.'">'; 
        break;     
    case 2:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/t_mini-b.png'.'">'; 
        break;
    case 3:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/t_mini-c.png'.'">'; 
        break;
    case 4:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/t_small-a.png'.'">'; 
        break;
    case 5:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/t_small-b.png'.'">'; 
        break;
    case 6:
		$protwitter_tweet_this .= '<span style="background: #fff; padding: 1px; font-family: Geneva, Vera, Arial, Helvetica, sans-serif; font-size: x-small; font-variant: small-caps; border: 1px solid #999999;"><span style="color: #FFFFFF; background: #3333FF; padding: 0px 3px 0px 3px;">Tweet</span><span style="color: #0000CC; background: #AAAAAA; padding: 0px 6px 0px 3px;">this</span></span>';
        break;
		case 7:
		$protwitter_tweet_this .= '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 10px; font-variant: small-caps; border: 1px solid #aaa;"><span style="color: #00c; background: #fff; padding: 0px 2px 0px 4.5px;">Tweet</span><span style="color: #000; background: #f93; padding: 0px 4.5px 0px 2px;">this</span></span>';
        break;
    case 8:
		$protwitter_tweet_this .= '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: x-small; font-variant: small-caps; border: 1px solid #080;"><span style="color: #fff; background: #080; padding: 0px 2px;">Tweet</span><span style="color: #080; background: #fff; padding: 0px 8px 0px 2px;">This</span></span>';
        break;
    case 9:
		$protwitter_tweet_this .= '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 10px; font-variant: small-caps; border: 1px solid #000;"><span style="color: #000; background: #fc0; padding: 0px 2px 0px 3px;">Tweet</span><span style="color: #fc0; background: #000; padding: 0px 3px 0px 2px;">this</span></span>';
        break;
    case 10:
		$protwitter_tweet_this .= '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 0.8em; font-variant: small-caps; border: 1px solid #aaa;"><span style="color: #fff; background: #c00; padding: 0px 2px 0px 2.4000000000000004px;">Tweet</span><span style="color: #000; background: #fff; padding: 0px 2.4000000000000004px 0px 2px;">this</span></span>';
        break;
 		case 11:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/twitter-a.png'.'">'; 
        break;     
    case 12:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/twitter-b.png'.'">'; 
        break;
    case 13:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/twitter-c.png'.'">'; 
        break;
    case 14:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/t_logo-a.png'.'">'; 
        break;
    case 15:
		$protwitter_tweet_this .= '<img src="'.$PLUGIN_PATH.'img/t_logo-b.png'.'">'; 
        break;
	}

		$protwitter_tweet_this .= '</div>';



	if (strpos($protwitter_tweet_this_tweet_text, "[TITLE]")===false)    $protwitter_tweet_this_tweet_text = '[TITLE] '.$protwitter_tweet_this_tweet_text ;
	if (strpos($protwitter_tweet_this_tweet_text, "[URL]")===false)    $protwitter_tweet_this_tweet_text .= ' [URL]' ;


	$protwitter_post_url_short = urlencode ($protwitter_post_url);
	$protwitter_post_url_short = "http://api.bit.ly/v3/shorten?login=haotik&apiKey=R_e2bb8af7b33552a2b15bd0bf9f4023cb&format=txt&uri=".$protwitter_post_url_short;
	$protwitter_post_url_short = wp_remote_fopen($protwitter_post_url_short);


	if ($protwitter_tweet_this_option5 != 1)
	{
		if ($protwitter_tweet_this_option6 != 1)
		{  $protwitter_post_url = $protwitter_post_url_short ;
		}
		else 
		{
			$protwitter_url_lenght = strlen($protwitter_post_url);
			if ($protwitter_url_lenght > 30)
			{
				$protwitter_post_url = $protwitter_post_url_short ;
			}
		}
	}

	if ($protwitter_tweet_this_tweet_text != '') {
		$protwitter_status_tags = array("[TITLE]", "[URL]");
		$protwitter_status_replace = array($protwitter_post_title,$protwitter_post_url);
		$protwitter_tweet_this_status = str_replace($protwitter_status_tags, $protwitter_status_replace, $protwitter_tweet_this_tweet_text);
	}
	else $protwitter_tweet_this_status = $protwitter_post_title.' '.$protwitter_post_url;

	$protwitter_tweet_this_target =''; $protwitter_tweet_this_nofollow ='';
	if ($protwitter_tweet_this_option1 == 1 ) $protwitter_tweet_this_target = 'target="_BLANK"';
	if ($protwitter_tweet_this_option2 == 1 ) $protwitter_tweet_this_nofollow = 'rel="nofollow"';

	$protwitter_tweet_this_url = 'http://twitter.com/home/?status='.urlencode ($protwitter_tweet_this_status);

	if ($protwitter_tweet_this_link_text != '') 
			$protwitter_tweet_this_link_text =' <a href="'.$protwitter_tweet_this_url.'" title="'.$protwitter_tweet_this_link_title.'" '.$protwitter_tweet_this_target.' '.$protwitter_tweet_this_nofollow.'>'.$protwitter_tweet_this_link_text.'</a>';

	
	$protwitter_tweet_this_button = '<a href="'.$protwitter_tweet_this_url.'" '.$protwitter_tweet_this_target.' '.$protwitter_tweet_this_nofollow.'>'.$protwitter_tweet_this.'</a>'.$protwitter_tweet_this_link_text;


	if ($protwitter_tweet_this_option3 != 1 ) {
			if ($protwitter_tweet_this_option4 != 1) {
					$content .= $protwitter_tweet_this_button ;
			}
			else {
					if (!is_page()) $content .= $protwitter_tweet_this_button ;
			}
	}
	else {
			if ($protwitter_tweet_this_option4 != 1) {
					if (is_single() || is_page()) $content .= $protwitter_tweet_this_button ;
			}
			else {
					if (is_single())  $content .= $protwitter_tweet_this_button ;
			}
	}

	return $content;

}


add_filter('the_content', 'protwitter_tweet_this_display');


?>
