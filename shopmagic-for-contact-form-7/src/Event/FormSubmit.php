<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicCF7\Event;

use WPDesk\ShopMagic\Customer\Customer;
use WPDesk\ShopMagic\Integration\ContactForms\FormCommonEvent;
use WPDesk\ShopMagic\Integration\ContactForms\FormEntry;
use WPDesk\ShopMagicCF7\Entry\ContactForm7Entry;

/**
 * Event fires on every Contact Form 7 form submission
 */
final class FormSubmit extends FormCommonEvent {
	public function get_id(): string {
		return 'cf7_form_submit';
	}

	public function get_name(): string {
		return __( 'Contact Form 7 Submission', 'shopmagic-for-contact-form-7' );
	}

	public function get_description(): string {
		return __( 'Run automation when a customer successfully submits selected contact form.',
			'shopmagic-for-contact-form-7' );
	}

	public function initialize(): void {
		add_action( 'wpcf7_before_send_mail', [ $this, 'store_data' ], 10, 3 );
		add_action( 'wpcf7_mail_sent', [ $this, 'process_form' ] );
	}

	public function store_data( \WPCF7_ContactForm $cf7, bool $abort, \WPCF7_Submission $submission ): void {
		$form_entry = new ContactForm7Entry( $submission->get_posted_data(), $cf7->id() );
		$this->resources->set( FormEntry::class, $form_entry );

		try {
			$this->resources->set(
				Customer::class,
				$this->customer_repository->find_one_by( [ 'email' => $form_entry->get_email() ] )
			);
		} catch ( \Exception $e ) {
			$this->logger->warning( \esc_html__( 'Failed to set valid customer in Contact Form 7 event.' ) );
		}
	}

	public function process_form( \WPCF7_ContactForm $cf7 ): void {
		if ( $cf7->id() === $this->fields_data->getInt( self::FIELD_ID_FORM ) ) {
			$this->trigger_automation();
		}
	}

	/**
	 * @param array{form_data: numeric-string[], customer_id?: string} $serialized_json
	 */
	public function set_from_json( array $serialized_json ): void {
		[ $entry_data, $form_id ] = array_values( $serialized_json['form_data'] );
		$this->resources->set( FormEntry::class, new ContactForm7Entry( $entry_data, $form_id ) );
		parent::set_from_json( $serialized_json );
	}

	/** @return string[] */
	protected function get_forms_as_options(): array {
		$forms   = \WPCF7_ContactForm::find();
		$options = [];
		/** @var \WPCF7_ContactForm $form */
		foreach ( $forms as $form ) {
			$options[ $form->id() ] = $form->title();
		}

		return $options;
	}
}
