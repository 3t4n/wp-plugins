<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    Apoyl_Toutiaopush
 * @subpackage Apoyl_Toutiaopush/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Toutiaopush_Uninstall {

	
	public static function uninstall() {
	    global $wpdb;
        delete_option('apoyl-toutiaopush-settings');
	}

}
