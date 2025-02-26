<div class="wrap">
<h2>Audience Pixel</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('audience'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Audience App ID:</th>
<td><input type="text" name="audience_app_id" value="<?php echo get_option('audience_app_id'); ?>" /></td>
</tr>

</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
