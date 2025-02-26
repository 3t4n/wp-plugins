<?php
defined( 'ABSPATH' ) || exit;

class EDD_Mollie_Helper {

	protected static $_instance = null;

	protected $api;

	protected $data;

	protected $settings;

	protected $url;

	/**
	 * Main Plugin Instance
	 *
	 * Ensures only one instance of plugin is loaded or can be loaded.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * Constructor
	 */
	public function __construct() {

	}

	/**
	 * Auto-load in-accessible properties on demand.
	 *
	 * @param mixed $key Key name.
	 * @return mixed
	 */
	public function __get( $key ) {
		$helper_classes = array(
			'api'            => 'Mollie_EDD_Helper_Api',
			'data'           => 'Mollie_EDD_Helper_Data',
			'settings'       => 'Mollie_EDD_Helper_Settings',
			'url'            => 'Mollie_EDD_Helper_Url',
		);
		if ( in_array( $key, array_keys($helper_classes), true ) ) {
			if (empty($this->$key)) {
				$helper_class = $helper_classes[$key];
				$this->$key = new $helper_class();
			}
			return $this->$key;
		}
	}

}
