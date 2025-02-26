<h1>Settings Social Media</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php" >

	<?php settings_fields( 'fvp_social_media_settings' ); ?>
	<?php do_settings_sections( 'fvp_social_media_plugin_settings' ); ?>
	<?php submit_button('Save changes', 'primary', 'submit-button'); ?>

</form>
