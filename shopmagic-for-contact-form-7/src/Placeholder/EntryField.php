<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicCF7\Placeholder;

use WPDesk\ShopMagic\Exception\FieldNotFound;
use WPDesk\ShopMagic\FormField\Field\InputTextField;
use WPDesk\ShopMagicCF7\FormBasedPlaceholder;

final class EntryField extends FormBasedPlaceholder {

	const ENTRY_FIELD = 'entry_field';

	public function get_slug(): string {
		return 'entry_field';
	}

	public function get_description(): string {
		return __(
			'Display value from form field defined in placeholder parameter.
			The placeholder uses form field name i.e. your-email in default Contact Form 7 form.
			If no field is found, placeholder will not be shown.',
			'shopmagic-for-contact-form-7'
		);
	}

	/** @return \ShopMagicVendor\WPDesk\Forms\Field[] */
	public function get_supported_parameters( $values = null ): array {
		return [
			( new InputTextField() )
				->set_name( self::ENTRY_FIELD )
				->set_label( __( 'Entry field', 'shopmagic-for-contact-form-7' ) )
				->set_required(),
		];
	}

	/** @param string[] $parameters */
	public function value( array $parameters ): string {
		if ( $this->is_form_provided() ) {
			try {
				$field_name = $parameters[ self::ENTRY_FIELD ] ?? '';

				return $this->get_form()->get_field( $field_name );
			} catch ( FieldNotFound $e ) {
				return '';
			}
		}

		return '';
	}
}
