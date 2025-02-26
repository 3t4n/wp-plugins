<?php

namespace AffiAffiliate\Admin;

use AffiAffiliate\Inc\Data;
use DateTime;
use DateTimeZone;

defined( 'ABSPATH' ) || exit;

class AFSettings_Helper {
	protected static $instance = null;
	protected static $prefix;
	protected static $data;

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public static function config( $data = [] ) {
		self::$prefix = $data['slug'] ?? '';
		self::$data   = $data['data'] ?? '';
	}

	public static function parse_number_input_attr( $type, $value ) {
		if ( ! $value && $value !== 0 ) {
			return '';
		}

		return is_numeric( $value ) ? " {$type}='{$value}'" : " {$type}={$value}";
	}

	public static function output_fields( $options, $option_data = [] ) {
		$prefix = self::$prefix;

		if ( empty( $options ) || ! is_array( $options ) ) {
			return;
		}

		$data = self::$data;

		foreach ( $options as $option ) {

			// Custom attribute handling.
			$custom_attributes = array();

			if ( ! empty( $option['custom_attributes'] ) && is_array( $option['custom_attributes'] ) ) {
				foreach ( $option['custom_attributes'] as $attribute => $attribute_value ) {
					$custom_attributes[] = esc_attr( $attribute ) . '=' . esc_attr( $attribute_value );
				}
			}
			$custom_attributes = implode( ' ', $custom_attributes );

			$type         = $option['type'] ?? '';
			$row_class    = $option['rowClass'] ?? '';
			$id           = $option['id'] ?? $type;
			$required     = $option['required'] ?? '';
			$title        = $option['title'] ?? '';
			$description  = $option['desc'] ?? '';
			$readonly     = $option['readonly'] ?? '';
			$multiple     = $type == 'multiselect' ? '[]' : '';
			$half_type    = $option['half_type'] ?? '';
			$half_class   = $option['half_class'] ?? '';
			$btn_class    = $option['btn_class'] ?? '';
			$db_data      = $option['db_data'] ?? '';
			$button_label = $option['button_label'] ?? '';

			$field_id    = isset( $option['id'] ) ? $prefix . '-' . str_replace( '_', '-', $id ) : '';
			$class       = $option['class'] ?? '';
			$name        = isset( $option['id'] ) ? "{$prefix}_{$id}{$multiple}" : '';/*Auto generate name*/
			$name        = isset( $option['name'] ) ? $option['name'] : $name;/*Set name for input*/
			$placeholder = $option['placeholder'] ?? '';
//			$value         = $data->get_param( $id );
			$labeled_class = ! empty( $option['unit'] ) ? 'vi-ui right labeled input fluid ' : '';
			$labeled       = ! empty( $option['labeled'] ) ? 'vi-ui right labeled input' : '';
			$labeled       = ! empty( $option['labeled_fluid'] ) ? $labeled . ' fluid ' : $labeled;
			$labeled_text  = isset( $option['labeled_text'] ) ? $option['labeled_text'] : '';
			if ( empty( $option_data ) ) {
				$value = $data->get_param( $id );
			} else {
				$value = isset( $option_data[ $id ] ) ? $option_data[ $id ] : '';
			}
			// Switch based on type.
			switch ( $type ) {

				// Section Titles.
				case 'section_start':
					if ( ! empty( $option['accordion'] ) ) {
						printf( '<div class="vi-ui styled fluid accordion">
                                            <div class="title">
                                                <i class="dropdown icon"> </i>
                                                %s
                                            </div>
                                        <div class="content">', esc_html( $title ) );
					} else {
						echo ! empty( $title ) ? '<h3>' . esc_html( $title ) . '</h3>' : '';
					}

					if ( ! empty( $description ) ) {
						echo '<div id="' . esc_attr( sanitize_title( $id ) ) . '-description">';
						echo wp_kses_post( wpautop( wptexturize( $description ) ) );
						echo '</div>';
					}

					echo '<table class="form-table">';
					break;

				// Section Ends.
				case 'section_end':
					echo '</table>';
					if ( ! empty( $option['accordion'] ) ) {
						echo '</div></div>';
					}
					break;

				// Standard text inputs and subtypes like 'number'.
				case 'text':
				case 'password':
				case 'datetime':
				case 'datetime-local':
				case 'date':
				case 'month':
				case 'time':
				case 'week':
				case 'number':
				case 'email':
				case 'url':
				case 'tel':
				case 'color':
					if ( $type == 'color' ) {
						$type  = 'text';
						$class .= " {$prefix}-color-picker";
					}

					if ( $type == 'number' ) {
						$custom_attributes .= self::parse_number_input_attr( 'min', $option['min'] ?? '' );
						$custom_attributes .= self::parse_number_input_attr( 'max', $option['max'] ?? '' );
						$custom_attributes .= self::parse_number_input_attr( 'step', $option['step'] ?? '' );
					}

					if ( $readonly ) {
						$custom_attributes .= ' readonly';
					}
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $field_id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div class="<?php echo esc_attr( $labeled . $field_id ) ?>-field ">
								<?php
								if ( $labeled_text && $labeled ) {
									?>
                                    <label for="<?php echo esc_attr( $field_id ); ?>"
                                           class="vi-ui label"><?php echo esc_html( $labeled_text ); ?></label>
									<?php
								}
								$required_text = $required ? 'required=true' : '';
								printf(
									"<input type='%s' id='%s' class='%s' name='%s' value='%s' %s %s %s>",
									esc_attr( $type ),
									esc_attr( $field_id ),
									esc_attr( $class ),
									esc_attr( $name ),
									esc_attr( $value ),
									$placeholder ? "placeholder='" . esc_attr( $placeholder ) . "'" : '',
									esc_attr( $required_text ),
									esc_attr( $custom_attributes )
								);

								self::unit( $option );
								?>
                            </div>

							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;

				//Checkbox
				case 'checkbox':
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div class="vi-ui toggle checkbox">
								<?php
								printf(
									"<input type='%s' id='%s' class='%s' name='%s' value='1' %s %s>",
									esc_attr( $type ),
									esc_attr( $field_id ),
									esc_attr( $class ),
									esc_attr( $name ),
									esc_attr( $custom_attributes ),
									$value == 1 ? 'checked' : ''
								);
								?>
                                <label> </label>
                            </div>

							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>

                        </td>
                    </tr>
					<?php
					break;

				case 'radio':
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div>
								<?php foreach ( $option['options'] as $option ) {
									$__value  = $option['value'] ?? '';
									$has_icon = ! empty( $option['icon'] ) ? ' has-icon' : '';
									echo sprintf( "<span class='radio-element'><input type='radio' name='%s' class='%s' value='%s' %s><label class='%s'></label></span>",
										esc_attr( $name ),
										esc_attr( $class . $has_icon ),
										esc_attr( $__value ),
										esc_attr( $value == $__value ? 'checked' : '' ),
										esc_attr( $option['label'] ?? $option['icon'] ?? '' )
									);
								} ?>
                            </div>
							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;

				case 'select':
				case 'multiselect':
					$custom_attributes .= 'multiselect' === $type ? ' multiple' : '';
					$value = 'multiselect' === $type && $value == '' ? [] : $value;
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div class="<?php echo esc_attr( $labeled_class . $field_id ) ?>-field">

								<?php
								printf( '<select name="%s" id="%s" class="%s" %s %s>',
									esc_attr( $name ),
									esc_attr( $field_id ),
									esc_attr( $class ),
									$placeholder ? "placeholder='" . esc_attr( $placeholder ) . "'" : '',
									esc_attr( $custom_attributes ) );

								if ( ! empty( $option['options'] ) && is_array( $option['options'] ) ) {

									foreach ( $option['options'] as $key => $page_name ) {
										$selected = is_array( $value ) ? ( in_array( trim( $key ), $value ) ? 'selected' : '' ) : ( $key == $value ? 'selected' : '' );
										printf( "<option value='%s' %s >%s</option>", esc_attr( $key ), esc_attr( $selected ), esc_html( $page_name ) );
									}
								}
								printf( '</select>' );
								?>
                            </div>

							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;
				case 'select2':
					$custom_attributes .= 'multiselect' === $type ? ' multiple' : '';
					$value = 'multiselect' === $type && $value == '' ? [] : $value;
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div class="<?php echo esc_attr( $labeled_class . $field_id ) ?>-field">

								<?php
								printf( '<select name="%s" id="%s" class="%s" %s %s>',
									esc_attr( $name ),
									esc_attr( $field_id ),
									esc_attr( $class ),
									$placeholder ? "placeholder='" . esc_attr( $placeholder ) . "'" : '',
									esc_attr( $custom_attributes ) );

								if ( ! empty( $value ) && ! empty( $option_data ) && isset( $option_data['select2'] ) ) {
									printf( "<option value='%s' selected >%s</option>", esc_attr( $option_data['select2'][0] ), esc_html( $option_data['select2'][1] ) );
								}
								printf( '</select>' );
								?>
                            </div>

							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;

				case 'textarea':
					if ( $readonly ) {
						$custom_attributes .= ' readonly';
					}
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div class="<?php echo esc_attr( $labeled_class . $field_id ) ?>-field">
								<?php
								if ( is_array( $value ) ) {
									$value = implode( "\n", $value );
								}
								printf( "<textarea id='%s' class='%s' name='%s'  placeholder='%s' %s>%s</textarea>",
									esc_attr( $id ), esc_attr( $class ), esc_attr( $name ), esc_attr( $placeholder ), esc_attr( $custom_attributes ), wp_kses_post( $value ) );
								printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) );
								?>
                            </div>

							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;

				case 'texteditor':
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div class="<?php echo esc_attr( $labeled_class . $field_id ) ?>-field">
								<?php
								wp_editor( stripslashes( $value ), $field_id, array(
									'editor_height' => 200,
									'textarea_name' => $name
								) );
								/*printf( $description ? "<p class='{$prefix}-description'>%s</p>" : '', wp_kses_post( $description ) );*/
								?>
                            </div>

							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;

				case 'media':
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div class="<?php echo esc_attr( $labeled_class . $field_id ) ?>-field">
								<?php
								if ( isset( $option['html'] ) ) {
									echo Data::kses_post( $option['html'] );// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								}
								?>
                            </div>

							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;
				case 'update_button':
					if ( $readonly ) {
						$custom_attributes .= ' readonly';
					}
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $field_id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="affi-half-field-wrap <?php echo esc_attr( sanitize_title( $half_type ) ); ?>">
                            <div class="<?php echo esc_attr( $labeled . $field_id ) ?>-field ">
								<?php
								if ( $labeled_text && $labeled ) {
									?>
                                    <label for="<?php echo esc_attr( $field_id ); ?>"
                                           class="vi-ui label"><?php echo esc_html( $labeled_text ); ?></label>
									<?php
								}
								$required_text = $required ? 'required=true' : '';
								printf(
									"<div class='%s'>%s</div>",
									esc_attr( $class ),
									esc_attr( $button_label )
								);
								printf(
									"<input type='%s' id='%s' class='%s' name='%s' value='%s' %s %s %s>",
									esc_attr( $half_type ),
									esc_attr( $field_id ),
									esc_attr( $half_class ),
									esc_attr( $name ),
									esc_attr( $value ),
									$placeholder ? "placeholder='" . esc_attr( $placeholder ) . "'" : '',
									esc_attr( $required_text ),
									esc_attr( $custom_attributes )
								);

								self::unit( $option );
								?>
                            </div>

							<?php do_action( "villatheme_{$prefix}_after_field_" . $id ); ?>
							<?php
							$u_date_format = $value ? gmdate( 'm/d/Y h:i:s A', (int) $value ) :
								esc_html__( 'Click Update now to start schedule update', 'affi-affiliate-marketing-for-woo' );
							printf( "<span class='%s-description affi-half-description-wrap'>%s<span class='affi-half-description'>%s</span></span>", esc_attr( $prefix ),
								esc_html__( 'Auto update on: ', 'affi-affiliate-marketing-for-woo' ), esc_html( $u_date_format ) );
							printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;
				case 'clear_button':
					if ( $readonly ) {
						$custom_attributes .= ' readonly';
					}
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $field_id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td class="affi-half-field-wrap <?php echo esc_attr( sanitize_title( $half_type ) ); ?>">
                            <div class="<?php echo esc_attr( $labeled . $field_id ) ?>-field affi-field-line-flex">
								<?php
								if ( $labeled_text && $labeled ) {
									?>
                                    <label for="<?php echo esc_attr( $field_id ); ?>"
                                           class="vi-ui label"><?php echo esc_html( $labeled_text ); ?></label>
									<?php
								}
								printf(
									"<div class='%s'>%s</div>",
									esc_attr( $btn_class ),
									esc_attr( $button_label )
								);

								printf(
									"<input type='number' id='%s' class='%s' name='%s' value='%d' %s> <span class='affi-st-inline-suffix'>%s</span>",
									esc_attr( $field_id ),
									esc_attr( $class ),
									esc_attr( $name ),
									esc_attr( $value ),
									esc_attr( $custom_attributes ),
									esc_html__( 'days', 'affi-affiliate-marketing-for-woo' )
								);

								self::unit( $option );
								?>
                            </div>
							<?php do_action( "villatheme_{$prefix}_after_field_" . $id );
							printf( "<span class='%s-description affi-half-description-wrap'><span class='affi-half-first'>%s</span><span class='affi-half-second'>%s</span></span>",
								esc_attr( $prefix ),
								esc_html__( 'Total database record: ', 'affi-affiliate-marketing-for-woo' ), esc_html( $db_data ) );
							printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;
				case 'pro_version':
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $title ); ?></label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
                            <div>
                                <a href="<?php echo esc_html( $option['url'] ?? '' ) ?>" class="vi-ui button">
									<?php echo esc_html( $option['button_text'] ?? '' ) ?>
                                </a>
                            </div>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;

				case 'do_action':
					?>
                    <tr>
                        <td style="padding: 0;">
							<?php
							if ( ! empty( $option['id'] ) ) {
								do_action( "{$prefix}_{$option['id']}" );
							}
							?>
                        </td>
                    </tr>
					<?php
					break;
				// Default: run an action.
				default:
					?>
                    <tr valign="top" class="<?php echo esc_attr( $row_class ); ?>">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_html( $title ); ?>
                                <span class="required-label"><?php echo esc_html( $required ? '*' : '' ); ?></span>
                            </label>
                        </th>
                        <td>
							<?php do_action( "{$prefix}_admin_field_" . $id, $value, $option ); ?>
							<?php printf( isset( $description ) && ! empty( $description ) ? "<p class='%s-description'>%s</p>" : '', esc_attr( $prefix ), wp_kses_post( $description ) ); ?>
                        </td>
                    </tr>
					<?php
					break;
			}
		}
	}

	protected static function unit( $option ) {
		if ( empty( $option['unit'] ) ) {
			return;
		}

		$unit = $option['unit'];

		if ( is_array( $unit ) ) {
			if ( empty( $unit['id'] ) || empty( $unit['options'] ) || ! is_array( $unit['options'] ) ) {
				return;
			}

			$saved = self::$data->get_param( $unit['id'] );

			$classes = [ $unit['id'], self::$prefix . '-dropdown', 'label' ];

			printf( '<select name="%s" class="%s">', esc_attr( $unit['id'] ), esc_attr( implode( ' ', $classes ) ) );

			foreach ( $unit['options'] as $value => $text ) {
				printf( "<option value='%s' %s>%s</option>", esc_attr( $value ), selected( $saved, $value ), esc_html( $text ) );
			}

			echo '</select>';

		} else {
			printf( "<div class='vi-ui basic label'>%s</div>", wp_kses_post( $unit ) );
		}
	}

	public static function save_fields( $options ) {

		if ( empty( $_POST ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Missing
			return false;
		}

		// Options to update will be stored here and saved later.
		$update_options   = array();
		$autoload_options = array();
		$prefix           = self::$prefix;

		// Loop options and get values to save.
		foreach ( $options as $option ) {
			if ( ! isset( $option['id'] ) ) {
				continue;
			}

			// Get posted value.
			if ( strstr( $option['id'], '[' ) ) {
				parse_str( $option['id'], $option_name_array );
				$option_name  = current( array_keys( $option_name_array ) );
				$setting_name = key( $option_name_array[ $option_name ] );
				$raw_value    = isset( $_POST[ $option_name ][ $setting_name ] ) ? villatheme_sanitize_kses( wp_unslash( $_POST[ $option_name ][ $setting_name ] ) ) : null;// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			} else {
				$option_name      = $option['id'] ?? '';
				$full_option_name = "{$prefix}_{$option_name}";
				$setting_name     = '';
				$raw_value        = isset( $_POST[ $full_option_name ] ) ? villatheme_sanitize_kses( wp_unslash( $_POST[ $full_option_name ] ) ) : null;// phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			}

			$type = $option['type'] ?? '';

			// Format the value based on option type.
			switch ( $type ) {
				case 'number':
					$value = $raw_value ? floatval( $raw_value ) : $raw_value;
					break;

				case 'checkbox':
					$value = '1' === $raw_value || 'yes' === $raw_value;
					break;

				case 'textarea':
				case 'texteditor':
					$value = wp_kses_post( trim( $raw_value ) );
					break;
				case 'multiselect':
					$value = array_filter( villatheme_sanitize_kses( (array) $raw_value ) );
					break;

				case 'select':
					$value = sanitize_text_field( $raw_value );
					break;

				default:
					$value = villatheme_sanitize_kses( $raw_value );
					break;
			}

			/**
			 * Sanitize the value of an option.
			 */
			$value = apply_filters( "villatheme_{$prefix}_admin_settings_sanitize_option", $value, $option, $raw_value );

			/**
			 * Sanitize the value of an option by option name.
			 */
			$value = apply_filters( "villatheme_{$prefix}_admin_settings_sanitize_option_$option_name", $value, $option, $raw_value );


			// Check if option is an array and handle that differently to single values.
			if ( $option_name && $setting_name ) {
				if ( ! isset( $update_options[ $option_name ] ) ) {
					$update_options[ $option_name ] = get_option( $option_name, array() );
				}
				if ( ! is_array( $update_options[ $option_name ] ) ) {
					$update_options[ $option_name ] = array();
				}
				$update_options[ $option_name ][ $setting_name ] = $value;
			} else {
				$update_options[ $option_name ] = $value;
			}

			$autoload_options[ $option_name ] = isset( $option['autoload'] ) ? (bool) $option['autoload'] : true;

			if ( ! empty( $option['unit'] ) ) {
				$unit             = $option['unit'];
				$option_unit_name = $unit['id'] ?? '';
				if ( $option_unit_name ) {
					$raw_unit_value = isset( $_POST[ $option_unit_name ] ) ? sanitize_text_field( wp_unslash( $_POST[ $option_unit_name ] ) ) : null;// phpcs:ignore WordPress.Security.NonceVerification.Missing

					$update_options[ $option_unit_name ]   = $raw_unit_value;
					$autoload_options[ $option_unit_name ] = isset( $option['autoload'] ) ? (bool) $option['autoload'] : true;

				}
			}

		}
		$update_options = apply_filters( "{$prefix}_pre_update_settings", $update_options );

		update_option( "villatheme_{$prefix}_data", $update_options, 'yes' );

		return true;
	}

}

