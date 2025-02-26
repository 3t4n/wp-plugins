<?php

namespace AGA\Core;

/**
 * Class Init
 * @package AGA\Core
 */
class Init {

	/**
	 * @var
	 */
	private $version;

	/**
	 * @var
	 */
	private $path;

	/**
	 * Init the Plugin
	 *
	 * @param $version
	 * @param $path
	 */
	public function init_plugin( $version, $path ) {
		$this->version = $version;
		$this->path    = $path;

		if( is_admin() ) {
			new \AGA\Admin\Init();
		}
		else{
			new \AGA\Frontend\Init();
		}
	}

}