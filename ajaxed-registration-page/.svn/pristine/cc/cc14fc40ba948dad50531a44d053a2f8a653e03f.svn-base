<div id="registeration-section">
	<div class="inner-content">
		<div id="messages" style="display:none"></div>
	    	<?php if (get_option('users_can_register')==1) : ?>
	    	<div class="registeration-wrapper">
	    		<h2><?php _e('Sign up', 'pana_reg_localization'); ?></h2>
	    		<form method="post" class="registeration_form">					
	                <p>
	                    <label for="your_username"><?php _e('Username', 'pana_reg_localization'); ?></label>
	                    <input type="text" class="pana-input-text" placeholder="<?php _e('Enter a username', 'pana_reg_localization'); ?>" tabindex="1" name="your_username" id="your_username" value="<?php if (isset($posted['username'])) echo $posted['username']; ?>" />
	                </p>
	
	                <p>
	                    <label for="your_email"><?php _e('Email', 'pana_reg_localization'); ?></label>
	                    <input type="text" class="pana-input-text" placeholder="<?php _e('Your email address', 'pana_reg_localization'); ?>" tabindex="2" name="your_email" id="your_email" value="<?php if (isset($posted['email'])) echo $posted['email']; ?>" />
	                </p>
						
					<div class="clearfix pana-col2">	
						<p class="<?php if(is_rtl()){ echo 'floatright';}else{echo 'floatleft';} ?>">
		                    <label for="your_password"><?php _e('Password', 'pana_reg_localization'); ?></label>
		                    <input type="password" class="pana-input-text" placeholder="<?php _e('Enter a password', 'pana_reg_localization'); ?>" tabindex="3" name="your_password" id="your_password" value="" />
		                </p>
		
		                <p class="<?php if(is_rtl()){ echo 'floatleft';}else{echo 'floatright';} ?>">
		                    <label for="your_password_2"><?php _e('Re-enter password', 'pana_reg_localization'); ?></label>
		                    <input type="password" class="pana-input-text" placeholder="<?php _e('Re-enter password', 'pana_reg_localization'); ?>" tabindex="4" name="your_password_2" id="your_password_2" value="" />
		                </p>
	                </div>
	                <?php do_action('pana_register_form'); ?>	
					<p><input type="button" class="btn-reg" tabindex="6" name="register" value="<?php _e('Create Account &rarr;', 'pana_reg_localization'); ?>" id="register_btn" /></p>

				</form>    		
	    	</div>
	    	<?php endif; ?>
	</div>	
</div>

