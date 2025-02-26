<?php
/**
 * Handle loading membership section files.
 *
 * @since 1.2.0
 */

namespace CP24\Tools\Inc\Membership;

defined( 'ABSPATH' ) || exit;

use CP24\Tools\Inc\Base;
use CP24\Tools\Inc\Membership\Login\Login;

class Membership extends Base {
	/**
	 * Section required files.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 * @var array $files
	 */
	protected $files = [
		'inc/membership/login/class-login.php',
	];

	protected function initialize() {
		new Login();
	}
}

new Membership();
