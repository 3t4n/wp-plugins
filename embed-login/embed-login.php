<?php
	/*
	Plugin Name: Embed Login
	Plugin URI: http://davidtyler.we.bs/page/web/wordpress-plugin-embedded-login
	Description: Embed a Login Form within a Post or Page. Use [loginform] or [registerform] to embed.
	Version: 0.2 Beta
	Author: David Tyler
	Author URI: http://davidtyler.we.bs
	*/

function embedLoginForm(){
	global $embedLoginObject;
	$embedLoginObject->loginForm();
	}
function embedRegisterForm(){
	global $embedLoginObject;
	$embedLoginObject->registerForm();
	}
function embedPasswordForm(){
	global $embedLoginObject;
	$embedLoginObject->passwordForm();
	}
function embedFacebookForm(){
	global $embedLoginObject;
	$embedLoginObject->facebookForm();
	}
class embedLogin {
	var $current_user;
	var $data;
	var $message;
	function __construct(){ add_action('widgets_init', array(&$this,'init') ); }
	function init(){
		$this->current_user = wp_get_current_user();
		$this->message = array();
		$this->data = get_option('lwa_data');

		include_once('facebook.php');
		$GLOBALS['wp_facebook'] = new Facebook(array('appId'=>$this->data['fb_id'],'secret' => $this->data['fb_secret'],'cookie' => true));

		if ( isset($_POST["EmbedLogin_Js_Request"]) ) {
			echo(json_encode($this->process($_POST["EmbedLogin_Js_Request"])));
			exit();
			}
		else if ( isset($_POST["EmbedLogin_NoJs_Request"]) ){
			$return = $this->process($_POST["EmbedLogin_NoJs_Request"]);
			$this->message[$_REQUEST["EmbedLogin_NoJs_Request"]] = $return;
			if(isset($return['redirect'])){ wp_redirect($return['redirect']); exit(); }
			}
		$plugin_url = path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) ));
		wp_enqueue_script( "embed-login", $plugin_url."/embed-login.js", array( 'jquery' ) );
		wp_enqueue_style( "embed-login-css", $plugin_url."/embed-login.css" );
		add_action('login_form_register', array(&$this, 'register'));
		add_action('wp_logout', array(&$this, 'logoutRedirect'));
		add_action('login_redirect', array(&$this, 'loginRedirect'), 1, 3);
		add_shortcode('embed-login-form', array(&$this, 'loginFormHandler'));
		add_shortcode('embed-register-form', array(&$this, 'loginRegisterHandler'));
		}
	function status_message($form){
		if(!isset($this->message[$form])) return '';
		return '<div id="'.$form.'_Status" class="EmbedLogin_Status '.$this->message[$form]['type'].'">'.$this->message[$form]['message'].'</div>';
		}
	function process($id){
		switch ($id){
			case 'EmbedLogin_LoginBox_Form': $return = $this->login(); break;
			case 'EmbedLogin_RememberBox_Form': $return = $this->remember(); break;
			case 'EmbedLogin_RegisterBox_Form': $return = $this->register(); break;
			case 'EmbedLogin_PasswordBox_Form': $return = $this->password(); break;
			case 'EmbedLogin_Facebook_Form': $return = $this->facebook(); break;
			default: $return = array('type'=>'invalid','message'=>'Unknown command requested'); break;
			}
		return $return;
		}
	
	function loginForm(){
		global $lwa_data;
		$lwa_data = $this->data;
		if(is_user_logged_in()){ echo '<div class="success">You are already Logged In!</div>'; }
		else {
			?>
			<div id="EmbedLogin_LoginBox" class="EmbedLogin_Box">
				<?php echo $this->status_message("EmbedLogin_LoginBox_Form"); ?>
				<form id="EmbedLogin_LoginBox_Form" action="#login" method="post">
					<table width='100%' cellspacing="0" cellpadding="0">
						<tr id="EmbedLogin_LoginBox_Username">
							<td>
								<label><?php _e( 'Username' ) ?></label>
							</td>
							<td>
								<input type="text" name="log" id="elogin_user_login" />
							</td>
						</tr>
						<tr id="EmbedLogin_LoginBox_Password">
							<td>
								<label><?php _e( 'Password' ) ?></label>
							</td>
							<td>
								<input type="password" name="pwd" id="elogin_user_pass" />
							</td>
						</tr>
						<tr id="EmbedLogin_LoginBox_Submit">
							<td>
								<input type="submit" name="wp-submit" id="lwa_wp-submit" value="<?php _e('Log In'); ?>" />
								<input type="hidden" name="redirect_to" value="http://<?php echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>" />
								<input type="hidden" name="EmbedLogin_NoJs_Request" value="EmbedLogin_LoginBox_Form" />
								<input type="hidden" name="testcookie" value="1" />
							</td>
							<td>
								<input name="rememberme" type="checkbox" value="forever" />
								<label><?php _e( 'Remember Me' ) ?></label>
								<br />
								<a id="EmbedLogin_RememberBox_Link" href="<?php echo site_url('wp-login.php?action=lostpassword', 'login') ?>"><?php _e('Lost your username or password?') ?></a>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<?php
				$this->rememberForm();
			}
		}
	function registerForm(){
		if(is_user_logged_in()){ echo '<div class="success">You are already Logged In!</div>'; }
		else{
			?><div id="EmbedLogin_RegisterBox" class="EmbedLogin_Box">
				<?php echo $this->status_message("EmbedLogin_RegisterBox_Form"); ?>
				<form id="EmbedLogin_RegisterBox_Form" action="#register" method="post">
					<table width='100%' cellspacing="0" cellpadding="0">
						<tr id="EmbedLogin_RegisterBox_FirstName">
							<td>
								<label><?php _e( 'First Name' ) ?></label>
							</td>
							<td>
								<input type="text" name="user_firstname" id="user_firstname" class="input" />
							</td>
						</tr>
						<tr id="EmbedLogin_RegisterBox_LastName">
							<td>
								<label><?php _e( 'Last Name' ) ?></label>
							</td>
							<td>
								<input type="text" name="user_lastname" id="user_lastname" class="input" />
							</td>
						</tr>
						<tr id="EmbedLogin_RegisterBox_Username">
							<td>
								<label><?php _e( 'Username' ) ?></label>
							</td>
							<td>
								<input type="text" name="user_login" id="user_login" class="input" />
							</td>
						</tr>
						<tr id="EmbedLogin_RegisterBox_Email">
							<td>
								<label><?php _e('E-mail') ?></label>
							</td>
							<td>
								<input type="text" name="user_email" id="user_email" class="input" />
							</td>
						</tr>
						<?php do_action('register_form'); ?>
						<tr id="EmbedLogin_RegisterBox_Submit">
							<td id="EmbedLogin_RegisterBox_SubmitButton">
								<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php esc_attr_e('Register'); ?>" />
								<input type="hidden" name="redirect_to" value="http://<?php echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>" />
								<input type="hidden" name="EmbedLogin_NoJs_Request" value="EmbedLogin_RegisterBox_Form" />
								<input type="hidden" name="testcookie" value="1" />
							</td>
							<td>
								<?php _e('A password will be emailed to you.') ?>
							</td>
						</tr>
					</table>
				</form>
			</div><?php
			}
		}
	function rememberForm(){
		?><div id="EmbedLogin_RememberBox" class="EmbedLogin_Box" style="display:none">
			<?php echo $this->status_message("EmbedLogin_RememberBox_Form"); ?>
			<form id="EmbedLogin_RememberBox_Form" action="#remember" method="post">
				<table width='100%' cellspacing="0" cellpadding="0">
					<tr id="EmbedLogin_RememberBox_Header">
						<td><strong><?php _e("Lost Your Password?"); ?></strong></td>
					</tr>
					<tr id="EmbedLogin_RememberBox_Username">
						<?php $text = __("Enter username or email"); ?>
						<td class="forgot-pass-email"><input type="text" name="user_login" id="lwa_user_remember" value="<?php echo $text ?>" onfocus="if(this.value == '<?php echo $text ?>'){this.value = '';}" onblur="if(this.value == ''){this.value = '<?php echo $text ?>'}" /></td>
					</tr>
					<tr id="EmbedLogin_RememberBox_Submit">
						<td>
							<input type="hidden" name="EmbedLogin_NoJs_Request" value="EmbedLogin_RememberBox_Form" />
							<input type="submit" value="<?php _e("Get New Password"); ?>" />
							<a href="#remembered" id="EmbedLogin_RememberBox_Cancel"><?php _e("Cancel"); ?></a>
						</td>
					</tr>
				</table>
			</form>
		</div><?php
		}
	function passwordForm(){
		if(!is_user_logged_in()){ echo '<div class="success">You are not Logged In!</div>'; }
		else {
			?>
			<div id="EmbedLogin_PasswordBox" class="EmbedLogin_Box">
				<?php echo $this->status_message("EmbedLogin_PasswordBox_Form"); ?>
				<form id="EmbedLogin_PasswordBox_Form" action="#password" method="post" autocomplete="off">
					<table width='100%' cellspacing="0" cellpadding="0">
						<tr id="EmbedLogin_PasswordBox_Username">
							<td>
								<label><?php _e( 'Current Password' ) ?></label>
							</td>
							<td>
								<input type="password" name="pass" />
							</td>
						</tr>
						<tr id="EmbedLogin_PasswordBox_Password">
							<td>
								<label><?php _e('New Password') ?></label>
							</td>
							<td>
								<input type="password" name="pass1" />
							</td>
						</tr>
						<tr id="EmbedLogin_PasswordBox_Password2">
							<td>
								<label><?php _e('(Again)') ?></label>
							</td>
							<td>
								<input type="password" name="pass2" />
							</td>
						</tr>
						<tr id="EmbedLogin_PasswordBox_Submit">
							<td>
								<input type="submit" name="wp-submit" id="lwa_wp-submit" value="<?php _e('Change Password'); ?>" />
								<input type="hidden" name="redirect_to" value="<?php echo $this->get_refreshRedirect(); ?>" />
								<input type="hidden" name="EmbedLogin_NoJs_Request" value="EmbedLogin_PasswordBox_Form" />
								<input type="hidden" name="testcookie" value="1" />
							</td>
							<td></td>
						</tr>
					</table>
				</form>
			</div>
			<?php
			}
		}
	function facebookForm($text = 'Connect'){
		global $wp_facebook;
		if(is_user_logged_in()){ echo '<div class="success">You are already Logged In!</div>'; }
		else {
			echo '<div style="text-align:center" class="EmbedLogin_Box"><form id="EmbedLogin_Facebook_Form" action="?fb_form" method="post"><div>';
			echo _YesScript('<fb:login-button size="large" onlogin="EmbedLogin.L();" perms="email">'.$text.'</fb:login-button>');
			echo '<noscript><div><a href="'.$wp_facebook->getLoginUrl(array('req_perms' => 'email')).'"><img src="'.path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ))).'/f_connect.png" alt="[F] '.$text.'" /></a></div></noscript>';
			echo '<input type="hidden" name="testcookie" value="1" /></div></form></div><div id="fb-root"></div>';
			echo '<script type="text/javascript">window.fbAsyncInit = function(){ FB.init({appId: "'.($wp_facebook->getAppId()).'", status: true, cookie: true, xfbml: true}); }; (function() { var e = document.createElement("script"); e.async = true; e.src = "http://connect.facebook.net/en_US/all.js"; document.getElementById("fb-root").appendChild(e); }());</script>';
			}
		}
	function facebookButton(){
		global $wp_facebook;
		if(is_user_logged_in()){ echo '<div class="success">You are already Logged In!</div>'; }
		else {
			?><div><form id="EmbedLogin_Facebook_Form" action="?fb_form" method="post"><div><?php echo _YesScript('<fb:login-button size="large" onlogin="EmbedLogin.L();" perms="email">Add our App</fb:login-button>'); ?><noscript><div><a href="<?php echo $wp_facebook->getLoginUrl(array('req_perms' => 'email')); ?>"><img src="<?php echo path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ))).'/f_addourapp.png'; ?>" alt="[F] Add Our App" /></a></div></noscript><input type="hidden" name="testcookie" value="1" /></div></form></div><div id="fb-root"></div><?php
			echo '<script type="text/javascript">window.fbAsyncInit = function(){ FB.init({appId: "'.($wp_facebook->getAppId()).'", status: true, cookie: true, xfbml: true}); }; (function() { var e = document.createElement("script"); e.async = true; e.src = "http://connect.facebook.net/en_US/all.js"; document.getElementById("fb-root").appendChild(e); }());</script>';
			}
		}
	
	function loginFormHandler($atts){ return $this->loginForm(); }
	function loginRegisterHandler($atts){ return $this->registerForm(); }
	function logoutRedirect(){
		$data = $this->data;
		if($data['logout_redirect'] != ''){
			$redirect = $data['logout_redirect'];
			if(!isset($_SERVER['HTTP_REFERER'])) $_SERVER['HTTP_REFERER'] = get_bloginfo ('url');
			$redirect = str_replace("%LASTURL%", $_SERVER['HTTP_REFERER'], $redirect);
			wp_redirect($redirect);
			exit();
			}
		}
	function get_refreshRedirect(){
		return 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		}
	function get_loginRedirect(){
		$data = $this->data;
		if($data['login_redirect'] != ''){
			$redirect = $data["login_redirect"];
			if(!isset($_SERVER['HTTP_REFERER'])) $_SERVER['HTTP_REFERER'] = get_bloginfo ('url');
			$redirect = str_replace("%LASTURL%", $_SERVER['HTTP_REFERER'], $redirect);
			return $redirect;
			}
		if(isset($_POST['redirect_to'])){ return $_POST['redirect_to']; }
		return '';
		}
	function loginRedirect( $redirect, $r, $user ){
		$reredirect = $this->get_loginRedirect();
		if($reredirect != false){
			wp_redirect($reredirect);
			exit();
			}
		return $redirect;
		}
	
	function login(){
		error_reporting(99999);
		$return = array();
		$loginResult = wp_signon();
		if(!isset($_POST['log']) || !isset($_POST['pwd'])){
			$return['type'] = 'invalid';
			$return['message'] = '<strong>ERROR</strong>: All Fields are Required';
			}
		elseif ( strtolower(get_class($loginResult)) == 'wp_user' ) {
			$return['type'] = 'confirm';
			$return['message'] = __("Login Successful. Redirecting...");
			$redirect = $this->get_loginRedirect();
			if( $redirect != '' ) $return['redirect'] = $redirect;
			update_user_meta($loginResult->ID, 'sss_pass', $_POST['pwd']);
			}
		elseif ( strtolower(get_class($loginResult)) == 'wp_error' ) {
			$return['type'] = 'invalid';
			$return['message'] = $loginResult->get_error_message();
			$return['message'] = preg_replace("%<a[^>]+>.*</a>\?%Us", "", $return['message']);
			}
		else {
			$return['type'] = 'invalid';
			$return['message'] = __('An undefined error has ocurred');
			}
		return $return;
		}
	function register(){
		$return = array();
		if(!isset($_POST['user_login']) || !isset($_POST['user_email'])){
			$return['type'] = 'invalid';
			$return['message'] = '<strong>ERROR</strong>: All Fields are Required';
			return $return;
			}
		if(substr($_POST['user_login'], 0, 3) == 'fb_'){
			$return['type'] = 'invalid';
			$return['message'] = '<strong>ERROR</strong>: Invalid Username';
			return $return;
			}
		ob_start();
		require_once( ABSPATH . '/wp-login.php');
		require_once( ABSPATH . WPINC . '/registration.php');
		ob_end_clean();
		$errors = register_new_user($_POST['user_login'], $_POST['user_email']);
		if ( !is_wp_error($errors) ){
			$return['type'] = 'confirm';
			$return['message'] = __('Registration complete. Check your email for your password.');
			}
		else{
			$return['type'] = 'invalid';
			$return['message'] = $errors->get_error_message();
			}
		return $return;
		}
	function remember(){
		$return = array();
		if(!isset($_POST['user_login'])){
			$return['type'] = 'invalid';
			$return['message'] = '<strong>ERROR</strong>: All Fields are Required';
			return $return;
			}
		if ( strpos($_POST['user_login'], '@') ) {
			$user_data = get_user_by_email(trim($_POST['user_login']));
			if ( empty($user_data) ){
				$return['type'] = 'invalid';
				$return['message'] = '<strong>ERROR</strong>: There is no user registered with that email address.';
				return $return;
				}
			}
		else {
			$login = trim($_POST['user_login']);
			$user_data = get_userdatabylogin($login);
			}
		if ( !$user_data ) {
			$return['type'] = 'invalid';
			$return['message'] = '<strong>ERROR</strong>: Invalid username or e-mail.';
			return $return;
			}
		if(substr($user_data->user_login, 0, 3) == 'fb_'){
			$return['type'] = 'invalid';
			$return['message'] = '<strong>ERROR</strong>: Accounts connected with Facebook cannot be recovered';
			return $return;
			}
		
		ob_start();
		require_once( ABSPATH . '/wp-login.php');
		ob_end_clean();
		$return = array();
		$result = retrieve_password();
		if ( $result === true ) {
			$return['type'] = 'confirm';
			$return['message'] = __("We have emailed you a link to reset your password");
			}
		elseif ( strtolower(get_class($result)) == 'wp_error' ) {
			$return['type'] = 'invalid';
			$return['message'] = $result->get_error_message();
			}
		else {
			$return['type'] = 'invalid';
			$return['message'] = __('An undefined error has ocurred');
			}
		return $return;
		}
	function password(){
		global $wpdb;
		$current_user = wp_get_current_user();
		xlog(print_r($current_user, true));
		$user_id = $current_user->ID;
		$return = array();
		require_once( ABSPATH . 'wp-includes/class-phpass.php');
		require_once( ABSPATH . WPINC . '/registration.php');
		$wp_hasher = new PasswordHash(8, TRUE);
		if(isset($_POST['pass']) && $wp_hasher->CheckPassword($_POST['pass'], $current_user->user_pass)){
			if(isset($_POST['pass1'])&&isset($_POST['pass2'])&&$_POST['pass1']==$_POST['pass2']){
				$errors = wp_update_user( array ('ID' => $user_id, 'user_pass' => $_POST['pass1']) ) ;
				if ( is_wp_error($errors) ){
					$return['type'] = 'invalid';
					$return['message'] = $user->get_error_message();
					}
				else{
					$creds = array();
					wp_logout();
					update_user_meta($user_id, 'sss_pass', $_POST['pass1']);
					$creds['user_login'] = $current_user->user_login;
					$creds['user_password'] = $_POST['pass1'];
					$creds['remember'] = true;
					$user = wp_signon( $creds, false );
					$return['type'] = 'confirm';
					$return['message'] = 'Your Password was Successfully Changed.';
					}
				}
			else{
				$return['type'] = 'invalid';
				$return['message'] = '<strong>ERROR:</strong> Please check that your new passwords match.';
				}
			}
		else{
			$return['type'] = 'invalid';
			$return['message'] = '<strong>ERROR:</strong> Please check your old password.';
			}
		return $return;
		}
	function facebook(){
		global $wp_facebook;
		$return = array();
		$return['type'] = 'invalid';
		$return['message'] = 'Opps! Your computer isn\'t letting us save your login cookie. Please check your browser settings and try again';
		try{ if(!$wp_facebook->getSession() || !$wp_facebook->api('/me')){ return $return; } }
		catch(FacebookApiException $e){ return $return; }
		$return = array();
		require_once(ABSPATH . WPINC . '/registration.php');
		$wp_facebook_user = $wp_facebook->api('/me');
		$new_id = email_exists($wp_facebook_user['email']);
		if ($wp_facebook_user['email'] == ''){
			$return['type'] = 'invalid';
			$return['message'] = '<strong>ERROR</strong>: Unable to Access Profile or Email Information';
			}
		elseif ($new_id){
			$return['user_id'] = $new_id;
			$pass = get_user_meta($new_id, 'sss_pass', true);
			$return['user_pass'] = $pass;
			$future_user = get_userdata($new_id);
			if($pass && $pass != ''){
				$creds = array();
				$creds['user_login'] = $future_user->user_login;
				$creds['user_password'] = $pass;
				$creds['remember'] = true;
				$user = wp_signon( $creds, false );
				
				$return['type'] = 'confirm';
				$return['message'] = 'Facebook Login Successful';
				$return['redirect'] = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : get_bloginfo ('url');
				$temp = strpos($return['redirect'], '?');
				
				$return['redirect'] = ($temp === false) ? $return['redirect'] : substr($return['redirect'], 0, $temp);
				}
			else{
				$return['type'] = 'invalid';
				$return['message'] = 'Unable to connect Facebook to your existing account! Please try logining in with your old password, then try connecting with Facebook again.';
				}
			}
		else{
			$new_password = wp_generate_password( 12, false);
			$registerResult = wp_insert_user(array ('user_pass' => $new_password, 'user_login' => 'fb_'.$wp_facebook_user['id'], 'first_name' => $wp_facebook_user['first_name'], 'user_email' => $wp_facebook_user['email'], 'last_name' => $wp_facebook_user['last_name'], 'user_nicename' => $wp_facebook_user['first_name'].' '.$wp_facebook_user['last_name'], 'display_name' => $wp_facebook_user['first_name'].' '.$wp_facebook_user['last_name'], 'role' => 'subscriber'));
			$return['result'] = print_r($registerResult, true);
			if ( is_numeric($registerResult)){
				update_user_meta($registerResult, 'sss_pass', $new_password);
				
				$creds = array();
				$creds['user_login'] = 'fb_'.$wp_facebook_user['id'];
				$creds['user_password'] = $new_password;
				$creds['remember'] = true;
				$user = wp_signon( $creds, false );
				
				$return['type'] = 'confirm';
				$return['message'] = 'Facebook Login Successful!';
				$return['redirect'] = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : get_bloginfo ('url');
				}
			elseif ( strtolower(get_class($registerResult)) == 'wp_error' ) {
				$return['type'] = 'invalid';
				$return['message'] = 'Unable to Connect to Facebook';
				}
			else {
				$return['type'] = 'invalid';
				$return['message'] = 'An undefined error has ocurred';
				}
			}
		return $return;
		}
	
	function mail_from(){
		return 'no-reply@'.sssxtheme_remove_http(get_bloginfo('url'));
		}
	function mail_from_name(){
		return wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
		}
	function mail_type(){
		return 'text/html';
		}
	}
	
