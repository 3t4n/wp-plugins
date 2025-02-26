<?php
/**
 * Menu class
 *
 * @link       https://takeoff.design/
 * @since      1.0.0
 *
 * @package    Astrolabe
 */

namespace ASTR\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Menu class
 *
 * @since      1.0.0
 * @package    Astrolabe
 * @author     Matt Bonacini
 */
class Menu {

	/**
	 * Astrolabe Format
	 *
	 * @var string
	 */
	private $astrolabe_format = 'default';

	/**
	 * Constructor
	 */
	public function __construct() {
		// Register menu location
		add_action( 'init', array( $this, 'register' ) );

		// Append menu to the front-end
		add_action( 'wp_body_open', array( $this, 'main_astrolabe_wrapper' ) );

		// Append menu extension to body open
		add_action( 'wp_body_open', 'astr_hamburger_menu' );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_menu_scripts' ) );
	}

	/**
	 * Register the main menu location for Astrolabe
	 */
	public function register() {

		// Set Astrolabe Format with the correct option value
		$this->astrolabe_format = get_option( 'astr_astrolabe_format' );

		register_nav_menus(
			array(
				'astrolabe-menu'           => 'Astrolabe Default Menu (Add up to 3 to 4 items)',
				'astrolabe-hamburger-menu' => 'Astrolabe Modal Menu (Hamburger Menu)',
			)
		);
	}

	/**
	 * Append the main menu location for Astrolabe to the front-end
	 */
	public function append_primary_menu() {

		$astro_theme_class = \ASTR\Admin\Plugin_Settings::astro_theme_class();

		$args = array(
			'theme_location'       => 'astrolabe-menu',
			'menu_class'           => 'wa-astro-fixed-menu wa-astro-theme ' . $astro_theme_class,
			'container'            => 'nav',
			'container_id'         => 'wa-astro-default-nav-menu-container',
			'container_class'      => 'wa-astro-' . $this->astrolabe_format,
			'container_aria_label' => 'Navigation',
			'fallback_cb'          => false,
			'echo'                 => false,
		);

		return wp_nav_menu( $args );
	}

	/**
	 * Main Astrolabe Wrapper Component
	 */
	public function main_astrolabe_wrapper() {

		$astro_theme_class = \ASTR\Admin\Plugin_Settings::astro_theme_class();

		$html  = '<div id="wa-astrolabe-wrapper" class="wa-astrolabe-wrapper wa-astro-theme ' . $astro_theme_class . '">';
		$html .= $this->append_main_component();
		$html .= '</div>';

		echo wp_kses_post( $html );
	}

	/**
	 * Select the right Astrolabe component to append depending on Astrolabe Format setting
	 */
	private function append_main_component() {
		if ( 'modal-menu' === $this->astrolabe_format ) {
			return $this->append_hamburger_menu();
		} else {
			return $this->append_primary_menu();
		}
	}

	/**
	 * Hamburger / Modal Menu Trigger component
	 */
	private function append_hamburger_menu() {
		$html = '';

		$main_astro_menu_id    = astr_get_menu_id( 'astrolabe-hamburger-menu' );
		$main_astro_menu_items = wp_get_nav_menu_items( $main_astro_menu_id );

		if ( $main_astro_menu_items ) {
			// Check if $main_astro_menu_items is array and not empty
			if ( is_array( $main_astro_menu_items ) || ! empty( $main_astro_menu_items ) ) {
				$html = '<div class="wa-astro-model-menu-component">
							<a id="wa-astro-modal-menu-trigger" href="#" class="wa-astro-more-menu-link">
									Menu
							</a>
						</div>';
			}
		}

		return $html;
	}

	/**
	 * Enqueue Menu Scripts
	 */
	public function enqueue_menu_scripts() {

		if ( ! is_admin() ) {
			// If astrolabe_format is equal to modal-menu
			if ( 'modal-menu' === $this->astrolabe_format ) {
				// Styles for Hamburger Menu
				wp_enqueue_style( 'astrolabe-hamburger-style', ASTR_PLUGIN_URL . '/public/components/hamburger-menu/astro-hamburger-menu.min.css', array(), ASTR_PLUGIN_VERSION );

				wp_enqueue_script( 'astrolabe-hamburger-script', ASTR_PLUGIN_URL . '/public/components/hamburger-menu/astro-hamburger-menu.min.js', array(), ASTR_PLUGIN_VERSION, true );
			}
		}

	}

}
