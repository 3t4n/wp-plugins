<?php

if ( !class_exists( 'WPFDM_CF7_Dao' ) ) {

/** 
*
* @since 1.0.0
* 
* 
* WPFDM_CF7_Dao is an inteface to the CF7 tables
* It allows to: 
* - get the number of CF7 already saved instances
* - get all already saved instances
*/

class WPFDM_CF7_Dao {

	static $TABLE_NAME = "db7_forms";

	/**
	* @var Singleton
	* @access private
	* @static
	*/
	private static $_instance = null;

	/**
	* Constructor
	*
	* @param void
	* @return void
	*/
	private function __construct() {  
	}
 
	/**
	* Singleton pattern
	* 
	*
	* @param void
	* @return WPFDM_CF7_Dao
	*/
	public static function getInstance() {

		if( is_null( self::$_instance ) ) {
			self::$_instance = new WPFDM_CF7_Dao();  
		}

		return self::$_instance;
	}

	/** 
	*
    * @since 1.0.0
    * 
    */
    /** 
	*
    * @since 1.0.0
    * 
    * Function that checks whether : 
    * - There are some table to import data from, and if so, 
    * - There are some data to import
    */
	function is_there_something_to_import () {

		global $wpdb;

		$table_name = $wpdb->prefix . self::$TABLE_NAME;


		// If there is no table, return false
		$table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name;

		if($table_exists == false) 
			return false;

		
		// If some table exist, but with no data, return false
		
		$row_count = self::get_cf7_forms_count(); 

	   	if ($row_count == 0)
	   		return false;

	   	// Otherwise, return true
	   	return true;
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that gets the number of CF7 already saved instances
    *
    */
    function get_cf7_forms_count() {

		global $wpdb;

	    $table_name = $wpdb->prefix. self::$TABLE_NAME;

	    
	   	$sql = "SELECT count(*) as nbre from $table_name;";

	   	$result = $wpdb->get_results( $sql , 'ARRAY_A' );

	   	return $result[0]['nbre']; 
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that gets the already saved instances of CF7
    *
    */
    function get_contacts_from_cfdb7() {

		global $wpdb;

	    $table_name = $wpdb->prefix. self::$TABLE_NAME;

	   	$sql = "SELECT * from $table_name;";

	   	$result = $wpdb->get_results( $sql , 'ARRAY_A' );

	   	return $result;
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that gets the post_form_id from the saved instances of CF7
    *
    */
    function get_forms_from_cfdb7() {

		global $wpdb;

	    $table_name = $wpdb->prefix. self::$TABLE_NAME;

	   	$sql = "SELECT distinct(form_post_id) as form_id from $table_name;";

	   	$result = $wpdb->get_results( $sql , 'ARRAY_A' );

	   	return $result;
	}
}
}
