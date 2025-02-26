<?php
namespace Adminz\Controller;

final class Mailer {
	private static $instance = null;
	public $id = 'adminz_mailer';
	public $name = 'SMTP mailer';
	public $option_name = 'adminz_mailer';

	public $settings = [];

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function __construct() {
		add_filter( 'adminz_option_page_nav', [ $this, 'add_admin_nav' ], 10, 1 );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
		$this->load_settings();
		$this->run();
		add_filter( 'pre_wp_mail', [$this, 'pre_wp_mail'], 10, 2 );
		add_action( 'wp_ajax_adminz_test_email', [$this, 'adminz_test_email'], 10, 2 );
	}

	function run(){
		// 
		if($this->settings['email_to_fixed'] ?? ''){
			add_filter( 'wp_mail', function($atts){
				$atts['to'] = $this->settings['email_to_fixed'];
				return $atts;
			} );
		}

		// 
		if(($this->settings['email_wp_cron'] ?? '') == 'on'){

			add_filter( 'pre_wp_mail', function ($return, $args) {
				$transient_key = "adminz_" . md5( $args['to'] . $args['subject'] . $args['message'] . implode( '', (array) $args['attachments'] ) );

				if ( !get_transient( $transient_key ) ) {
					wp_schedule_single_event( time() + 15, 'adminz_schedule_email', [ $args ] );
					set_transient( $transient_key, true, 3600 );
					return true;
				}

				return $return;
			}, 10, 2 );

			add_action( 'adminz_schedule_email', function ($args) {
				wp_mail(
					$args['to'],
					$args['subject'],
					$args['message'],
					$args['headers'],
					$args['attachments']
				);

				$transient_key = "adminz_" . md5( $args['to'] . $args['subject'] . $args['message'] . implode( '', (array) $args['attachments'] ) );
				error_log( $transient_key );
				set_transient( $transient_key, true, 3600 );
			} );


		}
	}

	// phpmailer settings
	function pre_wp_mail( $wp_mail, $atts ) {
		if ( ( $this->settings['adminz_mailer_disabled'] ?? "" ) == 'on' ) {
			return $wp_mail;
		}
		$this->setup_mail();

		return $wp_mail;
	}

	function setup_mail() {
		add_action( 'phpmailer_init', function ($phpmailer) {
			if ( isset( $phpmailer->isSMTP ) && $phpmailer->isSMTP() ) {
				// Nếu PHPMailer đã được cấu hình bởi plugin khác, không ghi đè
				return;
			}

			$phpmailer->isSMTP();
			$phpmailer->Host       = $this->settings['adminz_mailer_host'];
			$phpmailer->SMTPAuth   = $this->settings['adminz_mailer_smtpauth'] === 'on';
			$phpmailer->Username   = $this->settings['adminz_mailer_username'];
			$phpmailer->Password   = $this->settings['adminz_mailer_password'];
			$phpmailer->SMTPSecure = $this->settings['adminz_mailer_smtpsecure'];
			$phpmailer->Port       = $this->settings['adminz_mailer_port'];

			if ( !empty( $this->settings['adminz_mailer_from'] ) ) {
				$phpmailer->setFrom( $this->settings['adminz_mailer_from'], $this->settings['adminz_mailer_fromname'] );
			}

			if ( ( $this->settings['enable_ssl'] ?? "" ) == 'on' ) {
				$phpmailer->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
			}

		}, 10, 1 );
	}

