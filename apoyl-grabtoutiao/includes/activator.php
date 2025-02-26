<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_GRABTOUTIAO
 * @subpackage APOYL_GRABTOUTIAO/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Apoyl_Grabtoutiao_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-grabtoutiao-settings';
        $arr_options = array(
            'open' => 1,
        	'openpic' => 0,
        );
        add_option($options_name, $arr_options);
    }

   
}
?>