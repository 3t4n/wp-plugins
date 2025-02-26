<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://profiles.wordpress.org/nababurbd/
 * @since      1.0.0
 *
 * @package    Appswiperslider_App_Swiper_Slider
 * @subpackage Appswiperslider_App_Swiper_Slider/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Appswiperslider_App_Swiper_Slider
 * @subpackage Appswiperslider_App_Swiper_Slider/includes
 * @author     Nababur <nababurbd@gmail.com>
 */
class Appswiperslider_App_Swiper_Slider_Dactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		// Flush rewrite rules to reset permalinks
		flush_rewrite_rules();
	}
}
