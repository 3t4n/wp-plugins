<?PHP
	function studioMenu() {
		add_menu_page('Studio', '<i class="fa fa-leaf fa-2"></i> '.STUDIO_PLUGIN_NAME_FORMATED.' Studio', 'administrator', 'studio', 'studio','dashicons-admin-mediab');
		
		add_submenu_page( 'studio', 'My Studio Maps', '<i class="fa fa-location-arrow"></i> My Studio Maps<hr>', 'administrator', 'studio_my_maps', 'studio_my_maps' ); 
		
		add_submenu_page( 'studio', 'Social Share', '<i class="fa fa-share"></i> Social Share', 'administrator', 'studio_social_share', 'studio_social_share' );
		add_submenu_page( 'studio', 'Documentation', '<i class="fa fa-book"></i> Documentation<hr>', 'administrator', 'studio_documentation', 'studio_documentation' );
		
		add_submenu_page( 'studio', 'Social Share', '<i class="fa fa-cog"></i> Social Settings', 'administrator', 'studio_social_share_settings', 'studio_social_share_settings' );
		add_submenu_page( 'studio', 'Settings', '<i class="fa fa-cog"></i> Settings', 'administrator', 'studio_settings', 'studio_settings' ); 
	}
	
	function studio() {
		include STUDIO_DOCROOT . '/views/documentation.php';
	}
	
	function studio_documentation() {
		include STUDIO_DOCROOT . '/views/documentation.php';
	}
	
	function studio_my_maps() {
		$msg = '';
		$err = '';
		
		$db = new studioDatabase();
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == "delete") {
				$db->delete($_GET['id']);
			}
			else if($action == "import") {
				$importer = new studioSynchronizer();
				$res = $importer->import();
				
				if($res == 1) {
					$msg = "Available Maps Imported.";
				}
				else {
					$err = $res;
				}
			}
			else if($action == "refresh") {
				$importer = new studioSynchronizer();
				$res = $importer->import($_GET['id']);
				
				if($res == 1) {
					$msg = "Available Maps Imported.";
				}
				else {
					$err = $res;
				}
			}
		}
		$result = (array)$db->select();
		include STUDIO_DOCROOT . '/views/my_maps.php';
	}
	
	function studio_social_share() {
		$db = new studioDatabase();
		$result = (array)$db->select();
		
		include STUDIO_DOCROOT . '/views/social_share.php';
	}
	
	function studio_social_share_settings(){
		$msg = "";
		$err = "";
		
		if(isset($_POST['save'])) {
			foreach($_FILES as $index => $file) {
				if(in_array($index, array('default','facebook','twitter','email','linkedin','pinterest')) && $file['error'] == 0 && $file['size'] > 0) {
					$res = uploadStudioShare($index);
					if($res != "") {
						$err .= $res.'<br>';
					}
					else {
						$msg .= $index.' image is Successfully uploaded<br>';
					}
				}
			}
		}
		include STUDIO_DOCROOT . '/views/social_share_settings.php';
	}
	
	function studio_settings() {
		if(isset($_POST['save'])){
			update_option('studio_apikey',$_POST['studio_apikey']);
			update_option('studio_url',$_POST['studio_url']);
			$msg = "API key Successfully Saved!";
		}
		$studio_apikey = get_option('studio_apikey');
		$studio_url    = get_option('studio_url');
		include STUDIO_DOCROOT . '/views/settings.php';
	}
?>