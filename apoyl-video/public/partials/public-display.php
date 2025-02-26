<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_Video
 * @subpackage Apoyl_Video/public/partials
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */

if ($arr['openbilibili']) {
	 $file=apoyl_video_file('bilibiliaotu');
	 if($file){
		include $file;
	 }else{

	     $content = preg_replace_callback('/\<a.*href="https\:\/\/(www|m)\.bilibili\.com\/video\/([A-Za-z0-9]+).*?".*\<\/a\>/i', function ($match) {
	        if (isset($match[2])) {
	            $arr = get_option('apoyl-video-settings');
	            $width = ! empty($arr['width']) ? $arr['width'] : '100%';
	            $height = ! empty($arr['height']) ? $arr['height'] : '300px';
	            $url = '//player.bilibili.com/player.html?bvid='.$match[2];

	            return '<iframe src="' . $url . '" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true" style="width:' . $width . ';height:' . $height . ';"> </iframe>';
	        }
	    }, $content);
	 }
}
if($arr['openyouku']){
    $file=apoyl_video_file('youkuaotu');
    if($file){
        include $file;
    }
}
if($arr['openyoutube']){
    $file=apoyl_video_file('youtubeaotu');
    if($file){
        include $file;
    }
}

if($arr['openqq']){

    $file=apoyl_video_file('qqaotu');
    if($file){
        include $file;
    }
}
if($arr['openxigua']){
    $file=apoyl_video_file('xiguaaotu');
    if($file){
        include $file;
    }
}
?>