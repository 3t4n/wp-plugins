<?php
if ( ! defined( 'ABSPATH' ) ) exit; // make sure index.php is called and ABSPATH is set

require_once( ABSPATH . '/wp-includes/pluggable.php' ); 

$verify = false;
if(isset($_POST['nucuta_admin_hash']) && check_admin_referer('nucuta_admin_submit','nucuta_admin_hash'))
{
	$verify = true;
}


if($verify && (sanitize_text_field($_POST['nucutaHidden']) === 'Clicked') && current_user_can('manage_options'))
{
	$checkStatProtection = (isset($_POST['nucutaProtectSite'])?'checked':'unchecked');
	update_option('nucutaProtectSite',$checkStatProtection);
	
	$checkStat = (isset($_POST['nucutaEditor'])?'checked':'unchecked');
	update_option('nucutaEditor',$checkStat);
	
	$checkStat = (isset($_POST['nucutaAuthor'])?'checked':'unchecked');
	update_option('nucutaAuthor',$checkStat);
	
	$checkStat = (isset($_POST['nucutaContributor'])?'checked':'unchecked');
	update_option('nucutaContributor',$checkStat);
	
	$checkStat = (isset($_POST['nucutaSubscriber'])?'checked':'unchecked');
	update_option('nucutaSubscriber',$checkStat);
	
	update_option('nucutaCustomMessage',wp_kses($_POST['nucutaCustomMessage'],nucuta_allowedhtml()));
	
	$password = sanitize_text_field($_POST['nucutaCustomPassword']);
	$passwordConfirm = sanitize_text_field($_POST['nucutaCustomPasswordConfirm']);
	$passwordState;
	
	if($checkStatProtection === 'checked')
	{
		if((strlen($password) < 6) || (strlen($passwordConfirm) < 6))
		{
			$passwordState = __('Either invalid characters were used or HTML codes were altered');
			update_option('nucuta_password_state','pass_not_set');
		}else
		{
			if(strcmp($password,$passwordConfirm) == 0)
			{
				if( ctype_graph($password))
				{
					$passwordState = __('Password and Confirm match');
					update_option('nucuta_password',nucuta_password_hashPass($password));
					update_option('nucuta_password_state','pass_set');
				}else{
					$passwordState = __('Password should be consist of alpha numeric characters. example A-Z, a-z, 0-9');
					update_option('nucuta_password_state','pass_not_set');
				}
				
			}else
			{
				$passwordState = __('Password and Confirm Password do not match');
				update_option('nucuta_password_state','pass_not_set');
			}
		}
	}else
	{
		$passwordState = __('Password protection is turned off');
		update_option('nucuta_password_state','pass_not_set');
	}
	
	if(strcmp('pass_not_set',get_option('nucuta_password_state')) == 0)
	{
		update_option('nucutaProtectSite','unchecked');
	}
	
	$GLOBALS[pass] = $passwordState;
}

?>