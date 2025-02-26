<?php
/**
 * All common functions to load in both admin and front
 */
namespace codexpert\Mailx;
use codexpert\plugin\Base;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Common
 * @author Codexpert <hi@codexpert.io>
 */
class Common extends Base {

	public $plugin;

	/**
	 * Constructor function
	 */
	public function __construct( $plugin ) {
		$this->plugin	= $plugin;
		$this->slug		= $this->plugin['TextDomain'];
		$this->name		= $this->plugin['Name'];
		$this->server	= $this->plugin['server'];
		$this->version	= $this->plugin['Version'];
	}

	public function change_sender_name( $sender_name ) {
		return Helper::get_option( 'mailx_basic', 'sender_name', Helper::default_sender_name() );
	}

	public function change_sender_email( $sender_email ) {
		return Helper::get_option( 'mailx_basic', 'sender_email', Helper::default_sender_email() );
	}

	public function set_content_type( $content_type ) {
		return Helper::get_option( 'mailx_basic', 'html_mail', false ) !== false ? 'text/html' : $content_type;
	}
}