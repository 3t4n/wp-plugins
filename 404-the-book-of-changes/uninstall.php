<?php  
if( ! defined('WP_UNINSTALL_PLUGIN') )
	exit; 
// проверка пройдена успешно. Начиная от сюда удаляем опции и все остальное.
wp_delete_post(get_option('page-404tboc'),false);
delete_option('startText404tboc');
delete_option( 'text-button-main404tboc');
delete_option( 'text-button-continue404tboc');
delete_option( 'text-button-restart404tboc');
delete_option('page-404tboc');
delete_option('skin-404tboc');
delete_option('is-page-404tboc');
delete_option('is-text-button-restart404tboc');
delete_option('is-text-support404tboc');

?>