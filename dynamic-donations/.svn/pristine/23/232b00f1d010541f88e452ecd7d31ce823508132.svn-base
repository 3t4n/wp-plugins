<?php

class DyDo_Admin {

	public $hook;

	/**
	 * DyDo_Admin constructor.
	 */
	public function __construct() {
		 $this->define_hooks();
	}

	/**
	 * Hooks
	 */
	public function define_hooks() {
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		// add_action( 'admin_notices', array( $this, 'stripe_missing_apikey_notice' ) );
		add_action( 'woocommerce_settings_save_general', array( $this, 'settings_save_currency' ) );
		// add_action( 'admin_init', array( $this, 'check_status' ) );
		$page = isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : '';

		if ( $page === DYDO_NAME ) {
			add_action(
				'wp_default_styles',
				function ( $arr ) {
					$deps  = $arr->registered['wp-admin']->deps;
					$index = array_search( 'forms', $deps );

					if ( $index !== false ) {
						unset( $deps[ $index ] );
					}

					$arr->registered['wp-admin']->deps = $deps;
				},
				10,
				1
			);
		}
	}

	public function enqueue_styles() {
		$page = isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : '';
		if ( $page === DYDO_NAME ) {
			DyDo_Enqueues::style( DYDO_NAME . '-core', 'admin/css/dydo-admin.css' )->enqueue();
		}
	}

	public function enqueue_scripts() {
		 $page = isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : '';

		if ( $page === DYDO_NAME ) {
			add_action(
				'in_admin_header',
				function () {
					remove_all_actions( 'admin_notices' );
					remove_all_actions( 'all_admin_notices' );
				}
			);

			add_action(
				'in_admin_footer',
				function () {
					remove_all_filters( 'update_footer' );
					add_filter(
						'admin_footer_text',
						function () {
							return '';
						}
					);
				}
			);

			DyDo_Enqueues::script( DYDO_NAME . '-app', 'admin/js/app.bundle.js' )->enqueue();
			$options = dydo_get_options_array();
			wp_localize_script(
				DYDO_NAME . '-app',
				'dydo_wp_admin',
				array(
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'plugin'   => array(
						'name'           => 'Dynamic Donations',
						'version'        => DYDO_VERSION,
						'license'        => $options['license']['code'] ?: PWP_LICENSE_DEFAULT,
						'licenseExpires' => $this->is_license_active(),
						'isLicensePro'   => stripos( $options['license']['code']['key'], 'pro' ) !== false,
						'options'        => array(
							'currencies'               => array_values( DYDO_SUPPORTED_CURRENCIES ),
							'selectedCurrencies'       => $options['payment']['selected_currencies'] ?: array(),
							'defaultCurrency'          => DYDO_SUPPORTED_CURRENCIES[ $options['payment']['default_currency'] ?: 'usd' ],
							'showCurrencies'           => (bool) $options['style']['show_currencies'] == 1,
							'pages'                    => (array) get_pages(),
							'donatiosUrlType'          => $options['donations']['donations_url_type'],
							'donatiosUrl'              => $options['donations']['donations_url'],
							'donatiosPage'             => $options['donations']['donations_page'],
							'labelButton'              => $options['style']['label_button'],
							'recurringDonationEnabled' => (bool) $options['donations']['recurring_donation_enabled'] == 1,
							'onetimeDonationEnabled'   => (bool) $options['donations']['onetime_donation_enabled'] == 1,
							'stripePK'                 => $options['payment']['stripe_pk'],
							'stripeSK'                 => $options['payment']['stripe_sk'],
							'theme'                    => $options['style']['theme'],
							'customStyle'              => $options['style']['custom_style'],
							'paymentGateway'           => $options['payment']['payment_gateway'],
							'amounts'                  => $options['donations']['amounts'],
							'description'              => $options['style']['description'],
							'showDescription'          => (bool) $options['style']['show_description'] == 1,
							'helperLabels'             => (array) $options['style']['helper_labels'],
							'webhook'                 => (bool) isset( $options['stripe_webhook']['id'] ) && $options['stripe_webhook']['id']  != '',
							'receipts'                 => array(
								'custom_paragraph' => $options['receipts']['custom_paragraph'],
								'bcc'              => $options['receipts']['bcc'],
								'send'             => (bool) $options['receipts']['payment_gateway'][ $options['payment']['payment_gateway'] ],
								'smtp'             => (bool) $options['receipts']['smtp'],
								'smtp_settings'    => (array) $options['receipts']['smtp_settings'],
							),
						),
					),
				)
			);
		}
	}

