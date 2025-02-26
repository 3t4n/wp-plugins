<?php
/**
 * Add/Edit Sendy Credential.
 *
 * @package Newsletter using Sendy
 */

defined( 'ABSPATH' ) || exit;
global $wpdb;

$cws_setting = get_option( 'ajax_sendy_setting' );
?>
<div class="wrap">				
	<form method="POST" id="cws-api-data" action="options.php">
		<?php
			settings_fields( 'ajax-sendy-settings' );
		?>
		<h2><?php esc_html_e( 'Sendy Settings', 'ajax-sendy-newsletter' ); ?></h2>
		<p><?php echo __( 'Use <strong>[ajax_sendy_newsletter_form]</strong> shortcode to display newsletter form.', 'ajax-sendy-newsletter' ); ?></p>
		<table class="form-table cws-setting-box"> 
			<tbody>
				<tr>
					<th scope="row" style="width: 100px">
						<label> <?php esc_html_e( 'Sendy URL:', 'ajax-sendy-newsletter' ); ?> </label>
					</th>
					<td>
						<input type="text" name="ajax_sendy_setting[sendy_url]" id="cws-source" value="<?php echo ( isset( $cws_setting['sendy_url'] ) && ! empty( $cws_setting['sendy_url'] ) ) ? esc_url( $cws_setting['sendy_url'] ) : ''; ?>" style="width:45%"/>
					</td>
				</tr>
				<tr>
					<th scope="row" style="width: 100px">
						<label>
							<?php esc_html_e( 'List ID:', 'ajax-sendy-newsletter' ); ?>
						</label>
					</th>
					<td>
						<input type="text" name="ajax_sendy_setting[list_id]" id="cws-source" value="<?php echo ( isset( $cws_setting['list_id'] ) && ! empty( $cws_setting['list_id'] ) ) ? esc_html( $cws_setting['list_id'] ) : ''; ?>" style="width:45%"/>
					</td>
				</tr>
				<tr>
					<th scope="row" style="width: 100px">
						<label>
							<?php esc_html_e( 'API Key:', 'ajax-sendy-newsletter' ); ?>
						</label>
					</th>
					<td>
						<input type="text" name="ajax_sendy_setting[api_key]" id="cws-source" value="<?php echo ( isset( $cws_setting['api_key'] ) && ! empty( $cws_setting['api_key'] ) ) ? esc_html( $cws_setting['api_key'] ) : ''; ?>" style="width:45%"/>
					</td>
				</tr>
				<tr>
					<td colspan="3" style="padding-left: 0">
						<p class="submit"><input type="submit" class="button-primary margin_button" name="cws_api_save" value="Save Settings" /></p>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
		if ( true === isset( $_GET['settings-updated'] ) ) {
			echo '<div style="color: green; border: 1px solid; width: auto; display: inline-block; padding: 10px 120px; font-weight: 600;">Settings successfully saved.</div>';
		}
		?>
	</form>
</div>
