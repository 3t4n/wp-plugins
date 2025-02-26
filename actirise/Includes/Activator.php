<?php
namespace Actirise\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Actirise\Includes\Cron;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @link       https://actirise.com
 * @since      2.0.0
 * @package    actirise
 * @subpackage actirise/includes
 * @author     actirise <wordpress@actirise.com>
 */
final class Activator {

	/**
	 * Activate the plugin and schedule the cron.
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public static function activate() {
		$cron = new Cron();
		$cron->update_adstxt();
		$cron->check_presized_div();
		$cron->get_fast_cmp();

		if ( version_compare( get_bloginfo( 'version' ), '5.5', '>=' ) ) {
			$cron->set_auto_update( true );
		}

		$cron->schedule();
	}
}
