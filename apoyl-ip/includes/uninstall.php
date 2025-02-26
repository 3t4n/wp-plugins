<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_IP
 * @subpackage APOYL_IP/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Ip_Uninstall {

	
	public static function uninstall() {
	    global $wpdb;
        delete_option('apoyl-ip-settings');
	}

}
