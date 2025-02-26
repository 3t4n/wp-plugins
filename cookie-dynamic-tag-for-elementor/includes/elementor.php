<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Dynamic Tag - Cookie
 *
 * Elementor dynamic tag that returns a cookie.
 *
 * @since 1.0.0
 */
class Elementor_Dynamic_Tag_Cookie extends \Elementor\Core\DynamicTags\Tag {
	/**
	 * Get dynamic tag name.
	 *
	 * Retrieve the name of the cookie tag.
	 *
	 * @return string Dynamic tag name.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'cookie';
	}

	/**
	 * Get dynamic tag title.
	 *
	 * Returns the title of the cookie tag.
	 *
	 * @return string Dynamic tag title.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_title() {
		return esc_html__( 'Cookie', 'cookie-dynamic-tag' );
	}

	/**
	 * Get dynamic tag groups.
	 *
	 * Retrieve the list of groups the cookie tag belongs to.
	 *
	 * @return array Dynamic tag groups.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_group() {
		return [ 'site' ];
	}

	/**
	 * Get dynamic tag categories.
	 *
	 * Retrieve the list of categories the cookie tag belongs to.
	 *
	 * @return array Dynamic tag categories.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_categories() {
		return [ \Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY ];
	}

	/**
	 * Register dynamic tag controls.
	 *
	 * Add input fields to allow the user to customize the cookie tag settings.
	 *
	 * @return void
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->add_control(
			'cookie_name',
			[
				'label' => esc_html__( 'Cookie Name', 'cookie-dynamic-tag' ),
				'type'  => 'text',
			]
		);
	}

	/**
	 * Render tag output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @return void
	 * @since 1.0.0
	 * @access public
	 */
	public function render() {
		$name = $this->get_settings( 'cookie_name' );
		if ( isset( $_COOKIE[ $name ] ) && ! empty( $_COOKIE[ $name ] ) ) {
			echo esc_html( $_COOKIE[ $name ] );
		}
	}
}