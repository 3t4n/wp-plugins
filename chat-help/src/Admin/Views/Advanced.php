<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package chat-help
 * @subpackage chat-help/src/Admin/Views/Advanced
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\ChatWhatsapp\Admin\Views;

use ThemeAtelier\ChatWhatsapp\Admin\Framework\Classes\CHAT_WHATSAPP;

class Advanced
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
		// Field: advance
		//
		CHAT_WHATSAPP::createSection(
			$prefix,
			array(
				'title'  => esc_html__('ADVANCED', 'chat-help'),
				'icon'   => 'icofont-ui-settings',
				'fields' => array(
					array(
						'type' => 'section_tab',
						'tabs' => array(
							array(
								'title' => esc_html__('Advanced Controls', 'chat-help'),
								'icon'  => 'icofont-gears',
								'fields' => array(
									array(
										'id'      => 'cleanup_data_deletion',
										'type'    => 'checkbox',
										'title'   => esc_html__('Clean-up Data on Deletion', 'chat-help'),
										'title_help' => '<div class="chat-whatsapp-info-label">' . esc_html__('Check this box if you would like Chat Help plugin to completely remove all of its data when the plugin is deleted.', 'chat-help') . '</div>',
									),
								)
							),
							array(
								'title' => esc_html__('Additional CSS & JS', 'chat-help'),
								'icon'  => 'icofont-code-alt',
								'fields' => array(
									array(
										'id'       => 'whatsapp-custom-css',
										'type'     => 'code_editor',
										'title'    => esc_html__('Custom CSS', 'chat-help'),
										'settings' => array(
											'theme' => 'mbo',
											'mode'  => 'css',
										),
									),

									array(
										'id'       => 'whatsapp-custom-js',
										'type'     => 'code_editor',
										'title'    => esc_html__('Custom JavaScript', 'chat-help'),
										'settings' => array(
											'theme' => 'mbo',
											'mode'  => 'js',
										),
									),
								)
							),
							array(
								'title' => esc_html__('Backup', 'chat-help'),
								'icon'  => 'icofont-shield',
								'fields' => array(
									array(
										'title'    => esc_html__('Backup', 'chat-help'),
										'type' => 'backup',
									),
								),
							)
						)
					)
				),
			)
		);
	}
}
