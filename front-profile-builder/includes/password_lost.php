<?php
/**
 * A shortcode for rendering the form used to initiate the password reset.
 *
 * @return string  The shortcode output
 */
	?>
	<div id="password-lost-form" class="widecolumn">
		<?php //if ( $attributes['show_title'] ) : ?>
			<h3><?php _e( 'Forgot Your Password?', 'frontprofile-builder' ); ?></h3>
		<?php 
		if ( is_user_logged_in() ) {
        //return __( 'You are already signed in.', 'frontprofile-builder' );
			echo 'You are already signed in.';
		} 
		else{ 
		   if( isset($_REQUEST['errors']) && ($_REQUEST['errors'] != '' || $_REQUEST['errors'] != NULL)){
			  $errors = $_REQUEST['errors'];
			  switch($errors){
				case 'empty_username': 
					echo "You need to enter your email address to continue.";
					break;
		
				case 'invalid_email': 
					echo "Your entered email address is invalid.";	
					break;
		
				case 'invalidcombo': 
					echo "There are no users registered with this email address.";		
					break;
		   	}
		  }	
	      else{
		
		 ?>
	 
		<p>
			<?php
				_e(
					"If you forgot your Password, Enter your email address and we'll send you a link you can use to pick a new password.",
					'personalize_login'
				);
			?>
		</p>
	    <?php } ?>
		<form id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">
			<p class="form-row">
				<label for="user_login"><?php _e( 'Email', 'personalize-login' ); ?>
				<input type="text" name="user_login" id="user_login">
			</p>
	 
			<p class="lostpassword-submit">
				<input type="submit" name="submit" class="lostpassword-button"
					   value="<?php _e( 'Reset Password', 'personalize-login' ); ?>"/>
                 <input type="hidden" name="lost_password_sent" id="lost_password_sent" value="<?php echo $lost_password_sent;?>" />     
			</p>
		</form>
	</div>
    <?php 
	 }
	?>