<?php

use WSDesk\Settings\SettingsRepository;

class CRM_Ajax_One {

	public static function eh_crm_refresh_tickets_count() {
		$default = eh_crm_get_settingsmeta( 0, 'default_label' );
		$tickets = eh_crm_get_ticketmeta_value_count( 'ticket_label', $default );
		die( json_encode( array( 'data' => count( $tickets ) ) ) );
	}

	public static function eh_crm_ticket_general() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$default_assignee                = isset( $_POST['default_assignee'] ) ? sanitize_text_field( $_POST['default_assignee'] ) : '';
			$default_label                   = isset( $_POST['default_label'] ) ? sanitize_text_field( $_POST['default_label'] ) : '';
			$ticket_raiser                   = isset( $_POST['ticket_raiser'] ) ? sanitize_text_field( $_POST['ticket_raiser'] ) : '';
			$auto_assign                     = isset( $_POST['auto_assign'] ) ? sanitize_text_field( $_POST['auto_assign'] ) : '';
			$scheduled_triggers_time         = isset( $_POST['scheduled_triggers_time'] ) ? sanitize_text_field( $_POST['scheduled_triggers_time'] ) : '';
			$scheduled_triggers_enable       = isset( $_POST['scheduled_triggers_enable'] ) ? sanitize_text_field( $_POST['scheduled_triggers_enable'] ) : '';
			$display_default_status_count    = isset( $_POST['display_default_status_count'] ) ? sanitize_text_field( $_POST['display_default_status_count'] ) : '';
			$allow_agent_tickets             = isset( $_POST['allow_agent_tickets'] ) ? sanitize_text_field( $_POST['allow_agent_tickets'] ) : '';
			$auto_suggestion                 = isset( $_POST['auto_suggestion'] ) ? sanitize_text_field( $_POST['auto_suggestion'] ) : '';
			$show_excerpt_in_auto_suggestion = isset( $_POST['show_excerpt_in_auto_suggestion'] ) ? sanitize_text_field( $_POST['show_excerpt_in_auto_suggestion'] ) : '';
			$auto_create_user                = isset( $_POST['auto_create_user'] ) ? sanitize_text_field( $_POST['auto_create_user'] ) : '';
			$ticket_rows                     = isset( $_POST['ticket_rows'] ) ? sanitize_text_field( $_POST['ticket_rows'] ) : '';
			$custom_attachment               = isset( $_POST['custom_attachment'] ) ? sanitize_text_field( $_POST['custom_attachment'] ) : '';
			$custom_attachment_path          = isset( $_POST['custom_attachment_path'] ) ? sanitize_text_field( $_POST['custom_attachment_path'] ) : '';
			$max_file_size                   = isset( $_POST['max_file_size'] ) ? sanitize_text_field( $_POST['max_file_size'] ) : '';
			$tickets_display                 = isset( $_POST['tickets_display'] ) ? sanitize_text_field( $_POST['tickets_display'] ) : '';
			$ext                             = isset( $_POST['ext'] ) ? sanitize_text_field( $_POST['ext'] ) : '';
			$enable_api                      = isset( $_POST['enable_api'] ) ? sanitize_text_field( $_POST['enable_api'] ) : '';
			$api_key                         = isset( $_POST['api_key'] ) ? sanitize_text_field( $_POST['api_key'] ) : '';
			$default_deep_link               = isset( $_POST['default_deep_link'] ) ? sanitize_text_field( $_POST['default_deep_link'] ) : '';
			$close_tickets                   = isset( $_POST['close_tickets'] ) ? sanitize_text_field( $_POST['close_tickets'] ) : '';
			$debug_status                    = isset( $_POST['debug_status'] ) ? sanitize_text_field( $_POST['debug_status'] ) : '';
			$wsdesk_powered_by_status        = isset( $_POST['wsdesk_powered_by_status'] ) ? sanitize_text_field( $_POST['wsdesk_powered_by_status'] ) : '';
			$linkify_urls                    = isset( $_POST['linkify_urls'] ) ? sanitize_text_field( $_POST['linkify_urls'] ) : '';
			$ticket_display_hyperlink        = isset( $_POST['ticket_display_hyperlink'] ) ? sanitize_text_field( $_POST['ticket_display_hyperlink'] ) : '';
			$wsdesk_mode                     = isset( $_POST['wsdesk_mode'] ) ? sanitize_text_field( $_POST['wsdesk_mode'] ) : '';
			$ticket_count_view               = isset( $_POST['ticket_count_view'] ) ? sanitize_text_field( $_POST['ticket_count_view'] ) : '';
			$quick_view_tickets              = isset( $_POST['quick_view_tickets'] ) ? sanitize_text_field( $_POST['quick_view_tickets'] ) : '';
			$refresh_ticket_page             = isset( $_POST['refresh_ticket_page'] ) ? sanitize_text_field( $_POST['refresh_ticket_page'] ) : '';
			$pre_scheduled_triggers_time     = eh_crm_get_settingsmeta( '0', 'scheduled_triggers_time' );

			if ( ! empty( $pre_scheduled_triggers_time ) && $pre_scheduled_triggers_time != $scheduled_triggers_time ) {
				$next_trigger_time = current_time( 'timestamp' ) + ( 3600 * $pre_scheduled_triggers_time );
				update_option( 'elex_last_scheduled_time', $next_trigger_time );
			}

