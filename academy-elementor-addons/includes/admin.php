<?php
namespace AcademyEA;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Admin {

	public static function init() {
		$self = new self();
		Admin\Menu::init();
		Admin\TemplateCpt::init();
		Admin\TemplateManager::init();
		$self->dispatch_hooks();
	}

	public function dispatch_hooks() {
		add_action( 'admin_init', array( $this, 'flush_rewrite_rules' ) );
	}

	public function flush_rewrite_rules() {
		if ( get_option( 'academyea_required_rewrite_flush' ) ) {
			delete_option( 'academyea_required_rewrite_flush' );
			flush_rewrite_rules();
		}
	}
}
