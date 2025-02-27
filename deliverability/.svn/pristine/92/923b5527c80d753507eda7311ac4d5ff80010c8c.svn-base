<?php

namespace TopDeliverability\Notice;

use Exception;
use TopDeliverability\Account\State\EmailNotRegistered;
use TopDeliverability\Account\State\EmailNotVerified;
use TopDeliverability\Account\State\EmailVerificationState;
use TopDeliverability\Account\State\EmailVerificationStateProvider;
use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\ApiClientError;
use TopDeliverability\DomainProvider;
use TopDeliverability\Feature\Features;
use TopDeliverability\FormHandler;
use TopDeliverability\Score\AnalysisResult;
use TopDeliverability\Settings\SettingsMenuEntry;
use TopDeliverability\Settings\Widget\Signup\EmbeddedSignupFormHandler;
use TopDeliverability\Template;
use TopDeliverabilityVendor\Psr\Log\LoggerInterface;

class NoticeManager {

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @var DomainProvider
	 */
	private $domainProvider;

	/**
	 * @var EmailVerificationStateProvider
	 */
	private $emailVerificationStateProvider;

	/**
	 * @var LoggerInterface
	 */
	private $logger;

	/**
	 * @var SettingsMenuEntry
	 */
	private $settingsMenuEntry;

	/**
	 * @var Template\Renderer
	 */
	private $templateRenderer;

	/**
	 * @var EmbeddedSignupFormHandler
	 */
	private $embeddedSignupFormHandler;

	/**
	 * @var FormHandler
	 */
	private $verificationEmailSendingFormHandler;

	public function __construct(
		ApiClient $apiClient,
		DomainProvider $domainProvider,
		EmbeddedSignupFormHandler $signupFormHandler,
		FormHandler $verificationEmailSendingFormHandler,
		SettingsMenuEntry $settingsMenuEntry,
		EmailVerificationStateProvider $emailVerificationStateProvider,
		LoggerInterface $logger,
		Template\Renderer $templateRenderer ) {
		$this->apiClient                           = $apiClient;
		$this->domainProvider                      = $domainProvider;
		$this->embeddedSignupFormHandler           = $signupFormHandler;
		$this->verificationEmailSendingFormHandler = $verificationEmailSendingFormHandler;
		$this->settingsMenuEntry                   = $settingsMenuEntry;
		$this->emailVerificationStateProvider      = $emailVerificationStateProvider;
		$this->logger                              = $logger;
		$this->templateRenderer                    = $templateRenderer;
	}

	/**
	 * @return void
	 */
	public function render() {
		$context = new Template\Context();

		try {
			$state    = $this->emailVerificationStateProvider->getState();
			$template = $this->renderStateMessage( $state, $context );
		} catch ( Exception $e ) {
			$template = $this->renderUnexpectedErrorMessage( $context, $e );
		}

		$this->templateRenderer->display( $template, $context );
	}

	/**
	 * @return bool
	 */
	private function isDnsNotConfigured() {
		$deliverabilityScore = $this->apiClient->getDeliverabilityScore( $this->domainProvider->getDomain() );

		if ( $deliverabilityScore instanceof ApiClientError ) {
			$this->logger->error( 'cannot display notice: ' . get_class( $deliverabilityScore ) );
			return false;
		}

		$dkimScore = $deliverabilityScore->getDkimScore();

		if ( $dkimScore instanceof AnalysisResult ) {
			return in_array( 'NOT_CONFIGURED', $dkimScore->getDetails() )
				or in_array( 'NOT_FOUND', $dkimScore->getDetails() );
		} else {
			return false;
		}
	}

	/**
	 * @param EmailVerificationState $state
	 * @param Template\Context       $context
	 * @return string
	 */
	public function renderStateMessage( EmailVerificationState $state, Template\Context $context ) {
		if ( $state instanceof EmailNotRegistered ) {
			$context->with(
				array(
					'level'       => 'error',
					'testid'      => 'account_not_created',
					'title'       => __( 'DKIM signing not enabled until you finish the setup', 'deliverability' ),
					'action'      => $this->embeddedSignupFormHandler->action(),
					'message'     => __( "Don't miss out on the full features of the plugin", 'deliverability' ),
					'linkMessage' => __( 'sign up now', 'deliverability' ),
				)
			);

			$template = 'notice/simple.twig';
		} elseif ( $state instanceof EmailNotVerified ) {
			$context->with(
				array(
					'level'       => 'error',
					'testid'      => 'email_not_verified',
					'title'       => __( 'DKIM signing not enabled until you finish the setup', 'deliverability' ),
					'action'      => $this->verificationEmailSendingFormHandler->action(),
					'message'     => __( 'Please complete the plugin configuration by verifying your email address', 'deliverability' ),
					'linkMessage' => __( 'Resend verification email', 'deliverability' ),
				)
			);
			$template = 'notice/with_action.twig';
		} elseif ( $this->isDnsNotConfigured() ) {
			$context->with(
				array(
					'level'    => 'error',
					'testid'   => 'dns_not_configured',
					'title'    => __( 'DKIM signing not enabled until you finish the setup', 'deliverability' ),
					'message0' => __( 'The plugin will not work properly until you', 'deliverability' ),
					'message1' => __( 'on your DNS.', 'deliverability' ),
					'message2' => __( 'Most DNS updates take effect within an hour, but could take up to 48 hours to update globally.', 'deliverability' ),
					'link'     => array(
						'href' => menu_page_url( $this->settingsMenuEntry->getSlug(), false ),
						'text' => __( 'publish the DKIM key', 'deliverability' ),
					),
				)
			);
			$template = 'notice/dns_not_configured.twig';
		} else {
			$template = 'notice/none.twig';
		}
		return $template;
	}

	/**
	 * @param Template\Context $context
	 * @param Exception        $e
	 * @return string
	 */
	public function renderUnexpectedErrorMessage( Template\Context $context, Exception $e ) {
		$context->with(
			array(
				'level'   => 'error',
				'testid'  => 'unexpected_error',
				'title'   => __( 'Unexpected error in deliverability plugin', 'deliverability' ),
				'message' => sprintf( __( 'Cannot check if user email is verified: %s. Try to purge plugin settings and login again.', 'deliverability' ), $e->getMessage() ),
			)
		);

		return 'notice/simple.twig';
	}
}
