<div class="wrap"> 
	<div id="icon-options-general" class="icon32"><br /></div> 
	<h2>ODD Social media</h2>

	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					Twitter-URL
				</th>
				<td>
					<input type="text" name="odd_twitter" size="85" value="<?php echo get_option('odd_twitter'); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Facebook-URL
				</th>
				<td>
					<input type="text" name="odd_facebook" size="85" value="<?php echo get_option('odd_facebook'); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					LinkedIN-URL
				</th>
				<td>
					<input type="text" name="odd_linkedin" size="85" value="<?php echo get_option('odd_linkedin'); ?>" />
				</td>
			</tr>
		</table>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="odd_twitter,odd_facebook,odd_linkedin" />
	
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>