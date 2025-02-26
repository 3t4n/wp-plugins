<?php
/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package Apoyl_Tencentcos
 * @subpackage Apoyl_Tencentcos/public
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Apoyl_Tencentcos_Public
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function apoyl_tencentcos_image_srcset($sources)
    {

        if($sources){
            $file=apoyl_tencentcos_file('srcset');
            if($file){
                include $file;
            }
        }
        return $sources;
    }
    public function apoyl_tencentcos_the_content($content)
    {

        if (is_single()) {

            $arr = get_option('apoyl-tencentcos-settings');
            if ($arr['open']) {
                include plugin_dir_path(__FILE__) . 'partials/public-display.php';
            }
        }
        return $content;
    }
}