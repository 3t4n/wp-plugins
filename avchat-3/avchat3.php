<?php
/*
Plugin Name: Community Lite Video Chat Plugin for WordPress
Plugin URI: https://wordpress.org/extend/plugins/avchat-3/
Description: This plugin integrates <a href="http://avchat.net/?utm_source=wp-backend-plugins-page&utm_medium=wp-plugin&utm_content=wp-plugin&utm_campaign=avchat" target="_blank">AVChat 3</a> into any WordPress website. When updating, keep in mind that the AVChat 3 client side files will be removed from your website and you need to upload them again to <code>wp-content/plugins/avchat-3</code>.
Author: avchat.net
Version: 2.2
Author URI: http://avchat.net/
*/

if (session_id() == "") {session_start();}

//this function is called when you press Activate
function avchat3_install() {
	global $wpdb;
	global $wp_roles;

	$table_name = $wpdb->prefix . "community_lite_permissions";
	$table2_name = $wpdb->prefix . "community_lite_general_settings";

	//we remove the tables if they exist
	$sql = "DROP TABLE  $table_name";
	$results = $wpdb->query($sql);
	$sql = "DROP TABLE  $table2_name";
	$results = $wpdb->query($sql);

	//keep in mind if the tables were present\
	$tables_were_present = true;
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name && $wpdb->get_var("SHOW TABLES LIKE '$table2_name'") != $table2_name) {
		$tables_were_present = false;
	}

	$sql = "CREATE TABLE " . $table_name . " (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		user_role varchar(50) DEFAULT '0' NOT NULL,
		can_access_chat tinyint(1) NOT NULL,
		can_access_admin_chat tinyint(1) NOT NULL,
		can_publish_audio_video tinyint(1) NOT NULL,
		can_stream_private tinyint(1) NOT NULL,
		can_send_files_to_rooms tinyint(1) NOT NULL,
		can_send_files_to_users tinyint(1) NOT NULL,
		can_pm tinyint(1) NOT NULL,
		can_create_rooms tinyint(1) NOT NULL,
		can_watch_other_people_streams tinyint(1) NOT NULL,
		can_join_other_rooms tinyint(1) NOT NULL,
		show_users_online_stay tinyint(1) NOT NULL,
		view_who_is_watching_me tinyint(1) NOT NULL,
		can_block_other_users tinyint(1) NOT NULL,
		can_buzz tinyint(1) NOT NULL,
		can_stop_viewer tinyint(1) NOT NULL,
		can_ignore_pm tinyint(1) NOT NULL,
		typing_enabled tinyint(1) NOT NULL,
		free_video_time mediumint(5) NOT NULL,
		drop_in_room varchar(5) NOT NULL,
		max_streams mediumint(2) NOT NULL,
		max_rooms mediumint(2) NOT NULL,
		username_prefix varchar(10) NOT NULL,
		UNIQUE KEY id (id)
		);
		CREATE TABLE " . $table2_name . " (
		connection_string TEXT NOT NULL,
		invite_link TEXT NOT NULL,
		disconnect_link TEXT NOT NULL,
		login_page_url TEXT NOT NULL,
		register_page_url TEXT NOT NULL,
		text_char_limit mediumint(2) NOT NULL,
		history_lenght mediumint(3) NOT NULL,
		hide_left_side ENUM ('yes', 'no') NOT NULL,
		p2t_default ENUM ('yes', 'no') NOT NULL,
		flip_tab_menu ENUM ('top', 'bottom') NOT NULL,
		display_mode ENUM ('embed', 'popup') NOT NULL,
		allow_facebook_login ENUM ('yes', 'no') NOT NULL,
		FB_appId TEXT NOT NULL
		);
		";
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta($sql);

	if (!$tables_were_present) {
		foreach ($wp_roles->roles as $role => $details) {
			$user_roles[$role] = $details["name"];
		}

		//unset($user_roles['administrator']);

		//we add these 2 roles to the array so that default values are also inserted for them
		$user_roles['visitors'] = "Visitors";

		//Network users are users that have signed up on the main site of a Multisite enabled WP instalation, they have no role on the main site but are admin in their own websites (part of the WP Multisite network)
		//$user_roles['networkuser'] = "Network user";

		foreach ($user_roles as $key => $value) {
			$canAccessAdmin = 0;
			if ($key == "administrator") {
				$canAccessAdmin = 1;
			}
			$insert = "INSERT INTO " . $table_name .
			" (user_role, can_access_chat, can_access_admin_chat, can_publish_audio_video, can_stream_private, can_send_files_to_rooms, can_send_files_to_users, can_pm, can_create_rooms, can_watch_other_people_streams, can_join_other_rooms, show_users_online_stay, view_who_is_watching_me, can_block_other_users, can_buzz, can_stop_viewer, can_ignore_pm, typing_enabled, free_video_time, drop_in_room, max_streams, max_rooms) " .
			"VALUES ('$key','1','$canAccessAdmin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '3600', '', '4', '4')";
			$results = $wpdb->query($insert);
		}

		$insert = "INSERT INTO " . $table2_name .
		" (connection_string, invite_link, disconnect_link, login_page_url, register_page_url, text_char_limit, history_lenght, hide_left_side, p2t_default, flip_tab_menu, display_mode, allow_facebook_login, FB_appId) " .
		"VALUES ('rtmp://','','/','/', '/', '200', '20', 'no', 'yes', 'top', 'embed', 'yes', '')";
		$results = $wpdb->query($insert);
	}
}

