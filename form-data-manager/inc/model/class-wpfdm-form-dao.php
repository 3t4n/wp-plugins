<?php

if ( !class_exists( 'WPFDM_Form_Dao' ) ) {

/** 
*
* @since 1.0.0
* 
* WPFDM_Form_Dao is an inteface to our fdm_forms table
* It allows the all needed CRUD operations
*
*/
class WPFDM_Form_Dao {

	static $TABLE_NAME = "fdm_forms";

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
	* @return WPFDM_Form_Dao
	*/
	public static function getInstance() {

		if( is_null( self::$_instance ) ) {
			self::$_instance = new WPFDM_Form_Dao();  
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
		  	id int NOT NULL AUTO_INCREMENT,
        	form_id int(11) NOT NULL,
        	form_title VARCHAR(100) NOT NULL,
            form_state TINYINT NOT NULL,
            PRIMARY KEY (id)
		) $charset_collate; ";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		dbDelta( $sql );

	}

	/** 
	*
    * @since 1.0.0
    * 
    * The function that checks whether or not a a form is activated.
    *
    */
    public function is_active( $form_id ) {

		global $wpdb;
		
		$forms_table 	= $wpdb->prefix . self::$TABLE_NAME;
    	
		$sql = "SELECT form_state FROM " . $forms_table . " WHERE form_id = " . $form_id;

		$results = $wpdb->get_results( $sql , 'ARRAY_A' );

		if ( empty( $results ) ) 
			return false;

		if ( $results[0]['form_state'] == 1 ) {
			return true;
		} else { 
			return false;
		}
	}

	/** 
	*
    * @since 1.0.0
    * 
    * This function gets all the forms.
    *
    */
    public function get_all( ) {

		global $wpdb;
		
		$forms_table 	= $wpdb->prefix . self::$TABLE_NAME;
    	
		$sql = "SELECT * FROM " . $forms_table;

		$results = $wpdb->get_results( $sql , 'ARRAY_A' );

		return $results;
	}

	/** 
	*
    * @since 1.0.0
    * 
    * The function that adds a new row in the table, called once a new form CF7 is created.
    *
	* $form_data = array ( 'form_id' 		=> ..,
							'form_state'	=> 0/1,
							'form_title'	=> ...
						)
	*/
	public function add_new( $form_data ) {

		global $wpdb;
	
		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		
		$wpdb->insert(
			$table_name, 
			$form_data
		);
	}

	/** 
	*
    * @since 1.0.0
    *
    * The function that update the table rows (forms), called when a CF7 form is updated.
    * 
    */
    public function update( $form_id , $fields_to_update ) {

		global $wpdb;
	
		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		
		$wpdb->update(
			$table_name, 
			$fields_to_update,
			array ( 'form_id' => $form_id )
		);
	}

	/** 
	*
    * @since 1.0.0
    * 
    * The function that activates all forms.
    *
    */
    public function activateAll( $new_state ) {

		global $wpdb;
	
		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		
		$wpdb->query( 
		    $wpdb->prepare( 
		        "UPDATE $table_name SET form_state = %d",
		        $new_state
		    )
		);
	}

	/** 
	*
    * @since 1.0.0
    * 
    * 
    * Function that add multiple rows at once
    * $result is an array containg only ids, the remaining data is taken from the POSTs table
    *  
    */
    function add_rows ($result) {
    	
    	if( empty( $result) )
    		return;

    	$existant_forms 	= $this->get_all();
		$existant_forms_ids = array_column($existant_forms, 'form_id');

		foreach ($result as $row ) {

			$form_id 	= $row['form_id'];
        	$form_title = get_the_title( $row['form_id'] ); 
        	$form_state = 1;

        	if ( in_array($form_id, $existant_forms_ids ))  // If the form is already saved, we continue the loop
				continue;
				
        	$this->add_new( array(
				'form_id' 		=> $form_id,
				'form_title'	=> $form_title,
				'form_state'	=> $form_state,
			) );
	  	}
	}	
}

}
