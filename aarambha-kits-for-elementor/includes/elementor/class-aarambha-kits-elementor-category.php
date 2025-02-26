<?php
/**
 * Fired during plugin activation
 *
 * This class defines all code necessary to run during the plugin's activation for elementor.
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/includes/elementor
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

class Aarambha_Kits_Elementor_Category {

	/**
	 * Class Instance
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private static $instance = null;

	/**
	 * Class Construct
	 *
	 * @since    1.0.0
	 * @access   public
	 */

	public function __construct() {

		$this->register_aarambha_kits_elementor_category();
	}

	/*
	 * Create Aarambha Kits for Elementor Category
	 *
	 * Adds category `Aarambha Kits for Elementor` in the editor panel.
	 *
	 * @since	1.0.0
	 * @access  public
	 *
	 * @return void
	 *
	 */
	public function register_aarambha_kits_elementor_category() {
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'aarambha_kits_category',
			array(
				'title' => esc_html__( 'Aarambha Kits for Elementor', 'aarambha-kits' ),
				'icon'  => 'fa fa-plug',
			),
			1
		);
	}
	/**
	 * Creates and returns an instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return object
	 */
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
if ( ! function_exists( 'aarambha_kits_elementor_category' ) ) {

	/**
	 * Returns an instance of class.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	function aarambha_kits_elementor_category() {
		return Aarambha_Kits_Elementor_Category::get_instance();
	}
}
aarambha_kits_elementor_category();

