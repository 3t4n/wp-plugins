<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_IP
 * @subpackage APOYL_IP/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Ip_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-ip-settings';
        $arr_options = array(
            'open' => 1,
            'openip' => 0,
            'openiplocation' => 0,
            'ipname'=>__('ipnamedefault','apoyl-ip'),
            'accesskey'=>'',
            'secretkey'=>'',
            'opencommentiplocation' => 0,
        )
        ;
        add_option($options_name, $arr_options);
    }

    public static function install_db()
    {
        global $wpdb;
        $apoyl_ip_db_version = APOYL_IP_VERSION;
        $tablename = $wpdb->prefix . 'apoyl_ip';
        $ishave = $wpdb->get_var('show tables like \'' . $tablename . '\'');
        
        if ($tablename != $ishave) {
            $sql = "CREATE TABLE " . $tablename . " (
                      `id`	bigint(20) unsigned  NOT NULL AUTO_INCREMENT,
                      `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
                      `postid` bigint(20) unsigned NOT NULL DEFAULT '0',
                      `ip` varchar(100) NOT NULL,
                      `iplocation` varchar(100) NOT NULL,
                      `addtime` int(10) NOT NULL default '0',
                      PRIMARY KEY (`id`),
                      KEY `postid` (`postid`)
                    );";
        }
        
        include_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
        add_option('apoyl_ip_db_version', $apoyl_ip_db_version);
    }
}
?>