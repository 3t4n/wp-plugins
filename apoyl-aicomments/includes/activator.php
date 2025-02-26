<?php

/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_AICOMMENTS
 * @subpackage APOYL_AICOMMENTS/includes
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class Apoyl_Aicomments_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-aicomments-settings';
        $arr_options = array(
            'open' => 1,
            'apikey' => '',
            'secretkey' => '',
            'author'=>'AI',
            'debug'=>1,
            'limit'=>1,
            'authors'=>'',

        );
        add_option($options_name, $arr_options);
    }

    public static function install_db()
    {
        global $wpdb;
        $sql='';
        $apoyl_aicomments_db_version = APOYL_AICOMMENTS_VERSION;
        $tablename = $wpdb->prefix . 'apoyl_aicomments';
        $ishave = $wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $wpdb->esc_like($tablename)));

        if ($tablename != $ishave) {
            $sql = "CREATE TABLE IF NOT EXISTS " . $tablename . " (
                      `id`	bigint(20) unsigned  NOT NULL AUTO_INCREMENT,
                      `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
                      `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
                      `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
                      `message` text NOT NULL,
                      `addtime` int(10) NOT NULL default '0',
                      PRIMARY KEY (`id`),
                      KEY `comment_id` (`comment_id`)
                    );";
        }
        if($sql) {
            include_once ABSPATH . 'wp-admin/includes/upgrade.php';
            dbDelta($sql);
        }

        add_option('apoyl_aicomments_db_version', $apoyl_aicomments_db_version);
    }
}
?>