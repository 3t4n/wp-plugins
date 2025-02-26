<?php
/**
 * Auto_Aliexpress_Custom_Form_Admin Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Custom_Form_Admin' ) ) :

class Auto_Aliexpress_Custom_Form_Admin extends Auto_Aliexpress_Admin_Module {

	/**
	 * Init module admin
	 *
	 * @since 1.0
	 */
	public function init() {
		$this->module       = Auto_Aliexpress_Custom_Form::get_instance();
		$this->page         = 'auto-aliexpress-campaign';
		$this->page_edit    = 'auto-aliexpress-campaign-wizard';
	}

	/**
	 * Include required files
	 *
	 * @since 1.0
	 */
	public function includes() {
		include_once dirname( __FILE__ ) . '/admin-page-new.php';
		include_once dirname( __FILE__ ) . '/admin-page-view.php';
	}

	/**
	 * Add module pages to Admin
	 *
	 * @since 1.0
	 */
	public function add_menu_pages() {
		new Auto_Aliexpress_CForm_Page( $this->page, 'campaigns/list', esc_html__( 'Campaigns', Auto_Aliexpress::DOMAIN ), esc_html__( 'Campaigns', Auto_Aliexpress::DOMAIN ), 'auto-aliexpress' );
		new Auto_Aliexpress_CForm_New_Page( $this->page_edit, 'campaigns/wizard', esc_html__( 'Edit Campaign', Auto_Aliexpress::DOMAIN ), esc_html__( 'New Campaigns', Auto_Aliexpress::DOMAIN ), 'auto-aliexpress' );
	}

	/**
	 * Remove necessary pages from menu
	 *
	 * @since 1.0
	 */
	public function hide_menu_pages() {
		remove_submenu_page( 'auto-aliexpress', $this->page_edit );
	}

	/**
	 * Pass module defaults to JS
	 *
	 * @since 1.0
	 *
	 * @param $data
	 *
	 * @return mixed
	 */
	public function add_js_defaults( $data ) {
		$model = null;
		if ( $this->is_admin_wizard() ) {
			$data['application'] = 'builder';

			if ( ! self::is_edit() ) {
				$data['formNonce'] = wp_create_nonce( 'auto_aliexpress_save_builder_fields' );
				// Load settings from template
				$template = $this->get_template();
				$name     = '';
				if ( isset( $_GET['name'] ) ) { // WPCS: CSRF ok.
					$name = sanitize_text_field( $_GET['name'] );
				}
				if ( isset( $template->settings['form-type'] ) && in_array( $template->settings['form-type'], array( 'registration', 'login' ) ) ) {
					$notifications = 'registration' === $template->settings['form-type']
						? $this->get_registration_form_notifications( $model, $template )
						: array();
				} else {
					$notifications = $this->get_form_notifications( $model );
				}

				if ( $template ) {
					$data['currentForm'] = array(
						'wrappers'      => $template->fields,
						'settings'      => array_merge(
							array(
								'formName'             => $name,
								'pagination-header'    => 'nav',
								'version'              => AUTO_ALIEXPRESS_VERSION,
								'form-border-style'    => 'solid',
								'form-padding'         => '',
								'form-border'          => '',
								'fields-style'         => 'open',
								'validation'           => 'on_submit',
								'form-style'           => 'default',
								'enable-ajax'          => 'true',
								'autoclose'            => 'true',
								'submission-indicator' => 'show',
								'indicator-label'      => esc_html__( 'Submitting...', Auto_Aliexpress::DOMAIN ),
								'paginationData'       => array(
									'pagination-header-design' => 'show',
									'pagination-header'        => 'nav',
								),
							),
							$template->settings
						),
						'notifications' => $notifications,
					);
				} else {
					$data['currentForm'] = array(
						'fields'   => array(),
						'settings' => array_merge(
							array( 'formName' => $name ),
							array(
								'pagination-header' => 'nav',
								'version'           => AUTO_ALIEXPRESS_VERSION,
								'form-padding'      => 'none',
								'form-border'       => 'none',
								'fields-style'      => 'open',
								'form-style'        => 'default',
								'paginationData'    => array(
									'pagination-header-design' => 'show',
									'pagination-header'        => 'nav',
								),
							)
						),
					);
				}
			} else {
				$id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : null;
				if ( ! is_null( $id ) ) {
					$data['formNonce'] = wp_create_nonce( 'auto_aliexpress_save_builder_fields' );
					$model             = Auto_Aliexpress_Custom_Form_Model::model()->load( $id );
				}
				$wrappers = array();
				if ( is_object( $model ) ) {
					$wrappers = $model->get_fields_grouped();
				}

				// Load stored record
				$settings = apply_filters( 'auto_aliexpress_form_settings', $this->get_form_settings( $model ), $model, $data, $this );

				if ( isset( $model->settings['form-type'] ) && 'registration' === $model->settings['form-type'] ) {
					$notifications = $this->get_registration_form_notifications( $model );
				} else {
					$notifications = $this->get_form_notifications( $model );
				}
				$notifications = apply_filters( 'auto_aliexpress_form_notifications', $notifications, $model, $data, $this );
				$data['currentForm'] = array(
					'wrappers'      => $wrappers,
					'settings'      => array_merge(
						array(
							'pagination-header' => 'nav',
							'paginationData'    => array(
								'pagination-header-design' => 'show',
								'pagination-header'        => 'nav',
							),
						),
						$settings,
						array(
							'form_id'     => $model->id,
							'form_name'   => $model->name,
							'form_status' => $model->status,
						)
					),
					'notifications' => $notifications,
				);
			}
		}

		$data['modules']['custom_form'] = array(
			'templates'     => $this->module->get_templates(),
			'new_form_url'  => menu_page_url( $this->page_edit, false ),
			'form_list_url' => menu_page_url( $this->page, false ),
			'preview_nonce' => wp_create_nonce( 'auto_aliexpress_popup_preview_cforms' ),
		);

		return apply_filters( 'auto_aliexpress_form_admin_data', $data, $model, $this );
	}

	/**
	 * Return template
	 *
	 * @since 1.0
	 * @return Auto_Aliexpress_Template|false
	 */
	private function get_template() {
		if( isset( $_GET['template'] ) )  {
			$id = trim( sanitize_text_field( $_GET['template'] ) );
		} else {
			$id = 'blank';
		}

		foreach ( $this->module->templates as $key => $template ) {
			if ( $template->options['id'] === $id ) {
				return $template;
			}
		}

		return false;
	}

	/**
	 * Return Form Settings
	 *
	 * @since 1.1
	 *
	 * @param Auto_Aliexpress_Custom_Form_Model $form
	 *
	 * @return mixed
	 */
	public function get_form_settings( $form ) {
		// If not using the new "submission-behaviour" setting, set it according to the previous settings
		if ( ! isset( $form->settings['submission-behaviour'] ) ) {
			$redirect = ( isset( $form->settings['redirect'] ) && filter_var( $form->settings['redirect'], FILTER_VALIDATE_BOOLEAN ) );
			$thankyou = ( isset( $form->settings['thankyou'] ) && filter_var( $form->settings['thankyou'], FILTER_VALIDATE_BOOLEAN ) );

			if ( ! $redirect && ! $thankyou ) {
				$form->settings['submission-behaviour'] = 'behaviour-thankyou';
			} elseif ( $thankyou ) {
				$form->settings['submission-behaviour'] = 'behaviour-thankyou';
			} elseif ( $redirect ) {
				$form->settings['submission-behaviour'] = 'behaviour-redirect';
			}
		}

		return $form->settings;
	}

	/**
	 * Return Form notifications
	 *
	 * @since 1.1
	 *
	 * @param Auto_Aliexpress_Custom_Form_Model|null $form
	 *
	 * @return mixed
	 */
	public function get_form_notifications( $form ) {
		if ( ! isset( $form ) || ! isset( $form->notifications ) ) {
			return array(
				array(
					'slug'             => 'notification-1234-4567',
					'label'            => 'Admin Email',
					'email-recipients' => 'default',
					'recipients'       => get_option( 'admin_email' ),
					'email-subject'    => esc_html__( "New Form Entry #{submission_id} for {form_name}", Auto_Aliexpress::DOMAIN ),
					'email-editor'     => esc_html__( "You have a new website form submission: <br/> {all_fields} <br/>---<br/> This message was sent from {site_url}.", Auto_Aliexpress::DOMAIN ),
				)
			);
		}

		return $form->notifications;
	}

	/**
	 * Get Registration Form notifications
	 *
	 * @since 1.11
	 *
	 * @param Auto_Aliexpress_Custom_Form_Model|null $form
	 * @param Auto_Aliexpress_Template|null          $template
	 *
	 * @return mixed
	 */
	public function get_registration_form_notifications( $form, $template = null ) {
		if ( ! isset( $form ) || ! isset( $form->notifications ) ) {
			$msg_footer = esc_html__( 'This message was sent from {site_url}', Auto_Aliexpress::DOMAIN );
			//For admin
			$message = esc_html__( "New user registration on your site {site_url}: <br/><br/> {all_fields} <br/><br/> Click {submission_url} to view the submission.<br/>", Auto_Aliexpress::DOMAIN );
			$message .= "<br/>---<br/>";
			$message .= $msg_footer;

			$message_method_email = $message;

			$message_method_manual = esc_html__( "New user registration on your site {site_url}: <br/><br/> {all_fields} <br/><br/> The account is still not activated and needs your approval. To activate this account, click the link below.", Auto_Aliexpress::DOMAIN );
			$message_method_manual .= "<br/>{account_approval_link} <br/><br/>";
			$message_method_manual .= esc_html__( "Click {submission_url} to view the submission on your website's dashboard.<br/><br/>", Auto_Aliexpress::DOMAIN );
			$message_method_manual .= $msg_footer;

			$notifications[] = array(
				'slug'             => 'notification-1111-1111',
				'label'            => esc_html__( 'Admin Email', Auto_Aliexpress::DOMAIN ),
				'email-recipients' => 'default',
				'recipients'       => get_option( 'admin_email' ),
				'email-subject'    => esc_html__( 'New User Registration on {site_url}', Auto_Aliexpress::DOMAIN ),
				'email-editor'     => $message,

				'email-subject-method-email'  => esc_html__( 'New User Registration on {site_url}', Auto_Aliexpress::DOMAIN ),
				'email-editor-method-email'   => $message_method_email,
				'email-subject-method-manual' => esc_html__( 'New User Registration on {site_url} needs approval.', Auto_Aliexpress::DOMAIN ),
				'email-editor-method-manual'  => $message_method_manual,
			);
			if ( ! is_null( $template )) {
				$email = $this->get_registration_form_customer_email_slug( $template );
			} else {
				$email = $this->get_registration_form_customer_email_slug( $form );
			}
			//For customer
			$message  = esc_html__( "Your new account on our site {site_title} is ready to go. Here's your details: <br/><br/> {all_fields} <br/><br/>", Auto_Aliexpress::DOMAIN );
			$message .= sprintf( esc_html__( 'Login to your new account <a href="%s">here</a>.', Auto_Aliexpress::DOMAIN ), wp_login_url() );
			$message .= "<br/><br/>---<br/>";
			$message .= $msg_footer;

			$message_method_email = esc_html__( "Dear {username} <br/><br/>", Auto_Aliexpress::DOMAIN );
			$message_method_email .= esc_html__( 'Thank you for signing up on our website. You are one step away from activating your account. ', Auto_Aliexpress::DOMAIN );
			$message_method_email .= esc_html__( "We have sent you another email containing a confirmation link. Please click on that link to activate your account.<br/><br/>", Auto_Aliexpress::DOMAIN );
			$message_method_email .= $msg_footer;

			$message_method_manual = esc_html__( "Your new account on {site_title} is under review.<br/>", Auto_Aliexpress::DOMAIN );
			$message_method_manual .= esc_html__( "You'll receive another email once the site admin approves your account. You should be able to login into your account after that.", Auto_Aliexpress::DOMAIN );
			$message_method_manual .= "<br/><br/>---<br/>";
			$message_method_manual .= $msg_footer;

			$notifications[] = array(
				'slug'             => 'notification-1111-1112',
				'label'            => esc_html__( 'User Confirmation Email', Auto_Aliexpress::DOMAIN ),
				'email-recipients' => 'default',
				'recipients'       => $email,
				'email-subject'    => esc_html__( 'Your new account on {site_title}', Auto_Aliexpress::DOMAIN ),
				'email-editor'     => $message,

				'email-subject-method-email'  => esc_html__( 'Activate your account on {site_url}', Auto_Aliexpress::DOMAIN ),
				'email-editor-method-email'   => $message_method_email,
				'email-subject-method-manual' => esc_html__( 'Your new account on {site_title} is under review.', Auto_Aliexpress::DOMAIN ),
				'email-editor-method-manual'  => $message_method_manual,
			);

			return $notifications;
		}

		return $form->notifications;
	}

	/**
	 * Get customer email as field slug
	 *
	 * @since 1.11
	 *
	 * @param Auto_Aliexpress_Custom_Form_Model|Auto_Aliexpress_Template $form
	 * @param string                                           $default
	 *
	 * @return string
	 */
	public function get_registration_form_customer_email_slug( $form, $default = '{email-1}' ) {
		if ( isset( $form->settings['registration-email-field'] ) && ! empty( $form->settings['registration-email-field'] ) ) {
			$email = $form->settings['registration-email-field'];
			if ( false === strpos( $email, '{' ) ) {
				$email = '{' . $email . '}';
			}

			return $email;
		}

		return $default;
	}

	/**
	 * Check if submit is handled with AJAX
	 *
	 * @since 1.9.3
	 *
	 * @return bool
	 */
	public function is_ajax_submit( $form ) {
		$form_settings  = $form->settings;

		if ( ! isset( $form_settings['enable-ajax'] ) || empty( $form_settings['enable-ajax'] ) ) {
			return false;
		}

		return filter_var( $form_settings['enable-ajax'], FILTER_VALIDATE_BOOLEAN );
	}
}

endif;
