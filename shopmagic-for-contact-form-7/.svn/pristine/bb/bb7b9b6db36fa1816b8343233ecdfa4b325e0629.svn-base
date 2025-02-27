<?php
declare(strict_types=1);

namespace WPDesk\ShopMagicCF7\Placeholder;

use WPDesk\ShopMagicCF7\FormBasedPlaceholder;

final class FormId extends FormBasedPlaceholder {

	public function get_slug(): string {
		return 'form_id';
	}

	public function get_description(): string {
		return __( 'Displays ID of the submitted contact form.', 'shopmagic-for-contact-form-7' );
	}

	/** @param string[] $parameters */
	public function value( array $parameters ): string {
		if ( $this->is_form_provided() ) {
			return (string) $this->get_form()->get_id();
		}
		return '';
	}
}
