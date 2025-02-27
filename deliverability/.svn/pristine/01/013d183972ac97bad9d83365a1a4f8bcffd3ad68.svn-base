<?php

namespace TopDeliverability\Plugin;

use TopDeliverability\Callback\CallbackPage;
use TopDeliverability\Email\DkimHeaderAppender;
use TopDeliverability\Email\PHPMailerOverwriter;
use TopDeliverability\Menu\MainMenu;

class Wired {

	/**
	 * @var Activator
	 */
	private $pluginActivator;

	/**
	 * @var Configurer
	 */
	private $pluginConfigurer;

	/**
	 * @var MainMenu
	 */
	private $mainMenu;

	/**
	 * @var PHPMailerOverwriter
	 */
	private $phpmailerOverwriter;

	/**
	 * @var DkimHeaderAppender
	 */
	private $dkimHeaderAppender;

	/**
	 * @var CallbackPage
	 */
	private $callbackPage;

	/**
	 * @var Uninstaller
	 */
	private $pluginUninstaller;

	/**
	 * @param Activator           $pluginActivator
	 * @param Configurer          $pluginConfigurer
	 * @param MainMenu            $mainMenu
	 * @param PHPMailerOverwriter $phpmailerOverwriter
	 * @param DkimHeaderAppender  $dkimHeaderAppender
	 * @param CallbackPage        $callbackPage
	 * @param Uninstaller         $pluginUninstaller
	 */
	public function __construct(
		Activator $pluginActivator,
		Configurer $pluginConfigurer,
		MainMenu $mainMenu,
		PHPMailerOverwriter $phpmailerOverwriter,
		DkimHeaderAppender $dkimHeaderAppender,
		CallbackPage $callbackPage,
		Uninstaller $pluginUninstaller
	) {
		$this->pluginActivator     = $pluginActivator;
		$this->pluginConfigurer    = $pluginConfigurer;
		$this->mainMenu            = $mainMenu;
		$this->phpmailerOverwriter = $phpmailerOverwriter;
		$this->dkimHeaderAppender  = $dkimHeaderAppender;
		$this->callbackPage        = $callbackPage;
		$this->pluginUninstaller   = $pluginUninstaller;
	}

	/**
	 * @return Activator
	 */
	public function get_plugin_activator() {
		return $this->pluginActivator;
	}

	/**
	 * @return Configurer
	 */
	public function get_plugin_configurer() {
		return $this->pluginConfigurer;
	}

	/**
	 * @return MainMenu
	 */
	public function get_main_menu() {
		return $this->mainMenu;
	}

	/**
	 * @return PHPMailerOverwriter
	 */
	public function get_phpmailer_overwriter() {
		return $this->phpmailerOverwriter;
	}

	/**
	 * @return DkimHeaderAppender
	 */
	public function get_dkim_header_appender() {
		return $this->dkimHeaderAppender;
	}

	/**
	 * @return CallbackPage
	 */
	public function get_callback_page() {
		return $this->callbackPage;
	}

	/**
	 * @return Uninstaller
	 */
	public function get_plugin_uninstaller() {
		return $this->pluginUninstaller;
	}
}
