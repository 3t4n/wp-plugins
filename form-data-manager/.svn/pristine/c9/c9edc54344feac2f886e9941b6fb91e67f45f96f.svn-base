<?php 
// check user capabilities
if ( ! is_admin() ) {
    return;
}

if ( ! class_exists( 'WPFDM_Export' ) ) {

/** 
*
* @since 1.0.0
* 
*/
class WPFDM_Export {

	/**
	* @since 1.0.0
    * @var Singleton
	* @access private
	* @static
	*/
	private static $_instance = null;

	/**
	* @since 1.0.0
    * Constructor
	*
	* @param void
	* @return void
	*/
	private function __construct() {  
	}
 
	/**
	* @since 1.0.0
    * Singleton pattern
	* 
	*
	* @param void
	* @return WPFDM_Forms_List
	*/
	public static function getInstance() {

		if( is_null( self::$_instance ) ) {
			self::$_instance = new WPFDM_Export();  
		}

		return self::$_instance;
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Main function, called by the plugin once the export button trigerred
    *
    */
    public function run() {

		if ( ! is_admin() )
    		return;

    	require_once (plugin_dir_path( __FILE__ ) . '/utils/class-wpfdm-utilities.php');
    	
		$format 	= sanitize_text_field( $_GET['format'] );

		$form_id 	= (int) sanitize_key( $_GET['form_id'] );

		if ( $format == "csv")
			$this->export_csv ($form_id);
	}

	/** 
	*
    * @since 1.0.0
    * 
    * Function that export the contacts of a given form into csv
    */
    function export_csv( $form_id ) {

	    global $wpdb;
	    
	    require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-form-dao.php' );
	    require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-contact-dao.php' );
    	
    	$contacts_table = $wpdb->prefix . WPFDM_Contact_Dao::$TABLE_NAME;
    	$forms_table 	= $wpdb->prefix . WPFDM_Form_Dao::$TABLE_NAME;
		
	    $sql = "SELECT form_title FROM $forms_table WHERE form_id = " . $form_id;

	    $results = $wpdb->get_results( $sql, 'ARRAY_A' );

	    if( empty( $results ) ) {
		    $filename = 'form_' . date('Y_m_d') . '.csv';
	    } else {
			//$filename = str_replace(' ', '_', $results[0]['form_title'] ) . '_' . date('Y_m_d') . '.csv';
			$filename = sanitize_file_name( $results[0]['form_title'] . '_' . date('Y_m_d') . '.csv' ) ;
	    }
	    
		$sql = "SELECT * FROM $contacts_table WHERE form_id = $form_id ORDER BY contact_id DESC LIMIT 1";

        $results    = $wpdb->get_results( $sql, OBJECT);

        $columns = array();

		$one_form = isset($results[0]) ? unserialize( $results[0]->contact_value ): NULL ;
        
        if( $one_form != NULL ){
	        
	        foreach ( $one_form as $key => $value ) {
				$columns[ $key ] = ucfirst($key);
            }

            $columns['contact_date'] = __('Date', 'form-data-manager');
            $columns['contact_read'] = __('Read', 'form-data-manager');
        }

	    $header_row = array_values ($columns);
	    //$header_row[] = 'read';
		
	    $sql = "SELECT * FROM $contacts_table WHERE form_id = " . $form_id;

	    $results = $wpdb->get_results( $sql, 'ARRAY_A' );
	    
	    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
	    header( 'Content-Description: File Transfer' );
	    header( 'Content-type: application/octet-stream csv' );
	    
	    header( "Content-Disposition: attachment; filename=" . $filename );
	    header( 'Expires: 0' );
	    header( 'Pragma: public' );
	    
	    // force download
       	header("Content-Type: application/force-download");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename=" . $filename);
        header("Content-Transfer-Encoding: binary");

        $fh = @fopen( 'php://output', 'w' );
	    //fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
	    
	    ob_start();
	    
	    fputcsv( $fh, $header_row, ';', '"', '\\' );
	    
	    require_once( plugin_dir_path( __FILE__ ) . '/class-wpfdm-contacts-list.php' );
		
	    foreach ( $results as $result ) {

	    	$row = array();

			$obj_tmp = unserialize($result['contact_value']);
			
			foreach ( $obj_tmp as $key => $value ) {
				require_once( plugin_dir_path( __FILE__ ) . '/model/class-wpfdm-form-dao.php' );

				$value = str_replace("\n", '', $value);
				//$value = stripcslashes($value);
				
				$value = WPFDM_Contacts_List::getInstance()->convert_value_to($value, 'csv');
				$row[ $key ] = stripcslashes( $value );
			}

			$row['contact_date'] = $result['contact_date'];

			// Format the date to suit the WP preferences
			$row['contact_read'] = WPFDM_Utilities::mysql2WPdate( $result['contact_read'] );
	        
	        $row = array_values ($row);

	        fputcsv( $fh, $row , ';', '"', '\\');
	    }

	    echo ob_get_clean();

	    fclose( $fh );
	    
	    die();
	}

}

}
