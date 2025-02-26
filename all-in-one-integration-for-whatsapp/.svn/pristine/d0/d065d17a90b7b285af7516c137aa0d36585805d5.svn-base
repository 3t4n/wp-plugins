<?php
/**
 * Plugin Name: All in One integration for WhatsApp
 * Plugin URI: https://hackforme.com
 * Description: A simple plugin to integrate whatsapp with your wordpress,with many cool features like shortcodes , support icon etc.
 * Version: 1.4
 * Author: Team HackForMe
 * Author URI: https://www.hackforme.com/
 * 
 * 
 *
 * @package WhatsappAllinOne
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


define( 'WAIO_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'WAIO_WHATSAPP_PATH', plugin_dir_path( __FILE__ ) );

require_once WAIO_WHATSAPP_PATH . '/includes/button.php';

require_once WAIO_WHATSAPP_PATH . '/includes/whatsettings.php';

require_once WAIO_WHATSAPP_PATH . '/admin/whatsapp-admin.php';



add_filter( 'widget_text', 'do_shortcode' );




