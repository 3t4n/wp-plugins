<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.popeating.it
 * @since      1.0.0
 *
 * @package    Post_Read_Time
 * @subpackage Post_Read_Time/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Post_Read_Time
 * @subpackage Post_Read_Time/includes
 * @author     Lorenzo Noccioli <lennaz@gmail.com>
 */
if ( ! defined( 'ABSPATH' ) ) exit;
class Post_Read_Time_Activator {
	/**
	 * Basic Values.
	 *
	 * Set the options values needed for plugin to run at activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$options= array (
			'words'=>'230',
			'auto'=>1,
			'images'=>1,
			'singular'=>'Minute',
			'plural'=>'Minutes',
			'text_before'=>'Reading time:',
			'include_css'=>1,
			'class'=>'ttr_minutes',
			'class_tb'=>'ttr_before',
			'class_ta'=>'ttr_after',
			'on_pages'=>0
			
		);
		add_option( 'post-read-time_options', $options);
		add_option('post-read-time_do_activation_redirect', true);
	}

}