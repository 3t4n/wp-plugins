<?php add_action( 'init', 'allcontactorgv_inc_setup_post_type' );
function allcontactorgv_inc_setup_post_type(){
	// Регистрируем тип записи "book"
	register_post_type('book', array(
		'public' => 'true'
	) );
}

register_activation_hook( __FILE__, 'allcontactorgv_inc_install' ); 
function allcontactorgv_inc_install(){
	// Запускаем функцию регистрации типа записи
	allcontactorgv_inc_setup_post_types();

	// Сбрасываем настройки ЧПУ, чтобы они пересоздались с новыми данными
	flush_rewrite_rules();
}