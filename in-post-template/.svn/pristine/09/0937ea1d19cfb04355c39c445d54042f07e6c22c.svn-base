<div class="wrap">
	<h2 id="write-post">In-post Template</h2>
	<p>In-post Template will add extra data inside post content.</p>

	<h3>In-post Template Preferences</h3>
	<form name="form_option" method="post" action="options.php">
	<?php settings_fields('wp_ipt_options'); ?>
	<table class="form-table"><tbody>
	<tr>
		<th>In-post Content:</th>
		<td>
			<textarea name="wp_ipt_content" cols="60" rows="10"><?php echo get_option('wp_ipt_content'); ?></textarea>
		</td>
	</tr>
	<tr>
		<th>If No Mark Found</th>
		<td>
			<?php $selected[get_option('wp_ipt_nomark')] = ' selected="selected"'; ?>
			<select name="wp_ipt_nomark">
			<option value="ignore" <?php echo $selected['ignore']; ?>>Ignore</option>
			<option value="before" <?php echo $selected['before']; ?>>Before Post</option>
			<option value="after" <?php echo $selected['after']; ?>>After Post</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Alternative Content (when no mark found)</th>
		<td>
			<textarea name="wp_ipt_alternate" cols="60" rows="10"><?php echo get_option('wp_ipt_alternate'); ?></textarea>
		</td>
			
	</tr>
	</tbody> </table>
	<p class="submit">
	<input type="submit" value="<?php _e('Save Changes'); ?>" />
	</p>
	</form>
</div>

