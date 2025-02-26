<?php

/**
 * Fired during plugin activation
 *
 * @link       http://acewebx.com/
 * @since      1.0.0
 *
 * @package    Ace_whatsapp_chat_wp
 * @subpackage Ace_whatsapp_chat_wp/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ace_whatsapp_chat_wp
 * @subpackage Ace_whatsapp_chat_wp/includes
 * @author     AceWebx <webbninja01@gmail.com>
 */
class Ace_whatsapp_chat_wp_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		add_option( 'ace-whatsapp-setting-field', array( 
														'whatsapp_start_chat' => esc_attr(' Hello! I am interested in your service ', 'ace_whatsapp_chat_wp' ),
														// 'whatsapp_content'  => esc_attr('Whatsapp Chat', 'ace_whatsapp_chat_wp' ),
														'ace_whatsapp_btn_color' => '#25D366',
														'ace_whatsapp_txtbtn_color' => '#ffffff',
														'ace_whatsapp_hover_color' => '#25D366',
														'ace_whatsapp_txthover_color' => '#ffffff',
														'ace_whatsapp_position_btn' => 'right',
														'ace_whatsapp_position_vtl' => 'bottom' ) );

		add_option( 'ace_WA_group_info', array(  
												'whatsapp_content'  => esc_attr('Whatsapp Group', 'ace_whatsapp_chat_wp' ),
												'whatsapp_desc'  => esc_attr('Join Us Group Now', 'ace_whatsapp_chat_wp' ),
												'whatsapp_btn_color' => '#00e676',
												'whatsapp_txtbtn_color' => '#ffffff',
												'whatsapp_hover_color' => '#00e676',
												'whatsapp_txthover_color' => '#ffffff'
												 ) );

	}

}
