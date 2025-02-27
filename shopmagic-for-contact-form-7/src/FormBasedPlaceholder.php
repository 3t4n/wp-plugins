<?php
declare(strict_types=1);

namespace WPDesk\ShopMagicCF7;

use WPDesk\ShopMagic\Integration\ContactForms\FormEntry;
use WPDesk\ShopMagic\Workflow\Placeholder\Placeholder;

/**
 * Common methods for placeholders based on Contact Form 7.
 */
abstract class FormBasedPlaceholder extends Placeholder {

	public function get_group_slug(): string {
		return 'form';
	}

	/** @return string[] */
	final public function get_required_data_domains(): array {
		return [ FormEntry::class ];
	}
}
