<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    Apoyl_Bingpush
 * @subpackage Apoyl_Bingpush/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Bingpush_Uninstall {

	
	public static function uninstall() {
	    global $wpdb;
        delete_option('apoyl-bingpush-settings');
        $wpdb->query("DROP TABLE  ".$wpdb->prefix.".apoyl_bingpush; " );
	}

}
