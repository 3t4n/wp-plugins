<?php
defined( 'ABSPATH' ) or exit;

add_action('admin_menu', 'mpwpFormsMenu');
function mpwpFormsMenu(){
	add_menu_page(
		__('@MediaPost - Formulário de cadastro', 'mpwp_forms' ),
		'@MediaPost',
		'manage_options',
		'mpwp_settings',
		'mpwpFormsSettingsPage',
		MPWP_URL . '/assets/images/icon.png'
	);
	add_submenu_page(
		'mpwp_settings',
		__('@MediaPost - Configurações', 'mpwp_forms' ),
		__('Configurações', 'mpwp_forms' ),
		'manage_options',
		'mpwp_settings',
		'mpwpFormsSettingsPage'
	);
	add_submenu_page(
		'mpwp_settings',
		__('@MediaPost - Formulários', 'mpwp_forms' ),
		__('Formulários', 'mpwp_forms' ), 
		'manage_options',
		'mpwp_forms', 
		'mpwpFormsFormsPage'
	);
	add_submenu_page(
		'mpwp_settings',
		__('@MediaPost - Novo formulário', 'mpwp_forms' ),
		__('Novo formulário', 'mpwp_forms' ),
		'manage_options',
		'mpwp_form', 
		'mpwpFormsFormPage'
	);
}
?>