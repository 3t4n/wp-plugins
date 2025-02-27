<?php

namespace TopDeliverability\Settings\Widget;

use TopDeliverability\Account\State\EmailNotRegistered;
use TopDeliverability\Account\State\EmailNotVerified;
use TopDeliverability\Account\State\EmailVerificationState;
use TopDeliverability\Account\State\EmailVerified;
use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\ApiClientError;
use TopDeliverability\Api\Auth\Auth0Authenticator;
use TopDeliverability\Dashboard\DashboardMenuEntry;
use TopDeliverability\DkimDnsRecord;
use TopDeliverability\DomainProvider;
use TopDeliverability\Feature\Features;
use TopDeliverability\Settings\Widget\Signup\Auth0SignupFormHandler;
use TopDeliverability\Settings\Widget\Signup\EmbeddedSignupFormHandler;
use TopDeliverability\Template;
use TopDeliverability\Template\Renderer;

class ConfigurationWidget {

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @var Auth0Authenticator
	 */
	private $auth0Authenticator;

	/**
	 * @var Auth0SignupFormHandler
	 */
	private $auth0SignupFormHandler;

	/**
	 * @var DashboardMenuEntry
	 */
	private $dashboardMenuEntry;

	/**
	 * @var DomainProvider
	 */
	private $domainProvider;

	/**
	 * @var EmbeddedSignupFormHandler
	 */
	private $embeddedSignupFormHandler;

	/**
	 * @var Features
	 */
	private $features;

	/**
	 * @var PasswordResetFormHandler
	 */
	private $resetPasswordFormHandler;

	/**
	 * @var Renderer
	 */
	private $templateRenderer;

	/**
	 * @var VerificationEmailSendingFormHandler
	 */
	private $verificationEmailSendingFormHandler;

	/**
	 * @param ApiClient                           $apiClient
	 * @param Auth0Authenticator                  $auth0Authenticator
	 * @param Auth0SignupFormHandler              $auth0SignupFormHandler
	 * @param DashboardMenuEntry                  $dashboardMenuEntry,
	 * @param DomainProvider                      $domainProvider
	 * @param EmbeddedSignupFormHandler           $signupFormHandler
	 * @param Features                            $features
	 * @param PasswordResetFormHandler            $resetPasswordFormHandler
	 * @param Renderer                            $templateRenderer
	 * @param VerificationEmailSendingFormHandler $verificationEmailSendingFormHandler
	 */
	public function __construct(
		ApiClient $apiClient,
		Auth0Authenticator $auth0Authenticator,
		Auth0SignupFormHandler $auth0SignupFormHandler,
		DashboardMenuEntry $dashboardMenuEntry,
		DomainProvider $domainProvider,
		EmbeddedSignupFormHandler $signupFormHandler,
		Features $features,
		PasswordResetFormHandler $resetPasswordFormHandler,
		Renderer $templateRenderer,
		VerificationEmailSendingFormHandler $verificationEmailSendingFormHandler
	) {
		$this->apiClient                           = $apiClient;
		$this->auth0Authenticator                  = $auth0Authenticator;
		$this->auth0SignupFormHandler              = $auth0SignupFormHandler;
		$this->dashboardMenuEntry                  = $dashboardMenuEntry;
		$this->domainProvider                      = $domainProvider;
		$this->embeddedSignupFormHandler           = $signupFormHandler;
		$this->features                            = $features;
		$this->resetPasswordFormHandler            = $resetPasswordFormHandler;
		$this->templateRenderer                    = $templateRenderer;
		$this->verificationEmailSendingFormHandler = $verificationEmailSendingFormHandler;
	}

	/**
	 * @param EmailVerificationState $emailVerificationState
	 * @return string
	 */
	public function render( $emailVerificationState ) {
		$context = new Template\Context(
			array(
				'title'                          => __( 'To properly configure DKIM and get the most out of our Deliverability plugin, follow these steps:', 'deliverability' ),
				'subtitle_part_1'                => __( 'DKIM', 'deliverability' ),
				'subtitle_part_2'                => __( '(Domain Keys Identified Mail)', 'deliverability' ),
				'subtitle_part_3'                => __( 'authentication', 'deliverability' ),
				'subtitle_part_4'                => __( 'technique that allows the', 'deliverability' ),
				'subtitle_part_5'                => __( 'receiver', 'deliverability' ),
				'subtitle_part_6'                => __( 'to check that an email was indeed sent and authorized by the owner of that domain', 'deliverability' ),

				'registration_title'             => __( 'Registration', 'deliverability' ),
				'email_verification_title'       => __( 'Email verification', 'deliverability' ),
				'dkim_records_publication_title' => __( 'DKIM record publication', 'deliverability' ),
			)
		);

		if ( $emailVerificationState instanceof EmailNotRegistered ) {
			$this->userCreationResult( $context );
			$this->userLoginResult( $context );
			$this->passwordResetResult( $context );
			$context->withPrefix( 'registration', $this->registrationContext() );

		} elseif ( $emailVerificationState instanceof EmailNotVerified ) {
			$context->withPrefix( 'email_verification', $this->emailVerificationContext() );

		} elseif ( $emailVerificationState instanceof EmailVerified && ! $this->isDnsConfigured() ) {
			$dkimDnsRecords = $emailVerificationState->getDkimRecords();
			$context->withPrefix( 'dkim_records_publication', $this->dkimRecordsPublicationContext( $dkimDnsRecords ) );

		} elseif ( $emailVerificationState instanceof EmailVerified && $this->isDnsConfigured() ) {
			$dkimDnsRecords = $emailVerificationState->getDkimRecords();
			$context->withPrefix( 'compliments', $this->complimentsContext($dkimDnsRecords ) );
		}

		return $this->templateRenderer->render( 'settings/configuration/main.twig', $context );
	}

