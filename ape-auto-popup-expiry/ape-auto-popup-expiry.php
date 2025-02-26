<?php
/*
Plugin Name: APE - Auto Popup Expiry
Plugin URI: https://www.autopopupexpiry.com/
Description: APE - Auto Popup Expiry is a simply plugin for wordpress usefull for create automatic deactivate popup.
Version: 2.0
Author: Edoardo Rinaldi
Author URI: https://www.edoardorinaldi.com
*/

function popup_plugin_script(){
    $myoption=(get_option('myoption')==null)?'':get_option('myoption');

    $width=(get_option('popup_window_width')==null)?'':get_option('popup_window_width');
    $height=(get_option('popup_window_height')==null)?'':get_option('popup_window_height');
    $miadate=(get_option('popup_window_date')==null)?'':get_option('popup_window_date');
    $popup_window_image=(get_option('popup_window_image')==null)?'':get_option('popup_window_image');
    $popup_window_fadeout=(get_option('popup_window_fadeout')==null)?'':get_option('popup_window_fadeout');
    $popup_window_link=(get_option('popup_window_link')==null)?'':get_option('popup_window_link');
    $popup_window_target=(get_option('popup_window_target')=== '1');
    $popup_window_color=(get_option('popup_window_color')==null)?'':get_option('popup_window_color');
    $popup_window_radius=(get_option('popup_window_radius')==null)?'':get_option('popup_window_radius');
    $popup_window_border_w=(get_option('popup_window_border_w')==null)?'':get_option('popup_window_border_w');

    $notification_text=(get_option('notification_text')==null)?'':get_option('notification_text');
    $notification_width=(get_option('notification_width')==null)?'':get_option('notification_width');
    $notification_height=(get_option('notification_height')==null)?'':get_option('notification_height');
    $notification_date=(get_option('notification_date')==null)?'':get_option('notification_date');
    $notification_fadeout=(get_option('notification_fadeout')==null)?'':get_option('notification_fadeout');
    $notification_bkg_color=(get_option('notification_bkg_color')==null)?'':get_option('notification_bkg_color');
    $notification_font_color=(get_option('notification_font_color')==null)?'':get_option('notification_font_color');
    $notification_radius=(get_option('notification_radius')==null)?'':get_option('notification_radius');
    $notification_margin=(get_option('notification_margin')==null)?'':get_option('notification_margin');
    $notification_close_color=(get_option('notification_close_color')==null)?'':get_option('notification_close_color');
	
    $notification_position_top=(get_option('notification_position_top')==null)?'':get_option('notification_position_top');
    $notification_position_right=(get_option('notification_position_right')==null)?'':get_option('notification_position_right');
    $notification_position_left=(get_option('notification_position_left')==null)?'':get_option('notification_position_left');
    $notification_position_bottom=(get_option('notification_position_bottom')==null)?'':get_option('notification_position_bottom');
	
	//Animations
    $myselect=(get_option('myselect')==null)?'':get_option('myselect');
    $myselectout=(get_option('myselectout')==null)?'':get_option('myselectout');
	?>
<?php
}

//Script in Head
add_action ( 'wp_head', 'popup_plugin_script' );


//Options Page
add_action('admin_menu', 'auto_popup_expiry_menu');


//Set Option
add_option('myoption');

add_option('popup_window_width', '700px');
add_option('popup_window_height', 'auto');
add_option('popup_window_date');
add_option('popup_window_image');
add_option('popup_window_fadeout', '5000');
add_option('popup_window_link');
add_option('popup_window_target');
add_option('popup_window_color');
add_option('popup_window_radius', '15px');
add_option('popup_window_border_w', '5px');

add_option('notification_text');
add_option('notification_width', '300px');
add_option('notification_height', 'auto');
add_option('notification_date');
add_option('notification_fadeout', '5000');
add_option('notification_bkg_color');
add_option('notification_font_color');
add_option('notification_radius', '5px');
add_option('notification_margin', '10px');
add_option('notification_close_color');

add_option('notification_position_top');
add_option('notification_position_right');
add_option('notification_position_left');
add_option('notification_position_bottom');

//Animations
add_option('myselect');
add_option('myselectout');

//Shortcode
add_shortcode('Ape', 'popup_plugin_shortcode');

function auto_popup_expiry_menu() {
    add_menu_page('APE - Auto Popup Expiry Options', 'APE - Auto<br/> Popup Expiry', 8, __FILE__, 'auto_popup_expiry', plugin_dir_url( __FILE__ ) . 'images/expiry.png');
}



function auto_popup_expiry() {
    include('auto_popup_expiry_admin.php');
}




	function popup_plugin_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'url' => '',
			'class' => '',
			'height' => get_option('popup_window_height'),
			'width' => get_option('popup_window_width'),
			'miadate' => get_option('popup_window_date'),
			'popup_window_image' => get_option('popup_window_image'),
			'popup_window_fadeout' => get_option('popup_window_fadeout'),
			'popup_window_link' => get_option('popup_window_link'),
			'popup_window_target' => get_option('popup_window_target'),
			'popup_window_color' => get_option('popup_window_color'),
			'popup_window_radius' => get_option('popup_window_radius'),
			'popup_window_border_w' => get_option('popup_window_border_w'),

			'myoption' => get_option('myoption'),

			'notification_text' => get_option('notification_text'),
			'notification_width' => get_option('notification_width'),
			'notification_height' => get_option('notification_height'),
			'notification_date' => get_option('notification_date'),
			'notification_fadeout' => get_option('notification_fadeout'),
			'notification_bkg_color' => get_option('notification_bkg_color'),
			'notification_font_color' => get_option('notification_font_color'),
			'notification_radius' => get_option('notification_radius'),
			'notification_margin' => get_option('notification_margin'),
			'notification_close_color' => get_option('notification_close_color'),

			'notification_position_top' => get_option('notification_position_top'),
			'notification_position_right' => get_option('notification_position_right'),
			'notification_position_left' => get_option('notification_position_left'),
			'notification_position_bottom' => get_option('notification_position_bottom'),

			//Animations
			'myselect' => get_option('myselect'),
			'myselectout' => get_option('myselectout'),
		), $atts ) );
		
	   	include('autopop.php');	
	}


