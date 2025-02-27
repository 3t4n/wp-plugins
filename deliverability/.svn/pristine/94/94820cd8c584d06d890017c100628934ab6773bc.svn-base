<?php

namespace TopDeliverability\Plugin;

use TopDeliverability\Api\Auth\CookieSecretOption;
use TopDeliverability\FormHandler;
use TopDeliverability\NonceValidator;
use TopDeliverability\Notice\NoticeManager;
use TopDeliverability\PluginLinkCustomizer;
use TopDeliverability\Settings\Widget\DatabasePurgingFormHandler;
use TopDeliverability\Settings\Widget\DkimKeyRotationFormHandler;
use TopDeliverability\Settings\Widget\PasswordResetFormHandler;
use TopDeliverability\Settings\Widget\Signup\Auth0SignupFormHandler;
use TopDeliverability\Settings\Widget\Signup\EmbeddedSignupFormHandler;
use TopDeliverability\Settings\Widget\UninstallationPurgingFormHandler;
use TopDeliverability\Settings\Widget\VerificationEmailSendingFormHandler;
use const TopDeliverability\OPTIONS_GROUP;

class Configurer {

	/**
	 * @var CookieSecretOption
	 */
	private $cookieSecretOption;

	/**
	 * @var PasswordResetFormHandler
	 */
	private $passwordResetFormHandler;

	/**
	 * @var EmbeddedSignupFormHandler
	 */
	private $embeddedSignupFormHandler;

	/**
	 * @var Auth0SignupFormHandler
	 */
	private $auth0SignupFormHandler;

	/**
	 * @var VerificationEmailSendingFormHandler
	 */
	private $verificationEmailSendingFormHandler;

	/**
	 * @var DatabasePurgingFormHandler
	 */
	private $databasePurgingFormHandler;

	/**
	 * @var UninstallationPurgingFormHandler
	 */
	private $uninstallationPurgingFormHandler;

	/**
	 * @var NoticeManager
	 */
	private $noticeManager;

	/**
	 * @var PluginLinkCustomizer
	 */
	private $pluginLinkCustomizer;

	/**
	 * @var DkimKeyRotationFormHandler
	 */
	private $dkimKeyRotationFormHandler;

	/**
	 * @param CookieSecretOption                  $cookieSecretOption
	 * @param PasswordResetFormHandler            $passwordResetFormHandler
	 * @param EmbeddedSignupFormHandler           $embeddedSignupFormHandler
	 * @param Auth0SignupFormHandler              $auth0SignupFormHandler
	 * @param VerificationEmailSendingFormHandler $verificationEmailSendingFormHandler
	 * @param DatabasePurgingFormHandler          $databasePurgingFormHandler
	 * @param UninstallationPurgingFormHandler    $uninstallationPurgingFormHandler
	 * @param NoticeManager                       $noticeManager
	 * @param PluginLinkCustomizer                $pluginLinkCustomizer
	 * @param DkimKeyRotationFormHandler          $dkimKeyRotationFormHandler
	 */
	public function __construct(
		CookieSecretOption $cookieSecretOption,
		PasswordResetFormHandler $passwordResetFormHandler,
		EmbeddedSignupFormHandler $embeddedSignupFormHandler,
		Auth0SignupFormHandler $auth0SignupFormHandler,
		VerificationEmailSendingFormHandler $verificationEmailSendingFormHandler,
		DatabasePurgingFormHandler $databasePurgingFormHandler,
		UninstallationPurgingFormHandler $uninstallationPurgingFormHandler,
		NoticeManager $noticeManager,
		PluginLinkCustomizer $pluginLinkCustomizer,
		DkimKeyRotationFormHandler $dkimKeyRotationFormHandler
	) {
		$this->cookieSecretOption                  = $cookieSecretOption;
		$this->passwordResetFormHandler            = $passwordResetFormHandler;
		$this->embeddedSignupFormHandler           = $embeddedSignupFormHandler;
		$this->auth0SignupFormHandler              = $auth0SignupFormHandler;
		$this->verificationEmailSendingFormHandler = $verificationEmailSendingFormHandler;
		$this->databasePurgingFormHandler          = $databasePurgingFormHandler;
		$this->uninstallationPurgingFormHandler    = $uninstallationPurgingFormHandler;
		$this->noticeManager                       = $noticeManager;
		$this->pluginLinkCustomizer                = $pluginLinkCustomizer;
		$this->dkimKeyRotationFormHandler          = $dkimKeyRotationFormHandler;
	}

