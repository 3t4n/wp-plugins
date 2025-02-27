<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://plugin.nl/en/
 * @since      1.0.0
 *
 * @package    Websitescanner_Custom_Schema
 * @subpackage Websitescanner_Custom_Schema/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Websitescanner_Custom_Schema
 * @subpackage Websitescanner_Custom_Schema/public
 * @author     Tim van Iersel <tim@plugin.nl>
 */
class Websitescanner_Custom_Schema_Public {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		//$this->websitescanner_custom_schema_options = get_option($this->plugin_name);
	}

	public function get_page_json_ld(){
		// Get post id
		$post_ID = get_queried_object_id();

		// get page options
		$page_options = get_post_meta($post_ID, 'websitescanner_custom_schema_post_data', true);

		//if page options...
		if ($page_options) {
			$html = '';
			if (isset($page_options['custom_schema_0']) && $page_options['custom_schema_0'] != ""){
				$html .=  "<script type=application/ld+json>" . wp_unslash(json_decode($page_options['custom_schema_0'])) . "</script>";
			}
			if (isset($page_options['custom_schema_1']) && $page_options['custom_schema_1'] != ""){
				$html .=  "<script type=\"application/ld+json\">" . wp_unslash(json_decode($page_options['custom_schema_1']))  . "</script>";
			}
			if (isset($page_options['custom_schema_2']) && $page_options['custom_schema_2'] != ""){
				$html .=  "<script type=\"application/ld+json\">" . wp_unslash(json_decode($page_options['custom_schema_2']))  . "</script>";
			}
			echo $html;
		}
	}

}