	/**
	 * @return Template\Context
	 */
	private function registrationContext() {
		return new Template\Context(
			array(
				'description'                => __( 'Complete the registration to continue', 'deliverability' ),
				'continue_with_google'       => __( 'Continue with Google' ),
				'continue_with_google_link'  => $this->auth0Authenticator->getLoginLink( 'google-oauth2' ),
				'or'                         => __( 'or', 'deliverability' ),
				'email'                      => __( 'Email', 'deliverability' ),
				'email_placeholder'          => __( 'Insert your email', 'deliverability' ),
				'password'                   => __( 'Password', 'deliverability' ),
				'password_placeholder'       => __( 'Insert your password', 'deliverability' ),
				'action'                     => $this->features->showEmbeddedAuthenticationForm() ? $this->embeddedSignupFormHandler->action() : $this->auth0SignupFormHandler->action(),
				'action_description'         => __( 'By clicking \'continue,\' you will receive a verification email in the email box above. Click on the link within the email to activate your account.', 'deliverability' ),
				'forgot_password'            => __( 'Forgot password?', 'deliverability' ),
				'action_label'               => __( 'Continue', 'deliverability' ),

				'reset_password_description' => __( 'Enter your email address and we will send you instructions to reset your password', 'deliverability' ),
				'reset_password_action'      => $this->resetPasswordFormHandler->action(),
				'reset_password_back'        => __( 'Back', 'deliverability' ),

				'embedded'                   => $this->features->showEmbeddedAuthenticationForm(),

				'password_requirements'      => array(
					'description'  => __( 'Your password must contain', 'deliverability' ),
					'requirements' => array(
						array(
							'description' => __( 'At least 8 characters', 'deliverability' ),
							'details'     => array(),
						),
						array(
							'description' => __( 'At least 3 of the following', 'deliverability' ),
							'details'     => array(
								__( 'Upper case letters (A-Z)', 'deliverability' ),
								__( 'Numbers (0-9)', 'deliverability' ),
								__( 'Special characters (e.g. !@#$%^&*)', 'deliverability' ),

							),
						),
					),
				),
			),
		);
	}

	/**
	 * @return Template\Context
	 */
	private function emailVerificationContext() {
		$context = new Template\Context(
			array(
				'action'             => $this->verificationEmailSendingFormHandler->action(),
				'action_description' => __( 'If you don\'t receive an email within the next 30 minutes, please press the button below.', 'deliverability' ),
				'action_label'       => __( 'Resend verification email', 'deliverability' ),
				'description'        => __( 'To activate the plugin, we need to verify your email. Please open your mailbox and confirm it.', 'deliverability' ),
			)
		);

		if ( isset( $_GET['verification_email_sending'] ) ) {
			switch ( $_GET['verification_email_sending'] ) {
				case VerificationEmailSendingFormHandler::ERROR:
					$context->withPrefix(
						'notice',
						array(
							'message' => __( 'Error sending the verification email. Please retry later.', 'deliverability' ),
							'level'   => 'error',
							'testid'  => 'verification_email_sending_error',
						)
					);
					break;
				case VerificationEmailSendingFormHandler::SENT:
					$context->withPrefix(
						'notice',
						array(
							'message' => __( 'Verification email sent', 'deliverability' ),
							'level'   => 'success',
							'testid'  => 'verification_email_sent',
						)
					);
					break;
			}
		}

		return $context;
	}

