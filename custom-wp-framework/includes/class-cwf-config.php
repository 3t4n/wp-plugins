<?php

namespace Custom_WP_Framework\Includes;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

/**
 * Configuration class of plugin.
 * 
 * Store and retrieve core settings of plugin.
 * 
 * @since	1.0.0
 */
class CWF_Config
{
	/**
	 * Settings of the plugin.
	 * 
	 * @since	1.0.9
	 * @var		array	$settings
	 */
	public static $settings = [
		'reserved_post_types' => array(
			'post',
			'page',
			'attachment',
			'revision',
			'nav_menu_item',
			'custom_css',
			'customize_changeset',
			'oembed_cache',
			'user_request',
			'wp_block',
			'action',
			'author',
			'order',
			'theme',
		),
		'admin_screens' => array(
			'custom_post_types' => array(
				'toplevel_page_custom-wp-framework-admin',
				'admin_page_custom-wp-framework-admin-cpt-add',
				'admin_page_custom-wp-framework-admin-cpt-edit',
				'admin_page_custom-wp-framework-admin-cpt-delete',
				'admin_page_custom-wp-framework-admin-cpt-disable',
				'admin_page_custom-wp-framework-admin-cpt-enable',
				'dashboard_page_custom-wp-framework-admin-cpt-delete',
				'dashboard_page_custom-wp-framework-admin-cpt-edit',
				'dashboard_page_custom-wp-framework-admin-cpt-disable',
				'dashboard_page_custom-wp-framework-admin-cpt-enable',
			),
		),
	];
	
	/**
	 * Function to receive specified setting value.
	 * 
	 * @since	1.0.0
	 * @param	string		$setting_name
	 * @param	string		$setting_path	Path to setting value in form
	 * @return	string/array
	 */
	public static function get_setting_value( $setting_name ){
		
		/**
		 * If array path provided, retrieve value at array index.
		 * Else, return setting name value.
		 */
		if( strpos( $setting_name, '\\' ) !== false ) {
			
			$setting_path = explode( '\\', $setting_name );
			
			$array_path = self::$settings;
			foreach( $setting_path as $index ) {
				$array_path = &$array_path[$index];
			}

			return $array_path; 
		}
		
		return self::$settings[$setting_name];
	}
}