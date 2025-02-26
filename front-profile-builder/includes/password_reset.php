<div id="password-reset-form" class="widecolumn">
    <?php //if ( $attributes['show_title'] ) : ?>
        <h3><?php _e( 'Pick a New Password', 'personalize-login' ); ?></h3>
    <?php //endif; ?>
 
    <form name="resetpassform" id="resetpassform" action="<?php echo site_url( 'wp-login.php?action=resetpass' ); ?>" method="post" autocomplete="off">
        <input type="hidden" id="user_login" name="rp_login" value="<?php echo esc_attr( $_REQUEST['login'] ); ?>" autocomplete="off" />
        <input type="hidden" name="rp_key" value="<?php echo esc_attr( $_REQUEST['key'] ); ?>" />
         <?php
         $login = $_REQUEST['login'];
		 $key = $_REQUEST['key'];
		 $user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
		  if ( ! $user || is_wp_error( $user ) ) {
		  	$login = $_REQUEST['login'];
			/*if($login == "expiredkey"){
				echo "Your key is Expired.";
			}
			else if($login == "invalidkey"){
				echo "Your key is invalid.";
			}*/
			if ( $user && $user->get_error_code() === 'expired_key' ) {
				echo "Your key is Expired.";
			}
			else if($user && $user->get_error_code() === 'invalid_key'){
				echo "Your key is invalid.";
			}
		  }
		  else{
		 ?>
        
 
        <p>
            <label for="pass1"><?php _e( 'New password', 'personalize-login' ) ?></label>
            <input type="password" name="pass1" id="pass1" class="input" size="20" value="" autocomplete="off" />
        </p>
        <p>
            <label for="pass2"><?php _e( 'Repeat new password', 'personalize-login' ) ?></label>
            <input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off" />
        </p>
         
        <p class="description"><?php echo wp_get_password_hint(); ?></p>
         
        <p class="resetpass-submit">
            <input type="submit" name="submit" id="resetpass-button"
                   class="button" value="<?php _e( 'Reset Password', 'personalize-login' ); ?>" />
        </p>
        <?php } ?>
    </form>
</div>