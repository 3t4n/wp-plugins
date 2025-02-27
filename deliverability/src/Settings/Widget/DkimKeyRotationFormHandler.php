<?php

namespace TopDeliverability\Settings\Widget;

use DateTime;
use TopDeliverability\AccountIdOption;
use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\ApiClientUnexpectedStatusError;
use TopDeliverability\Api\PaymentRequired;
use TopDeliverability\Api\TooManyRequests;
use TopDeliverability\FormHandler;
use TopDeliverability\NonceValidator;
use TopDeliverability\Option\ConfiguredDomainsOption;
use TopDeliverability\PageRedirector;
use TopDeliverabilityVendor\League\Uri\Uri;
use TopDeliverabilityVendor\League\Uri\UriModifier;
use TopDeliverabilityVendor\Psr\Log\LoggerInterface;
use const TopDeliverability\DEFAULT_DKIM_KEY_SIZE;
use const TopDeliverability\TOP_DELIVERABILITY_CAPABILITY;

class DkimKeyRotationFormHandler implements FormHandler {

	const QUERY_PARAM_RESULT = 'dkim_key_rotation';

	const RESULT_SUCCESS = 'success';

	const RESULT_PAYMENT_REQUIRED = 'payment_required';

	const RESULT_TOO_MANY_REQUESTS = 'too_many_requests';

	const RESULT_ERROR = 'error';

	const QUERY_PARAM_RETRY_AFTER = 'retry_after';

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @var NonceValidator
	 */
	private $nonceValidator;

	/**
	 * @var PageRedirector
	 */
	private $pageRedirector;

	/**
	 * @var string
	 */
	private $settingsPageSlug;

	/**
	 * @var AccountIdOption
	 */
	private $accountIdOption;

	/**
	 * @var ConfiguredDomainsOption
	 */
	private $configuredDomainOption;

	/**
	 * @var LoggerInterface
	 */
	private $logger;

	/**
	 * @param ApiClient               $apiClient
	 * @param NonceValidator          $nonceValidator
	 * @param PageRedirector          $pageRedirector
	 * @param string                  $settingsPageSlug
	 * @param AccountIdOption         $accountIdOption
	 * @param ConfiguredDomainsOption $configuredDomainOption
	 * @param LoggerInterface         $logger
	 */
	public function __construct(
		ApiClient $apiClient,
		NonceValidator $nonceValidator,
		PageRedirector $pageRedirector,
		$settingsPageSlug,
		AccountIdOption $accountIdOption,
		ConfiguredDomainsOption $configuredDomainOption,
		LoggerInterface $logger
	) {
		$this->apiClient              = $apiClient;
		$this->nonceValidator         = $nonceValidator;
		$this->pageRedirector         = $pageRedirector;
		$this->settingsPageSlug       = $settingsPageSlug;
		$this->accountIdOption        = $accountIdOption;
		$this->configuredDomainOption = $configuredDomainOption;
		$this->logger                 = $logger;
	}

	/**
	 * @return string
	 */
	public function action() {
		return 'dkim_key_rotation';
	}

	public function handle() {
		$url = Uri::createFromString( admin_url( "admin.php?page=$this->settingsPageSlug" ) );

		if ( current_user_can( TOP_DELIVERABILITY_CAPABILITY ) && $this->nonceValidator->validate( $this->action() ) ) {
			$record = $this->configuredDomainOption->get()->getRecords()[0];

			$result = $this->apiClient->rotateKey(
				$this->accountIdOption->get(),
				$record->getDomain(),
				$record->getKeySelector(),
				$this->getDkimKeySize()
			);

			if ( $result instanceof ApiClientUnexpectedStatusError ) {
				$queryParam = self::RESULT_ERROR;
				$statusCode = $result->getStatusCode();
				$this->logger->error( "cannot rotate DKIM key: unexpected status code $statusCode" );

			} elseif ( $result instanceof TooManyRequests ) {
				$queryParam = self::RESULT_TOO_MANY_REQUESTS;
				$retryAfter = $result->get_retry_after()->format( DateTime::ISO8601 );
				$url        = UriModifier::appendQuery( $url, self::QUERY_PARAM_RETRY_AFTER . "=$retryAfter" );
				$this->logger->error( "cannot rotate DKIM key: too many requests, retry after $retryAfter" );

			} elseif ( $result instanceof PaymentRequired ) {
				$queryParam = self::RESULT_PAYMENT_REQUIRED;
				$this->logger->error( 'cannot rotate DKIM key: premium plan required' );

			} else {
				$queryParam = self::RESULT_SUCCESS;
				$this->logger->info( 'DKIM key rotated' );
			}

			$url = UriModifier::appendQuery( $url, self::QUERY_PARAM_RESULT . "=$queryParam" );
		}

		$this->pageRedirector->redirectTo( (string) $url );
	}

	/**
	 * @return int
	 */
	private function getDkimKeySize() {
		if ( array_key_exists( 'dkim_key_size', $_POST ) ) {
			return intval( $_POST['dkim_key_size'] );
		} else {
			return DEFAULT_DKIM_KEY_SIZE;
		}
	}
}
