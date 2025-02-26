<?php
class Axcoto_Slideshow {
	private static $_instance=null;
	private $_galleries = array();
	private $_slideshows = array();
	private $_attb_pattern = array(
			'bannerWidth', 
			'bannerHeight', 

			'textSize', 
			'textColor',
			'textAreaWidth',
			'textLineSpacing',	
			'textLetterSpacing',	
			'textMarginLeft',
			'textMarginBottom',

			'transitionType',
			'transitionDelayTimeFixed',
			'transitionDelayTimePerWord',
			'transitionSpeed',
			'transitionBlur',
			'transitionRandomizeOrder',	

			'showTimerClock',
			'showBackButton',
			'showNumberButtons',
			'showNumberButtonsAlways',
			'showNumberButtonsHorizontal',
			'showNumberButtonsAscending',
			'autoPlay',
	);

	public static function getSingleton() {
		if (!self::$_instance instanceof Axcoto_Slideshow) {
			$c = __CLASS__;
			self::$_instance = new $c();
		}
		return self::$_instance;
	}

	public function filterInsertSlideshow($content) {
		if (($a=strpos($content,'[['.AXCOTO_HASHTAG))===false) {
			return $content;
		}
		
		while( $a !== false ){
			$b = strpos($content,']]',$a);
			$gString = substr($content, $a, $b - $a +2);
			
			$keycode = preg_match('/"(.*)"/', $gString, $matches);
			$galleryFile = trim($matches[1]);
			
			ob_start();
			$this->renderWidgetContent(array('title' => '', 'galleryFile' => trim($matches[1])));
			$widgetContent = ob_get_clean();
			$content = str_replace($gString, $widgetContent, $content);
			$a=strpos($content,'[['.AXCOTO_HASHTAG);
		}		
		return $content;
	}

	private function __construct() {
		foreach ($_POST as $key=>$val) {
			$_POST[$key] = stripslashes($val);
		}
		foreach ($_GET as $key=>$val) {
			$_POST[$key] = stripslashes($val);
		}
	}

	/**
	 * Handle setting form on widget page
	 * @return output data
	 */
	function renderWidgetSetting($options, &$widget=NULL) {
		$this->getGalleries();
		if ($options['galleryFile'] && file_exists(AXCOTO_SLIDESHOW_DIR . '/slideshow/galleries/' . $options['galleryFile'])) {
			$this->_loadXML($options['galleryFile']);
			$options = array_merge($options, $this->_slideshows['attbs']);
		}

		include('templates/admin/widget_setting.php');
	}

	/**
	 * Store setting for an XML file
	 */
	function saveWidgetSetting($widgetSetting, &$widget=NULL) {
		$this->_loadXML($widgetSetting['galleryFile']);
		foreach ($this->_attb_pattern as $key) {
			if (!empty($_POST[$key])) {
				$this->_slideshows['attbs'][$key] = $_POST[$key];
			}
		}
		$this->_saveXML($widgetSetting['galleryFile']);
	}

	/**
	 * Render content to display widget on the front-end site
	 * @return output data
	 */
	function renderWidgetContent($options, &$widget=NULL) {
		$this->_loadXML($options['galleryFile']);
		$dir_xml = get_option('siteurl') . '/wp-content/plugins/axcoto-slideshow/slideshow';
		include('templates/widget.php');
	}

	/**
	 * Handle admin page to manage images of slideshow
	 * @return unknown_type
	 */
	function renderAdminPage() {
		$this->_handleAction();
	}
	
	function renderAdminHelp() {
		echo "Coming soon";
	}

