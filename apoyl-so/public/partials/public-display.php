<?php
/*
 * @link       http://www.girltm.com
 * @since      1.0.0
 * @package    Apoyl_So
 * @subpackage Apoyl_So/public/partials
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
$imgurl=APOYL_SO_URL.'public/img/so.png';
$domain=$arr['domain'];
$str='<div id="apoyl-so-so360">
    <form action="http://www.so.com/s" target="_blank" id="apoyl-so-so360form">
        <input type="text" autocomplete="off" name="q" id="apoyl-so-so360_keyword" style="background:url('.esc_attr($imgurl).')
no-repeat right center;">
        <input type="submit" id="apoyl-so-so360_submit" value="搜 索">
        <input type="hidden" name="ie" value="utf-8">
        <input type="hidden" name="src" value="zz_'.esc_attr($domain).'">
        <input type="hidden" name="site" value="'.esc_attr($domain).'">
        <input type="hidden" name="rg" value="1">
        <input type="hidden" name="inurl" value="">
    </form>
</div>';
?>