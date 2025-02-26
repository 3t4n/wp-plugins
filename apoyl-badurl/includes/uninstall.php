<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    Apoyl_Badurl
 * @subpackage Apoyl_Badurl/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Badurl_Uninstall {

	
	public static function uninstall() {
	    global $wpdb;
        delete_option('apoyl-badurl-settings');
	}

}
