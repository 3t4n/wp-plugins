<?php
/*
Plugin Name: AskApache Firefox Adsense
Plugin URI: http://www.askapache.com/wordpress/firefox-adsense-plugin.html
Description: Displays a Google Adsense Ad for Firefox only for non-firefox users. <a href="options-general.php?page=askapache-firefox-adsense.php">Options configuration panel</a>
Version: 3.0
Author: AskApache
Author URI: http://www.askapache.com

== Installation ==

1. Upload and unzip to the /wp-content/plugins/ directory then activate
2. Go to your Options Panel and open the "AA Firefox Ads" submenu. /wp-admin/options-general.php?page=askapache-firefox-adsense.php
3. Enter in your google firefox adsense code and hit the "Update Values" Button.
4. Add the code on your pages by including <?php if(function_exists('aa_firefox_ad'))aa_firefox_ad();?> in your templates (1 per page, 1 ad per page).


/--------------------------------------------------------------------\
|                                                                    |
| License: GPL                                                       |
|                                                                    |
| AskApache Firefox Adsense Plugin - Adds Adsense for Firefox        |
| Copyright (C) 2007-2008, AskApache, www.askapache.com              |
| All rights reserved.                                               |
|                                                                    |
| This program is free software; you can redistribute it and/or      |
| modify it under the terms of the GNU General Public License        |
| as published by the Free Software Foundation; either version 2     |
| of the License, or (at your option) any later version.             |
|                                                                    |
| This program is distributed in the hope that it will be useful,    |
| but WITHOUT ANY WARRANTY; without even the implied warranty of     |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the      |
| GNU General Public License for more details.                       |
|                                                                    |
| You should have received a copy of the GNU General Public License  |
| along with this program; if not, write to the                      |
| Free Software Foundation, Inc.                                     |
| 51 Franklin Street, Fifth Floor                                    |
| Boston, MA  02110-1301, USA                                        |   
|                                                                    |
\--------------------------------------------------------------------/
*/

function aa_is_wp_cache(){
	$aa_cache=false;
	if( !@include(ABSPATH . 'wp-content/wp-cache-config.php') )	$aa_cache=false;
	else {
		if(!$cache_enabled)$aa_cache=false;
		else $aa_cache=true;
	}
	return $aa_cache;
}


function aa_firead_options_setup() {
    add_options_page('AskApache Firefox Adsense', 'AA Firefox Ads', 7, basename(__FILE__), 'aa_firead_page');
}
add_action('admin_menu', 'aa_firead_options_setup');





//---------------------------
function aa_firead_page() {
	$AA_FIREAD_V='3.0';
	$aa_firead_code='';
	global $aa_status;
	
	
	    // security
    if ( function_exists('current_user_can') && !current_user_can('manage_options') ) die(__('Cheatin&#8217; uh?'));
    if (! user_can_access_admin_page()) {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }


	if($_SERVER['REQUEST_METHOD']==='POST'){
        $valid_nonce = wp_verify_nonce($_REQUEST['_wpnonce'], 'askapache-firead-update_modify');
		if(isset($_POST['aafireadcode']))	update_option('aa_firead_code',stripslashes($_POST['aafireadcode']));
		$aa_status = '<div id="message" class="updated fade"><p><strong>Updated  successfully</strong>.</p></div>';
	} 


	$aa_firead_code = get_option('aa_firead_code');
	

    $aa_head='<p style="text-align:center;">[ <script type="text/javascript"><!--
google_ad_client = "pub-4356884677303281";
google_ad_output = "textlink";
google_ad_format = "ref_text";
google_cpa_choice = "CAAQnfzw4AIaCJwZC9ix5DwoKN2uuIEBMAA";
google_ad_channel = "5885121455";
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script> - <a href="https://www.google.com/adsense/referrals-settings">Get Firefox Adsense Code</a> - <a href="http://www.askapache.com/wordpress/firefox-adsense-plugin.html">AskApache Firefox Adsense Plugin <strong>'. 
	$AA_FIREAD_V . '</strong></a> - <a href="http://www.askapache.com/">Author Home</a> ]</p>
	<hr style="visibility:hidden;">';
	
	ob_start();
	echo '<div class="wrap"><h2>Firefox Adsense Preview</h2>';
	aa_firefox_ad_test();
	echo '</div>';
	$aa_test=ob_get_clean();
	$aa_main ='<div class="wrap">
    <h2>AskApache Firefox Adsense ' . $AA_FIREAD_V . '</h2>
	<blockquote>Firefox plus Google Toolbar: When a user you\'ve referred to Firefox plus Google Toolbar runs Firefox for the first time, you\'ll receive up to US$1 in your account, depending on the user\'s location. Your referral must be a Windows user, who has not previously installed Firefox, in order for you to receive credit.</blockquote>
	<form action="' . $_SERVER['REQUEST_URI'] . '" id="sform" method="post">';
	
	
	$aa_foot='<fieldset class="options">
        <legend>Google Firefox Adsense Code</legend>
        <ul style="list-style:none;list-style-type:none;">
        <li><textarea cols="70" rows="15" name="aafireadcode" id="aafireadcode" tabindex="1">'.$aa_firead_code.'</textarea></li>
        <li class="BT" style="padding-left:5em;"><input type="submit" name="update" id="update" class="button" value="Update Adsense Code" /></li>
		</ul></fieldset></form></div>';



	_e($aa_head);
	_e($aa_status);
	_e($aa_test);
	
	?>
    
    <div id="message" class="updated"><p>Insert this code into your template files to use.  <code>&lt;?php if(function_exists('aa_firefox_ad'))aa_firefox_ad();?&gt;</code></p></div>
	<?php

	_e($aa_main);
	if ( function_exists('wp_nonce_field') ) wp_nonce_field('askapache-firead-update_modify');
	_e($aa_foot);

}





