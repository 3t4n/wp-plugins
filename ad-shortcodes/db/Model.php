<?php
/**
 * Control tables in DB, each model extends this class.
 */

abstract class ZumiAdModel {
	/**
	 * The key of Table.

	 * @var string $primary_key
	 */
	protected static $primary_key = 'id';
	/**
	 * The table name.

	 * @var string $table
	 */
	protected static $table;
	/**
	 * Set incrementing.

	 * @var bool $incrementing
	 */
	protected static $incrementing = true;

	/**
	 * Create a table in constructor.
	 */
	public function __construct() {
		static::createTable();
	}

	/**
	 * Create a table, child class override this method.
	 */
	abstract static function createTable();

	/**
	 * Save record to the DB table.
	 */
	public function save() {

		global $wpdb;

		// Get the record.
		$result = static::get( $this->{static::$primary_key} );

		// If the record exists.
		if ( null !== $result ) {
			// Update the record.
			return $this->update();

		} else {
			// If it doesn't exist, create a new one.

			$table = static::$table;

			// Insert a record.
			$sql = "INSET INTO {$table} (";

			// Get names of columns.
			$values = $this->getColumns();

			// Execute it.
			return $wpdb->insert( static::$table, $values );
		}

	}

	/**
	 * Update the record.
	 */
	public function update() {

		global $wpdb;

		return $wpdb->update( static::$table, $this->getColumns(), array( static::$primary_key => $this->{static::$primary_key} ) );

	}

	/**
	 * Detele a record.

	 * @param int $key | string $key.
	 */
	public static function delete( $key ) {
		global $wpdb;

		return $wpdb->delete( static::$table, array( static::$primary_key => $key ) );
	}

	/**
	 * Get name of columns.

	 * @return array columns.
	 */
	public function getColumns() {
		global $wpdb;

		$columns = $wpdb->get_col ('DESC ' . static::$table );

		$values = array();

		// Get names of columns.
		foreach ( $columns as $column ) {
			$values[ $column ] = $this->$column;
		}

		// If $incrementing is true, delete primary_key.
		if ( static::$incrementing ) {
			unset( $values[ static::$primary_key ] );
		}

		return $values;

	}

	/**
	 * Get the record by the primary key.

	 * @param string $primary_key is value of primary key.
	 * @return Model $model
	 */
	public static function get( $primary_key ) {
		global $wpdb;

		$sql = "SELECT * FROM ".static::$table." WHERE ".static::$primary_key." = '".$primary_key."'";

		// Execute.
		$result = $wpdb->get_results( $sql );

		// If the recored doens't exit, return null.
		if ( 0 === count( $result ) ) {
			return null;
		}

		// Return the instance.
		return static::makeInstanceBySTD( $result[0] );

	}

	/**
	 * Get records by column.

	 * @param string $key is key name of column.
	 * @param string $value is value of column.
	 */
	public static function getByColumn( $key, $value ) {
		global $wpdb;

		$sql = "SELECT * FROM ".static::$table." WHERE ".$key." = '".$value."'";

		// Execute.
		$results = $wpdb->get_results( $sql );

		// If the recored doens't exit, return null.
		if ( 0 === count( $result ) ) {
			return null;
		}

		$objs = array();

		// Make an array of instances.
		foreach ( $results as $result ) {
			$objs[] = static::makeInstanceBySTD( $result );
		}

		return $objs;
	}


	/**
	 * Get all records.

	 * @return array $instances
	 */
	public static function all() {
		global $wpdb;

		$sql = "SELECT * FROM ".static::$table;

		$result = $wpdb->get_results( $sql );

		$instances = array();

		// Make an array of instances.
		foreach ( $result as $value ) {
			$instances[] = static::makeInstanceBySTD( $value );
		}

		return $instances;
	}

	/**
	 * Make instance with stdClass.

	 * @param stdClass $std instance of stdClass.
	 * @return model $instance
	 */
	private static function makeInstanceBySTD( $std ) {

		// New instance.
		$instance = new static();

		// Set properties.
		foreach ( $std as $key => $value ) {
			$instance->$key = $value;
		}

		return $instance;
	}
}
