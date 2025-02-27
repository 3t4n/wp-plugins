<?php
/*
Plugin Name: Simple Webchat
Plugin URI: http://www.chefblogger.me
Description: With Simple Webchat you can quickly add a WhatsApp Button into your Website. Settings for <a href="options-general.php?page=QWA_quickwhatsapp">Simple Webchat Administration</a>
Version: 3.6.1
Author: Eric-Oliver Mächler
Author URI: http://www.ericmaechler.com
Requires at least: 4.0
Tested up to: 6.7.1
Text Domain: quick-whatsapp
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include 'conf.php';

//mehrsprachigkeit
function my_plugin_initsquick_whatsapp() {
	load_plugin_textdomain( 'quick-whatsapp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
  }
  add_action('init', 'my_plugin_initsquick_whatsapp');



$quickwhatsapp_anzeige = get_option('quickwhatsapp');
$quickwhatsappbutton_show = get_option('quickwhatsappbutton');
$quickwhatsappsharebutton = get_option('quickwhatsappsharebutton');
$quickwhatsappbutton_style = get_option('quickwhatsappbutton_style');

$quickwhatsapps_onlineoffline_status = get_option('quickwhatsapps_onlineoffline_status');

//fehlermeldung generieren
if ($quickwhatsapp_anzeige == '')
	{
	
				function whatsapp_admin_notice__error() {
				$class = 'notice notice-error';
				$message = __( "Please finish installing the Simple Webchat plugin. To do this, go to Simple Webchat Administration", 'quick-whatsapp' );

				printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
				}
				add_action( 'admin_notices', 'whatsapp_admin_notice__error' );

	}

$quickwhatsapps_floatingbutton_status_error = get_option('quickwhatsapps_floatingbutton_status');


//FLOATING BUTTON ERROR MSG
if (($quickwhatsapps_floatingbutton_status_error == 'an') )
	{
	

$quickwhatsapps_floating_posi_unten_nach_oben_error = get_option('quickwhatsapps_floating_posi_unten_nach_oben');
$quickwhatsapps_floation_posi_rechts_nach_links_error = get_option('quickwhatsapps_floation_posi_rechts_nach_links');
	
	if (($quickwhatsapps_floating_posi_unten_nach_oben_error == '') OR ($quickwhatsapps_floation_posi_rechts_nach_links_error == ''))
			{
	
				function whatsapp_admin_notice__error2() {
				$class = 'notice notice-error';
				$message = __( "Please Config your Floating Button", 'quick-whatsapp' );

				printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
				}
				add_action( 'admin_notices', 'whatsapp_admin_notice__error2' );
			}

	}


/* ------------------------------------------- Normale Chat / Sharing Funktion  ------------------------------------------ */
$quickwhatsapps_floatingbutton_status = get_option('quickwhatsapps_chatbutton_status');
if ($quickwhatsapps_floatingbutton_status == 'an')
{
include("whatsapp-standard.php");
}
else {}
/* ----------------------------------------------------------------------------------------------------------------------- */


/* ------------------------------------------- Chat Shortcode Funktion  -------------------------------------------------- */
include("whatsapp-shortcode-chat.php");
/* ----------------------------------------------------------------------------------------------------------------------- */

/* ------------------------------------------- Chat Shortcode Funktion  -------------------------------------------------- */
include("simple-webchat-whatsapp-shortcode-gruppe.php");
/* ----------------------------------------------------------------------------------------------------------------------- */

/* ------------------------------------------- Sharing Shortcode Funktion ------------------------------------------------ */
include("whatsapp-shortcode-sharing.php");
/* ----------------------------------------------------------------------------------------------------------------------- */


/* ------------------------------------------- Text unter Kauf Button einfügen ------------------------------------------- */
include("whatsapp-button-after-addtocart.php");
/* ----------------------------------------------------------------------------------------------------------------------- */

/* ------------------------------------------- Floating Button ----------------------------------------------------------- */
$quickwhatsapps_floatingbutton_status = get_option('quickwhatsapps_floatingbutton_status');
if ($quickwhatsapps_floatingbutton_status == 'an')
{
include("whatsapp-floating-button.php");
}
else {}
/* ----------------------------------------------------------------------------------------------------------------------- */

?>