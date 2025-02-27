<h1><?php _e('Fix Serialized Strings', 'fg-fix-serialized-strings') ?></h1>
<p>
<?php _e('Fix the serialized strings in the postmeta and options tables by recalculating all the string lengths', 'fg-fix-serialized-strings') ?><br />
<?php _e('As it will change your database, please do a backup first.', 'fg-fix-serialized-strings') ?>
</p>
<form method="post" action="">
	<?php wp_nonce_field('fgfss-fix'); ?>
	<input class="button-primary" type="submit" name="fix-serialized-strings" value="<?php _e('Fix serialized strings', 'fg-fix-serialized-strings'); ?>" />
</form>
