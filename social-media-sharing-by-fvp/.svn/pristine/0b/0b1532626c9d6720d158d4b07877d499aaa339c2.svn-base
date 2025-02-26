<?php

function fvp_social_media_create_menu() {

	// Generate Main Menu Page
	add_menu_page( 'Social Media Settings', 'Social Media FVP', 'manage_options', 'fvp_social_media_plugin_settings', 'fvp_social_media_generate_settings_panel', 'dashicons-share', 69 );

	// Generate Submenu Page
	global $fvp_sm_subpage_settings;
	global $fvp_sm_subpage_customize;
	$fvp_sm_subpage_settings = add_submenu_page( 'fvp_social_media_plugin_settings', 'Social Media Settings', 'Settings', 'manage_options', 'fvp_social_media_plugin_settings', 'fvp_social_media_generate_settings_panel' );
	$fvp_sm_subpage_customize = add_submenu_page( 'fvp_social_media_plugin_settings', 'Social Media Customize', 'Customize', 'manage_options', 'fvp_social_media_plugin_customize', 'fvp_social_media_generate_customize_panel' );

}

if ( is_admin() ) {
	// generate Menu
	add_action( 'admin_menu', 'fvp_social_media_create_menu' );
	// Activate Custom Settings
	add_action( 'admin_init', 'fvp_social_media_custom_settings' );
}

function fvp_social_media_generate_settings_panel() {
	require_once ( plugin_dir_path( __FILE__ ) . 'templates/settings-panel.php' );
}

function fvp_social_media_generate_customize_panel() {
	require_once ( plugin_dir_path( __FILE__ ) . 'templates/customize-panel.php' );
}


function fvp_social_media_custom_settings() {

	register_setting( 'fvp_social_media_settings', 'fvp_sm_sharing_items_order' );
	add_settings_section( 'fvp_social_media_order_section', 'Social Media Chooser', 'fvp_social_media_order_section_callback', 'fvp_social_media_plugin_settings' );
	add_settings_field( 'fvp_sm_sharing_items_order', '', 'fvp_social_media_sharing_items_order', 'fvp_social_media_plugin_settings', 'fvp_social_media_order_section' );

	register_setting( 'fvp_social_media_settings', 'fvp_sm_share_posts_active' );
	register_setting( 'fvp_social_media_settings', 'fvp_sm_share_front_page_active' );
	register_setting( 'fvp_social_media_settings', 'fvp_sm_share_pages_active' );

	add_settings_section( 'fvp_social_media_general_settings_section', 'Share Options', 'fvp_social_media_general_settings_section_callback', 'fvp_social_media_plugin_settings' );

	add_settings_field( 'fvp_sm_share_posts_active', 'Posts', 'fvp_social_media_share_posts_active', 'fvp_social_media_plugin_settings', 'fvp_social_media_general_settings_section' );
	add_settings_field( 'fvp_sm_share_front_page_active', 'Front Page', 'fvp_social_media_share_front_page_active', 'fvp_social_media_plugin_settings', 'fvp_social_media_general_settings_section' );
	add_settings_field( 'fvp_sm_share_pages_active', 'Pages', 'fvp_social_media_share_pages_active', 'fvp_social_media_plugin_settings', 'fvp_social_media_general_settings_section' );

	register_setting( 'fvp_social_media_style', 'fvp_sm_buttons_type' );
	register_setting( 'fvp_social_media_style', 'fvp_sm_buttons_place' );
	register_setting( 'fvp_social_media_style', 'fvp_sm_buttons_text' );

	add_settings_section( 'fvp_social_media_style_section', 'Display Options', 'fvp_social_media_style_section_callback', 'fvp_social_media_plugin_customize' );

	add_settings_field( 'fvp_sm_buttons_place', 'Display position', 'fvp_social_media_buttons_place', 'fvp_social_media_plugin_customize', 'fvp_social_media_style_section' );
	add_settings_field( 'fvp_sm_buttons_text', 'Text before buttons', 'fvp_social_media_text', 'fvp_social_media_plugin_customize', 'fvp_social_media_style_section' );
	add_settings_field( 'fvp_sm_buttons_type', 'Style type', 'fvp_social_media_style_type', 'fvp_social_media_plugin_customize', 'fvp_social_media_style_section' );

}

function fvp_social_media_general_settings_section_callback() {
	echo 'Select where you want to display social share icons.';
}

function fvp_social_media_style_section_callback() {
	echo '';
}

function fvp_social_media_order_section_callback() {
	echo 'Here you can choose the social media you want to display by drag and drop. You can also define the order the buttons will show up in your website.';
}

