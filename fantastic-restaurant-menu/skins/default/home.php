<?php 

$fantasticmenu_theme_default_setting = array(
	'section_name_color' => '#f63b3b',
	'price_color' => '#f63b3b',
	'menu_bg_color' => '',
	'col_1_bg_color' => '',
	'col_2_bg_color' => '',
	'col_3_bg_color' => '',
	'font_section_title' => 'Arial',
	'font_item_title' => 'Courier New',
	'font_item_price' => 'Palatino',
	'font_item_description' => 'Times New Roman',
);


function fantasticmenu_show_menu_by_theme($shortcodeID, $datameta, $settingsmeta, $fantasticmenu_theme_default_setting)
{
	//call it in theme so have the option to use different html if required
	FantasticRestaurantMenu::display_default_menu_html($shortcodeID, $datameta, $settingsmeta, $fantasticmenu_theme_default_setting);
	
	/**
	 * define('NOT_LOAD_DEFAULT_CSS', true);
	 */
}

