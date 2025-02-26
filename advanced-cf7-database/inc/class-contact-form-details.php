<?php

class contact_form_details extends Advanced_cf7_database{
	
	private $table_name;
	private $form_id;
    private $form_post_id;
	
	public function __construct(){
		parent::__construct();
		global $wpdb;
		$this->table_name = $wpdb->prefix.'advanced_cf7_data';
		$this->form_post_id = esc_sql( $_GET['fid'] );
       	$this->form_id = esc_sql( $_GET['ufid'] );
		$this->showDetailsPage();
	}
	public function showDetailsPage(){
		global $wpdb;
		$upload_dir    = wp_upload_dir();
		$cfdb7_dir_url = $upload_dir['baseurl'].'/acfdb7_uploads';
		if ( is_numeric($this->form_post_id) && is_numeric($this->form_id) ) {
           $results = $wpdb->get_results( "SELECT * FROM $this->table_name WHERE form_post_id = $this->form_post_id AND id = $this->form_id LIMIT 1", OBJECT );
        }

        if ( empty($results) ) {
            wp_die( $message = 'Not valid contact form' );
        }
		echo '<div class="welcome-panel">';
		echo '<h2>Submission Details</h2>';
		echo '<div class="welcome-panel-column">';
		foreach($results as $k => $v){
			$form_value = unserialize($v->form_value); 
			echo '<p><strong>Date: </strong>'.$v->form_date.'</p>';
			foreach($form_value as $key => $value){
				$new_value = null;
				if(is_array($value)){
					$new_value = implode(' ', $value);
				}else{
					$new_value = $value;
				}
				if ( strpos($key, 'cfdb7_file') !== false ){

                    $key_val = str_replace('cfdb7_file', '', $key);
                    $key_val = str_replace('your-', '', $key_val);
                    $key_val = ucfirst( $key_val );
                    echo '<p><strong>'.$key_val.'</strong>: <br><img src="'.$cfdb7_dir_url.'/'.$value.'" style="max-width:250px;"></p>';
                }else{
					echo '<p><strong>'.ucfirst(str_replace('_', ' ', $key)).': </strong>'.$new_value.'</p>';
				}
			}
			
		}
		echo '</div>';
		echo '</div>';
	}
}