			eh_crm_update_settingsmeta( '0', 'wsdesk_mode', $wsdesk_mode );
			eh_crm_update_settingsmeta( '0', 'scheduled_triggers_enable', $scheduled_triggers_enable );
			eh_crm_update_settingsmeta( '0', 'scheduled_triggers_time', $scheduled_triggers_time );
			eh_crm_update_settingsmeta( '0', 'ticket_count_view', $ticket_count_view );
			eh_crm_update_settingsmeta( '0', 'quick_view_tickets', $quick_view_tickets );
			eh_crm_update_settingsmeta( '0', 'refresh_ticket_page', $refresh_ticket_page );
			eh_crm_update_settingsmeta( '0', 'default_assignee', $default_assignee );
			eh_crm_update_settingsmeta( '0', 'default_label', $default_label );
			eh_crm_update_settingsmeta( '0', 'ticket_raiser', $ticket_raiser );
			eh_crm_update_settingsmeta( '0', 'auto_assign', $auto_assign );
			eh_crm_update_settingsmeta( '0', 'display_default_status_count', $display_default_status_count );
			eh_crm_update_settingsmeta( '0', 'auto_suggestion', $auto_suggestion );
			eh_crm_update_settingsmeta( '0', 'show_excerpt_in_auto_suggestion', $show_excerpt_in_auto_suggestion );
			eh_crm_update_settingsmeta( '0', 'auto_create_user', $auto_create_user );
			eh_crm_update_settingsmeta( '0', 'ticket_rows', $ticket_rows );
			eh_crm_update_settingsmeta( '0', 'custom_attachment_folder_enable', $custom_attachment );
			eh_crm_update_settingsmeta( '0', 'custom_attachment_folder_path', $custom_attachment_path );
			eh_crm_update_settingsmeta( '0', 'valid_file_extension', $ext );
			eh_crm_update_settingsmeta( '0', 'max_file_size', $max_file_size );
			eh_crm_update_settingsmeta( '0', 'enable_api', $enable_api );
			eh_crm_update_settingsmeta( '0', 'tickets_display', $tickets_display );
			eh_crm_update_settingsmeta( '0', 'api_key', $api_key );
			eh_crm_update_settingsmeta( '0', 'default_deep_link', $default_deep_link );
			eh_crm_update_settingsmeta( '0', 'close_tickets', $close_tickets );
			eh_crm_update_settingsmeta( '0', 'wsdesk_debug_status', $debug_status );
			eh_crm_update_settingsmeta( '0', 'wsdesk_powered_by_status', $wsdesk_powered_by_status );
			eh_crm_update_settingsmeta( '0', 'allow_agent_tickets', $allow_agent_tickets );
			eh_crm_update_settingsmeta( '0', 'linkify_urls', $linkify_urls );
			eh_crm_update_settingsmeta( '0', 'satisfaction_hyper_link', $ticket_display_hyperlink );
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_general.php';
			$my_html = ob_get_clean();
			wp_send_json_success( array( 'page' => $my_html ) );
			die;
		}

	}

	public static function eh_crm_ticket_appearance() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$input_width                      = isset( $_POST['input_width'] ) ? sanitize_text_field( $_POST['input_width'] ) : '';
			$main_ticket_title                = isset( $_POST['main_ticket_title'] ) ? sanitize_text_field( $_POST['main_ticket_title'] ) : '';
			$new_ticket_title                 = isset( $_POST['new_ticket_title'] ) ? sanitize_text_field( $_POST['new_ticket_title'] ) : '';
			$existing_ticket_title            = isset( $_POST['existing_ticket_title'] ) ? sanitize_text_field( $_POST['existing_ticket_title'] ) : '';
			$submit_ticket_button             = isset( $_POST['submit_ticket_button'] ) ? sanitize_text_field( $_POST['submit_ticket_button'] ) : '';
			$reset_ticket_button              = isset( $_POST['reset_ticket_button'] ) ? sanitize_text_field( $_POST['reset_ticket_button'] ) : '';
			$existing_ticket_button           = isset( $_POST['existing_ticket_button'] ) ? sanitize_text_field( $_POST['existing_ticket_button'] ) : '';
			$purchase_credit_redirect_url     = isset( $_POST['purchase_credit_redirect_url'] ) ? sanitize_text_field( $_POST['purchase_credit_redirect_url'] ) : '';
			$set_credit_limit                 = isset( $_POST['set_credit_limit'] ) ? sanitize_text_field( $_POST['set_credit_limit'] ) : '';
			$login_redirect_url               = isset( $_POST['login_redirect_url'] ) ? sanitize_text_field( $_POST['login_redirect_url'] ) : '';
			$logout_redirect_url              = isset( $_POST['logout_redirect_url'] ) ? sanitize_text_field( $_POST['logout_redirect_url'] ) : '';
			$register_redirect_url            = isset( $_POST['register_redirect_url'] ) ? sanitize_text_field( $_POST['register_redirect_url'] ) : '';
			$submit_ticket_redirect_url       = isset( $_POST['submit_ticket_redirect_url'] ) ? sanitize_text_field( $_POST['submit_ticket_redirect_url'] ) : '';
			$exisiting_tickets_login_label    = isset( $_POST['exisiting_tickets_login_label'] ) ? sanitize_text_field( $_POST['exisiting_tickets_login_label'] ) : '';
			$exisiting_tickets_register_label = isset( $_POST['exisiting_tickets_register_label'] ) ? sanitize_text_field( $_POST['exisiting_tickets_register_label'] ) : '';
			$login_url                        = isset( $_POST['login_url'] ) ? sanitize_text_field( $_POST['login_url'] ) : '';
			$reg_url                          = isset( $_POST['reg_url'] ) ? sanitize_text_field( $_POST['reg_url'] ) : '';

			eh_crm_update_settingsmeta( '0', 'exisiting_tickets_login_label', $exisiting_tickets_login_label );
			eh_crm_update_settingsmeta( '0', 'exisiting_tickets_register_label', $exisiting_tickets_register_label );
			eh_crm_update_settingsmeta( '0', 'login_redirect_url', $login_redirect_url );
			eh_crm_update_settingsmeta( '0', 'logout_redirect_url', $logout_redirect_url );
			eh_crm_update_settingsmeta( '0', 'login_url', $login_url );
			eh_crm_update_settingsmeta( '0', 'reg_url', $reg_url );
			eh_crm_update_settingsmeta( '0', 'register_redirect_url', $register_redirect_url );
			eh_crm_update_settingsmeta( '0', 'submit_ticket_redirect_url', $submit_ticket_redirect_url );
			eh_crm_update_settingsmeta( '0', 'input_width', $input_width );
			eh_crm_update_settingsmeta( '0', 'main_ticket_form_title', $main_ticket_title );
			eh_crm_update_settingsmeta( '0', 'new_ticket_form_title', $new_ticket_title );
			eh_crm_update_settingsmeta( '0', 'existing_ticket_title', $existing_ticket_title );
			eh_crm_update_settingsmeta( '0', 'submit_ticket_button', $submit_ticket_button );
			eh_crm_update_settingsmeta( '0', 'reset_ticket_button', $reset_ticket_button );
			eh_crm_update_settingsmeta( '0', 'existing_ticket_button', $existing_ticket_button );
			eh_crm_update_settingsmeta( '0', 'purchase_credit_redirect_url', $purchase_credit_redirect_url );
			eh_crm_update_settingsmeta( '0', 'set_credit_limit', $set_credit_limit );
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_appearance.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_woocommerce_settings() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$woo_order_tickets = isset( $_POST['woo_order_tickets'] ) ? sanitize_text_field( $_POST['woo_order_tickets'] ) : '';
			$woo_order_price   = isset( $_POST['woo_order_price'] ) ? sanitize_text_field( $_POST['woo_order_price'] ) : '';
			$woo_order_access  = explode( ',', isset( $_POST['woo_order_access'] ) ? sanitize_text_field( $_POST['woo_order_access'] ) : '' );
			if ( '' !== isset( $_POST['woo_vendor_roles'] ) ? sanitize_text_field( $_POST['woo_vendor_roles'] ) : '' ) {
				$woo_vendor_roles = explode( ',', isset( $_POST['woo_vendor_roles'] ) ? sanitize_text_field( $_POST['woo_vendor_roles'] ) : '' );
			} else {
				$woo_vendor_roles = array();
			}

			eh_crm_update_settingsmeta( '0', 'woo_order_tickets', $woo_order_tickets );
			eh_crm_update_settingsmeta( '0', 'woo_order_price', $woo_order_price );
			eh_crm_update_settingsmeta( '0', 'woo_order_access', $woo_order_access );
			eh_crm_update_settingsmeta( '0', 'woo_vendor_roles', $woo_vendor_roles );
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_woocommerce_settings.php';
			$data['page'] = ob_get_clean();
			wp_send_json_success( $data );
			die;
		}
	}

	public static function eh_crm_ticket_field_delete() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$fields_remove          = isset( $_POST['fields_remove'] ) ? sanitize_text_field( $_POST['fields_remove'] ) : '';
			$all_ticket_field_views = eh_crm_get_settingsmeta( '0', 'all_ticket_page_columns' );

			$args            = array( 'type' => 'field' );
			$fields          = array( 'settings_id', 'slug' );
			$avail_fields    = eh_crm_get_settings( $args, $fields );
			$selected_fields = eh_crm_get_settingsmeta( '0', 'selected_fields' );
			$key             = array_search( $fields_remove, $selected_fields );
			$key1            = array_search( $fields_remove, $all_ticket_field_views );
			if ( false !== $key ) {
				unset( $selected_fields[ $key ] );
			}
			if ( false !== $key1 ) {
				unset( $all_ticket_field_views[ $key ] );
			}
			eh_crm_update_settingsmeta( '0', 'selected_fields', array_values( $selected_fields ) );
			eh_crm_update_settingsmeta( '0', 'all_ticket_page_columns', $all_ticket_field_views );
			for ( $i = 0; $i < count( $avail_fields ); $i++ ) {
				if ( $avail_fields[ $i ]['slug'] == $fields_remove ) {
					eh_crm_delete_settings( $avail_fields[ $i ]['settings_id'] );
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_fields.php';
			$data['fields'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			$data['views'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			$data['triggers'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_page.php';
			$data['page'] = ob_get_clean();
			die(
				json_encode( $data )
			);
		}
	}

	public static function eh_crm_ticket_field_activate_deactivate() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$field_id        = isset( $_POST['field_id'] ) ? sanitize_text_field( $_POST['field_id'] ) : '';
			$type            = isset( $_POST['type'] ) ? sanitize_text_field( $_POST['type'] ) : '';
			$selected_fields = eh_crm_get_settingsmeta( '0', 'selected_fields' );
			switch ( $type ) {
				case 'activate':
					if ( ! in_array( $field_id, $selected_fields ) ) {
						array_push( $selected_fields, $field_id );
					}
					eh_crm_update_settingsmeta( '0', 'selected_fields', array_values( $selected_fields ) );
					break;
				case 'deactivate':
					$all_ticket_field_views = eh_crm_get_settingsmeta( '0', 'all_ticket_page_columns' );
					$key                    = array_search( $field_id, $all_ticket_field_views );
					$key1                   = array_search( $field_id, $selected_fields );
					if ( false !== $key ) {
						unset( $all_ticket_field_views[ $key ] );
					}
					eh_crm_update_settingsmeta( '0', 'all_ticket_page_columns', $all_ticket_field_views );
					if ( false !== $key1 ) {
						unset( $selected_fields[ $key1 ] );
					}
					eh_crm_update_settingsmeta( '0', 'selected_fields', array_values( $selected_fields ) );
					break;
				default:
					break;
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_fields.php';
			$data['fields'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			$data['views'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			$data['triggers'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_page.php';
			$data['page'] = ob_get_clean();
			die(
				json_encode( $data )
			);
		}
	}

	public static function eh_crm_ticket_field() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$selected_fields = explode( ',', isset( $_POST['selected_fields'] ) ? sanitize_text_field( $_POST['selected_fields'] ) : '' );
			$new_field       = json_decode( stripslashes( isset( $_POST['new_field'] ) ? sanitize_text_field( $_POST['new_field'] ) : '' ), true );
			if ( ! empty( $new_field ) ) {
				$new_field['description'] = str_replace( '</script>', '', isset( $new_field['description'] ) ? sanitize_text_field( $new_field['description'] ) : '' );
				$new_field['description'] = str_replace( '<script>', '', isset( $new_field['description'] ) ? sanitize_text_field( $new_field['description'] ) : '' );
			}
			$edit_field             = json_decode( stripslashes( isset( $_POST['edit_field'] ) ? sanitize_text_field( $_POST['edit_field'] ) : '' ), true );
			$all_ticket_field_views = json_decode( stripslashes( isset( $_POST['all_tickets_view'] ) ? sanitize_text_field( $_POST['all_tickets_view'] ) : '' ), true );
			$args                   = array( 'type' => 'field' );
			$fields                 = array( 'settings_id', 'slug' );
			$temp                   = eh_crm_get_settings( $args, $fields );
			$slug                   = array();
			for ( $i = 0; $i < count( $temp ); $i++ ) {
				$slug[ $i ] = $temp[ $i ]['slug'];
			}
			for ( $i = 0; $i < count( $selected_fields ); $i++ ) {
				if ( ! in_array( $selected_fields[ $i ], $slug ) ) {
					unset( $selected_fields[ $i ] );
				}
			}
			eh_crm_update_settingsmeta( '0', 'selected_fields', array_values( $selected_fields ) );
			eh_crm_update_settingsmeta( '0', 'all_ticket_field_views', $all_ticket_field_views );
			if ( ! empty( $new_field ) ) {
				$insert = array(
					'title'  => $new_field['title'],
					'filter' => 'no',
					'type'   => 'field',
					'vendor' => '',
				);
				switch ( $new_field['type'] ) {
					case 'file':
						$meta = array(
							'field_type'        => $new_field['type'],
							'field_require'     => $new_field['required'],
							'field_visible'     => $new_field['visible'],
							'field_description' => $new_field['description'],
							'file_type'         => $new_field['file_type'],
						);
						eh_crm_insert_settings( $insert, $meta );
						break;
					case 'text':
					case 'number':
					case 'email':
					case 'password':
						$meta = array(
							'field_type'          => $new_field['type'],
							'field_default'       => $new_field['default'],
							'field_require'       => $new_field['required'],
							'field_visible'       => $new_field['visible'],
							'field_require_agent' => $new_field['required_agent'],
							'field_placeholder'   => $new_field['placeholder'],
							'field_description'   => $new_field['description'],
						);
						eh_crm_insert_settings( $insert, $meta );
						break;
					case 'phone':
						$meta = array(
							'field_type'          => $new_field['type'],
							'field_default'       => $new_field['default'],
							'field_require'       => $new_field['required'],
							'field_visible'       => $new_field['visible'],
							'field_require_agent' => $new_field['required_agent'],
							'field_placeholder'   => $new_field['placeholder'],
							'field_description'   => $new_field['description'],
						);
						eh_crm_insert_settings( $insert, $meta, 'phone_number' );
						break;
					case 'date':
						$meta = array(
							'field_type'          => $new_field['type'],
							'field_require'       => $new_field['required'],
							'field_visible'       => $new_field['visible'],
							'field_require_agent' => $new_field['required_agent'],
							'field_placeholder'   => $new_field['placeholder'],
							'field_description'   => $new_field['description'],
						);
						eh_crm_insert_settings( $insert, $meta );
						break;
					case 'checkbox':
					case 'radio':
					case 'select':
						$meta = array(
							'field_type'          => $new_field['type'],
							'field_require'       => $new_field['required'],
							'field_visible'       => $new_field['visible'],
							'field_require_agent' => $new_field['required_agent'],
							'field_description'   => $new_field['description'],
						);
						if ( 'select' === $new_field['type'] ) {
							$meta['field_placeholder'] = $new_field['placeholder'];
						}
						$id      = eh_crm_insert_settings( $insert, $meta );
						$args    = array( 'settings_id' => $id );
						$fields  = array( 'slug' );
						$data    = eh_crm_get_settings( $args, $fields );
						$values  = $new_field['values'];
						$gen_val = array();
						$gen_def = '';
						for ( $i = 0; $i < count( $values ); $i++ ) {
							$key             = $data[0]['slug'] . '_V' . $i;
							$gen_val[ $key ] = $values[ $i ];
							if ( $values[ $i ] == $new_field['default'] ) {
								$gen_def = $key;
							}
						}
						eh_crm_insert_settingsmeta( $id, 'field_default', $gen_def );
						eh_crm_insert_settingsmeta( $id, 'field_values', $gen_val );
						break;
					case 'woo_product':
					case 'woo_order_id':
					case 'edd_products':
					case 'woo_category':
					case 'woo_tags':
					case 'woo_vendors':
						$meta = array(
							'field_type'          => 'select',
							'field_require'       => $new_field['required'],
							'field_visible'       => $new_field['visible'],
							'field_require_agent' => $new_field['required_agent'],
							'field_description'   => $new_field['description'],
							'field_placeholder'   => $new_field['placeholder'],
						);
						if ( 'woo_order_id' == $new_field['type'] ) {
							$meta = array(
								'field_type'          => 'select',
								'field_require'       => $new_field['required'],
								'field_visible'       => $new_field['visible'],
								'field_require_agent' => $new_field['required_agent'],
								'field_description'   => $new_field['description'],
								'field_placeholder'   => $new_field['placeholder'],
							);
						}
						$id      = eh_crm_insert_settings( $insert, $meta, $new_field['type'] );
						$args    = array( 'settings_id' => $id );
						$fields  = array( 'slug' );
						$data    = eh_crm_get_settings( $args, $fields );
						$values  = $new_field['values'];
						$gen_val = array();
						$gen_def = '';
						foreach ( $values as $key => $value ) {
							$next_ran = 0;
							if ( strpos( $key, 'new_add' ) !== false ) {
								$key             = $data[0]['slug'] . '_V' . $next_ran;
								$gen_val[ $key ] = $value;
								$next_ran++;
							} else {
								$gen_val[ $key ] = $value;
							}
							if ( $value == $new_field['default'] ) {
								$gen_def = $key;
							}
						}
						eh_crm_insert_settingsmeta( $id, 'field_default', $gen_def );
						eh_crm_insert_settingsmeta( $id, 'field_values', $gen_val );
						break;
					case 'textarea':
						$meta = array(
							'field_type'          => $new_field['type'],
							'field_default'       => $new_field['default'],
							'field_require'       => $new_field['required'],
							'field_visible'       => $new_field['visible'],
							'field_require_agent' => $new_field['required_agent'],
							'field_description'   => $new_field['description'],
						);
						eh_crm_insert_settings( $insert, $meta );
						break;
					case 'ip':
						$meta = array(
							'field_type'        => $new_field['type'],
							'field_description' => $new_field['description'],
						);
						eh_crm_insert_settings( $insert, $meta );
						break;
					case 'google_captcha':
						$meta = array(
							'field_type'        => $new_field['type'],
							'field_site_key'    => $new_field['site_key'],
							'field_secret_key'  => $new_field['secret_key'],
							'field_require'     => $new_field['required'],
							'field_description' => $new_field['description'],
						);
						eh_crm_insert_settings( $insert, $meta, $new_field['type'] );
						break;
					case 'pfs_order_product':
						$meta = array(
							'field_type'          => $new_field['type'],
							'field_require'       => $new_field['required'],
							'field_visible'       => $new_field['visible'],
							'field_require_agent' => $new_field['required_agent'],
							'field_description'   => $new_field['description'],
						);
						eh_crm_insert_settings( $insert, $meta );
						break;
				}
			}
			if ( ! empty( $edit_field ) ) {
				$edit_slug          = $edit_field['slug'];
				$edit_title         = $edit_field['title'];
				$edit_required      = $edit_field['required'];
				$edit_visible       = $edit_field['visible'];
				$edit_require_agent = $edit_field['required_agent'];
				$edit_placeholder   = $edit_field['placeholder'];
				$edit_default       = $edit_field['default'];
				$edit_values        = $edit_field['values'];
				$edit_file_type     = $edit_field['file_type'];
				$edit_description   = $edit_field['description'];
				$field_data         = eh_crm_get_settings(
					array(
						'slug' => $edit_slug,
						'type' => 'field',
					),
					'settings_id'
				);
				if ( ! empty( $field_data ) ) {
					$field_id = $field_data[0]['settings_id'];
					eh_crm_update_settings(
						$field_id,
						array(
							'title'  => $edit_title,
							'filter' => 'no',
						)
					);
					eh_crm_update_settingsmeta( $field_id, 'field_description', $edit_description );
					eh_crm_update_settingsmeta( $field_id, 'field_placeholder', $edit_placeholder );
					eh_crm_update_settingsmeta( $field_id, 'field_default', $edit_default );
					if ( '' !== $edit_required ) {
						eh_crm_update_settingsmeta( $field_id, 'field_require', $edit_required );
					}
					if ( '' !== $edit_file_type ) {
						eh_crm_update_settingsmeta( $field_id, 'file_type', $edit_file_type );
					}
					if ( '' !== $edit_visible ) {
						eh_crm_update_settingsmeta( $field_id, 'field_visible', $edit_visible );
					}
					if ( '' !== $edit_require_agent ) {
						eh_crm_update_settingsmeta( $field_id, 'field_require_agent', $edit_require_agent );
					}
					if ( '' !== $edit_values ) {
						$gen_val_old = eh_crm_get_settingsmeta( $field_id, 'field_values' );
						$old_keys    = array_keys( $gen_val_old );
						$gen_def     = '';
						$gen_val     = array();
						$next_ran    = 0;
						foreach ( $old_keys as $old_key ) {
							$cur_ran = str_replace( $edit_slug . '_V', '', $old_key );
							if ( $cur_ran > $next_ran ) {
								$next_ran = $cur_ran;
							}
						}
						foreach ( $edit_values as $key => $value ) {
							if ( in_array( $key, $old_keys ) ) {
								$gen_val[ $key ] = $value;
							} else {
								$key             = $edit_slug . '_V' . ( ++$next_ran );
								$gen_val[ $key ] = $value;
							}
							if ( $value == $edit_default ) {
								$gen_def = $key;
							}
						}
						eh_crm_update_settingsmeta( $field_id, 'field_default', $gen_def );
						eh_crm_update_settingsmeta( $field_id, 'field_values', $gen_val );
						if ( isset( $edit_field['field_order'] ) ) {
							if ( count( $edit_field['field_order'] ) != count( $gen_val ) ) {
								$new_fields                = array_diff( array_keys( $gen_val ), $edit_field['field_order'] );
								$edit_field['field_order'] = array_merge( $edit_field['field_order'], $new_fields );
							}
							eh_crm_update_settingsmeta( $field_id, 'field_order', array_values( array_unique( $edit_field['field_order'] ) ) );
						}
					}
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_fields.php';
			$data['fields'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			$data['views'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			$data['triggers'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_page.php';
			$data['page'] = ob_get_clean();
			die(
				json_encode( $data )
			);
		}
	}

	public static function eh_crm_woo_product_fetch() {
		set_time_limit( 300 );
		$args_post = array(
			'orderby'     => 'ID',
			'numberposts' => -1,
			'post_type'   => array( 'product' ),
		);
		$products  = get_posts( $args_post );
		$return    = array();
		$title     = array();

		for ( $i = 0;$i < count( $products );$i++ ) {
			$return[ 'p_' . $products[ $i ]->ID ] = $products[ $i ]->post_title;
			$title[]                              = $products[ $i ]->post_title;
		}
		sort( $title );
		$final_return = array();
		foreach ( $title as $value ) {
			$key                  = array_search( $value, $return );
			$final_return[ $key ] = $value;
		}

		die( json_encode( $final_return ) );
	}

	public static function eh_crm_get_edd_products() {
		set_time_limit( 300 );
		$args_post = array(
			'orderby'     => 'ID',
			'numberposts' => -1,
			'post_type'   => array( 'download' ),
		);
		$products  = get_posts( $args_post );
		$return    = array();
		for ( $i = 0;$i < count( $products );$i++ ) {
			$return[ $i ]['id']    = 'p_' . $products[ $i ]->ID;
			$return[ $i ]['title'] = $products[ $i ]->post_title;
		}
		die( json_encode( $return ) );
	}
	public static function eh_crm_woo_category_fetch() {
		set_time_limit( 300 );
		$cat_args   = array(
			'hide_empty' => false,
			'order'      => 'ASC',
		);
		$categories = get_terms( 'product_cat', $cat_args );
		$return     = array();
		for ( $i = 0;$i < count( $categories );$i++ ) {
			$return[ $i ]['id']    = 'c_' . $categories[ $i ]->slug;
			$return[ $i ]['title'] = $categories[ $i ]->name;
		}
		die( json_encode( $return ) );
	}

	public static function eh_crm_woo_tags_fetch() {
		set_time_limit( 300 );
		$cat_args = array(
			'hide_empty' => false,
			'order'      => 'ASC',
		);
		$tags     = get_terms( 'product_tag', $cat_args );
		$return   = array();
		for ( $i = 0;$i < count( $tags );$i++ ) {
			$return[ $i ]['id']    = 't_' . $tags[ $i ]->slug;
			$return[ $i ]['title'] = $tags[ $i ]->name;
		}
		die( json_encode( $return ) );
	}

	public static function eh_crm_woo_vendors_fetch() {
		set_time_limit( 300 );
		$vendors = eh_crm_get_settingsmeta( 0, 'woo_vendor_roles' );
		if ( $vendors ) {
			$users_data = get_users( array( 'role__in' => $vendors ) );
			$return     = array();
			for ( $i = 0;$i < count( $users_data );$i++ ) {
				$current               = $users_data[ $i ];
				$return[ $i ]['id']    = 'v_' . $current->ID;
				$return[ $i ]['title'] = $current->data->display_name;
			}
			if ( empty( $return ) ) {
				die(
					json_encode(
						array(
							'status' => 'no_roles',
							'data'   => __(
								'No Vendors Found',
								'wsdesk'
							),
						)
					)
				);
			} else {
				die(
					json_encode(
						array(
							'status' => 'roles',
							'data'   => $return,
						)
					)
				);
			}
		} else {
			die(
				json_encode(
					array(
						'status' => 'no_roles',
						'data'   => __(
							'No Vendors Roles defined!',
							'wsdesk'
						),
					)
				)
			);
		}
	}

	public static function eh_crm_ticket_field_edit() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$field      = isset( $_POST['field'] ) ? sanitize_text_field( $_POST['field'] ) : '';
			$args       = array(
				'slug' => $field,
				'type' => 'field',
			);
			$fields     = array( 'settings_id', 'title', 'filter' );
			$field_sett = eh_crm_get_settings( $args, $fields );
			$field_meta = eh_crm_get_settingsmeta( $field_sett[0]['settings_id'] );
			$add_value  = '<button class="button" id="ticket_field_edit_values_add" style="vertical-align: baseline;margin-bottom: 10px;">' . __( 'Add Value', 'wsdesk' ) . '</button>';
			$output     = '<span class="help-block">' . __( 'Edit Details for custom', 'wsdesk' ) . ' ' . ucfirst( $field_meta['field_type'] ) . '? </span>';
			$output    .= '<input type="text" id="ticket_field_edit_title" placeholder="' . __( 'Enter Title', 'wsdesk' ) . '" class="form-control crm-form-element-input" value="' . $field_sett[0]['title'] . '">';
			switch ( $field_meta['field_type'] ) {
				case '':
					break;
				case 'file':
					$required_end = '';
					if ( 'yes' == $field_meta['field_require'] ) {
						$required_end = 'checked';
					}
					$single   = '';
					$multiple = '';
					if ( 'single' == $field_meta['file_type'] ) {
						$multiple = '';
						$single   = 'checked';
					} else {
						$multiple = 'checked';
						$single   = '';
					}
					$visible = '';
					if ( isset( $field_meta['field_visible'] ) && 'yes' == $field_meta['field_visible'] ) {
						$visible = 'checked';
					}
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_visible" class="form-control" name="ticket_field_edit_visible" ' . $visible . ' value="yes"> ' . __( 'Visible for End Users', 'wsdesk' ) . '</span>';
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_require" class="form-control" name="ticket_field_edit_require" ' . $required_end . ' value="yes"> ' . __( 'Mandatory for End users', 'wsdesk' ) . '</span>';
					$output .= '<br><span class="help-block">' . __( 'Specify whether this Field is Single or Multiple Attachment?', 'wsdesk' ) . ' </span><input type="radio" style="margin-top: 0;"  id="ticket_field_edit_file_type" checked class="form-control" name="ticket_field_edit_file_type" ' . $single . ' value="single"> ' . __( 'Single Attachment', 'wsdesk' ) . ' <br><input type="radio" style="margin-top: 0;" id="ticket_field_edit_file_type" class="form-control" name="ticket_field_edit_file_type" ' . $multiple . ' value="multiple"> ' . __( 'Multiple Attachment', 'wsdesk' ) . ' <br>';
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';
					break;
				case 'radio':
					$required_end = '';
					if ( 'yes' == $field_meta['field_require'] ) {
						$required_end = 'checked';
					}
					$required_agent = '';
					if ( isset( $field_meta['field_require_agent'] ) && 'yes' == $field_meta['field_require_agent'] ) {
						$required_agent = 'checked';
					}
					$visible = '';
					if ( isset( $field_meta['field_visible'] ) && 'yes' == $field_meta['field_visible'] ) {
						$visible = 'checked';
					}
					$output      .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_visible" class="form-control" name="ticket_field_edit_visible" ' . $visible . ' value="yes"> ' . __( 'Visible for End Users', 'wsdesk' ) . '</span>';
					$output      .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_require" class="form-control" name="ticket_field_edit_require" ' . $required_end . ' value="yes"> ' . __( 'Mandatory for End users', 'wsdesk' ) . '</span>';
					$output      .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_agent_require" class="form-control" name="ticket_field_edit_agent_require" ' . $required_agent . ' value="yes"> ' . __( 'Mandatory for Agents', 'wsdesk' ) . '</span>';
					$output      .= '<span class="help-block">' . __( 'Update the Radio values!', 'wsdesk' ) . ' </span>';
					$field_values = array_values( $field_meta['field_values'] );
					$field_keys   = array_keys( $field_meta['field_values'] );
					for ( $i = 0; $i < count( $field_values ); $i++ ) {
						if ( 0 == $i ) {
							$output .= '<span id="ticket_field_edit_values_span_' . $i . '" class="ticket_field_edit_values_span"><input type="text" id="ticket_field_edit_values[' . $i . ']" class="form-control ticket_field_edit_values crm-form-element-input" value="' . $field_values[ $i ] . '"><input type="hidden" class="old_ticket_field_edit_values[' . $i . ']" id="' . $field_keys[ $i ] . '" value="' . $field_values[ $i ] . '"></span>';
						} else {
							$output .= '<span id="ticket_field_edit_values_span_' . $i . '" class="ticket_field_edit_values_span"><input type="text" id="ticket_field_edit_values[' . $i . ']" class="form-control ticket_field_edit_values crm-form-element-input" style="width:90% !important;" value="' . $field_values[ $i ] . '"><input type="hidden" class="old_ticket_field_edit_values[' . $i . ']" id="' . $field_keys[ $i ] . '" value="' . $field_values[ $i ] . '"><button class="btn btn-warning" title="' . __( 'Remove Values', 'wsdesk' ) . '" id="ticket_field_edit_values_remove" style="padding: 5px 8px;margin:0px 4px; vertical-align: baseline;"><span class="glyphicon glyphicon-minus"></span></button></span>';
						}
					}
					$output .= $add_value;
					if ( '' == $field_meta['field_default'] ) {
						$def = '';
					} else {
						$def = ( isset( $field_meta['field_values'][ $field_meta['field_default'] ] ) ? $field_meta['field_values'][ $field_meta['field_default'] ] : '' );
					}
					$output .= '<br>' . __( 'Enter Default Values', 'wsdesk' ) . '<input type="text" id="ticket_field_edit_default" class="form-control crm-form-element-input" value="' . $def . '">';
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';
					break;
				case 'checkbox':
					$required_end = '';
					if ( 'yes' == $field_meta['field_require'] ) {
						$required_end = 'checked';
					}
					$required_agent = '';
					if ( isset( $field_meta['field_require_agent'] ) && 'yes' == $field_meta['field_require_agent'] ) {
						$required_agent = 'checked';
					}
					$visible = '';
					if ( isset( $field_meta['field_visible'] ) && 'yes' == $field_meta['field_visible'] ) {
						$visible = 'checked';
					}
					$output      .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_visible" class="form-control" name="ticket_field_edit_visible" ' . $visible . ' value="yes"> ' . __( 'Visible for End Users', 'wsdesk' ) . '</span>';
					$output      .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_require" class="form-control" name="ticket_field_edit_require" ' . $required_end . ' value="yes"> ' . __( 'Mandatory for End users', 'wsdesk' ) . '</span>';
					$output      .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_agent_require" class="form-control" name="ticket_field_edit_agent_require" ' . $required_agent . ' value="yes"> ' . __( 'Mandatory for Agents', 'wsdesk' ) . '</span>';
					$output      .= '<span class="help-block">' . __( 'Update the Checkbox values!', 'wsdesk' ) . ' </span>';
					$field_values = array_values( $field_meta['field_values'] );
					$field_keys   = array_keys( $field_meta['field_values'] );
					for ( $i = 0; $i < count( $field_values ); $i++ ) {
						if ( 0 == $i ) {
							$output .= '<span id="ticket_field_edit_values_span_' . $i . '" class="ticket_field_edit_values_span"><input type="text" id="ticket_field_edit_values[' . $i . ']" class="form-control ticket_field_edit_values crm-form-element-input" value="' . $field_values[ $i ] . '"><input type="hidden" class="old_ticket_field_edit_values[' . $i . ']" id="' . $field_keys[ $i ] . '" value="' . $field_values[ $i ] . '"></span>';
						} else {
							$output .= '<span id="ticket_field_edit_values_span_' . $i . '" class="ticket_field_edit_values_span"><input type="text" id="ticket_field_edit_values[' . $i . ']" class="form-control ticket_field_edit_values crm-form-element-input" style="width:90% !important;" value="' . $field_values[ $i ] . '"><input type="hidden" class="old_ticket_field_edit_values[' . $i . ']" id="' . $field_keys[ $i ] . '" value="' . $field_values[ $i ] . '"><button class="btn btn-warning" title="' . __( 'Remove Values', 'wsdesk' ) . '" id="ticket_field_edit_values_remove" style="padding: 5px 8px;margin:0px 4px; vertical-align: baseline;"><span class="glyphicon glyphicon-minus"></span></button></span>';
						}
					}
					$output .= $add_value;
					if ( '' == $field_meta['field_default'] ) {
						$def = '';
					} else {
						$def = ( isset( $field_meta['field_values'][ $field_meta['field_default'] ] ) ? $field_meta['field_values'][ $field_meta['field_default'] ] : '' );
					}
					$output .= '<br>' . __( 'Enter Default Values', 'wsdesk' ) . '<input type="text" id="ticket_field_edit_default" class="form-control crm-form-element-input" value="' . $def . '">';
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';
					break;
				case 'select':
					$required_end = '';
					if ( 'yes' == $field_meta['field_require'] ) {
						$required_end = 'checked';
					}
					$required_agent = '';
					if ( isset( $field_meta['field_require_agent'] ) && 'yes' == $field_meta['field_require_agent'] ) {
						$required_agent = 'checked';
					}
					$visible = '';
					if ( isset( $field_meta['field_visible'] ) && 'yes' == $field_meta['field_visible'] ) {
						$visible = 'checked';
					}
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_visible" class="form-control" name="ticket_field_edit_visible" ' . $visible . ' value="yes"> ' . __( 'Visible for End Users', 'wsdesk' ) . '</span>';
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_require" class="form-control" name="ticket_field_edit_require" ' . $required_end . ' value="yes"> ' . __( 'Mandatory for End users', 'wsdesk' ) . '</span>';
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_agent_require" class="form-control" name="ticket_field_edit_agent_require" ' . $required_agent . ' value="yes"> ' . __( 'Mandatory for Agents', 'wsdesk' ) . '</span>';
					$output .= '<br>' . __( 'Enter Placeholder', 'wsdesk' ) . '<input type="text" id="ticket_field_edit_placeholder" class="form-control crm-form-element-input" value="' . ( isset( $field_meta['field_placeholder'] ) ? $field_meta['field_placeholder'] : '' ) . '">';
					if ( 'woo_order_id' != $args['slug'] ) {
						$output      .= '<span class="help-block">' . __( 'Update the Dropdown values!', 'wsdesk' ) . ' </span>';
						$field_values = array_values( $field_meta['field_values'] );
						$field_keys   = array_keys( $field_meta['field_values'] );
						for ( $i = 0; $i < count( $field_values ); $i++ ) {
							if ( 0 == $i ) {
								if ( in_array( $field, array( 'woo_product', 'woo_category', 'woo_tags', 'edd_products' ) ) ) {
									$output .= '<span id="ticket_field_edit_values_span_' . $i . '" class="ticket_field_edit_values_span"><input type="text" id="ticket_field_edit_values[' . $i . ']" class="form-control ticket_field_edit_values crm-form-element-input" style="width:90% !important;" value="' . $field_values[ $i ] . '"><input type="hidden" class="old_ticket_field_edit_values[' . $i . ']" id="' . $field_keys[ $i ] . '" value="' . $field_values[ $i ] . '"><button class="btn btn-warning" title="' . __( 'Remove Values', 'wsdesk' ) . '" id="ticket_field_edit_values_remove" style="padding: 5px 8px;margin:0px 4px; vertical-align: baseline;"><span class="glyphicon glyphicon-minus"></span></button></span>';
								} else {
									$output .= '<span id="ticket_field_edit_values_span_' . $i . '" class="ticket_field_edit_values_span"><input type="text" id="ticket_field_edit_values[' . $i . ']" class="form-control ticket_field_edit_values crm-form-element-input" value="' . $field_values[ $i ] . '"><input type="hidden" class="old_ticket_field_edit_values[' . $i . ']" id="' . $field_keys[ $i ] . '" value="' . $field_values[ $i ] . '"></span>';
								}
							} else {
								$output .= '<span id="ticket_field_edit_values_span_' . $i . '" class="ticket_field_edit_values_span"><input type="text" id="ticket_field_edit_values[' . $i . ']" class="form-control ticket_field_edit_values crm-form-element-input" style="width:90% !important;" value="' . $field_values[ $i ] . '"><input type="hidden" class="old_ticket_field_edit_values[' . $i . ']" id="' . $field_keys[ $i ] . '" value="' . $field_values[ $i ] . '"><button class="btn btn-warning" title="' . __( 'Remove Values', 'wsdesk' ) . '" id="ticket_field_edit_values_remove" style="padding: 5px 8px;margin:0px 4px; vertical-align: baseline;"><span class="glyphicon glyphicon-minus"></span></button></span>';
							}
						}
					}
					if ( 'woo_order_id' != $args['slug'] ) {
						$output .= $add_value;
					}
					if ( '' == $field_meta['field_default'] ) {
						$def = '';
					} else {
						$def = ( isset( $field_meta['field_values'][ $field_meta['field_default'] ] ) ? $field_meta['field_values'][ $field_meta['field_default'] ] : '' );
					}
					if ( 'woo_order_id' == $args['slug'] ) {
						$output .= '<input type="hidden" id="ticket_field_edit_default" class="form-control crm-form-element-input" value="' . $def . '">';
					} else {
						$output .= '<br>' . __( 'Enter Default Values', 'wsdesk' ) . '<input type="text" id="ticket_field_edit_default" class="form-control crm-form-element-input" value="' . $def . '">';
					}
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';

					$output     .= '<br><span class="help-block">' . __( 'Rearrange the options for front end', 'wsdesk' ) . ' </span><select class="dropdown_options_order" id="dropdown_options_order_' . $args['slug'] . '" name="dropdown_options_order[]" size="6" style="width: 300px;height:auto;min-height:150px;" >';
					$field_order = isset( $field_meta['field_order'] ) ? array_values( array_unique( $field_meta['field_order'] ) ) : ( isset( $field_keys ) ? $field_keys : array() );
					$field_order = array_intersect( $field_order, array_keys( $field_meta['field_values'] ) );

					foreach ( $field_order as $key ) {
						$output .= '<option value="' . $key . '" >' . $field_meta['field_values'][ $key ] . '</option>';
					}

					$output .= '</select>';
					$output .= '<br><br><div><button class="button dropdown-order-up" id="' . $args['slug'] . '" >UP </button> &nbsp;&nbsp;';
					$output .= '<button class="button dropdown-order-down" id="' . $args['slug'] . '">DOWN</button></div>';
					break;
				case 'textarea':
					if ( 'request_description' != $field ) {
						$required_end = '';
						if ( 'yes' == $field_meta['field_require'] ) {
							$required_end = 'checked';
						}
						$required_agent = '';
						if ( isset( $field_meta['field_require_agent'] ) && 'yes' == $field_meta['field_require_agent'] ) {
							$required_agent = 'checked';
						}
						$visible = '';
						if ( isset( $field_meta['field_visible'] ) && 'yes' == $field_meta['field_visible'] ) {
							$visible = 'checked';
						}
						$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_visible" class="form-control" name="ticket_field_edit_visible" ' . $visible . ' value="yes"> ' . __( 'Visible for End Users', 'wsdesk' ) . '</span>';
						$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_require" class="form-control" name="ticket_field_edit_require" ' . $required_end . ' value="yes"> ' . __( 'Mandatory for End users', 'wsdesk' ) . '</span>';
						$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_agent_require" class="form-control" name="ticket_field_edit_agent_require" ' . $required_agent . ' value="yes"> ' . __( 'Mandatory for Agents', 'wsdesk' ) . '</span>';
					}
					$output .= '<br>' . __( 'Enter Default Values', 'wsdesk' ) . '<input type="text" id="ticket_field_edit_default" class="form-control crm-form-element-input" value="' . $field_meta['field_default'] . '">';
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';
					break;
				case 'date':
					$required_end = '';
					if ( 'yes' == $field_meta['field_require'] ) {
						$required_end = 'checked';
					}
					$required_agent = '';
					if ( isset( $field_meta['field_require_agent'] ) && 'yes' == $field_meta['field_require_agent'] ) {
						$required_agent = 'checked';
					}
					$visible = '';
					if ( isset( $field_meta['field_visible'] ) && 'yes' == $field_meta['field_visible'] ) {
						$visible = 'checked';
					}
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_visible" class="form-control" name="ticket_field_edit_visible" ' . $visible . ' value="yes"> ' . __( 'Visible for End Users', 'wsdesk' ) . '</span>';
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_require" class="form-control" name="ticket_field_edit_require" ' . $required_end . ' value="yes"> ' . __( 'Mandatory for End users', 'wsdesk' ) . '</span>';
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_agent_require" class="form-control" name="ticket_field_edit_agent_require" ' . $required_agent . ' value="yes"> ' . __( 'Mandatory for Agents', 'wsdesk' ) . '</span>';
					$output .= '<br>' . __( 'Enter Placeholder', 'wsdesk' ) . '<input type="text" id="ticket_field_edit_placeholder" class="form-control crm-form-element-input" value="' . $field_meta['field_placeholder'] . '">';
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';
					break;
				case 'ip':
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';
					break;
				case 'pfs_order_product':
					$required_end = '';
					if ( 'yes' == $field_meta['field_require'] ) {
						$required_end = 'checked';
					}
					$required_agent = '';
					if ( isset( $field_meta['field_require_agent'] ) && 'yes' == $field_meta['field_require_agent'] ) {
						$required_agent = 'checked';
					}
					$visible = '';
					if ( isset( $field_meta['field_visible'] ) && 'yes' == $field_meta['field_visible'] ) {
						$visible = 'checked';
					}
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_visible" class="form-control" name="ticket_field_edit_visible" ' . $visible . ' value="yes"> ' . __( 'Visible for End Users', 'wsdesk' ) . '</span>';
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_require" class="form-control" name="ticket_field_edit_require" ' . $required_end . ' value="yes"> ' . __( 'Mandatory for End users', 'wsdesk' ) . '</span>';
					$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_agent_require" class="form-control" name="ticket_field_edit_agent_require" ' . $required_agent . ' value="yes"> ' . __( 'Mandatory for Agents', 'wsdesk' ) . '</span>';
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';
					break;
				default:
					if ( 'request_email' != $field && 'request_title' != $field ) {
						$required_end = '';
						if ( 'yes' == $field_meta['field_require'] ) {
							$required_end = 'checked';
						}
						$required_agent = '';
						if ( isset( $field_meta['field_require_agent'] ) && 'yes' == $field_meta['field_require_agent'] ) {
							$required_agent = 'checked';
						}
						$visible = '';
						if ( isset( $field_meta['field_visible'] ) && 'yes' == $field_meta['field_visible'] ) {
							$visible = 'checked';
						}
						$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_visible" class="form-control" name="ticket_field_edit_visible" ' . $visible . ' value="yes"> ' . __( 'Visible for End Users', 'wsdesk' ) . '</span>';
						$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_require" class="form-control" name="ticket_field_edit_require" ' . $required_end . ' value="yes"> ' . __( 'Mandatory for End users', 'wsdesk' ) . '</span>';
						$output .= '<span class="help-block"><input type="checkbox" style="margin-top: 0;"  id="ticket_field_edit_agent_require" class="form-control" name="ticket_field_edit_agent_require" ' . $required_agent . ' value="yes"> ' . __( 'Mandatory for Agents', 'wsdesk' ) . '</span>';
					}
					$output .= '<br>' . __( 'Enter Placeholder', 'wsdesk' ) . '<input type="text" id="ticket_field_edit_placeholder" class="form-control crm-form-element-input" value="' . $field_meta['field_placeholder'] . '">';
					$output .= '<br>' . __( 'Enter Default Values', 'wsdesk' ) . '<input type="text" id="ticket_field_edit_default" class="form-control crm-form-element-input" value="' . $field_meta['field_default'] . '">';
					$output .= '<br><span class="help-block">' . __( 'Want to update description to this field?', 'wsdesk' ) . ' </span><textarea id="ticket_field_edit_description" class="form-control crm-form-element-input" style="padding: 10px !important;">' . $field_meta['field_description'] . '</textarea>';
					break;
			}
			wp_send_json_success( array( 'page' => $output ) );
			die;
		}
	}

	public static function eh_crm_ticket_label_delete() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$label_remove = isset( $_POST['label_remove'] ) ? sanitize_text_field( $_POST['label_remove'] ) : '';
			$args         = array( 'type' => 'label' );
			$fields       = array( 'settings_id', 'slug' );
			$avail_labels = eh_crm_get_settings( $args, $fields );
			for ( $i = 0; $i < count( $avail_labels ); $i++ ) {
				if ( $avail_labels[ $i ]['slug'] == $label_remove ) {
					eh_crm_delete_settings( $avail_labels[ $i ]['settings_id'] );
				}
			}

			$default_label = eh_crm_get_settingsmeta( '0', 'default_label' );
			if ( $default_label === $label_remove ) {
				eh_crm_update_settingsmeta( '0', 'default_label', 'label_LL01' );
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_labels.php';
			$data['labels'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			$data['views'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			$data['triggers'] = ob_get_clean();
			die(
				json_encode( $data )
			);
		}
	}

	public static function eh_crm_ticket_label() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$new_label  = json_decode( stripslashes( isset( $_POST['new_label'] ) ? sanitize_text_field( $_POST['new_label'] ) : '' ), true );
			$edit_label = json_decode( stripslashes( isset( $_POST['edit_label'] ) ? sanitize_text_field( $_POST['edit_label'] ) : '' ), true );
			if ( ! empty( $new_label ) ) {
				$insert = array(
					'title'  => $new_label['title'],
					'filter' => $new_label['filter'],
					'type'   => 'label',
					'vendor' => '',
				);
				$meta   = array(
					'label_color' => $new_label['color'],
				);
				eh_crm_insert_settings( $insert, $meta );
			}
			if ( ! empty( $edit_label ) ) {
				$edit_slug   = $edit_label['slug'];
				$edit_title  = $edit_label['title'];
				$edit_filter = $edit_label['filter'];
				$edit_color  = $edit_label['color'];
				$label_data  = eh_crm_get_settings(
					array(
						'slug' => $edit_slug,
						'type' => 'label',
					),
					'settings_id'
				);
				$label_id    = $label_data[0]['settings_id'];
				eh_crm_update_settings(
					$label_id,
					array(
						'title'  => $edit_title,
						'filter' => $edit_filter,
					)
				);
				eh_crm_update_settingsmeta( $label_id, 'label_color', $edit_color );
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_labels.php';
			$data['labels'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			$data['views'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			$data['triggers'] = ob_get_clean();
			die(
				json_encode( $data )
			);
		}
	}

	public static function eh_crm_ticket_label_edit() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$label      = isset( $_POST['label'] ) ? sanitize_text_field( $_POST['label'] ) : '';
			$args       = array(
				'slug' => $label,
				'type' => 'label',
			);
			$fields     = array( 'settings_id', 'title', 'filter' );
			$label_sett = eh_crm_get_settings( $args, $fields );
			$label_meta = eh_crm_get_settingsmeta( $label_sett[0]['settings_id'] );
			$yes        = '';
			$no         = '';
			if ( 'yes' == $label_sett[0]['filter'] ) {
				$yes = 'checked';
				$no  = '';
			} else {
				$yes = '';
				$no  = 'checked';
			}
			$output = '
							<span class="help-block">' . __( 'Update details for', 'wsdesk' ) . ' ' . $label_sett[0]['title'] . ' ' . __( 'Status', 'wsdesk' ) . ' </span>
							<input type="text" id="ticket_label_edit_title" placeholder="' . __( 'Enter Title', 'wsdesk' ) . '" class="form-control crm-form-element-input" value="' . $label_sett[0]['title'] . '">
							<span class="help-block">' . __( 'Change ticket status color', 'wsdesk' ) . '</span>
							<span style="vertical-align: middle;">
								<input type="color" id="ticket_label_edit_color" value = "' . $label_meta['label_color'] . '"/><span> ' . __( 'Click and pick the color', 'wsdesk' ) . '</span>
							</span>
							<span class="help-block">' . __( 'Do you want to use this status to filter tickets?', 'wsdesk' ) . ' </span>
							<input type="radio" style="margin-top: 0;" checked id="ticket_label_edit_filter" class="form-control" name="ticket_label_edit_filter" ' . $yes . ' value="yes"> ' . __( 'Yes! I will use it to Filter', 'wsdesk' ) . '<br>
							<input type="radio" style="margin-top: 0;" id="ticket_label_edit_filter" class="form-control" name="ticket_label_edit_filter" ' . $no . ' value="no"> ' . __( 'No! Just for Information', 'wsdesk' );
			wp_send_json_success( array( 'page' => $output ) );
			die;
		}
	}

	public static function eh_crm_ticket_tag_delete() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$tag_remove = isset( $_POST['tag_remove'] ) ? sanitize_text_field( $_POST['tag_remove'] ) : '';
			$args       = array( 'type' => 'tag' );
			$fields     = array( 'settings_id', 'slug' );
			$avail_tags = eh_crm_get_settings( $args, $fields );
			for ( $i = 0; $i < count( $avail_tags ); $i++ ) {
				if ( $avail_tags[ $i ]['slug'] == $tag_remove ) {
					eh_crm_delete_settings( $avail_tags[ $i ]['settings_id'] );
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_tags.php';
			$data['tags'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			$data['views'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			$data['triggers'] = ob_get_clean();
			die(
				json_encode( $data )
			);
		}
	}

	public static function eh_crm_ticket_tag() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$new_tag  = json_decode( stripslashes( isset( $_POST['new_tag'] ) ? sanitize_text_field( $_POST['new_tag'] ) : '' ), true );
			$edit_tag = json_decode( stripslashes( isset( $_POST['edit_tag'] ) ? sanitize_text_field( $_POST['edit_tag'] ) : '' ), true );
			if ( ! empty( $new_tag ) ) {
				$insert = array(
					'title'  => $new_tag['title'],
					'filter' => $new_tag['filter'],
					'type'   => 'tag',
					'vendor' => '',
				);
				$meta   = array( 'tag_posts' => $new_tag['posts'] );
				eh_crm_insert_settings( $insert, $meta );
			}
			if ( ! empty( $edit_tag ) ) {
				$edit_slug   = $edit_tag['slug'];
				$edit_title  = $edit_tag['title'];
				$edit_filter = $edit_tag['filter'];
				$edit_posts  = $edit_tag['posts'];
				$tag_data    = eh_crm_get_settings(
					array(
						'slug' => $edit_slug,
						'type' => 'tag',
					),
					'settings_id'
				);
				$tag_id      = $tag_data[0]['settings_id'];
				eh_crm_update_settings(
					$tag_id,
					array(
						'title'  => $edit_title,
						'filter' => $edit_filter,
					)
				);
				eh_crm_update_settingsmeta( $tag_id, 'tag_posts', $edit_posts );
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_tags.php';
			$data['tags'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			$data['views'] = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			$data['triggers'] = ob_get_clean();
			die(
				json_encode( $data )
			);
		}
	}

	public static function eh_crm_ticket_tag_edit() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$tag      = isset( $_POST['tag'] ) ? sanitize_text_field( $_POST['tag'] ) : '';
			$args     = array(
				'slug' => $tag,
				'type' => 'tag',
			);
			$fields   = array( 'settings_id', 'title', 'filter' );
			$tag_sett = eh_crm_get_settings( $args, $fields );
			$tag_meta = eh_crm_get_settingsmeta( $tag_sett[0]['settings_id'] );
			$yes      = '';
			$no       = '';
			if ( 'yes' == $tag_sett[0]['filter'] ) {
				$yes = 'checked';
				$no  = '';
			} else {
				$yes = '';
				$no  = 'checked';
			}
			$response = array();
			if ( ! empty( $tag_meta['tag_posts'] ) ) {
				$args_post = array(
					'orderby'     => 'ID',
					'numberposts' => -1,
					'post_type'   => array( 'post', 'product' ),
					'post__in'    => $tag_meta['tag_posts'],
				);
				$posts     = get_posts( $args_post );
				for ( $i = 0; $i < count( $posts ); $i++ ) {
					$response[ $i ]['id']    = $posts[ $i ]->ID;
					$response[ $i ]['title'] = $posts[ $i ]->post_title;
				}
			}
			$output = '
							<span class="help-block">' . __( 'Update Details for', 'wsdesk' ) . ' ' . $tag_sett[0]['title'] . ' ' . __( 'Tag?', 'wsdesk' ) . ' </span>
							<input type="text" id="ticket_tag_edit_title" placeholder="' . __( 'Enter Title', 'wsdesk' ) . '" class="form-control crm-form-element-input" value="' . $tag_sett[0]['title'] . '">
							<span class="help-block">' . __( 'Update the Post which should be Tagged if required?', 'wsdesk' ) . ' </span>
							<select class="ticket_tag_edit_posts form-control crm-form-element-input" multiple="multiple">
							';
			if ( ! empty( $response ) ) {
				for ( $i = 0; $i < count( $response ); $i++ ) {
					$output .= '<option value="' . $response[ $i ]['id'] . '" selected title="' . $response[ $i ]['title'] . '"></option>';
				}
			}
			$output .= '</select>
							<span class="help-block">' . __( 'Want to use this Tag for Filter Tickets?', 'wsdesk' ) . ' </span>
							<input type="radio" style="margin-top: 0;"  id="ticket_tag_edit_filter" class="form-control" name="ticket_tag_edit_filter" ' . $yes . ' value="yes"> ' . __( 'Yes! I will use it for Filter', 'wsdesk' ) . '<br>
							<input type="radio" style="margin-top: 0;" id="ticket_tag_edit_filter" class="form-control" name="ticket_tag_edit_filter" ' . $no . ' value="no"> ' . __( 'No! Just for Information', 'wsdesk' );
			wp_send_json_success( array( 'page' => $output ) );
			die;
		}
	}

	public static function eh_crm_ticket_view() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$selected_views = explode( ',', isset( $_POST['selected_views'] ) ? sanitize_text_field( $_POST['selected_views'] ) : '' );
			$new_view       = json_decode( stripslashes( isset( $_POST['new_view'] ) ? sanitize_text_field( $_POST['new_view'] ) : '' ), true );
			$edit_view      = json_decode( stripslashes( isset( $_POST['edit_view'] ) ? sanitize_text_field( $_POST['edit_view'] ) : '' ), true );
			$temp           = eh_crm_get_settings( array( 'type' => 'view' ), array( 'settings_id', 'slug' ) );
			$slug           = array();
			for ( $i = 0; $i < count( $temp ); $i++ ) {
				$slug[ $i ] = $temp[ $i ]['slug'];
			}
			for ( $i = 0; $i < count( $selected_views ); $i++ ) {
				if ( ! in_array( $selected_views[ $i ], $slug ) ) {
					unset( $selected_views[ $i ] );
				}
			}
			eh_crm_update_settingsmeta( '0', 'selected_views', array_values( $selected_views ) );
			if ( ! empty( $new_view ) ) {
				$insert = array(
					'title'  => $new_view['title'],
					'filter' => 'yes',
					'type'   => 'view',
					'vendor' => '',
				);
				$meta   = array(
					'view_format'     => $new_view['format'],
					'view_group'      => $new_view['group'],
					'view_conditions' => $new_view['conditions'],
					'view_access'     => explode( ',', $new_view['access'] ),
				);
				eh_crm_insert_settings( $insert, $meta );
			}
			if ( ! empty( $edit_view ) ) {
				$edit_slug       = $edit_view['slug'];
				$edit_title      = $edit_view['title'];
				$edit_format     = $edit_view['format'];
				$edit_group      = $edit_view['group'];
				$edit_conditions = $edit_view['conditions'];
				$edit_access     = explode( ',', $edit_view['access'] );
				$view_data       = eh_crm_get_settings(
					array(
						'slug' => $edit_slug,
						'type' => 'view',
					),
					'settings_id'
				);
				if ( ! empty( $view_data ) ) {
					$view_id = $view_data[0]['settings_id'];
					eh_crm_update_settings( $view_id, array( 'title' => $edit_title ) );
					eh_crm_update_settingsmeta( $view_id, 'view_format', $edit_format );
					eh_crm_update_settingsmeta( $view_id, 'view_group', $edit_group );
					eh_crm_update_settingsmeta( $view_id, 'view_conditions', $edit_conditions );
					eh_crm_update_settingsmeta( $view_id, 'view_access', $edit_access );
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_ticket_view_activate_deactivate() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$view_id        = isset( $_POST['view_id'] ) ? sanitize_text_field( $_POST['view_id'] ) : '';
			$type           = isset( $_POST['type'] ) ? sanitize_text_field( $_POST['type'] ) : '';
			$selected_views = eh_crm_get_settingsmeta( '0', 'selected_views' );
			if ( ! $selected_views ) {
				$selected_views = array();
			}
			switch ( $type ) {
				case 'activate':
					if ( ! in_array( $view_id, $selected_views ) ) {
						array_push( $selected_views, $view_id );
					}
					eh_crm_update_settingsmeta( '0', 'selected_views', array_values( $selected_views ) );
					break;
				case 'deactivate':
					$key = array_search( $view_id, $selected_views );
					if ( false !== $key ) {
						unset( $selected_views[ $key ] );
					}
					eh_crm_update_settingsmeta( '0', 'selected_views', array_values( $selected_views ) );
					break;
				default:
					break;
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			$output = ob_get_clean();
			wp_send_json_success( array( 'page' => $output ) );
			die;
		}
	}

	public static function eh_crm_ticket_view_delete() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$view_remove    = isset( $_POST['view_remove'] ) ? sanitize_text_field( $_POST['view_remove'] ) : '';
			$args           = array( 'type' => 'view' );
			$fields         = array( 'settings_id', 'slug' );
			$selected_views = eh_crm_get_settingsmeta( '0', 'selected_views' );
			$avail_views    = eh_crm_get_settings( $args, $fields );
			$key            = array_search( $view_remove, $selected_views );
			if ( false !== $key ) {
				unset( $selected_views[ $key ] );
			}
			eh_crm_update_settingsmeta( '0', 'selected_views', array_values( $selected_views ) );
			for ( $i = 0; $i < count( $avail_views ); $i++ ) {
				if ( $avail_views[ $i ]['slug'] == $view_remove ) {
					eh_crm_delete_settings( $avail_views[ $i ]['settings_id'] );
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_settings_views.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_ticket_view_edit() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$view      = isset( $_POST['view'] ) ? sanitize_text_field( $_POST['view'] ) : '';
			$view_sett = eh_crm_get_settings(
				array(
					'slug' => $view,
					'type' => 'view',
				),
				array( 'settings_id', 'title' )
			);
			$view_meta = eh_crm_get_settingsmeta( $view_sett[0]['settings_id'] );
			$and       = '';
			$or        = '';
			if ( 'and' == $view_meta['view_format'] ) {
				$and = 'selected';
				$or  = '';
			} else {
				$and = '';
				$or  = 'selected';
			}
			$script        = eh_crm_get_view_data();
			$options       = $script['options'];
			$view_group    = $view_meta['view_group'];
			$group_by      = $script['group'];
			$group_altered = str_replace( 'value="' . $view_group . '"', 'value="' . $view_group . '" selected', $group_by );
			$conditions    = $view_meta['view_conditions'];
			$access        = $view_meta['view_access'];
			$output        = '
						<span class="help-block">' . __( 'Update title for the view:', 'wsdesk' ) . ' ' . $view_sett[0]['title'] . '</span>
						<input type="text" id="ticket_view_edit_title" placeholder="' . __( 'Enter Title', 'wsdesk' ) . '" value="' . $view_sett[0]['title'] . '" class="form-control crm-form-element-input">
						<span class="help-block">' . __( 'Modify the Conditions Format.', 'wsdesk' ) . '</span>
						<select id="ticket_view_edit_format" style="width: 100% !important;display: inline !important" class="form-control ticket_view_edit_format clickable" aria-describedby="helpBlock">
							<option value="and" ' . $and . '>AND ' . __( 'Condition', 'wsdesk' ) . '</option>
							<option value="or" ' . $or . '>OR ' . __( 'Condition', 'wsdesk' ) . '</option>
						</select>
						<span class="help-block">' . __( 'Modify the View Conditions.', 'wsdesk' ) . '</span>
						<div id="edit_conditions_all">';
					$co    = 1;
			foreach ( $conditions as $cond_key => $cond_value ) {
				$class = '';
				$color = '';
				switch ( $cond_key ) {
					case 'and':
						$class = 'and_grouped grouped';
						$color = 'style="background-color:skyblue;"';
						break;
					case 'or':
						$class = 'or_grouped grouped';
						$color = 'style="background-color:darkseagreen;"';
						break;
					default:
						break;
				}
				foreach ( $cond_value as $grp_single ) {
						$cond_type       = $grp_single['type'];
						$options_altered = str_replace( 'value="' . $cond_type . '"', 'value="' . $cond_type . '" selected', $options );
						$cond_oper       = $grp_single['operator'];
						$cond_val        = $grp_single['value'];
						$cond_data       = $script[ $cond_type ];
						$output         .= '
								<div id="edit_conditions_' . $co . '" class="edit_specify_conditions ' . $class . '" ' . $color . '>
									<span class="edit_condition_title_span">' . __( 'Condition', 'wsdesk' ) . ' ' . $co . '</span>';
					if ( 1 !== $co ) {
						$output .= '
											<select id="edit_conditions_' . $co . '_type" title="' . __( 'View condition field', 'wsdesk' ) . '" style="width: 90% !important;display: inline !important" class="form-control edit_conditions_type clickable" aria-describedby="helpBlock">
												' . $options_altered . '
											</select>
											<button class="btn btn-warning" title="' . __( 'Remove Condition', 'wsdesk' ) . '" id="ticket_view_edit_conditions_remove" style="padding: 5px 8px;margin:0px 4px; vertical-align: baseline;"><span class="glyphicon glyphicon-minus"></span></button>';
					} else {
						$output .= '
											<select id="edit_conditions_' . $co . '_type" title="' . __( 'View condition field', 'wsdesk' ) . '" style="width: 100% !important;display: inline !important" class="form-control edit_conditions_type clickable" aria-describedby="helpBlock">
												' . $options_altered . '
											</select>';
					}
							$output .= '
									<div id="edit_conditions_' . $co . '_append">';
							$output .= '<select id="edit_conditions_' . $co . '_operator" style="width: 100% !important; margin:10px 0px; display: inline !important" class="form-control edit_conditions_' . $co . '_operator clickable" aria-describedby="helpBlock">';
					foreach ( $cond_data['operator'] as $op_key => $op_value ) {
						$output .= '<option value="' . $op_key . '" ' . ( ( $op_key == $cond_oper ) ? 'selected' : '' ) . '>' . $op_value . '</option>';
					}
							$output .= '</select>';
					switch ( $cond_data['type'] ) {
						case 'text':
							$output .= '<input type="text" id="edit_conditions_' . $co . '_value" placeholder="' . __( 'Enter Value', 'wsdesk' ) . '" class="form-control crm-form-element-input" value="' . $cond_val . '">';
							break;
						case 'select':
							$output .= '<select id="edit_conditions_' . $co . '_value" style="width: 100% !important; margin-bottom:10px; display: inline !important" class="form-control edit_conditions_' . $co . '_value clickable" aria-describedby="helpBlock">';
							foreach ( $cond_data['values'] as $val_key => $val_value ) {
								$output .= '<option value="' . $val_key . '" ' . ( ( $val_key == $cond_val ) ? 'selected' : '' ) . '>' . $val_value . '</option>';
							}
							$output .= '</select>';
							break;
						case 'multiselect':
							$output .= '<select multiple id="edit_conditions_' . $co . '_value" style="width: 100% !important; margin-bottom:10px; display: inline !important" class="form-control trigger_select2 edit_conditions_' . $co . '_value" aria-describedby="helpBlock">';
							foreach ( $cond_data['values'] as $val_key => $val_value ) {
								foreach ( $cond_val as $si_value ) {
									$output .= '<option value="' . $val_key . '" ' . ( ( $val_key == $si_value ) ? 'selected' : '' ) . '>' . $val_value . '</option>';
								}
							}
									$output .= '</select>';
							break;
					}
						$output .= '
									</div>
								</div>';
						$co++;
				}
			}
				unset( $script['options'] );
				unset( $script['group'] );
				$output .= '
                    </div>
                    <button class="button" id="ticket_view_edit_conditions_add" title="' . __( 'Add New Condition', 'wsdesk' ) . '" style="vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-plus"></span> ' . __( 'Add Condition', 'wsdesk' ) . '</button>
                    <button class="button" id="ticket_view_edit_conditions_group_and" title="' . __( 'Group those with AND Condition', 'wsdesk' ) . '" style="background-color:skyblue; vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-link"></span> ' . __( 'Group with AND', 'wsdesk' ) . '</button>
                    <button class="button" id="ticket_view_edit_conditions_group_or" title="' . __( 'Group those with OR Condition', 'wsdesk' ) . '" style="background-color:darkseagreen;vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-resize-horizontal"></span> ' . __( 'Group with OR', 'wsdesk' ) . '</button>
                    <button class="button" id="ticket_view_edit_conditions_group_clear" title="' . __( 'Clear Groups', 'wsdesk' ) . '" style="background-color:orange;vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-remove"></span> ' . __( 'Clear Groups', 'wsdesk' ) . '</button>
                    <span class="help-block">' . __( 'Group the tickets by', 'wsdesk' ) . '</span>
                    <select id="group_by_view_edit" title="' . __( 'View Group By', 'wsdesk' ) . '" style="width: 100% !important;margin-bottom: 10px;display: inline !important" class="form-control group_by_view_edit clickable" aria-describedby="helpBlock">
                        ' . $group_altered . '
                    </select>
                    <span class="help-block">' . __( 'Display this view to', 'wsdesk' ) . ' </span>
                    <input type="checkbox" style="margin-top: 0;"  id="ticket_view_display_control_edit" class="form-control" name="ticket_view_display_control_edit" value="administrator" ' . ( ( in_array( 'administrator', $access ) ) ? 'checked' : '' ) . '> Administrator
                    <input type="checkbox" style="margin-top: 0;" id="ticket_view_display_control_edit" class="form-control" name="ticket_view_display_control_edit" value="WSDesk_Agents" ' . ( ( in_array( 'WSDesk_Agents', $access ) ) ? 'checked' : '' ) . '> WSDesk Agents
                    <input type="checkbox" style="margin-top: 0;" id="ticket_view_display_control_edit" class="form-control" name="ticket_view_display_control_edit" value="WSDesk_Supervisor" ' . ( ( in_array( 'WSDesk_Supervisor', $access ) ) ? 'checked' : '' ) . '> WSDesk Supervisors
                    <script type="text/javascript">
                        var edit_values = ' . json_encode( $script ) . '
                        jQuery("#ticket_views_tab").on("change",".edit_conditions_type",function(){
                            if(jQuery(this).val() !== "")
                            {
                                views_condition_maker(edit_values[jQuery(this).val()],jQuery(this).parent().prop("id"));
                            }
                            else
                            {
                                var parent_id = jQuery(this).parent().prop("id");
                                jQuery("#"+parent_id+"_append").empty();
                            }
                        });
                    </script>
                    ';
			wp_send_json_success( array( 'page' => $output ) );
			die;
		}
	}

	public static function eh_crm_ticket_trigger_activate_deactivate() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$trigger_id        = isset( $_POST['trigger_id'] ) ? sanitize_text_field( $_POST['trigger_id'] ) : '';
			$type              = isset( $_POST['type'] ) ? sanitize_text_field( $_POST['type'] ) : '';
			$selected_triggers = eh_crm_get_settingsmeta( '0', 'selected_triggers' );
			if ( empty( $selected_triggers ) ) {
				$selected_triggers = array();
			}
			switch ( $type ) {
				case 'activate':
					if ( ! in_array( $trigger_id, $selected_triggers ) ) {
						array_push( $selected_triggers, $trigger_id );
					}
					eh_crm_update_settingsmeta( '0', 'selected_triggers', array_values( $selected_triggers ) );
					break;
				case 'deactivate':
					$key = array_search( $trigger_id, $selected_triggers );
					if ( false !== $key ) {
						unset( $selected_triggers[ $key ] );
					}
					eh_crm_update_settingsmeta( '0', 'selected_triggers', array_values( $selected_triggers ) );
					break;
				default:
					break;
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_trigger() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$new_trigger  = isset( $_POST['new_trigger'] ) ? wp_kses_post( $_POST['new_trigger'] ) : '';
			$new_trigger  = json_decode( stripslashes( $new_trigger ), true );
			$edit_trigger = json_decode( stripslashes( isset( $_POST['edit_trigger'] ) ? wp_kses_post( $_POST['edit_trigger'] ) : '' ), true );
			$repo         = new SettingsRepository();

			if ( ! empty( $new_trigger ) ) {

				$triggers = $repo->filter(
					array(
						'type'  => 'trigger',
						'title' => $new_trigger['title'],
					)
				);

				if ( count( $triggers ) ) {
					wp_send_json_error(
						array(
							'message' => __( 'The trigger name is exists already', 'wsdesk' ),
						)
					);
				}

				$insert = array(
					'title'  => $new_trigger['title'],
					'filter' => 'yes',
					'type'   => 'trigger',
					'vendor' => '',
				);
				$meta   = array(
					'trigger_format'     => $new_trigger['format'],
					'trigger_conditions' => $new_trigger['conditions'],
					'trigger_actions'    => $new_trigger['actions'],
				);
				if ( isset( $new_trigger['schedule'] ) && '' !== $new_trigger['schedule'] ) {
					$meta['trigger_schedule'] = $new_trigger['schedule'];
					if ( isset( $new_trigger['period'] ) ) {
						$meta['trigger_period'] = $new_trigger['period'];
					} else {
						$meta['trigger_period'] = 1;
					}
				} else {
					$meta['trigger_schedule'] = $new_trigger['schedule'];
				}
				eh_crm_insert_settings( $insert, $meta );
			}
			if ( ! empty( $edit_trigger ) ) {
				$edit_slug       = $edit_trigger['slug'];
				$edit_title      = $edit_trigger['title'];
				$edit_format     = $edit_trigger['format'];
				$edit_conditions = $edit_trigger['conditions'];
				$edit_actions    = $edit_trigger['actions'];
				$trigger_data    = eh_crm_get_settings(
					array(
						'slug' => $edit_slug,
						'type' => 'trigger',
					),
					'settings_id'
				);

				$triggers = $repo->filter(
					array(
						'type'  => 'trigger',
						'title' => $edit_title,
					)
				);

				$triggers = array_filter(
					$triggers,
					function ( $trigger ) use ( $trigger_data ) {
					return $trigger['settings_id'] !== $trigger_data[0]['settings_id'];
					}
				);

				if ( count( $triggers ) ) {
					wp_send_json_error(
						array(
							'message' => __( 'The trigger name is exists already', 'wsdesk' ),
						)
					);
				}

				if ( ! empty( $trigger_data ) ) {
					$trigger_id = $trigger_data[0]['settings_id'];
					eh_crm_update_settings( $trigger_id, array( 'title' => $edit_title ) );
					eh_crm_update_settingsmeta( $trigger_id, 'trigger_format', $edit_format );
					eh_crm_update_settingsmeta( $trigger_id, 'trigger_conditions', $edit_conditions );
					eh_crm_update_settingsmeta( $trigger_id, 'trigger_actions', $edit_actions );
					if ( isset( $edit_trigger['schedule'] ) && '' !== $edit_trigger['schedule'] ) {
						eh_crm_update_settingsmeta( $trigger_id, 'trigger_schedule', $edit_trigger['schedule'] );
						if ( isset( $edit_trigger['period'] ) ) {
							eh_crm_update_settingsmeta( $trigger_id, 'trigger_period', $edit_trigger['period'] );
						} else {
							eh_crm_update_settingsmeta( $trigger_id, 'trigger_period', 1 );
						}
					} else {
						eh_crm_update_settingsmeta( $trigger_id, 'trigger_schedule', $edit_trigger['schedule'] );
						eh_crm_update_settingsmeta( $trigger_id, 'trigger_period', '' );
					}
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			$output = ob_get_clean();
			wp_send_json_success( array( 'page' => $output ) );
			die;
		}
	}

	public static function eh_crm_ticket_trigger_delete() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			$trigger_remove    = isset( $_POST['trigger_remove'] ) ? sanitize_text_field( $_POST['trigger_remove'] ) : '';
			$args              = array( 'type' => 'trigger' );
			$fields            = array( 'settings_id', 'slug' );
			$selected_triggers = eh_crm_get_settingsmeta( '0', 'selected_triggers' );
			if ( ! $selected_triggers ) {
				$selected_triggers = array();
			}
			$avail_triggers = eh_crm_get_settings( $args, $fields );
			$key            = array_search( $trigger_remove, $selected_triggers );
			if ( false !== $key ) {
				unset( $selected_triggers[ $key ] );
			}
			eh_crm_update_settingsmeta( '0', 'selected_triggers', array_values( $selected_triggers ) );
			for ( $i = 0; $i < count( $avail_triggers ); $i++ ) {
				if ( $avail_triggers[ $i ]['slug'] == $trigger_remove ) {
					eh_crm_delete_settings( $avail_triggers[ $i ]['settings_id'] );
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'settings/crm_wsdesk_triggers.php';
			wp_send_json_success( array( 'page' => ob_get_clean() ) );
			die;
		}
	}

	public static function eh_crm_trigger_edit() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

		$trigger      = isset( $_POST['trigger'] ) ? sanitize_text_field( $_POST['trigger'] ) : '';
		$trigger_sett = eh_crm_get_settings(
			array(
				'slug' => $trigger,
				'type' => 'trigger',
			),
			array( 'settings_id', 'title' )
		);
		$trigger_meta = eh_crm_get_settingsmeta( $trigger_sett[0]['settings_id'] );
		$and          = '';
		$or           = '';
			if ( 'and' == $trigger_meta['trigger_format'] ) {
				$and = 'selected';
				$or  = '';
			} else {
				$and = '';
				$or  = 'selected';
			}
		$script     = eh_crm_get_trigger_data();
		$tascript   = eh_crm_get_trigger_action_data();
		$options    = $script['options'];
		$taoptions  = $tascript['options'];
		$conditions = $trigger_meta['trigger_conditions'];
		$actions    = $trigger_meta['trigger_actions'];
		$schedule   = '';
			if ( isset( $trigger_meta['trigger_schedule'] ) ) {
				$schedule = $trigger_meta['trigger_schedule'];
			}
		$output     = '
                    <span class="help-block">' . __( 'Update Details for', 'wsdesk' ) . ' ' . $trigger_sett[0]['title'] . ' ' . __( 'trigger?', 'wsdesk' ) . ' </span>
                    <input type="text" id="trigger_edit_title" placeholder="' . __( 'Enter Title', 'wsdesk' ) . '" value="' . $trigger_sett[0]['title'] . '" class="form-control crm-form-element-input">
                    <span class="crm-divider"></span>
                    <span><b>' . __( 'Match Triggers Conditions', 'wsdesk' ) . '</b></span>
                    <span class="crm-divider"></span>
                    <span class="help-block">' . __( 'Modify the Conditions Format.', 'wsdesk' ) . '</span>
                    <select id="trigger_edit_format" style="width: 100% !important;display: inline !important" class="form-control trigger_edit_format clickable" aria-describedby="helpBlock">
                        <option value="and" ' . $and . '>AND ' . __( 'Condition', 'wsdesk' ) . '</option>
                        <option value="or" ' . $or . '>OR ' . __( 'Condition', 'wsdesk' ) . '</option>
                    </select>
                    <span class="help-block">' . __( 'Modify the trigger Conditions.', 'wsdesk' ) . '</span>
                    <div id="edit_tconditions_all">';
				$co = 1;
			foreach ( $conditions as $cond_key => $cond_value ) {
				$class = '';
				$color = '';
				switch ( $cond_key ) {
					case 'and':
						$class = 'and_tgrouped tgrouped';
						$color = 'style="background-color:skyblue;"';
						break;
					case 'or':
						$class = 'or_tgrouped tgrouped';
						$color = 'style="background-color:darkseagreen;"';
						break;
					default:
						break;
				}
				foreach ( $cond_value as $grp_single ) {
					$cond_type       = $grp_single['type'];
					$options_altered = str_replace( 'value="' . $cond_type . '"', 'value="' . $cond_type . '" selected', $options );
					$cond_oper       = $grp_single['operator'];
					$cond_val        = $grp_single['value'];
					$cond_data       = $script[ $cond_type ];
					$output         .= '
                            <div id="edit_tconditions_' . $co . '" class="edit_specify_tconditions ' . $class . '" ' . $color . '>
                                <span class="edit_tcondition_title_span">' . __( 'Condition', 'wsdesk' ) . ' ' . $co . '</span>';
					if ( 1 !== $co ) {
						$output .= '
                                        <select id="edit_tconditions_' . $co . '_type" title="' . __( 'Condition', 'wsdesk' ) . '" style="width: 90% !important;display: inline !important" class="form-control edit_tconditions_type clickable" aria-describedby="helpBlock">
                                            ' . $options_altered . '
                                        </select>
                                        <button class="btn btn-warning" title="' . __( 'Remove Condition', 'wsdesk' ) . '" id="trigger_edit_tconditions_remove" style="padding: 5px 8px;margin:0px 4px; vertical-align: baseline;"><span class="glyphicon glyphicon-minus"></span></button>';
					} else {
						$output .= '
                                        <select id="edit_tconditions_' . $co . '_type" title="' . __( 'Trigger condition field', 'wsdesk' ) . '" style="width: 100% !important;display: inline !important" class="form-control edit_tconditions_type clickable" aria-describedby="helpBlock">
                                            ' . $options_altered . '
                                        </select>';
					}
						$output .= '
                                <div id="edit_tconditions_' . $co . '_append">';
						$output .= '<select id="edit_tconditions_' . $co . '_operator" style="width: 100% !important; margin:10px 0px; display: inline !important" class="form-control edit_tconditions_' . $co . '_operator clickable" aria-describedby="helpBlock">';
					foreach ( $cond_data['operator'] as $op_key => $op_value ) {
						$output .= '<option value="' . $op_key . '" ' . ( ( $op_key == $cond_oper ) ? 'selected' : '' ) . '>' . $op_value . '</option>';
					}
						$output .= '</select>';
					switch ( $cond_data['type'] ) {
						case 'text':
							$output .= '<input type="text" id="edit_tconditions_' . $co . '_value" placeholder="' . __( 'Enter Value', 'wsdesk' ) . '" class="form-control crm-form-element-input" value="' . $cond_val . '">';
							break;
						case 'select':
							$output .= '<select id="edit_tconditions_' . $co . '_value" style="width: 100% !important; margin-bottom:10px; display: inline !important" class="form-control edit_tconditions_' . $co . '_value clickable" aria-describedby="helpBlock">';
							foreach ( $cond_data['values'] as $val_key => $val_value ) {
								$output .= '<option value="' . $val_key . '" ' . ( ( $val_key == $cond_val ) ? 'selected' : '' ) . '>' . $val_value . '</option>';
							}
							$output .= '</select>';
							break;
						case 'multiselect':
							$output .= '<select multiple id="edit_tconditions_' . $co . '_value" style="width: 100% !important; margin-bottom:10px; display: inline !important" class="form-control trigger_tselect2_edit edit_tconditions_' . $co . '_value" aria-describedby="helpBlock">';
							foreach ( $cond_data['values'] as $val_key => $val_value ) {
								$output .= '<option value="' . $val_key . '" ' . ( ( in_array( $val_key, $cond_val ) ) ? 'selected' : '' ) . '>' . $val_value . '</option>';
							}
							$output .= '</select>';
							break;
					}
					$output .= '
                                </div>
                            </div>';
					$co++;
				}
			}
				unset( $script['options'] );
				$output .= '
                    </div>
                    <button class="button" id="trigger_edit_tconditions_add" title="' . __( 'Add New Condition', 'wsdesk' ) . '" style="vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-plus"></span> ' . __( 'Add Condition', 'wsdesk' ) . '</button>
                    <button class="button" id="trigger_edit_tconditions_group_and" title="' . __( 'Group those with AND Condition', 'wsdesk' ) . '" style="background-color:skyblue; vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-link"></span> ' . __( 'Group with AND', 'wsdesk' ) . '</button>
                    <button class="button" id="trigger_edit_tconditions_group_or" title="' . __( 'Group those with OR Condition', 'wsdesk' ) . '" style="background-color:darkseagreen;vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-resize-horizontal"></span> ' . __( 'Group with OR', 'wsdesk' ) . '</button>
                    <button class="button" id="trigger_edit_tconditions_group_clear" title="' . __( 'Clear Groups', 'wsdesk' ) . '" style="background-color:orange;vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-remove"></span> ' . __( 'Clear Groups', 'wsdesk' ) . '</button>
                    <span class="crm-divider"></span>
                    <span><b>' . __( 'Perform Triggers Actions', 'wsdesk' ) . '</b></span>
                    <span class="crm-divider"></span>
                    <span class="help-block">' . __( 'Specify the Trigger Actions.', 'wsdesk' ) . '</span>
                    <div id="edit_tactions_all">';
				$co      = 1;
			foreach ( $actions as $act_single ) {
				$act_type        = $act_single['type'];
				$options_altered = str_replace( 'value="' . $act_type . '"', 'value="' . $act_type . '" selected', $taoptions );
				$act_val         = $act_single['value'];
				$act_data        = $tascript[ $act_type ];
				$output         .= '
                        <div id="edit_tactions_' . $co . '" class="edit_specify_tactions">
                            <span class="edit_taction_title_span">' . __( 'Action', 'wsdesk' ) . ' ' . $co . '</span>';
				if ( 1 !== $co ) {
					$output .= '
                                    <select id="edit_tactions_' . $co . '_type" title="' . __( 'Trigger Action field', 'wsdesk' ) . '" style="width: 90% !important;display: inline !important;margin-bottom:10px; " class="form-control edit_tactions_type clickable" aria-describedby="helpBlock">
                                        ' . $options_altered . '
                                    </select>
                                    <button class="btn btn-warning" title="' . __( 'Remove Condition', 'wsdesk' ) . '" id="trigger_edit_tconditions_remove" style="padding: 5px 8px;margin:0px 4px; vertical-align: baseline;"><span class="glyphicon glyphicon-minus"></span></button>';
				} else {
						$output .= '
                                    <select id="edit_tactions_' . $co . '_type" title="' . __( 'Trigger Action field', 'wsdesk' ) . '" style="width: 100% !important;display: inline !important;margin-bottom:10px; " class="form-control edit_tactions_type clickable" aria-describedby="helpBlock">
                                        ' . $options_altered . '
                                    </select>';
				}
						$output .= '
                            <div id="edit_tactions_' . $co . '_append">';
				switch ( $act_data['type'] ) {
					case 'sms':
						 $output .= '<select multiple id="edit_tactions_' . $co . '_value" style="width: 100% !important;display: inline !important;margin-bottom:10px;" class="form-control trigger_tselect2_edit edit_tactions_' . $co . '_value clickable" aria-describedby="helpBlock">';
						foreach ( $act_data['values'] as $val_key => $val_value ) {
							$output .= '<option value="' . $val_key . '" ' . ( ( in_array( $val_key, $act_val ) ) ? 'selected' : '' ) . '>' . $val_value . '</option>';
						}
						$body_not = $act_single['body'];
						$output  .= '</select>
                                        <span class="help-block">' . __( 'Specify the SMS Body.', 'wsdesk' ) . '</span>
                                        <textarea id="edit_tactions_' . $co . '_body" class="trigger_textarea_edit form-control " placeholder="' . __( 'Enter mail body', 'wsdesk' ) . '">' . str_replace( '<br>', '&#13;&#10;', $body_not ) . '</textarea>';
						break;
					case 'chat':
								 $output     .= '';
								 $subject_not = $act_single['subject'];
								 $body_not    = $act_single['body'];
								 $output     .= '
                                        </br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#email_reply_role" data-target="#content_reply_email">
                                                <span class ="email-reply-toggle"></span>
                                                <h4 class="panel-title">
                                                    ' . __( 'Codes for Notification Google Chat', 'wsdesk' ) . '
                                                </h4>
                                            </div>
                                            <div id="content_reply_email" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [id]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Number in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [assignee]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Assignee in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [tags]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Tags in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [date]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Date and Time in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [latest_reply]
                                                            </div>
                                                            <div class="col-md-9">
                                                               ' . __( 'To Insert Latest Ticket Reply in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [agent_replied]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Agent who replied in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [status]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Status in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [satisfication_data]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Satisfaction URL in the notification SMS', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [conversation_history]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Entire Conversation of the Ticket in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <!--<span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [conversation_history_with_agent_note]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Conversation History with agent note in the notification email', 'wsdesk' ) . '
                                                            </div>
                                                        </div>-->
                                                        <span class="crm-divider"></span>';

														$avail_fields    = eh_crm_get_settings( array( 'type' => 'field' ), array( 'slug', 'title', 'settings_id' ) );
														$selected_fields = eh_crm_get_settingsmeta( 0, 'selected_fields' );
						if ( empty( $selected_fields ) ) {
							$selected_fields = array();
						}
						foreach ( $avail_fields as $field ) {
							if ( 'google_captcha' === $field['slug'] || ! in_array( $field['slug'], $selected_fields ) ) {
																   continue;
							}

							$output .= '  <span class="crm-divider"></span>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            [' . $field['slug'] . ']
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                           ' . __( 'To insert ', 'wsdesk' ) . ' ' . $field['title'] . ' ' . __( 'field value in the template', 'wsdesk' ) . '
                                                                        </div>
                                                                    </div>';
						}
													$output .= '
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group"><span class="input-group-addon" id="basic-addon1">' . __( 'Webhook URL', 'wsdesk' ) . ' </span>
                                        <input type="text" id="edit_tactions_' . $co . '_subject" placeholder="' . __( 'Enter the webhook url', 'wsdesk' ) . '" class="form-control crm-form-element-input" aria-describedby="helpBlock" value="' . $subject_not . '">
                                            </div>
                                        <span class="help-block">' . __( 'Specify the Chat Body. Refer the Shortcode in Email Setup Page.', 'wsdesk' ) . '</span>
                                        <textarea id="edit_tactions_' . $co . '_body" class="form-control trigger_textarea_edit crm-form-element-input crm-input-textarea-body" placeholder="' . __( 'Enter google chat body', 'wsdesk' ) . '">' . str_replace( '<br>', '&#13;&#10;', $body_not ) . '</textarea>';
						break;
					case 'notification':
						$output .= '<select multiple id="edit_tactions_' . $co . '_value" style="width: 100% !important;display: inline !important;margin-bottom:10px;" class="form-control trigger_tselect2_edit edit_tactions_' . $co . '_value clickable" aria-describedby="helpBlock">';
						foreach ( $act_data['values'] as $val_key => $val_value ) {
							$output .= '<option value="' . $val_key . '" ' . ( ( in_array( $val_key, $act_val ) ) ? 'selected' : '' ) . '>' . $val_value . '</option>';
						}
						$subject_not = $act_single['subject'];
						$body_not    = $act_single['body'];
						$output     .= '</select>
                                        <span class="help-block">' . __( 'Modify the Mail Subject. Refer the Shortcode in Email Setup Page.', 'wsdesk' ) . '</span>
                                        </br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#email_reply_role" data-target="#content_reply_email">
                                                <span class ="email-reply-toggle"></span>
                                                <h4 class="panel-title">
                                                    ' . __( 'Codes for Notification EMail', 'wsdesk' ) . '
                                                </h4>
                                            </div>
                                            <div id="content_reply_email" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [id]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Number in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [assignee]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Assignee in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [tags]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Tags in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [date]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Date and Time in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [latest_reply]
                                                            </div>
                                                            <div class="col-md-9">
                                                               ' . __( 'To Insert Latest Ticket Reply in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [agent_replied]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Agent who replied in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [status]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Ticket Status in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [satisfication_data]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Satisfaction URL in the notification Email', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [conversation_history]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Entire Conversation of the Ticket in the Reply', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <!--<span class="crm-divider"></span>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                [conversation_history_with_agent_note]
                                                            </div>
                                                            <div class="col-md-9">
                                                                ' . __( 'To Insert Conversation History with agent note in the notification email', 'wsdesk' ) . '
                                                            </div>
                                                        </div>
                                                        <span class="crm-divider"></span>-->';

						if ( EH_CRM_PAY_FOR_SUPPORT_STATUS ) {
							$output .= '<span class="crm-divider"></span>
									<div class="row">
										<div class="col-md-3">
											[pfs_credit_score]
										</div>
										<div class="col-md-9">
											' . __( 'To Insert Pay For Support Credit Score of the User', 'wsdesk' ) . '
										</div>
									</div>';
						}

										$avail_fields    = eh_crm_get_settings( array( 'type' => 'field' ), array( 'slug', 'title', 'settings_id' ) );
										$selected_fields = eh_crm_get_settingsmeta( 0, 'selected_fields' );
						if ( empty( $selected_fields ) ) {
							$selected_fields = array();
						}
						foreach ( $avail_fields as $field ) {
							if ( 'google_captcha' === $field['slug'] || ! in_array( $field['slug'], $selected_fields ) ) {
								continue;
							}

							  $output .= '  <span class="crm-divider"></span>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            [' . $field['slug'] . ']
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                           ' . __( 'To insert ', 'wsdesk' ) . ' ' . $field['title'] . ' ' . __( 'field value in the template', 'wsdesk' ) . '
                                                                        </div>
                                                                    </div>';
						}
									$output .= '
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group"><span class="input-group-addon" id="basic-addon1">' . __( 'Ticket', 'wsdesk' ) . ' [id] : </span>
                                        <input type="text" id="edit_tactions_' . $co . '_subject" placeholder="' . __( 'Enter mail subject', 'wsdesk' ) . '" class="form-control crm-form-element-input" aria-describedby="helpBlock" value="' . $subject_not . '">
                                            </div>
                                        <span class="help-block">' . __( 'Specify the Mail Body. Refer the Shortcode in Email Setup Page.', 'wsdesk' ) . '</span>
                                        <div id="edit_tactions_' . $co . '_body" class="trigger_textarea_edit " data-notification-email="' . $co . '"  style="min-height: 100px" placeholder="' . __( 'Enter mail body', 'wsdesk' ) . '">' . str_replace( '<br>', '&#13;&#10;', $body_not ) . '</div>';
						break;
					case 'text':
						$output .= '<input type="text" id="edit_tactions_' . $co . '_value" placeholder="' . __( 'Enter Value', 'wsdesk' ) . '" class="form-control crm-form-element-input" value="' . $act_val . '">';
						break;
					case 'select':
						$output .= '<select id="edit_tactions_' . $co . '_value" style="width: 100% !important; margin-bottom:10px; display: inline !important" class="form-control edit_tactions_' . $co . '_value clickable" aria-describedby="helpBlock">';
						foreach ( $act_data['values'] as $val_key => $val_value ) {
							$output .= '<option value="' . $val_key . '" ' . ( ( $val_key == $act_val ) ? 'selected' : '' ) . '>' . $val_value . '</option>';
						}
						$output .= '</select>';
						break;
					case 'multiselect':
						$output .= '<select multiple id="edit_tactions_' . $co . '_value" style="width: 100% !important; margin-bottom:10px; display: inline !important" class="form-control trigger_tselect2_edit edit_tactions_' . $co . '_value" aria-describedby="helpBlock">';
						foreach ( $act_data['values'] as $val_key => $val_value ) {
							foreach ( $act_val as $si_value ) {
								$output .= '<option value="' . $val_key . '" ' . ( ( $val_key == $si_value ) ? 'selected' : '' ) . '>' . $val_value . '</option>';
							}
						}
						$output .= '</select>';
						break;
				}
						$output .= '
                            </div>
                        </div>';
						$co++;
			}
				unset( $script['options'] );
				unset( $tascript['options'] );
				$output .= '
                        </div>
                    </div>
                    <button class="button" id="trigger_edit_tactions_add" title="' . __( 'Add New Action', 'wsdesk' ) . '" style="vertical-align: baseline;margin-bottom: 10px;margin-top: 10px;"><span class="glyphicon glyphicon-plus"></span> ' . __( 'Add Action', 'wsdesk' ) . '</button>
                    <span class="crm-divider"></span>
                    <span class="help-block">' . __( 'Modify the Triggering Period.', 'wsdesk' ) . '</span>
                    <select id="trigger_edit_schedule" style="width: 100% !important;display: inline !important" class="form-control trigger_edit_schedule clickable" aria-describedby="helpBlock">
                        <option value="" ' . ( ( '' == $schedule ) ? 'selected' : '' ) . '>' . __( 'Immediate Schedule', 'wsdesk' ) . '</option>
                        <option value="min" ' . ( ( 'min' == $schedule ) ? 'selected' : '' ) . '>' . __( 'Minute Schedule', 'wsdesk' ) . '</option>
                        <option value="hour" ' . ( ( 'hour' == $schedule ) ? 'selected' : '' ) . '>' . __( 'Hour Schedule', 'wsdesk' ) . '</option>
                        <option value="day" ' . ( ( 'day' == $schedule ) ? 'selected' : '' ) . '>' . __( 'Day Schedule', 'wsdesk' ) . '</option>
                        <option value="week" ' . ( ( 'week' == $schedule ) ? 'selected' : '' ) . '>' . __( 'Week Schedule', 'wsdesk' ) . '</option>
                        <option value="month" ' . ( ( 'month' == $schedule ) ? 'selected' : '' ) . '>' . __( 'Month Schedule', 'wsdesk' ) . '</option>
                        <option value="year" ' . ( ( 'year' == $schedule ) ? 'selected' : '' ) . '>' . __( 'Year Schedule', 'wsdesk' ) . '</option>
                    </select>
                    <span id="trigger_schedule_append_edit">';
			if ( '' !== $schedule ) {
				$output .= '<span class="help-block">' . __( 'Edit Period for Trigger?', 'wsdesk' ) . ' </span><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" min="0" id="trigger_edit_period" placeholder="How much ' . $schedule . '" class="form-control crm-form-element-input" value="' . $trigger_meta['trigger_period'] . '">';
			}
				$output .= '
                    </span>
                    <script type="text/javascript">
                        var edit_tvalues = ' . json_encode( $script ) . '
                        jQuery("#triggers_tab").on("change",".edit_tconditions_type",function(){
                            if(jQuery(this).val() !== "")
                            {
                                triggers_condition_maker(edit_tvalues[jQuery(this).val()],jQuery(this).parent().prop("id"));
                            }
                            else
                            {
                                var parent_id = jQuery(this).parent().prop("id");
                                jQuery("#"+parent_id+"_append").empty();
                            }
                        });
                        var edit_tavalues = ' . json_encode( $tascript ) . '
                        jQuery("#triggers_tab").on("change",".edit_tactions_type",function(){
                            if(jQuery(this).val() !== "")
                            {
                                triggers_action_maker(edit_tavalues[jQuery(this).val()],jQuery(this).parent().prop("id"));
                            }
                            else
                            {
                                var parent_id = jQuery(this).parent().prop("id");
                                jQuery("#"+parent_id+"_append").empty();
                            }
                        });
                    </script>
                    ';
			wp_send_json_success( array( 'page' => $output ) );
			die;
		}
	}

	public static function eh_crm_search_post() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			global $wpdb;
			$show_excerpt_in_auto_suggestion = eh_crm_get_settingsmeta( '0', 'show_excerpt_in_auto_suggestion' );
			$table                           = $wpdb->prefix . 'posts';
			$like                            = isset( $_POST['q'] ) ? sanitize_text_field( $_POST['q'] ) : '';
			$terms                           = get_term_by( 'slug', $like, 'post_tag' );
			if ( '' != $terms ) {
				$tablename  = $wpdb->prefix . 'term_relationships';
				$tag_result = $wpdb->get_results( $wpdb->prepare( 'SELECT object_id FROM ' . $wpdb->prefix . 'term_relationships WHERE term_taxonomy_id = %s', $terms->term_id ), ARRAY_A ); // object_id for tag suggestion.
			}
			$quote_ids = array();
			$response  = array();
			$results   = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'posts WHERE ( LOWER(post_title) LIKE lower(%s) OR  LOWER(post_content)  LIKE lower(%s) ) AND post_status = %s', '%' . $like . '%', '%' . $like . '%', 'publish' ), ARRAY_A ); // post id for content&titile suggestion.
			$index     = count( $results );
			$merge     = array();
			if ( '' != $terms ) {
				if ( count( $tag_result ) > 0 ) {
					for ( $i = 0; $i < count( $tag_result ); $i++ ) {
						$results[ $index ]['ID'] = $tag_result[ $i ]['object_id'];
						$index++;
					}
				}
			}
			for ( $i = 0; $i < count( $results ); $i++ ) {
				$quote_ids[ $i ] = $results[ $i ]['ID'];
			}

			$args  = array(
				'orderby'     => 'ID',
				'numberposts' => -1,
				'post_type'   => array( 'post', 'product', 'epkb_post_type_1', 'avada_faq' ), // added for compatibility with knowledge base plugin https://wordpress.org/plugins/echo-knowledge-base/ and avada faq
				'post__in'    => $quote_ids,
			);
			$posts = array();
			if ( ! empty( $quote_ids ) ) {
				$posts = get_posts( $args );
			}
			for ( $i = 0; $i < count( $posts ); $i++ ) {
				$response[ $i ]['id']    = $posts[ $i ]->ID;
				$response[ $i ]['title'] = $posts[ $i ]->post_title;
				$response[ $i ]['guid']  = get_permalink( $posts[ $i ]->ID );
				if ( 'enable' != $show_excerpt_in_auto_suggestion ) {
					$response[ $i ]['content'] = ( strlen( $posts[ $i ]->post_content ) > 100 ? substr( $posts[ $i ]->post_content, 0, 100 ) . '...' : $posts[ $i ]->post_content );
				} else {
					$response[ $i ]['content'] = ( strlen( $posts[ $i ]->post_excerpt ) > 100 ? substr( $posts[ $i ]->post_excerpt, 0, 100 ) . '...' : $posts[ $i ]->post_excerpt );
				}
				switch ( $posts[ $i ]->post_type ) {
					case 'post':
						$response[ $i ]['type'] = __( 'Post', 'wsdesk' );
						break;
					case 'product':
						$response[ $i ]['type'] = __( 'Product', 'wsdesk' );
						break;
					case 'epkb_post_type_1':
						$response[ $i ]['type'] = __( 'Knowledge Base Post', 'wsdesk' );
						break;
					case 'avada_faq':
						$response[ $i ]['type'] = __( 'Avada FAQ', 'wsdesk' );
				}
			}
			$res = array(
				'total_count' => count( $posts ),
				'items'       => $response,
				'message'     => __( 'Are you looking for this?', 'wsdesk' ),
			);
			die( json_encode( $res ) );
		}
	}

	public static function eh_crm_search_tags() {
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {
			global $wpdb;
			$table    = $wpdb->prefix . 'wsdesk_settings';
			$like     = isset( $_POST['q'] ) ? sanitize_text_field( $_POST['q'] ) : null;
			$response = array();
			$results  = wpFluent()->table( 'wsdesk_settings' )->where( 'title', 'like', '%' . $like . '%' )->where( 'type', 'tag' )->get();
			// $results      = $wpdb->get_results($sql , ARRAY_A);
			for ( $i = 0; $i < count( $results ); $i++ ) {
				$results[ $i ]           = (array) $results[ $i ];
				$response[ $i ]['id']    = $results[ $i ]['slug'];
				$response[ $i ]['title'] = $results[ $i ]['title'];
				$meta                    = eh_crm_get_settingsmeta( $results[ $i ]['settings_id'], 'tag_posts' );
				if ( $meta ) {
					$post       = get_post( $meta[0] );
					$post_title = strlen( $post->post_title ) > 15 ? substr( $post->post_title, 0, 15 ) : $post->post_title;
				} else {
					$meta = array();
				}
				$res_post = '';
				switch ( count( $meta ) ) {
					case 0:
						$res_post = __( 'No Posts Tagged', 'wsdesk' );
						break;
					case 1:
						$res_post = $post_title;
						break;
					default:
						$res_post = $post_title . ' + ' . ( count( $meta ) - 1 ) . ' more item';
						break;
				}
				$response[ $i ]['posts'] = $res_post;
			}
			$res = array(
				'total_count' => count( $results ),
				'items'       => $response,
			);
			die( json_encode( $res ) );
		}
	}

	public static function eh_crm_agent_add_user() {

		$current_user = wp_get_current_user();
		$user_roles   = $current_user->roles;
	
		if ( ! in_array( 'administrator', $user_roles, true ) && ! in_array( 'WSDesk_Agents', $user_roles, true ) && ! in_array( 'WSDesk_Supervisor', $user_roles, true ) ) {
			wp_send_json_error( array( 'message' => 'Unauthorized User.' ), 403 );
		}
		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$role = isset( $_POST['role'] ) ? sanitize_text_field( $_POST['role'] ) : '';
			switch ( $role ) {
				case 'agents':
					$role = 'WSDesk_Agents';
					break;
				case 'supervisor':
					$role = 'WSDesk_Supervisor';
					break;
				default:
					// If the role is not 'agents' or 'supervisor', return an error.
					wp_send_json_error( array( 'message' => 'Invalid role specified.' ), 400 );
					return;
			}
			if ( ! in_array( 'administrator', $user_roles, true ) && 'administrator' === $role ) {
				wp_send_json_error( array( 'message' => 'Unauthorized User.' ), 403 );
			}
			if ( ! in_array( 'administrator', $user_roles, true ) && ! in_array( 'supervisor', $user_roles, true ) ) {
				wp_send_json_error( array( 'message' => 'Unauthorized User.' ), 403 );
			}
			$rights      = explode( ',', isset( $_POST['rights'] ) ? sanitize_text_field( $_POST['rights'] ) : '' );
			$user_pass   = isset( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';
			$user_email  = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
			$email_check = email_exists( $user_email );
			$tags        = ( ( '' !== isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : '' ) ? explode( ',', isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : '' ) : null );
			$message     = '';
			$code        = '';
			if ( $email_check ) {
				$message = 'Email already exists';
				$code    = 'failed';

			} else {
				$maybe_username = explode( '@', $user_email );
				$maybe_username = sanitize_user( $maybe_username[0] );
				$counter        = 1;
				$username       = $maybe_username;

				while ( username_exists( $username ) ) {
					$username = $maybe_username . $counter;
					$counter++;
				}
				$user_login = $username;
				$userdata   = compact( 'user_login', 'user_email', 'user_pass', 'role' );
				$user       = wp_insert_user( $userdata );
				if ( ! is_wp_error( $user ) ) {                                                            
					$created = new WP_User( $user );
					$created->add_role( $role );
					for ( $j = 0; $j < count( $rights ); $j++ ) {
						switch ( $rights[ $j ] ) {
							case 'reply':
								$created->add_cap( 'reply_tickets', 1 );
								break;
							case 'delete':
								$created->add_cap( 'delete_tickets', 1 );
								break;
							case 'manage':
								$created->add_cap( 'manage_tickets', 1 );
								break;
							case 'credit_deduction':
								if ( defined( 'PFS_IS_INSTALLED' ) ) {
									$created->add_cap( 'credit_deduction', 1 );
								}
								break;
							case 'templates':
								$created->add_cap( 'manage_templates', 1 );
								break;
							case 'settings':
								$created->add_cap( 'settings_page', 1 );
								break;
							case 'agents':
								$created->add_cap( 'agents_page', 1 );
								break;
							case 'email':
								$created->add_cap( 'email_page', 1 );
								break;
							case 'import':
								$created->add_cap( 'import_page', 1 );
								break;
							case 'merge':
								$created->add_cap( 'merge_tickets', 1 );
								break;
							default:
								break;
						}
					}
					update_user_meta( $user, 'wsdesk_tags', $tags );
					$message = 'User created successfully';
					$code    = 'success';
				} else {
					$message = 'Something went wrong!';
					$code    = 'failed';
				}
			}
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'agents/crm_agents_add.php';
			$add_agents = ob_get_clean();
			ob_start();
			include EH_CRM_MAIN_VIEWS . 'agents/crm_agents_manage.php';
			$manage_agents = ob_get_clean();
			die(
				json_encode(
					array(
						'add'     => $add_agents,
						'manage'  => $manage_agents,
						'message' => $message,
						'code'    => $code,
					)
				)
			);
		}
	}

	public static function eh_crm_agent_add() {

		$current_user = wp_get_current_user();
		$user_roles   = $current_user->roles;
	
		if ( ! in_array( 'administrator', $user_roles, true ) && ! in_array( 'WSDesk_Agents', $user_roles, true ) && ! in_array( 'WSDesk_Supervisor', $user_roles, true ) ) {
			wp_send_json_error( array( 'message' => 'Unauthorized User.' ), 403 );
		}

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$users  = explode( ',', isset( $_POST['users'] ) ? sanitize_text_field( $_POST['users'] ) : '' );
			$role   = isset( $_POST['role'] ) ? sanitize_text_field( $_POST['role'] ) : '';
			$rights = explode( ',', isset( $_POST['rights'] ) ? sanitize_text_field( $_POST['rights'] ) : '' );
			$tags   = ( ( '' !== isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : '' ) ? explode( ',', isset( $_POST['tags'] ) ? sanitize_text_field( $_POST['tags'] ) : '' ) : null );
			if ( ! in_array( 'administrator', $user_roles, true ) && 'administrator' === $role ) {
				wp_send_json_error( array( 'message' => 'Unauthorized User.' ), 403 );
			}
			for ( $i = 0; $i < count( $users ); $i++ ) {
				$user_id = $users[ $i ];
				$user    = new WP_User( $user_id );
				switch ( $role ) {
					case 'agents':
						$user->add_role( 'WSDesk_Agents' );
						break;
					case 'supervisor':
						$user->add_role( 'WSDesk_Supervisor' );
						break;
					default:
						// If the role is not 'agents' or 'supervisor', return an error.
						wp_send_json_error( array( 'message' => 'Invalid role specified.' ), 400 );
						return;
				}
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
			}
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

	public static function eh_crm_edit_agent_html() {

		if ( wp_verify_nonce( isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '', 'wsdesk_nonce' ) ) {

			$user_id          = isset( $_POST['user_id'] ) ? sanitize_text_field( $_POST['user_id'] ) : '';
			$user             = new WP_User( $user_id );
			$tags_temp        = get_user_meta( $user_id, 'wsdesk_tags', true );
			$caps_temp        = array_keys( $user->caps );
			$reply            = '';
			$delete           = '';
			$manage           = '';
			$credit_deduction = '';
			$merge            = '';
			$settings         = '';
			$agents           = '';
			$manage_temp      = '';
			$email            = '';
			$import           = '';
			$checked          = '';
			$disabled         = '';
			$admin_message    = '';
			if ( in_array( 'administrator', $user->roles ) ) {
				$reply            = 'checked';
				$delete           = 'checked';
				$manage           = 'checked';
				$credit_deduction = 'checked';
				$merge            = 'checked';
				$manage_temp      = 'checked';
				$settings         = 'checked';
				$agents           = 'checked';
				$email            = 'checked';
				$import           = 'checked';
				$disabled         = 'disabled';
				$admin_message    = '(WSDesk Rights for Administrator cannot be edited.)';
			}
			for ( $j = 0; $j < count( $caps_temp ); $j++ ) {
				switch ( $caps_temp[ $j ] ) {
					case 'reply_tickets':
						$reply = 'checked';
						break;
					case 'delete_tickets':
						$delete = 'checked';
						break;
					case 'manage_tickets':
						$manage = 'checked';
						break;
					case 'credit_deduction':
						$credit_deduction = 'checked';
						break;
					case 'merge_tickets':
						$merge = 'checked';
						break;
					case 'manage_templates':
						$manage_temp = 'checked';
						break;
					case 'settings_page':
						$settings = 'checked';
						break;
					case 'agents_page':
						$agents = 'checked';
						break;
					case 'email_page':
						$email = 'checked';
						break;
					case 'import_page':
						$import = 'checked';
						break;
				}
			}
			$access = '<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_reply" value="reply" ' . $reply . '> ' . __( 'Reply to Tickets', 'wsdesk' ) . '<br>

							<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_delete" value="delete" ' . $delete . '> ' . __( 'Delete Tickets', 'wsdesk' ) . '<br>

							<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_manage" value="manage" ' . $manage . '> ' . __( 'Manage Tickets', 'wsdesk' ) . '<br>';
			if ( defined( 'PFS_IS_INSTALLED' ) ) {
				$access .= '<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_credit_deduction" value="credit_deduction" ' . $credit_deduction . '> ' . __( 'Credit Deduction', 'wsdesk' ) . '<br>';
			}

			if ( in_array( 'WSDesk_Supervisor', $user->roles ) || in_array( 'administrator', $user->roles ) ) {
				$access .= '
							<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_merge" value="merge"' . $merge . '> ' . __( 'Merge Tickets', 'wsdesk' ) . '<br>
							<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_templates" value="templates" ' . $manage_temp . '> ' . __( 'Manage Templates', 'wsdesk' ) . '<br>
							<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_settings" value="settings" ' . $settings . '> ' . __( 'Show Settings Page', 'wsdesk' ) . '<br>
								<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_agents" value="agents" ' . $agents . '> ' . __( 'Show Agents Page', 'wsdesk' ) . '<br>
								<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_email" value="email" ' . $email . '> ' . __( 'Show Email Page', 'wsdesk' ) . '<br>
								<input ' . $disabled . ' type="checkbox" style="margin-top: 0;" class="form-control" name="edit_agents_rights_' . $user_id . '" id="edit_agents_rights_import" value="import" ' . $import . '> ' . __( 'Show Import Page', 'wsdesk' ) . '<br>';
			}
			$tags = '';
			if ( ! empty( $tags_temp ) ) {
				for ( $j = 0; $j < count( $tags_temp ); $j++ ) {
					$tag = eh_crm_get_settings(
						array(
							'slug' => $tags_temp[ $j ],
							'type' => 'tag',
						),
						array( 'title' )
					);
					if ( ! empty( $tag ) ) {
						$tags .= '<option selected value="' . $tags_temp[ $j ] . '" title="' . $tag[0]['title'] . '">  </option>';
					}
				}
			}
			$output = '<span class="crm-divider"></span>
							<div class="crm-form-element">
								<div class="col-md-3">
									<label for="edit_agents_rights" style="padding-right:1em !important;">WSDesk Rights</label>
								</div>
								<div class="col-md-9">
									<span class="help-block">' . __( 'Mention Access Rights that are going to assign for selected User(s)? ' . $admin_message, 'wsdesk' ) . '</span>
									<span style="vertical-align: middle;" id="edit_agents_access_rights">
										' . $access . '
									</span>
								</div>
							</div>
							<div class="crm-form-element">
								<div class="col-md-3">
									<label for="edit_agents_tags" style="padding-right:1em !important;">' . __( 'Edit tags', 'wsdesk' ) . '</label>
								</div>
								<div class="col-md-9">
									<span class="help-block">' . __( 'Wish to edit ticket tags for Users?', 'wsdesk' ) . ' <br>' . __( 'The tickets will be assigned automatically if Default Assignee is [ Depends on Tags ]', 'wsdesk' ) . '</span>
									<select class="edit_agents_tags_' . $user_id . '" multiple="multiple">
										' . $tags . '
									</select>
								</div>
							</div>
							<span class="crm-divider"></span>
							<div class="crm-form-element">
								<button type="button" id="save_edit_agents_' . $user_id . '" class="btn btn-primary btn-sm save_edit_agents" style="margin-left:10px;">' . __( 'Update Agents', 'wsdesk' ) . '</button>
								<button type="button" id="cancel_edit_agents_' . $user_id . '" class="btn btn-default btn-sm cancel_edit_agents" style="margin-left:10px;">' . __( 'Cancel Update', 'wsdesk' ) . '</button>
							</div>';
			wp_send_json_success( array( 'page' => $output ) );
			die;
		}
	}

}
