<?php
/**
 * The Static Maps Editor - missing privacy policy settings partial
 *
 * @since   1.0.0
 * @package Static_Maps_Editor
 * @author  Printmaps
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

?>

<div style="width:80%; margin:5% auto;">
	<h1><?php esc_html_e( 'Configure Static Maps Editor', 'static-maps-editor' ); ?></h1>
	<div id="static_maps_editor_editor_iframe" style="outline: 3px dashed #c3c4c7;padding: 1% 0 3% 0;">
		<div style="max-width: 600px;margin:auto;">
			<form name="static_maps_editor_settings" method="POST" action="options.php">
				<div>
					<?php
					settings_fields( 'static_maps_editor-settings-privacy' );
					?>
					<h1 style="padding:5% 0; 3%"><?php esc_html_e( 'Step 1: Get API Key', 'static-maps-editor' ); ?></h1>
					<p><input name="static_maps_editor_privacy_policy_accepted" type="checkbox" id="static_maps_editor_privacy_policy_accepted" onchange="Printmaps.__static_maps_editor_check_static_maps_editor_privacy_policy_accepted()" value="1" <?php checked( 1, get_option( 'static_maps_editor_privacy_policy_accepted', false ) ); ?>>
					<label for="static_maps_editor_privacy_policy_accepted"><i>
					<?php
					printf(
						/* translators: %s here is the i18n-ed privacy policy url */
						wp_kses( __( 'I agree to the <a href="%s" target="_blank">privacy policy</a>', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() ),
						esc_url( __( 'https://www.printmaps.net/data-protection-policy/#plugin', 'static-maps-editor' ) )
					);
					?>
					</i></label></p>
					<ul style="list-style:disc;margin-left:3em;">
						<li>
						<?php
						printf(
							/* translators: %s here is the url of the Blog where the static maps editor plug-in is installed*/
							wp_kses( __( 'The site address <strong>%s</strong> will be stored together with the API Key by <a href="https://www.printmaps.net/" target="_blank">Printmaps.net</a>.', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() ),
							esc_html( wp_parse_url( get_bloginfo( 'url' ), PHP_URL_HOST ) )
						);
						?>
						<br>
						<?php
						esc_html_e( 'This is a technical requirement for the Static Maps Editor to function.', 'static-maps-editor' );
						?>
						</li>
						<li><i>
						<?php
						$address = isset( $_SERVER['REMOTE_ADDR'] )
							? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) )
							: '0.0.0.0';
						$address = preg_replace( '/\.[^.]+$/', '.xxx', $address );
						printf(
							/* translators: %s here is the anonymized IP address of the WP host*/
							wp_kses( __( 'My current IP address <strong>%s</strong> will be transferred, but anonymized (xxx) before it is stored for 30 days in a log file.', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() ),
							esc_html( $address )
						);
						?>
						</i></li>
					</ul>
					<input type="submit" name="submit_privacy" id="submit_privacy" class="button button-primary" value="<?php esc_attr_e( 'Get API Key', 'static-maps-editor' ); ?>" disabled />
					<p>
					<?php
					if ( true === (bool) get_option( 'static_maps_editor_uid_fetch_error', false ) ) {
						esc_html_e( 'Error generating API Key. Please try again', 'static-maps-editor' );
					?>
					<br>
					<?php
						echo esc_html( get_option( 'static_maps_editor_uid_fetch_error_messages', false ) );
						delete_option( 'static_maps_editor_uid_fetch_error' );
						delete_option( 'static_maps_editor_uid_fetch_error_messages' );
					}
					?>
					</p>
				</div>
			</form>
			<form name="static_maps_editor_settings" method="POST" action="options.php" style="opacity:<?php echo esc_attr( ( (bool) get_option( 'static_maps_editor_privacy_policy_accepted', false ) ? 1 : 0.4 ) ); ?>">
				<div>
					<?php
					settings_fields( 'static_maps_editor-settings-tos' );
					?>
					<h1 style="padding:5% 0;">
					<?php
					esc_html_e( 'Step 2: Load Static Maps Editor', 'static-maps-editor' );
					?>
					</h1>
					<p>
					<?php
					echo wp_kses( __( 'The Static Maps Editor is an <strong>external application</strong>. It is hosted on <a href="https://www.printmaps.net/" target="_blank">Printmaps.net</a> (you can test drive it there).', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() );
					?>
					</p>
					<p>
					<?php
					esc_html_e( 'When you click the button below it will be loaded into this frame.', 'static-maps-editor' );
					?>
					</p>
					<p>
					<?php
					echo wp_kses( __( 'Static Maps Editor will be able to save the map images you create to the media library of your WordPress installation. <strong>No other data can be read, transferred or altered by the plugin.</strong>', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() );
					?>
					</p>
					<p><input <?php disabled( 0, (int) get_option( 'static_maps_editor_privacy_policy_accepted', false ) ); ?> name="static_maps_editor_tos_accepted" type="checkbox" id="static_maps_editor_tos_accepted" onchange="Printmaps.__static_maps_editor_check_static_maps_editor_tos_accepted()" value="1" <?php checked( 1, get_option( 'static_maps_editor_tos_accepted', false ) ); ?>><label for="static_maps_editor_tos_accepted"><i>
					<?php
					printf(
						/* translators: %s here is the i18n-ed ToS url */
						wp_kses( __( 'I agree to the <a href="%s" target="_blank">terms of use</a>', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() ),
						esc_url( __( 'https://www.printmaps.net/terms-of-use/#plugin', 'static-maps-editor' ) )
					);
					?>
					</i></label></p>
					<input type="submit" name="submit_tos" id="submit_tos" class="button button-primary" value="<?php esc_attr_e( 'Load Static Maps Editor', 'static-maps-editor' ); ?>" <?php disabled( 0, (int) get_option( 'static_maps_editor_privacy_policy_accepted', false ) ); ?>/>
					<p style="float:right;margin:0;text-align:right;">Powered by <img style="vertical-align:middle;width:50%;" src="<?php echo esc_url( plugin_dir_url( __DIR__ ) . 'images/printmaps-logo.svg' ); ?>"></p>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	var Printmaps = window.Printmaps || {};
	Printmaps.__static_maps_editor_check_static_maps_editor_privacy_policy_accepted = () => {
		jQuery('#submit_privacy').prop('disabled', !jQuery('#static_maps_editor_privacy_policy_accepted').prop('checked'));
	}

	Printmaps.__static_maps_editor_check_static_maps_editor_tos_accepted = () => {
		jQuery('#submit_tos').prop('disabled', !jQuery('#static_maps_editor_tos_accepted').prop('checked'));
	}

	if (jQuery('body').height() > jQuery('#static_maps_editor_editor_iframe').height()) {
		jQuery('#static_maps_editor_editor_iframe').css('min-height', parseInt(jQuery('body').height()*0.7, 10)+'px');
	}
	Printmaps.__static_maps_editor_check_static_maps_editor_privacy_policy_accepted();
	Printmaps.__static_maps_editor_check_static_maps_editor_tos_accepted();
</script>
