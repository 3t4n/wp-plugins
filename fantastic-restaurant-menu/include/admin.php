<?php

//Add a new menu section button (Ajax)
add_action( 'wp_ajax_fwl_add_restaurant_menu_section', 'fwl_add_restaurant_menu_section_callback' );

function fwl_add_restaurant_menu_section_callback() {

	$s = intval($_POST['s']);

	FantasticRestaurantMenu::create_menu_section('', $s);
	
	wp_die(); 
}


//Add a new menu item button (Ajax)
add_action( 'wp_ajax_fwl_add_restaurant_menu_item', 'fwl_add_restaurant_menu_item_callback' );

function fwl_add_restaurant_menu_item_callback(){

	$i = intval($_POST['i']);
	$s = intval($_POST['s']);
	FantasticRestaurantMenu::create_menu_item('',$i, $s);
	
	wp_die(); 
}

//Add a new price option button (Ajax)
add_action( 'wp_ajax_fwl_add_restaurant_menu_price_option', 'fwl_add_restaurant_menu_price_option_callback' );

function fwl_add_restaurant_menu_price_option_callback(){
	$s = intval($_POST['s']);
	$i = intval($_POST['i']);
	$x = intval($_POST['x']);

	FantasticRestaurantMenu::create_price_option('', $s, $i, $x, 'last');
	
	wp_die(); 
}


//Restore to skin default font option
add_action( 'wp_ajax_fwl_get_skin_default_value', 'fwl_get_skin_default_value_callback' );

function fwl_get_skin_default_value_callback(){

	$skin = FWL_menu_plugin::validate_value($_POST['skin'], 'key');
	$field = FWL_menu_plugin::validate_value($_POST['field'], 'key');

	//Validate if skin is valid, and set to default incase skin file is removed
	if(file_exists (fantasticmenu_PLUGIN_PATH. 'skins/'. $skin .'/home.php')){
		include_once fantasticmenu_PLUGIN_PATH. 'skins/'.$skin.'/home.php';
	}else{
		include_once fantasticmenu_PLUGIN_PATH. 'skins/default/home.php';
	}


	//validate $field
	if(array_key_exists($field, $fantasticmenu_theme_default_setting))
	{
		echo $fantasticmenu_theme_default_setting[$field];
	} 
	
	wp_die();
}


function register_fantasticmenu_shortcodes(){
   add_shortcode('fantasticmenu_menu', 'fantasticmenu_menu_shortcode');
}

//version requirement WP 3.3 or later b/c call euqueue script within shortcode [to be removed]
function fantasticmenu_menu_shortcode($atts)
{	

	$atts = shortcode_atts(array('id' => '',), $atts, 'fantasticmenu_menu' );
	
	$shortcodeID = $atts['id'];
	
	if(get_option('fwl-restaurant-menu-plugin-mode') != 'theme_mode'){
		
		$FantasticRestaurantMenu = new FantasticRestaurantMenu($shortcodeID);
		$FantasticRestaurantMenu->display_menu();
	}
}





