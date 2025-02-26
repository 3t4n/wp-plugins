<?php

namespace CP24\Tools\Inc\Layout;

defined( 'ABSPATH' ) || exit;

use CP24\Tools\Inc\Base;
use CP24\Tools\Inc\Layout\Footer\Footer;
use CP24\Tools\Inc\Layout\Header\Header;
use CP24\Tools\Inc\Layout\Page\Page;

class Layout extends Base {
	/**
	 * Section required files.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 * @var array $files
	 */
	protected $files = [
		'inc/layout/header/class-header.php',
		'inc/layout/footer/class-footer.php',
		'inc/layout/page/class-page.php',
	];

	public function __construct() {
		parent::__construct();

		// Rest section common hook.
	}

	/**
	 * Initialize loaded files.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 * @return void
	 */
	protected function initialize() {
		new Header();
		new Footer();
		new Page();
	}
}

new Layout();
