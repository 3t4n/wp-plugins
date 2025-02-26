<?php

/**
 * Define the internationalization functionality

 * @link       https://www.giuliani.studio
 * @since      1.0.0
 *
 * @package    GSWPGMAP
 * @subpackage GSWPGMAP/includes
 */
class GSWPGMAP_Page_i18n {

	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'gswpgmap-page',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
