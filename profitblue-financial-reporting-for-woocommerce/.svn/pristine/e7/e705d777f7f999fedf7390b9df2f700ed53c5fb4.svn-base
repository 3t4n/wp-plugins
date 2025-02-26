<?php

namespace Profitblue\Abstracts;

use Profitblue\Repositories\SettingsRepository;
use Profitblue\Deps\CustomFields\CustomFields;

abstract class AbstractSettings {

	public $wcf;
	public $settings_repository;

	public function __construct( CustomFields $wcf, SettingsRepository $settings_repository ) {
		$this->wcf                 = $wcf;
		$this->settings_repository = $settings_repository;
		$this->setup();
	}

	abstract public function setup();

}
