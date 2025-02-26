<?php
/**
 * User device type condition Rules
 *
 * @link       https://personalizewp.com/
 * @since      1.0.0
 *
 * @package    PersonalizeWP
 * @subpackage PersonalizeWP/Rule_Conditions
 */

namespace PersonalizeWP\Rule_Conditions;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Checks for the existence of particular user device types such as mobile/desktop, android/ios
 */
class Users_Device_Type extends RuleCondition {

	/**
	 * Class identifier
	 *
	 *  @var sting
	 */
	public string $identifier = 'core_users_device_type';

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		$this->category = __( 'Core', 'personalizewp' );

		$this->description = __( 'Device Type', 'personalizewp' );

		$this->comparators = [
			'equals' => _x( 'Is Equal To', 'Comparator', 'personalizewp' ),
		];

		$this->comparison_values = [
			'mobile'  => __( 'Mobile', 'personalizewp' ),
			'tablet'  => __( 'Tablet', 'personalizewp' ),
			'desktop' => __( 'Desktop', 'personalizewp' ),
			'ios'     => __( 'iOS (iPhone and iPad)', 'personalizewp' ),
			'android' => __( 'Android', 'personalizewp' ),
			'macos'   => __( 'macOS', 'personalizewp' ),
			'linux'   => __( 'Linux', 'personalizewp' ),
			'windows' => __( 'Windows', 'personalizewp' ),
		];
	}

	/**
	 * Test data against condition
	 *
	 * @param string $comparator Comparator test to run
	 * @param string $value      Comparison to check
	 * @param string $action     Action to take
	 * @param object $meta       Additional meta data, cookie name/key
	 *
	 * @return bool
	 */
	public function matchesCriteria( $comparator, $value, $action, $meta = [] ): bool {
		switch ( $comparator ) {
			case 'equals':
				return $this->comparatorEquals( $value );
		}

		return false;
	}

	/**
	 * "Equal" test
	 *
	 * @param string $value Comparison to check
	 *
	 * @return bool
	 */
	public function comparatorEquals( $value ) {
		if ( in_array( $value, $GLOBALS['PERSONALIZEWP_PARAMS']['users_device_type'] ) ) {
			return true;
		} else {
			return false;
		}
	}
}