	/**
	 * Route function
	 * @return run the callback function which is correctsponding to each action
	 */
	private function _handleAction() {
		switch ($_REQUEST['act']) {
			case 'add':
				$this->_addItem();
				break;
			case 'delete':
				$this->_deleteItem();
				break;
			case 'save':
				$this->_saveItem();
				break;
			case 'saveGallerySetting':
				$this->_saveGallerySetting();
				break;	
			case 'addGallery':
				$this->_addGallery();
				break;
			case 'viewGallery':
				$this->_viewGallery();
				break;
			case 'deleteGallery':
				$this->_deleteGallery();
				break;
			default:
				$this->_renderFrontPage();
				break;
		}
	}
	
	
	function _renderFrontPage() {
		$this->getGalleries();
		include('templates/admin/gallery.php');
	}
	
	function _saveGallerySetting() {
		$options['galleryFile'] = $_GET['file']; 
		$this->saveWidgetSetting($options);
		$msg = "Gallery Setting is saved";
		$link = $this->_renderUrl('viewGallery', array('file' => $_GET['file'], 'rnd' => time()));
		include('templates/redirect.php');				
	}

	function _addGallery() {
		$galleryPath = AXCOTO_SLIDESHOW_DIR . '/slideshow/galleries';
		$title = preg_replace('/[^a-zA-Z0-9\-_\.]/', '-', $_POST['title']);
		ob_start();
		include('templates/raw-gallery.php');
		$xml = ob_get_contents();
		ob_end_clean();
		if (!file_exists("{$galleryPath}/{$title}.xml")) {
			file_put_contents("{$galleryPath}/{$title}.xml", $xml);
			$this->_redirect($this->_renderUrl('frontpage'), 'Added gallery');
		} else {
			echo "The gallery is already exist";
		}
	}

	function _viewGallery() {
		$galleryFile =  $_GET['file'];
		$this->_loadXML($galleryFile);
		$options = $this->_slideshows['attbs'];
		
		include('templates/admin/slideshow.php');
	}

	private function _deleteGallery() {
		$galleryFile =  $_GET['file'];
		$this->_loadXML($galleryFile);
		foreach ($this->_slideshows['item'] as $key=>$item) {
			$image_path = str_replace(AXCOTO_SLIDESHOW_URL, AXCOTO_SLIDESHOW_DIR, $item['image']);
			try {
				unlink($image_path);
			} catch(Exception $e) {
				echo 'Let grant write permission for folder images';
			}
		}

		try {
			unlink(AXCOTO_SLIDESHOW_DIR . '/slideshow/galleries/' . $_GET['file']);
		} catch(Exception $e) {
			echo 'Let grant write permission for folder galleries';
		}

		$msg = "Gallery is removed";
		$link = $this->_renderUrl('frontpage', array('rnd' => time()));
		include('templates/redirect.php');
	}

	/**
	 * When user add new item on admin page
	 * @return no
	 */
	function _addItem() {
		$i = array();
		$this->_loadXML($_GET['file']);
		if (!$_FILES['image']['error']) {
			$str_time = time();
			$image_path = AXCOTO_SLIDESHOW_DIR . "/slideshow/mySlideShowImages/banner_images/{$str_time}{$_FILES['image']['name']}";
			$image_url = AXCOTO_SLIDESHOW_URL . "/slideshow/mySlideShowImages/banner_images/{$str_time}{$_FILES['image']['name']}";

			if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
				echo 'Error while moving upload file! Check permission';
			} else {
				$i['image'] = $image_url;
			}
		}

		$i['link'] = $_POST['link'];
		$i['target'] = $_POST['target'];
		$i['textBlend'] = $_POST['textBlend'];
		$i['data'] = $_POST['data'];
		$this->_slideshows['item'][] = $i;
		$this->_saveXML($_GET['file']);

