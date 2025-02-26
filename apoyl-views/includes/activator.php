<?php

/*
 * @link  
 * @since 1.0.0
 * @package APOYL_VIEWS
 * @subpackage APOYL_VIEWS/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class Apoyl_Views_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-views-settings';
        $arr_options = array(
            'open' => 1,
            'openviewcount'=>1,
            'openinitcount'=>0,
            'randcount'=>'300~1000',
            'openeditcount'=>0,


        );
        add_option($options_name, $arr_options);
    }

}
?>