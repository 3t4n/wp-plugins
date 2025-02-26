<?php
namespace WCPress\EasyMenuManager;

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin class
 *
 * @since 1.00.00
 */
final class EasyMenuManager {


	private static $self;

	/**
	 * @var array $container Holds all the initiated objects in the plugin
	 *
	 * @since 1.00.00
	 */
	private $container = [];

	/**
	 * @var string $version_string Semantic version number
	 *
	 * @since 1.00.00
	 */
	private $version_string = '1.00.00';

	/**
	 * @var int $version_number Numerical version number
	 *
	 * @since 1.00.00
	 */
	private $version_number = 10000;

	/**
	 * Initiating the plugin
	 *
	 * @since 1.00.00
	 *
	 * @return void
	 */
	private function __construct() {
		Constants::declareDynamicConstants();
		$this->container['assets'] = new Assets();
		$this->container['menu_fields'] = new MenuFields();
		$this->container['filter_menu_fields'] = new FilterMenuFields();
	}

	/**
	 * Returns the current class object
	 *
	 * @since 1.00.00
	 *
	 * @return EasyMenuManager
	 */
	public static function init(): EasyMenuManager {
		if ( empty( EasyMenuManager::$self ) ) {
			EasyMenuManager::$self = new EasyMenuManager();
		}
		return EasyMenuManager::$self;
	}

	/**
	 * Returns the container list
	 *
	 * @since 1.00.00
	 *
	 * @return array
	 */
	public function getContainer(): array {
		return $this->container;
	}

	/**
	 * Returns the version string
	 *
	 * @since 1.00.00
	 *
	 * @return string
	 */
	public function getVersionString(): string {
		return $this->version_string;
	}

	/**
	 * Returns the version integer
	 *
	 * @since 1.00.00
	 *
	 * @return int
	 */
	public function getVersionInt(): int {
		return $this->version_number;
	}

}