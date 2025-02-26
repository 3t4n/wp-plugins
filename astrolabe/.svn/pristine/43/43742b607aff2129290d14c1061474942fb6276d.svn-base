<?php
/**
 * Abstract class for components
 *
 * @package Astrolabe
 * @since 1.0.0
 */

namespace ASTR\Public\Components;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Abstract class for components
 */
abstract class Component {

	/**
	 * Get the path to the template file
	 *
	 * @return string
	 */
	abstract protected function get_template_path();

	/**
	 * Render the component
	 *
	 * @return void
	 */
	public function render() {
		$template_path = $this->get_template_path();

		if ( false === $template_path ) {
			return;
		}

		if ( file_exists( $template_path ) ) {
			// Get the properties of the child class
			$vars = get_object_vars( $this );

			// Extract the variables to be used in the template
			extract( $vars, EXTR_SKIP );

			include $template_path;
		} else {
			echo 'Template not found: ' . esc_html( $template_path );
		}
	}
}

