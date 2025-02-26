<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package Apoyl_Toutiaopush
 * @subpackage Apoyl_Toutiaopush/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Toutiaopush_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-toutiaopush-settings';
        $arr_options = array(
            'opentoutiao' => 1,
            'codejs' => '',

        );
        add_option($options_name, $arr_options);
    }

   
}
?>