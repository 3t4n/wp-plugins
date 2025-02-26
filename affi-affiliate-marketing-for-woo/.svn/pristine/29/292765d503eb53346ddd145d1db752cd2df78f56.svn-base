<?php

namespace AffiAffiliate\Admin;


use AffiAffiliate\Inc\ClassSettingNotifications;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\AFFunctions;
use AffiAffiliate\Inc\QueryDB;
use WC_Email;

defined( 'ABSPATH' ) || exit;

class AFNotifications {
	protected static $instance = null;

	private $data = array();

	protected $default_notification_type;


	protected ?Data $settings;
	protected ?AFFunctions $functions;
	protected $query;

	/**
	 * Initialize class
	 */
	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function __construct( $id = 0 ) {
		$this->settings                  = Data::instance();
		$this->functions                 = AFFunctions::instance();
		$this->query                     = QueryDB::instance();

		if ( $id ) {
			global $wpdb;

			$rs_notify     = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}affi_notifications WHERE id=%d;", $id );
			$notifications = $wpdb->get_row( $rs_notify, ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
			if ( ! is_array( $notifications ) ) {
				return;
			}

			foreach ( $notifications as $key => $val ) {
				$this->data[ $key ] = $val !== null ? $val : '';
			}
		}
	}

	/**
	 * Save changes made
	 *
	 * @return boolean
	 */
	public function save() {
		global $wpdb;
		$data = $this->data;


		$success = true;

		if ( ! isset( $data['id'] ) ) {

			$tic = self::insert( $data );
			if ( $tic ) {
				$this->data = $tic->data;
				$success    = true;
			} else {
				$success = false;
			}
		} else {

			unset( $data['id'] );
			$success = $wpdb->update( $wpdb->prefix . 'affi_notifications', $data, array( 'id' => $this->data['id'] ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		}

		return (bool) $success;
	}

	public static function update( $data ) {
		global $wpdb;
		$id = $data['id'] ?? '';
		unset( $data['id'] );
		// Insert ticket to DB.
		$success = $wpdb->update( $wpdb->prefix . 'affi_notifications', $data, array( 'id' => $id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

		if ( ! $success ) {
			return false;
		}

		return new AFAffiliates( $wpdb->insert_id );
	}

	public static function insert( $data ) {
		global $wpdb;

		// Insert ticket to DB.
		$success = $wpdb->insert( $wpdb->prefix . 'affi_notifications', $data );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

		if ( ! $success ) {
			return false;
		}

		return new AFAffiliates( $wpdb->insert_id );
	}

	/**
	 * Delete record from database
	 *
	 * @param $notif
	 *
	 * @return boolean
	 */
	public static function delete( $notif ) {
		global $wpdb;

		$success = $wpdb->delete( $wpdb->prefix . 'affi_notifications', array( 'id' => $notif->id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( ! $success ) {
			return false;
		}

		return true;
	}

	/**
	 * Set data to create new object using direct data. Used in find method
	 *
	 * @param array $data - data to set for object.
	 *
	 * @return void
	 */
	public function set_data( $data ) {

		foreach ( $data as $var_name => $val ) {
			$this->data[ $var_name ] = $val !== null ? $val : '';
		}
	}

	public static function get_setting_notifications( $args = array() ) {
		global $wpdb;
		$args  = wp_parse_args( $args, array(
			'fields'  => '*',
			'where'   => '',
			'limit'   => 30,
			'offset'  => 0,
			'orderby' => 'data_created',
			'order'   => 'DESC',
		) );
		$where = '';
		if ( isset( $args['fields'] ) && is_array( $args['fields'] ) ) {
			$args['fields'] = implode( ', ', $args['fields'] );
		}
		if ( isset( $args['ids'] ) ) {
			$ids = $args['ids'];
			if ( is_array( $args['ids'] ) ) {
				$ids = implode( ', ', $args['ids'] );
			}
			$where = "WHERE id IN ({$ids}) ";
		}
		$query = "SELECT {$args['fields']} FROM {$wpdb->prefix}affi_notifications {$where} LIMIT %d OFFSET %d ";

		return $wpdb->get_results( $wpdb->prepare( $query, $args['limit'], $args['offset'] ), ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	}

	public static function delete_notification( $id ) {
		global $wpdb;

		$success = $wpdb->delete( $wpdb->prefix . 'affi_notifications', array( 'id' => $id ) );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		if ( ! $success ) {
			return false;
		}

		return true;
	}

	public function render_setting_page() {
		$this->default_notification_type = array(
			'affiliate_register' => esc_html__( 'Affiliate Register', 'affi-affiliate-marketing-for-woo' ),
			'affiliate_reject'   => esc_html__( 'Affiliate Rejected', 'affi-affiliate-marketing-for-woo' ),
			'new_rank'           => esc_html__( 'New rank', 'affi-affiliate-marketing-for-woo' ),
//			'reject'             => esc_html__( 'Rejected', 'affi-affiliate-marketing-for-woo' ),
			'withdraw'           => esc_html__( 'Withdraw', 'affi-affiliate-marketing-for-woo' ),
			'payment_action'     => esc_html__( 'Payment action', 'affi-affiliate-marketing-for-woo' ),
			'cron_job_send'      => esc_html__( 'Cron job send', 'affi-affiliate-marketing-for-woo' ),
		);
		$action         = isset( $_REQUEST['action'] ) ? wc_clean( wp_unslash( $_REQUEST['action'] ) ) : false;// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$available_rank = AFRanks::get_ranks();
		$aff_options    = [
			[
				'type' => 'section_start',
			],
			[
				'id'      => 'affi_set_user_input',
				'title'   => esc_html__( 'User', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'    => 'select',
				'options' => [],
				'class'   => 'affi-set-user-input affi-set-user-select2',
			],
			[
				'id'      => 'affi_set_user_rank',
				'title'   => esc_html__( 'Rank', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'    => 'select',
				'options' => $available_rank,
				'class'   => 'affi-set-user-rank',
			],
			[ 'type' => 'section_end' ],
		];
		$aff_data       = [ 'affi_set_user_input' => '', 'affi_set_user_rank' => '' ];
		if ( $action && ( 'edit' === $action || 'new' === $action ) ) {
//			$rank_id = isset( $_REQUEST['id'] ) ? wc_clean( wp_unslash( $_REQUEST['id'] ) ) : '';
//			self::load_edit_aff( $rank_id, $action );
		} else {
			printf( '<div class="wrap"><h1 class="wp-heading-inline">%s</h1>
            <span class="page-title-action affi-notifications-action">%s</span><hr class="wp-header-end">
            <form method="post" class="affi-affiliates-tabblenav-form">',
				esc_html__( "Notifications", 'affi-affiliate-marketing-for-woo' ),
				esc_html__( "Add Notification", 'affi-affiliate-marketing-for-woo' ) );
			$notif_class = ClassSettingNotifications::get_instance();
			$notif_class->prepare_items();
			$notif_class->display();
			printf( '</form></div>' );
			?>
            <div class="vi-ui modal affi-notifications-popup-container">
                <!--				<div class="affi-notifications-popup-layout"></div>-->
                <i class="close icon"></i>
                <div class="header">
                    <div class="affi-notifications-popup-title-wrap">
                        <div class="affi-notification-popup-title-new affi-hidden"><?php esc_html_e( 'New Notification', 'affi-affiliate-marketing-for-woo' ); ?></div>
                        <div class="affi-notification-popup-title-edit affi-hidden"><?php esc_html_e( 'Edit Notification', 'affi-affiliate-marketing-for-woo' ); ?></div>
                    </div>
                </div>
                <div class="scrolling  content affi-notifications-popup-wrap">
                    <div class="vi-ui form wrap_modal_content affi-notifications-popup-detail-wrap">
                        <div class="fields two affi-notification-popup-line-wrap ">
                            <div class="field affi-notification-enable">
                                <label for="affi_notification_enable"><?php esc_html_e( 'Enable', 'affi-affiliate-marketing-for-woo' ); ?></label>
                                <div class="vi-ui toggle checkbox">
                                    <input type="checkbox" name="affi_notification_enable" id="affi_notification_enable"
                                           placeholder="Subject email">
                                    <label><?php esc_html_e( 'Enable notification', 'affi-affiliate-marketing-for-woo' ); ?></label>
                                </div>
                            </div>
                            <div class="field affi-notification-type">
                                <label for="affi_notification_event"><?php esc_html_e( 'Event', 'affi-affiliate-marketing-for-woo' ); ?></label>
                                <div>
                                    <select class="vi-ui dropdown fluid affi-dropdown" name="affi_notification_event"
                                            id="affi_notification_event">
                                        <option value=""><?php esc_html_e( 'Choose event notification', 'affi-affiliate-marketing-for-woo' ); ?></option>
										<?php
										foreach ( $this->default_notification_type as $key_noti => $notif ) {
											?>
                                            <option value="<?php echo esc_attr( $key_noti ); ?>"><?php echo esc_html( $notif ); ?></option>
											<?php
										}
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field affi-notification-popup-line-wrap affi-notification-subject">
                            <label for="affi_notification_subject_input"><?php esc_html_e( 'Subject', 'affi-affiliate-marketing-for-woo' ); ?></label>
                            <input class="vi ui input" name="affi_notification_subject_input"
                                   id="affi_notification_subject_input"
                                   type="text" data-id="" value=""/>
                        </div>
                        <div class="field affi-notification-popup-line-wrap affi-notification-subject">
                            <label for="affi_notification_content_input"><?php esc_html_e( 'Content', 'affi-affiliate-marketing-for-woo' ); ?></label>
							<?php
							wp_editor( '',
								'affi_notification_content_input',
								array(
									'default_editor' => 'html',
									'media_buttons' => false,
									'tinymce' => true,
									'editor_height' => 200,
									'data-id'       => '',
									'textarea_name' => 'affi_notification_content_input'
								) );
							?>
                            <div class="affi_explain">
                                <p>Replace shortcode:</p>
                                <ul>
                                    <li>{name} - The display name of the affiliate, as set on the affiliate's user
                                        profile
                                    </li>
                                    <li>{user_name} - The user name of the affiliate on the site</li>
                                    <li>{user_email} - The email address of the affiliate</li>
                                    <li>{website} - The website of the affiliate</li>
                                    <!--                                    <li>{promo_method} - The promo method used by the affiliate</li>-->
                                    <!--                                    <li>{rejection_reason} - The reason an affiliate was rejected</li>-->
                                    <!--                                    <li>{login_url} - The affiliate login URL to your website</li>-->
                                    <li>{amount} - The amount of a given referral</li>
                                    <!--                                    <li>{site_name} - Your site name</li>-->
                                    <!--                                    <li>{referral_url} - The affiliate’s referral URL</li>-->
                                    <!--                                    <li>{affiliate_id} - The affiliate’s ID</li>-->
                                    <!--                                    <li>{referral_rate} - The affiliate’s referral rate</li>-->
                                    <!--                                    <li>{review_url} - The URL to the review page for a pending affiliate</li>-->
                                    <!--                                    <li>{landing_page} - The URL the customer landed on that led to a referral being-->
                                    <!--                                        created-->
                                    <!--                                    </li>-->
                                    <!--                                    <li>{campaign_name} - The name of the campaign associated with the referral (if-->
                                    <!--                                        any)-->
                                    <!--                                    </li>-->
                                    <!--                                    <li>{registration_coupon} - The affiliate registration coupon (if any)</li>-->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="actions affi-editing">
                    <div class="vi-ui button green affi-actions-button tiny affi-create-notification affi-hidden"
                         data-actions="create">
						<?php esc_html_e( 'Create', 'affi-affiliate-marketing-for-woo' ); ?>
                    </div>
                    <div class="vi-ui button blue affi-actions-button tiny affi-save-notification affi-hidden"
                         data-actions="save_edit">
						<?php esc_html_e( 'Save', 'affi-affiliate-marketing-for-woo' ); ?>
                    </div>
                </div>
            </div>
			<?php
		}
	}

	public function affi_get_notification() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$notification_id = isset( $_POST['notification_id'] ) ? absint( wc_clean( wp_unslash( $_POST['notification_id'] ) ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		$get_data = self::get_setting_notifications( [
			'ids' => $notification_id,
		] );

		wp_send_json( $get_data );
	}

	public function affi_create_notification() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$notification_subject = isset( $_POST['notification_subject'] ) ? sanitize_text_field( $_POST['notification_subject'] ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$notification_content = isset( $_POST['notification_content'] ) ? sanitize_text_field( $_POST['notification_content'] ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$notification_event   = isset( $_POST['notification_event'] ) ? sanitize_text_field( $_POST['notification_event'] ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$notification_status  = isset( $_POST['notification_enable'] ) ? rest_sanitize_boolean( $_POST['notification_enable'] ) : 0;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput

		$insert_id = self::insert( [
			'subject'      => $notification_subject,
			'email_body'   => $notification_content,
			'type'         => $notification_event,
			'status'       => $notification_status,
			'date_created' => current_time( 'U' )
		] );

		wp_send_json( $insert_id );
	}

	public function affi_edit_notification() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$notification_id      = isset( $_POST['notification_id'] ) ? absint( wc_clean( wp_unslash( $_POST['notification_id'] ) ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$notification_subject = isset( $_POST['notification_subject'] ) ? sanitize_text_field( wp_unslash( $_POST['notification_subject'] ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$notification_content = isset( $_POST['notification_content'] ) ? sanitize_text_field( wp_unslash( $_POST['notification_content'] ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$notification_event   = isset( $_POST['notification_event'] ) ? sanitize_text_field( wp_unslash( $_POST['notification_event'] ) ) : '';// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$notification_status  = isset( $_POST['notification_enable'] ) ? rest_sanitize_boolean( wp_unslash( $_POST['notification_enable'] ) ) : 0;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput

		$insert_id = self::update( [
			'id'            => $notification_id,
			'subject'       => $notification_subject,
			'email_body'    => $notification_content,
			'type'          => $notification_event,
			'status'        => $notification_status,
			'date_modified' => current_time( 'U' ),
		] );

		wp_send_json( $insert_id );

	}

	public function affi_delete_notification() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$notification_id = isset( $_POST['notification_id'] ) ? absint( sanitize_text_field( wp_unslash( $_POST['notification_id'] ) ) ) : '';

		$delete_notification = self::delete( [
			'id' => $notification_id,
		] );

		wp_send_json_success( $delete_notification );
	}

	function villatheme_debug_log( $message ) {
		$file = trailingslashit( plugin_dir_path( __FILE__ ) ) . "debug.log";
		if ( ! file_exists( $file ) ) {
			fopen( $file, "a" );
		}
		$current = file_get_contents( $file );
		$current .= date( 'Y-m-d h:i:s' ) . ": " . $message . "\n";
		file_put_contents( $file, $current );
	}

	public function send_user_notification( $user_id, $nt_type, $in_data ) {
		$noti_data = self::get_available_notification( $nt_type );
		$user_cl   = get_userdata( $user_id );
		$user_data = (array) $user_cl->data;
		if ( ! $noti_data ) {

			return false;
		}
		$message = self::replace_shortcodes( $noti_data['email_body'], $in_data, $user_data );
		$subject = self::replace_shortcodes( $noti_data['subject'], $in_data, $user_data );

		if ( $subject && $message ) {
			$result = self::send_mail( $user_data['user_email'], $subject, $message );

			$nt_data = [
				'user_id'      => $user_data['ID'],
				'type'         => $nt_type,
				'subject'      => $subject,
				'email_body'   => $message,
				'status'       => $result ? $result : 0,
				'date_created' => current_time( 'U' ),
			];
			$this->query->insert_user_notification( $nt_data );
		}

		return $result;
	}

	public function send_admin_notification( $nt_type, $in_data ) {
		$noti_data = self::get_available_notification( $nt_type );

		if ( ! $noti_data ) {

			return false;
		}
		$message      = self::replace_shortcodes( $noti_data['email_body'], $in_data, [] );
		$subject      = self::replace_shortcodes( $noti_data['subject'], $in_data, [] );
		$notify_email = $this->settings->get_param( 'admin_notify_email' ) ?
			$this->settings->get_param( 'admin_notify_email' ) : get_bloginfo( 'admin_email' );

		if ( $subject && $message ) {
			$result = self::send_mail( $notify_email, $subject, $message );

			$nt_data = [
				'user_id'      => 0,
				'type'         => $nt_type,
				'subject'      => $subject,
				'email_body'   => $message,
				'status'       => $result ? $result : 0,
				'date_created' => current_time( 'U' ),
			];
			$this->query->insert_user_notification( $nt_data );
		}

		return $result;
	}

	public function get_available_notification( $nt_type ) {
		if ( $nt_type ) {
			global $wpdb;

			$rs   = $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}affi_notifications WHERE type=%s AND status=1;", $nt_type );
			$data = $wpdb->get_row( $rs, ARRAY_A );// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
			if ( $data ) {

				return $data;
			}
		}

		return false;
	}

	public function replace_shortcodes( $message, $data = [], $user_data = [] ) {
		$arr = array(
			'{name}'                => isset( $user_data['display_name'] ) ? $user_data['display_name'] : '',
			'{user_name}'           => isset( $user_data['user_login'] ) ? $user_data['user_login'] : '',
			'{user_email}'          => isset( $user_data['user_email'] ) ? $user_data['user_email'] : '',
			'{rank_from}'           => isset( $data['rank_from'] ) ? $data['rank_from'] : '',
			'{rank_to}'             => isset( $data['rank_to'] ) ? $data['rank_to'] : '',
			'{d_status}'            => isset( $data['status'] ) ? $data['status'] : '',
			'{reject_reason}'       => isset( $data['reject_reason'] ) ? $data['reject_reason'] : '',
			'{website}'             => isset( $data['website'] ) ? $data['website'] : '',
			'{promo_method}'        => isset( $data['promo_method'] ) ? $data['promo_method'] : '',
			'{rejection_reason}'    => isset( $data['rejection_reason'] ) ? $data['rejection_reason'] : '',
			'{login_url}'           => isset( $data['login_url'] ) ? $data['login_url'] : '',
			'{amount}'              => isset( $data['amount'] ) ? $data['amount'] : '',
			'{site_name}'           => isset( $data['site_name'] ) ? $data['site_name'] : '',
			'{referral_url}'        => isset( $data['referral_url'] ) ? $data['referral_url'] : '',
			'{affiliate_id}'        => isset( $data['affiliate_id'] ) ? $data['affiliate_id'] : '',
			'{referral_rate}'       => isset( $data['referral_rate'] ) ? $data['referral_rate'] : '',
			'{review_url}'          => isset( $data['review_url'] ) ? $data['review_url'] : '',
			'{landing_page}'        => isset( $data['landing_page'] ) ? $data['landing_page'] : '',
			'{campaign_name}'       => isset( $data['campaign_name'] ) ? $data['campaign_name'] : '',
			'{registration_coupon}' => isset( $data['registration_coupon'] ) ? $data['registration_coupon'] : '',
			'{site_title}'          => get_bloginfo(),
			'{store_address}'       => WC()->countries ? WC()->countries->get_base_address() : '',
			'{admin_email}'         => get_bloginfo( 'admin_email' ),
			'{site_url}'            => site_url(),
			'{home_url}'            => home_url(),
//			'{shop_url}'               => get_permalink( wc_get_page_id( 'shop' ) ),
		);

		return str_replace( array_keys( $arr ), array_values( $arr ), $message );
	}

	public function send_mail( $user_email, $subject, $content, $headers = '' ) {
		if ( ! $this->settings->get_param( 'send_notify_email' ) ) {
			return false;
		}
		if ( ! $content ) {
			return false;
		}
		if ( ! class_exists( 'WC_Email' ) ) {
			include_once WC_ABSPATH . 'includes/emails/class-wc-email.php';
		}
		$email            = new \WC_Email();
		$result_sent_mail = $email->send( $user_email, $subject, $content, $headers, array() );

		return $result_sent_mail;
	}
}