function fvp_social_media_share_posts_active() {
	$option = get_option( 'fvp_sm_share_posts_active', 1 );
	$checked = ($option == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="fvp_sm_share_posts_active" name="fvp_sm_share_posts_active" value="1" '. $checked .' >Enable buttons to share Posts</label><br>';
}

function fvp_social_media_share_front_page_active() {
	$option = get_option( 'fvp_sm_share_front_page_active', 0 );
	$checked = ($option == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="fvp_sm_share_front_page_active" name="fvp_sm_share_front_page_active" value="1" '. $checked .' >Enable buttons to share Front Page</label><br>';
}

function fvp_social_media_share_pages_active() {
	$option = get_option( 'fvp_sm_share_pages_active', 0 );
	$checked = ($option == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="fvp_sm_share_pages_active" name="fvp_sm_share_pages_active" value="1" '. $checked .' >Enable buttons to share Individual Pages</label><br>';

}

function fvp_social_media_sharing_items_order() {

	$option = get_option( 'fvp_sm_sharing_items_order', 'facebook,twitter,gplus,whatsapp,email' );
	if ( !empty($option) ) {
		$sharing_networks_to_show = explode( ',', $option );
	} else {
		$sharing_networks_to_show = array();
	}


	$sharing_networks['facebook'] = '<li class="ui-state-default" id="facebook">Facebook</li>';
	$sharing_networks['twitter'] = '<li class="ui-state-default" id="twitter">Twitter</li>';
	$sharing_networks['gplus'] = '<li class="ui-state-default" id="gplus">Google+</li>';
	$sharing_networks['whatsapp'] = '<li class="ui-state-default" id="whatsapp">Whatsapp</li>';
	$sharing_networks['email'] = '<li class="ui-state-default" id="email">Email</li>';
	$sharing_networks['linkedin'] = '<li class="ui-state-default" id="linkedin">Linkedin</li>';
	$sharing_networks['pinterest'] = '<li class="ui-state-default" id="pinterest">Pinterest</li>';

	$text_to_echo = '<div class="fvp-sm-chooser-container"><div class="fvp-sm-itemgreen"><h4>Enabled</h4></div>';
	$text_to_echo .= '<ul id="fvp-sm-sortable1" class="fvpsmConnected">';
	if ( !empty($option) ) {
		foreach ($sharing_networks_to_show as $network ) {
			$text_to_echo .= $sharing_networks[$network];
			unset($sharing_networks[$network]);
		}
	}
	$text_to_echo .= '</ul></div>';

	$text_to_echo .= '<div class="fvp-sm-chooser-container"><div class="fvp-sm-itemred"><h4>Disabled</h4></div>';
	$text_to_echo .= '<ul id="fvp-sm-sortable2" class="fvpsmConnected">';
	if ( !empty($sharing_networks) ) {
		foreach ( $sharing_networks as $network) {
			$text_to_echo .= $network;
		}
	}
	$text_to_echo .= '</ul></div>';

	$text_to_echo .= '<input type="hidden" name="fvp_sm_sharing_items_order" id="fvp_sm_sharing_items_order" value="' .$option. '">';

	echo $text_to_echo;

}


function fvp_social_media_style_type() {
	$option = get_option( 'fvp_sm_buttons_type', 'type1' );
	$types_available = array( 'type1', 'type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10', 'type11', 'type12', 'type13' );
	foreach ($types_available as $type) {
		$checked = ( $option == $type ? 'checked' : '' );
		echo '<br><label><input type="radio" name="fvp_sm_buttons_type" id="fvp_sm_buttons_type" value="'. $type .'" '. $checked .'>'. str_replace( 'type', 'Style ', $type ) .'</label>
		<br>
		<img class="fvp-sm-img-buttons-style" src="'. plugins_url().'/social-media-sharing-by-fvp/img/'.$type.'.png' .'" />
		 <br><br>';
	}
}

function fvp_social_media_buttons_place() {
	$option = get_option( 'fvp_sm_buttons_place', 'bottom' );
	$places_available = array( 'top', 'bottom', 'both' );
	$code = '<select name="fvp_sm_buttons_place" id="fvp_sm_buttons_place">';
	foreach ($places_available as $place) {
		$selected = ( $option == $place ? 'selected="selected"' : '' );
		$code .= '<option value="' .$place. '" ' .$selected. '>' .$place. '</option>';
	}
	$code .= '</select>';
	$code .= '<p class="description">Choose the place you want to show Social Media buttons. You can place it on top (above content), bottom (below content) or both (below and above content)</p>';
	echo $code;
}

function fvp_social_media_text() {
	$option = get_option( 'fvp_sm_buttons_text', '' );
	echo '<input type="text" name="fvp_sm_buttons_text" id="fvp_sm_buttons_text" size="50" placeholder="Text to show..." value="' .$option. '">
	<p class="description">You can define a text to show above buttons, or leave it blank it you want to show nothing.</p>';
}
