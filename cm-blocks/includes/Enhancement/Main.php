<?php

namespace Codemanas\CmBlocks\Enhancement;

use Codemanas\CmBlocks\Enhancement\BlockVisibility\BlockVisibility;

class Main {
	private static ?Main $_instance = null;

	public static function get_instance(): ?Main {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		BlockVisibility::get_instance();
		MaintenanceMode::get_instance();
		ScrollToTop::get_instance();
	}
}