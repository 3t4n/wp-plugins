<?PHP
	function studioInstall() {
		$installer = new studioInstaller();
		$installer->install();
	}
	
	function studioUninstall() {
		$installer = new studioInstaller();
		$installer->uninstall();
	}
	
	function studioScriptEnqueue() {
		$currentPage = isset($_GET['page']) ? $_GET['page'] : '';
		
		wp_register_style('datatable_css', plugins_url( '../datatable/jquery.dataTables.css' , __FILE__ ));
		wp_register_style('font_awesome', '//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css' ,'');
		
		wp_register_style('bootflat_css', plugins_url('../bootflat/css/site.min.css' , __FILE__));
		wp_register_style('bootstrap_slider_css', plugins_url('../bootstrap/css/bootstrap-slider.css' , __FILE__));
		wp_register_script('datatable_script',plugins_url( '../datatable/jquery.dataTables.js' , __FILE__ ), array( 'jquery' ),'',true);
		
		wp_register_script('bootflat_js',plugins_url( '../bootflat/js/site.min.js' , __FILE__ ), array( 'jquery' ),'','');
		
		wp_register_script('mf_selecttag_js', plugins_url('../js/jquery.SelectTag.js', __FILE__), array(), '1.0.0', true );
		wp_register_script('jquery_migrate_js', plugins_url('../js/jquery-migrate-1.2.1.js', __FILE__), array(), '1.0.0', true );
		wp_register_script('jquery_ui_js','//code.jquery.com/ui/1.8.24/jquery-ui.js');
		wp_register_style('jquery_ui_css', '//code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css');
		
		wp_register_script('bootstrap_dialog_js','//cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.2/js/bootstrap-dialog.js');
		wp_register_style('bootstrap_dialog_css', '//cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.2/css/bootstrap-dialog.css');
	   
		wp_enqueue_style('font_awesome');
		
		
		$pluginPages = array("studio","studio_my_maps","studio_settings","studio_documentation","studio_social_share","studio_social_share_settings");
		if(!in_array($currentPage, $pluginPages)){
			return;
		}
		
		
		wp_enqueue_style('datatable_css'); 
		wp_enqueue_style('bootflat_css');
		wp_enqueue_style('bootstrap_slider_css');
	   
		wp_enqueue_script('datatable_script');
		wp_enqueue_script('bootflat_js');
		
		wp_enqueue_script('mf_selecttag_js');
		
		wp_enqueue_script('jquery_ui_js');
		wp_enqueue_style('jquery_ui_css');
		
		wp_enqueue_script('bootstrap_dialog_js');
		wp_enqueue_style('bootstrap_dialog_css');
	}
	
	function studioAddMenuIcon() {
		echo '<style type="text/css">
				.wp-menu-name > .fa.fa-leaf {
					margin-left: -25px;
				}
				#toplevel_page_studio li hr {
					margin: 11px 0 0 0;
				}
			</style>';
	}
	
	function uploadStudioShare($name) {
		$target_dir = STUDIO_DOCROOT."/images/share/";
		$target_file = $target_dir . $name . '.png';
		
		$imageFileType = pathinfo(basename($_FILES[$name]["name"]),PATHINFO_EXTENSION);
		
		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES[$name]["tmp_name"]);
		if($check !== false) {
			
		} else {
			return $name." File is not an image.";
		}
		
		// Check if file already exists
		if (file_exists($target_file)) {
			@unlink($target_file);
		}
		
		// Check file size
		if ($_FILES[$name]["size"] > 300000) {
			return "Sorry, your file ".$name." is too large. Max allowed size is : 300kb";
		}
		
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			return "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ".$name." is not an image";
		}
		
		
		if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
			return ""; //success
		} else {
			return "Sorry, there was an error uploading your file ".$name;
		}
	}
	
	
	function view_mapfig_studio_map() {
		global $wpdb;
		
		$id = 0;
		if(isset($_GET['id'])) {
			$id = (int)$_GET['id'];
		}
		
		if(!isset($_GET['height']) || !isset($_GET['width']) || (int)$_GET['height'] == 0 || (int)$_GET['width'] == 0) {
			die('Height and Width is not specified or Null');
		}
		
		$height = (int)$_GET['height'];
		$width  = (int)$_GET['width'];
		$height_unit = 'px';
		$width_unit  = 'px';
		
		if(strpos($_GET['height'], 'px') === FALSE) {
			$height_unit = '%';
		}
		if(strpos($_GET['width'], 'px') === FALSE) {
			$width_unit = '%';
		}
		
		$row = (array)$wpdb->get_row("SELECT * FROM ".$wpdb->prefix."studio_map WHERE id = ".$id);
		if(!$row) {
			die('Map not found!');
		}
		
		$search  = array("[#HEIGHT#]", "[#WIDTH#]", "[#HEIGHT_UNIT#]", "[#WIDTH_UNIT#]");
		$replace = array($height, $width, $height_unit, $width_unit);
		$html = str_replace($search, $replace, $row['html']);
		
		echo $html;
		exit;
	}
	add_action( 'wp_ajax_view_mapfig_studio_map', 'view_mapfig_studio_map' );
	add_action( 'wp_ajax_view_mapfig_studio_map', 'view_mapfig_studio_map' );
	
	function download_mapfig_studio_map() {
		global $wpdb;
	
		$id     = (int)$_GET['id'];
		$height = (int)$_GET['height'];
		$width  = (int)$_GET['width'];
		$height_unit = 'px';
		$width_unit  = 'px';
		
		if(strpos($_GET['height'], 'px') === FALSE) {
			$height_unit = '%';
		}
		if(strpos($_GET['width'], 'px') === FALSE) {
			$width_unit = '%';
		}
		
		$row = (array)$wpdb->get_row("SELECT * FROM ".$wpdb->prefix."studio_map WHERE id = ".$id);
		
		$search  = array("[#HEIGHT#]", "[#WIDTH#]", "[#HEIGHT_UNIT#]", "[#WIDTH_UNIT#]");
		$replace = array($height, $width, $height_unit, $width_unit);
		$html = str_replace($search, $replace, $row['html']);
		
		header("Content-Disposition: attachment; filename=map.html");
		header("Content-Length: ".strlen($html));
		echo $html;
		exit;
	}
	add_action( 'wp_ajax_download_mapfig_studio_map', 'download_mapfig_studio_map' );
	add_action( 'wp_ajax_download_mapfig_studio_map', 'download_mapfig_studio_map' );
?>