<?php

/**
 * The messages-specific functionality of the plugin.
 *
 * @link       http://www.autovisie.nl
 * @since      1.0.0
 *
 * @package    Av_Slack_Notifications
 * @subpackage Av_Slack_Notifications/messages
 */

/**
 * The messages-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Av_Slack_Notifications
 * @subpackage Av_Slack_Notifications/messages
 * @author     Melvr
 */
class Av_Slack_Notifications_Messages {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The option name
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $option_name
	 */
	private $option_name = 'av_slack_notifications';

	/**
	 * The text domain
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $text-domain
	 */
	private $text_domain = 'av-slack-notifications';

	/**
	 * The url for slack.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $slack_url = null;

	/**
	 * The channel to send the message to
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $channel = null;

	/**
	 * The name the message is send from
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $name = null;

	/**
	 * The icon used to identify the slack notifications
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $icon = ':computer:';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'av-slack-notifications';
		$this->version = '1.0.0';
		$this->slack_url = $this->get_slack_url();
		$this->channel = $this->get_channel();
		$this->name = $this->get_name();

	}

	/**
	 * Send a notification
	 *
	 * @param bool $message
	 * @return array|bool|WP_Error
	 */
	public function send_notification( $message = false ){
		if( !$message
			|| is_null( $this->get_slack_url() )
			|| !$this->get_slack_url()
			|| is_null( $this->get_channel() )
			|| !$this->get_channel()
			|| is_null( $this->get_name() )
			|| !$this->get_name()
		){
			return false;
		}

		$message_body = array(
			'text' => $message,
			'channel' => $this->channel,
			'username' => $this->name,
			'icon_emoji' => $this->icon,
		);

		$response = wp_remote_post( $this->get_slack_url(), array(
				'method' => 'POST',
				'timeout' => 45,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking' => true,
				'headers' => array(),
				'body' => json_encode( $message_body ),
				'cookies' => array()
			)
		);

		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			$this->write_log( sprintf( 'Plugin: %s. Error: %s', $this->plugin_name, $error_message ) );

			return false;
		}

		return $response;
	}

	/**
	 * Get the slack url
	 *
	 * @return mixed|string|void
	 */
	protected function get_slack_url(){
		if( is_null( $this->slack_url ) || !$this->slack_url ){
			$this->set_slack_url();
		}

		return $this->slack_url;
	}

	/**
	 * Set the slack url
	 */
	protected function set_slack_url(){
		$this->slack_url = get_option( $this->option_name . '_url' );
	}

	/**
	 * Get the slack channel
	 *
	 * @return mixed|string|void
	 */
	protected function get_channel(){
		if( is_null( $this->channel ) || !$this->channel ){
			$this->set_channel();
		}

		return $this->channel;
	}

	/**
	 * Set the slack channel
	 */
	protected function set_channel(){
		$this->channel = get_option( $this->option_name . '_channel' );
	}

	/**
	 * Get the slack name
	 *
	 * @return mixed|string|void
	 */
	protected function get_name(){
		if( is_null( $this->name ) || !$this->name ){
			$this->set_name();
		}

		return $this->name;
	}

	/**
	 * Set the slack name
	 */
	protected function set_name(){
		$this->name = get_option( $this->option_name . '_name' );
	}

	/**
	 * Write data to the WP log
	 *
	 * @param $log
	 */
	protected function write_log( $log )  {
		if ( is_array( $log ) || is_object( $log ) ) {
			error_log( print_r( $log, true ) );
		} else {
			error_log( $log );
		}
	}
}
