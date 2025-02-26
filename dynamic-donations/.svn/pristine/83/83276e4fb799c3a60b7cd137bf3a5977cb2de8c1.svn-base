<?php

class DyDo_Public {

	/**
	 * DyDo_Public constructor.
	 */
	public function __construct() {
		 $this->define_hooks();
	}

	/**
	 * Hooks
	 */
	public function define_hooks() {
		// add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'init', array( $this, 'add_shortcodes' ) );
		add_filter( 'locale_stylesheet_uri', array( $this, 'custom_style' ) );
	}

	public function enqueue_styles() {
		DyDo_Enqueues::style( DYDO_NAME . '-base', 'public/css/dydo-public-base.css' )->enqueue();

		if ( dydo_get_options_array()['style']['theme'] === 'default' ) {
			DyDo_Enqueues::style( DYDO_NAME . '-default', 'public/css/dydo-public-default.css' )->enqueue();
		}
	}

	public function enqueue_scripts() {
		 DyDo_Enqueues::script( DYDO_NAME . '-modal', 'public/js/app.bundle.js' )->enqueue();
		wp_localize_script(
			DYDO_NAME . '-modal',
			'dydo_wp_public',
			array(
				'ajax_url'        => admin_url( 'admin-ajax.php' ),
				'nonce'           => wp_create_nonce( 'dydo-public-nonce' ),
				'plugin'          => array(
					'stripe'     => array(
						'pk' => dydo_get_options_array()['payment']['stripe_pk'],
					),
					'assets_uri' => DYDO_ASSETS_URI,
				),
				'initial_options' => dydo_get_global_settings(),
			)
		);
		wp_localize_script( DYDO_NAME . '-modal', 'dydo_texts', DYDO_TEXTS );
	}

	public function add_shortcodes() {
		add_shortcode( 'dydo_button', array( $this, 'shortcode_button' ) );
		add_shortcode( 'dydo_donation', array( $this, 'shortcode_app' ) );
		add_shortcode( 'dydo_your_donations', array( $this, 'shortcode_your_donation' ) );
        add_shortcode( 'dydo_manage_payments', array( $this, 'shortcode_manage_payments' ) );

	}

	public function shortcode_button( $atts ) {
		$atts   = shortcode_atts(
			array(
				'label'                 => dydo_get_options_array()['style']['label_button'] ?: 'Donate',
				'type'                  => '',
				'amount'                => '',
				'currency'              => '',
				'period_mode'           => '',
				'period_interval'       => '',
				'period_interval_count' => '',
				'screen'                => 'DONATION_SETUP',
			),
			$atts,
			'dydo_button'
		);
		$button = '<button class="dydo_open-modal" data-type="%s" data-amount="%s" data-currency="%s" data-period-mode="%s" data-period-interval="%s" data-period-interval-count="%s" data-screen="%s">%s</button>';

		return sprintf(
			$button,
			$atts['type'],
			$atts['amount'],
			$atts['currency'],
			$atts['period_mode'],
			$atts['period_interval'],
			$atts['period_interval_count'],
			strtoupper( $atts['screen'] ),
			$atts['label']
		);
	}

	public function shortcode_app() {
		return '<div class="dydo_root-app"><div class="dydo_loader-ellipsis dydo_loader-ellipsis--primary"><div></div><div></div><div></div><div></div></div></div>';
	}

	public function shortcode_your_donation() {
		 $html     = null;
		$file_path = '/public/views/dydo-woo-donations.php';

		if ( file_exists( DYDO_INCLUDES_PATH . $file_path ) ) {
			ob_start();

			include_once DYDO_INCLUDES_PATH . $file_path;

			$html = ob_get_clean();
		}

		return $html;
	}

    public function shortcode_manage_payments() {
        $html     = null;
        $file_path = '/public/views/dydo-manage-payments.php';

        if ( file_exists( DYDO_INCLUDES_PATH . $file_path ) ) {
			ob_start();

			include_once DYDO_INCLUDES_PATH . $file_path;

			$html = ob_get_clean();
		}

		return $html;
        
    }

	public function custom_style() {
		if ( dydo_get_options_array()['style']['theme'] == 'custom' ) {
			echo '<style>' . dydo_get_options_array()['style']['custom_style'] . '</style>';
		}
	}
}
