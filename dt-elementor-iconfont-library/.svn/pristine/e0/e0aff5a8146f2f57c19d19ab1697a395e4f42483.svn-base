<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DTElementorAbstractIcoFont {

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
			'icofont-angry-monster',
			'icofont-bathtub',
			'icofont-bird-wings',
			'icofont-bow',
			'icofont-castle',
			'icofont-circuit',
			'icofont-crown-king',
			'icofont-crown-queen',
			'icofont-dart',
			'icofont-disability-race',
			'icofont-diving-goggle',
			'icofont-eye-open',
			'icofont-flora-flower',
			'icofont-flora',
			'icofont-gift-box',
			'icofont-halloween-pumpkin',
			'icofont-hand-power',
			'icofont-hand-thunder',
			'icofont-king-monster',
			'icofont-love',
			'icofont-magician-hat',
			'icofont-native-american',
			'icofont-owl-look',
			'icofont-phoenix',
			'icofont-robot-face',
			'icofont-sand-clock',
			'icofont-shield-alt',
			'icofont-ship-wheel',
			'icofont-skull-danger',
			'icofont-skull-face',
			'icofont-snowmobile',
			'icofont-space-shuttle',
			'icofont-star-shape',
			'icofont-swirl',
			'icofont-tattoo-wing',
			'icofont-throne',
			'icofont-tree-alt',
			'icofont-triangle',
			'icofont-unity-hand',
			'icofont-weed',
			'icofont-woman-bird',               
 		];

		$icon_tab['dt-abstract-icofont'] = array(
			'name'      => 'dt-abstract-icofont',
			'label'     => esc_html__( 'Ico Font - Abstract', 'dt-elementor-iconfont-library' ),
			'labelIcon' => 'icofont-woman-bird',
			'prefix'    => '',
			'url'       => plugin_dir_url( __FILE__ ). 'css/icofont.min.css',
			'icons'     => $icons,
			'ver'       => '1.0' //https://icofont.com/icons
		);

		return $icon_tab;
	}

}

DTElementorAbstractIcoFont::instance();