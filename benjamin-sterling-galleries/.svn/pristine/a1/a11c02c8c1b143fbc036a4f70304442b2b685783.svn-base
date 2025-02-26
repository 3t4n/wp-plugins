<?php
//error_reporting(E_ERROR | E_WARNING);
if(!class_exists("bsg")){
	class bsg{
		var $version = "1.0";
		var $dir;
		var $baseDir;
		var $default_options;
		var $file;
		
		function bsg($file=''){
			global $wpdb;
			$this->file = $file;
			$this->dir = dirname($file);
			$this->baseDir = basename($this->dir);
			$this->baseFile = array_pop( explode  ('\\',$file) );
			unset($file);

			$default_options = array(
				// database tables
				'bsg_album' => $wpdb->prefix . "bsg_album",
				'bsg_album_version' => "1.0",
				'bsg_gallery' => $wpdb->prefix . "bsg_gallery",
				'bsg_gallery_version' => "1.1",
				'bsg_photos' => $wpdb->prefix . "bsg_photos",
				'bsg_photos_version' => "1.0",
				
				// url
				'bsg_js' => get_bloginfo('wpurl') . '/wp-content/plugins/' . $this->baseDir . '/common/js/'
			);
			$this->default_options = $default_options;
			unset($default_options);
		}
		
		function print_css($id=0, $return =false){
			global $wpdb;
			$id = ($id == 0) ? $wpdb->escape($_GET['aid']) : $id;
			$r = $wpdb->get_row('SELECT album_css from ' . $this->default_options['bsg_album'] . ' WHERE album_id = ' . $id);
			if( false == $return ){
				echo $r->album_css;
			}
			else{
				return $r->album_css;
			}
		}
		
		function get_default_options(){
			return $this->default_options;
		}
		
		function get_galleries($id=0){
			global $wpdb;
			$sql = "SELECT * FROM " . $this->default_options['bsg_gallery'];
			if( $id != 0 ){
				$sql .= ' where gallery_id ='.cleanSQL($id,'int');
			}
			return $wpdb->get_results($sql);
		}
		
		function get_galleries_selectMenu($id=0){
			$results = $this->get_galleries();
			$return = '<select name="selectGallery" id="selectGallery"><option selected="selected" value="0"></option>';
			foreach ($results as $result) {
				$return.= '<option value="'.$result->gallery_id.'" title="'.$result->gallery_example.'" metadata="'.encodeURIComponent($result->gallery_params).'"';
				$return .= ($id == $result->gallery_id) ? ' selected="selected" ':'';
				$return .= '>'.$result->gallery_title.'</option>';
			}
			echo $return .= '</select>';
		}
		
		
		/**
		 * @name get_image
		 * @example	get_image(1);
		 * @description Gets the images that are related to the album
		 */
		function get_imgs($album_id=0, $printAll=true){
			global $wpdb;
			return $wpdb->get_results("SELECT * FROM ".$this->default_options['bsg_photos']." WHERE album_id=".cleanSQL($album_id, "int")." ORDER BY photo_order ASC");
		}// end : get_imgs
		
		/**
		 * @name get_img_list
		 * @example	get_img_list(MYSQL_ASSOC);
		 * @description Builds out a list item with images and links
		 */
		function print_img_list($object, $printAll=true, $album_large=false){	
			$return="";
			foreach ($object as $result) {
				if($printAll){
					$return .= '<li><a href="'.$result->photo_url.'" alt="'.$result->photo_alt.'"><img src="';
					$return .= ($album_large) ? $result->photo_url : $result->photo_tnurl;
					$return .= '" metadata="'.encodeURIComponent('{"tnurl":"'.$result->photo_tnurl.'","url":"'.$result->photo_url.'","alt":"'.htmlentities($result->photo_alt,ENT_QUOTES).'"}').'"/></a></li>';
				}
				else{
					$return.= '<li><img src="';
					$return .= ($album_large) ? $result->photo_url : $result->photo_tnurl;
					$return .= '" metadata="'.encodeURIComponent('{"tnurl":"'.$result->photo_tnurl.'","url":"'.$result->photo_url.'","alt":"'.htmlentities($result->photo_alt,ENT_QUOTES).'"}').'"/></li>';
				}
			}
			
			if( $printAll ){
				return '<ul id="bsg" title="The Gallery">'.$return.'</ul>';
			}
			else{
				return $return;
			}
		}// end : print_img_list
		
		function build_img_list($album_id=0, $album_large=false){
			$imgs = $this->get_imgs( $album_id );
			echo $this->print_img_list($imgs, true, $album_large);
		}// end : build_img_list
		
		function get_img_list($album_id=0){
			if(!$album_id) return;
			echo $this->print_img_list($this->get_imgs( $album_id ), false);
		}// end : build_img_list

		/**
		 * @name public_build_img_gallery
		 * @example	public_build_img_gallery(1);
		 * @description Builds out a list item with images and links and javascript
		 */
		function public_build_img_gallery($album_id=0){
			if(!$album_id) return;

			$fullReturn = $this->print_img_list( $this->get_imgs( $album_id ) );
			$albumResult = $this->get_album_data( $album_id );
			$galleryResult = $this->get_galleries($albumResult->gallery_id);

			if (!extension_loaded('json')){
				include_once($this->dir.'/common/inc/JSON.php');
				$json = new JSON;
				$objs = $json->unserialize(stripslashes($albumResult->album_params));
			}
			else{
				$objs = json_decode(stripslashes($albumResult->album_params));
			}
			$jsParam = array();
			if($objs){
				foreach($objs as $obj => $k){
					$k = (is_numeric($k) || is_bool($k)) ? $k : '"'.$k.'"';
					array_push($jsParam, $obj . ':' . $k);
				}
			}
		
			$fullReturn .= $this->print_code(2,null,null, true);
			$fullReturn .= $this->print_code(1,$galleryResult[0]->gallery_js,$jsParam, true);
			
			 return $fullReturn;
		}

		/**
		 * @name print_code
		 * @example	print_code();
		 * @param Integer $whichCode
		 *				default: NULL
		 *				Purpose: Selects the javascript code to print out
		 * @param String $jsFunc
		 *				default: NULL
		 *				Purpose: 
		 * @param Array $jsParam
		 *				default: NULL
		 *				Purpose: 
		 * @param $doreturn
		 *				default: false
		 *				Purpose: 
		 * @description Builds out a list item with images and links and javascript
		 */
		function print_code($whichCode=NULL, $jsFunc=NULL, $jsParam='', $doreturn =false, $aid=0){
			if( count( $jsParam ) == 0 )
				$jsParam = array();

			$return = '';

			switch($whichCode){
				case 0:
	$return = '
<script type="text/javascript">
	$(document).ready(function(){
		$("#imageList li")
		.dblclick(function(){
			var $this = $(this);
			if($this.parent("#selectList").size() != 0){
				$this.appendTo("#imageList");
			}
			else{
				$this.appendTo("#selectList");
			};
		});
		$("#imageList").sortable();
		//$("#selectGallery").trigger("change");
	});
</script>
	';
					break;
				case 1:
	$return = '
<script src="'.get_bloginfo('wpurl') . '/wp-content/plugins/' . $this->baseDir . '/galleryScripts/'.$jsFunc.'/'.$jsFunc.'.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#theBSGGallery").'.$jsFunc.'({'.join(',',$jsParam).'});
	});
</script>

<link type="text/css" href="'.get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php?to=css&aid='.$aid.'&'.time().'" rel="stylesheet"/>
	';
	//@import url("'.get_bloginfo('wpurl') . '/wp-content/plugins/' . $this->baseDir . '/galleryScripts/'.$jsFunc.'/'.$jsFunc.'.css");
					break;
				case 2:
					$return = '<script src="'. $this->default_options['bsg_js'] .'jquery-1.2.1.min.js"></script>';
					break;
			}
			
			if( $doreturn ){
				return $return;
			}
			else{
				echo $return;
			}
		}
		
		
