<?php
/*
Plugin Name: Form to mail
Description: Отправка формы на почту
Version: 2.0.0
Author: PressF1
*/

require_once 'posttype.php'; // тип поста формы
require_once 'form/ftmSubmit.php'; //Класс отправки письма
require_once 'mail.php';

if(is_admin()){
	require_once 'admin/settingsbox.php'; // box настроек формы
	require_once 'admin/contentbox.php'; // box полей формы
	require_once 'admin/templatemailbox.php'; // box шаблона письма
	require_once 'admin/save_form.php'; // сохранение формы
	
	require_once 'admin/settings-general.php'; // форма главных настроек
	require_once 'admin/settings-callback.php'; // форма callback
	require_once 'admin/settings.php'; // настройки формы
}
if(!is_admin() AND $GLOBALS['pagenow'] != 'wp-login.php'){
	require_once 'form/js.php'; // JavaScript файл
}
require_once 'form/submitform.php'; // Обработчик формы AJAX
