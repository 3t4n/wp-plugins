<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

/**
 * Create an instance of a class
 * @param string $className
 * @return object instance of a class
 */

if (!function_exists('ClassRegistry')) {
	function ClassRegistry($className)
	{
		return new $className();
	}
}

if (!function_exists('pr')) {
	function pr($array)
	{
		echo'<pre>';
		print_r($array);
		echo'</pre>';
	}
}

if (!function_exists('debug')) {
	function debug($array, $die = false) 
	{
		pr($array);
		if ($die) {
			exit;
		}
	}
}

if (!function_exists('dd')) {
	function dd($array, $die = false) 
	{
		var_dump($array);
		if ($die) {
			exit;
		}
	}
}

if (!function_exists('sdiAdminInclude')) {
	function sdiAdminInclude($path, $data = null)
	{
		if ($data) {
			extract($data);
		}
		include_once(SDI_PLUGIN_PATH . '/admin/' .$path);
	}
}

if (!function_exists('adminAlert')) {
	function adminAlert($alert, $alertType)
	{
		echo (new SdiScarcity())->alert($alert, $alertType);
	}
}