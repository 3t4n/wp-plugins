<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_CHATGPT
 * @subpackage APOYL_CHATGPT/public
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Chatgpt_Public
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function pageview($content)
    {

        global $wpdb;
        $aid = get_queried_object_id();

        $arr = get_option('apoyl-chatgpt-settings');
        $str='';
        if (isset($arr['open'])&&$arr['open']>0 && is_single()&&(!$arr['openpage']||$aid==$arr['openpage'])) {

            $str='<iframe src="'.esc_url(APOYL_CHATGPT_URL.'public/my-chatgpt.php').'" height="660" width="100%" style=" margin: 0 auto;display: block;" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"> </iframe>';
        
        }
        return $content.$str;
    }
}