<?php
add_action( 'admin_init', 'ftm_settings_callback' );
function ftm_settings_callback() {
	// Добавляем блок опций на базовую страницу "Чтение"
	add_settings_section(
		'ftm_settings_callback_seciton', // секция
		'Callback javascript функции',
		'ftm_settings_callback_section_pre',
		'ftm_settings_callback' // страница
	);
	add_settings_field(
		'ftm_callback_required',
		'Ошибка обязательного поля',
		'ftm_settings_callback_required',
		'ftm_settings_callback','ftm_settings_callback_seciton'
	);
	add_settings_field(
		'ftm_callback_type',
		'Ошибка заполнения поля',
		'ftm_settings_callback_type',
		'ftm_settings_callback','ftm_settings_callback_seciton'
	);
	add_settings_field(
		'ftm_callback_failed',
		'Ошибка отправки письма',
		'ftm_settings_callback_failed',
		'ftm_settings_callback','ftm_settings_callback_seciton'
	);
	add_settings_field(
		'ftm_callback_success',
		'Успешно',
		'ftm_settings_callback_success',
		'ftm_settings_callback','ftm_settings_callback_seciton'
	);

	register_setting( 'ftm_settings_callback', 'ftm_validate_required' );
	register_setting( 'ftm_settings_callback', 'ftm_validate_type' );
	register_setting( 'ftm_settings_callback', 'ftm_mail_failed' );
	register_setting( 'ftm_settings_callback', 'ftm_mail_success' );
}

function ftm_settings_callback_section_pre() {
	echo '
	<p>Указывается код который будет заключен в теге <code>&ltscript&gt...&lt/script&gt</code>, и вызываться функцией.<br>Например <code>alert("Ошибка!")</code></p>
	<p>Доступные паременные:</p><ul>
	<li><code>form_id</code> - ID формы</li>
	<li><code>form_title</code> - Заголовок формы</li>
	<li><code>field_title</code> - Название поля</li>
	<li><code>field_name</code> - Имя поля</li>
	</ul>
	Текущая форма <code>$("[ftm_form="+form_id+"]")</code>
	<p>В начале запроса на форму создается событие <code>ftm_submit</code></p>
	<p>После ответа сервера на форму создается событие <code>ftm_respond</code></p>';
}

function ftm_settings_callback_required(){
	echo '<textarea id="ftm_callback_required" name="ftm_validate_required" rows="4" cols="60">' . get_option('ftm_validate_required') . '</textarea><br>На текущую форму создается событие <code>ftm_validate_required</code>';
}
function ftm_settings_callback_type(){
	echo '<textarea id="ftm_callback_type" name="ftm_validate_type" rows="4" cols="60">' . get_option('ftm_validate_type') . '</textarea><br>На текущую форму создается событие <code>ftm_validate_type</code>';
}
function ftm_settings_callback_failed(){
	echo '<textarea id="ftm_callback_failed" name="ftm_mail_failed" rows="4" cols="60">' . get_option('ftm_mail_failed') . '</textarea><br>На текущую форму создается событие <code>ftm_mail_failed</code>';
}
function ftm_settings_callback_success(){
	echo '<textarea id="ftm_callback_success" name="ftm_mail_success" rows="4" cols="60">' . get_option('ftm_mail_success') . '</textarea><br>На текущую форму создается событие <code>ftm_mail_success</code>';
}