	function adminz_test_email() {
		if ( !wp_verify_nonce( $_POST['nonce'], 'adminz_js' ) ) exit;
		$return = false;

		ob_start();

		// code here
		if( $email_to = ( $_POST['adminz_mailer']['adminz_mailer_test_email_checker'] ?? "")){
			// override settings from post
			$this->settings = $_POST['adminz_mailer'];

			$email_to = sanitize_email($email_to);
			add_action( 'phpmailer_init', function ($phpmailer) {
				echo "<pre>"; print_r("---------------------- PHPMAILER SETUP: --------------------- "); echo "</pre>";
				echo "<pre>"; print_r($phpmailer); echo "</pre>";

				echo "<pre>"; print_r("---------------------- PHPMAILER DEBUG: --------------------- "); echo "</pre>";
				// Bật chế độ debug
				$phpmailer->SMTPDebug   = 3; // Hoặc 1, 2, 3 tùy mức độ chi tiết bạn muốn
				$phpmailer->Debugoutput = function ($str, $level) {
					// Ghi thông tin debug vào error_log
					echo "<pre>"; print_r($str); echo "</pre>";
				};
			} );


			$result = wp_mail(
				$email_to, 
				'Test SMTP email function', 
				'OK!'
			);

			echo "<pre>"; print_r("---------------------- EMAIL SENT STATUS: --------------------- "); echo "</pre>";
			var_dump($result);
		}

		$return = ob_get_clean();

		if ( !$return ) {
			wp_send_json_error( 'Error' );
			wp_die();
		}

		wp_send_json_success( $return );
		wp_die();
	}

	// adminz settings
	function load_settings() {
		$this->settings = get_option( $this->option_name, [] );
	}

	function add_admin_nav( $nav ) {
		$nav[ $this->id ] = $this->name;
		return $nav;
	}

