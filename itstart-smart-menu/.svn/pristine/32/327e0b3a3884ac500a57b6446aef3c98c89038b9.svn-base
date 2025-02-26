<?php
/*
Plugin Name: ITStart Smart Menu
Plugin URI: https://itstart.eu/itstart-smart-menu-plugin/
Description: Wtyczka dla restauracji do połączenia się z systemem zamawiania jedzenia online - ITSTART. Plugin for restaurants etc. to connect with online food ordering system coded by IT Start
Version: 1.0
Author: IT Start
Author URI: https://itstart.eu
License: GPL3
Text Domain: itstart-smart-menu
Domain Path: /languages
*/

/*  Copyright 2021  IT start  (email : biuro@itstart.eu)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 3, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('wp_enqueue_scripts', 'itstart_smart_menu_scripts');
add_action('admin_enqueue_scripts', 'itstart_smart_menu_admin_scripts');
function itstart_smart_menu_scripts () {
	wp_enqueue_style ('itstart-smart-menu', plugins_url('css/itstart_smart_menu_front.css', __FILE__));
	wp_enqueue_script('itstart-front-script-handle', plugins_url( 'js/front-script.js', __FILE__ ));
}
function itstart_smart_menu_admin_scripts () {
	wp_enqueue_style ('itstart-smart-menu', plugins_url('css/itstart_smart_menu.css', __FILE__));
	wp_enqueue_style('wp-color-picker'); 
	wp_enqueue_script('itstart-custom-script-handle', plugins_url( 'js/custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

class ITSMload_languages {
	public function __construct() {
	add_action('init', array($this, 'load_my_transl'));
	}

	public function load_my_transl() {
		load_plugin_textdomain('itstart-smart-menu', "", dirname(plugin_basename(__FILE__)).'/languages/');
	}
}
$lang_loaded = new ITSMload_languages;

function itstart_smart_menu_settings_init() {
 register_setting('itstart-smart-menu', 'itstart_smart_menu_options');
 add_settings_section(
 'itstart_smart_menu_section_developers',
 __('Dane do połączenia z silnikiem zamówień', 'itstart-smart-menu'),
 'itstart_smart_menu_section_developers_cb',
 'itstart-smart-menu'
);
 add_settings_field(
 'itstart_smart_menu_uri',
 __('Adres', 'itstart-smart-menu'),
 'itstart_smart_menu_uri',
 'itstart-smart-menu',
 'itstart_smart_menu_section_developers',
 [
 'label_for' => 'itstart_smart_menu_fields',
 'class' => 'itstart_smart_menu_row',
 'itstart_smart_menu_custom_data' => 'custom',
 ]
);
 add_settings_field(
 'itstart_smart_menu_text',
 __('Tekst guzika', 'itstart-smart-menu'),
 'itstart_smart_menu_text',
 'itstart-smart-menu',
 'itstart_smart_menu_section_developers',
 [
 'label_for' => 'itstart_smart_menu_fields',
 'class' => 'itstart_smart_menu_row',
 'itstart_smart_menu_custom_data' => 'custom',
 ]
); 
add_settings_field(
 'itstart_smart_menu_topmenu',
 __('Dodaj do głównego menu', 'itstart-smart-menu'),
 'itstart_smart_menu_topmenu',
 'itstart-smart-menu',
 'itstart_smart_menu_section_developers',
 [
 'label_for' => 'itstart_smart_menu_fields',
 'class' => 'itstart_smart_menu_row',
 'itstart_smart_menu_custom_data' => 'custom',
 ]
);
add_settings_field(
 'itstart_smart_menu_topcontent',
 __('Dodaj do głównego menu', 'itstart-smart-menu'),
 'itstart_smart_menu_topcontent',
 'itstart-smart-menu',
 'itstart_smart_menu_section_developers',
 [
 'label_for' => 'itstart_smart_menu_fields',
 'class' => 'itstart_smart_menu_row',
 'itstart_smart_menu_custom_data' => 'custom',
 ]
);
add_settings_field(
 'itstart_smart_menu_bgcolor',
 __('Kolor tła guzika', 'itstart-smart-menu'),
 'itstart_smart_menu_bgcolor',
 'itstart-smart-menu',
 'itstart_smart_menu_section_developers',
 [
 'label_for' => 'itstart_smart_menu_fields',
 'class' => 'itstart_smart_menu_row',
 'itstart_smart_menu_custom_data' => 'custom',
 ]
);
add_settings_field(
 'itstart_smart_menu_txtcolor',
 __('Kolor tekstu guzika', 'itstart-smart-menu'),
 'itstart_smart_menu_txtcolor',
 'itstart-smart-menu',
 'itstart_smart_menu_section_developers',
 [
 'label_for' => 'itstart_smart_menu_fields',
 'class' => 'itstart_smart_menu_row',
 'itstart_smart_menu_custom_data' => 'custom',
 ]
);
}

add_action('admin_init', 'itstart_smart_menu_settings_init');
function itstart_smart_menu_section_developers_cb ($args) {
 ?>
 <p id="<?php echo esc_attr($args['id']); ?>"><?php esc_html_e('Wpisz dane do połączenia z silnikiem zamówień', 'itstart-smart-menu'); ?></p>
 <p"><?php esc_html_e('Na dowolnej stronie / wpisie możesz dodać link do zamówienia używając skrótu [itstart_smart_menu_button]', 'itstart-smart-menu'); ?></p>
 <?php
}

function itstart_smart_menu_uri($args) {
 $options = get_option('itstart_smart_menu_options');
 if (empty($options['uri'])) {
		$options['uri'] = '#';
	}
 ?>
 <input type="text" id="itstart_smart_menu_uri"
 data-custom="<?php echo esc_html($options['uri']); ?>"
 name="itstart_smart_menu_options[uri]" 
 style="width:80%" 
 value="<?php echo esc_html($options['uri']); ?>"
 />
 <p class="description">
 <?php esc_html_e('Wpisz adres swojego silnika do zamawiania', 'itstart-smart-menu'); ?>
 </p>
 <?php
}

function itstart_smart_menu_text($args) {
 $options = get_option('itstart_smart_menu_options');
	if (empty($options['text'])) {
		$options['text'] =  __('Zamów online', 'itstart-smart-menu');
	}
 ?>
 <input type="text" id="itstart_smart_menu_text"
 data-custom="<?php echo esc_html($options['text']); ?>"
 name="itstart_smart_menu_options[text]" 
 value="<?php echo esc_html($options['text']); ?>"
 />
 <p class="description">
 <?php esc_html_e('Wpisz tekst, który ma się pojawić na guziku wywołującym okno zamówień', 'itstart-smart-menu'); ?>
 </p>
 <?php
}

function itstart_smart_menu_topmenu($args) {
 $options = get_option('itstart_smart_menu_options');
 if (isset($options['topmenu']) && ($options['topmenu'] == '1')) {
	 $checked = " checked";
 } else {
	 $checked = "";
 }
 ?>
 <input type="checkbox" id="itstart_smart_menu_topmenu"
 data-custom="<?php echo esc_html($options['topmenu']); ?>"
 name="itstart_smart_menu_options[topmenu]" 
 value="1" 
 <?php echo esc_html($checked); ?>
 />
 <p class="description">
 <?php esc_html_e('Czy dodać link do zamawiania do górnego menu?', 'itstart-smart-menu'); ?>
 </p>
 <?php
}

function itstart_smart_menu_topcontent($args) {
 $options = get_option('itstart_smart_menu_options');
 if (isset($options['topcontent']) && ($options['topcontent'] == '1')) {
	 $checked = " checked";
 } else {
	 $checked = "";
 }
 ?>
 <input type="checkbox" id="itstart_smart_menu_topcontent"
 data-custom="<?php echo esc_html($options['topcontent']); ?>"
 name="itstart_smart_menu_options[topcontent]" 
 value="1" 
 <?php echo esc_html($checked); ?>
 />
 <p class="description">
 <?php esc_html_e('Czy dodać link do zamawiania do początku treści strony / slidera?', 'itstart-smart-menu'); ?>
 </p>
 <?php
}

function itstart_smart_menu_bgcolor($args) {
 $options = get_option('itstart_smart_menu_options');
	if (empty($options['bgcolor'])) {
		$options['bgcolor'] = '#f00';
	}
 ?>
 <input type="text" id="itstart_smart_menu_bgcolor"
 data-custom="<?php echo esc_html($options['bgcolor']); ?>"
 name="itstart_smart_menu_options[bgcolor]" 
 class="color-field" 
 value="<?php echo esc_html($options['bgcolor']); ?>"
 />
 <p class="description">
 <?php esc_html_e('Kolor tła guzika wywołującego okno zamówień', 'itstart-smart-menu'); ?>
 </p>
 <?php
}

function itstart_smart_menu_txtcolor($args) {
 $options = get_option('itstart_smart_menu_options');
	if (empty($options['txtcolor'])) {
		$options['txtcolor'] = '#fff';
	}
 ?>
 <input type="text" id="itstart_smart_menu_txtcolor"
 data-custom="<?php echo esc_html($options['txtcolor']); ?>"
 name="itstart_smart_menu_options[txtcolor]" 
  class="color-field" 
 value="<?php echo esc_html($options['txtcolor']); ?>"
 />
 <p class="description">
 <?php esc_html_e('Kolor tekstu guzika wywołującego okno zamówień', 'itstart-smart-menu'); ?>
 </p>
 <?php
}


function itstart_smart_menu_options_page() {
 add_menu_page(
 'Smart Menu - ustawienia',
 'Smart Menu',
 'manage_options',
 'itstart-smart-menu',
 'itstart_smart_menu_options_page_html'
);
}

add_action('admin_menu', 'itstart_smart_menu_options_page');
function itstart_smart_menu_options_page_html() {
 if (! current_user_can( 'manage_options' )) {
	return;
 }
 if (isset($_GET['settings-updated'])) {
 add_settings_error('itstart_smart_menu_messages', 'itstart_smart_menu_message', __('Ustawienia zostały zapisane', 'itstart-smart-menu'), 'updated');
 }
 settings_errors('itstart_smart_menu_messages');
 ?>
 <div class="wrap">
	 <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
	 <form action="options.php" method="post">
		 <?php
			 settings_fields('itstart-smart-menu');
			 do_settings_sections('itstart-smart-menu');
			 submit_button( __('Zapisz dane', 'itstart-smart-menu'));
		 ?>
	 </form>
 </div>
 <?php
}
add_filter( 'wp_nav_menu_items', 'itstart_custom_menu_filter', 10, 2 );
function itstart_custom_menu_filter($items, $args) {
	if (($args->theme_location == 'primary') || ($args->theme_location == 'top')) {
		$options = get_option('itstart_smart_menu_options');
		if (isset($options['topmenu']) && ($options['topmenu'] == '1')) {
			if (empty($options['uri'])) {
				$options['uri'] = '#';
			}
			if (empty($options['text'])) {
				$options['text'] =  __('Zamów online', 'itstart-smart-menu');
			}
			$home = '<li class="menu-item"><a href="' . $options['uri'] . '" title="'.$options['text'].'" target="_blank">'.$options['text'].'</a></li>';
			$items = $home . $items;
		}
	}
	return $items;
}

function itstart_add_html_to_content() {
	$home = '';
	$options = get_option('itstart_smart_menu_options');
	if (isset($options['topcontent']) && ($options['topcontent'] == '1')) {
		if (empty($options['uri'])) {
			$options['uri'] = '#';
		}
		if (empty($options['text'])) {
			$options['text'] =  __('Zamów online', 'itstart-smart-menu');
		}
		if (empty($options['bgcolor'])) {
			$options['bgcolor'] = '#f00';
		}
		if (empty($options['txtcolor'])) {
			$options['txtcolor'] = '#fff';
		}
		$home = '<div id="itstart_smart_menu" style="z-index:999999;position:absolute;top:200px;right:10%;border:solid '.$options['bgcolor'].' 1px;background-color: '.$options['bgcolor'].';border-radius:4px;padding:20px"><a href="'. $options['uri'] . '" title="'.$options['text'].'" target="_blank" style="color:'.$options['txtcolor'].'">'.$options['text'].'</a></div>';
	}
  echo esc_html($home);
}
add_action('wp_footer', 'itstart_add_html_to_content');

add_shortcode('itstart_smart_menu_button', 'itstart_smart_menu_button');
function itstart_smart_menu_button () {
	$options = get_option('itstart_smart_menu_options');
	if (empty($options['uri'])) {
		$options['uri'] = '#';
	}
	if (empty($options['text'])) {
		$options['text'] =  __('Zamów online', 'itstart-smart-menu');
	}
	return '<div class="itstart_smart_menu_button"><a href="'. $options['uri'].'" target="_blank">'.$options['text'].'</a></div>';
}