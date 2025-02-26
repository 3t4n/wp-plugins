<?php
/*
 * @link        
 * @since      1.0.0
 * @package    APOYL_GRABDOUYIN
 * @subpackage APOYL_GRABDOUYIN/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class Apoyl_Grabdouyin_i18n {


	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'apoyl-grabdouyin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
?>