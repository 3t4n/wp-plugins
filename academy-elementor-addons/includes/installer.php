<?php
namespace AcademyEA;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Installer {

	public $academyea_version;
	public static function init() {
		$self = new self();
		$self->academy_version = get_option( 'academyea_version' );
		$self->save_option();
		DemoImporter::init();
	}

	public function save_option() {
		if ( ! $this->academyea_version ) {
			add_option( 'academyea_version', ACADEMYEA_VERSION );
		}

		if ( ! get_option( 'academyea_first_install_time' ) ) {
			add_option( 'academyea_first_install_time', Helper::get_time() );
		}
		update_option( 'academyea_required_rewrite_flush', Helper::get_time() );
	}
}
