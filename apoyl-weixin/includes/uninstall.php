<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_WEIXIN
 * @subpackage APOYL_WEIXIN/includes
 * @author     凹凸曼 <3201361925@qq.com>
 *
 */
class Apoyl_Weixin_Uninstall {

	
	public static function uninstall() {
	    global $wpdb;
        delete_option('apoyl-weixin-settings');
	}

}
