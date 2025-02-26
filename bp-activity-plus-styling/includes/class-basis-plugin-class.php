<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class BAPSABasisPluginClass
{

	public static function activate()
	{
		// ...
	}

	public static function deactivate()
	{
		// ...
	}

	public static function uninstall()
	{

		if ( BAPSA__FILE__ != WP_UNINSTALL_PLUGIN ) {

			return;

		}
		
	}

}