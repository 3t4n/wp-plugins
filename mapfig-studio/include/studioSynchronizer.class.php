<?PHP
	class studioSynchronizer {
		/* Just import all the maps */
		public function import($id = 0) {
			$id   = (int)$id;
			$json = "";
			
			if($id == 0) {
				$json = file_get_contents(STUDIO_SERVER.'/api/exporter.api.php?action=import&apikey='.get_option('studio_apikey'));
			}
			else {
				$json = file_get_contents(STUDIO_SERVER.'/api/exporter.api.php?action=refresh&id='.$id.'&apikey='.get_option('studio_apikey'));
			}
			$json = (array)json_decode($json);
			
			if(!$json['success']) {
				return $json['message'];
			}
			
			$this->synchronizeDatabase((array)$json['message']);
			
			return 1;
		}
		
		private function synchronizeDatabase($maps) {
			foreach($maps as $map) {
				$db = new studioDatabase();
				
				$db->synchronizeMap($map);
			}
		}
	}
?>