<?php
namespace Adminz\Controller;

final class ContactForm7 {
	private static $instance = null;
	public $id = 'adminz_contactform7';
	public $name = 'Contact form 7';
	public $option_name = 'adminz_cf7';

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
		$this->plugin_loaded();
	}

	function plugin_loaded() {

		// ------------------ 
		if ( $this->settings['anti_spam'] ?? "" ) {
			/*
			 * Chống spam cho contact form 7
			 * Author: levantoan.com
			 * */
			/*Thêm 1 field ẩn vào form cf7*/
			add_filter( 'wpcf7_form_elements', function ($html) {
				$html = '<div style="display: none"><p><span class="wpcf7-form-control-wrap" data-name="devvn"><input size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" value="" type="text" name="devvn"></span></p></div>' . $html;
				return $html;
			} );

			/*Kiểm tra form đó mà được nhập giá trị thì là spam*/
			add_action( 'wpcf7_posted_data', function ($posted_data) {
				$submission = \WPCF7_Submission::get_instance();
				if ( !empty( $posted_data['devvn'] ) ) {
					$submission->set_status( 'spam' );
					$submission->set_response( 'You are Spamer' );
				}
				unset( $posted_data['devvn'] );
				return $posted_data;
			} );
		}

		// ------------------ 
		if ( $this->settings['allow_shortcode'] ?? "" ) {
			add_filter( 'wpcf7_form_elements', function ($form) {
				return do_shortcode( $form );
			} );
		}

		// ------------------ 
		if ( $this->settings['allow_shortcode_email'] ?? "" ) {
			add_filter( 'wpcf7_mail_components', function ($components) {
				if ( isset( $components['body'] ) ) {
					$components['body'] = do_shortcode( $components['body'] );
				}
				return $components;
			}, 100, 1 );
		}

		// ------------------ 
		if ( $this->settings['remove_auto_p'] ?? "" ) {
			//
			add_filter( 'wpcf7_autop_or_not', '__return_false' );
			// enable auto p on email 
			add_action( 'wpcf7_before_send_mail', function () {
				add_filter( 'wpcf7_autop_or_not', '__return_true' );
			} );
		}

		// ------------------ 
		if ( $this->settings['custom_email_layout'] ?? "" ) {
			if ( $custom_email_content = ( $this->settings['custom_email_content'] ?? "" ) ) {
				add_filter( 'wpcf7_mail_components', function ($components) use ($custom_email_content) {
					$components['body'] = str_replace(
						'{wpcf7_email_body}',
						$components['body'],
						$custom_email_content
					);

					return $components;
				}, 10, 1 );
			}
		}

		// ------------------ 
		if ( $this->settings['form_newletters'] ?? "" ) {
			$a = new \Adminz\Helper\Wpcf7();
			$a->make_form_newletters( 
				$this->settings['form_newletters'], 
				'adminz_newletters_email'
			);
		}

		// ------------------ 
		if ( $this->settings['thankyou'] ?? "" ) {
			$a = new \Adminz\Helper\Wpcf7();
			$a->make_thankyou();
		}
	}

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
			'adminz_cf7_section',
			'Contact Form 7',
			function () {},
			$this->id
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Anti spam by DevVN',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[anti_spam]',
					],
					'value'     => $this->settings['anti_spam'] ?? "",
				] );
			},
			$this->id,
			'adminz_cf7_section'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Allow shortcode',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[allow_shortcode]',
					],
					'value'     => $this->settings['allow_shortcode'] ?? "",
				] );
			},
			$this->id,
			'adminz_cf7_section'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Allow shortcode in email',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[allow_shortcode_email]',
					],
					'value'     => $this->settings['allow_shortcode_email'] ?? "",
					'note'      => '<strong>Use HTML content type</strong> is required!',
				] );
			},
			$this->id,
			'adminz_cf7_section'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Remove auto p tag',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[remove_auto_p]',
					],
					'value'     => $this->settings['remove_auto_p'] ?? "",
				] );
			},
			$this->id,
			'adminz_cf7_section'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Custom email layout',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[custom_email_layout]',
					],
					'value'     => $this->settings['custom_email_layout'] ?? "",
					'note'      => '<strong>Use HTML content type</strong> is required!',
				] );

				// field
				echo adminz_toggle_button( __( 'Content' ), ".xxxxxxxxxxxx" );
				$default = <<<HTML
				<body style="background:#f6f6f6; padding: 70px 0;">
					<div style="max-width: 560px; padding: 20px; margin: auto; background-color: white;">
						{wpcf7_email_body}
					</div>
				</body>
				HTML;
				$value   = $this->settings['custom_email_content'] ?? "";
				$value   = $value ? $value : $default;
				echo adminz_field( [ 
					'field'     => 'textarea',
					'attribute' => [ 
						'name' => $this->option_name . '[custom_email_content]',
					],
					'value'     => $value,
					'suggest'   => '{wpcf7_email_body}',
					'before'    => '<div class="xxxxxxxxxxxx hidden" style="margin-top: 15px;"><div class="___default_wrap">',
					'after'     => '</div></div>',
				] );
			},
			$this->id,
			'adminz_cf7_section'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Form as newsletters',
			function () {
				// field
				echo adminz_field( [ 
					'field'       => 'select',
					'attribute'   => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[form_newletters]',
					],
					'post_select' => [ 
						'post_type' => 'wpcf7_contact_form',
					],
					'value'       => $this->settings['form_newletters'] ?? "",
					'note'        => 'Use Field email name: ' . adminz_copy( 'adminz_newletters_email', false ) . "as default, and only for Post type <strong>Post</strong>",
				] );
			},
			$this->id,
			'adminz_cf7_section'
		);

		// field 
		add_settings_field(
			wp_rand(),
			'Thankyou',
			function () {
				// field
				echo adminz_field( [ 
					'field'     => 'input',
					'attribute' => [ 
						'type' => 'checkbox',
						'name' => $this->option_name . '[thankyou]',
					],
					'value'     => $this->settings['thankyou'] ?? "",
				] );
			},
			$this->id,
			'adminz_cf7_section'
		);
	}
}