<?php
add_action( 'admin_menu', 'bodhi_atm_add_admin_menu' );
add_action( 'admin_init', 'bodhi_atm_settings_init' );


function bodhi_atm_add_admin_menu(  ) {

	add_options_page( 'Admin Toolbar Menus', 'Admin Toolbar Menus', 'manage_options', 'admin_toolbar_menus', 'admin_toolbar_menus_options_page' );

}


function bodhi_atm_settings_init(  ) {

	register_setting( 'pluginPage', 'bodhi_atm_settings' );

	add_settings_section(
		'bodhi_atm_pluginPage_section',
		__( 'Your section description', 'admin-toolbar-menus' ),
		'bodhi_atm_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'bodhi_atm_checkbox_field_0',
		__( 'Settings field description', 'admin-toolbar-menus' ),
		'bodhi_atm_checkbox_field_0_render',
		'pluginPage',
		'bodhi_atm_pluginPage_section'
	);

	add_settings_field(
		'bodhi_atm_checkbox_field_1',
		__( 'Settings field description', 'admin-toolbar-menus' ),
		'bodhi_atm_checkbox_field_1_render',
		'pluginPage',
		'bodhi_atm_pluginPage_section'
	);

	add_settings_field(
		'bodhi_atm_checkbox_field_2',
		__( 'Settings field description', 'admin-toolbar-menus' ),
		'bodhi_atm_checkbox_field_2_render',
		'pluginPage',
		'bodhi_atm_pluginPage_section'
	);

	add_settings_field(
		'bodhi_atm_checkbox_field_3',
		__( 'Settings field description', 'admin-toolbar-menus' ),
		'bodhi_atm_checkbox_field_3_render',
		'pluginPage',
		'bodhi_atm_pluginPage_section'
	);

	add_settings_field(
		'bodhi_atm_text_field_4',
		__( 'Settings field description', 'admin-toolbar-menus' ),
		'bodhi_atm_text_field_4_render',
		'pluginPage',
		'bodhi_atm_pluginPage_section'
	);


}


function bodhi_atm_checkbox_field_0_render(  ) {

	$options = get_option( 'bodhi_atm_settings' );
	?>
	<input type='checkbox' name='bodhi_atm_settings[bodhi_atm_checkbox_field_0]' <?php checked( $options['bodhi_atm_checkbox_field_0'], 1 ); ?> value='1'>
	<?php

}


function bodhi_atm_checkbox_field_1_render(  ) {

	$options = get_option( 'bodhi_atm_settings' );
	?>
	<input type='checkbox' name='bodhi_atm_settings[bodhi_atm_checkbox_field_1]' <?php checked( $options['bodhi_atm_checkbox_field_1'], 1 ); ?> value='1'>
	<?php

}


function bodhi_atm_checkbox_field_2_render(  ) {

	$options = get_option( 'bodhi_atm_settings' );
	?>
	<input type='checkbox' name='bodhi_atm_settings[bodhi_atm_checkbox_field_2]' <?php checked( $options['bodhi_atm_checkbox_field_2'], 1 ); ?> value='1'>
	<?php

}


function bodhi_atm_checkbox_field_3_render(  ) {

	$options = get_option( 'bodhi_atm_settings' );
	?>
	<input type='checkbox' name='bodhi_atm_settings[bodhi_atm_checkbox_field_3]' <?php checked( $options['bodhi_atm_checkbox_field_3'], 1 ); ?> value='1'>
	<?php

}


function bodhi_atm_text_field_4_render(  ) {

	$options = get_option( 'bodhi_atm_settings' );
	?>
	<input type='text' name='bodhi_atm_settings[bodhi_atm_text_field_4]' value='<?php echo $options['bodhi_atm_text_field_4']; ?>'>
	<?php

}


function bodhi_atm_settings_section_callback(  ) {

	echo __( 'This section description', 'admin-toolbar-menus' );

}


function bodhi_atm_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Admin Toolbar Menus</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>