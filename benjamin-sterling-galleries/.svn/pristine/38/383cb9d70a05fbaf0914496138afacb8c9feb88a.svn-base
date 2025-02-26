<?php
error_reporting(E_ERROR | E_WARNING);
/**
todo:

finish up the update functionality
*/
if(!class_exists("bsgAdmin")){
	class bsgAdmin extends bsg{
		var $version = "1.4";
		//svar $dir;
		var $file;
		var $admin_base_url = '';
		
		function bsgAdmin($file = ''){
			parent::bsg($file);
			unset($file);
			//$this->bsg_update();
			add_action('admin_menu', array(&$this, 'adminMenu'));
			$this->admin_base_url = get_option('siteurl') . '/wp-admin/admin.php?page=';
			$this->init();
		}
		
		function AdminManage(){
			global $wpdb;
			$this->print_supportProject();
			switch($_GET['action']){
				case 'edit_styles':
					$this->adminHeader();
					include($this->dir.'/common/inc/edit_styles.php');
					break;
				case 'edit_image_attr':
					include($this->dir.'/common/inc/edit_image_attr.php');
					break;
				case 'delete_album':
					$this->deleteAlbum();
				default:
					$wpdb->bsg_album = $this->default_options['bsg_album'];
					$wpdb->bsg_gallery = $this->default_options['bsg_gallery'];
					include($this->dir.'/common/inc/manager.php');
			}
		}
		
		function deleteAlbum(){
			global $wpdb;
			$sql = "DELETE FROM ".$this->default_options['bsg_album']." WHERE album_id = " . $wpdb->escape($_GET['aid']) . " LIMIT 1";
			@mysql_query($sql ) or die("An unexpected error occured.".mysql_error());

			$sql = "DELETE FROM ".$this->default_options['bsg_photos']." WHERE album_id = " . $wpdb->escape($_GET['aid']);
			@mysql_query($sql ) or die("An unexpected error occured.".mysql_error());
		}
		
		function adminMenu(){
			if (function_exists('add_menu_page')) {
				add_menu_page('BSG','BSG', 7, $this->file, array(&$this, 'AdminManage'));
			}
			if (function_exists('add_submenu_page')) {
				add_submenu_page($this->file, 'Manage Galleries', 'Manage Galleries', 7, $this->file, array(&$this, 'AdminManage'));
				add_submenu_page($this->file, 'Build Gallery', 'Build Gallery', 7, 'bsg_build', array(&$this, 'adminBuild'));
				add_submenu_page($this->file, 'BSG Usage', 'BSG Usage', 7, 'bsg_usage', array(&$this, 'adminUsage'));
				add_submenu_page($this->file, 'Flickr Params', 'Flickr Params', 7, 'bsg_flickrParams', array(&$this, 'adminFlickrParams'));
				add_submenu_page($this->file, 'Picasa Params', 'Picasa Params', 7, 'bsg_picasaParams', array(&$this, 'adminPicasaParams'));

				add_submenu_page($this->file, 'About', 'About', 7, 'bsg_about', array(&$this, 'adminAbout'));
			}
		}

		function init(){
			add_action('activate_' . $this->baseDir . '/benjaminSterlingGalleries.php',array(&$this,'bsg_install'));
			add_action('deactivate_' . $this->baseDir . '/benjaminSterlingGalleries.php',array(&$this,'bsg_unintall'));
		}

	function bsg_unintall(){
		global $wpdb, $user_level;
		
		if ( $user_level >= 10 ) {
			$bsg_album = $this->default_options['bsg_album'];
			@mysql_query(" DROP TABLE $bsg_album ");// or die("An unexpected error occured.".mysql_error());
			$bsg_gallery = $this->default_options['bsg_gallery'];
			@mysql_query(" DROP TABLE $bsg_gallery ");// or die("An unexpected error occured.".mysql_error());
			$bsg_photos = $this->default_options['bsg_photos'];
			@mysql_query(" DROP TABLE $bsg_photos ");// or die("An unexpected error occured.".mysql_error());
			delete_option('bsg');
			delete_option('bsg_album_version');
			delete_option('bsg_gallery_version');
			delete_option('bsg_photos_version');
			remove_filter('the_excerpt', 'put_gallery');
			remove_filter('the_content', 'put_gallery');
		}
	}
	
	function bsg_show_update(){
		$bsg_album_version = get_option('bsg_album_version');
		$bsg_gallery_version = get_option('bsg_gallery_version');
		$bsg_photos_version = get_option('bsg_photos_version');

		if	(
				$bsg_album_version != $this->default_options['bsg_album_version'] ||
				$bsg_gallery_version != $this->default_options['bsg_gallery_version'] ||
				$bsg_photos_version != $this->default_options['bsg_photos_version']
			){
?>
<div class="updated">
		<form action="<?php echo $_SERVER['REQUEST_URI'];?>&mode=update" method="post">
	<p>
		There were some changes for the database and an update needs to be ran:
			<input class="button" type="submit" value="Run Update" name="update"/>
	</p>
		</form>
</div>
<?php
		}
	}
	
		function bsg_update(){
			global $wpdb;
			if(count(get_option('bsg')) == 0) return;
	
			require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
			$bsg_album_version = get_option('bsg_album_version');
			$bsg_gallery_version = get_option('bsg_gallery_version');
			$bsg_photos_version = get_option('bsg_photos_version');
	
			if	($bsg_album_version != $this->default_options['bsg_album_version']){
				@dbDelta($this->get_ablumCreateSql());			
				update_option("bsg_album_version", $this->default_options['bsg_album_version']);
			}
	
			if	($bsg_gallery_version != $this->default_options['bsg_gallery_version']){
				@dbDelta($this->get_galleryCreateSql());
				update_option("bsg_gallery_version", $this->default_options['bsg_gallery_version']);
			}
	
			if	($bsg_photos_version != $this->default_options['bsg_photos_version']){
				dbDelta($this->get_photoCreateSql());					
				update_option("bsg_photos_version", $this->default_options['bsg_photos_version']);
			}

			include('pluginArray.php');

			for($i = 0; $i < count($galleries); $i++){
				$sql = "UPDATE ".$this->default_options['bsg_gallery']." SET ";
				$sql .= " gallery_title = '".$wpdb->escape($galleries[$i]['title'])."', ";
				$sql .= " gallery_js = '".$wpdb->escape($galleries[$i]['js'])."', ";
				$sql .= " gallery_css = '".$wpdb->escape($galleries[$i]['css'])."', ";
				$sql .= " gallery_example = '".$wpdb->escape($galleries[$i]['example'])."', ";
				$sql .= " gallery_params = '".$wpdb->escape($galleries[$i]['params'])."', ";
				$sql .= " gallery_framework = '".$wpdb->escape($galleries[$i]['framework'])."' ";
				$sql .= " WHERE gallery_id = " . ($i+1);
				$wpdb->query($sql);
			}

		}
	
		function get_ablumCreateSql(){
			return "CREATE TABLE " . $this->default_options['bsg_album'] . " (
				album_id mediumint(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				album_title VARCHAR(100) NOT NULL,
				gallery_id mediumint(9) DEFAULT '0' NULL,
				album_params VARCHAR(255) NULL,
				album_framework varchar(100) default 'jQuery',
				album_css TEXT NULL,
				album_uselarge char(1) NOT NULL default '0',
				album_structure enum('li','table','div','empty') NOT NULL default 'li'
			);";
		}
		
		function get_galleryCreateSql(){
			return "CREATE TABLE " . $this->default_options['bsg_gallery'] . " (
				gallery_id mediumint(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				gallery_title VARCHAR(100) NOT NULL,
				gallery_js VARCHAR(100) NOT NULL,
				gallery_css TEXT NULL,
				gallery_example VARCHAR(255) NULL,
				gallery_params TEXT NULL,
				gallery_framework varchar(100) default 'jQuery'
			);";
		}
		
		function get_photoCreateSql(){
			return "CREATE TABLE " . $this->default_options['bsg_photos'] . " (
				photo_id mediumint(9) NOT NULL auto_increment,
				photo_alt varchar(255) default NULL,
				photo_url varchar(255) NOT NULL,
				photo_tnurl varchar(255) NOT NULL,
				photo_order int(3) NOT NULL default '99',
				album_id int(3) NOT NULL,
				PRIMARY KEY  (photo_id)
			);";
		}
	
		function bsg_install(){
			global $wpdb;
			require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
			
			add_option('bsg', NULL, 'Options for the Benjamin Sterling Galleries plugin', 'no');
	
			$bsg_album = $this->default_options['bsg_album'];
			if($wpdb->get_var("show tables like '$bsg_album'") != $bsg_album) {
				dbDelta($this->get_ablumCreateSql());			
				add_option("bsg_album_version", $this->default_options['bsg_album_version']);
			}
	
			$bsg_gallery = $this->default_options['bsg_gallery'];
			if($wpdb->get_var("show tables like '$bsg_gallery'") != $bsg_gallery) {
				dbDelta($this->get_galleryCreateSql());
				add_option("bsg_gallery_version", $this->default_options['bsg_gallery_version']);
	
				include('pluginArray.php');
	
				$sql = "INSERT INTO " . $bsg_gallery . " (gallery_id, gallery_title, gallery_js, gallery_css, gallery_example, gallery_params, gallery_framework)  VALUES ";
				$sqlArray = array();
				for ($i = 0; $i < count($galleries); $i++) {
					array_push($sqlArray, "( ".($i+1).", '". $wpdb->escape($galleries[$i]['title']) ."', '".$wpdb->escape($galleries[$i]['js'])."', '".$wpdb->escape($galleries[$i]['css'])."', '".$wpdb->escape($galleries[$i]['example'])."', '".$wpdb->escape($galleries[$i]['params'])."', '".$wpdb->escape($galleries[$i]['framework'])."')");
				}
				$sql .= join(',',$sqlArray);
				$wpdb->query($sql);
			}
		
			$bsg_photos = $this->default_options['bsg_photos'];
			if($wpdb->get_var("show tables like '$bsg_photos'") != $bsg_photos) {
				dbDelta($this->get_photoCreateSql());			
				add_option("bsg_photos_version", $this->default_options['bsg_photos_version']);
			}
		}

		function adminAbout(){
			$this->print_supportProject();
			include($this->dir.'/common/inc/about.php');
		}
		function adminBuild(){
			$this->adminHeader();
			$this->print_supportProject();
			include($this->dir.'/common/inc/build.php');
		}
		
		function adminUsage(){
			$this->print_supportProject();
			include($this->dir.'/common/inc/usage.php');
		}
		
		function adminPicasaParams(){
			$this->print_supportProject();
			
			if(isset($_POST['picasaParamHidden'])):
				$picasa_user_id = $_POST['picasa_user_id'];
				$options = get_option('bsg');
				$options['picasa_user_id'] = $picasa_user_id;
				
				if(empty($picasa_user_id)){
					echo '<div id="message" class="error fade"><p>';
					if(empty($picasa_user_id)){
						echo __('Picasa Userid was empty.');
					}
					echo '</p></div>';
				}
				else{
					update_option('bsg', $options);
					echo '<div id="message" class="updated fade"><p>' . __('Options saved') . '</p></div>';
				}

			else:
				$options = get_option('bsg');
			endif;
			include($this->dir.'/common/inc/picasaParams.php');
		}
		function adminFlickrParams(){
			$this->print_supportProject();
			if(isset($_POST['flickrParamHidden'])):
				$flickr_user_id = $_POST['flickr_user_id'];
				$flickr_api_key = $_POST['flickr_api_key'];
				$flickr_photoset_id = $_POST['flickr_photoset_id'];
				$options = get_option('bsg');
				$options['flickr_user_id'] = $flickr_user_id;
				$options['flickr_api_key'] = $flickr_api_key;
				$options['flickr_photoset_id'] = $flickr_photoset_id;
				
				if(empty($flickr_api_key) || empty($flickr_user_id)){
					echo '<div id="message" class="error fade"><p>';
					if(empty($flickr_api_key)){
						 echo __('Flickr api key was empty.  ');
					}
					if(empty($flickr_user_id)){
						echo __('Flickr Userid was empty.');
					}
					echo '</p></div>';
				}
				else{
					update_option('bsg', $options);
					echo '<div id="message" class="updated fade"><p>' . __('Options saved') . '</p></div>';
				}
			else:
				$options = get_option('bsg');
			endif;
			include($this->dir.'/common/inc/flickrParams.php');
		}
		
		function getFormParts($part){
			$options = get_option('bsg');
			switch($part){
				case 'flickrAdvanced':
					include($this->dir.'/common/inc/formParts/flickrAdvanced.php');
					break;
				case 'picasaBasic':
					include($this->dir.'/common/inc/formParts/picasaBasic.php');
					break;
				case 'browseBasic':
					include($this->dir.'/common/inc/formParts/browseBasic.php');
					break;
				case 'flickrBasic':
					include($this->dir.'/common/inc/formParts/flickrBasic.php');
					break;
				case 'flickrOptions':
					include($this->dir.'/common/inc/formParts/flickrOptions.php');
					break;
				case 'picasaAdvanced':
					include($this->dir.'/common/inc/formParts/picasaAdvanced.php');
					break;
				case 'picasaOptions':
					include($this->dir.'/common/inc/formParts/picasaOptions.php');
					break;
				default:
					break;
			}
		}
		
		/**
		 *
		 *	@desc: adds the needed javascript file to the plugins body
		 */
		function adminHeader() {
?>
		<!-- Added for the Benjamin Sterling Galleries Plugin -->
		<script src="<?php echo $this->default_options['bsg_js'];?>jquery-1.2.1.min.js"></script>
		<script src="<?php echo $this->default_options['bsg_js'];?>jquery-ui.min.js"></script>
		<script src="<?php echo $this->default_options['bsg_js'];?>json.js"></script>
		<script src="<?php echo $this->default_options['bsg_js'];?>jquery.blockUI.js"></script>
		<script type="text/javascript">
			var sendTo = <?php echo ($_GET['id']) ? '"update&id='.$_GET['id'].'"' : '"put"';?>;
			var isUpdate = <?php echo ($_GET['id']) ? 'true' : 'false';?>;
		</script>
		<script type="text/javascript" src="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php?to=core&'.time();?>"></script>
		<style>
			ul#selectList,ul#imageList{margin:0;padding:0;}
			ul#selectList li,ul#imageList li{float:left;list-style:none;}
		</style>
		<!-- end : Added for the Benjamin Sterling Galleries Plugin -->
<?php
		}
		
		function get_album_json($url = NULL){
			$url = str_replace(array('rss_200','rss'),'json',$url);
			if(strpos($url, 'flickr') === false){}
			else{
				$url .= '&nojsoncallback=1';
			}
			
			$return = @file_get_contents($url);
			return  ($return) ? $return : '{"result":"error","errorType":"fileGetContent"}';
		}
		
		function update_styles(){
			global $wpdb;
			if(empty($_POST['styles'])) return '{"error":"error_no_styles"}';
			if(empty($_POST['aid'])) return '{"error":"error_no_id"}';
			
			$sql = "UPDATE " . $this->default_options['bsg_album'] . " SET album_css='".$wpdb->escape($_POST['styles']) ."' WHERE album_id = " . $wpdb->escape($_POST['aid']);
			$r = @mysql_query($sql) or die("An unexpected error occured.".mysql_error());;
			
			if($r){
				echo '{"good":"no_errors"}';
			}
			else{
				echo '{"error":"error_update"}';
			}
			
		}
		
		function update_photos(){
			global $wpdb;
			if(empty($_GET['value'])) return '{"error":"error_no_text"}';
			if(empty($_GET['pid'])) return '{"error":"error_no_id"}';
			
			$sql = "UPDATE " . $this->default_options['bsg_photos'] . " SET photo_alt='".$wpdb->escape($_GET['value']) ."' WHERE photo_id = " . $wpdb->escape($_GET['pid']);
			
			$r = @mysql_query($sql) or die("An unexpected error occured.".mysql_error());;
			
			if($r){
				echo '{"good":"no_errors"}';
			}
			else{
				echo '{"error":"error_update"}';
			}
			
		}
	}// end : bsgAdmin
}// end : if(!class_exists("bsgAdmin"))
?>