<?php
/**
 * Builds the dynamic CSS.
 *
 * @package ShopCred
 */

 namespace ShopCred;
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Generates dynamic css via PHP.
 */
class Dynamic_CSS {

	/**
	 * The css selector that you're currently adding rules to
	 *
	 * @access protected
	 * @var string
	 */
	protected $_selector = ''; 

	/**
	 * Stores the final css output with all of its rules for the current selector.
	 *
	 * @access protected
	 * @var string
	 */
	protected $_selector_output = ''; 

	/**
	 * Stores all of the rules that will be added to the selector
	 *
	 * @access protected
	 * @var string
	 */
	protected $_css = '';

	/**
	 * The string that holds all of the css to output
	 *
	 * @access protected
	 * @var array
	 */
	protected $_output = array();

	/**
	 * Sets a selector to the object and changes the current selector to a new one
	 *
	 * @access public
	 * @since  1.0.0
	 *
	 * @param  string $selector - the css identifier of the html that you wish to target.
	 * @return $this
	 */
	public function set_selector( $selector = '' ) {
		// Render the css in the output string everytime the selector changes.
		if ( '' !== $this->_selector ) {
			$this->add_selector_rules_to_output();
		}

		$this->_selector = $selector;
		return $this;
	}

	/**
 	* Checks whether a value exists, even if it's a 0.
	*
	* @param int|string $value The value to check.
	* @since 1.0.0
	*/
	public function has_number_value( $value ) {
		if ( $value || 0 === $value || '0' === $value ) {
			return true;
		}

		return false;
	}

	/**
	 * Shorthand CSS values (padding, margin, border etc..).
	 *
	 * @since 1.0.0
	 *
	 * @param int    $top The first value.
	 * @param int    $right The second value.
	 * @param int    $bottom The third value.
	 * @param int    $left The fourth value.
	 * @param string $unit The unit we're adding.
	 *
	 * @return string The shorthand value.
	 */
	public function get_shorthand_css( $top, $right, $bottom, $left, $unit, $color = '', $position = '' ) {
		if ( '' === $top && '' === $right && '' === $bottom && '' === $left ) {
			return;
		}

		$top = ( floatval( $top ) <> 0 ) ? floatval( $top ) . $unit . ' ' : '0 '; // phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison
		$right = ( floatval( $right ) <> 0 ) ? floatval( $right ) . $unit . ' ' : '0 '; // phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison
		$bottom = ( floatval( $bottom ) <> 0 ) ? floatval( $bottom ) . $unit . ' ' : '0 '; // phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison
		$left = ( floatval( $left ) <> 0 ) ? floatval( $left ) . $unit . ' ' : '0 '; // phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison

		if ( !empty( $color ) ) {
			$color = $color . ' ';
		} else {	
			if ( $right === $left ) {
				$left = '';

				if ( $top === $bottom ) {
					$bottom = '';

					if ( $top === $right ) {
						$right = '';
					}
				}
			}
		}

		return trim( $top . $right . $bottom . $left . $color . $position );
	}

	/**
	 * Adds a css property with value to the css output
	 *
	 * @access public
	 * @since  1.0.0
	 *
	 * @param  string $property - the css property.
	 * @param  string $value - the value to be placed with the property.
	 * @param  string $unit - the unit for the value (px).
	 * @return $this
	 */
	public function add_property( $property, $value, $unit = false ) {
		if ( empty( $value ) && ! is_numeric( $value ) ) {
			return false;
		}

		if ( is_array( $value ) && ! array_filter( $value, 'is_numeric' ) ) {
			return false;
		}

		if ( is_array( $value ) ) {
			$valueTop = $this->has_number_value( $value[0] );
			$valueRight = $this->has_number_value( $value[1] );
			$valueBottom = $this->has_number_value( $value[2] );
			$valueLeft = $this->has_number_value( $value[3] );

			if ( $valueTop && $valueRight && $valueBottom && $valueLeft ) {

				if ( 'box-shadow' === $property ) {
					$value = $this->get_shorthand_css( $value[0], $value[1], $value[2], $value[3], $unit, $value[4], $value[5] );
				} else {
					$value = $this->get_shorthand_css( $value[0], $value[1], $value[2], $value[3], $unit );
				}

				if ( 'border-width' === $property ) {
					$this->_css .= 'border-style: solid;';
				}

				$this->_css .= $property . ':' . $value . ';';
				return $this;
			} else {
				if ( $valueTop ) {
					$property_top = $property . '-top';
					$unit_top = $unit;

					if ( 'border-radius' === $property ) {
						$property_top = 'border-top-left-radius';
					} elseif ( 'border-width' === $property ) {
						$property_top = 'border-top-width';
						$this->_css .= 'border-top-style: solid;';
					}

					if ( 0 === $value[0] || '0' === $value[0] ) {
						$unit_top = '';
					}

					$this->_css .= $property_top . ':' . $value[0] . $unit_top . ';';
				}

				if ( $valueRight ) {
					$property_right = $property . '-right';
					$unit_right = $unit;

					if ( 'border-radius' === $property ) {
						$property_right = 'border-top-right-radius';
					} elseif ( 'border-width' === $property ) {
						$property_right = 'border-right-width';
						$this->_css .= 'border-right-style: solid;';
					}

					if ( 0 === $value[1] || '0' === $value[1] ) {
						$unit_right = '';
					}

					$this->_css .= $property_right . ':' . $value[1] . $unit_right . ';';
				}

				if ( $valueBottom ) {
					$property_bottom = $property . '-bottom';
					$unit_bottom = $unit;

					if ( 'border-radius' === $property ) {
						$property_bottom = 'border-bottom-right-radius';
					} elseif ( 'border-width' === $property ) {
						$property_bottom = 'border-bottom-width';
						$this->_css .= 'border-bottom-style: solid;';
					}

					if ( 0 === $value[2] || '0' === $value[2] ) {
						$unit_bottom = '';
					}

					$this->_css .= $property_bottom . ':' . $value[2] . $unit_bottom . ';';
				}

				if ( $valueLeft ) {
					$property_left = $property . '-left';
					$unit_left = $unit;

					if ( 'border-radius' === $property ) {
						$property_left = 'border-bottom-left-radius';
					} elseif ( 'border-width' === $property ) {
						$property_left = 'border-left-width';
						$this->_css .= 'border-left-style: solid;';
					}

					if ( 0 === $value[3] || '0' === $value[3] ) {
						$unit_left = '';
					}

					$this->_css .= $property_left . ':' . $value[3] . $unit_left . ';';
				}

				return $this;
			}
		}

		// Add our unit to our value if it exists.
		if ( $unit ) {
			$value = $value . $unit;
		}

		$this->_css .= $property . ':' . $value . ';';
		return $this;
	}

	/**
	 * Adds the current selector rules to the output variable
	 *
	 * @access private
	 * @since  1.0.0
	 *
	 * @return $this
	 */
	private function add_selector_rules_to_output() {
		if ( ! empty( $this->_css ) ) {
			$this->_selector_output = $this->_selector;
			$this->_output[ $this->_selector_output ][] = $this->_css;
			$this->_output[ $this->_selector_output ] = array_unique( $this->_output[ $this->_selector_output ] );

			// Reset the css.
			$this->_css = '';
		}

		return $this;
	}

	/**
	 * Returns the minified css in the $_output variable
	 *
	 * @access public
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function css_output() {
		// Add current selector's rules to output.
		$this->add_selector_rules_to_output();

		return $this->_output;
	}
}
