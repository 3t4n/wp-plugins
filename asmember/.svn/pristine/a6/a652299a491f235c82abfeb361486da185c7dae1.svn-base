<?php

if(!class_exists("asmember_public_reset_password"))
{
	

class asmember_public_reset_password
{

	public function __construct()
	{
		add_shortcode('asmember_reset_password',array($this,'shortcode_asmember_reset_password'));
		
		$asmember_options_account=get_option("asmember_options_account");				
		$redirect_url=$asmember_options_account["asmember_options_account_pages_reset_password"];
		if($redirect_url!="")
		{			
			add_action( 'login_form_lostpassword', array( $this, 'do_password_lost' ) );
			add_action( 'login_form_resetpass', array( $this, 'do_password_reset' ) );
			add_action( 'login_form_resetpass', array( $this, 'redirect_to_custom_password_reset' ) );
			add_filter( 'retrieve_password_message',  array($this,'replace_retrieve_password_message') , 10, 4 );
		}
	}	
	
	
	public function do_password_reset()
	{
    	if ( 'POST' == $_SERVER['REQUEST_METHOD'] )
    	{
        	$rp_key = $_REQUEST['rp_key'];
        	$rp_login = $_REQUEST['rp_login'];
 			
 			
        	$asmember_options_account=get_option("asmember_options_account");				
			$redirect_url=$asmember_options_account["asmember_options_account_pages_reset_password"];
			
        	$user = check_password_reset_key( $rp_key, $rp_login );
 
        	if ( ! $user || is_wp_error( $user ) )
        	{
            	if ( $user && $user->get_error_code() === 'expired_key' )
            	{
                	//wp_redirect( home_url( 'member-login?login=expiredkey' ) );
                	//echo "Fehler 1";
                	$redirect_url = add_query_arg( 'set_passwort', 'error', $redirect_url );            	
                	wp_redirect($redirect_url);
            	} else
            	{
                	//wp_redirect( home_url( 'member-login?login=invalidkey' ) );
                	$redirect_url = add_query_arg( 'set_passwort', 'error', $redirect_url );            	
                	wp_redirect($redirect_url);
            	}
            	exit;
        	}
 			
        	if ( isset( $_POST['pass1'] ) )
        	{
        		
            	
            	if ( $_POST['pass1'] != $_POST['pass2'] )
            	{
                	// Passwords don't match
                	//$redirect_url = home_url( 'member-password-reset' );
 
                	$redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                	$redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                	$redirect_url = add_query_arg( 'error', 'password_reset_mismatch', $redirect_url );
 					echo $redirect_url."<br>Fehler 3";
                	//wp_redirect( $redirect_url );
                	//exit;
            	}
 				
            	if ( empty( $_POST['pass1'] ) )
            	{            		
                	// Password is empty
                	//$redirect_url = home_url( 'member-password-reset' );
 
                	$redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                	$redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                	$redirect_url = add_query_arg( 'error', 'password_reset_empty', $redirect_url );
 					echo $redirect_url."<br>Fehler 4";
                	//wp_redirect( $redirect_url );
                	//exit;
            	}
 
            	// Parameter checks OK, reset password
            	reset_password( $user, $_POST['pass1'] );
            	
            	$redirect_url = add_query_arg( 'set_passwort', 'confirm', $redirect_url );            	
            	wp_redirect( $redirect_url );
            	
        	} else
        	{
            	echo "Invalid request.";
        	}
 
        	exit;
        	
    	}
	}


	public function replace_retrieve_password_message( $message, $key, $user_login, $user_data )
	{
    	// Create new message    	
 		$asmember_options_account = get_option('asmember_options_account');
		$msg=$asmember_options_account['asmember_options_account_password_text_email'];
		
		$msg=str_replace("%user_login%",$user_login,$msg);
		$msg=str_replace("%password_reset_link%",site_url("wp-login.php?action=rp&key=$key&login=".rawurlencode($user_login)),$msg);
		//$msg=str_replace("\n","<br>",$msg);	
    	return $msg;
	}
	
	
	

	public function redirect_to_custom_password_reset()
	{
    	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) 
    	{        	
        	
        	// Verify key / login combo
        	$asmember_options_account=get_option("asmember_options_account");				
			$redirect_url=$asmember_options_account["asmember_options_account_pages_reset_password"];
							
        	
        	$user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
        	
        	if ( ! $user || is_wp_error( $user ) ) 
        	{
            	echo "Fehler";
            	if ( $user && $user->get_error_code() === 'expired_key' )
            	{
                	wp_redirect( $redirect_url );
            	} else 
            	{
                	wp_redirect( $redirect_url );
            	}
            	exit;
        	}
 			
 			
        	//$redirect_url = home_url( 'member-password-reset' );
        	$redirect_url = add_query_arg( 'form', 'new_passwort',$redirect_url);
        	$redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
        	$redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );
        	 			
        	wp_redirect( $redirect_url );
        	exit;
    	}
	}


	public function do_password_lost()
	{
    	if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) 
    	{
    		$asmember_options_account=get_option("asmember_options_account");				
			$redirect_url=$asmember_options_account["asmember_options_account_pages_reset_password"];
			
        	$errors = retrieve_password();
        	if ( is_wp_error( $errors ) ) 
        	{
            	// Errors found            	
            	$redirect_url = add_query_arg( 'errors', join( ',', $errors->get_error_codes() ), $redirect_url );
        	} else 
        	{
            	// Email sent            	
            	$redirect_url = add_query_arg( 'checkemail', 'confirm', $redirect_url );            	
        	}
 
        	wp_redirect( $redirect_url );
        	exit;
    	}
	}


	
	
	

	function shortcode_asmember_reset_password()
	{
		$asmember_options_account=get_option("asmember_options_account");
		$asmember_options_account_pages_reset_password=$asmember_options_account["asmember_options_account_pages_reset_password"];
						
		ob_start();
		
		if($_REQUEST["set_passwort"]=="error")
		{
			echo "<p>";
			echo _e("Beim Setzen Ihres Passwortes kam es zu einem Fehler.","asmember");
			echo "</p>";			
			echo get_asmember_login_form();
		}else
		
		if($_REQUEST["set_passwort"]=="confirm")
		{
			echo "<p>".str_replace("\n","<br>",$asmember_options_account["asmember_options_account_password_reset_frontend_result2"])."</p>";			
			echo get_asmember_login_form();
		}else
		if($_REQUEST["form"]=="new_passwort")
		{
			echo "<p>".str_replace("\n","<br>",$asmember_options_account["asmember_options_account_password_reset_frontend_form2"])."</p>";			
			
			?>
			
 
    		<form name="resetpassform" id="resetpassform" action="<?php echo site_url( 'wp-login.php?action=resetpass' ); ?>" method="post" autocomplete="off">
        		<input type="hidden" id="user_login" name="rp_login" value="<?php echo $_REQUEST['login']; ?>" autocomplete="off" />
        		<input type="hidden" name="rp_key" value="<?php echo $_REQUEST['key']; ?>" />
         
        	
 			<div class="asverein-form-container asmember-login-container">
 			<div class="row">
 				<div class="col">
 					<div class="form-group">    					
  						<label for="pass1"><?php echo _e("Neues Passwort","asmember");?></label>
						<input type="password" name="pass1" id="pass1" class="form-control" value="" size="20" autocapitalize="off" />						
  					</div>
  					
  					<div class="form-group">    					
  						<label for="pass2"><?php echo _e("Passwort wiederholen","asmember");?></label>
						<input type="password" name="pass2" id="pass2" class="form-control" value="" size="20" autocapitalize="off" />						
  					</div>
         
			        <div class="form-group"> 
			        	<p class="description"><?php echo wp_get_password_hint(); ?></p>
			        </div>	
         	
         	
         			<div class="form-group">
        				<p class="resetpass-submit">
            			<input type="submit" name="submit" id="resetpass-button" class="btn btn-primary" value="<?php echo _e("Passwort speichern","asmember");?>"/>
				        </p>
				    </div>
				</div> 
				</div>       
    		</form>
			</div>
			<?php
		}else
		if($_REQUEST["checkemail"]=="confirm")
		{
			echo "<p>".str_replace("\n","<br>",$asmember_options_account["asmember_options_account_password_reset_frontend_result1"])."</p>";			
			
		}else
		{			
			echo "<p>".str_replace("\n","<br>",$asmember_options_account["asmember_options_account_password_reset_frontend_form1"])."</p>";			
			
			
			?>
			<form name="lostpasswordform" id="lostpasswordform" action="/wp-login.php?action=lostpassword" method="post">		
			<div class="asmember-form-container asmember-login-container">
 			<div class="row">
 				<div class="col">
 					<div class="form-group">    					
  						<label for="user_login"><?php echo _e("Benutzername oder E-Mail","asmember");?></label>
						<input type="text" name="user_login" id="user_login" class="form-control" value="" size="20" autocapitalize="off" />						
  					</div>
 					
  					<div class="form-group">
  						<input type="hidden" name="redirect_to" value="" />
  						<input type="submit" name="wp-submit" class="btn btn-primary" id="wp-submit" value="<?php echo _e("Neues Passwort anfordern","asmember");?>"/>
  					</div> 		
  				</div>
  			</div>
  			</div>
			</form>			
			<?php
		}
			
		return ob_get_clean();	
	}


}

$asmember_public_reset_password = new asmember_public_reset_password();



}






