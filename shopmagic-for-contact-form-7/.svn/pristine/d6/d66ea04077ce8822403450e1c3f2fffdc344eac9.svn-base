<?php
declare(strict_types=1);

namespace WPDesk\ShopMagicCF7\Entry;

use WPDesk\ShopMagic\Exception\FieldNotFound;
use WPDesk\ShopMagic\Integration\ContactForms\FormEntry;

/**
 * Get basic data from submitted contact form.
 *
 * @package WPDesk\ShopMagicCF7\Data
 */
final class ContactForm7Entry implements FormEntry {

	/** @var string[] */
	private $entry_data;

	/** @var int */
	private $form_id;

	/**
	 * @param string[] $entry_data
	 * @param int   $form_id
	 */
	public function __construct( array $entry_data, int $form_id ) {
		$this->entry_data = $entry_data;
		$this->form_id    = $form_id;
	}

	/**
	 * @return array{'entry_data': string[], 'form_id': int}
	 */
	public function jsonSerialize(): array {
		return [
			'entry_data' => $this->entry_data,
			'form_id'    => $this->form_id,
		];
	}

	public function get_email(): string {
		$form        = \WPCF7_ContactForm::get_instance( $this->form_id );
		$form_fields = $form->scan_form_tags();
		/** @var \WPCF7_FormTag $field */
		foreach ( $form_fields as $field ) {
			if ( $field->basetype === 'email' ) {
				return $this->get_field( $field->name );
			}
		}

		throw new FieldNotFound( __( 'No email field was found in processed contact form.', 'shopmagic-for-contact-form-7' ) );
	}

	public function get_field( string $field_to_get ): string {
		if ( isset( $this->entry_data[ $field_to_get ] ) ) {
			return $this->entry_data[ $field_to_get ];
		}
		throw new FieldNotFound(
			sprintf(
				// translators: %s Name of requested field.
				__( 'Field %s does not exists', 'shopmagic-for-contact-form-7' ),
				$field_to_get
			)
		);
	}

	public function get_id(): int {
		return $this->form_id;
	}
}