	/**
	 * @param DkimDnsRecord[]|null $dkimDnsRecords
	 * @return Template\Context
	 */
	private function dkimRecordsPublicationContext( $dkimDnsRecords ) {
		return new Template\Context(
			array(
				'name_title'         => __( 'Name', 'deliverability' ),
				'content_title'      => __( 'Content', 'deliverability' ),
				'dkim_records'       => array_map(
					function ( $dkimDnsRecord ) {
						return array(
							'name'    => $dkimDnsRecord->getName(),
							'content' => $dkimDnsRecord->getContent(),
						);
					},
					$dkimDnsRecords
				),
				'description_part_1' => __( 'To allow email service providers to verify your emails, set up the following TXT record on your DNS.', 'deliverability' ),
				'description_part_2' => __( 'Where do I find the DNS?', 'deliverability' ),
				'no_dkim_records'    => __( 'No DKIM record found (yet?).', 'deliverability' ),
			)
		);
	}
	/**
	 * @param  Template\Context $context
	 */
	private function userCreationResult( $context ) {
		if ( ! isset( $_GET['user_creation_result'] ) ) {
			return;
		}

		switch ( $_GET['user_creation_result'] ) {
			case EmbeddedSignupFormHandler::ERROR:
				$result = array(
					'message' => __( 'Error creating user', 'deliverability' ),
					'level'   => 'error',
					'testid'  => 'user_creation_error',
					'title'   => __( 'Registration', 'deliverability' ),
				);
				break;

			case EmbeddedSignupFormHandler::USER_NOT_CREATED:
				$result = array(
					'message' => __( 'Email or password not valid', 'deliverability' ),
					'level'   => 'error',
					'testid'  => 'user_creation_not_created',
					'title'   => __( 'Registration', 'deliverability' ),
				);
				break;
		}

		if ( isset( $result ) ) {
			$context->withPrefix( 'notice', $result );
		}
	}

	/**
	 * @param  Template\Context $context
	 */
	private function userLoginResult( $context ) {
		if ( ! isset( $_GET['user_login_result'] ) ) {
			return;
		}

		switch ( $_GET['user_login_result'] ) {
			case EmbeddedSignupFormHandler::ERROR:
				$result = array(
					'message' => __( 'Error logging in', 'deliverability' ),
					'level'   => 'error',
					'testid'  => 'user_login_error',
					'title'   => __( 'Registration', 'deliverability' ),
				);
				break;

			case EmbeddedSignupFormHandler::INVALID_CREDENTIALS:
				$result = array(
					'message' => __( 'Password not valid', 'deliverability' ),
					'level'   => 'error',
					'testid'  => 'user_login_invalid_credentials',
					'title'   => __( 'Registration', 'deliverability' ),
				);
				break;
		}

		if ( isset( $result ) ) {
			$context->withPrefix( 'notice', $result );
		}
	}

	/**
	 * @param Template\Context $context
	 */
	private function passwordResetResult( $context ) {
		if ( ! isset( $_GET['password_reset_result'] ) ) {
			return;
		}

		switch ( $_GET['password_reset_result'] ) {
			case PasswordResetFormHandler::SUCCESS:
				$result = array(
					'message' => __( 'Password reset email sent', 'deliverability' ),
					'level'   => 'success',
					'testid'  => 'password_reset_success',
					'title'   => __( 'Registration', 'deliverability' ),
				);
				break;
			case PasswordResetFormHandler::ERROR:
				$result = array(
					'message' => __( 'Error resetting the password', 'deliverability' ),
					'level'   => 'error',
					'testid'  => 'password_reset_error',
					'title'   => __( 'Registration', 'deliverability' ),
				);
				break;
			case PasswordResetFormHandler::INVALID_EMAIL:
				$result = array(
					'message' => __( 'Email address not valid', 'deliverability' ),
					'level'   => 'error',
					'testid'  => 'password_reset_invalid_email',
					'title'   => __( 'Registration', 'deliverability' ),
				);
				break;
		}

		if ( isset( $result ) ) {
			$context->withPrefix( 'notice', $result );
		}
	}

	/**
	 * @param DkimDnsRecord[]|null $dkimDnsRecords
	 * @return Template\Context
	 */
	private function complimentsContext($dkimDnsRecords) {
		return new Template\Context(
			array(
				'title_part_1' => __( 'Congratulations!', 'deliverability' ),
				'title_part_2' => __( 'Your DKIM is properly configured.', 'deliverability' ),
				'title_part_3' => __( 'DKIM record', 'deliverability' ),
				'description'  => __( 'From now on, all your WordPress emails will have an extra layer of security because we\'ll be DKIM-signing them for you!', 'deliverability' ),
				'action_label' => __( 'Go to the dashboard', 'deliverability' ),
				'name_title'         => __( 'Name', 'deliverability' ),
				'content_title'      => __( 'Content', 'deliverability' ),

				'dkim_records'       => array_map(
					function ( $dkimDnsRecord ) {
						return array(
							'name'    => $dkimDnsRecord->getName(),
							'content' => $dkimDnsRecord->getContent(),
						);
					},
					$dkimDnsRecords
				),
				'no_dkim_records'    => __( 'No DKIM record found (yet?).', 'deliverability' ),
				'action'       => menu_page_url( $this->dashboardMenuEntry->getSlug(), false ),
			)
		);
	}

	/**
	 * @return bool
	 */
	public function isDnsConfigured() {
		$deliverabilityScore = $this->apiClient->getDeliverabilityScore( $this->domainProvider->getDomain() );

		if ( $deliverabilityScore instanceof ApiClientError ) {
			return false;
		}

		$dkimScore     = $deliverabilityScore->getDkimScore();
		$notConfigured = in_array( 'NOT_CONFIGURED', $dkimScore->getDetails() );
		$notFound      = in_array( 'NOT_FOUND', $dkimScore->getDetails() );

		return ! $notConfigured && ! $notFound;
	}
}
