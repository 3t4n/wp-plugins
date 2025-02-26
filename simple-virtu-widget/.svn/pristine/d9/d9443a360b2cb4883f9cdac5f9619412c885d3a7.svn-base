<div class="wrap">
<h2>Simple Virtu Widget</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('simple-virtu-widget'); ?>

<table class="form-table">

<tr valign="top">
	<th scope="row"><?php _e('Agent ID:', 'simple-virtu-widget') ?></th>
	<td>
		<input type="text" name="virtu_mortgage_agent_id" value="<?php echo get_option('virtu_mortgage_agent_id'); ?>" />
	</td>
</tr>

<tr valign="top">
	<th scope="row">&nbsp;</th>
	<td>
		<input name="virtu_mortgage_agent_id_from_url" type="checkbox" id="virtu_mortgage_agent_id_from_url" value="1" <?php checked( '1', get_option( 'virtu_mortgage_agent_id_from_url' ) ); ?>/>
		<label for="virtu_mortgage_agent_id_from_url"><?php _e('Override Agent ID value from URL parameters', 'simple-virtu-widget') ?></label>
	</td>
</tr>

<tr valign="top">
	<th scope="row"><?php _e('Google Analytics tracking ID:', 'simple-virtu-widget') ?></th>
	<td><input type="text" name="virtu_mortgage_ega_tracking_id" value="<?php echo get_option('virtu_mortgage_ega_tracking_id'); ?>" /></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
