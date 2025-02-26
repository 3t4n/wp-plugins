<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package Apoyl_Videoctrl
 * @subpackage Apoyl_Videoctrl/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Videoctrl_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-videoctrl-settings';
        $arr_options = array(
            'open' => 0,
            'openvideo' => 0,
            'openbilibili'=>0,
            'width' => '750px',
            'height' => '300px',
        );
        add_option($options_name, $arr_options);
    }

   
}
?>