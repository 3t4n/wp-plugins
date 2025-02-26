<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

$acfc_admin = new ACFC_Admin();

?>
<div class="acfc-admin">
	<div class="acfc-container">
		<div class="acfc-loading-bar"></div>

		<div class="acfc-pro">
			<h4>
				<?php echo esc_html__( 'Get the PRO version today!', 'acf-copilot' ); ?>
			</h4>
			<p>
				<?php echo esc_html__( 'The PRO version offers more features, improved performance, and a faster recovery process.', 'acf-copilot' ); ?>
			</p>

			<table>
				<tr>
					<th><?php echo esc_html__( 'Feature', 'acf-copilot' ); ?></th>
					<th><?php echo esc_html__( 'Free', 'acf-copilot' ); ?></th>
					<th><?php echo esc_html__( 'PRO', 'acf-copilot' ); ?></th>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'AI-generated Code Snippets for groups, repeatable and flexible content', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'no', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'AI Generator for Field Groups', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'no', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'LivePreview for ACF', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'Posts & Pages', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'Posts and Pages, and CPTs', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'LivePreview Editor Support', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'classic', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'classic & block', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Unused Custom Fields Cleaner', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'no', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Bulk Delete for Field Groups', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Bulk Drag & Drop for Field Groups', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Static ACF Code Snippets', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Ready-to-use Base and Bootstrap 5 HTML components', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Custom Options w/ access and support', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'limited', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'full', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Priority email support', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'no', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'yes', 'acf-copilot' ); ?></td>
				</tr>
				<tr>
					<td><?php echo esc_html__( 'Regular plugin updates', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'delayed', 'acf-copilot' ); ?></td>
					<td><?php echo esc_html__( 'first release', 'acf-copilot' ); ?></td>
				</tr>
			</table>

			<p class="button-group">
				<a
					class="button button-primary button-pro"
					href="https://bit.ly/40tnyD4"
					target="_blank"
				>
					<?php echo esc_html__( 'GET PRO VERSION', 'acf-copilot' ); ?>
				</a>
				<a
					class="button button-primary button-watch-video"
					href="https://www.youtube.com/watch?v=X6Yabnz3Fas"
					target="_blank"
				>
					<?php echo esc_html__( 'Watch Video', 'acf-copilot' ); ?>
				</a>
			</p>
		</div>

		<h2>
			<?php echo esc_html__( 'ACF Copilot', 'acf-copilot' ); ?>
		</h2>

		<p>
			<?php
			printf(
				wp_kses(
					__( 'Improve Advanced Custom Fields workflows with livepreview, inline help, custom code snippets, html components and field group bulk delete and move.', 'acf-copilot' ),
					json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true )
				),
			);
			?>
		</p>

		<p>
			<?php
			printf(
				wp_kses(
					/* translators: %1$s is replaced with "Important" */
					/* translators: %2$s is replaced with "Save" */
					__( '%1$s: Be sure to click the "%2$s" button below after making any changes to the settings.', 'acf-copilot' ),
					json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true )
				),
				'<strong>' . esc_html__( 'Important', 'acf-copilot' ) . '</strong>',
				'<strong>' . esc_html__( 'Save', 'acf-copilot' ) . '</strong>'
			);
			?>
		</p>

		<form method="post" action="<?php echo esc_url( admin_url( 'options.php' ) ); ?>">
			<div id="acfc-output" class="notice is-dismissible acfc-output"></div>
			<?php settings_errors( 'acfc_settings_errors' ); ?>
			<?php wp_nonce_field( 'acfc_settings_nonce', 'acfc_wpnonce' ); ?>
			<?php
				settings_fields( ACFC_SETTINGS_SLUG );
				do_settings_sections( ACFC_SETTINGS_SLUG );
			?>
			<p class="submit button-group">
				<button
					type="submit"
					class="button button-primary"
					id="acfc-save-settings"
					name="acfc-save-settings"
				>
					<?php echo esc_html__( 'Save', 'acf-copilot' ); ?>
				</button>
				<button
					type="button"
					class="button"
					id="acfc-reset-settings"
					name="acfc-reset-settings"
				>
					<?php echo esc_html__( 'Reset', 'acf-copilot' ); ?>
				</button>
			</p>
		</form>

		<br clear="all" />

		<hr />

		<div class="acfc-support-credits">
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %1$s is replaced with "Support Forum" */
						__( 'If something is unclear, please open a ticket on the official plugin %1$s. All tickets will be addressed within a couple of working days.', 'acf-copilot' ),
						json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true )
					),
					'<a href="' . esc_url( ACFC_PLUGIN_WPORG_SUPPORT ) . '" target="_blank">' . esc_html__( 'Support Forum', 'acf-copilot' ) . '</a>'
				);
				?>
			</p>
			<p>
				<strong><?php echo esc_html__( 'Please rate us', 'acf-copilot' ); ?></strong>
				<a href="<?php echo esc_url( ACFC_PLUGIN_WPORG_RATE ); ?>" target="_blank">
					<img src="<?php echo esc_url( ACFC_PLUGIN_DIR_URL ); ?>assets/dist/img/rate.png" alt="Rate us @ WordPress.org" />
				</a>
			</p>
			<p>
				<strong><?php echo esc_html__( 'Having issues?', 'acf-copilot' ); ?></strong>
				<a href="<?php echo esc_url( ACFC_PLUGIN_WPORG_SUPPORT ); ?>" target="_blank">
					<?php echo esc_html__( 'Create a Support Ticket', 'acf-copilot' ); ?>
				</a>
			</p>
			<p>
				<strong><?php echo esc_html__( 'Developed by', 'acf-copilot' ); ?></strong>
				<a href="https://krasenslavov.com/" target="_blank">
					<?php echo esc_html__( 'Krasen Slavov @ Developry', 'acf-copilot' ); ?>
				</a>
			</p>
		</div>

		<hr />

		<p>
			<?php
			printf(
				wp_kses(
					/* translators: %1$s is replaced with "Ctrl" */
					/* translators: %2$s is replaced with "Shift" */
					/* translators: %3$s is replaced with "Cmd" */
					__( '• Use the %1$s, %2$s, or %3$s keys to select multiple supported types or user access roles.', 'acf-copilot' ),
					json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true )
				),
				'<code>' . esc_html__( 'Ctrl', 'acf-copilot' ) . '</code>',
				'<code>' . esc_html__( 'Shift', 'acf-copilot' ) . '</code>',
				'<code>' . esc_html__( 'Cmd', 'acf-copilot' ) . '</code>'
			);
			?>
		</p>
	</div>
</div>
