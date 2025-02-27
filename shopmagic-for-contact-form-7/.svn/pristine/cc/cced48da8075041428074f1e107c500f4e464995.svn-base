<?php
declare(strict_types=1);

namespace WPDesk\ShopMagicCF7\Placeholder;

use WPDesk\ShopMagic\Exception\FieldNotFound;
use WPDesk\ShopMagicCF7\FormBasedPlaceholder;

final class EntryEmail extends FormBasedPlaceholder {
	public function get_slug(): string {
		return 'entry_email';
	}

	public function get_description(): string {
		return __( 'Displays email submitted by user. If your contact form doesn\'t contain email field, placeholder will not be shown.', 'shopmagic-for-contact-form-7' );
	}

	/** @param string[] $parameters */
	public function value( array $parameters ): string {
		if ( $this->is_form_provided() ) {
			try {
				$form_entry = $this->get_form();
				return $form_entry->get_email();
			} catch ( FieldNotFound $e ) {
				return '';
			}
		}

		return '';
	}
}
