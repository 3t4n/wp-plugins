<?php

function acb_initialize_main_options() { 

	if( false == get_option( 'acb_options_main' ) ) {
		add_option( 'acb_options_main' );
		$options = get_option('acb_options_main'); 
		$options['lightopacity'] = '15';
		$options['darkopacity'] = '90';
		$options['bordertype'] = '3D';
		update_option('acb_options_main', $options);
	}

	add_settings_section(
		'acb_section_main',
		'',
		'acb_section_main_callback',
		'acb_options_main'
	);

	add_settings_field(  
		'acb_bordertype',
		'Border Type',
		'acb_bordertype_callback',
		'acb_options_main',
		'acb_section_main'
	);

	add_settings_field(  
		'acb_lightopacity',
		'Light (Upper) Border Opacity',
		'acb_lightopacity_callback',
		'acb_options_main',
		'acb_section_main'
	);

	add_settings_field(  
		'acb_darkopacity',
		'Dark (Lower) Border Opacity',
		'acb_darkopacity_callback',
		'acb_options_main',
		'acb_section_main'
	);

	register_setting( 
		'acb_group_main', 
		'acb_options_main',
		'acb_validation'
	);

}
add_action('admin_init', 'acb_initialize_main_options'); 

function acb_section_main_callback() { 
	echo '<br>Here you can restore and tweak the borders of the admin menu. You can select a border type from the four options, and then change the opacity to look good on whatever color scheme you are using. Changes will show instantly, but <b><u>won\'t be saved</u></b> unless you hit the Save Changes button.'; 
}

function acb_bordertype_callback() { 

	$options = get_option('acb_options_main'); 

	echo '<select id="bordertype" name="acb_options_main[bordertype]" />';

	echo '<option value="3D"'.($options['bordertype'] == '3D' ? ' selected="selected"' : '').'>3D</option>';

	echo '<option value="light"'.($options['bordertype'] == 'light' ? ' selected="selected"' : '').'>Light</option>';

	echo '<option value="dark"'.($options['bordertype'] == 'dark' ? ' selected="selected"' : '').'>Dark</option>';

	echo '<option value="none"'.($options['bordertype'] == 'none' ? ' selected="selected"' : '').'>None</option>';

	echo '</select>';

	echo '<p class="description">Select which type of border you\'d like. Options are light, dark, and 3D (both). Default is 3D.</p>';

}

function acb_lightopacity_callback() { 

	$options = get_option('acb_options_main');

	echo '<div class="acb_row">

		<div class="acb_cell left">(0%)</div>

		<div class="acb_cell center"><div class="acb_displaytextinput" id="lightopacitydisplay">'.$options['lightopacity'].'%</div></div>

		<div class="acb_cell right">(100%)</div>

	</div>';

	echo '<input type="hidden" id="lightopacity" name="acb_options_main[lightopacity]" value="'.$options['lightopacity'].'" />';

	echo '<div class="acb_slider" id="slider_lightopacity"></div>';

	echo '<p class="description">Enter a number between 0 and 100 to change the opacity of the light (upper) borders of menu items. The default is 15.</p>';

}

function acb_darkopacity_callback() { 

	$options = get_option('acb_options_main');

	echo '<div class="acb_row">

		<div class="acb_cell left">(0%)</div>

		<div class="acb_cell center"><div class="acb_displaytextinput" id="darkopacitydisplay">'.$options['darkopacity'].'%</div></div>

		<div class="acb_cell right">(100%)</div>

	</div>';

	echo '<input type="hidden" id="darkopacity" name="acb_options_main[darkopacity]" value="' . $options['darkopacity'] . '" />';

	echo '<div class="acb_slider" id="slider_darkopacity"></div>';

	echo '<p class="description">Enter a number between 0 and 100 to change the opacity of the dark (lower) borders of menu items. The default is 90.</p>';

}

