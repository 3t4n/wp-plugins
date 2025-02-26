<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.popeating.it
 * @since      1.0.0
 *
 * @package    Post_Read_Time
 * @subpackage Post_Read_Time/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version and
 * setups the menu link and options page
 *
 * @package    Post_Read_Time
 * @subpackage Post_Read_Time/admin
 * @author     Lorenzo Noccioli <lennaz@gmail.com>
 */
class PRT_Admin {
	
	public function __construct() {
        $this->plugin_name = 'post-read-time';
		$this->version = '1.0.0';

    }
	

		
	public function add_options_page() {
 
        add_options_page(
            __('Post Read Time', 'post-read-time'),
            __('Post Read Time', 'post-read-time'),
            'manage_options',
            'post-read-time',
            array( $this, 'render' )
        );
    }
	public function render() {
        include_once( 'admin-display.php' );
    }
	
	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name.'_options', array($this, 'validate_options'));
	}
	
	public function validate_options($input) {
		$options_o = get_option( $this->plugin_name.'_options' );
		if (isset($_REQUEST[$this->plugin_name.'_options'])) {
				$valid = array();
				$input['words'] = intval( $input['words'] );
				$input['text_before']= sanitize_text_field($input['text_before']);
				$input['singular']= sanitize_text_field($input['singular']);	
				$input['plural']= sanitize_text_field($input['plural']);
				$input['class']= sanitize_text_field($input['class']);
				$input['class_ta']= sanitize_text_field($input['class_ta']);	
				$input['class_tb']= sanitize_text_field($input['class_tb']);
				return $input;
		} else {
			return $options_o;
		}
		
		
	}
	
	public function add_action_links( $links ) {
		/*
		*  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
		*/
	   $settings_link = array(
		'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', 'post-read-time') . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}
}