function avchat3_get_user_details() {
	global $current_user;
	global $wpdb;
	global $blog_id;

	if (function_exists( 'wp_get_current_user' )){
		//wp_get_current_user is the recommended function since WordPress 4.5
		wp_get_current_user();
	}else{
		//get_currentuserinfo id deprcated as of WP 4.5
		//https://codex.wordpress.org/Function_Reference/get_currentuserinfo
		get_currentuserinfo();
	}

	$user_roles = array();
	$user_info = array();

	if (function_exists('is_site_admin')) {
		$avchat3_is_on_wpmu = true;
	} else {
		$avchat3_is_on_wpmu = false;
	}

	if ($current_user->ID == null || $current_user->ID == "") {
		$user_info['user_id'] = '0';
	} else {

		/*
		if($avchat3_is_on_wpmu){
		$av3_current_blog_capabilities = 'wp_'.$blog_id.'_capabilities';
		}else{
		$av3_current_blog_capabilities = 'wp_capabilities';
		}
		 */

		$av3_current_blog_capabilities = $wpdb->prefix . 'capabilities';

		$user_roles = array_keys($current_user->$av3_current_blog_capabilities);

		$user_info['user_id'] = $current_user->ID;
		$user_info['user_login'] = $current_user->user_login;
		$user_info['user_display_name'] = $current_user->display_name;
		$user_info['user_level_id'] = $current_user->user_level;
		$user_info['user_email'] = $current_user->user_email;
		$user_info['user_role'] = $user_roles[0];

		//if($user_info['user_role'] != "administrator"){
		$query = "SELECT * FROM " . $wpdb->prefix . "community_lite_permissions" . " WHERE user_role = '" . $user_info['user_role'] . "'";
		$user_permissions = $wpdb->get_results($query);

		unset($user_permissions[0]->id);
		unset($user_permissions[0]->user_role);

		foreach ($user_permissions[0] as $key => $value) {
			$user_info[$key] = $value;
		}
		//}
	}

	return $user_info;

}

function get_avchat3_visitor_permissions() {
	global $wpdb;

	$query = "SELECT * FROM " . $wpdb->prefix . "community_lite_permissions" . " WHERE user_role = 'visitors'";
	$user_permissions = $wpdb->get_results($query);

	unset($user_permissions[0]->id);
	unset($user_permissions[0]->user_role);

	foreach ($user_permissions[0] as $key => $value) {
		$user_info[$key] = $value;
	}
	$user_info['user_role'] = 'visitor';

	return $user_info;
}

function get_community_lite_general_settings() {
	global $wpdb;

	$query = "SELECT * FROM " . $wpdb->prefix . "community_lite_general_settings";
	$general_settings = $wpdb->get_results($query);

	return $general_settings;
}

function get_avchat3_general_setting($general_av_setting) {
	global $wpdb;

	$query = "SELECT " . $general_av_setting . " FROM " . $wpdb->prefix . "community_lite_general_settings";
	$result = $wpdb->get_results($query);

	return $result[0];
}

function avchat3_set_community_lite_general_settings_on_session() {
	if (session_id() == "") {
		session_start();
	}

	$general_settings = get_community_lite_general_settings();

	foreach ($general_settings[0] as $key => $value) {
		$_SESSION[$key] = $value;
	}

}

function avchat3_set_avchat3_buddy_details_on_session($buddy_details) {
	if (session_id() == "") {
		session_start();
	}

	foreach ($buddy_details as $key => $value) {
		$_SESSION[$key] = $value;
	}
}

