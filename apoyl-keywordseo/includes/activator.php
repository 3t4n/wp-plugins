<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_KEYWORDSEO
 * @subpackage APOYL_KEYWORDSEO/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Keywordseo_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-keywordseo-settings';
        $arr_options = array(
            'open' => 1,
            'keywordone' => '',
            'keywordurlone' => '',
            'keywordtwo' => '',
            'keywordurltwo' => '',
            'openbatch'=>0,
        	'batchdata'=>'',
        );
        add_option($options_name, $arr_options);
    }

    public static function install_db()
    {}
}
?>