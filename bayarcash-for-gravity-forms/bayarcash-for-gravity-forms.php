<?php

/**
 * Plugin Name: Bayarcash for Gravity Forms
 * Plugin URI: https://bayarcash.com
 * Description: Bayarcash is a local Malaysia payment gateway that support FPX, Direct Debit, DuitNow QR, DuitNow Online Banking/Wallets, BNPL (SPayLater & Boost PayFlex) as well cross-border payment (Indonesia, Singapore & Thailand).
 * Version: 1.0.0
 * Author: Web Impian
 * Author URI: https://webimpian.com
 * License: GNU General Public License v3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: bayarcash-for-gravity-forms
 * Requires PHP: 7.4
 * Requires at least: 5.0
 * Tested up to: 6.7
 */

defined( 'ABSPATH' ) || die();

const GF_BAYARCASH_MODULE_VERSION = 'v1.0.0';
define( 'GF_BAYARCASH_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

add_action( 'gform_loaded', array( 'GF_BAYARCASH_Bootstrap', 'load_addon' ), 5 );
class GF_BAYARCASH_Bootstrap {
	public static function load_addon() {
		// Include necessary PHP files
		require_once GF_BAYARCASH_PLUGIN_PATH . '/api.php';
		require_once GF_BAYARCASH_PLUGIN_PATH . '/class-gf-bayarcash.php';

		GFAddOn::register('GF_Bayarcash');
		add_filter('plugin_action_links_' . plugin_basename(__FILE__), array('GF_BAYARCASH_Bootstrap', 'gf_bayarcash_setting_link'));
	}


	public static function gf_bayarcash_setting_link($links): array {
		$new_links = array(
			'settings' => sprintf(
				'<a href="%1$s">%2$s</a>',
				admin_url('admin.php?page=gf_settings&subview=bayarcash-for-gravity-forms'),
				esc_html__('Settings', 'bayarcash-for-gravity-forms')
			)
		);

		return array_merge($new_links, $links);
	}
}
