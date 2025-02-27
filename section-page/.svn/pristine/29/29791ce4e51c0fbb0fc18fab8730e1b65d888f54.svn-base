<div class="wrap">
<?php screen_icon(); ?>
	<h2><?php _e( 'Section Page Plugin', 'owc_sp' ); ?></h2>
	<form action="" method="post">
		<?php wp_nonce_field( 'owc-section-page' ); ?>

		<h3><?php _e( 'Options', 'owc_sp' ); ?></h3>
		<table class="form-table">
			<tr valign="top">
				<th><?php _e( 'HTML tag for section title', 'owc_sp' ); ?></th>
				<td>
					<select name="owc_sp_title">
						<option value="h1"<?php echo ($options['owc_sp_title'] == 'h1')?' selected="selected"':''; ?>><?php _e( 'Heading 1 (h1)', 'owc_sp'); ?></option>
						<option value="h2"<?php echo ($options['owc_sp_title'] == 'h2')?' selected="selected"':''; ?>><?php _e( 'Heading 2 (h2)', 'owc_sp'); ?></option>
						<option value="h3"<?php echo ($options['owc_sp_title'] == 'h3')?' selected="selected"':''; ?>><?php _e( 'Heading 3 (h3)', 'owc_sp'); ?></option>
						<option value="h4"<?php echo ($options['owc_sp_title'] == 'h4')?' selected="selected"':''; ?>><?php _e( 'Heading 4 (h4)', 'owc_sp'); ?></option>
						<option value="span"<?php echo ($options['owc_sp_title'] == 'span')?' selected="selected"':''; ?>><?php _e( 'Simple text (span)', 'owc_sp'); ?></option>
						<option value="strong"<?php echo ($options['owc_sp_title'] == 'strog')?' selected="selected"':''; ?>><?php _e( 'Bold text (strong)', 'owc_sp'); ?></option>
						<option value="em"<?php echo ($options['owc_sp_title'] == 'em')?' selected="selected"':''; ?>><?php _e( 'Italic text (em)', 'owc_sp'); ?></option>
						<option value="p"<?php echo ($options['owc_sp_title'] == 'p')?' selected="selected"':''; ?>><?php _e( 'Paragraph (p)', 'owc_sp'); ?></option>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'HTML classes for section', 'owc_sp' ); ?></th>
				<td>
					<input type="text" name="owc_sp_class" id="owc_sp_class" value="<?php echo $options['owc_sp_class']; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'HTML classes for section title', 'owc_sp' ); ?></th>
				<td>
					<input type="text" name="owc_sp_class_title_elm" id="owc_sp_class_title_elm" value="<?php echo $options['owc_sp_class_title_elm']; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'HTML classes for section title wrapper', 'owc_sp' ); ?></th>
				<td>
					<input type="text" name="owc_sp_class_title" id="owc_sp_class_title" value="<?php echo $options['owc_sp_class_title']; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'HTML classes for section content', 'owc_sp' ); ?></th>
				<td>
					<input type="text" name="owc_sp_class_content" id="owc_sp_class_content" value="<?php echo $options['owc_sp_class_content']; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'Use a char before section title', 'owc_sp' ); ?></th>
				<td>
					<input type="checkbox" name="owc_sp_use_char"<?php echo $options['owc_sp_use_char']?' checked="checked"':''; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'Char when section is closed', 'owc_sp' ); ?></th>
				<td>
					<input type="text" name="owc_sp_close_char" id="owc_sp_close_char" value="<?php echo $options['owc_sp_close_char']; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'Char when section is open', 'owc_sp' ); ?></th>
				<td>
					<input type="text" name="owc_sp_open_char" id="owc_sp_open_char" value="<?php echo $options['owc_sp_open_char']; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'Use animation', 'owc_sp' ); ?></th>
				<td>
					<input type="checkbox" name="owc_sp_use_animation"<?php echo $options['owc_sp_use_animation']?' checked="checked"':''; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th><?php _e( 'Custom CSS', 'owc_sp' ); ?></th>
				<td>
					<textarea rows="6" cols="80" id="owc_sp_css" name="owc_sp_css"><?php echo $options['owc_sp_css']; ?></textarea>
				</td>
			</tr>
		</table>
		<p class="submit"><input type="submit" name="owc_section_page_submit" id="owc_section_page_submit" class="button button-primary" value="<?php _e( 'Save Changes', 'owc_sp' ); ?>"></p>
	</form>
</div>
 