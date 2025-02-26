<?php
class studioDatabase {
	public function synchronizeMap($map) {
		global $wpdb;
		$map = (array)$map;
		
		$row = $wpdb->get_var("SELECT count(*) FROM  ".STUDIO_MAP_TABLE." WHERE studio_id = ".$map['id']);
		
		if($row == 1) { // Update
			$this->update($map);
		}
		else { // Insert
			$this->insert($map);
		}
	}
	
	private function update($row){
		global $wpdb;
		$updateid=$row['id'];

		$update=array( 
			'title'  => $row['title'],
			'height' => $row['height'],
			'height_parameter' => $row['height_parameter'],
			'width'  => $row['width'],
			'width_parameter'  => $row['width_parameter'],
			'html'   => $row['html']
		);

		if(count($update)){
			return $wpdb->update(STUDIO_MAP_TABLE,$update,array('studio_id' => $updateid));
		}
	}
	
	private function insert($row) {
		global $wpdb;
		return $wpdb->insert( STUDIO_MAP_TABLE, array('studio_id' => $row['id'], 'title' => $row['title'], 'height' => $row['height'], 'height_parameter' => $row['height_parameter'], 'width' => $row['width'], 'width_parameter' => $row['width_parameter'], 'html' => $row['html']) );
	}
	
	public function delete($id) { // primary key
		global $wpdb;
		return $wpdb->query("DELETE FROM ".STUDIO_MAP_TABLE." WHERE id=".(int)$id);
	}
	
	public function select() {
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM ".STUDIO_MAP_TABLE." ORDER BY studio_id DESC");
	}	
 }
?>