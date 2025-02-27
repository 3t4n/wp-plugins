<?php

if ( ! class_exists( 'WPFDM_Initializer' ) ) {

/** 
*
* @since 1.0.0
* 
* WPFDM_DB_Initializer initializes the DB schema once the plugin activated, it:
* - Creates the needed tables
* - Fill them with the existent data, if any
*
*/
class WPFDM_DB_Initializer {

	
	/**
	*
    * @since 1.0.0
    *
    */
	function __construct() {

		// We create tables
		$this->create_tables();  

		// We fill them
		$this->fill_tables();  
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that creates tables
    *
    */
    function create_tables() {

		require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-form-dao.php' );
		require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-contact-dao.php' );
		WPFDM_Form_Dao		::getInstance()->create_table();
		WPFDM_Contact_Dao	::getInstance()->create_table();
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that fills tables
    *
    */
    function fill_tables() {

    	// We get all saved CF7 from the post table
		$args = array(
			'post_type'		=> 'wpcf7_contact_form',
		  	'numberposts' 	=> -1,
		);

		$cf7_forms = get_posts( $args );

		if ( empty ( $cf7_forms ) )
			return;

		// We store them in our forms table if they are not already existant
		
		$existant_forms = WPFDM_Form_Dao::getInstance()->get_all();
		$existant_forms_ids = array_column($existant_forms, 'form_id');

		foreach ( $cf7_forms as $cf7_form ) {

			if ( in_array($cf7_form->ID, $existant_forms_ids ))  // If the form is already saved, we continue the loop
				continue;
			
			$form_data = array(
				'form_id' 		=> $cf7_form->ID,
				'form_title' 	=> $cf7_form->post_title,
				'form_state' 	=> 1,
			);

			WPFDM_Form_Dao::getInstance()->add_new ( $form_data );
		}
	}
	
}
}
