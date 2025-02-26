<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_CHATGPT
 * @subpackage APOYL_CHATGPT/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Chatgpt_Uninstall {

	
	public static function uninstall() {
	    global $wpdb;
        delete_option('apoyl-chatgpt-settings');
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}apoyl_chatgpt");
	}

}