function acb_initialize_extra_options() { 

	if( false == get_option( 'acb_options_extra' ) ) {
		add_option( 'acb_options_extra' );
		$options['restoreadminbarheight'] = 'no';
		$options['showrowhovereffect'] = 'yes';
		$options['rowhovercolor'] = '#DCE6FA';
		$options['customcss'] = '';
		update_option('acb_options_extra', $options);
	}

	add_settings_section(
		'acb_section_extra',
		'',
		'acb_section_extra_callback',
		'acb_options_extra'
	);

	add_settings_field(  
		'acb_restoreadminbarheight',
		'Restore 28px Admin Bar?',
		'acb_restoreadminbarheight_callback',
		'acb_options_extra',
		'acb_section_extra'
	);

	add_settings_field(  
		'acb_showrowhovereffect',
		'Show Hover Effect on Rows?',
		'acb_showrowhovereffect_callback',
		'acb_options_extra',
		'acb_section_extra'
	);

	add_settings_field(  
		'acb_rowhovercolor',
		'Row Hover Effect Color',
		'acb_rowhovercolor_callback',
		'acb_options_extra',
		'acb_section_extra'
	);

	add_settings_field(  
		'acb_customcss',
		'Additional Custom CSS',
		'acb_customcss_callback',
		'acb_options_extra',
		'acb_section_extra'
	);

	register_setting( 
		'acb_group_extra', 
		'acb_options_extra',
		'acb_validation'
	);

}
add_action('admin_init', 'acb_initialize_extra_options'); 

function acb_section_extra_callback() { 
	echo '<br>In addition to restoring borders to the admin backend of WordPress, you can tweak a few extra things. Same as with the main options tab, no permanent changes will take effect unless you hit the Save Changes button. If there are other things that you\'d like to be able to tweak without adding custom CSS, let me know in the <a href="'.get_support_url().'">support area</a> of the plugin page, and I\'ll see what I can do.'; 
}

function acb_restoreadminbarheight_callback() { 

	$options = get_option('acb_options_extra'); 

	echo '<select id="restoreadminbarheight" name="acb_options_extra[restoreadminbarheight]" />';

	echo '<option value="yes"'.($options['restoreadminbarheight'] == 'yes' ? ' selected="selected"' : '').'>Yes</option>';

	echo '<option value="no"'.($options['restoreadminbarheight'] == 'no' ? ' selected="selected"' : '').'>No</option>';

	echo '</select>';

	echo '<p class="description">The Admin Bar had a height of 28px until WP 3.8. 3.8 increased the height to 32px. While not a large change, many themes use this number when absolutely positioning elements, and many of said themes haven\'t been updated to check for the new height. This will restore the classic (28px) height.</p>';

}

function acb_showrowhovereffect_callback() { 

	$options = get_option('acb_options_extra'); 

	echo '<select id="showrowhovereffect" name="acb_options_extra[showrowhovereffect]" />';

	echo '<option value="yes"'.($options['showrowhovereffect'] == 'yes' ? ' selected="selected"' : '').'>Yes</option>';

	echo '<option value="no"'.($options['showrowhovereffect'] == 'no' ? ' selected="selected"' : '').'>No</option>';

	echo '</select>';

	echo '<p class="description">Would you like rows (in the list of pages, posts, comments, etc), to change color on hover? Default is yes.</p>';

}

function acb_rowhovercolor_callback() { 

	$options = get_option('acb_options_extra');

	echo '<input type="hidden" id="rowhovercolorrefresh" value="'.$options['rowhovercolor'].'">';

	echo '<input type="text" id="rowhovercolor" name="acb_options_extra[rowhovercolor]" data-default-color="#DCE6FA" value="'.$options['rowhovercolor'].'" />';

	echo '<p class="description">Select which color you\'d like to have for the row hover effect. Default color is #DCE6FA, also known as rgb(220,230,250).</p>';

}

function acb_customcss_callback() { 

	$options = get_option('acb_options_extra');

	echo '<textarea placeholder=".exampleclass {examplerule:value;}" id="customcss" name="acb_options_extra[customcss]">'.$options['customcss'].'</textarea>';

	echo '<p class="description">Here you can add custom CSS to be applied throughout the admin backend in addition to the a options above. This will be applied directly, so it should follow CSS conventions. Basically, only touch it if you know what you are doing.</p>';

}

function acb_validation($input) {

	$output = array();

	foreach($input as $key => $value) {

		if (isset($input[$key])) {

			$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );

		}

	}

	return apply_filters('acb_validation', $output, $input);

}