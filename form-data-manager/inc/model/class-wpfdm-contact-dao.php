<?php

if ( ! class_exists( 'WPFDM_Contact_Dao' ) ) {

/** 
*
* @since 1.0.0
* 
* WPFDM_Contact_Dao is an inteface to our fdm_contacts table
* It allows the all needed CRUD operations
*
*/
class WPFDM_Contact_Dao {

	static $TABLE_NAME = "fdm_contacts";

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
	* @return WPFDM_Contact_Dao
	*/
	public static function getInstance() {

		if( is_null( self::$_instance ) ) {
			self::$_instance = new WPFDM_Contact_Dao();  
		}

		return self::$_instance;
	}

	/** 
	*
    * @since 1.0.0
    * 
    * The function that creates the table, called once the plugin is activated.
    * 
    */
    function create_table() {

		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . self::$TABLE_NAME . " (
		  	contact_id int NOT NULL AUTO_INCREMENT,
        	form_id int(11) NOT NULL,
            contact_value longtext NOT NULL,
            contact_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            contact_read TINYINT NOT NULL DEFAULT '0',
            PRIMARY KEY  (contact_id)
		) $charset_collate; ";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		dbDelta( $sql );
	}

	/** 
	*
    * @since 1.0.0
    * 
    * The function that adds a new row in the table, called once a CF7 form is filled and sent.
    *
    */
    public function add_new( $contact_data ) {

		global $wpdb;

		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		$wpdb->insert(
			$table_name, 
			$contact_data
		);
	}

	/** 
	*
    * @since 1.0.0
    * 
    * The function that update the table rows (contacts), called to mark as read/new a contact.
    *
   	*/
    public function update( $contact_id , $fields_to_update ) {

		global $wpdb;
	
		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		
		$wpdb->update(
			$table_name, 
			$fields_to_update,
			array ( 'contact_id' => $contact_id )
		);
	}

	/** 
	*
    * @since 1.0.0
    * 
    * The function that delete the contact whose id = $contact_id
    *
    */
    public function delete( $contact_id ) {

		global $wpdb;

		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		$wpdb->delete(
			$table_name, 
			array( 'contact_id' => $contact_id ) 
		);
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that add multiple rows at once
    * $result is an array containg results in mysql raw format
    *  
    */
    function add_rows ($result) {
    	
    	if( empty( $result) )
    		return;

		foreach ($result as $row ) {

        	$form_value   = unserialize( $row['form_value'] );
        	unset($form_value['cfdb7_status']);

        	$this->add_new( array(
				'contact_date' 	=> $row['form_date'],
				'form_id' 		=> $row['form_post_id'],
				'contact_value' => serialize ($form_value),
			) );
	  	}
	}	

}

}