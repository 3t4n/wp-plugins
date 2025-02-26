<?php

/*
 * @link  
 * @since 1.0.0
 * @package APOYL_GRABDOUYIN
 * @subpackage APOYL_GRABDOUYIN/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class Apoyl_Grabdouyin_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-grabdouyin-settings';
        $arr_options = array(
            'open' => 1,

        );
        add_option($options_name, $arr_options);
    }

    public static function install_db()
    {

    }
}
?>