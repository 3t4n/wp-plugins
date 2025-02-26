<?php
namespace Adminz\Helper\Logs;

class Email {
	private $log_model;
	private $logs;
	private $submit_id;
	private $table_name = 'adminz_email_logs';

	function __construct() {

	}
	
	function init() {

		$args  = [ 
			'table_name' => $this->table_name,
			'menu_title' => 'Email logs',
			'fields'     => [ 
				'id INT(11) NOT NULL AUTO_INCREMENT,',
				'subject varchar(255) NULL,',
				'body longtext NULL,',
				'from_mail varchar(255) NULL,',
				'to_mail varchar(255) NULL,',
				'status int NULL,',
				'date datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,',
				'category varchar(255) NULL,',
				'category_id varchar(100) NULL,',
				'log longtext NULL,',
				'PRIMARY KEY (id)',
			],
		];
		$table = \WpDatabaseHelper\Init::WpDatabase();
		$table->init_table( $args );
		$this->log_model = $table;

		// prepare email category
		$this->prepare_email_category();

		// save email to and messsage
		add_action( 'phpmailer_init', [ $this, 'get_phpmailer_config' ], 10, 1 );
		add_action( 'phpmailer_init', [ $this, 'create_email_log' ], 10, 1 );
		add_action( 'wp_mail_succeeded', [ $this, 'update_email_success' ], 10, 1 );
		add_action( 'wp_mail_failed', [ $this, 'update_email_fail' ], 10, 1 );
	}

	function prepare_email_category() {

		// wpcf7
		add_action( 'wpcf7_contact_form', function ($wpcf7) {
			add_filter( 'adminz_emailog_category_id', function () use ($wpcf7) {
				return $wpcf7->id();
			} );
			add_filter( 'adminz_emailog_category', function () use ($wpcf7) {
				return 'wpcf7';
			} );
		}, 10, 1 );

		// woocommerce
		$email_actions = apply_filters(
			'woocommerce_email_actions',
			array(
				'woocommerce_low_stock',
				'woocommerce_no_stock',
				'woocommerce_product_on_backorder',
				'woocommerce_order_status_pending_to_processing',
				'woocommerce_order_status_pending_to_completed',
				'woocommerce_order_status_processing_to_cancelled',
				'woocommerce_order_status_pending_to_failed',
				'woocommerce_order_status_pending_to_on-hold',
				'woocommerce_order_status_failed_to_processing',
				'woocommerce_order_status_failed_to_completed',
				'woocommerce_order_status_failed_to_on-hold',
				'woocommerce_order_status_cancelled_to_processing',
				'woocommerce_order_status_cancelled_to_completed',
				'woocommerce_order_status_cancelled_to_on-hold',
				'woocommerce_order_status_on-hold_to_processing',
				'woocommerce_order_status_on-hold_to_cancelled',
				'woocommerce_order_status_on-hold_to_failed',
				'woocommerce_order_status_completed',
				'woocommerce_order_fully_refunded',
				'woocommerce_order_partially_refunded',
				'woocommerce_new_customer_note',
				'woocommerce_created_customer',
			)
		);
		foreach ( $email_actions as $action ) {
			add_action( $action . '_notification', function () {
				$current_filter = current_filter();
				add_filter( 'adminz_emailog_category_id', function () use ($current_filter) {
					return $current_filter;
				} );
				add_filter( 'adminz_emailog_category', function () {
					return 'woocommerce';
				} );
			}, 10, 1 );
		}
	}

	function get_phpmailer_config( $phpmailer ) {
		$phpmailer_config = [ 
			'CharSet'     => $phpmailer->CharSet,
			'ContentType' => $phpmailer->ContentType,
			'From'        => $phpmailer->From,
			'FromName'    => $phpmailer->FromName,
			'Subject'     => '', // move to column: subject
			'Body'        => '', //move to column: body
			'Host'        => $phpmailer->Host,
			'Port'        => $phpmailer->Port,
			'SMTPSecure'  => $phpmailer->SMTPSecure,
			'SMTPAutoTLS' => $phpmailer->SMTPAutoTLS,
			'SMTPAuth'    => $phpmailer->SMTPAuth,
			'Username'    => $phpmailer->Username,
			'Password'    => $phpmailer->Password,
			'to'          => $this->__get_emails( $phpmailer->getToAddresses() ),
			'cc'          => $this->__get_emails( $phpmailer->getCcAddresses() ),
			'bcc'         => $this->__get_emails( $phpmailer->getBccAddresses() ),
			'ReplyTo'     => $this->__get_emails( $phpmailer->getReplyToAddresses() ),
		];
		$this->logs       = [ 'phpmailer_config' => $phpmailer_config ];
	}

	function create_email_log( $phpmailer ) {
		global $wpdb;

		$to_mail   = $this->__get_emails( $phpmailer->getToAddresses() );
		$from_mail = $phpmailer->From;

		// create record
		$data = [ 
			"subject"     => $phpmailer->Subject,
			"body"        => wp_strip_all_tags( $phpmailer->Body ),
			"from_mail"   => $from_mail,
			"to_mail"     => $to_mail,
			"category"    => apply_filters( 'adminz_emailog_category', 'unknow' ),
			"category_id" => apply_filters( 'adminz_emailog_category_id', 'unknow' ),
			"status"      => "",
			// "date" => '', // leave empty to auto increase
		];

		$table_name = $wpdb->prefix . $this->table_name;
		$wpdb->insert( $table_name, $data );

		// Get the ID of the inserted row
		$this->submit_id = $wpdb->insert_id;
	}

	function update_email_success( $mail_data ) {
		$data            = [ 
			"id"     => $this->submit_id ?? "",
			"status" => 200,
		];
		$this->submit_id = $this->log_model->update( $data );
	}

	function update_email_fail( $wp_error ) {
		$error_data = $wp_error->get_error_data();

		// Get detailed error information
		$error_message = $wp_error->get_error_message();
		$error_codes   = $wp_error->get_error_codes();

		// Prepare the error information as an array
		$error_info = [ 
			'error_info' => [ 
				'error_message' => $error_message,
				'error_codes'   => $error_codes,
				'error_data'    => $error_data,
			],
		];

		// Convert the error information to JSON
		$this->logs      = array_merge( $this->logs, $error_info );
		$data            = [ 
			'id'     => $this->submit_id ?? "",
			'status' => 500,
			'log'    => json_encode( $this->logs ),
		];
		$this->submit_id = $this->log_model->update( $data );
	}

	function __get_emails( $array ) {
		$emails  = array();
		$pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
		foreach ( $array as $key => $values ) {
			foreach ( $values as $email ) {
				if ( preg_match( $pattern, $email ) ) {
					$emails[] = $email;
				}
			}
		}
		return json_encode( $emails );
	}
}