	public function configure() {
		$pluginDirBaseUrl = plugin_dir_url( TOP_DELIVERABILITY_PLUGIN_INDEX_FILE );
		$pluginDirBaseUrl = rtrim( $pluginDirBaseUrl, '/' );

		register_setting(
			OPTIONS_GROUP,
			$this->cookieSecretOption->name(),
			array(
				'default' => $this->cookieSecretOption->defaultValue(),
			)
		);

		wp_register_style( 'td/common', "$pluginDirBaseUrl/common.css" );
		wp_register_style( 'td/notice', "$pluginDirBaseUrl/notice.css" );
		wp_register_style( 'td/settings', "$pluginDirBaseUrl/settings.css" );
		wp_register_script( 'td/dkim_records', "$pluginDirBaseUrl/dkim_records.js" );
		wp_register_script( 'td/maintenance', "$pluginDirBaseUrl/maintenance.js" );
		wp_register_script( 'td/plan', "$pluginDirBaseUrl/plan.js" );
		wp_localize_script(
			'td/maintenance',
			'ajax',
			array(
				'url'                      => admin_url( 'admin-ajax.php' ),
				NonceValidator::FIELD_NAME => wp_create_nonce( $this->uninstallationPurgingFormHandler->action() ),
			)
		);
		wp_localize_script(
			'td/maintenance',
			'purging',
			array(
				'confirmation_message' => __( 'All data stored in the database will be deleted. This action cannot be undone. Are you sure you want to proceed?', 'deliverability' ),
			)
		);
		wp_localize_script(
			'td/maintenance',
			'dkim_key_rotation',
			array(
				'confirmation_message' => __( 'Do you really want to regenerate the DKIM key now?', 'deliverability' ),
			)
		);
		wp_register_style( 'td/navigation-menu', "$pluginDirBaseUrl/navigation-menu.css" );
		wp_register_style( 'td/dashboard', "$pluginDirBaseUrl/dashboard.css" );
		wp_register_script( 'td/dashboard', "$pluginDirBaseUrl/dashboard.js", array( 'jquery' ) );
		wp_register_script(
			'td/daily-usage-chart',
			"$pluginDirBaseUrl/daily-usage-chart.js",
			array(
				'jquery',
				'td/chart.js',
			)
		);
		wp_register_script( 'td/chart.js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js' );
		wp_register_style( 'td/fontawesome', 'https://use.fontawesome.com/releases/v6.3.0/css/all.css' );

		$this->register_post_handler( $this->embeddedSignupFormHandler );
		$this->register_post_handler( $this->auth0SignupFormHandler );
		$this->register_post_handler( $this->passwordResetFormHandler );
		$this->register_post_handler( $this->verificationEmailSendingFormHandler );
		$this->register_post_handler( $this->databasePurgingFormHandler );
		$this->register_post_handler( $this->dkimKeyRotationFormHandler );

		$this->register_ajax_handler( $this->uninstallationPurgingFormHandler );

		add_action( 'admin_notices', array( $this->noticeManager, 'render' ) );

		add_filter( 'plugin_action_links_deliverability/index.php', array( $this->pluginLinkCustomizer, 'addCustomLinks' ) );
	}

	/**
	 * @param FormHandler $formHandler
	 * @param string      $action
	 * @return void
	 */
	private function register_form_handler( FormHandler $formHandler, $action ) {
		add_action( "{$action}_{$formHandler->action()}", array( $formHandler, 'handle' ) );
	}

	/**
	 * @param FormHandler $formHandler
	 * @return void
	 */
	private function register_post_handler( FormHandler $formHandler ) {
		$this->register_form_handler( $formHandler, 'admin_post' );
	}

	/**
	 * @param FormHandler $formHandler
	 * @return void
	 */
	private function register_ajax_handler( FormHandler $formHandler ) {
		$this->register_form_handler( $formHandler, 'wp_ajax' );
	}
}
