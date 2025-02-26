<?php
/**
 * Checks whether the current php and Wordpress version is supported by
 * the plugin.
 *
 * @since      1.6.0
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/includes
 */

/**
 * Checks whether the current php and Wordpress version is supported by
 * the plugin.
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/includes
 * @author     Foteini Giannaropoulou <foteini.giannaropoulou@exitbee.com>
 */
class Exit_Bee_Requirements_Check {

	/**
	 * The result of the php version check.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      string    $required_php    Minimum required PHP version.
	 */
	private $required_php = '5.2.4';
	/**
	 * The result of the wp version check.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      string    $required_wp    Minimum required WordPress version.
	 */
	private $required_wp = '3.8';

	/**
	 * The result of the php version check.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      bool    $php_pass    The result of the php version check.
	 */
	private $php_pass;
	/**
	 * The result of the wp version check.
	 *
	 * @since    1.6.0
	 * @access   private
	 * @var      bool    $wp_pass    The result of the wp version check.
	 */
	private $wp_pass;

	/**
	 * Constructor.
	 *
	 * @since    1.6.0
	 * @access   public
	 *
	 * @param string $required_php   Minimum required php version.
	 * @param string $required_wp    Minimum required WordPress version.
	 */
	public function __construct( $required_php, $required_wp ) {
		if ( $required_php ) {
			$this->required_php = $required_php;
		}
		if ( $required_wp ) {
			$this->required_wp = $required_wp;
		}
	}

	/**
	 * Checks if the php requirements are met.
	 *
	 * @return object instance of Exit_Bee_Requirements_Check
	 */
	private function php_check() {
		$this->php_pass = version_compare( phpversion(), $this->required_php, '>=' );

		return $this;
	}

	/**
	 * Checks if the wp requirements are met.
	 *
	 * @return object instance of Exit_Bee_Requirements_Check
	 */
	private function wp_check() {
		$this->wp_pass = version_compare( get_bloginfo( 'version' ), $this->required_wp, '>=' );

		return $this;
	}

	/**
	 * Returns the result of the requirements check.
	 *
	 * @return bool The result of the requirements version check.
	 */
	public function passes() {
		return $this->php_passes() && $this->wp_passes();
	}

	/**
	 * Returns the result of the php requirement check.
	 *
	 * @return bool The result of the php version check.
	 */
	public function php_passes() {

		return $this->php_pass ? $this->php_pass : $this->php_check()->php_pass;
	}

	/**
	 * Returns the result of the wp requirement check.
	 *
	 * @return bool The result of the wp version check.
	 */
	public function wp_passes() {
		return $this->wp_pass ? $this->wp_pass : $this->wp_check()->wp_pass;
	}
}
