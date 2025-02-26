<?php

/*
	Plugin name: Advanced Contact Form 7 Database
	Description: Save contact form 7 submissions in database. View,  search or export submissions as Excel, PDF, or CSV. Premium features included too.
	Author: <a href="https://penguin-arts.com">PenguinArts</a>
    Version: 1.0.0
*/


class Advanced_cf7_database{
	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 * 
	 *
	 * @var     string
	 */

	const VERSION = '1.0.0';
	
	/**
	 * Unique identifier for the plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */

	protected static $plugin_slug = 'advanced-cf7-listing';
	private $table_name;
	private $plugin_functions;
	
	
	public function __construct(){
		global $wpdb;
		$this->table_name = $wpdb->prefix.'advanced_cf7_data';
		$this->require_classes();
		$this->create_table();
		
		add_action('wpcf7_before_send_mail', array($this, 'save_application_form'));
		add_action('admin_menu', array($this, 'create_plugin_pages'));
		add_action('admin_init', array($this, 'init_csv'));
		add_action('admin_init', array($this, 'init_excel'));
		add_action('admin_init', array($this, 'init_pdf'));
		
	}
	/*------- Create Table -------*/
	public function create_table(){
		global $wpdb;
		$table_name = $this->table_name;
		$charset_collate = $wpdb->get_charset_collate();
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$sql = "CREATE TABLE $table_name (
			 id bigint(20) NOT NULL AUTO_INCREMENT,
			 form_post_id bigint(20) NOT NULL,
             form_value longtext DEFAULT '' NOT NULL,
             form_date datetime NOT NULL,
             custom_fields longtext DEFAULT '',
             status varchar(255) DEFAULT '' NOT NULL,
             UNIQUE KEY id (id) 
			) $charset_collate;";
		
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
			
