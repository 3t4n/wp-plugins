<?php defined('ABSPATH' ) || wp_die; ?>
<div class="pz-page" id="pz-editor">
	<div class="pz-submit-float"><?php submit_button(); ?></div>
	<h2><?php echo	__('Convert Settings', TEXT_DOMAIN ).$help_open.'editor'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Convert from Text Link', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[auto-atag]" value="" />
					<input type="checkbox" name="properties[auto-atag]" value="1" <?php checked($prop['auto-atag'] ); ?> class="pz-sync-check" />
					<?php _e('Convert lines with text link only to Linkcard.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Convert from URL', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[auto-url]" value="" />
					<input type="checkbox" name="properties[auto-url]" value="1" <?php checked($prop['auto-url'] ); ?> class="pz-sync-check" />
					<?php _e('Convert lines with URL only to Linkcard.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Do Shortcode', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-do-shortcode]" value="" />
					<input type="checkbox" name="properties[flg-do-shortcode]" value="1" <?php checked($prop['flg-do-shortcode'] ); ?> />
					<?php _e('Force shortcode development.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('External Link Only', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[auto-external]" value="" />
					<input type="checkbox" name="properties[auto-external]" value="1" <?php checked($prop['auto-external'] ); ?> />
					<?php _e('Convert only external links.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<h2><?php echo	__('Editor Settings', TEXT_DOMAIN ).$help_open.'editor'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Add Insert Button', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-edit-insert]" value="" />
					<input type="checkbox" name="properties[flg-edit-insert]" value="1" <?php checked($prop['flg-edit-insert'] ); ?> />
					<?php _e('Add insert button to visual editor.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Add Quick Tag', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-edit-qtag]" value="" />
					<input type="checkbox" name="properties[flg-edit-qtag]" value="1" <?php checked($prop['flg-edit-qtag'] ); ?> />
					<?php _e('Add quick tag button to text editor.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Clear Excerpt', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[flg-clear-excerpt]" value="" />
					<input type="checkbox" name="properties[flg-clear-excerpt]" value="1" <?php checked($prop['flg-clear-excerpt'] ); ?> />
					<?php _e('If TITLE parameter is specified, EXCERPT is also cleared.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		</table>
	<?php submit_button(); ?>

	<h2><?php echo	__('Shortcode Settings', TEXT_DOMAIN ).$help_open.'editor'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('ShortCode 1', TEXT_DOMAIN ); ?></th>
			<td>[<input name="properties[code1]" type="text" class="pz-shortcode pz-shortcode-1" value="<?php echo	esc_attr($prop['code1'] ); ?>" /> url="http://popozure.info" <span class="pz-shortcode-title"><span class="pz-shortcode-parameter">title</span>="xxxxxx"</span> <span class="pz-shortcode-content"><span class="pz-shortcode-parameter">content</span>="xxxxxx"</span>]<p><?php _e('Case-sensitive', TEXT_DOMAIN ); ?></p></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Use InLineText', TEXT_DOMAIN ); ?></th>
			<td>
				[<span class="pz-shortcode-copy"><?php echo	esc_attr($prop['code1'] ); ?></span> url="http://xxx"]
				<select name="properties[use-inline]" class="pz-shortcode-enabled">
					<option value=""	<?php selected($prop['use-inline'] == ''  ); ?>><?php _e('No use',			TEXT_DOMAIN ); ?></option>
					<option value="1"	<?php selected($prop['use-inline'] == '1' ); ?>><?php _e('Use to excerpt',	TEXT_DOMAIN ); ?></option>
					<option value="2"	<?php selected($prop['use-inline'] == '2' ); ?>><?php _e('Use to title',	TEXT_DOMAIN ); ?></option>
				</select>
				[/<span class="pz-shortcode-copy"><?php echo	esc_attr($prop['code1'] ); ?></span>]
				<p><?php _e('This setting applies only to the Shortcode1', TEXT_DOMAIN ); ?></p></td>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('ShortCode 2', TEXT_DOMAIN ); ?></th>
			<td>[<input name="properties[code2]" type="text" class="pz-shortcode" value="<?php echo	esc_attr($prop['code2'] ); ?>" /> url="http://popozure.info" <span class="pz-shortcode-title"><span class="pz-shortcode-parameter">title</span>="xxxxxx"</span> <span class="pz-shortcode-content"><span class="pz-shortcode-parameter">content</span>="xxxxxx"</span>]<p><?php _e('Case-sensitive', TEXT_DOMAIN ); ?></p></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('ShortCode 3', TEXT_DOMAIN ); ?></th>
			<td>[<input name="properties[code3]" type="text" class="pz-shortcode" value="<?php echo	esc_attr($prop['code3'] ); ?>" /> url="http://popozure.info" <span class="pz-shortcode-title"><span class="pz-shortcode-parameter">title</span>="xxxxxx"</span> <span class="pz-shortcode-content"><span class="pz-shortcode-parameter">content</span>="xxxxxx"</span>]<p><?php _e('Case-sensitive', TEXT_DOMAIN ); ?></p></td>
		</tr>
		<tr class="pz-admin-only">
			<th scope="row"><?php _e('ShortCode 4', TEXT_DOMAIN ); ?></th>
			<td>[<input name="properties[code4]" type="text" class="pz-shortcode" value="<?php echo	esc_attr($prop['code4'] ); ?>" /> url="http://popozure.info" <span class="pz-shortcode-title"><span class="pz-shortcode-parameter">title</span>="xxxxxx"</span> <span class="pz-shortcode-content"><span class="pz-shortcode-parameter">content</span>="xxxxxx"</span>]<p><?php _e('Case-sensitive', TEXT_DOMAIN ); ?></p></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Example Entry', TEXT_DOMAIN ); ?></th>
			<td>
				<p><?php echo __('ex1.', TEXT_DOMAIN ).'&ensp;'.__('Specify only URL parameters.', TEXT_DOMAIN ); ?><div class="pz-shortcode-example pz-click-all-select">[<span class="pz-shortcode-copy"><?php echo esc_attr($prop['code1'] ); ?></span> url="https://xxx"]</div></p>
				<p><?php echo __('ex2.', TEXT_DOMAIN ).'&ensp;'.__('Specify URL and title parameters.', TEXT_DOMAIN ); ?><div class="pz-shortcode-example pz-click-all-select">[<span class="pz-shortcode-copy"><?php echo esc_attr($prop['code1'] ); ?></span> url="https://xxx" <span class="pz-shortcode-title"><span class="pz-shortcode-parameter">title</span>="xxxxxx"</span>]</div></p>
				<p><?php echo __('ex3.', TEXT_DOMAIN ).'&ensp;'.__('Specify URL, title and content parameters.', TEXT_DOMAIN ); ?><div class="pz-shortcode-example pz-click-all-select">[<span class="pz-shortcode-copy"><?php echo esc_attr($prop['code1'] ); ?></span> url="https://xxx" <span class="pz-shortcode-title"><span class="pz-shortcode-parameter">title</span>="xxxxxx"</span> <span class="pz-shortcode-content"><span class="pz-shortcode-parameter">content</span>="xxxxxx"</span>]</div></p>
				<p><?php _e('For any shortcode you can change the title and excerpt with `title` parameter and `content` parameter', TEXT_DOMAIN ); ?></p>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>
</div>