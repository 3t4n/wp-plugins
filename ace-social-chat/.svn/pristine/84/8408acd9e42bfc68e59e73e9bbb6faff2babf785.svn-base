<?php

/**
 * Fired during plugin activation
 *
 * @link       http://acewebx.com
 * @since      1.0.0
 *
 * @package    Ace_Social_Chat
 * @subpackage Ace_Social_Chat/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ace_Social_Chat
 * @subpackage Ace_Social_Chat/includes
 * @author     AceWebx Team <developer@acewebx.com>
 */
class Ace_Social_Chat_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		if (get_option('ace-social-default-status') != 1) {
			update_option('ace-social-default-status', 1);
			update_option('ace-whatsapp-setting-field-M', array(
				'whatsapp_start_chat' => "Hello! I am interested in your service",
				'whatsapp_content' => "ACEWEBX Live Support",
			));
		}
	}
}
