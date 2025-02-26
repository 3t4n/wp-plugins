<?php

$settings = $data['settings'];

?>
<form method="post">
	<h2 class="title"><?php _e('Data fetching', 'embed-extended'); ?></h2>
	<table class="form-table" role="presentation">
		<tr>
			<th scope="row">
				<?php _e('URL pattern matching', 'embed-extended'); ?>
			</th>
			<td>
				<label for="embed_extended_url_patterns_mode">
				<?php

					$option_selected = $settings['embed_extended_url_patterns_mode'];
					$options = '<select name="embed_extended_url_patterns_mode" id="embed_extended_url_patterns_mode">'
						. '<option value="exclude"' . ( 'exclude' === $option_selected ? ' selected="selected"' : '' ) . '>' . __('Exclude', 'embed-extended') . '</option>'
						. '<option value="include"' . ( 'include' === $option_selected ? ' selected="selected"' : '' ) . '>' . __('Include only', 'embed-extended') . '</option>'
						. '</select>';

					printf(
						/* translators: %s: A HTML combobox element. */
						__('%s URL matched with the following patterns', 'embed-extended'),
						$options
					);

				?>
				</label><br />
				<p>
					<textarea class="regular-text" name="embed_extended_url_patterns" id="embed_extended_url_patterns"
						rows="6" placeholder="<?php esc_attr_e('twitch.tv, /maps, .scss, etc…', 'embed-extended'); ?>"
						><?php echo esc_textarea($settings['embed_extended_url_patterns']) ?></textarea>
				</p>
				<p class="description" id="embed-extended-url-patterns-description">
				<?php

					printf(
						/* translators: %s: Included or excluded, based on the selected pattern mode. */
						__('Add URL patterns you want to be <span>%s</span> by this plugin, <strong>separated by a comma or new line</strong>. Pattern matching will be done in plain text.', 'embed-extended'),
						__('excluded', 'embed-extended')
					);

					?>
				</p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<?php _e('Supported content', 'embed-extended'); ?>
			</th>
			<td>
				<fieldset>
					<legend class="screen-reader-text">
						<span><?php _e('Supported content', 'embed-extended'); ?></span>
					</legend>
					<label for="embed_extended_parse_html_content">
						<input type="checkbox" name="embed_extended_parse_html_content" id="embed_extended_parse_html_content" value="1"
							<?php echo $settings['embed_extended_parse_html_content'] ? 'checked="checked"' : '' ?> />
						<?php _e('Support websites that do not have their own embed API.', 'embed-extended'); ?>
					</label>
				</fieldset>
			</td>
		</tr>
	</table>

	<?php if (!(defined('EMBED_EXTENDED_LEGACY_CARD') && EMBED_EXTENDED_LEGACY_CARD)) : ?>
	<div id="default_embed_config">
		<h2 class="title"><?php _e('Default embed card appearance', 'embed-extended'); ?></h2>
		<p><?php _e("These settings below only apply to websites that do not have embed API.", 'embed-extended'); ?></p>
		<table class="form-table" role="presentation">
			<tr>
				<th scope="row">
					<label for="embed_extended_thumbnail_position">
						<?php _e('Thumbnail', 'embed-extended'); ?>
					</label>
				</th>
				<td>
					<?php $option_selected = $settings['embed_extended_thumbnail_position']; ?>
					<select name="embed_extended_thumbnail_position" id="embed_extended_thumbnail_position">
						<option value="top" <?php echo 'top' === $option_selected ? 'selected="selected"': ''; ?>><?php _e('Show on top', 'embed-extended'); ?></option>
						<option value="left" <?php echo 'left' === $option_selected ? 'selected="selected"': ''; ?>><?php _e('Show on left', 'embed-extended'); ?></option>
						<option value="hide" <?php echo 'hide' === $option_selected ? 'selected="selected"': ''; ?>><?php _e('Hide thumbnail', 'embed-extended'); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<?php _e('Custom CSS', 'embed-extended'); ?>
				</th>
				<td>
					<p>
						<textarea class="regular-text" name="embed_extended_custom_css" id="embed_extended_custom_css"
							rows="6" placeholder="<?php esc_attr_e('Enter additional CSS here…', 'embed-extended'); ?>"
							style="font-family: monospace;"><?php echo esc_textarea($settings['embed_extended_custom_css']) ?></textarea>
					</p>
				</td>
			</tr>
		</table>
	</div>
	<?php endif; ?>

	<?php submit_button(); ?>
</form>
