<?php
/**
 * Mail Integration and sending handler file
 *
 * @package    mail
 * @author     miniOrange <info@miniorange.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

/**
 * Class for handling the Mail Integration configurations and setup.
 */
class MOAzure_Mail_Handler {

	/**
	 * Object variable
	 *
	 * @var object variable to instantiate the class.
	 */
	private static $instance;

	/**
	 * Function to get the object of the class.
	 *
	 * @return object
	 */
	public static function get_mail_handler_obj() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to handle the email sending details on user registration.
	 *
	 * @param object|mixed $user_id user id parameter.
	 * @return void
	 */
	public static function moazure_send_email_to_new_user( $user_id ) {
		$mail_config = MOAzure_Admin_Utils::moazure_get_option( 'moazure_mail_config' );

		$user = get_userdata( $user_id );

		$mail_to = $user->user_email;

		if ( empty( $mail_config ) || empty( $mail_config['mail_from'] ) || empty( $mail_to ) || empty( $mail_config['send_to_new_user'] ) ) {
			return;
		}

		$user_register_mail_config = array(
			'mail_from'               => $mail_config['mail_from'],
			'mail_to'                 => $mail_to,
			'save_to_outlook_sentbox' => $mail_config['save_to_outlook_sentbox'],
		);

		$subject    = 'WordPress Registration Successful';
		$email_type = MOAzure_Apps_Enum::MAIL_CONTENT_TYPE;
		$content    = "Hi there,\r\n\nWelcome to " . esc_html( get_option( 'blogname' ) ) . "!\nIn case of any concerns, please contact us at " . esc_html( get_option( 'admin_email' ) ) . '.';

		$self_obj = self::get_mail_handler_obj();

		$email_res = $self_obj->moazure_send_email_using_microsoft_graph( $user_register_mail_config, $subject, $email_type, $content );
	}

	/**
	 * Function to handle the email sending details from config.
	 *
	 * @return void
	 */
	public function moazure_send_email_manually() {
		$mail_config        = MOAzure_Admin_Utils::moazure_get_option( 'moazure_mail_config' );
		$manual_mail_config = MOAzure_Admin_Utils::moazure_get_option( 'moazure_manual_email_config' );

		if ( empty( $mail_config ) || empty( $manual_mail_config ) || empty( $mail_config['mail_from'] ) || empty( $manual_mail_config['mail_to'] ) ) {
			$notice_arr['msg_type'] = 'error';
			$notice_arr['msg_desc'] = 'Invalid or missing required configurations found.';
			MOAzure_Admin_Utils::moazure_update_option( 'notice_settings', $notice_arr );
			return;
		}

		$subject    = ! empty( $manual_mail_config['subject'] ) ? $manual_mail_config['subject'] : 'Microsoft Graph Mailer';
		$email_type = MOAzure_Apps_Enum::MAIL_CONTENT_TYPE;
		$content    = ! empty( $manual_mail_config['content'] ) ? $manual_mail_config['content'] : 'Hi, this is an email sent via Microsoft Graph API.';

		$send_manual_mail_config = array(
			'mail_from'               => $mail_config['mail_from'],
			'mail_to'                 => $manual_mail_config['mail_to'],
			'save_to_outlook_sentbox' => $mail_config['save_to_outlook_sentbox'],
		);

		$email_res = $this->moazure_send_email_using_microsoft_graph( $send_manual_mail_config, $subject, $email_type, $content );

		if ( ! empty( $email_res ) && empty( $email_res['status'] ) ) {
			$email_res_data = $email_res['data'];
			$res_error      = $email_res_data['error'];
			$res_error_desc = $email_res_data['error_description'];

			$notice_arr['msg_type'] = 'error';
			$notice_arr['msg_desc'] = $res_error . ' : ' . $res_error_desc;
			MOAzure_Admin_Utils::moazure_update_option( 'notice_settings', $notice_arr );
		} else {
			$notice_arr['msg_type'] = 'success';
			$notice_arr['msg_desc'] = 'Email has been sent successfully.';
			MOAzure_Admin_Utils::moazure_update_option( 'notice_settings', $notice_arr );
		}
	}

	/**
	 * Function to make api calls to send emails using graph api.
	 *
	 * @param array|mixed $mail_config mail config parameter.
	 * @param string      $subject subject parameter.
	 * @param string      $email_type email type parameter.
	 * @param string      $content content parameter.
	 * @return array|mixed
	 */
	public function moazure_send_email_using_microsoft_graph( $mail_config, $subject, $email_type, $content ) {

		$mail_object['message']         = array(
			'subject'      => $subject,
			'body'         => array(
				'contentType' => $email_type,
				'content'     => $content,
			),
			'toRecipients' => array(
				array(
					'emailAddress' => array(
						'address' => $mail_config['mail_to'],
					),
				),
			),
		);
		$mail_object['saveToSentItems'] = ( ! empty( $mail_config['save_email_to_sent_items'] ) && ( 1 === $mail_config['save_email_to_sent_items'] ) );

		$azure_api = MOAzure_Azure_API::get_azure_api_obj();
		$azure_api->set_mail_ep( $mail_config );
		$azure_api->set_api_body( $mail_object );

		$email_res = $azure_api->moazure_send_email();

		return $email_res;
	}
}
