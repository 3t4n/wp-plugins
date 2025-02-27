<?php

namespace VI_CORE\Core;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'VI_Settings' ) ) {
	class VI_Settings {
		public $slug;
		public $title;
		public $tabs;
		public $nonce_action;

		public function __construct() {
			$this->tabs = $this->register_tabs();
			$this->save_settings();
		}

		public function setting_page() {
			$fields = $this->register_fields();
			printf( '<h1>%s</h1>', esc_html( $this->title ) );
			?>
            <form class="vi-ui form" method="post">
				<?php wp_nonce_field( $this->nonce_action ); ?>

                <div class="field">
					<?php
					if ( ! empty( $this->tabs ) && is_array( $this->tabs ) ) {
						reset( $this->tabs );
						$first = key( $this->tabs );
						?>
                        <div class="vi-ui top attached tabular menu">
							<?php
							foreach ( $this->tabs as $tab_id => $tab_name ) {
								$active = $tab_id == $first ? 'active' : '';
								printf( '<a class="item %s" data-tab="%s">%s</a>', esc_attr( $active ), esc_attr( $tab_id ), esc_html( $tab_name ) );
							}
							?>
                        </div>
						<?php

						foreach ( $this->tabs as $tab_id => $tab_name ) {
							if ( ! isset( $fields[ $tab_id ] ) ) {
								continue;
							}
							$active = $tab_id == $first ? 'active' : '';
							printf( '<div class="vi-ui bottom attached %s tab segment" data-tab="%s">', esc_attr( $active ), esc_attr( $tab_id ) );
							$this->render_fields( (array) $fields[ $tab_id ] );
							echo '</div>';
						}

					} else {
						?>
                        <div class="vi-ui segment">
							<?php
							if ( ! empty( $fields ) ) {
								$this->render_fields( (array) $fields );
							}
							?>
                        </div>
						<?php
					}
					?>
                </div>

                <div class="field">
                    <button type="submit" class="vi-ui button primary labeled icon vi-wpbulky-save-settings"
                            name="<?php echo esc_attr( $this->slug ) ?>_save_settings" value="save_settings">
                        <i class="send icon"> </i>
						<?php esc_html_e( 'Save', 'wpbulky-wp-bulk-edit-post-types' ); ?>
                    </button>
                </div>
            </form>
			<?php

			do_action( 'villatheme_support_' . $this->slug );
		}

		public function register_tabs() {
			return [];
		}

		public function get_settings() {
			return [];
		}

		public function register_fields() {
			return [];
		}

		public function render_fields( $fields ) {
			$params = $this->get_settings();

			foreach ( $fields as $field ) {
				if ( ! isset( $field['type'] ) ) {
					continue;
				}

				// Custom attribute handling.
				$custom_attributes = [];

				if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) ) {
					foreach ( $field['custom_attributes'] as $attribute => $attribute_value ) {
						$custom_attributes[] = esc_attr( $attribute ) . '=' . esc_attr( $attribute_value );
					}
				}
				$custom_attributes = implode( ' ', $custom_attributes );

				$type        = $field['type'];
				$key         = $field['key'] ?? $type;
				$title       = $field['title'] ?? '';
				$description = $field['desc'] ?? '';
				$sub_label   = $field['sub_label'] ?? '';
				$unit        = $field['unit'] ?? '';
				$multiple    = $type == 'multiselect' ? '[]' : '';

				$id          = str_replace( '_', '-', $key );
				$class       = $field['class'] ?? '';
				$_key        = str_replace( '-', '_', $key );
				$name        = $key ? "{$this->slug}_settings[{$_key}]{$multiple}" : '';
				$value       = $params[ $key ] ?? '';
				$placeholder = $field['placeholder'] ?? '';
				$min         = isset( $field['min'] ) ? "min={$field['min']}" : '';
				$max         = isset( $field['max'] ) ? "max={$field['max']}" : '';

				if ( $type == 'section_start' ) {
					echo $title ? sprintf( '<h2>%s</h2>', esc_html( $title ) ) : '';
					echo $description ? sprintf( '<div id="%s-description">%s</div>', esc_attr( sanitize_title( $id ) ), wp_kses_post( wpautop( wptexturize( $description ) ) ) ) : '';
					echo '<table class="form-table">';
				} elseif ( $type == 'section_end' ) {
					echo '</table>';
				} else {
					?>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $title ); ?></label>
                        </th>
                        <td class="<?php echo esc_attr( sanitize_title( $type ) ); ?>">
							<?php

							if ( ! empty( $sub_label ) ) {
								printf( '<p class="%s-sub-label">%s</p>', esc_attr( $this->slug ), wp_kses_post( $sub_label ) );
							}

							switch ( $type ) {
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
										$class .= " {$this->slug}-color-picker";
										$type  = 'text';
									}
									?>
                                    <div class="<?php echo esc_attr( "{$this->slug}-{$id}-field" ) ?>">
										<?php
										echo $unit ? '<div class="vi-ui fluid right labeled input">' : '';
										printf(
											"<input type='%s' id='%s' class='%s' name='%s' value='%s'  placeholder='%s' %s %s %s>",
											esc_attr( $type ),
											esc_attr( $id ),
											esc_attr( $class ),
											esc_attr( $name ),
											esc_attr( $value ),
											esc_attr( $placeholder ),
											esc_attr( $min ),
											esc_attr( $max ),
											wp_kses_post( $custom_attributes )
										);
										echo $unit ? sprintf( '<label class="vi-ui label">%s</label></div>', esc_html( $unit ) ) : '';
										?>
                                    </div>
									<?php
									break;

