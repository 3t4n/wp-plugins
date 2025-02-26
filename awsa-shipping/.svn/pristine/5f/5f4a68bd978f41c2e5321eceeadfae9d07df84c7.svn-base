<?php
/**
 * Class AWSA Error
 *
 * @version           1.1.1
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Core
 */

/**
 * Class AWSA_Error
 */
class AWSA_Error {

	/**
	 * Errors
	 *
	 * @var array
	 */
	public $errors;

	/**
	 * Add Error
	 *
	 * @param string $e_code
	 * @param string $e_message
	 */
	public function __construct( $e_code = '', $e_message = '' ) {

		if ( !empty( $e_code ) || !empty( $e_message ) ) {
			$this->errors[ $e_code ] = $e_message;
		}
	}

	/**
	 * Get Error Code of First Error
	 *
	 * @return string
	 */
	public function get_code(): string {

		return key( $this->errors );
	}

	/**
	 * Add Error
	 *
	 * @param string $e_code
	 * @param string $e_message
	 */
	public function add_error( $e_code = '', $e_message = '' ): void {

		$this->errors[ $e_code ] = $e_message;
	}

	/**
	 * Get Error Message of First Error
	 *
	 * @return string
	 */
	public function get_message(): string {

		return current( $this->errors );
	}

	/**
	 * Get All Errors
	 *
	 * @return array
	 */
	public function get_errors(): array {

		return $this->errors;
	}

}
