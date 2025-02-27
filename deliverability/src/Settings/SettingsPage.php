<?php

namespace TopDeliverability\Settings;

use TopDeliverability\Account\State\EmailNotRegistered;
use TopDeliverability\Account\State\EmailVerificationStateProvider;
use TopDeliverability\Account\State\EmailVerified;
use TopDeliverability\AccountIdOption;
use TopDeliverability\Page;
use TopDeliverability\Settings\Widget\AccountWidget;
use TopDeliverability\Settings\Widget\DailyUsageWidget;
use TopDeliverability\Settings\Widget\MaintenanceWidget;
use TopDeliverability\Settings\Widget\ConfigurationWidget;
use TopDeliverability\Template;
use Exception;

class SettingsPage implements Page {

	/**
	 * @var AccountIdOption
	 */
	private $accountIdOption;

	/**
	 * @var EmailVerificationStateProvider
	 */
	private $emailVerificationStateProvider;

	/**
	 * @var Template\Renderer
	 */
	private $templateRenderer;

	/**
	 * @var MaintenanceWidget
	 */
	private $maintenanceWidget;

	/**
	 * @var DailyUsageWidget
	 */
	private $dailyUsageWidget;

	/**
	 * @var ConfigurationWidget
	 */
	private $configurationWidget;

	/**
	 * @var AccountWidget
	 */
	private $accountWidget;

	public function __construct(
		AccountIdOption $accountIdOption,
		EmailVerificationStateProvider $emailVerificationStateProvider,
		Template\Renderer $templateRenderer,
		MaintenanceWidget $maintenanceWidget,
		DailyUsageWidget $dailyUsageWidget,
		ConfigurationWidget $configurationWidget,
		AccountWidget $accountWidget
	) {
		$this->accountIdOption                = $accountIdOption;
		$this->emailVerificationStateProvider = $emailVerificationStateProvider;
		$this->templateRenderer               = $templateRenderer;
		$this->maintenanceWidget              = $maintenanceWidget;
		$this->dailyUsageWidget               = $dailyUsageWidget;
		$this->configurationWidget            = $configurationWidget;
		$this->accountWidget                  = $accountWidget;
	}

	function render() {
		try {
			$emailVerificationState = $this->emailVerificationStateProvider->getState();
		} catch ( Exception $e ) {
			$emailVerificationState = new EmailNotRegistered();
		}

		$context = new Template\Context();

		if ( $emailVerificationState instanceof EmailVerified && $this->configurationWidget->isDnsConfigured() ) {
			$context->with(
				array(
					'daily_usage' => $this->dailyUsageWidget->render( $this->accountIdOption->get() ),
				)
			);
		}

		$context->with(
			array(
				'account'       => $this->accountWidget->render( $emailVerificationState ),
				'configuration' => $this->configurationWidget->render( $emailVerificationState ),
				'maintenance'   => $this->maintenanceWidget->render( $emailVerificationState ),
			)
		);

		$this->templateRenderer->display( 'settings/main.twig', $context );
	}
}
