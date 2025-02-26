<?php 

add_action( 'admin_menu', 'scroller_setting_add_admin_menu' );
add_action( 'admin_init', 'scroller_setting_settings_init' );


function scroller_setting_add_admin_menu(  ) { 

	add_submenu_page( 'edit.php?post_type=news_updates', 'All in One News Scroll', 'Scroller Settings', 'manage_options', 'all_in_one_news_scroll', 'scroller_setting_options_page' );

}


function scroller_setting_settings_init(  ) { 

	register_setting( 'pluginPage', 'scroller_setting_settings' );

	add_settings_section(
		'scroller_setting_pluginPage_section', 
		__( 'You can change scroller according to your need by using following options', 'allinone_scroller' ), 
		'scroller_setting_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'scroller_setting_select_field_0', 
		__( 'Direction of scroller', 'allinone_scroller' ), 
		'scroller_setting_select_field_0_render', 
		'pluginPage', 
		'scroller_setting_pluginPage_section' 
	);

	add_settings_field( 
		'scroller_setting_select_field_1', 
		__( 'Time Interval of scroller', 'allinone_scroller' ), 
		'scroller_setting_select_field_1_render', 
		'pluginPage', 
		'scroller_setting_pluginPage_section' 
	);

	add_settings_field( 
		'scroller_setting_select_field_2', 
		__( 'How many news are visible', 'allinone_scroller' ), 
		'scroller_setting_select_field_2_render', 
		'pluginPage', 
		'scroller_setting_pluginPage_section' 
	);

	add_settings_field( 
		'scroller_setting_select_field_3', 
		__( 'Pause on mouse hover', 'allinone_scroller' ), 
		'scroller_setting_select_field_3_render', 
		'pluginPage', 
		'scroller_setting_pluginPage_section' 
	);


}


function scroller_setting_select_field_0_render(  ) { 

	$options = get_option( 'scroller_setting_settings' );
	?>
	<select name='scroller_setting_settings[scroller_setting_select_field_0]'>
		<option value='1' <?php selected( $options['scroller_setting_select_field_0'], 1 ); ?>>up</option>
		<option value='2' <?php selected( $options['scroller_setting_select_field_0'], 2 ); ?>>down</option>
	</select>

<?php

}


function scroller_setting_select_field_1_render(  ) { 

	$options = get_option( 'scroller_setting_settings' );
	?>
	<select name='scroller_setting_settings[scroller_setting_select_field_1]'>
		<option value='1000' <?php selected( $options['scroller_setting_select_field_1'], 1000 ); ?>>1000</option>
		<option value='2000' <?php selected( $options['scroller_setting_select_field_1'], 2000 ); ?>>2000</option>
		<option value='3000' <?php selected( $options['scroller_setting_select_field_1'], 3000 ); ?>>3000</option>
		<option value='4000' <?php selected( $options['scroller_setting_select_field_1'], 4000 ); ?>>4000</option>
		<option value='5000' <?php selected( $options['scroller_setting_select_field_1'], 5000 ); ?>>5000</option>
		<option value='6000' <?php selected( $options['scroller_setting_select_field_1'], 6000 ); ?>>6000</option>
	</select>

<?php

}


function scroller_setting_select_field_2_render(  ) { 

	$options = get_option( 'scroller_setting_settings' );
	?>
	<select name='scroller_setting_settings[scroller_setting_select_field_2]'>
		<option value='1' <?php selected( $options['scroller_setting_select_field_2'], 1 ); ?>>1</option>
		<option value='2' <?php selected( $options['scroller_setting_select_field_2'], 2 ); ?>>2</option>
		<option value='3' <?php selected( $options['scroller_setting_select_field_2'], 3 ); ?>>3</option>
		<option value='4' <?php selected( $options['scroller_setting_select_field_2'], 4 ); ?>>4</option>
		<option value='5' <?php selected( $options['scroller_setting_select_field_2'], 5 ); ?>>5</option>
		<option value='6' <?php selected( $options['scroller_setting_select_field_2'], 6 ); ?>>6</option>
	</select>

<?php

}


function scroller_setting_select_field_3_render(  ) { 

	$options = get_option( 'scroller_setting_settings' );
	?>
	<select name='scroller_setting_settings[scroller_setting_select_field_3]'>
		<option value='1' <?php selected( $options['scroller_setting_select_field_3'], 1 ); ?>>true</option>
		<option value='2' <?php selected( $options['scroller_setting_select_field_3'], 2 ); ?>>false</option>
	</select>

<?php

}


function scroller_setting_settings_section_callback(  ) { 

	echo __( 'Option are:', 'allinone_scroller' );

}


function scroller_setting_options_page() { 

	?>
	<form action='options.php' method='post'>
		
		<h2>All in One News Scroll</h2>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php

}