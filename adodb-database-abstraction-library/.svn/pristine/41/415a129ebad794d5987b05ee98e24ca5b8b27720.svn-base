<?php
/**
 * ADOdb Database Abstraction Library class
 * Usage: var_dump(Adodb::get_instance()->GetOne("SELECT user_nicename FROM `wp_users`"));
 *
 * This class follows the Singleton-pattern.
 * The singleton pattern is a design pattern that restricts the instantiation of a class to one object.
 * This is useful when exactly one object is needed to be available across the system. 
 *
 */
class Adodb
{
	/**
	 * holds object
	 */
	public static $db;

	/**
	 * private constructor, so unable to do $oAdodb = new Adodb();
	 */
	private function __construct() {}
	
	/**
	 * private magic clone, so unable to $test_clone = clone $test;
	 */
	private function __clone() { trigger_error('Clone is not allowed.', E_USER_ERROR); }

	/**
	 * Get instance of Adodb-connection
	 * use like: Adodb::get_instance()->Execute("SELECT user_nicename FROM `wp_users`");
	 */
	public static function get_instance()
	{

		// check if instance already exists
		if(!self::$db) {
			
			// set temporary dir for cache-files
			global $ADODB_CACHE_DIR;
			$ADODB_CACHE_DIR = get_temp_dir();
			
			// include standard ADOdb library (latest version on http://adodb.sourceforge.net/)
			require_once("adodb/adodb.inc.php");

			// create connection
			$adodb = & NewAdoConnection("mysql");
			$adodb->Connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
			// set UTF8
			$adodb->Execute("SET NAMES 'utf8' #" . __CLASS__);
			$adodb->SetFetchMode(ADODB_FETCH_ASSOC); // dont return rownumbers as keys
			

			self::$db = &$adodb ;
		}
		
		return self::$db;
	}
	
}


?>