	function register_settings() {
		register_setting( $this->id, $this->option_name );

		// add section
		add_settings_section(
			'adminz_mailer_test_smtp_config',
			'SMTP config',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Disable this',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[adminz_mailer_disabled]',
					],
					'value' => $this->settings['adminz_mailer_disabled'] ?? "",
					'note'     => "Keep settings but disable as tempolary",
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Host',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'        => 'text',
						'name'        => $this->option_name . '[adminz_mailer_host]',
					],
					'value'     => $this->settings['adminz_mailer_host'] ?? "",
					'suggest'      => 'smtp.gmail.com',
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'User name',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'  => 'text',
						'name'  => $this->option_name . '[adminz_mailer_username]',
					],
					'value'     => $this->settings['adminz_mailer_username'] ?? "",
					'note'      => 'abc@gmail.com',
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Password',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'  => 'password',
						'name'  => $this->option_name . '[adminz_mailer_password]',
					],
					'value'     => $this->settings['adminz_mailer_password'] ?? "",
					'note'      => 'App password',
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Email from',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'  => 'text',
						'name'  => $this->option_name . '[adminz_mailer_from]',
					],
					'value'     => $this->settings['adminz_mailer_from'] ?? "",
					'note'      => 'abc@gmail.com',
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'From name',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'  => 'text',
						'name'  => $this->option_name . '[adminz_mailer_fromname]',
					],
					'value'     => $this->settings['adminz_mailer_fromname'] ?? "",
					'note'      => 'Your Name',
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Port',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'  => 'number',
						'name'  => $this->option_name . '[adminz_mailer_port]',
					],
					'value'     => $this->settings['adminz_mailer_port'] ?? "",
					'suggest'      => '587',
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'SMTPAuth',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[adminz_mailer_smtpauth]',
					],
					'value' => $this->settings['adminz_mailer_smtpauth'] ?? "",
					'suggest'     => "on",
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'SMTPSecure',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'select',
					'attribute' => [ 
						'name' => $this->option_name . '[adminz_mailer_smtpsecure]'
					],
					'options'   => [ 
						'tls' => 'TLS',
						'ssl' => 'SSL',
					],
					'value'     => $this->settings['adminz_mailer_smtpsecure'] ?? "",
					'suggest' => 'tls'
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Enable SSL Certificate Verification',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[enable_ssl]',
					],
					'value' => $this->settings['enable_ssl'] ?? "",
					'note' => 'Enable to use email ssl'
				] );
			},
			$this->id,
			'adminz_mailer_test_smtp_config'
		);

		// add section
		add_settings_section(
			'adminz_mailer_tools',
			'Tools',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Email schedule ',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[email_wp_cron]',
					],
					'value'     => $this->settings['email_wp_cron'] ?? "",
					'note'      => 'Use plugin: <a target=blank href=https://wordpress.org/plugins/wp-crontrol/>WP Crontrol</a> for more manage email',
				] );
			},
			$this->id,
			'adminz_mailer_tools'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Fixed email to',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'text',
						'name' => $this->option_name . '[email_to_fixed]',
					],
					'value'     => $this->settings['email_to_fixed'] ?? "",
					'note'      => 'Every email must be sent to this email',
				] );
			},
			$this->id,
			'adminz_mailer_tools'
		);

		// add section
		add_settings_section(
			'adminz_mailer_test',
			'Test',
			function () {
			},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Your email checker',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'  => 'text',
						'class' => 'adminz_field regular-text email_test',
						'name'  => $this->option_name . '[adminz_mailer_test_email_checker]',
					],
					'value'     => $this->settings['adminz_mailer_test_email_checker'] ?? "",
					'before'    => '',
					'after'     => '',
				]
				);

				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type'          => 'button',
						'class'         => [ 'button', 'button-primary', 'adminz_fetch' ],
						'data-response' => '.adminz_response',
						'data-action'   => 'adminz_test_email',
					],
					'value'     => 'Check',
					'before'    => '',
					'after'     => '',
				] );
				echo '<div class="adminz_response"></div>';
			},
			$this->id,
			'adminz_mailer_test'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Server information',
			function () {
				// clone from smtp mailer
				$server_info    = [];
				$server_info[]  = sprintf( 'OS: %s%s', php_uname(), PHP_EOL );
				$server_info[]  = sprintf( 'PHP version: %s%s', PHP_VERSION, PHP_EOL );
				$server_info[]  = sprintf( 'WordPress version: %s%s', get_bloginfo( 'version' ), PHP_EOL );
				$server_info[]  = sprintf( 'WordPress multisite: %s%s', ( is_multisite() ? 'Yes' : 'No' ), PHP_EOL );
				$openssl_status = 'Available';
				$openssl_text   = '';
				if ( !extension_loaded( 'openssl' ) && !defined( 'OPENSSL_ALGO_SHA1' ) ) {
					$openssl_status = 'Not available';
					$openssl_text   = ' (openssl extension is required in order to use any kind of encryption like TLS or SSL)';
				}
				$server_info[]               = sprintf( 'openssl: %s%s%s', $openssl_status, $openssl_text, PHP_EOL );
				$server_info[]               = sprintf( 'allow_url_fopen: %s%s', ( ini_get( 'allow_url_fopen' ) ? 'Enabled' : 'Disabled' ), PHP_EOL );
				$stream_socket_client_status = 'Not Available';
				$fsockopen_status            = 'Not Available';
				$socket_enabled              = false;
				if ( function_exists( 'stream_socket_client' ) ) {
					$stream_socket_client_status = 'Available';
					$socket_enabled              = true;
				}
				if ( function_exists( 'fsockopen' ) ) {
					$fsockopen_status = 'Available';
					$socket_enabled   = true;
				}
				$socket_text = '';
				if ( !$socket_enabled ) {
					$socket_text = ' (In order to make a SMTP connection your server needs to have either stream_socket_client or fsockopen)';
				}
				$server_info[] = sprintf( 'stream_socket_client: %s%s', $stream_socket_client_status, PHP_EOL );
				$server_info[] = sprintf( 'fsockopen: %s%s%s', $fsockopen_status, $socket_text, PHP_EOL );
				echo '<div class="adminz_response"><p>';
				echo implode( "</p><p>", $server_info );
				echo '</p></div>';
			},
			$this->id,
			'adminz_mailer_test'
		);
	}
}