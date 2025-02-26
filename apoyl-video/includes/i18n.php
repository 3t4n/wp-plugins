<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    Apoyl_Video
 * @subpackage Apoyl_Video/includes
 * @author     凹凸曼 <3201361925@qq.com>
 *
 */
class Apoyl_Video_i18n {


	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'apoyl-video',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
