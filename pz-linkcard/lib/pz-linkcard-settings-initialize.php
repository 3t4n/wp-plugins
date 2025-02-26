<?php defined('ABSPATH' ) || wp_die; ?>
<div class="pz-page" id="pz-initialize">
	<div class="pz-submit-float"><?php submit_button(); ?></div>
	<h2><?php echo	__('Initialize', TEXT_DOMAIN ).$help_open.'initialize'.$help_close; ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Initialize Settings', TEXT_DOMAIN ); ?></th>
			<td>
				<button type="submit" name="action" value="init-settings" class="pz-button-sure" onclick="return confirm('<?php _e('Are you sure?', TEXT_DOMAIN ); ?>');"><?php _e('Run', TEXT_DOMAIN ); ?></button>
				&ensp;<span><?php _e('Reset the "Settings" to the initial value.', TEXT_DOMAIN ); ?></span>
			</td>
		</tr>
		<tr class="pz-admin-only">
			<th scope="row"><?php _e('Initialization Exception', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[initialize-exception]" value="" />
					<input type="checkbox" name="properties[initialize-exception]" value="1" <?php checked($this->options['initialize-exception'] ); ?> />
					<?php _e('Do not initialize "Survey Mode" and "Administrator Mode".', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<div class="pz-admin-only">
		<h2><?php echo	__('Deletion Settings', TEXT_DOMAIN ); ?></h2>
		<table class="form-table">
			<tr>
				<th scope="row"><?php _e('Delete Settings', TEXT_DOMAIN ); ?></th>
				<td>
					<label>
						<input type="hidden"   name="properties[flg-delete-db]" value="" />
						<input type="checkbox" name="properties[flg-delete-db]" value="1" <?php checked($this->options['flg-delete-db'] ); ?> />
						<?php echo __('When deleting a plugin, also delete its settings.', TEXT_DOMAIN ).__('(Unimplemented)', TEXT_DOMAIN ); ?>
					</label>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php _e('Delete DataBase', TEXT_DOMAIN ); ?></th>
				<td>
					<label>
						<input type="hidden"   name="properties[flg-delete-settings]" value="" />
						<input type="checkbox" name="properties[flg-delete-settings]" value="1" <?php checked($this->options['flg-delete-settings'] ); ?> />
						<?php echo __('When deleting a plugin, also delete it from the database.', TEXT_DOMAIN ).__('(Unimplemented)', TEXT_DOMAIN ); ?>
					</label>
				</td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</div>
</div>