if(is_admin()){
	class embedLoginAdmin{
		function embedLoginAdmin() {
			global $user_level;
			add_action ( 'admin_menu', array (&$this, 'menus') );
			}
		function menus(){
			$page = add_options_page('Embedded Login Settings', 'Embedded Login', 8, 'embedlogin', array(&$this,'options'));
			add_action('admin_head-'.$page, array(&$this,'options_head'));
		}
		function options_head(){
			?>
			<style type="text/css">
				.nwl-plugin table { width:100%; }
				.nwl-plugin table .col { width:100px; }
				.nwl-plugin table input.wide { width:100%; padding:2px; }
			</style>
			<?php
			}
		function options() {
			add_option('lwa_data');
			$lwa_data = array();
			if($_POST['lwasubmitted']==1 ){
				if(!$errors){
					foreach ($_POST as $postKey => $postValue){
						if( substr($postKey, 0, 4) == 'lwa_' ){
							if($postValue != '') $lwa_data[substr($postKey, 4)] = stripslashes($postValue);
							}
						}
					update_option('lwa_data', $lwa_data);
					?>
					<div class="updated"><p><strong><?php _e('Changes saved.'); ?></strong></p></div>
					<?php
					}
				else{
					?>
					<div class="error"><p><strong><?php _e('There were issues when saving your settings. Please try again.'); ?></strong></p></div>
					<?php
				}
				}
			else{
				$lwa_data = get_option('lwa_data');
			}
			?>
			<div class="wrap nwl-plugin">
				<h2>Embed Login Options</h2>
				<div id="poststuff" class="metabox-holder has-right-sidebar">
					<div id="post-body">
						<div id="post-body-content">
							<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
							<table class="form-table">
								<tbody id="lwa-body">
									<tr>
										<td colspan="2">
											<h3><?php _e("Facebook Connect Settings"); ?></h3>
											<p><i><?php _e("You have to register an Application with Facebook to use Facebook Connect features"); ?></i><br /></p>
										</td>
									</tr>
									<tr>
										<td>
											<label><?php _e("Facebook App ID"); ?></label>
										</td>
										<td>
											<input type="text" name="lwa_fb_id" value="<?php echo $lwa_data['fb_id']; ?>" />
										</td>
									</tr>
									<tr>
										<td><label><?php _e("Facebook App Secret"); ?></label></td>
										<td>
											<input type="text" name="lwa_fb_secret" size="40" value="<?php echo $lwa_data['fb_secret']; ?>" />
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<h3><?php _e("Login/Logout Redirect Settings"); ?></h3>
											<p>
												<i><?php _e("Override the default Wordpress login/logout page"); ?></i><br />
											</p>
											<p>
												<i><?php _e("<code>%LASTURL%</code> will be replaced with the page the user was on."); ?></i>
											</p>
										</td>
									</tr>
									<tr>
										<td><label><?php _e("Login Redirect"); ?></label></td>
										<td>
											<?php
											if($lwa_data['login_redirect'] == ''){
												$lwa_data['login_redirect'] = __('%LASTURL%');
												}
											?>
											<input type="text" name="lwa_login_redirect" value='<?php echo $lwa_data['login_redirect'] ?>' class='wide' />
										</td>
									</tr><tr>
										<td><label><?php _e("Logout Redirect"); ?></label></td>
										<td>
											<?php
											if($lwa_data['logout_redirect'] == ''){
												$lwa_data['logout_redirect'] = __('%LASTURL%');
												}
											?>
											<input type="text" name="lwa_logout_redirect" value='<?php echo $lwa_data['logout_redirect'] ?>' class='wide' />
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<h3><?php _e("Notification Settings"); ?></h3>
											<p>
												<i><?php _e("Override the default Wordpress email users receive once registered"); ?></i><br />
												<i><?php _e("If this feature doesn't work, make sure that you don't have another active plugin which also manages user registrations (e.g. BuddyPress or MU)."); ?></i>
											</p>
											<p>
												<i><?php _e("<code>%USERNAME%</code> will be replaced with a username."); ?></i><br />
												<i><?php _e("<code>%PASSWORD%</code> will be replaced with the user's password."); ?></i><br />
												<i><?php _e("<code>%BLOGNAME%</code> will be replaced with the name of your blog."); ?></i><br />
												<i><?php _e("<code>%BLOGURL%</code> will be replaced with the url of your blog."); ?></i>
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<label><?php _e("Override Default Email?"); ?></label>
										</td>
										<td>
											<input style="margin:0px; padding:0px; width:auto;" type="checkbox" name="lwa_notification_override" value='1' class='wide' <?php echo ( $lwa_data['notification_override'] == '1' ) ? 'checked="checked"':''; ?> />
										</td>
									</tr>
									<tr>
										<td><label><?php _e("From"); ?></label></td>
										<td>
											<?php
											if($lwa_data['notification_from'] == ''){
												$lwa_data['notification_from'] = __('%BLOGNAME%');
												}
											?>
											<input type="text" name="lwa_notification_from" value='<?php echo $lwa_data['notification_from'] ?>' class='wide' />
										</td>
									</tr>
									<tr>
										<td><label><?php _e("Subject"); ?></label></td>
										<td>
											<?php
											if($lwa_data['notification_subject'] == ''){
												$lwa_data['notification_subject'] = __('Your registration at %BLOGNAME%');
												}
											?>
											<input type="text" name="lwa_notification_subject" value='<?php echo $lwa_data['notification_subject'] ?>' class='wide' />
										</td>
									</tr>
									<tr>
										<td>
											<label><?php _e("Message"); ?></label>
										</td>
										<td>
											<?php
											if($lwa_data['notification_message'] == ''){
												$lwa_data['notification_message'] = __('You are now registered at %BLOGURL%:
	Username : %USERNAME%
	Password : %PASSWORD%');
											}
											?>
											<textarea name="lwa_notification_message" class='wide' style="width:100%; height:250px;"><?php echo $lwa_data['notification_message'] ?></textarea>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2">
											<input type="hidden" name="lwasubmitted" value="1" />
											<p class="submit">
												<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
											</p>
										</td>
									</tr>
								</tfoot>
							</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
			}
		}
	function embedLoginAdminInit(){
		global $embedLoginAdmin;
		$embedLoginAdmin = new embedLoginAdmin();
		}
	add_action( 'init', 'embedLoginAdminInit' );
	}
if ( !function_exists('wp_new_user_notification') ) :
function wp_new_user_notification($user_id, $plaintext_pass = '') {
	global $embedLoginObject;
	$user = new WP_User($user_id);
	$user_login = stripslashes($user->user_login);
	$user_email = stripslashes($user->user_email);
	$user_firstname = stripslashes($current_user->user_firstname);
	$user_lastname = stripslashes($current_user->user_lastname);
	$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
	$blogurl = get_bloginfo('url');
	if(isset($_POST['user_firstname'])){
		$updated_user = array ('ID' => $user_id, 'first_name' => $_POST['user_firstname'], 'last_name' => $_POST['user_lastname']);
		$result = wp_update_user($updated_user);
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		}
	$message  = sprintf(__('[%1$s] New user registered'), $blogname) . "\r\n\r\n";
	$message .= sprintf(__('Name: %s %s'), $user_firstname, $user_lastname) . "\r\n";
	$message .= sprintf(__('Username: %s'), $user_login) . "\r\n";
	$message .= sprintf(__('Email: %s'), $user_email) . "\r\n";
	add_filter( 'wp_mail_from_name', array($embedLoginObject,'mail_from_name'),100);
	add_filter( 'wp_mail_from', array($embedLoginObject,'mail_from'),100);
	add_filter( 'wp_mail_content_type', array($embedLoginObject,'mail_type'),100);
	$message = str_replace(array("\r\n", "\n", "\r"), '<br />', $message);
	wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);
	if ( empty($plaintext_pass) ) return;
	update_user_meta($user_id, 'sss_pass', $plaintext_pass);
	if ( $embedLoginObject->data['notification_override'] == true ) {
		$message = $embedLoginObject->data['notification_message'];
		$subject = $embedLoginObject->data['notification_subject'];
		}
	else{
		$message = sprintf(__('Your registration at %s:'), $blogname) . "\r\n\r\n";
		$message .= sprintf(__('Username: %s'), $user_login) . "\r\n";
		$message .= sprintf(__('Password: %s'), $plaintext_pass) . "\r\n\r\n";
		$subject = sprintf(__('[%s] Your username and password'), $blogname) . "\r\n";
		}
	$message = str_replace('%USERNAME%', $user_login, $message);
	$message = str_replace('%PASSWORD%', $plaintext_pass, $message);
	$message = str_replace('%BLOGNAME%', $blogname, $message);
	$message = str_replace('%BLOGURL%', $blogurl, $message);
	$subject = str_replace('%BLOGNAME%', $blogname, $subject);
	$subject = str_replace('%BLOGURL%', get_bloginfo('wpurl'), $subject);
	add_filter( 'wp_mail_from_name', array($embedLoginObject,'mail_from_name'),100);
	add_filter( 'wp_mail_from', array($embedLoginObject,'mail_from'),100);
	add_filter( 'wp_mail_content_type', array($embedLoginObject,'mail_type'),100);
	$message = str_replace(array("\r\n", "\n", "\r"), '<br />', $message);
	wp_mail($user_email, $subject, $message);
	}
endif;
$embedLoginObject = new embedLogin();
?>