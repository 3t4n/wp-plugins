<?php

/**
 * Fired during plugin uninstallation
 *
 * @link       https://ad.ink
 * @since      1.0.0
 *
 * @package    Ad_Ink
 * @subpackage Ad_Ink/includes
 */

/**
 * Fired during plugin uninstallation.
 *
 * This class defines all code necessary to run during the plugin's uninstallation.
 *
 * @since      1.0.0
 * @package    Ad_Ink
 * @subpackage Ad_Ink/includes
 * @author     Ad.Ink <contact@ad.ink>
 */
class Ad_Ink_Uninstallator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function uninstall() {
		delete_option('ad-ink-api-token');
		delete_option('ad-ink-post-types');
		delete_option('ad-ink-tag-id');
	}
}
