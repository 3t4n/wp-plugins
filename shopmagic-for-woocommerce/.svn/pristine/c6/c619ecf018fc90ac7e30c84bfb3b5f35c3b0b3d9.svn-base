<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagic\Components\Validator;

use WPDesk\ShopMagic\Components\Form\Form;
use WPDesk\ShopMagic\Workflow\Automation\Automation;
use WPDesk\ShopMagic\Workflow\Event\EventsList;
use WPDesk\ShopMagic\Workflow\Extensions\ExtensionsSet;

class AutomationValidator {

	private ExtensionsSet $extensions;

	public function __construct( ExtensionsSet $extensions ) {
		$this->extensions = $extensions;
	}

	public function validate( Automation $automation ): bool {
		$event_slug = $automation->get_event()->get_id();
		$event      = $this->extensions->get_event( $event_slug );
		$form       = new Form( $event->get_fields() );
		$form->set_data( $event->get_parameters() );

		return $form->is_valid();
	}
}
