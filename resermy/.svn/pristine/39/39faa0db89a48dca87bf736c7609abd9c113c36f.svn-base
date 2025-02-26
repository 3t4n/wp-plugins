<?php
/*
 *
 * @link              https://resermy.com
 * @since             1.0.0
 * @package           Resermy
 *
 * @wordpress-plugin
 * Plugin Name:  Online Booking for Barbershops and Salons
 * Plugin URI:   https://resermy.com/wordpress
 * Description:  Resermy is an all-in-one Online Booking App, specially designed for Hair Salons & Beauty Salons. This plugin allows you to start accepting online appointments on your website. You can also manage your bookings and receive alerts using our mobile app (iOS and Android).
 * Version:      1.0.0
 * Author:       Resermy
 * Author URI:   https://resermy.com
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:  Resermy
 * Domain Path:  /languages
 * Network:      true

"Resermy" is also commonly known as, or part of "Resermy for WordPress", "Online Appointments by Resermy", "Online Booking for Barbershops and Salons".

Resermy is a free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Resermy is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Resermy for WordPress. If not, see https://www.gnu.org/licenses/gpl-2.0.html.

*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function resermy_freemius() {
	global $resermy;

	if ( ! isset( $resermy ) ) {
		// Include Freemius SDK.
		require_once dirname( __FILE__ ) . '/freemius/start.php';

		$resermy = fs_dynamic_init( array(
			'id'               => '2720',
			'slug'             => 'resermy',
			'type'             => 'plugin',
			'public_key'       => 'pk_4fed16b0bbbe2eb8ef68526f1f806',
			'is_premium'       => false,
			'has_addons'       => false,
			'has_paid_plans'   => false,
			'is_org_compliant' => false,
			'menu'             => array(
				'slug'       => 'resermy_admin',
				'account'    => false,
				'contact'    => false,
				'support'    => false,
			),
		) );
	}

	return $resermy;
}

// Init Freemius.
resermy_freemius();
// Signal that SDK was initiated.
do_action( 'resermy_loaded' );

require_once( dirname( __FILE__ ) . '/includes/vars.php' );
require_once( dirname( __FILE__ ) . '/admin/resermy-admin.php' );
require_once( dirname( __FILE__ ) . '/public/resermy-client.php' );

function resermy_init() {
	if ( is_admin() ) {
		resermy_init_admin();
	} else {
		resermy_init_client();
	}
}

add_action( 'init', 'resermy_init' );