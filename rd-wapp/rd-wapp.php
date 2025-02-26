<?php
/**
 * Plugin Name: RD Contacto
 * Description: Plugin de Contacto por WhatsApp y Llamadas telefonica.
 * Version: 1.4
 * Author: Richard Bolívar
 * Author URI: https://richard-dev.com
 * Requires at least: 5.6
 * Tested up to: 1.4
 * Text Domain: rd-wapp
* Domain Path: /languages
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined( 'ABSPATH' ) or die( '¡Sin trampas! - Richard Dev' );

/**
 * Definiciones de constantes
 */
if( !defined( 'RDWAPP_NAME_PLUGINS' ) ) {
    define( 'RDWAPP_NAME_PLUGINS', 'RD Contacto' ); // Version of plugin
}
if( !defined( 'RDWAPP_BANNER_PLUGINS' ) ) {
    define( 'RDWAPP_BANNER_PLUGINS', 'banner_plugins_richarddev.jpg' ); // Version of plugin
}
if( !defined( 'RDWAPP_VERSION' ) ) {
    define( 'RDWAPP_VERSION', '1.4' ); // Version of plugin
}
if( !defined( 'RDWAPP_DIR' ) ) {
    define( 'RDWAPP_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'RDWAPP_URL' ) ) {
    define( 'RDWAPP_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'RDWAPP_PLUGIN_BASENAME' ) ) {
    define( 'RDWAPP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // plugin base name
}

/**
 * Registro la Activacion del plugin
 */
register_activation_hook( __FILE__, 'rdwapp_install' );
function rdwapp_install() {

    // Consulto si ya existe las opciones
    $rdwapp_options = get_option( 'rdwapp_options_free' );

    // si no existe o esta vacio las instalo
    if( empty( $rdwapp_options ) ) {

        // Defino la opciones por defecto
        rdwapp_default_settings();

    }

}

/**
 * Opciones Globales del Plugin
 */
global $rdwapp_options;

/**
 * Archivos complementarios del Plugins
 */
require_once( RDWAPP_DIR . '/includes/rd-functions.php' );
require_once( RDWAPP_DIR . '/includes/shortcode.php' );
$rdwapp_options = rdwapp_get_settings();
require_once( RDWAPP_DIR . '/includes/rdwapp-class.php' );

/**
 * Funcion para cargar el plugins en el footer de la web
 */
add_action('wp_footer', 'rdwapp_load_button');
function rdwapp_load_button(){

    $rdwapp_options = get_option( 'rdwapp_options_free' );


        $rdWapp = new rdWapp();
        $dataButton = $rdWapp->rdWapp_loadButton($rdwapp_options);
        echo $dataButton;


}


?>