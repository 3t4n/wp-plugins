<?php
/*
 * @link        
 * @since      1.0.0
 * @package    APOYL_VIEWS
 * @subpackage APOYL_VIEWS/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class Apoyl_Views_i18n {


	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'apoyl-views',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
?>