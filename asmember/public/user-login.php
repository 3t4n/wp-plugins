<?php

if(!function_exists("get_asmember_login_form"))
{
	
function get_asmember_login_form()
{
	
	$asmember_options_account = get_option('asmember_options_account');
	$redirect=$asmember_options_account['asmember_options_account_pages_redirect_after_login'];
	
	if(isset($_GET['redirect_to']))
	{		
		$redirect=sanitize_text_field($_GET['redirect_to']);
	}
	
		
		$args = array(	
			'id_username' => 'user',
			'id_password' => 'pass',
			'redirect' => $redirect,
			'echo'           => false,
			'remember'       => true,	
			'form_id'        => 'loginform',
			'id_username'    => 'user_login',
			'id_password'    => 'user_pass',
			'id_remember'    => 'rememberme',
			'id_submit'      => 'wp-submit',
			'label_username' => __( 'Benutzer/Email' ),
			'label_password' => __( 'Passwort' ),
			'label_remember' => __( 'Eingeloggt bleiben' ),
			'label_log_in'   => __( 'Login' ),
			'value_username' => '',
			'value_remember' => false
		); 	
 		ob_start();
 		?>
 	
 		<form name="loginform" id="loginform" action="/wp-login.php" method="post">
 		<div class="col asmember-form-container asmember-login-container">
 			<h5 class="asmember-form-rahmen-header"><?php echo _e("Login","asmember");?></h5>
 			<div class="row">
 				<div class="col">
 					<div class="form-group">
    					<label for="user_login"><?php echo esc_html_e('Benutzername oder Email','asmember');?></label>
    					<input type="text" class="form-control" name="log" id="user_login">	
  					</div>
 					<div class="form-group">
    					<label for="user_pass"><?php echo esc_html_e('Passwort','asmember');?></label>
    					<input type="password" class="form-control" name="pwd" id="user_pass">	
  					</div>
  					<div class="form-group form-check">
  						<input type="checkbox" class="form-check-input" name="rememberme" value="forever" id="rememberme">
    					<label class="form-check-label" for="rememberme"><?php echo esc_html_e('Eingeloggt bleiben','asmember');?></label>    
  					</div>
  		
  					<div class="form-group">
  						<input type="hidden" name="redirect_to" value="<?php echo esc_url($redirect);?>"/> 	
  						<input type="submit" name="wp-submit" class="btn btn-primary" id="wp-submit" value="<?php echo esc_attr_e('Login','asmember');?>"/>
  					</div> 		
  				</div>
  			</div>
  		</div>
 		
		</form>
		<?php
		$asmember_options_account = get_option('asmember_options_account');
		$url_register=$asmember_options_account['asmember_options_account_pages_register'];
				
		$asmember_options_account_pages_reset_password=$asmember_options_account["asmember_options_account_pages_reset_password"];
		if($asmember_options_account_pages_reset_password=="")$asmember_options_account_pages_reset_password=wp_lostpassword_url();
			
			
		?>	
		
		<div class="form-group asmember-login-links">		
			<?php
			if($asmember_options_account["asmember_options_account_password_reset"]==1)
			{
				?>
				<a href="<?php echo $asmember_options_account_pages_reset_password; ?>" title="<?php echo esc_attr_e('Passwort vergessen','asmember');?>"><?php echo esc_html_e('Passwort vergessen','asmember');?></a>
				&nbsp;&nbsp;
				<?php
			}	
			if(get_option('users_can_register')==1)
			{
				?>		
				<a href="<?php echo esc_url($url_register);?>"><?php echo esc_html_e('Registrieren','asmember');?></a>
				<?php
			}
			?>
		</div>	
		
		<?php
    	return ob_get_clean();		
}
}


if(!class_exists("asmember_public_user_login"))
{	
	class asmember_public_user_login
	{
		public function __construct()
		{
			add_shortcode('asmember_login',array($this,'shortcode_asmember_login'));		
		}	
		
		function shortcode_asmember_login()
		{
			return get_asmember_login_form();
		} 	
	}
	$asmember_public_user_login = new asmember_public_user_login();
}	





// override core function	
if (!function_exists('wp_authenticate') ) :
function wp_authenticate($username, $password)
{    
        
    $username = sanitize_user($username);
    $password = trim($password);	
    $user = apply_filters('authenticate', null, $username, $password);
	//$roles = $user->roles;  	  	
  	
  	if(isset($user->ID))$userid=$user->ID;else $userid=0;
  	
    
    if($userid==0)
    {
        $user = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.'));
        
        $asmember_options_account = get_option('asmember_options_account');
		if($asmember_options_account['asmember_options_account_pages_login'])
		{
			$url=$asmember_options_account['asmember_options_account_pages_login'];
			
			
			
			if(isset($_GET['redirect_to']))
			{				
				$url.="?redirect_to=".$_GET['redirect_to'];
			}else
			{
				if($asmember_options_account['asmember_options_account_pages_redirect_after_login']!="")
				$url.="?redirect_to=".$asmember_options_account['asmember_options_account_pages_redirect_after_login']!="";			
			}
			wp_redirect(esc_url($url));
			exit;
		}else
		{
			$url="/wp-login.php";
		}				
		return $user;				
    }else
    {
		
		if(user_can( $userid, 'administrator' ))
  		{  	
  			$url= admin_url();
			wp_redirect(esc_url($url));
			
  			return $user;
		}
    	if ( get_user_meta( $userid, 'active', true ) == 1 )
		{         
        
        
        	$asmember_options_account = get_option('asmember_options_account');
			$url=$asmember_options_account['asmember_options_account_pages_login'];		
			
		
			//Statistik speichern
			global $wpdb;
		
			if($user->display_name!="")
				$user_str=$user->display_name;else
				$user_str=$user->user_login;
		
			$sql="select * from ".$wpdb->prefix."asmember_login_stat where user_id=".$user->ID." order by datum desc";
			$stat_row=$wpdb->get_row($sql);
			$stat_anzahl=$wpdb->num_rows;
			if($stat_anzahl>1)
			{
				$sql="delete from ".$wpdb->prefix."asmember_login_stat where datum!=".$stat_row->datum." and user_id=".$user->ID;
				$wpdb->query($sql);
				
			}
			if($stat_anzahl==0)
			{				
				$sql="insert into ".$wpdb->prefix."asmember_login_stat (datum,last_logins,user_id,user) values (".time().",'".time()."',".$user->ID.",'".$user_str."')";
				$wpdb->query($sql);
			
			}else
			{
				//auf 10 begrenzen
				if($stat_row->last_logins!="")
				{				
					$last_logins="";
					$logins=explode(",",$stat_row->last_logins);
					$stat_anzahl=0;
					foreach($logins as $login)
					{
						if($stat_anzahl<10)$last_logins.=",".$login;
						$stat_anzahl++;
					}		
						
					$last_logins=time().$last_logins;
				}else
				{
					$last_logins=time();
				}	
				$sql="update ".$wpdb->prefix."asmember_login_stat set datum=".time().",last_logins='".$last_logins."' where user_id=".$user->ID;
				$wpdb->query($sql);
			
			}	
    		if($url!="")
			{
				$url.="?redirect_to=".$_GET['redirect_to'];
				wp_redirect( $url );
			}
			return $user;
		}else
		{
			$ignore_codes = array('empty_username', 'empty_password');
			$user=null;
	    	return $user;
		}	
    
    	
    	return $user;
	}
		
   
    
}
endif;



