<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DTElementorChartIcoFont {

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
			'icofont-chart-arrows-axis',
			'icofont-chart-bar-graph',
			'icofont-chart-flow-1',
			'icofont-chart-flow-2',
			'icofont-chart-flow',
			'icofont-chart-growth',
			'icofont-chart-histogram-alt',
			'icofont-chart-histogram',
			'icofont-chart-line-alt',
			'icofont-chart-line',
			'icofont-chart-pie-alt',
			'icofont-chart-pie',
			'icofont-chart-radar-graph',
 		];

		$icon_tab['dt-chart-icofont'] = array(
			'name'      => 'dt-chart-icofont',
			'label'     => esc_html__( 'Ico Font - Chart', 'dt-elementor-iconfont-library' ),
			'labelIcon' => 'icofont-chart-bar-graph',
			'prefix'    => '',
			'url'       => plugin_dir_url( __FILE__ ). 'css/icofont.min.css',
			'icons'     => $icons,
			'ver'       => '1.0' //https://icofont.com/icons
		);

		return $icon_tab;
	}

}

DTElementorChartIcoFont::instance();