<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_ALIYUNVIDEO
 * @subpackage APOYL_ALIYUNVIDEO/includes
 * @author     凹凸曼 <3201361925@qq.com>
 *
 */
class Apoyl_Aliyunvideo_i18n {


	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'apoyl-aliyunvideo',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
