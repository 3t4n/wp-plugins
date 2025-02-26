<?php
add_action( 'admin_menu', 'lmt_xmas_calendar_add_admin_menu' );
add_action( 'admin_init', 'lmt_xmas_calendar_settings_init' );


function lmt_xmas_calendar_add_admin_menu(  ) { 

	add_submenu_page( 'edit.php?post_type=xmas-calendar', 'Calendar Settings', 'Calendar Settings', 'manage_options', 'wordpress_fancy_xmas-calendar', 'lmt_xmas_calendar_options_page' );

}


function lmt_xmas_calendar_settings_init(  ) { 

	register_setting( 'pluginPage', 'lmt_xmas_calendar_settings' );

	add_settings_section(
		'lmt_xmas_calendar_pluginPage_section', 
		__( 'The calendar starts from current day 01 - 24', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_0', 
		__( 'Set custom current day for testing (example: 2 for current month day is two)', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_0_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_1', 
		__( 'Primarycolor (#7a0018)', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_1_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_2', 
		__( 'String for past doors', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_2_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_3', 
		__( 'Headline', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_3_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_4', 
		__( 'Hashtag in footer', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_4_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_5', 
		__( 'Hashtag URL', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_5_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);


	add_settings_field( 
		'lmt_xmas_calendar_text_field_6', 
		__( 'Thank you page headline', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_6_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_7', 
		__( 'Thank you page content', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_7_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_8', 
		__( 'Disable footer image', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_8_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_9', 
		__( 'Custom footer image desktop URL', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_9_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

	add_settings_field( 
		'lmt_xmas_calendar_text_field_10', 
		__( 'Custom footer image mobile URL', 'lmt-xmas-calendar' ), 
		'lmt_xmas_calendar_text_field_10_render', 
		'pluginPage', 
		'lmt_xmas_calendar_pluginPage_section' 
	);

}


function lmt_xmas_calendar_text_field_0_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='number' min="1" max="24" name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_0]' value='<?php echo intval($options['lmt_xmas_calendar_text_field_0']); ?>'>
	<?php

}


function lmt_xmas_calendar_text_field_1_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='text' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_1]' value='<?php echo esc_html($options['lmt_xmas_calendar_text_field_1']); ?>'>
	<?php

}


function lmt_xmas_calendar_text_field_2_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='text' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_2]' value='<?php echo esc_html($options['lmt_xmas_calendar_text_field_2']); ?>'>
	<?php

}


function lmt_xmas_calendar_text_field_3_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='text' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_3]' value='<?php echo esc_html($options['lmt_xmas_calendar_text_field_3']); ?>'>
	<?php

}


function lmt_xmas_calendar_text_field_4_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='text' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_4]' value='<?php echo esc_html($options['lmt_xmas_calendar_text_field_4']); ?>'>
	<?php

}

function lmt_xmas_calendar_text_field_8_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	
	if(esc_html($options['lmt_xmas_calendar_text_field_8']) == 'on') : ?>
	<input type='checkbox' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_8]' checked>
	<?php else : ?>
	<input type='checkbox' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_8]'>
	<?php endif;
}

function lmt_xmas_calendar_text_field_9_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='text' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_9]' value='<?php echo esc_url($options['lmt_xmas_calendar_text_field_9']); ?>'>
	<?php

}

function lmt_xmas_calendar_text_field_10_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='text' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_10]' value='<?php echo esc_url($options['lmt_xmas_calendar_text_field_10']); ?>'>
	<?php

}


function lmt_xmas_calendar_text_field_5_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='text' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_5]' value='<?php echo esc_url($options['lmt_xmas_calendar_text_field_5']); ?>'>
	<br>
	<hr>
	<h1>Settings for your "thank you page" (optional)</h1>
	<b>Your thank you page URL is:</b> <strong style="color:red"><a style="color:red" target="_blank" href="<?php echo get_site_url();?>/xmas-calendar/?lmt-xmas-calendar-thankyou=true"><?php echo get_site_url();?>/xmas-calendar/?lmt-xmas-calendar-thankyou=true</a></strong>
	<?php

}

function lmt_xmas_calendar_text_field_6_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<input type='text' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_6]' value='<?php echo esc_html($options['lmt_xmas_calendar_text_field_6']); ?>'>
	<?php

}

function lmt_xmas_calendar_text_field_7_render(  ) { 

	$options = get_option( 'lmt_xmas_calendar_settings' );
	?>
	<textarea cols='40' rows='5' name='lmt_xmas_calendar_settings[lmt_xmas_calendar_text_field_7]'> 
		<?php echo esc_html($options['lmt_xmas_calendar_text_field_7']); ?>
 	</textarea>	<?php

}


function lmt_xmas_calendar_settings_section_callback(  ) { 

	echo __( 'This is a simple XMAS-Calendar for WordPress.', 'lmt-xmas-calendar' );
	echo '<div style="background-color: #ffb7b7; margin: 30px 0 0; width: 600px; border-radius: 3px; box-shadow: 0px 0px 5px rgb(0 0 0 / 10%); padding: 10px; text-align: center; display: flex; align-items: center; justify-content: center; border: 2px solid #fff;"><br><br><b>LINK TO YOUR CALENDAR: </b> <a style="color:red; font-weight:bold;" target="_blank" href="'.get_site_url().'/xmas-calendar"> '.get_site_url().'/xmas-calendar</a></div>';

}


function lmt_xmas_calendar_options_page(  ) { 

		?>
		<form action='options.php' method='post'>
            <br>
            <a href="https://lemontec.at">
            <img src="<?php echo LMT_XMAS_CALENDAR_PATH; ?>assets/img/lemontec-logo.svg" style="width:400px; height:auto">
            </a>
            <br>
			<h2>
            <?php echo __('WordPress fancy XMAS-Calendar' , 'lmt-xmas-calendar'); ?>
            </h2>
            

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}
