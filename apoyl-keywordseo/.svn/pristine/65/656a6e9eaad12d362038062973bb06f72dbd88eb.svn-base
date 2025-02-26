<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package APOYL_KEYWORDSEO
 * @subpackage APOYL_KEYWORDSEO/public/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ($arr['open']) {
    
    if ($arr['keywordone'])
        $content=str_replace($arr['keywordone'], '<a href="' . esc_url($arr['keywordurlone']) . '" target="_blank">' . esc_attr($arr['keywordone']) . '</a>', $content);
    
    if ($arr['keywordtwo'])
        $content=str_replace($arr['keywordtwo'], '<a href="' . esc_url($arr['keywordurltwo']) . '" target="_blank">' . esc_attr($arr['keywordtwo']) . '</a>', $content);
    if($arr['openbatch']){
	    $file=apoyl_keywordseo_file('batchdata');
	    if($file){
	        include $file;
	    }
    }
}
?>
