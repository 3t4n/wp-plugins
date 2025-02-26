<?php
/*
Plugin Name: Auto Login After Registration
Plugin URI: http://www.netattingo.com/
Description: This plugin allows users to easily add a simple user registration form and login form  anywhere on their site using simple shortcode.
And provide setting to 'Auto Login After Registration'. 
Author: NetAttingo Technologies
Version: 1.0.0
Author URI: http://www.netattingo.com/
*/

//define('WP_DEBUG',true);
define('ALAR_REGISTRATION_PAGE_DIRECTORY', plugin_dir_path(__FILE__).'pages/');
define('ALAR_REGISTRATION_INCLUDE_URL', plugin_dir_url(__FILE__).'includes/');
ob_start();
//Include menu
function alar_auto_login_plugin_menu() {
	add_menu_page("Auto Login after Register", "Auto Login after Register", "administrator", "auto_login_on_register_setting", "alar_logo_plugin_pages", '' ,40);
	add_submenu_page("auto_login_on_register_setting", "About Us", "About Us", "administrator", "about-us", "alar_logo_plugin_pages");
}

add_action("admin_menu", "alar_auto_login_plugin_menu");
function alar_logo_plugin_pages() {

   $itm = ALAR_REGISTRATION_PAGE_DIRECTORY.$_GET["page"].'.php';
   include($itm);
}

//add admin css
function alar_admin_css() {
  wp_register_style('admin_css', plugins_url('includes/admin-style.css',__FILE__ ));
  wp_enqueue_style('admin_css');
}

add_action( 'admin_init','alar_admin_css');


//add front end css and js
function alar_slider_trigger(){
	wp_enqueue_style('alar_caro_css_and_js', ALAR_REGISTRATION_INCLUDE_URL."front-style.css"); 
    wp_register_script('alar_caro_css_and_js', ALAR_REGISTRATION_INCLUDE_URL."font-script.js" );
	wp_enqueue_script('alar_caro_css_and_js');
}
add_action('wp_footer','alar_slider_trigger');



// function to registration Shortcode
function alar_registration_shortcode( $atts ) {
    global $wpdb, $user_ID; 
	$firstname='';
	$lastname='';
	$username='';
	$email='';
	
	//if looged in rediret to home page
	if ( is_user_logged_in() ) { 
	    wp_redirect( get_option('home') );// redirect to home page
		exit;
	}

	if(sanitize_text_field( $_POST['com_submit']) != ''){

		$firstname=sanitize_text_field( $_REQUEST['com_firstname'] );
		$lastname=sanitize_text_field( $_REQUEST['com_lastname']);
		$username = sanitize_text_field(  $_REQUEST['com_username'] );
		$email = sanitize_text_field(  $_REQUEST['com_email']  );
		$password = $wpdb->escape( sanitize_text_field( $_REQUEST['com_password']));
		$status = wp_create_user($username,$password,$email);
	  
		if (is_wp_error($status))  {
		     $error_msg = __('Username or Email already registered. Please try another one.','twentyten'); 
		} 
		else{
			$user_id=$status;
			update_user_meta( $user_id,'first_name', $firstname);
			update_user_meta( $user_id,'last_name', $lastname);
			
			
			//code to auto login start
			$alar_enable_auto_login= get_option('alar_enable_auto_login');
			
			if($alar_enable_auto_login==''){
			 $alar_enable_auto_login= 'true';
			}

			if($alar_enable_auto_login == 'true'){
				if(!is_user_logged_in()){
					$secure_cookie = is_ssl();
					$secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, array());
					global $auth_secure_cookie;
					$auth_secure_cookie = $secure_cookie;
					wp_set_auth_cookie($user_id, true, $secure_cookie);
					$user_info = get_userdata($user_id);
					do_action('wp_login', $user_info->user_login, $user_info);
				}
			}
			//code to auto login end
			
			wp_redirect( get_option('home') );// redirect to home page
			exit;
		}  
	}
?>
	<div class="alar-registration-form">
		<div class="alar-registration-heading">
		<?php _e("Registration Form",'');?>
		</div>
		<?php if($error_msg!='') { ?><div class="error"><?php echo $error_msg; ?></div><?php }  ?>
		<form  name="form" id="registration"  method="post">
			<div class="ftxt">
			 <label><?php _e("First Name :",'');?></label> 
			 <input id="com_firstname" name="com_firstname" type="text" class="input" required value=<?php echo $firstname; ?> > 
			</div>
			<div class="ftxt">
			 <label><?php _e("Last name :",'');?></label>  
			 <input id="com_lastname" name="com_lastname" type="text" class="input" required value=<?php echo $lastname; ?> >
			</div>
			<div class="ftxt">
			 <label><?php _e("Username :",'');?></label> 
			 <input id="com_username" name="com_username" type="text" class="input" required value=<?php echo $username; ?> >
			</div>
			<div class="ftxt">
			<label><?php _e("E-mail :",'');?> </label>
			 <input id="com_email" name="com_email" type="email" class="input" required value=<?php echo $email; ?> >
			</div>
			<div class="ftxt">
			<label><?php _e("Password :",'');?></label>
			 <input id="password1" name="com_password" type="password" required class="input" />
			</div>
			<div class="ftxt">
			<label><?php _e("Confirm Password : ",'');?></label>
			 <input id="password2" name="c_password" type="password" class="input" />
			</div>
			<div class="fbtn"><input type="submit" name='com_submit' class="button"  value="Register"/> </div>
		</form>
	</div>
<?php	
}

//add registration shortcoode
add_shortcode( 'registration-form', 'alar_registration_shortcode' );


// function to login Shortcode
function alar_login_shortcode( $atts ) {

   //if looged in rediret to home page
	if ( is_user_logged_in() ) { 
	    wp_redirect( get_option('home') );// redirect to home page
		exit;
	}
	
    global $wpdb; 
	if(sanitize_text_field( $_GET['login'] ) != ''){
	 $login_fail_msg=sanitize_text_field( $_GET['login'] );
	}
	?>
	<div class="alar-login-form">
	<?php if($login_fail_msg=='failed'){?>
	<div class="error"  align="center"><?php _e('Username or password is incorrect','');?></div>
	<?php }?>
		<div class="alar-login-heading">
		<?php _e("Login Form",'');?>
		</div>
		<form method="post" action="<?php echo get_option('home');?>/wp-login.php" id="loginform" name="loginform" >
			<div class="ftxt">
			<label><?php _e('Login ID :','');?> </label>
			 <input type="text" tabindex="10" size="20" value="" class="input" id="user_login" required name="log" />
			</div>
			<div class="ftxt">
			<label><?php _e('Password :','');?> </label>
			  <input type="password" tabindex="20" size="20" value="" class="input" id="user_pass" required name="pwd" />
			</div>
			<div class="fbtn">
			<input type="submit" tabindex="100" value="Log In" class="button" id="wp-submit" name="wp-submit" />
			<input type="hidden" value="<?php echo get_option('home');?>" name="redirect_to">
			</div>
		</form>
	</div>
	<?php
}

//add login shortcoode
add_shortcode( 'login-form', 'alar_login_shortcode' );



//redirect to front end ,when login is failed
add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER']; 
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '/?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}
	
?>
