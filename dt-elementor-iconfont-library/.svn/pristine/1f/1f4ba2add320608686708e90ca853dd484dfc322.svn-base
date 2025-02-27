<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DTElementorBusinessIcoFont {

	/**
	 * Instance
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 */
	public function __construct() {		

		add_filter(  'elementor/icons_manager/additional_tabs', array( $this, 'elementor_icons_tab' ) );
	}
	
	public function elementor_icons_tab( $icon_tab = array() ) {

		$icons = [
			'icofont-bank-alt',
			'icofont-bank',
			'icofont-barcode',
			'icofont-bill-alt',
			'icofont-billboard',
			'icofont-briefcase-1',
			'icofont-briefcase-2',
			'icofont-businessman',
			'icofont-businesswoman',
			'icofont-chair',
			'icofont-coins',
			'icofont-company',
			'icofont-contact-add',
			'icofont-files-stack',
			'icofont-handshake-deal',
			'icofont-id-card',
			'icofont-meeting-add',
			'icofont-money-bag',
			'icofont-pie-chart',
			'icofont-presentation-alt',
			'icofont-presentation',
			'icofont-stamp',
			'icofont-stock-mobile',
 		];

		$icon_tab['dt-business-icofont'] = array(
			'name'      => 'dt-business-icofont',
			'label'     => esc_html__( 'Ico Font - Business', 'dt-elementor-iconfont-library' ),
			'labelIcon' => 'icofont-chair',
			'prefix'    => '',
			'url'       => plugin_dir_url( __FILE__ ). 'css/icofont.min.css',
			'icons'     => $icons,
			'ver'       => '1.0' //https://icofont.com/icons
		);

		return $icon_tab;
	}

}

DTElementorBusinessIcoFont::instance();