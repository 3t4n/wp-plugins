<?php

## GET  IP
function wpda_get_ip($array = true){
	if($array)
		return  explode(',',get_option('wpda_ip'));
	else
		return get_option('wpda_ip');
}

## Check IP
function wpda_verify_ip($ip = ''){
	if($ip == '')
		$ip = wpda_get_client_ip();
	
	return in_array($ip,wpda_get_ip());
}

// Function to get the client IP address
function wpda_get_client_ip() {	
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

// Alert the Developer Mode in website
function wpda_developer_mode_display(){
	if(	wpda_verify_ip() && get_option('wpda_email_developer_mode')){
		$developer_bar =  '<div id="mode-alert" style="background: #0c888ede;
			position: fixed;
			width: 90%;
			margin: 1% 5%;
			text-align: center;
			top: 0px;
			z-index: 999999;
			color: #fff;
			border-radius: 20px;"> Developer Mode ';
	
		//$developer_bar .= '<span style="font-size: 20px;"> Enabled</span>';
		
		$developer_bar .= '<span style="    font-family: sans-serif;
				cursor: pointer;
				float: right;
				margin: 8px 10px;
				background: #fff;
				border-radius: 50px;
				width: 20px;
				height: 20px;
				line-height: 22px;
				font-weight: 600;
				font-size: 12px;
				color: #068467de;" onclick="jQuery(\'#mode-alert\').remove();">X</span>';
		$developer_bar .=  '</div>';
		
		printf('%s',$developer_bar);
	}
}
add_action('wp_footer', 'wpda_developer_mode_display');

## EMAIL FILTER
function wpda_filter_wp_mail($args ) {
	
	if(get_option('wpda_email_template_header')){
		$args['message'] = stripslashes_deep(get_option('wpda_email_template_header')).$args['message'];
	}
	if(get_option('wpda_email_template_footer')){
		$args['message'] .= stripslashes_deep(get_option('wpda_email_template_footer'));
	}
	$blog_name = get_bloginfo( 'name' );
	
	$args['message'] = str_replace('[blog_name]',$blog_name,$args['message']);
	
	
	if(is_string($args['headers'])){
		$args['headers'] = explode("\n",$args['headers']);
	}
	
	if(wpda_verify_ip() && get_option('wpda_email_developer_mode'))
    {
    	
		$args['message'] .= "<div style='border:solid 1px red;margin-top: 10px;padding: 4px;'><p>To:$args[to]</p><p>".implode(';',(array)$args['headers'])."</p></div>";
		
		$args['headers'] = array(); // clear the values from forms
		
		$args['to'] = get_option('wpda_email_to');
		
		if(get_option('wpda_email_header'))
			$args['headers'][] = esc_html(get_option('wpda_email_header'));
		if(get_option('wpda_email_cc'))
			$args['headers'][] = 'Cc:'.esc_html(get_option('wpda_email_cc'));
		if(get_option('wpda_email_bcc'))
			$args['headers'][] = 'Bcc:'.esc_html(get_option('wpda_email_bcc'));
		if(get_option('wpda_email_reply_to'))
			$args['headers'][] = 'Reply-To:'.esc_html(get_option('wpda_email_reply_to'));
		
		$args['subject'] = "[Developer mode] - ".$args['subject'];
    }

    $args['headers'][] = 'Content-Type: text/html; charset=UTF-8';

    $custom_mail = array(
        'to'          => $args['to'],
        'subject'     => $args['subject'],
        'message'     => $args['message'],
        'headers'     => $args['headers'],
        'attachments' => $args['attachments']
    );
	return $custom_mail;
}

add_filter( 'wp_mail', 'wpda_filter_wp_mail',999 );

##CUSTOM ADMIN LOGO
function wpda_admin_login() { 
	if( trim(get_option('wpda_logo_url'))){
		echo '<style type="text/css"> 
		body.login div#login h1 a {
			background-image: url('.get_option('wpda_logo_url').');
			background-size: '. (get_option('wpda_bg_size')?get_option('wpda_bg_size'):100).'px;
			background-color:'.get_option('wpda_logo_bg_color').';
			background-position: '.(get_option('wpda_bg_position')?get_option('wpda_bg_position'):'center').';
			width: 100%;
		} 
		body.login{
			background-color:'.get_option('wpda_bg_color').';
		}
		#loginform{
			background-color:'.get_option('wpda_login_bg_color').';
		}
		#loginform label{
			color:'.get_option('wpda_login_color').';
		}
		'.get_option('wpda_additional_style').'
		</style>';
	}
} 
add_action( 'login_enqueue_scripts', 'wpda_admin_login' );
function wpda_login_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpda_login_url' );

function wpda_login_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'wpda_login_title' );

if(get_option('wpda_cf7_message')){
	include_once WPDA_PLUGIN_INC_DIR."/custom_validation.php";
}

## PASSWORD CHANGE EMAIL
add_filter('password_change_email','wpda_change_password_mail_message', 10,3 );
function wpda_change_password_mail_message($pass_change_mail, $user, $userdata ) {
	/*var_dump($pass_change_mail, $user, $userdata);die;
  //$new_message_txt = __( '' );
  $pass_change_mail[ 'message' ] = $new_message_txt;*/
  return $pass_change_mail;
}

## Disable GUTENBERG  EDITOR
if(get_option('wpda_disable_gutenberg')){
	// Disable Gutenberg – Newer
	add_filter('use_block_editor_for_post', '__return_false');

	// Disable Gutenberg – Older
	add_filter('gutenberg_can_edit_post_type', '__return_false');
}

## Debug output
if(!function_exists('debug')){
	function debug($input){
	    echo "<pre>";
	    print_r($input);
	    echo "</pre>";
	}
}

## Debug and Die output
if(!function_exists('dd')){
	function dd($input){
	    echo "<pre>";
	    print_r($input);
	    echo "</pre>";
	    die;
	}
}