<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicCF7;

use ShopMagicVendor\Psr\Container\ContainerInterface;
use WPDesk\ShopMagic\Workflow\Extensions\AbstractExtension;
use WPDesk\ShopMagicCF7\Event\FormSubmit;
use WPDesk\ShopMagicCF7\Placeholder\EntryEmail;
use WPDesk\ShopMagicCF7\Placeholder\EntryField;
use WPDesk\ShopMagicCF7\Placeholder\FormId;

class ContactForm7Extension extends AbstractExtension {

	/** @var ContainerInterface */
	private $container;

	public function __construct( ContainerInterface $container ) {
		$this->container = $container;
	}

	public function get_events(): array {
		return [
			$this->container->get( FormSubmit::class ),
		];
	}

	public function get_placeholders(): array {
		return [
			new EntryEmail(),
			new EntryField(),
			new FormId(),
		];
	}

}
