<?php

namespace Codemanas\CmBlocks\Rest;

class RestModules {
	private static ?RestModules $_instance = null;

	public static function get_instance(): ?RestModules {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		Details::get_instance();
		Header::get_instance();
		UserRoles::get_instance();
		Visibility::get_instance();
		SiteSettings::get_instance();
		ScrollToTop::get_instance();
	}
}