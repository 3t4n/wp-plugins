<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor form Ecomail action.
 *
 * Custom Elementor form action which adds new subscriber to Ecomail after form submission.
 *
 * @since 1.0.0
 */
class Ecomail_Action extends \ElementorPro\Modules\Forms\Classes\Action_Base {

	/**
	 * Get action name.
	 *
	 * Retrieve Ecomail action name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string
	 */
	public function get_name() {
		return 'ecomail';
	}

	/**
	 * Get action label.
	 *
	 * Retrieve Ecomail action label.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string
	 */
	public function get_label() {
		return esc_html__( 'Ecomail', 'elementor-forms-ecomail-action' );
	}

	/**
	 * Register action controls.
	 *
	 * Add input fields to allow the user to customize the action settings.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param \Elementor\Widget_Base $widget
	 */
	public function register_settings_section( $widget ) {

		$widget->start_controls_section(
			'section_ecomail',
			[
				'label' => esc_html__( 'Ecomail', 'elementor-forms-ecomail-action' ),
				'condition' => [
					'submit_actions' => $this->get_name(),
				],
			]
		);

		$widget->add_control(
			'ecomail_api_key',
			[
				'label' => esc_html__( 'Ecomail API klíč', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Zadejte svůj Ecomail API klíč.', 'elementor-forms-ecomail-action' ),
			]
		);

		$widget->add_control(
			'ecomail_list_id',
			[
				'label' => esc_html__( 'Ecomail List ID', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'ID seznamu, do kterého chcete přidat nového odběratele.', 'elementor-forms-ecomail-action' ),
			]
		);

		$widget->add_control(
			'ecomail_email_field',
			[
				'label' => esc_html__( 'ID pole e-mailu', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'ecomail_name_field',
			[
				'label' => esc_html__( 'ID pole jména', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$widget->add_control(
			'ecomail_surname_field',
			[
				'label' => esc_html__( 'ID pole příjmení', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$widget->add_control(
			'ecomail_phone_field',
			[
				'label' => esc_html__( 'ID pole telefonu', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$widget->add_control(
			'ecomail_tags_field',
			[
				'label' => esc_html__( 'Štítky', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Napište jeden nebo více štítků odděleny čárkou. (Pozor! Štítky jsou citlivé na velké a malé písmena!)', 'elementor-forms-ecomail-action' ),
			]
		);
		
		$widget->add_control(
			'ecomail_update_existing',
			[
				'label' => esc_html__( 'Aktualizovat již existující kontakt?', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'description' => esc_html__( 'Pokud je zapnuto, aktualizuje již existující kontakt.', 'elementor-forms-ecomail-action' ),
				'default' => 'no',
				'label_on' => __( 'Ano', 'elementor-forms-ecomail-action' ),
				'label_off' => __( 'Ne', 'elementor-forms-ecomail-action' ),
				'return_value' => 'yes',
			]
		);
		
		$widget->add_control(
			'ecomail_resubscribe',
			[
				'label' => esc_html__( 'Znovu přihlásit k odběru?', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'description' => esc_html__( 'Pokud je zapnuto, znovu přihlásí kontakt, pokud byl dříve odhlášen.', 'elementor-forms-ecomail-action' ),
				'default' => 'no',
				'label_on' => __( 'Ano', 'elementor-forms-ecomail-action' ),
				'label_off' => __( 'Ne', 'elementor-forms-ecomail-action' ),
				'return_value' => 'yes',
			]
		);
		
		$widget->add_control(
			'ecomail_skip_confirmation',
			[
				'label' => esc_html__( 'Dvojité ověření?', 'elementor-forms-ecomail-action' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'description' => esc_html__( 'Pokud je zapnuto, bude vyžadováno dvojité ověření emailové adresy (tzv. double opt-in).', 'elementor-forms-ecomail-action' ),
				'default' => 'no',
				'label_on' => __( 'Ano', 'elementor-forms-ecomail-action' ),
				'label_off' => __( 'Ne', 'elementor-forms-ecomail-action' ),
				'return_value' => 'yes',
			]
		);

		
		
		$widget->end_controls_section();

	}

	/**
	 * Run action.
	 *
	 * Runs the Ecomail action after form submission.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param \ElementorPro\Modules\Forms\Classes\Form_Record  $record
	 * @param \ElementorPro\Modules\Forms\Classes\Ajax_Handler $ajax_handler
	 */
	public function run( $record, $ajax_handler ) {

		$settings = $record->get( 'form_settings' );

		// Make sure that there is an Ecomail API key.
		if ( empty( $settings['ecomail_api_key'] ) ) {
			return;
		}

		// Make sure that there is an Ecomail list ID.
		if ( empty( $settings['ecomail_list_id'] ) ) {
			return;
		}

		// Make sure that there is an Ecomail email field ID (required by Ecomail to subscribe users).
		if ( empty( $settings['ecomail_email_field'] ) ) {
			return;
		}

		// Get submitted form data.
		$raw_fields = $record->get( 'fields' );

		// Normalize form data.
		$fields = [];
		foreach ( $raw_fields as $id => $field ) {
			$fields[ $id ] = $field['value'];
		}

		// Make sure the user entered an email (required by Ecomail to subscribe users).
		if ( empty( $fields[ $settings['ecomail_email_field'] ] ) ) {
			return;
		}
		
		// Tags
		// Tags
		$tagsString = $settings['ecomail_tags_field'] ?? '';
		$tags = explode(",", $tagsString);
		$tags = array_map('trim', $tags);
		$tags = array_filter($tags, 'strlen');  // Odstraní prázdné hodnoty


		// Request data for Ecomail API.
		$ecomail_data = [
			'subscriber_data' => [
				'email' => $fields[ $settings['ecomail_email_field'] ],
			],
			'trigger_autoresponders' => true,
			'update_existing' => $settings['ecomail_update_existing'] === 'yes' ? true : false,
			'resubscribe' => $settings['ecomail_resubscribe'] === 'yes' ? true : false,
			'skip_confirmation' => $settings['ecomail_skip_confirmation'] === 'yes' ? false : true,


		];
		
		// Check if the name field setting is available and not empty.
		if ( isset( $settings['ecomail_name_field'] ) && ! empty( $fields[ $settings['ecomail_name_field'] ] ) ) {
			$ecomail_data['subscriber_data']['name'] = $fields[ $settings['ecomail_name_field'] ];
		}

		// Check if the surname field setting is available and not empty.
		if ( isset( $settings['ecomail_surname_field'] ) && ! empty( $fields[ $settings['ecomail_surname_field'] ] ) ) {
			$ecomail_data['subscriber_data']['surname'] = $fields[ $settings['ecomail_surname_field'] ];
		}

		// Check if the phone field setting is available and not empty.
		if ( isset( $settings['ecomail_phone_field'] ) && ! empty( $fields[ $settings['ecomail_phone_field'] ] ) ) {
			$ecomail_data['subscriber_data']['phone'] = $fields[ $settings['ecomail_phone_field'] ];
		}

		// Add tags to subscriber data if filled
		if (! empty( $tags )) {
			$ecomail_data['subscriber_data']['tags'] = $tags;
		}

		// Send the request.
		$response = wp_remote_post(
			'https://api2.ecomailapp.cz/lists/' . $settings['ecomail_list_id'] . '/subscribe',
			[
				'headers' => [
					'key' => $settings['ecomail_api_key'],
					'Content-Type' => 'application/json',
				],
				'body' => json_encode( $ecomail_data ),
			]
		);

		if ( is_wp_error( $response ) ) {
			$ajax_handler->add_error_message( esc_html__( 'Chyba při odesílání dat do Ecomailu.', 'elementor-forms-ecomail-action' ) );
		}
	}

	/**
	 * On export.
	 *
	 * Clears Ecomail form settings/fields when exporting.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param array $element
	 */
		public function on_export( $element ) {

		unset(
			$element['ecomail_api_key'],
			$element['ecomail_list_id'],
			$element['ecomail_email_field'],
			$element['ecomail_name_field'],
			$element['ecomail_surname_field'],
			$element['ecomail_phone_field'],
			$element['ecomail_tags_field'],
			$element['ecomail_update_existing'],
			$element['ecomail_resubscribe']
		);

		return $element;
	}
}

// Register the new action with Elementor Forms.
add_action( 'elementor_pro/init', function () {
	\ElementorPro\Modules\Forms\Module::instance()->add_form_action( 'ecomail', new Ecomail_Action() );
} );