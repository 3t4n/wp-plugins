<div class="plugin_slug profilepro-profile-container" data-form_id = "<?php echo $form_type;?>" data-mode="reset">
<div class="profilepro-profile-head-reg">
 	<div class="profilepro-profile-left">
 		<?php _e('Forgot Password',PROFILEPRO_PLUGIN_SLUG);?>
 	</div>
 	<div class="profilepro-profile-right">
 	</div>
 	<div class="profilepro-clear"></div>
</div>
<div class="plugin_slug" data-form_id = "forgot" >

	<div class="plugin_slug-form">
	
		<form method="post" action="">
			<div class='profilepro-field' data-key="user_email">
				<div class='profilepro-label'>
					<label for='$key'><?php _e( 'Enter Email', PROFILEPRO_PLUGIN_SLUG );?></label>
				 	<span class='profilepro-required'>*</span>
				</div>
				<div class='profilepro-element'>
					<input type="text" name="user_email" id="user_email" data-is_required = 1 />
				</div>
			</div><br><br>
			<input type="submit" value="<?php _e('Submit',PROFILEPRO_PLUGIN_SLUG);?>" class="profilepro-button" id="profilepro-forgot-submit">
			<div id="profilepro-loader"><img src="<?php echo PROFILEPRO_URL.'assets/images/loader.gif';?>"></div>
			<div id="profilepro-ajax-msg"></div><br>
		</form>
	</div>
</div>	</div>	
