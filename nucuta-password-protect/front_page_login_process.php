<?php
if ( ! defined( 'ABSPATH' ) ) exit; // make sure index.php is called and ABSPATH is set

if(isset($_POST['nucuta_input_hash']) && wp_verify_nonce($_POST['nucuta_input_hash'],'nucuta_login'))
{
	if(strcmp(sanitize_text_field($_POST['loginHiddenPassword']),'clicked') === 0)
	{	
		if(password_verify(sanitize_text_field($_POST['nucutaCustomPassword']),get_option('nucuta_password')))
		{
			setCookie('Login_State','Sucess');
			nucuta_start_session();
		}
	}
}

//start season when login to site
function nucuta_start_session()
{
	session_start();
	$_SESSION['user_token'] = get_option('nucuta_password');
}

?>