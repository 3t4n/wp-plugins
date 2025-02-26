<?php

use WSDesk\Formatter\Cast\TimestampCaster;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require __DIR__ . '/class-crm-ajax-functions-three.php';

class CRM_Ajax extends CRM_Ajax_Three {

	public static function eh_crm_user_ticket_fetch( $email, $user, $slug = array(), $current_page = 1, $filter_label = '', $search_tickets = '' ) {
		$tickets_per_page = 25;
		$email_id         = eh_crm_get_ticket_value_count( 'ticket_email', $email, false, 'ticket_parent', 0, 'ticket_updated' );
		$user_id          = eh_crm_get_ticket_value_count( 'ticket_author', $user, false, 'ticket_parent', 0, 'ticket_updated' );
		$ticket           = array_values( array_unique( array_merge( $user_id, $email_id ), SORT_REGULAR ) );
		if ( empty( $ticket ) ) {
			return esc_html__( 'No Tickets Found', 'wsdesk' );
		}
		if ( 'all' != $filter_label ) {
			$filter_label_tickets = array();
			for ( $i = 0; $i < count( $ticket );  $i++ ) {
				$current_meta = eh_crm_get_ticketmeta( $ticket[ $i ]['ticket_id'] );
				if ( $current_meta['ticket_label'] == $filter_label ) {
					array_push( $filter_label_tickets, $ticket[ $i ] );
				}
			}
			$ticket = $filter_label_tickets;
		}
		if ( '' != $search_tickets ) {
			$searched_tickets = array();
			for ( $i = 0; $i < count( $ticket );  $i++ ) {
				$current = eh_crm_get_ticket( array( 'ticket_id' => $ticket[ $i ]['ticket_id'] ) );
				if ( ( strpos( $current[0]['ticket_title'], $search_tickets ) !== false || strpos( $current[0]['ticket_content'], $search_tickets ) !== false ) || $search_tickets == $ticket[ $i ]['ticket_id'] ) {
					array_push( $searched_tickets, $ticket[ $i ] );
				}
			}
			$ticket = $searched_tickets;
		}
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
		$avail_labels = eh_crm_get_settings( array( 'type' => 'label' ), array( 'slug', 'title', 'settings_id' ) );
		$avail_fields = eh_crm_get_settings( array( 'type' => 'field' ), array( 'slug', 'title', 'settings_id' ) );
		$enable       = eh_crm_get_settingsmeta( '0', 'close_tickets' );
		if ( ! $enable ) {
			$enable = 'enable';
		}
		$pages = floor( count( $ticket ) / $tickets_per_page );
		if ( count( $ticket ) % $tickets_per_page ) {
			$pages++;
		}
		$right_disable = '';
		if ( $current_page == $pages ) {
			$right_disable = 'disabled';
		}
		$left_disable = '';
		if ( 1 == $current_page ) {
			$left_disable = 'disabled';
		}

		$args         = array( 'type' => 'label' );
		$fields       = array( 'slug', 'title', 'settings_id' );
		$avail_labels = eh_crm_get_settings( $args, $fields );
		ob_start();
		?>
				<div class="panel panel-default tickets_panel" style="width:100%; overflow-x: scroll">
					<div class="panel-heading">
						<h3 class="panel-title">
							<div class="dropdown">
								<button class="btn dropdown-toggle filter_pagination_search pull-right" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-filter"></span></button>
								<ul class="dropdown-menu pull-right filter_dropdown">
								<?php
								if ( ! empty( $avail_labels ) ) {
									echo '<li><a href="#" class="filter_label" id="all">' . esc_html__( 'Show All', 'wsdesk' ) . '</a></li>';
									for ( $i = 0;$i < count( $avail_labels );$i++ ) {
										$label_title = eh_crm_wpml_translations( $avail_labels[ $i ]['title'], 'labels_' . $i . '_title', 'labels_' . $i . '_title' );
										echo '<li><a href="#" class="filter_label" id="' . esc_attr( $avail_labels[ $i ]['slug'] ) . '">' . esc_html__( 'Show ', 'wsdesk' ) . esc_html( $avail_labels[ $i ]['title'] ) . '</a></li>';
									}
								}
								?>
								</ul>
							</div>
							<input type="hidden" value="all" id="filter_label_input">
							<button type="button" <?php echo esc_html( $right_disable ); ?> class="btn filter_pagination_search pull-right" id="right_page"><span class="glyphicon glyphicon-chevron-right"></span></button>
							<span class="filter_pagination_search pull-right wsdesk_current_page" id="<?php echo esc_html( $current_page ); ?>"><?php echo esc_html( $current_page ); ?></span>
							<button type="button" <?php echo esc_html( $left_disable ); ?> class="btn filter_pagination_search pull-right" id="left_page"><span class="glyphicon glyphicon-chevron-left"></span></button>
							<div class="filter_pagination_search pull-right" style="position: relative">
								<span class="glyphicon glyphicon-search pull-right" id="search_ticket_icon"></span>
								<input type="text" name="search_tickets" id="search_tickets" class="filter_pagination_search" value="<?php echo esc_html( $search_tickets ); ?>" placeholder="<?php esc_html_e( 'Search Tickets', 'wsdesk' ); ?>">

							</div>

							<button type="submit" class="filter-each btn btn-primary" id="submit_check_all" style="display:none;margin-right: 2em;"> <?php esc_html_e( 'Close Ticket(s)', 'wsdesk' ); ?>
							</button>
							<?php esc_html_e( 'Your Tickets', 'wsdesk' ); ?>
							<span class="spinner_loader table_loader">
								<span class="bounce1"></span>
								<span class="bounce2"></span>
								<span class="bounce3"></span>
							</span>
						</h3>
					</div>
					<table class="table table-hover" id="support-table">
						<thead>
							<tr class="except_view">
								<?php if ( 'enable' == $enable ) { ?>
								<th><div class="filter-each"><input type="checkbox" class="ticket_select_all_check"></div></th>
								<?php } ?>
								<th>#</th>
								<th><?php esc_html_e( 'Subject', 'wsdesk' ); ?></th>
								<th><?php esc_html_e( 'Requested', 'wsdesk' ); ?></th>
								<th><?php esc_html_e( 'Assignee', 'wsdesk' ); ?></th>
								<th><?php esc_html_e( 'Status', 'wsdesk' ); ?></th>
								<?php
								if ( ! empty( $slug ) ) {
									$selected_fields = eh_crm_get_settingsmeta( 0, 'selected_fields' );
									foreach ( $slug as $value ) {
										if ( in_array( $value, $selected_fields ) ) {
											for ( $j = 0;$j < count( $avail_fields );$j++ ) {
												if ( $avail_fields[ $j ]['slug'] == $value ) {
													$avail_fields_title = eh_crm_wpml_translations( $avail_fields[ $j ]['title'], $avail_fields[ $j ] . '_fields_title', $avail_fields[ $j ] . '_fields_title' );
													?>
													  <th><?php echo esc_html( $avail_fields_title ); ?></th>
													<?php
												}
											}
										}
									}
								}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
							if ( ! empty( $ticket ) ) {
								for ( $i = ( $tickets_per_page * ( $current_page - 1 ) );$i < $tickets_per_page * $current_page && $i < count( $ticket );$i++ ) {
									$current      = eh_crm_get_ticket( array( 'ticket_id' => $ticket[ $i ]['ticket_id'] ) );
									$current_meta = eh_crm_get_ticketmeta( $ticket[ $i ]['ticket_id'] );
									$eye_color    = '';
									$label_name   = '';
									for ( $j = 0;$j < count( $avail_labels );$j++ ) {
										if ( $avail_labels[ $j ]['slug'] == $current_meta['ticket_label'] ) {
											$label_name = $avail_labels[ $j ]['title'];
											$eye_color  = eh_crm_get_settingsmeta( $avail_labels[ $j ]['settings_id'], 'label_color' );
										}
									}
									$ticket_assignee_name = array();
									if ( isset( $current_meta['ticket_assignee'] ) ) {
										$current_assignee = $current_meta['ticket_assignee'];
										for ( $k = 0;$k < count( $current_assignee );$k++ ) {
											for ( $l = 0;$l < count( $users_data );$l++ ) {
												if ( $users_data[ $l ]['id'] == $current_assignee[ $k ] ) {
													array_push( $ticket_assignee_name, $users_data[ $l ]['name'] );
												}
											}
										}
									}
									$ticket_assignee_name = empty( $ticket_assignee_name ) ? esc_html__( 'No Assignee', 'wsdesk' ) : implode( ', ', $ticket_assignee_name );

									echo '<tr class="ticket_row" id="' . esc_html( $current[0]['ticket_id'] ) . '">';

									if ( 'enable' == $enable ) {
										echo '  <td class="except_view"><input type="checkbox" name="check" class="ticket_select_check" id="ticket_select_check" value="' . esc_html( $current[0]['ticket_id'] ) . '"></td>';
									}
										$ticket_title = eh_crm_wpml_translations( $current[0]['ticket_title'], $ticket[ $i ]['ticket_id'] . '_ticket_title', $ticket[ $i ]['ticket_id'] . '_ticket_title' );
										$label_name   = eh_crm_wpml_translations( $label_name, $ticket[ $i ]['ticket_id'] . '_label_name', $ticket[ $i ]['ticket_id'] . '_label_name' );
										echo '
                                            <td><a href="' . esc_url( eh_get_url_by_shortcode( '[wsdesk_support display="form_support_request_table"' ) ) . '?customer_ticket_num=' . esc_attr( $current[0]['ticket_id'] ) . '" target="_blank">' . esc_attr( $current[0]['ticket_id'] ) . '</a></td>
                                            <td class="wrap_content"><a href="' . esc_attr( eh_get_url_by_shortcode( '[wsdesk_support display="form_support_request_table"' ) ) . '?customer_ticket_num=' . esc_attr( $current[0]['ticket_id'] ) . '" target="_blank">' . esc_html( $ticket_title ) . '</a></td>
                                            <td>' . esc_html( eh_crm_get_formatted_date( $current[0]['ticket_date'] ) ) . '</td>
                                            <td>' . esc_html( $ticket_assignee_name ) . '</td>
                                            <td><span class="label label-info" style="background-color:' . esc_html( $eye_color ) . ' !important">' . esc_html( $label_name ) . '</td>';
									if ( ! empty( $slug ) ) {
										foreach ( $slug as $value ) {
											if ( array_key_exists( $value, $current_meta ) ) {
												if ( ! empty( $current_meta[ $value ] ) ) {
													$field_id   = eh_crm_get_settings( array( 'slug' => $value ), 'settings_id' );
													$field_meta = eh_crm_get_settingsmeta( $field_id[0]['settings_id'] );
													switch ( $field_meta['field_type'] ) {
														case 'text':
														case 'number':
														case 'email':
														case 'password':
														case 'textarea':
														case 'date':
														case 'ip':
														case 'phone':
															echo '<td>' . esc_html( $current_meta[ $value ] ) . '</td>';
															break;
														case 'select':
															if ( 'woo_order_id' == $value ) {
																echo '<td>' . esc_html( $current_meta[ $value ] ) . '</td>';
															} else {
																echo '<td>' . esc_html( $field_meta['field_values'][ $current_meta[ $value ] ] ) . '</td>';
															}
															break;
														case 'radio':
														case 'woo_product':
														case 'woo_category':
														case 'woo_tags':
														case 'woo_vendors':
															echo '<td>' . esc_html( $field_meta['field_values'][ $current_meta[ $value ] ] ) . '</td>';
															break;
														case 'checkbox':
															$checkbox_values = array();
															foreach ( $current_meta[ $value ] as $a ) {
																array_push( $checkbox_values, $field_meta['field_values'][ $a ] );
															}
															echo '<td>' . esc_html( implode( ', ', $checkbox_values ) ) . '</td>';
													}
												} else {
													echo '<td> </td>';
												}
											} else {
												echo '<td> </td>';
											}
										}
									}
										echo '</tr>';
								}
							} else {
								echo '<tr class="except_view">
                                            <td colspan="5">' . esc_html__( 'No Tickets', 'wsdesk' ) . '</td>
                                        </tr>';
							}
							?>
						</tbody>
					</table>
				</div>
					<hr/>
				<div class="ticket_load_content" style="padding:5px !important"></div>
			<?php
			$content = ob_get_clean();
			return $content;
	}
	public static function eh_crm_ticket_close_check_request() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$id_get = array();
			$id_get = json_decode( isset( $_POST['val'] ) ? stripslashes( sanitize_text_field( $_POST['val'] ) ) : null );
			for ( $i = 0;$i < count( $id_get );$i++ ) {
				eh_crm_update_ticketmeta( $id_get[ $i ], 'ticket_label', 'label_LL02' );

			}
			die();
		}
	}

	public static function eh_crm_ticket_single_view_client() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : '';
			$content   = self::eh_crm_ticket_single_view_client_gen( $ticket_id );
			wp_send_json_success( array( 'page' => $content ) );
			die;
		}
	}

	public static function eh_crm_ticket_single_view_client_gen( $ticket_id ) {

		$current      = eh_crm_get_ticket( array( 'ticket_id' => $ticket_id ) );
		$current_meta = eh_crm_get_ticketmeta( $ticket_id );
		$users_data   = get_users( array( 'role__in' => array( 'administrator', 'WSDesk_Agents', 'WSDesk_Supervisor' ) ) );
		$users        = array();
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
		$avail_tags        = eh_crm_get_settings( array( 'type' => 'tag' ), array( 'slug', 'title', 'settings_id' ) );
		$avail_labels      = eh_crm_get_settings( array( 'type' => 'label' ), array( 'slug', 'title', 'settings_id' ) );
		$ticket_label      = '';
		$ticket_label_slug = '';
		$eye_color         = '';
		$enable            = eh_crm_get_settingsmeta( '0', 'close_tickets' );
		if ( ! $enable ) {
			$enable = 'enable';
		}
		for ( $j = 0;$j < count( $avail_labels );$j++ ) {
			if ( $avail_labels[ $j ]['slug'] == $current_meta['ticket_label'] ) {
				$ticket_label      = $avail_labels[ $j ]['title'];
				$ticket_label_slug = $avail_labels[ $j ]['slug'];
			}
			if ( $avail_labels[ $j ]['slug'] == $current_meta['ticket_label'] ) {
				$eye_color = eh_crm_get_settingsmeta( $avail_labels[ $j ]['settings_id'], 'label_color' );
			}
		}
		$ticket_tags_list = [];
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
						for ( $m = 0; $m < count( $posts ); $m++,$co++ ) {
							$response[ $co ]['title'] = $posts[ $m ]->post_title;
							$response[ $co ]['guid']  = $posts[ $m ]->guid;
						}
						$ticket_tags_list[] = '#' . $avail_tags[ $j ]['title'];
					}
				}
			}
		}
		ob_start();
		
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

				<div class="row hidden">
					<div class="col-md-12">
						<ol class="breadcrumb col-md-12" style="margin: 0 !important;background: none !important;border:none;padding: 8px 0px !important; ">
							<li><?php echo esc_html( $blog_info ); ?></li>
							<li><?php esc_html_e( 'Support', 'wsdesk' ); ?> </li>
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
				<hr />
				<div class="row">
					<div class="panel panel-default single_ticket_panel Ws-content-detail-full" id="<?php echo esc_html( $ticket_id ); ?>">

							<div class="rightPanel" style="border-left: none;">

								<div class="panel-heading rightPanelHeader" style="width:100% !important;">
									<div class="leftFreeSpace">
										<div class="icon" style="top: 5% !important;"><img src="<?php echo esc_url( EH_CRM_MAIN_IMG . 'message_icon.png' ); ?>"></div>
										<div class="tictxt">
								<p style="margin-top: 5px;font-size: 16px;">
								<?php
									echo esc_html( $current[0]['ticket_title'] );
								?>
									<span class="spinner_loader ticket_loader">
										<span class="bounce1"></span>
										<span class="bounce2"></span>
										<span class="bounce3"></span>
									</span>
								</p>
								<p class="info" style="margin-top: 5px;">
	<!--                                <i class="glyphicon glyphicon-user"></i> by-->
								<?php
								if ( 0 != $current[0]['ticket_author'] ) {
									$raiser_obj = new WP_User( $current[0]['ticket_author'] );
									echo esc_html( $raiser_obj->display_name );
								} else {
									echo '<span>' . esc_html( $current[0]['ticket_email'] ) . '</span>';
								}
								?>
									| <i class="glyphicon glyphicon-calendar"></i> <?php echo esc_html( TimestampCaster::cast( $current[0]['ticket_date'], 'ticket_date' ) ); ?>
									| <i class="glyphicon glyphicon-comment"></i>
									<?php
									$raiser_voice = eh_crm_get_ticket_value_count( 'ticket_parent', $ticket_id, false, 'ticket_category', 'raiser_reply' );
									echo count( $raiser_voice ) . ' ' . esc_html__( 'Raiser Voice', 'wsdesk' );
									?>
									| <i class="glyphicon glyphicon-bullhorn"></i>
									<?php
									$agent_voice = eh_crm_get_ticket_value_count( 'ticket_parent', $ticket_id, false, 'ticket_category', 'agent_reply' );
									echo count( $agent_voice ) . ' ' . esc_html__( 'Agent Voice', 'wsdesk' );
									?>
								</p>
								<p class="info" style="margin-top: 5px;">
									<i class="glyphicon glyphicon-tags"></i>
									<?php esc_html_e( 'Tags', 'wsdesk' ); ?> :
									<?php if ( empty( $ticket_tags_list ) ) { ?>
										<?php echo esc_html__( 'No Tags', 'wsdesk' ); ?>
									<?php } else { ?>
										<?php foreach ( $ticket_tags_list as $tag_item ) { ?>
											<span class="label label-info"><?php echo esc_html( $tag_item ); ?></span>
										<?php } ?>
									<?php } ?>
								</p>
										</div>
										</div>
							</div>
									<div class="col-md-12 ">
										<div class="row newMsgFull row-collapse" style="margin-bottom: 20px; padding-left:35px;">
											<div class="leftFreeSpace">
												<div class="icon"><img src="<?php echo esc_url( get_avatar_url( $current[0]['ticket_email'] ), array( 'size' => 50 ) ); ?>" style="border-radius: 25px;"></div>
												<div class="content">
													<div class="message-box">
												<div class="widget-area no-padding blank" style="width:100%">
													<div class="status-upload">
														<textarea rows="10" cols="30" class="form-control reply_textarea" id="reply_textarea_<?php echo esc_html( $ticket_id ); ?>" name="reply_textarea_<?php echo esc_html( $ticket_id ); ?>"></textarea>
														<div class="form-group">
															<div class="input-group col-md-12 col-sm-12 col-xs-12">
																<button class="btn btn-primary " onclick="jQuery(this).parent().find('.attachment_reply').click()">
																	<i class="glyphicon glyphicon-plus"></i>
																	<span><?php esc_html_e( 'Attachment', 'wsdesk' ); ?></span>
																</button>
																<input type="file" name="files" id="files_<?php echo esc_html( $ticket_id ); ?>" class="attachment_reply hide" multiple="">
																<div class="btn-group pull-right">
																	<div class="check-box">
																	<?php if ( 'enable' == $enable ) { ?>
																		<input type="checkbox" name="check" class="ticket_select_check" id="ticket_select_check_<?php echo esc_html( $ticket_id ); ?>" value="<?php echo esc_html( $ticket_id ); ?>" style="margin-bottom:0.5em"/>
																		<?php esc_html_e( 'Mark as Solved', 'wsdesk' ); ?>
																		<?php } ?>
																		<button type="button" class="btn btn-primary ticket_reply_action_button" data-loading-text="<?php esc_html__( 'Submitting Reply...', 'wsdesk' ); ?>" id="<?php echo esc_html( $ticket_id ); ?>" style="margin-left:1em">
																	<?php esc_html_e( 'Submit', 'wsdesk' ); ?>
																		</button>
																	</div>
																</div>
															</div>
															<div class="upload_preview_files_<?php echo esc_html( $ticket_id ); ?>"></div>
														</div>
													</div><!-- Status Upload  -->
												</div><!-- Widget Area -->
													</div>
											</div>
											</div>
										</div>
										<section class="comment-list">
										<?php self::eh_crm_ticket_reply_section_gen_client( $ticket_id ); ?>
										</section>
									</div>

								</div>
							</div>
						</div>
			<?php
			return ob_get_clean();
	}

	public static function eh_crm_ticket_client_section_load() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null;
			ob_start();
			self::eh_crm_ticket_reply_section_gen_client( $ticket_id );
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_ticket_reply_section_gen_client( $ticket_id ) {
		$reply_id = eh_crm_get_ticket_value_count( 'ticket_parent', $ticket_id, false, '', '', 'ticket_updated', 'DESC' );
		array_push( $reply_id, array( 'ticket_id' => $ticket_id ) );
		for ( $s = 0;$s < count( $reply_id );$s++ ) {
			$reply_ticket      = eh_crm_get_ticket( array( 'ticket_id' => $reply_id[ $s ]['ticket_id'] ) );
			$reply_ticket_meta = eh_crm_get_ticketmeta( $reply_id[ $s ]['ticket_id'] );
			$replier_name      = '';
			$replier_email     = $reply_ticket[0]['ticket_email'];
			$replier_pic       = '';
			if ( 0 != $reply_ticket[0]['ticket_author'] ) {
				$replier_obj  = new WP_User( $reply_ticket[0]['ticket_author'] );
				$replier_name = $replier_obj->display_name;
				$replier_pic  = get_avatar_url( $reply_ticket[0]['ticket_author'], array( 'size' => 50 ) );
			} else {
				$replier_name = esc_html__( 'Guest', 'wsdesk' );
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
					if ( in_array( $att_ext, $img_ext ) ) {
						$attachment .= '<a href="' . $current_att . '" target="_blank"><img class="img-upload clickable" style="width:200px" title="' . $att_name . '" src="' . $current_att . '"></a></p>';
					} else {
						$check_file_ext = array( 'doc', 'docx', 'pdf', 'xml', 'csv', 'xlsx', 'xls', 'txt', 'zip', 'ppt', 'pptx', 'bat' );
						if ( in_array( $att_ext, $check_file_ext ) ) {
							$attachment .= '<a href="' . $current_att . '" target="_blank" title="' . $att_name . '" class="img-upload"><div class="' . $att_ext . '"></div></a>';
						} else {
							$attachment .= '<a href="' . $current_att . '" target="_blank" title="' . $att_name . '" class="img-upload"><div class="unknown_type"></div></a>';
						}
					}
				}
				$attachment .= '</div>';
			}
			switch ( $reply_ticket[0]['ticket_category'] ) {
				case 'agent_reply':
				case 'raiser_reply':
					if ( ( $reply_ticket[0]['ticket_category'] ) == 'agent_reply' ) {
						$replier_email = '';
						if ( '' == $replier_name ) {
							$replier_name = 'Support';
						}
					}
					if ( ( $reply_ticket[0]['ticket_category'] ) == 'raiser_reply' ) {
						$replier_email = $replier_email . '|';

					}
					echo '
                            <div class="conversation_each" style="width:100.5% !important;">
                                <div class="leftFreeSpace">
                                <div class="icon">
                                        <img style="border-radius: 25px;" src="' . esc_attr( $replier_pic ) . '" />
                                </div>
                                <h3>' . esc_html( $replier_name ) . '</h3>
                                            <h4>
                                                ' . esc_url( $replier_email ) . '
                                                ' . esc_html( TimestampCaster::cast( $reply_ticket[0]['ticket_date'], 'ticket_date' ) ) . '
                                            </h4>
                                            <hr>
                                            <div class="comment-post">
                                                <p>';
											$input_data = html_entity_decode( stripslashes( $reply_ticket[0]['ticket_content'] ) );

											echo wp_kses_post( $input_data );
											echo '</p>';
					if ( isset( $reply_ticket_meta['ticket_attachment'] ) ) {
						$reply_att = $reply_ticket_meta['ticket_attachment'];
						?>
															 <div>
									<?php
									for ( $at = 0;$at < count( $reply_att );$at++ ) {
								$current_att = $reply_att[ $at ];
								$att_ext     = pathinfo( $current_att, PATHINFO_EXTENSION );
										if ( empty( $att_ext ) ) {
																$att_ext = '';
										}
								$att_name = pathinfo( $current_att, PATHINFO_FILENAME );
								$img_ext  = array( 'jpg', 'jpeg', 'png', 'gif' );
										if ( in_array( strtolower( $att_ext ), $img_ext ) ) {
											?>
																		<a href='<?php echo esc_html( $current_att ); ?>' target="_blank"><img class="img-upload clickable" style="width:200px" title='<?php echo esc_html( $att_name ); ?>' src='<?php echo esc_html( $current_att ); ?>'></a></p>
																	<?php
										} else {
											$check_file_ext = array( 'doc', 'docx', 'pdf', 'xml', 'csv', 'xlsx', 'xls', 'txt', 'zip', 'mp3', 'mp4', 'syx', 'cdr', 'bmp', 'ppt', 'pptx', 'bat' );
											if ( in_array( $att_ext, $check_file_ext ) ) {
												?>
																			<a href='<?php echo esc_html( $current_att ); ?>' target="_blank" title='<?php echo esc_html( $att_name ); ?>' class="img-upload"><div class='<?php echo esc_html( $att_ext ); ?>'></div></a>
																		<?php
											} else {
												?>
																			<a href='<?php echo esc_html( $current_att ); ?>' target="_blank" title='<?php echo esc_html( $att_name ); ?>' class="img-upload"><div class='unknown_type'></div></a>
																		<?php
											}
										}
									}
									?>
																</div>
						<?php
					}
					?>
											</div>
								</div>
							</div>
						<?php
					break;
				default:
					break;
			}
		}
	}

	public static function eh_crm_ticket_reply_raiser() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$files_values = $_FILES;
			$files        = isset( $files_values['file'] ) ? $files_values['file'] : '';
			$status       = isset( $_POST['close'] ) ? sanitize_text_field( $_POST['close'] ) : null;
			$ticket_id    = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null;
			$content      = str_replace( "\n", '<br/>', isset( $_POST['ticket_reply'] ) ? sanitize_textarea_field( $_POST['ticket_reply'] ) : null );
			$parent       = eh_crm_get_ticket( array( 'ticket_id' => $ticket_id ) );
			$user         = wp_get_current_user();
			$category     = 'raiser_reply';
			$child        = array(
				'ticket_email'    => $user->user_email,
				'ticket_title'    => $parent[0]['ticket_title'],
				'ticket_content'  => $content,
				'ticket_category' => $category,
				'ticket_parent'   => $ticket_id,
				'ticket_vendor'   => $parent[0]['ticket_vendor'],
			);
			$child_meta   = array();
			if ( isset( $_FILES['file'] ) && ! empty( $_FILES['file'] ) ) {
				$attachment_data                      = self::eh_crm_ticket_file_handler( $files );
				$child_meta['ticket_attachment']      = $attachment_data['url'];
				$child_meta['ticket_attachment_path'] = $attachment_data['path'];
			}
			$gen_id = eh_crm_insert_ticket( $child, $child_meta );
			$submit = eh_crm_get_settingsmeta( '0', 'default_label' );
			if ( 'close' == $status ) {
				eh_crm_update_ticketmeta( $ticket_id, 'ticket_label', 'label_LL02' );
			} else {
				eh_crm_update_ticketmeta( $ticket_id, 'ticket_label', $submit );
			}
			eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Started ------------- ' );
			eh_crm_debug_error_log( 'Ticket raiser reply for Ticket #' . $gen_id );
			eh_crm_debug_error_log( 'Email function called for reply Ticket #' . $gen_id );
			self::eh_crm_fire_email( 'reply_ticket', $gen_id );
			eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Ended ------------- ' );
			$content_ticket = self::eh_crm_ticket_single_view_client_gen( $ticket_id );
			$user_id        = get_current_user_id();
			$user_data      = new WP_User( $user_id );
			$email          = $user_data->user_email;
			die( json_encode( array( 'ticket' => $content_ticket ) ) );
		}
	}

	public static function eh_crm_activate_oauth() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$client_id     = isset( $_POST['client_id'] ) ? sanitize_text_field( $_POST['client_id'] ) : null;
			$client_secret = isset( $_POST['client_secret'] ) ? sanitize_text_field( $_POST['client_secret'] ) : null;
			eh_crm_update_settingsmeta( 0, 'oauth_client_id', $client_id );
			eh_crm_update_settingsmeta( 0, 'oauth_client_secret', $client_secret );
			$oauth_obj = new EH_CRM_OAuth();
			wp_send_json_success( array( 'page' => $oauth_obj->make_oauth_uri() ) );
			die;
		}
	}

	public static function eh_crm_deactivate_oauth() {
		$oauth_obj = new EH_CRM_OAuth();
		$oauth_obj->revoke_token();
	
		ob_start();
		include EH_CRM_MAIN_VIEWS . 'email/crm_oauth_setup.php';
		$myhtml = ob_get_clean();
	
		wp_send_json_success( array( 'page' => $myhtml ) );
		die;
	}

	public static function eh_crm_activate_email_protocol() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$server_url   = isset( $_POST['server_url'] ) ? sanitize_text_field( $_POST['server_url'] ) : null;
			$server_port  = isset( $_POST['server_port'] ) ? sanitize_text_field( $_POST['server_port'] ) : null;
			$email        = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : null;
			$email_pwd    = isset( $_POST['email_pwd'] ) ? sanitize_text_field( $_POST['email_pwd'] ) : null;
			$delete_email = isset( $_POST['delete_email'] ) ? sanitize_text_field( $_POST['delete_email'] ) : null;
			$username     = isset( $_POST['username'] ) ? sanitize_text_field( $_POST['username'] ) : null;
			$charset      = isset( $_POST['charset'] ) ? sanitize_text_field( $_POST['charset'] ) : null;
			$debug_status = eh_crm_get_settingsmeta( 0, 'wsdesk_debug_status' );

			if ( in_array( 'imap', get_loaded_extensions() ) ) {

				$flags = array(
					'imap',
					'ssl',
					'novalidate-cert',
				);

				if ( $username ) {
					$flags[] = 'user=' . $username;
				}

				if ( 'enable' != $debug_status ) {
					$imap = @imap_open( '{' . $server_url . ':' . $server_port . '/' . implode( '/', $flags ) . '}', $email, $email_pwd );
				} else {
					$imap = imap_open( '{' . $server_url . ':' . $server_port . '/' . implode( '/', $flags ) . '}', $email, $email_pwd );
				}
				if ( ! $imap ) {
					die(
						json_encode(
							array(
								'status'  => 'failure',
								'message' => esc_html__(
									'EMail Server Not Found',
									'wsdesk'
								),
								'errors'  => imap_errors(),
							)
						)
					);
				} else {
					$imap_account_data = eh_crm_get_settingsmeta( '0', 'imap_account_data' );
					if ( empty( $imap_account_data ) ) {
						$imap_account_data   = array();
						$imap_account_data[] = array(
							'imap_server_url'       => $server_url,
							'imap_server_port'      => $server_port,
							'imap_server_email'     => $email,
							'imap_server_email_pwd' => $email_pwd,
							'imap_activation'       => 'activated',
							'delete_email'          => $delete_email,
							'username'              => $username,
							'charset'               => $charset,
						);
						eh_crm_update_settingsmeta( '0', 'imap_account_data', $imap_account_data );
					} else {
						$imap_account_data[] = array(
							'imap_server_url'       => $server_url,
							'imap_server_port'      => $server_port,
							'imap_server_email'     => $email,
							'imap_server_email_pwd' => $email_pwd,
							'imap_activation'       => 'activated',
							'delete_email'          => $delete_email,
							'username'              => $username,
							'charset'               => $charset,
						);
						eh_crm_update_settingsmeta( '0', 'imap_account_data', $imap_account_data );
					}

					ob_start();
					include EH_CRM_MAIN_VIEWS . 'email/crm_imap_setup.php';

					die(
						wp_json_encode(
							array(
								'status'  => 'success',
								'message' => esc_html__( 'Email IMAP Configured', 'wsdesk' ),
								'content' => ob_get_clean(),
							)
						)
					);
				}
			} else {
				die(
					json_encode(
						array(
							'status'  => 'failure',
							'message' => esc_html__(
								'IMAP is not enabled in your Server',
								'wsdesk'
							),
						)
					)
				);
			}
		}
	}

	public static function eh_crm_deactivate_email_protocol() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$id = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : null;
			if ( $id ) {
				$imap_account_data = array_values( eh_crm_get_settingsmeta( '0', 'imap_account_data' ) );
				unset( $imap_account_data[ $id - 1 ] );
				eh_crm_update_settingsmeta( '0', 'imap_account_data', $imap_account_data );
				ob_start();
				include EH_CRM_MAIN_VIEWS . 'email/crm_imap_setup.php';
				wp_send_json_success( array( 'page' => ob_get_clean() ) );
				die;
			}
		}
	}

	public static function eh_crm_email_block_filter() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$new_block = json_decode( stripslashes( isset( $_POST['new_block'] ) ? sanitize_text_field( $_POST['new_block'] ) : null ), true );
			if ( ! empty( $new_block ) ) {

				$new_email    = $new_block['email'];
				$type         = $new_block['type'];
				$block_filter = eh_crm_get_settingsmeta( '0', 'email_block_filters' );
				if ( ! $block_filter ) {
					$block_filter = array();
				}
				$available = true;
				foreach ( $block_filter as $email => $data ) {
					if ( $new_email == $email ) {
						$available = false;
					}
				}
				if ( $available ) {
					$block_filter[ $new_email ] = $type;
					eh_crm_update_settingsmeta( '0', 'email_block_filters', $block_filter );
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'email/crm_filter_block_setup.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_subject_block_filter() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$new_block = json_decode( stripslashes( isset( $_POST['new_block'] ) ? sanitize_text_field( $_POST['new_block'] ) : null ), true );
			if ( ! empty( $new_block ) ) {

				$new_subject  = $new_block['subject'];
				$new_type     = $new_block['type'];
				$block_filter = eh_crm_get_settingsmeta( '0', 'subject_block_filters' );
				if ( ! $block_filter ) {
					$block_filter = array();
				}
				$available = true;
				foreach ( $block_filter as $index => $data ) {
					if ( $new_subject == $data ) {
						$available = false;
					}
				}
				if ( $available ) {
					$block_filter[ $new_subject ] = $new_type;
					eh_crm_update_settingsmeta( '0', 'subject_block_filters', $block_filter );
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'email/crm_filter_block_setup.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_email_block_delete() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$block_remove = isset( $_POST['block_remove'] ) ? sanitize_text_field( $_POST['block_remove'] ) : null;
			$block_filter = eh_crm_get_settingsmeta( '0', 'email_block_filters' );
			if ( ! $block_filter ) {
				$block_filter = array();
			}
			foreach ( $block_filter as $email => $data ) {
				if ( $email === $block_remove ) {
					unset( $block_filter[ $email ] );
					eh_crm_update_settingsmeta( '0', 'email_block_filters', $block_filter );
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'email/crm_filter_block_setup.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_subject_block_delete() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$block_remove = isset( $_POST['block_remove'] ) ? sanitize_text_field( $_POST['block_remove'] ) : null;
			$block_filter = eh_crm_get_settingsmeta( '0', 'subject_block_filters' );
			if ( ! $block_filter ) {
				$block_filter = array();
			}
			if ( isset( $block_filter[ $block_remove ] ) ) {
				unset( $block_filter[ $block_remove ] );
				eh_crm_update_settingsmeta( '0', 'subject_block_filters', $block_filter );
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'email/crm_filter_block_setup.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_fire_email( $type, $ticket_id ) {
		set_time_limit( 300 );
		$ticket           = eh_crm_get_ticket( array( 'ticket_id' => $ticket_id ) );
			$filter_check = array();

			/**
			 * Fire a filter hook for notify block
			 *
			 * @since 3.1.2
			 * 
			 * @param $filter_check
			 * @param $ticket
			 *
			 */
			$filter_check = apply_filters( 'wsdesk_notify_block', $filter_check, $ticket );
		if ( ! empty( $filter_check ) ) {
			return array(
				'status'  => true,
				'message' => esc_html__( 'Email sent successfully', 'wsdesk' ),
			);
		}
			$ticket_meta = eh_crm_get_ticketmeta( $ticket_id );
			$parent_id   = $ticket[0]['ticket_parent'];
			$meta        = array();
		if ( 0 != $parent_id ) {
			$meta = eh_crm_get_ticketmeta( $parent_id );
		} else {
			$meta = eh_crm_get_ticketmeta( $ticket_id );
		}
			eh_crm_debug_error_log( 'Ticket Meta - ' );
			eh_crm_debug_error_log( $meta );
			$ticket_assignee_name = array();
			$user_roles_default   = array( 'WSDesk_Agents', 'WSDesk_Supervisor', 'administrator' );
			$users                = get_users( array( 'role__in' => $user_roles_default ) );
			$users_data           = array();
		for ( $i = 0; $i < count( $users ); $i++ ) {
			$current                   = $users[ $i ];
			$id                        = $current->ID;
			$user                      = new WP_User( $id );
			$users_data[ $i ]['id']    = $id;
			$users_data[ $i ]['name']  = $user->display_name;
			$users_data[ $i ]['caps']  = $user->caps;
			$users_data[ $i ]['email'] = $user->user_email;
		}
		if ( isset( $meta['ticket_assignee'] ) ) {
			$current_assignee = $meta['ticket_assignee'];
			for ( $k = 0;$k < count( $current_assignee );$k++ ) {
				for ( $l = 0;$l < count( $users_data );$l++ ) {
					if ( $users_data[ $l ]['id'] == $current_assignee[ $k ] ) {
						array_push( $ticket_assignee_name, $users_data[ $l ]['name'] );
					}
				}
			}
		}
			$ticket_assignee = empty( $ticket_assignee_name ) ? esc_html__( 'No Assignee', 'wsdesk' ) : implode( ', ', $ticket_assignee_name );
			$ticket_tags     = array();
			$avail_tags_wf   = eh_crm_get_settings( array( 'type' => 'tag' ), array( 'slug', 'title', 'settings_id' ) );
		if ( ! empty( $avail_tags_wf ) ) {
			$current_ticket_tags = ( isset( $meta['ticket_tags'] ) ? $meta['ticket_tags'] : array() );
			for ( $j = 0;$j < count( $avail_tags_wf );$j++ ) {
				for ( $k = 0;$k < count( $current_ticket_tags );$k++ ) {
					if ( $avail_tags_wf[ $j ]['slug'] == $current_ticket_tags[ $k ] ) {
						array_push( $ticket_tags, $avail_tags_wf[ $j ]['title'] );
					}
				}
			}
		}
			$ticket_tags_name = empty( $ticket_tags ) ? esc_html__( 'No Tags', 'wsdesk' ) : implode( ', ', $ticket_tags );
			$replier_name     = '';
		if ( 0 != $ticket[0]['ticket_author'] ) {
			$replier_obj  = new WP_User( $ticket[0]['ticket_author'] );
			$replier_name = $replier_obj->display_name;
		}
			$avail_labels = eh_crm_get_settings( array( 'type' => 'label' ), array( 'slug', 'title', 'settings_id' ) );
			$ticket_label = '';
		for ( $j = 0;$j < count( $avail_labels );$j++ ) {
			if ( $avail_labels[ $j ]['slug'] == $meta['ticket_label'] ) {
				$ticket_label = $avail_labels[ $j ]['title'];
			}
		}
			$attachments = array();
			$message     = '';
			$subject     = '';
		if ( 'new_ticket' == $type ) {
			$message = eh_crm_get_settingsmeta( '0', 'support_email_new_ticket_text' );
			if ( '' == $message ) {
				$message = 'Your request (#[id]) has been received on [date] and is being reviewed by our support staff.

                                To add additional comments, reply to this email.

                                Your Issue:
                                [request_description]

                                Tags : [tags]

                                Regards,
                                Support';
			}
			$message = str_replace( '[id]', $ticket_id, $message );
			$message = str_replace( '[assignee]', $ticket_assignee, $message );
			$message = str_replace( '[tags]', $ticket_tags_name, $message );
			$date    = TimestampCaster::cast( $ticket[0]['ticket_date'], 'ticket_date' );
			$message = str_replace( '[date]', $date, $message );
			$message = str_replace( '[request_description]', html_entity_decode( stripslashes( $ticket[0]['ticket_content'] ) ), $message );
			$subject = 'Ticket [' . esc_html( $ticket_id ) . '] : ' . $ticket[0]['ticket_title'];
			if ( EH_CRM_PAY_FOR_SUPPORT_STATUS ) {
				$message = str_replace( '[pfs_credit_score]', Pfs_Credit_Triggers::get_pfs_credit_score( $ticket[0]['ticket_author'] ), $message );
			}
		} else {
			$subject = 'Re: ' . esc_html__( 'Ticket', 'wsdesk' ) . ' [' . $ticket[0]['ticket_parent'] . '] : ' . $ticket[0]['ticket_title'];
			$message = eh_crm_get_settingsmeta( '0', 'support_email_reply_text' );
			if ( '' == $message ) {
				$message = 'Your request (#[id]) has been updated. To add additional comments, reply to this email.

                                [conversation_history]';
			}
			$message = str_replace( '[id]', $ticket[0]['ticket_parent'], $message );
			$message = str_replace( '[assignee]', $ticket_assignee, $message );
			$message = str_replace( '[tags]', $ticket_tags_name, $message );
			$date    = TimestampCaster::cast( $ticket[0]['ticket_date'], 'ticket_date' );
			$message = str_replace( '[date]', $date, $message );
			$message = str_replace( '[latest_reply]', eh_crm_get_ticket_latest_content( $parent_id ), $message );
			$message = str_replace( '[latest_reply_with_notes]', eh_crm_get_ticket_latest_notes( $parent_id ), $message );
			$message = str_replace( '[agent_replied]', $replier_name, $message );
			$message = str_replace( '[status]', $ticket_label, $message );
			if ( EH_CRM_PAY_FOR_SUPPORT_STATUS ) {
				$message = str_replace( '[pfs_credit_score]', Pfs_Credit_Triggers::get_pfs_credit_score( $ticket['ticket_author'] ), $message );
			}

			$selected_fields = eh_crm_get_settingsmeta( 0, 'selected_fields' );
			if ( empty( $selected_fields ) ) {
				$selected_fields = array( 'request_email', 'request_title', 'request_description' );
			}
			$avail_fields = eh_crm_get_settings( array( 'type' => 'field' ), array( 'slug', 'title', 'settings_id' ) );
			if ( 0 != $parent_id ) {
				$tic_id = $parent_id;
			} else {
				$tic_id = $ticket_id;
			}
			$tic      = eh_crm_get_ticket( array( 'ticket_id' => $tic_id ) );
			$tic_meta = eh_crm_get_ticketmeta( $tic_id );
			foreach ( $avail_fields as $field ) {
				if ( 'google_captcha' === $field['slug'] || ! in_array( $field['slug'], $selected_fields ) ) {
					continue;
				}
				if ( strpos( $message, '[' . $field['slug'] . ']' ) !== false ) {
					switch ( $field['slug'] ) {
						case 'request_email':
							$message = str_replace( '[request_email]', $tic[0]['ticket_email'], $message );
							break;
						case 'request_title':
							$message = str_replace( '[request_title]', $tic[0]['ticket_title'], $message );
							break;
						case 'request_description':
							$message = str_replace( '[request_description]', html_entity_decode( stripslashes( $tic[0]['ticket_content'] ) ), $message );
							break;
					}
					$field_meta = eh_crm_get_settingsmeta( $field['settings_id'] );
					switch ( $field_meta['field_type'] ) {
						case 'file':
							$attachments = ( isset( $ticket_meta['ticket_attachment_path'] ) ? $ticket_meta['ticket_attachment_path'] : array() );
							$file_value  = ( isset( $ticket_meta['ticket_attachment'] ) ? $ticket_meta['ticket_attachment'] : array() );
							$file_data   = '';
							if ( ! empty( $file_value ) ) {
								foreach ( $file_value as $tic_attachemnt ) {
									$file_data .= '<a href="' . $tic_attachemnt . '">' . ( $tic_attachemnt ) . '<a><br />';
								}
							}
							$message = str_replace( '[' . $field['slug'] . ']', $file_data, $message );
							break;
						case 'text':
						case 'number':
						case 'email':
						case 'password':
						case 'textarea':
						case 'ip':
						case 'date':
						case 'phone':
							$value   = ( isset( $tic_meta[ $field['slug'] ] ) ? $tic_meta[ $field['slug'] ] : '' );
							$message = str_replace( '[' . $field['slug'] . ']', $value, $message );
							break;
						case 'select':
							if ( 'woo_order_id' == $field['slug'] ) {
								$value   = ( isset( $tic_meta[ $field['slug'] ] ) ? $tic_meta[ $field['slug'] ] : '' );
								$message = str_replace( '[' . $field['slug'] . ']', $value, $message );
							} else {
								$value   = ( isset( $tic_meta[ $field['slug'] ] ) ? $tic_meta[ $field['slug'] ] : '' );
								$option  = ( isset( $field_meta['field_values'][ $value ] ) ? $field_meta['field_values'][ $value ] : '' );
								$message = str_replace( '[' . $field['slug'] . ']', $option, $message );
							}
							break;
						case 'checkbox':
						case 'radio':
						case 'woo_product':
						case 'edd_products':
						case 'woo_category':
						case 'woo_tags':
						case 'woo_vendors':
							$value  = ( isset( $tic_meta[ $field['slug'] ] ) ? $tic_meta[ $field['slug'] ] : '' );
							$option = ( isset( $field_meta['field_values'][ $value ] ) ? $field_meta['field_values'][ $value ] : '' );

							if ( '' == $option && is_array( $value ) ) {
								$option = array();
								foreach ( $field_meta['field_values'] as $field_key => $field_value ) {
									if ( in_array( $field_key, $value ) ) {
										$option[] = $field_value;
									}
								}

								$option = implode( ', ', $option );
							}

							$message = str_replace( '[' . $field['slug'] . ']', $option, $message );
							break;
					}
				}
			}
			if ( strpos( $message, '[conversation_history]' ) !== false ) {
				if ( 0 != $parent_id ) {
					$reply_content = eh_crm_get_ticket_data( $parent_id );
					$msg           = eh_crm_get_conversation_template( $reply_content );
					$message       = str_replace( '[conversation_history]', $msg, $message );
				}
			}
			if ( strpos( $message, '[conversation_history_with_agent_note]' ) !== false ) {
				if ( 0 != $ticket_id ) {
					$reply_content = eh_crm_get_ticket_data_with_note( $parent_id );
					$msg           = eh_crm_get_conversation_template( $reply_content );
					$message       = str_replace( '[conversation_history_with_agent_note]', $msg, $message );
				}
			}
		}
			$attachments = ( isset( $ticket_meta['ticket_attachment_path'] ) ? $ticket_meta['ticket_attachment_path'] : array() );

			$message = stripslashes( $message );
			preg_match( "/ticket_link page='([^']+)'/", $message, $output_page );
		if ( 0 != ! empty( $output_page ) && $parent_id ) {
			$message = str_replace( '[' . stripslashes( $output_page[0] ) . ']', site_url() . '/' . $output_page[1] . '/?customer_ticket_num=' . $parent_id, $message );

		}
			$support_email_name = eh_crm_get_settingsmeta( '0', 'support_reply_email_name' );
			$support_email      = eh_crm_get_settingsmeta( '0', 'support_reply_email' );
			$headers            = array();
			$headers[]          = 'MIME-Version: 1.0' . "\r\n";
			$headers[]          = "Content-Type: text/html; charset=UTF-8 \r\n";
		if ( isset( $meta['ticket_cc'] ) ) {
			foreach ( $meta['ticket_cc'] as $cc ) {
				$headers[] = 'Cc: ' . $cc;
			}
		}
		if ( isset( $meta['ticket_bcc'] ) ) {
			foreach ( $meta['ticket_bcc'] as $bcc ) {
				$headers[] = 'Bcc: ' . $bcc;
			}
		}
		if ( '' != $support_email ) {
			$headers[] = 'From: ' . $support_email_name . ' <' . $support_email . '>';
		}
			$to = '';

		if ( 0 == $ticket[0]['ticket_parent'] ) {
			$to = $ticket[0]['ticket_email'];
		} else {
			$ticket_parent = eh_crm_get_ticket( array( 'ticket_id' => $ticket[0]['ticket_parent'] ) );
			$to            = $ticket_parent[0]['ticket_email'];
		}

			/**
			 * Fire an action hook for wpml switch language for email
			 *
			 * @since 3.1.2
			 * 
			 * @param $to
			 *
			 */
			do_action( 'wpml_switch_language_for_email', $to );

			$html     = '<html>
                     <body>';
			$html    .= str_replace( "\n", '<br/>', $message );
			$html    .= eh_crm_get_poweredby_scripts();
			$html    .= '</body></html>';
			$response = false;
			$resmes   = 'Email sent successfully';
		try {
			if ( eh_crm_validate_email_block( $to, 'send' ) ) {
				eh_crm_debug_error_log( 'Triggering wp_mail with these paramters ...' );
				eh_crm_debug_error_log( 'to - ' . $to );
				eh_crm_debug_error_log( 'subject - ' . $subject );
				eh_crm_debug_error_log( 'html - ' . $html );
				eh_crm_debug_error_log( 'headers - ' );
				eh_crm_debug_error_log( $headers );
				eh_crm_debug_error_log( 'attachments - ' );
				eh_crm_debug_error_log( $attachments );
				add_filter(
					'wp_mail_from',
					function( $email ) {
						return eh_crm_get_settingsmeta( '0', 'support_reply_email' );
					}
				);
				add_filter(
					'wp_mail_from_name',
					function( $name ) {
						return eh_crm_get_settingsmeta( '0', 'support_reply_email_name' );
					}
				);
				eh_crm_debug_error_log( 'Calling wp_mail ...' );
				$response = wp_mail( $to, $subject, $html, $headers, $attachments );
				remove_filter( 'wp_mail_from', 'get_wp_mail_from' );
				remove_filter( 'wp_mail_from_name', 'get_wp_mail_from_name' );

				/**
				 * Fire an action hook for reset language after mailing
				 *
				 * @since 3.1.2
				 * 
				 */
				do_action( 'wpml_reset_language_after_mailing' );
				eh_crm_debug_error_log( 'wp_mail returned: ' . ( ( $response ) ? 'TRUE' : 'FALSE' ) );
				// if(eh_crm_pre_check_back_to_back($support_email, $to, $subject))
				// {
				// eh_crm_debug_error_log("Triggering wp_mail with these paramters ...");
				// eh_crm_debug_error_log("to - ".$to);
				// eh_crm_debug_error_log("subject - ".$subject);
				// eh_crm_debug_error_log("html - ".$html);
				// eh_crm_debug_error_log("headers - ");
				// eh_crm_debug_error_log($headers);
				// eh_crm_debug_error_log("attachments - ");
				// eh_crm_debug_error_log($attachments);
				// eh_crm_debug_error_log("Calling wp_mail ...");
				// $response = wp_mail($to, $subject, $html,$headers,$attachments);
				// eh_crm_debug_error_log("wp_mail returned: ".(($response)?"TRUE":"FALSE"));
				// }
				// else
				// {
				// eh_crm_debug_error_log("Pre check back to back failed ...");
				// eh_crm_debug_error_log("Sendind Email to Admin Email ...");
				// $admin_email = get_option('admin_email');
				// $html = '<html>
				// <head>
				// <style type="text/css">
				// .powered_wsdesk span
				// {
				// opacity: 0.4;
				// font-size: 10px;
				// color: black;
				// }
				// .powered_wsdesk a
				// {
				// opacity: 0.4;
				// font-size: 10px;
				// color: black !important;
				// }
				// </style>
				// </head>
				// <body>';
				// $html.= 'From: '.$to.'<br/>';
				// $html.= 'To: '.$support_email.'<br/>';
				// $html.= 'Ticket Number: #'.$ticket_id.'<br/>';
				// $html.= 'Ticket Subject: '.str_replace('Re:', '', $subject).'<br/>';
				// $html.= eh_crm_get_poweredby_scripts();
				// $html.= '</body></html>';
				// $response = wp_mail($admin_email, "WSDesk Alert! Email loop found for #".$ticket_id, $html,$headers);
				// eh_crm_debug_error_log("wp_mail returned: ".(($response)?"TRUE":"FALSE"));
				// }
			}
		} catch ( Exception $exc ) {
			$resmes = $exc->getTraceAsString();
			eh_crm_debug_error_log( 'exception on triggering email: ' . $resmes );
		}
			eh_crm_debug_error_log( 'returning from triggering email: ' . $resmes );
			return array(
				'status'  => $response,
				'message' => $resmes,
			);

	}

	public static function eh_crm_email_support_save() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$support_email_name    = isset( $_POST['support_email_name'] ) ? sanitize_text_field( $_POST['support_email_name'] ) : null;
			$support_email         = isset( $_POST['support_email'] ) ? sanitize_text_field( $_POST['support_email'] ) : null;
			$new_ticket_text       = isset( $_POST['new_ticket_text'] ) ? wp_kses_post( $_POST['new_ticket_text'] ) : null;
			$reply_ticket_text     = isset( $_POST['reply_ticket_text'] ) ? wp_kses_post( $_POST['reply_ticket_text'] ) : null;
			$auto_send_notif       = isset( $_POST['auto_send_notif'] ) ? sanitize_text_field( $_POST['auto_send_notif'] ) : null;
			$send_agent_reply_mail = empty( $_POST['send_agent_reply_mail'] ) ? 'disabled' : sanitize_text_field( $_POST['send_agent_reply_mail'] );
			eh_crm_update_settingsmeta( 0, 'support_reply_email_name', $support_email_name );
			eh_crm_update_settingsmeta( 0, 'support_reply_email', $support_email );
			eh_crm_update_settingsmeta( 0, 'auto_send_creation_email', $auto_send_notif );
			eh_crm_update_settingsmeta( 0, 'support_email_new_ticket_text', $new_ticket_text );
			eh_crm_update_settingsmeta( 0, 'support_email_reply_text', $reply_ticket_text );
			eh_crm_update_settingsmeta( 0, 'send_agent_reply_mail', $send_agent_reply_mail );
			die();
		}
	}

	public static function eh_crm_backup_data() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			require_once EH_CRM_MAIN_PATH . 'includes/class-crm-backup-restore.php';
			$post  = $_POST;
			$start = isset( $_POST['backup_date_range_start'] ) ? sanitize_text_field( $_POST['backup_date_range_start'] ) : null;
			$end   = isset( $_POST['backup_date_range_end'] ) ? sanitize_text_field( $_POST['backup_date_range_end'] ) : null;
			$data  = isset( $_POST['backup_data_values'] ) ? $post['backup_data_values'] : null;
			$B_R   = new EH_CRM_Backup_Restore();
			$B_R->backup_data_xml( $start, $end, $data );
		}
	}

	public static function eh_crm_restore_data() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			require_once EH_CRM_MAIN_PATH . 'includes/class-crm-backup-restore.php';
			if ( isset( $_FILES['file'] ) && ! empty( $_FILES['file'] ) ) {
				$B_R = new EH_CRM_Backup_Restore();
				$B_R->restore_data_xml( isset( $_FILES['file']['tmp_name'][0] ) ? sanitize_text_field( $_FILES['file']['tmp_name'][0] ) : null );
				wp_send_json_success( array( 'message' => ( '' ) ) );
				die;
			}
			$message = esc_html__( 'Restore Finished', 'wsdesk' ) . '. ' . esc_html__( 'Refresh and Hit to go', 'wsdesk' );
			wp_send_json_error( array( 'message' => $message ), 422 );
		}
	}

	public static function eh_crm_zendesk_save_data() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$token     = isset( $_POST['token'] ) ? sanitize_text_field( $_POST['token'] ) : null;
			$subdomain = isset( $_POST['subdomain'] ) ? sanitize_text_field( $_POST['subdomain'] ) : null;
			$username  = isset( $_POST['username'] ) ? sanitize_text_field( $_POST['username'] ) : null;
			eh_crm_update_settingsmeta( 0, 'zendesk_accesstoken', $token );
			eh_crm_update_settingsmeta( 0, 'zendesk_subdomain', $subdomain );
			eh_crm_update_settingsmeta( 0, 'zendesk_username', $username );
			die( 'success' );
		}
	}

	public static function eh_crm_zendesk_pull_tickets() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			eh_crm_update_settingsmeta( 0, 'zendesk_tickets_import', 'started' );
			eh_crm_write_log( '' );
			$page       = isset( $_POST['page'] ) ? sanitize_text_field( $_POST['page'] ) : null
			;
			$attachment = isset( $_POST['attachment'] ) ? sanitize_text_field( $_POST['attachment'] ) : null
			;
			$plan       = isset( $_POST['plan'] ) ? sanitize_text_field( $_POST['plan'] ) : null
			;
			require_once EH_CRM_MAIN_PATH . 'includes/class-crm-import-tickets.php';
			$import   = new EH_CRM_Import_Tickets();
			$response = $import->zendesk_get_ticket( $page, $attachment, $plan );
			$return   = array();
			if ( 'success' == $response['status'] ) {
				if ( 0 != $response['next'] ) {
					$return['status']     = 'continue';
					$return['next_page']  = $response['next'];
					$return['percentage'] = ( $response['total'] / ( 100 / ( $response['next'] - 1 ) ) );
				} else {
					$return['total']  = $response['total'];
					$return['status'] = 'completed';
					eh_crm_update_settingsmeta( 0, 'zendesk_tickets_import', 'stopped' );
				}
			} else {
				$return['status'] = 'failure';
				$return['body']   = $response['message'];
			}
			die( json_encode( $return ) );
		}
	}

	public static function eh_crm_live_log() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			if ( isset( $_GET['action'] ) ) {
				if ( ! session_id() ) {
					session_start();
				}
				$upload = wp_upload_dir();
				$handle = fopen( $upload['path'] . '/wsdesk_import', 'r' );
				if ( isset( $_SESSION['offset'] ) ) {
					$data = stream_get_contents( $handle, -1, $_SESSION['offset'] );
					if ( isset( $_SESSION['old_data'] ) ) {
						if ( $_SESSION['old_data'] == $data ) {
							die();
						} else {
							$_SESSION['old_data'] = $data;
							echo '<br/>' . nl2br( esc_html( $data ) );
						}
					} else {
						$_SESSION['old_data'] = $data;
						echo '<br/>' . nl2br( esc_html( $data ) );
					}
				} else {
					fseek( $handle, 0, SEEK_END );
					$_SESSION['offset'] = ftell( $handle );
				}
				die();
			}
		}
	}

	public static function eh_crm_zendesk_stop_pull_tickets() {
		eh_crm_update_settingsmeta( 0, 'zendesk_tickets_import', 'stopped' );
		die();
	}

	public static function eh_crm_woo_report_products() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$data   = ( ( '' !== isset( $_POST['data'] ) ? sanitize_text_field( $_POST['data'] ) : null ) ? explode( ',', isset( $_POST['data'] ) ? sanitize_text_field( $_POST['data'] ) : null ) : array() );
			$result = eh_crm_woo_products_generate_bar_values( $data );
			die( json_encode( $result ) );
		}
	}

	public static function eh_crm_woo_report_category() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$data   = ( ( '' !== isset( $_POST['data'] ) ? sanitize_text_field( $_POST['data'] ) : null ) ? explode( ',', isset( $_POST['data'] ) ? sanitize_text_field( $_POST['data'] ) : null ) : array() );
			$result = eh_crm_woo_category_generate_bar_values( $data );
			die( json_encode( $result ) );
		}
	}

	public static function eh_crm_ticket_new_template() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$title            = stripslashes( isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : null );
			$content          = stripslashes( isset( $_POST['content'] ) ? wp_kses_post( $_POST['content'] ) : null );
			$insert           = array(
				'title'  => $title,
				'filter' => 'no',
				'type'   => 'template',
				'vendor' => '',
			);
			$meta             = array(
				'template_content' => $content,
				'template_author'  => get_current_user_id(),
				'template_scope'   => 'global',
				'template_usage'   => 0,
			);
			$id               = eh_crm_insert_settings( $insert, $meta );
			$avail_caps       = array( 'reply_tickets', 'delete_tickets', 'manage_tickets', 'manage_templates' );
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
			$template = eh_crm_get_settings( array( 'settings_id' => $id ) );
			$html     = '';
			$html    .= '<li class="list-group-item available_template ' . $template[0]['slug'] . '_li"> <span class="truncate multiple_template_action ' . $template[0]['slug'] . '_head" id="' . $template[0]['slug'] . '">' . $template[0]['title'] . '</span>';
			if ( in_array( 'manage_templates', $access ) ) {
				$html .= '<span class="pull-right"> <span class="glyphicon glyphicon-pencil ticket_template_edit_type" id="' . $template[0]['slug'] . '" data-toggle="wsdesk_tooltip" data-container="body" title="' . esc_html__( 'Edit Template', 'wsdesk' ) . '" style="margin-right:5px;cursor:pointer;font-size: large;"></span></span>';
			}
			$html .= '</li>';
			wp_send_json_success( array( 'page' => $html ) );
			die;
		}
	}

	public static function eh_crm_ticket_update_template() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$slug    = stripslashes( isset( $_POST['slug'] ) ? sanitize_text_field( $_POST['slug'] ) : null );
			$title   = stripslashes( isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : null );
			$content = stripslashes( isset( $_POST['content'] ) ? wp_kses_post( $_POST['content'] ) : null );
			$temp    = eh_crm_get_settings( array( 'slug' => $slug ) );
			eh_crm_update_settings( $temp[0]['settings_id'], array( 'title' => $title ) );
			eh_crm_update_settingsmeta( $temp[0]['settings_id'], 'template_content', $content );
			die();
		}
	}

	public static function eh_crm_ticket_template_delete() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$slug = isset( $_POST['slug'] ) ? sanitize_text_field( $_POST['slug'] ) : null;
			$temp = eh_crm_get_settings( array( 'slug' => $slug ) );
			eh_crm_delete_settings( $temp[0]['settings_id'] );
			die();
		}
	}
	public static function eh_crm_ticket_template_search_single() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$text      = isset( $_POST['text'] ) ? sanitize_text_field( $_POST['text'] ) : null;
			$ticket_id = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : null;
			set_time_limit( 300 );
			global $wpdb;
			$table     = $wpdb->prefix . 'wsdesk_settings';
			$tablemeta = $wpdb->prefix . 'wsdesk_settingsmeta';
			$data      = $wpdb->get_results( $wpdb->prepare( 'SELECT DISTINCT(p.settings_id) FROM ' . $wpdb->prefix . 'wsdesk_settings AS p JOIN ' . $wpdb->prefix . 'wsdesk_settingsmeta AS a ON (p.settings_id = a.settings_id AND p.type=template) WHERE p.title LIKE %s OR (a.meta_key = template_content AND a.meta_value LIKE %s) AND p.type=template', ' % ' . $text . ' % ', ' % ' . $text . ' % ' ), ARRAY_A );
			if ( ! $data ) {
				die( "<li class='list-group-item search_template_" . esc_attr( $ticket_id ) . "'>" . esc_html__( 'No template found', 'wsdesk' ) . '</li>' );
			}
			$html = '';
			foreach ( $data as $temp ) {
				$template = eh_crm_get_settings( array( 'settings_id' => $temp['settings_id'] ) );
				$html    .= '<li class="list-group-item search_template_' . esc_attr( $ticket_id ) . ' search_template_' . esc_attr( $ticket_id ) . ' ' . $template[0]['slug'] . '_li" id="' . esc_attr( $ticket_id ) . '" title="' . $template[0]['title'] . '"> <span class="truncate multiple_template_action ' . $template[0]['slug'] . '_head" based="single" id="' . $template[0]['slug'] . '">' . $template[0]['title'] . '</span></li>';
			}
			wp_send_json_success( array( 'page' => $html ) );
			die;
		}
	}
	public static function eh_crm_ticket_template_search() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$text = isset( $_POST['text'] ) ? sanitize_text_field( $_POST['text'] ) : '';
			set_time_limit( 300 );
			global $wpdb;
			$table     = $wpdb->prefix . 'wsdesk_settings';
			$tablemeta = $wpdb->prefix . 'wsdesk_settingsmeta';
			$data      = $wpdb->get_results( $wpdb->prepare( 'SELECT DISTINCT(p.settings_id) FROM ' . $wpdb->prefix . 'wsdesk_settings AS p JOIN ' . $wpdb->prefix . 'wsdesk_settingsmeta AS a ON (p.settings_id = a.settings_id AND p.type=template) WHERE p.title LIKE %s OR (a.meta_key = template_content AND a.meta_value LIKE %s) AND p.type=template', ' % ' . $text . ' % ', ' % ' . $text . ' % ' ), ARRAY_A );
			if ( ! $data ) {
				die( "<li class='list-group-item search_template'>" . esc_html__( 'No template found', 'wsdesk' ) . '</li>' );
			}
			$avail_caps       = array( 'reply_tickets', 'delete_tickets', 'manage_tickets', 'manage_templates' );
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
			$html = '';
			foreach ( $data as $temp ) {
				$template = eh_crm_get_settings( array( 'settings_id' => $temp['settings_id'] ) );
				$html    .= '<li class="list-group-item search_template ' . $template[0]['slug'] . '_li" title="' . $template[0]['title'] . '"> <span class="truncate multiple_template_action ' . $template[0]['slug'] . '_head" id="' . $template[0]['slug'] . '" based="bulk">' . $template[0]['title'] . '</span>';
				if ( in_array( 'manage_templates', $access ) ) {
					$html .= '<span class="pull-right"> <span class="glyphicon glyphicon-pencil ticket_template_edit_type" id="' . $template[0]['slug'] . '" data-toggle="wsdesk_tooltip" data-container="body" title="' . esc_html__( 'Edit Template', 'wsdesk' ) . '" style="margin-right:5px;cursor:pointer;font-size: large;"></span></span>';
				}
				$html .= '</li>';
			}
			wp_send_json_success( array( 'page' => $html ) );
			die;
		}
	}

	public static function eh_crm_ticket_edit_template_content() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
		$slug         = isset( $_POST['slug'] ) ? sanitize_text_field( $_POST['slug'] ) : null;
		$temp         = eh_crm_get_settings( array( 'slug' => $slug ) );
		$temp_meta    = eh_crm_get_settingsmeta( $temp[0]['settings_id'] );
		$avail_fields = eh_crm_get_settings( array( 'type' => 'field' ), array( 'slug', 'title', 'settings_id' ) );
		ob_start();
			?>
			<div class="modal fade" id="edit_template_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><?php esc_html_e( 'Edit Template', 'wsdesk' ); ?> - <?php echo esc_html( $temp[0]['title'] ); ?></h4>
				  </div>
				  <div class="modal-body">
					<p style="margin-top: 5px;font-size: 16px;">
						<label for="edit_template_title"><small>Template title to identify</small></label>
						<input type="text" placeholder="Enter Title" class="form-control template_title_editable" id="edit_template_title" value="<?php echo esc_html( $temp[0]['title'] ); ?>">
					</p>
					<div class="panel-group" id="edit_temp_role" style="margin-bottom: 10px !important;">
						<div class="panel panel-default">
							<div class="panel-heading collapsed" style="padding:10px;cursor: pointer;" data-toggle="collapse" data-parent="#edit_temp_role" data-target="#edit_temp_content">
								<span class ="email-reply-toggle"></span>
								<h4 class="panel-title">
								<?php esc_html_e( 'Code for template', 'wsdesk' ); ?>
								</h4>
							</div>
							<div id="edit_temp_content" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3">
											[name]
											</div>
											<div class="col-md-9">
											<?php esc_html_e( 'To insert ticket raiser name in the templates', 'wsdesk' ); ?>
											</div>
										</div>
										<span class="crm-divider"></span>
										<div class="row">
											<div class="col-md-3">
												[id]
											</div>
											<div class="col-md-9">
											<?php esc_html_e( 'To insert ticket number in the templates', 'wsdesk' ); ?>
											</div>
										</div>
									<?php
										$selected_fields = eh_crm_get_settingsmeta( 0, 'selected_fields' );
									foreach ( $avail_fields as $field ) {
										if ( 'google_captcha' || ! in_array( $field['slug'] === $field['slug'] , $selected_fields ) ) {
											continue;
										}
										echo '
                                                    <span class="crm-divider"></span>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            [' . esc_attr( $field['slug'] ) . ']
                                                        </div>
                                                        <div class="col-md-9">
                                                           ' . esc_html__( 'To insert ', 'wsdesk' ) . ' ' . esc_html( $field['title'] ) . ' ' . esc_html__( 'field value in the template', 'wsdesk' ) . '
                                                        </div>
                                                    </div>';
									}
									?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class='textarea' style="height: 100px" id="edit_template_content"><?php echo wp_kses_post( $temp_meta['template_content'] ); ?></div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-warning pull-left delete_template" id="<?php echo esc_html( $temp[0]['slug'] ); ?>"><span class="glyphicon glyphicon-remove"></span> <?php esc_html_e( 'Delete', 'wsdesk' ); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php esc_html_e( 'Close', 'wsdesk' ); ?></button>
					<button type="button" class="btn btn-primary edit_template" id="<?php echo esc_html( $temp[0]['slug'] ); ?>"><span class="glyphicon glyphicon-ok"></span> <?php esc_html_e( 'Update', 'wsdesk' ); ?></button>
				  </div>
				</div>
			  </div>
			</div>
			<?php
			$html = ob_get_clean();
			wp_send_json_success( array( 'page' => $html ) );
			die;
		}
	}

	public static function eh_crm_ticket_multiple_template_send() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$tickets  = json_decode( stripslashes( isset( $_POST['ticket'] ) ? sanitize_text_field( $_POST['ticket'] ) : null ), true );
			$open     = json_decode( stripslashes( isset( $_POST['opened'] ) ? sanitize_text_field( $_POST['opened'] ) : null ), true );
			$template = isset( $_POST['template'] ) ? sanitize_text_field( $_POST['template'] ) : null;
			$submit   = isset( $_POST['label'] ) ? sanitize_text_field( $_POST['label'] ) : null;
			$gen_html = array();

			if ( ! empty( $tickets ) ) {
				set_time_limit( 0 ); // 0=NOLIMIT
				$filter = isset( $_POST['params']['ticket_id'] ) ? array() : array( 'ticket_id' => $tickets );

				if ( isset( $_POST['params']['ticket_id'] ) ) {
					$count = count( $_POST['params']['ticket_id'] );

					for ( $i = 0; $i < $count; $i++ ) {
						$filter['ticket_id'][] = isset( $_POST['params']['ticket_id'][ $i ] ) ? sanitize_text_field( $_POST['params']['ticket_id'][ $i ] ) : '';
					}
				}

				$user               = wp_get_current_user();
				$user_roles_default = array( 'WSDesk_Agents', 'WSDesk_Supervisor', 'administrator' );
				$repo               = new \WSDesk\Tickets\TicketRepository();
				$query              = $repo->applyFilter( $filter )->select( 'ticket_id' );
				$repo->chunk(
					$query,
					50,
					function ( $tickets ) use ( $open, $template, $submit, $user, $user_roles_default, &$gen_html ) {
						foreach ( $tickets as $ticket ) {
							$ticket   = (array) $ticket;
							$tic      = $ticket['ticket_id'];
							$parent   = eh_crm_get_ticket( array( 'ticket_id' => $tic ) );
							$content  = eh_crm_get_template_content( $template, $tic );
							$category = '';
							if ( count( array_intersect( $user_roles_default, $user->roles ) ) != 0 ) {
								if ( 'note' == $submit ) {
									$category = 'agent_note';
								} else {
									eh_crm_update_ticketmeta( $tic, 'ticket_label', $submit );
									$category = 'agent_reply';
								}
							} else {
								$category = 'raiser_reply';
							}
							$vendor = '';
							if ( EH_CRM_WOO_VENDOR ) {
								$vendor = EH_CRM_WOO_VENDOR;
							}
							$child                 = array(
								'ticket_email'    => $user->user_email,
								'ticket_title'    => $parent[0]['ticket_title'],
								'ticket_content'  => $content,
								'ticket_category' => $category,
								'ticket_parent'   => $tic,
								'ticket_vendor'   => $vendor,
							);
							$gen_id                = eh_crm_insert_ticket( $child );
							$send_agent_reply_mail = eh_crm_get_settingsmeta( '0', 'send_agent_reply_mail' );
							if ( 'disabled' != $send_agent_reply_mail ) {
								if ( 'agent_reply' == $category ) {
									CRM_Ajax::eh_crm_fire_email( 'reply_ticket', $gen_id );
								}
							}
							if ( in_array( $tic, $open ) ) {
								$content_html     = CRM_Ajax::eh_crm_ticket_single_view_gen( $tic );
								$tab              = CRM_Ajax::eh_crm_ticket_single_view_gen_head( $tic );
								$gen_html[ $tic ] = array(
									'tab_head'    => $tab,
									'tab_content' => $content_html,
								);
							}
						}
					}
				);
			}
			die( json_encode( $gen_html ) );
		}
	}

	public static function eh_crm_get_settingsmeta_from_slug() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$fields        = 'settings_id';
			$slug          = isset( $_POST['slug'] ) ? sanitize_text_field( $_POST['slug'] ) : null;
			$args          = array( 'slug' => $slug );
			$settings      = eh_crm_get_settings( $args, $fields );
			$settings_id   = $settings[0];
			$settings_meta = eh_crm_get_settingsmeta( $settings_id['settings_id'] );
			die( json_encode( $settings_meta ) );
		}
	}

	public static function eh_crm_ticket_preview_template() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$slug         = isset( $_POST['slug'] ) ? sanitize_text_field( $_POST['slug'] ) : null;
			$type         = isset( $_POST['type'] ) ? sanitize_text_field( $_POST['type'] ) : null;
			$tickets      = json_decode( stripslashes( isset( $_POST['ticket'] ) ? sanitize_text_field( $_POST['ticket'] ) : null ), true );
			$temp         = eh_crm_get_settings( array( 'slug' => $slug ) );
			$ticket_id    = $tickets[0];
			$content      = eh_crm_get_template_content( $slug, $ticket_id );
			$avail_labels = eh_crm_get_settings( array( 'type' => 'label' ), array( 'slug', 'title', 'settings_id' ) );
			$based        = '';
			$id           = '';
			if ( 'bulk' === $type ) {
				$based = "based='bulk'";
				ob_start();
				?>
					<div class="modal fade" id="preview_template_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">(<?php echo '#' . esc_html( $ticket_id ); ?>) <?php esc_html_e( 'Template preview', 'wsdesk' ); ?> - <?php echo esc_html( $temp[0]['title'] ); ?></h4>
						</div>
						<div class="modal-body">
								<input type="hidden" value="<?php echo esc_html( $temp[0]['slug'] ); ?>" id="template_id_for_confirm">
							<?php echo esc_html( $content ); ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" style="margin-right:10px;" data-dismiss="modal"><?php esc_html_e( 'Close', 'wsdesk' ); ?></button>
							<div class="btn-group pull-right">
								<button type="button" class="btn btn-primary dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php esc_html_e( 'Submit as', 'wsdesk' ); ?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
								<?php
								for ( $j = 0;$j < count( $avail_labels );$j++ ) {
									echo '<li ' . esc_html( $id ) . '><a href="#" class="ticket_template_confirm_action" ' . esc_html( $based ) . ' id="' . esc_html( $avail_labels[ $j ]['slug'] ) . '">' . esc_html__( 'Submit as', 'wsdesk' ) . ' ' . esc_html( $avail_labels[ $j ]['title'] ) . '</a></li>';
								}
								?>
									<li role="separator" class="divider"></li>
									<li <?php echo esc_html( $id ); ?>><a href="#" class="ticket_template_confirm_action" <?php echo esc_html( $based ); ?> id="note"><?php esc_html_e( 'Submit as Note', 'wsdesk' ); ?></a></li>
									<li class="text-center"><small class="text-muted"><?php esc_html_e( 'Notes visible to Agents and Supervisors', 'wsdesk' ); ?></small></li>
								</ul>
							</div>
						</div>
						</div>
					</div>
					</div>
					<?php
					$html = ob_get_clean();
					wp_send_json_success( array( 'page' => $html ) );
					die;
			} elseif ( 'single' === $type ) {
				wp_send_json_success( array( 'page' => $content ) );
				die;
			}
		}
	}

	public static function eh_crm_settings_initiate_ticket() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			global $wpdb;
			$start_number = isset( $_POST['start_number'] ) ? sanitize_text_field( $_POST['start_number'] ) : null;
			$table_name   = $wpdb->prefix . 'wsdesk_tickets';
			$db_name      = $wpdb->dbname;
			$result       = $wpdb->get_results( $wpdb->prepare( 'SELECT `AUTO_INCREMENT` as ai FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = %s AND TABLE_NAME = ' . $wpdb->prefix . 'wsdesk_tickets', $db_name ), ARRAY_A );
			$return       = array();
			if ( $result[0]['ai'] < $start_number ) {
				$wpdb->get_results( $wpdb->prepare( 'ALTER TABLE ' . $wpdb->prefix . 'wsdesk_tickets AUTO_INCREMENT = %d', (int) $start_number ), ARRAY_A );
				$return = array( 'result' => 'success' );
			} else {
				$return = array(
					'result' => 'failed',
					'ai'     => $result[0]['ai'],
				);
			}
			die( json_encode( $return ) );
		}
	}

	public static function uninstall_reason_submission() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			global $wpdb;

			if ( ! isset( $_POST['reason_id'] ) ) {
				wp_send_json_error();
			}

			$data = array(
				'reason_id'      => isset( $_POST['reason_id'] ) ? sanitize_text_field( $_POST['reason_id'] ) : null,
				'plugin'         => 'wsdesk',
				'auth'           => 'wsdesk_uninstall_1234#',
				'date'           => gmdate( 'M d, Y h:i:s A' ),
				'url'            => home_url(),
				'user_email'     => ( isset( $_POST['allow_contacting'] ) ? sanitize_text_field( $_POST['allow_contacting'] ) : null ) ? ( isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : null ) : '',
				'reason_info'    => isset( $_REQUEST['reason_info'] ) ? trim( sanitize_text_field( $_REQUEST['reason_info'] ) ) : '',
				'software'       => isset( $_SERVER['SERVER_SOFTWARE'] ) ? sanitize_text_field( $_SERVER['SERVER_SOFTWARE'] ) : null,
				'php_version'    => phpversion(),
				'mysql_version'  => $wpdb->db_version(),
				'wp_version'     => get_bloginfo( 'version' ),
				'locale'         => get_locale(),
				'multisite'      => is_multisite() ? 'Yes' : 'No',
				'wsdesk_version' => EH_CRM_VERSION,
			);
			$resp = wp_remote_post(
				'https://wsdesk.com/wp-json/wsdesk/v1/uninstall',
				array(
					'method'      => 'POST',
					'timeout'     => 45,
					'redirection' => 5,
					'httpversion' => '1.0',
					'blocking'    => false,
					'headers'     => array( 'user-agent' => 'wsdesk/' . md5( esc_url( home_url() ) ) . ';' ),
					'body'        => $data,
					'cookies'     => array(),
				)
			);

			wp_send_json_success();
		}
	}
	public static function wsdesk_api_create_ticket( WP_REST_Request $request ) {
		global $wpdb;
		$enable_api = eh_crm_get_settingsmeta( '0', 'enable_api' );

		if ( 'enable' != $enable_api ) {
			die(
				json_encode(
					array(
						'status'  => 'error',
						'message' => 'API not enabled',
					)
				)
			);
		}

		$post_values = $request->get_params();

		if ( isset( $post_values['g-recaptcha-response'] ) ) {
			if ( '' == $post_values['g-recaptcha-response'] ) {
				die( 'captcha_failed' );
			}
			require_once 'recaptcha.php';
			$settings  = eh_crm_get_settings( array( 'slug' => 'google_captcha' ), 'settings_id' );
			$secret    = eh_crm_get_settingsmeta( $settings[0]['settings_id'], 'field_secret_key' );
			$reCaptcha = new ReCaptcha( $secret );
			$response  = $reCaptcha->verifyResponse( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( $_SERVER['REMOTE_ADDR'] ) : null, $post_values['g-recaptcha-response'] );
			if ( null && ! $response->success == $response ) {
				die( 'captcha_failed' );
			}
		}
			$files_values = $_FILES;
			$files        = isset( $files_values['file'] ) ? $files_values['file'] : '';
			$email        = $post_values['request_email'];
			$title        = stripslashes( $post_values['request_title'] );
			$desc         = str_replace( "\n", '<br/>', stripslashes( $post_values['request_description'] ) );
			$vendor       = '';
		if ( EH_CRM_WOO_STATUS ) {
			if ( isset( $post_values['woo_vendors'] ) ) {
				$vendor = str_replace( 'v_', '', $post_values['woo_vendors'] );
			}
		}
			$user = get_user_by( 'email', $email );
			$args = array(
				'ticket_email'    => $email,
				'ticket_title'    => $title,
				'ticket_content'  => $desc,
				'ticket_category' => 'raiser_reply',
				'ticket_vendor'   => $vendor,
				'ticket_author'   => empty( $user ) ? 0 : $user->ID,
			);
			if ( eh_crm_get_settingsmeta( 0, 'auto_create_user' ) === 'enable' ) {
				$email_check = email_exists( $email );
				if ( $email_check ) {
					$args['ticket_author'] = $email_check;
				} else {

					$maybe_username = explode( '@', $email );
					$maybe_username = sanitize_user( $maybe_username[0] );
					$counter        = 1;
					$username       = $maybe_username;
					$password       = wp_generate_password( 12, true );

					while ( username_exists( $username ) ) {
						$username = $maybe_username . $counter;
						$counter++;
					}

					$user = wp_create_user( $username, $password, $email );
					if ( ! is_wp_error( $user ) ) {
						wp_new_user_notification( $user, null, 'both' );
						$args['ticket_author'] = $user;
					}
				}
			}
			unset( $post_values['request_email'] );
			unset( $post_values['request_title'] );
			unset( $post_values['request_description'] );
			$meta       = array();
			$req_args   = array( 'type' => 'tag' );
			$fields     = array( 'slug', 'title', 'settings_id' );
			$avail_tags = eh_crm_get_settings( $req_args, $fields );
			$tagged     = array();
			if ( ! empty( $avail_tags ) ) {
				for ( $i = 0, $j = 0; $i < count( $avail_tags ); $i++ ) {
					if ( preg_match( '/' . strtolower( $avail_tags[ $i ]['title'] ) . '/', strtolower( $desc ) ) || preg_match( '/' . strtolower( $avail_tags[ $i ]['title'] ) . '/', strtolower( $title ) ) ) {
						$tagged[ $j ] = $avail_tags[ $i ]['slug'];
						$j++;
					}
				}
			}
			$meta['ticket_tags'] = $tagged;
			$default_assignee    = eh_crm_get_settingsmeta( '0', 'default_assignee' );
			$assignee            = array();
			switch ( $default_assignee ) {
				case 'ticket_tags':
					$users     = get_users( array( 'role__in' => array( 'WSDesk_Agents', 'WSDesk_Supervisor' ) ) );
					$user_tags = array();
					for ( $i = 0; $i < count( $users ); $i++ ) {
						$current          = $users[ $i ];
						$id               = $current->ID;
						$user_tags[ $id ] = get_user_meta( $id, 'wsdesk_tags', true );
					}
					foreach ( $user_tags as $key => $value ) {
						for ( $i = 0;$i < count( $value );$i++ ) {
							if ( in_array( $value[ $i ], $tagged ) ) {
								array_push( $assignee, $key );
								break;
							}
						}
					}
					break;
				case 'ticket_vendors':
					array_push( $assignee, $vendor );
					break;
				case 'no_assignee':
					break;
				default:
					array_push( $assignee, $default_assignee );
					break;
			}
			$meta['ticket_assignee'] = $assignee;
			$default_label           = eh_crm_get_settingsmeta( '0', 'default_label' );
			if ( eh_crm_get_settings( array( 'slug' => $default_label ) ) ) {
				$meta['ticket_label'] = $default_label;
			}
			foreach ( $post_values as $key => $value ) {
				 // Check if the key starts with 'field'
				if ( strpos( $key, 'field' ) === 0 ) {
					// Run SQL query to fetch meta_value
					$meta_value = $wpdb->get_col(
						$wpdb->prepare(
							"SELECT meta_value
										FROM wp_wsdesk_settingsmeta
										WHERE meta_key = 'field_values'
										AND settings_id = (SELECT settings_id 
										FROM wp_wsdesk_settings
										WHERE slug = %s)",
							$key 
						)
					);
					if ( is_array( $meta_value ) && array_key_exists( 0, $meta_value ) ) {
						$meta_value = $meta_value[0];
						$meta_value = maybe_unserialize( $meta_value );

					} else {
						$meta_value = null;
					}

					// Check if the value is present in the fetched meta_value
					if ( null !== $meta_value && ! is_array( $value ) && in_array( $value, $meta_value ) ) {
						$meta[ $key ] = array_search( $value, $meta_value );
					} elseif ( null !== $meta_value && is_array( $value ) ) {
						foreach ( $value as $value_key => $value_val ) {
							if ( in_array( $value_val, $meta_value ) ) {
								$meta[ $key ][] = array_search( $value_val, $meta_value );
							} else {
								$meta[ $key ][] = $value_val;
							}
						}
					} else {
						$meta[ $key ] = $value;
					}
				} else {
					// If the key doesn't start with 'field', keep the original value
					$meta[ $key ] = $value;
				}
			}
			if ( isset( $_FILES['file'] ) && ! empty( $_FILES['file'] ) ) {
				$attachment_data                = self::eh_crm_ticket_file_handler( $files );
				$meta['ticket_attachment']      = $attachment_data['url'];
				$meta['ticket_attachment_path'] = $attachment_data['path'];
			}

			$files = self::handle_custom_file_uploads();
			

			$meta = array_merge( $meta, $files );

			$meta['ticket_source'] = 'API';
			global $wsdesk_activity_logger_source;
			$wsdesk_activity_logger_source = 'Manual trigger via Support form';
			$gen_id                        = eh_crm_insert_ticket( $args, $meta );
			$send                          = eh_crm_get_settingsmeta( '0', 'auto_send_creation_email' );
			if ( 'enable' == $send ) {
				eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Started ------------- ' );
				eh_crm_debug_error_log( 'New ticket auto Email for Ticket #' . $gen_id );
				eh_crm_debug_error_log( 'Email function called for New Ticket #' . $gen_id );
				$response = self::eh_crm_fire_email( 'new_ticket', $gen_id );
				eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Ended ------------- ' );

			}
			/**
			 * Fire a filter hook for wpml current language
			 *
			 * @since 5.3.1
			 *
			 * @param null
			 *
			 */
			$my_current_lang = apply_filters( 'wpml_current_language', null );
			/**
			 * Fire an action for wpml switch language
			 *
			 * @since 5.3.1
			 *
			 * @param $my_current_lang
			 *
			 */
			do_action( 'wpml_switch_language', $my_current_lang );
			die(
				json_encode(
					array(
						'status'  => 'success',
						'message' => esc_html__(
							'Support Request Received Successfully',
							'wsdesk'
						),
					)
				)
			);
	}

	public static function handle_custom_file_uploads() {
		$file_inputs = wsdesk_get_file_input_settings();

		$custom_attachment = eh_crm_get_settingsmeta( '0', 'custom_attachment_folder_enable' );
		$valid_exts        = eh_crm_get_settingsmeta( '0', 'valid_file_extension' );
		$max_file_size     = eh_crm_get_settingsmeta( '0', 'max_file_size' );

		if ( empty( $max_file_size ) ) {
			$max_file_size = 1;
		}

		if ( ! empty( $valid_exts ) ) {
			$valid_exts = explode( ',', $valid_exts );
		}

		$custom_attachment_path = eh_crm_get_settingsmeta( '0', 'custom_attachment_folder_path' );

		if ( ! function_exists( 'wp_handle_upload' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}

		$upload_overrides = array(
			'test_form' => false,
			'test_size' => false,
			'test_type' => false,
		);

		$attachments = array();

		foreach ( $file_inputs as $file_input ) {
			$file_input = (array) $file_input;
			if ( ! isset( $_FILES[ $file_input['slug'] ] ) ) {
				continue;
			}

			$files = map_deep( $_FILES[ $file_input['slug'] ], 'sanitize_text_field' );
			foreach ( array_keys( $files['name'] ) as $key ) {

				$file_name_key = explode( '.', $files['name'][ $key ] );
				$extension     = ( count( $file_name_key ) - 1 );
				$file_ext      = strtolower( $file_name_key[ $extension ] );

				if ( $files['size'][ $key ] > $max_file_size * 1024 * 1024 ) {
					die(
						wp_json_encode(
							array(
								'status'  => 'error',
								'message' => 'Maximum file size exceeded. Max file size allowed(MB): ' . $max_file_size,
							)
						)
					);
				}
				if ( is_array( $valid_exts ) && ! in_array( $file_ext, $valid_exts, true ) ) {
					die(
						wp_json_encode(
							array(
								'status'           => 'error',
								'message'          => 'Invalid file extension. Allowed file extensions are: ' . eh_crm_get_settingsmeta(
									'0',
									'valid_file_extension'
								),
								'valid_extensions' => $valid_exts,
								'file_ext'         => $file_ext,
							)
						)
					);
				}

				$file = array(
					'name'     => microtime( true ) . '.' . $file_ext,
					'type'     => $files['type'][ $key ],
					'tmp_name' => $files['tmp_name'][ $key ],
					'error'    => $files['error'][ $key ],
					'size'     => $files['size'][ $key ],
				);

				if ( 'yes' === $custom_attachment ) {
					$folder = wp_upload_dir()['basedir'] . '/' . $custom_attachment_path;

					if ( ! file_exists( $folder ) && ! is_dir( $folder ) ) {
						mkdir( $folder, 0777, true );
					}

					move_uploaded_file( $files['tmp_name'][ $key ], $folder . '/' . $file['name'] );

					$attachments[ $file_input['slug'] ][] = array(
						'url'  => wp_upload_dir()['baseurl'] . "/$custom_attachment_path/" . $file['name'],
						'file' => $folder . '/' . $file['name'],
					);
				} else {
					$attachments[ $file_input['slug'] ][] = wp_handle_upload( $file, $upload_overrides );
				}
			}
		}

		return $attachments;
	}

	public static function eh_crm_bulk_edit() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$tickets  = explode( ',', isset( $_POST['tickets'] ) ? sanitize_text_field( $_POST['tickets'] ) : null );
			$assignee = ( isset( $_POST['assignee'] ) ) ? explode( ',', sanitize_text_field( $_POST['assignee'] ) ) : null;
			$labels   = isset( $_POST['labels'] ) ? sanitize_text_field( $_POST['labels'] ) : null;
			$tags     = ( isset( $_POST['tags'] ) ) ? explode( ',', sanitize_text_field( $_POST['tags'] ) ) : null;
			$subject  = ( isset( $_POST['subject'] ) ) ? sanitize_text_field( $_POST['subject'] ) : null;

			if ( '' != ( isset( $_POST['reply'] ) ? sanitize_text_field( $_POST['reply'] ) : null ) && '<br>' != ( isset( $_POST['reply'] ) ? sanitize_text_field( $_POST['reply'] ) : null ) ) {
				$reply = isset( $_POST['reply'] ) ? sanitize_text_field( $_POST['reply'] ) : null;

				if ( isset( $_FILES['file'] ) ) {
					$attachment_data = self::eh_crm_ticket_file_handler();
				}
			} else {
				$reply = null;
			}

			$filter = isset( $_POST['params'] ) ? json_decode( stripslashes( sanitize_text_field( $_POST['params'] ) ), true ) : array( 'ticket_id' => $tickets );

			$repo = new \WSDesk\Tickets\TicketRepository();
			set_time_limit( 0 ); // 0=NOLIMIT

			$query = $repo->applyFilter( $filter )->select( 'ticket_id' );
			$repo->chunk(
				$query,
				50,
				function ( $tickets ) use ( $assignee, $labels, $tags, $subject, $reply, $attachment_data ) {
					foreach ( $tickets as $ticket ) {
						$id = $ticket->ticket_id;
						if ( ! empty( $assignee ) ) {
							eh_crm_update_ticketmeta( $id, 'ticket_assignee', $assignee );
						}
						if ( ! empty( $labels ) ) {
							eh_crm_update_ticketmeta( $id, 'ticket_label', $labels );
						}
						if ( ! empty( $tags ) ) {
							eh_crm_update_ticketmeta( $id, 'ticket_tags', $tags );
						}
						if ( ! empty( $subject ) ) {
							eh_crm_update_ticket( $id, array( 'ticket_title' => $subject ) );
						}
						if ( ! empty( $reply ) ) {
							$user   = wp_get_current_user();
							$vendor = '';
							if ( EH_CRM_WOO_VENDOR ) {
								$vendor = EH_CRM_WOO_VENDOR;
							}
							$parent     = eh_crm_get_ticket( array( 'ticket_id' => $id ) );
							$child      = array(
								'ticket_email'    => $user->user_email,
								'ticket_title'    => $parent[0]['ticket_title'],
								'ticket_content'  => html_entity_decode( $reply ),
								'ticket_category' => 'agent_reply',
								'ticket_parent'   => $id,
								'ticket_vendor'   => $vendor,
							);
							$child_meta = array();
							if ( isset( $_FILES['file'] ) ) {
								$child_meta['ticket_attachment']      = $attachment_data['url'];
								$child_meta['ticket_attachment_path'] = $attachment_data['path'];
							}
							$gen_id                = eh_crm_insert_ticket( $child, $child_meta );
							$send_agent_reply_mail = eh_crm_get_settingsmeta( '0', 'send_agent_reply_mail' );
							if ( 'disabled' != $send_agent_reply_mail ) {
								eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Started ------------- ' );
								eh_crm_debug_error_log( 'Agent Replied for Ticket #' . $id );
								eh_crm_debug_error_log( 'Email function called for new reply #' . $gen_id );
								CRM_Ajax::eh_crm_fire_email( 'reply_ticket', $gen_id );
								eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Ended ------------- ' );
							}
						}
					}
				}
			);
		}
	}
	public static function eh_crm_bulk_edit_save() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$tickets     = isset( $_POST['tickets'] ) ? explode( ',', sanitize_text_field( $_POST['tickets'] ) ) : null;
			$assignee    = ( isset( $_POST['assignee'] ) ) ? explode( ',', sanitize_text_field( $_POST['assignee'] ) ) : null;
			$post_values = $_POST;
			$labels      = ( isset( $post_values['labels'] ) ) ? $post_values['labels'] : null;
			$tags        = ( isset( $_POST['tags'] ) ) ? explode( ',', sanitize_text_field( $_POST['tags'] ) ) : null;

			$filter = isset( $_POST['params'] ) ? json_decode( stripslashes( sanitize_text_field( $_POST['params'] ) ), true ) : array( 'ticket_id' => $tickets );

			$repo = new \WSDesk\Tickets\TicketRepository();
			set_time_limit( 0 ); // 0=NOLIMIT
			$query = $repo->applyFilter( $filter )->select( 'ticket_id' );
			$repo->chunk(
				$query,
				50,
				function ( $tickets ) use ( $assignee, $labels, $tags ) {
					foreach ( $tickets as $ticket ) {
						$ticket = (array) $ticket;
						if ( ! empty( $assignee ) ) {
							eh_crm_update_ticketmeta( $ticket['ticket_id'], 'ticket_assignee', $assignee, false );
						}
						if ( ! empty( $labels ) ) {
							eh_crm_update_ticketmeta( $ticket['ticket_id'], 'ticket_label', $labels, false );
						}
						if ( ! empty( $tags ) ) {
							eh_crm_update_ticketmeta( $ticket['ticket_id'], 'ticket_tags', $tags, false );
						}
					}
				}
			);
		}
	}
	public static function eh_crm_ticket_change_label() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id  = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null;
			$label      = isset( $_POST['label'] ) ? sanitize_text_field( $_POST['label'] ) : null;
			$pagination = json_decode( stripslashes( isset( $_POST['pagination'] ) ? sanitize_text_field( $_POST['pagination'] ) : null ), true );
			eh_crm_update_ticketmeta( $ticket_id, 'ticket_label', $label );
			$auto_assign = eh_crm_get_settingsmeta( '0', 'auto_assign' );
			if ( 'enable' == $auto_assign ) {
				$user     = wp_get_current_user();
				$assignee = eh_crm_get_ticketmeta( $ticket_id, 'ticket_assignee' );
				if ( empty( $assignee ) ) {
					eh_crm_update_ticketmeta( $ticket_id, 'ticket_assignee', array( $user->ID ) );
				}
			}
			$content_html = self::eh_crm_ticket_single_view_gen( $ticket_id, $pagination );
			$tab          = self::eh_crm_ticket_single_view_gen_head( $ticket_id );
			die(
				json_encode(
					array(
						'tab_head'    => $tab,
						'tab_content' => $content_html,
					)
				)
			);
		}
	}
	public static function eh_crm_verify_merge_tickets() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			global $wpdb;
			$table_name      = $wpdb->prefix . 'wsdesk_tickets';
			$ticket_ids      = json_decode( stripslashes( isset( $_POST['ticket_ids'] ) ? sanitize_text_field( $_POST['ticket_ids'] ) : null ) );
			$parent_id       = isset( $_POST['parent_id'] ) ? sanitize_text_field( $_POST['parent_id'] ) : null;
			$tickets_display = eh_crm_get_settingsmeta( '0', 'tickets_display' );
			$current_meta    = eh_crm_get_ticketmeta( $parent_id );
			$selected_fields = eh_crm_get_settingsmeta( 0, 'selected_fields' );
			$avail_fields    = eh_crm_get_settings( array( 'type' => 'field' ), array( 'slug', 'title', 'settings_id' ) );
			if ( ! $selected_fields ) {
				$selected_fields = array();
			}
			$where      = '';
			$ticket_ids = array();
			if ( isset( $_POST['ticket_ids'] ) ) {
				$count = count( $_POST['ticket_ids'] );
				for ( $i = 0; $i < $count; $i++ ) {
					$ticket_ids[] = isset( $_POST['ticket_ids'][ $i ] ) ? sanitize_text_field( $_POST['ticket_ids'][ $i ] ) : '';
				}
			}

			$ticket_ids[] = $parent_id;

			// $data       = $wpdb->get_results(
			// $wpdb->prepare( 'SELECT * FROM '. $wpdb->prefix  .'wsdesk_tickets WHERE (ticket_id IN (%s) OR ticket_parent IN (%s)) AND ticket_trash = 0 ORDER BY ticket_id DESC', $ticket_ids, $ticket_ids ), ARRAY_A );

			$data = wpFluent()->table( 'wsdesk_tickets' )->where( 'ticket_trash', 0 )->where(
				function ( $q ) use ( $ticket_ids ) {
					$q->whereIn( 'ticket_id', $ticket_ids );
					$q->orWhereIn( 'ticket_parent', $ticket_ids );
				}
			);

			$data = array_map(
				function ( $ticket ) {
					return $ticket;
				},
				$data->get()
			);

			$assignees     = ( isset( $current_meta['ticket_assignee'] ) ? $current_meta['ticket_assignee'] : array() );
			$assignee_html = array();
			foreach ( $assignees as $assignee ) {
				array_push( $assignee_html, get_userdata( $assignee )->display_name );
			}

			$cc = ( isset( $current_meta['ticket_cc'] ) ? $current_meta['ticket_cc'] : array() );

			$ticket_tags    = ( isset( $current_meta['ticket_tags'] ) ? $current_meta['ticket_tags'] : array() );
			$tag_title_html = array();
			foreach ( $ticket_tags as $value ) {
				$tag_title = eh_crm_get_settings( array( 'slug' => "$value" ), array( 'title' ) );
				array_push( $tag_title_html, $tag_title[0]['title'] );
			}
			$custom_field_html = '';
			for ( $i = 0; $i < count( $selected_fields ); $i++ ) {
				for ( $j = 3; $j < count( $avail_fields ); $j++ ) {
					if ( $avail_fields[ $j ]['slug'] == $selected_fields[ $i ] ) {
						$field_ticket_value    = ( isset( $current_meta[ $avail_fields[ $j ]['slug'] ] ) ? $current_meta[ $avail_fields[ $j ]['slug'] ] : '' );
						$current_settings_meta = eh_crm_get_settingsmeta( $avail_fields[ $j ]['settings_id'] );

						if ( 'file' != $current_settings_meta['field_type'] && 'google_captcha' != $current_settings_meta['field_type'] ) {
							$custom_field_html .= '<div class="row" style="margin-top: 10px">
															<div class="col-md-3">
																<p>' . $avail_fields[ $j ]['title'] . '</p>
															</div>
															<div class="col-md-8" style="margin-left: 5px;">
																<p>: ';
							switch ( $current_settings_meta['field_type'] ) {
								case 'text':
								case 'ip':
								case 'date':
								case 'email':
								case 'number':
								case 'textarea':
								case 'phone':
									$custom_field_html .= $field_ticket_value;
									break;
								case 'radio':
								case 'select':
									$field_values = $current_settings_meta['field_values'];
									if ( '' != $field_ticket_value ) {
										$custom_field_html .= $field_values[ $field_ticket_value ];
									}
									break;
								case 'checkbox':
									$field_values       = $current_settings_meta['field_values'];
									$selected_values    = array();
									$field_ticket_value = ( '' == $field_ticket_value ) ? array() : $field_ticket_value;
									foreach ( $field_ticket_value as $value ) {
										array_push( $selected_values, $field_values[ $value ] );
									}
									$custom_field_html .= implode( ', ', $selected_values );
									break;
								case 'password':
									$custom_field_html .= str_repeat( '*', strlen( $field_ticket_value ) );
									break;
							}
							$custom_field_html .= '</p></div></div>';
						}
					}
				}
			}

			$html  = '<div class="col-md-3" style="border-right: 2px solid #F3EEEC; height: 400px; margin-top: 10px;">
						<div class="row" style="margin-top: 10px">
							<div class="col-md-3">
								<p>' . esc_html__( 'Assignee', 'wsdesk' ) . '</p>
							</div>
							<div class="col-md-8" style="margin-left: 5px;">
							<p>: ' . implode( ', ', $assignee_html ) . '</p>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col-md-3">
								<p>' . esc_html__( 'CC', 'wsdesk' ) . '</p>
							</div>
							<div class="col-md-8" style="margin-left: 5px;">
							<p>: ' . implode( ', ', $cc ) . '</p>
							</div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col-md-3">
								<p>' . esc_html__( 'Tags', 'wsdesk' ) . '</p>
							</div>
							<div class="col-md-8" style="margin-left: 5px;">
							<p>: ' . implode( ', ', $tag_title_html ) . '</p>
							</div>
						</div>
						' . $custom_field_html . '
					</div>';
			$html .= "<div class='col-md-9'>";
			foreach ( $data as $value ) {
				if ( 0 != $value->ticket_author ) {
					$replier_obj  = new WP_User( $value->ticket_author );
					$replier_name = $replier_obj->display_name;
					$replier_pic  = get_avatar_url( $value->ticket_author, array( 'size' => 50 ) );
				} else {
					$replier_name = 'Guest';
					$replier_pic  = get_avatar_url( $value->ticket_email, array( 'size' => 50 ) );
				}
				$temp_parentID = ( 0 != $value->ticket_parent ) ? $value->ticket_parent : $value->ticket_id;
				$input_data    = ( 'text' != $tickets_display ) ? html_entity_decode( stripslashes( $value->ticket_content ) ) : stripslashes( $value->ticket_content );

				$input_data = wp_kses_post( $input_data );

				/* $input_array[0]  = '/<((html)[^>]*)>(.*)\<\/(html)>/Us';
				$input_array[1]  = '/<((head)[^>]*)>(.*)\<\/(head)>/Us';
				$input_array[2]  = '/<((style)[^>]*)>(.*)\<\/(style)>/Us';
				$input_array[3]  = '/<((body)[^>]*)>(.*)\<\/(body)>/Us';
				$input_array[4]  = '/<((form)[^>]*)>(.*)\<\/(form)>/Us';
				$input_array[5]  = '/<((input)[^>]*)>(.*)\<\/(input)>/Us';
				$input_array[5]  = '/<((input)[^>]*)>/Us';
				$input_array[7]  = '/<((button)[^>]*)>(.*)\<\/(button)>/Us';
				$output_array[0] = '&lt;$1&gt;$3&lt;/html&gt;';
				$output_array[1] = '&lt;$1&gt;$3&lt;/head&gt;';
				$output_array[2] = '&lt;$1&gt;$3&lt;/style&gt;';
				$output_array[3] = '&lt;$1&gt;$3&lt;/body&gt;';
				$output_array[4] = '&lt;$1&gt;$3&lt;/form&gt;';
				$output_array[5] = '&lt;$1&gt;$3&lt;/input&gt;';
				$output_array[6] = '&lt;$1&gt;$3&lt;/button&gt;';
				$output_array[7] = '&lt;$1&gt;$3&lt;/input&gt;';
				$input_data      = preg_replace( $input_array, $output_array, $input_data ); */
				$html .= '<div class="row" style="margin: 10px;">
							<div class="icon"><img src="' . $replier_pic . '" style="border-radius: 25px;"></div>
							<h5>' . $replier_name . ' <span>(Ticket ID:' . $temp_parentID . ')</span></h5>
							<h6>' . $value->ticket_email . ' | ' . eh_crm_get_formatted_date( $value->ticket_date ) . ' </h6>
							' . ( ( 'satisfaction_survey' === $value->ticket_category ) ? '<b>' . esc_html__( 'Satisfaction Comment', 'wsdesk' ) . '</b><br>' : '' ) . '
							<p>' . $input_data . '</p>
						</div>';
			}
			$html .= '</div>';
			wp_send_json_success( array( 'page' => $html ) );
			die;
		}
	}
	public static function eh_crm_confirm_merge_tickets() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'wsdesk_tickets';
			$table_meta = $wpdb->prefix . 'wsdesk_ticketsmeta';
			$ticket_ids = array();
			if ( isset( $_POST['ticket_ids'] ) ) {
				if ( is_array( $_POST['ticket_ids'] ) ) {
					$count = count( $_POST['ticket_ids'] );
					for ( $i = 0; $i < $count; $i++ ) {
						$ticket_ids[] = isset( $_POST['ticket_ids'][ $i ] ) ? sanitize_text_field( $_POST['ticket_ids'][ $i ] ) : '';
					}
				} else {
						$ticket_ids[] = isset( $_POST['ticket_ids'] ) ? sanitize_text_field( $_POST['ticket_ids'] ) : '';
				}
			}
			$parent_id  = isset( $_POST['parent_id'] ) ? sanitize_text_field( $_POST['parent_id'] ) : null;
			$pagination = json_decode( stripslashes( isset( $_POST['pagination_id'] ) ? sanitize_text_field( $_POST['pagination_id'] ) : null ), true );

			$query = wpFluent()->table( 'wsdesk_tickets' )->whereIn( 'ticket_id', $ticket_ids )->orWhereIn( 'ticket_parent', $ticket_ids );
			$query->whereNot( 'ticket_id', $parent_id );

			$res = $query->update( array( 'ticket_parent' => $parent_id ) );
			wpFluent()->table( 'wsdesk_ticketsmeta' )->whereIn( 'ticket_id', $ticket_ids )->delete();

			/* $wpdb->get_results( $wpdb->prepare( 'UPDATE '. $wpdb->prefix .'wsdesk_tickets SET ticket_parent = %s WHERE ticket_parent in (%s) OR ticket_id in (%s)', $parent_id, $ticket_ids, $ticket_ids ), ARRAY_A );
			$wpdb->get_results( $wpdb->prepare( 'DELETE FROM '. $wpdb->prefix .'wsdesk_ticketsmeta WHERE ticket_id in (%s)', $ticket_ids ), ARRAY_A ); */

			$content_html = self::eh_crm_ticket_single_view_gen( $parent_id, $pagination );
			$tab          = self::eh_crm_ticket_single_view_gen_head( $parent_id );
			die(
				json_encode(
					array(
						'tab_head'    => $tab,
						'tab_content' => $content_html,
					)
				)
			);
		}
	}
	public static function eh_crm_arrange_ticket_columns() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$columns = json_decode( isset( $_POST['columns'] ) ? stripslashes( sanitize_text_field( $_POST['columns'] ) ) : null, true );
			eh_crm_update_settingsmeta( '0', 'all_ticket_page_columns', $columns );
			$html = include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_page.php';
			wp_send_json_success( array( 'page' => $html ) );
			die;
		}
	}
	public static function eh_crm_activate_deactivate_ticket_columns() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$slug                    = isset( $_POST['slug'] ) ? sanitize_text_field( $_POST['slug'] ) : die();
			$case                    = isset( $_POST['case'] ) ? sanitize_text_field( $_POST['case'] ) : die();
			$all_ticket_page_columns = eh_crm_get_settingsmeta( '0', 'all_ticket_page_columns' );
			switch ( $case ) {
				case 'activate':
					array_push( $all_ticket_page_columns, $slug );
					break;

				case 'deactivate':
					$key = array_search( $slug, $all_ticket_page_columns );
					unset( $all_ticket_page_columns[ $key ] );
					break;
			}
			eh_crm_update_settingsmeta( '0', 'all_ticket_page_columns', array_unique( $all_ticket_page_columns ) );
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_page.php';
			$html = ob_get_clean();
			wp_send_json_success( array( 'page' => $html ) );
			die;
		}
	}

	public static function eh_crm_v2_get_tickets() {
		$repo                    = new \WSDesk\Tickets\TicketRepository();
		$data['data']            = $repo->get( $_REQUEST );
		$data['recordsTotal']    = $repo->count();
		$data['recordsFiltered'] = $repo->count( $_REQUEST );
		header( 'Content-type:application/json;charset=utf-8' );
		die( json_encode( $data ) );
	}

	public static function eh_crm_v2_get_archive_tickets() {
		$repo = new \WSDesk\Tickets\TicketArchiveRepository();

		$data['data']            = $repo->get( $_REQUEST );
		$data['recordsTotal']    = $repo->count();
		$data['recordsFiltered'] = $repo->count( $_REQUEST );

		header( 'Content-type:application/json;charset=utf-8' );
		die( json_encode( $data ) );
	}

	public static function eh_crm_v2_get_tickets_count() {
		$repo                = new \WSDesk\Tickets\TicketRepository();
		$data['all_tickets'] = $repo->count();
		$data['views']       = $repo->get_ticket_counts_by_active_views( $_REQUEST );
		header( 'Content-type:application/json;charset=utf-8' );
		die( json_encode( $data ) );
	}
}
