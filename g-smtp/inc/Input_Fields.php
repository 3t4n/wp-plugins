<?php

namespace G_Smtp;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Input_Fields
 */
class Input_Fields {

	/**
	 * Renders input html
	 *
	 * @param array $args
	 *
	 * @return void
	 */
	public static function make_input( $args = [] ) {
		$label = isset( $args['label'] ) ? $args['label'] : '';
		$type = isset( $args['type'] ) ? $args['type'] : 'text';
		$field_name = $args['field_name'];
		$value = isset( $args['value'] ) ? $args['value'] : '';
		$atts = isset( $args['atts'] ) ? array_filter( (array) $args['atts'] ) : [];
		$options = isset( $args['options'] ) ? $args['options'] : [];
		$options = is_callable( $options ) ? call_user_func( $options ) : $options;
		$fields = isset( $args['fields'] ) ? $args['fields'] : [];
		$direction = isset( $args['direction'] ) ? $args['direction'] : 'row';
		$atts = self::get_input_atts( $args );

		ob_start();

		switch ( $type ) {
			case 'input':
			case 'text':
				?>
				<input type="text" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'date':
				?>
				<input type="date" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'time':
				?>
				<input type="time" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'datetime':
				?>
				<input type="text" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'email':
				?>
				<input type="email" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'tel':
				?>
				<input type="tel" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'url':
				?>
				<input type="url" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'number':
				?>
				<input type="number" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'checkbox':
				if ( empty( $options ) ) :
					?>
					<input type="checkbox" <?php checked( $value ); ?> value="true" <?php self::print_attributes( $atts ); ?> />
				<?php else : ?>
					<fieldset>
						<?php
						foreach ( $options as $key => $val ) :
							if ( ! is_array( $value ) ) {
								$value = [ $value ];
							}

							$field_id = sprintf( '%s_%s', $field_name, $key );
							$atts['name'] = $field_name . '[]';
							$atts['id'] = $field_id;
							?>
							<input type="checkbox" <?php checked( in_array( (string) $key, $value, true ) ); ?> value="<?php echo esc_attr( $key ); ?>" <?php self::print_attributes( $atts ); ?> />
							<label for="<?php echo esc_attr( $field_id ); ?>"><?php echo esc_attr( $val ); ?></label>
							<br />
						<?php endforeach; ?>
					</fieldset>
					<?php
				endif;
				break;

			case 'radio':
				?>
				<fieldset>
					<?php
					$i = 0;
					foreach ( $options as $key => $val ) :
						$field_id = sprintf( '%s_%s', $field_name, $i );
						$atts['id'] = $field_id;
						?>
						<input type="radio" <?php checked( $value === $key ); ?> value="<?php echo esc_attr( $key ); ?>" <?php self::print_attributes( $atts ); ?> />
						<label for="<?php echo esc_attr( $field_id ); ?>"><?php echo esc_attr( $val ); ?></label>
						<br />
						<?php
						$i++;
					endforeach;
					?>
				</fieldset>
				<?php
				break;

			case 'select':
				?>
				<select <?php self::print_attributes( $atts ); ?>>
					<option value=""><?php esc_html_e( 'Choose an option', 'g-smtp' ); ?></option>
					<?php foreach ( $options as $key => $val ) : ?>
						<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $value, $key ); ?>><?php echo esc_html( $val ); ?></option>
					<?php endforeach; ?>
				</select>
				<?php
				break;

			case 'textarea':
				?>
				<textarea <?php self::print_attributes( $atts ); ?>><?php echo esc_html( $value ); ?></textarea>
				<?php

				break;

			case 'repeatable':
				unset( $atts['name'] );
				$value = is_array( $value ) && ! empty( $value ) ? $value : [ 0 ];
				$atts['class'] .= ' form-table';
				?>
				<table <?php self::print_attributes( $atts ); ?>>
					<?php if ( $direction !== 'column' ) : ?>
						<thead>
							<?php foreach ( $fields as $name => $field ) : ?>
								<th>
									<?php echo esc_attr( $field['label'] ); ?>
								</th>
							<?php endforeach; ?>
						</thead>
					<?php endif; ?>
					<tbody>
						<?php self::get_repeatable_rows( $field_name, $fields, $direction, $value ); ?>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<button type="button" class="button-secondary g-smtp-input-admin-repeatable-add">
									<?php esc_html_e( 'Add row', 'g-smtp' ); ?>
								</button>
							</td>
						</tr>
					</tfoot>
				</table>
				<script type="text/template" class="g-smtp-input-admin-repeatable-template">
					<?php self::get_repeatable_rows( $field_name, $fields, $direction ); ?>
				</script>
				<?php
				break;

			case 'media':
				$multiple = isset( $args['multiple'] );
				$value = is_array( $value ) ? $value : [ $value ];
				$atts['name'] .= $multiple ? '[]' : '';
				$mime_types = isset( $args['mime_types'] ) ? implode( ',', $args['mime_types'] ) : '';

				?>
				<table class="g-smtp-input-admin-media-wrapper" data-multiple="<?php echo esc_attr( $multiple ); ?>" data-mime-types="<?php echo esc_attr( $mime_types ); ?>">
					<tr>
						<td>
							<button type="button" class="button-secondary g-smtp-input-admin-media-add">
								<?php esc_html_e( 'Add media', 'g-smtp' ); ?>
							</button>
						</td>
						<td>
							<?php
							foreach ( $value as $val ) :

								$classes = [ 'g-smtp-input-admin-media-preview' ];

								$preview_url = '';

								if ( $val ) {
									if ( get_post( $val ) !== null ) {
										$classes[] = 'has-file';

										$mime_type = get_post_mime_type( $val );

										if ( $mime_type && preg_match( '/image/', $mime_type ) ) {
											$preview_url = wp_get_attachment_image_url( $val, 'medium' );
										} else {
											$preview_url = wp_mime_type_icon( $val );
											$classes[] = 'is-icon';
										}
									} else {
										$val = '';
									}
								}

								?>
								<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
								<?php

								if ( $preview_url ) :
									?>
									<img src="<?php echo esc_url( $preview_url ); ?>">
								<?php else : ?>
									<img />
								<?php endif; ?>
									<span class="g-smtp-input-admin-media-file-name">
										<?php echo $val ? esc_html( basename( get_attached_file( $val ) ) ) : ''; ?>
									</span>
									<button type="button" class="button-secondary g-smtp-input-admin-media-remove">
										<i class="far fa-times"></i>
									</button>
									<input type="hidden" value="<?php echo esc_attr( $val ); ?>" <?php self::print_attributes( $atts ); ?>>
								</div>
							<?php endforeach; ?>
						</td>
					</tr>
				</table>
				<?php
				break;
			case 'code':
				$ace_mode = isset( $args['ace_mode'] ) ? $args['ace_mode'] : '';
				$min_height = isset( $args['min_height'] ) ? $args['min_height'] : 400;
				?>
				<textarea style="display: none;" name="<?php echo esc_attr( $field_name ); ?>"><?php echo wp_kses_post( htmlentities( stripslashes( $value ) ) ); ?></textarea>
				<div style="width: 100%; min-height: <?php echo esc_attr( $min_height ); ?>px;" id="gt-editor" class="gt-editor" cols="70" rows="30" data-mode="<?php echo esc_attr( $ace_mode ); ?>"><?php echo wp_kses_post( htmlentities( stripslashes( $value ) ) ); ?></div>
				<?php
				break;
			case 'editor':
				$editor_id = str_replace(
					[ '[', ']' ],
					'_',
					$field_name
				);

				if ( ! empty( $options ) ) {
					$atts['data-settings'] = rawurlencode( wp_json_encode( $options ) );
				}

				$atts['class'] .= ' init';
				$atts['id'] = $editor_id;

				?>
				<textarea <?php self::print_attributes( $atts ); ?> name="<?php echo esc_attr( $field_name ); ?>"><?php echo wp_kses_post( $value ); ?></textarea>
				<?php
				break;

			case 'hidden':
				?>
				<input type="hidden" value="<?php echo esc_attr( $value ); ?>" <?php self::print_attributes( $atts ); ?> />
				<?php
				break;

			case 'page_select':
				$page_args = [
					'post_type'        => 'page',
					'post_status'      => [ 'private', 'publish' ],
					'suppress_filters' => false,
				];

				$pages = get_pages( $page_args );

				$pages_array = [];

				foreach ( $pages as $page ) {
					$pages_array[ $page->ID ] = $page->post_title;
				}

				if ( function_exists( 'pll_get_post' ) ) {
					$value = pll_get_post( $value );
				}
				?>
				<select <?php self::print_attributes( $atts ); ?>>
					<option value=""><?php esc_html_e( 'Choose an option', 'g-smtp' ); ?></option>
				<?php foreach ( $pages_array as $key => $val ) : ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $value, $key ); ?>><?php echo esc_html( $val ); ?></option>
				<?php endforeach; ?>
				</select>
				<?php
				break;
			case 'smtp_connection_test':
				$smtp_connection_test = Mailer::test_connection();

