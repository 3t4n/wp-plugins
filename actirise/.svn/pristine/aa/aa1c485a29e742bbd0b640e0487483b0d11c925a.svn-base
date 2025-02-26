<?php
namespace ActiriseAdmin\Includes;

use Actirise\Includes\Options;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The admin-specific functionality of the plugin.
 *
 * This class is a badge manager for wp-admin menu
 *
 * @link       https://actirise.com
 * @since      2.6.0
 * @package    actirise
 * @subpackage actirise/admin/includes
 * @author     actirise <wordpress@actirise.com>
 */
final class BadgeManager {
	/**
	 * Badges
	 *
	 * @since    2.6.0
	 * @access   private
	 * @var      array<string>    $badges    Badges
	 */
	private $badges = array();

	/**
	 * Initialize the class
	 *
	 * @since    2.6.0
	 */
	public function __construct() {
		$this->badges = array();
	}

	/**
	 * Initialize the class and add initial badges
	 *
	 * @since    2.6.0
	 * @return void
	 */
	public function init() {
		/** @var array<string> $presizeddiv_notif */
		$presizeddiv_notif = Options::get( 'presizeddiv-notif', array() );

		if ( count( $presizeddiv_notif ) > 0 ) {
			$this->add_badge( 'CoreWebVitals' );
		}

		if ( Options::get( 'adstxt-active', 'false' ) === 'false' && Options::get( 'adstxt-update', 'false' ) === 'true' ) {
			$this->add_badge( 'AdsTxt' );
		}

		if ( Options::get( 'cta-cache-200', false ) === false ) {
			$this->add_badge( 'Help' );
		}
	}

	/**
	 * Add badge
	 *
	 * @since    2.6.0
	 *
	 * @param string $menu_slug Name of the menu slug.
	 * @return void
	 */
	public function add_badge( $menu_slug ) {
		$this->badges[] = $menu_slug;
	}

	/**
	 * Get badges
	 *
	 * @since    2.6.0
	 *
	 * @return array<string> Badges
	 */
	public function get_badges() {
		return $this->badges;
	}
}
