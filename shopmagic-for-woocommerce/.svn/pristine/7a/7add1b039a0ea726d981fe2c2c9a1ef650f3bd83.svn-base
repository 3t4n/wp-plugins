<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagic\Workflow\Extensions;

use ShopMagicVendor\Psr\Container\ContainerInterface;
use ShopMagicVendor\Psr\Log\LoggerInterface;
use WPDesk\ShopMagic\Customer\CustomerRepository;
use WPDesk\ShopMagic\Workflow\Action\Action;
use WPDesk\ShopMagic\Workflow\Action\ActionList;
use WPDesk\ShopMagic\Workflow\Event\CustomerAwareInterface;
use WPDesk\ShopMagic\Workflow\Event\Event;
use WPDesk\ShopMagic\Workflow\Event\EventsList;
use WPDesk\ShopMagic\Workflow\Filter\Filter;
use WPDesk\ShopMagic\Workflow\Filter\FiltersList;
use WPDesk\ShopMagic\Workflow\Placeholder\Placeholder;
use WPDesk\ShopMagic\Workflow\Placeholder\PlaceholdersList;

class ExtensionsSet {

	/** @var array<class-string<Extension>, Extension> */
	private $extensions = [];

	/** @var ActionList */
	private $actions;

	/** @var FiltersList */
	private $filters;

	/** @var PlaceholdersList */
	private $placeholders;

	/** @var EventsList */
	private $events;

	/** @var bool */
	private $initialized = false;

	/** @var ContainerInterface */
	private $container;

	/** @var LoggerInterface */
	private $logger;

	public function __construct(
		ActionList $actions,
		FiltersList $filters,
		EventsList $events,
		PlaceholdersList $placeholders,
		LoggerInterface $logger,
		ContainerInterface $container
	) {
		$this->actions      = $actions;
		$this->filters      = $filters;
		$this->events       = $events;
		$this->placeholders = $placeholders;
		$this->logger       = $logger;
		$this->container    = $container;
	}

	public function add_extension( Extension $extension ): void {
		$class = \get_class( $extension );
		if ( $this->initialized ) {
			throw new \LogicException(
				sprintf(
					'Unable to register extension "%s" as extensions have already been initialized.',
					$class
				)
			);
		}
		$this->extensions[ $class ] = $extension;
	}

	/** @return ActionList<Action> */
	public function get_actions(): ActionList {
		static $initialized = false;

		if ( $initialized ) {
			return $this->actions;
		}

		foreach ( $this->extensions as $extension ) {
			foreach ( $extension->get_actions() as $key => $action ) {
				if ( is_string( $action ) && $this->container->has( $action ) ) {
					$action = $this->container->get( $action );
				}
				$action->setLogger( $this->logger );
				$action->set_id( $key );
				$this->actions[] = $action;
			}
		}

		$initialized = true;

		return $this->actions;
	}

	/**
	 * @deprecated 4.3.1 Extensions shouldn't be initialized all at once.
	 */
	public function init_extensions(): void {
		$this->get_events();
		$this->get_actions();
		$this->get_filters();
		$this->get_placeholders();

		$this->initialized = true;
	}

	public function get_filters(): FiltersList {
		static $initialized = false;

		if ( $initialized ) {
			return $this->filters;
		}

		foreach ( $this->extensions as $extension ) {
			foreach ( $extension->get_filters() as $key => $filter ) {
				if ( is_string( $filter ) && $this->container->has( $filter ) ) {
					$filter = $this->container->get( $filter );
				}
				$filter->setLogger( $this->logger );
				$filter->set_id( $key );
				$this->filters[] = $filter;
			}
		}

		$initialized = true;

		return $this->filters;
	}

	public function get_placeholders(): PlaceholdersList {
		static $initialized = false;

		if ( $initialized ) {
			return $this->placeholders;
		}

		foreach ( $this->extensions as $extension ) {
			foreach ( $extension->get_placeholders() as $key => $placeholder ) {
				if ( is_string( $placeholder ) && $this->container->has( $placeholder ) ) {
					$placeholder = $this->container->get( $placeholder );
				}
				$placeholder->setLogger( $this->logger );
				$this->placeholders[ $placeholder->get_name() ] = $placeholder;
			}
		}

		$initialized = true;

		return $this->placeholders;
	}

	public function get_events(): EventsList {
		static $initialized = false;

		if ( $initialized ) {
			return $this->events;
		}

		$customer_repository = $this->container->get( CustomerRepository::class );
		foreach ( $this->extensions as $extension ) {
			foreach ( $extension->get_events() as $key => $event ) {
				if ( is_string( $event ) && $this->container->has( $event ) ) {
					$event = $this->container->get( $event );
				}
				$event->setLogger( $this->logger );
				$event->set_id( $key );
				if ( $event instanceof CustomerAwareInterface ) {
					$event->set_customer_repository( $customer_repository );
				}
				$this->events[] = $event;
			}
		}

		$initialized = true;

		return $this->events;
	}

	public function get_action( string $slug ): Action {
		return $this->get_actions()[ $slug ];
	}

	public function get_event( string $slug ): Event {
		return $this->get_events()[ $slug ];
	}

	public function get_filter( string $slug ): Filter {
		return $this->get_filters()[ $slug ];
	}

	public function get_placeholder( string $slug ): Placeholder {
		return $this->get_placeholders()[ $slug ];
	}

	public function has_placeholder( string $slug ): bool {
		return isset( $this->get_placeholders()[ $slug ] );
	}
}