function avchat3_set_user_details_on_session($user_info) {
	if (session_id() == "") {
		session_start();
	}

	if ($user_info['user_id'] == "0") {
		$user_info = get_avchat3_visitor_permissions();
	} else {
		$_SESSION['user_logged_in'] = true;
	}

	foreach ($user_info as $key => $val) {
		$_SESSION[$key] = $val;
	}
}

function avchat3_clear_session() {
	session_destroy();
}

//function used to embed AVChat into pages and posts using the [chat-lite] short code. This is the main method of embedding AVChat in WordPress.
function avchat3_get_user_chat($content) {
	$user_info = avchat3_get_user_details();
	avchat3_set_user_details_on_session($user_info);
	avchat3_set_community_lite_general_settings_on_session();

	//Somehow WP automtically adds P and BR to the $embed code below which breaks functionality. We're toggling the feature off with these 2 lines.
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );

	if (isset($user_info['can_access_admin_chat']) && $user_info['can_access_admin_chat']) {
		$movie_param = 'admin.swf';
	} else {
		$movie_param = 'index.swf';
	}

	$display_mode = get_avchat3_general_setting('display_mode')->display_mode;

	//Plugins URL without the trailing slash
	$pluginsurl = plugins_url();

	//link to SWF file
    $linktoswf= $pluginsurl.'/avchat-3/' . $movie_param;

	//Check if buddypress is installed
	if (in_array('buddypress/bp-loader.php', apply_filters('active_plugins', get_option('active_plugins')))) {

		//Get buddypress member avatar
		$buddy_details['avatar'] = bp_core_fetch_avatar(array('item_id' => $user_info['user_id'], 'type' => 'thumb', 'alt' => '', 'css_id' => '', 'class' => 'avatar', 'width' => '40', 'height' => '40', 'email' => $user_info['user_email'], 'html' => 'false'));
		$buddy_details['is_buddy'] = 1;

		avchat3_set_avchat3_buddy_details_on_session($buddy_details);
	}

	$role = $_SESSION['user_role'];

	if (!file_exists(__DIR__.'/index.swf')) {
		//the AVChat 3 files have not been copied to the installation folder
		$embed = "<p>Just a small step to finish: you need to install the AVChat software. Check Part 2 from the <a href='https://wordpress.org/plugins/avchat-3/installation/' target='_blank'>plugin's installation instructions</a> (at Wordpress.org). You can <a href='http://avchat.net/buy-now?utm_source=wp-plugin&utm_medium=wp-backend-standard&utm_content=header-buy&utm_campaign=avchat-wp-lite' target='_blank'>purchase AVChat</a> or get a free 15 days trial from <a href='http://avchat.net/15daystrial/?utm_source=wp-plugin&utm_medium=wp-backend-standard&utm_content=header-request-trial&utm_campaign=avchat-wp-lite' target='_blank'>here</p>";
	} else {
		include_once __DIR__.'/Mobile_Detect.php';
		$mobilecheck = new Mobile_Detect();
		if ($mobilecheck->isMobile() || $mobilecheck->isTablet()) {
			$embed = '<a href="'.$pluginsurl.'/avchat-3/ws/m.php" style="background:#f0f0f0;display:block;padding:10px 20px;width:200px;text-align:center;border:1px solid #ccc">Enter mobile version</a>';
		} else {
$embed = <<<HTML
<div id="myContent">
	<div id="av_message" style="color:#ff0000">
		<p>You need to have JavaScript enabled and <a target="_blank" href="http://get2.adobe.com/flashplayer/">the latest version of Flash Player</a> for the chat to work.</p>
	</div>
</div>
<script type="text/javascript">
	var flashvars = {
		lstext : "Loading Settings...",
		sscode : "php",
		userId : ""
	};

    var params = {
        quality : "high",
        bgcolor : "#272727",
        allowFullScreen : "true",
        base : "$pluginsurl/avchat-3/"
    };
	var attributes = {
		name : "index_embed",
		id :   "index_embed",
		align : "middle"
	};
	var size = {
        width:"100%",
        height:600
    };
	//swfobject.embedSWF("' . get_bloginfo('url') . '/wp-content/plugins/avchat-3/' . $movie_param . '", "myContent", "100%", "600", "11.4.0", "", flashvars, params, attributes);
	var hasFlash = function(a,b){try{a=new ActiveXObject(a+b+'.'+a+b)}catch(e){a=navigator.plugins[a+' '+b]}return!!a}('Shockwave','Flash');
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isFirefox = typeof InstallTrigger !== 'undefined';
    if((isIE && hasFlash == false) || (isFirefox && hasFlash == false)){
        //If we're on IE or Firefox and Flash Player is NOT installed
        //Chrome 56+ and Safari 10  will not advertise Flash player's presence anymore so there's no way to check
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = "div.getFlash{width:100%;height:100%;background-color:#363738;margin:0 auto;} div.getFlash p {text-align:center;vertical-align: middle;line-height:100%;font-family:sans-serif;font-size:14px;color:#ffffff;text-decoration:underline;}";
        document.body.appendChild(css);
        document.getElementById('myContent').innerHTML = '<div class="getFlash"><p><a style = "color:#ffffff !important;" href="' + ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.adobe.com/go/getflashplayer" target="_blank">Flash Player is needed to display this content</a></p></div>';
    }else{
        if (flashvars && typeof flashvars === "object") {
            for (var k in flashvars) {
                if (typeof flashVarsString != "undefined") {
                    flashVarsString += "&" + k + "=" + flashvars[k];
                }
                else {
                    flashVarsString = k + "=" + flashvars[k];
                }
            }
        }
        //console.log(flashVarsString);
        flashVarsString = flashVarsString.replace(/\"/g,'\&quot;');
        //console.log(flashVarsString);
        //Detecting IE less than version 9
        var div = document.createElement("div");
        div.innerHTML = "<!--[if lt IE 9]><i></i><![endif]-->";
        var isIeLessThan9 = (div.getElementsByTagName("i").length == 1);
        if (isIE && isIeLessThan9){
            //IE8 and earlier
            document.getElementById('myContent').innerHTML = '<object type="application/x-shockwave-flash" name="'+attributes["name"]+'" id="'+attributes["id"]+'" align="'+attributes["align"]+'" width="'+size["width"]+'" height="'+size["height"]+'"><param name="quality" value="'+params["quality"]+'"><param name="bgcolor" value="'+params["bgcolor"]+'"><param name="allowscriptaccess" value="'+params["allowscriptaccess"]+'"><param name="base" value="'+params["base"]+'"><param name="allowFullScreen" value="'+params["allowFullScreen"]+'"><param name="flashvars" value="'+flashVarsString+'"><param name="movie" value="$linktoswf"</object> ';
        }else{
            //All other browsers
            document.getElementById('myContent').innerHTML = '<object type="application/x-shockwave-flash" name="'+attributes["name"]+'" id="'+attributes["id"]+'" align="'+attributes["align"]+'" data="$linktoswf" width="'+size["width"]+'" height="'+size["height"]+'"><param name="quality" value="'+params["quality"]+'"> <param name="bgcolor" value="'+params["bgcolor"]+'"><param name="allowscriptaccess" value="'+params["allowscriptaccess"]+'"><param name="base" value="'+params["base"]+'"><param name="allowFullScreen" value="'+params["allowFullScreen"]+'"><param name="flashvars" value="'+flashVarsString+'"></object> ';
        }
    }
</script>
HTML;
		}
	}
	return str_replace('[chat-lite]', $embed, $content);
}

register_activation_hook(__FILE__, 'avchat3_install');
add_action('wp_logout', 'avchat3_clear_session');
add_action('admin_menu', 'add_new_menu');
add_filter('the_content', 'avchat3_get_user_chat', 7);

/*
 * Add the new Menu
 */
function add_new_menu() {
	add_menu_page(
		'Community Lite Video Chat Plugin', //the text to be displayed in the title tags of the page when the menu is selected
		'Community Lite', //the text to be used for the menu
		'administrator', //the capability required for this menu to be displayed to the user.
		'avchat-3/avchat3-settings.php',
		'', /* $function */
		plugins_url('avchat-3/logo-avchat-18x18.png'),
		81/* position */
	);
	// The first submenu is a 'dummy menu'
	add_submenu_page('avchat-3/avchat3-settings.php', 'Community Lite Plugin Settings', 'Settings', 'administrator', 'avchat-3/avchat3-settings.php');
	add_submenu_page('avchat-3/avchat3-settings.php', 'Enter Chat', 'Enter Chat', 'administrator', 'avchat-3/enter-chat.php');
	add_submenu_page('avchat-3/avchat3-settings.php', 'Provide us with Feedback', 'Feedback', 'administrator', 'avchat-3/feedback.php');

}
?>