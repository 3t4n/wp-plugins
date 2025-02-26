<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package Apoyl_Badurl
 * @subpackage Apoyl_Badurl/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Badurl_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-badurl-settings';
        $arr_options = array(
            'open' => 1,
            'urls' => '',

        );
        add_option($options_name, $arr_options);
    }

   
}
?>