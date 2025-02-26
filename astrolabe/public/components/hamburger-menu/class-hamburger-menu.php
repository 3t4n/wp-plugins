<?php
/**
 * Hamburger menu class
 *
 * @link       https://takeoff.design/
 * @since      1.0.0
 *
 * @package    Astrolabe
 */

namespace ASTR\Public\Components\Hamburger_Menu;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use ASTR\Public\Components\Component;

/**
 * Expandable menu class
 *
 * @since      1.0.0
 * @package    Astrolabe
 * @author     Matt Bonacini
 */
class Hamburger_Menu extends Component {

	/**
	 * Get the template path
	 *
	 * @return string
	 */
	protected function get_template_path() {
		return __DIR__ . '/template.php';
	}

}
