<?php

/**
 * Helper functions.
 *
 * @link       https://www.demotic.co.uk/
 * @since      1.0.0
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/includes
 */

/**
 * Helper functions.
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/includes
 * @author     Demotic Limited <benfleming@demotic.co.uk>
 */

	/**
	 * Check if ACF Pro is installed.
	 *
	 * @since 1.0.0
	 *
	 */
	function has_acf() {

		return class_exists( 'acf_pro' );
		
	}

	/**
	 * Check if Advanced Forms is installed.
	 *
	 * @since 1.0.0
	 *
	 */
	function has_af() {

		return class_exists( 'AF' );
		
	}

?>