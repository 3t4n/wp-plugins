<?php

namespace TopDeliverability\Menu;

use TopDeliverability\About\AboutPage;
use TopDeliverability\Callback\CallbackPage;
use TopDeliverability\Dashboard\DashboardPage;
use TopDeliverability\Settings\SettingsPage;
use const TopDeliverability\TOP_DELIVERABILITY_CAPABILITY;

class MainMenu {

	/**
	 * @var DashboardPage
	 */
	private $dashboardPage;

	/**
	 * @var SettingsPage
	 */
	private $settingsPage;

	/**
	 * @var CallbackPage
	 */
	private $callbackPage;

	/**
	 * @var AboutPage
	 */
	private $aboutPage;

	/**
	 * @var MenuEntry
	 */
	private $dashboardMenuEntry;

	/**
	 * @var MenuEntry
	 */
	private $settingsMenuEntry;

	/**
	 * @var MenuEntry
	 */
	private $callbackMenuEntry;

	/**
	 * @var MenuEntry
	 */
	private $aboutMenuEntry;

	public function __construct(
		DashboardPage $dashboardPage,
		SettingsPage $settingsPage,
		CallbackPage $callbackPage,
		AboutPage $aboutPage,
		MenuEntry $dashboardMenuEntry,
		MenuEntry $settingsMenuEntry,
		MenuEntry $callbackMenuEntry,
		MenuEntry $aboutMenuEntry
	) {
		$this->dashboardPage      = $dashboardPage;
		$this->settingsPage       = $settingsPage;
		$this->callbackPage       = $callbackPage;
		$this->aboutPage          = $aboutPage;
		$this->dashboardMenuEntry = $dashboardMenuEntry;
		$this->settingsMenuEntry  = $settingsMenuEntry;
		$this->callbackMenuEntry  = $callbackMenuEntry;
		$this->aboutMenuEntry     = $aboutMenuEntry;
	}

	public function init() {
		add_menu_page(
			$this->dashboardMenuEntry->getTitle(),
			$this->menu_title(),
			TOP_DELIVERABILITY_CAPABILITY,
			$this->dashboardMenuEntry->getSlug(),
			array( $this->dashboardPage, 'render' ),
			'dashicons-email-alt2'
		);
		add_submenu_page(
			$this->dashboardMenuEntry->getSlug(),
			$this->dashboardMenuEntry->getTitle(),
			$this->dashboardMenuEntry->getMenuTitle(),
			TOP_DELIVERABILITY_CAPABILITY,
			$this->dashboardMenuEntry->getSlug(),
			array( $this->dashboardPage, 'render' )
		);
		add_submenu_page(
			$this->dashboardMenuEntry->getSlug(),
			$this->settingsMenuEntry->getTitle(),
			$this->settingsMenuEntry->getMenuTitle(),
			TOP_DELIVERABILITY_CAPABILITY,
			$this->settingsMenuEntry->getSlug(),
			array( $this->settingsPage, 'render' )
		);
		add_submenu_page(
			$this->dashboardMenuEntry->getSlug(),
			$this->aboutMenuEntry->getTitle(),
			$this->aboutMenuEntry->getMenuTitle(),
			TOP_DELIVERABILITY_CAPABILITY,
			$this->aboutMenuEntry->getSlug(),
			array( $this->aboutPage, 'render' )
		);
		add_submenu_page(
			'',
			$this->callbackMenuEntry->getTitle(),
			$this->callbackMenuEntry->getMenuTitle(),
			TOP_DELIVERABILITY_CAPABILITY,
			$this->callbackMenuEntry->getSlug(),
			array( $this->callbackPage, 'render' )
		);
	}

	private function menu_title() {
		return __( 'Email Deliverability', 'deliverability' );
	}
}
