<?php

namespace TopDeliverability\Settings\Widget;

use TopDeliverability\Account\State\EmailNotVerified;
use TopDeliverability\Account\State\EmailVerificationState;
use TopDeliverability\Account\State\EmailVerified;
use TopDeliverability\Plugin\UninstallationPurgingOption;
use TopDeliverability\Template;
use TopDeliverability\WordPressDebugProvider;
use const TopDeliverability\DEFAULT_DKIM_KEY_SIZE;

class MaintenanceWidget {

	/**
	 * @var Template\Renderer
	 */
	private $templateRenderer;

	/**
	 * @var UninstallationPurgingFormHandler
	 */
	private $uninstallationPurgingFormHandler;

	/**
	 * @var UninstallationPurgingOption
	 */
	private $uninstallationPurgingOption;

	/**
	 * @var DatabasePurgingFormHandler
	 */
	private $databasePurgingFormHandler;

	/**
	 * @var WordPressDebugProvider
	 */
	private $wordPressDebugProvider;

	/**
	 * @var DkimKeyRotationFormHandler
	 */
	private $dkimKeyRotationFormHandler;

	public function __construct(
		Template\Renderer $templateRenderer,
		UninstallationPurgingOption $uninstallationPurgingOption,
		UninstallationPurgingFormHandler $uninstallationPurgingFormHandler,
		DatabasePurgingFormHandler $databasePurgingFormHandler,
		WordPressDebugProvider $wordPressDebugProvider,
		DkimKeyRotationFormHandler $dkimKeyRotationFormHandler
	) {
		$this->templateRenderer                 = $templateRenderer;
		$this->uninstallationPurgingOption      = $uninstallationPurgingOption;
		$this->uninstallationPurgingFormHandler = $uninstallationPurgingFormHandler;
		$this->databasePurgingFormHandler       = $databasePurgingFormHandler;
		$this->wordPressDebugProvider           = $wordPressDebugProvider;
		$this->dkimKeyRotationFormHandler       = $dkimKeyRotationFormHandler;
	}

	/**
	 * @param EmailVerificationState $emailVerificationState
	 * @return string
	 */
	public function render( EmailVerificationState $emailVerificationState ) {
		$context = new Template\Context(
			array(
				'title'    => __( 'Maintenance', 'deliverability' ),
				'checkbox' => array(
					'label'   => __( 'Purge settings when the plugin is uninstalled' ),
					'enabled' => $this->uninstallationPurgingOption->isEnabled(),
					'value'   => $this->uninstallationPurgingFormHandler->action(),
				),
			)
		);

		if ( array_key_exists( DkimKeyRotationFormHandler::QUERY_PARAM_RESULT, $_GET ) ) {

			switch ( $_GET[ DkimKeyRotationFormHandler::QUERY_PARAM_RESULT ] ) {
				case DkimKeyRotationFormHandler::RESULT_SUCCESS:
					$notice = array(
						'message' => __( "Your newly generated DKIM key is ready for use. Don't forget to update your DNS with the new key to ensure seamless email authentication. Failure to update the DNS record may result in your WordPress emails not being DKIM signed.", 'deliverability' ),
						'level'   => 'success',
					);
					break;
				case DkimKeyRotationFormHandler::RESULT_ERROR:
					$notice = array(
						'message' => __( 'Unexpected error while regenerating the DKIM key, try again later', 'deliverability' ),
						'level'   => 'error',
					);
					break;
				case DkimKeyRotationFormHandler::RESULT_TOO_MANY_REQUESTS:
					$notice = array(
						// translators: the placeholder represents a date
						'message' => sprintf( __( 'You can only request DKIM key regeneration once per day, please retry after %s', 'deliverability' ), $_GET[ DkimKeyRotationFormHandler::QUERY_PARAM_RETRY_AFTER ] ),
						'level'   => 'error',
					);
					break;
			}

			$notice['testid'] = DkimKeyRotationFormHandler::QUERY_PARAM_RESULT;

			$context->withPrefix( 'notice', $notice );
		}

		if ( $this->wordPressDebugProvider->isDebugEnabled() ) {
			$context->withPrefix(
				'purge_now_enabled',
				array(
					'text'        => __( 'Purge settings now', 'deliverability' ),
					'description' => __( 'Use this feature with caution as there is no way to retrieve the data once it has been purged.', 'deliverability' ),
					'action'      => $this->databasePurgingFormHandler->action(),
				)
			);
		}

		if ( $emailVerificationState instanceof EmailVerified && count( $emailVerificationState->getDkimRecords() ) > 0 ) {
			$currentKeySize = array_map(
				function ( $dkimDnsRecord ) {
					return $dkimDnsRecord->getKeySize(); },
				$emailVerificationState->getDkimRecords()
			)[0];

			$context->withPrefix(
				'dkim_key_rotation',
				array(
					'text'             => __( 'Regenerate the DKIM key', 'deliverability' ),
					'description'      => __( 'You can only create a new pair once a day.', 'deliverability' ),
					'key_size_label'   => __( 'Key size', 'deliverability' ),
					'canChangeKeySize' => $emailVerificationState->getAccount()->getPlan() !== 'FREE',
					'action'           => $this->dkimKeyRotationFormHandler->action(),
					'allowedKeySizes'  => array(
						DEFAULT_DKIM_KEY_SIZE => $currentKeySize === DEFAULT_DKIM_KEY_SIZE,
						2048                  => $currentKeySize === 2048,
					),
				)
			);
		}

		return $this->templateRenderer->render( 'settings/maintenance/main.twig', $context );
	}
}
