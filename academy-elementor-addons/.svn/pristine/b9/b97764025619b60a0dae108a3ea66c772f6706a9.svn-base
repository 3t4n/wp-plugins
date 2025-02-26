<?php

namespace AcademyEA\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Menu {

	const CPTTYPE = 'academyea-template';

	public static function init() {
		$self = new self();
		add_action( 'admin_menu', array( $self, 'admin_menu' ) );
	}

	/**
	 * Add admin menu page
	 *
	 * @return void
	 */
	public function admin_menu() {
		add_menu_page( __( 'Academy EA', 'academy-elementor-addons' ), __( 'Academy EA', 'academy-elementor-addons' ), 'manage_options', ACADEMYEA_PLUGIN_SLUG, [ $this, 'load_main_template' ], 'dashicons-welcome-learn-more', 3 );

		$link_custom_post = 'edit.php?post_type=' . self::CPTTYPE;

		add_submenu_page(
			ACADEMYEA_PLUGIN_SLUG,
			esc_html__( 'Template Builder', 'academy-elementor-addons' ),
			esc_html__( 'Template Builder', 'academy-elementor-addons' ),
			'manage_options',
			$link_custom_post,
			null
		);

		// Remove Parent Submenu
		remove_submenu_page( 'academyea', 'academyea' );
	}
	public function load_main_template() {
		echo '<div id="academyeawrap" class="academyeawrap"></div>';
	}

}
