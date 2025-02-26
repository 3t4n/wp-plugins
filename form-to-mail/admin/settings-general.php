<?php
add_action( 'admin_init', 'ftm_settings_general' );
function ftm_settings_general() {
	// Добавляем блок опций на базовую страницу "Чтение"
	add_settings_section(
		'ftm_settings_general_seciton', // секция
		'Основные настройки',
		'ftm_settings_general_section_pre',
		'ftm_settings_general' // страница
	);
	add_settings_field(
		'ftm_general_mail',
		'E-mail получателя и отправлителя по-умолчанию',
		'ftm_settings_general_mail',
		'ftm_settings_general','ftm_settings_general_seciton'
	);
	add_settings_field(
		'ftm_general_name',
		'Имя отправителя',
		'ftm_settings_general_name',
		'ftm_settings_general','ftm_settings_general_seciton'
	);
	add_settings_field(
		'ftm_general_template_layout_if',
		'Использовать обертку письма',
		'ftm_settings_general_template_layout_if',
		'ftm_settings_general','ftm_settings_general_seciton'
	);
	add_settings_field(
		'ftm_general_template_layout',
		'Путь к файлу обертки',
		'ftm_settings_general_template_layout',
		'ftm_settings_general','ftm_settings_general_seciton'
	);
	add_settings_field(
		'ftm_general_smtp_if',
		'Оптравка письма через авторизацию',
		'ftm_settings_general_smtp_if',
		'ftm_settings_general','ftm_settings_general_seciton'
	);
	add_settings_field(
		'ftm_general_smtp_username',
		'Логин',
		'ftm_settings_general_smtp','ftm_settings_general','ftm_settings_general_seciton',
		'ftm_smtp_username'
	);
	add_settings_field(
		'ftm_general_smtp_password',
		'Пароль',
		'ftm_settings_general_smtp','ftm_settings_general','ftm_settings_general_seciton',
		'ftm_smtp_password'
	);
	add_settings_field(
		'ftm_general_smtp_host',
		'Хост',
		'ftm_settings_general_smtp','ftm_settings_general','ftm_settings_general_seciton',
		'ftm_smtp_host'
	);
	add_settings_field(
		'ftm_general_smtp_from',
		'E-mail отправителя',
		'ftm_settings_general_smtp','ftm_settings_general','ftm_settings_general_seciton',
		'ftm_smtp_from'
	);
	add_settings_field(
		'ftm_general_smtp_port',
		'Порт SMTP',
		'ftm_settings_general_smtp','ftm_settings_general','ftm_settings_general_seciton',
		'ftm_smtp_port'
	);
	add_settings_field(
		'ftm_general_wp_all',
		'Использовать текущие настройки для всех писем с сайта',
		'ftm_settings_general_wp_all',
		'ftm_settings_general','ftm_settings_general_seciton'
	);
	register_setting( 'ftm_settings_general', 'ftm_mail' );
	register_setting( 'ftm_settings_general', 'ftm_name' );
	register_setting( 'ftm_settings_general', 'ftm_template_layout_if' );
	register_setting( 'ftm_settings_general', 'ftm_template_layout' );
	
	register_setting( 'ftm_settings_general', 'ftm_smtp_if' );
	register_setting( 'ftm_settings_general', 'ftm_smtp_username' );
	register_setting( 'ftm_settings_general', 'ftm_smtp_password' );
	register_setting( 'ftm_settings_general', 'ftm_smtp_host' );
	register_setting( 'ftm_settings_general', 'ftm_smtp_from' );
	register_setting( 'ftm_settings_general', 'ftm_smtp_port' );
	
	register_setting( 'ftm_settings_general', 'ftm_wp_all' );
}

function ftm_settings_general_section_pre() {
	echo '';
}

function ftm_settings_general_mail(){
	$value = get_option('ftm_mail')? get_option('ftm_mail'): get_option('admin_email');
	echo '<input id="ftm_general_mail" type="email" name="ftm_mail" value="' . esc_attr( $value ). '">';
}
function ftm_settings_general_name(){
	echo '<input id="ftm_general_name" type="text" name="ftm_name" value="'.esc_attr( get_option('ftm_name')).'">';
}
function ftm_settings_general_template_layout_if(){
	$checked = get_option('ftm_template_layout_if') == 'true'? 'checked': '';
	echo '<input id="ftm_general_template_layout_if" type="checkbox" name="ftm_template_layout_if" value="true" '.$checked.'><code>[message]</code> будет заменен на шаблон сообщения';
}
function ftm_settings_general_template_layout(){
	echo '<input id="ftm_general_template_layout" type="text" name="ftm_template_layout" value="'.esc_attr( get_option('ftm_template_layout')).'"> указывается путь от корня сайта';
}
function ftm_settings_general_wp_all(){
	$checked = get_option('ftm_wp_all') == 'true'? 'checked': '';
	echo '<input id="ftm_settings_general_wp_all" type="checkbox" name="ftm_wp_all" value="true" '.$checked.'>';
}
function ftm_settings_general_smtp_if(){
	$checked = get_option('ftm_smtp_if') == 'true'? 'checked': '';
	echo '<input id="ftm_general_smtp_if" type="checkbox" name="ftm_smtp_if" value="true" '.$checked.'> стабильно работает на yandex.ru, gmail.ru, mail.ru';
}
function ftm_settings_general_smtp($name){
	echo '<input type="text" name="'.$name.'" value="'.esc_attr( get_option($name)).'">';
}