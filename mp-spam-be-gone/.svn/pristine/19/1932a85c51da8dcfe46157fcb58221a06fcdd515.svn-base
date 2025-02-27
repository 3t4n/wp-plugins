<?php
/*
Plugin Name: MP Spam Be Gone
Plugin URI: http://MikesPickzWS.com/wordpress-plugins/mp-spam-be-gone
Description: Spam, BE GONE!! MP Spam Be Gone is the simplest, most effective Spam blocker. This plugin was inspired by some of the best Anti-Spam plugins available on WordPress.
Version: 1.0
Author: MikesPickz Web Solutions, Inc.
Author URI: http://MikesPickzWS.com
License: GPL2
*/

/*  Copyright 2011  MikesPickz Web Solutions, Inc.  (email : Mike@MikesPickzWS.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//Create Settings Page
function mp_spam_be_gone_add_page() {
	add_options_page('MP Spam-Be-Gone Options', 'MP Spam Be Gone', 'manage_options',  __FILE__, 'mp_spam_be_gone_options_page');
}
add_action('admin_menu', 'mp_spam_be_gone_add_page');

//Actual Content of Settings Page
function mp_spam_be_gone_options_page() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	} ?>
    <div class="wrap">
    <div class="icon32" id="icon-tools"><br /></div>
    <h2>MP Spam Be Gone Options</h2>
    <h4>Brought to you by <a href="http://MikesPickzWS.com/" target="_blank">MikesPickz Web Solutions, Inc.</a> | <a href="http://MikesPickzWS.com/wordpress-plugins/mp-spam-be-gone/" target="_blank">Support Site</a> | <a href="http://profiles.wordpress.org/users/MikesPickz/" target="_blank">Other Plugins</a></h4>
<table class="form-table">
<tr valign="top">
<td>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="font-size:18px;">
    	<span>
        If you enjoy this plugin, you could always make a small donation to <strong>buy me a coffee</strong> for my coding sessions. Thanks in advance.<br /><br />
        </span>
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="WSQCA5ZL8BQFY">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    </form>
</td>
</tr>
</table>

</div>
<?php
}

//Add Settings Link on Plugins Page
function mp_spam_be_gone_add_settings_link($links, $file) {
	static $this_plugin;
	if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
 
	if ($file == $this_plugin){
		$settings_link = '<a href="admin.php?page=mp-spam-be-gone/mp-spam-be-gone.php">'.__("Settings").'</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}
add_filter('plugin_action_links', 'mp_spam_be_gone_add_settings_link', 10, 2);

//Footer Includes
function mp_spam_be_gone_footer_includes() {
	wp_enqueue_script( 'jquery' );
}
add_action('wp_footer', 'mp_spam_be_gone_footer_includes');

//Add the Spam prevention to the Comment form
function mp_spam_be_gone_insert_check() { 
	if(!is_user_logged_in()){
		echo '<input type="hidden" id="mp_sbg_email" name="mp_sbg_email" value="" />';
		echo '<div id="mp_sbg_insert"></div>'; ?>
		<script>
		jQuery("#mp_sbg_insert").append('<label for="mp_sbg_checkbox">Please check to prove YOU ARE human. Thank you.<br /></label><input type="checkbox" id="mp_sbg_checkbox" name="mp_sbg_checkbox" />');
		</script>
		<noscript>
		<?php
		$pw = uniqid("mp",FALSE);
		echo '<input type="hidden" id="mp_sbg_checkbox" name="mp_sbg_checkbox" value="" />';
		echo "<label for='mp_sbg_pw'>Please copy this password:</label><input type='text' id='mp_sbg_pw' name='mp_sbg_pw' value='$pw' />";
		echo "<label for='mp_sbg_cpw'>Please paste the password here:</label><input type='text' id='mp_sbg_cpw' name='mp_sbg_cpw' value='' />";
		?>
		</noscript>
		<?php 
		echo '<input type="hidden" id="mp_sbg_facebook" name="mp_sbg_facebook" value="" />';
	} else {
		echo "<!--MP Spam Be Gone not needed since you are logged in-->";
	}
}
add_filter('comment_form_after_fields', 'mp_spam_be_gone_insert_check', 25);

//Check the custom fields
function mp_sbg_check_comment($commentdata){
	if(is_user_logged_in()){
		return $commentdata;
	}
	if(!isset($_POST['mp_sbg_checkbox'])){
		wp_die("Dang, you didn't check the box indicating you are human");
	} elseif (isset($_POST['mp_sbg_email']) && $_POST['mp_sbg_email'] !== ''){
		wp_die("Pretty impressive filling that field in");
	} elseif (isset($_POST['mp_sbg_facebook']) && $_POST['mp_sbg_facebook'] !== ''){
		wp_die("While you're on Facebook, like my page!");
	} elseif (isset($_POST['mp_sbg_pw']) && $_POST['mp_sbg_pw'] !== $_POST['mp_sbg_cpw']){
		wp_die("Sorry, the password was incorrect.");
	} 
	
	$spam = false;
	
	if($commentdata['comment_type'] == 'pingback' || $commentdata['comment_type'] == 'trackback'){
		//Topsy check
		if(stristr($commentdata['comment_author_url'],"topsy")) {
			$spam = "topsy";
		}
		if(stristr($commentdata['comment_author'],"topsy")) {
			$spam = "topsy";
		}
		//Verify IP address
		if (!$spam) {
			$user_IP = preg_replace('/[^0-9.]/', '', $_SERVER['REMOTE_ADDR'] );
			$authDomainname = mp_sbg_get_domainname_from_uri($commentdata['comment_author_url']);
			$url_IP = preg_replace('/[^0-9.]/', '', gethostbyname($authDomainname) );
	
			if ($user_IP != $url_IP) {
				$spam = "ip";	
			}
		
		}
		//Verify actual link from site
		if (!spam) {
		$permalink = get_permalink($commentmeta['comment_post_ID']);
		$site = file_get_contents($commentdata['comment_author_url']);
			if(!stristr($site,$permalink)) {
				$spam = "url";
			}
		}
		//Is it spam?
		if (!$spam) {
			return $commentdata;
		} else {	
			if ($spam == "topsy") {
				die('Your trackback has been rejected.');
			} elseif ($spam == "ip") {
				die('Your trackback has been rejected.');
			} elseif ($spam == "url") {
				$commentdata['comment_author'] = '[BLOCKED BY MP_SBG] ' . $commentdata['comment_author'];
				add_filter('pre_comment_approved', create_function('$mp', 'return \'spam\';'));
				return $commentdata;
			}
		}
	}
	return $commentdata;
}
add_filter('preprocess_comment','mp_sbg_check_comment',1,1);

//Get the domain for the IP check
function mp_sbg_get_domainname_from_uri($uri) {
    $exp1 = '/^(http|https|ftp)?(:\/\/)?([^\/]+)/i';
	preg_match($exp1, $uri, $matches);
	if (isset($matches[3])) {
		return $matches[3];
    } else {
		return '';
	}
}
?>