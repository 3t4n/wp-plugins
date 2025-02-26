<?php

/*
Plugin Name: Adistry Ad Plugin
Plugin URI: Adistry
Description: Easily display Adistry ads anywhere on your Wordpress website using shortcodes.
Version: 1.0
Author: Adistry
Author URI: https://adistry.com/
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

if (!class_exists('Adistry')) 
{
	class Adistry
	{
		/**
		 * Tag identifier used by file includes and selector attributes.
		 * @var string
		 */
		protected $tag = 'adistry';

		/**
		 * User friendly name used to identify the plugin.
		 * @var string
		 */
		protected $name = 'Adistry';

		/**
		 * Current version of the plugin.
		 * @var string
		 */
		protected $version = '1.0';

		public function __construct()
		{
			add_shortcode($this->tag, array(&$this, 'adzone'));
			wp_enqueue_script('adistry-adserver', 'https://serve.adistry.com/s.js', array(), '1.0', true);
		}

		public function adzone($atts)
		{
			extract(shortcode_atts(array(
				'adzone_id' => false
			), $atts));

			ob_start();
			?>

			<div id="adistry-adzone-<?php echo $adzone_id; ?>-container" class="adistry-ad-container" data-adzone-id="<?php echo $adzone_id; ?>"></div>

			<?php
			return ob_get_clean();
		}
	}

	add_filter('widget_text', 'do_shortcode');

	new Adistry;
}