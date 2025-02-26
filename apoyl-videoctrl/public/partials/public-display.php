<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_Videoctrl
 * @subpackage Apoyl_Videoctrl/public/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ($arr['openvideo']) {
    $content = preg_replace_callback('/<video.*src=\"(.*)\".*>.*<\/video>/i', function ($match) {
        
        if (isset($match[1])) {
            $arr = get_option('apoyl-videoctrl-settings');
            $width = ! empty($arr['width']) ? $arr['width'] : '100%';
            $height = ! empty($arr['height']) ? $arr['height'] : '300px';
            $url = $match[1];
            return '<video src="' . $url . '" controls="controls" style="width:' . $width . ';height:' . $height . ';"></video>';
        }
    }, $content);
}

$file = apoyl_videoctrl_file('bilibili');
if ($file) {
    include $file;
}

?>