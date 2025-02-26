<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class SendCloud {
	private $baseUrl = 'https://api.sendcloud.net/apiv2/';
	private $api_user;
	private $api_key;
	private $from;
	private $fromName;
	private $reply_to;

	public function __construct( string $api_user = null, string $api_key = null, string $from = null, string $fromName = null, string $reply_to = null ) {
		$this->api_user = $api_user ?: get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_api_user'];
		$this->api_key  = $api_key ?: get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_api_key'];
		$this->from     = $from ?: get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_from'];
		$this->fromName = $fromName ?: get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_from_name'];
		$this->reply_to = $reply_to ?: get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_reply_to'];
	}

	public function sendMail( $to, $subject, $html, $headers = '', $attachments = array(), $reply_to = null ) {
		$url    = 'mail/send';
		$host   = $this->baseUrl . $url;
		$params = array(
			'apiUser'  => $this->api_user,
			'apiKey'   => $this->api_key,
			'from'     => sanitize_email( $this->from ),
			'fromName' => $this->fromName,
			'to'       => sanitize_email( $to ),
			'subject'  => $subject,
			'html'     => $html,
			'replyTo'  => sanitize_email( $reply_to ?: $this->reply_to )
		);

		if ( ! empty( $attachments ) ) {
			foreach ( $attachments as $attachment ) {
				$params['attachments'][] = curl_file_create( $attachment );
			}
		}

		return $this->request( $host, $params, $headers );
	}

	public function addAddressMember( $members = array(), $names = array(), $address = null ) {
		$address = $address ?: get_option( 'newsletter_for_sendcloud_options' )['newsletter_for_sendcloud_mail_list'];
		$url     = 'addressmember/add';
		$host    = $this->baseUrl . $url;
		$params  = array(
			'apiUser' => $this->api_user,
			'apiKey'  => $this->api_key,
			'address' => $address,
			'members' => implode( ';', $members )
		);

		if ( ! empty( $names ) ) {
			$params['names'] = implode( ';', $names );
		}

		return $this->request( $host, $params );
	}

	private function request( $host, $params, $headers = array() ) {
		$args     = array(
			'body'        => $params,
			'timeout'     => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array(),
			'cookies'     => array()
		);
		$response = wp_remote_post( $host, $args );
		if ( ! is_wp_error( $response ) ) {
			$body = json_decode( $response['body'] );
			if ( $body->statusCode === 200 ) {
				return true;
			}
		}

		return false;
	}
}
