<?php
if ( ! function_exists( 'cisiw_options_page' ) ) :
	function cisiw_options_page() {

		$options = get_option( 'cisiw_settings' );
		$options = false !== $options ? $options : array();

		$defaults = array(
			'f_color'            => '#000000',
			'f_background_color' => 'transparent',
			'f_size'             => 17,
			'f_background_size'  => 30,
			'f_border_radius'    => 50,
			'f_border_color'     => '',
			'f_border_width'     => 0,
			'f_opacity'          => 1,
		);

		$options = wp_parse_args( $options, $defaults );

		?>
		<div class="wrap">
			<h2><?php esc_html_e( 'Socials Ignited', 'socials-ignited' ); ?></h2>

			<p>
			<?php
			/* translators: %s is a URL. */
			echo wp_kses( sprintf( __( 'Brought to you by the fine folks of <a href="%s">CSSIgniter</a>.', 'socials-ignited' ), 'https://www.cssigniter.com' ), array( 'a' => array( 'href' => array() ) ) );
			?>
			</p>

			<form method="post" action="options.php">
				<?php settings_fields( 'cisiw_settings_group' ); ?>

				<h3><?php esc_html_e( 'Default font widget settings', 'socials-ignited' ); ?></h3>
				<table class="form-table" id="cisiw-fontwidget-options">
					<tbody>
						<tr>
							<th scope="row"><label for="cisiw_settings[f_color]"><?php esc_html_e( 'Icon Color:', 'socials-ignited' ); ?></label></th>
							<td>
								<input id="cisiw_settings[f_color]" type="text" name="cisiw_settings[f_color]" value="<?php echo esc_attr( $options['f_color'] ); ?>" class="cisiw-colorpckr" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="cisiw_settings[f_background_color]"><?php esc_html_e( 'Icon Background Color:', 'socials-ignited' ); ?></label></th>
							<td>
								<input id="cisiw_settings[f_background_color]" type="text" name="cisiw_settings[f_background_color]" value="<?php echo esc_attr( $options['f_background_color'] ); ?>" class="cisiw-colorpckr" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="cisiw_settings[f_size]"><?php esc_html_e( 'Icon Size (px):', 'socials-ignited' ); ?></label></th>
							<td>
								<input id="cisiw_settings[f_size]" type="number" name="cisiw_settings[f_size]" value="<?php echo esc_attr( $options['f_size'] ); ?>" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="cisiw_settings[f_background_size]"><?php esc_html_e( 'Background Size (px):', 'socials-ignited' ); ?></label></th>
							<td>
								<input id="cisiw_settings[f_background_size]" type="number" name="cisiw_settings[f_background_size]" value="<?php echo esc_attr( $options['f_background_size'] ); ?>" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="cisiw_settings[f_border_radius]"><?php esc_html_e( 'Border Radius (px):', 'socials-ignited' ); ?></label></th>
							<td>
								<input id="cisiw_settings[f_border_radius]" type="number" name="cisiw_settings[f_border_radius]" value="<?php echo esc_attr( $options['f_border_radius'] ); ?>" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="cisiw_settings[f_border_color]"><?php esc_html_e( 'Border Color:', 'socials-ignited' ); ?></label></th>
							<td>
								<input id="cisiw_settings[f_border_color]" type="text" name="cisiw_settings[f_border_color]" value="<?php echo esc_attr( $options['f_border_color'] ); ?>" class="cisiw-colorpckr" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="cisiw_settings[f_border_width]"><?php esc_html_e( 'Border Width (px):', 'socials-ignited' ); ?></label></th>
							<td>
								<input id="cisiw_settings[f_border_width]" type="number" min="0" name="cisiw_settings[f_border_width]" value="<?php echo esc_attr( $options['f_border_width'] ); ?>" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="cisiw_settings[f_opacity]"><?php esc_html_e( 'Opacity (0.1 - 1):', 'socials-ignited' ); ?></label></th>
							<td>
								<input id="cisiw_settings[f_opacity]" type="number" min="0.1" max="1" step="0.1" name="cisiw_settings[f_opacity]" value="<?php echo esc_attr( $options['f_opacity'] ); ?>" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<p class="submit">
									<input type="submit" class="button-primary" value="<?php esc_html_e( 'Save Options', 'socials-ignited' ); ?>" />
								</p>
							</td>
						</tr>
					</tbody>
				</table>
				<p></p>
			</form>
		</div>
		<?php
	}
endif;

add_action( 'admin_menu', 'cisiw_add_options_link' );
if ( ! function_exists( 'cisiw_add_options_link' ) ) :
	function cisiw_add_options_link() {
		add_options_page( esc_html__( 'Socials Ignited Widget Options', 'socials-ignited' ), esc_html_x( 'Socials Ignited', 'plugin name', 'socials-ignited' ), 'manage_options', 'cisiw-options', 'cisiw_options_page' );
	}
endif;

add_action( 'admin_init', 'cisiw_register_settings' );
if ( ! function_exists( 'cisiw_register_settings' ) ) :
	function cisiw_register_settings() {
		register_setting( 'cisiw_settings_group', 'cisiw_settings', 'cisiw_validate_settings' );
	}
endif;

if ( ! function_exists( 'cisiw_validate_settings' ) ) :
	function cisiw_validate_settings( $input ) {
		if ( isset( $input['f_color'] ) ) {
			$input['f_color'] = cisiw_sanitize_hex_color( $input['f_color'] );
		}
		if ( isset( $input['f_background_color'] ) ) {
			$input['f_background_color'] = cisiw_sanitize_hex_color( $input['f_background_color'] );
		}
		if ( isset( $input['f_size'] ) ) {
			$input['f_size'] = intval( $input['f_size'] );
		}
		if ( isset( $input['f_background_size'] ) ) {
			$input['f_background_size'] = intval( $input['f_background_size'] );
		}
		if ( isset( $input['f_border_radius'] ) ) {
			$input['f_border_radius'] = intval( $input['f_border_radius'] );
		}
		if ( isset( $input['f_border_color'] ) ) {
			$input['f_border_color'] = cisiw_sanitize_hex_color( $input['f_border_color'] );
		}
		if ( isset( $input['f_border_width'] ) ) {
			$input['f_border_width'] = intval( $input['f_border_width'] );
		}
		if ( isset( $input['f_opacity'] ) ) {
			$val = floatval( $input['f_opacity'] );
			if ( $val < 0.1 ) {
				$val = 0.1;
			}
			if ( $val > 1 ) {
				$val = 1;
			}
			$input['f_opacity'] = $val;
		}

		return $input;
	}
endif;

add_action( 'admin_enqueue_scripts', 'cisiw_enqueue_admin_scripts' );
if ( ! function_exists( 'cisiw_enqueue_admin_scripts' ) ) :
	function cisiw_enqueue_admin_scripts() {
		global $pagenow;
		// phpcs:ignore WordPress.Security.NonceVerification
		if ( 'options-general.php' === $pagenow && isset( $_GET['page'] ) && 'cisiw-options' === $_GET['page'] ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'cisiw-admin', CISIW_PLUGIN_URL . 'includes/assets/js/admin/admin.js', array( 'jquery', 'wp-color-picker' ), CISIW_VERSION, true );
		}

	}
endif;
