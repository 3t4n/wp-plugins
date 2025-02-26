<?php
/**
 * Plugin Name: Apache Password Protect
 * Description:  Protect wp-admin folder and the wp-login.php file of HTTP password
 * Author: Vitaliy Kaplya
 * Version: 1.1
 * Tags: password, secure, wp-admin, hacked, virus, apache, server, hacker, cracker, protect, spammer, security, admin, username, access, authorization, authentication, spam, hack, login, htaccess, rewrite, redirect, mod_security, htpasswd
 * WordPress URI: http://wordpress.org/plugins/apache-password-protect/
 * Author URI: http://www.dasayt.com/
 * Plugin URI: http://wordpress.org/plugins/apache-password-protect/
**/

/* Локализация */
load_plugin_textdomain( 'app-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/* Активация */
function install(){
// Добавим опции
add_option('app_wpadminuser', 'wpadmin');
add_option('app_wpadminpasswd', 'wpadminpasswd');
add_option('app_wpadminpasswdfile', $_SERVER[DOCUMENT_ROOT].'/wp-admin/.htpasswd');
add_option('app_wploginuser', 'wplogin');
add_option('app_wploginpasswd', 'wploginpasswd');
add_option('app_wploginpasswdfile', $_SERVER[DOCUMENT_ROOT].'/.htpasswd');
add_option('app_wpadmin_enable', 'false');
add_option('app_wpadmin_writed', 'false');
add_option('app_wpadmin_erased', 'true');
add_option('app_wplogin_enable', 'false');
add_option('app_wplogin_writed', 'false');
add_option('app_wplogin_erased', 'true');
// Запишем .htaccess
$file = $_SERVER['DOCUMENT_ROOT']."/.htaccess";
$fopen = fopen($file, 'r');
$data = fread($fopen, filesize($file));
fclose($fopen);
$data = "\r\n# Apache Password Protect start\r\n\r\n# Apache Password Protect stop\r\n\r\n".$data;
$fopen = fopen($file, 'w+');
$fwrite = fwrite($fopen, $data);
fclose($fopen);
// Запишем .htpasswd
$file = $_SERVER['DOCUMENT_ROOT']."/.htpasswd";
$fopen = fopen($file, 'w+');
fclose($fopen);
// Запишем wp-admin/.htaccess
$file = $_SERVER['DOCUMENT_ROOT']."/wp-admin/.htaccess";
$fopen = fopen($file, 'w+');
fclose($fopen);
$data = "";
$data = "\r\n# Apache Password Protect start\r\n\r\n# Apache Password Protect stop\r\n\r\n".$data;
$fopen = fopen($file, 'w+');
$fwrite = fwrite($fopen, $data);
fclose($fopen);
// Запишем wp-admin/.htpasswd
$file = $_SERVER['DOCUMENT_ROOT']."/wp-admin/.htpasswd";
$fopen = fopen($file, 'w+');
fclose($fopen);
}
register_activation_hook( __FILE__, 'install');

/* Деактивация */
function deactivate(){
// Удаляем опции
delete_option('app_wpadminuser');
delete_option('app_wpadminpasswd');
delete_option('app_wpadminpasswdfile');
delete_option('app_wploginuser');
delete_option('app_wploginpasswd');
delete_option('app_wploginpasswdfile');
delete_option('app_wpadmin_enable');
delete_option('app_wpadmin_writed');
delete_option('app_wpadmin_erased');
delete_option('app_wplogin_enable');
delete_option('app_wplogin_writed');
delete_option('app_wplogin_erased');
// Чистим .htaccess
$file = $_SERVER['DOCUMENT_ROOT']."/.htaccess";
$fopen = fopen($file, 'r');
$data = fread($fopen, filesize($file));
fclose($fopen);
$data = preg_replace('/(# Apache Password Protect start.*# Apache Password Protect stop)/s', '', $data);
$data = str_replace("# Apache Password Protect start","",$data);
$data = str_replace("# Apache Password Protect stop","",$data);
$data = str_replace("\r\n\r\n\r\n","",$data);
$fopen = fopen($file, 'w+');
$fwrite = fwrite($fopen, $data);
fclose($fopen);
// Удаляем .htpasswd
$file = $_SERVER['DOCUMENT_ROOT']."/.htpasswd";
unlink($file);
// Удаляем wp-admin/.htaccess
$file = $_SERVER['DOCUMENT_ROOT']."/wp-admin/.htaccess";
unlink($file);
// Удаляем wp-admin/.htpasswd
$file = $_SERVER['DOCUMENT_ROOT']."/wp-admin/.htpasswd";
unlink($file);
}
register_deactivation_hook( __FILE__, 'deactivate');

/* Свои стили */
function load_app_plugin_stylesheet() {
        wp_register_style( 'app_plugin_stylesheet', plugins_url( '/stylesheets/app-style.css', __FILE__ ), false, '1.0.0' );
        wp_enqueue_style( 'app_plugin_stylesheet' );
}
add_action( 'admin_enqueue_scripts', 'load_app_plugin_stylesheet' );

/* Свои скрипты */
function load_pGenerator_script() {
        wp_register_script( 'pGenerator_script', plugins_url( '/javascript/pGenerator.jquery.js', __FILE__ ), false, '1.0.0' );
	   wp_register_script( 'app_general_script', plugins_url( '/javascript/general.js', __FILE__ ), false, '1.0.0' );
        wp_enqueue_script( 'pGenerator_script' );
	   wp_enqueue_script( 'app_general_script' );
}
add_action( 'admin_enqueue_scripts', 'load_pGenerator_script' );

/* Страницы в админке */
function app_options() { include "app-options-page.php"; }
function app_menu(){
	add_menu_page('Apache protect', 'Apache protect', 8, 'app_options', 'app_options', plugins_url( 'images/icon.png' , __FILE__ ), 889);
	add_submenu_page( 'app_options', 'Настройки', 'Настройки', 8, 'app_options', 'app_options' );
}
add_action('admin_menu', 'app_menu');

function app_wpadmin_writed() {
	/* Запишем .htaccess */
	$file = $_SERVER['DOCUMENT_ROOT']."/wp-admin/.htaccess";
	$fopen = fopen($file, 'r');
	$data = fread($fopen, filesize($file));
	fclose($fopen);
	$data = preg_replace('/(# Apache Password Protect start.*# Apache Password Protect stop)/s', '', $data);
	$data = str_replace("# Apache Password Protect start","",$data);
	$data = str_replace("# Apache Password Protect stop","",$data);
	$data = str_replace("\r\n\r\n\r\n","",$data);		
	$data = "\r\n# Apache Password Protect start\r\nAuthUserFile \"".get_option('app_wpadminpasswdfile')."\"\r\nAuthName \"".get_option('app_wpadminuser')."\"\r\nAuthType Basic\r\n\r\n<Limit GET POST>\r\nrequire valid-user\r\n</Limit>\r\n# Apache Password Protect stop\r\n\r\n".$data;
	$fopen = fopen($file, 'w+');
	$fwrite = fwrite($fopen, $data);
	fclose($fopen);
	// Запишем .htpasswd
	$file = $_SERVER['DOCUMENT_ROOT']."/wp-admin/.htpasswd";
	$data = get_option('app_wpadminuser').":".crypt(get_option('app_wpadminpasswd'), substr(get_option('app_wpadminpasswd'), 0, 2));
	$fopen = fopen($file, 'w+');
	$fwrite = fwrite($fopen, $data);
	fclose($fopen);
}

function app_wpadmin_erase() {
	// Чистим .htaccess
	$file = $_SERVER['DOCUMENT_ROOT']."/wp-admin/.htaccess";
	$fopen = fopen($file, 'r');
	$data = fread($fopen, filesize($file));
	fclose($fopen);
	$data = preg_replace('/(# Apache Password Protect start.*# Apache Password Protect stop)/s', '', $data);
	$data = str_replace("# Apache Password Protect start","",$data);
	$data = str_replace("# Apache Password Protect stop","",$data);
	$data = str_replace("\r\n\r\n\r\n","",$data);
	$data = "\r\n# Apache Password Protect start\r\n\r\n# Apache Password Protect stop\r\n\r\n".$data;
	$fopen = fopen($file, 'w+');
	$fwrite = fwrite($fopen, $data);
	fclose($fopen);
	// Чистим .htpasswd
	$file = $_SERVER['DOCUMENT_ROOT']."/wp-admin/.htpasswd";
	$fopen = fopen($file, 'w+');
	$fwrite = fwrite($fopen, "");
	fclose($fopen);
}

function app_wplogin_write() {
	/* Запишем .htaccess */
	$file = $_SERVER['DOCUMENT_ROOT']."/.htaccess";
	$fopen = fopen($file, 'r');
	$data = fread($fopen, filesize($file));
	fclose($fopen);
	$data = preg_replace('/(# Apache Password Protect start.*# Apache Password Protect stop)/s', '', $data);
	$data = str_replace("# Apache Password Protect start","",$data);
	$data = str_replace("# Apache Password Protect stop","",$data);
	$data = str_replace("\r\n\r\n\r\n","",$data);		
	$data = "\r\n# Apache Password Protect start\r\nAuthUserFile \"".get_option('app_wploginpasswdfile')."\"\r\nAuthName \"".get_option('app_wploginuser')."\"\r\nAuthType Basic\r\n\r\n<Files wp-login.php>\r\nrequire valid-user\r\n</Files>\r\n# Apache Password Protect stop\r\n\r\n".$data;
	$fopen = fopen($file, 'w+');
	$fwrite = fwrite($fopen, $data);
	fclose($fopen);
	// Запишем .htpasswd
	$file = $_SERVER['DOCUMENT_ROOT']."/.htpasswd";
	$data = get_option('app_wploginuser').":".crypt(get_option('app_wploginpasswd'), substr(get_option('app_wploginpasswd'), 0, 2));
	$fopen = fopen($file, 'w+');
	$fwrite = fwrite($fopen, $data);
	fclose($fopen);
}

function app_wplogin_erase() {
	// Чистим .htaccess
	$file = $_SERVER['DOCUMENT_ROOT']."/.htaccess";
	$fopen = fopen($file, 'r');
	$data = fread($fopen, filesize($file));
	fclose($fopen);
	$data = preg_replace('/(# Apache Password Protect start.*# Apache Password Protect stop)/s', '', $data);
	$data = str_replace("# Apache Password Protect start","",$data);
	$data = str_replace("# Apache Password Protect stop","",$data);
	$data = str_replace("\r\n\r\n\r\n","",$data);
	$data = "\r\n# Apache Password Protect start\r\n\r\n# Apache Password Protect stop\r\n\r\n".$data;
	$fopen = fopen($file, 'w+');
	$fwrite = fwrite($fopen, $data);
	fclose($fopen);
	// Чистим .htpasswd
	$file = $_SERVER['DOCUMENT_ROOT']."/.htpasswd";
	$fopen = fopen($file, 'w+');
	$fwrite = fwrite($fopen, "");
	fclose($fopen);
}

/* Закрываем папку wp-admin */
if(get_option('app_wpadmin_enable') == "true") {
	/* Писать-ли? */
	if(get_option('app_wpadmin_writed') == "false") {
		/* Пишем на папку wp-admin */
		app_wpadmin_writed();
		update_option('app_wpadmin_writed', 'true');
		update_option('app_wpadmin_erased', 'false');
		
	}
} else {
	/* Списывать-ли? */
	if(get_option('app_wpadmin_erased') == "false") {
		/* Списываем на папку wp-admin */
		app_wpadmin_erase();
		update_option('app_wpadmin_erased', 'true');
		update_option('app_wpadmin_writed', 'false');
		
	}
}

/* Закрываем файл wp-login.php */
if(get_option('app_wplogin_enable') == "true") {
	/* Писать-ли? */
	if(get_option('app_wplogin_writed') == "false") {
		/* Пишем на файл wp-login.php */
		app_wplogin_write();
		update_option('app_wplogin_writed', 'true');
		update_option('app_wplogin_erased', 'false');
		
	}
} else {
	/* Списывать-ли? */
	if(get_option('app_wplogin_erased') == "false") {
		/* Списываем файл wp-login.php */
		app_wplogin_erase();		
		update_option('app_wplogin_erased', 'true');
		update_option('app_wplogin_writed', 'false');
		
	}	
}

?>