								//Checkbox
								case 'checkbox':
									?>
                                    <div class="vi-ui toggle checkbox">
										<?php
										printf(
											"<input type='%s' id='%s' class='%s' name='%s' value='1' %s %s>",
											esc_attr( $type ),
											esc_attr( $id ),
											esc_attr( $class ),
											esc_attr( $name ),
											wp_kses_post( $custom_attributes ),
											checked( $value, 1, false )
										);
										?>
                                        <label> </label>
                                    </div>
									<?php
									break;

								case 'select':
								case 'multiselect':
									?>

                                    <div>
                                        <select
											<?php
											printf( 'name="%s" id="%s" class="%s" %s', esc_attr( $name ), esc_attr( $id ), esc_attr( $class ), wp_kses_post( $custom_attributes ) );
											echo esc_attr( 'multiselect' === $type ? 'multiple="multiple"' : '' );
											?>
                                        >
											<?php
											if ( ! empty( $field['options'] ) && is_array( $field['options'] ) ) {
												foreach ( $field['options'] as $key => $option ) {
													if ( is_array( $option ) ) {
														$end = array_search( end( $option ), $option );
														foreach ( $option as $_key => $_opt ) {
															if ( $_key == 'optgroup_label' ) {
																printf( '<optgroup label="%s">', esc_html( $_opt ) );
																continue;
															}

															$selected = is_array( $value ) ? ( in_array( $_key, $value ) ? 'selected' : '' ) : ( $_key == $value ? 'selected' : '' );
															echo sprintf( "<option value='%1s' %2s >%3s</option>", esc_attr( $_key ), esc_attr( $selected ), esc_html( $_opt ) );

															if ( $_key == $end ) {
																echo '</optgroup>';
																continue;
															}
														}
													} else {
														$selected = is_array( $value ) ? ( in_array( $key, $value ) ? 'selected' : '' ) : ( $key == $value ? 'selected' : '' );
														echo sprintf( "<option value='%1s' %2s >%3s</option>", esc_attr( $key ), esc_attr( $selected ), esc_html( $option ) );
													}
												}
											}
											?>
                                        </select>
                                    </div>
									<?php
									break;

								case 'radio':
									?>
                                    <div class="<?php echo esc_attr( $this->slug ) ?>-group-radios">
										<?php
										if ( ! empty( $field['options'] ) && is_array( $field['options'] ) ) {
											foreach ( $field['options'] as $option ) {
												$checked = checked( $value, $option['value'], false );

												$custom_attributes = [];
												if ( ! empty( $option['custom_attributes'] ) && is_array( $option['custom_attributes'] ) ) {
													foreach ( $option['custom_attributes'] as $attribute => $attribute_value ) {
														$custom_attributes[] = esc_attr( $attribute ) . '=' . esc_attr( $attribute_value );
													}
												}
												$custom_attributes = implode( ' ', $custom_attributes );

												?>
                                                <div class='<?php echo esc_attr( $this->slug ) ?>-radio <?php echo $checked ? 'checked' : '' ?>'>
													<?php
													printf( "<input type='%s' class='%s' name='%s' value='%s' %s %s>",
														esc_attr( $type ),
														esc_attr( $class ),
														esc_attr( $name ),
														esc_attr( $option['value'] ),
														wp_kses_post( $custom_attributes ),
														checked( $value, $option['value'], false )
													);

													if ( ! empty( $option['img'] ) ) {
														printf( '<img src="%s">', esc_url( $option['img'] ) );
													}

													if ( ! empty( $option['title'] ) ) {
														printf( '<p class="%s-radio-title">%s</p>', esc_attr( $this->slug ), esc_html( $option['title'] ) );
													}
													?>
                                                </div>
												<?php
											}
										}
										?>
                                    </div>
									<?php
									break;

								case 'textarea':
									printf( "<textarea id='%s' class='%s' name='%s' placeholder='%s'>%s</textarea>",
										esc_attr( $id ), esc_attr( $class ), esc_attr( $name ), esc_attr( $placeholder ), esc_html( $value ) );
									break;

								// Default: run an action.
								default:
									do_action( "{$this->slug}_admin_field_{$key}", $field );
									break;
							}

							if ( ! empty( $description ) ) {
								printf( '<p class="%s-description">%s</p>', esc_attr( $this->slug ), wp_kses_post( $description ) );
							}

							do_action( "{$this->slug}_after_field_{$id}" );

							?>
                        </td>
                    </tr>
					<?php
				}
			}
		}

		public function save_settings() {
			if ( isset( $_POST[ $this->slug . '_save_settings' ], $_POST[ $this->slug . '_settings' ], $_POST['_wpnonce'] )
			     && $_POST[ $this->slug . '_save_settings' ] === 'save_settings'
			     && wp_verify_nonce( sanitize_key( $_POST['_wpnonce'] ), $this->nonce_action )
			     && current_user_can( BULKYWP_CONST_F['capability'] ) ) {

				$data = Helper::clean( wp_unslash( $_POST[ $this->slug . '_settings' ] ) );
				$data = apply_filters( "{$this->slug}_save_settings", $data );

				update_option( "{$this->slug}_params_setting", $data );
			}
		}


	}
}