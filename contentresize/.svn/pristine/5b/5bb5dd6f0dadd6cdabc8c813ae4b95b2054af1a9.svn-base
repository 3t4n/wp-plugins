<?php
/*
Plugin Name: content-resize
Plugin URI: http://viniwp.wordpress.com
Description: Plugin simples para criar resumos com determinado número de palavras de um conteúdo.
Version: 1.0
Author: viniciusgomes
Author URI: http://viniwp.wordpress.com
*/
function contentResize_1(){
 global $wpdb;
 if(function_exists("add_menu_page")){add_menu_page("Content-Resize","Content Resize",7,plugin_basename( dirname(__FILE__)). "/contentResize_1.php");}
}
function contentResize($cr_text,$cr_size=20,$cr_def='') {
$cr_text = str_replace(']]>', ']]&gt;', $cr_text);
                $cr_size += 1; 
		$cr_text_1 = explode(' ', $cr_text, $cr_size);
			array_pop($cr_text_1);
			array_push($cr_text_1, '');
			$cr_text = implode(' ', $cr_text_1);
switch($cr_def){
case 'list':
$cr_text='<li>'.$cr_text.'</li>';
break;
case 'flag':
$cr_text='<img style="padding:0px;margin:0px;margin-right:5px;" src="'.plugin_dir_url( __FILE__ ).'images/flag.png">&nbsp;'.$cr_text;
}
	echo $cr_text;
}
add_action("admin_menu","contentResize_1"); 
?>
