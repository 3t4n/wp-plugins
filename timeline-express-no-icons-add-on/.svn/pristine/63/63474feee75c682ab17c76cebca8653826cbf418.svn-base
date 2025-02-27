<?php
/**
 * Timeline Express No Icons Add-On Settings Section & Options
 *
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}
?>

<form method="post" action="options.php" name="timeline-express-form" id="timeline-express-form">

	<?php
		/* Do the settings fields */
		settings_fields( 'timeline-express-no-icons-settings' );
		do_settings_sections( 'timeline-express-no-icons-settings' );

		/* Nonce security check :) */
		wp_nonce_field( 'timeline_express_no_icons_save_settings', 'timeline_express_no_icons_settings_nonce' );
	?>

	<table class="form-table timeline-express-form">

		<tbody>

			<!-- Global No Icons -->
			<tr valign="top">
				<th scope="row">
					<label for="timeline_express_storage[global_no_icons]">
						<?php esc_html_e( 'Global No Icons', 'timeline-express-no-icons-add-on' ); ?>
					</label>
				</th>
				<td>
				<input name="timeline_express_storage[global_no_icons]" id="timeline_express_storage[global_no_icons]" type="checkbox" value="1" <?php checked( $this->options['global_no_icons'], true ); ?> />
					<p class="description">
						<?php echo _e( 'Checking this option will remove icons from <strong>ALL</strong> timelines. If not checked you will need to include a <code>no-icons="1"</code> parameter in the shortcodes where you don\'t want icons visible. (eg: <code>[timeline-express no-icons="1"]</code>)' , 'timeline-express-no-icons-add-on' ); ?>
					</p>

					<?php
						printf(
							'<p class="description">%1$s</p>',
							sprintf( /* translators: Note wrapped in strong tags. */ __( '%s: When this option is checked off, the icon selection will no longer be present on the announcement edit screen.', 'timeline-express-no-icons-add-on' ), '<strong>' . __( 'Note', 'timeline-express-no-icons-add-on' ) . '</strong>' )
						);
					?>

				</td>
			</tr>

			<!-- Disable Hover Animations -->
			<tr valign="top">
				<th scope="row">
					<label for="timeline_express_storage[disable_hover_animations]">
						<?php esc_html_e( 'Disable Hover Animations', 'timeline-express-no-icons-add-on' ); ?>
					</label>
				</th>
				<td>
					<input name="timeline_express_storage[disable_hover_animations]" id="timeline_express_storage[disable_hover_animations" type="checkbox" value="1" <?php checked( $this->options['disable_hover_animations'], true ); ?> />
					<p class="description">
						<?php echo _e( 'Checking this option will prevent circles from growing in size when a user hovers over them.' , 'timeline-express-no-icons-add-on' ); ?>
					</p>
				</td>
			</tr>

			<!-- Submit Button -->
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="save-timeline-express-options" value="true" />
					<input type="submit" name="submit" id="submit" class="button-primary" value="<?php esc_attr_e( 'Save Settings', 'timeline-express-no-icons-add-on' ); ?>">
				</td>
			</tr>

		</tbody>

	</table>

</form>
