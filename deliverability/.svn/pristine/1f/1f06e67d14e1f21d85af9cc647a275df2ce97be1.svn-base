<?php

namespace TopDeliverability;

use TopDeliverability\Settings\SettingsMenuEntry;
use TopDeliverability\Template;

class PluginLinkCustomizer {

	/**
	 * @var SettingsMenuEntry
	 */
	private $settingsMenuEntry;

	/**
	 * @var Template\Renderer
	 */
	private $templateRenderer;

	/**
	 * @param SettingsMenuEntry $settingsMenuEntry
	 * @param Template\Renderer $templateRenderer
	 */
	public function __construct( SettingsMenuEntry $settingsMenuEntry, Template\Renderer $templateRenderer ) {
		$this->settingsMenuEntry = $settingsMenuEntry;
		$this->templateRenderer  = $templateRenderer;
	}

	/**
	 * @param string[] $actions
	 * @return string[]
	 */
	public function addCustomLinks( $actions ) {
		$context       = new Template\Context(
			array(
				'url'  => menu_page_url( $this->settingsMenuEntry->getSlug(), false ),
				'text' => $this->settingsMenuEntry->getTitle(),
			)
		);
		$settings_link = $this->templateRenderer->render( 'plugin_link.twig', $context );

		array_unshift( $actions, $settings_link );

		return $actions;
	}
}
