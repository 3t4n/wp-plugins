<?php

use WSDesk\Formatter\Cast\TimestampCaster;
use WSDesk\Tickets\TicketRepository;
use WSDesk\Tickets\TicketArchiveRepository;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CRM_Ajax_Archive {
	public static function eh_crm_refresh_tickets_count_archive() {
		$default = eh_crm_get_settingsmeta( 0, 'default_label' );
		$tickets = eh_crm_get_ticketmeta_value_count_archive( 'ticket_label', $default );
		die( json_encode( array( 'data' => count( $tickets ) ) ) );
	}
	public static function eh_crm_ticket_single_view_archive() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null;
			if ( isset( $_POST['pagination_id'] ) ) {
				$pagination = json_decode( stripslashes( sanitize_text_field( $_POST['pagination_id'] ) ), true );
			} else {
				$pagination = array();
			}
			$content = self::eh_crm_ticket_single_view_gen( $ticket_id, $pagination );
			$tab     = self::eh_crm_ticket_single_view_gen_head( $ticket_id );

			die(
				wp_json_encode(
					array(
						'tab_head'    => $tab,
						'tab_content' => $content,
					)
				)
			);
		}
	}

	public static function eh_crm_ticket_single_view_gen_head( $ticket_id ) {
		$current = eh_crm_get_ticket_archive( array( 'ticket_id' => $ticket_id ) );
		$tab     = '<a onclick="setURLFunc(' . $ticket_id . ')" href="#tab_content_' . $ticket_id . '" id="tab_content_a_' . $ticket_id . '" aria-controls="#' . $ticket_id . '" role="tab" data-toggle="tab" class="tab_a" style="font-size: 12px;padding: 11px 5px;margin-right:0px !important;"><button type="button" class="btn btn-default btn-circle close_tab pull-right"><span class="glyphicon glyphicon-remove"></span></button><div class="badge">#' . $ticket_id . '</div><span class="tab_head"> ' . stripslashes( html_entity_decode( htmlentities( $current[0]['ticket_title'] ) ) ) . '</span></a>';
		return $tab;
	}

	public static function eh_crm_ticket_multiple_unarchive() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$selectAll = isset( $_POST['selectAll'] ) ? 'true' === sanitize_text_field( $_POST['selectAll'] ) : false;

			$ticket_ids = array();
			if ( ! $selectAll && isset( $_POST['ticket_id'] ) && is_array( $_POST['ticket_id'] ) ) {
				$count = count( $_POST['ticket_id'] );
				for ( $i = 0; $i < $count;$i++ ) {
					$ticket_ids[] = isset( $_POST['ticket_id'][ $i ] ) ? sanitize_text_field( $_POST['ticket_id'][ $i ] ) : false;
				}
			}
			if ( false === $selectAll && count( $ticket_ids ) === 0 ) {
				wp_send_json_error(
					array(
						'message' => esc_html__( 'Invalid ticket ids' ),
					),
					422
				);
			}
			$filters = array( 'ticket_id' => $selectAll ? array() : $ticket_ids );
			$count   = ( new TicketArchiveRepository() )->restore( $filters );
			wp_send_json_success(
				array(
					'message' => esc_html__( 'Unarchived' ),
					'count'   => $count,
				)
			);
			die;
		}
	}

	public static function eh_crm_ticket_single_view_gen( $ticket_id, $pagination = array() ) {
		ob_start();
		$current          = eh_crm_get_ticket_archive( array( 'ticket_id' => $ticket_id ) );
		$tickets_display  = eh_crm_get_settingsmeta( '0', 'tickets_display' );
		$current_meta     = eh_crm_get_ticketmeta_archive( $ticket_id );
		$logged_user      = wp_get_current_user();
		$logged_user_caps = array_keys( $logged_user->caps );
		$avail_caps       = array( 'reply_tickets', 'delete_tickets', 'manage_tickets', 'manage_templates', 'merge_tickets' );
		$total_count      = ( eh_crm_get_ticket_value_count_archive( 'ticket_parent', 0 ) );
		$access           = array();
		if ( ! in_array( 'administrator', $logged_user->roles ) ) {
			for ( $i = 0;$i < count( $logged_user_caps );$i++ ) {
				if ( ! in_array( $logged_user_caps[ $i ], $avail_caps ) ) {
					unset( $logged_user_caps[ $i ] );
				}
			}
			$access = $logged_user_caps;
		} else {
			$access = $avail_caps;
		}
		$users_data = get_users( array( 'role__in' => array( 'administrator', 'WSDesk_Agents', 'WSDesk_Supervisor' ) ) );
		$users      = array();
		for ( $i = 0; $i < count( $users_data ); $i++ ) {
			$current_user = $users_data[ $i ];
			$temp         = array();
			$roles        = $current_user->roles;
			foreach ( $roles as $value ) {
				$current_role = $value;
				$temp[ $i ]   = ucfirst( str_replace( '_', ' ', $current_role ) );
			}
			$users[ implode( ' & ', $temp ) ][ $current_user->ID ] = $current_user->data->display_name;
		}
		$avail_fields    = eh_crm_get_settings( array( 'type' => 'field' ), array( 'slug', 'title', 'settings_id' ) );
		$selected_fields = eh_crm_get_settingsmeta( 0, 'selected_fields' );
		if ( ! $selected_fields ) {
			$selected_fields = array();
		}
		$avail_tags        = eh_crm_get_settings( array( 'type' => 'tag' ), array( 'slug', 'title', 'settings_id' ) );
		$avail_labels      = eh_crm_get_settings( array( 'type' => 'label' ), array( 'slug', 'title', 'settings_id' ) );
		$ticket_label      = '';
		$ticket_label_slug = '';
		$eye_color         = '';
		for ( $j = 0;$j < count( $avail_labels );$j++ ) {
			if ( $avail_labels[ $j ]['slug'] == $current_meta['ticket_label'] ) {
				$ticket_label      = $avail_labels[ $j ]['title'];
				$ticket_label_slug = $avail_labels[ $j ]['slug'];
			}
			if ( $avail_labels[ $j ]['slug'] == $current_meta['ticket_label'] ) {
				$eye_color = eh_crm_get_settingsmeta( $avail_labels[ $j ]['settings_id'], 'label_color' );
			}
		}
		$ticket_tags_list = '';
		$response         = array();
		$co               = 0;
		if ( ! empty( $avail_tags ) ) {
			for ( $j = 0;$j < count( $avail_tags );$j++ ) {
				$current_ticket_tags = ( isset( $current_meta['ticket_tags'] ) ? $current_meta['ticket_tags'] : array() );
				for ( $k = 0;$k < count( $current_ticket_tags );$k++ ) {
					if ( $avail_tags[ $j ]['slug'] == $current_ticket_tags[ $k ] ) {
						$args_post = array(
							'orderby'     => 'ID',
							'numberposts' => -1,
							'post_type'   => array( 'post', 'product' ),
							'post__in'    => eh_crm_get_settingsmeta( $avail_tags[ $j ]['settings_id'], 'tag_posts' ),
						);
						$posts     = get_posts( $args_post );
						$temp      = get_post();
						for ( $m = 0; $m < count( $posts ); $m++,$co++ ) {
							$response[ $co ]['title'] = $posts[ $m ]->post_title;
							$response[ $co ]['guid']  = get_permalink( $posts[ $m ]->ID );
						}
						$ticket_tags_list .= '<span class="label label-info">#' . $avail_tags[ $j ]['title'] . '</span>';
					}
				}
			}
		}
		$index    = array_search( $ticket_id, $pagination );
		$next     = '';
		$previous = '';
		if ( false !== $index ) {
			if ( $index + 1 < count( $pagination ) ) {
				$next = $pagination[ $index + 1 ];
			}
			if ( $index - 1 >= 0 ) {
				$previous = $pagination[ $index - 1 ];
			}
		}
		
		/**
		 * Fire a filter hook for wpml current language
		 *
		 * @since 3.1.
		 * 
		 */
		$my_current_lang = apply_filters( 'wpml_current_language', null );

		/**
		 * Fire an action hook for wpml switch language
		 *
		 * @since 3.1.2
		 * 
		 * @param $my_current_lang
		 *
		 */
		do_action( 'wpml_switch_language', $my_current_lang );
		$blog_info    = eh_crm_wpml_translations( get_bloginfo( 'name' ), 'bloginfo', 'bloginfo' );
		$ticket_label = eh_crm_wpml_translations( $ticket_label, 'ticket_label_title', 'ticket_label_title' );
		?>

		<!-- Sliding div ends here -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ol class="breadcrumb col-md-8" style="margin: 0 !important;background: none !important;border:none;padding: 8px 0px !important; ">
							<li><?php echo esc_html( $blog_info ); ?></li>
							<li><?php echo esc_html( $ticket_label ); ?></li>
							<li class="active"><span class="label label-success" style="background-color:<?php echo esc_html( $eye_color ); ?> !important"><?php esc_html_e( 'Ticket', 'wsdesk' ); ?> #<?php echo esc_html( $ticket_id ); ?></span></li>
							<span class="spinner_loader ticket_loader_<?php echo esc_html( $ticket_id ); ?>">
								<span class="bounce1"></span>
								<span class="bounce2"></span>
								<span class="bounce3"></span>
							</span>
						</ol>
					</div>
				</div>
				<span class="crm-divider" style="margin-bottom:2px;margin-left: -15px;width: 103.75%;"></span>
				<div class="row">
					<div class="col-md-3" style="padding-right: 0px;padding-top: 10px;">
						<div class="form-group">
							<span class="help-block"><?php esc_html_e( 'Assignee', 'wsdesk' ); ?></span>
							<select id="assignee_ticket_<?php echo esc_html( $ticket_id ); ?>" class="form-control" aria-describedby="helpBlock" multiple="multiple">
							<?php
								$assignee = ( isset( $current_meta['ticket_assignee'] ) ? $current_meta['ticket_assignee'] : array() );
							if ( '' !== $assignee ) {
								foreach ( $users as $key => $value ) {
									if ( in_array( 'manage_tickets', $access ) ) {
										foreach ( $value as $id => $name ) {
											$selected = '';
											if ( in_array( $id, $assignee ) ) {
												$selected = 'selected';
											}
											echo '<option value="' . esc_attr( $id ) . '" ' . esc_html( $selected ) . '>' . esc_html( $name ) . ' | ' . esc_attr( $key ) . '</option>';
										}
									} else {
										foreach ( $value as $id => $name ) {
											if ( in_array( $id, $assignee ) ) {
												echo '<option value="' . esc_attr( $id ) . '" selected>' . esc_html( $name ) . ' | ' . esc_attr( $key ) . '</option>';
											}
										}
									}
								}
							}
							?>
							</select>
						</div>
						<?php
						$cc = ( isset( $current_meta['ticket_cc'] ) ? $current_meta['ticket_cc'] : array() );
						?>
							<div class="form-group">
								<span class="help-block"><?php esc_html_e( 'CC', 'wsdesk' ); ?> <span class="glyphicon glyphicon-info-sign" style="color:lightgray;font-size:x-small;vertical-align:baseline;" data-toggle="wsdesk_tooltip" title="<?php esc_html_e( 'To add multiple CC, separate each address with comma without any space.', 'wsdesk' ); ?>" data-container="body"></span></span>
								<input type="text" id="cc_ticket_<?php echo esc_html( $ticket_id ); ?>" class="form-control cc_<?php echo esc_html( $ticket_id ); ?>" value= "<?php echo esc_html( join( ',', $cc ) ); ?>">
							</div>
						<?php
						$bcc = ( isset( $current_meta['ticket_bcc'] ) ? $current_meta['ticket_bcc'] : array() );
						if ( ! empty( $bcc ) ) {
							?>
								<div class="form-group">
									<span class="help-block"><?php esc_html_e( 'Bcc', 'wsdesk' ); ?></span>
									<select id="bcc_ticket_<?php echo esc_html( $ticket_id ); ?>" class="form-control bcc_select_<?php echo esc_html( $ticket_id ); ?>" aria-describedby="helpBlock" multiple="multiple">
									<?php
									foreach ( $bcc as $key => $value ) {
										if ( in_array( 'manage_tickets', $access ) ) {
											echo '<option value="' . esc_html( $value ) . '" selected>' . esc_html( $value ) . '</option>';
										} else {
											echo '<option value="' . esc_html( $value ) . '" selected>' . esc_html( $value ) . '</option>';
										}
									}
									?>
									</select>
								</div>
							<?php
						}
						?>
						<div class="form-group">
							<span class="help-block"><?php esc_html_e( 'Tags', 'wsdesk' ); ?></span>
							<select id="tags_ticket_<?php echo esc_html( $ticket_id ); ?>" class="form-control crm-form-element-input" multiple="multiple">
							<?php
								$ticket_tags = ( isset( $current_meta['ticket_tags'] ) ? $current_meta['ticket_tags'] : array() );
							if ( '' != $ticket_tags && ! empty( $avail_tags ) == $ticket_tags ) {
								for ( $i = 0;$i < count( $avail_tags );$i++ ) {
									if ( in_array( 'manage_tickets', $access ) ) {
										$selected = '';
										if ( in_array( $avail_tags[ $i ]['slug'], $ticket_tags ) ) {
											$selected = 'selected';
										}
										echo '<option value="' . esc_html( $avail_tags[ $i ]['slug'] ) . '" ' . esc_html( $selected ) . '>' . esc_html( $avail_tags[ $i ]['title'] ) . '</option>';
									} else {
										if ( in_array( $avail_tags[ $i ]['slug'], $ticket_tags ) ) {
											echo '<option value="' . esc_html( $avail_tags[ $i ]['slug'] ) . '" selected>' . esc_html( $avail_tags[ $i ]['title'] ) . '</option>';
										}
									}
								}
							}
							?>
							</select>
						</div>
						<hr/>
						<?php
						for ( $i = 0; $i < count( $selected_fields ); $i++ ) {
							for ( $j = 3; $j < count( $avail_fields ); $j++ ) {
								if ( $avail_fields[ $j ]['slug'] == $selected_fields[ $i ] ) {
									$field_ticket_value    = ( isset( $current_meta[ $avail_fields[ $j ]['slug'] ] ) ? $current_meta[ $avail_fields[ $j ]['slug'] ] : '' );
									$current_settings_meta = eh_crm_get_settingsmeta( $avail_fields[ $j ]['settings_id'] );
									$required              = ( isset( $current_settings_meta['field_require_agent'] ) ? $current_settings_meta['field_require_agent'] : '' );
									$required              = ( 'yes' === $required ) ? 'required' : '';
									if ( 'file' != $current_settings_meta['field_type'] && 'google_captcha' != $current_settings_meta['field_type'] ) {
										echo '<div class="form-group">';
										echo '<span class="help-block">' . esc_html( $avail_fields[ $j ]['title'] );
										echo ( 'required' === $required ) ? '<span class="input_required"> *</span></span>' : '</span>';
										if ( 'select' == $current_settings_meta['field_type'] ) {
											if ( 'woo_order_id' == $avail_fields[ $j ]['slug'] ) {
											  $current_settings_meta['field_type'] = 'text';
											}
										}
										switch ( $current_settings_meta['field_type'] ) {
											case 'text':
												$readonly = '';
												if ( ! in_array( 'manage_tickets', $access ) ) {
													$readonly = 'readonly';
												}
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="text" AUTOCOMPLETE="off" class="form-control ' . esc_html( $required_text ) . ' crm-form-element-input ticket_input_text_' . esc_html( $ticket_id ) . '" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '" ' . esc_html( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '">';
												break;
											case 'ip':
												echo '<label style="font-weight: normal !important;">' . esc_html( $field_ticket_value ) . '</label>';
												break;
											case 'date':
												$readonly = '';
												if ( ! in_array( 'manage_tickets', $access ) ) {
													$readonly = 'readonly';
												}
												$value = '';
												if ( '' != $field_ticket_value ) {
													$value = 'value="' . $field_ticket_value . '"';
												}
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="text" AUTOCOMPLETE="off" class="form-control ' . esc_html( $required_text ) . ' crm-form-element-input trigger_date_jq ticket_input_date_' . esc_html( $ticket_id ) . '" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '_t_' . esc_html( $ticket_id ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '" ' . esc_html( $readonly ) . ' ' . esc_html( $value ) . '>';
												break;
											case 'email':
												$readonly = '';
												if ( ! in_array( 'manage_tickets', $access ) ) {
													$readonly = 'readonly';
												}
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="email" AUTOCOMPLETE="off" class="form-control ' . esc_html( $required_text ) . ' crm-form-element-input ticket_input_email_' . esc_html( $ticket_id ) . '" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '" ' . esc_html( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '">';
												break;
											case 'phone':
												$readonly = '';
												if ( ! in_array( 'manage_tickets', $access ) ) {
													$readonly = 'readonly';
												}
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<span><strong>+</strong><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" min="0" AUTOCOMPLETE="off" class="form-control ' . esc_html( $required_text ) . ' crm-form-element-input ticket_input_number_' . esc_html( $ticket_id ) . '" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '" ' . esc_html( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '" style="display: inline !important; width: 97% !important;"></span>';
												break;
											case 'number':
												$readonly = '';
												if ( ! in_array( 'manage_tickets', $access ) ) {
													$readonly = 'readonly';
												}
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="number" AUTOCOMPLETE="off" class="form-control ' . esc_html( $required_text ) . ' crm-form-element-input ticket_input_number_' . esc_html( $ticket_id ) . '" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '" ' . esc_html( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '">';
												break;
											case 'password':
												$readonly = '';
												if ( in_array( 'manage_tickets', $access ) ) {
													$readonly = 'onfocus="this.removeAttribute(\'readonly\');"';
												}
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="password" AUTOCOMPLETE="false" readonly class="form-control ' . esc_html( $required_text ) . ' crm-form-element-input ticket_input_pwd_' . esc_html( $ticket_id ) . '" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '" ' . esc_html( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '">';
												break;
											case 'select':
												$field_values  = $current_settings_meta['field_values'];
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<select class="form-control crm-form-element-input ' . esc_html( $required_text ) . ' ticket_input_select_' . esc_html( $ticket_id ) . '" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '">';
												echo '<option value="">' . esc_html( isset( $current_settings_meta['field_placeholder'] ) ? htmlentities( $current_settings_meta['field_placeholder'] ) : '-' ) . '</option>';
												foreach ( $field_values as $key => $value ) {
													if ( in_array( 'manage_tickets', $access ) ) {
														$selected = '';
														if ( $key == $field_ticket_value ) {
															$selected = 'selected';
														}
														echo '<option value="' . esc_attr( $key ) . '" ' . esc_html( $selected ) . '>' . esc_html( $value ) . '</option>';
													} else {
														if ( $key == $field_ticket_value ) {
															echo '<option value="' . esc_attr( $key ) . '" selected>' . esc_html( $value ) . '</option>';
														}
													}
												}
												echo '</select>';
												break;
											case 'radio':
												$required_radio = '';
												if ( 'required' == $required ) {
													$required_radio = 'radio_required';
												}
												$field_values = $current_settings_meta['field_values'];
												echo '<span style="vertical-align: middle;">';
												foreach ( $field_values as $key => $value ) {
													if ( in_array( 'manage_tickets', $access ) ) {
														$checked = '';
														if ( $key == $field_ticket_value ) {
															$checked = 'checked';
														}
														echo '<input type="radio" style="margin-top: 0;" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" name="' . esc_html( $avail_fields[ $j ]['slug'] ) . '_' . esc_html( $ticket_id ) . '" class="form-control ' . esc_html( $required_radio ) . ' ticket_input_radio_' . esc_html( $ticket_id ) . '" value="' . esc_attr( $key ) . '" ' . esc_html( $checked ) . '> ' . esc_html( $value ) . '<br>';
													} else {
														if ( $key == $field_ticket_value ) {
															echo '<input type="radio" style="margin-top: 0;" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" name="' . esc_html( $avail_fields[ $j ]['slug'] ) . '_' . esc_html( $ticket_id ) . '" class="form-control ' . esc_html( $required_radio ) . ' ticket_input_radio_' . esc_html( $ticket_id ) . '" value="' . esc_attr( $key ) . '" checked readonly> ' . esc_html( $value ) . '<br>';
														}
													}
												}
												echo '</span>';
												break;
											case 'checkbox':
												$required_check = '';
												if ( 'required' == $required ) {
													$required_check = 'check_required';
												}
												$field_values       = $current_settings_meta['field_values'];
												$field_ticket_value = is_array( $field_ticket_value ) ? $field_ticket_value : array();
												echo '<span style="vertical-align: middle;">';
												foreach ( $field_values as $key => $value ) {
													if ( in_array( 'manage_tickets', $access ) ) {
														$checked = '';
														if ( in_array( $key, $field_ticket_value ) ) {
															$checked = 'checked';
														}
														echo '<input type="checkbox" style="margin-top: 0;" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" class="form-control ' . esc_html( $required_check ) . ' ticket_input_checkbox_' . esc_html( $ticket_id ) . '" value="' . esc_attr( $key ) . '" ' . esc_html( $checked ) . '> ' . esc_html( $value ) . '<br>';
													} else {
														if ( in_array( $key, $field_ticket_value ) ) {
															echo '<input type="checkbox" style="margin-top: 0;" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" class="form-control ' . esc_html( $required_check ) . ' ticket_input_checkbox_' . esc_html( $ticket_id ) . '" value="' . esc_attr( $key ) . '" checked readonly> ' . esc_html( $value ) . '<br>';
														}
													}
												}
												echo '</span>';
												break;
											case 'textarea':
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												$readonly = '';
												if ( ! in_array( 'manage_tickets', $access ) ) {
													$readonly = 'readonly';
												}
												echo '<textarea class="form-control ' . esc_html( $required_text ) . ' except_rich ticket_input_textarea_' . esc_html( $ticket_id ) . '" id="' . esc_html( $avail_fields[ $j ]['slug'] ) . '" ' . esc_html( $readonly ) . '>' . esc_html( $field_ticket_value ) . '</textarea>';
												break;
										}
										echo '</div>';
									}
								}
							}
						}
						?>
					</div>
					<div class="col-md-9 Ws-content-detail-full">
						<div class="single_ticket_panel rightPanel">
							<div class="rightPanelHeader">
								<div class="leftFreeSpace">
									<div class="icon" style="top: 5% !important;"><img src="<?php echo esc_url( EH_CRM_MAIN_IMG . 'message_icon.png' ); ?>"></div>
									<div class="tictxt">

									<p style="margin-top: 5px;" class="info">
										<i class="glyphicon glyphicon-user"></i> by
									<?php
									if ( 0 != $current[0]['ticket_author'] ) {
										$raiser_obj = new WP_User( $current[0]['ticket_author'] );
										echo esc_html( $raiser_obj->display_name );
									} else {
										echo esc_html( $current[0]['ticket_email'] );
									}
									?>
										| <i class="glyphicon glyphicon-calendar"></i> <?php echo esc_html( TimestampCaster::cast( $reply_ticket[0]['ticket_date'], 'ticket_date' ) ); ?>
										| <i class="glyphicon glyphicon-time"></i>
										<?php
										$solved = false;
										$meta   = eh_crm_get_ticketmeta_archive( $ticket_id );
										if ( 'label_LL02' == $meta['ticket_label'] ) {
											$solved = true;
										}
										//Average Total Time for Agent's Solved tickets
										if ( $solved ) {
											$dteDifference   = array();
											$latest_reply_id = eh_crm_get_ticket_value_count_archive( 'ticket_category', 'agent_note' , true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id' );
											if ( ! $latest_reply_id ) {
												$ticket_time     = eh_crm_get_formatted_date( $current[0]['ticket_date'] );
												$last_reply_time = eh_crm_get_formatted_date( $current[0]['ticket_date'] );
											} else {
												$latest_ticket_reply = eh_crm_get_ticket_archive( array( 'ticket_id' => $latest_reply_id[0]['ticket_id'] ) );
												$ticket_time         = eh_crm_get_formatted_date( $current[0]['ticket_date'] );
												$last_reply_time     = eh_crm_get_formatted_date( $latest_ticket_reply[0]['ticket_date'] );
											}
											esc_html_e( 'Total time ', 'wsdesk' );
											$dteDifference[0] = eh_crm_dateDiffe( $ticket_time, $last_reply_time );
											echo esc_html( $dteDifference[0][0] ) . 'D:' . esc_html( $dteDifference[0][1] ) . 'H:' . esc_html( $dteDifference[0][2] ) . 'M';
										}
										//Average Total Time for Agent's Unsolved tickets
										if ( ! $solved ) {
											$ticket_time  = eh_crm_get_formatted_date( $current[0]['ticket_date'] );
											$current_time = eh_crm_get_formatted_date( gmdate( 'M d, Y H:i:s', time() ) );
											esc_html_e( 'Total time ', 'wsdesk' );
											$dteDifference[0] = eh_crm_dateDiffe( $ticket_time, $current_time );
											echo esc_html( $dteDifference[0][0] ) . 'D:' . esc_html( $dteDifference[0][1] ) . 'H:' . esc_html( $dteDifference[0][2] ) . 'M';
										}
										?>

										| <i class="glyphicon glyphicon-comment"></i>
										<?php
										$raiser_voice = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $ticket_id, false, 'ticket_category', 'raiser_reply' );
										echo count( $raiser_voice ) . ' ' . esc_html__( 'Raiser Voice', 'wsdesk' );
										?>
										| <i class="glyphicon glyphicon-bullhorn"></i>
										<?php
										$agent_voice = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $ticket_id, false, 'ticket_category', 'agent_reply' );
										echo count( $agent_voice ) . ' ' . esc_html__( 'Agent Voice', 'wsdesk' );
										?>
										| <i class="glyphicon glyphicon-star"></i> Rating : <?php echo ( isset( $current_meta['ticket_rating'] ) ? esc_html( ucfirst( $current_meta['ticket_rating'] ) ) : esc_html__( 'None', 'wsdesk' ) ); ?>
									</p>
									<?php
									if ( EH_CRM_WOO_STATUS ) {
										$woo_orders = eh_crm_get_settingsmeta( 0, 'woo_order_tickets' );
										$woo_access = eh_crm_get_settingsmeta( 0, 'woo_order_access' );
										$woo_price  = eh_crm_get_settingsmeta( 0, 'woo_order_price' );
										$role       = '';
										if ( in_array( 'administrator', $logged_user->roles ) ) {
											$role = 'administrator';
										} elseif ( in_array( 'WSDesk_Supervisor', $logged_user->roles ) ) {
											$role = 'WSDesk_Supervisor';
										} elseif ( in_array( 'WSDesk_Agents', $logged_user->roles ) ) {
											$role = 'WSDesk_Agents';
										}
										if ( 'enable' && in_array( $role, $woo_access ) == $woo_orders ) {
											$raiser_id = $current[0]['ticket_author'];
											if ( 0 == $raiser_id ) {
												$user = get_user_by( 'email', $current[0]['ticket_email'] );
												if ( $user ) {
													$raiser_id = $user->ID;
												}
											}
											$customer_orders = array();
											if ( WC()->version < '2.7.0' ) {
												if ( 0 != $raiser_id ) {
													$customer_orders = get_posts(
														array(
															'orderby' => 'ID',
															'numberposts' => -1,
															'meta_key'    => '_customer_user',
															'meta_value'  => $raiser_id,
															'post_type'   => wc_get_order_types(),
															'post_status' => array_keys( wc_get_order_statuses() ),
															'fields' => 'ids',
														)
													);
												}
												if ( ! empty( $customer_orders ) ) {
													$order_id_url = '';
													$total_amount = 0;
													$order_count  = count( $customer_orders );
													$count        = 0;

													foreach ( $customer_orders as $order ) {
														$order_data = wc_get_order( $order );
														if ( $order_data->get_status() == 'completed' ) {
															$total_amount += $order_data->get_total();
														}
														if ( $count < 5 ) {
															$order_id_url .= ' <a href="' . admin_url( 'post.php?post=' . $order . '&action=edit' ) . '" target="_blank">  #' . $order . '</a>,';
															$count ++;
														}
													}
													echo '<p style="margin-top: 5px;" class="info"><i class="glyphicon glyphicon-shopping-cart"></i> ' . esc_html__( 'Total Orders', 'wsdesk' ) . ' : ' . esc_html( $order_count ) . ' | ' . esc_html__( 'Recent Order', 'wsdesk' ) . ' : [ ' . wp_kses_post( rtrim( $order_id_url, ', ' ) ) . ' ]';
													if ( 'enable' == $woo_price ) {
														echo ' | ' . esc_html__( 'Total Purchase', 'wsdesk' ) . ' : ' . esc_html( get_woocommerce_currency_symbol() ) . esc_html( $total_amount ) . ' ' . esc_html( get_woocommerce_currency() );
													}
													echo '</p>';
												} else {
													?>
														<p style="margin-top: 5px;" class="info">
															<i class="glyphicon glyphicon-shopping-cart"></i> <?php esc_html_e( 'Total Orders', 'wsdesk' ); ?> : 0 | <?php esc_html_e( 'Recent Order', 'wsdesk' ); ?> : <?php esc_html_e( 'None', 'wsdesk' ); ?> | <?php esc_html_e( 'Total Purchase', 'wsdesk' ); ?> : <?php echo esc_html( get_woocommerce_currency_symbol() ) . '0 ' . esc_html( get_woocommerce_currency() ); ?>
														</p>
														<?php
												}
											} else {
												if ( 0 != $raiser_id ) {
													$customer_orders        = wc_get_orders( array( 'customer_id' => $raiser_id ) );
													$customer_temp_altered  = array();
													$customer_temp_original = array();
													foreach ( $customer_orders as $key => $customer_order ) {
														array_push( $customer_temp_altered, trim( str_replace( ' ', '', $customer_order->get_order_number() ) ) );
														$order_id = $customer_order->get_id();
														array_push( $customer_temp_original, $order_id );
													}
													$customer_orders = $customer_temp_altered;
												}
												if ( ! empty( $customer_orders ) ) {
													$order_id_url = '';
													$total_amount = 0;
													$order_count  = count( $customer_orders );
													$count        = 0;

													foreach ( $customer_orders as $key => $order ) {
														$order_data = wc_get_order( $customer_temp_original[ $key ] );
														if ( $order_data->get_status() == 'completed' ) {
															$total_amount += $order_data->get_total();
														}
														if ( $count < 5 ) {
															$order_id_url .= ' <a href="' . admin_url( 'post.php?post=' . esc_html( $customer_temp_original[ $key ] ) . '&action=edit' ) . '" target="_blank">  #' . esc_html( $order ) . '</a>,';
															$count ++;
														}
													}
													echo '<p style="margin-top: 5px;" class="info"><i class="glyphicon glyphicon-shopping-cart"></i> ' . esc_html__( 'Total Orders', 'wsdesk' ) . ' : ' . esc_html( $order_count ) . ' | ' . esc_html__( 'Recent Order', 'wsdesk' ) . ' : [ ' . wp_kses_post( rtrim( $order_id_url, ', ' ) ) . ' ]';
													if ( 'enable' == $woo_price ) {
														echo ' | ' . esc_html__( 'Total Purchase', 'wsdesk' ) . ' : ' . esc_html( get_woocommerce_currency_symbol() ) . esc_html( $total_amount ) . ' ' . esc_html( get_woocommerce_currency() );
													}
													echo '</p>';
												} else {
													?>
														<p style="margin-top: 5px;" class="info">
															<i class="glyphicon glyphicon-shopping-cart"></i> <?php esc_html_e( 'Total Orders', 'wsdesk' ); ?> : 0 | <?php esc_html_e( 'Recent Order', 'wsdesk' ); ?> : <?php esc_html_e( 'None', 'wsdesk' ); ?> | <?php esc_html_e( 'Total Purchase', 'wsdesk' ); ?> : <?php echo esc_html( get_woocommerce_currency_symbol() ) . '0 ' . esc_html( get_woocommerce_currency() ); ?>
														</p>
														<?php
												}
											}
										}
									}
									?>
									</div>
								</div>
							</div>
							<input type="hidden" id="hidden_ticket_id" value="<?php echo esc_html( $ticket_id ); ?>"/>
							<div class="newMsgFull">
								<div class="leftFreeSpace">
									<div class="content">
										<div class="message-box">
									<?php
									if ( in_array( 'reply_tickets', $access ) ) {
										?>
											<div class="row">
												<div class="col-md-12">
													<div class="widget-area no-padding blank" style="width:100%">
														<div class="status-upload">
														<?php if ( eh_crm_get_settingsmeta( 0, 'auto_suggestion' ) == 'enable' ) { ?>
															<div id="suggestion">
																<div id="suggestion-form" style='display:none;' class="panel panel-default suggest-form-<?php echo esc_html( $ticket_id ); ?>">
																	<ul class="suggest_ul">
																		<?php
																		if ( ! empty( $response ) ) {
																			for ( $count_response = 0;$count_response < count( $response );$count_response++ ) {
																				echo '<li class="clickable suggest_li" id="' . esc_html( $ticket_id ) . '"><span style="color:black;" id="sug_title">' . esc_html( $response[ $count_response ]['title'] ) . '</span><br><span style="color:blue;" id="sug_url">' . esc_html( $response[ $count_response ]['guid'] ) . '</span></li>';
																				if ( count( $response ) != $count_response + 1 ) {
																					echo '<hr>';
																				}
																			}
																		} else {
																			echo '<li> ' . esc_html__( 'No Suggestions', 'wsdesk' ) . ' </li>';
																		}
																		?>
																	</ul>
																</div>
																<div id="suggestion-tab" class="<?php echo esc_html( $ticket_id ); ?>"><?php esc_html_e( 'Suggestions', 'wsdesk' ); ?></div>
															</div>
															<?php
														} $signature = '';
														if ( EH_CRM_WSDESK_SIGNATURE_STATUS ) {
															$signature = '<br><p>--</p>' . get_option( 'wsdesk_agent_common_signature' ) . get_user_meta( get_current_user_id(), 'wsdesk_agent_signature', true );
														}
														?>
														</div>
													</div>
												</div>
											</div>
										   <?php } ?>
										</div>
									</div>
								</div>
							</div>
							<?php
							$reply_id = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $ticket_id, false, '', '', 'ticket_updated', 'DESC' );
							array_push( $reply_id, array( 'ticket_id' => $ticket_id ) );
							if ( EH_CRM_WOO_VENDOR ) {
							   $reply_id = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $ticket_id, false, '', '', 'ticket_updated', 'DESC', 'vendor' );
							   array_push( $reply_id, array( 'ticket_id' => $ticket_id ) );
							}
							for ( $s = 0;$s < count( $reply_id );$s++ ) {

								$quote      = '';
								$quote_text = '';
								if ( 0 == $s ) {
									$quote      = '<span class="button button-info pull-right quote_button" id="' . esc_html( $ticket_id ) . '">' . esc_html__( 'Quote', 'wsdesk' ) . '</span>';
									$quote_text = 'id="' . esc_html( $ticket_id ) . '_quote_text_ticket_content"';
								}
								$reply_ticket      = eh_crm_get_ticket_archive( array( 'ticket_id' => $reply_id[ $s ]['ticket_id'] ) );
								$reply_ticket_meta = eh_crm_get_ticketmeta_archive( $reply_id[ $s ]['ticket_id'] );
								$replier_name      = '';
								$replier_email     = $reply_ticket[0]['ticket_email'];
								$replier_pic       = '';
								if ( 0 != $reply_ticket[0]['ticket_author'] ) {
									$replier_obj  = new WP_User( $reply_ticket[0]['ticket_author'] );
									$replier_name = $replier_obj->display_name;
									$replier_pic  = get_avatar_url( $reply_ticket[0]['ticket_author'], array( 'size' => 50 ) );
								} else {
									$replier_name = 'Guest';
									$replier_pic  = get_avatar_url( $reply_ticket[0]['ticket_email'], array( 'size' => 50 ) );
								}
								$attachment = '';
								if ( isset( $reply_ticket_meta['ticket_attachment'] ) ) {
									$reply_att  = $reply_ticket_meta['ticket_attachment'];
									$attachment = '<div>';
									for ( $at = 0;$at < count( $reply_att );$at++ ) {
										$current_att = $reply_att[ $at ];
										$att_ext     = pathinfo( $current_att, PATHINFO_EXTENSION );
										if ( empty( $att_ext ) ) {
										   $att_ext = '';
										}
										$att_name = pathinfo( $current_att, PATHINFO_FILENAME );
										$img_ext  = array( 'jpg', 'jpeg', 'png', 'gif' );
										if ( in_array( strtolower( $att_ext ), $img_ext ) ) {
											$attachment .= '<a href="' . esc_html( $current_att ) . '" target="_blank"><img class="img-upload clickable" style="width:200px" title="' . esc_html( $att_name ) . '" src="' . esc_html( $current_att ) . '"></a></p>';
										} else {
											$check_file_ext = array( 'doc', 'docx', 'pdf', 'xml', 'csv', 'xlsx', 'xls', 'txt', 'zip', 'mp3', 'mp4', 'syx', 'cdr', 'bmp' );
											if ( in_array( $att_ext, $check_file_ext ) ) {
												$attachment .= '<a href="' . esc_html( $current_att ) . '" target="_blank" title="' . esc_html( $att_name ) . '" class="img-upload"><div class="' . esc_html( $att_ext ) . '"></div></a>';
											} else {
												$attachment .= '<a href="' . esc_html( $current_att ) . '" target="_blank" title="' . esc_html( $att_name ) . '" class="img-upload"><div class="unknown_type"></div></a>';
											}
										}
									}
									$attachment .= '</div>';
								}
								$color = '';
								switch ( $reply_ticket[0]['ticket_category'] ) {
									case 'satisfaction_survey':
										if ( 'great' == $current_meta['ticket_rating'] ) {
											$color = 'background-color: #88fcb6 !important';
										} else {
											$color = 'background-color: #f7aba5 !important';
										}
										break;
									case 'agent_note':
										$color = 'background-color: aliceblue!important';
										break;
									default:
										break;
								}
								echo '<div class="conversation_each" style="' . esc_html( $color ) . '">
                                            <div class="leftFreeSpace">
                                            <div class="icon"><img src="' . esc_html( $replier_pic ) . '" style="border-radius: 25px;"></div>
                                            <h3>' . esc_html( $replier_name ) . '</h3>
                                            <h4>' . esc_html( $replier_email ) . ' | ' . esc_html( TimestampCaster::cast( $reply_ticket[0]['ticket_date'], 'ticket_date' ) ) . ' </h4>
                                            ' . ( ( 'satisfaction_survey' === $reply_ticket[0]['ticket_category'] ) ? '<b>' . esc_html__( 'Satisfaction Comment', 'wsdesk' ) . '</b><br>' : '' ) . '
                                            <p>';

												$input_data = ( 'text' != $tickets_display ) ? ( html_entity_decode( $reply_ticket[0]['ticket_content'] ) ) : htmlentities( $reply_ticket[0]['ticket_content'] );

												echo wp_kses_post( eh_crm_collapse_ticket_content( $input_data ) );
											echo '</p>
                                            ' . esc_html( $attachment ) . '
                                            </div>
                                        </div>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
			return ob_get_clean();
	}

	public static function eh_crm_settings_restore_trash() {
		set_time_limit( 'max_execution_time', 300 );
		global $wpdb;
		$tickets_id = $wpdb->get_results( $wpdb->prepare( 'SELECT ticket_id from ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_trash = 1 AND ticket_parent=0' ), ARRAY_A );
		if ( ! $tickets_id ) {
			die(
				json_encode(
					array(
						'result' => 'failed',
						'alert'  => esc_html__(
							'No tickets in trash',
							'wsdesk'
						),
					)
				)
			);
		}
		for ( $i = 0;$i < count( $tickets_id );$i++ ) {
			$child = $wpdb->get_results( $wpdb->prepare( 'SELECT ticket_id from ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_parent= %s', $table, $tickets_id[ $i ]['ticket_id'] ), ARRAY_A );
			for ( $j = 0;$j < count( $child );$j++ ) {
				eh_crm_restore_trash_ticket( $child[ $j ]['ticket_id'] );
			}
			eh_crm_restore_trash_ticket( $tickets_id[ $i ]['ticket_id'] );
		}
		die( json_encode( array( 'result' => 'success' ) ) );
	}

	public static function eh_crm_get_translated_months_value( $start_date, $end_date ) {
		if ( strpos( $start_date, 'Dez' ) !== false ) {
			$start_date = str_replace( 'Dez', 'dec', $start_date );
		}
		if ( strpos( $end_date, 'Dez' ) !== false ) {
			$end_date = str_replace( 'Dez', 'dec', $end_date );
		}if ( strpos( $start_date, 'Dic' ) !== false ) {
			$start_date = str_replace( 'Dic', 'dec', $start_date );
		}
		if ( strpos( $end_date, 'Dic' ) !== false ) {
			$end_date = str_replace( 'Dic', 'dec', $end_date );
		}if ( strpos( $start_date, 'Déc' ) !== false ) {
			$start_date = str_replace( 'Déc', 'dec', $start_date );
		}
		if ( strpos( $end_date, 'Déc' ) !== false ) {
			$end_date = str_replace( 'Déc', 'dec', $end_date );
		}
		if ( strpos( $start_date, 'Ott' ) !== false ) {
			$start_date = str_replace( 'Ott', 'oct', $start_date );
		}if ( strpos( $end_date, 'Ott' ) !== false ) {
			$end_date = str_replace( 'Ott', 'oct', $end_date );
		}

		if ( strpos( $end_date, 'Ago' ) !== false ) {
			$end_date = str_replace( 'Ago', 'aug', $end_date );
		}

		if ( strpos( $start_date, 'okt' ) !== false ) {
			$start_date = str_replace( 'okt', 'oct', $start_date );
		}
		if ( strpos( $end_date, 'okt' ) !== false ) {
			$end_date = str_replace( 'okt', 'oct', $end_date );
		}
		if ( strpos( $end_date, 'Ago' ) !== false ) {
			$end_date = str_replace( 'Ago', 'aug', $end_date );
		}
		if ( strpos( $start_date, 'Ago' ) !== false ) {
			$start_date = str_replace( 'Ago', 'aug', $start_date );
		}
		if ( strpos( $end_date, 'Ago' ) !== false ) {
			$end_date = str_replace( 'Ago', 'aug', $end_date );
		}
		if ( strpos( $start_date, 'Août' ) !== false ) {
			$start_date = str_replace( 'Août', 'aug', $start_date );
		}
		if ( strpos( $end_date, 'Août' ) !== false ) {
			$end_date = str_replace( 'Août', 'aug', $end_date );
		}
		if ( strpos( $start_date, 'Gen' ) !== false ) {
			$start_date = str_replace( 'Gen', 'jan', $start_date );
		}
		if ( strpos( $end_date, 'Gen' ) !== false ) {
			$end_date = str_replace( 'Gen', 'jan', $end_date );
		}
		if ( strpos( $start_date, 'Gen' ) !== false ) {
			$start_date = str_replace( 'Gen', 'jan', $start_date );
		}
		if ( strpos( $end_date, 'Ene' ) !== false ) {
			$end_date = str_replace( 'Ene', 'jan', $end_date );
		}
		if ( strpos( $start_date, 'Fév' ) !== false ) {
			$start_date = str_replace( 'Fév', 'feb', $start_date );
		}
		if ( strpos( $end_date, 'Fév' ) !== false ) {
			$end_date = str_replace( 'Fév', 'feb', $end_date );
		}
		if ( strpos( $start_date, 'Mär' ) !== false ) {
			$start_date = str_replace( 'Mär', 'mar', $start_date );
		}
		if ( strpos( $end_date, 'Mär' ) !== false ) {
			$end_date = str_replace( 'Mär', 'mar', $end_date );
		}if ( strpos( $start_date, 'Maa' ) !== false ) {
			$start_date = str_replace( 'Maa', 'mar', $start_date );
		}
		if ( strpos( $end_date, 'Maa' ) !== false ) {
			$end_date = str_replace( 'Maa', 'mar', $end_date );
		}if ( strpos( $start_date, 'Avr' ) !== false ) {
			$start_date = str_replace( 'Avr', 'apr', $start_date );
		}
		if ( strpos( $end_date, 'Avr' ) !== false ) {
			$end_date = str_replace( 'Avr', 'apr', $end_date );
		}if ( strpos( $start_date, 'Mai' ) !== false ) {
			$start_date = str_replace( 'Mai', 'may', $start_date );
		}
		if ( strpos( $end_date, 'Mai' ) !== false ) {
			$end_date = str_replace( 'Mai', 'may', $end_date );
		}if ( strpos( $start_date, 'Mei' ) !== false ) {
			$start_date = str_replace( 'Mei', 'may', $start_date );
		}
		if ( strpos( $end_date, 'Mei' ) !== false ) {
			$end_date = str_replace( 'Mei', 'may', $end_date );
		}if ( strpos( $start_date, 'Jui' ) !== false ) {
			$start_date = str_replace( 'Jui', 'jun', $start_date );
		}
		if ( strpos( $end_date, 'Jui' ) !== false ) {
			$end_date = str_replace( 'Jui', 'jun', $end_date );
		}if ( strpos( $start_date, 'Juil' ) !== false ) {
			$start_date = str_replace( 'Juil', 'jul', $start_date );
		}

		if ( strpos( $end_date, 'Juil' ) !== false ) {
			$end_date = str_replace( 'Juil', 'jul', $end_date );
		}if ( strpos( $start_date, 'junl' ) !== false ) {
			$start_date = str_replace( 'junl', 'jul', $start_date );
		}
		if ( strpos( $end_date, 'junl' ) !== false ) {
			$end_date = str_replace( 'junl', 'jul', $end_date );
		}
		if ( strpos( $start_date, 'Lug' ) !== false ) {
			$start_date = str_replace( 'Lug', 'jul', $start_date );
		}
		if ( strpos( $end_date, 'Lug' ) !== false ) {
			$end_date = str_replace( 'Lug', 'jul', $end_date );
		}
		if ( strpos( $start_date, 'Set' ) !== false ) {
			$start_date = str_replace( 'Set', 'sep', $start_date );
		}
		if ( strpos( $end_date, 'Set' ) !== false ) {
			$end_date = str_replace( 'Set', 'sep', $end_date );
		}if ( strpos( $start_date, 'Giu' ) !== false ) {
			$start_date = str_replace( 'Giu', 'jun', $start_date );
		}
		if ( strpos( $end_date, 'Giu' ) !== false ) {
			$end_date = str_replace( 'Giu', 'jun', $end_date );
		}

		if ( strpos( $start_date, 'Mag' ) !== false ) {
			$start_date = str_replace( 'Mag', 'may', $start_date );
		}
		if ( strpos( $end_date, 'Mag' ) !== false ) {
			$end_date = str_replace( 'Mag', 'may', $end_date );
		}



		$date = array( $start_date, $end_date );
		return $date;
	}

	public static function eh_crm_archive_ticket_data() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			if ( ! isset( $_POST['start_date'] ) || ! isset( $_POST['end_date'] ) ) {
				wp_send_json_error( array(), 422 );
			}

			$statuses = array();

			if ( isset( $_POST['status'] ) ) {
				$count = count( $_POST['status'] );

				for ( $i = 0; $i < $count; $i++ ) {
					if ( isset( $_POST['status'][ $i ] ) ) {
						$statuses[] = sanitize_text_field( $_POST['status'][ $i ] );
					}
				}
			}

			$filter = array(
				'created_at' => array(
					sanitize_text_field( $_POST['start_date'] ),
					sanitize_text_field( $_POST['end_date'] ),
				),
				'view'       => array( 'labels' => $statuses ),
			);

			$repo = new \WSDesk\Tickets\TicketRepository();
			$data = $repo->archiveTickets( $filter );

			$data['result'] = esc_html__( 'success' );

			wp_send_json( $data );
			die;
		}
	}

	public static function eh_crm_archive_ticket_data_restored() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$filters = array();
			$repo    = new TicketArchiveRepository();
			if ( ! empty( $_POST['status'][0] ) ) {
				$filters['view']['labels'] = array_map( 'sanitize_text_field', $_POST['status'][0] );
			}

			$filters['created_at'][] = isset( $_POST['start_date'] ) ? sanitize_text_field( $_POST['start_date'] ) : '';
			$filters['created_at'][] = isset( $_POST['end_date'] ) ? sanitize_text_field( $_POST['end_date'] ) : '';

			$repo->restore( $filters );
			die( json_encode( array( 'result' => 'success' ) ) );
		}
	}

	public static function eh_crm_ticket_refresh_left_bar_archive() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$active = isset( $_POST['active'] ) ? sanitize_text_field( $_POST['active'] ) : 'all';
			ob_start();
			$label_args         = array(
				'type'   => 'label',
				'filter' => 'yes',
			);
			$label_fields       = array( 'slug', 'title', 'settings_id' );
			$avail_labels       = eh_crm_get_settings( $label_args, $label_fields );
			$tag_args           = array(
				'type'   => 'tag',
				'filter' => 'yes',
			);
			$tag_fields         = array( 'slug', 'title', 'settings_id' );
			$avail_tags         = eh_crm_get_settings( $tag_args, $tag_fields );
			$user_roles_default = array( 'WSDesk_Agents', 'WSDesk_Supervisor', 'administrator' );
			$users              = get_users( array( 'role__in' => $user_roles_default ) );
			$users_data         = array();
			for ( $i = 0; $i < count( $users ); $i++ ) {
				$current                   = $users[ $i ];
				$id                        = $current->ID;
				$user                      = new WP_User( $id );
				$users_data[ $i ]['id']    = $id;
				$users_data[ $i ]['name']  = $user->display_name;
				$users_data[ $i ]['caps']  = $user->caps;
				$users_data[ $i ]['email'] = $user->user_email;
			}
			if ( ! isset( $_COOKIE['collapsed_views'] ) ) {
				$collapsed_views = array();
			} else {
				$collapsed_views = stripslashes( sanitize_text_field( $_COOKIE['collapsed_views'] ) );
				$collapsed_views = str_replace( '"', '', $collapsed_views );
				$collapsed_views = str_replace( '[', '', $collapsed_views );
				$collapsed_views = str_replace( ']', '', $collapsed_views );
				$collapsed_views = explode( ',', $collapsed_views );
			}
			?>
					<ul class="nav nav-pills nav-stacked side-bar-filter" id="all_section">
						<li class="<?php echo ( ( 'all' == $active ) ? 'active' : '' ); ?>"><a href="#" id="all"><span class="badge pull-right"><?php echo count( eh_crm_get_ticket_value_count_archive( 'ticket_parent', 0 ) ); ?></span> <?php esc_html_e( 'All Tickets', 'wsdesk' ); ?> </a></li>
					</ul>
				<?php
				$cus_view    = 0;
				$view_html   = '';
				$avail_views = eh_crm_get_settingsmeta( 0, 'selected_views' );
				$avail_views = ( false == $avail_views ) ? array() : $avail_views;
				foreach ( $avail_views as $view ) {
					switch ( $view ) {
						case 'labels_view':
							$labels_collapsed = false;
							if ( in_array( 'labels', $collapsed_views ) ) {
								$labels_collapsed = true;
							}
							?>
								<hr>
								<h4>
								<?php esc_html_e( 'Status', 'wsdesk' ); ?>
									<span class="spinner_loader labels_loader">
										<span class="bounce1"></span>
										<span class="bounce2"></span>
										<span class="bounce3"></span>
									</span>
									<span id="labels_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo esc_html( $labels_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('labels');"></span>
									<span id="labels_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo esc_html( $labels_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('labels');">
								</h4>
								<ul class="nav nav-pills nav-stacked side-bar-filter" id="labels" <?php echo esc_html( $labels_collapsed ) ? "style='display: none;'" : ''; ?> >
								<?php
								for ( $i = 0; $i < count( $avail_labels ); $i++ ) {
									$label_color         = eh_crm_get_settingsmeta( $avail_labels[ $i ]['settings_id'], 'label_color' );
									$current_label_count = eh_crm_get_ticketmeta_value_count_archive( 'ticket_label', $avail_labels[ $i ]['slug'] );
									echo '<li class="' . esc_html( ( $active == $avail_labels[ $i ]['slug'] ) ? 'active' : '' ) . '"><a href="#" id="' . esc_html( $avail_labels[ $i ]['slug'] ) . '"><span class="badge pull-right" style="background-color:' . esc_html( $label_color ) . ' !important;">' . esc_html( count( $current_label_count ) ) . '</span> ' . esc_html( $avail_labels[ $i ]['title'] ) . ' </a></li>';
								}
								?>
								</ul>
								<?php
							break;
						case 'agents_view':
							if ( ! empty( $users_data ) ) {
								$agents_collapsed = false;
								if ( in_array( 'agents', $collapsed_views, true ) ) {
									$agents_collapsed = true;
								}
								?>
									<hr>
									<h4>
									<?php esc_html_e( 'Agents', 'wsdesk' ); ?>
										<span class="spinner_loader agents_loader">
											<span class="bounce1"></span>
											<span class="bounce2"></span>
											<span class="bounce3"></span>
										</span>
										<span id="agents_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo esc_html( $agents_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('agents');"></span>
										<span id="agents_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo esc_html( $agents_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('agents');">
									</h4>
									<ul class="nav nav-pills nav-stacked side-bar-filter" id="agents" <?php echo esc_html( $agents_collapsed ) ? "style='display: none;'" : ''; ?>>
									<?php
										$user_id_agent         = get_current_user_id();
										$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
										$user_id_agent_role    = $user_id_agent_details->roles;
										$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );
									if ( 'enable' !== $allow_agent_tickets ) {
										if ( in_array( 'WSDesk_Agents', $user_id_agent_role, true ) ) {
											for ( $i = 0; $i < count( $users_data ); $i++ ) {
												if ( $user_id_agent == $users_data[ $i ]['id'] ) {
												$current_agent_count = eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', $users_data[ $i ]['id'] );
													echo '<li><a href="#" id="' . esc_html( $users_data[ $i ]['id'] ) . '"><span class="badge pull-right">' . esc_html( count( $current_agent_count ) ) . '</span> ' . esc_html( $users_data[ $i ]['name'] ) . ' </a></li>';
												}
											}
										} else {
											for ( $i = 0; $i < count( $users_data ); $i++ ) {
												$current_agent_count = eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', $users_data[ $i ]['id'] );
												echo '<li><a href="#" id="' . esc_html( $users_data[ $i ]['id'] ) . '"><span class="badge pull-right">' . esc_html( count( $current_agent_count ) ) . '</span> ' . esc_html( $users_data[ $i ]['name'] ) . ' </a></li>';
											}
										}
									} else {
										for ( $i = 0; $i < count( $users_data ); $i++ ) {
											$current_agent_count = eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', $users_data[ $i ]['id'] );
											echo '<li><a href="#" id="' . esc_html( $users_data[ $i ]['id'] ) . '"><span class="badge pull-right">' . esc_html( count( $current_agent_count ) ) . '</span> ' . esc_html( $users_data[ $i ]['name'] ) . ' </a></li>';
										}
									}

										$current_agent_count = eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', array() );
									?>
										<li class="<?php echo ( ( 'unassigned' == $active ) ? 'active' : '' ); ?>"><a href="#" id="unassigned"><span class="badge pull-right"><?php echo esc_html( count( $current_agent_count ) ); ?></span> <?php esc_html_e( 'Unassigned', 'wsdesk' ); ?> </a></li>
									</ul>
									<?php
							}
							break;
						case 'tags_view':
							if ( ! empty( $avail_tags ) ) {
								$tags_collapsed = false;
								if ( in_array( 'tags', $collapsed_views ) ) {
									$tags_collapsed = true;
								}
								?>
									<hr>
									<h4>
									<?php esc_html_e( 'Tags', 'wsdesk' ); ?>
										<span class="spinner_loader tags_loader">
											<span class="bounce1"></span>
											<span class="bounce2"></span>
											<span class="bounce3"></span>
										</span>
										<span id="tags_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo esc_html( $tags_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('tags');"></span>
										<span id="tags_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo esc_html( $tags_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('tags');">
									</h4>
									<ul class="nav nav-pills nav-stacked side-bar-filter" id="tags" <?php echo esc_html( $tags_collapsed ) ? "style='display: none;'" : ''; ?>>
									<?php
									for ( $i = 0; $i < count( $avail_tags ); $i++ ) {
										$current_tags_count = eh_crm_get_ticketmeta_value_count_archive( 'ticket_tags', $avail_tags[ $i ]['slug'] );
										echo '<li class="' . esc_html( ( $active == $avail_tags[ $i ]['slug'] ) ? 'active' : '' ) . '"><a href="#" id="' . esc_html( $avail_tags[ $i ]['slug'] ) . '"><span class="badge pull-right">' . esc_html( count( $current_tags_count ) ) . '</span> ' . esc_html( $avail_tags[ $i ]['title'] ) . ' </a></li>';
									}
									?>
									</ul>
									<?php
							}
							break;
						case 'users_view':
							$users_collapsed = false;
							if ( in_array( 'users', $collapsed_views ) ) {
								$users_collapsed = true;
							}
							?>
								<hr>
								<h4>
								<?php esc_html_e( 'Users', 'wsdesk' ); ?>
									<span class="spinner_loader users_loader">
										<span class="bounce1"></span>
										<span class="bounce2"></span>
										<span class="bounce3"></span>
									</span>
									<span id="users_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo esc_html( $users_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('users');"></span>
									<span id="users_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo esc_html( $users_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('users');">
								</h4>
								<ul class="nav nav-pills nav-stacked side-bar-filter" id="users" <?php echo esc_html( $users_collapsed ) ? "style='display: none;'" : ''; ?>>
								<?php
									$registered_count = eh_crm_get_ticket_value_count_archive( 'ticket_author', 0, true, 'ticket_parent', 0 );
									echo '<li class="' . ( ( 'registeredU' == $active ) ? 'active' : '' ) . '"><a href="#" id="registeredU" class="user_section"><span class="badge pull-right">' . esc_html( count( $registered_count ) ) . '</span> ' . esc_html__( 'Registered Users', 'wsdesk' ) . ' </a></li>';
									$guest_count = eh_crm_get_ticket_value_count_archive( 'ticket_author', 0, false, 'ticket_parent', 0 );
									echo '<li class="' . ( ( 'guestU' == $active ) ? 'active' : '' ) . '"><a href="#" id="guestU" class="user_section"><span class="badge pull-right">' . esc_html( count( $guest_count ) ) . '</span> ' . esc_html__( 'Guest Users', 'wsdesk' ) . ' </a></li>';
								?>
								</ul>
								<?php
							break;
						default:
							$view_set      = eh_crm_get_settings(
								array(
									'slug' => $view,
									'type' => 'view',
								),
								array( 'slug', 'settings_id', 'title' )
							);
							$view_set_meta = eh_crm_get_settingsmeta( $view_set[0]['settings_id'] );
							$log_id        = get_current_user_id();
							$log_user      = get_user_by( 'ID', $log_id );
							$log_role      = $log_user->roles;
							$current_role  = '';
							if ( in_array( 'WSDesk_Agents', $log_role ) ) {
								$current_role = 'WSDesk_Agents';
							}
							if ( in_array( 'WSDesk_Supervisor', $log_role ) ) {
								$current_role = 'WSDesk_Supervisor';
							}
							if ( in_array( 'administrator', $log_role ) ) {
								$current_role = 'administrator';
							}
							if ( in_array( $current_role, $view_set_meta['view_access'] ) ) {
								$views_collapsed = false;
								if ( in_array( 'views', $collapsed_views ) ) {
									$views_collapsed = true;
								}
								$view_count = eh_crm_get_view_tickets( $view );
								$view_html .= '<ul class="nav nav-pills nav-stacked side-bar-filter" id="views"';
								$view_html .= ( $views_collapsed ) ? ' style="display: none;" ' : '';
								$view_html .= '><li class="' . esc_html( ( $active == $view ) ? 'active' : '' ) . '"><a href="#" id="' . esc_html( $view ) . '"><span class="badge pull-right">' . esc_html( count( $view_count ) ) . '</span> ' . esc_html( $view_set[0]['title'] ) . ' </a></li>
									</ul>';
								$cus_view++;
							}
							break;
					}
				}
				if ( 0 != $cus_view ) {
					$views_collapsed = false;
					if ( in_array( 'views', $collapsed_views ) ) {
						$views_collapsed = true;
					}
					?>
						<hr>
						<h4>
						Ticket Views
							<span class="spinner_loader views_loader">
								<span class="bounce1"></span>
								<span class="bounce2"></span>
								<span class="bounce3"></span>
							</span>
							<span id="views_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo esc_html( $views_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('views');"></span>
							<span id="views_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo esc_html( $views_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('views');">
						</h4>
						<?php
						echo esc_html( $view_html );
				}
				$content = ob_get_clean();
				die( esc_html( $content ) );
		}
	}

	public static function eh_crm_ticket_refresh_right_bar_archive() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$search_page     = ( isset( $_POST['cur'] ) ) ? sanitize_text_field( $_POST['cur'] ) : 1;
			$active          = isset( $_POST['active'] ) ? sanitize_text_field( $_POST['active'] ) : 'all';
			$order           = isset( $_POST['order'] ) ? sanitize_text_field( $_POST['order'] ) : 'DESC';
			$order_by        = isset( $_POST['order_by'] ) ? sanitize_text_field( $_POST['order_by'] ) : 'ticket_updated';
			$current_page_no = ( isset( $_POST['current_page'] ) ) ? sanitize_text_field( $_POST['current_page'] ) : 0;
			$current_page_n  = ( isset( $_POST['current_pa'] ) ) ? sanitize_text_field( $_POST['current_pa'] ) : $search_page;
			$pagination      = isset( $_POST['pagination_type'] ) ? sanitize_text_field( $_POST['pagination_type'] ) : '';
			$avail_labels_wf = eh_crm_get_settings( array( 'type' => 'label' ), array( 'slug', 'title', 'settings_id' ) );
			$avail_labels    = eh_crm_get_settings(
				array(
					'type'   => 'label',
					'filter' => 'yes',
				),
				array( 'slug', 'title', 'settings_id' )
			);
		$avail_tags_wf       = eh_crm_get_settings( array( 'type' => 'tag' ), array( 'slug', 'title', 'settings_id' ) );
		$avail_tags          = eh_crm_get_settings(
			array(
				'type'   => 'tag',
				'filter' => 'yes',
			),
			array( 'slug', 'title', 'settings_id' )
		);
		$avail_views         = eh_crm_get_settings( array( 'type' => 'view' ), array( 'slug', 'title', 'settings_id' ) );
		$user_roles_default  = array( 'WSDesk_Agents', 'WSDesk_Supervisor', 'administrator' );
		$users               = get_users( array( 'role__in' => $user_roles_default ) );
		$users_data          = array();
		$tickets_display     = eh_crm_get_settingsmeta( '0', 'tickets_display' );
			for ( $i = 0; $i < count( $users ); $i++ ) {
				$current                   = $users[ $i ];
				$id                        = $current->ID;
				$user                      = new WP_User( $id );
				$users_data[ $i ]['id']    = $id;
				$users_data[ $i ]['name']  = $user->display_name;
				$users_data[ $i ]['caps']  = $user->caps;
				$users_data[ $i ]['email'] = $user->user_email;
			}
		$ticket_rows = eh_crm_get_settingsmeta( 0, 'ticket_rows' );
			if ( '' == $ticket_rows ) {
				$ticket_rows = 25;
			}
		$current_page = $current_page_no;
		$offset       = ( $current_page ) * $ticket_rows;
			if ( '' != $pagination ) {
				switch ( $pagination ) {
					case 'current_page_n':
						if ( '' != $current_page_n ) {
							$current_page_n = $current_page_n --;
							$total          = count( eh_crm_get_ticket_value_count_archive( 'ticket_parent', 0 ) );
							if ( 0 == $ticket_rows % 2 ) {
								if ( $current_page_n <= ( $total / $ticket_rows ) - 1 ) {

									$current_pa   = $current_page_n * $ticket_rows;
									$current_page = $current_page_n;
									$offset       = $current_pa;

								} else {
									$last_page = ( $total / $ticket_rows );
									if ( is_float( $last_page ) ) {
										$last_page = $last_page ++;
									}

									$current_page = intval( $last_page );
									$current_page = $current_page --;

									$offset = ( $current_page ) * $ticket_rows;
									break;
								}
							}
							if ( 0 != $ticket_rows % 2 ) {
								if ( $current_page_n <= intval( $total / $ticket_rows ) - 1 ) {
									$current_pa   = $current_page_n * $ticket_rows;
									$current_page = $current_page_n;
									$offset       = $current_pa;
								} else {
									$last_page    = $total / $ticket_rows;
									$current_page = intval( $last_page );
									$current_page = $current_page;
									$offset       = ( $current_page ) * $ticket_rows;
									break;
								}
							}
						} else {

							$offset       = $current_page * $ticket_rows;
							$current_page = $current_page_no;
						}
						break;
					case 'prev':
						$current_page = $current_page_no --;
						$offset       = ( $current_page * $ticket_rows );
						break;
					case 'next':
						$current_page = $current_page_no ++;
						$offset       = ( $current_page * $ticket_rows );
						break;
				}
			}

			switch ( $active ) {
				case 'all':
					$table_title        = esc_html__( 'Archived Tickets', 'wsdesk' );
					$total_count        = count( eh_crm_get_ticket_value_count_archive( 'ticket_parent', 0 ) );
					$section_tickets_id = eh_crm_get_ticket_value_count_archive( 'ticket_parent', 0, false, '', '', $order_by, $order, $ticket_rows, $offset );
					$all_section_ids    = eh_crm_get_ticket_value_count_archive( 'ticket_parent', 0, false, '', '', $order_by, $order, '', 0 );
					break;
				case 'registeredU':
					$table_title        = esc_html__( 'Registered Users Tickets', 'wsdesk' );
					$total_count        = count( eh_crm_get_ticket_value_count_archive( 'ticket_author', 0, true, 'ticket_parent', 0 ) );
					$section_tickets_id = eh_crm_get_ticket_value_count_archive( 'ticket_author', 0, true, 'ticket_parent', 0, $order_by, $order, $ticket_rows, $offset );
					$all_section_ids    = eh_crm_get_ticket_value_count_archive( 'ticket_author', 0, true, 'ticket_parent', 0, $order_by, $order, '', 0 );
					break;
				case 'guestU':
					$table_title        = esc_html__( 'Guest Users Tickets', 'wsdesk' );
					$total_count        = count( eh_crm_get_ticket_value_count_archive( 'ticket_author', 0, false, 'ticket_parent', 0 ) );
					$section_tickets_id = eh_crm_get_ticket_value_count_archive( 'ticket_author', 0, false, 'ticket_parent', 0, $order_by, $order, $ticket_rows, $offset );
					$all_section_ids    = eh_crm_get_ticket_value_count_archive( 'ticket_author', 0, false, 'ticket_parent', 0, $order_by, $order, '', 0 );
					break;
				case 'unassigned':
					$table_title        = esc_html__( 'Unassigned Tickets', 'wsdesk' );
					$total_count        = count( eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', array(), 'ticket_id' ) );
					$section_tickets_id = eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', array(), $order_by, $order, $ticket_rows, $offset );
					$all_section_ids    = eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', array(), $order_by, $order, 0, 0 );
					break;
				default:
					if ( strpos( $active, 'label_' ) !== false ) {
						for ( $i = 0;$i < count( $avail_labels );$i++ ) {
							if ( $avail_labels[ $i ]['slug'] == $active ) {
								$table_title = $avail_labels[ $i ]['title'];
							}
						}
						if ( empty( $table_title ) ) {
							$table_title = '(Incorrect Deep Link)';
						}
						$table_title        = $table_title . ' Tickets';
						$total_count        = count( eh_crm_get_ticketmeta_value_count_archive( 'ticket_label', $active, 'ticket_id' ) );
						$section_tickets_id = eh_crm_get_ticketmeta_value_count_archive( 'ticket_label', $active, $order_by, $order, $ticket_rows, $offset );
						$all_section_ids    = eh_crm_get_ticketmeta_value_count_archive( 'ticket_label', $active, $order_by, $order, 0, 0 );
					} elseif ( strpos( $active, 'tag_' ) !== false ) {
						for ( $i = 0;$i < count( $avail_tags );$i++ ) {
							if ( $avail_tags[ $i ]['slug'] == $active ) {
								$table_title = $avail_tags[ $i ]['title'];
							}
						}
						if ( empty( $table_title ) ) {
							$table_title = '(Incorrect Deep Link)';
						}
						$table_title        = $table_title . ' Tickets';
						$total_count        = count( eh_crm_get_ticketmeta_value_count_archive( 'ticket_tags', $active, 'ticket_id' ) );
						$section_tickets_id = eh_crm_get_ticketmeta_value_count_archive( 'ticket_tags', $active, $order_by, $order, $ticket_rows, $offset );
						$all_section_ids    = eh_crm_get_ticketmeta_value_count_archive( 'ticket_tags', $active, $order_by, $order, 0, 0 );
					} elseif ( strpos( $active, 'view_' ) !== false ) {
						for ( $i = 0;$i < count( $avail_views );$i++ ) {
							if ( $avail_views[ $i ]['slug'] == $active ) {
								$table_title = $avail_views[ $i ]['title'];
							}
						}
						if ( empty( $table_title ) ) {
							$table_title = '(Incorrect Deep Link)';
						}
						$table_title = $table_title . ' Tickets';
						$total_count = count( eh_crm_get_view_tickets( $active ) );

						$section_tickets_id = eh_crm_get_view_tickets( $active, $ticket_rows, $offset );
						$all_section_ids    = eh_crm_get_view_tickets( $active );
					} else {
						for ( $i = 0;$i < count( $users_data );$i++ ) {
							if ( $users_data[ $i ]['id'] == $active ) {
								$table_title = $users_data[ $i ]['name'];
							}
						}
						if ( empty( $table_title ) ) {
							$table_title = '(Incorrect Deep Link)';
						}
						$table_title        = $table_title . ' Tickets';
						$total_count        = count( eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', $active, 'ticket_id' ) );
						$section_tickets_id = eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', $active, $order_by, $order, $ticket_rows, $offset );
						$all_section_ids    = eh_crm_get_ticketmeta_value_count_archive( 'ticket_assignee', $active, $order_by, $order, 0, 0 );
					}
					break;
			}
		$avail_caps       = array( 'reply_tickets', 'delete_tickets', 'manage_tickets' );
		$access           = array();
		$logged_user      = wp_get_current_user();
		$logged_user_caps = array_keys( $logged_user->caps );
			if ( ! in_array( 'administrator', $logged_user->roles ) ) {
				for ( $i = 0;$i < count( $logged_user_caps );$i++ ) {
					if ( ! in_array( $logged_user_caps[ $i ], $avail_caps ) ) {
						unset( $logged_user_caps[ $i ] );
					}
				}
				$access = $logged_user_caps;
			} else {
				$access = $avail_caps;
			}
		$pagination_ids = array();
			foreach ( $all_section_ids as $tic ) {
				array_push( $pagination_ids, $tic['ticket_id'] );
			}
		$all_ticket_field_views = eh_crm_get_settingsmeta( '0', 'all_ticket_page_columns' );
		$custom_table_headers   = array();
		$default_columns        = array( 'id', 'requestor', 'subject', 'requested', 'assignee', 'feedback' );
			if ( false === $all_ticket_field_views ) {
				$all_ticket_field_views = $default_columns;
				eh_crm_update_settingsmeta( '0', 'all_ticket_page_columns', $default_columns );
			}
			if ( ! empty( $all_ticket_field_views ) ) {
				foreach ( $all_ticket_field_views as  $all_ticket_field ) {
					if ( in_array( $all_ticket_field, $default_columns ) ) {
						switch ( $all_ticket_field ) {
							case 'id':
								if ( 'ticket_id' == $order_by ) {
									if ( 'ASC' == $order ) {
										array_push( $custom_table_headers, '<div class="row" style="margin-left: 0px; "># <span class="dashicons dashicons-arrow-up sort-icon" id="id" style="margin-left: 5px;"></span></div>' );
									} else {
										array_push( $custom_table_headers, '<div class="row" style="margin-left: 0px; "># <span class="dashicons dashicons-arrow-down sort-icon" id="id" style="margin-left: 5px;"></span></div>' );
									}
								} else {
									array_push( $custom_table_headers, '<div class="row" style="margin-left: 0px; "># <span class="dashicons dashicons-sort sort-icon" id="id" style="margin-left: 5px;"></span></div>' );
								}
								break;
							case 'subject':
								if ( 'ticket_title' == $order_by ) {
									if ( 'ASC' == $order ) {
										array_push( $custom_table_headers, '<div class="row">' . ucfirst( $all_ticket_field ) . '<span class="dashicons dashicons-arrow-up sort-icon" id="subject" style="margin-left: 5px"></span></div>' );
									} else {
										array_push( $custom_table_headers, '<div class="row">' . ucfirst( $all_ticket_field ) . '<span class="dashicons dashicons-arrow-down sort-icon" id="subject" style="margin-left: 5px"></span></div>' );
									}
								} else {
									array_push( $custom_table_headers, '<div class="row">' . ucfirst( $all_ticket_field ) . '<span class="dashicons dashicons-sort sort-icon" id="subject" style="margin-left: 5px"></span></div>' );
								}
								break;
							default:
								array_push( $custom_table_headers, ucfirst( $all_ticket_field ) );
						}
					} else {
						$fields = eh_crm_get_settings( array( 'slug' => $all_ticket_field ), 'title' );
						array_push( $custom_table_headers, $fields[0]['title'] );
					}
				}
			}
			?>
				<input type="hidden" id="pagination_ids_traverse" value="<?php echo esc_html( htmlentities( json_encode( $pagination_ids ) ) ); ?>">
				<div class="panel panel-default tickets_panel" style="background-color: white;color:black">
					<div class="panel-heading" style="background-color:white;color:black">
						<h3 class="panel-title"><?php echo esc_html( $table_title ); ?>
							<span class="spinner_loader table_loader">
								<span class="bounce1"></span>
								<span class="bounce2"></span>
								<span class="bounce3"></span>
							</span>
						</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="wsdesk_tooltip" title="<?php esc_html_e( 'Quick Filter for Tickets', 'wsdesk' ); ?>"data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
						<div class="pull-right" style="margin: -25px 0px 0px 0px;">
							<span class="text-muted"><b>
						<?php
						$page_number = $current_page;
						echo ( ( $current_page > 0 ) && ( $current_page * $ticket_rows ) <= $total_count ) ? esc_html( ( ( $current_page ) * $ticket_rows ) + 1 ) : '1';
						?>
							</b>–<b><?php echo esc_html( ( $current_page > 0 ) && ( $current_page * $ticket_rows ) <= $total_count ) ? esc_html( $current_page * $ticket_rows ) + count( $section_tickets_id ) : esc_html( $ticket_rows ); ?></b> of <b><?php echo esc_html( $total_count ); ?></b></span>
						<?php
						if ( $page_number >= 0 && $page_number < ( $total_count / $ticket_rows ) ) {
							$page_number  = $current_page + 1;
							$current_page = $current_page;
						} elseif ( $page_number >= ( $total_count / $ticket_rows ) ) {
							$page_number  = $current_page;
							$current_page = $page_number;
						}
						?>
							<input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" min="0" name="cur" id="current_page_n" class="btn btn-default pagination_tic" placeholder="<?php esc_html_e( $page_number, 'wsdesk' ); ?>"min=1 title="<?php esc_html_e( 'Page Number', 'wsdesk' ); ?> "
							oninput="validity.valid||(value='');" style="width:65px;height:30px" />
							<div class="btn-group btn-group-sm" style="margin:1px 0px 0px 0px;">
						<?php
								//To Hide the preview and next buttons for first and lastpages of tickets
						if ( 0 != $current_page ) {

							?>
												<button type="button"  class="btn btn-default pagination_tickets" id="prev" title="<?php esc_html_e( 'Previous', 'wsdesk' ); ?> <?php echo esc_html( $ticket_rows ); ?>" data-container="body">
													<span class="glyphicon glyphicon-chevron-left"></span>
												</button>
								<?php
						}
						?>

							<?php

							if ( 0 == $current_page ) {

								?>
												<button type="button"  class="btn btn-default pagination_tick" id="pre" title="<?php esc_html_e( 'Beginning of the Page', 'wsdesk' ); ?> "style="color:#AFAFAF; " data-container="body">
													<span class="glyphicon glyphicon-chevron-left"></span>
												</button>
									<?php
							}
							?>

								<input type="hidden" id="current_page_no" value="<?php echo esc_html( $current_page ); ?>">
								<?php
								if ( ( $current_page * $ticket_rows ) + count( $section_tickets_id ) != $total_count ) {
									?>
												<button type="button"  class="btn btn-default pagination_tickets" id="next" title="<?php esc_html_e( 'Next', 'wsdesk' ); ?> <?php echo esc_html( $ticket_rows ); ?>" data-container="body">
													<span class="glyphicon glyphicon-chevron-right"></span>
												</button>
										<?php
								}
								?>
								<?php
								if ( ( $current_page * $ticket_rows ) + count( $section_tickets_id ) == $total_count ) {
									?>
												<button type="button"  class="btn btn-default pagination_tick" id="nex" title="<?php esc_html_e( 'End of the Page', 'wsdesk' ); ?> " style="color:#AFAFAF; " data-container="body">
													<span class="glyphicon glyphicon-chevron-right"></span>
												</button>
										<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="<?php esc_html_e( 'Filter Tickets', 'wsdesk' ); ?>" />
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr class="except_view">
								<th style="width: 1%;"></th>
								<th style="width: 2%;"><?php esc_html_e( 'View', 'wsdesk' ); ?></th>
								<?php
								foreach ( $custom_table_headers as  $value ) {
									echo '<th>' . esc_html( $value ) . '</th>';
								}
								?>
							</tr>
						</thead>
						<tbody>
					<?php
					if ( strpos( $active, 'view_' ) !== false ) {
						$view  = eh_crm_get_settings( array( 'slug' => $active ) );
						$group = eh_crm_get_settingsmeta( $view[0]['settings_id'], 'view_group' );
						if ( '' !== $group ) {
							$grouped_data = eh_crm_view_tickets_group( $section_tickets_id, $group );
						} else {
							$grouped_data = array( 'no_group' => $section_tickets_id );
						}
						if ( empty( $grouped_data ) ) {

							echo '<tr class="except_view">
									<td colspan="12">' . esc_html__( 'No Tickets', 'wsdesk' ) . ' </td></tr>';
						} else {
							foreach ( $grouped_data as $key => $value ) {
								if ( 'no_group' !== $key ) {
									echo'
											<tr class="except_view" style="background-color: #f5f5f5;font-weight: 600;">
												<td colspan="12">
													' . esc_attr( $key ) . '
												</td>
											</tr>
											';
								}

								$section_tickets_id = $value;
								if ( empty( $section_tickets_id ) ) {
									echo '<tr class="except_view">
											<td colspan="12">' . esc_html__( 'No Tickets', 'wsdesk' ) . ' </td></tr>';
								} else {
									for ( $i = 0;$i < count( $section_tickets_id );$i++ ) {
										$current      = eh_crm_get_ticket_archive( array( 'ticket_id' => $section_tickets_id[ $i ]['ticket_id'] ) );
										$current_meta = eh_crm_get_ticketmeta_archive( $section_tickets_id[ $i ]['ticket_id'] );
										$action_value = '';
										$eye_color    = '';
										for ( $j = 0;$j < count( $avail_labels_wf );$j++ ) {
											if ( in_array( 'manage_tickets', $access ) ) {
												$action_value .= '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="single_ticket_action" id="' . esc_html( $avail_labels_wf[ $j ]['slug'] ) . '">' . esc_html__( 'Mark as', 'wsdesk' ) . ' ' . esc_html( $avail_labels_wf[ $j ]['title'] ) . '</a></li>';

											}
											if ( $avail_labels_wf[ $j ]['slug'] == $current_meta['ticket_label'] ) {
												$ticket_label_slug = $avail_labels_wf[ $j ]['slug'];
												$ticket_label      = $avail_labels_wf[ $j ]['title'];
												$eye_color         = eh_crm_get_settingsmeta( $avail_labels_wf[ $j ]['settings_id'], 'label_color' );
											}
										}
										$ticket_raiser = $current[0]['ticket_email'];
										if ( 0 != $current[0]['ticket_author'] ) {
											$current_user  = new WP_User( $current[0]['ticket_author'] );
											$ticket_raiser = $current_user->display_name;
										}
										$ticket_assignee_name  = array();
										$ticket_assignee_email = array();
										if ( isset( $current_meta['ticket_assignee'] ) ) {
											$current_assignee = $current_meta['ticket_assignee'];
											for ( $k = 0;$k < count( $current_assignee );$k++ ) {
												for ( $l = 0;$l < count( $users_data );$l++ ) {
													if ( $users_data[ $l ]['id'] == $current_assignee[ $k ] ) {
														array_push( $ticket_assignee_name, $users_data[ $l ]['name'] );
														array_push( $ticket_assignee_email, $users_data[ $l ]['email'] );
													}
												}
											}
										}
										$ticket_assignee_name = empty( $ticket_assignee_name ) ? esc_html__( 'No Assignee', 'wsdesk' ) : implode( ', ', $ticket_assignee_name );
										$latest_reply_id      = eh_crm_get_ticket_value_count_archive( 'ticket_category', 'agent_note' , true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id', $order, '1' );
										$latest_content       = array();
										$attach               = '';
										if ( ! empty( $latest_reply_id ) ) {
											$latest_ticket_reply            = eh_crm_get_ticket_archive( array( 'ticket_id' => $latest_reply_id[0]['ticket_id'] ) );
											$latest_content['content']      = html_entity_decode( stripslashes( $latest_ticket_reply[0]['ticket_content'] ) );
											$latest_content['author_email'] = $latest_ticket_reply[0]['ticket_email'];
											$latest_content['reply_date']   = $latest_ticket_reply[0]['ticket_date'];
											if ( 0 != $latest_ticket_reply[0]['ticket_author'] ) {
												$reply_user                    = new WP_User( $latest_ticket_reply[0]['ticket_author'] );
												$latest_content['author_name'] = $reply_user->display_name;
											} else {
												$latest_content['author_name'] = esc_html__( 'Guest', 'wsdesk' );
											}
											$latest_reply_meta = eh_crm_get_ticketmeta_archive( $latest_reply_id[0]['ticket_id'] );
											if ( isset( $latest_reply_meta['ticket_attachment'] ) ) {
												$attach = ' | <small class="glyphicon glyphicon-pushpin"></small> <small style="opacity:0.7;"> ' . count( $latest_reply_meta['ticket_attachment'] ) . ' ' . esc_html__( 'Attachment', 'wsdesk' ) . '</small>';
											}
										} else {
											$latest_content['content']      = html_entity_decode( stripslashes( $current[0]['ticket_content'] ) );
											$latest_content['author_email'] = $current[0]['ticket_email'];
											$latest_content['reply_date']   = $current[0]['ticket_date'];
											if ( 0 != $current[0]['ticket_author'] ) {
												$current_user                  = new WP_User( $current[0]['ticket_author'] );
												$latest_content['author_name'] = $current_user->display_name;
											} else {
												$latest_content['author_name'] = esc_html__( 'Guest', 'wsdesk' );
											}
											if ( isset( $current_meta['ticket_attachment'] ) ) {
												$attach = ' | <small class="glyphicon glyphicon-pushpin"></small> <small style="opacity:0.7;"> ' . esc_html( count( $current_meta['ticket_attachment'] ) ) . ' ' . esc_html__( 'Attachment', 'wsdesk' ) . '</small>';
											}
										}
										$ticket_tags = '';
										if ( ! empty( $avail_tags_wf ) ) {
											for ( $j = 0;$j < count( $avail_tags_wf );$j++ ) {
												$current_ticket_tags = ( isset( $current_meta['ticket_tags'] ) ? $current_meta['ticket_tags'] : array() );
												for ( $k = 0;$k < count( $current_ticket_tags );$k++ ) {
													if ( $avail_tags_wf[ $j ]['slug'] == $current_ticket_tags[ $k ] ) {
														$ticket_tags .= '<span class="label label-info">#' . esc_html( $avail_tags_wf[ $j ]['title'] ) . '</span>';
													}
												}
											}
										}
										if ( isset( $current_meta['ticket_rating'] ) ) {
											if ( 'great' == $current_meta['ticket_rating'] ) {
												$ticket_rating = '<span class="glyphicon glyphicon-thumbs-up" style="color: green"></span>';
											} else {
												$ticket_rating = '<span class="glyphicon glyphicon-thumbs-down" style="color: red"></span>';
											}
										} else {
											$ticket_rating = '<span class="glyphicon glyphicon-time"></span>';
										}
										$raiser_voice              = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'raiser_reply' );
										$agent_voice               = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'agent_reply' );
										$input_data                = ( 'text' != $tickets_display ) ? html_entity_decode( stripslashes( $latest_content['content'] ) ) : stripslashes( $latest_content['content'] );
										$input_array[0]            = '/<((html)[^>]*)>(.*)\<\/(html)>/Us';
										$input_array[1]            = '/<((head)[^>]*)>(.*)\<\/(head)>/Us';
										$input_array[2]            = '/<((style)[^>]*)>(.*)\<\/(style)>/Us';
										$input_array[3]            = '/<((body)[^>]*)>(.*)\<\/(body)>/Us';
										$input_array[4]            = '/<((form)[^>]*)>(.*)\<\/(form)>/Us';
										$input_array[5]            = '/<((input)[^>]*)>(.*)\<\/(input)>/Us';
										$input_array[6]            = '/<((input)[^>]*)>/Us';
										$input_array[7]            = '/<((button)[^>]*)>(.*)\<\/(button)>/Us';
										$input_array[8]            = '/<((iframe)[^>]*)>(.*)\<\/(iframe)>/Us';
										$input_array[9]            = '/<((script)[^>]*)>(.*)\<\/(script)>/Us';
										$input_array[10]           = '/<((ins)[^>]*)>(.*)\<\/(ins)>/Us';
										$output_array[0]           = '&lt;$1&gt;$3&lt;/html&gt;';
										$output_array[1]           = '&lt;$1&gt;$3&lt;/head&gt;';
										$output_array[2]           = '&lt;$1&gt;$3&lt;/style&gt;';
										$output_array[3]           = '&lt;$1&gt;$3&lt;/body&gt;';
										$output_array[4]           = '&lt;$1&gt;$3&lt;/form&gt;';
										$output_array[5]           = '&lt;$1&gt;$3&lt;/input&gt;';
										$output_array[6]           = '&lt;$1&gt;$3&lt;/input&gt;';
										$output_array[7]           = '&lt;$1&gt;$3&lt;/button&gt;';
										$output_array[8]           = '&lt;$1&gt;$3&lt;/iframe&gt;';
										$output_array[9]           = '&lt;$1&gt;$3&lt;/script&gt;';
										$output_array[10]          = '&lt;$1&gt;$3&lt;/ins&gt;';
										$latest_content['content'] = preg_replace( $input_array, $output_array, $input_data );
										$latest_content['content'] = str_replace( '<script>', '&lt;script&gt;', $latest_content['content'] );
										echo '
											<tr class="clickable ticket_row" id="' . esc_html( $current[0]['ticket_id'] ) . '">
												<td class="except_view"><input type="checkbox" class="ticket_select_t" id="ticket_select_t" value="' . esc_html( $current[0]['ticket_id'] ) . '"></td>
												<td class="except_view"><button class="btn btn-default btn-xs accordion-toggle quick_view_ticket" style="background-color: ' . esc_html( $eye_color ) . ' !important" data-toggle="collapse" data-target="#expand_' . esc_html( $current[0]['ticket_id'] ) . '" ><span class="glyphicon glyphicon-eye-open"></span></button></td>';
										if ( ! empty( $all_ticket_field_views ) ) {
											foreach ( $all_ticket_field_views as  $all_ticket_field ) {
												switch ( $all_ticket_field ) {
													case 'id':
														echo '<td>' . esc_html( $current[0]['ticket_id'] ) . '</td>';
														break;
													case 'requestor':
														echo '<td>' . esc_html( $ticket_raiser ) . '</td>';
														break;
													case 'subject':
														echo '<td class="wrap_content" data-toggle="wsdesk_tooltip" title="' . esc_html( $current[0]['ticket_title'] ) . '" data-container="body">' . esc_html( $current[0]['ticket_title'] ) . '</td>';
														break;
													case 'requested':
														echo '<td>' . esc_html( eh_crm_get_formatted_date( $current[0]['ticket_date'] ) ) . '</td>';
														break;
													case 'assignee':
														echo '<td>' . esc_html( $ticket_assignee_name ) . '</td>';
														break;
													case 'feedback':
														echo '<td>' . esc_html( $ticket_rating ) . '</td>';
														break;
													default:
														$current_settings_id   = eh_crm_get_settings( array( 'slug' => $all_ticket_field ), 'settings_id' );
														$current_settings_meta = eh_crm_get_settingsmeta( $current_settings_id[0]['settings_id'] );
														if ( 'select' == $current_settings_meta['field_type'] ) {
															if ( 'woo_order_id' == $all_ticket_field ) {
															$current_settings_meta['field_type'] = 'text';
															}
														}
														if ( 'file' != $current_settings_meta['field_type'] && 'google_captcha' != $current_settings_meta['field_type'] ) {
															switch ( $current_settings_meta['field_type'] ) {
																case 'select':
																case 'radio':
																case 'checkbox':
																	$field_values = $current_settings_meta['field_values'];
																	if ( isset( $current_meta[ $all_ticket_field ] ) ) {
																		echo '<td>' . esc_html( $field_values[ $current_meta[ $all_ticket_field ] ] ) . '</td>';
																	} else {
																		echo '<td>-</td>';
																	}
																	break;
																default:
																	if ( isset( $current_meta[ $all_ticket_field ] ) ) {
																		echo '<td>' . esc_html( $current_meta[ $all_ticket_field ] ) . '</td>';
																	} else {
																		echo '<td>-</td>';
																	}
																	break;
															}
														}
														break;
												}
											}
										}
										echo '</tr>
											<tr class="except_view">
												<td colspan="12" class="hiddenRow">
													<div class="accordian-body collapse" id="expand_' . esc_html( $current[0]['ticket_id'] ) . '">
														<table class="table table-striped" style="margin-bottom: 0px !important">
															<thead>
																<tr>
																	<td colspan="12" style="white-space: normal;">
																	<div style="padding:5px 0px;">
																		<small class="glyphicon glyphicon-user"></small> <small style="opacity:0.7;">' . esc_html( $latest_content['author_name'] ) . '</small>
																		| <small class="glyphicon glyphicon-envelope"></small> <small style="opacity:0.7;">' . esc_html( $latest_content['author_email'] ) . '</small>
																		| <small class="glyphicon glyphicon-calendar"></small> <small style="opacity:0.7;">' . esc_html( eh_crm_get_formatted_date( $latest_content['reply_date'] ) ) . '</small>
																		' . esc_html( $attach ) . '
																	</div>
																	<hr>
																	<p>
																		' . esc_html( stripslashes( $latest_content['content'] ) ) . '
																	</p>
																	</td>
																</tr>
																<tr>
																	<th>' . esc_html__( 'Actions', 'wsdesk' ) . '</th>
																	<th>' . esc_html__( 'Reply Requester', 'wsdesk' ) . '</th>
																	<th>' . esc_html__( 'Raiser Voices', 'wsdesk' ) . '</th>
																	<th>' . esc_html__( 'Agent Voices', 'wsdesk' ) . '</th>
																	<th>' . esc_html__( 'Tags', 'wsdesk' ) . '</th>
																	<th>' . esc_html__( 'Source', 'wsdesk' ) . '</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<div class="btn-group">
																			<button type="button" class="btn btn-default dropdown-toggle single_ticket_action_button_' . esc_html( $current[0]['ticket_id'] ) . '" data-toggle="dropdown">
																				' . esc_html__( 'Actions', 'wsdesk' ) . ' <span class="caret"></span>
																			</button>
																			<ul class="dropdown-menu" role="menu">
																				' . ( ( '' != $action_value ) ? esc_html( $action_value ) : '<li style="padding: 3px 20px;">' . esc_html__( 'No Actions', 'wsdesk' ) . '</li>' ) . '
																				<li class="divider"></li>
																				<li class="text-center">
																					<small class="text-muted">
																						' . esc_html__( 'Select label to assign', 'wsdesk' ) . '
																					</small>
																				</li>
																			</ul>
																		</div>
																	</td>
																	<td>
																		<a href="#reply_' . esc_html( $current[0]['ticket_id'] ) . '" data-toggle="modal"  title="' . esc_html__( 'Compose Reply', 'wsdesk' ) . '">
																			' . esc_html( $current[0]['ticket_email'] ) . '
																		</a>
																	</td>
																	<td>' . count( $raiser_voice ) . '</td>
																		<td>' . count( $agent_voice ) . '</td>
																	<td>' . ( ( '' != $ticket_tags ) ? esc_html( $ticket_tags ) : esc_html__( 'No Tags', 'wsdesk' ) ) . '</td>
																	<td>' . ( ( isset( $current_meta['ticket_source'] ) ) ? esc_html( $current_meta['ticket_source'] ) : '' ) . '</td>
																</tr>
															</tbody>
														</table>
														<!-- Modal -->
														<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="reply_' . esc_html( $current[0]['ticket_id'] ) . '" class="modal fade" style="display: none;">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
																		<h4 class="modal-title">' . esc_html__( 'Compose Reply', 'wsdesk' ) . '</h4>
																	</div>
																	<div class="modal-body">
																		<p style="margin-top: 5px;font-size: 16px;">
																		';
										if ( in_array( 'manage_tickets', $access ) ) {
											echo '<input type="text" value="' . esc_html( stripslashes( htmlentities( $current[0]['ticket_title'] ) ) ) . '" id="direct_ticket_title_' . esc_html( $current[0]['ticket_id'] ) . '" class="ticket_title_editable">';
										} else {
											echo esc_html( $current[0]['ticket_title'] );
										}
										if ( in_array( 'reply_tickets', $access ) ) {
											?>
																			</p>
																			<div class="row" style="margin-bottom: 20px;">
																				<div class="col-md-12">
																					<div class="widget-area no-padding blank" style="width:100%">
																						<div class="status-upload">
																							<textarea rows="10" cols="30" class="form-control direct_reply_textarea" id="direct_reply_textarea_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" name="reply_textarea_<?php echo esc_html( $current[0]['ticket_id'] ); ?>"></textarea>
																							<div class="form-group">
																								<div class="input-group col-md-12">
																									<span class="btn btn-primary fileinput-button">
																										<i class="glyphicon glyphicon-plus"></i>
																										<span><?php esc_html_e( 'Attachment', 'wsdesk' ); ?></span>
																							<textarea rows="10" cols="30" class="form-control direct_reply_textarea" id="direct_reply_textarea_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" name="reply_textarea_<?php echo esc_html( $current[0]['ticket_id'] ); ?>"></textarea>
																										<input type="file" name="direct_files" id="direct_files_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" class="direct_attachment_reply" multiple="">
																									</span>
																									<div class="btn-group pull-right">
																										<button type="button" class="btn btn-primary dropdown-toggle direct_ticket_reply_action_button_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		<?php esc_html_e( 'Submit as', 'wsdesk' ); ?> <span class="caret"></span>
																																						</button>
																																						<ul class="dropdown-menu">
																			<?php
																			for ( $j = 0;$j < count( $avail_labels_wf );$j++ ) {
																														echo '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="direct_ticket_reply_action" id="' . esc_html( $avail_labels_wf[ $j ]['slug'] ) . '">' . esc_html_e( 'Submit as', 'wsdesk' ) . ' ' . esc_html( $avail_labels_wf[ $j ]['title'] ) . '</a></li>';
																			}
																			?>
																											<li role="separator" class="divider"></li>
																											<li id="<?php echo esc_html( $current[0]['ticket_id'] ); ?>"><a href="#" class="direct_ticket_reply_action" id="note"><?php esc_html_e( 'Submit as Note', 'wsdesk' ); ?></a></li>
																											<li class="text-center"><small class="text-muted"><?php esc_html_e( 'Notes visible to Agents and Supervisors', 'wsdesk' ); ?></small></li>
																										</ul>
																									</div>
																								</div>
																								<div class="direct_upload_preview_files_<?php echo esc_html( $current[0]['ticket_id'] ); ?>"></div>
																							</div>
																						</div><!-- Status Upload  -->
																					</div><!-- Widget Area -->
																				</div>
																			</div>
																			<?php
										} else {
												echo '<p>' . esc_html__( "You don't Have permisson to Reply this ticket", 'wsdesk' ) . '</p>';
										}
																echo'
																</div><!-- /.modal-content -->
															</div><!-- /.modal-dialog -->
														</div><!-- /.modal -->
													</div>
												</td>
											</tr>
											';
									}
								}
							}
						}
					} else {
						if ( empty( $section_tickets_id ) ) {
							echo '<tr class="except_view">
									<td colspan="12">' . esc_html__( 'No Tickets', 'wsdesk' ) . ' </td></tr>';
						} else {
							for ( $i = 0;$i < count( $section_tickets_id );$i++ ) {
								$current        = eh_crm_get_ticket_archive( array( 'ticket_id' => $section_tickets_id[ $i ]['ticket_id'] ) );
								$current_meta   = eh_crm_get_ticketmeta_archive( $section_tickets_id[ $i ]['ticket_id'] );
								$action_value   = '';
								$assignee_value = '';
								$eye_color      = '';
								for ( $j = 0;$j < count( $avail_labels_wf );$j++ ) {
									if ( in_array( 'manage_tickets', $access ) ) {
										$action_value .= '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="single_ticket_action" id="' . esc_html( $avail_labels_wf[ $j ]['slug'] ) . '">' . esc_html__( 'Mark as', 'wsdesk' ) . ' ' . esc_html( $avail_labels_wf[ $j ]['title'] ) . '</a></li>';

									}
									if ( $avail_labels_wf[ $j ]['slug'] == $current_meta['ticket_label'] ) {
										$ticket_label_slug = $avail_labels_wf[ $j ]['slug'];
										$ticket_label      = $avail_labels_wf[ $j ]['title'];
										$eye_color         = eh_crm_get_settingsmeta( $avail_labels_wf[ $j ]['settings_id'], 'label_color' );
									}
								}
								for ( $j = 0;$j < count( $users );$j++ ) {
									if ( in_array( 'manage_tickets', $access ) ) {
										$assignee_value .= '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="single_ticket_assignee" id="' . esc_html( $users[ $j ]->ID ) . '">' . esc_html( $users[ $j ]->display_name ) . '</a></li>';
									}
								}
								$ticket_raiser = $current[0]['ticket_email'];
								if ( 0 != $current[0]['ticket_author'] ) {
									$current_user  = new WP_User( $current[0]['ticket_author'] );
									$ticket_raiser = $current_user->display_name;
								}
								$ticket_assignee_name  = array();
								$ticket_assignee_email = array();
								if ( isset( $current_meta['ticket_assignee'] ) ) {
									$current_assignee = $current_meta['ticket_assignee'];
									for ( $k = 0;$k < count( $current_assignee );$k++ ) {
										for ( $l = 0;$l < count( $users_data );$l++ ) {
											if ( $users_data[ $l ]['id'] == $current_assignee[ $k ] ) {
												array_push( $ticket_assignee_name, $users_data[ $l ]['name'] );
												array_push( $ticket_assignee_email, $users_data[ $l ]['email'] );
											}
										}
									}
								}
								$ticket_assignee_name = empty( $ticket_assignee_name ) ? esc_html__( 'No Assignee', 'wsdesk' ) : implode( ', ', $ticket_assignee_name );
								$latest_reply_id      = eh_crm_get_ticket_value_count_archive( 'ticket_category', 'agent_note' , true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id', $order, '1' );
								$latest_content       = array();
								$attach               = '';
								if ( ! empty( $latest_reply_id ) ) {
									$latest_ticket_reply            = eh_crm_get_ticket_archive( array( 'ticket_id' => $latest_reply_id[0]['ticket_id'] ) );
									$latest_content['content']      = html_entity_decode( stripslashes( $latest_ticket_reply[0]['ticket_content'] ) );
									$latest_content['author_email'] = $latest_ticket_reply[0]['ticket_email'];
									$latest_content['reply_date']   = $latest_ticket_reply[0]['ticket_date'];
									if ( 0 != $latest_ticket_reply[0]['ticket_author'] ) {
										$reply_user                    = new WP_User( $latest_ticket_reply[0]['ticket_author'] );
										$latest_content['author_name'] = $reply_user->display_name;
									} else {
										$latest_content['author_name'] = esc_html__( 'Guest', 'wsdesk' );
									}
									$latest_reply_meta = eh_crm_get_ticketmeta_archive( $latest_reply_id[0]['ticket_id'] );
									if ( isset( $latest_reply_meta['ticket_attachment'] ) ) {
										$attach = ' | <small class="glyphicon glyphicon-pushpin"></small> <small style="opacity:0.7;"> ' . count( $latest_reply_meta['ticket_attachment'] ) . ' ' . esc_html__( 'Attachment', 'wsdesk' ) . '</small>';
									}
								} else {
									$latest_content['content']      = html_entity_decode( stripslashes( $current[0]['ticket_content'] ) );
									$latest_content['author_email'] = $current[0]['ticket_email'];
									$latest_content['reply_date']   = $current[0]['ticket_date'];
									if ( 0 != $current[0]['ticket_author'] ) {
										$current_user                  = new WP_User( $current[0]['ticket_author'] );
										$latest_content['author_name'] = $current_user->display_name;
									} else {
										$latest_content['author_name'] = esc_html__( 'Guest', 'wsdesk' );
									}
									if ( isset( $current_meta['ticket_attachment'] ) ) {
										$attach = ' | <small class="glyphicon glyphicon-pushpin"></small> <small style="opacity:0.7;"> ' . count( $current_meta['ticket_attachment'] ) . ' ' . esc_html__( 'Attachment', 'wsdesk' ) . '</small>';
									}
								}
								$ticket_tags = '';
								if ( ! empty( $avail_tags_wf ) ) {
									for ( $j = 0;$j < count( $avail_tags_wf );$j++ ) {
										$current_ticket_tags = ( isset( $current_meta['ticket_tags'] ) ? $current_meta['ticket_tags'] : array() );
										for ( $k = 0;$k < count( $current_ticket_tags );$k++ ) {
											if ( $avail_tags_wf[ $j ]['slug'] == $current_ticket_tags[ $k ] ) {
												$ticket_tags .= '<span class="label label-info">#' . esc_html( $avail_tags_wf[ $j ]['title'] ) . '</span>';
											}
										}
									}
								}

								if ( isset( $current_meta['ticket_rating'] ) ) {
									if ( 'great' == $current_meta['ticket_rating'] ) {
										$ticket_rating = '<span class="glyphicon glyphicon-thumbs-up" style="color: green"></span>';
									} else {
										$ticket_rating = '<span class="glyphicon glyphicon-thumbs-down" style="color: red"></span>';
									}
								} else {
									$ticket_rating = '<span class="glyphicon glyphicon-time"></span>';
								}
								$raiser_voice              = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'raiser_reply' );
								$agent_voice               = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'agent_reply' );
								$input_data                = ( 'text' != $tickets_display ) ? html_entity_decode( stripslashes( $latest_content['content'] ) ) : stripslashes( $latest_content['content'] );
								$input_array[0]            = '/<((html)[^>]*)>(.*)\<\/(html)>/Us';
								$input_array[1]            = '/<((head)[^>]*)>(.*)\<\/(head)>/Us';
								$input_array[2]            = '/<((style)[^>]*)>(.*)\<\/(style)>/Us';
								$input_array[3]            = '/<((body)[^>]*)>(.*)\<\/(body)>/Us';
								$input_array[4]            = '/<((form)[^>]*)>(.*)\<\/(form)>/Us';
								$input_array[5]            = '/<((input)[^>]*)>(.*)\<\/(input)>/Us';
								$input_array[6]            = '/<((input)[^>]*)>/Us';
								$input_array[7]            = '/<((button)[^>]*)>(.*)\<\/(button)>/Us';
								$input_array[8]            = '/<((iframe)[^>]*)>(.*)\<\/(iframe)>/Us';
								$input_array[9]            = '/<((script)[^>]*)>(.*)\<\/(script)>/Us';
								$input_array[10]           = '/<((ins)[^>]*)>(.*)\<\/(ins)>/Us';
								$output_array[0]           = '&lt;$1&gt;$3&lt;/html&gt;';
								$output_array[1]           = '&lt;$1&gt;$3&lt;/head&gt;';
								$output_array[2]           = '&lt;$1&gt;$3&lt;/style&gt;';
								$output_array[3]           = '&lt;$1&gt;$3&lt;/body&gt;';
								$output_array[4]           = '&lt;$1&gt;$3&lt;/form&gt;';
								$output_array[5]           = '&lt;$1&gt;$3&lt;/input&gt;';
								$output_array[6]           = '&lt;$1&gt;$3&lt;/input&gt;';
								$output_array[7]           = '&lt;$1&gt;$3&lt;/button&gt;';
								$output_array[8]           = '&lt;$1&gt;$3&lt;/iframe&gt;';
								$output_array[9]           = '&lt;$1&gt;$3&lt;/script&gt;';
								$output_array[10]          = '&lt;$1&gt;$3&lt;/ins&gt;';
								$latest_content['content'] = preg_replace( $input_array, $output_array, $input_data );
								$latest_content['content'] = str_replace( '<script>', '&lt;script&gt;', $latest_content['content'] );
								echo '
									<tr class="clickable ticket_row" id="' . esc_html( $current[0]['ticket_id'] ) . '">
										<td class="except_view"><input type="checkbox" class="ticket_select_t" id="ticket_select_t" value="' . esc_html( $current[0]['ticket_id'] ) . '"></td>
										<td class="except_view"><button class="btn btn-default btn-xs accordion-toggle quick_view_ticket" style="background-color: ' . esc_html( $eye_color ) . ' !important" data-toggle="collapse" data-target="#expand_' . esc_html( $current[0]['ticket_id'] ) . '" ><span class="glyphicon glyphicon-eye-open"></span></button></td>';
								if ( ! empty( $all_ticket_field_views ) ) {
									foreach ( $all_ticket_field_views as  $all_ticket_field ) {
										switch ( $all_ticket_field ) {
											case 'id':
												echo '<td>' . esc_html( $current[0]['ticket_id'] ) . '</td>';
												break;
											case 'requestor':
												echo '<td>' . esc_html( $ticket_raiser ) . '</td>';
												break;
											case 'subject':
												echo '<td class="wrap_content" data-toggle="wsdesk_tooltip" title="' . esc_html( $current[0]['ticket_title'] ) . '" data-container="body">' . esc_html( $current[0]['ticket_title'] ) . '</td>';
												break;
											case 'requested':
												echo '<td>' . esc_html( eh_crm_get_formatted_date( $current[0]['ticket_date'] ) ) . '</td>';
												break;
											case 'assignee':
												echo '<td>' . esc_html( $ticket_assignee_name ) . '</td>';
												break;
											case 'feedback':
												echo '<td>' . esc_html( $ticket_rating ) . '</td>';
												break;
											default:
												$current_settings_id   = eh_crm_get_settings( array( 'slug' => $all_ticket_field ), 'settings_id' );
												$current_settings_meta = eh_crm_get_settingsmeta( $current_settings_id[0]['settings_id'] );
												if ( 'select' == $current_settings_meta['field_type'] ) {
													if ( 'woo_order_id' == $all_ticket_field ) {
													$current_settings_meta['field_type'] = 'text';
													}
												}
												if ( 'file' != $current_settings_meta['field_type'] && 'google_captcha' != $current_settings_meta['field_type'] ) {
													switch ( $current_settings_meta['field_type'] ) {
														case 'select':
														case 'radio':
														case 'checkbox':
															$field_values = $current_settings_meta['field_values'];
															if ( isset( $current_meta[ $all_ticket_field ] ) ) {
																echo '<td>' . esc_html( $field_values[ $current_meta[ $all_ticket_field ] ] ) . '</td>';
															} else {
																echo '<td>-</td>';
															}
															break;
														default:
															if ( isset( $current_meta[ $all_ticket_field ] ) ) {
																echo '<td>' . esc_html( $current_meta[ $all_ticket_field ] ) . '</td>';
															} else {
																echo '<td>-</td>';
															}
															break;
													}
												}
												break;
										}
									}
								}
								echo '</tr>
									<tr class="except_view">
										<td colspan="12" class="hiddenRow">
											<div class="accordian-body collapse" id="expand_' . esc_html( $current[0]['ticket_id'] ) . '">
												<table class="table table-striped" style="margin-bottom: 0px !important">
													<thead>
														<tr>
															<td colspan="12" style="white-space: normal;">
															<div style="padding:5px 0px;">
																<small class="glyphicon glyphicon-user"></small> <small style="opacity:0.7;">' . esc_html( $latest_content['author_name'] ) . '</small>
																| <small class="glyphicon glyphicon-envelope"></small> <small style="opacity:0.7;">' . esc_html( $latest_content['author_email'] ) . '</small>
																| <small class="glyphicon glyphicon-calendar"></small> <small style="opacity:0.7;">' . esc_html( eh_crm_get_formatted_date( $latest_content['reply_date'] ) ) . '</small>
																' . esc_html( $attach ) . '
															</div>
															<hr>
															<p>
																' . esc_html( nstripslashes( $latest_content['content'] ) ) . '
															</p>
															</td>
														</tr>
														<tr>
															<th>' . esc_html__( 'Actions', 'wsdesk' ) . '</th>
															<th>' . esc_html__( 'Assignee', 'wsdesk' ) . '</th>
															<th>' . esc_html__( 'Reply Requester', 'wsdesk' ) . '</th>
															<th>' . esc_html__( 'Raiser Voices', 'wsdesk' ) . '</th>
															<th>' . esc_html__( 'Agent Voices', 'wsdesk' ) . '</th>
															<th>' . esc_html__( 'Tags', 'wsdesk' ) . '</th>
															<th>' . esc_html__( 'Source', 'wsdesk' ) . '</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div class="btn-group">
																	<button type="button" class="btn btn-default dropdown-toggle single_ticket_action_button_' . esc_html( $current[0]['ticket_id'] ) . '" data-toggle="dropdown">
																		' . esc_html__( 'Actions', 'wsdesk' ) . ' <span class="caret"></span>
																	</button>
																	<ul class="dropdown-menu" role="menu">
																		' . ( ( '' != $action_value ) ? esc_html( $action_value ) : '<li style="padding: 3px 20px;">' . esc_html__( 'No Actions', 'wsdesk' ) . '</li>' ) . '
																		<li class="divider"></li>
																		<li class="text-center">
																			<small class="text-muted">
																				' . esc_html__( 'Select label to assign', 'wsdesk' ) . '
																			</small>
																		</li>
																	</ul>
																</div>
															</td>
															<td>
																<div class="btn-group">
																	<button type="button" class="btn btn-default dropdown-toggle single_ticket_assignee_button_' . esc_html( $current[0]['ticket_id'] ) . '" data-toggle="dropdown">
																		' . esc_html__( 'Assignee', 'wsdesk' ) . ' <span class="caret"></span>
																	</button>
																	<ul class="dropdown-menu" role="menu">
																		' . ( ( '' != $assignee_value ) ? esc_html( $assignee_value ) : '<li style="padding: 3px 20px;">' . esc_html__( 'No Assignee', 'wsdesk' ) . '</li>' ) . '
																		<li class="divider"></li>
																		<li class="text-center">
																			<small class="text-muted">
																				' . esc_html__( 'Select assignee to assign', 'wsdesk' ) . '
																			</small>
																		</li>
																	</ul>
																</div>
															</td>
															<td>
																<a href="#reply_' . esc_html( $current[0]['ticket_id'] ) . '" data-toggle="modal"  title="' . esc_html__( 'Compose Reply', 'wsdesk' ) . '">
																	' . esc_html( $current[0]['ticket_email'] ) . '
																</a>
															</td>
															<td>' . count( $raiser_voice ) . '</td>
															<td>' . count( $agent_voice ) . '</td>
															<td>' . ( ( '' != $ticket_tags ) ? esc_html( $ticket_tags ) : esc_html__( 'No Tags', 'wsdesk' ) ) . '</td>
															<td>' . ( ( isset( $current_meta['ticket_source'] ) ) ? esc_html( $current_meta['ticket_source'] ) : '' ) . '</td>
														</tr>
													</tbody>
												</table>
												<!-- Modal -->
												<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="reply_' . esc_html( $current[0]['ticket_id'] ) . '" class="modal fade" style="display: none;">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
																<h4 class="modal-title">' . esc_html__( 'Compose Reply', 'wsdesk' ) . '</h4>
															</div>
															<div class="modal-body">
																<p style="margin-top: 5px;font-size: 16px;">
																';
								if ( in_array( 'manage_tickets', $access ) ) {
									echo '<input type="text" value="' . esc_html( htmlentities( esc_html( $current[0]['ticket_title'] ) ) ) . '" id="direct_ticket_title_' . esc_html( $current[0]['ticket_id'] ) . '" class="ticket_title_editable">';
								} else {
									echo esc_html( $current[0]['ticket_title'] );
								}
								if ( in_array( 'reply_tickets', $access ) ) {
									?>
																	</p>
																	<div class="row" style="margin-bottom: 20px;">
																		<div class="col-md-12">
																			<div class="widget-area no-padding blank" style="width:100%">
																				<div class="status-upload">
																					<textarea rows="10" cols="30" class="form-control direct_reply_textarea" id="direct_reply_textarea_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" name="reply_textarea_<?php echo esc_html( $current[0]['ticket_id'] ); ?>"></textarea>
																					<div class="form-group">
																						<div class="input-group col-md-12">
																							<span class="btn btn-primary fileinput-button">
																								<i class="glyphicon glyphicon-plus"></i>
																								<span><?php esc_html_e( 'Attachment', 'wsdesk' ); ?></span>
																								<input type="file" name="direct_files" id="direct_files_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" class="direct_attachment_reply" multiple="">
																							</span>
																							<div class="btn-group pull-right">
																								<button type="button" class="btn btn-primary dropdown-toggle direct_ticket_reply_action_button_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<?php esc_html_e( 'Submit as', 'wsdesk' ); ?> <span class="caret"></span>
																																		</button>
																																		<ul class="dropdown-menu">
															<?php
															for ( $j = 0;$j < count( $avail_labels_wf );$j++ ) {
																										echo '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="direct_ticket_reply_action" id="' . esc_html( $avail_labels_wf[ $j ]['slug'] ) . '">' . esc_html__( 'Submit as', 'wsdesk' ) . ' ' . esc_html( $avail_labels_wf[ $j ]['title'] ) . '</a></li>';
															}
															?>
																																			<li role="separator" class="divider"></li>
																									<li id="<?php echo esc_html( $current[0]['ticket_id'] ); ?>"><a href="#" class="direct_ticket_reply_action" id="note"><?php esc_html_e( 'Submit as Note', 'wsdesk' ); ?></a></li>
																									<li class="text-center"><small class="text-muted"><?php esc_html_e( 'Notes visible to Agents and Supervisors', 'wsdesk' ); ?></small></li>
																								</ul>
																							</div>
																						</div>
																						<div class="direct_upload_preview_files_<?php echo esc_html( $current[0]['ticket_id'] ); ?>"></div>
																					</div>
																				</div><!-- Status Upload  -->
																			</div><!-- Widget Area -->
																		</div>
																	</div>
																	<?php
								} else {
										echo '<p>' . esc_html__( "You don't Have permisson to Reply this ticket", 'wsdesk' ) . '</p>';
								}
														echo'
														</div><!-- /.modal-content -->
													</div><!-- /.modal-dialog -->
												</div><!-- /.modal -->
											</div>
										</td>
									</tr>
									';
							}
						}
					}
					?>
						</tbody>
					</table>
				</div>
				<?php
				$content = ob_get_clean();
				die( esc_html( $content ) );
		}
	}

	public static function eh_crm_ticket_search_archive() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$search = isset( $_POST['search'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';
			if ( eh_crm_get_ticket_archive(
				array(
					'ticket_id'     => $search,
					'ticket_parent' => 0,
				)
			) ) {
				$content = self::eh_crm_ticket_single_view_gen( $search );
				$tab     = self::eh_crm_ticket_single_view_gen_head( $search );
				die(
					json_encode(
						array(
							'tab_head'    => $tab,
							'tab_content' => $content,
							'data'        => 'ticket',
						)
					)
				);
			} else {
				$ticket_ids = eh_crm_get_ticket_archive_search( $search );
				$content    = self::eh_crm_generate_search_result( $ticket_ids, $search );
				$search_key = str_replace( ' ', '_', $search );
				$search_key = str_replace( '@', '_1attherate1_', $search_key );
				$search_key = str_replace( '.', '_1dot1_', $search_key );
				$search_key = str_replace( ';', '_1semicolon1_', $search_key );
				$search_key = str_replace( '?', '_1questionmark1_', $search_key );
				$tab        = '<a href="#tab_content_' . $search_key . '" id="tab_content_a_' . $search_key . '" aria-controls="#' . $search_key . '" role="tab" data-toggle="tab" class="tab_a" style="font-size: 12px;padding: 11px 5px;margin-right:0px !important;"><button type="button" class="btn btn-default btn-circle close_tab pull-right"><span class="glyphicon glyphicon-remove"></span></button><div class="badge"><span class="glyphicon glyphicon-search"></span></div><span> ' . ( strlen( $search ) > 18 ? substr( $search, 0, 18 ) . '...' : $search ) . '</span></a>';
				die(
					json_encode(
						array(
							'tab_head'    => $tab,
							'tab_content' => $content,
							'data'        => 'search',
						)
					)
				);
			}
		}
	}
	public static function eh_crm_generate_search_result( $section_tickets_id, $search ) {
		$avail_labels       = eh_crm_get_settings(
			array(
				'type'   => 'label',
				'filter' => 'yes',
			),
			array( 'slug', 'title', 'settings_id' )
		);
		$avail_tags         = eh_crm_get_settings(
			array(
				'type'   => 'tag',
				'filter' => 'yes',
			),
			array( 'slug', 'title', 'settings_id' )
		);
		$user_roles_default = array( 'WSDesk_Agents', 'WSDesk_Supervisor', 'administrator' );
		$users              = get_users( array( 'role__in' => $user_roles_default ) );
		$users_data         = array();
		for ( $i = 0; $i < count( $users ); $i++ ) {
			$current                   = $users[ $i ];
			$id                        = $current->ID;
			$user                      = new WP_User( $id );
			$users_data[ $i ]['id']    = $id;
			$users_data[ $i ]['name']  = $user->display_name;
			$users_data[ $i ]['caps']  = $user->caps;
			$users_data[ $i ]['email'] = $user->user_email;
		}
		$avail_caps       = array( 'reply_tickets', 'delete_tickets', 'manage_tickets' );
		$access           = array();
		$logged_user      = wp_get_current_user();
		$logged_user_caps = array_keys( $logged_user->caps );
		if ( ! in_array( 'administrator', $logged_user->roles ) ) {
			for ( $i = 0;$i < count( $logged_user_caps );$i++ ) {
				if ( ! in_array( $logged_user_caps[ $i ], $avail_caps ) ) {
					unset( $logged_user_caps[ $i ] );
				}
			}
			$access = $logged_user_caps;
		} else {
			$access = $avail_caps;
		}
		ob_start();
		?>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="panel panel-default tickets_panel">
							<div class="panel-heading">
								<h3 class="panel-title"><?php esc_html_e( 'Search Result', 'wsdesk' ); ?> "<?php echo esc_html( $search ); ?>"
									<span class="spinner_loader search_table_loader">
										<span class="bounce1"></span>
										<span class="bounce2"></span>
										<span class="bounce3"></span>
									</span>
								</h3>
							</div>
							<div class="panel-body">
								<input type="text" class="form-control" id="search-table-filter" data-action="filter" data-filters="#search-table" placeholder="<?php esc_html_e( 'Filter Anything', 'wsdesk' ); ?>" />
							</div>
							<table class="table table-hover" id="search-table">
								<thead>
									<tr class="except_view">
										<th><?php esc_html_e( 'View', 'wsdesk' ); ?></th>
										<th>#</th>
										<th><?php esc_html_e( 'Requester', 'wsdesk' ); ?></th>
										<th><?php esc_html_e( 'Subject', 'wsdesk' ); ?></th>
										<th><?php esc_html_e( 'Requested', 'wsdesk' ); ?></th>
										<th><?php esc_html_e( 'Assignee', 'wsdesk' ); ?></th>
									</tr>
								</thead>
								<tbody>
							<?php
							if ( empty( $section_tickets_id ) ) {
								echo '<tr class="except_view">
                                                <td colspan="12">' . esc_html__( 'No Tickets', 'wsdesk' ) . ' </td></tr>';
							} else {
								for ( $i = 0;$i < count( $section_tickets_id );$i++ ) {
									$current      = eh_crm_get_ticket( array( 'ticket_id' => $section_tickets_id[ $i ]['ticket_id'] ) );
									$current_meta = eh_crm_get_ticketmeta_archive( $section_tickets_id[ $i ]['ticket_id'] );
									$action_value = '';
									$eye_color    = '';
									for ( $j = 0;$j < count( $avail_labels );$j++ ) {
										if ( in_array( 'manage_tickets', $access ) ) {
											$action_value .= '<li id="' . $current[0]['ticket_id'] . '"><a href="#" class="single_ticket_action" id="' . $avail_labels[ $j ]['slug'] . '">' . esc_html__( 'Mark as', 'wsdesk' ) . ' ' . $avail_labels[ $j ]['title'] . '</a></li>';

										}
										if ( $avail_labels[ $j ]['slug'] == $current_meta['ticket_label'] ) {
											$ticket_label_slug = $avail_labels[ $j ]['slug'];
											$ticket_label      = $avail_labels[ $j ]['title'];
											$eye_color         = eh_crm_get_settingsmeta( $avail_labels[ $j ]['settings_id'], 'label_color' );
										}
									}
									$ticket_raiser = $current[0]['ticket_email'];
									if ( 0 != $current[0]['ticket_author'] ) {
										$current_user  = new WP_User( $current[0]['ticket_author'] );
										$ticket_raiser = $current_user->display_name;
									}
									$ticket_assignee_name  = array();
									$ticket_assignee_email = array();
									if ( isset( $current_meta['ticket_assignee'] ) ) {
										$current_assignee = $current_meta['ticket_assignee'];
										for ( $k = 0;$k < count( $current_assignee );$k++ ) {
											for ( $l = 0;$l < count( $users_data );$l++ ) {
												if ( $users_data[ $l ]['id'] == $current_assignee[ $k ] ) {
													array_push( $ticket_assignee_name, $users_data[ $l ]['name'] );
													array_push( $ticket_assignee_email, $users_data[ $l ]['email'] );
												}
											}
										}
									}
									$ticket_assignee_name = empty( $ticket_assignee_name ) ? esc_html__( 'No Assignee', 'wsdesk' ) : implode( ', ', $ticket_assignee_name );
									$latest_reply_id      = eh_crm_get_ticket_value_count( 'ticket_category', 'agent_note' , true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id', 'DESC', '1' );
									$latest_content       = array();
									$attach               = '';
									if ( ! empty( $latest_reply_id ) ) {
										$latest_ticket_reply            = eh_crm_get_ticket( array( 'ticket_id' => $latest_reply_id[0]['ticket_id'] ) );
										$latest_content['content']      = html_entity_decode( stripslashes( $latest_ticket_reply[0]['ticket_content'] ) );
										$latest_content['author_email'] = $latest_ticket_reply[0]['ticket_email'];
										$latest_content['reply_date']   = $latest_ticket_reply[0]['ticket_date'];
										if ( 0 != $latest_ticket_reply[0]['ticket_author'] ) {
											$reply_user                    = new WP_User( $latest_ticket_reply[0]['ticket_author'] );
											$latest_content['author_name'] = $reply_user->display_name;
										} else {
											$latest_content['author_name'] = esc_html__( 'Guest', 'wsdesk' );
										}
										$latest_reply_meta = eh_crm_get_ticketmeta_archive( $latest_reply_id[0]['ticket_id'] );
										if ( isset( $latest_reply_meta['ticket_attachment'] ) ) {
											$attach = ' | <small class="glyphicon glyphicon-pushpin"></small> <small style="opacity:0.7;"> ' . count( $latest_reply_meta['ticket_attachment'] ) . ' ' . esc_html__( 'Attachment', 'wsdesk' ) . '</small>';
										}
									} else {
										$latest_content['content']      = html_entity_decode( stripslashes( $current[0]['ticket_content'] ) );
										$latest_content['author_email'] = $current[0]['ticket_email'];
										$latest_content['reply_date']   = $current[0]['ticket_date'];
										if ( 0 != $current[0]['ticket_author'] ) {
											$current_user                  = new WP_User( $current[0]['ticket_author'] );
											$latest_content['author_name'] = $current_user->display_name;
										} else {
											$latest_content['author_name'] = esc_html__( 'Guest', 'wsdesk' );
										}
									}
									$ticket_tags = '';
									if ( ! empty( $avail_tags ) ) {
										for ( $j = 0;$j < count( $avail_tags );$j++ ) {
											$current_ticket_tags = ( isset( $current_meta['ticket_tags'] ) ? $current_meta['ticket_tags'] : array() );
											for ( $k = 0;$k < count( $current_ticket_tags );$k++ ) {
												if ( $avail_tags[ $j ]['slug'] == $current_ticket_tags[ $k ] ) {
													$ticket_tags .= '<span class="label label-info">#' . $avail_tags[ $j ]['title'] . '</span>';
												}
											}
										}
									}
									$ticket_rating = ( isset( $current_meta['ticket_rating'] ) ? ucfirst( $current_meta['ticket_rating'] ) : esc_html__( 'None', 'wsdesk' ) );
									$raiser_voice  = eh_crm_get_ticket_value_count( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'raiser_reply' );
									$agent_voice   = eh_crm_get_ticket_value_count( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'agent_reply' );
									echo '
                                                <tr class="clickable ticket_row" id="' . esc_html( $current[0]['ticket_id'] ) . '">
                                                    <td class="except_view"><button class="btn btn-default btn-xs accordion-toggle quick_view_ticket" style="background-color: ' . esc_html( $eye_color ) . ' !important" data-toggle="collapse" data-target="#search_expand_' . esc_html( $current[0]['ticket_id'] ) . '" ><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                                    <td>' . esc_html( $current[0]['ticket_id'] ) . '</td>
                                                    <td>' . esc_html( $ticket_raiser ) . '</td>
                                                    <td class="wrap_content" data-toggle="wsdesk_tooltip" title="' . esc_html( $current[0]['ticket_title'] ) . '" data-container="body">' . esc_html( $current[0]['ticket_title'] ) . '</td>
                                                    <td>' . esc_html( eh_crm_get_formatted_date( $latest_content['reply_date'] ) ) . '</td>
                                                    <td>' . esc_html( $ticket_assignee_name ) . '</td>
                                                </tr>
                                                <tr class="except_view">
                                                    <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="search_expand_' . esc_html( $current[0]['ticket_id'] ) . '">
                                                            <table class="table table-striped" style="margin-bottom: 0px !important">
                                                                <thead>
                                                                    <tr>
                                                                        <td colspan="12" style="white-space: normal;">
                                                                        <div style="padding:5px 0px;">
                                                                            <small class="glyphicon glyphicon-user"></small> <small style="opacity:0.7;">' . esc_html( $latest_content['author_name'] ) . '</small>
                                                                            | <small class="glyphicon glyphicon-envelope"></small> <small style="opacity:0.7;">' . esc_html( $latest_content['author_email'] ) . '</small>
                                                                            | <small class="glyphicon glyphicon-calendar"></small> <small style="opacity:0.7;">' . esc_html( eh_crm_get_formatted_date( $latest_content['reply_date'] ) ) . '</small>
                                                                            ' . esc_html( $attach ) . '
                                                                        </div>
                                                                        <hr>
                                                                        <p>
                                                                            ' . esc_html( $latest_content['content'] ) . '
                                                                        </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>' . esc_html__( 'Reply Requester', 'wsdesk' ) . '</th>
                                                                        <th>' . esc_html__( 'Raiser Voices', 'wsdesk' ) . '</th>
                                                                        <th>' . esc_html__( 'Agent Voices', 'wsdesk' ) . '</th>
                                                                        <th>' . esc_html__( 'Tags', 'wsdesk' ) . '</th>
                                                                        <th>' . esc_html__( 'Rating', 'wsdesk' ) . '</th>
                                                                        <th>' . esc_html__( 'Source', 'wsdesk' ) . '</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            ' . esc_html( $current[0]['ticket_email'] ) . '
                                                                        </td>
                                                                        <td>' . count( $raiser_voice ) . '</td>
                                                                        <td>' . count( $agent_voice ) . '</td>
                                                                        <td>' . ( ( '' != $ticket_tags ) ? esc_html( $ticket_tags ) : esc_html__( 'No Tags', 'wsdesk' ) ) . '</td>
                                                                        <td>' . esc_html( $ticket_rating ) . '</td>
                                                                        <td>' . ( ( isset( $current_meta['ticket_source'] ) ) ? esc_html( $current_meta['ticket_source'] ) : '' ) . '</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>';
								}
							}
							?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
				<?php
				$content = ob_get_clean();
				return $content;
	}
}
