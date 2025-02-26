<?php
/**
 * AjaxPress App
 *
 * @package AjaxPress
 * @since 1.3.0
 */

namespace AjaxPress;

/**
 * App Class
 */
class App extends Base {

	/**
	 * Default Options
	 *
	 * @return array
	 */
	public function default_options() {
		$options = [
			'navigation' => [
				'type'    => 'boolean',
				'default' => true,
			],
			'search'     => [
				'type'    => 'boolean',
				'default' => true,
			],
			'live_search'     => [
				'type'    => 'boolean',
				'default' => false,
			],
			'comment'    => [
				'type'    => 'boolean',
				'default' => true,
			],
			'target'     => [
				'type'    => 'string',
				'default' => 'main',
			],
			'excludes'   => [
				'type'    => 'string',
				'default' => '',
			],
		];

		return apply_filters( 'ajaxpress_default_options', $options );
	}

	/**
	 * Get Options
	 *
	 * @return array
	 */
	public function get_options() {
		$default_options = $this->default_options();

		$final_options = [];

		foreach ( $default_options as $key => $option ) {
			$option_key   = 'ajaxpress_' . $key;
			$option_value = get_option( $option_key, $option['default'] );

			switch ( $option['type'] ) {
				case 'boolean':
					$option_value = wp_validate_boolean( $option_value );
					break;
				case 'integer':
					$option_value = (int) $option_value;
					break;
			}

			$final_options[ $key ] = $option_value;
		}

		return $final_options;
	}
}
