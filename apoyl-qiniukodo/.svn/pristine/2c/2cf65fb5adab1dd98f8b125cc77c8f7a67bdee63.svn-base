<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_QINIUKODO
 * @subpackage APOYL_QINIUKODO/includes
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Apoyl_Qiniukodo_Activator
{

    public static function activate()
    {
        $options_name = 'apoyl-qiniukodo-settings';
        $arr_options = array(
            'open' => 1,
            'accessid' => '',
            'secretkey' => '',
            'region' => '',
            'bucket' => '',
            'https' => 0,
            'openauto' => 0,
            'domain' => '',
            'openchgoss'=>0,
            'opensmall'=>0,
        	'opendebug'=>1,
        );
        add_option($options_name, $arr_options);
    }

    public static function install_db()
    {}
}
?>