				if ( is_wp_error( $smtp_connection_test ) ) :
					?>
					<p class="g-smtp-connection-test g-smtp-error">
						<i class="far fa-times"></i> <?php echo esc_html( $smtp_connection_test->get_error_message() ); ?>
					</p>
					<?php
				elseif ( $smtp_connection_test ) :
					?>
					<p class="g-smtp-connection-test g-smtp-success">
						<i class="far fa-check"></i> <?php esc_html_e( 'SMTP connection successful.', 'g-smtp' ); ?>
					</p>
					<?php
				endif;

				break;

			case 'smtp_test_email':
				$current_user = wp_get_current_user();

				$user_email = is_user_logged_in() ? $current_user->user_email : '';

				?>
				<div>
					<input size="32" type="email" placeholder="<?php echo esc_attr( $user_email ); ?>" class="g-smtp-test-email-input" />
					<a href="javascript:void(0);" class="button button-default g-smtp-test-email-btn" data-security="<?php echo esc_attr( wp_create_nonce( Options::SEND_TEST_EMAIL_NONCE ) ); ?>">
						<?php esc_html_e( 'Send test e-mail', 'g-smtp' ); ?>
					</a>
				</div>
				<?php

				break;

			case 'generate_smtp_config':
				?>
				<div class="g-smtp-config-generator">
					<div class="g-smtp-config-fields">
						<div class="g-smtp-config-field">
							<div class="howto">
								<?php esc_html_e( 'Enter your credentials here to generate a config which you can paste into wp-config.php. This is done solely on the client side and no credentials are sent to the server at this stage.', 'g-smtp' ); ?>
							</div>
						</div>
						<div class="g-smtp-config-field">
							<label for="g-smtp-config-field-smtp-host">
								<?php esc_html_e( 'Host (mandatory)', 'g-smtp' ); ?>
							</label>
							<input id="g-smtp-config-field-smtp-host" type="text" name="smtp_host" placeholder="127.0.0.1" />
							<div class="howto">
								<?php esc_html_e( 'Here you enter which domain/IP-address where the SMTP-service is hosted.', 'g-smtp' ); ?>
							</div>
						</div>
						<div class="g-smtp-config-field">
							<label for="g-smtp-config-field-smtp-port">
								<?php esc_html_e( 'Port (mandatory)', 'g-smtp' ); ?>
							</label>
							<input id="g-smtp-config-field-smtp-port" type="number" step="1" min="0" max="65535" name="smtp_port" placeholder="25" />
							<div class="howto">
								<?php esc_html_e( 'Here you enter what port the SMTP-service is hosted on. Generally the ports 25 (non encrypted), 465 (SSL) and 587 (TLS) are used.', 'g-smtp' ); ?>
							</div>
						</div>
						<div class="g-smtp-config-field">
							<label for="g-smtp-config-field-smtp-encryption">
								<?php esc_html_e( 'Encryption (optional)', 'g-smtp' ); ?>
							</label>
							<input id="g-smtp-config-field-smtp-encryption" type="text" name="smtp_encryption" placeholder="tls" />
							<div class="howto">
								<?php esc_html_e( 'This defines if an encrypted connection should be used when connecting to the SMTP-service. Normally you should enter "ssl" if the port is 465, "tls" if the port is 587 and leave it empty if the port is 25.', 'g-smtp' ); ?>
							</div>
						</div>
						<div class="g-smtp-config-field">
							<label for="g-smtp-config-field-smtp-username">
								<?php esc_html_e( 'Username (optional)', 'g-smtp' ); ?>
							</label>
							<input id="g-smtp-config-field-smtp-username" type="text" name="smtp_username" placeholder="<?php esc_html_e( 'username', 'g-smtp' ); ?>" />
							<div class="howto">
								<?php esc_html_e( 'If the SMTP-service requires authentication then you must enter username and password.', 'g-smtp' ); ?>
							</div>
						</div>
						<div class="g-smtp-config-field">
							<label for="g-smtp-config-field-smtp-password">
								<?php esc_html_e( 'Password (optional)', 'g-smtp' ); ?>
							</label>
							<input id="g-smtp-config-field-smtp-password" type="text" name="smtp_password" placeholder="<?php esc_html_e( 'password', 'g-smtp' ); ?>" />
						</div>
						<div class="g-smtp-config-field">
							<label for="g-smtp-config-field-smtp-from-name">
								<?php esc_html_e( 'From name (optional)', 'g-smtp' ); ?>
							</label>
							<input id="g-smtp-config-field-smtp-from-name" type="text" name="smtp_from_name" placeholder="<?php esc_html_e( 'Sender name', 'g-smtp' ); ?>" />
							<div class="howto">
								<p><?php esc_html_e( 'If you want to override the sender name and e-mail address you can enter these settings.', 'g-smtp' ); ?></p>
								<p><?php esc_html_e( 'This overrides the default settings, if plugins have other settings then those will be used.', 'g-smtp' ); ?></p>
							</div>
						</div>
						<div class="g-smtp-config-field">
							<label for="g-smtp-config-field-smtp-from-address">
								<?php esc_html_e( 'From address (optional)', 'g-smtp' ); ?>
							</label>
							<input id="g-smtp-config-field-smtp-from-address" type="text" name="smtp_from_address" placeholder="<?php esc_html_e( 'sender@sender.com', 'g-smtp' ); ?>" />
						</div>
						<div class="g-smtp-config-field">
							<label>
								<?php esc_html_e( 'Force from (optional)', 'g-smtp' ); ?>
							</label>
							<input type="checkbox" name="smtp_force_from" value="true" />
							<div class="howto">
								<?php esc_html_e( 'If you want name and e-mail address to always be overriden then you can use check the box above.', 'g-smtp' ); ?>
							</div>
						</div>
					</div>
					<div class="g-smtp-code-block-wrapper">
						<h2><?php esc_html_e( 'Copy these settings to your wp-config.php', 'g-smtp' ); ?></h2>
						<div class="g-smtp-code-block-copy-wrapper">
							<span class="g-smtp-code-block-copy" data-success="<?php esc_html_e( 'Copied to clipboard!', 'g-smtp' ); ?>" data-fail="<?php esc_html_e( 'Copy failed.', 'g-smtp' ); ?>">
								<?php esc_html_e( 'Copy', 'g-smtp' ); ?>
							</span>
						</div>
						<pre class="g-smtp-code-block"><?php

