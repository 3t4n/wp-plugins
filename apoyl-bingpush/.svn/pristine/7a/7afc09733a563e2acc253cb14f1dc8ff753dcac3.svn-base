<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package Apoyl_Bingpush
 * @subpackage Apoyl_Bingpush/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Bingpush_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-bingpush-settings';
        $arr_options = array(
            'site' => '',
            'secret' => '',
            'https' => 0,
            'autopush'=>0,
            'indexnow'=>0,
        );
        add_option($options_name, $arr_options);
    }

    public static function install_db()
    {
        global $wpdb;
        $apoyl_bingpush_db_version = APOYL_BINGPUSH_VERSION;
        $tablename = $wpdb->prefix . 'apoyl_bingpush';
        $ishave = $wpdb->get_var('show tables like \'' . $tablename . '\'');
        $sql='';
        if ($tablename != $ishave) {
            $sql = "CREATE TABLE " . $tablename . " (
                      `id`	bigint(20) NOT NULL AUTO_INCREMENT,
                      `aid` bigint(20) NOT NULL default '0',
                      `subject` varchar(100) NOT NULL,
                      `url` varchar(200) NOT NULL,
                      `ispush` tinyint(1) NOT NULL default '0',
                      `isdel` tinyint(1) NOT NULL default '0',
                      `msgs` varchar(300) NOT NULL,
                      `modtime` int(10) NOT NULL default '0',
                      PRIMARY KEY (`id`),
                      KEY `modtime` (`modtime`)
                    );
                    
                    ";
        }
        $tablenameone = $wpdb->prefix . 'apoyl_bingpush_indexnow';
        $ishaveone = $wpdb->get_var('show tables like \'' . $tablenameone . '\'');
        $sql='';
        if ($tablenameone != $ishaveone) {
            $sql = "CREATE TABLE " . $tablenameone . " (
                      `id`	bigint(20) NOT NULL AUTO_INCREMENT,
                      `aid` bigint(20) NOT NULL default '0',
                      `subject` varchar(100) NOT NULL,
                      `url` varchar(200) NOT NULL,
                      `ispush` tinyint(1) NOT NULL default '0',
                      `isdel` tinyint(1) NOT NULL default '0',
                      `msgs` varchar(300) NOT NULL,
                      `modtime` int(10) NOT NULL default '0',
                      PRIMARY KEY (`id`),
                      KEY `modtime` (`modtime`)
                    );
                    
                    ";
        }

        include_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
        add_option('apoyl_bingpush_db_version', $apoyl_bingpush_db_version);
    }
}
?>