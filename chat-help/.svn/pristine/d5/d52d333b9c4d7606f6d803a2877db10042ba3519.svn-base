<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package chat-help
 * @subpackage chat-help/src/Admin/Views/Shortcode
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\ChatWhatsapp\Admin\Views;

use ThemeAtelier\ChatWhatsapp\Admin\Framework\Classes\CHAT_WHATSAPP;

class Shortcode
{
	/**
	 * Create Option fields for the setting options.
	 *
	 * @param string $prefix Option setting key prefix.
	 * @return void
	 */
	public static function options($prefix)
	{
		//
		// Field: shortcodes
		//
		CHAT_WHATSAPP::createSection(
			$prefix,
			array(
				'title'  => esc_html__('SHORTCODES', 'chat-help'),
				'icon'   => 'icofont-code-alt',
				'fields' => array(
					array(
						'id'      => 'opt-shortcode-select',
						'type'    => 'image_select',
						'title'   => esc_html__('Select Button Style', 'chat-help'),
						'options' => array(
							'1' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button-with-info.svg',
							'2' => CHAT_WHATSAPP_DIR_URL . 'src/assets/image/button2.svg',
						),
						'default' => '1',
					),

					array(
						'type'       => 'content',
						'content'    => '[ctw style="1" primary_color="#118c7e" secondary_color="#0b5a51" padding="7px 18px 7px 10px" number="+8815647788844" timezone="Asia/Dhaka" photo="' . CHAT_WHATSAPP_DIR_URL . 'src/assets/image/user.webp" name="Jhon" designation="Techinical support" label="How can I help you?" online="I am online" offline="I am offline" visibility="wHelp-show-everywhere" sizes="wHelp-btn-lg" sunday="00:00-23:59" monday="23:00-23:59" tuesday="00:00-23:59" wednesday="00:00-23:59" thursday="00:00-23:59" friday="00:00-23:59" saturday="00:00-23:59"]',
						'title'      => esc_html__('Copy This Shortcode and Paste It In Any Pages/Posts/Widget. Edit values as you need.', 'chat-help'),
						'dependency' => array('opt-shortcode-select', 'any', '1'),
					),

					array(
						'type'       => 'content',
						'content'    => '[ctw style="2" primary_color="#118c7e" secondary_color="#0b5a51" padding="7px 18px 7px 10px" number="+8815647788844" label="How can I help you?" visibility="wHelp-show-everywhere" sizes="wHelp-btn-lg"]',
						'title'      => esc_html__('Copy This Shortcode and Paste It In Any Pages/Posts/Widget. Edit values as you need.', 'chat-help'),
						'dependency' => array('opt-shortcode-select', 'any', '2'),
					),

				),
			)
		);
	}
}