	public function add_options_page() {
		$this->hook = add_menu_page(
			__( 'Dynamic Donations - Settings', DYDO_NAME ),
			__( 'Dynamic Donations', DYDO_NAME ),
			'manage_options',
			DYDO_NAME,
			array( $this, 'display_options_page' ),
			'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTIwLjY5MDQgMzQuODIxN0MyMC44MTggMzQuNjQ1MiAyMC45NTE3IDM0LjQ2ODcgMjEuMDczMiAzNC4yOTIyQzIyLjI4MjIgMzIuNjI0NiAyMi43ODA0IDMwLjAzNzkgMjIuMzczNCAyNy41MzA0QzIyLjAwODggMjUuMjc4NSAyMC45Njk5IDIzLjM5NzggMTkuNTM2MSAyMi4zNjkyQzE4LjEyMDUgMjEuMzU4OSAxNy4wMzMgMjAuMTA1MSAxNi4zODkgMTguNzU0QzE1LjY3ODEgMTcuMjQ0NiAxNS41MjYyIDE1LjY3NDMgMTUuOTU3NiAxNC4yMTM2QzE2LjQwMTEgMTIuNzA0MiAxNy40MzQgMTEuNDQ0NCAxOC45MzQ2IDEwLjU2MThDMjAuMzM4MSA5Ljc0MDE5IDIyLjExMjEgOS4yNzc2NCAyNC4yMDgyIDkuMTgwMjZDMjQuNDMzIDkuMTY4MDggMjQuNjYzOCA5LjE2ODA4IDI0Ljg5NDcgOS4xNjgwOEMyNi4zMjI1IDkuMTY4MDggMjcuNzM4IDkuMzU2NzYgMjkuMTExMSA5LjY3OTMzQzI1LjkwMzIgNC4yODY4OSAyMC4xMzc2IDAuNTk4NjEgMTEuMzg4OCAwLjk4ODEzMUMtMy4xNDk5MiAxLjYyNzE5IDcuNDc2MTggMTIuMjQ3NyA1LjI1ODYxIDIxLjk0MzJDMy4wMzQ5NyAzMS42Mzg2IC0xLjA2NjAxIDQwLjE1OTQgOS45NzMyMiA0MC45MDE5QzEyLjQ1ODEgNDEuMDY2MyAxNC45NDkxIDQwLjc1NTkgMTcuMzI0NiA0MC4wNDk4QzE4LjIwNTYgMzguMjI0IDE5LjUxNzkgMzYuNDI4NSAyMC42OTA0IDM0LjgyMTdaIiBmaWxsPSIjOUJBMkE3Ii8+CjxwYXRoIGQ9Ik00NS43ODkxIDMwLjY5NTJDNDUuNzg5MSAzNy44MjIyIDQxLjIyMDMgNDEuOSAzNi45OTc4IDQ0LjMzNDVDMzIuNzc1MyA0Ni43NjkgMjguNTU4OSA0Ny43MDYzIDI0LjMxMjEgNDcuNDIwM0MxNC41NzMgNDYuNzYyOSAxOS44NzcgNDAuMDgwMiAyMy4wMzYyIDM1LjcyODVDMjYuMTk1NSAzMS4zNzY4IDI1LjM3NTMgMjMuNTU2IDIwLjk0MDIgMjAuMzkxMUMxNi41MDUgMTcuMjI2MyAxNy4xNDkxIDExLjkzNzMgMjQuMzEyMSAxMS42MjA4QzMwLjgzNzIgMTEuMzM0NyAzNy43ODE1IDE2LjAyNzMgMzkuNzEzNSAxNy43OTIzQzQxLjY0NTYgMTkuNTYzNCA0NS43ODkxIDI0LjI4MDIgNDUuNzg5MSAzMC42OTUyWiIgZmlsbD0iIzlCQTJBNyIvPgo8L3N2Zz4K'
		);
	}

	public function display_options_page() {
		$page = isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : '';

		if ( $page === DYDO_NAME ) {
			require_once 'views/dydo-admin-display.php';
		}
	}

	private function is_license_active() {
		return dydo_get_options_array()['license']['status'] === 'active';
	}

	public function check_status() {
		$domain = dydo_get_protocol();
		$url    = PWP_SITE_BASE_URL . '/wp-json' . PWP_SITE_LICENSES_ENDPOINT;
		$res    = dydo_request(
			$url,
			'GET',
			array(
				'action'  => 'status-check',
				'key'     => dydo_get_options_array()['license']['code']['key'],
				'domain'  => $domain,
				'version' => DYDO_VERSION,
			)
		);
		$body   = json_decode( $res['body'] );

		if ( ! is_wp_error( $res ) && $res['response']['code'] == 200 ) {
			dydo_save_options_array( trim( strtolower( sanitize_text_field($body->licence_status) ) ), 'license', 'status' );
		}
	}

	/**
	 * To save into the dydo settings, the currency selected by the user in the woocommerce admin
	 */
	public function settings_save_currency() {
		dydo_save_currency_by_default_on_switch( dydo_get_options_array()['payment']['payment_gateway'] );
	}
}
