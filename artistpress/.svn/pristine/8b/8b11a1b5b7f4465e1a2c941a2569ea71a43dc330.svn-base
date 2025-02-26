<?php
namespace ArtistPress\Administration\Update;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

abstract class Controller
{
	protected $name;
    protected $version;
	protected $existingVersion;
	
	public function __construct($name, $version)
    {
		$this->name 	= $name;
		$this->version 	= $version;
		$this->existingVersion = \get_option('artistpress_version', null);
    }

	/**
	 * Runs the upgrade
	 * @access 	private
	 * @return 	string $address
     * 
	 */ 
    abstract public function run();
}