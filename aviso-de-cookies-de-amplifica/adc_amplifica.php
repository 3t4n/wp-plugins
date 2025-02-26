<?php
/*
Plugin Name: Aviso de cookies de amplifica
Plugin URI: http://amplifica.es/
Description: Plugin para mostrar el aviso de cookies en tu sitio web. Totalmente amigable con SEO
Author: David González González
Author URI: http://amplifica.es/
Version: 1.2 
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/license-list.html#GPLCompatibleLicenses
*/
defined( 'ABSPATH' ) or die( 'Error 401' );
/*
* Función para añadir una página al menú de administrador de wordpress    
*/
function adc_plugin_menu(){ 
    add_menu_page(  'Aviso de cookies',                     // Título de la página
                    'Aviso de cookies',                     // Título del menú
                    'administrator',                        // Rol que puede acceder
                    'adc-aviso-cookies-settings',           // ID de la página de opciones
                    'adc_aviso_cookies_page_settings',      // Función que pinta la página de configuración del plugin
                    plugins_url( 'aviso-de-cookies-de-amplifica/images/ic-amplifica.png')               // Icono del menú
    );
}
add_action('admin_menu','adc_plugin_menu');

/*
* Función que pinta la página de configuración del plugin
*/
function adc_aviso_cookies_page_settings(){ 
  include_once('adc_aviso_cookies_admin_template.php'); 
}

/*
* Función que registra las opciones del formulario en una lista blanca para que puedan ser guardadas
*/
function adc_aviso_cookies_content_settings(){   
    $array_vars_register = array ('adc_aviso_cookies_text_value',
                                  'adc_aviso_cookies_color_value',
                                  'adc_aviso_cookies_color_text_value',
                                  'adc_aviso_cookies_color_border_value',
                                  'adc_aviso_cookies_height_border_value',
                                  'adc_aviso_cookies_position_value',
                                  'adc_aviso_cookies_text_button_value',
                                  'adc_aviso_cookies_text_readmore_value',
                                  'adc_aviso_cookies_url_readmore_value',
                                  'adc_aviso_cookies_color_text_readmore_value',
                                  'adc_aviso_cookies_color_text_button_color_value',
                                  'adc_aviso_cookies_color_background_button_color_value',
                                  'adc_aviso_cookies_text_size_value');

    foreach ($array_vars_register as $valor) { 
      register_setting( 'adc-aviso-cookies-content-settings-group',
                         $valor,
                        ''
      );
    } 
}
add_action('admin_init','adc_aviso_cookies_content_settings');

/*
* Función que carga el fichero css de los estilos 
*/
function adc_aviso_cookies_load_stylesheet() { 
  echo '<link rel="stylesheet" media="all" href="'.plugins_url( 'css/adc_aviso_cookies_style.css', __FILE__ ).'">';
} 
add_action( 'wp_enqueue_scripts', 'adc_aviso_cookies_load_stylesheet', 11 );

/*
* Función que devuelve la acción del plugin    
*/
function adc_aviso_cookies_action() {
  adc_aviso_cookies_make_css();  
  include_once('adc_aviso_cookies_plugin_template.php'); 
}
/*
* Función que genera el archivo css   
*/
function adc_aviso_cookies_make_css() {
   $css_file = 'wp-content/plugins/aviso-de-cookies-de-amplifica/css/adc_aviso_cookies_style.css'; 
  $css_buffer = '#adc_aviso_cookies_bar_style{display:none;z-index:99999;position:fixed;left:0px;right:0px;bottom:0px;width:100%;min-height:40px;padding:15px;background:'.get_option('adc_aviso_cookies_color_value').';color:'.get_option('adc_aviso_cookies_color_text_value').';line-height:28px;font-size:'.get_option('adc_aviso_cookies_text_size_value').'px;text-align:center;box-sizing:border-box;border-top:'. get_option('adc_aviso_cookies_height_border_value').'px solid '. get_option('adc_aviso_cookies_color_border_value').';}#adc_aviso_cookies_bar_style a:nth-child(1){padding:4px;background:'.get_option('adc_aviso_cookies_color_background_button_color_value').';border-radius:5px;text-decoration:none;color:'.get_option('adc_aviso_cookies_color_text_button_color_value').';}#adc_aviso_cookies_bar_style a {color:'.get_option('adc_aviso_cookies_color_text_readmore_value').';text-decoration:none;padding: 0 0 0 5px;}';
  if($file=fopen($css_file,"w+")) {
    fwrite($file,$css_buffer);
    fclose($file);
  }
}  