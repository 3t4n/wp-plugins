<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.sizeguarantee.com/
 * @since      1.0.0
 *
 * @package    Size_Guarantee
 * @subpackage Size_Guarantee/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Size_Guarantee
 * @subpackage Size_Guarantee/includes
 * @author     Size Guarantee <support@sizeguarantee.com>
 */
class Size_Guarantee_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		add_option('size-guarantee-connect',0);
		add_option('size_guarantee_store_id',0);
		add_option('size_guarantee_style',0);
		add_option('size-guarantee-connect',0);

	}

}
