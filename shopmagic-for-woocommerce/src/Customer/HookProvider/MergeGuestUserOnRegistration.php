<?php

declare(strict_types=1);

namespace WPDesk\ShopMagic\Customer\HookProvider;

use ShopMagicVendor\Psr\Log\LoggerInterface;
use WPDesk\ShopMagic\Components\Database\Abstraction\EntityNotFound;
use WPDesk\ShopMagic\Components\HookProvider\HookProvider;
use WPDesk\ShopMagic\Customer\Guest\GuestManager;
use WPDesk\ShopMagic\Customer\Guest\Guest;

final class MergeGuestUserOnRegistration implements HookProvider {

	/** @var GuestManager */
	private $manager;

	/** @var LoggerInterface */
	private $logger;

	public function __construct(
		GuestManager $manager,
		LoggerInterface $logger
	) {
		$this->manager = $manager;
		$this->logger  = $logger;
	}

	public function hooks(): void {
		add_action( 'user_register', $this );
	}

	/** @param int $user_id */
	public function __invoke( $user_id ): void {
		$user  = new \WP_User( $user_id );
		$email = $user->user_email;

		$this->logger->debug( 'Trying to merge previous guest customer with new registered user...', [ 'user_id' => $user_id ] );

		try {
			/** @var Guest */
			$guest = $this->manager
				->get_repository()
				->find_one_by( [ 'email' => $email ] );
		} catch ( EntityNotFound $e ) {
			$this->logger->debug( 'Newly registered user "{id}" was not identified as guest before.', [ 'id' => $user_id ] );
			return;
		}

		add_user_meta(
			$user_id,
			'_shopmagic_converted_from_guest',
			$guest->get_raw_id(),
			true
		);

		/**
		 * User, which previously was identified as Guest on the website, was merged with newly registered user.
		 *
		 * @param \WP_User $user
		 * @param Guest    $guest
		 */
		do_action( 'shopmagic/core/customer/merge_guest', $user, $guest );

		$this->manager->delete( $guest );

		$this->logger->debug(
			'Guest "{guest_id}" was merged with user "{id}". Guest entity deleted.',
			[
				'id'       => $user_id,
				'guest_id' => $guest->get_raw_id(),
			]
		);
	}
}
