<?php
function nb_init_admin_menu () {
	if(nb_check_access()){
		add_menu_page(
			'Attention bar',
			'Attention bar',
			'edit_posts',
			'pd_nb_entries',
			'nb_sub_entries',
			plugins_url('attention-bar/css/images/admin/wp_admin_menu_icon.png')
		);
		$entriespage = add_submenu_page(
			'pd_nb_entries',
			__('Notification entries','attention-bar'),
			__('Notification entries','attention-bar'),
			'edit_posts',
			'pd_nb_entries',
			'nb_sub_entries'
			);
			add_action( 'admin_print_styles-' . $entriespage, 'nb_admin_styles' );
	}
	$notificationtypespage = add_submenu_page(
		'pd_nb_entries',
		__('Notification types','attention-bar'),
		__('Notification types','attention-bar'),
		'manage_options',
		'pd_sub_nottypes',
		'nb_sub_notificationtypes'
	);
	add_action( 'admin_print_styles-' . $notificationtypespage, 'nb_admin_styles' );
	$settingspage = add_submenu_page(
		'pd_nb_entries',
		__('Settings','attention-bar'),
		__('Settings','attention-bar'),
		'manage_options',
		'pd_sub_settings',
		'nb_sub_settings'
	);
}
?>