function get_OptionTable($params=NULL, $gallery_id=0){
	global $wpdb;
	if($params == NULL){
	echo '
<script type="text/javascript">
	$(document).ready(function(){
		$("#selectGallery").trigger("change");
	});
</script>
	';
	}
	else{
		if (!extension_loaded('json')){
			include_once($this->dir.'/common/inc/JSON.php');
			$json = new JSON;
			$objs = $json->unserialize(stripslashes($params));
		}
		else{
			$objs = json_decode(stripslashes($params));
		}

		$sql = "SELECT * FROM ".$this->default_options['bsg_gallery']." WHERE gallery_id = ".cleanSQL($gallery_id, "int");
		$r = $wpdb->get_row($sql);
		
		if (!extension_loaded('json')){
			include_once($this->dir.'/common/inc/JSON.php');
			$json = new JSON;
			$galparams = $json->unserialize(stripslashes($r->gallery_params));
		}
		else{
			$galparams = json_decode(stripslashes($r->gallery_params));
		}
		
		$return = '';
		if($galparams->parameters){
			foreach ($galparams->parameters as $galparam => $v) {
				$return .= '<tr><td>'.$v->param.'</td><td><input type="text" size="30" name="'.$v->param.'"';
				$tmp = $v->param;
				$return .= ($objs->$tmp) ? ' value="'.$objs->$tmp.'" ' : '';
				$return .= '/></td><td>'.$v->desc.'</td></tr>';
			}
		}
		echo $return;
	}
}
		
		function print_supportProject(){
?>
<div class="wrap">
	<table cellpadding="3" cellspacing="3" border="0">
		<tr>
			<td valign="top">
				<p>Please help support this project with a donation.  All monies donated will go toward hosting and bandwidth.</p>
			</td>
			<td>
	<form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post"><input type="hidden" name="cmd" value="_s-xclick"><input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"><input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHRwYJKoZIhvcNAQcEoIIHODCCBzQCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYBijcBhndVDrXN0Fz0c0CXYjudL/QJeS1pKTweX15GAggkQmdq8c5Xd5LI6hay8mlR8bz0ZbAvpNAmvKPXRfRsTtEcnKv/oQa9ZupFwdP0m/hWgCpSTobeFvJnpZcnak1mFlL+x7aS/+bmlIpn3QBsqfPZYveQsINbGOxode5dzDjELMAkGBSsOAwIaBQAwgcQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQI8wE7O9DNdjuAgaDyoqhRehLVgMwosxdA8CRzafhMwRWB78e6KEg7V+FAAJfj9ldmEnu05irzvh5jQpHIXE+wLsY4zbrjs78gXDAvN+AbZh6ogAP26TAZpryJjV1COIuhiKZ/21UgAURpYwRzSKDCQrfRA/BK1ISrQJlOk0EoNLH/A5NzA+ORrW4QxuFAztxkB/AqyyBcfMlkkjW/WnlKy9vfZ7di4tfoCWn1oIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMDcxMjA0MDUzODAyWjAjBgkqhkiG9w0BCQQxFgQUXMnnbP13IoIOWoODrYaIKn0qXRowDQYJKoZIhvcNAQEBBQAEgYCOzlIEHBps9xyX8ZZcAUtRYrfaOerTjuslQiwQyGqLjVQQSwGHViixAL+K+m3yaXsYbRmZyQcdIk/OyUnf/VvmVgszB7hs9FOFQ8Tz0I2u17lmsRKmE+n7MzJ6UEFOWk62jfmKKbIYd/3CJBJSx58e7fvoiFNi+g4ezvyRzoScdQ==-----END PKCS7-----"></form>
			</td>
		</tr>
	</table>
</div>
<?php
		}
		
		function print_js($which = NULL){
			if($which == NULL) return;
			header('Content-type: application/javascript');
			switch ( $which ){
				case 'core':
					include($this->dir . '/common/js/core.js'); 
					break;
				case 'edit_styles':
					include($this->dir . '/common/js/edit_styles.js'); 
					break;
				case 'edit_image_attr':
					include($this->dir . '/common/js/edit_image_attr.js'); 
					break;
			}
		}
		function get_album_data($id=0){
			global $wpdb;
			$id = ($id==0) ? $this->cur_album_id : $id;
			$sql = "SELECT * FROM ".$this->default_options['bsg_album']." WHERE album_id = ".cleanSQL($id,'int');
			return $wpdb->get_row($sql);
		}// end : get_album_data
		
