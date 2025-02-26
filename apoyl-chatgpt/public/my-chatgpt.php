<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_CHATGPT
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
require_once('../../../../wp-load.php');

$options_name='apoyl-chatgpt-settings';
$arr = get_option($options_name);
isset($_POST['apoyl_chatgpt_word'])?$subject=trim($_POST['apoyl_chatgpt_word']):$subject='';

if(! empty($subject)){
	$file=apoyl_chatgpt_file("ajaxpost");
	if($file){
		include $file;
	}
}else{
require_once plugin_dir_path( __FILE__ ) . 'partials/public-display.php';
}
?>