<?php
/**
 * Handles options access.
 */
class wdshare_Options {
	private $_data;

	function __construct () {
		$this->_populate();
	}

	/**
	 * Gets a single option from options storage.
	 */
	function get_option ($key) {
		return @$this->_data[$key];
	}

	/**
	 * Sets all stored options.
	 */
	function set_options ($opts) {
		return WP_NETWORK_ADMIN ? update_site_option('wdshare', $opts) : update_option('wdshare', $opts);
	}

	/**
	 * Populates options key for storage.
	 *
	 */
	private function _populate () {
		$site_opts = get_site_option('wdshare');
		$site_opts = is_array($site_opts) ? $site_opts : array();

		$opts = get_option('wdshare');
		$opts = is_array($opts) ? $opts : array();

		$this->_data = array_merge($site_opts, $opts);
	}

}