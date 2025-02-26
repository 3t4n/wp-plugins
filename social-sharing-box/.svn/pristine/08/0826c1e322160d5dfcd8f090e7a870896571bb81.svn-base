<?php
/**
 * Installs the database, if it's not already present.
 */
class wdshare_Installer {

	/**
	 * @public
	 * @static
	 */
	function check () {
		$is_installed = get_site_option('wdshare', false);
		$is_installed = $is_installed ? $is_installed : get_option('wdshare', false);
		if (!$is_installed) wdshare_Installer::install();
	}

	/**
	 * @private
	 * @static
	 */
	function install () {
		$me = new wdshare_Installer;
		$me->create_default_options();
	}

	/**
	 * @private
	 */
	function create_default_options () {
		update_site_option('wdshare', array (
			'services' => array('google', 'facebook', 'twitter', 'stumble_upon'),
			'min_width' => '1200',
		));
	}
}