/**
 *
 *  UPDATE/NEW FUNCTIONS, WILL DEPRESIATE DUPLICATES IN A LATER VERSION
 *
 */
		 
		 var $cur_album_id = 0;
		 var $cur_album_info = NULL;
		 var $cur_image_group = array();
		 var $cur_return = '';
		 var $cur_js_func = '';
		 var $cur_js_show = '';
		 
		function build_js($album_id=0){
			$this->cur_album_id = $album_id;
			$this->get_album_info();
			$this->get_js_func();
			if($this->cur_album_info){

				if (!extension_loaded('json')){
					include_once($this->dir.'/common/inc/JSON.php');
					$json = new JSON;
					$objs = $json->unserialize(stripslashes($this->cur_album_info->album_params));
				}
				else{
					$objs = json_decode(stripslashes($this->cur_album_info->album_params));
				}
				$jsParam = array();
				if($objs){
					foreach($objs as $obj => $k){
						$k = (is_numeric($k) || is_bool($k)) ? $k : '"'.$k.'"';
						array_push($jsParam, $obj . ':' . $k);
					}
				}
				
				$showA = '';
				
				switch($this->cur_js_func){
					case 'lightBox':
					case 'thickbox':
						$selector = 'a.'.$this->cur_js_func .',#bsg'.$this->cur_album_id.' a';
						break;
					default:
						$selector = '#bsg'.$this->cur_album_id;
						break;
				}
			echo '(function($){$(document).ready(function(){$("'.$selector.'").'.$this->cur_js_func.'({'.join(',',$jsParam).'});});})(jQuery);';
			}
		}
		 
		 function build_image_set($album_id=0, $r = false, $js = true){
			$this->cur_album_id = $album_id;
			$this->cur_js_show = $js;
			$this->get_album_info();
			
			if($this->cur_album_info){
				$this->get_imgs_group();
				$this->get_css_link();
				$this->get_js_func();
				$this->get_js_code();
				$this->buildout_images();
			}

			if($r){
				return $this->cur_return;
			}
			else{
				echo $this->cur_return;
			}
		 }  //  end :  function build_image_set()
		
		
		function get_album_info(){
			global $wpdb;
			$this->cur_album_info = $wpdb->get_row("SELECT * FROM ".$this->default_options['bsg_album']." WHERE album_id = ".$wpdb->escape($this->cur_album_id));
		}// end : get_album_info
		
		/**
		 * @name get_image
		 * @example	get_imgs_group()
		 * @description Gets the images that are related to the album
		 */
		function get_imgs_group(){
			global $wpdb;
			$this->cur_image_group = $wpdb->get_results("SELECT * FROM ".$this->default_options['bsg_photos']." WHERE album_id=".$wpdb->escape($this->cur_album_id)." ORDER BY photo_order ASC");
		}// end : get_imgs_group
		
		/**
		 * @name buildout_images
		 * @example	buildout_images()
		 * @description Builds out a list item with images and links
		 */
		function buildout_images(){	
			$return="";
			if($this->cur_album_info->album_structure == 'li'){
				$return .= '<ul id="bsg'.$this->cur_album_id;
				$return .= '" title="'.htmlentities($this->album_title).'">';
				foreach ($this->cur_image_group as $result) {
					if(!$this->cur_album_info->album_uselarge){
						$return .= '<li><a href="'.$result->photo_url;
						$return .= '" title="'.htmlentities($result->photo_alt).'" ';
						$return .= '" alt="'.htmlentities($result->photo_alt).'"><img src="';
						$return .= ($album_large) ? $result->photo_url : $result->photo_tnurl;
						$return .= '" metadata="'.encodeURIComponent('{"tnurl":"'.$result->photo_tnurl.'","url":"'.$result->photo_url.'","alt":"'.htmlentities($result->photo_alt,ENT_QUOTES).'"}').'"/></a></li>';
					}
					else{
						$return.= '<li><img alt="'.htmlentities($result->photo_alt).'" src="';
						$return .= $result->photo_url;
						$return .= '" metadata="'.encodeURIComponent('{"tnurl":"'.$result->photo_tnurl.'","url":"'.$result->photo_url.'","alt":"'.htmlentities($result->photo_alt,ENT_QUOTES).'"}').'"/></li>';
					}
				}
				$return .= '</ul>';
				$this->cur_return .= $return;
			}
			else if($this->cur_album_info->album_structure == 'table'){
				$return .= '<table id="bsg'.$this->cur_album_id;
				$return .= '" title="'.htmlentities($this->album_title).'" border="0" cellspacing="0" cellpadding="0">';
				$i = 1;
				$cols = 5;
				$total = count($this->cur_image_group);
				foreach ($this->cur_image_group as $result) {
					if(($i % $cols) == 1){
						$return .= "<tr>\n";
					}
					
					$return .= "<td>\n";
					
					$return .= '<a class="'.$this->cur_js_func.'" rel="bsgGallery'.$this->cur_album_id.'" href="'.$result->photo_url;
					$return .= '" title="'.htmlentities($result->photo_alt).'" ';
					$return .= '" alt="'.htmlentities($result->photo_alt).'"><img src="';
					$return .= ($album_large) ? $result->photo_url : $result->photo_tnurl;
					$return .= '" metadata="'.encodeURIComponent('{"tnurl":"'.$result->photo_tnurl.'","url":"'.$result->photo_url.'","alt":"'.htmlentities($result->photo_alt,ENT_QUOTES).'"}').'"/></a>';

					$return .= "</td>\n";
		
					if(($i % $cols) == 0){
						$return .= "</tr>\n";
					}
					else if($i == $total){
						//echo $cols-($total%$cols);
						for($j = 1; $j <= ($cols-($total%$cols)); $j++){
							$return .= "<td>&nbsp;</td>\n";
						}
						$return .= "</tr>\n";			
					}
					$i++;
				}
				
				$return .= '</table>';
				$this->cur_return .= $return;
				
			}
			else if($this->cur_album_info->album_structure == 'div'){
				foreach ($this->cur_image_group as $result) {
					$return .= '<div class="bsgDivWrapper"><a class="'.$this->cur_js_func.'" rel="bsgGallery'.$this->cur_album_id.'" href="'.$result->photo_url;
					$return .= '" title="'.htmlentities($result->photo_alt).'" ';
					$return .= '" alt="'.htmlentities($result->photo_alt).'"><img src="';
					$return .= ($album_large) ? $result->photo_url : $result->photo_tnurl;
					$return .= '" metadata="'.encodeURIComponent('{"tnurl":"'.$result->photo_tnurl.'","url":"'.$result->photo_url.'","alt":"'.htmlentities($result->photo_alt,ENT_QUOTES).'"}').'"/></a></div>';
				}
				$this->cur_return .= $return;
			}
			else if($this->cur_album_info->album_structure == 'empty'){
				foreach ($this->cur_image_group as $result) {
					$return .= '<a class="'.$this->cur_js_func.'" rel="bsgGallery'.$this->cur_album_id.'" href="'.$result->photo_url;
					$return .= '" title="'.htmlentities($result->photo_alt).'" ';
					$return .= '" alt="'.htmlentities($result->photo_alt).'"><img src="';
					$return .= ($album_large) ? $result->photo_url : $result->photo_tnurl;
					$return .= '" metadata="'.encodeURIComponent('{"tnurl":"'.$result->photo_tnurl.'","url":"'.$result->photo_url.'","alt":"'.htmlentities($result->photo_alt,ENT_QUOTES).'"}').'"/></a>';
				}
				$this->cur_return .= $return;
			}
		}// end : print_img_list
		
		function get_css_link(){
			$this->cur_return .= '<link type="text/css" href="'.get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php?to=css&aid='.$this->cur_album_id.'&'.time().'" rel="stylesheet"/>';
		}
		
		function get_js_func(){
			global $wpdb;
			$sql = "SELECT * FROM " . $this->default_options['bsg_gallery'] .' where gallery_id ='.$this->cur_album_info->gallery_id;
			$tmp =$wpdb->get_row($sql);
			$this->cur_js_func = $tmp->gallery_js;
		}
		
		function get_js_code(){
			if(!$this->cur_js_show) return;

			if (!extension_loaded('json')){
				include_once($this->dir.'/common/inc/JSON.php');
				$json = new JSON;
				$objs = $json->unserialize(stripslashes($this->cur_album_info->album_params));
			}
			else{
				$objs = json_decode(stripslashes($this->cur_album_info->album_params));
			}
			$jsParam = array();
			if($objs){
				foreach($objs as $obj => $k){
					$k = (is_numeric($k) || is_bool($k)) ? $k : '"'.$k.'"';
					array_push($jsParam, $obj . ':' . $k);
				}
			}
			
			if (function_exists('wp_register_script')) {
				wp_register_script('bsg_javascript', $this->default_options['bsg_js'] .'jquery-1.2.1.min.js');
				wp_print_scripts('bsg_javascript');
		
				wp_register_script('bsg_javascript'.$this->cur_js_func, get_bloginfo('wpurl') . '/wp-content/plugins/' . $this->baseDir . '/galleryScripts/'.$this->cur_js_func.'/'.$this->cur_js_func.'.js');
				wp_print_scripts('bsg_javascript'.$this->cur_js_func);
			}
			
			$showA = '';
			
			switch($this->cur_js_func){
				case 'lightBox':
				case 'thickbox':
					$selector = 'a.'.$this->cur_js_func .',#bsg'.$this->cur_album_id.' a';
					break;
				default:
					$selector = '#bsg'.$this->cur_album_id;
					break;
			}
			
			$this->cur_return .= '<script type="text/javascript">(function($){$(document).ready(function(){$("'.$selector.'").'.$this->cur_js_func.'({'.join(',',$jsParam).'});});})(jQuery);</script>';
		}//
		

	}// end : bsg
}// end : if(!class_exists("bsg"))
?>