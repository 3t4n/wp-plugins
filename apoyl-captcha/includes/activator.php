<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_CAPTCHA
 * @subpackage APOYL_CAPTCHA/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Captcha_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-captcha-settings';
        $arr_options = array(
            'open' => 1,
            'openreg' => 1,
        	'openlogin' => 0,


        );
        add_option($options_name, $arr_options);
    }

    public static function install_db()
    {
        global $wpdb;
    }
}
?>