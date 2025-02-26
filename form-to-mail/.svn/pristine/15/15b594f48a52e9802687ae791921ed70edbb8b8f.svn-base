<?php

add_action('init', 'ftm_register_form');
function ftm_register_form(){
	$args = array(
		'label'              => null,
		'labels'             => array(
			'name'          => 'Форма', // основное название для типа записи
			'singular_name' => 'Форма', // название для одной записи этого типа
			'add_new'       => 'Новая форма', // для добавления новой записи
			'add_new_item'  => 'Новая форма', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'     => 'Изменить сайт', // для редактирования типа записи
			'new_item'      => 'Форма', // текст новой записи
			'view_item'     => 'Посмотреть форму', // для просмотра записи этого типа.
			'not_found'     => 'Формы не найдены', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдены', // если не было найдено в корзине
			'menu_name'          => 'Формы', // название меню
		),
		'description'         => 'Формы',
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 21,
		'menu_icon'           => 'dashicons-email-alt', 
		'capability_type'     => 'page',
		'hierarchical'        => false,
		'supports'            => array('title'),
		'has_archive'         => false,
		'query_var'           => true,
		'show_in_nav_menus'   => true,
	);
	register_post_type('ftm_form', $args );
}

add_action('admin_head-post.php', 'ftm_submitdiv');
add_action('admin_head-post-new.php', 'ftm_submitdiv');
function ftm_submitdiv() {
	global $post;
	if($post->post_type == 'ftm_form'){
	echo '<style type="text/css">
	#misc-publishing-actions,
	#minor-publishing-actions{
	display:none;
	}
	</style>';
	}
}

add_action( 'admin_menu', 'ftm_meta_box' );
function ftm_meta_box() {
	add_meta_box('ftm_settings', 'Параметры формы', 'ftm_settings_box', 'ftm_form', 'side', 'low');
	add_meta_box('ftm_content', 'Поля формы', 'ftm_content_box', 'ftm_form', 'normal', 'high');
	add_meta_box('ftm_excerpt', 'Шаблон письма', 'ftm_templatemail_box', 'ftm_form', 'normal', 'high');
}
