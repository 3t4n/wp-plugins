<?php
declare(strict_types=1);

namespace WPDesk\ShopMagic\Customer\Guest\Interceptor;

use WPDesk\ShopMagic\Components\HookProvider\HookProvider;
use WPDesk\ShopMagic\Customer\CustomerRepository;
use WPDesk\ShopMagic\Customer\Guest\Guest;
use WPDesk\ShopMagic\Customer\Guest\GuestFactory;
use WPDesk\ShopMagic\Customer\Guest\GuestManager;

/**
 * When customer (registered or not) changes the email, we update the entity accordingly:
 * - for Guest customers, we just update email field
 * - for User customers, we create a new Guest entity
 */
final class OnCustomerEmailChange implements HookProvider {

	private GuestManager $manager;

	private CustomerRepository $repository;

	private GuestFactory $factory;


	public function __construct(
		CustomerRepository $repository,
		GuestManager $manager,
		GuestFactory $factory
	) {
		$this->repository = $repository;
		$this->manager    = $manager;
		$this->factory    = $factory;
	}

	public function hooks(): void {
		add_action( 'woocommerce_before_order_object_save', $this );
	}

	/**
	 * @param \WC_Order $order
	 */
	public function __invoke( $order ): void {
		if ( ! $order instanceof \WC_Order ) {
			return;
		}

		if ( ! isset( $order->get_changes()['billing']['email'] ) ) {
			return;
		}

		$old_data  = $order->get_data();
		$old_email = $old_data['billing']['email'];
		try {
			$customer = $this->repository->find_by_email( $old_email );

			if ( $customer->is_guest() ) {
				/** @var Guest */
				$customer->set_email( $order->get_billing_email() );
				$this->manager->save( $customer );
			} else {
				$guest = $this->factory->from_customer( $customer );
				$this->manager->save( $guest );
			}
		} catch ( \Exception $e ) {
			// In case there was no customer, we create a new one. Should rarely happen.
			$guest = $this->factory->from_order( $order );
			$this->manager->save( $guest );
		}
	}
}
