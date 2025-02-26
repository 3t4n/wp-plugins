<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://github.com/thechetanvaghela
 * @since      1.0.0
 *
 * @package    Manage_Remove_Version_Number_From_Css_Js
 * @subpackage Manage_Remove_Version_Number_From_Css_Js/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Manage_Remove_Version_Number_From_Css_Js
 * @subpackage Manage_Remove_Version_Number_From_Css_Js/public
 * @author     Chetan Vaghela <ckvaghela92@gmail.com>
 */
class Manage_Remove_Version_Number_From_Css_Js_Public {

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

	}

	/**
	 * manage/remove version numbers of js/css
	 * @param $src
	 *
	 * @return string
	 */
	public function cv_remove_wp_ver_css_js( $src ) {

		# get selected option
		$selected_option = get_option('cv-version-number-option');
		$selected_option = !empty($selected_option) ? esc_attr($selected_option) : '';
		if($selected_option == 'timestamp')
		{
			if (strpos($src, 'ver=')) {
				$path = parse_url($src, PHP_URL_PATH);
				$slug_abs_path = $_SERVER['DOCUMENT_ROOT'] . $path;
				if (file_exists($slug_abs_path)) {
					$filetime = filemtime($slug_abs_path);
					$src = remove_query_arg('ver', $src);
					$src = add_query_arg(array('ver' => $filetime), $src);
				}
			}
			return $src;
		}
		else if($selected_option == 'remove')
		{
			if ( strpos( $src, 'ver=' ) )
			{
				$src = remove_query_arg( 'ver', $src );	
			}
			return $src;
		}
		else
		{
			return $src;
		}
	}
}
