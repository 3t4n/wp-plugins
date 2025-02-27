<?php

namespace TopDeliverability\Email;

use Exception;
use PHPMailer\PHPMailer\PHPMailer as OriginalPHPMailer;
use TopDeliverability\AccountIdOption;
use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\ApiClientUnexpectedStatusError;
use TopDeliverability\Api\DkimRecordNotFound;
use TopDeliverability\Api\DkimRecordNotMatching;
use TopDeliverability\Api\SigningRequest;
use TopDeliverability\Api\ThresholdExceededError;
use TopDeliverability\Option\ConfiguredDomainsOption;
use TopDeliverabilityVendor\Psr\Log\LoggerInterface;

class DkimHeaderAppender {

	/**
	 * @var ApiClient
	 */
	private $apiClient;

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

	public function __construct(
		ApiClient $apiClient,
		AccountIdOption $accountIdOption,
		$configuredDomainOption,
		$logger
	) {
		$this->apiClient              = $apiClient;
		$this->accountIdOption        = $accountIdOption;
		$this->configuredDomainOption = $configuredDomainOption;
		$this->logger                 = $logger;
	}

	/**
	 * @param OriginalPHPMailer & ExtendedPHPMailer $phpmailer
	 * @return void
	 */
	public function appendTo( $phpmailer ) {
		try {
			$configuredDomains = $this->configuredDomainOption->get();
		} catch ( Exception $e ) {
			$errorMessage = $e->getMessage();
			$this->logger->error( "unexpected exception while preparing email body for DKIM signature: $errorMessage" );

			return;
		}

		if ( empty( $configuredDomains->getRecords() ) ) {
			$this->logger->debug( 'no configured domain' );

			return;
		}

		$configuredDomain = $configuredDomains->getRecords()[0];
		$domain           = $configuredDomain->getDomain();
		$keySelector      = $configuredDomain->getKeySelector();

		$signingRequest = new SigningRequest(
			$this->getFromAddress( $phpmailer ),
			$phpmailer->Subject,
			$this->getToAddresses( $phpmailer ),
			$phpmailer->getBody()
		);

		try {
			$result = $this->apiClient->sign(
				$this->accountIdOption->get(),
				$domain,
				$keySelector,
				$signingRequest
			);
		} catch ( Exception $e ) {
			$errorMessage = $e->getMessage();
			$this->logger->error( "unexpected exception while signing email: $errorMessage" );

			return;
		}

		if ( $result instanceof ThresholdExceededError ) {
			$this->logger->warning( 'signing threshold exceeded: email will not be signed' );

			return;
		}

		if ( $result instanceof ApiClientUnexpectedStatusError ) {
			$statusCode = $result->getStatusCode();
			$this->logger->warning( "unexpected status code $statusCode in signing response: email will not be signed" );

			return;
		}

		if ( $result instanceof DkimRecordNotFound ) {
			$this->logger->warning( "DKIM record not found for domain '$domain' and key selector '$keySelector'" );

			return;
		}

		if ( $result instanceof DkimRecordNotMatching ) {
			$this->logger->warning( "DKIM record not matching for domain '$domain' and key selector '$keySelector'" );

			return;
		}

		$phpmailer->appendHeader( $result->getHeaderName(), $result->getHeaderValue() );
		$this->logger->info( 'email signed' );
	}

	/**
	 * @param OriginalPHPMailer & ExtendedPHPMailer  $phpmailer
	 * @return string
	 */
	private function getFromAddress( $phpmailer ) {
		return $phpmailer->addrFormat( array( trim( $phpmailer->From ), $phpmailer->FromName ) );
	}

	/**
	 * @param OriginalPHPMailer & ExtendedPHPMailer $phpmailer
	 * @return string[]
	 */
	private function getToAddresses( $phpmailer ) {
		return array_map(
			array( $phpmailer, 'addrFormat' ),
			$phpmailer->getToAddresses()
		);
	}
}
