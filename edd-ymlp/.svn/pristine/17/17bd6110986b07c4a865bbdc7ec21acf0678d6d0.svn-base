<?php

class EDD_YMLP {

	private static $instance;
	private static $api;
	
	public function __construct()
	{
		self::$instance = $this;

		// no need to do anything on AJAX requests
		

		// backend and frontend
		// nothing

		if(is_admin() && !defined("DOING_AJAX")) {
			// backend only
			require EDD_YMLP_PLUGIN_DIR . '/includes/EDD_YMLP_Admin.php';
			new EDD_YMLP_Admin();
		} else {
			// frontend only
			require EDD_YMLP_PLUGIN_DIR . '/includes/EDD_YMLP_Checkbox.php';
			new EDD_YMLP_Checkbox();
		}

		
	}

	public static function instance() 
	{
		return self::$instance;
	}

	public static function api()
	{
		if(!self::$api) {
			$s = self::instance()->get_settings();

			require EDD_YMLP_PLUGIN_DIR . '/includes/EDD_YMLP_API.php';
			self::$api = new EDD_YMLP_API($s['api_key'], $s['username']);
		}

		return self::$api;
	}

	public function get_default_settings()
	{
		return array(
			'precheck' => 0,
			'label_text' => "Sign up to the newsletter.",
			'api_key' => '',
			'username' => '',
			'load_css' => 0,
			'group' => 1
		);
	}

	public function get_settings()
	{
		$edd_settings_misc = get_option( 'edd_settings', false );

		$settings = array();
		if($edd_settings_misc && is_array($edd_settings_misc)) {
			foreach($edd_settings_misc as $key => $value) {
				if(substr($key, 0, 5) == 'ymlp_') {
					$settings[substr($key, 5)] = $value;
				}
			}
		}

		return array_merge($this->get_default_settings(), $settings);
	}

}