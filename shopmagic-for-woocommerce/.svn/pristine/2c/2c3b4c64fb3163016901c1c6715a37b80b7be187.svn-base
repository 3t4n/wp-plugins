<?php

declare(strict_types=1);

namespace WPDesk\ShopMagic\Modules\Mulitilingual\Integration\WCML;

use WPDesk\ShopMagic\Components\HookProvider\HookProvider;
use WPDesk\ShopMagic\Workflow\Action\Builtin\SendMail\AbstractSendMailAction;
use WPDesk\ShopMagic\Customer\Customer;

class UpdateEmailLanguage implements HookProvider {

	public function hooks(): void {
		add_action( 'shopmagic/core/action/before_execution', $this, 10, 3 );
	}

	/**
	 * @param Action $action
	 * @param Automation $automation
	 * @param Event $event
	 */
	public function __invoke( $action, $automation, $event ): void {
		if ( ! $action instanceof AbstractSendMailAction ) {
			return;
		}

		if ( ! function_exists( 'WCML\functions\getWooCommerceWpml' ) ) {
			return;
		}

		$data_layer = $event->get_provided_data();

		if ( ! $data_layer->has( Customer::class ) ) {
			return;
		}

		$customer = $data_layer->get( Customer::class );

		\WCML\functions\getWooCommerceWpml()->emails->change_email_language( $customer->get_language() );
	}
}
