<?php
/**
 * PurgeBox Base Class.
 * @author ShoheiTai
 * @copyright 2016 REDBOX All Rights Reserved
 */
class PurgeBox_Plugin {

	/**
	 * Plugin version string.
	 * @var string
	 */
	const PLUGIN_NAME = 'PurgeBox';

	/**
	 * Plugin version value.
	 * @var integer
	 */
	const PLUGIN_VERSION = 1.0;

	/**
	 * Plugin basename.
	 * @var string
	 */
	const PLUGIN_FILE = PURGEBOX_PLUGIN_FILE;

	/**
	 * Option key prefix.
	 * @var string
	 */
	protected static $_option_prefix = 'purgebox_';

	/**
	 * Get option value.
	 * @param strng $name
	 * @return string
	 */
	protected static function _get_option( $name ) {


		// マルチサイトの場合、ネットワーク設定を確認
		if (is_multisite()) {
			$network_value = get_site_option('purgebox_' . $name);
			if ($network_value !== false && $network_value !== '') {
				return $network_value; // ネットワーク設定が有効ならそれを返す
			}
		}

		// ネットワーク設定が空の場合、子サイトの設定を返す
		return get_option(self::$_option_prefix . $name);

	}

	/**
	 * Get plugin basename.
	 * @return string
	 */
	protected static function _get_plugin_basename() {
		return plugin_basename( self::PLUGIN_FILE );
	}

	/**
	 * Get plugin url.
	 * @return string
	 */
	protected static function _get_plugin_url( $path ) {
		return plugins_url( $path, self::PLUGIN_FILE );
	}

	/**
	 * Check if API is valid.
	 * @return boolean
	 */
	protected static function _api_available() {
		return self::_get_option( 'api_key' ) && self::_get_option( 'version' ) && self::_get_option( 'group' );
	}
}
