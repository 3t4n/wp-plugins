<?php
defined('ABSPATH') or die("No script kiddies please!");

class AWS_Slideshows_Model {
	
	var $tableName		=	'awsslideshow_slides';
	
	var $fieldsTable	=	array(
		'id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
		'title text NOT NULL',
		'shortcode varchar(255) NOT NULL',
		'slide_data text NOT NULL',
		'date datetime NOT NULL'
	);
	
	var $fields	=	array(
		'id'			=>	'%d',
		'title'			=>	'%s',
		'shortcode'		=>	'%s',
		'slide_data'	=>	'%s',
		'date'			=>	'%s'
	);
	
	function __construct(){
		
		global $wpdb;
		
		$this->tableName	=	$wpdb->prefix.$this->tableName;
	}
	
	function install(){
		
		global $wpdb;
		global $awsslideshow_db_version;
		
		$query	=	'CREATE TABLE IF NOT EXISTS '.$this->tableName.'('.implode(', ', $this->fieldsTable).')';
		
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
		dbDelta( $query );
		
		add_option( 'awsslideshow_db_version', $awsslideshow_db_version );
	}
	
	function uninstall(){
		
		global $wpdb;
		
		$query	=	'DROP TABLE IF EXISTS '.$this->tableName;
		
		$wpdb->query($query);
		
		delete_option('awsslideshow_db_version');
	}
	
	function getItem( $id, $output = OBJECT ){
		
		global $wpdb;
		
		if(isset($id) && $id){
			
			$result	=	$wpdb->get_row( $wpdb->prepare('SELECT * FROM wp_awsslideshow_slides WHERE id = %d', $id), $output );
			
			if($result){
				
				return $result;
				
			}else{
				
				return false;
			}
				
		}
		
		return wp_send_json(array('error' => true));
	}
	
	function getItems( $output = ARRAY_A ) {
		
		global $wpdb;
		
			
		$items	=	$wpdb->get_results( $wpdb->prepare('SELECT * FROM wp_awsslideshow_slides'), $output );
		
		if($result){
			
			return $items;
			
		}else{
			
			return false;
		}
				
	}
	
	function store( $data = array() ){
		
		global $wpdb;
		
		if(isset($data) && count($data) > 0){
			
			$data['date']	=	current_time( 'mysql' );
			
			$data	=	array_intersect_key($data, $this->fields);
			
			if(isset($data['id']) && $data['id'] && ($format = array_intersect_key($this->fields, $data))){
				
				ksort($format);
				ksort($data);
				
				$wpdb->update($this->tableName, $data, array('id' => $data['id']), array_values($format));
				
			}else{
				
				if($format = array_intersect_key($this->fields, $data)){
					
					$wpdb->insert($this->tableName, $data, array_values($format));
					
					$wpdb->update($this->tableName, 
						array('shortcode' => '[awsslideshow id="'.$wpdb->insert_id.'"]'), 
						array('id' => $wpdb->insert_id),
						array('%s'));
					
					$wpdb->flush();
				}
			}
			
		}
	}
	
	function delete( $data = array() ){
		
		global $wpdb;
		
		if(isset($data['awsslideshow']) && is_array($data['awsslideshow'])){
			
			
			return $wpdb->query('DELETE FROM '.$this->tableName.' WHERE id IN ('.implode(', ', $data['awsslideshow']).')');
			
		}
		
	}
}