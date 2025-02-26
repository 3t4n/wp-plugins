<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_ALIYUNVIDEO
 * @subpackage APOYL_ALIYUNVIDEO/includes
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
class Apoyl_Aliyunvideo_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-aliyunvideo-settings';
        $arr_options = array(
            'open' => 1,
            'accessid' => '',
            'secretkey' => '',
            'region' => '',
            'openauto' => 0,
            'width'=>'100%',
            'height'=>'360',
            'openmd5' => 0,
        );
        add_option($options_name, $arr_options);
    }

    public static function cronjob()
    {
        if (! wp_next_scheduled('apoyl_aliyunvideo_cronjob_getmediaid')) {
            wp_schedule_event(time(), 'five_minutes', 'apoyl_aliyunvideo_cronjob_getmediaid');
        }
    }
    public static function install_db()
    {
    	global $wpdb;
    	$apoyl_aliyunvideo_db_version = APOYL_ALIYUNVIDEO_VERSION;
    	$tablename = $wpdb->prefix . 'apoyl_aliyunvideo';
    	$ishave = $wpdb->get_var('show tables like \'' . $tablename . '\'');
        $sql='';
    	if ($tablename != $ishave) {
    		$sql = "CREATE TABLE " . $tablename . " (
                      `id`	bigint(20) NOT NULL AUTO_INCREMENT,
                      `meta_id`	bigint(20) NOT NULL  default '0',
                      `mediaid` varchar(255) NOT NULL,
                      `jobid` varchar(255) NOT NULL,
                      `url` varchar(255) NOT NULL,
                      `dealstatus` varchar(64) NOT NULL,
                      `message` text NOT NULL,
                      `addtime` int(10) NOT NULL default '0',
                      PRIMARY KEY (`id`),
                      KEY `jobid` (`jobid`),
                      KEY `mediaid` (`mediaid`),
                      KEY `dealstatus` (`dealstatus`)
                    );";
    	}

    	include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    	dbDelta($sql);
    	add_option('apoyl_aliyunvideo_db_version', $apoyl_aliyunvideo_db_version);
    }
}
?>