		$msg = "The image added";
		$link = $this->_renderUrl('viewGallery', array('file' => $_GET['file'], 'rnd' => time()));
		include('templates/redirect.php');
	}

	/**
	 * When user remove item on admin page
	 *
	 * @return no
	 */
	function _deleteItem() {
		$this->_loadXML($_GET['file']);
		$i = (int)$_GET['item_id'];

		$image_path = str_replace(AXCOTO_SLIDESHOW_URL, AXCOTO_SLIDESHOW_DIR, $this->_slideshows['item'][$i]['image']);
		try {
			unlink($image_path);
		} catch(Exception $e) {
			echo 'Let grant write permission for folder images';
		}
		unset($this->_slideshows['item'][$i]);
		$this->_saveXML($_GET['file']);
		$msg = "The image removed";
		$link = $this->_renderUrl('viewGallery', array('file' => $_GET['file'], 'rnd' => time()));
		include('templates/redirect.php');
	}

	/**
	 * When user fill in form and click save on admin page for exist items
	 * @return no
	 */
	function _saveItem() {
		$i = (int)$_GET['item_id'];
		$this->_loadXML($_GET['file']);
		$this->_slideshows['item'][$i]['link'] = $_POST['link'];
		$this->_slideshows['item'][$i]['target'] = $_POST['target'];
		$this->_slideshows['item'][$i]['data'] = $_POST['data'];
		$this->_slideshows['item'][$i]['textBlend'] = $_POST['textBlend'];

		$this->_saveXML($_GET['file']);

		$msg = "The item saved";
		$link = $this->_renderUrl('viewGallery', array('file' => $_GET['file'], 'rnd' => time()));
		include('templates/redirect.php');
	}


	/**
	 * Load XML data into array to manipulte with it more easily
	 * @return unknown_type
	 */
	private function _loadXML($file) {
		try {
			$slideshows = simplexml_load_file(AXCOTO_SLIDESHOW_DIR . '/slideshow/galleries/' . $file);
			$attbs = $slideshows->attributes();
			$this->_slideshows['attbs'] = array();


			foreach ($this->_attb_pattern as $attb) {
				$this->_slideshows['attbs'][$attb] = (string)$attbs->$attb;
			}

			$this->_slideshows['item'] = array();

			$items = array();

			$nav_xpath = '/Banner/item';
			$result = $slideshows->xpath($nav_xpath);


			foreach ($slideshows as $item) {
				$attbs = $item->attributes();
				$i['image'] = (string)$attbs->image;
				$i['link'] = (string)$attbs->link;
				$i['target'] = (string)$attbs->target;
				$i['textBlend'] = (string)$attbs->textBlend;
				$i['data'] = (string)$item;
				$this->_slideshows['item'][] = $i;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}

	/**
	 * Function to generate XML and save it from array
	 * @return unknown_type
	 */
	private  function _saveXML($file) {
		ob_start();
		include('templates/xml.php');
		$xml = ob_get_contents();
		ob_end_clean();

		try {
			file_put_contents(AXCOTO_SLIDESHOW_DIR . "/slideshow/galleries/{$file}", $xml);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	/**
	 * Return all current gallerirs in system
	 * @return array
	 */
	private function getGalleries() {
		$galleryPath = AXCOTO_SLIDESHOW_DIR . '/slideshow/galleries';
		$this->_galleries = array();
		$handle = opendir($galleryPath);
		while (($xmlFile = readdir($handle)) !== false) {
			if ($xmlFile !='.' && $xmlFile !='..' && (strtolower(substr($xmlFile , -4)) == '.xml')) {
				$this->_galleries[] = $xmlFile ;
			}
		};
		return $this->_galleries;
	}



	private function _renderUrl($action, $params=null) {
		$url = "options-general.php?page=axcoto_slideshow&act={$action}&";
		$q = array();

		if (is_array($params)) {
			foreach ($params as $key=>$value) {
				$q[] = "{$key}={$value}";
			}
		}
		$url .= implode($q, '&');
		return $url;
	}

	private function _redirect($link, $msg='') {
		$link .= "&" . time();
		include('templates/redirect.php');
	}

	private function __normalizeAMP($str) {
		return str_replace('&', '&amp;' , $str);
	}
	private function __deNormalizeAMP($str) {
		return str_replace('&amp;', '&' , $str);
	}

}
?>
