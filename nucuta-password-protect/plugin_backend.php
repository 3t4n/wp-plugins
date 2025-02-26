<?php
if ( ! defined( 'ABSPATH' ) ) exit; // make sure index.php is called and ABSPATH is set
 
 function nucuta_session_compare()
{	
	session_start();
	session_regenerate_id();
	if(isset($_SESSION['user_token']))
	{	
		return true;
	}else //session doesn't exist
	{
		return false;
	}
}

add_action('init','nucuta_script',0);
function nucuta_script()
{
	if(get_option('nucuta_password_state') === 'pass_set')
	{
		if(pathinfo($_SERVER['SCRIPT_NAME'],PATHINFO_BASENAME) != 'wp-login.php')
		{
			if(!is_user_logged_in())
			{
				if(!nucuta_session_compare()) 
				{
					nucuta_password_drawpasswordprompt();
					if(!strlen(get_option('nucutaCustomMessage')))
					{
						esc_html_e('Sorry only members are allowed.!');
					}else{
						esc_html_e('Sorry only members are allowed.!');
						_e(get_option('nucutaCustomMessage'));
					}
				
					exit(0);
				}			
			}
			else
			{
				$visitorroles = wp_get_current_user();
				$visitorrole = $visitorroles->roles[0];
				if((get_option('nucutaEditor') === 'unchecked') && (strcmp($visitorrole,'editor') === 0))				
				{
					
					if(!nucuta_session_compare()) 
					{
						nucuta_password_drawpasswordprompt();
						if(!strlen(get_option('nucutaCustomMessage')))
						{
							esc_html_e('Sorry editors are not allowed at this time.!');
						}else{
							esc_html_e('Sorry editors are not allowed at this time.!');
							_e(get_option('nucutaCustomMessage'));
						}
						exit(0);
					}
				}
				
				if((get_option('nucutaAuthor') === 'unchecked') && (strcmp($visitorrole,'author') === 0))			
				{
					if(!nucuta_session_compare()) 
					{
						nucuta_password_drawpasswordprompt();
						if(!strlen(get_option('nucutaCustomMessage')))
						{
							esc_html_e('Sorry authors are not allowed at this time.!');
						}else{
							esc_html_e('Sorry authors are not allowed at this time.!');
							_e(get_option('nucutaCustomMessage'));
						}
						exit(0);
					}
				}
					
				if((get_option('nucutaContributor') === 'unchecked') && (strcmp($visitorrole,'contributor') === 0))
				{
					if(!nucuta_session_compare()) 
					{
						nucuta_password_drawpasswordprompt();
						if(!strlen(get_option('nucutaCustomMessage')))
						{
							esc_html_e('Sorry contributors are not allowed at this time.!');
						}else{
							esc_html_e('Sorry contributors are not allowed at this time.!');
							_e(get_option('nucutaCustomMessage'));
						}
						exit(0);
					}
				}	
					
					
				if((get_option('nucutaSubscriber') === 'unchecked') && (strcmp($visitorrole,'subscriber') === 0))
				{
					if(!nucuta_session_compare()) 
					{
						nucuta_password_drawpasswordprompt();
						if(!strlen(get_option('nucutaCustomMessage')))
						{
							esc_html_e('Sorry subscribers are not allowed at this time.!');
						}else{
							esc_html_e('Sorry subscribers are not allowed at this time.!');
							_e(get_option('nucutaCustomMessage'));
						}
						exit(0);
					}
				}
			}	
		}
	}

}
?>