						echo '// G-SMTP settings' . PHP_EOL;
						echo 'define( \'G_SMTP_ENABLED\', true );';

						?></pre>
					</div>
				</div>
				<?php

				break;

			default:
				?>
				<div class="error notice">
					Invalid input type
				</div>
				<?php
		}

		$output = ob_get_clean();

		// phpcs:ignore WordPress.Security.EscapeOutput
		echo apply_filters( 'g_smtp_make_input', $output, $args, $atts, $value );
	}

	/**
	 * Sanitize the provided value
	 *
	 * @param array $field_atts
	 * @param array|null $input
	 *
	 * @return mixed
	 */
	public static function sanitize_input( $field_atts, $input ) {
		$field_name = $field_atts['field_name'];
		$isset = isset( $input[ $field_name ] );
		$unsanitized_value = $isset ? $input[ $field_name ] : '';
		$type = $field_atts['type'];

		if ( $type !== 'checkbox' && ! $isset ) {
			return false;
		}

		// Sanitize depending on type
		switch ( $type ) {
			case 'input':
			case 'hidden':
			case 'text':
			case 'date':
			case 'time':
			case 'datetime':
			case 'tel':
			case 'radio':
			case 'select':
				$value = sanitize_text_field( $unsanitized_value );
				break;

			case 'email':
				$value = sanitize_email( $unsanitized_value );
				break;

			case 'url':
				$value = esc_url_raw( $unsanitized_value );
				break;

			case 'number':
				$value = preg_replace( '/[^.0-9,e]/i', '', $unsanitized_value );
				break;

			case 'checkbox':
				if ( $isset && is_array( $unsanitized_value ) ) {
					$value = array_map( 'sanitize_text_field', $unsanitized_value );
				} else {
					$value = $isset;
				}
				break;

			case 'textarea':
				$value = sanitize_textarea_field( $unsanitized_value );
				break;

			case 'repeatable':
				$value = [];
				$unsanitized_value = is_array( $unsanitized_value ) ? array_values( $unsanitized_value ) : [];

				for ( $i = 0; $i < count( $unsanitized_value ); $i++ ) {
					foreach ( $field_atts['fields'] as $name => $sub_field ) {
						$sub_field['field_name'] = $name;
						$value[ $i ][ $name ] = self::sanitize_input( $sub_field, $unsanitized_value[ $i ] );
					}
				}
				break;

			case 'editor':
				$value = wp_kses_post( $unsanitized_value );
				break;

			case 'media':
				$value = is_array( $unsanitized_value ) ? array_map( 'sanitize_text_field', $unsanitized_value ) : sanitize_text_field( $unsanitized_value );
				break;

			case 'code':
				$value = trim( $unsanitized_value );
				break;

			default:
				$value = is_array( $unsanitized_value ) ? array_map( 'sanitize_text_field', $unsanitized_value ) : sanitize_text_field( $unsanitized_value );
				break;
		}

		$value = apply_filters( 'g_smtp_sanitize_input', $value, $unsanitized_value, $field_atts );

		return $value;
	}

	/**
	 * Print attributes on HTML-element
	 *
	 * @param array $atts
	 *
	 * @return void
	 */
	public static function print_attributes( $atts, $input_class = '' ) {
		if ( $input_class ) {
			$atts['class'] = preg_replace( '/input\-admin\-[a-z]+/', 'input-admin-' . $input_class, $atts['class'] );
		}

		foreach ( $atts as $key => $value ) {
			if ( is_numeric( $key ) ) {
				printf( '%s ', esc_attr( $value ) );
			} else {
				printf( '%s="%s" ', esc_attr( $key ), esc_attr( $value ) );
			}
		}
	}

	/**
	 * Generate a string of classes for the input field
	 *
	 * @param array $args field args
	 *
	 * @return string string of classes
	 */
	public static function get_input_classes( $args ) {
		$type = isset( $args['type'] ) ? $args['type'] : 'text';
		$atts = isset( $args['atts'] ) ? array_filter( (array) $args['atts'] ) : [];
		$classes = isset( $atts['class'] ) ? (array) $atts['class'] : [];
		$classes['input-class'] = 'g-smtp-input-admin g-smtp-input-admin-' . $type;

		$input_types = [
			'text',
			'date',
			'time',
			'datetime',
			'email',
			'tel',
			'url',
			'number',
		];

		if ( in_array( $type, $input_types, true ) ) {
			$classes['input-class'] = str_replace( 'input-admin-' . $type, 'input-admin-input', $classes['input-class'] );
		}

		return implode( ' ', $classes );
	}

	/**
	 * Generate an array of input attributes
	 *
	 * @param array $args Field args
	 *
	 * @return array input field attributes
	 */
	public static function get_input_atts( $args ) {
		$atts = array_merge(
			isset( $args['atts'] ) ? $args['atts'] : [],
			[
				'name'  => $args['field_name'],
				'id'    => $args['field_name'],
				'class' => self::get_input_classes( $args ),
			],
			self::get_conditional_atts( $args )
		);

		return $atts;
	}

	/**
	 * Get templates for repeatable rows
	 *
	 * @param string $field_name
	 * @param array $fields
	 * @param string $direction
	 * @param null|array $value
	 *
	 * @return void
	 */
	public static function get_repeatable_rows( $field_name, $fields, $direction, $value = null ) {
		$i = 0;

		if ( $value === null ) {
			$value = [ [] ];
			$i = '{{index}}';
		}

		foreach ( $value as $key => $val ) :
			?>
			<tr>
				<?php if ( $direction === 'column' ) : ?>
					<td class="g-smtp-input-admin-repeatable-column">
						<table class="form-table">
				<?php endif; ?>

				<?php
				foreach ( $fields as $name => $field ) :
					$field['field_name'] = $field_name . '[' . $i . '][' . $name . ']';
					$field['value'] = isset( $val[ $name ] ) ? $val[ $name ] : '';

					if ( $direction === 'column' ) :
						?>
						<tr>
					<?php endif; ?>

					<td>
						<?php if ( $direction === 'column' ) : ?>
							<label><?php echo esc_html( $field['label'] ); ?></label>
						<?php endif; ?>
						<?php self::make_input( $field ); ?>
					</td>

					<?php if ( $direction === 'column' ) : ?>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>

				<?php if ( $direction === 'column' ) : ?>
						</table>
					</td>
				<?php endif; ?>

				<td width="100">
					<div class="g-smtp-input-admin-repeatable-actions">
						<button type="button" class="button-secondary g-smtp-input-admin-repeatable-remove">
							<?php esc_html_e( 'Remove row', 'g-smtp' ); ?>
						</button>
						<div class="g-smtp-input-admin-repeatable-move-buttons">
							<button type="button" class="button g-smtp-input-admin-repeatable-move-up">
								<i class="far fa-angle-up"></i>
							</button>
							<button type="button" class="button g-smtp-input-admin-repeatable-move-down">
								<i class="far fa-angle-down"></i>
							</button>
						</div>
					</div>
				</td>
			</tr>
			<?php
			$i++;
		endforeach;
	}

	/**
	 * Get attributes for conditional fields
	 *
	 * @param array $args conditional args
	 *
	 * @return array array of data attributes
	 */
	public static function get_conditional_atts( $args ) {
		$data_atts = [];
		if ( ! isset( $args['conditional'] ) ) {
			return $data_atts;
		}

		if ( isset( $args['conditional']['field'] ) && isset( $args['conditional']['value'] ) ) {
			$data_atts['data-cfield'] = $args['conditional']['field'];
			$data_atts['data-cvalue'] = $args['conditional']['value'];
		}

		return $data_atts;
	}
}
