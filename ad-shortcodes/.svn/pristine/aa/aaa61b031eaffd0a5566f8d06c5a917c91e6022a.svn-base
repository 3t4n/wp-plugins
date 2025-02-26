<?php
/**
 * This class check validate input data, whether id is empty, invalid characters, and check if user change id.
 */
class ValidateID {

	/**
	 * Store a new id in case of user change id. If user didin't change it, store same value of old id.

	 * @var string $id
	 */
	private $id;
	/**
	 * Store old_id in case of user change id.

	 * @var string $old_id
	 */
	private $old_id;
	/**
	 * Store a name of id.

	 * @var string $id_name
	 */
	private $id_name;
	/**
	 * Store Database table name.

	 * @var string $db_name
	 */
	private $db_name;
	/**
	 * The flag whether error occurd

	 * @var bool $error_occured
	 */
	private $error_occured = false;
	/**
	 * Store error massage.

	 * @var string $msg
	 */
	private $msg;

	/**
	 * Constructor

	 * @param string $id is new id.
	 * @param string $old_id is old id.
	 * @param string $id_name is name of id.
	 * @param string $db_name is name of db table.
	 */
	public function __construct( $id, $old_id, $id_name, $db_name ) {

		$this->id = $id;
		$this->old_id = $old_id;
		$this->id_name = $id_name;
		$this->db_name = $db_name;
	}

	/**
	 * Execute validation.

	 * @throws Exception When id is invalid.
	 */
	public function exe() {

		// Get language setting.
		$lan = new Language( get_locale() );

		try {
			// If id is empty throws error.
			if ( '' === $this->id ) {
				throw new Exception( $lan->{$this->id_name . '_cannot_be_empty'} );
			}

			// If id has invalid charactors throws error.
			if ( preg_match( '/[\[\]\<\>\&\/\t\'\"]+/', $this->id ) ) {
				throw new Exception( $lan->{$this->id_name . '_has_unavailable_characters'} );
			}

			// If user changed id.
			if ( $this->id !== $this->old_id ) {
				// If the new id is already in DB table, throws error.
				if ( ! is_null( $this->db_name::get( $this->id ) ) ) {
					throw new Exception( $lan->{$this->id_name . '_exists'} );
				}
			}
		} catch ( Exception $e ) {
			$this->error_occured = true;
			$this->msg = $e->getMessage();
		}
	}

	/**
	 * Check whtere an error occured or not.

	 * @return bool when error occurd return true, if no return false.
	 */
	public function doesErrorOccur() {
		return $this->error_occured;
	}

	/**
	 * Get an error message.

	 * @return string return message.
	 */
	public function getMessage() {
		return $this->msg;
	}
}
