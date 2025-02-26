<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    Apoyl_Videoctrl
 * @subpackage Apoyl_Videoctrl/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Videoctrl_Uninstall {

	
	public static function uninstall() {
	    global $wpdb;
        delete_option('apoyl-videoctrl-settings');
	}

}
