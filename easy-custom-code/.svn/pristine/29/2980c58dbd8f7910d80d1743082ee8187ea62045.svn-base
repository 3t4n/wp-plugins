<?php
/* ======================================================
 # Easy Custom Code (LESS/CSS/JS) - Live editing for WordPress - v1.1.2 (free version)
 # -------------------------------------------------------
 # Author: Web357
 # Copyright © 2014-2025 Web357. All rights reserved.
 # License: GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html
 # Website: https://www.web357.com/easy-custom-code-wordpress-plugin
 # Demo: https://demo-wordpress.web357.com/
 # Support: https://www.web357.com/support
 # Last modified: Friday 31 January 2025, 12:48:01 AM
 ========================================================= */
/**
 * Define the internationalization functionality
 */
class EasyCustomCode_settings {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * This fields
	 *
	 * @var [class]
	 */
	public $fields;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->fields = new EasyCustomCode_fields();
	}

	/**
	 * Adds the option in WordPress Admin menu
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function options_page() 
	{
		add_options_page( 
			esc_html__( 'Easy Custom Code settings', 'easy-custom-code'),
			'Easy Custom Code',
			'manage_options', 
			'easy-custom-code',
			array($this, 'options_page_content') 
		);
	}

	/**
	 * Adds the admin page content
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function options_page_content() 
	{
		include_once(plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings-view.php');
	}

	/**
	 * Function that will validate all fields.
	 */
	public function validateSettings( $fields ) 
	{ 
		$options = get_option( 'easy_custom_code_options' );
		$valid_fields = array();
		$message = null;
		$type = null;

		// Validate "js_position" Field
		$js_position = sanitize_text_field($fields['js_position']);
		$js_position = (!empty($js_position)) ? $js_position : 'footer';
		$js_position = trim($js_position);
		$js_position = wp_strip_all_tags(stripslashes($js_position));

		if ($js_position == 'footer' || $js_position == 'head') {
			$message = esc_html__('Option saved successfully!', 'easy-custom-code');
			$type = 'updated';
			$valid_fields['js_position'] = $js_position;
		} else {
			$valid_fields['js_position'] = 'footer';
		}
		
		

		return apply_filters( 'validateSettings', $valid_fields, $fields);
	}

	/**
	 * Initialize the settings link
	 *
	 * @access   public
	 */
	public function settings_link($links) 
	{
		$link = 'options-general.php?page=' . 'easy-custom-code';
		$settings_link = '<a href="'.esc_url($link).'">'.esc_html__( 'Settings', 'easy-custom-code' ).'</a>';
		array_push( $links, $settings_link );
		return $links;
	}

	/**
	 * Initialize the settings page
	 *
	 * @since    3.2.0
	 * @access   public
	 */
	public function settings_init() 
	{
		/**
		 * REGISTER SETTINGS
		 */
		register_setting( 'easy-custom-code', 'easy_custom_code_options', array($this, 'validateSettings'));

		/**
		 * SECTIONS
		 */
		add_settings_section(
			'base_settings_section', 
			'', 
			'',
			'easy-custom-code'
		);

		/**
		 * Define Vars
		 */
		// Type of the Toolbar Content
		$options = get_option( 'easy_custom_code_options' );

		/**
		 * FIELDS
		 */		

		 // Choose the javascript position
		add_settings_field( 
			'js_position', 
			esc_html__( 'JavaScript Position', 'easy-custom-code' ),
			array($this->fields, 'radioField'),
			'easy-custom-code', 
			'base_settings_section',
			[
				'id' => 'js_position',
				'class' => '',
				'name' => 'js_position',
				'default_value' => 'footer',
				'label-for' => 'js_position',
				'options' => [
					['id' => 'footer', 'label' => 'Footer (before &lt;/body&gt; tag) ('.esc_html__( 'recommended', 'easy-custom-code' ).')', 'value' => 'footer'],
					['id' => 'head', 'label' => 'Head (in &lt;head&gt;) tag', 'value' => 'head']
				],
				'field_description' => esc_html__('Choose where to place the JavaScript custom code and the external JS Scripts. Default is the "Footer" position.', 'easy-custom-code'),
			]
		);
		
		
	}
}