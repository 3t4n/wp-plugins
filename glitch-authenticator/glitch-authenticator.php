<?php
/*
Plugin Name: Glitch Authenticator
Plugin URI: http://wordpress.org/extend/plugins/glitch-authenticator/
Description: Allows users to register & login with their Glitch account. Glitch Authenticator is not endorsed by or affiliated with Tiny Speck, Inc. (the makers of Glitch) in any way.
Version: 0.7
Author: ping
Author URI: http://www.glitch.com/profiles/PIF6RN35T3D1DT2/
*/

/*	Copyright (c) 2011

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
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_action('admin_menu', 'glitchauth_admin_add_page');
function glitchauth_admin_add_page() {
	add_options_page('Glitch Authenticator', 'Glitch Authenticator', 'manage_options', 'glitchauth_options', 'glitchauth_admin_page');
}
function glitchauth_admin_page() { ?>
	<div class="wrap">
		<h2>Glitch Authenticator</h2>
		<form action="options.php" method="post">
		<?php settings_fields('glitchauth_options'); ?>
		<?php do_settings_sections('glitchauth'); ?>
		<input name="Submit" type="submit" class="button-primary" style="margin-top: 15px;" value="<?php esc_attr_e('Save Changes'); ?>" />
		</form>
		<span style="text-align: right; border-top: solid 1px #ccc; padding-top: 3px; margin-top: 20px; display: block; font-style: italic">If you found this useful, <a href="http://www.gregariousgrocer.com/support-glitch-authenticator/">buy me a coffee?</a> :)</span>
	</div>
<?php
}

function glitchauth_warning() {
	if (!function_exists('curl_init')) {
		echo "<div id='glitchauth-curl-warning' class='updated fade'><p>It looks like <strong>curl</strong> support is not enabled for your host. Glitch Authenticator cannot work without curl. :( Please contact your host?</p></div>";
	}
	if (!get_option('glitchauth_api_key') || !get_option('glitchauth_api_secret')) {
		echo "<div id='glitchauth-api-warning' class='updated fade'><p><strong>Glitch Authenticator is almost ready.</strong> You must <a href='options-general.php?page=glitchauth_options'>enter your Glitch API key and secret</a> for it to work. </p></div>";
	}
}
add_action('admin_notices', 'glitchauth_warning');

// ---------- Settings ----------------
add_action('admin_init', 'glitchauth_settings_init');
function glitchauth_settings_init() {
	add_settings_section('glitchauth_setting_section',
		'API Settings',
		'glitchauth_setting_section_callback',
		'glitchauth');
		
 	add_settings_field('glitchauth_api_key',
		'API Key',
		'glitchauth_api_key_callback_function',
		'glitchauth',
		'glitchauth_setting_section');
 	register_setting('glitchauth_options','glitchauth_api_key');
 	
 	add_settings_field('glitchauth_api_secret',
		'API Secret',
		'glitchauth_api_secret_callback_function',
		'glitchauth',
		'glitchauth_setting_section');
	register_setting('glitchauth_options','glitchauth_api_secret');

 	add_settings_field('glitchauth_min_level',
		'Minimum Glitch Level',
		'glitchauth_min_level_callback_function',
		'glitchauth',
		'glitchauth_setting_section');
	register_setting('glitchauth_options','glitchauth_min_level','glitchauth_validate_min_level');
}

function glitchauth_setting_section_callback() {
	echo '<p>You need to <a href="http://developer.glitch.com/keys/new/" target="_blank">create</a> a new API key in Glitch with the parameters below.</p>'
		. '<p>'
		. 'App Name: <code>' . get_bloginfo('name') . '</code>'
		. '<br>Description (optional): <code>' . get_bloginfo('description') . '</code>'
		. '<br>URL (optional): <code>' . home_url() . '</code>'
		. '<br>Auth Redirect URI: <code>' . wp_login_url() . '</code>'
		. '<br>Enabled Auth Modes: <code><input type="checkbox" checked/>  Code (Server-Side)</code>'
		. '<br>Enabled Auth Scopes: <code><input type="checkbox" checked/>  Identity</code>'
		. '</p>'
		. '<p>Then come on back and input your API key and secret below.</p>';
}

function glitchauth_api_key_callback_function() {
	echo '<input placeholder="Example: 111-d5516e194da8233c74c6167ff0af348c42cf8b31" name="glitchauth_api_key" id="glitchauth_api_key" type="text" value="'. get_option('glitchauth_api_key') .'" style="width: 350px;" class="code" />';
}
function glitchauth_api_secret_callback_function() {
	echo '<input placeholder="Example: c76fc51a03af0a48ea76fc51e28af1f8eba1d3d93cdc04c" name="glitchauth_api_secret" id="glitchauth_api_secret" type="text" value="'. get_option('glitchauth_api_secret') .'" style="width: 350px;" class="code" />';
}
function glitchauth_min_level_callback_function() {
	echo '<input name="glitchauth_min_level" id="glitchauth_min_level" type="text" value="'. get_option('glitchauth_min_level') .'" style="width: 350px;" class="code" />';
}
function glitchauth_validate_min_level($input) {
	$valid = array();
	if (!is_numeric($input)) {
		add_settings_error(
			'glitchauth_min_level',
			'glitchauth_level_error',
			'Invalid level, please fix?',
			'error'
		);
		$valid = 1;
	} else {
		$valid = (int) $input;
	}
	return $valid;	
}
// ---------- Login Form ----------------
function glitchauth_login_url() {
	return wp_login_url() . '?authGlitch=1';
}
add_action('login_form', glitchauth_display_login);
function glitchauth_display_login() {
	if (!glitchauth_isValid()) { return; }
	$glitchLoginButton = '<p style="margin-bottom: 15px; overflow: hidden; "><input style="float: left;" name="authGlitch" id="authGlitch" type="submit" class="button-primary" value="Login with Glitch"></p>';
	$glitchLoginButton = apply_filters('glitchauth_display_login', $glitchLoginButton);
	echo $glitchLoginButton;
}

add_filter('login_message', glitchauth_loginmessage);
function glitchauth_loginmessage($message) {
	if ($_GET['error']) {
		$message .= '<div class="message error">' . $_GET['error_description'] . ' (<strong>' . $_GET['error'] . '</strong>)</div>';
	}
	$message = apply_filters('glitchauth_loginmessage', $message, $_GET['error'], $_GET['error_description']);
	return $message;
};

// ---------- Authentication ----------------
add_filter('login_redirect', 'glitchauth_login_redirect',10,3);
function glitchauth_login_redirect($redirect_to, $request) {
	if ($_GET['state']) {	// state used to pass redirect url
		return $_GET['state'];
	}
	global $current_user;
    get_currentuserinfo();
	if (is_array($current_user->roles))
	{
		//check for admins
		if (in_array("administrator", $current_user->roles)) {
			return home_url("/wp-admin/");
		} else {
			return home_url();
		}
	}
}

add_action('authenticate', glitchauth_authenticate);
function glitchauth_authenticate() {
	$API_BASE = 'https://api.glitch.com';	

	if ($_POST['pwd'] || $_POST['log']) { return; }
	if (!glitchauth_isValid()) { return; }
	
	$client_id = get_option('glitchauth_api_key');
	$client_secret = get_option('glitchauth_api_secret');
	$min_level = get_option('glitchauth_min_level');
	$min_level = ($min_level ? (int) $min_level : 1);

	if ($_POST['authGlitch'] || $_GET['authGlitch']) {
		$glitchAuthUrl = $API_BASE . '/oauth2/authorize?' . http_build_query(
				array('response_type'=>'code','scope'=>'identity','client_id'=>$client_id,'redirect_uri'=>wp_login_url(), 'state'=>$_GET['redirect_to']));
		echo "<meta http-equiv='refresh' content='0;url=" . $glitchAuthUrl . "' />";
		exit();
	}
	if ($_GET['code']) {
		$args = array(
			'grant_type'	=> 'authorization_code',
			'code'		=> $_GET['code'],
			'client_id'	=> $client_id,
			'client_secret'	=> $client_secret,
			'redirect_uri'	=> wp_login_url(),
			'state' => $_GET['state']
		);
		$obj = glitchauth_send_request($API_BASE."/oauth2/token", $args);
		$obj = glitchauth_send_request($API_BASE."/simple/auth.check", array( 'oauth_token' => $obj['access_token'] ));
		
		$player_tsid = $obj['player_tsid'];
		$player_name = $obj['player_name'];
		
		$playerInfo = glitchauth_send_request($API_BASE."/simple/players.fullInfo", array( 'player_tsid' => $player_tsid ));
		if ($playerInfo['stats']['level'] < $min_level) {
			remove_action('authenticate', 'wp_authenticate_username_password', 20);
			return new WP_Error('denied_level', '<strong>ERROR</strong>: You need to level up just a little bit more ;)');;
		}
		$isNewUser = true;
		if (!get_userdatabylogin($player_tsid)) {
			$userNew = array();
			$userNew['user_login'] = $player_tsid;
			$userNew['user_pass'] = wp_generate_password(12, false, false);
			$userNew['display_name'] = $player_name;
			$userNew['nickname'] = $player_name;
			$userNew['user_url'] = 'http://www.glitch.com/profiles/'.$player_tsid.'/';
			$user_id = wp_insert_user($userNew);
		} else {
			$user_id = username_exists($player_tsid);
			$isNewUser = false;
		}
		if ($user_id) {
			$userdata = get_userdata($user_id);
			if (!user_can($userdata->ID, 'read')) {
				remove_action('authenticate', 'wp_authenticate_username_password', 20);
				return new WP_Error('denied_capabilities', '<strong>ERROR</strong>: Hm, I think you overstayed your welcome...');
			}
			if ($isNewUser) {
				do_action('glitchauth_new_user', $obj);
			} else {
				do_action('glitchauth_returning_user', $obj);
			}
			$user = set_current_user($user_id);
			update_user_meta($user_id, 'glitch_avatar_50', $playerInfo["avatar"]["50"]);
			update_user_meta($user_id, 'glitch_avatar_100', $playerInfo["avatar"]["100"]);
			update_user_meta($user_id, 'glitch_avatar_172', $playerInfo["avatar"]["172"]);
			wp_set_auth_cookie($user_id);
			do_action('wp_login',$userdata->ID);
			return $user;
		} 
	}
}
// Method courtesy of Tiny Speak
// https://github.com/iamcal/glitch-oauth-demos/blob/master/oauth-server/curl.php
function glitchauth_send_request($url, $args) {
	$ret = glitchauth_curl_http_post($url, $args);
	if ($ret['status'] != 200 && $ret['status'] != 400) { }	// not valid http response		
	$obj = @json_decode($ret['body'], true);
	if (!is_array($obj) || !count($obj)) { exit; }	// cannot parse json
	if (strlen($obj['error'])) { exit; }	// error	
	return $obj;
}
// Method courtesy of Tiny Speak
// https://github.com/iamcal/glitch-oauth-demos/blob/master/oauth-server/curl.php
function glitchauth_curl_http_post($url, $post_args){
	$curl_handler = curl_init();
	curl_setopt($curl_handler, CURLOPT_URL, $url);
	curl_setopt($curl_handler, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_handler, CURLOPT_TIMEOUT, 5);
	curl_setopt($curl_handler, CURLOPT_FAILONERROR, FALSE);
	curl_setopt($curl_handler, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl_handler, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($curl_handler, CURLOPT_POST, 1);
	curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $post_args);
	$body = @curl_exec($curl_handler);
	$info = @curl_getinfo($curl_handler);
	curl_close($curl_handler);
	return array(
		'status'	=> $info['http_code'],
		'body'		=> $body,
		'info'		=> $info,
	);
}

function glitchauth_isValid() {
	$client_id = get_option('glitchauth_api_key');
	$client_secret = get_option('glitchauth_api_secret');
	return ($client_id && $client_secret && function_exists('curl_init'));
}

// ---------- Avatars ----------------
add_filter('get_avatar', 'glitchauth_get_avatar');
function glitchauth_get_avatar($avatar) {
	if (!glitchauth_isValid()) { return $avatar; }
	global $comment;
	if ( $comment->user_id > 0) {
		$avatarSize = '50';
		$avatarSize = apply_filters('glitchauth_comment_avatar_size', $avatarSize);
		$a = glitchauth_get_glitch_avatar($comment->user_id, $avatarSize);
		if ($a) { 
			$avatar = "<img  alt='Glitch Avatar' src='{$a}' class='avatar photo avatar-default glitch-avatar' />";
		}
	}
	return $avatar;
}
function glitchauth_get_glitch_avatar($user, $size = '50') {
	if ( is_numeric($user) ) {
		$id = (int) $user;
	}  elseif ( is_object($user) ) {
		if (!empty($user->user_id)) { 
			$id = $user->user_id;
		} elseif (!empty($user->post_author)) {
			$id = $user->post_author;
		} elseif (!empty($user->ID)) {
			$id = $user->ID;
		}
	}
	if ($id) {
		return get_user_meta($id, 'glitch_avatar_'.$size, true);
	}
}
function get_the_glitch_avatar($size = '50') {
	global $post;
	$avatar = glitchauth_get_glitch_avatar($post, $size);
	if (!$avatar) {
		$avatar = get_avatar(get_the_author_meta('ID'), $size);
	} else {
		$avatar = '<img alt="" src="'.$avatar.'" class="glitch-avatar glitch-avatar-'.$size.'"/>';
	}
	return $avatar;
}
function the_glitch_avatar($size = '50') {
	echo get_the_glitch_avatar($size);
}