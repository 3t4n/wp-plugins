<?php
/**
 * All settings related functions
 */
namespace codexpert\Mailx;
use codexpert\plugin\Base;

/**
 * @package Plugin
 * @subpackage Settings
 * @author Codexpert <hi@codexpert.io>
 */
class Settings extends Base {

	public $plugin;

	/**
	 * Constructor function
	 */
	public function __construct( $plugin ) {
		$this->plugin	= $plugin;
		$this->slug		= $this->plugin['TextDomain'];
		$this->name		= $this->plugin['Name'];
		$this->version	= $this->plugin['Version'];
	}
	
	public function init_menu() {
		
		$settings = [
			'id'            => $this->slug,
			'label'         => $this->name,
			'title'         => $this->name,
			'header'        => $this->name,
			'icon'			=> 'dashicons-email-alt',
			'parent'		=> 'tools.php',
			'sections'      => [
				'mailx_basic'	=> [
					'id'        => 'mailx_basic',
					'label'     => __( 'Settings', 'mailx' ),
					'icon'      => 'dashicons-admin-tools',
					'color'		=> '#4c3f93',
					'sticky'	=> true,
					'fields'    => [
						'sender_name' => [
							'id'        => 'sender_name',
							'label'     => __( 'Sender Name', 'mailx' ),
							'type'      => 'text',
							'default'   => Helper::default_sender_name(),
							'desc'		=> sprintf( __( 'By default your site uses <strong>%s</strong> as the email sender name. Change this to anything you want.', 'mailx' ), Helper::default_sender_name() ),
							'required'	=> true,
						],
						'sender_email' => [
							'id'		=> 'sender_email',
							'label'     => __( 'Sender Email', 'mailx' ),
							'type'      => 'email',
							'default'   => Helper::default_sender_email(),
							'desc'		=> sprintf( __( 'By default your site sends emails as <strong>%s</strong>. Change this to your own email to increase credibility.', 'mailx' ), Helper::default_sender_email() ),
							'required'	=> true,
						],
						'html_mail' => [
							'id'		=> 'html_mail',
							'label'     => __( 'HTML Mail', 'mailx' ),
							'type'      => 'switch',
							'desc'		=> __( 'Enable this if you want to use HTML content instead of plain text for the email', 'mailx' )
						],
					]
				],
			],
		];

		new \codexpert\plugin\Settings( $settings );
	}
}