function aa_firefox_ad(){
	$aa_bad=false;
	$aa_firead_code='';
	
	if(!isset($_SERVER['HTTP_USER_AGENT'])) $aa_bad=true;
	
	if(preg_match("/firefox/i", $_SERVER['HTTP_USER_AGENT'])) $aa_bad=true;
	
	if(preg_match("/safari/i", $_SERVER['HTTP_USER_AGENT'])) $aa_bad=true;

	if(preg_match("/linux/i", $_SERVER['HTTP_USER_AGENT'])) $aa_bad=true;
	
	if(!preg_match("/windows/i", $_SERVER['HTTP_USER_AGENT'])) $aa_bad=true;
	
	if(get_option('aa_firead_code')==''){
		$aa_bad=true;
		echo '<!--please setup your firefox adsense code in the admin panel-->';
	} else $aa_firead_code = get_option('aa_firead_code');
	
	
	if(!aa_is_wp_cache()){
		if($aa_bad===false)	echo $aa_firead_code;
		else echo '';
	}else echo '<!--[if lt IE 9]>'.$aa_firead_code.'<![endif]-->';
}


function aa_firefox_ad_test(){
	global $aa_status;
	$aa_tstatus='<div id="message" class="error fade">';
	$aa_firead_code='';
	
	if(!isset($_SERVER['HTTP_USER_AGENT'])) $aa_tstatus.='<p><strong>Your HTTP_USER_AGENT is not set... weird!</strong>.</p>';
	else if(preg_match("/firefox/i", $_SERVER['HTTP_USER_AGENT'])) $aa_tstatus.='<p><strong>You are using firefox!</strong> Normally you would not see this firefox ad..</p>';
	else $aa_tstatus.='<p><strong>You are not using firefox!</strong> '.$_SERVER['HTTP_USER_AGENT'].' which is required for this ad to be shown.</p>';
	
	if(preg_match("/windows/i", $_SERVER['HTTP_USER_AGENT'])) $aa_tstatus.='<p><strong>You are using Windows</strong>, which is required for this ad to be shown.</p></div>';
	else $aa_tstatus.='<p><strong>You are not using Windows!</strong> '.$_SERVER['HTTP_USER_AGENT'].' which is required for this ad to be shown.</p>';
	
	if(get_option('aa_firead_code')!=='')$aa_firead_code = get_option('aa_firead_code');
	else if(isset($_POST['aafireadcode']))$aa_firead_code=stripslashes($_POST['aafireadcode']);
	
	$aa_tstatus.='</div>';
	$aa_status.=$aa_tstatus;
	
	echo $aa_firead_code;
}







function aa_firefox_ad_activate(){
	$default='<h3>Ahh!</h3>
<p>Time to get with the modern world...</p>
<p style="width:180px;height:60px;border-bottom:2em solid #FFF;"><script type="text/javascript"><!--
google_ad_client = "pub-4356884677303281";
google_ad_width = 180;
google_ad_height = 60;
google_ad_format = "180x60_as_rimg";
google_cpa_choice = "CAEQyaj8zwEaCKCJaWKIHxaGKMu293M";
google_ad_channel = "5229566407";
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>';

	update_option('aa_firead_code',stripslashes($default));
}


register_activation_hook(__FILE__, 'aa_firefox_ad_activate');
?>