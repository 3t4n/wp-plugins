<?php

require_once 'Helper.php';
require_once 'Model.php';
require_once 'Widget.php';
require_once 'InformersListTable.php';

class FtInformers{
	
	private $shortcodeTag = 'ft_widget';
	private $pluginFile;
	private $pluginDir;
	private $jalDbVersion = '1.0';

	
	function __construct( $pluginFile, $pluginDir ){
		$this->pluginFile = $pluginFile;
		$this->pluginDir = $pluginDir;
		$this->registerHooks();
		add_shortcode( $this->shortcodeTag, array( $this, 'shortcodeHandler' ) );
	}
	private function registerHooks(){
		add_action('plugins_loaded', function(){
			load_plugin_textdomain( 'ftinformers', false, dirname( plugin_basename($this->pluginFile) ) . '/lang' );
		});
		
		register_activation_hook( $this->pluginFile, array($this , 'activatePlugin' ) );
		register_uninstall_hook( $this->pluginFile, array($this , 'uninstallPlugin' ) );
		
		
		add_action('admin_menu', function(){
			add_menu_page(__('Manage fortrader widgets', 'ftinformers'), __('FT widgets', 'ftinformers'), 'manage_options', 'ft-informers', array($this , 'route' ) , plugins_url('/assets/img/logo.png', $this->pluginFile) );
		});
		
		if( strpos( get_site_url() . $_SERVER['REQUEST_URI'], admin_url('admin.php?page=ft-informers&action=add') ) !== false ){
			add_filter( 'admin_body_class', function($classes){
				return $classes . ' bootstrapColorpickerPlus';
			}, 100, 1);
		}
		
		if ( is_admin() && isset( $_GET['page'] ) && $_GET['page'] == 'ft-informers' ){
			add_action( 'admin_enqueue_scripts', array($this , 'enqueueScripts' ) );
		}
		
		add_action( 'wp_ajax_createInformer', array( $this, 'createInformer' ));
		add_action( 'wp_ajax_editInformer', array( $this, 'editInformer' ));
		
		add_action( 'widgets_init', function(){
			register_widget( 'FtiWidget' );
		} );
		
	}
	public function editInformer(){
		if( !isset( $_POST['id'] ) || !$_POST['id'] ) return false;
		check_ajax_referer( 'edit-informer' . $_POST['id'], 'nonce' );
		
		if( !isset($_POST['lang']) || !isset($_POST['title']) || !isset($_POST['catId']) || !isset($_POST['catTitle']) || !isset($_POST['styleId']) || !isset($_POST['styleTitle']) || !isset($_POST['height']) || !isset($_POST['width']) || !isset($_POST['url']) || !$_POST['lang'] || !$_POST['title'] || !$_POST['catId'] || !$_POST['catTitle'] || !$_POST['styleId'] || !$_POST['styleTitle'] || !$_POST['url'] ) return false;
		
		if( FtiModel::findOneByWhere('title = %s and id <> %d', array($_POST['title'], $_POST['id'])) ){
			echo json_encode([
				'error' => 1,
				'msg' => __('Please enter other title', 'ftinformers')
			]);
			die();
		}
		
		$informer = FtiModel::find( $_POST['id'] );
		if( !$informer ) {
			echo json_encode([
				'error' => 3,
				'msg' => __("Can't find widget", 'ftinformers')
			]);
			die();
		}

		$informer->lang = $_POST['lang'];
		$informer->title = $_POST['title']; 
		$informer->catId =  $_POST['catId']; 
		$informer->catTitle = $_POST['catTitle']; 
		$informer->styleId = $_POST['styleId'];
		$informer->styleTitle = $_POST['styleTitle']; 
		$informer->height = $_POST['height'];
		$informer->width = $_POST['width'];
		$informer->url = str_replace(FtiHelper::get('ftUrl'), '', $_POST['url']);
		
		if( $informer->save() ){
			echo json_encode([
				'error' => 0,
				'msg' => __('Widget saved!', 'ftinformers')
			]);
		}else{
			echo json_encode([
				'error' => 2,
				'msg' => __('Error while saving widget', 'ftinformers')
			]);
		}
		
		
		die();
	}
	public function createInformer(){
		check_ajax_referer( 'create-informer', 'nonce' );

		if( !isset($_POST['lang']) || !isset($_POST['title']) || !isset($_POST['catId']) || !isset($_POST['catTitle']) || !isset($_POST['styleId']) || !isset($_POST['styleTitle']) || !isset($_POST['height']) || !isset($_POST['width']) || !isset($_POST['url']) || !$_POST['lang'] || !$_POST['title'] || !$_POST['catId'] || !$_POST['catTitle'] || !$_POST['styleId'] || !$_POST['styleTitle'] || !$_POST['url'] ) return false;
		
		
		if( FtiModel::findOneByTitle( $_POST['title'] ) ){
			echo json_encode([
				'error' => 1,
				'msg' => __('Please enter other title', 'ftinformers')
			]);
			die();
		}

		$informer = FtiModel::create(array(
			'lang' => $_POST['lang'],
			'title' => $_POST['title'], 
			'catId' => $_POST['catId'], 
			'catTitle' => $_POST['catTitle'], 
			'styleId' => $_POST['styleId'], 
			'styleTitle' => $_POST['styleTitle'], 
			'height' => $_POST['height'], 
			'width' => $_POST['width'], 
			'url' => str_replace(FtiHelper::get('ftUrl'), '', $_POST['url'])
		));
		
		if( $informer ){
			echo json_encode([
				'error' => 0,
				'msg' => __('Widget created!', 'ftinformers')
			]);
		}else{
			echo json_encode([
				'error' => 2,
				'msg' => __('Error when creating widget', 'ftinformers')
			]);
		}
		
		die();
	}
	public function enqueueScripts(){
		wp_enqueue_script("jquery");
		wp_enqueue_script("jquery-ui-core", false, array('jquery') );
		wp_enqueue_script("jquery-ui-slider", false, array('jquery', 'jquery-ui-core') );
		wp_enqueue_script("addEditJS", plugins_url( 'assets/js/addEdit.js' , $this->pluginFile ), array('jquery') );
		wp_enqueue_script("colorpickerJS", plugins_url( 'assets/js/bootstrap-colorpicker.min.js' , $this->pluginFile ), array('jquery'), false, true );
		wp_enqueue_script("bootstrap-colorpicker-plusJS", plugins_url( 'assets/js/bootstrap-colorpicker-plus.js' , $this->pluginFile ), array('jquery'), false, true );

		wp_enqueue_style('jquery-ui.CSS', plugins_url( 'assets/css/jquery-ui.css' , $this->pluginFile ) );
		wp_enqueue_style('addEdit.CSS', plugins_url( 'assets/css/addEdit.css' , $this->pluginFile ) );
		wp_enqueue_style('bootstrap.minCSS', plugins_url( 'assets/css/my.css' , $this->pluginFile ) );
		wp_enqueue_style('bootstrap-colorpicker.min.CSS', plugins_url( 'assets/css/bootstrap-colorpicker.min.css' , $this->pluginFile ) );
		wp_enqueue_style('bootstrap-colorpicker-plus.CSS', plugins_url( 'assets/css/bootstrap-colorpicker-plus.css' , $this->pluginFile ) );
	}
	public function getParam($param){
		return isset( $_GET[$param] ) ? $_GET[$param] : false;
	}
	public function route(){
		
		$action = $this->getParam('action');
		$action2 = $this->getParam('action2');
		
		if( !isset( $action ) || !$action ){
			$this->listPage();
		} 
		if( $action == -1 && $action2 == -1 ){
			$action = -1;
		}elseif( $action == -1 && $action2 == 'delete' ){
			$action = 'delete';
		}elseif( $action == 'delete' && $action2 == -1 ){
			$action = 'delete';
		}
		
		if( $action == -1 ){
			echo '<script>window.location="' . admin_url('admin.php?page=ft-informers') . '";</script>';
			return;
		}
		
		if( $action == 'add' ){
			$this->addEditPage();
		}
		if( $action == 'delete' ){
			$ids = $this->getParam('informers');

			if( !isset( $ids ) || !$ids ){
				echo '<script>window.location="' . admin_url('admin.php?page=ft-informers') . '";</script>';
				return ;
			}
			if( !is_array( $ids ) ) $ids = array( $ids );
			
			$affectedRows = FtiModel::destroy($ids);
			echo '<script>window.location="' . admin_url('admin.php?page=ft-informers&deleted='.$affectedRows) . '";</script>';
			return;
		}
		
		
	}
	private function listPage(){
		$deletedRows = $this->getParam('deleted');
		if( $deletedRows ){
			$this->showNotice( sprintf( _n( '%s widget deleted', '%s widgets deleted', $deletedRows, 'ftinformers' ), $deletedRows ) );
		}

		$table = new InformersListTable();
		return $this->view(
			'list',
			array(
				'manageTitleText' => __('Manage widgets', 'ftinformers'),
				'tableContents' => $table->getTableContents(),
				'addUrl' => admin_url('admin.php?page=ft-informers&action=add'),
				'addInformerText' => __('Add widget', 'ftinformers'),
			)
		);
		
	}
	private function addEditPage(){
		$allSettings = $this->getFtiSettings();	
		$id = $this->getParam('id');
			
		$viewsParams = array(
			'createEditTitleText' => __('Create widget', 'ftinformers'),
			'backToList' => __('Back to overview', 'ftinformers'),
			'backUrl' => admin_url('admin.php?page=ft-informers'),
			'submitUrl' => admin_url('admin.php?page=ft-informers&action=add'),
			'informerTitleText' => __('Widget title ( for admin )', 'ftinformers'),
			'languageTitleText' => __('Select widget language', 'ftinformers'),
			'informerHeightTitleText' => __('Enter widget height in pixels', 'ftinformers'),
			'jsTexts' => array(
				'selectCatTitleText' => __('Select widget Category', 'ftinformers'),
				'selectCatOptionText' =>  __('-- Select category --', 'ftinformers'),
				'items' =>  __('Choose items for widget', 'ftinformers'),
				'columns' =>  __('Choose columns for widget', 'ftinformers'),
				'from' =>  __('Choose from currency', 'ftinformers'),
				'to' =>  __('Choose to currency', 'ftinformers'),
				'amount' => __('Defautl amount', 'ftinformers'),
				'showGetBtn' => __('Show get widget button?', 'ftinformers'),
				'mult' => __('Select a multiplier for padding, margin, and fonts', 'ftinformers'),
				'selectStylesTitleText' => __('Select widget style', 'ftinformers'),
				'selectStyleOptionText' =>  __('-- Select style --', 'ftinformers'),
				'colors' =>  __('Modify widget colors', 'ftinformers'),
				'hideDiff' => __('Hide diff values?', 'ftinformers'),
				'w' => __('Enter widget width ( 0 = 100% )', 'ftinformers'),
				'codes' => __('Show currency code', 'ftinformers'),
				'save' => __('Create widget', 'ftinformers'),
				'warnSelectLang' => __('Please select language', 'ftinformers'),
				'warnEnterTitle' => __('Please enter title', 'ftinformers'),
				'toCur' => __('Select destination currency', 'ftinformers'),
				'disableRealTime' => __('Disable real time update', 'ftinformers'),
			),
			'createnonce' => wp_create_nonce( "create-informer" ),
			'langsList' => $this->getLangsListForSelect( $allSettings ),
			'urlLangs' => FtiHelper::get('ftLangs'),
			'ftUrl' => FtiHelper::get('ftUrl'),
			'allSettings' => $allSettings,
			'informerPreviewTitle' => __('Widget preview', 'ftinformers'),
			'ajaxAction' => 'createInformer',
			'mode' => 'add',
			'savedData' => '',
			'parsedData' => ''
		);
			
		if( !$id ){
			return $this->view('addEdit', $viewsParams);
		}else{
			$model = FtiModel::find($id);
			if( !$model ){
				return "Can't find widget";
			}else{		
				$viewsParams['createEditTitleText'] = __('Edit widget', 'ftinformers');
				$viewsParams['jsTexts']['save'] = __('Save widget', 'ftinformers');
				$viewsParams['mode'] = 'edit';
				$viewsParams['createnonce'] = wp_create_nonce( "edit-informer" . $model->id );
				$viewsParams['ajaxAction'] = 'editInformer';
				$viewsParams['savedData'] = array(
					'id' => $model->id,
					'lang' => $model->lang, 
					'title' => $model->title, 
					'height' => $model->height, 
				);
				$viewsParams['parsedData'] = $this->getParamsFromUrl( $model->url );
				return $this->view('addEdit', $viewsParams);
			}
		}
	}
	public function getParamsFromUrl($url){
		$parsed = parse_url( $url );
		parse_str($parsed['query'], $params);
		
		$outParams = array();
		
		foreach( $params as $param => $val ){
			if( strpos( $val, ',' ) === false ){
				$outParams[$param] = $val;
			}elseif( $param == 'colors' ){
				$tmpArr = explode(',', $val);
				foreach( $tmpArr as $colorStr ){
					$colorArr = explode('=', $colorStr);
					$outParams[$colorArr[0]] = '#' . $colorArr[1];
				}
			}else{
				$tmpArr = explode(',', $val);
				foreach( $tmpArr as $settingVal ){
					$outParams[$param][$settingVal] = 1;
				}
			}
		}
		
		return $outParams;
	}
	private function view( $viewFile, $params ){
		if( !file_exists( $this->pluginDir . "/views/{$viewFile}.php" ) ) die("Can't find view file" . $viewFile);
		extract($params);
		require_once $this->pluginDir . "/views/{$viewFile}.php";
	}
	private function getFtiSettings(){
		if( !file_exists( $this->pluginDir . '/data/settings.txt' ) ) die("Can't find settings file");
		$data = file_get_contents( $this->pluginDir . '/data/settings.txt' );
		if( !$data ) die("Can't load data");
		return json_decode( $data, true );
	}
	public function getLangsListForSelect( $allSettings ){
		$langs = FtiHelper::get('ftLangs');
		$outArray = array( '-1' => __( '-- Select language --', 'ftinformers') );
		foreach( $allSettings['langs'] as $lang => $data ){
			$outArray[$lang] = ucfirst($lang);
		}
		return $outArray;
    }
	private function showNotice( $msg ){
		echo '<div class="notice notice-success is-dismissible"><p>'.$msg.'</p></div>';
	}
	
	
	public function activatePlugin(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'ft_informers';
		
		$charset_collate = $wpdb->get_charset_collate();
		
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			lang varchar(255) NOT NULL,
			title varchar(255) NOT NULL,
			catId tinyint UNSIGNED NOT NULL,
			catTitle varchar(255) NOT NULL,
			styleId tinyint UNSIGNED NOT NULL,
			styleTitle varchar(255) NOT NULL,
			height smallint,
			width smallint,
			url text NOT NULL,
			PRIMARY KEY (`id`)
		) $charset_collate;
		";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		add_option( 'jal_db_version', $this->jalDbVersion );
	}
	public function uninstallPlugin(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'ft_informers';
		$wpdb->query( "DROP TABLE IF EXISTS $table_name" );
	}
	
	public function shortcodeHandler($atts , $content = null){
		extract( shortcode_atts(
			array(
				'id' => 0,
			), $atts )
		);
	
		return self::getInformer($id);
	}
	public static function getInformer($id){
		if( !$id ) return false;
		
		$model = FtiModel::find($id);
		if( !$model ) return '';
		return $model->getInformerCode();
	}
	
	
}