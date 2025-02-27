<?php
/**
 * Gamajo Registerable Interface
 *
 * @package   Multiple_Portfolios_Gamajo_Registerable
 * @author    Gary Jones
 * @link      http://gamajo.com/registerable
 * @copyright 2013 Gary Jones
 * @license   GPL-2.0+
 * @version   1.0.0
 */

/**
 * Handle registration for something like a post type or taxonomy.
 *
 * @package Multiple_Portfolios_Gamajo_Registerable
 * @author  Gary Jones
 */
interface Multiple_Portfolios_Gamajo_Registerable {
	public function register();
	public function unregister();
	public function set_args( $args = null );
	public function get_args();
}
