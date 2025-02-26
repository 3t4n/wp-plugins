<?php
/**
 * The Static Maps Editor - missing ToS settings partial
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

			<div>
				<?php
				settings_fields( 'static_maps_editor-settings-privacy' );
				?>
				<h1 style="padding:5% 0; 3%"><?php esc_html_e( 'Step 1: Get API Key', 'static-maps-editor' ); ?></h1>
				<p><input type="checkbox" disabled <?php checked( 1, get_option( 'static_maps_editor_privacy_policy_accepted', false ) ); ?>>
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
				<input type="button" class="button button-primary" value="<?php esc_attr_e( 'Get API Key', 'static-maps-editor' ); ?>" disabled />
				<svg style="vertical-align:middle;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" width="50" height="30" viewBox="0, 0, 193, 202"><path d="M1,135.389 C2.942,127.09 19.452,118.303 29.649,120.743 C35.476,122.208 42.76,151.987 48.101,153.451 C48.101,153.451 48.101,153.451 48.101,153.451 C48.101,153.451 48.101,153.451 48.101,153.451 C52.402,151.53 63.388,132.524 80.635,106.586 C98.443,79.805 122.785,45.715 144.246,20.667 C144.246,20.667 144.246,20.667 144.246,20.667 C144.246,20.667 144.246,20.667 144.246,20.667 C144.246,20.667 144.246,20.667 144.246,20.667 C145.217,19.202 146.674,17.738 146.674,16.761 C150.073,12.368 162.213,4.557 170.468,2.604 C177.751,1.14 189.891,-0.325 191.833,3.092 C193.775,6.51 178.237,26.037 172.41,31.895 C153.958,53.863 87.919,141.735 77.722,162.239 C74.323,166.144 62.669,185.183 52.472,197.876 C40.332,203.734 26.25,199.828 21.88,198.364 C14.111,187.624 1,150.522 1,135.389 z" fill="#1AB73A"/></svg>
				<?php
				printf(
					/* translators: %s: the API Key. */
					esc_html__( 'Your individual API Key: %s', 'static-maps-editor' ),
					esc_html( get_option( 'static_maps_editor_uid', false ) )
				);
				?>
			</div>
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
	Printmaps.__static_maps_editor_check_static_maps_editor_tos_accepted = () => {
		jQuery('#submit_tos').prop('disabled', !jQuery('#static_maps_editor_tos_accepted').prop('checked'));
	}

	if (jQuery('body').height() > jQuery('#static_maps_editor_editor_iframe').height()) {
		jQuery('#static_maps_editor_editor_iframe').css('min-height', parseInt(jQuery('body').height()*0.7, 10)+'px');
	}
	Printmaps.__static_maps_editor_check_static_maps_editor_tos_accepted();
</script>