			add_option( 'plugin_db_version', '1.0.0');
		}
		$upload_dir    = wp_upload_dir();
	    $cfdb7_dirname = $upload_dir['basedir'].'/acfdb7_uploads';
	    if ( ! file_exists( $cfdb7_dirname ) ) {
	        wp_mkdir_p( $cfdb7_dirname );
	    }
	}
	public function require_classes(){
		require_once 'inc/class-advanced-cf7-main-pages.php';
		require_once 'inc/class-plugin-functions.php';
		require_once 'inc/class-advanced-cf7-subpages.php';
		require_once 'inc/class-contact-form-details.php';
		require_once 'inc/export-csv.php';
	}
	/*------ Main Advanced CF7 Database Page --------*/
	public function create_plugin_pages(){
		new advanced_cf7_main_pages();
	}
	/*-------- Save Listing to Database ------*/
	public function save_application_form($form_tag){
		global $wpdb;
		$cfdb          = apply_filters( 'cfdb7_database', $wpdb );
	    $table_name    = $cfdb->prefix.'advanced_cf7_data';
	    $upload_dir    = wp_upload_dir();
	    $cfdb7_dirname = $upload_dir['basedir'].'/acfdb7_uploads';
	    $time_now      = time();
	    
		$form = WPCF7_Submission::get_instance();
		//$contact_form = $submission->get_contact_form();
		
		if($form){
			$black_list   = array('_wpcf7', '_wpcf7_version', '_wpcf7_locale', '_wpcf7_unit_tag',
	        '_wpcf7_is_ajax_call','cfdb7_name', '_wpcf7_container_post','_wpcf7cf_hidden_group_fields',
	        '_wpcf7cf_hidden_groups', '_wpcf7cf_visible_groups', '_wpcf7cf_options');
	
	        $data           = $form->get_posted_data();
	        $files          = $form->uploaded_files();
	        $uploaded_files = array();
	
	        foreach ($files as $file_key => $file) {
	            array_push($uploaded_files, $file_key);
	            copy($file, $cfdb7_dirname.'/'.$time_now.'-'.basename($file));
	        }
	
	        $form_data   = array();
	
	        $form_data['cfdb7_status'] = 'unread';
	        foreach ($data as $key => $d) {
	            if ( !in_array($key, $black_list ) && !in_array($key, $uploaded_files ) ) {
	
	                $tmpD = $d;
	
	                if ( ! is_array($d) ){
	
	                    $bl   = array('\"',"\'",'/','\\');
	                    $wl   = array('&quot;','&#039;','&#047;', '&#092;');
	
	                    $tmpD = str_replace($bl, $wl, $tmpD );
	                }
	
	                $form_data[$key] = $tmpD;
	            }
	            if ( in_array($key, $uploaded_files ) ) {
	                $form_data[$key.'cfdb7_file'] = $time_now.'-'.$d;
	            }
	        }
	
	        /* cfdb7 before save data. */
	        $form_data = apply_filters('cfdb7_before_save_data', $form_data);
	
	        do_action( 'cfdb7_before_save_data', $form_data );
	
	        $form_post_id = $form_tag->id();
	        $form_value   = serialize( $form_data );
	        $form_date    = current_time('Y-m-d H:i:s');
	
	        $cfdb->insert( $table_name, array(
	            'form_post_id' => $form_post_id,
	            'form_value'   => $form_value,
	            'form_date'    => $form_date
	        ) );
	
	        /* cfdb7 after save data */
	        $insert_id = $cfdb->insert_id;
	        do_action( 'cfdb7_after_save_data', $insert_id );
        }
		
		
		
		/*if($submission){
			$post_data = $submission->get_posted_data();
			
			unset($post_data['_wpcf7']);
			unset($post_data['_wpcf7_version']);
			unset($post_data['_wpcf7_locale']);
			unset($post_data['_wpcf7_unit_tag']);
			unset($post_data['_wpcf7_is_ajax_call']);
			unset($post_data['cfdb7_name']);
			unset($post_data['_wpcf7_container_post']);
			unset($post_data['_wpcf7cf_hidden_group_fields']);
			unset($post_data['_wpcf7cf_hidden_groups']);
			unset($post_data['_wpcf7cf_visible_groups']);
			unset($post_data['_wpcf7cf_options']);
			
			dev($post_data);
			
			$post_data = serialize($post_data);
			$this->insert_new_customer($contact_form->id(),$post_data);
		} 	*/	
	}
	
	public function init_csv(){
		$csv = new Expoert_CSV();
        if( isset($_REQUEST['csv']) && ( $_REQUEST['csv'] == true ) && isset( $_REQUEST['nonce'] ) ) {

            $nonce  = filter_input( INPUT_GET, 'nonce', FILTER_SANITIZE_STRING );

            if ( ! wp_verify_nonce( $nonce, 'dnonce' ) ) wp_die('Invalid nonce..!!');

            $csv->download_csv_file();
        }
	}
	public function init_excel(){
        if( isset($_REQUEST['excel']) && ( $_REQUEST['excel'] == true ) && isset( $_REQUEST['nonce'] ) ) {

            $nonce  = filter_input( INPUT_GET, 'nonce', FILTER_SANITIZE_STRING );

            if ( ! wp_verify_nonce( $nonce, 'dnonce' ) ) wp_die('Invalid nonce..!!');
			$fid = $_GET['fid'];
            $this->export_to_excel($fid);
        }
	}
	public function init_pdf(){
        if( isset($_REQUEST['pdf']) && ( $_REQUEST['pdf'] == true ) && isset( $_REQUEST['nonce'] ) ) {

            $nonce  = filter_input( INPUT_GET, 'nonce', FILTER_SANITIZE_STRING );

            if ( ! wp_verify_nonce( $nonce, 'dnonce' ) ) wp_die('Invalid nonce..!!');
			$fid = $_GET['fid'];
            $this->export_to_pdf($fid);
        }
	}
	
	public function export_to_excel($fid){
		global $wpdb;
		$fid = intval($fid);
		$form_title = 'ContactFormExcel';
		$data = $this->getFieldsByFormId($fid);
		
		if(!empty($data)){
			//Check that the class exists before trying to use it
			$arrHeader = array();
			foreach($data[0] as $k => $v){
				$arrHeader[] = $k;
			}
			if(!class_exists('Excel')){
				//Include excel class file 
				require_once(dirname(__FILE__).'/inc/Excel.class.php');
				//create excel class object
				$xls = new Excel($form_title);
				$i=0;
				foreach($arrHeader as $colName ){
					$xls->home($i);
					$xls->label($colName);
					$i++;
				}
				foreach ($data as $k => $v){
					$i=0;	
					$xls->down();
					foreach ($v as $k2 => $v2){
						$colVal = ((isset($v[$k2])) ? htmlspecialchars_decode($v[$k2]) : '');
						$xls->home($i);
						$xls->label($colVal);
						$i++;
					}
				}
				$xls->send();
				exit;
			}
		}
	}
	
	public function export_to_pdf($fid){
		global $wpdb;
		$fid = intval($fid);
		
		$form_title = 'ContactFormExcel';
		$data = $this->getFieldsByFormId($fid);
		
		if(!empty($data)){
			$arrHeader = array();
			foreach($data[0] as $k => $v){
				$arrHeader[] = $k;
			}
			//Setup export data 
		
			
			//$arrHeader = array_values(array_map('sanitize_text_field',$fields));
			
			//Check that the class exists before trying to use it
			if(!class_exists('MYPDF')){
				//Include pdf class file 
				require_once(dirname(__FILE__).'/inc/pdfgenerate/mypdf.class.php');
				$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', false);
	
				// set document information
				$pdf->SetCreator(PDF_CREATOR);
	
				// set header and footer fonts
				$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
				$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
				//set margins
				$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 2, PDF_MARGIN_RIGHT);
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	
				$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM + 10);
	
				//set image scale factor
				$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	
				//set some language-dependent strings
				$pdf->setLanguageArray($l);
	
				// set font
				$pdf->SetFont('helvetica', '', 8);
	
				// add a page
				$pdf->AddPage();
				$docName ="";
				$timeStamp = date('Ymdhis');
				$docName = $form_title."-".$timeStamp;
				// pdf html content
				$content = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
							"http://www.w3.org/TR/html4/loose.dtd">
							<html>
							<head>
							<link rel="important stylesheet" href="chrome://messagebody/skin/messageBody.css">
							<meta http-equiv="Content-Type" content="text/html; " />
							</head>
							<body><style>table, th, td {
								border: 1px solid #ddd;
								border-collapse: collapse;
							}
							td{
							padding:5px;
							}
							</style>';
				$content.= '<div style="text-align:center;font-size:18px;margin:20px;line-height:30px;">'.$form_title.'</div>';
				$content.= '<table border="0" cellpadding="0" cellspacing="0" style="border:1px solid #ccc;margin-top:0;margin-left:auto;margin-right:auto;font-family:arial;margin-bottom:10px;width:100%;" >';
	
				$i=0;
				$content .= '<tr bgcolor="#000" style="color:#fff;">';
					foreach($arrHeader as $colName){
					$content .= '<td style="font-family:arial;font-weight:bold;font-size:14px;color:#fff;padding:5px;line-height:20px;" CELLSPACING=10>'.$colName.'</td>';
				}
				$content .= '</tr>';
	
				foreach ($data as $k => $v){
					$content .= '<tr>';
					//Define column index here 
					$i=0;	
					//Consider new row for each entry here 
					
					//Get column order wise value here 
					foreach ($v as $k2 => $v2){
						$colVal = ((isset($v[$k2])) ? htmlspecialchars_decode($v[$k2]) : '');
						$content .= '<td style="padding:5px;line-height:20px;" CELLSPACING=10>'.$colVal.'</td>';
					}
					$content .= '</tr>';
				}
				
					
				$content.='</table></body></html>';
			
				// *******************************************************************
				
				$pdf->lastPage();
				
				
				$pdf->writeHTML($content, true, false, true, false, '');
	
				//Close and output PDF document
				
				$upload_dir = wp_upload_dir();
				
				$folderPath = $upload_dir['path']."/";
				
				
				$fileFullName = $docName.'.pdf';
				$readFilePath = $folderPath.$fileFullName;
				
				//$filePath = $folderPath;
				
				$pdf->Output($folderPath . $docName . '.pdf', 'F');
				 if(file_exists($readFilePath)){
					header('Content-Type: application/pdf');
					header('Content-Disposition: attachment; filename="'.$docName.'.pdf"' );
					readfile($readFilePath);
					// delete pdf file
					unlink($readFilePath);
				}
				
			}
		}
}
	
	/*----- Get Forms submissions by id ------*/
	public function getFieldsByFormId($fid){
		global $wpdb;
		$table_name = $this->table_name;
		$data = array();
		$results = $wpdb->get_results( "SELECT * FROM $table_name WHERE form_post_id = $fid", OBJECT );
		foreach($results as $k => $v){
			$data[] = unserialize($v->form_value);
		}
		foreach($data as $k => $v){
			foreach($v as $key => $value){
				if(is_array($value)){
					$data[$k][$key] = $value[0];
				}
			}
		}
		return $data;
	}
	
	/*------ Insert new listing function -------*/
	public function insert_new_customer($form_id,$form_value){
		global $wpdb;
		$date = new DateTime();
		$wpdb->insert( 
			$this->table_name, 
			array( 
				'form_id'        => $form_id,
				'form_post_id'   => $form_id,
				'form_value'     => $form_value,
				'form_date'      => $date->format('Y-m-d H:i:s'),
				'status'         => 'Pending'
			) 
		);
	}
}
new Advanced_cf7_database();