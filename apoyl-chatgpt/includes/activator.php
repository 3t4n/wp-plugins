<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_CHATGPT
 * @subpackage APOYL_CHATGPT/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Chatgpt_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-chatgpt-settings';
        $arr_options = array(
            'open' => 0,
        	'openpage' => '',
            'apikey' => '',
            'title' => __('title_default','apoyl-chatgpt'),
            'answer'=>__('answer_default','apoyl-chatgpt'),
            'reply'=>__('reply_default','apoyl-chatgpt'),
        	'baiduapikey' => '',
        	'baidusecretkey' => '',
        	'openllm'=>1,
            'debug'=>1,

        );
        add_option($options_name, $arr_options);
    }

    public static function install_db()
    {
        global $wpdb;
        $apoyl_chatgpt_db_version = APOYL_CHATGPT_VERSION;
        $tablename = $wpdb->prefix . 'apoyl_chatgpt';
        $ishave = $wpdb->get_var('show tables like \'' . $tablename . '\'');
        $sql='';
        if ($tablename != $ishave) {
            $sql = "CREATE TABLE " . $tablename . " (
                      `id`	bigint(20) unsigned  NOT NULL AUTO_INCREMENT,
                      `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
                      `humananswer` text NOT NULL,
                      `aireply` text NOT NULL,
                      `addtime` int(10) NOT NULL default '0',
                      PRIMARY KEY (`id`),
                      KEY `user_id` (`user_id`)
                    );";
        }
    
        include_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
        add_option('apoyl_chatgpt_db_version', $apoyl_chatgpt_db_version);
    }
}
?>