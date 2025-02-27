<?php
declare( strict_types=1 );

namespace WPDesk\ShopMagicCF7;

use ShopMagicVendor\Psr\Log\LoggerInterface;
use WPDesk\ShopMagic\Components\HookProvider\HookProvider;
use WPDesk\ShopMagic\Customer\Guest\Interceptor\InterceptionFailure;
use WPDesk\ShopMagic\Integration\ContactForms\FormGuestInterceptor;
use WPDesk\ShopMagicCF7\Entry\ContactForm7Entry;

class CfFormInterceptor implements HookProvider {
	/** @var FormGuestInterceptor */
	private $interceptor;

	/** @var LoggerInterface */
	private $logger;

	public function __construct(
		FormGuestInterceptor $interceptor,
		LoggerInterface $logger
	) {
		$this->interceptor = $interceptor;
		$this->logger      = $logger;
	}

	public function hooks(): void {
		add_action( 'wpcf7_before_send_mail', [ $this, 'capture_from_form' ], 10, 3 );
	}

	public function capture_from_form( \WPCF7_ContactForm $cf7, bool $_, \WPCF7_Submission $submission ): void {
		try {
			$this->interceptor->intercept(
				new ContactForm7Entry( $submission->get_posted_data(), $cf7->id() )
			);
		} catch ( InterceptionFailure|\InvalidArgumentException $e ) {
			$this->logger->error( $e->getMessage() );
		} catch ( \Throwable $e ) {
			$this->logger->critical( $e->getMessage() );
		}
	}

}
