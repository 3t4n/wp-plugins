<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

final class BAPSActivityPlusStyling
{

	/*
	* BAPSActivityPlusStyling constructor
	*/
	public function __construct()
	{

		$this->define_constants();

		$this->bapsa_include();

	}

	/*
	* Define BAPSA constants
	*/
	public function define_constants()
	{

		// include php files
		$this->bapsa_define( 'BAPSA_PLUGIN_ABS_PATH', dirname( BAPSA_PLUGIN_PATH ) . '/' );

		// version
		$this->bapsa_define( 'BAPSA_PLUGIN_VERSION', '1.0' );

	}

	/*
	* Incude required core files
	*/
	public function bapsa_include()
	{

		// Basis functions
		require_once BAPSA_PLUGIN_ABS_PATH . 'includes/class-basis-plugin-class.php';

		// Part of the Frontend
		require_once BAPSA_PLUGIN_ABS_PATH . 'includes/admin/class-admin-main.php';

		// Part of the Frontend
		require_once BAPSA_PLUGIN_ABS_PATH . 'includes/frontend/class-frontend-main.php';

	}

	/*
	* Define function
	*/
	private function bapsa_define( $mame, $value )
	{

		if( ! defined( $mame ) )
		{

			define( $mame, $value );

		}

	}

}