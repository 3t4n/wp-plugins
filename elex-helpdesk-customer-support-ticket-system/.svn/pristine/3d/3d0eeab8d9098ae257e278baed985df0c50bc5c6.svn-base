<?php

use WSDesk\Formatter\Cast\TimestampCaster;
use WSDesk\Tickets\TicketRepository;

require __DIR__ . '/class-crm-ajax-functions-one.php';
class CRM_Ajax_Two extends CRM_Ajax_One {

	public static function eh_crm_edit_agent() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$user_id = isset( $_POST['user_id'] ) ? sanitize_text_field( $_POST['user_id'] ) : '';
			$rights  = explode( ',', isset( $_POST['rights'] ) ? sanitize_text_field( $_POST['rights'] ) : '' );
			$tags    = ( ( '' !== isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : '' ) ? explode( ',', isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : '' ) : null );
			$user    = new WP_User( $user_id );
			$user->remove_cap( 'reply_tickets' );
			$user->remove_cap( 'delete_tickets' );
			$user->remove_cap( 'manage_tickets' );
			$user->remove_cap( 'credit_deduction' );
			$user->remove_cap( 'manage_templates' );
			$user->remove_cap( 'settings_page' );
			$user->remove_cap( 'agents_page' );
			$user->remove_cap( 'email_page' );
			$user->remove_cap( 'import_page' );
			$user->remove_cap( 'merge_tickets' );
			for ( $j = 0; $j < count( $rights ); $j++ ) {
				switch ( $rights[ $j ] ) {
					case 'reply':
						$user->add_cap( 'reply_tickets', 1 );
						break;
					case 'delete':
						$user->add_cap( 'delete_tickets', 1 );
						break;
					case 'manage':
						$user->add_cap( 'manage_tickets', 1 );
						break;
					case 'credit_deduction':
						if ( defined( 'PFS_IS_INSTALLED' ) ) {
							$user->add_cap( 'credit_deduction', 1 );
						}
						break;
					case 'templates':
						$user->add_cap( 'manage_templates', 1 );
						break;
					case 'settings':
						$user->add_cap( 'settings_page', 1 );
						break;
					case 'agents':
						$user->add_cap( 'agents_page', 1 );
						break;
					case 'email':
						$user->add_cap( 'email_page', 1 );
						break;
					case 'import':
						$user->add_cap( 'import_page', 1 );
						break;
					case 'merge':
						$user->add_cap( 'merge_tickets', 1 );
						break;
					default:
						break;
				}
			}
			update_user_meta( $user_id, 'wsdesk_tags', $tags );
			$add_agents    = include EH_CRM_MAIN_VIEWS . 'agents/crm_agents_add.php';
			$manage_agents = include EH_CRM_MAIN_VIEWS . 'agents/crm_agents_manage.php';
			die(
				json_encode(
					array(
						'add'    => $add_agents,
						'manage' => $manage_agents,
					)
				)
			);
		}
	}

	public static function eh_crm_remove_agent() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$user_id = isset( $_POST['user_id'] ) ? sanitize_text_field( $_POST['user_id'] ) : '';
			$user    = new WP_User( $user_id );
			if ( in_array( 'WSDesk_Supervisor', $user->roles ) ) {
				$user->remove_cap( 'reply_tickets' );
				$user->remove_cap( 'delete_tickets' );
				$user->remove_cap( 'manage_tickets' );
				$user->remove_cap( 'credit_deduction' );
				$user->remove_cap( 'manage_templates' );
				$user->remove_cap( 'settings_page' );
				$user->remove_cap( 'agents_page' );
				$user->remove_cap( 'email_page' );
				$user->remove_cap( 'import_page' );
				$user->remove_cap( 'merge_tickets' );
				$user->remove_role( 'WSDesk_Supervisor' );
			} elseif ( in_array( 'administrator', $user->roles ) ) {
				$user->remove_cap( 'reply_tickets' );
				$user->remove_cap( 'delete_tickets' );
				$user->remove_cap( 'manage_tickets' );
				$user->remove_cap( 'credit_deduction' );
				$user->remove_cap( 'manage_templates' );
				$user->remove_cap( 'settings_page' );
				$user->remove_cap( 'agents_page' );
				$user->remove_cap( 'email_page' );
				$user->remove_cap( 'import_page' );
				$user->remove_cap( 'merge_tickets' );
				$user->remove_role( 'administrator' );
			} else {
				$user->remove_cap( 'reply_tickets' );
				$user->remove_cap( 'delete_tickets' );
				$user->remove_cap( 'manage_tickets' );
				$user->remove_cap( 'credit_deduction' );
				$user->remove_role( 'WSDesk_Agents' );
			}
			delete_user_meta( $user_id, 'wsdesk_tags' );
			$add_agents    = include EH_CRM_MAIN_VIEWS . 'agents/crm_agents_add.php';
			$manage_agents = include EH_CRM_MAIN_VIEWS . 'agents/crm_agents_manage.php';
			die(
				json_encode(
					array(
						'add'    => $add_agents,
						'manage' => $manage_agents,
					)
				)
			);
		}
	}
	public static function eh_crm_new_ticket_post() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$post_values = array();
			$post        = $_POST;
			parse_str( isset( $post['form'] ) ? $post['form'] : '', $post_values );
			if ( isset( $post_values['g-recaptcha-response'] ) ) {
				if ( '' == $post_values['g-recaptcha-response'] ) {
					die( 'captcha_failed' );
				}
				require_once 'recaptcha.php';
				$settings  = eh_crm_get_settings( array( 'slug' => 'google_captcha' ), 'settings_id' );
				$secret    = eh_crm_get_settingsmeta( $settings[0]['settings_id'], 'field_secret_key' );
				$reCaptcha = new ReCaptcha( $secret );
				$response  = $reCaptcha->verifyResponse( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_key( $_SERVER['REMOTE_ADDR'] ) : '', $post_values['g-recaptcha-response'] );
				if ( null == $response && ! $response->success ) {
					die( 'captcha_failed' );
				}
			}
			$files  = isset( $_FILES['file'] ) ? sanitize_text_field( $_FILES['file'] ) : '';
			$email  = $post_values['request_email'];
			$title  = stripslashes( $post_values['request_title'] );
			$desc   = str_replace( "\n", '<br/>', stripslashes( $post_values['request_description'] ) );
			$desc   = eh_crm_make_url_as_link( $desc );
			$vendor = '';
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
				'ticket_author'   => ( empty( $user ) ) ? 0 : $user->ID,
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
				$meta[ $key ] = $value;
			}
			if ( isset( $_FILES['file'] ) && ! empty( $_FILES['file'] ) ) {
				$attachment_data                = CRM_Ajax_Three::eh_crm_ticket_file_handler();
				$meta['ticket_attachment']      = $attachment_data['url'];
				$meta['ticket_attachment_path'] = $attachment_data['path'];
			}
			$meta['ticket_source'] = 'Form';
			$gen_id                = eh_crm_insert_ticket( $args, $meta );
			$send                  = eh_crm_get_settingsmeta( '0', 'auto_send_creation_email' );
			if ( 'enable' == $send ) {
				eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Started ------------- ' );
				eh_crm_debug_error_log( 'New ticket auto Email for Ticket #' . $gen_id );
				eh_crm_debug_error_log( 'Email function called for New Ticket #' . $gen_id );
				$repo     = new CRM_Ajax();
				$response = $repo->eh_crm_fire_email( 'new_ticket', $gen_id );
				eh_crm_debug_error_log( ' ------------- WSDesk Email Debug Ended ------------- ' );

			}
			$submit_ticket_redirect_url = eh_crm_get_settingsmeta( '0', 'submit_ticket_redirect_url' );
			if ( empty( $submit_ticket_redirect_url ) ) {
				
				/**
				 * Fire a filter hook for wpml current language
				 *
				 * @since 3.1.2
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
				
				die(
					json_encode(
						array(
							'status'  => 'success',
							'message' => __(
								'Support Request Received Successfully',
								'wsdesk'
							),
						)
					)
				);
			} else {
				die(
					json_encode(
						array(
							'status' => 'redirect',
							'link'   => $submit_ticket_redirect_url,
						)
					)
				);
			}
		}
	}

	public static function eh_crm_new_ticket_form() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$my_html = include EH_CRM_MAIN_VIEWS . 'shortcodes/crm_support_new.php';
			wp_send_json_success( array( 'page' => $my_html ) );
			die;
		}
	}

	public static function eh_crm_survey_ticket_form() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$id      = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';
			$author  = isset( $_POST['author'] ) ? sanitize_text_field( $_POST['author'] ) : '';
			$rating  = isset( $_POST['rating'] ) ? sanitize_text_field( $_POST['rating'] ) : '';
			$comment = str_replace( "\n", '<br/>', isset( $_POST['comment'] ) ? sanitize_text_field( $_POST['comment'] ) : '' );
			$ticket  = eh_crm_get_ticket( array( 'ticket_id' => $id ) );
			if ( $ticket ) {
				if ( $author == $ticket[0]['ticket_email'] ) {
					$satis = '';
					if ( 'good' == $rating ) {
						$satis = 'great';
					} else {
						$satis = 'Bad';
					}
					eh_crm_update_ticketmeta( $id, 'ticket_rating', $satis );
					if ( '' !== $comment ) {
						$child = array(
							'ticket_email'    => $author,
							'ticket_title'    => $ticket[0]['ticket_title'],
							'ticket_content'  => $comment,
							'ticket_category' => 'satisfaction_survey',
							'ticket_parent'   => $id,
							'ticket_vendor'   => $ticket[0]['ticket_vendor'],
						);
						eh_crm_insert_ticket( $child );
					}
					die( '<h1>' . esc_html__( 'Thank you', 'wsdesk' ) . '</h1><h4>' . esc_html__( 'Satisfaction feedback submitted successfully', 'wsdesk' ) . '</h4>' );
				} else {
					die( '<h1>' . esc_html__( 'Oops!', 'wsdesk' ) . '</h1><h4>' . esc_html__( 'Unauthorized Access!', 'wsdesk' ) . '</h4>' );
				}
			} else {
				die( '<h1>' . esc_html__( 'Oops!', 'wsdesk' ) . '</h1><h4>' . esc_html__( 'Access Denied!', 'wsdesk' ) . '</h4>' );
			}
		}
	}

	public static function eh_crm_ticket_single_view() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : '';
			if ( isset( $_POST['pagination_id'] ) ) {
				$pagination = json_decode( stripslashes( isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : '' ), true );
			} else {
				$pagination = array();
			}
			$content = self::eh_crm_ticket_single_view_gen( $ticket_id, $pagination );
			$tab     = self::eh_crm_ticket_single_view_gen_head( $ticket_id );
			die(
				json_encode(
					array(
						'tab_head'    => $tab,
						'tab_content' => $content,
					)
				)
			);
		}
	}

	public static function eh_crm_ticket_single_view_gen_head( $ticket_id ) {
		$current = eh_crm_get_ticket( array( 'ticket_id' => $ticket_id ) );
		$tab     = '<a onclick="setURLFunc(' . $ticket_id . ')" href="#tab_content_' . $ticket_id . '" id="tab_content_a_' . $ticket_id . '" aria-controls="#' . $ticket_id . '" role="tab" data-toggle="tab" class="tab_a" style="font-size: 12px;padding: 11px 5px;margin-right:0px !important;"><button type="button" class="btn btn-default btn-circle close_tab pull-right"><span class="glyphicon glyphicon-remove"></span></button><div class="badge">#' . $ticket_id . '</div><span class="tab_head"> ' . stripslashes( html_entity_decode( htmlentities( $current[0]['ticket_title'] ) ) ) . '</span></a>';
		return $tab;
	}

	public static function eh_crm_ticket_single_view_gen( $ticket_id, $pagination = array() ) {
		ob_start();
		$user_id_agent         = get_current_user_id();
		$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
		$user_id_agent_role    = $user_id_agent_details->roles;
		$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );

		// $allow_agent_tickets = eh_crm_get_settingsmeta('0', "allow_agent_tickets");
		$data_show = false;

		$ticket_count = wpFluent()->table( 'wsdesk_ticketsmeta' )
					->where( 'meta_key', 'ticket_assignee' )
					->where( 'meta_value', 'like', '%"' . $user_id_agent . '"%' )
					->where( 'ticket_id', $ticket_id )
					->count();
		if ( $ticket_count > 0 ) {
			$data_show = true;
		}

		if ( 'enable' != $allow_agent_tickets ) {
			if ( ! in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
				$data_show = true;
			}
		} else {
			$data_show = true;
		}

		if ( false === $data_show ) { ?>
				<div class="container">
					<div class="row">
						 <span style="color:green;margin-left:40%;">Sorry! You do not have a access to open this ticket!</span>
					</div>
				</div>
			<?php return ob_get_clean(); ?>
			<?php
		}
			$current          = eh_crm_get_ticket( array( 'ticket_id' => $ticket_id ) );
			$tickets_display  = eh_crm_get_settingsmeta( '0', 'tickets_display' );
			$current_meta     = eh_crm_get_ticketmeta( $ticket_id );
			$logged_user      = wp_get_current_user();
			$logged_user_caps = array_keys( $logged_user->caps );
			$avail_caps       = array( 'reply_tickets', 'delete_tickets', 'manage_tickets', 'manage_templates', 'merge_tickets' );
			$total_count      = array(); // (eh_crm_get_ticket_value_count("ticket_parent",0));
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
			$users_data = get_users(
				array(
					'role__in' => array( 'administrator', 'WSDesk_Agents', 'WSDesk_Supervisor' ),
					'orderby'  => 'display_name',
				)
			);
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
				$ticket_label = $avail_labels[ $j ]['title'];
				$eye_color    = eh_crm_get_settingsmeta( $avail_labels[ $j ]['settings_id'], 'label_color' );
			}
		}
			$ticket_tags_list           = '';
			$response                   = array();
			$co                         = 0;
			$auto_suggestion_is_enabled = eh_crm_get_settingsmeta( 0, 'auto_suggestion' ) == 'enable';
		if ( ! empty( $avail_tags ) ) {
			for ( $j = 0;$j < count( $avail_tags );$j++ ) {
				$current_ticket_tags = ( isset( $current_meta['ticket_tags'] ) ? array_values( $current_meta['ticket_tags'] ) : array() );

				for ( $k = 0;$k < count( $current_ticket_tags );$k++ ) {
					if ( $avail_tags[ $j ]['slug'] == $current_ticket_tags[ $k ] ) {
						if ( $auto_suggestion_is_enabled ) {

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
						}
						$ticket_tags_list .= '<span class="label label-info">#' . $avail_tags[ $j ]['title'] . '</span>';
					}
				}
			}
		}
		if ( null === $pagination ) {
			$pagination = array();
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
			 * @since 3.1.2
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
								<li><?php echo esc_html__( $blog_info, 'wsdesk' ); ?></li>
								<li><?php echo esc_html__( $ticket_label, 'wsdesk' ); ?></li>
							<?php
								$ticket_credits_deducted = eh_crm_get_ticketmeta( $ticket_id, 'credit_deducted' );
							if ( false != $ticket_credits_deducted ) {
								?>
								<li><span style="color: red;"><?php echo esc_html__( 'Total Credit(s) Deducted : ' . $ticket_credits_deducted, 'wsdesk' ); ?></span></li>
																		 <?php
							}
							?>
								<li class="active"><span class="label label-success" style="background-color:<?php echo esc_html( $eye_color ); ?> !important"><?php esc_html_e( 'Ticket', 'wsdesk' ); ?> #<?php echo esc_html( $ticket_id ); ?></span></li>
								<span class="spinner_loader ticket_loader_<?php echo esc_html( $ticket_id ); ?>">
									<span class="bounce1"></span>
									<span class="bounce2"></span>
									<span class="bounce3"></span>
								</span>
							<?php if ( EH_CRM_PAY_FOR_SUPPORT_STATUS ) { ?>
									<img src="<?php echo esc_url( WSDESK_PAY_EH_CRM_MAIN_IMG . 'load.gif' ); ?>" class='wsdesk_pay_for_support_loader' style="width:5% ;height: 1%;display:none;">
								<?php } ?>
							</ol>
							<a  title="<?php echo esc_html__( 'Print Ticket', 'wsdesk' ); ?>" class="btn btn-default pull-right" target="_blank" href="<?php echo esc_url( admin_url( 'admin.php?page=wsdesk_print&ticket=' . $ticket_id . '&master=' . md5( $current[0]['ticket_email'] ) ) ); ?>">
								<span class="glyphicon glyphicon-print"></span>
							</a>
						<?php
						if ( in_array( 'delete_tickets', $access ) ) {
							echo '<button title="' . esc_html__( 'Delete Ticket', 'wsdesk' ) . '" type="button" class="btn btn-default ticket_action_delete pull-right" id="' . esc_html( $ticket_id ) . '" style="margin-right:10px;">
                                            <span class="glyphicon glyphicon-trash"></span>
                                          </button>';
						}
						if ( in_array( 'manage_tickets', $access ) ) {
							echo '<div class="filter-each ticket-edit-btn multiple_ticket_action" id="edit_tickets" style="display: none;"><div  class="ticket-edit-button" data-placement="top" data-toggle="wsdesk_tooltip" title="Edit Tickets"><span class="glyphicon glyphicon-edit"></span></div></div>';
						}
						if ( in_array( 'merge_tickets', $access ) ) {
							if ( wsdesk_is_premium() ) {
								echo '<button title="' . esc_attr__( 'Archive Ticket', 'wsdesk' ) . '" type="button" class="btn btn-default ticket_action_archive pull-right" id="' . esc_html( $ticket_id ) . '" style="height: 31px;margin-right:10px;">
                                    <span class="dashicons dashicons-media-archive"></span>
                                    </button>';
							}

							echo '<button title="' . esc_html__( 'Merge Tickets', 'wsdesk' ) . '" type="button" class="btn btn-default ticket_action_merge pull-right" id="' . esc_html( $ticket_id ) . '" style="margin-right:10px;">
                                            <span>' . esc_html__( 'Merge Tickets', 'wsdesk' ) . '</span>
                                          </button>';

							echo '<button  title="' . esc_html__( 'Refresh Tickets', 'wsdesk' ) . '" type="button" class="btn btn-default ticket_action_refresh pull-right" data-id="' . esc_html( $ticket_id ) . '" style="height: 31px;margin-right:10px;">
										<span class="glyphicon glyphicon-refresh"></span>
						 			</button>';

							echo '<button title="' . esc_html__( 'Activity Log', 'wsdesk' ) . '" type="button" class="btn btn-default activity_log_action pull-right " data-page-no="1" data-ticket-id=' . esc_html( $ticket_id ) . ' data-toggle="modal" data-target="#activity_logs_popup_' . esc_html( $ticket_id ) . '" style="height: 31px; margin-right:10px;" disabled>
									<span>' . esc_html__( 'Show Activities', 'wsdesk' ) . '
										<sup class="text-success">[Premium!]</sup>
									</span>
								</button>';
						}
						?>
							<div id="ticket_merge_modal_<?php echo esc_html( $ticket_id ); ?>" data-backdrop="static"  class="modal fade" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><?php esc_html_e( 'Merge Tickets', 'wsdesk' ); ?></h4>
									  </div>
									  <div class="modal-body">
										<input type="hidden" id="merge_hidden_ticket_ids_<?php echo esc_html( $ticket_id ); ?>" value=''>
										<div class="row">
										   <select id="all_ticket_ids_<?php echo esc_html( $ticket_id ); ?>" class="form-control crm-form-element-input all_ticket_ids" multiple="multiple">
										<?php
										foreach ( $total_count as $parent_ids ) {
											if ( $parent_ids['ticket_id'] != $ticket_id ) {
												echo '<option value=' . esc_attr( $parent_ids['ticket_id'] ) . '>' . esc_html( $parent_ids['ticket_id'] ) . '</option>';
											}
										}
										?>
										   </select>
										</div>
										<div class="row verify" style="overflow-y: auto; max-height:400px; ">
										</div>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal"><?php esc_html_e( 'Close', 'wsdesk' ); ?></button>
										<button data-ticket_id="<?php echo esc_html( $ticket_id ); ?>" type="button" class="btn btn-success merge_ticket_verify" ><?php esc_html_e( 'Verify', 'wsdesk' ); ?></button>
										<button data-ticket_id="<?php echo esc_html( $ticket_id ); ?>" type="button" class="btn btn-primary merge_ticket_confirm" ><?php esc_html_e( 'Confirm', 'wsdesk' ); ?></button>
									  </div>
									</div>
								</div>
							</div>


							<div class="btn-group btn-group-sm pull-right" id="<?php echo esc_html( $ticket_id ); ?>" style="margin-right:10px;">
									<?php
									if ( '' != $previous ) {
										?>
													<button type="button"  class="btn btn-default single_pagination_tickets" id="<?php echo esc_html( $previous ); ?>" title="<?php esc_html_e( 'Previous', 'wsdesk' ); ?>" data-container="body" style="margin-right:5px;">
														<span class="glyphicon glyphicon-chevron-left"></span>
													</button>
											<?php
									}
									if ( '' != $next ) {
										?>
													<button type="button"  class="btn btn-default single_pagination_tickets" id="<?php echo esc_html( $next ); ?>" title="<?php esc_html_e( 'Next', 'wsdesk' ); ?>" data-container="body" style="margin-left:5px;">
														<span class="glyphicon glyphicon-chevron-right"></span>
													</button>
											<?php
									}
									?>
								</div>
						</div>
					</div>
					<span class="crm-divider" style="margin-bottom:2px;margin-left: -15px;width: 103.75%;"></span>
					<?php
					if ( EH_CRM_PAY_FOR_SUPPORT_STATUS ) {
						$user = get_user_by( 'email', $current[0]['ticket_email'] );
						/**
						 * Fire an action hook for ticket tab after breadcrump
						 *
						 * @since 3.1.2
						 * 
						 * @param $user
						 * @param $ticket_id 
						 *
						 */
						do_action( 'wsdesk_ticket_tab_after_breadcrumb', $user->ID, $ticket_id );
					}
					?>
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
												echo '<option value="' . esc_attr( $id ) . '" ' . esc_html( $selected ) . '>' . esc_html( $name ) . ' | ' . esc_html( $key ) . '</option>';
											}
										} else {
											foreach ( $value as $id => $name ) {
												if ( in_array( $id, $assignee ) ) {
													echo '<option value="' . esc_attr( $id ) . '" selected>' . esc_html( $name ) . ' | ' . esc_html( $key ) . '</option>';
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
												echo '<option value="' . esc_attr( $value ) . '" selected>' . esc_html( $value ) . '</option>';
											} else {
												echo '<option value="' . esc_attr( $value ) . '" selected>' . esc_html( $value ) . '</option>';
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
								if ( '' !== $ticket_tags && ! empty( $avail_tags ) ) {
									for ( $i = 0;$i < count( $avail_tags );$i++ ) {
										if ( in_array( 'manage_tickets', $access ) ) {
											$selected = '';
											if ( in_array( $avail_tags[ $i ]['slug'], $ticket_tags ) ) {
												$selected = 'selected';
											}
											echo '<option value="' . esc_attr( $avail_tags[ $i ]['slug'] ) . '" ' . esc_attr( $selected ) . '>' . esc_html( $avail_tags[ $i ]['title'] ) . '</option>';
										} else {
											if ( in_array( $avail_tags[ $i ]['slug'], $ticket_tags ) ) {
												echo '<option value="' . esc_attr( $avail_tags[ $i ]['slug'] ) . '" selected>' . esc_html( $avail_tags[ $i ]['title'] ) . '</option>';
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
													echo '<input type="text" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_text_' . esc_attr( $ticket_id ) . '" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_attr( $current_settings_meta['field_placeholder'] ) . '" ' . esc_attr( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '">';
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
														$value = $field_ticket_value;
													}
													$required_text = '';
													if ( 'required' == $required ) {
														$required_text = 'text_required';
													}
													echo '<input type="text" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input trigger_date_jq ticket_input_date_' . esc_attr( $ticket_id ) . '" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '_t_' . esc_attr( $ticket_id ) . '" placeholder="' . esc_attr( $current_settings_meta['field_placeholder'] ) . '" ' . esc_attr( $readonly ) . ' value="' . esc_attr( $value ) . '">';
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
													echo '<input type="email" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_email_' . esc_attr( $ticket_id ) . '" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_attr( $current_settings_meta['field_placeholder'] ) . '" ' . esc_attr( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '">';
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
													echo '<span><strong>+</strong><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" min="0" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_number_' . esc_attr( $ticket_id ) . '" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_attr( $current_settings_meta['field_placeholder'] ) . '" ' . esc_attr( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '" style="display: inline !important; width: 97% !important;"></span>';
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
													echo '<input type="number" AUTOCOMPLETE="off" class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_number_' . esc_attr( $ticket_id ) . '" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_attr( $current_settings_meta['field_placeholder'] ) . '" ' . esc_attr( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '">';
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
													echo '<input type="password" AUTOCOMPLETE="false" readonly class="form-control ' . esc_attr( $required_text ) . ' crm-form-element-input ticket_input_pwd_' . esc_attr( $ticket_id ) . '" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" placeholder="' . esc_attr( $current_settings_meta['field_placeholder'] ) . '" ' . esc_attr( $readonly ) . ' value="' . esc_html( $field_ticket_value ) . '">';
													break;
												case 'select':
													$field_values  = $current_settings_meta['field_values'];
													$required_text = '';
													if ( 'required' == $required ) {
														$required_text = 'text_required';
													}
													echo '<select class="form-control crm-form-element-input ' . esc_attr( $required_text ) . ' ticket_input_select_' . esc_attr( $ticket_id ) . '" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '">';
													echo '<option value="">' . ( isset( $current_settings_meta['field_placeholder'] ) ? esc_attr( $current_settings_meta['field_placeholder'] ) : '-' ) . '</option>';
													foreach ( $field_values as $key => $value ) {
														if ( in_array( 'manage_tickets', $access ) ) {
															$selected = '';
															if ( $key == $field_ticket_value ) {
																$selected = 'selected';
															}
															echo '<option value="' . esc_attr( $key ) . '" ' . esc_attr( $selected ) . '>' . esc_html( $value ) . '</option>';
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
															echo '<input type="radio" style="margin-top: 0;" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '_' . esc_html( $ticket_id ) . '" name="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '_' . esc_html( $ticket_id ) . '" class="form-control ' . esc_attr( $required_radio ) . ' ticket_input_radio_' . esc_attr( $ticket_id ) . '" value="' . esc_attr( $key ) . '" ' . esc_attr( $checked ) . '> ' . esc_html( $value ) . '<br>';
														} else {
															if ( $key == $field_ticket_value ) {
																echo '<input type="radio" style="margin-top: 0;" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '_' . esc_html( $ticket_id ) . '" name="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '_' . esc_html( $ticket_id ) . '" class="form-control ' . esc_attr( $required_radio ) . ' ticket_input_radio_' . esc_attr( $ticket_id ) . '" value="' . esc_attr( $key ) . '" checked readonly> ' . esc_html( $value ) . '<br>';
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
															echo '<input type="checkbox" style="margin-top: 0;" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" class="form-control ' . esc_attr( $required_check ) . ' ticket_input_checkbox_' . esc_attr( $ticket_id ) . '" value="' . esc_attr( $key ) . '" ' . esc_attr( $checked ) . '> ' . esc_html( $value ) . '<br>';
														} else {
															if ( in_array( $key, $field_ticket_value ) ) {
																echo '<input type="checkbox" style="margin-top: 0;" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" class="form-control ' . esc_attr( $required_check ) . ' ticket_input_checkbox_' . esc_attr( $ticket_id ) . '" value="' . esc_attr( $key ) . '" checked readonly> ' . esc_html( $value ) . '<br>';
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
													echo '<textarea class="form-control ' . esc_attr( $required_text ) . ' except_rich ticket_input_textarea_' . esc_attr( $ticket_id ) . '" id="' . esc_attr( $avail_fields[ $j ]['slug'] ) . '" ' . esc_attr( $readonly ) . '>' . esc_html( $field_ticket_value ) . '</textarea>';
													break;
												case 'pfs_order_product':
													if ( false === EH_CRM_PAY_FOR_SUPPORT_STATUS ) {
														break;
													}
													echo '<select name="pfs_order_product" id="pfs_order_product" class="input_element form-control pfs_order_product_' . esc_attr( $ticket_id ) . '">';
													$pfs_user_id = $current[0]['ticket_author'];
													if ( 0 != $pfs_user_id ) {
														$current_product_names = WSDESK_Pay_for_Support_Subscription::pfs_get_product_names( $pfs_user_id );
														if ( count( $current_product_names ) > 0 ) {
															$ticket_meta = eh_crm_get_ticketmeta( $ticket_id );
															if ( isset( $ticket_meta['pfs_order_product'] ) ) {
																$order_info = explode( ',', $ticket_meta['pfs_order_product'] );
																$order_id   = intval( $order_info[0] );
																$product_id = intval( $order_info[1] );
															} else {
																$order_id   = null;
																$product_id = null;
															}
															echo '<option value="">' . esc_html__( 'Please select a product for the Ticket', 'wsdesk' ) . '</option>';
															foreach ( $current_product_names as $products ) {
																echo '<option value="' . esc_attr( $products['order_id'] ) . ',' . esc_attr( $products['product_id'] ) . '"';
																if ( $products['order_id'] == $order_id && $products['product_id'] == $product_id ) {
																	echo 'selected';
																}
																echo '>' . esc_html( $products['product_name'] ) . ' (order id:' . esc_html( $products['order_id'] ) . ')</option>';
															}
														}
													}
													echo '</select>';
													break;
											}
											echo '</div>';
										}
									}
								}
							}
							if ( in_array( 'manage_tickets', $access ) ) {
								echo '<button type="button" class="btn btn-primary col-md-offset-3 ticket_action_save_props" id="' . esc_attr( $ticket_id ) . '">
                                        <span class="glyphicon glyphicon-saved"></span> ' . esc_html__( 'Save Properties', 'wsdesk' ) . '
                                      </button>';
							}
							?>
						</div>
						<div class="col-md-9 Ws-content-detail-full">
							<div class="single_ticket_panel rightPanel">
								<div class="rightPanelHeader">
									<div class="leftFreeSpace">
										<div class="icon" style="top: 5% !important;"><img src="<?php echo esc_url( EH_CRM_MAIN_IMG . 'message_icon.png' ); ?>"></div>
										<div class="tictxt">
										<p style="margin-top: 5px;font-size: 16px;">
											<?php
											if ( in_array( 'manage_tickets', $access ) ) {
												echo '<input type="text" value="' . esc_attr( $current[0]['ticket_title'] ) . '" id="ticket_title_' . esc_attr( $ticket_id ) . '" class="ticket_title_editable">';
											} else {
												echo esc_html( $current[0]['ticket_title'] );
											}
											?>
										</p>
										<p style="margin-top: 5px;" class="info">
											<i class="glyphicon glyphicon-user"></i> by
											<?php
											if ( 0 != $current[0]['ticket_author'] ) {
												$raiser_obj = new WP_User( $current[0]['ticket_author'] );
												echo '<a href="#" id="ticket_author_' . esc_attr( $ticket_id ) . '" class="ticket_author" onclick="search_by_email(\'' . esc_attr( str_replace( '"', '&quot;', $raiser_obj->user_email ) ) . '\', ' . esc_attr( $ticket_id ) . ')">' . esc_html( $raiser_obj->display_name ) . '</a> ';
											} else {
												echo '<a href="#" id="ticket_author_' . esc_attr( $ticket_id ) . '" class="ticket_author" onclick="search_by_email(\'' . esc_attr( str_replace( '"', '&quot;', $current[0]['ticket_email'] ) ) . '\', ' . esc_attr( $ticket_id ) . ')">' . esc_html( $current[0]['ticket_email'] ) . '</a>';
											}
											if ( in_array( 'manage_tickets', $access ) ) {
												echo '<input type="text" value="' . esc_html( str_replace( '"', '&quot;', $current[0]['ticket_email'] ) ) . '" id="ticket_author_edit_' . esc_attr( $ticket_id ) . '" class="ticket_author_editable" style="display: none">';
												echo '<span id="ticket_author_edit_link_span_' . esc_attr( $ticket_id ) . '">[<a href="#" data-toggle="wsdesk_tooltip" title="' . esc_html__( 'This will edit the requester E-mail address.', 'wsdesk' ) . '" data-container="body" id="' . esc_attr( $ticket_id ) . '" class="ticket_author_edit_link">Edit</a>]</span>';
											}
											?>
											| <i class="glyphicon glyphicon-calendar"></i> <?php echo esc_html( TimestampCaster::cast( $current[0]['ticket_date'], 'ticket_date' ) ); ?>
											| <i class="glyphicon glyphicon-time"></i>
											<?php
											$solved = false;
											$meta   = eh_crm_get_ticketmeta( $ticket_id );

											if ( 'label_LL02' == $meta['ticket_label'] ) {
												$solved = true;
											}
											// Average Total Time for Agent's Solved tickets
											if ( $solved ) {
												$dteDifference = array();

												$latest_reply_id = eh_crm_get_ticket_value_count( 'ticket_category', 'agent_note', true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id' );

												if ( ! $latest_reply_id ) {
													$ticket_time     = $current[0]['ticket_date'];
													$last_reply_time = $current[0]['ticket_date'];
												} else {
													$latest_ticket_reply = eh_crm_get_ticket( array( 'ticket_id' => $latest_reply_id[0]['ticket_id'] ) );
													$ticket_time         = $current[0]['ticket_date'];
													$last_reply_time     = $latest_ticket_reply[0]['ticket_date'];
												}
												esc_html_e( 'Total time ', 'wsdesk' );
												$dteDifference[0] = eh_crm_dateDiffe( $ticket_time, $last_reply_time );
												echo esc_html( $dteDifference[0][0] ) . 'D:' . esc_html( $dteDifference[0][1] ) . 'H:' . esc_html( $dteDifference[0][2] ) . 'M';
											}
											// Average Total Time for Agent's Unsolved tickets
											if ( ! $solved ) {

												$ticket_time = $current[0]['ticket_date'];

												$current_time = gmdate( 'M d, Y H:i:s', time() );
												esc_html_e( 'Total time ', 'wsdesk' );
												$dteDifference[0] = eh_crm_dateDiffe( $ticket_time, $current_time );
												echo esc_html( $dteDifference[0][0] ) . 'D:' . esc_html( $dteDifference[0][1] ) . 'H:' . esc_html( $dteDifference[0][2] ) . 'M';
											}
											$latest_reply_id = eh_crm_get_ticket_value_count( 'ticket_category', 'agent_note', true, 'ticket_parent', $current[0]['ticket_id'], 'ticket_id' );

											$first_reply_time_count = count( $latest_reply_id );
											if ( 0 != $first_reply_time_count && ! eh_crm_get_ticketmeta( $ticket_id, 'wsdesk_first_reply_time' ) ) {
												$first_ticket_reply = eh_crm_get_ticket( array( 'ticket_id' => $latest_reply_id[ $first_reply_time_count - 1 ]['ticket_id'] ) );
												$first_reply_time   = eh_crm_get_formatted_date( $first_ticket_reply[0]['ticket_date'] );
												eh_crm_insert_ticketmeta( $ticket_id, 'wsdesk_first_reply_time', $first_reply_time );
											}
											?>
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
											if ( 'enable' == $woo_orders && in_array( $role, $woo_access ) ) {
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
														$cou          = 0;
														foreach ( $customer_orders as $order ) {
															$order_data = wc_get_order( $order );
															if ( $order_data->get_status() == 'completed' ) {
																$total_amount += $order_data->get_total();
															}
															if ( $cou < 5 ) {
																$order_id_url = ' <a href="' . admin_url( 'post.php?post=' . $order . '&action=edit' ) . '" target="_blank"> #' . $order . '</a>,';
																$cou++;
															}
														}
														echo '<p style="margin-top: 5px;" class="info"><i class="glyphicon glyphicon-shopping-cart"></i> ' . esc_html__( 'Total Orders', 'wsdesk' ) . ' : ' . esc_html( $order_count ) . ' | ' . esc_html__( 'Recent Order', 'wsdesk' ) . ' : [ ' . wp_kses_post( rtrim( $order_id_url, ', ' ) ) . ' ]';
														if ( 'enable' == $woo_price ) {
															echo ' | ' . esc_html__( 'Total Purchase', 'wsdesk' ) . ' : ' . esc_html( get_woocommerce_currency_symbol() . $total_amount . ' ' . get_woocommerce_currency() );
														}
														$first_reply_date = eh_crm_get_ticketmeta( $ticket_id, 'wsdesk_first_reply_time' );
														if ( $first_reply_date ) {
															echo ' | ' . esc_html__( 'First Reply', 'wsdesk' ) . ' : ' . esc_html( $first_reply_date );
														}
														echo '</p>';
													} else {
														?>
															<p style="margin-top: 5px;" class="info">
																<i class="glyphicon glyphicon-shopping-cart"></i> <?php esc_html_e( 'Total Orders', 'wsdesk' ); ?> : 0 | <?php esc_html_e( 'Recent Order', 'wsdesk' ); ?> : <?php esc_html_e( 'None', 'wsdesk' ); ?> | <?php esc_html_e( 'Total Purchase', 'wsdesk' ); ?> :
																<?php
																echo esc_html( get_woocommerce_currency_symbol() . '0 ' . get_woocommerce_currency() );
																$first_reply_date = eh_crm_get_ticketmeta( $ticket_id, 'wsdesk_first_reply_time' );
																if ( $first_reply_date ) {
																	echo ' | ' . esc_html__( 'First Reply', 'wsdesk' ) . ' : ' . esc_html( $first_reply_date );
																}
																?>
															</p>
															<?php

													}
												} else {
													$user_email             = $current[0]['ticket_email'];
													$customer_orders        = wc_get_orders( array( 'email' => $user_email ) );
													$customer_temp_altered  = array();
													$customer_temp_original = array();
													foreach ( $customer_orders as $key => $customer_order ) {
														array_push( $customer_temp_altered, trim( str_replace( ' ', '', $customer_order->get_order_number() ) ) );
														$order_id = $customer_order->get_id();
														array_push( $customer_temp_original, $order_id );
													}
													$customer_orders = $customer_temp_altered;

													if ( ! empty( $customer_orders ) ) {
														$order_id_url = '';
														$total_amount = 0;
														$order_count  = count( $customer_orders );
														$count        = 0;
														$cou          = 0;
														foreach ( $customer_orders as $key => $order ) {
															$order_data = wc_get_order( $customer_temp_original[ $key ] );
															if ( $order_data->get_status() == 'completed' ) {
																$total_amount += $order_data->get_total();
															}
															if ( $cou < 5 ) {
																$order_id_url .= ' <a href="' . admin_url( 'post.php?post=' . $customer_temp_original[ $key ] . '&action=edit' ) . '" target="_blank"> #' . $order . '</a>,';
																$cou++;
															}
														}
														echo '<p style="margin-top: 5px;" class="info"><i class="glyphicon glyphicon-shopping-cart"></i> ' . esc_html__( 'Total Orders', 'wsdesk' ) . ' : ' . esc_html( $order_count ) . ' | ' . esc_html__( 'Recent Order', 'wsdesk' ) . ' : [ ' . wp_kses_post( rtrim( $order_id_url, ', ' ) ) . ' ]';
														if ( 'enable' == $woo_price ) {
															echo ' | ' . esc_html__( 'Total Purchase', 'wsdesk' ) . ' : ' . esc_html( get_woocommerce_currency_symbol() . $total_amount . ' ' . get_woocommerce_currency() );
														}
														$first_reply_date = eh_crm_get_ticketmeta( $ticket_id, 'wsdesk_first_reply_time' );
														if ( $first_reply_date ) {
															echo ' | ' . esc_html__( 'First Reply', 'wsdesk' ) . ' : ' . esc_html( $first_reply_date );
														}
														echo '</p>';
													} else {
														?>
															<p style="margin-top: 5px;" class="info">

																<i class="glyphicon glyphicon-shopping-cart"></i> <?php esc_html_e( 'Total Orders', 'wsdesk' ); ?> : 0 | <?php esc_html_e( 'Recent Order', 'wsdesk' ); ?> : <?php esc_html_e( 'None', 'wsdesk' ); ?> | <?php esc_html_e( 'Total Purchase', 'wsdesk' ); ?> :
															   <?php
																echo esc_html( get_woocommerce_currency_symbol() . '0 ' . get_woocommerce_currency() );
																$first_reply_date = eh_crm_get_ticketmeta( $ticket_id, 'wsdesk_first_reply_time' );
																if ( $first_reply_date ) {
																	echo ' | ' . esc_html__( 'First Reply', 'wsdesk' ) . ' : ' . esc_html( $first_reply_date );
																}
																?>
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
										<div class="icon"><img src="<?php echo esc_url( get_avatar_url( $logged_user->user_email, array( 'size' => 50 ) ) ); ?>" style="border-radius: 25px; width: 50px; "></div>
										<div class="content">
											<div class="message-box">

												<div class="row">
													<div class="col-md-12">
														<div class="widget-area no-padding blank" style="width:100%; word-break: break-word;">
															<div class="status-upload">
															<?php if ( 'enable' == eh_crm_get_settingsmeta( 0, 'auto_suggestion' ) ) { ?>
																<div id="suggestion">
																	<div id="suggestion-form" style='display:none;' class="panel panel-default suggest-form-<?php echo esc_attr( $ticket_id ); ?>">
																		<ul class="suggest_ul">
																			<?php
																			if ( ! empty( $response ) ) {
																				for ( $re = 0;$re < count( $response );$re++ ) {
																					echo '<p class="clickable suggest_li" id="' . esc_attr( $ticket_id ) . '"><span style="color:black;" id="sug_title">' . esc_attr( $response[ $re ]['title'] ) . '</span><br><span style="color:blue;" id="sug_url">' . esc_html( $response[ $re ]['guid'] ) . '</span></p>';
																					if ( count( $response ) != $re + 1 ) {
																						echo '<hr>';
																					}
																				}
																			} else {
																				echo '<p> ' . esc_html__( 'No Suggestions', 'wsdesk' ) . ' </p>';
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
																<div style="width: 100% !important;height: 200px;" class="reply_textarea" id="reply_textarea_<?php echo esc_attr( $ticket_id ); ?>" name="reply_textarea_<?php echo esc_attr( $ticket_id ); ?>"><?php echo wp_kses_post( $signature ); ?></div>
																<div class="form-group">
																	<div class="input-group col-md-12">
																		<span class="btn btn-primary fileinput-button">
																			<i class="glyphicon glyphicon-plus"></i>
																			<span><?php esc_html_e( 'Attachment', 'wsdesk' ); ?></span>
																			<input type="file" name="files" id="files_<?php echo esc_html( $ticket_id ); ?>" class="attachment_reply" multiple="">
																		</span>
																		<div class="btn-group pull-right">
																			<button type="button" class="btn btn-primary dropdown-toggle ticket_reply_action_button_<?php echo esc_html( $ticket_id ); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<?php esc_html_e( 'Submit as', 'wsdesk' ); ?> <span class="caret"></span>
																			</button>
																			<ul class="dropdown-menu">
																			<?php

																			if ( in_array( 'reply_tickets', $access ) ) {

																				for ( $j = 0; $j < count( $avail_labels ); $j++ ) {
																					echo '<li id="' . esc_html( $ticket_id ) . '"><a href="#" class="ticket_reply_action" id="' . esc_attr( $avail_labels[ $j ]['slug'] ) . '">' . esc_html__( 'Submit as', 'wsdesk' ) . ' ' . esc_html( $avail_labels[ $j ]['title'] ) . '</a></li>';
																				}
																			}
																			?>
																				<li role="separator" class="divider"></li>
																				<li id="<?php echo esc_html( $ticket_id ); ?>"><a href="#" class="ticket_reply_action" id="note"><?php esc_html_e( 'Submit as Note', 'wsdesk' ); ?></a></li>
																				<li class="text-center"><small class="text-muted"><?php esc_html_e( 'Notes visible to Agents and Supervisors', 'wsdesk' ); ?></small></li>
																			</ul>
																		  </div>
																		<div class="btn-group pull-right" style="padding: 0px;margin-right: 10px;height: 35px;">
																			<button type="button" class="btn btn-primary dropdown-toggle mulitple_ticket_template_button" data-toggle="dropdown">
																				<span class="glyphicon glyphicon-envelope" style="margin-right:5px;"></span> <?php esc_html_e( 'Select Template', 'wsdesk' ); ?> <span class="caret"></span>
																			</button>
																			<ul class="dropdown-menu list-group dropdown-menu-left" id="template_multiple_actions_single_<?php echo esc_html( $ticket_id ); ?>" style="min-width:250px" role="menu">
																				<li>
																					<div class="template_div asg">
																						<div style="visibility: visible;"></div>
																						<input type="text" class="search_template_single" id="<?php echo esc_attr( $ticket_id ); ?>" placeholder="Search Template">
																						<div class="A0 A0_<?php echo esc_html( $ticket_id ); ?>"><span class="glyphicon glyphicon-search"></span></div>
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
																						echo '<li class="list-group-item available_template available_template_' . esc_attr( $ticket_id ) . ' ' . esc_attr( $avail_templates[ $i ]['slug'] ) . '_li" id="' . esc_attr( $ticket_id ) . '" title="' . esc_attr( $avail_templates[ $i ]['title'] ) . '"> <span style="display: block;" class="truncate multiple_template_action ' . esc_attr( $avail_templates[ $i ]['slug'] ) . '_head" based="single" id="' . esc_attr( $avail_templates[ $i ]['slug'] ) . '">' . esc_html( $avail_templates[ $i ]['title'] ) . '</span></li>';
																					}
																					if ( 6 == $i ) {
																						echo '<li role="separator" class="divider available_template available_template_' . esc_attr( $ticket_id ) . '" style="margin:0px; margin-bottom:5px !important;margin-top: 5px !important;"></li>';
																						echo '<center><a href="#wsdesk-template-wsdesk-popup-3">' . ( count( $avail_templates ) - 6 ) . ' more template' . ( ( count( $avail_templates ) - 6 ) == 1 ? ' is' : 's are' ) . ' there </a></center>';

																					}
																				}
																				?>
																			</ul>
																		</div>
																	</div>
																	<div class="upload_preview_files_<?php echo esc_attr( $ticket_id ); ?>"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
								$reply_id = eh_crm_get_ticket_value_count( 'ticket_parent', $ticket_id, false, '', '', 'ticket_updated', 'DESC' );
								array_push( $reply_id, array( 'ticket_id' => $ticket_id ) );
								if ( EH_CRM_WOO_VENDOR ) {
									$reply_id = eh_crm_get_ticket_value_count( 'ticket_parent', $ticket_id, false, '', '', 'ticket_updated', 'DESC', 'vendor' );
									array_push( $reply_id, array( 'ticket_id' => $ticket_id ) );
								}

								for ( $s = 0;$s < count( $reply_id );$s++ ) {

									$quote      = '';
									$quote_text = '';
									if ( 0 == $s ) {
										$quote      = '<span class="button button-info pull-right quote_button" id="' . $ticket_id . '">' . __( 'Quote', 'wsdesk' ) . '</span>';
										$quote_text = 'id="' . $ticket_id . '_quote_text_ticket_content"';
									}
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
										$replier_name = __( 'Guest', 'wsdesk' );
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
												$attachment .= '<a href="' . $current_att . '" target="_blank"><img class="img-upload clickable" style="width:200px" title="' . $att_name . '" src="' . $current_att . '"></a></p>';
											} else {
												$check_file_ext = array( 'doc', 'docx', 'pdf', 'xml', 'csv', 'xlsx', 'xls', 'txt', 'zip', 'mp3', 'mp4', 'syx', 'cdr', 'bmp', 'ppt', 'pptx', 'bat' );
												if ( in_array( $att_ext, $check_file_ext ) ) {
													$attachment .= '<a href="' . $current_att . '" target="_blank" title="' . $att_name . '" class="img-upload"><div class="' . $att_ext . '"></div></a>';
												} else {
													$attachment .= '<a href="' . $current_att . '" target="_blank" title="' . $att_name . '" class="img-upload"><div class="unknown_type"></div></a>';
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
									echo '<div class="conversation_each" style="' . esc_attr( $color ) . '">
                                                <div class="leftFreeSpace">
                                                <div class="icon"><img  src="' . esc_url( $replier_pic ) . '" style="border-radius: 25px; width: 50px"></div>
                                                <h3>' . esc_html( $replier_name ) . '</h3>
                                                <h4>' . esc_html( $replier_email ) . ' | ' . esc_html( TimestampCaster::cast( $reply_ticket[0]['ticket_date'], 'ticket_date' ) ) . ' </h4>
                                                ' . ( ( 'satisfaction_survey' === $reply_ticket[0]['ticket_category'] ) ? '<b>' . esc_html__( 'Satisfaction Comment', 'wsdesk' ) . '</b><br>' : '' ) . '
                                                <p>';
												// $reply_ticket[0]['ticket_content'] = addslashes( $reply_ticket[0]['ticket_content'] );
												$input_data = ( 'text' != $tickets_display ) ? ( html_entity_decode( $reply_ticket[0]['ticket_content'] ) ) : htmlentities( $reply_ticket[0]['ticket_content'] );

												echo wp_kses_post( eh_crm_collapse_ticket_content( $input_data ) );
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
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div id="wsdesk-template-wsdesk-popup-3" class="wsdesk-overlay">
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
									echo '<li class="list-group-item available_template available_template_' . esc_attr( $ticket_id ) . ' ' . esc_attr( $avail_templates[ $i ]['slug'] ) . '_li" id="' . esc_attr( $ticket_id ) . '" title="' . esc_attr( $avail_templates[ $i ]['title'] ) . '"> <span style="display: block;" class="truncate multiple_template_action ' . esc_attr( $avail_templates[ $i ]['slug'] ) . '_head" based="single" id="' . esc_attr( $avail_templates[ $i ]['slug'] ) . '">' . esc_html( $avail_templates[ $i ]['title'] ) . '</span></li>';
								}
							}
							?>
						</div>
					</div>
				</div>
				<?php

				return ob_get_clean();
	}

	public static function eh_crm_ticket_single_save_props() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id       = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : null;
			$assignee        = ( ( isset( $_POST['assignee'] ) ? sanitize_text_field( $_POST['assignee'] ) : null !== '' ) ? explode( ',', sanitize_text_field( $_POST['assignee'] ) ) : array() );
			$tags            = ( ( isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : null !== '' ) ? explode( ',', isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : null ) : array() );
			$cc              = isset( $_POST['cc'] ) ? sanitize_text_field( $_POST['cc'] ) : '';
			$bcc             = ( ( isset( $_POST['bcc'] ) ? sanitize_text_field( $_POST['bcc'] ) : null !== '' ) ? explode( ',', isset( $_POST['bcc'] ) ? sanitize_text_field( $_POST['bcc'] ) : null ) : array() );
			$ticket_order_id = isset( $_POST['ticket_order_id'] ) ? sanitize_text_field( $_POST['ticket_order_id'] ) : false;
			$input           = json_decode( isset( $_POST['input'] ) ? stripslashes( sanitize_text_field( $_POST['input'] ) ) : null, true );
			eh_crm_update_ticketmeta( $ticket_id, 'ticket_assignee', $assignee );
			eh_crm_update_ticketmeta( $ticket_id, 'ticket_tags', $tags );
			eh_crm_update_ticketmeta( $ticket_id, 'ticket_cc', explode( ',', $cc ), false );
			eh_crm_update_ticketmeta( $ticket_id, 'ticket_bcc', $bcc, false );
			if ( $ticket_order_id ) {
				eh_crm_update_ticketmeta( $ticket_id, 'pfs_order_product', $ticket_order_id );
			}
			foreach ( $input as $key => $value ) {
				if ( 'woo_vendors' == $key ) {
					$vendor = str_replace( 'v_', '', $value );
					eh_crm_update_ticket( $ticket_id, array( 'ticket_vendor' => $vendor ) );
				}
				eh_crm_update_ticketmeta( $ticket_id, $key, $value, false );
			}
		}
		$content_html = self::eh_crm_ticket_single_view_gen( $ticket_id );
		$tab          = self::eh_crm_ticket_single_view_gen_head( $ticket_id );
		die(
			wp_json_encode(
				array(
					'tab_head'    => $tab,
					'tab_content' => $content_html,
				)
			)
		);
	}

	public static function eh_crm_ticket_single_delete() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$ticket_id = isset( $_POST['ticket_id'] ) ? sanitize_text_field( $_POST['ticket_id'] ) : '';
			$child     = eh_crm_get_ticket_value_count( 'ticket_parent', $ticket_id );
			for ( $i = 0;$i < count( $child );$i++ ) {
				eh_crm_trash_ticket( $child[ $i ]['ticket_id'] );
			}
			eh_crm_trash_ticket( $ticket_id );
		}
	}

	public static function eh_crm_ticket_multiple_delete() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$repo    = new \WSDesk\Tickets\TicketRepository();
			$filters = $_POST;
			if ( isset( $_post['tickets_id'] ) ) {
				$filters['ticket_id'] = isset( $_POST['tickets_id'] ) ? sanitize_text_field( $_POST['tickets_id'] ) : '';
				$tickets_id           = isset( $_POST['tickets_id'] ) ? sanitize_text_field( $_POST['tickets_id'] ) : '';
			}
			$query = $repo->applyFilter( $filters );

			$res['no_of_rows'] = $query->update( array( 'ticket_trash' => 1 ) );

			die( json_encode( $res ) );

			// No need to delete ticket one by one
			// Note: There is no action is triggered on trash
			for ( $i = 0;$i < count( $tickets_id );$i++ ) {
				$child = eh_crm_get_ticket_value_count( 'ticket_parent', $tickets_id[ $i ] );
				for ( $j = 0;$j < count( $child );$j++ ) {
					eh_crm_trash_ticket( $child[ $j ]['ticket_id'] );
				}
				eh_crm_trash_ticket( $tickets_id[ $i ] );
			}
		}
	}

	public static function eh_crm_settings_empty_scheduled_actions() {
		delete_option( 'wsdesk_scheduled_triggers', '' );
		die( json_encode( array( 'result' => 'success' ) ) );
	}

	public static function eh_crm_settings_empty_trash() {
		set_time_limit( 300 );
		global $wpdb;
		$table      = $wpdb->prefix . 'wsdesk_tickets';
		$tickets_id = $wpdb->get_results( $wpdb->prepare( 'SELECT ticket_id FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_trash = 1 AND ticket_parent=0' ), ARRAY_A );
		if ( ! $tickets_id ) {
			die(
				json_encode(
					array(
						'result' => 'failed',
						'alert'  => __(
							'No tickets in trash',
							'wsdesk'
						),
					)
				)
			);
		}
		for ( $i = 0;$i < count( $tickets_id );$i++ ) {
			$child = $wpdb->get_results( $wpdb->prepare( 'SELECT ticket_id FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_parent=%d', $tickets_id[ $i ]['ticket_id'] ), ARRAY_A );
			for ( $j = 0;$j < count( $child );$j++ ) {
				eh_crm_delete_ticket( $child[ $j ]['ticket_id'] );
			}
			eh_crm_delete_ticket( $tickets_id[ $i ]['ticket_id'] );
		}
		die( json_encode( array( 'result' => 'success' ) ) );
	}

	public static function eh_crm_settings_restore_trash() {
		set_time_limit( 300 );
		global $wpdb;
		$table      = $wpdb->prefix . 'wsdesk_tickets';
		$tickets_id = $wpdb->get_results( $wpdb->prepare( 'SELECT ticket_id FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_trash = 1 AND ticket_parent=0' ), ARRAY_A );
		if ( ! $tickets_id ) {
			die(
				json_encode(
					array(
						'result' => 'failed',
						'alert'  => __(
							'No tickets in trash',
							'wsdesk'
						),
					)
				)
			);
		}
		for ( $i = 0;$i < count( $tickets_id );$i++ ) {
			$child = $wpdb->get_results( $wpdb->prepare( 'SELECT ticket_id FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_parent=%d', $tickets_id[ $i ]['ticket_id'] ), ARRAY_A );
			for ( $j = 0;$j < count( $child );$j++ ) {
				eh_crm_restore_trash_ticket( $child[ $j ]['ticket_id'] );
			}
			eh_crm_restore_trash_ticket( $tickets_id[ $i ]['ticket_id'] );
		}
		die( json_encode( array( 'result' => 'success' ) ) );
	}

	public static function eh_crm_export_ticket_data() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$start_date = date_create( isset( $_POST['export_start_date'] ) ? sanitize_text_field( $_POST['export_start_date'] ) : null );
			$end_date   = date_create( isset( $_POST['export_end_date'] ) ? sanitize_text_field( $_POST['export_end_date'] ) : null );
			if ( ! $end_date ) {
				$end_date = time();
			}
			$filters = array(
				'length' => 10000,
			);

			if ( isset( $_POST['export_start_date'] ) || isset( $_POST['export_end_date'] ) ) {
				$filters = array(
					'created_at' => array(
						$start_date->format( 'Y-m-d' ),
						$end_date->format( 'Y-m-d' ),
					),
					'length'     => 10000,
				);
			}

			$tickets_data = ( new TicketRepository() )->get( $filters );

			$args         = array( 'type' => 'label' );
			$fields       = array( 'slug', 'title', 'settings_id' );
			$avail_labels = eh_crm_get_settings( $args, $fields );

			$args         = array( 'type' => 'field' );
			$fields       = array( 'slug', 'title', 'settings_id' );
			$avail_fields = eh_crm_get_settings( $args, $fields );
			$selected     = eh_crm_get_settingsmeta( 0, 'selected_fields' );

			if ( empty( $selected ) ) {
				$selected = array();
			}

			$avail_fields = array_filter(
				$avail_fields,
				function ( $value ) use ( $selected ) {
					if ( 'request_email' != $value['slug'] && 'request_title' != $value['slug'] && 'request_description' != $value['slug'] && 'google_captcha' !== $value['slug'] ) {
						return in_array( $value['slug'], $selected, true );
					}

				return true;
				}
			);

			$args       = array( 'type' => 'tag' );
			$fields     = array( 'slug', 'title', 'settings_id' );
			$avail_tags = eh_crm_get_settings( $args, $fields );

			$first_row = array(
				__( 'Ticket ID', 'wsdesk' ),
				__( 'Requester E-mail', 'wsdesk' ),
				__( 'Subject', 'wsdesk' ),
				__( 'Content', 'wsdesk' ),
				__( 'Status', 'wsdesk' ),
				__( 'Date', 'wsdesk' ),
				__( 'Last Updated', 'wsdesk' ),
				__( 'Satisfaction Rating', 'wsdesk' ),
				__( 'Tags', 'wsdesk' ),
				__( 'Assignee', 'wsdesk' ),
			);
			foreach ( $avail_fields as $value ) {
				$field_meta = eh_crm_get_settingsmeta( $value['settings_id'] );
				if ( 'request_email' != $value['slug'] && 'request_title' != $value['slug'] && 'request_description' != $value['slug'] && 'file' !== $field_meta['field_type'] && 'google_captcha' !== $value['slug'] ) {
					array_push( $first_row, $value['title'] );
				}
			}
			$uploads  = wp_upload_dir();
			$basename = 'export_ticket_data-' . time() . '.csv';
			$filename = $uploads['path'] . '/' . $basename;
			nocache_headers();
			header( 'Content-Type: application/csv' );
			header( 'Content-Disposition: attachment; filename="' . $basename . '.csv"' );
			$file = fopen( $filename, 'w' );
			fputcsv( $file, $first_row );
			for ( $i = 0; $i < count( $tickets_data ); $i++ ) {
				$new_row          = array();
					$current_meta = eh_crm_get_ticketmeta( $tickets_data[ $i ]['ticket_id'] );

					// get the label name
				foreach ( $avail_labels as $value ) {
					if ( $value['slug'] == $current_meta['ticket_label'] ) {
						$label = $value['title'];
						break;
					}
				}

					// get the satisfaction rating
				if ( isset( $current_meta['ticket_rating'] ) ) {
					$satisfaction_survey = __( ucfirst( $current_meta['ticket_rating'] ), 'wsdesk' );
				} else {
					$satisfaction_survey = '-';
				}

					// get the tag names
					$tags                        = array();
					$current_meta['ticket_tags'] = maybe_unserialize( $current_meta['ticket_tags'] );
				if ( is_array( $current_meta['ticket_tags'] ) ) {
					foreach ( $avail_tags as $value ) {
						if ( in_array( $value['slug'], $current_meta['ticket_tags'] ) ) {
							array_push( $tags, $value['title'] );
						}
					}
				}
					$tags = implode( ', ', $tags );

					// get assignee names
					$assignees = $tickets_data[ $i ]['assignees'];
					/* foreach ( $current_meta['ticket_assignee'] as $value ) {
						$user = get_user_by( 'id', $value );
						if ( ! empty( $user ) ) {
							array_push( $assignees, $user->display_name );
						}
					} */
					$assignees = implode( ', ', $assignees );

					$new_row = array(
						$tickets_data[ $i ]['ticket_id'],
						$tickets_data[ $i ]['ticket_email'],
						$tickets_data[ $i ]['ticket_title'],
						addcslashes( $tickets_data[ $i ]['ticket_content'], "\0..\37!@\177..\377" ),
						$label,
						$tickets_data[ $i ]['ticket_date'],
						gmdate( 'M d, Y h:i:s A', ( strtotime( $tickets_data[ $i ]['ticket_updated'] ) ) ),
						$satisfaction_survey,
						$tags,
						$assignees,
					);
					foreach ( $avail_fields as $value ) {
						if ( 'request_email' != $value['slug'] && 'request_title' != $value['slug'] && 'request_description' != $value['slug'] ) {
							$field_meta = eh_crm_get_settingsmeta( $value['settings_id'] );
							if ( ! isset( $current_meta[ $value['slug'] ] ) ) {
								$current_meta[ $value['slug'] ] = '-';
							}
							if ( '' == $current_meta[ $value['slug'] ] ) {
								$current_meta[ $value['slug'] ] = '-';
							}
							switch ( $field_meta['field_type'] ) {
								case 'text':
								case 'number':
								case 'email':
								case 'password':
								case 'textarea':
								case 'date':
								case 'ip':
								case 'phone':
									array_push( $new_row, stripslashes( $current_meta[ $value['slug'] ] ) );
									break;
								case 'select':
									if ( 'woo_order_id' == $value['slug'] ) {
										array_push( $new_row, $current_meta[ $value['slug'] ] );
									} else {
										array_push( $new_row, $field_meta['field_values'][ $current_meta[ $value['slug'] ] ] );
									}
									break;
								case 'radio':
								case 'woo_product':
								case 'woo_category':
								case 'woo_tags':
								case 'woo_vendors':
									array_push( $new_row, $field_meta['field_values'][ $current_meta[ $value['slug'] ] ] );
									break;
								case 'checkbox':
									$checkbox_values = array();
									foreach ( $current_meta[ $value['slug'] ] as $a ) {
										array_push( $checkbox_values, $field_meta['field_values'][ $a ] );
									}
									array_push( $new_row, implode( ', ', $checkbox_values ) );
									break;
							}
						}
					}
					fputcsv( $file, $new_row );
			}
			fclose( $file );
			$read_stream = fopen( $filename, 'r' );
			fpassthru( $read_stream );
			wp_delete_file( $filename );

			die();
		}
	}

	public static function eh_crm_ticket_refresh_left_bar() {
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
			$user_id_agent         = get_current_user_id();
			$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
			$user_id_agent_role    = $user_id_agent_details->roles;
			$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );

			$lite_mode                    = true;
			$wsdesk_mode                  = eh_crm_get_settingsmeta( '0', 'wsdesk_mode' );
			$lite_mode_display_quick_view = '';
			$refresh_ticket_page          = '';
			if ( 'lite' == $wsdesk_mode ) {
				$refresh_ticket_page          = eh_crm_get_settingsmeta( '0', 'refresh_ticket_page' );
				$lite_mode_display_quick_view = eh_crm_get_settingsmeta( '0', 'quick_view_tickets' );
				$ticket_count_view            = eh_crm_get_settingsmeta( '0', 'ticket_count_view' );
				if ( 'ticket_count_view' == $ticket_count_view ) {
					$lite_mode = false;
				}
			}if ( 'insane' == $wsdesk_mode ) {
				$refresh_ticket_page          = 'enable';
				$lite_mode_display_quick_view = 'enable';
				$ticket_count_view            = 'enable';
				$lite_mode                    = false;
			}
			?>
				<input type="hidden" id="wsdesk_setup_mode" value="<?php echo( esc_html( $refresh_ticket_page ) ); ?>">
				<?php
				if ( $lite_mode ) {
					if ( 'enable' != $allow_agent_tickets ) {
						if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
							$total_ticket_count = eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $user_id_agent, 'ticket_id' );
						} else {
							$total_ticket_count = eh_crm_get_ticket_value_count( 'ticket_parent', 0 );
						}
					} else {
						$total_ticket_count = eh_crm_get_ticket_value_count( 'ticket_parent', 0 );
					}
					$total_ticket_count_display = count( $total_ticket_count );
				} else {
					if ( 'all' == $active ) {
						$total_ticket_count_display = count( eh_crm_get_ticket_value_count( 'ticket_parent', 0 ) );
					} else {
						$total_ticket_count_display = '';
					}
				}
				?>
					<ul class="nav nav-pills nav-stacked side-bar-filter" id="all_section">
						<li class="<?php echo ( ( 'all' == $active ) ? 'active' : '' ); ?>">
							<a href="#" id="all">
								<span class="badge pull-right"><?php echo esc_html( $total_ticket_count_display ); ?></span>
								<?php esc_html_e( 'All Tickets', 'wsdesk' ); ?>
							</a>
						</li>
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
									<span id="labels_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo ( $labels_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('labels');"></span>
									<span id="labels_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo ( $labels_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('labels');">
								</h4>
								<ul class="nav nav-pills nav-stacked side-bar-filter" id="labels" <?php echo ( $labels_collapsed ) ? "style='display: none;'" : ''; ?> >
								<?php
								for ( $i = 0; $i < count( $avail_labels ); $i++ ) {
									$label_color = eh_crm_get_settingsmeta( $avail_labels[ $i ]['settings_id'], 'label_color' );
									if ( $lite_mode ) {
										$current_label_count = eh_crm_get_ticketmeta_value_count( 'ticket_label', $avail_labels[ $i ]['slug'] );

										if ( 'enable' != $allow_agent_tickets ) {
											if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
												$data_to_be_display  = $current_label_count;
												$current_label_count = array();
												foreach ( $total_ticket_count as $key => $value ) {
													if ( in_array( $value, $data_to_be_display ) ) {
														$current_label_count[] = $value;
													}
												}
											}
										}
										$current_label_count = count( $current_label_count );
									} else {

										if ( $active == $avail_labels[ $i ]['slug'] ) {
											$current_label_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_label', $avail_labels[ $i ]['slug'] ) );
										} else {
											$current_label_count = '';
										}
									}

									echo '<li class="' . ( ( $active == $avail_labels[ $i ]['slug'] ) ? 'active' : '' ) . '"><a href="#" id="' . esc_attr( $avail_labels[ $i ]['slug'] ) . '"><span class="badge pull-right" style="background-color:' . esc_html( $label_color ) . ' !important;">' . esc_html( $current_label_count ) . '</span> ' . esc_html( $avail_labels[ $i ]['title'] ) . ' </a></li>';
								}
								?>
								</ul>
								<?php
							break;
						case 'agents_view':
							if ( ! empty( $users_data ) ) {
								$agents_collapsed = false;
								if ( in_array( 'agents', $collapsed_views ) ) {
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
										<span id="agents_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo ( $agents_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('agents');"></span>
										<span id="agents_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo ( $agents_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('agents');">
									</h4>
									<ul class="nav nav-pills nav-stacked side-bar-filter" id="agents" <?php echo ( $agents_collapsed ) ? "style='display: none;'" : ''; ?> >
									<?php
										$user_id_agent         = get_current_user_id();
										$user_id_agent_details = get_user_by( 'ID', $user_id_agent );
										$user_id_agent_role    = $user_id_agent_details->roles;
										$allow_agent_tickets   = eh_crm_get_settingsmeta( '0', 'allow_agent_tickets' );
									if ( 'enable' != $allow_agent_tickets ) {
										if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
											for ( $i = 0; $i < count( $users_data ); $i++ ) {
												if ( $user_id_agent == $users_data[ $i ]['id'] ) {
													if ( $lite_mode ) {
														$current_agent_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $users_data[ $i ]['id'] ) );
													} else {
														if ( $active == $users_data[ $i ]['id'] ) {
															$current_agent_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $users_data[ $i ]['id'] ) );
														} else {
															$current_agent_count = '';
														}
													}
													echo '<li class="' . ( ( $active == $users_data[ $i ]['id'] ) ? 'active' : '' ) . '"><a href="#" id="' . esc_attr( $users_data[ $i ]['id'] ) . '"><span class="badge pull-right">' . esc_html( $current_agent_count ) . '</span> ' . esc_html( $users_data[ $i ]['name'] ) . ' </a></li>';
												}
											}
										} else {
											for ( $i = 0; $i < count( $users_data ); $i++ ) {
												if ( $lite_mode ) {
													$current_agent_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $users_data[ $i ]['id'] ) );
												} else {
													if ( $active == $users_data[ $i ]['id'] ) {
														$current_agent_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $users_data[ $i ]['id'] ) );
													} else {
														$current_agent_count = '';
													}
												}
												echo '<li class="' . ( ( $active == $users_data[ $i ]['id'] ) ? 'active' : '' ) . '"><a href="#" id="' . esc_attr( $users_data[ $i ]['id'] ) . '"><span class="badge pull-right">' . esc_html( $current_agent_count ) . '</span> ' . esc_html( $users_data[ $i ]['name'] ) . ' </a></li>';
											}
										}
									} else {
										for ( $i = 0; $i < count( $users_data ); $i++ ) {
											if ( $lite_mode ) {
														$current_agent_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $users_data[ $i ]['id'] ) );
											} else {
												if ( $active == $users_data[ $i ]['id'] ) {
													$current_agent_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', $users_data[ $i ]['id'] ) );
												} else {
													$current_agent_count = '';
												}
											}
												echo '<li class="' . ( ( $active == $users_data[ $i ]['id'] ) ? 'active' : '' ) . '"><a href="#" id="' . esc_attr( $users_data[ $i ]['id'] ) . '"><span class="badge pull-right">' . esc_html( $current_agent_count ) . '</span> ' . esc_html( $users_data[ $i ]['name'] ) . ' </a></li>';
										}
									}
									if ( $lite_mode ) {
										$current_agent_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', array() ) );
									} else {
										if ( 'unassigned' == $active ) {
											$current_agent_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_assignee', array() ) );
										} else {
											$current_agent_count = '';
										}
									}
									?>
										<li class="<?php echo ( ( 'unassigned' == $active ) ? 'active' : '' ); ?>"><a href="#" id="unassigned"><span class="badge pull-right"><?php echo esc_html( $current_agent_count ); ?></span> <?php esc_html_e( 'Unassigned', 'wsdesk' ); ?> </a></li>
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
										<span id="tags_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo ( $tags_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('tags');"></span>
										<span id="tags_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo ( $tags_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('tags');">
									</h4>
									<ul class="nav nav-pills nav-stacked side-bar-filter" id="tags" <?php echo ( $tags_collapsed ) ? "style='display: none;'" : ''; ?> >
									<?php
									for ( $i = 0; $i < count( $avail_tags ); $i++ ) {

										if ( $lite_mode ) {
											$current_tags_count = eh_crm_get_ticketmeta_value_count( 'ticket_tags', $avail_tags[ $i ]['slug'] );

											if ( 'enable' != $allow_agent_tickets ) {
												if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
													$data_to_be_display = $current_tags_count;
													$current_tags_count = array();
													foreach ( $total_ticket_count as $key => $value ) {
														if ( in_array( $value, $data_to_be_display ) ) {
																$current_tags_count[] = $value;
														}
													}
												}
											}
											$current_tags_count = count( $current_tags_count );

										} else {
											if ( $active == $avail_tags[ $i ]['slug'] ) {
												$current_tags_count = count( eh_crm_get_ticketmeta_value_count( 'ticket_tags', $avail_tags[ $i ]['slug'] ) );
											} else {
												$current_tags_count = '';
											}
										}

										echo '<li class="' . ( ( $active == $avail_tags[ $i ]['slug'] ) ? 'active' : '' ) . '"><a href="#" id="' . esc_attr( $avail_tags[ $i ]['slug'] ) . '"><span class="badge pull-right">' . esc_html( $current_tags_count ) . '</span> ' . esc_html( $avail_tags[ $i ]['title'] ) . ' </a></li>';
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
									<span id="users_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo ( $users_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('users');"></span>
									<span id="users_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo ( $users_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('users');">
									</h4>
								</h4>
								<ul class="nav nav-pills nav-stacked side-bar-filter" id="users" <?php echo ( $users_collapsed ) ? "style='display: none;'" : ''; ?> >
								<?php

								if ( $lite_mode ) {
									$registered_count = eh_crm_get_ticket_value_count( 'ticket_author', 0, true, 'ticket_parent', 0 );

									if ( 'enable' != $allow_agent_tickets ) {
										if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
											$data_to_be_display = $registered_count;
											$registered_count   = array();
											foreach ( $total_ticket_count as $key => $value ) {
												if ( in_array( $value, $data_to_be_display ) ) {
														$registered_count[] = $value;
												}
											}
										}
									}
									$guest_count = eh_crm_get_ticket_value_count( 'ticket_author', 0, false, 'ticket_parent', 0 );
									if ( 'enable' != $allow_agent_tickets ) {
										if ( in_array( 'WSDesk_Agents', $user_id_agent_role ) ) {
											$data_to_be_display = $guest_count;
											$guest_count        = array();
											foreach ( $total_ticket_count as $key => $value ) {
												if ( in_array( $value, $data_to_be_display ) ) {
															$guest_count[] = $value;
												}
											}
										}
									}
									$registered_count = count( $registered_count );
									$guest_count      = count( $guest_count );

								} else {
									if ( 'registeredU' == $active ) {
										$registered_count = count( eh_crm_get_ticket_value_count( 'ticket_author', 0, true, 'ticket_parent', 0 ) );
									} else {
										$registered_count = '';
									}
									if ( 'guestU' == $active ) {
										$guest_count = count( eh_crm_get_ticket_value_count( 'ticket_author', 0, false, 'ticket_parent', 0 ) );
									} else {
										$guest_count = '';
									}
								}

									echo '<li class="' . ( ( 'registeredU' == $active ) ? 'active' : '' ) . '"><a href="#" id="registeredU" class="user_section"><span class="badge pull-right">' . esc_html( $registered_count ) . '</span> ' . esc_html__( 'Registered Users', 'wsdesk' ) . ' </a></li>';

									echo '<li class="' . ( ( 'guestU' == $active ) ? 'active' : '' ) . '"><a href="#" id="guestU" class="user_section"><span class="badge pull-right">' . esc_html( $guest_count ) . '</span> ' . esc_html__( 'Guest Users', 'wsdesk' ) . ' </a></li>';
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
								if ( $lite_mode ) {
									$view_count = count( eh_crm_get_view_tickets( $view ) );
								} else {
									if ( $active == $view ) {
										$view_count = count( eh_crm_get_view_tickets( $view ) );
									} else {
										$view_count = '';
									}
								}

								$view_html .= '<ul class="nav nav-pills nav-stacked side-bar-filter" id="views"';
								$view_html .= ( $views_collapsed ) ? ' style="display: none;" ' : '';
								$view_html .= '><li class="' . ( ( $active == $view ) ? 'active' : '' ) . '"><a href="#" id="' . $view . '"><span class="badge pull-right">' . $view_count . '</span> ' . $view_set[0]['title'] . ' </a></li>
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
							<span id="views_collapse" class="glyphicon glyphicon-chevron-up" style="float:right; <?php echo ( $views_collapsed ) ? 'display: none;' : ''; ?>" onclick="collapse('views');"></span>
							<span id="views_drop" class="glyphicon glyphicon-chevron-down" style="float:right; <?php echo ( $views_collapsed ) ? '' : 'display: none;'; ?>" onclick="drop('views');">
						</h4>
					<?php
				}
				$content = ob_get_clean();
				wp_send_json_success( array( 'page' => $content ) );
				die;
		}
	}
}
