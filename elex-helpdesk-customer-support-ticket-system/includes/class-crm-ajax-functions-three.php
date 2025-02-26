<?php
require __DIR__ . '/class-crm-ajax-functions-two.php';

class CRM_Ajax_Three extends CRM_Ajax_Two {

	public static function eh_crm_ticket_refresh_right_bar() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
		$search_page        = ( isset( $_POST['cur'] ) ) ? sanitize_text_field( $_POST['cur'] ) : 1;
		$active             = isset( $_POST['active'] ) ? sanitize_text_field( $_POST['active'] ) : 'all';
		$order              = isset( $_POST['order'] ) ? sanitize_text_field( $_POST['order'] ) : 'DESC';
		$order_by           = isset( $_POST['order_by'] ) ? sanitize_text_field( $_POST['order_by'] ) : 'ticket_updated';
		$current_page_no    = ( isset( $_POST['current_page'] ) ) ? sanitize_text_field( $_POST['current_page'] ) : 0;
		$current_page_n     = ( isset( $_POST['current_pa'] ) ) ? sanitize_text_field( $_POST['current_pa'] ) : "$search_page";
		$pagination         = isset( $_POST['pagination_type'] ) ? sanitize_text_field( $_POST['pagination_type'] ) : '';
		$avail_labels_wf    = eh_crm_get_settings( array( 'type' => 'label' ), array( 'slug', 'title', 'settings_id' ) );
		$avail_labels       = eh_crm_get_settings(
			array(
				'type'   => 'label',
				'filter' => 'yes',
			),
			array( 'slug', 'title', 'settings_id' )
		);
		$avail_tags_wf      = eh_crm_get_settings( array( 'type' => 'tag' ), array( 'slug', 'title', 'settings_id' ) );
		$avail_tags         = eh_crm_get_settings(
			array(
				'type'   => 'tag',
				'filter' => 'yes',
			),
			array( 'slug', 'title', 'settings_id' )
		);
		$avail_views        = eh_crm_get_settings( array( 'type' => 'view' ), array( 'slug', 'title', 'settings_id' ) );
		$user_roles_default = array( 'WSDesk_Agents', 'WSDesk_Supervisor', 'administrator' );
		$users              = get_users( array( 'role__in' => $user_roles_default ) );
		$users_data         = array();
		$tickets_display    = eh_crm_get_settingsmeta( '0', 'tickets_display' );
		$users_count        = count( $users );
			for ( $i = 0; $i < $users_count; $i++ ) {
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
							$total          = count( eh_crm_get_ticket_value_count( 'ticket_parent', 0 ) );
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
						$current_page = $current_page_no - 1;
						$offset       = ( $current_page * $ticket_rows );
						break;
					case 'next':
						$current_page = $current_page_no + 1;
						$offset       = ( $current_page * $ticket_rows );
						break;
				}
			}

			switch ( $active ) {

				case 'all':
					$table_title        = esc_html__( ' All Tickets ', 'wsdesk' );
					$total_count        = count( eh_crm_get_ticket_value_count( 'ticket_parent', 0 ) );
					$section_tickets_id = eh_crm_get_ticket_value_count( 'ticket_parent', 0, false, '', '', $order_by, $order, $ticket_rows, $offset );
					$all_section_ids    = eh_crm_get_ticket_value_count( 'ticket_parent', 0, false, '', '', $order_by, $order, '', 0 );
					$data_to_be_display = $all_section_ids;

					// Agent ticket view section control :-)
					$user_id_agent         = get_current_user_id();
					$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
					$user_id_agent_role    = $user_id_agent_details->roles;
					$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );
					if ( 'enable' != $allow_agent_tickets ) {
						if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
							$active              = $user_id_agent;
							$total_count_        = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, 'ticket_id' ) );
							$section_tickets_id_ = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, $ticket_rows, $offset );
							$all_section_ids_    = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, 0, 0 );
							$all_section_ids     = array();
							$section_tickets_id  = array();
							foreach ( $all_section_ids_ as $key => $value ) {
								if ( in_array( $value, $data_to_be_display ) ) {
									$all_section_ids[]    = $value;
									$section_tickets_id[] = $value;
								}
							}
							$total_count = count( $section_tickets_id );
						}
					}

					break;
				case 'registeredU':
					$table_title        = esc_html__( 'Registered Users Tickets', 'wsdesk' );
					$total_count        = count( eh_crm_get_ticket_value_count( 'ticket_author', 0, true, 'ticket_parent', 0 ) );
					$section_tickets_id = eh_crm_get_ticket_value_count( 'ticket_author', 0, true, 'ticket_parent', 0, $order_by, $order, $ticket_rows, $offset );
					$all_section_ids    = eh_crm_get_ticket_value_count( 'ticket_author', 0, true, 'ticket_parent', 0, $order_by, $order, '', 0 );
					$data_to_be_display = $all_section_ids;

					// Agent ticket view section control :-)
					$user_id_agent         = get_current_user_id();
					$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
					$user_id_agent_role    = $user_id_agent_details->roles;
					$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );
					if ( 'enable' != $allow_agent_tickets ) {
						if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
							$active              = $user_id_agent;
							$total_count_        = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, 'ticket_id' ) );
							$section_tickets_id_ = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, $ticket_rows, $offset );
							$all_section_ids_    = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, 0, 0 );
							$all_section_ids     = array();
							$section_tickets_id  = array();
							foreach ( $all_section_ids_ as $key => $value ) {
								if ( in_array( $value, $data_to_be_display ) ) {
									$all_section_ids[]    = $value;
									$section_tickets_id[] = $value;
								}
							}
							$total_count = count( $section_tickets_id );
						}
					}
					break;
				case 'guestU':
					$table_title        = esc_html__( 'Guest Users Tickets', 'wsdesk' );
					$total_count        = count( eh_crm_get_ticket_value_count( 'ticket_author', 0, false, 'ticket_parent', 0 ) );
					$section_tickets_id = eh_crm_get_ticket_value_count( 'ticket_author', 0, false, 'ticket_parent', 0, $order_by, $order, $ticket_rows, $offset );
					$all_section_ids    = eh_crm_get_ticket_value_count( 'ticket_author', 0, false, 'ticket_parent', 0, $order_by, $order, '', 0 );
					$data_to_be_display = $all_section_ids;

					// Agent ticket view section control :-)
					$user_id_agent         = get_current_user_id();
					$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
					$user_id_agent_role    = $user_id_agent_details->roles;
					$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );
					if ( 'enable' != $allow_agent_tickets ) {
						if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
							$active              = $user_id_agent;
							$total_count_        = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, 'ticket_id' ) );
							$section_tickets_id_ = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, $ticket_rows, $offset );
							$all_section_ids_    = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, 0, 0 );
							$all_section_ids     = array();
							$section_tickets_id  = array();
							foreach ( $all_section_ids_ as $key => $value ) {
								if ( in_array( $value, $data_to_be_display ) ) {
									$all_section_ids[]    = $value;
									$section_tickets_id[] = $value;
								}
							}
							$total_count = count( $section_tickets_id );
						}
					}

					break;
				case 'unassigned':
					$table_title        = esc_html__( 'Unassigned Tickets', 'wsdesk' );
					$total_count        = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', array(), 'ticket_id' ) );
					$section_tickets_id = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', array(), $order_by, $order, $ticket_rows, $offset );
					$all_section_ids    = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', array(), $order_by, $order, 0, 0 );

					break;
				default:
					if ( false !== strpos( $active, 'label_' ) ) {
						for ( $i = 0;$i < count( $avail_labels );$i++ ) {
							if ( $avail_labels[ $i ]['slug'] == $active ) {

								$table_title = $avail_labels[ $i ]['title'];
							}
						}
						if ( empty( $table_title ) ) {

							$table_title = '(Incorrect Deep Link)';
						}
						$table_title = $table_title . ' Tickets';

						$total_count        = count( eh_crm_get_ticketmeta_value_count( 'ticket_label', $active, 'ticket_id' ) );
						$section_tickets_id = eh_crm_get_ticketmeta_value_count( 'ticket_label', $active, $order_by, $order, $ticket_rows, $offset );
						$all_section_ids    = eh_crm_get_ticketmeta_value_count( 'ticket_label', $active, $order_by, $order, 0, 0 );
						$data_to_be_display = $all_section_ids;

						// Agent ticket view section control :-)
						$user_id_agent         = get_current_user_id();
						$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
						$user_id_agent_role    = $user_id_agent_details->roles;
						$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );
						if ( 'enable' != $allow_agent_tickets ) {
							if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
								$active              = $user_id_agent;
								$total_count_        = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, 'ticket_id' ) );
								$section_tickets_id_ = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, $ticket_rows, $offset );
								$all_section_ids_    = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, 0, 0 );
								$all_section_ids     = array();
								$section_tickets_id  = array();
								foreach ( $all_section_ids_ as $key => $value ) {
									if ( in_array( $value, $data_to_be_display ) ) {
										$all_section_ids[]    = $value;
										$section_tickets_id[] = $value;
									}
								}
								$total_count = count( $section_tickets_id );
							}
						}
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
						$total_count        = count( eh_crm_get_ticketmeta_value_count( 'ticket_tags', $active, 'ticket_id' ) );
						$section_tickets_id = eh_crm_get_ticketmeta_value_count( 'ticket_tags', $active, $order_by, $order, $ticket_rows, $offset );
						$all_section_ids    = eh_crm_get_ticketmeta_value_count( 'ticket_tags', $active, $order_by, $order, 0, 0 );
						$data_to_be_display = $all_section_ids;

						// Agent ticket view section control :-)
						$user_id_agent         = get_current_user_id();
						$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
						$user_id_agent_role    = $user_id_agent_details->roles;
						$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );
						if ( 'enable' != $allow_agent_tickets ) {
							if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
								$active              = $user_id_agent;
								$total_count_        = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, 'ticket_id' ) );
								$section_tickets_id_ = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, $ticket_rows, $offset );
								$all_section_ids_    = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, 0, 0 );
								$all_section_ids     = array();
								$section_tickets_id  = array();
								foreach ( $all_section_ids_ as $key => $value ) {
									if ( in_array( $value, $data_to_be_display ) ) {
										$all_section_ids[]    = $value;
										$section_tickets_id[] = $value;
									}
								}
								$total_count = count( $section_tickets_id );
							}
						}
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
						$data_to_be_display = $all_section_ids;

						// Agent ticket view section control :-)
						$user_id_agent         = get_current_user_id();
						$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
						$user_id_agent_role    = $user_id_agent_details->roles;
						$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );
						if ( 'enable' != $allow_agent_tickets ) {
							if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
								$active              = $user_id_agent;
								$total_count_        = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, 'ticket_id' ) );
								$section_tickets_id_ = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, $ticket_rows, $offset );
								$all_section_ids_    = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, 0, 0 );
								$all_section_ids     = array();
								$section_tickets_id  = array();
								foreach ( $all_section_ids_ as $key => $value ) {
									if ( in_array( $value, $data_to_be_display ) ) {
										$all_section_ids[]    = $value;
										$section_tickets_id[] = $value;
									}
								}
								$total_count = count( $section_tickets_id );
							}
						}
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
						$total_count        = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, 'ticket_id' ) );
						$section_tickets_id = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, $ticket_rows, $offset );
						$all_section_ids    = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $active, $order_by, $order, 0, 0 );

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
			$default_columns        = array( 'id', 'requestor', 'subject', 'updated', 'requested', 'assignee', 'feedback' );
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
			<input type="hidden" id="pagination_ids_traverse" value="<?php echo esc_html( isset( $pagination_ids ) ? json_encode( $pagination_ids ) : null ); ?>">
			<div class="panel panel-default tickets_panel">
				<div class="panel-heading">
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
						echo esc_html( ( ( $current_page > 0 ) && ( $current_page * $ticket_rows ) <= $total_count ) ? ( ( ( $current_page ) * $ticket_rows ) + 1 ) : '1' );
						?>
						</b>–<b><?php echo esc_html( ( ( $current_page > 0 ) && ( $current_page * $ticket_rows ) <= $total_count ) ? ( $current_page * $ticket_rows ) + count( $section_tickets_id ) : ( "$ticket_rows" ) ); ?></b> of <b><?php echo esc_html( $total_count ); ?></b></span>
					<?php
					if ( $page_number >= 0 && $page_number < ( $total_count / $ticket_rows ) ) {
						$page_number  = $current_page + 1;
						$current_page = $current_page;
					} elseif ( $page_number >= ( $total_count / $ticket_rows ) ) {
						$page_number  = $current_page;
						$current_page = $page_number;
					}
					?>
						<input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"  min="0" name="cur" id="current_page_n" class="btn btn-default pagination_tic" placeholder="<?php esc_html_e( $page_number, 'wsdesk' ); ?>"min=1 title="<?php esc_html_e( 'Page Number', 'wsdesk' ); ?> "
						oninput="validity.valid||(value='');" style="width:65px;height:30px" />
						<div class="btn-group btn-group-sm" style="margin:1px 0px 0px 0px;">
						<?php
								// To Hide the preview and next buttons for first and lastpages of tickets
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
								echo '<th>' . esc_html__( $value, 'wsdesk' ) . '</th>';
							}
							?>
						</tr>
					</thead>
					<tbody>
				<?php
				if ( strpos( $active, 'view_' ) !== false ) {
					$lite_mode_display_quick_view = 'enable';
					$wsdesk_mode                  = eh_crm_get_settingsmeta( '0', 'wsdesk_mode' );
					if ( 'lite' == $wsdesk_mode ) {
						$lite_mode_display_quick_view = eh_crm_get_settingsmeta( '0', 'quick_view_tickets' );
					}
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
								echo '
                                        <tr class="except_view" style="background-color: #f5f5f5;font-weight: 600;">
                                            <td colspan="12">
                                                ' . esc_html( $key ) . '
                                            </td>
                                        </tr>
                                        ';
							}

							$section_tickets_id = $value;
							if ( empty( $section_tickets_id ) ) {
								echo '<tr class="except_view">
                                        <td colspan="12">' . esc_html__( 'No Tickets', 'wsdesk' ) . ' </td></tr>';
							} else {
								for ( $i = 0; $i < count( $section_tickets_id ); $i++ ) {
									$current      = eh_crm_get_ticket( array( 'ticket_id' => $section_tickets_id[ $i ]['ticket_id'] ) );
									$current_meta = eh_crm_get_ticketmeta( $section_tickets_id[ $i ]['ticket_id'] );
									$action_value = '';
									$eye_color    = '';
									for ( $j = 0;$j < count( $avail_labels_wf );$j++ ) {
										if ( in_array( 'manage_tickets', $access ) ) {
											$action_value .= '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="single_ticket_action" id="' . $avail_labels_wf[ $j ]['slug'] . '">' . esc_html__( 'Mark as', 'wsdesk' ) . ' ' . $avail_labels_wf[ $j ]['title'] . '</a></li>';

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
									$latest_reply_id      = eh_crm_get_ticket_value_count( 'ticket_category', 'agent_note', true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id', $order, '1' );
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
										$latest_reply_meta = eh_crm_get_ticketmeta( $latest_reply_id[0]['ticket_id'] );
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
													$ticket_tags .= '<span class="label label-info">#' . $avail_tags_wf[ $j ]['title'] . '</span>';
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
									$raiser_voice              = eh_crm_get_ticket_value_count( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'raiser_reply' );
									$agent_voice               = eh_crm_get_ticket_value_count( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'agent_reply' );
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
									$input_data                = eh_crm_make_url_as_link( $input_data );
									$latest_content['content'] = preg_replace( $input_array, $output_array, $input_data );
									$latest_content['content'] = str_replace( '<script>', '&lt;script&gt;', $latest_content['content'] );
									echo '
                                        <tr class="clickable ticket_row" id="' . esc_attr( $current[0]['ticket_id'] ) . '">
                                            <td class="except_view"><input type="checkbox" class="ticket_select" id="ticket_select" value="' . esc_html( $current[0]['ticket_id'] ) . '"></td>
                                            <td class="except_view"><button class="btn btn-default btn-xs accordion-toggle quick_view_ticket" style="background-color: ' . esc_attr( $eye_color ) . ' !important" data-toggle="collapse" data-target="#expand_' . esc_attr( $current[0]['ticket_id'] ) . '" ><span class="glyphicon glyphicon-eye-open"></span></button></td>';
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
												case 'updated':
													echo '<td>' . esc_html( eh_crm_get_formatted_date( $current[0]['ticket_updated'] ) ) . '</td>';
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

									if ( 'enable' != $lite_mode_display_quick_view ) {
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
                                                                            <button type="button" class="btn btn-default dropdown-toggle single_ticket_action_button_' . esc_attr( $current[0]['ticket_id'] ) . '" data-toggle="dropdown">
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
                                                                        <a href="#reply_' . esc_attr( $current[0]['ticket_id'] ) . '" data-toggle="modal"  title="' . esc_html__( 'Compose Reply', 'wsdesk' ) . '">
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
											echo '<input type="text" value="' . esc_html( htmlentities( $current[0]['ticket_title'] ) ) . '" id="direct_ticket_title_' . esc_attr( $current[0]['ticket_id'] ) . '" class="ticket_title_editable">';
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
																							<textarea rows="10" cols="30" class="form-control direct_reply_textarea" id="direct_reply_textarea_<?php echo esc_attr( $current[0]['ticket_id'] ); ?>" name="reply_textarea_<?php echo esc_attr( $current[0]['ticket_id'] ); ?>"></textarea>
																							<div class="form-group">
																								<div class="input-group col-md-12">
																									<span class="btn btn-primary fileinput-button">
																										<i class="glyphicon glyphicon-plus"></i>
																										<span><?php esc_html_e( 'Attachment', 'wsdesk' ); ?></span>
																										<input type="file" name="direct_files" id="direct_files_<?php echo esc_attr( $current[0]['ticket_id'] ); ?>" class="direct_attachment_reply" multiple="">
																									</span>
																									<div class="btn-group pull-right">
																										<button type="button" class="btn btn-primary dropdown-toggle direct_ticket_reply_action_button_<?php echo esc_attr( $current[0]['ticket_id'] ); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														  <?php esc_html_e( 'Submit as', 'wsdesk' ); ?> <span class="caret"></span>
																										</button>
																										<ul class="dropdown-menu">
															<?php
															for ( $j = 0;$j < count( $avail_labels_wf );$j++ ) {
																										echo '<li id="' . esc_attr( $current[0]['ticket_id'] ) . '"><a href="#" class="direct_ticket_reply_action" id="' . esc_html( $avail_labels_wf[ $j ]['slug'] ) . '">' . esc_html_e( 'Submit as', 'wsdesk' ) . ' ' . esc_html( $avail_labels_wf[ $j ]['title'] ) . '</a></li>';
															}
															?>
																											<li role="separator" class="divider"></li>
																											<li id="<?php echo esc_attr( $current[0]['ticket_id'] ); ?>"><a href="#" class="direct_ticket_reply_action" id="note"><?php esc_html_e( 'Submit as Note', 'wsdesk' ); ?></a></li>
																											<li class="text-center"><small class="text-muted"><?php esc_html_e( 'Notes visible to Agents and Supervisors', 'wsdesk' ); ?></small></li>
																										</ul>
																									  </div>
																								</div>
																								<div class="direct_upload_preview_files_<?php echo esc_attr( $current[0]['ticket_id'] ); ?>"></div>
																							</div>
																						</div><!-- Status Upload  -->
																					</div><!-- Widget Area -->
																				</div>
																			</div>
																			<?php
										} else {
												echo '<p>' . esc_html__( "You don't Have permisson to Reply this ticket", 'wsdesk' ) . '</p>';
										}
																echo '
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
					}
				} else {
					$lite_mode_display_quick_view = 'enable';
					$wsdesk_mode                  = eh_crm_get_settingsmeta( '0', 'wsdesk_mode' );
					if ( 'lite' == $wsdesk_mode ) {
						$lite_mode_display_quick_view = eh_crm_get_settingsmeta( '0', 'quick_view_tickets' );
					}
					if ( empty( $section_tickets_id ) ) {
						echo '<tr class="except_view">
                                <td colspan="12">' . esc_html__( 'No Tickets', 'wsdesk' ) . ' </td></tr>';
					} else {
						for ( $i = 0;$i < count( $section_tickets_id );$i++ ) {
							$current        = eh_crm_get_ticket( array( 'ticket_id' => $section_tickets_id[ $i ]['ticket_id'] ) );
							$current_meta   = eh_crm_get_ticketmeta( $section_tickets_id[ $i ]['ticket_id'] );
							$action_value   = '';
							$assignee_value = '';
							$eye_color      = '';
							for ( $j = 0;$j < count( $avail_labels_wf );$j++ ) {
								if ( in_array( 'manage_tickets', $access ) ) {
									$action_value .= '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="single_ticket_action" id="' . $avail_labels_wf[ $j ]['slug'] . '">' . esc_html__( 'Mark as', 'wsdesk' ) . ' ' . $avail_labels_wf[ $j ]['title'] . '</a></li>';

								}
								if ( isset( $current_meta['ticket_label'] ) && $avail_labels_wf[ $j ]['slug'] == $current_meta['ticket_label'] ) {
									$ticket_label_slug = $avail_labels_wf[ $j ]['slug'];
									$ticket_label      = $avail_labels_wf[ $j ]['title'];
									$eye_color         = eh_crm_get_settingsmeta( $avail_labels_wf[ $j ]['settings_id'], 'label_color' );
								}
							}
							for ( $j = 0;$j < count( $users );$j++ ) {
								if ( in_array( 'manage_tickets', $access ) ) {
									$assignee_value .= '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="single_ticket_assignee" id="' . $users[ $j ]->ID . '">' . $users[ $j ]->display_name . '</a></li>';
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
							$latest_reply_id      = eh_crm_get_ticket_value_count( 'ticket_category', 'agent_note', true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id', $order, '1' );
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
								$latest_reply_meta = eh_crm_get_ticketmeta( $latest_reply_id[0]['ticket_id'] );
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
											$ticket_tags .= '<span class="label label-info">#' . $avail_tags_wf[ $j ]['title'] . '</span>';
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
							$raiser_voice              = eh_crm_get_ticket_value_count( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'raiser_reply' );
							$agent_voice               = eh_crm_get_ticket_value_count( 'ticket_parent', $section_tickets_id[ $i ]['ticket_id'], false, 'ticket_category', 'agent_reply' );
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
                                <tr class="clickable ticket_row" id="' . esc_attr( $current[0]['ticket_id'] ) . '">
                                    <td class="except_view"><input type="checkbox" class="ticket_select" id="ticket_select" value="' . esc_html( $current[0]['ticket_id'] ) . '"></td>
                                    <td class="except_view"><button class="btn btn-default btn-xs accordion-toggle quick_view_ticket" style="background-color: ' . esc_html( $eye_color ) . ' !important" data-toggle="collapse" data-target="#expand_' . esc_attr( $current[0]['ticket_id'] ) . '" ><span class="glyphicon glyphicon-eye-open"></span></button></td>';
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
											echo '<td class="wrap_content" data-toggle="wsdesk_tooltip" title="' . esc_attr( $current[0]['ticket_title'] ) . '" data-container="body">' . esc_html( $current[0]['ticket_title'] ) . '</td>';
											break;
										case 'requested':
											echo '<td>' . esc_html( eh_crm_get_formatted_date( $current[0]['ticket_date'] ) ) . '</td>';
											break;
										case 'updated':
											echo '<td>' . esc_html( eh_crm_get_formatted_date( $current[0]['ticket_updated'] ) ) . '</td>';
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
							if ( 'enable' == $lite_mode_display_quick_view ) {
								echo '</tr>
                                    <tr class="except_view">
                                        <td colspan="12" class="hiddenRow">
                                            <div class="accordian-body collapse" id="expand_' . esc_attr( $current[0]['ticket_id'] ) . '">
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
                                                                    <button type="button" class="btn btn-default dropdown-toggle single_ticket_action_button_' . esc_attr( $current[0]['ticket_id'] ) . '" data-toggle="dropdown">
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
                                                                    <button type="button" class="btn btn-default dropdown-toggle single_ticket_assignee_button_' . esc_attr( $current[0]['ticket_id'] ) . '" data-toggle="dropdown">
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
																								<input type="file" name="direct_files" id="direct_files_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" class="direct_attachment_reply" multiple="">
																							</span>
																							<div class="btn-group pull-right">
																								<button type="button" class="btn btn-primary dropdown-toggle direct_ticket_reply_action_button_<?php echo esc_html( $current[0]['ticket_id'] ); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<?php esc_html_e( 'Submit as', 'wsdesk' ); ?> <span class="caret"></span>
																								</button>
																								<ul class="dropdown-menu">
													<?php
													for ( $j = 0;$j < count( $avail_labels_wf );$j++ ) {
																								echo '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="direct_ticket_reply_action" id="' . esc_attr( $avail_labels_wf[ $j ]['slug'] ) . '">' . esc_html__( 'Submit as', 'wsdesk' ) . ' ' . esc_html( $avail_labels_wf[ $j ]['title'] ) . '</a></li>';
													}
													?>
																									<li role="separator" class="divider"></li>
																									<li id="<?php echo esc_attr( $current[0]['ticket_id'] ); ?>"><a href="#" class="direct_ticket_reply_action" id="note"><?php esc_html_e( 'Submit as Note', 'wsdesk' ); ?></a></li>
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
														echo '
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
				?>
					</tbody>
				</table>
			</div>
			<?php
			$content = ob_get_clean();
			wp_send_json_success( array( 'page' => $content ) );
			die;
		}
	}

	public static function eh_crm_ticket_reply_agent() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$title      = ( isset( $_POST['ticket_title'] ) ? stripslashes( sanitize_text_field( $_POST['ticket_title'] ) ) : '' );
			$pagination = json_decode( stripslashes( isset( $_POST['pagination_id'] ) ? sanitize_text_field( $_POST['pagination_id'] ) : null ), true );
			$ticket_id  = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null;
			$wsd_email  = isset( $_POST['wsd_ticket_email'] ) ? stripslashes( sanitize_text_field( $_POST['wsd_ticket_email'] ) ) : '';
			if ( ! empty( $wsd_email ) ) {
				if ( ! is_email( $wsd_email ) ) {
					die(
						wp_json_encode(
							array(
								'msg'    => __( 'Failed to reply to the ticket. <br /> Reason: Invalid email id', 'wsdesk' ),
								'result' => false,
							)
						)
					);
				}
				$email = $wsd_email;
			} else {
				$email = eh_crm_get_ticket( array( 'ticket_id' => $ticket_id ), 'ticket_email' );
				$email = $email[0]['ticket_email'];
			}

			$submit  = isset( $_POST['submit'] ) ? sanitize_text_field( $_POST['submit'] ) : null;
			$content = isset( $_POST['ticket_reply'] ) ? wp_kses_post( $_POST['ticket_reply'] ) : '';
			if ( '' != $title ) {
				eh_crm_update_ticket(
					$ticket_id,
					array(
						'ticket_title' => $title,
						'ticket_email' => $email,
					)
				);
			}
			$parent = eh_crm_get_ticket( array( 'ticket_id' => $ticket_id ) );
			$user   = wp_get_current_user();

			// Pay for support credit deduction part
			if ( EH_CRM_PAY_FOR_SUPPORT_STATUS ) {
				elex_wsd_pay_for_support_deduction_action( $ticket_id, $email, $submit );
			}

			$user_roles_default = array( 'WSDesk_Agents', 'WSDesk_Supervisor', 'administrator' );
			$category           = '';
			if ( count( array_intersect( $user_roles_default, $user->roles ) ) != 0 ) {
				if ( 'note' == $submit ) {
					$category = 'agent_note';
				} else {
					$category = 'agent_reply';
				}
			} else {
				$category = 'raiser_reply';
			}
			$vendor = '';
			if ( EH_CRM_WOO_VENDOR ) {
				$vendor = EH_CRM_WOO_VENDOR;
			}
			$child      = array(
				'ticket_email'    => $user->user_email,
				'ticket_title'    => $parent[0]['ticket_title'],
				'ticket_content'  => $content,
				'ticket_category' => $category,
				'ticket_parent'   => $ticket_id,
				'ticket_vendor'   => $vendor,
			);
			$child_meta = array();
			if ( isset( $_FILES['file'] ) && ! empty( $_FILES['file'] ) ) {
				$attachment_data                      = self::eh_crm_ticket_file_handler();
				$child_meta['ticket_attachment']      = $attachment_data['url'];
				$child_meta['ticket_attachment_path'] = $attachment_data['path'];
			}
			$gen_id = eh_crm_insert_ticket( $child, $child_meta );
			if ( count( array_intersect( $user_roles_default, $user->roles ) ) != 0 ) {
				if ( 'note' != $submit ) {
					$ticket_label = eh_crm_get_ticketmeta( $ticket_id, 'ticket_label' );
					if ( $ticket_label == $submit ) { // if label is same
						eh_crm_update_ticketmeta( $ticket_id, 'ticket_label', $submit, false );
					} else {
						eh_crm_update_ticketmeta( $ticket_id, 'ticket_label', $submit ); // false removed to let "change to" cause a trigger
					}
				}
				$auto_assign = eh_crm_get_settingsmeta( '0', 'auto_assign' );
				if ( 'enable' == $auto_assign ) {
					$assignee = array_filter( eh_crm_get_ticketmeta( $ticket_id, 'ticket_assignee' ) );
					if ( empty( $assignee ) ) {
						eh_crm_update_ticketmeta( $ticket_id, 'ticket_assignee', array( $user->ID ) );
					}
				}
			}
			$response              = array();
			$send_agent_reply_mail = eh_crm_get_settingsmeta( '0', 'send_agent_reply_mail' );
			if ( 'disabled' != $send_agent_reply_mail ) {
				if ( 'agent_reply' == $category ) {
					eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Started ------------- ' );
					eh_crm_debug_error_log( 'Agent Replied for Ticket #' . $ticket_id );
					eh_crm_debug_error_log( 'Email function called for new reply #' . $gen_id );
					$repo     = new CRM_Ajax();
					$response = $repo->eh_crm_fire_email( 'reply_ticket', $gen_id );
					eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Ended ------------- ' );
				}
			}
			$content_html = self::eh_crm_ticket_single_view_gen( $ticket_id, $pagination );
			$tab          = self::eh_crm_ticket_single_view_gen_head( $ticket_id );
			die(
				wp_json_encode(
					array(
						'tab_head'    => $tab,
						'tab_content' => $content_html,
						'response'    => $response,
					)
				)
			);
		}
	}

	public static function eh_crm_ticket_file_handler( $files = array() ) {
		$attachment_url  = array();
		$attachment_path = array();
		$attachment      = array();

		$custom_attachment = eh_crm_get_settingsmeta( '0', 'custom_attachment_folder_enable' );
		$valid_exts        = eh_crm_get_settingsmeta( '0', 'valid_file_extension' );
		$max_file_size     = eh_crm_get_settingsmeta( '0', 'max_file_size' );

		$no_of_files = isset( $_FILES['file']['name'] ) ? count( $_FILES['file']['name'] ) : 0;

		$files = array(
			'name'     => array(),
			'type'     => array(),
			'tmp_name' => array(),
			'error'    => array(),
			'size'     => array(),
		);

		for ( $key = 0; count( $files['name'] ) <= $no_of_files; $key++ ) {
			// To prevent infinite loop
			if ( $key > 1000 ) {
				break;
			}

			if ( ! isset( $_FILES['file']['name'][ $key ] ) ) {
				continue;
			}

			$files['name'][]     = isset( $_FILES['file']['name'][ $key ] ) ? sanitize_text_field( $_FILES['file']['name'][ $key ] ) : '';
			$files['type'][]     = isset( $_FILES['file']['type'][ $key ] ) ? sanitize_text_field( $_FILES['file']['type'][ $key ] ) : '';
			$files['tmp_name'][] = isset( $_FILES['file']['tmp_name'][ $key ] ) ? sanitize_text_field( $_FILES['file']['tmp_name'][ $key ] ) : '';
			$files['error'][]    = isset( $_FILES['file']['error'][ $key ] ) ? sanitize_text_field( $_FILES['file']['error'][ $key ] ) : '';
			$files['size'][]     = isset( $_FILES['file']['size'][ $key ] ) ? sanitize_text_field( $_FILES['file']['size'][ $key ] ) : '';
		}

		if ( empty( $max_file_size ) ) {
			$max_file_size = 1;
		}

		if ( ! empty( $valid_exts ) ) {
			$valid_exts = explode( ',', $valid_exts );
		}

		if ( 'yes' !== $custom_attachment ) {
			if ( ! function_exists( 'wp_handle_upload' ) ) {
				require_once admin_url( 'includes/file.php' );
			}

			$upload_overrides = array(
				'test_form' => false,
				'test_size' => false,
				'test_type' => false,
			);

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

				$file              = array(
					'name'     => time() . '.' . $file_ext,
					'type'     => $files['type'][ $key ],
					'tmp_name' => $files['tmp_name'][ $key ],
					'error'    => $files['error'][ $key ],
					'size'     => $files['size'][ $key ],
				);
				$attach_id         = wp_handle_upload( $file, $upload_overrides );
				$attachment_url[]  = $attach_id['url'];
				$attachment_path[] = $attach_id['file'];
			}
		} else {

			if ( ! function_exists( 'wp_handle_upload' ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}

			$upload_overrides = array(
				'test_form' => false,
				'test_size' => false,
				'test_type' => false,
			);
			
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

				add_filter( 'upload_dir', array( 'CRM_Ajax', 'wsdesk_upload_dir' ) );

				$file      = array(
					'name'     => microtime( true ) . '.' . $file_ext,
					'type'     => $files['type'][ $key ],
					'tmp_name' => $files['tmp_name'][ $key ],
					'error'    => $files['error'][ $key ],
					'size'     => $files['size'][ $key ],
				);
				$attach_id = wp_handle_upload( $file, $upload_overrides );
				remove_filter( 'upload_dir', array( 'CRM_Ajax', 'wsdesk_upload_dir' ) );

				$attachment_url[]  = $attach_id['url'];
				$attachment_path[] = $attach_id['file'];

			}
		}

		$attachment['url']  = $attachment_url;
		$attachment['path'] = $attachment_path;

		return $attachment;
	}

	public static function wsdesk_upload_dir( $dirs ) {
		$custom_attachment_path = eh_crm_get_settingsmeta( '0', 'custom_attachment_folder_path' );
		$dirs['subdir']         = '/' . $custom_attachment_path;
		$dirs['path']           = $dirs['basedir'] . '/' . $custom_attachment_path;
		$dirs['url']            = $dirs['baseurl'] . '/' . $custom_attachment_path;
		return $dirs;
	}

	public static function eh_crm_ticket_single_ticket_action() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id  = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null;
			$label      = isset( $_POST['label'] ) ? sanitize_text_field( $_POST['label'] ) : null;
			$pagination = json_decode( stripslashes( isset( $_POST['pagination_id'] ) ? sanitize_text_field( $_POST['pagination_id'] ) : null ), true );
			eh_crm_update_ticketmeta( $ticket_id, 'ticket_label', $label, false );
			$content_html = self::eh_crm_ticket_single_view_gen( $ticket_id, $pagination );
			wp_send_json_success( array( 'page' => $content_html ) );
			die;
		}
	}

	public static function eh_crm_ticket_single_ticket_assignee() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id  = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null;
			$assignee   = isset( $_POST['assignee'] ) ? sanitize_text_field( $_POST['assignee'] ) : null;
			$pagination = json_decode( stripslashes( isset( $_POST['pagination_id'] ) ? sanitize_text_field( $_POST['pagination_id'] ) : null ), true );
			eh_crm_update_ticketmeta( $ticket_id, 'ticket_assignee', array( $assignee ), false );
			$content_html = self::eh_crm_ticket_single_view_gen( $ticket_id, $pagination );
			wp_send_json_success( array( 'page' => $content_html ) );
			die;
		}
	}

	public static function eh_crm_archive_single_ticket() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			global $wpdb;
			$filter = array(
				'ticket_id' => array( isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null ),
			);

			$repo = new \WSDesk\Tickets\TicketRepository();
			$data = $repo->archiveTickets( $filter );

			die( json_encode( $data ) );

			// Old code

			$reply_id = eh_crm_get_ticket_value_count_archive( 'ticket_parent', $id, false, '', '', 'ticket_updated', 'DESC' );
			array_push( $reply_id, array( 'ticket_id' => $id ) );
			$table_wsdesk_archived_tickets             = $wpdb->prefix . 'wsdesk_archived_tickets';
			$table_wsdesk_archived_tickets_ticketsmeta = $wpdb->prefix . 'wsdesk_archived_ticketsmeta';
			$table_wsdesk_ticketsmeta                  = $wpdb->prefix . 'wsdesk_ticketsmeta';
			$table_wsdesk_tickets                      = $wpdb->prefix . 'wsdesk_tickets';
			foreach ( $reply_id as $id ) {
				$id_to_delete[] = $id['ticket_id'];
				$id             = $id['ticket_id'];
				$ticketsmeta    = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'wsdesk_ticketsmeta WHERE ticket_id = %d', $id ), ARRAY_A );
				$parent_tickets = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_id = %d', $id ), ARRAY_A );
				foreach ( $ticketsmeta as $meta ) {
					$result_ticketsmeta = $wpdb->insert(
						$table_wsdesk_archived_tickets_ticketsmeta,
						array(
							'ticket_id'  => (int) $id,
							'meta_key'   => $meta['meta_key'],
							'meta_value' => $meta['meta_value'],
						)
					);
				}
				$defaults       = array(
					'ticket_author'   => ( is_user_logged_in() ) ? get_current_user_id() : 0,
					'ticket_date'     => gmdate( 'M d, Y h:i:s A' ),
					'ticket_updated'  => current_time( 'mysql' ),
					'ticket_email'    => '',
					'ticket_title'    => '',
					'ticket_content'  => '',
					'ticket_category' => '',
					'ticket_vendor'   => '',
					'ticket_trash'    => 0,
				);
				$args           = array(
					'ticket_id'       => $parent_tickets[0]['ticket_id'],
					'ticket_author'   => $parent_tickets[0]['ticket_author'],
					'ticket_date'     => $parent_tickets[0]['ticket_date'],
					'ticket_updated'  => $parent_tickets[0]['ticket_updated'],
					'ticket_email'    => $parent_tickets[0]['ticket_email'],
					'ticket_title'    => $parent_tickets[0]['ticket_title'],
					'ticket_content'  => $parent_tickets[0]['ticket_content'],
					'ticket_parent'   => $parent_tickets[0]['ticket_parent'],
					'ticket_category' => $parent_tickets[0]['ticket_category'],
					'ticket_vendor'   => $parent_tickets[0]['ticket_vendor'],
					'ticket_trash'    => 0,
				);
				$data           = wp_parse_args( $args, $defaults );
				$result_tickets = $wpdb->insert( $table_wsdesk_archived_tickets, $data );
			}

			foreach ( $id_to_delete as $key => $value ) {
				$result  = $wpdb->get_results( $wpdb->prepare( 'DELETE FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_id = %d', $value ), ARRAY_A );
				$result1 = $wpdb->get_results( $wpdb->prepare( 'DELETE FROM ' . $wpdb->prefix . 'wsdesk_ticketsmeta WHERE ticket_id = %d', $table_wsdesk_ticketsmeta, $value ), ARRAY_A );
			}
		}
	}

	public static function eh_crm_ticket_multiple_ticket_action() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			global $wpdb;

			$repo       = new \WSDesk\Tickets\TicketRepository();
			$filter     = $_POST;
			$tickets_id = array();

			if ( isset( $_POST['tickets_id'] ) ) {
				$tickets_id = isset( $_POST['tickets_id'] ) ? sanitize_text_field( $_POST['tickets_id'] ) : null;
			}

			if ( ( ! isset( $filter['selectAll'] ) || ! $filter['selectAll'] ) && isset( $filter['tickets_id'] ) ) {
				$filter['ticket_id'] = $filter['tickets_id'];
			}

			if ( is_string( $tickets_id ) ) {
				$tickets_id = json_decode( stripslashes( sanitize_text_field( $_POST['tickets_id'] ) ), true );
			}

			$label = isset( $_POST['label'] ) ? sanitize_text_field( $_POST['label'] ) : null;

			if ( 'archive_tickets' == $label ) {

				if ( ( ! isset( $filter['selectAll'] ) || ! $filter['selectAll'] ) && isset( $filter['tickets_id'] ) ) {
					$filter['ticket_id'] = $filter['tickets_id'];
				}

				$data = $repo->archiveTickets( $filter );

				die( json_encode( $data ) );

				// OLD code. do not need anymore

				$table_wsdesk_archived_tickets             = $wpdb->prefix . 'wsdesk_archived_tickets';
				$table_wsdesk_archived_tickets_ticketsmeta = $wpdb->prefix . 'wsdesk_archived_ticketsmeta';
				$table_wsdesk_ticketsmeta                  = $wpdb->prefix . 'wsdesk_ticketsmeta';
				$table_wsdesk_tickets                      = $wpdb->prefix . 'wsdesk_tickets';

				foreach ( $tickets_id as $ticket_id ) {
					$reply_id = eh_crm_get_ticket_value_count( 'ticket_parent', $ticket_id, false, '', '', 'ticket_updated', 'DESC' );
					array_push( $reply_id, array( 'ticket_id' => $ticket_id ) );
					foreach ( $reply_id as $id ) {
						$id_to_delete[] = $id['ticket_id'];
						$id             = $id['ticket_id'];
						$ticketsmeta    = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'wsdesk_ticketsmeta WHERE ticket_id = %d', $id ), ARRAY_A );
						$parent_tickets = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_id = %d', $id ), ARRAY_A );
						foreach ( $ticketsmeta as $meta ) {
							$result_ticketsmeta = $wpdb->insert(
								$table_wsdesk_archived_tickets_ticketsmeta,
								array(
									'ticket_id'  => (int) $id,
									'meta_key'   => $meta['meta_key'],
									'meta_value' => $meta['meta_value'],
								)
							);
						}
						$defaults       = array(
							'ticket_author'   => ( is_user_logged_in() ) ? get_current_user_id() : 0,
							'ticket_date'     => gmdate( 'M d, Y h:i:s A' ),
							'ticket_updated'  => current_time( 'mysql' ),
							'ticket_email'    => '',
							'ticket_title'    => '',
							'ticket_content'  => '',
							'ticket_category' => '',
							'ticket_vendor'   => '',
							'ticket_trash'    => 0,
						);
						$args           = array(
							'ticket_id'       => $parent_tickets[0]['ticket_id'],
							'ticket_author'   => $parent_tickets[0]['ticket_author'],
							'ticket_date'     => $parent_tickets[0]['ticket_date'],
							'ticket_updated'  => $parent_tickets[0]['ticket_updated'],
							'ticket_email'    => $parent_tickets[0]['ticket_email'],
							'ticket_title'    => $parent_tickets[0]['ticket_title'],
							'ticket_content'  => $parent_tickets[0]['ticket_content'],
							'ticket_parent'   => $parent_tickets[0]['ticket_parent'],
							'ticket_category' => $parent_tickets[0]['ticket_category'],
							'ticket_vendor'   => $parent_tickets[0]['ticket_vendor'],
							'ticket_trash'    => 0,
						);
						$data           = wp_parse_args( $args, $defaults );
						$result_tickets = $wpdb->insert( $table_wsdesk_archived_tickets, $data );
					}
				}
				foreach ( $id_to_delete as $key => $value ) {
					$query_delete_ticket_1 = $wpdb->get_results( $wpdb->prepare( 'DELETE FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_id = %d', $value ), ARRAY_A );
					$query_delete_ticket_2 = $wpdb->get_results( $wpdb->prepare( 'DELETE FROM ' . $wpdb->prefix . 'wsdesk_ticketsmeta WHERE ticket_id = %d', $value ), ARRAY_A );
				}
				if ( isset( $tickets_id ) ) {
					die( json_encode( array( 'count' => count( $tickets_id ) ) ) );
				}
			} else {
				$query         = $repo->applyFilter( $filter )->select( 'ticket_id' );
				$data['count'] = $repo->chunk(
					$query,
					50,
					function ( $tickets ) use ( $label ) {
						foreach ( $tickets as $ticket ) {
							// TODO: This can be optimized more
							// 1. Update ticket labels in bulk or chunk. Is every ticket has label?
							// 2. Update trigger_status and trigger_changes in bulk or chunk. Need to check update or insert
							// 3. Trigger trigger check for evety ticket
							eh_crm_update_ticketmeta( $ticket->ticket_id, 'ticket_label', $label );
						}
					}
				);
				die( json_encode( $data ) );
			}
		}
	}

	public static function eh_crm_ticket_search() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$search = isset( $_POST['search'] ) ? sanitize_text_field( $_POST['search'] ) : null;
			if ( eh_crm_get_ticket(
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
				$search_key = str_replace( ' ', '_', $search );
				$search_key = str_replace( '@', '_1attherate1_', $search_key );
				$search_key = str_replace( '.', '_1dot1_', $search_key );
				$search_key = str_replace( ';', '_1semicolon1_', $search_key );
				$search_key = str_replace( '?', '_1questionmark1_', $search_key );

				$ticket_ids = eh_crm_get_ticket_search( $search );
				$content    = self::eh_crm_generate_search_result( $ticket_ids, $search, $search_key );

				$tab = '<a href="#tab_content_' . $search_key . '" id="tab_content_a_' . $search_key . '" aria-controls="#' . $search_key . '" role="tab" data-toggle="tab" class="tab_a" style="font-size: 12px;padding: 11px 5px;margin-right:0px !important;"><button type="button" class="btn btn-default btn-circle close_tab pull-right"><span class="glyphicon glyphicon-remove"></span></button><div class="badge"><span class="glyphicon glyphicon-search"></span></div><span> ' . ( strlen( $search ) > 18 ? substr( $search, 0, 18 ) . '...' : $search ) . '</span></a>';
				die(
					json_encode(
						array(
							'tab_head'    => $tab,
							'tab_content' => $content,
							'data'        => 'search',
							'search_key'  => $search_key,
						)
					)
				);
			}
		}
	}

	public static function eh_crm_generate_search_result( $section_tickets_id, $search ) {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
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
										$current_meta = eh_crm_get_ticketmeta( $section_tickets_id[ $i ]['ticket_id'] );
										$action_value = '';
										$eye_color    = '';
										for ( $j = 0;$j < count( $avail_labels );$j++ ) {
											if ( in_array( 'manage_tickets', $access ) ) {
												$action_value .= '<li id="' . esc_html( $current[0]['ticket_id'] ) . '"><a href="#" class="single_ticket_action" id="' . esc_attr( $avail_labels[ $j ]['slug'] ) . '">' . esc_html__( 'Mark as', 'wsdesk' ) . ' ' . esc_html( $avail_labels[ $j ]['title'] ) . '</a></li>';

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
										$latest_reply_id      = eh_crm_get_ticket_value_count( 'ticket_category', 'agent_note', true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id', 'DESC', '1' );
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
											$latest_reply_meta = eh_crm_get_ticketmeta( $latest_reply_id[0]['ticket_id'] );
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

	public static function eh_crm_ticket_add_new() {
		ob_start();
		$logged_user      = wp_get_current_user();
		$logged_user_caps = array_keys( $logged_user->caps );
		$avail_caps       = array( 'reply_tickets', 'delete_tickets', 'manage_tickets' );
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
		$avail_fields      = eh_crm_get_settings( array( 'type' => 'field' ), array( 'slug', 'title', 'settings_id' ) );
		$selected_fields   = eh_crm_get_settingsmeta( 0, 'selected_fields' );
		$avail_tags        = eh_crm_get_settings( array( 'type' => 'tag' ), array( 'slug', 'title', 'settings_id' ) );
		$avail_labels      = eh_crm_get_settings( array( 'type' => 'label' ), array( 'slug', 'title', 'settings_id' ) );
		$ticket_label      = '';
		$ticket_label_slug = '';
		for ( $j = 0;$j < count( $avail_labels );$j++ ) {
			if ( eh_crm_get_settingsmeta( 0, 'default_label' ) == $avail_labels[ $j ]['slug'] ) {
				$ticket_label      = $avail_labels[ $j ]['title'];
				$ticket_label_slug = $avail_labels[ $j ]['slug'];
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
		$blog_info = eh_crm_wpml_translations( get_bloginfo( 'name' ), 'bloginfo', 'bloginfo' );
		?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ol class="breadcrumb col-md-8" style="margin: 0 !important;background: none !important;border:none;padding: 8px 0px !important; ">
							<li><?php echo esc_html( $blog_info ); ?></li>
							<li><?php esc_html_e( 'Support', 'wsdesk' ); ?></li>
							<li class="active"><span class="label label-danger">#<?php esc_html_e( 'New', 'wsdesk' ); ?></span></li>
							<span class="spinner_loader ticket_loader_new">
								<span class="bounce1"></span>
								<span class="bounce2"></span>
								<span class="bounce3"></span>
							</span>
						</ol>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-4 col-md-3">
						<div class="form-group">
							<span class="help-block"><?php esc_html_e( 'Assignee', 'wsdesk' ); ?></span>
							<select id="assignee_ticket_new" class="form-control" aria-describedby="helpBlock" multiple="multiple">
							<?php
							foreach ( $users as $key => $value ) {
								foreach ( $value as $id => $name ) {
									echo '<option value="' . esc_attr( $id ) . '">' . esc_attr( $name ) . ' | ' . esc_attr( $key ) . '</option>';
								}
							}
							?>
							</select>
						</div>
						<div class="form-group">
							<span class="help-block"><?php esc_html_e( 'Tags', 'wsdesk' ); ?></span>
							<select id="tags_ticket_new" class="form-control crm-form-element-input" multiple="multiple">
								<?php
								if ( ! empty( $avail_tags ) ) {
									for ( $i = 0;$i < count( $avail_tags );$i++ ) {
										echo '<option value="' . esc_attr( $avail_tags[ $i ]['slug'] ) . '">' . esc_html( $avail_tags[ $i ]['title'] ) . '</option>';
									}
								}
								?>
							</select>
						</div>
						<hr>
						<?php
						for ( $i = 0; $i < count( $selected_fields ); $i++ ) {
							for ( $j = 3; $j < count( $avail_fields ); $j++ ) {
								if ( $avail_fields[ $j ]['slug'] == $selected_fields[ $i ] ) {
									$current_settings_meta = eh_crm_get_settingsmeta( $avail_fields[ $j ]['settings_id'] );
									$required              = ( isset( $current_settings_meta['field_require_agent'] ) ? $current_settings_meta['field_require_agent'] : '' );
									$required              = ( 'yes' == $required ) ? 'required' : '';
									if ( 'file' != $current_settings_meta['field_type'] && 'google_captcha' != $current_settings_meta['field_type'] ) {
										echo '<div class="form-group">';
										if ( 'ip' == $current_settings_meta['field_type'] ) {
											echo '<span class="help-block">' . esc_html( $current_settings_meta['field_description'] );
										} else {
											echo '<span class="help-block">' . esc_html( $avail_fields[ $j ]['title'] );
										}
										echo ( 'required' == $required ) ? '<span class="input_required"> *</span></span>' : '</span>';
										switch ( $current_settings_meta['field_type'] ) {
											case 'text':
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="text" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_text_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '">';
												break;
											case 'ip':
												echo '<input type="hidden" value="' . isset( $_SERVER['REMOTE_ADDR'] ) ? esc_html( sanitize_text_field( $_SERVER['REMOTE_ADDR'] ) ) : null . '" class="ticket_input_ip_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" >';
												break;
											case 'date':
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="text" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_date_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '">';
												break;
											case 'email':
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="email" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_email_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '">';
												break;
											case 'phone':
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<span><strong>+</strong><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" min="0" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_number_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '" style="display: inline !important; width: 97% !important"></span>';
												break;
											case 'number':
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="number" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_number_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '">';
												break;
											case 'password':
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<input type="password" AUTOCOMPLETE="false" readonly class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_pwd_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_html( $current_settings_meta['field_placeholder'] ) . '" onfocus="this.removeAttribute(\'readonly\');">';
												break;
											case 'select':
												$field_values  = $current_settings_meta['field_values'];
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<select class="form-control crm-form-element-input ' . esc_attr( $required_text ) . ' ticket_input_select_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '">';
												echo '<option value="">' . ( isset( $current_settings_meta['field_placeholder'] ) ? esc_html( $current_settings_meta['field_placeholder'] ) : '-' ) . '</option>';
												foreach ( $field_values as $key => $value ) {
													echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
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
													echo '<input type="radio" style="margin-top: 0;" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" name="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" class="form-control ' . esc_attr( $required_radio ) . ' ticket_input_radio_new" value="' . esc_attr( $key ) . '"> ' . esc_html( $value ) . '<br>';

												}
												echo '</span>';
												break;
											case 'checkbox':
												$required_check = '';
												if ( 'required' == $required ) {
													$required_check = 'check_required';
												}
												$field_values = $current_settings_meta['field_values'];
												echo '<span style="vertical-align: middle;">';
												foreach ( $field_values as $key => $value ) {
													echo '<input type="checkbox" style="margin-top: 0;" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" class="form-control ' . esc_html( $required_check ) . ' ticket_input_checkbox_new" value="' . esc_attr( $key ) . '"> ' . esc_html( $value ) . '<br>';
												}
												echo '</span>';
												break;
											case 'textarea':
												$required_text = '';
												if ( 'required' == $required ) {
													$required_text = 'text_required';
												}
												echo '<textarea class="form-control ' . esc_html( $required_text ) . ' ticket_input_textarea_new" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" ></textarea>';
												break;
										}
										echo '</div>';
									}
								}
							}
						}
						?>
					</div>
					<div class="col-sm-10 col-md-9">
						<div class="panel panel-default new_ticket_panel">
							<div class="panel-heading">
								<p style="margin-top: 5px;font-size: 16px;">
								<?php
									echo '<div class="form-group"><span class="help-block">' . esc_html__( 'Raiser Email', 'wsdesk' ) . ' : </span><input type="email" id="ticket_email_new" class="form-control crm-form-element-input"></div>';
									echo '<div class="form-group"><span class="help-block">' . esc_html__( 'Ticket Subject', 'wsdesk' ) . ' : </span><input type="text" id="ticket_title_new" class="form-control crm-form-element-input"></div>';
								?>
								</p>
							</div>
							<div class="panel-body">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="row" style="margin-bottom: 20px;">
												<div class="col-md-12">
													<div class="widget-area no-padding blank" style="width:100%">
														<div class="status-upload">
															<div class="form-group" style="padding: 5px 5px !important;">
																<span class="help-block"><?php esc_html_e( 'Description', 'wsdesk' ); ?></span>
																<div rows="10" cols="30" class="form-control reply_textarea" id="reply_textarea_new" name="reply_textarea_new"></div>
															</div>
															<div class="form-group">
																<div class="input-group col-md-12">
																	<span class="btn btn-primary fileinput-button">
																		<i class="glyphicon glyphicon-plus"></i>
																		<span><?php esc_html_e( 'Attachment', 'wsdesk' ); ?></span>
																		<input type="file" name="files" id="files_new" class="attachment_reply" multiple="">
																	</span>
																	<div class="btn-group pull-right">
																		<button type="button" class="btn btn-primary dropdown-toggle ticket_reply_action_button_new" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		<?php esc_html_e( 'Submit as', 'wsdesk' ); ?> <span class="caret"></span>
																		</button>
																		<ul class="dropdown-menu">
																		<?php
																		if ( in_array( 'manage_tickets', $access ) || true ) {
																			for ( $j = 0;$j < count( $avail_labels );$j++ ) {
																				echo '<li id="new"><a href="#" class="ticket_submit_new" id="' . esc_attr( $avail_labels[ $j ]['slug'] ) . '">' . esc_html__( 'Submit as', 'wsdesk' ) . ' ' . esc_html( $avail_labels[ $j ]['title'] ) . '</a></li>';
																			}
																		} else {
																			echo '<li id="new"><a href="#" class="ticket_submit_new" id="' . esc_attr( $ticket_label_slug ) . '">' . esc_html__( 'Submit as', 'wsdesk' ) . ' ' . esc_html( $ticket_label ) . '</a></li>';
																		}
																		?>
																		</ul>
																	  </div>
																	  <div class="btn-group pull-right" style="padding: 0px;margin-right: 10px;height: 35px;">
																		<button type="button" class="btn btn-primary dropdown-toggle mulitple_ticket_template_button" data-toggle="dropdown">
																			<span class="glyphicon glyphicon-envelope" style="margin-right:5px;"></span> <?php esc_html_e( 'Select Template', 'wsdesk' ); ?> <span class="caret"></span>
																		</button>
																		<ul class="dropdown-menu list-group dropdown-menu-left" id="template_multiple_actions_single_new" style="min-width:250px" role="menu">
																			<li>
																				<div class="template_div asg">
																					<div style="visibility: visible;"></div>
																					<input type="text" class="search_template_single" id="new" placeholder="Search Template">
																					<div class="A0 A0_n"><span class="glyphicon glyphicon-search"></span></div>
																				</div>
																			</li>
																			<li role="separator" class="divider" style="margin:0px; margin-bottom:5px !important;margin-top: 5px !important;"></li>
																			<?php
																			$avail_templates = eh_crm_get_settings( array( 'type' => 'template' ), array( 'slug', 'title', 'settings_id' ) );
																			if ( ! $avail_templates ) {
																				$avail_templates = array();
																			}
																			if ( ! empty( $avail_templates ) ) {
																				for ( $i = 0;$i < count( $avail_templates ) && $i < 6;$i++ ) {
																					echo '<li class="list-group-item available_template available_template_new ' . esc_attr( $avail_templates[ $i ]['slug'] ) . '_li" id="new" title="' . esc_attr( $avail_templates[ $i ]['title'] ) . '"> <span style="display: block;" class="truncate multiple_template_action ' . esc_attr( $avail_templates[ $i ]['slug'] ) . '_head" based="single" id="' . esc_attr( $avail_templates[ $i ]['slug'] ) . '">' . esc_html( $avail_templates[ $i ]['title'] ) . '</span></li>';
																				}
																				if ( 6 == $i ) {
																					echo '<li role="separator" class="divider available_template available_template_new" style="margin:0px; margin-bottom:5px !important;margin-top: 5px !important;"></li>';
																					echo '<center><a href="#wsdesk-template-wsdesk-popup-2">' . ( count( $avail_templates ) - 6 ) . ' more template' . ( ( count( $avail_templates ) - 6 ) == 1 ? ' is' : 's are' ) . ' there </a></center>';
																				}
																			}
																			?>
																		</ul>
																	</div>
																</div>
																<div class="upload_preview_files_new"></div>
															</div>
														</div><!-- Status Upload  -->
													</div><!-- Widget Area -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="wsdesk-template-wsdesk-popup-2" class="wsdesk-overlay">
				<div class="wsdesk-popup">
					<div class="wsdesk-overlay-success" style="display: none;color:green">
						<?php esc_html_e( 'Template Added !', 'wsdesk' ); ?>
					</div>
					<h4>Available Templates</h4>
					<a class="close" href="#">&times;</a>
					<div class="content">
						<?php
						if ( ! empty( $avail_templates ) ) {
							for ( $i = 0;$i < count( $avail_templates );$i++ ) {
								echo '<li class="list-group-item available_template available_template_new ' . esc_attr( $avail_templates[ $i ]['slug'] ) . '_li" id="new" title="' . esc_attr( $avail_templates[ $i ]['title'] ) . '"> <span style="display: block;" class="truncate multiple_template_action ' . esc_attr( $avail_templates[ $i ]['slug'] ) . '_head" based="single" id="' . esc_attr( $avail_templates[ $i ]['slug'] ) . '">' . esc_html( $avail_templates[ $i ]['title'] ) . '</span></li>';
							}
						}
						?>
					</div>
				</div>
			</div>
			<?php
			$content = ob_get_clean();
			$tab     = '<a href="#tab_content_new" id="tab_content_a_new" aria-controls="#new" role="tab" data-toggle="tab" class="tab_a" style="font-size: 12px;padding: 11px 5px;margin-right:0px !important;"><button type="button" class="btn btn-default btn-circle close_tab pull-right"><span class="glyphicon glyphicon-remove"></span></button><div class="badge">#New Ticket</div><span></span></a>';
			die(
				json_encode(
					array(
						'tab_head'    => $tab,
						'tab_content' => $content,
					)
				)
			);
	}

	public static function eh_crm_ticket_new_submit() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$email      = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : null;
			$title      = isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : null;
			$desc       = str_replace( "\n", '<br/>', isset( $_POST['desc'] ) ? sanitize_text_field( $_POST['desc'] ) : null );
			$submit     = isset( $_POST['submit'] ) ? sanitize_text_field( $_POST['submit'] ) : null;
			$assignee   = ( ( isset( $_POST['assignee'] ) ? sanitize_text_field( $_POST['assignee'] ) : null !== '' ) ? explode( ',', isset( $_POST['assignee'] ) ? sanitize_text_field( $_POST['assignee'] ) : null ) : array() );
			$tags       = ( ( isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : null !== '' ) ? explode( ',', isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : null ) : array() );
			$input      = json_decode( stripslashes( isset( $_POST['input'] ) ? sanitize_text_field( $_POST['input'] ) : null ), true );
			$files_data = $_FILES;
			$files      = isset( $files_data['file'] ) ? $files_data['file'] : '';
			$vendor     = '';
			if ( EH_CRM_WOO_VENDOR ) {
				$vendor = EH_CRM_WOO_VENDOR;
			}
			$id                      = email_exists( $email );
			$args                    = array(
				'ticket_author'   => ( ( $id ) ? $id : 0 ),
				'ticket_email'    => $email,
				'ticket_title'    => $title,
				'ticket_content'  => $desc,
				'ticket_category' => 'raiser_reply',
				'ticket_vendor'   => $vendor,
			);
			$meta                    = array();
			$meta['ticket_assignee'] = $assignee;
			$meta['ticket_tags']     = $tags;
			foreach ( $input as $key => $value ) {
				$meta[ $key ] = $value;
			}
			if ( isset( $_FILES['file'] ) && ! empty( $_FILES['file'] ) ) {
				$attachment_data                = self::eh_crm_ticket_file_handler( $files );
				$meta['ticket_attachment']      = $attachment_data['url'];
				$meta['ticket_attachment_path'] = $attachment_data['path'];
			}
			$meta['ticket_label']  = $submit;
			$meta['ticket_source'] = 'Agent';
			$id                    = eh_crm_insert_ticket( $args, $meta );
			$send                  = eh_crm_get_settingsmeta( '0', 'auto_send_creation_email' );
			$response              = array();
			if ( 'enable' == $send ) {
				eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Started ------------- ' );
				eh_crm_debug_error_log( 'New ticket by Agent auto Email for Ticket #' . $id );
				eh_crm_debug_error_log( 'Email function called for New Ticket #' . $id );
				$repo     = new CRM_Ajax();
				$response = $repo->eh_crm_fire_email( 'new_ticket', $id );
				eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Ended ------------- ' );
			}
			$content_html = self::eh_crm_ticket_single_view_gen( $id );
			$tab          = self::eh_crm_ticket_single_view_gen_head( $id );
			die(
				json_encode(
					array(
						'tab_head'    => $tab,
						'tab_content' => $content_html,
						'id'          => $id,
						'response'    => $response,
					)
				)
			);
		}
	}
	public static function eh_crm_check_ticket_request() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$url            = isset( $_POST['url'] ) ? sanitize_text_field( $_POST['url'] ) : null;
			$slug           = json_decode( stripslashes( isset( $_POST['slug'] ) ? sanitize_text_field( $_POST['slug'] ) : null ) );
			$current_page   = sanitize_text_field( isset( $_POST['wsdesk_current_page'] ) ? $_POST['wsdesk_current_page'] : 1 );
			$filter_label   = sanitize_text_field( isset( $_POST['label'] ) ? $_POST['label'] : 'all' );
			$search_tickets = sanitize_text_field( isset( $_POST['search_tickets'] ) ? $_POST['search_tickets'] : '' );

			if ( is_user_logged_in() ) {
				$user_id = get_current_user_id();
				$user    = new WP_User( $user_id );
				$email   = $user->user_email;
				$repo    = new CRM_Ajax();
				$content = $repo->eh_crm_user_ticket_fetch( $email, $user_id, $slug, $current_page, $filter_label, $search_tickets );
				die(
					json_encode(
						array(
							'status'  => 'success',
							'content' => $content,
						)
					)
				);
			} else {
				$exisiting_tickets_login_label    = eh_crm_get_settingsmeta( 0, 'exisiting_tickets_login_label' );
				$exisiting_tickets_register_label = eh_crm_get_settingsmeta( 0, 'exisiting_tickets_register_label' );
				if ( empty( $exisiting_tickets_login_label ) ) {
					$exisiting_tickets_login_label = esc_html__( 'You must Login to Check your Existing Ticket', 'wsdesk' );
				} else {
					$exisiting_tickets_login_label = eh_crm_wpml_translations( $exisiting_tickets_login_label, 'exisiting_tickets_login_label', 'exisiting_tickets_login_label' );
				}
				if ( empty( $exisiting_tickets_register_label ) ) {
					$exisiting_tickets_register_label = esc_html__( 'Need an Account?', 'wsdesk' );
				} else {
					$exisiting_tickets_register_label = eh_crm_wpml_translations( $exisiting_tickets_register_label, 'exisiting_tickets_register_label', 'exisiting_tickets_register_label' );
				}
				$content  = '<div class="form-elements"><span>' . $exisiting_tickets_login_label . '</span><br><a class="btn btn-primary" href="' . esc_url( wsdesk_get_login_url() ) . '">' . esc_html__( 'Login', 'wsdesk' ) . '</a></div>';
				$content .= '<div class="form-elements"><span>' . $exisiting_tickets_register_label . '</span><br><a class="btn btn-primary" href="' . esc_url( wsdesk_get_register_url() ) . '">' . esc_html__( 'Register', 'wsdesk' ) . '</a></div>';
				die(
					json_encode(
						array(
							'status'  => 'success',
							'content' => $content,
						)
					)
				);
			}
		}
	}
}
