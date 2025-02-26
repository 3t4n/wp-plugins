<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_IP
 * @subpackage APOYL_IP/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Ip_i18n {


	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'apoyl-ip',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
