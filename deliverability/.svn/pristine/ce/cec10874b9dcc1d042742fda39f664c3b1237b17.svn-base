<?php

namespace TopDeliverability\Plugin;

class Uninstaller {

	/**
	 * @var OptionCleaner
	 */
	private $optionCleaner;

	/**
	 * @var UninstallationPurgingOption
	 */
	private $uninstallationPurgingOption;

	/**
	 * @param OptionCleaner               $optionCleaner
	 * @param UninstallationPurgingOption $uninstallationPurgingOption
	 */
	public function __construct(
		OptionCleaner $optionCleaner,
		UninstallationPurgingOption $uninstallationPurgingOption
	) {
		$this->optionCleaner               = $optionCleaner;
		$this->uninstallationPurgingOption = $uninstallationPurgingOption;
	}

	/**
	 * @return void
	 */
	public function uninstall() {
		if ( $this->uninstallationPurgingOption->isEnabled() ) {
			$this->optionCleaner->clean();
		}
	}
}
