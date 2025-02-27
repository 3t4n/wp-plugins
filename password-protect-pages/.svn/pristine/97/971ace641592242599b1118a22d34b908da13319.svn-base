<?php
/**
 *
 * @link       https://github.com/Jess81/password-protected-pages
 * @since      1.0.0
 *
 * @package    Password_Protect_Pages
 * @subpackage Password_Protect_Pages/admin
 */

add_action( 'admin_menu', 'ppp_add_admin_menu' );
add_action( 'admin_init', 'ppp_settings_init' );


function ppp_add_admin_menu(  ) { 

	add_submenu_page( 'options-general.php', 'Password Protect Pages', 'Password Protect Pages', 'manage_options', 'password_protect_pages', 'ppp_options_page' );

}


function ppp_settings_init(  ) { 

	register_setting( 'pluginPage', 'ppp_settings' );

	add_settings_section(
		'ppp_pluginPage_section', 
		__( 'Password Protect Pages', 'wordpress' ), 
		'ppp_settings_section_callback', 
		'pluginPage'
	);


	add_settings_field( 
		'ppp_select_field_4', 
		__( 'Settings:', 'wordpress' ), 
		'ppp_select_field_4_render', 
		'pluginPage', 
		'ppp_pluginPage_section' 
	);


	add_settings_field( 
		'ppp_text_field_0', 
		__( 'Page IDs:', 'wordpress' ), 
		'ppp_text_field_0_render', 
		'pluginPage', 
		'ppp_pluginPage_section' 
	);


	add_settings_field( 
		'ppp_text_field_8', 
		__( 'Landing Page URL', 'wordpress' ), 
		'ppp_text_field_8_render', 
		'pluginPage', 
		'ppp_pluginPage_section' 
	);



}





function ppp_select_field_4_render(  ) { 

	$options = get_option( 'ppp_settings' );
	?>

	<input type='radio' name='ppp_settings[ppp_select_field_4]' value='2' <?php if($options['ppp_select_field_4'] == 2) { ?>checked<?php } ?> /><label>Password Protect All</label><br />
	<input type='radio' name='ppp_settings[ppp_select_field_4]' value='1' <?php if($options['ppp_select_field_4'] == 1) { ?>checked<?php } ?> /><label>Password Protect Some</label>

	
<?php

}


function ppp_text_field_0_render(  ) { 

	$options = get_option( 'ppp_settings' );

	?>
	<input type='text' name='ppp_settings[ppp_text_field_0]' value='<?php echo $options['ppp_text_field_0']; ?>' style='margin-bottom:10px;'><br />
	<?php
	
	if($options['ppp_select_field_4'] == 2) { 
		echo __( 'All pages are now protected by default.  Please enter the page IDs that you want to be public. Example: 15, 47, 390', 'wordpress' );
	} elseif($options['ppp_select_field_4'] == 1) { 
		echo __( 'All pages are now public by default. Please enter the page IDs that you want to be password protected. Example: 15, 47, 390', 'wordpress' );
	} else { 
		echo __( 'Please select whether all pages should be password protected by default, or if only some pages will be protected.', 'wordpress' );
	};
	

}


function ppp_text_field_8_render(  ) { 

	$options = get_option( 'ppp_settings' );

	?>
	<input type='text' name='ppp_settings[ppp_text_field_8]' value='<?php echo $options['ppp_text_field_8']; ?>' style='margin-bottom:10px;'><br />
	<?php
	
	echo __( 'Landing page for non-logged in users.<br />Defaults to wp-login.php if left blank.', 'wordpress' );

}



function ppp_settings_section_callback(  ) { 

}


function ppp_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<!--h2>Password Protect Pages</h2-->

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}



?>