<?php
namespace MonetizeLinkPlugin;

class MLP_Base
{
	private static $instance;

	public static function plugin_init()
	{
		MLP_Config::get_instance();
		MLP_Assets::get_instance();
		MLP_Ajax::get_instance();
		MLP_Settings::get_instance();
		MLP_Popup::get_instance();
		MLP_Front::get_instance();
	}

	public static function get_instance()
	{
		if ( ! ( static::$instance instanceof static ) ) {
			static::$instance = new static();
		}
		return static::$instance;
	}
}
