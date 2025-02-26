<?php
/*
 * @link http://www.girltm.com
 * @since 1.0.0
 * @package Apoyl_Qiniukodo
 * @subpackage Apoyl_Qiniukodo/public/partials
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ($arr['domain']&&$arr['openchgoss']) {
	$file=apoyl_qiniukodo_file('cdn');
	 if($file){
		include $file;
	 }
}

?>