<?php
/**
 * Instagram settings page
 *
 * Based on `Instagram Widget by WPZOOM` plugin (http://www.wpzoom.com/plugins/instagram-widget/)
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @author    WPZOOM (http://www.wpzoom.com/)
 * @copyright Copyright (C) 2008-2017 WPZOOM (http://www.wpzoom.com/)
 * @link      http://www.wpzoom.com/plugins/instagram-widget/
 * @link      https://wordpress.org/plugins/instagram-widget-by-wpzoom/
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since     1.0.0
 *
 * This file is a fork and may contain modifications of the original code
 */

class Nevillex_Instagram_Settings {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'settings_init' ) );

		add_filter( 'plugin_action_links', array( $this, 'add_action_links' ), 10, 2 );

		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );
	}

	function add_action_links( $links, $file ) {
	if ( $file != plugin_basename( dirname( __FILE__ ) . '/neville-extensions.php' ) ) {
		return $links;
	}

	$settings_link = sprintf(
		'<a href="%1$s">%2$s</a>',
		menu_page_url( 'nevillex-instagram-widget', false ),
		esc_html__( 'Settings', 'neville-extensions' )
	);

		array_unshift( $links, $settings_link );

		return $links;
	}

	public function add_admin_menu() {
		add_options_page(
			'Instagram Settings',
			'Instagram Settings',
			'manage_options',
			'nevillex-instagram-settings',
			array( $this, 'settings_page' )
		);
	}

	public function settings_init() {
		register_setting(
			'nevillex-instagram-settings-group',
			'nevillex-instagram-settings',
			array( $this, 'sanitize' )
		);

		add_settings_section(
			'nevillex-instagram-settings-general',
			null,
			'__return_false',
			'nevillex-instagram-settings-group'
		);

		add_settings_field(
			'nevillex-instagram-widget-access-token',
			__( 'Access Token', 'neville-extensions' ),
			array( $this, 'settings_field_access_token' ),
			'nevillex-instagram-settings-group',
			'nevillex-instagram-settings-general'
		);
	}

	public function settings_field_access_token() {
		$settings = get_option( 'nevillex-instagram-settings' );
		?>
		<input class="regular-text code" id="nevillex-instagram-settings_access-token" name="nevillex-instagram-settings[access-token]" value="<?php echo esc_attr( $settings['access-token'] ) ?>" type="text">
		<p class="description">
			<?php
			__( 'Access Token is used as key to access your photos from Instagram so they can be displayed.', 'neville-extensions' );
			?>
		</p>
		<?php
	}

	public function settings_page() {
		$oauth_url = 'https://instagram.com/oauth/authorize/?client_id=6a3c2528e9c240d798ed8ac79f435375&response_type=token&redirect_uri=http://www.acosmin.com/instagram/';
		$oauth_url .= '?auth_site=' . base64_encode( esc_url( admin_url( 'options-general.php?page=nevillex-instagram-settings' ) ) );
		?>

		<div class="wrap">

			<h1><?php _e( 'Instagram Settings', 'neville-extensions' ); ?></h1>


			<div class="nevillex-instagram-widget">

				<h2><?php _e( 'Connect with Instagram', 'neville-extensions' ); ?></h2>

				<p><?php _e( 'To get started click the button below. You’ll be prompted to authorize ACOSMIN to access your Instagram photos.', 'neville-extensions' ); ?></p>

				<p class="description"><?php _e( 'Due to recent Instagram API changes it is no longer possible to display photos from a different Instagram account then yours. The section/widget will automatically display the latest photos of the account which was authorized on this page.', 'neville-extensions' ); ?></p>

				<br />

				<a class="button button-connect" href="<?php echo esc_url( $oauth_url ); ?>">
					<?php if ( ! Nevillex_API_Instagram::getInstance()->is_configured() ) : ?>
					<span><?php _e( 'Connect with Instagram', 'neville-extensions' ); ?></span>
					<?php else: ?>
					<span class="nevillex-instagarm-connected"><?php _e( 'Re-connect with Instagram', 'neville-extensions' ); ?></span>
					<?php endif; ?>
				</a>

				<form action="options.php" method="post">

				<?php
					settings_fields( 'nevillex-instagram-settings-group' );
					do_settings_sections( 'nevillex-instagram-settings-group' );
					submit_button();
				?>

				</form>

			</div>

		</div>
		<?php
	}

	public function scripts( $hook ) {
		if ( $hook != 'settings_page_nevillex-instagram-settings' ) {
			return;
		}

		wp_enqueue_script( 'nevillex-instagram-admin', NEVILLEX_PLUGIN_URL . 'assets/js/instagram.js', array( 'jquery' ), '20151012' );
		wp_localize_script( 'nevillex-instagram-admin', 'nevillex_instagram_admin', array(
			'i18n_connect_confirm' => __( "You are already connected to Instagram.\r\n\r\nDo you want to connect again?", 'neville-extensions' ),
		) );
	}

	public function sanitize( $input ) {
		$result = array();
		$result[ 'access-token' ] = sanitize_text_field( $input[ 'access-token' ] );
		$validation_result = Nevillex_API_Instagram::is_access_token_valid( $result[ 'access-token' ] );

		if ( $validation_result !== true ) {
			$access_token_error_message = __( 'Provided access token is has been rejected by Instagram Api. Please check your input data.', 'neville-extensions' );

			if ( is_wp_error( $validation_result ) ) {
				$access_token_error_message = $validation_result->get_error_message();
			}

			if ( $validation_result !== true ) {
				add_settings_error(
					'nevillex-instagram-widget-access-token',
					esc_attr( 'nevillex-instagram-widget-access-token-invalid' ),
					$access_token_error_message,
					'error'
				);
			}

			$result['access-token'] = '';
		}

		Nevillex_API_Instagram::reset_cache();

		return $result;
	}
}

new Nevillex_Instagram_Settings();
