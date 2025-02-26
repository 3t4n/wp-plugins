<?php
namespace ArtistPress\Includes;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class Localization
{
	/**
	 * Load the plugin text domain for translation.
	 * @since 1.5.0
	 */
	public function loadPluginTextdomain() 
	{
		load_plugin_textdomain(
			'artistpress',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}